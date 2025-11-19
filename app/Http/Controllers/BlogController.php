<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
     public function view(){
        $allData = Blog::orderBy('id','desc')->paginate('4');
        return view('backend.blog.view_blog',compact('allData'));
    }

    public function add(){
          return view('backend.blog.add_blog');
    }

    public function store(Request $request){
        // dd($request->all());
        $validateData = $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'category_name' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(600,400)->save('upload/blog_image/'.$name_gen);
        $save_url = 'upload/blog_image/'.$name_gen;

        //Generate slug from title
        $slug = Str::slug($request->title);
        $count = Blog::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        Blog::insert([
            'title' => $request->title,
            'slug' => $slug,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'category_name' => $request->category_name,
            'status' => $request->status,
            'image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Blog added successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('view_blog')->with($notification);
    }

    public function edit($id){
        // dd('ok');
        $editData = Blog::find($id);
        return view('backend.blog.edit_blog',compact('editData'));
    }

    public function update(Request $request, $id){
        // dd('ok');
        $oldImag = $request->old_image;

        $blog = Blog::findOrFail($id);
        if ($blog->title !== $request->title) {
            $slug = Str::slug($request->title);
            $count = Blog::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $id)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
        } else {
            $slug = $blog->slug;
        }
        
        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,400)->save('upload/blog_image/'.$name_gen);
            $save_url = 'upload/blog_image/'.$name_gen;

            if(file_exists($oldImag)){
                unlink($oldImag);
            }

            Blog::find($id)->update([
                'title' => $request->title,
                'slug' => $slug,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'category_name' => $request->category_name,
                'status' => $request->status,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider update successfully.',
                'alert-type' => 'success',
            );

            return redirect()->route('view_blog')->with($notification);

        }else{
            Blog::find($id)->update([
                'title' => $request->title,
                'slug' => $slug,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'category_name' => $request->category_name,
                'status' => $request->status,
            ]);

            $notification = array(
                'message' => 'Blog update without image successfully.',
                'alert-type' => 'success',
            );

            return redirect()->route('view_blog')->with($notification);
        }

    }

   public function deleteBlog($id){
        $deleteData = Blog::find($id);
        $image = $deleteData->image;

        unlink($image);

        Blog::find($id)->delete();

        $notification = array(
            'message' => 'Blog deleted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('view_blog')->with($notification);
   }
}
