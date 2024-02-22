<?php

require_once __DIR__.'/app/Utils/files.php';

// функция для получения ресурса, который разделяется между двумя поддоменами
function getCommonResource($url) {
  if(config('app.env') !== 'production') return $url;
  return config('app.city') === 'Астана' ? "https://expertremonta.kz" . $url : $url;
}

function processTitle($title, $city) {
  $titleParts = explode(' ', $title);
  foreach($titleParts as $idx => $part) {
    // мб удобнее _CITY_ или CITY
    if($part !== '%CITY%') continue;

    if($titleParts[$idx-1] !== 'в') $titleParts[$idx] = $city;
    else if($titleParts[$idx-1] === 'в' && $city === 'Астана') $titleParts[$idx] = 'Астане';
    else if($titleParts[$idx-1] === 'в' && $city !== 'Астана') $titleParts[$idx] = $city;
  }
  return implode(' ', $titleParts);
}

function getBlockClass($idx) {
    if($idx % 4 === 1) return 'pink';
    if($idx % 4 === 2) return 'green';
    if($idx % 4 === 3) return 'purple';
    if($idx % 4 === 0) return 'yellow';
}

function cityEnToRu($city) {
  if($city === 'Astana') return 'Астана';
  if($city === 'Almaty') return 'Алматы';
}

function translit($text) {
  $cyr = [
    /*'Љ', 'Њ', 'Џ', 'џ', 'ш', 'ђ', 'ч', 'ћ', 'ж', 'љ', 'њ', 'Ш', 'Ђ', 'Ч', 'Ћ', 'Ж','Ц','ц',*/
    'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п', 'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я', 'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П', 'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я',
   ' '];
  $lat = [
    /*'Lj', 'Nj', 'Dž', 'dž', 'š', 'đ', 'č', 'ć', 'ž', 'lj', 'nj', 'Š', 'Đ', 'Č', 'Ć', 'Ž','C','c',*/ 
    'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p', 'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya', 'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P', 'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya',
   '-'];

  return str_replace($cyr, $lat, $text);
}