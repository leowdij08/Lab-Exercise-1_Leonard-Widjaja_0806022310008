<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabung Array</title>
</head>
<body>

<h2>Input Array</h2>

<!-- Tempat untuk memasukkan array Nums1 -->
<div id="nums1-container">
    <h3>Nums 1</h3>
    <!-- Input untuk memasukkan elemen array Nums1 -->
    1. <input type="text" name="nums1[]" placeholder="Masukkan elemen array" oninput="updateMaxValues()">
</div>
<br><br>
<!-- Tombol untuk menambah kolom Nums1 -->
<button id="add-nums1" onclick="addRowNums1()">Tambah Kolom Nums1</button>

<br><br>

<!-- Tempat untuk memasukkan array Nums2 -->
<div id="nums2-container">
    <h3>Nums 2</h3>
    <!-- Input untuk memasukkan elemen array Nums2 -->
    1. <input type="text" name="nums2[]" placeholder="Masukkan elemen array" oninput="updateMaxValues()">
</div>
<br><br>
<!-- Tombol untuk menambah kolom Nums2 -->
<button id="add-nums2" onclick="addRowNums2()">Tambah Kolom Nums2</button>

<br><br>

<h3>Masukkan nilai m dan n</h3>
<div>
    <label for="m">m:</label>
    <!-- Input untuk nilai m, yang berisi berapa elemen dari Nums1 yang diambil -->
    <input type="number" id="m" name="m" min="0" oninput="validateInput('m')">
</div>

<div>
    <label for="n">n:</label>
    <!-- Input untuk nilai n, yang berisiberapa elemen dari Nums2 yang diambil -->
    <input type="number" id="n" name="n" min="0" oninput="validateInput('n')">
</div>
<br><br>
<button onclick="mergeArrays()">Gabung Array</button>

<h3>Hasil:</h3>
<!-- Tempat untuk menampilkan hasil penggabungan array -->
<p id="result"></p>

<script>
    let nums1Count = 1;
    let nums2Count = 1;

    // Fungsi untuk menambah baris input Nums1
    function addRowNums1() {
        nums1Count++; // Tambah jumlah baris untuk Nums1
        let container = document.getElementById('nums1-container');
        let newRow = document.createElement('div'); // Buat elemen div baru
        newRow.innerHTML = `${nums1Count}. <input type="text" name="nums1[]" placeholder="Masukkan elemen array dipisahkan dengan koma" oninput="updateMaxValues()">`;
        container.appendChild(newRow); // Tambahkan elemen baru ke dalam container
    }

    // Fungsi untuk menambah baris input Nums2
    function addRowNums2() {
        nums2Count++; // Tambah jumlah baris untuk Nums2
        let container = document.getElementById('nums2-container');
        let newRow = document.createElement('div'); // Buat elemen div baru
        newRow.innerHTML = `${nums2Count}. <input type="text" name="nums2[]" placeholder="Masukkan elemen array dipisahkan dengan koma" oninput="updateMaxValues()">`;
        container.appendChild(newRow); // Tambahkan elemen baru ke dalam container
    }

    // Fungsi untuk memperbarui batas nilai maksimum dari m dan n berdasarkan panjang array
    function updateMaxValues() {
        // Ambil input dari Nums1 dan Nums2, lalu diubah menjadi array angka
        let nums1 = Array.from(document.getElementsByName('nums1[]')).map(input => input.value.split(',').filter(Boolean).map(Number)).flat();
        let nums2 = Array.from(document.getElementsByName('nums2[]')).map(input => input.value.split(',').filter(Boolean).map(Number)).flat();

        let maxM = nums1.length; // Batas maksimum untuk m
        let maxN = nums2.length; // Batas maksimum untuk n

        // Perbarui atribut maksimum untuk input m dan n
        document.getElementById('m').max = maxM;
        document.getElementById('n').max = maxN;

        // Validasi input m dan n agar sesuai dengan batas maksimal
        validateInput('m');
        validateInput('n');
    }

    // Fungsi untuk memvalidasi input agar tidak melebihi nilai maksimum
    function validateInput(field) {
        let inputElement = document.getElementById(field); // Ambil elemen input (m atau n)
        let max = inputElement.max; // Ambil nilai maksimum
        let value = inputElement.value; // Ambil nilai saat ini

        // Jika nilai melebihi maksimum, maka akan diset ke nilai maksimum, sehingga user tidak bisa mengisi lebih dari banyak array Nums1 dan Nums2
        if (parseInt(value) > parseInt(max)) {
            inputElement.value = max;
        }
    }

    // Fungsi untuk menggabungkan dan mengurutkan array
    function mergeArrays() {
        // Ambil input dari Nums1 dan Nums2 lalu ubah jadi array angka
        let nums1 = Array.from(document.getElementsByName('nums1[]')).map(input => input.value.split(',').map(Number));
        let nums2 = Array.from(document.getElementsByName('nums2[]')).map(input => input.value.split(',').map(Number));
        let m = parseInt(document.getElementById('m').value); // Ambil nilai m
        let n = parseInt(document.getElementById('n').value); // Ambil nilai n

        // Menggabungkan semua input Nums1 dan Nums2 menjadi satu array
        nums1 = nums1.flat();
        nums2 = nums2.flat();

        // Mengambil m elemen dari Nums1 dan n elemen dari Nums2
        nums1 = nums1.slice(0, m);
        nums2 = nums2.slice(0, n);

        // Menggabungkan kedua array lalu urutkan
        let result = nums1.concat(nums2).sort((a, b) => a - b);

        // Hasil penggabungan
        document.getElementById('result').innerText = result.join(', ');
    }
</script>

</body>
</html>
