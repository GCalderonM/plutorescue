<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request) {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('avatars/tmp/' . $folder, $fileName);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $fileName
            ]);

            return $folder;
        }

        return '';
    }
}
