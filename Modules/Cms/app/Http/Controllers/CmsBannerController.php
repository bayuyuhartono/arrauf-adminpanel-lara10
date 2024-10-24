<?php

namespace Modules\Cms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cms;

class CmsBannerController extends Controller
{
    public function index()
    {
        $data['title'] = 'CMS Banner';
        $data['list'] = Cms::getGalleryList('banner');

        return view('cms::gallery.list', $data);
    }

    public function add()
    {
        $data['title'] = 'CMS Banner';

        return view('cms::gallery.add', $data);
    }

    public function store(Request $request)
    {
        $uuid = generateUuid();
        if (isset($request->image)) {
            $path = 'assets/images/cms/gallery/';
            $imageName = 'arrauf_banner_'.$uuid.'.'.$request->image->extension();  
            $request->image->move(public_path($path), $imageName);
            $saveData['image'] = $path.$imageName;
        }

        $saveData['type'] = 'BANNER';
        $saveData['uuid'] = $uuid;
        $saveData['sequence'] = $request->sequence;
        $saveData['caption'] = $request->caption;
        Cms::saveGallery($saveData);

        return back()->with('success', 'Banner berhasil ditambah!');
    }

    public function edit(Request $request, $uuid)
    {
        $data['title'] = 'CMS Banner';
        $data['data'] = Cms::getGallery($uuid);

        return view('cms::gallery.edit', $data);
    }

    public function update(Request $request, $uuid)
    {
        if (isset($request->image)) {
            $path = 'assets/images/cms/gallery/';
            $imageName = 'arrauf_banner_'.$uuid.'.'.$request->image->extension();  
            $request->image->move(public_path($path), $imageName);
            $updateData['image'] = $path.$imageName;
        }

        $updateData['sequence'] = $request->sequence;
        $updateData['caption'] = $request->caption;
        Cms::updateGallery($uuid, $updateData);

        return back()->with('success', 'Banner berhasil diubah!');
    }

    public function delete(Request $request, $uuid)
    {
        Cms::deleteGallery($uuid);

        return back()->with('success', 'Banner berhasil dihapus!');
    }
}
