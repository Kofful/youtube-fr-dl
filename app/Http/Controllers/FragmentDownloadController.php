<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadFragmentFileRequest;
use App\Http\Requests\GetFragmentRequest;
use App\Services\FragmentCuttingService;
use App\Services\FragmentDownloadService;
use Symfony\Component\HttpFoundation\Response;

class FragmentDownloadController extends Controller
{
    public function getFragment(GetFragmentRequest $request, FragmentCuttingService $fragmentCuttingService): Response
    {
        $fragmentLinks = $fragmentCuttingService->getFragmentLinks($request->get('url'));

        $fragmentTime = $request->only(['start', 'end']);

        $fragmentFileName = $fragmentCuttingService->cutFragmentByLinks($fragmentTime, $fragmentLinks);

        return response()->json([
            'fileName' => $fragmentFileName,
        ]);
    }

    public function saveFragmentFile(DownloadFragmentFileRequest $request, FragmentDownloadService $fragmentDownloadService): Response
    {
        return $fragmentDownloadService->downloadFragmentFile($request->get('fileName'));
    }
}
