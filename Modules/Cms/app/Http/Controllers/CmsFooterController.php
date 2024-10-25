<?php

namespace Modules\Cms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cms;

class CmsFooterController extends Controller
{
    public function form()
    {
        $data['title'] = 'CMS Footer';
        $data['data'] = Cms::getFooter();

        return view('cms::footer.form', $data);
    }

    public function updateAction(Request $request)
    {
        foreach ($request->id as $key => $value) {
            $updateData['id'] = $value;
            $updateData['text'] = $request->text[$key];
            $updateData['link'] = $request->link[$key];
            $updateData['sequence'] = $request->sequence[$key];
            $updateData['is_active'] = $request->is_active[$key];
            Cms::updateFooter($updateData);
        }

        return back()->with('success', 'Footer berhasil diubah!');
    }
}
