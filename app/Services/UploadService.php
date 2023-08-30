<?php

namespace App\Services;

use App\Models\Client\CreditCard\CreditCardRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadService implements UploadServiceInterface
{
    public function upload(?UploadedFile $file): string
    {
        return Storage::disk('public')->put('cards', $file);
    }

    public function uploadByPath(?UploadedFile $file, string $path): string
    {
        return Storage::disk('public')->put($path, $file);
    }

    public function uploadInvoice(?UploadedFile $file): string
    {
        return Storage::disk('public')->put('invoices', $file);
    }

    public function uploadMessage(?UploadedFile $file): string
    {
        return Storage::disk('public')->put('messages', $file);
    }

    public function uploadFlag(?UploadedFile $file): string
    {
        return Storage::disk('public')->put('flag', $file);
    }

    public function removeFlag(?string $file): void
    {
        Storage::delete($file);
    }

    public function removeOld(CreditCardRequest $cardRequest, array $credentials): void
    {
        if ($credentials['scan_passport'] instanceof UploadedFile) {
            Storage::delete($cardRequest->scan_passport);
        }
        if ($credentials['selfie_passport'] instanceof UploadedFile) {
            Storage::delete($cardRequest->selfie_passport);
        }
        $cardRequest->save();
    }
}
