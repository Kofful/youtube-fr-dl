<?php

namespace App\Services;

use App\Exceptions\Fragment\GetFragmentLinksException;
use App\Exceptions\Fragment\SaveFragmentException;

class FragmentCuttingService
{
    private string $fragmentsStoragePath;

    public function __construct()
    {
        $this->fragmentsStoragePath = env('FRAGMENTS_STORAGE');
    }

    /**
     * @param string $videoUrl
     * @return array links for video and audio
     * @throws GetFragmentLinksException
     */
    public function getFragmentLinks(string $videoUrl): array
    {
        $getLinksCmd = "yt-dlp -g $videoUrl";

        exec($getLinksCmd, $output, $resultCode);

        if ($resultCode !== 0) {
            throw new GetFragmentLinksException($output);
        }

        return $output;
    }


    /**
     * @param array $fragmentTime
     * @param array $fragmentLinks
     * @return string fragment file name
     */
    public function cutFragmentByLinks(array $fragmentTime, array $fragmentLinks): string
    {
        $videoUrl = $fragmentLinks[0];
        $audioUrl = $fragmentLinks[1];

        $fileName = time() . '.mp4';
        $filePath =  $this->fragmentsStoragePath . $fileName;
        $timingQuery = '-ss ' . $fragmentTime['start'] . ' -to ' . $fragmentTime['end'];

        $downloadCmd = "ffmpeg $timingQuery -i \"$videoUrl\" $timingQuery -i \"$audioUrl\" -map 0:v -map 1:a -c copy $filePath 2>&1";

        exec($downloadCmd, $output, $resultCode);

        if ($resultCode !== 0) {
            throw new SaveFragmentException($output);
        }

        return $fileName;
    }
}
