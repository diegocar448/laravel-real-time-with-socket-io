<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostController extends Controller
{

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    //Método que vai retornar todos os Posts
    public function index()
    {
        $posts = $this->post->latest()->get();

        return PostResource::collection($posts);
    }
}
