<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.models', ['models'=>User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $model = new User;
        $model->fill($request->all());
        $model->save();
        return redirect('/users')->with('status', 'User has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = User::find($id);
        return view('users.model', ['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::find($id);
        return view('users.edit', ['model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, $id)
    {
        $model = User::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect('/users')->with('status', 'User has been updated');
    }

    /**
     * @param User $id
     */
    public function destroy($id)
    {
        $model = User::find($id);
        $model->delete();
        //return redirect()->back();
        return redirect('/users')->with('status', 'User has been deleted Successfully');
    }
}
