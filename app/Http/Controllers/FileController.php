<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the file input
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf,doc,docx|max:2048', // Adjust rules as needed
        ]);

        // Handle the file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            return back()->with('success', 'File uploaded successfully!')->with('filePath', $filePath);
        }

        return back()->withErrors(['file' => 'File upload failed.']);
    }
}