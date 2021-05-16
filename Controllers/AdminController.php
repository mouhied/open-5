<?php

namespace App\Controllers;

use App\Models\PostsModel;

class AdminController extends Controller
{
    public function index()
    {

        if ($this->isAdmin()) {
            $this->render('admin/index', [], 'admin');
        }
    }

    public function posts()
    {
        if ($this->isAdmin()) {
            $postsModel = new PostsModel;

            $posts = $postsModel->chargementPosts();
            $this->render('admin/posts', compact('posts'), 'admin');
        }
    }

    /**
     * supprimer un post 
     * @param mixed $id
     */
    public function supprimePost(int $id)
    {

        if ($this->isAdmin()) {
            $post = new PostsModel;
            $post->delete($id);

            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }
    private function isAdmin()
    {
        if (isset($_SESSION['user']) && in_array('ROLE_ADMIN', $_SESSION['user']['roles'])) {
            return true;
        } else {
            $_SESSION['erreur'] = "vous n'avez pas accés à cette zone";
            header('Location: /');
            exit;
        }
    }
}
