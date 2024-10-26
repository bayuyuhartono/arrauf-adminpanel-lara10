<?php

namespace Modules\Cms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cms;

class CmsBenefitController extends Controller
{
    public function index()
    {
        $data['title'] = 'CMS Benefit';
        $data['list'] = Cms::getBenefitList();

        return view('cms::benefit.list', $data);
    }

    public function add()
    {
        $data['title'] = 'CMS Benefit';

        return view('cms::benefit.add', $data);
    }

    public function store(Request $request)
    {
        $saveData['title'] = $request->title;
        $saveData['point'] = $request->point;
        $saveData['sequence'] = $request->sequence;
        Cms::saveBenefit($saveData);

        return back()->with('success', 'Benefit berhasil ditambah!');
    }

    public function edit(Request $request, $id)
    {
        $data['title'] = 'CMS Benefit';
        $data['data'] = Cms::getBenefit($id);

        return view('cms::benefit.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $updateData['title'] = $request->title;
        $updateData['point'] = $request->point;
        $updateData['sequence'] = $request->sequence;
        Cms::updateBenefit($id, $updateData);

        return back()->with('success', 'Benefit berhasil diubah!');
    }

    public function delete(Request $request, $id)
    {
        Cms::deleteBenefit($id);

        return back()->with('success', 'Benefit berhasil dihapus!');
    }
}
