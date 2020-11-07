<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class Upload extends Controller
{
    /* 
    
        uploadFile Func.

        data : [

            $file           => file that you want to store.
            $path           => place store file (storage palce) 
            $new_nam        => it's a custom name for your file.
            $file_type      => news, products etc..
            $upload_type    =>[ it's just variable have two choices

                single  => to upload one file , doesn't have any other files related  ,
                multi   => to upload files related to  file_type like products thats have the main image and a lot of images related,

            ]
            $delete_file    => file you want to deleted it
        ]
    
    */
    public static function uploadFile($data = [])
    {
        
        $new_name = $data['new_name'] === null ? time() : $data['new_name'];

        if(request()->hasFile($data['file']) && $data['upload_type'] == 'single'){

          Storage::has($data['delete_file']) ? Storage::delete($data['delete_file']) : '';

            return request()->file($data['file'])->store($data['path']);
        }

    }
}
