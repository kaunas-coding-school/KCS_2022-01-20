<?php

if (array_key_exists('delete', $_GET)) {
    setcookie('vartotojas', null, 0, '/');
    unset($_COOKIE['vartotojas']);
}

if(!isset($_COOKIE['vartotojas']) && !array_key_exists('delete', $_GET)) {
    setcookie('vartotojas', 'Tautvydas Dulskis', time() + 60, '/');
    echo 'Sausainėlis pavadinimu "vartotojas" nera sukurtas! Mes ji katik sukurem.';
} else {
    echo 'Sausainėlis "vartotojas" yra sukurtas!<br>';
    echo 'Jo reikšmė yra: ' . $_COOKIE['vartotojas'];
}

