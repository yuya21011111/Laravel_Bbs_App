<?php 
namespace App\Services;
use Illuminate\Support\Facades\Storage;

class ImageService {
  public static function upload($imageFile,$folderName){
    
    $file = $imageFile['image'];
   
    $fileName = uniqid(rand().'');
    $extension = $file->extension();
    $fileNameToStore = $fileName.'.'.$extension;
    Storage::putFileAs('public/' . $folderName . '/' , $file, $fileNameToStore );
    return $fileNameToStore;
  }
}