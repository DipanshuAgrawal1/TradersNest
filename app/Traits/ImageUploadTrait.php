<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait ImageUploadTrait
{


  public function uploadImage(Request $request, $inputName, $path)
  {
    if ($request->hasfile($inputName)) {

      $image = $request->{$inputName};
      $ext = $image->getClientOriginalExtension();
      $imageName = 'media_' . uniqid() . '.' . $ext;

      $image->move(public_path($path), $imageName);

      return $path . '/' . $imageName;

    }
  }

  public function uploadMultiImage(Request $request, $inputName, $path)
  {
    $imagePaths = [];
    if ($request->hasfile($inputName)) {

      $images = $request->{$inputName};

      foreach ($images as $image) {
        $ext = $image->getClientOriginalExtension();
        $imageName = 'media_' . uniqid() . '.' . $ext;

        $image->move(public_path($path), $imageName);

        $imagePaths[] = $path . '/' . $imageName;

      }
      return $imagePaths;
    }
  }

  public function updateImage(Request $request, $inputName, $path, $oldPath = null)
  {
    if ($request->hasfile($inputName)) {
      if (File::exists(public_path($oldPath))) {
        File::delete(public_path($oldPath));
      }

      $image = $request->{$inputName};
      $ext = $image->getClientOriginalExtension();
      $imageName = 'media_' . uniqid() . '.' . $ext;

      $image->move(public_path($path), $imageName);

      return $path . '/' . $imageName;

    }
  }

  // handle delete file
  public function deleteImage($path)
  {
    if (File::exists(public_path($path))) {
      File::delete(public_path($path));
    }
  }

}