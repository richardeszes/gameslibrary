<?php

namespace App\Repositories\Game;

use App\Repositories\Game\GameInterface as GameInterface;
use App\Models\Game;

class GameRepository implements GameInterface
{
    public $game;

    function __construct(Game $game) {
	    $this->game = $game;
    }

    public function getAll($paginate = null)
    {
        $games = $this->game->with('console', 'publisher', 'tags', 'category');

        if (request('search_title')) {
            $games->where('title', 'like', '%'.request('search_title').'%');
        }
        if (request('search_published')) {
            $games->where('published_at', 'like', '%'.request('search_published').'%');
        }
        if (request('search_publisher')) {
            $games->where('publisher_id', '=', request('search_publisher'));
        }
        if (request('search_category')) {
            $games->where('category_id', '=', request('search_category'));
        }
        if (request('search_console')) {
            $games->where('console_id', '=', request('search_console'));
        }
        if (request('search_tag')) {
            $games->whereHas('tags', function($q){
                $q->where('id', '=', request('search_tag'));
            });
        }
        if (request('order_by')) {
            $ordering = explode('.', request('order_by'));
            $field = $ordering[0];
            $order = $ordering[1];
            $games->orderBy($field, $order);
        }

        if ($paginate) {
            return $games->with('console', 'publisher', 'tags', 'category')->paginate($paginate);
        } else {
            return $games->with('console', 'publisher', 'tags', 'category')->get();
        }
    }

    public function find($id)
    {
        return $this->game->with('console', 'publisher', 'tags', 'category')->find($id);
    }
}
