<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

interface UploadServiceInterface
{
    public function upload(UploadedFile $file): string;
}
