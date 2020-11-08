<?php

function autoLoad($className) {
  $arrayPaths = array(
    '/models/',
    '/components/'
  );

  foreach ($arrayPaths as $path) {
    $path = ROOT . $path . $className . '.php';

    if (is_file($path)) {
      include_once $path;
    }
  }
}

spl_autoload_register('autoLoad'); 