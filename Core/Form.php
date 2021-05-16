<?php

namespace App\Core;

class Form
{
    private $formCode = "";

    /**
     * génère le formulaire HTML 
     * @return string
     */
    public function create()
    {
        return $this->formCode;
    }
    public static function validate(array $form, array $champs)
    {

        foreach ($champs as $champ) {

            if (!isset($form[$champ]) || empty($form[$champ])) {
                return false;
            }
        }
        return true;
    }

    /**
     * atoute les attributs envoyés à la balise
     * @return string chaine de caractéres génèrer
     */
    private function ajoutAttributs(array $attributs): string
    {
        $str = '';

        $courts = [
            'checked', 'disabled', 'required', 'autofocus',
            'multiple'
        ];

        foreach ($attributs as $attribut => $valeur) {
            if (in_array($attribut, $courts) && $valeur == true) {
                $str .= " $attribut";
            } else {

                $str .= " $attribut =\"$valeur\"";
            }
        }

        return $str;
    }

    /**
     * balise d'ouverture de formulaire 
     * @return Form
     */
    public function debutForm(string $methode = 'post', string $action = '#', array $attributs = []): self
    {
        $this->formCode .= "<form action='$action' method='$methode'";

        if ($attributs) {
            $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) . '>' : '>';
        }
        return $this;
    }

    /**
     * balise de fermeture de formulaire 
     * @return Form
     */
    public function finForm(): self
    {
        $this->formCode .= '</form>';
        return $this;
    }

    /**
     * Ajout d'un label
     * @param string $for 
     * @param string $texte 
     * @param array $attributs 
     * @return Form 
     */
    public function ajoutLabelFor(string $for, string $texte, array $attributs = []): self
    {
        // On ouvre la balise
        $this->formCode .= "<label for='$for'";

        // On ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';

        // On ajoute le texte
        $this->formCode .= ">$texte</label>";

        return $this;
    }

    /**
     * Ajout d'un champ input
     * @param string $type 
     * @param string $nom 
     * @param array $attributs 
     * @return Form
     */
    public function ajoutInput(string $type, string $nom, array $attributs = []): self
    {
        // On ouvre la balise
        $this->formCode .= "<input type='$type' name='$nom'";

        // On ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) . '>' : '>';

        return $this;
    }

    /**
     * Ajoute un champ textarea
     * @param string $nom Nom du champ
     * @param string $valeur Valeur du champ
     * @param array $attributs Attributs
     * @return Form Retourne l'objet
     */
    public function ajoutTextarea(string $nom, string $valeur = '', array $attributs = []): self
    {
        // On ouvre la balise
        $this->formCode .= "<textarea name='$nom'";

        // On ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';

        // On ajoute le texte
        $this->formCode .= ">$valeur</textarea>";

        return $this;
    }

    /**
     * Liste déroulante
     * @param string $nom Nom du champ
     * @param array $options Liste des options (tableau associatif)
     * @param array $attributs 
     * @return Form
     */
    public function ajoutSelect(string $nom, array $options, array $attributs = []): self
    {
        // On crée le select
        $this->formCode .= "<select name='$nom'";

        // On ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) . '>' : '>';

        // On ajoute les options
        foreach ($options as $valeur => $texte) {
            $this->formCode .= "<option value=\"$valeur\">$texte</option>";
        }

        // On ferme le select
        $this->formCode .= '</select>';

        return $this;
    }

    /**
     * Ajoute un bouton
     * @param string $texte 
     * @param array $attributs 
     * @return Form
     */
    public function ajoutBouton(string $texte, array $attributs = []): self
    {
        // On ouvre le bouton
        $this->formCode .= '<button ';

        // On ajoute les attributs
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';

        // On ajoute le texte et on ferme
        $this->formCode .= ">$texte</button>";

        return $this;
    }
}
