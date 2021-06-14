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
        } else {
            if ($request->hasFile('image1')) {
                $file = $request->file('image1');
                $fileName = $file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;
                $file->storeAs('announces/tmp/' . $folder, $fileName);

                TemporaryFile::create([
                    'folder' => $folder,
                    'filename' => $fileName
                ]);

                return $folder;
            }

            if ($request->hasFile('image2')) {
                $file = $request->file('image2');
                $fileName = $file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;
                $file->storeAs('announces/tmp/' . $folder, $fileName);

                TemporaryFile::create([
                    'folder' => $folder,
                    'filename' => $fileName
                ]);

                return $folder;
            }

            if ($request->hasFile('image3')) {
                $file = $request->file('image3');
                $fileName = $file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;
                $file->storeAs('announces/tmp/' . $folder, $fileName);

                TemporaryFile::create([
                    'folder' => $folder,
                    'filename' => $fileName
                ]);

                return $folder;
            }

            if ($request->hasFile('image4')) {
                $file = $request->file('image4');
                $fileName = $file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;
                $file->storeAs('announces/tmp/' . $folder, $fileName);

                TemporaryFile::create([
                    'folder' => $folder,
                    'filename' => $fileName
                ]);

                return $folder;
            }
        }

        return '';
    }
}
