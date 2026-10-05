<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loop Lab - KursusKu</title>
</head>

<body>

    <h1>Loop Lab</h1>

    <h2>A. for</h2>

    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo "Pertemuan ke-$i<br>";
    }
    ?>

    <h2>B. while</h2>

    <?php
    $i = 1;

    while ($i <= 5) {
        echo "Nomor antrean: $i<br>";
        $i++;
    }
    ?>

    <h2>C. do-while</h2>

    <?php
    $i = 1;

    do {
        echo "Percobaan ke-$i<br>";
        $i++;
    } while ($i <= 5);
    ?>

</body>
</html>s