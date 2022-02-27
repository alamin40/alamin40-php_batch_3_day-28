<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    protected $blogs;
    protected $blog;
    public function index()
    {
        return view('add-blog');
    }

    public function create(Request $request)
    {
        $this->blog = new Blog();
        $this->blog->title = $request->title;
        $this->blog->author = $request->author;
        $this->blog->description = $request->description;
        $this->blog->save();
        return redirect()->back()->with('message', 'Student info save successfully');
    }

    public function manage()
    {
        $this->blogs = Blog::orderby('id', 'desc')->get();
        return view('manage-blog', ['blogs' => $this->blogs]);
    }
    public function edit($id)
    {
        $this->blog = Blog::find($id);
//        return $this->student;

        return view('edit-blog',['blog' => $this->blog]);
    }

    public function update(Request $request, $id)
    {
        $this->blog = Blog::find($id);
        $this->blog->title = $request->title;
        $this->blog->author = $request->author;
        $this->blog->description = $request->description;
        $this->blog->save();

        return redirect('/manage-blog')->with('message', 'Blog info update successfully');
    }

    public function delete($id)
    {
        $this->blog = Blog::find($id);
        $this->blog->delete();
        return redirect('/manage-blog')->with('message', 'Blog info deleted successfully');
    }
}
