<h2>Edit Peserta</h2>
<form method="post" action="<?= base_url('welcome/edit_peserta/'.$peserta['id_peserta']) ?>">
    <input type="text" name="nik_peserta" value="<?= $peserta['nik_peserta'] ?>"><br>
    <input type="text" name="no_induk_peserta" value="<?= $peserta['no_induk_peserta'] ?>"><br>
    <input type="text" name="nama_peserta" value="<?= $peserta['nama_peserta'] ?>"><br>
	<select name="jenis_kelamin">
    <option value="Laki-laki" <?= $peserta['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
    <option value="Perempuan" <?= $peserta['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
	</select><br>

    <input type="text" name="tempat_lahir" value="<?= $peserta['tempat_lahir'] ?>"><br>
    <input type="date" name="tanggal_lahir" value="<?= $peserta['tanggal_lahir'] ?>"><br>
    <textarea name="alamat"><?= $peserta['alamat'] ?></textarea><br>
    <input type="text" name="no_telp" value="<?= $peserta['no_telp'] ?>"><br>

	<select name="modul_pelatihan">
    <option value="Pemrograman" <?= $peserta['modul_pelatihan'] == 'Pemrograman' ? 'selected' : '' ?>>Pemrograman</option>
    <option value="Desain Grafis" <?= $peserta['modul_pelatihan'] == 'Desain Grafis' ? 'selected' : '' ?>>Desain Grafis</option>
    <option value="Animasi" <?= $peserta['modul_pelatihan'] == 'Animasi' ? 'selected' : '' ?>>Animasi</option>
	</select><br>

    <button type="submit">Update</button>
</form>
