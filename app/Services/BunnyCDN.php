<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Twilio\Exceptions\RestException;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemAdapter;

use PlatformCommunity\Flysystem\BunnyCDN\BunnyCDNAdapter;
use PlatformCommunity\Flysystem\BunnyCDN\BunnyCDNClient;


class BunnyCDN
{
    function updateFile($file, $fileName, $folderPath = '')
    {
        try {

            $client = new BunnyCDNClient(env('BUNNYCDN_STORAGE_ZONE'), env('BUNNYCDN_API_KEY'),  env('BUNNYCDN_REGION'));
            $filePath = $folderPath . $fileName;
            $status = Storage::disk('bunnycdn')->put($filePath, file_get_contents($file));
            return [
                'url' => env('BUNNYCDN_URL') . '/' . $filePath,
                
            ];
        } catch (\Throwable $th) {
            Log::info($th);
        }

    }

}