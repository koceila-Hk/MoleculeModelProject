<?php

session_start();

require_once './Config.php';

require_once './fonctions.php';


require_once './classes/NotFoundException.php';
require_once './controllers/HomeController.php';
require_once './controllers/MoleculeController.php';

// Route
$route = $_SERVER['PATH_INFO'] ?? '/accueil';

try {
    switch ($route) {
        case '/accueil':
            HomeController::afficherAccueil();
            break;

        case '/molecules':
            MoleculeController::afficherListe();
            break;

        case '/molecules/details':
            MoleculeController::afficherDetails();
            break;

        case '/molecules/ajouter':
            MoleculeController::ajouter();
            break;

        case '/molecules/supprimer':
            MoleculeController::supprimer();
            break;

        case '/error/500':
            throw new Exception;
            break;

        default:
            throw new NotFoundException;
    }

} catch (NotFoundException $e) {
    include './views/errors/404.php';

} catch (Exception $e) {
    include './views/errors/500.php';
}
