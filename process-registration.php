<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

$name        = trim($_POST['name'] ?? '');
$email       = trim($_POST['email'] ?? '');
$phone       = trim($_POST['phone'] ?? '');
$study       = trim($_POST['study_program'] ?? '');
$courseCode  = trim($_POST['course'] ?? '');
$type        = trim($_POST['participant_type'] ?? '');
$interests   = $_POST['interests'] ?? [];
$note        = trim($_POST['note'] ?? '');
$learningMethod = trim($_POST['learning_method'] ?? '');
$packageCount   = (int) ($_POST['package_count'] ?? 1);

if (!is_array($interests)) {
    $interests = [];
}

if ($packageCount < 1) {
    $packageCount = 1;
}

$course = findCourse($courses, $courseCode);

if ($course === null) {
    $course = [
        'code' => '',
        'name' => 'Kursus tidak ditemukan',
        'fee' => 0,
    ];
}

$discountPercent = getDiscountPercent($type);

$subtotal = $course['fee'] * $packageCount;
$discountAmount = $subtotal * $discountPercent / 100;
$total = $subtotal - $discountAmount;

$interestText = $interests
    ? implode(', ', array_map('e', $interests))
    : 'Belum memilih minat';

$learningMethodText = '';

switch ($learningMethod) {
    case 'online':
        $learningMethodText = 'Online';
        break;

    case 'offline':
        $learningMethodText = 'Tatap Muka';
        break;

    case 'hybrid':
        $learningMethodText = 'Hybrid';
        break;

    default:
        $learningMethodText = '-';
        break;
}


?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pendaftaran Berhasil - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f8f6;
            color: #16332c;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
        }

        .success-card {
            background: white;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 5px 20px rgba(0,0,0,.08);
        }

        .success-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #dff7e9;
            color: #198754;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            color: #0f766e;
            margin-bottom: 8px;
        }

        .message {
            text-align: center;
            color: #555;
            margin-bottom: 30px;
        }

        .data {
            background: #f7faf9;
            border-radius: 12px;
            padding: 20px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 10px 0;
            border-bottom: 1px solid #e5e5e5;
        }

        .row:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: bold;
        }

        .total-row {
            margin-top: 10px;
            padding-top: 15px;
            border-top: 2px solid #0f766e;
            font-size: 18px;
        }

        .total {
            color: #0f766e;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background: #0f766e;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .button:hover {
            background: #0b5f59;
        }

        .center {
            text-align: center;
        }

        @media (max-width: 640px) {
            .container {
                margin: 20px auto;
            }

            .success-card {
                padding: 25px 18px;
            }

            .row {
                flex-direction: column;
                gap: 4px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="success-card">

        <div class="success-icon">
            ✓
        </div>

        <h1>Pendaftaran Berhasil!</h1>

        <p class="message">
            Terima kasih, data pendaftaran Anda telah diterima.
            Silakan periksa kembali informasi berikut.
        </p>

        <div class="data">

            <div class="row">
                <span class="label">Nama</span>
                <span><?= e($name) ?></span>
            </div>

            <div class="row">
                <span class="label">Email</span>
                <span><?= e($email) ?></span>
            </div>

            <div class="row">
                <span class="label">No. HP</span>
                <span><?= e($phone) ?></span>
            </div>

            <div class="row">
                <span class="label">Program Studi</span>
                <span><?= e($study) ?></span>
            </div>

            <div class="row">
                <span class="label">Kursus</span>
                <span><?= e($course['name']) ?></span>
            </div>

            <div class="row">
                <span class="label">Jenis Peserta</span>
                <span><?= e($type) ?></span>
            </div>

            <div class="row">
                <span class="label">Minat</span>
                <span><?= $interestText ?></span>
            </div>

            <div class="row">
                <span class="label">Metode Belajar</span>
                <span><?= e($learningMethodText) ?></span>
            </div>

            <div class="row">
                <span class="label">Jumlah Paket</span>
                <span><?= $packageCount ?></span>
            </div>

            <div class="row">
                <span class="label">Harga per Paket</span>
                <span><?= formatRupiah($course['fee']) ?></span>
            </div>

            <div class="row">
                <span class="label">Subtotal</span>
                <span><?= formatRupiah($subtotal) ?></span>
            </div>

            <div class="row">
                <span class="label">Diskon</span>
                <span>
                    <?= $discountPercent ?>%
                    (<?= formatRupiah($discountAmount) ?>)
                </span>
            </div>

            <div class="row">
                <span class="label">Catatan</span>
                <span><?= e($note) ?: '-' ?></span>
            </div>

            <div class="row total-row">
                <span class="label">Total Bayar</span>
                <span class="total"><?= formatRupiah($total) ?></span>
            </div>

        </div>

        <div class="center">
            <a href="registration.php" class="button">
                ← Kembali ke Form Pendaftaran
            </a>
        </div>

    </div>

</div>

</body>
</html>