<?php

namespace App\Http\Controllers;


use App\Http\Requests\UsersRequest;
use App\Photo;
use App\User;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;


class AdminUsersController extends Controller
{

    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        //

        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }


    public function store(UsersRequest $request)
    {
        $input = $request->all();
        //Check To See if Photo Exists and timestamp/move if it does
        //
        if($file = $request->file('photo_id')) {
            $name = time() . "_" . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect('/admin/users');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        return view('admin.users.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
