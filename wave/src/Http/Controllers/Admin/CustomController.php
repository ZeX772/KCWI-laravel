<?php

namespace Wave\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class CustomController extends Controller
{
    public function settingsReflection(Request $request)
    {
        session(['school' => $request->all()]);

        return response()->json([
            'success' => true,
            'message' => 'Session school updated',
        ]);
    }

    public function refreshToken()
    {
        Log::info('old:: ' . session('api_token_expires_at'));
        $refreshTokenResponse = Http::withToken(session('api_token'))->post(config('services.api_url').'/refresh-token');

        session(['api_token' => $refreshTokenResponse['access_token']]);

        session(['api_token_expires_at' => time() + 3600]); // 3600 seconds = 1 hour

        Log::info('new:: ' . session('api_token_expires_at'));
    }

    public function downloadFile(Request $request)
    {
        // Set the target URL
        $targetUrl = $request->url;

        // Set up cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $targetUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        // Execute the cURL request
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            // Handle the error appropriately
            echo 'Error: ' . $error;
            exit;
        }

        // Get the content type
        $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

        // Set the appropriate content type header
        header('Content-Type: ' . $contentType);

        // Output the response
        echo $response;

        // Close cURL
        curl_close($ch);
    }

    public function logout()
    {
        session()->forget([
            'api_token', 
            'api_token_expires_at',
            'user',
            'school'
        ]);
        Log::info("Logged out");
        
        return redirect()->route('wave.user.admin-panel.index');
    }
}