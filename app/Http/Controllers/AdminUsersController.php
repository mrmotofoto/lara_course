<?php

namespace App\Http\Controllers;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\Photo;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;


class AdminUsersController extends Controller
{

    //--------------------------READ-------------------------------------------
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    //--------------------------GET CREATE FORM--------------------------------
    public function create() {
        //Role::lists Passes roles to the select box in create view

        $roles = Role::lists('name', 'id')->all();
        //Returns generic form view with roles object
        return view('admin.users.create', compact('roles'));
    }

    //--------------------------SUBMIT CREATE FORM-----------------------------
    public function store(UsersRequest $request) {
        //Grabbing user submitted form--------------------------
        if(trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input->password = bcrypt($request->password);
        }
        //Check To See if Photo Uploaded------------------------
        if($file = $request->file('photo_id')) {
            //timestamp prepend to original file name-----------
            $name = time() . "_" . $file->getClientOriginalName();
            ///moves file to images folder with new name--------
            $file->move('images', $name);
            //Insert into photos table column file--------------
            $photo = Photo::create(['file' => $name]);
            //assign photo id to new user-----------------------
            $input['photo_id'] = $photo->id;
        }
        //Encrypt user password---------------------------------
        //$input['password'] = bcrypt($request->password);
        //Create New user---------------------------------------
        User::create($input);
        return redirect('/admin/users');
    }


    public function show($id) {

    }

    //--------------------------GET UPDATE FORM--------------------------------
    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    //--------------------------SUBMIT UPDATE FORM-----------------------------
    public function update(UsersEditRequest $request, $id) {

        //Finds User From URL----------------------------------
        $user = User::findOrFail($id);
        //Grabbing user submitted form--------------------------
        if(trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input->password = bcrypt($request->password);
        }
        //Check To See if Photo Uploaded------------------------
        if($file = $request->file('photo_id')) {
            //timestamp prepend to original file name-----------
            $name = time() . '_' . $file->getClientOriginalName();
            //timestamp prepend to original file name-----------
            $file->move('images', $name);
            //Insert into photos table column file--------------
            $photo = Photo::create(['file' => $name]);
            //assign photo_id created after insert to new user  photo_id--------
            $input['photo_id'] = $photo->id;
        }
        //Update user---------------------------------------
        $user->update($input);
        return redirect('/admin/users');

    }


    public function destroy($id)
    {
        //
    }
}
