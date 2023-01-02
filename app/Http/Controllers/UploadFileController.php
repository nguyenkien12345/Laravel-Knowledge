<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function uploadFile(){
        return view('uploadfiledemo.index');
    }

    public function handleFile(Request $request){
        // Nếu field image được truyền lên
        if($request->hasFile('image')){
            // Trả về file ảnh
            $file = $request->file('image');
            // Trả về tên của file
            $name_file = $file->getClientOriginalName();
            // Trả về đuôi của file
            $extension_file = $file->getClientOriginalExtension();
            // Trả về dung lượng của file
            $size_file = $file->getSize();
            // Trả về kiểu của file
            $mimeType_file = $file->extension();

            // strcasecmp Só sánh không phân biệt chữ hoa với chữ thường
            if(\strcasecmp($extension_file, 'jpg') === 0 || \strcasecmp($extension_file, 'png') === 0 || \strcasecmp($extension_file, 'jpeg') === 0){
                // Đặt tên cho ảnh
                $name = Str::random(5) . '-' . $name_file;
                // Nếu tên ảnh đã tồn tại rồi thì tạo lại 1 cái tên khác (Nằm trong public/image/demo)
                while(file_exists("image/demo" . $name)){
                    $name = Str::random(5) . '-' . $name_file;
                }
                // Lưu vào folder ảnh (Nằm trong public/image/demo)
                $file->move('image/demo', $name);
                return redirect()->route('upload-file')->with('success','Uploaded File Successfully');
            }
        }
        // Nếu field image không được truyền lên
        else{
            return redirect()->route('upload-file')->with('error','Please Select Image');
        }
    }

    public function downloadDocument(Request $request){

    }
}
