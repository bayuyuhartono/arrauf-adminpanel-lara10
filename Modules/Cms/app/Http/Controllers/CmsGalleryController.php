<?php

namespace Modules\Cms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cms;

class CmsGalleryController extends Controller
{
    public function index(Request $request, $type)
    {
        $data['title'] = 'CMS '.$type;
        $data['type'] = $type;
        $data['list'] = Cms::getGalleryList($type);

        return view('cms::gallery.list', $data);
    }

    public function add(Request $request, $type)
    {
        $data['title'] = 'CMS '.$type;
        $data['type'] = $type;

        return view('cms::gallery.add', $data);
    }

    public function store(Request $request, $type)
    {
        $uuid = generateUuid();
        if (isset($request->image)) {
            $path = 'assets/images/cms/gallery/';
            $imageName = 'arrauf_'.$type.'_'.$uuid.'.'.$request->image->extension();  
            $request->image->move(public_path($path), $imageName);
            $saveData['image'] = $path.$imageName;
        }

        $saveData['type'] = strtoupper($type);
        $saveData['uuid'] = $uuid;
        $saveData['sequence'] = $request->sequence;
        $saveData['caption'] = $request->caption;
        Cms::saveGallery($saveData);

        return back()->with('success', $type.' berhasil ditambah!');
    }

    public function edit(Request $request, $type, $uuid)
    {
        $data['title'] = 'CMS '.$type;
        $data['type'] = $type;
        $data['data'] = Cms::getGallery($uuid);

        return view('cms::gallery.edit', $data);
    }

    public function update(Request $request, $type, $uuid)
    {
        if (isset($request->image)) {
            $path = 'assets/images/cms/gallery/';
            $imageName = 'arrauf_'.$type.'_'.$uuid.'.'.$request->image->extension();  
            $request->image->move(public_path($path), $imageName);
            $updateData['image'] = $path.$imageName;
        }

        $updateData['sequence'] = $request->sequence;
        $updateData['caption'] = $request->caption;
        Cms::updateGallery($uuid, $updateData);

        return back()->with('success', $type.' berhasil diubah!');
    }

    public function delete(Request $request, $type, $uuid)
    {
        Cms::deleteGallery($uuid);

        return back()->with('success', $type.' berhasil dihapus!');
    }
}
