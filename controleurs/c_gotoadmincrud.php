<?php

$pdo = PdoHtAuto::getPdoHtAuto();

if (!isset($_REQUEST['action'])) {
    $action = 'accueil';
} else {
    $action = $_REQUEST['action'];
}

switch ($action) {

    case 'responce':
        {
            include('vues/v_merci.php');
            break;
        }

    break;
}



?>