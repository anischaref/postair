<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = [
            [
                'author' => 'Yacine',
                'time' => '5 minutes ago',
                'message' => 'first post!', 
            ],
            
            [
                'author' => 'Yacine',
                'time' => '17 minutes ago',
                'message' => 'second post!', 
            ],
            [
                'author' => 'Yacine',
                'time' => '3 hours ago',
                'message' => 'oldest post'
            ]
        ];
       return view('home', ['posts' => $posts]);  
    }
}
