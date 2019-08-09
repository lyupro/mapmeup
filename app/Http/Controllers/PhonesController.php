<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhone;
use App\Phone;
use App\User;
use Illuminate\Support\Facades\DB;

class PhonesController extends Controller
{

    // TODO Make 'PhoneTypes' table with currently phones
    // TODO and ADD method which will be add new Companies & Phone Models there
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'models' => Phone::all()
        ];
        return view('phones.models', $data);
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
        return view('phones.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhone $request)
    {
        $model = new Phone();

        $check = DB::table('phones')
        ->where('user_id', $request->user_id)
        ->where('primary', true)
        ->get();

        if($check->count() == true){
            return redirect('/phones')->with('status', 'This phone ' . $request->number . ' can\'t be set as primary phone');
        }

        $model->fill($request->all());
        $model->save();
        return redirect('/phones')->with('status', 'Phone has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Phone::find($id);
        return view('phones.model', ['model' => $model]);
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
          'model' => Phone::find($id)
        ];

        return view('phones.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePhone $request, $id)
    {
        $model = Phone::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect('/phones')->with('status', 'Phone has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Phone::find($id);
        $model->delete();
        return redirect('/phones')->with('status', 'Phone ' . $model->number . ' has been deleted successfully');
    }
}
