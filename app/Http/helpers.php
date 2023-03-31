<?php

use Illuminate\Support\Facades\Storage;

function deletePhoto($file_path) {
    if(Storage::exists($file_path)) {
        Storage::delete(($file_path));
    }
}

function uploadPhoto($file) {
    $fileName= date('YmdHi').$file->getClientOriginalName();
    $path = $file->storeAs('images', $fileName, 'public');

    return $path;
}