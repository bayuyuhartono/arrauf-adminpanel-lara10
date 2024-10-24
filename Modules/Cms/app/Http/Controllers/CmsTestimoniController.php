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
        $data['list'] = Cms::getTestimoni();

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
}
