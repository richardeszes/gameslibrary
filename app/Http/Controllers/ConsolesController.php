<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;
use App\Http\Requests\OnlyNameFormRequest;

class ConsolesController extends Controller
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
        return view('consoles.list', ['consoles' => Console::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consoles.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OnlyNameFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OnlyNameFormRequest $request)
    {
        Console::create(request(['name']));

        return back()->with('message', 'Console type created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function show(Console $console)
    {
        $console = $console->with('games')->find($console->id);

        return view('consoles.view', $console);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function edit(Console $console)
    {
        return view('consoles.edit', $console);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OnlyNameFormRequest  $request
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function update(OnlyNameFormRequest $request, Console $console)
    {
        $console->fill(request(['name']));
        $console->save();

        return back()->with('message', 'Console type updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Console  $console
     * @return \Illuminate\Http\Response
     */
    public function destroy(Console $console)
    {
        $console = $console->with('games')->find($console->id);
        if (count($console->games) > 0) {
            return back()->withErrors(['This console type includes games!']);
        }
        $console->delete();

        return back()->with('message', 'Console type removed!');
    }
}
