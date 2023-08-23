<?php

namespace App\Http\Controllers\Client\Balance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    public function download(Request $request)
    {
        $request->validate(['name' => 'string']);
        return Storage::download(path: $request->name);
    }
}
