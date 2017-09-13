<?php

namespace App\Repositories\Game;

interface GameInterface {

    public function getAll();

    public function find($id);
}
