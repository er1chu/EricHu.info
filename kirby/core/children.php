<?php

/**
 * Children
 *
 * @package   Kirby CMS
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      http://getkirby.com
 * @copyright Bastian Allgeier
 * @license   http://getkirby.com/license
 */
abstract class ChildrenAbstract extends Collection {

  protected $page = null;
  protected $cache = array();

  /**
   * Constructor
   */
  public function __construct($page) {
    $this->page = $page;
  }

  /**
   * Returns a new collection of pages without the given pages
   *
   * @param args any number of uris or page elements, passed as individual arguments
   * @return object a new collection without the pages
   */
  public function not() {
    $collection = clone $this;
    foreach(func_get_args() as $uri) {
      if(is_a($uri, 'Page')) {
        // unset by Page object
        unset($collection->data[$uri->id()]);
      } else if(isset($collection->data[$uri])) {
        // unset by URI
        unset($collection->data[$uri]);
      } else if($page = $collection->findBy('uid', $uri)) {
        // unset by UID
        unset($collection->data[$page->id()]);
      }
    }
    return $collection;
  }

  /**
   * Creates a new Page object and adds it to the collection
   */
  public function add($dirname) {
    $page = new Page($this->page, $dirname);
    $this->data[$page->id()] = $page;
    return $page;
  }

  /**
   * Creates a new subpage
   *
   * @param string $uid
   * @param string $template
   * @param array $data
   */
  public function create($uid, $template, $data = array()) {
    return page::create($this->page->id() . '/' . $uid, $template, $data);
  }

  /**
   * Returns the parent page
   *
   * @return Page
   */
  public function page() {
    return $this->page;
  }

  /**
   * Returns the Children of Children
   *
   * @return Children
   */
  public function children() {
    $grandChildren = new Children($this->page);
    foreach($this->data as $page) {
      foreach($page->children() as $subpage) {
        $grandChildren->data[$subpage->id()] = $subpage;
      }
    }
    return $grandChildren;
  }

  /**
   * Find a specific page by its uri
   *
   * @return Page or false
   */
  public function find() {

    $args = func_get_args();

    if(count($args) == 0) {
      return false;
    } else if(count($args) > 1) {
      $collection = new Children($this->page);
      foreach($args as $id) {
        $page = $this->find($id);
        if($page) $collection->data[$page->id()] = $page;
      }
      return $collection;
    } else {

      // get the first argument and remove slashes
      $id = trim($args[0], '/');

      // build the direct uri
      $directId = trim($this->page()->id() . '/' . $id, '/');

      // fast access to direct uris
      if(isset($this->data[$directId])) return $this->data[$directId];

      $path = explode('/', $id);
      $obj  = $this;
      $page = false;

      foreach($path as $uid) {

        $id = ltrim($obj->page()->id() . '/' . $uid, '/');

        if(!isset($obj->data[$id])) return false;

        $page = $obj->data[$id];
        $obj  = $page->children();

      }

      return $page;

    }

  }

  /**
   * Find a single page by a given value
   *
   * @param string $field
   * @param string $value
   * @return Page
   */
  public function findBy($field, $value) {
    foreach($this->data as $page) {
      if($page->$field() == $value) return $page;
    }
    return false;
  }

  /**
   * Finds pages by it's unique URI
   *
   * @param mixed $uri Either a single URI string or an array of URIs
   * @param string $use The field, which should be used (uid or slug)
   * @return mixed Either a Page object, a Pages object for multiple pages or null if nothing could be found
   */
  public function findByURI() {

    $args = func_get_args();

    if(count($args) == 0) {
      return false;
    } else if(count($args) > 1) {
      $collection = new Children($this->page);
      foreach($args as $uri) {
        $page = $this->findByURI($uri);
        if($page) $collection->data[$page->id()] = $page;
      }
      return $collection;
    } else {

      // get the first argument and remove slashes
      $uri   = trim($args[0], '/');
      $array = str::split($uri, '/');
      $obj   = $this;
      $page  = false;

      foreach($array as $p) {

        $next = $obj->findBy('slug', $p);

        if(!$next) break;

        $page = $next;
        $obj  = $next->children();

      }

      return ($page and $page->slug() != a::last($array)) ? false : $page;

    }

  }

