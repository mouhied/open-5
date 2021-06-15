<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class UsersController extends Controller
{
    /**
     * connexion users
     */
    public function login()
    {
        if (Form::validate($_POST, ['email', 'password'])) {

            $usersModel = new UsersModel;
            $usersArray = $usersModel->findOneByEmail(strip_tags($_POST['email']));
            if (!$usersArray) {
                $_SESSION['erreur'] = 'L\adresse e-mail et/ou le mot de passe est incorrect';
                header('Location: /users/login');
                exit;
            }
            $user = $usersModel->hydrate($usersArray);
            
            if(password_verify($_POST['password'], $user->getPassword())){
                 $user->setSession();
                 header('Location: /');
                 exit;
            }else{
                $_SESSION['erreur'] = 'L\adresse e-mail et/ou le mot de passe est incorrect';
                header('Location: /users/login');
                exit;
            }
        }
        $form = new Form;

        $form->debutForm()
            ->ajoutLabelFor('email', 'E-mail :')
            ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
            ->ajoutLabelFor('password', 'Mot de passe')
            ->ajoutInput('password', 'password', ['id' => 'password', 'class' => 'form-control'])
            ->ajoutBouton('Me connecter', ['class' => 'btn btn-primary'])
            ->finForm();

        $this->render('users/login', ['loginForm' => $form->create()]);
    }

    /**
     * inscription users
     *@return void
     */
    public function register()
    {
        if (Form::validate($_POST, ['email', 'password'])) {
            $email = strip_tags($_POST['email']);
            $pass = password_hash($_POST['password'], PASSWORD_ARGON2I);

            //hydrate user
            $user = new UsersModel;

            $user->setEmail($email)
                ->setPassword($pass);

            //on stocke user
            $user->create();
        }
        $form = new Form;

        $form->debutForm()
            ->ajoutLabelFor('email', 'E-mail :')
            ->ajoutInput('email', 'email', ['class' => 'form-control', 'id' => 'email'])
            ->ajoutLabelFor('pass', 'Mot de passe :')
            ->ajoutInput('password', 'password', ['id' => 'pass', 'class' => 'form-control'])
            ->ajoutBouton('M\'inscrire', ['class' => 'btn btn-primary'])
            ->finForm();

        $this->render('users/register', ['registerForm' => $form->create()]);
    }

    /**
     * Déconnexion de l'utilisateur
     * @return exit 
     */
    public function logout(){
        unset($_SESSION['user']);
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }
}
