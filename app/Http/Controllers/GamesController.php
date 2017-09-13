<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUpdateGamesFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Game\GameInterface;

class GamesController extends Controller
{
    /**
     * @var \App\Repositories\Game\GameInterface
     */
    protected $gamerepo;

    /**
     * @param  \App\Repositories\Game\GameInterface  $game
     */
    public function __construct(GameInterface $game) {
        $this->middleware('auth', ['except' => ['index', 'show', 'export']]);
        $this->gamerepo = $game;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('games.list', [
            'games' => $this->gamerepo->getAll(10),
            "consoles" => \App\Models\Console::get(),
            "categories" => \App\Models\Category::get(),
            "publishers" => \App\Models\Publisher::get(),
            "tags" => \App\Models\Tag::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.add', [
            "consoles" => \App\Models\Console::get(),
            "categories" => \App\Models\Category::get(),
            "publishers" => \App\Models\Publisher::get(),
            "tags" => \App\Models\Tag::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateUpdateGamesFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateGamesFormRequest $request)
    {
        $coverimage = null;
        if ($request->hasFile('coverimage') && $request->file('coverimage')->isValid()) {
            $coverimage = $request->coverimage->store('images', 'coverimages');
            /**
             * @TODO resize image before save it
             */
        }

        $game = Game::create(array_merge(request([
            'title',
            'console_id',
            'published',
            'publisher_id',
            'url',
            'metagamescore',
            'category_id'
        ]), [
            'coverimage' => $coverimage,
        ]));

        $tags = request('tags');
        if (is_array($tags)) {
            foreach ($tags as $tag_name) {
                if (is_numeric($tag_name)) {
                    $tag = \App\Models\Tag::find($tag_name);
                } else {
                    $tag = \App\Models\Tag::create(['name' => $tag_name]);
                }
                $game->tags()->attach($tag);
            }
        }

        return back()->with('message', 'Game created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.view', $this->gamerepo->find($game->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('games.edit', [
            "game" => $game,
            "consoles" => \App\Models\Console::get(),
            "categories" => \App\Models\Category::get(),
            "publishers" => \App\Models\Publisher::get(),
            "tags" => \App\Models\Tag::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CreateUpdateGamesFormRequest  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateGamesFormRequest $request, Game $game)
    {
        $coverimage = null;
        if ($request->hasFile('coverimage') && $request->file('coverimage')->isValid()) {
            $coverimage = $request->coverimage->store('images', 'coverimages');
        }

        foreach ($game->tags as $tag) {
            $game->tags()->detach($tag);
        }
        $tags = request('tags');
        if (is_array($tags)) {
            foreach ($tags as $tag_name) {
                if (is_numeric($tag_name)) {
                    $tag = \App\Models\Tag::find($tag_name);
                } else {
                    $tag = \App\Models\Tag::create(['name' => $tag_name]);
                }
                $game->tags()->attach($tag);
            }
        }

        $game->fill(array_merge(request([
            'title',
            'console_id',
            'published',
            'publisher_id',
            'url',
            'metagamescore',
            'category_id'
        ]), [
            'coverimage' => $coverimage,
        ]));
        $game->save();

        return back()->with('message', 'Game updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        foreach ($game->tags as $tag) {
            $game->tags()->detach($tag);
        }
        $game->delete();

        return back()->with('message', 'Game removed!');
    }

    /**
     * Exporting the game list
     */
    public function export()
    {
        $rows = [];
        foreach ($this->gamerepo->getAll() as $game) {
            $row = [
                $game->id,
                $game->title,
                $game->console['name'],
                $game->published,
                $game->publisher['name'],
                $game->category['name'],
                $game->url,
                $game->metagamescore,
                $game->created_at,
                $game->updated_at,
            ];
            $rows[] = implode($row, ",");
        }
        $contents = implode($rows, "\r\n");
        $file = 'export_'.time().'.csv';
        Storage::disk('downloads')->put($file, $contents);
        $file = Storage::disk('downloads')->getDriver()->getAdapter()->getPathPrefix().$file;

        return response()->download($file, 'export.csv', ['Content-Type: text/cvs']);
    }
}
