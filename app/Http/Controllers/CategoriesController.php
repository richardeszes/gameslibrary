<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\OnlyNameFormRequest;

class CategoriesController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.list', ['categories' => Category::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OnlyNameFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OnlyNameFormRequest $request)
    {
        Category::create(request(['name']));

        return back()->with('message', 'Category created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = $category->with('games')->find($category->id);

        return view('categories.view', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OnlyNameFormRequest  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(OnlyNameFormRequest $request, Category $category)
    {
        $category->fill(request(['name']));
        $category->save();

        return back()->with('message', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = $category->with('games')->find($category->id);
        if (count($category->games) > 0) {
            return back()->withErrors(['This category includes games!']);
        }
        $category->delete();

        return back()->with('message', 'Category removed!');
    }
}
