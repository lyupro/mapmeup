<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\StoreGroup;
use App\User;
use App\UsersInGroup;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groups.models', ['models' => Group::all()]);
    }

    /**
     * @param User
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = [
            'users' => User::all()
        ];
        return view('groups.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroup $request)
    {
        $model = new Group();
        $model->fill($request->all());
        $model->save();

        //$user = User::find($model->owner_id);
        //$model->users()->attach($model->owner_id);

        $usersInGroups = new UsersInGroup();
        $usersInGroups->user_id = $model->owner_id;
        $usersInGroups->group_id = $model->id;
        $usersInGroups->user_type_id = 3; // 1 = User, 2 = Moderator, 3 = Admin, 4 = Developer
        $usersInGroups->save();

        return redirect('/groups')->with('success', 'Group has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Group::find($id);
        return view('groups.model', ['model' => $model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'users' => User::all(),
            'model' => Group::find($id)
        ];
        return view('groups.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGroup $request, $id)
    {
        $model = Group::find($id);
        $model->fill($request->all());
        $model->save();

        $findUserInGroup = UsersInGroup::find($model->owner_id);

        /*
        if( !empty($model->owner_id) && !empty($findUserInGroup->user_id)
            && $model->owner_id != $findUserInGroup->user_id){

            $usersInGroups = new UsersInGroup();
            $usersInGroups->user_id = $model->owner_id;
            $usersInGroups->group_id = $model->id;
            $usersInGroups->user_type_id = 3; // 1 = User, 2 = Moderator, 3 = Admin, 4 = Developer
            $usersInGroups->save();
        }
        */
        if($model->owner_id != $findUserInGroup->user_id){
            $usersInGroups = new UsersInGroup();
            $usersInGroups->user_id = $model->owner_id;
            $usersInGroups->group_id = $model->id;
            $usersInGroups->user_type_id = 3; // 1 = User, 2 = Moderator, 3 = Admin, 4 = Developer
            $usersInGroups->save();
        }

        //return redirect('/groups')->with('success', 'Group '. $model->name .' has been updated');
        dd($model, $findUserInGroup);
        return redirect('/groups')->with('success', 'Group '. $model->name .' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Group::find($id);
        $model->delete();
        //return redirect()->back();
        return redirect('/groups')->with('success', 'Group ' . $model->name . ' has been deleted Successfully');
    }
}
