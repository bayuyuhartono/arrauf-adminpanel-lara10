<?php

namespace Modules\Cms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cms;

class CmsPpdbController extends Controller
{
    public function form()
    {
        $data['title'] = 'CMS PPDB';
        $data['data'] = Cms::getPpdb();

        return view('cms::ppdb.form', $data);
    }

    public function updateAction(Request $request)
    {
        $updateData['id'] = $request->id;
        $updateData['text'] = $request->text;
        $updateData['link'] = $request->link;
        $updateData['is_active'] = $request->is_active;
        Cms::updatePpdb($updateData);

        return back()->with('success', 'PPDB berhasil diubah!');
    }
}
