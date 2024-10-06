<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FileDownloadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Validate the request to ensure a file path is provided
        $request->validate([
            'file_path' => 'required|string', // Adjust the validation as necessary
        ]);

        // Get the file path from the request
        $filePath = $request->input('file_path');

        // Check if the file exists
        if (!Storage::exists($filePath)) {
            return response()->json(['error' => 'File not found'], Response::HTTP_NOT_FOUND);
        }

        // Get the file's original name for download
        $originalFileName = basename($filePath);

        // Return the file as a download response
        return Storage::download($filePath, $originalFileName);
    }
}
