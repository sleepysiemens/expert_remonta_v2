<?php
// utils functions for files

function deleteImgWithCrops($folder, $fileName) {
  @unlink(dirname(__FILE__) . "/public/img/$folder/" . $fileName);
  $resizesBreakpoints = [768, 600, 450, 360];
  foreach($resizesBreakpoints as $b) {
    @unlink(dirname(__FILE__) . "/public/img/$folder/x-$b-" . $fileName);
  }
}

function deleteImgCrops($folder, $fileName, $breakpoints = null) {
  $resizesBreakpoints = $breakpoints ? $breakpoints : [768, 600, 450, 360];
  foreach($resizesBreakpoints as $b) {
    @unlink(dirname(__FILE__) . "/public/img/$folder/x-$b-" . $fileName);
  }
}

function transformCropExtension($fileName) {
  preg_match('/\.([a-z]{1,6})$/', $fileName, $matches);
  if(in_array($matches[1], ['png', 'gif'])) $fileName = preg_replace('/\.[a-z]{1,6}$/', '.jpg', $fileName);
  return $fileName;
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

// функция сбора расширений файлов
function collectExtensions($path) {
  $extensions = [];
        /*foreach(scandir(public_path() . '/img/category_slider') as $idx => $path) {
          if($idx < 2) continue;
          $folder = scandir(public_path() . "/img/category_slider/$path");
          foreach($folder as $i => $file) {
            if($i < 2) continue;
            preg_match('/\.[a-z]{1,6}$/', $file, $matches);
            $extensions[] = $matches[0];
          }
        }*/
        //dd(array_unique($extensions));
        //dd(array_count_values($extensions));
}

// простановка или удаление кропов картинок
function processCrops() {
   // проблемы с отсутствием кропов только для отсутствующих в плане заливки картинок, гифок (2) и слишком маленьких изначально, меньше 400 пикс
   $notExist = [];
   /*foreach(\App\Models\CategoryImage::all() as $idx => $item) {
     if(!file_exists(public_path() . "/img/category_slider/$item->category_id/x-360-" . transformCropExtension($item->src))) {
       $notExist[] = ['item_id' => $item->id, 'item_src' => $item->src, 'category_id' => $item->category_id];
     }
     continue;
       if(file_exists(public_path() . "/img/category_slider/$item->category_id/x-360-" . transformCropExtension($item->src))) {
           deleteImgCrops("category_slider/$item->category_id", $item->src, [600, 450, 360]);
           continue;
       }
       if(file_exists(public_path() . "/img/category_slider/$item->category_id/" . $item->src)) {
         \App\Events\ImageUploaded::dispatch(public_path() . "/img/category_slider/$item->category_id/", $item->src, [768]);
       }
       if($idx > 450) break;
   }*/
   //dd($notExist);
}