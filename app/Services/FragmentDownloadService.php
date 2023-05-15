<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;

class FragmentDownloadService
{
    private string $fragmentsStoragePath;

    public function __construct()
    {
        $this->fragmentsStoragePath = env('FRAGMENTS_STORAGE');
    }

    public function downloadFragmentFile(string $fileName): Response
    {
        $filePath = $this->fragmentsStoragePath . $fileName;

        return response()->download($filePath);
    }
}
