<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //




    public function imagesUrlAction($attribute)
    {
        $path =  storage_path(). '/' . 'app/gallery/' . $attribute;
        if(!\File::exists($path)) abort(400);
        $file = \File::get($path);
        $type = \File::mimeType($path);
        $response = \Response::make($file, 200);
        $response->header('Content-Type', $type);
        return $response;

    }
}
