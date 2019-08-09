<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocation;
use App\Location;
use App\User;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
          'models' => Location::all()
        ];
        return view('locations.models', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'users' => User::all()
        ];
        return view('locations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocation $request)
    {
        $model = new Location();
        $model->fill($request->all());
        $model->save();
        return redirect('/locations')->with('status', 'Location has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Location::find($id);
        return view('locations.model', ['model' => $model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'users' => User::all(),
            'model' => Location::find($id)
        ];
        return view('locations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLocation $request, $id)
    {
        $model = Location::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect('/locations')->with('status', 'Location has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Location::find($id);
        $model->delete();
        //return redirect()->back();
        return redirect('/locations')->with('status', 'Location ' . $model->name . ' has been deleted successfully');
    }
}
