<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\OnlyNameFormRequest as OnlyNameFormRequest;

class TagsController extends Controller
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
        return view('tags.list', ['tags' => Tag::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OnlyNameFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OnlyNameFormRequest $request)
    {
        Tag::create(request(['name']));

        return back()->with('message', 'Tag created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $tag = $tag->with('games')->find($tag->id);

        return view('tags.view', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OnlyNameFormRequest  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(OnlyNameFormRequest $request, Tag $tag)
    {
        $tag->fill(request(['name']));
        $tag->save();

        return back()->with('message', 'Tag updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back()->with('message', 'Tag removed!');
    }
}
