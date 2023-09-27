<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $slug;
    public $excerpt;
    public $date;
    public $body;

    public function __construct($title, $slug, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function all()
    {

        return cache()->rememberForever("post.all", function () {
            $posts = collect(File::files(public_path('posts')))->map(
                function ($file) {
                    $document = YamlFrontMatter::parseFile($file);
                    // dd($document);
                    return  new Post(
                        $document->title,
                        $document->slug,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                    );
                }
            )->sortByDesc("date");
            return $posts;
        });
    }
    public static function find($slug)
    {
        // dd($slug);
        return self::all()->firstWhere("slug", $slug);
    }
}
