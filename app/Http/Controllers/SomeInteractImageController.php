<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SomeInteractImageController extends Controller
{

    public function index(){
        return view('someinteractimage.index');
    }

    // save([string $path, [int $quality], [string $format]])
    // - $path (tùy chọn): Đường dẫn đến tệp nơi ghi dữ liệu hình ảnh.
    // Nếu hình ảnh được tạo từ một hình ảnh hiện có trong hệ thống tệp và tham số không được đặt, phương thức sẽ cố ghi đè lên tệp hiện có.
    // - $quality (tùy chọn): Xác định tùy chọn chất lượng của hình ảnh.
    // Nó được chuẩn hóa cho tất cả các loại tệp thành một phạm vi từ 0(chất lượng kém, tệp nhỏ) đến 100(chất lượng tốt nhất, tệp lớn).
    // Chất lượng chỉ được áp dụng nếu bạn đang mã hóa định dạng JPG vì quá trình nén PNG không làm mất dữ liệu và không ảnh hưởng đến chất lượng hình ảnh.
    // Giá trị mặc định là 90.
    // - $format (tùy chọn): Theo mặc định, định dạng của hình ảnh đã lưu được xác định bởi phần mở rộng tệp của đường dẫn đã cho.
    // Ngoài ra, có thể xác định định dạng hình ảnh bằng cách chuyển một trong các phần mở rộng định dạng hình ảnh làm tham số thứ ba.
    public function compressImage(Request $request){
        if(isset($request->file)){
            $file = $request->file("file");
            $file_name = time(). '_' .$file->getClientOriginalName();
            // Compress Image
            $img = \Image::make($file);
            $img->save(\public_path($file_name), 10);
            return response()->json([
                'data' => [],
                'status' => true,
                'message' => 'Success'
            ]);
        }
    }

}