  /**
   * Find the open page in a set
   *
   * @return Page
   */
  public function findOpen() {
    return $this->findBy('isOpen', true);
  }

  /**
   * Filters the collection by visible pages
   *
   * @return Children
   */
  public function visible() {
    $collection = clone $this;
    return $collection->filterBy('isVisible', true);
  }

  /**
   * Filters the collection by invisible pages
   *
   * @return Children
   */
  public function invisible() {
    $collection = clone $this;
    return $collection->filterBy('isInvisible', true);
  }

  /**
   * Checks if a page is in a set of children
   *
   * @param Page | string $page
   * @return boolean
   */
  public function has($page) {
    $uri = is_string($page) ? $page : $page->uri();
    return isset($this->data[$uri]);
  }

  /**
   * Native search method to search for anything within the collection
   */
  public function search($query, $params = array()) {

    if(is_string($params)) {
      $params = array('fields' => str::split($params, '|'));
    }

    $defaults = array(
      'minlength' => 2,
      'fields'    => array(),
      'words'     => false,
      'score'     => array()
    );

    $options     = array_merge($defaults, $params);
    $collection  = clone $this;
    $searchwords = preg_replace('/(\s)/u',',', $query);
    $searchwords = str::split($searchwords, ',', $options['minlength']);

    if(!empty($options['stopwords'])) {
      $searchwords = array_diff($searchwords, $options['stopwords']);
    }

    if(empty($searchwords)) return $collection->limit(0);

    $searchwords = array_map(function($value) use($options) {
      return $options['words'] ? '\b' . preg_quote($value) . '\b' : preg_quote($value);
    }, $searchwords);

    $preg    = '!(' . implode('|', $searchwords) . ')!i';
    $results = $collection->filter(function($page) use($query, $searchwords, $preg, $options) {

      $data = $page->content()->toArray();
      $keys = array_keys($data);

      if(!empty($options['fields'])) {
        $keys = array_intersect($keys, $options['fields']);
      }

      $page->searchHits  = 0;
      $page->searchScore = 0;

      foreach($keys as $key) {

        $score = a::get($options['score'], $key, 1);

        // check for a match
        if($matches = preg_match_all($preg, $data[$key])) {

          $page->searchHits  += $matches;
          $page->searchScore += $matches * $score;

          // check for full matches
          if($matches = preg_match_all('!' . preg_quote($query) . '!i', $data[$key])) {
            $page->searchScore += $matches * $score;
          }

        }

      }

      return $page->searchHits > 0 ? true : false;

    });

    $results = $results->sortBy('searchScore', SORT_DESC);

    return $results;

  }

  /**
   * Creates a clean one-level collection with all
   * pages, subpages, subsubpages, etc.
   *
   * @param object Pages object for recursive indexing
   * @return Children
   */
  public function index(Children $obj = null) {

    if(is_null($obj)) {
      if(isset($this->cache['index'])) return $this->cache['index'];
      $this->cache['index'] = new Children($this->page);
      $obj = $this;
    }

    foreach($obj->data as $key => $page) {
      $this->cache['index']->data[$page->uri()] = $page;
      $this->index($page->children());
    }

    return $this->cache['index'];

  }

  /**
   * Extracts all values for a single field into
   * a new array
   *
   * @param string $field
   * @return array
   */
  public function pluck($field, $split = null, $unique = false) {

    $result = array();

    foreach($this->data as $item) {
      $row = $this->extractValue($item, $field);

      if(!is_null($split)) {
        $result = array_merge($result, str::split($row, $split));
      } else {
        $result[] = $row;
      }

    }

    if($unique) {
      $result = array_unique($result);
    }

    return array_values($result);

  }

}