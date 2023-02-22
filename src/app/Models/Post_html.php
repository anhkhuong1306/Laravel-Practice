<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class PostHtml
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    /**
     * PostHtml constructor.
     * @param $title
     * @param $excerpt
     * @param $date
     * @param $body
     * @param $slug
     */
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    /**
     * @return array|string[]
     */
    public static function all()
    {
        $files = File::files(resource_path('posts'));
        $posts = collect($files)
            ->map(function ($file) {
                return YamlFrontMatter::parseFile($file);
            })
            ->map(function ($document) {
                return new PostHtml(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
                );
            })
            ->sortByDesc('date');
        return  cache()->rememberForever('posts.all', function() use ($posts) {
            return $posts;
        });
    }

    public static function find($slug)
    {
//        $path = resource_path("posts/{$slug}.html");
//        if (!file_exists($path)) {
//            throw new ModelNotFoundException();
//        }
//        $post = cache()->remember("post.{$slug}", 5, function () use ($path) {
//            return file_get_contents($path);
//        });
        $posts = static::all()->firstWhere('slug', $slug);

        return $posts;
    }

    public static function findOrFail($slug)
    {
        $posts = static::find($slug);

        if (!$posts) {
            throw new ModelNotFoundException();
        }

        return $posts;
    }
}
