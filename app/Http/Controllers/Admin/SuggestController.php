<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suggest;

class SuggestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggests = Suggest::orderBy('created_at', 'desc')->paginate(config('view.suggest_per_page'));

        return view('admin.suggest.index', compact('suggests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $suggest = Suggest::updateSuggest($id);
        if ($suggest && $suggest != null) {
            return redirect()->back()
                ->with('success', trans('suggest.update-suggest-successfully'));
        } else {
            return redirect()->back()
                ->with('errors', trans('suggest.update-suggest-fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Suggest::findOrFail($id)->delete();

            return redirect()->route('suggest.index')
                ->with('success', trans('suggest.delete-suggest-successfully'));
        } catch (Exception $e) {
            return redirect()->route('suggest.index')
                ->with('errors', trans('suggest.delete-suggest-fail'));
        }
    }
}
