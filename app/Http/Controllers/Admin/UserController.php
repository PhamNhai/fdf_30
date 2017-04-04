<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use App\Helpers\CheckFile;
use File;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('view.user_per_page'));

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $input = User::createUser($request);
        if ($input && $input != null) {
            return redirect()->route('user.index')
                ->with('success', trans('user.add-user-successfully'));
        } else {
            return redirect()->route('user.index')
                ->with('errors', trans('user.add-user-fail'));
        }
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
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::updateUser($id, $request);
        if ($user && $user != null) {
            return redirect()->route('user.index')
                ->with('success', trans('user.update-user-successfully'));
        } else {
            return redirect()->route('user.index')
                ->with('errors', trans('update.add-user-fail'));
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
        $response = User::deleteUser($id);

        if ($response) {
            return redirect()->route('user.index')
                ->with('success', trans('user.delete-user-successfully'));
        } else {
            return redirect()->route('user.index')
                ->with('errors', trans('delete.add-user-fail'));
        }
    }
}
