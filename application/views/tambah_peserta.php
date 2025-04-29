<h2>Tambah Peserta</h2>
<form method="post" action="<?= base_url('welcome/tambah_peserta') ?>">
    <input type="text" name="nik_peserta" placeholder="NIK"><br>
    <input type="text" name="no_induk_peserta" placeholder="No Induk"><br>
    <input type="text" name="nama_peserta" placeholder="Nama"><br>

	<select name="jenis_kelamin">
    <option value="Laki-laki">Laki-laki</option>
    <option value="Perempuan">Perempuan</option>
</select><br>

    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir"><br>
    <input type="date" name="tanggal_lahir"><br>
    <textarea name="alamat" placeholder="Alamat"></textarea><br>
    <input type="text" name="no_telp" placeholder="No Telp"><br>

	<select name="modul_pelatihan">
    <option value="Pemrograman">Pemrograman</option>
    <option value="Desain Grafis">Desain Grafis</option>
    <option value="Animasi">Animasi</option>
</select><br>

    <button type="submit">Simpan</button>
</form>
