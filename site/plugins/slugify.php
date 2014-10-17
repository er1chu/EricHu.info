<?php

// direct access protection
if(!defined('KIRBY')) die('Direct access is not allowed');

// create space trimmed lowercase html
function trimmed($text) {
	$text = preg_replace('/[\W]+/', '-', $text);
  return str_replace(' ', '-', strtolower(html($text)));
}