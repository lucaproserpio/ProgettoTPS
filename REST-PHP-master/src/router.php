<?php
function get($uri)
{
    $headers = apache_request_headers();
    $array = explode('?', $uri);
    //divido l'uri per le richieste get con parametri
    $uri = $array[0];

    require("functionGet.php");

    switch ($uri) {

        case '/':
            if (isset($uriget)) {
                notFound();
                break;
            } else {
                index();
                break;
            }

        case '/listaEsercenti':

            listaEsercenti();
            break;

        case '/aggiungiEsercente':
            aggiungiEsercente();
            break;

        default:
            notFound();
            break;
    }
}

function post($uri)
{
    $headers = apache_request_headers();
    require("functionPost.php");
    switch ($uri) {

        case '/aggiungiEsercente':
            aggiungiEsercentePost();
            break;

        default:
            notFound();
            break;
    }
}
?>