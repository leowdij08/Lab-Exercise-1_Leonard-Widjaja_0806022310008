<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segitiga Piramida Palindrome</title>
</head>
<body>
    <h1>Penjumlahan Palindrome</h1>
    <!-- Form input untuk menentukan berapa digit yang mau ditampilkan -->
    <form method="post">
        <label for="digit">Masukkan jumlah digit (maksimal 10):</label>
        <input type="number" id="digit" name="digit" min="1" max="10" required>
        <button type="submit">Cari</button>
    </form>

    <pre>
    <?php
    // Cek apakah ada input dari form
    if (isset($_POST['digit'])) {
        $digit = intval($_POST['digit']); // Ambil nilai digit dan ubah jadi integer

        // Pastikan digit di antara 1 sampai 10
        if ($digit > 0 && $digit <= 10) {
            // Cetak segitiga piramida palindrome sesuai dengan digit yang dimasukkan
            for ($i = 0; $i <= $digit; $i++) {
                // Cetak spasi sesuai dengan digit yang dimasukkan - i (bagian atas)
                for ($k = 0; $k < ($digit - $i); $k++) {
                    echo " ";  // Tambah satu spasi per loop
                }

                // Cetak angka dari 1 hingga i (bagian kiri)
                for ($j = 1; $j <= $i; $j++) {
                    echo $j;
                }

                // Cetak angka dari i-1 hingga 1 (bagian kanan)
                for ($j = $i - 1; $j >= 1; $j--) {
                    echo $j;
                }

                echo "\n";  // Tambah baris baru setelah satu row selesai
            }
        } else {
            // Tampilkan pesan apabila digit di luar rentang 1-10
            echo "Tolong masukkan angka antara 1 hingga 10.";
        }
    }
    ?>
    </pre>
</body>
</html>
