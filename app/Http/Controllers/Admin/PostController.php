<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(20);
        return view('admin.post.list', compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function store(Request $request){
        // B1: Validate input
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ];

        $message = [
            'title.required' => 'Vui lòng nhập Title',
            'content.required' => 'Vui lòng nhập Content',
            'description.required' => 'Vui lòng nhập Description',
            'image.required' => 'Vui lòng nhập Image',
            'category_id.required' => 'Vui lòng nhập Category Id',
        ];

        $request->validate($rules, $message);

        $title = $request->title;
        $content = $request->content;
        $description = $request->description;
        $image = $request->image;
        $category_id = $request->category_id;
        $slug = Str::slug($title);
        $new_post = $request->new_post;
        $highlight_post = $request->highlight_post;

        // B2: Check if slug is exists
        $checkSlugIsExists = Post::where('slug', $slug)->first();

        while($checkSlugIsExists){
            //  concatenation string
            $slug = $checkSlugIsExists->slug . Str::random(5);
        };

        // Handle file
        if($request->hasFile('image')){
            // Get file
            $file = $request->file('image');
            // Get name of file
            $name_file = $file->getClientOriginalName();
            // Get ext of file
            $extension_file = $file->getClientOriginalExtension();
            // Compare case-insensitive (So sánh đuôi file không phân biệt chữ hoa chữ thường)
            if(strcasecmp($extension_file, 'jpg') === 0 || strcasecmp($extension_file, 'png') === 0 || strcasecmp($extension_file, 'jpeg') === 0){
                $image = Str::random(8) . '_' . $name_file;
                // Nếu mà file đã tồn tại trước đó trong image/post (Nằm trong folder public) thì đặt cho nó 1 tên khác
                while(file_exists('image/post/' . $image)){
                     $image = Str::random(8) . '_' . $name_file;
                }
                // Lưu cái file lại trong image/post (Nằm trong folder public)
                $file->move('image/post', $image);
            }
        }

         // B3: Save into db
        Post::create([
            'title' => $title,
            'description' => $description,
            'content' =>  $content,
            'image' => $image,
            'view_counts' => 0,
            'new_post' => $new_post ? 1 : 0,
            'highlight_post' => $highlight_post ? 1 : 0,
            'slug' => $slug,
            'user_id' => 1,
            'category_id' => $category_id,
        ]);

        // B4: Return to List
        return redirect()->route('admin.post.index')->with('success', 'Create Successfully');
    }

    public function edit($post_id){
        $post = Post::find($post_id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $post_id){
        // B1: Validate input
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ];

        $message = [
            'title.required' => 'Vui lòng nhập Title',
            'content.required' => 'Vui lòng nhập Content',
            'description.required' => 'Vui lòng nhập Description',
            'category_id.required' => 'Vui lòng nhập Category Id',
        ];

        $request->validate($rules, $message);

        $title = $request->title;
        $content = $request->content;
        $description = $request->description;
        $image = $request->image;
        $category_id = $request->category_id;
        $slug = Str::slug($title);
        $new_post = $request->new_post;
        $highlight_post = $request->highlight_post;

        // B2: Check if slug is exists
        $checkSlugIsExists = Post::where('slug', $slug)->first();

        while($checkSlugIsExists){
            //  concatenation string
            $slug = $checkSlugIsExists->slug . Str::random(5);
        };

        // Handle file
        if($request->hasFile('image')){
            // Get file
            $file = $request->file('image');
            // Get name of file
            $name_file = $file->getClientOriginalName();
            // Get ext of file
            $extension_file = $file->getClientOriginalExtension();
            // Compare case-insensitive (So sánh đuôi file không phân biệt chữ hoa chữ thường)
            if(strcasecmp($extension_file, 'jpg') === 0 || strcasecmp($extension_file, 'png') === 0 || strcasecmp($extension_file, 'jpeg') === 0){
                $image = Str::random(8) . '_' . $name_file;
                // Nếu mà file đã tồn tại trước đó trong image/post (Nằm trong folder public) thì đặt cho nó 1 tên khác
                while(file_exists('image/post/' . $image)){
                     $image = Str::random(8) . '_' . $name_file;
                }
                // Lưu cái file lại trong image/post (Nằm trong folder public)
                $file->move('image/post', $image);
            }
        }

        // Cách 1
        // B3: Save into db
        $post = Post::find($post_id);
        $post->update([
            'title' => $title,
            'description' => $description,
            'content' =>  $content,
            'image' => isset($image) ? $image : $post->image, // Nếu mà biến iamge tồn tại thì cập nhật giá trị mới còn không thì lưu lại giá trị cũ
            'new_post' => $new_post ? 1 : 0,
            'highlight_post' => $highlight_post ? 1 : 0,
            'slug' => $slug,
            'user_id' => 1,
            'category_id' => $category_id,
        ]);

        // Cách 2
        // B3: Save into db
        // Post::where('post_id', $post_id)->update([
        //     'title' => $title,
        //     'description' => $description,
        //     'content' =>  $content,
        //     'image' => $image,
        //     'new_post' => $new_post ? 1 : 0,
        //     'highlight_post' => $highlight_post ? 1 : 0,
        //     'slug' => $slug,
        //     'user_id' => 1,
        //     'category_id' => $category_id,
        // ]);

        // B4: Return to List
        return redirect()->route('admin.post.edit', $post_id )->with('success', 'Update Successfully');
    }

    public function delete($post_id){
        // Cách 1
        $post = Post::find($post_id);
        $post->delete();

        // Cách 2
        // Post::where('post_id', $post_id)->delete();

        return redirect()->route('admin.post.index')->with('success', 'Delete Successfully');
    }
}
