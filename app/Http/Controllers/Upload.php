<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\File;

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

        }else if(request()->hasFile($data['file']) && $data['upload_type'] == 'files'){

  
            $file = request()->file($data['file']);

            

            $size       = $file->getSize();
            $mime_type  = $file->getMimeType();
            $name       = $file->getClientOriginalName();
            $hashname   = $file->hashName();

            

            $add = File::create([
                'name'          => $name,
                'size'          => $size ,
                'file'          => $hashname,
                'path'          => $data['path'],
                'full_path'     => $data['path'] . '/' . $hashname,
                'mime_type'     => $mime_type,
                'file_type'     => $data['file_type'],
                'relation_id'   => $data['relation_id']
            ]);

            $file->store($data['path']);

            return $add->id;

          }

    }

    public static function deleteFile($id)
    {
       $file = File::find($id);

       if(! empty($file)){

            Storage::delete($file->full_path);

           $file->delete();
       }
    }
}
