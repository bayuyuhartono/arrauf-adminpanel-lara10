<?php

namespace Modules\Cms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cms;

class CmsMottoController extends Controller
{
    public function index()
    {
        $data['title'] = 'CMS Motto';
        $data['list'] = Cms::getMottoList();

        return view('cms::motto.list', $data);
    }

    public function add()
    {
        $data['title'] = 'CMS Motto';

        return view('cms::motto.add', $data);
    }

    public function store(Request $request)
    {
        $saveData['title'] = $request->title;
        $saveData['description'] = $request->description;
        $saveData['sequence'] = $request->sequence;
        Cms::saveMotto($saveData);

        return back()->with('success', 'Motto berhasil ditambah!');
    }

    public function edit(Request $request, $id)
    {
        $data['title'] = 'CMS Motto';
        $data['data'] = Cms::getMotto($id);

        return view('cms::motto.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $updateData['title'] = $request->title;
        $updateData['description'] = $request->description;
        $updateData['sequence'] = $request->sequence;
        Cms::updateMotto($id, $updateData);

        return back()->with('success', 'Motto berhasil diubah!');
    }

    public function delete(Request $request, $id)
    {
        Cms::deleteMotto($id);

        return back()->with('success', 'Motto berhasil dihapus!');
    }
}
