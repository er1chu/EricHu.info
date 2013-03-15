<?php 

snippet('header');

foreach($pages->visible() as $section) {
  snippet($section->uid(), array('data' => $section));
}

snippet('footer');

?>