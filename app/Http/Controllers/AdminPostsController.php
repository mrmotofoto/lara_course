<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsEditRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::lists('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();

        if($file = $request->file('photo_id')) {
            //timestamp prepend to original file name-----------
            $name = time() . "_post_" . $file->getClientOriginalName();
            ///moves file to images folder with new name--------
            $file->move('images', $name);
            //Insert into photos table column file--------------
            $photo = Photo::create(['file' => $name]);
            //assign photo id to new user-----------------------
            $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);
        //LARAVEL FLASH SESSION---------------------------
        Session::flash('created_post', 'The Post Has Been Created');
        return redirect('/admin/posts');

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
        $post = Post::findOrFail($id);
        $categories = Category::lists('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsEditRequest $request, $id)
    {
        //
        $input = $request->all();

        if($file = $request->file('photo_id')) {
            //timestamp prepend to original file name-----------
            $name = time() . "_post_" . $file->getClientOriginalName();
            ///moves file to images folder with new name--------
            $file->move('images', $name);
            //Insert into photos table column file--------------
            $photo = Photo::create(['file' => $name]);
            //assign photo id to new user-----------------------
            $input['photo_id'] = $photo->id;
        }
        Auth::user()->posts()->whereId($id)->first()->update($input);
        //LARAVEL FLASH SESSION---------------------------
        Session::flash('updated_post', 'The Post Has Been Updated');
        return redirect('/admin/posts');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        //PHP UNLINK FUNCTION REMOVE PIC
        unlink(public_path() . $post->photo->file);
        $post->delete();
        //LARAVEL FLASH SESSION---------------------------
        Session::flash('deleted_post', 'The Post Has Been Deleted');
        return redirect('/admin/users');
    }

    public function post($id){
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post', compact('post', 'categories'));
    }
}
