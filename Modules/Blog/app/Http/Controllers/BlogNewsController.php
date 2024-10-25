<?php

namespace Modules\Blog\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Blog;

class BlogNewsController extends Controller
{
    private $category;

    public function __construct()
    {
        $this->category = 'NEWS';
    }

    public function index()
    {
        $data['title'] = 'CMS News';
        $data['list'] = Blog::getBlogList($this->category);

        return view('blog::news.list', $data);
    }

    public function add()
    {
        $data['title'] = 'CMS News';

        return view('blog::news.add', $data);
    }

    public function store(Request $request)
    {
        $slug = sluggify($request->title);
        $uuid = generateUuid();
        
        if (isset($request->image)) {
            $path = 'assets/images/blog/news/';
            $imageName = $slug.'-arrauf'.substr($uuid, 0, 3).'.'.$request->image->extension();  
            $request->image->move(public_path($path), $imageName);
            $saveData['image'] = $path.$imageName;
        }

        $saveData['category'] = $this->category;
        $saveData['title'] = $request->title;
        $saveData['content'] = $request->content;
        $saveData['tags'] = $request->tags;
        $saveData['is_active'] = $request->is_active;
        $saveData['slug'] = $slug;
        Blog::saveBlog($saveData);

        return back()->with('success', 'News berhasil ditambah!');
    }

    public function edit(Request $request, $uuid)
    {
        $data['title'] = 'CMS News';
        $data['data'] = Blog::getBlog($uuid);

        return view('blog::news.edit', $data);
    }

    public function update(Request $request, $uuid)
    {
        $slug = sluggify($request->title);

        if (isset($request->image)) {
            $path = 'assets/images/blog/news/';
            $imageName = $slug.'-arrauf'.substr($uuid, 0, 3).'.'.$request->image->extension();  
            $request->image->move(public_path($path), $imageName);
            $updateData['image'] = $path.$imageName;
        }

        $updateData['category'] = $this->category;
        $updateData['title'] = $request->title;
        $updateData['content'] = $request->content;
        $updateData['tags'] = $request->tags;
        $updateData['is_active'] = $request->is_active;
        $updateData['slug'] = $slug;
        Blog::updateBlog($uuid, $updateData);

        return back()->with('success', 'News berhasil diubah!');
    }

    public function delete(Request $request, $uuid)
    {
        Blog::deleteBlog($uuid);

        return back()->with('success', 'News berhasil dihapus!');
    }
}
