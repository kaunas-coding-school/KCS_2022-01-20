<?php

try {
    $conn = new PDO('mysql:host=db;dbname=kcs_db;charset=utf8mb4', 'devuser', 'devpass');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT first_name, last_name FROM persons");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $masyvasA = $stmt->fetchAll();
} catch(PDOException $ex) {
    echo "Kilo klaida! " . $ex->getMessage();
}

function spausdintiHTML(array $masyvas): string
{
    $tekstas = '<table>';
    $tekstas .= '<tr><th>Vardas</th><th>Pavarde</th></tr>';

    foreach ($masyvas as $key => $item) {
        $tekstas .= "<tr><td>$key</td><td>{$item['first_name']}</td></tr>";
    }

    $tekstas .= '</table>';

    return $tekstas;
}

function spausdintiHTMLPaversta(array $masyvas): string
{
    $tekstas = '<table><tr><td>Vardas</td>';

    foreach ($masyvas as $key => $item) {
        $tekstas .= "<td>$key</td>";
    }
    $tekstas .= "</tr><tr><td>Pavarde</td>";

    foreach ($masyvas as $item) {
        $tekstas .= "<td>{$item['first_name']}</td>";
    }

    $tekstas .= '</tr></table>';

    return $tekstas;
}

echo "
<a href='?formatas=vertical'>Vartikalus</a> 
<a href='?formatas=horizontal'>Horizontalus</a> 
";


if (array_key_exists('formatas', $_GET) && $_GET['formatas'] === 'vertical') {
    echo spausdintiHTML($masyvasA);
} elseif (array_key_exists('formatas', $_GET) && $_GET['formatas'] === 'horizontal') {
    echo spausdintiHTMLPaversta($masyvasA);
} else {
    echo '<h1>Missing format</h1>';
}

$matrica = [
    [9, 6, 8, 4, 7],
    [4, 8, 9, 3, 1],
    [3, 4, 8, 4, 6],
    [2, 6, 1, 4, 4],
    [7, 7, 5, 8, 2],
];