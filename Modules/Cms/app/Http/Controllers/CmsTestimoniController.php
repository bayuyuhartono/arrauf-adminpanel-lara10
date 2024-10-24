<?php

namespace Modules\Cms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cms;

class CmsTestimoniController extends Controller
{
    public function index()
    {
        $data['title'] = 'CMS Testimoni';
        $data['list'] = Cms::getTestimoniList();

        return view('cms::testimoni.list', $data);
    }

    public function add()
    {
        $data['title'] = 'CMS Testimoni';

        return view('cms::testimoni.add', $data);
    }

    public function store(Request $request)
    {
        $saveData['name'] = $request->name;
        $saveData['description'] = $request->description;
        $saveData['sequence'] = $request->sequence;
        Cms::saveTestimoni($saveData);

        return back()->with('success', 'Testimoni berhasil ditambah!');
    }

    public function edit(Request $request, $id)
    {
        $data['title'] = 'CMS Testimoni';
        $data['data'] = Cms::getTestimoni($id);

        return view('cms::testimoni.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $updateData['name'] = $request->name;
        $updateData['description'] = $request->description;
        $updateData['sequence'] = $request->sequence;
        Cms::updateTestimoni($id, $updateData);

        return back()->with('success', 'Testimoni berhasil diubah!');
    }

    public function delete(Request $request, $id)
    {
        Cms::deleteTestimoni($id);

        return back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
