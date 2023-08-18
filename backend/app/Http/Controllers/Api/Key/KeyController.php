<?php

namespace App\Http\Controllers\Api\Key;

use App\Http\Controllers\Controller;
use App\Http\Resources\Key\KeyResource;
use App\Models\Keys\Key;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function index()
    {
        return new KeyResource(Key::all()->last());
    }
}
