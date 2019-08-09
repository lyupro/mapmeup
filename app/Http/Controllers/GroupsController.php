<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\StoreGroup;
use App\Http\Requests\UpdateGroup;
use App\User;
use App\UsersInGroup;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'models' => Group::all()
        ];
        return view('groups.models', $data);
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

        return redirect('/groups')->with('status', 'Group has been added');
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

    // TODO Change UserType when user change owner_id
    // TODO Private Function
    public function update(UpdateGroup $request, $id)
    {
        if( empty($request->owner_id)){
            $request->except(['owner_id']);
        }

        $model = Group::find($id);
        $model->fill($request->all());
        $model->save();

        $usersInGroups = new UsersInGroup();
        $usersInGroups->user_id = $model->owner_id;
        $usersInGroups->group_id = $model->id;
        $usersInGroups->user_type_id = 3; // 1 = User, 2 = Moderator, 3 = Admin, 4 = Developer
        $usersInGroups->save();

        return redirect('/groups')->with('status', 'Group '. $model->name .' has been updated');
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
        return redirect('/groups')->with('status', 'Group ' . $model->name . ' has been deleted successfully');
    }
}
