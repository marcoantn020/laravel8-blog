<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public static function up($request, $path = 'users' )
    {
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName()
                    . strtotime('now')) . '.' . $extension;
            $requestImage->move(public_path("img/{$path}"), $imageName);
            return $imageName;
        }
        return 'image';
    }
}
