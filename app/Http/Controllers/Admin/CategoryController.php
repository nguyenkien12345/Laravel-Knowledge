<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.list', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        // B1: Validate input
        $rules = [
            'name' => 'required|min:3|max:64'
        ];

        $message = [
            'name.required' => 'Vui lòng nhập Category Name',
            'name.min' => 'Độ dài tối thiểu của Category Name là 3',
            'name.max' => 'Độ dài tối đa của Category Name là 64',
        ];

        $request->validate($rules, $message);

        $name = $request->name;
        $slug = Str::slug($name);

        // B2: Check if slug is exists
        $checkSlugIsExists = Category::where('slug', $slug)->first();

        while($checkSlugIsExists){
            //  concatenation string
            $slug = $checkSlugIsExists->slug . Str::random(5);
        };

        // B3: Save into db
        Category::create([
            'name' => $name,
            'slug' => $slug
        ]);

        // B4: Return to List
        return redirect()->route('admin.category.index')->with('success', 'Create Successfully');
    }

    public function edit($category_id){
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category_id){
        // B1: Validate input
        $rules = [
            'name' => 'required|min:3|max:64'
        ];

        $message = [
            'name.required' => 'Vui lòng nhập Category Name',
            'name.min' => 'Độ dài tối thiểu của Category Name là 3',
            'name.max' => 'Độ dài tối đa của Category Name là 64',
        ];

        $request->validate($rules, $message);

        $name = $request->name;
        $slug = Str::slug($name);

        // B2: Check if slug is exists
        $checkSlugIsExists = Category::where('slug', $slug)->first();

        while($checkSlugIsExists){
            //  concatenation string
            $slug = $checkSlugIsExists->slug . Str::random(5);
        }

        // // B3: Find category in db
        // $category = Category::find($category_id);

        // // B4: Update and Save into db
        // $category->update([
        //     'name' => $name,
        //     'slug' => $slug
        // ]);

        // B3 + B4: Find category in db, Update and Save into db
        Category::where('category_id', $category_id)->update([
            'name' => $name,
            'slug' => $slug
        ]);

        // B5: Return to this Category
        return redirect()->route('admin.category.edit',$category_id )->with('success', 'Update Successfully');
    }

    public function delete($category_id){
        // // B1: Find category in db
        // $category = Category::find($category_id);
        // // B2: Update and Save into db
        // $category->delete();

        // B1 + B2: Find category in db, Delete and Save into db
        Category::where('category_id', $category_id)->delete();

        // B3: Return to List
        return redirect()->route('admin.category.index')->with('success', 'Delete Successfully');
    }
}
