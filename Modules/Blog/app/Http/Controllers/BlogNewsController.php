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
        $saveData['title'] = $request->title;
        $saveData['description'] = $request->description;
        $saveData['sequence'] = $request->sequence;
        Blog::saveBlog($saveData);

        return back()->with('success', 'News berhasil ditambah!');
    }

    public function edit(Request $request, $id)
    {
        $data['title'] = 'CMS News';
        $data['data'] = Blog::getBlog($id);

        return view('blog::news.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $updateData['title'] = $request->title;
        $updateData['description'] = $request->description;
        $updateData['sequence'] = $request->sequence;
        Blog::updateBlog($id, $updateData);

        return back()->with('success', 'News berhasil diubah!');
    }

    public function delete(Request $request, $id)
    {
        Blog::deleteBlog($id);

        return back()->with('success', 'News berhasil dihapus!');
    }
}
