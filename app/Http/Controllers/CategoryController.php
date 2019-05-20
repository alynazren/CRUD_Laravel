<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->title = $request->get('title');
        $category->user()->associate($request->user());

        $category->save();

        return $this-> index();
    }

    public function index()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    public function edit(Request $request){
        $id = $request-> input('id');
        $ed = Category::find($id);
        return view('category.update', compact('ed'));
    }

    public function update(Request $request){
        $id = $request-> input('id');
        $title = $request-> input('title');

        $category = new Category;
        $category->where('id', $id) -> update(['title' => $title]);

        return $this-> index();
    }

    public function delete(Request $request){
        $id = $request-> input('id');
        $del = Category::find($id);
        $del->delete();
        return $this-> index();
    }
}