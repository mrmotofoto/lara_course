<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminCategoriesController extends Controller
{

    public function index()
    {
        //
        return view('admin.categories.index');
    }


    public function create()
    {
        //
        return view('admin.categories.create');

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        return view('admin.categories.edit');
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
