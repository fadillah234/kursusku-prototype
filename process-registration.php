<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Baca data dari form
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');
$course = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$interests = $_POST['interests'] ?? [];
$note = trim($_POST['note'] ?? '');
$source = $_POST['source'] ?? '';

// Gabungkan array minat jadi teks
$interestText = implode(', ', $interests);

// Fungsi aman tampilkan teks (mencegah XSS)
function e($value): string {
  return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hasil Pendaftaran - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <main class="container result-page">
    <section class="alert-success">
      <h1>Pendaftaran Diterima</h1>
      <p>Periksa kembali data berikut:</p>
    </section>

    <section class="summary-card">
      <dl class="summary-list">
        <dt>Nama</dt><dd><?= e($name) ?></dd>
        <dt>Email</dt><dd><?= e($email) ?></dd>
        <dt>Nomor HP</dt><dd><?= e($phone) ?></dd>
        <dt>Program Studi</dt><dd><?= e($studyProgram) ?></dd>
        <dt>Kursus</dt><dd><?= e($course) ?></dd>
        <dt>Jenis Peserta</dt><dd><?= e($participantType) ?></dd>
        <dt>Minat</dt><dd><?= e($interestText) ?></dd>
        <dt>Catatan</dt><dd><?= e($note) ?></dd>
        <dt>Sumber</dt><dd><?= e($source) ?></dd>
      </dl>
      <a class="btn-link" href="registration.php">← Kembali ke Form</a>
    </section>
  </main>
</body>
</html>