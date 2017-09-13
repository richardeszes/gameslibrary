<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\OnlyNameFormRequest as OnlyNameFormRequest;

class PublishersController extends Controller
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
        return view('publisher.list', ['publishers' => Publisher::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publisher.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OnlyNameFormRequest $request)
    {
        Publisher::create(request(['name']));

        return back()->with('message', 'Publisher created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        $publisher = $publisher->with('games')->find($publisher->id);

        return view('publisher.view', $publisher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        return view('publisher.edit', $publisher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OnlyNameFormRequest  $request
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(OnlyNameFormRequest $request, Publisher $publisher)
    {
        $publisher->fill(request(['name']));
        $publisher->save();

        return back()->with('message', 'Publisher updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher = $publisher->with('games')->find($publisher->id);
        if (count($publisher->games) > 0) {
            return back()->withErrors(['This publisher includes games!']);
        }
        $publisher->delete();

        return back()->with('message', 'Publisher removed!');
    }
}
