<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suggest;

class SuggestController extends Controller
{
    public function index() {
        return view('frontend.suggest');
    }

    public function postSuggest(Request $request)
    {
        $data['content'] = $request->suggest;
        $data['user_id'] = $request->id_user;
        $data['status'] = config('app.unable');
        $suggest = Suggest::create($data);

        if ($suggest) {
            return redirect()->route('frontend.product')->with([
            'flash_level' => 'success',
            'flash_message' => trans('frontend.suggest-success'),
            ]);
        }

        return redirect()->route('frontend.cart')->with([
            'flash_level' => 'warning',
            'flash_message' => trans('frontend.suggest-fail'),
        ]);
    }
}
