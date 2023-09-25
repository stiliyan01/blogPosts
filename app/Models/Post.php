<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all()
    {
        $files = File::files(public_path("posts"));
        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }
    public static function find($slug)
    {
        $path  = public_path("posts/{$slug}.html");
        if (!file_exists($path)) {
            // abort(404);
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", 1200, fn () =>
        file_get_contents($path));
    }
}
