<?php

namespace Modules\Cms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cms;

class CmsWallpaperController extends Controller
{
    public function form()
    {
        $data['title'] = 'CMS Wallpaper';
        $data['data'] = Cms::getWallpaper();

        return view('cms::wallpaper.form', $data);
    }

    public function updateAction(Request $request)
    {
        if (isset($request->image)) {
            $path = 'assets/images/cms/wallpaper/';
            $imageName = 'arrauf_wall'.'.'.$request->image->extension();  
            $request->image->move(public_path($path), $imageName);
            $updateData['wallpaper_image'] = $path.$imageName;
        }

        $updateData['id'] = $request->id;
        $updateData['wallpaper_text'] = $request->content;
        Cms::updateWallpaper($updateData);

        return back()->with('success', 'Wallpaper berhasil diubah!');
    }
}
