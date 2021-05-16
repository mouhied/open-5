<?php

namespace App\Controllers;

use App\Core\Form;

class ContactController extends Controller
{
    public function index()
    {
        if (Form::validate($_POST, ['Nom', 'Prenom', 'email', 'Message'])) {
            $Nom = strip_tags($_POST['Nom']);
            $Prenom = strip_tags($_POST['Prenom']);
            $email = strip_tags($_POST['email']);
            $Message = strip_tags($_POST['Message']);
        }
        $form = new Form;

        $form->debutForm()
            ->ajoutLabelFor('Nom', 'Votre Nom :')
            ->ajoutInput('text', 'Nom', [
                'id' => 'Nom',
                'class' => 'form-control',
                'required' => 'veuillez completez ce champ'
            ])
            ->ajoutLabelFor('Prenom', 'Votre Prenom :')
            ->ajoutInput('text', 'Nom', [
                'id' => 'Prenom',
                'class' => 'form-control',
                 'required' => 'veuillez completez ce champ'

            ])
            ->ajoutLabelFor('email', 'E-mail :')
            ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control', 'required' => 'veuillez completez ce champ'])
            ->ajoutLabelFor('Message', 'Votre Message')
            ->ajoutTextarea('Message', '', ['id' => 'Message', 'class' => 'form-control', 'required' => 'veuillez completez ce champ'])
            ->ajoutBouton('Envoyer', ['class' => 'btn btn-primary'])
            ->finForm();

        $this->render('contact/index', ['form' => $form->create()], 'contact');
    }
}
