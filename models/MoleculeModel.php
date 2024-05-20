<?php

require_once __DIR__ . '/Model.php';

class MoleculeModel extends Model {
    function getAll() {
        return $this->bdd
            ->query('SELECT * FROM molecule')
            ->fetchAll();
    }

    function getOne($id) {
        $stmt = $this->bdd
            ->prepare('SELECT * FROM molecule WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function getAtomes($id) {
        $stmt = $this->bdd
            ->prepare('SELECT 
                atome_molecule.qtte_atome AS qtte,
                atome.*
            FROM atome
            INNER JOIN atome_molecule ON atome_molecule.id_atome = atome.id 
            WHERE atome_molecule.id_molecule = ?');
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    function add(string $nom, string $formule) {
        $stmt = $this->bdd
            ->prepare('INSERT INTO molecule VALUE (NULL, ?, ?)');
        $stmt->execute([$nom, $formule]);
    }

    function delete($id) {
        $stmt = $this->bdd
            ->prepare('DELETE FROM molecule WHERE id = ?');
        $stmt->execute([$id]);
    }

    /**
     * Requêtes si on souhaitait calculer la masse moléculaire via la BDD :
     * 
     * SELECT 
     * 	molecule.nom,
     * 	SUM(atome_molecule.qtte_atome * atome.masse_atomique) AS masse_moleculaire
     * FROM molecule
     * INNER JOIN atome_molecule ON atome_molecule.id_molecule = molecule.id
     * INNER JOIN atome ON atome_molecule.id_atome = atome.id
     * 
     * WHERE molecule.id = 2;
     */
}
