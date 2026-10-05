<?php

require __DIR__ . '/helpers.php';

$history = [
    [
        'name' => 'Alya',
        'course' => 'Web Dasar',
        'total' => 240000,
    ],
    [
        'name' => 'Bima',
        'course' => 'PHP Dasar',
        'total' => 340000,
    ],
    [
        'name' => 'Citra',
        'course' => 'Laravel Dasar',
        'total' => 500000,
    ],
];

?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History Dummy - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<main class="container">

    <h1>History Dummy</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kursus</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($history as $index => $item): ?>

                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= e($item['name']) ?></td>
                    <td><?= e($item['course']) ?></td>
                    <td><?= formatRupiah($item['total']) ?></td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

</main>

</body>
</html>