<?php
/**
 * Created by PhpStorm.
 * User: andrea
 * Date: 26/04/18
 * Time: 16:28
 */

require_once '../config.php';

if (!empty($_POST['sconto'])) {
    $jsonObject = json_decode($_POST['sconto']);

    $statement = $dbc->prepare("INSERT INTO codice_sconto (codice_sconto, valore, punti_richiesti, id_utente) VALUES (?, ?, ?, null)");
    $statement->bind_param("sii", $codice_sconto, $valore, $punti_richiesti);

    for($i = 0; $i < count($jsonObject); $i++) {
        $codice_sconto = $jsonObject[$i]->{'codice'};
        $valore = $jsonObject[$i]->{'valore'};
        $punti_richiesti = $jsonObject[$i]->{'punti'};
        $statement->execute();
        echo "Aggiunto";
    }
    $statement->close();
}
