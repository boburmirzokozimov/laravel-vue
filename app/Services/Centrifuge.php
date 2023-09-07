<?php

namespace App\Services;

use Alexusmai\Centrifugo\Centrifugo;
use Auth;

class Centrifuge
{
    public function __invoke(Centrifugo $centrifugo)
    {
        return $centrifugo->generateConnectionToken(Auth::id());
    }
}
