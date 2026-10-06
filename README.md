# KursusKu - Proyek Semester Pemrograman Web III

Proyek berjalan melalui Laragon di `C:\laragon\www\kursusku-prototype`.

## Rumus Biaya Minggu 3

```
subtotal = fee x participantCount
discount = subtotal x discountPercent / 100
total = subtotal - discount + adminFee
```

Catatan:
- Semua nilai uang disimpan sebagai integer rupiah.
- Nilai masih hard-code pada Pertemuan 3.
- Input dari form akan ditambahkan pada pertemuan berikutnya.

## Struktur Proyek

```
kursusku-prototype/
|-- index.php              (Pertemuan 2 + 4: landing page + katalog data-driven)
|-- server-time.php        (Pertemuan 2)
|-- fee-calculator.php     (Pertemuan 3)
|-- helpers.php            (Pertemuan 4: rupiah, statusKursus, sisaKursi, formatTanggal)
|-- test-functions.php     (Pertemuan 4: 6 test case)
|-- README.md
|-- assets/
|   |-- images/hero-kursus.jpg
|   `-- video/intro-kursus.mp4
`-- evidence/
    |-- week-02/
    |-- week-03/
    `-- week-04/
```

## Milestone

- Milestone 2: Landing Page KursusKu Versi 1 (HTML semantik + PHP dasar).
- Milestone 3: Kalkulator estimasi biaya, tervalidasi 5 test case.
- Milestone 4: Katalog data-driven (array 6 kursus + foreach + 4 function reusable + 6 test).

## Test Case Minggu 3

| No | Fee | Peserta | Diskon | Admin | Expected Total |
|---|---:|---:|---:|---:|---:|
| 1 | Rp 350.000 | 1 | 0% | Rp 25.000 | Rp 375.000 |
| 2 | Rp 350.000 | 1 | 10% | Rp 25.000 | Rp 340.000 |
| 3 | Rp 350.000 | 2 | 25% | Rp 25.000 | Rp 550.000 |
| 4 | Rp 0 | 1 | 10% | Rp 25.000 | Rp 0 |
| 5 | Rp 2.500.000 | 3 | 10% | Rp 50.000 | Rp 6.800.000 |

Semua test case dibandingkan dengan hasil yang ditampilkan oleh `fee-calculator.php`.