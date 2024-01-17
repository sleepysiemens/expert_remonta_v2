<?php

function processTitle($title, $city) {
  $titleParts = explode(' ', $title);
  foreach($titleParts as $idx => $part) {
    if($part !== '%CITY%') continue;

    if($titleParts[$idx-1] !== 'в') $titleParts[$idx] = $city;
    else if($titleParts[$idx-1] === 'в' && $city === 'Астана') $titleParts[$idx] = 'Астане';
  }
  return implode(' ', $titleParts);
}

function getBlockClass($idx) {
    if($idx % 4 === 1) return 'pink';
    if($idx % 4 === 2) return 'green';
    if($idx % 4 === 3) return 'purple';
    if($idx % 4 === 0) return 'yellow';
}

function deleteDirectory($dirPath) {
  if (is_dir($dirPath)) {
      $objects = scandir($dirPath);
      foreach ($objects as $object) {
          if ($object != "." && $object !="..") {
              if (filetype($dirPath . DIRECTORY_SEPARATOR . $object) == "dir") {
                  deleteDirectory($dirPath . DIRECTORY_SEPARATOR . $object);
              } else {
                  unlink($dirPath . DIRECTORY_SEPARATOR . $object);
              }
          }
      }
  reset($objects);
  rmdir($dirPath);
  }
}

function cityEnToRu($city) {
  if($city === 'Astana') return 'Астана';
  if($city === 'Almaty') return 'Алматы';
}