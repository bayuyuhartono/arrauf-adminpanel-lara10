<?php

namespace Modules\Cms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Cms;

class CmsQuoteController extends Controller
{
    public function form()
    {
        $data['title'] = 'CMS Quote';
        $data['data'] = Cms::getQuote();

        return view('cms::quote.form', $data);
    }

    public function updateAction(Request $request)
    {
        $updateData['id'] = $request->id;
        $updateData['quote'] = $request->quote;
        $updateData['quote_sub'] = $request->quote_sub;
        Cms::updateQuote($updateData);

        return back()->with('success', 'Quote berhasil diubah!');
    }
}
