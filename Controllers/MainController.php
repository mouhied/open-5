<?php

namespace App\Controllers;

use App\Models\PostsModel;

class MainController extends Controller
{

    public function index()
    {
        
        $postsModel = new PostsModel;
        $posts = $postsModel->chargementPosts();
       

        $this->render('main/index', compact('posts'));
    }
}
