<?php

require_once __DIR__ . '/../models/MoleculeModel.php';

class MoleculeController {
    static function afficherListe() {
        $model = new MoleculeModel;
        $molecules = $model->getAll();

        include __DIR__ . '/../views/molecules/liste.php';
    }

    static function afficherDetails() {
        if (empty($_GET['id'])) {
            throw new NotFoundException;
        }

        $model = new MoleculeModel;
        $molecule = $model->getOne($_GET['id']);

        if (empty($molecule)) {
            throw new NotFoundException;
        }

        $molecule->atomes = $model->getAtomes($molecule->id);
        $molecule->masseMoleculaire = 0;

        foreach ($molecule->atomes as $atome) {
            $molecule->masseMoleculaire += $atome->masse_atomique * $atome->qtte;
        }

        include __DIR__ . '/../views/molecules/details.php';
    }

    static function ajouter() {

        $errors = [];

        if (!empty($_POST)) {
            // Le $_POST n'est pas vide
            // Le formulaire a été soumis
            // On le traite

            if (empty($_POST['nom'])) {
                $errors[] = 'Le champ nom est requis';
            }

            if (empty($_POST['formule'])) {
                $errors[] = 'Le champ formule est requis';
            }

            if (empty($errors)) {
                // Pas d'erreur, on peut insérer l'entrée
                $model = new MoleculeModel;
                $model->add($_POST['nom'], $_POST['formule']);
                redirect('/molecules');
            }
        }

        include __DIR__ . '/../views/molecules/form.php';
    }

    static function supprimer() {
        if (empty($_GET['id'])) {
            throw new NotFoundException;
        }

        $model = new MoleculeModel;
        $model->delete($_GET['id']);

        redirect('/molecules');
    }
}
