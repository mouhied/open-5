<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\PostsModel;
use Exception;

class PostsController extends Controller
{

    public function index()
    {
        $postsModel = new PostsModel;
        $posts = $postsModel->chargementPosts();

        $this->render('posts/index', compact('posts'));
    }

    /**
     * Affiche 1 post
     * @param int $id Id de post
     * @return void 
     */
    public function lire(int $id)
    {
        // On instancie le modèle
        $postsModel = new PostsModel;

        // On va chercher 1 post
        $post = $postsModel->find($id);

        // On envoie à la vue
        $this->render('posts/lire', compact('post'), 'default');
    }

    /**
     * Ajouter une post
     * @return void 
     */
    public function ajouter()
    {

        // On vérifie si l'utilisateur est connecté
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
            // L'utilisateur est connecté
            // On vérifie si le formulaire est complet
            if (Form::validate($_POST, ['titre', 'chapo'])) {
                // Le formulaire est complet
                // On se protège contre les failles XSS
                // strip_tags, htmlentities, htmlspecialchars
                $titre = strip_tags($_POST['titre']);
                $chapo = strip_tags($_POST['chapo']);


                // On instancie notre modèle
                $post = new PostsModel;

                // On hydrate
                $post->setTitre($titre)
                    ->setChapo($chapo)
                    ->setUsers_id($_SESSION['user']['id']);



                // On enregistre
                $post->create();

                // On redirige
                $_SESSION['message'] = "Votre post a été enregistrée avec succès";
                header('Location: /');
                exit;
            } else {
                // Le formulaire est incomplet
                $_SESSION['erreur'] = !empty($_POST) ? "Le formulaire est incomplet" : '';
                $titre = isset($_POST['titre']) ? strip_tags($_POST['titre']) : '';
                $chapo = isset($_POST['chapo']) ? strip_tags($_POST['chapo']) : '';
                
            }


            $form = new Form;

            $form->debutForm('post', '#')
                ->ajoutLabelFor('titre', 'Titre de post :')
                ->ajoutInput('text', 'titre', [
                    'id' => 'titre',
                    'class' => 'form-control',
                    'value' => $titre
                ])
                ->ajoutLabelFor('chapo', 'Texte de post')
                ->ajoutTextarea('chapo', $chapo, ['id' => 'chapo', 'class' => 'form-control'])
                ->ajoutBouton('Ajouter', ['class' => 'btn btn-primary'])
                ->finForm();

            $this->render('posts/ajouter', ['form' => $form->create()]);
        } else {
            // L'utilisateur n'est pas connecté
            $_SESSION['erreur'] = "Vous devez être connecté(e) pour accéder à cette page";
            header('Location: /users/login');
            exit;
        }
    }

    /**
     * Modifier un post
     * @param int $id 
     * @return void 
     */
    public function modifier(int $id)
    {
        // On vérifie si l'utilisateur est connecté
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
            // On va vérifier si le post existe dans la base
            // On instancie notre modèle
            $postsModel = new PostsModel;

            // On cherche le post avec l'id $id
            $post = $postsModel->find($id);

            // Si le post n'existe pas, on retourne à la liste des posts
            if (!$post) {
                http_response_code(404);
                $_SESSION['erreur'] = "Le post recherchée n'existe pas";
                header('Location: /posts');
                exit;
            }

            // On vérifie si l'utilisateur est propriétaire du post ou admin
            if ($post->users_id !== $_SESSION['user']['id']) {
                if (!in_array('ROLE_ADMIN', $_SESSION['user']['roles'])) {
                    $_SESSION['erreur'] = "Vous n'avez pas accès à cette page";
                    header('Location: /posts');
                    exit;
                }
            }

            // On traite le formulaire
            if (Form::validate($_POST, ['titre', 'chapo'])) {
                // On se protège contre les failles XSS
                $titre = strip_tags($_POST['titre']);
                $chapo = strip_tags($_POST['chapo']);

                // On stocke le post
                $postModif = new PostsModel;

                // On hydrate
                $postModif->setId($post->id)
                    ->setTitre($titre)
                    ->setChapo($chapo);

                // On met à jour le post
                $postModif->update();

                // On redirige
                $_SESSION['message'] = "Votre post a été modifié avec succès";
                header('Location: /');
                exit;
            }


            $form = new Form;

            $form->debutForm()
                ->ajoutLabelFor('titre', 'Titre de post:')
                ->ajoutInput('text', 'titre', [
                    'id' => 'titre',
                    'class' => 'form-control',
                    'value' => $post->titre
                ])
                ->ajoutLabelFor('chapo', 'Texte de post')
                ->ajoutTextarea('chapo', $post->chapo, [
                    'id' => 'chapo',
                    'class' => 'form-control'
                ])
                ->ajoutBouton('Modifier', ['class' => 'btn btn-primary'])
                ->finForm();

            // On envoie à la vue
            $this->render('posts/modifier', ['form' => $form->create()]);
        } else {
            // L'utilisateur n'est pas connecté
            $_SESSION['erreur'] = "Vous devez être connecté(e) pour accéder à cette page";
            header('Location: /users/login');
            exit;
        }
    }
    
}
