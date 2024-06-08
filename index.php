<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Dataset: Memilih Jenis Kendaraan</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        let count = 1;
        function addFieldset() {
            count++;
            const fieldset = document.createElement('fieldset');
            fieldset.innerHTML = `
                <legend>Row ${count}</legend>
                <label for="jarak${count}">Jarak Tempuh Harian:</label>
                <select name="jarak[]" id="jarak${count}">
                    <option value="Jauh">Jauh</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Dekat">Dekat</option>
                </select><br>
                
                <label for="penumpang${count}">Kebutuhan Penumpang:</label>
                <select name="penumpang[]" id="penumpang${count}">
                    <option value="Banyak">Banyak</option>
                    <option value="Sedikit">Sedikit</option>
                </select><br>

                <label for="lokasi${count}">Lokasi:</label>
                <select name="lokasi[]" id="lokasi${count}">
                    <option value="Kota">Kota</option>
                    <option value="Desa">Desa</option>
                </select><br>

                <label for="anggaran${count}">Anggaran:</label>
                <select name="anggaran[]" id="anggaran${count}">
                    <option value="Tinggi">Tinggi</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Rendah">Rendah</option>
                </select><br>

                <label for="jenis${count}">Jenis Kendaraan:</label>
                <select name="jenis[]" id="jenis${count}">
                    <option value="Mobil">Mobil</option>
                    <option value="Motor">Motor</option>
                    <option value="Sepeda">Sepeda</option>
                </select>
            `;
            document.getElementById('forms').appendChild(fieldset);
        }
    </script>
</head>
<body>
    <h1>Input Dataset: Memilih Jenis Kendaraan</h1>
    <form action="process.php" method="post" id="forms">
        <fieldset>
            <legend>Row 1</legend>
            <label for="jarak1">Jarak Tempuh Harian:</label>
            <select name="jarak[]" id="jarak1">
                <option value="Jauh">Jauh</option>
                <option value="Sedang">Sedang</option>
                <option value="Dekat">Dekat</option>
            </select><br>
            
            <label for="penumpang1">Kebutuhan Penumpang:</label>
            <select name="penumpang[]" id="penumpang1">
                <option value="Banyak">Banyak</option>
                <option value="Sedikit">Sedikit</option>
            </select><br>

            <label for="lokasi1">Lokasi:</label>
            <select name="lokasi[]" id="lokasi1">
                <option value="Kota">Kota</option>
                <option value="Desa">Desa</option>
            </select><br>

            <label for="anggaran1">Anggaran:</label>
            <select name="anggaran[]" id="anggaran1">
                <option value="Tinggi">Tinggi</option>
                <option value="Sedang">Sedang</option>
                <option value="Rendah">Rendah</option>
            </select><br>

            <label for="jenis1">Jenis Kendaraan:</label>
            <select name="jenis[]" id="jenis1">
                <option value="Mobil">Mobil</option>
                <option value="Motor">Motor</option>
                <option value="Sepeda">Sepeda</option>
            </select>
        </fieldset>
        <br>
        <button type="button" onclick="addFieldset()">Tambah Data</button>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
