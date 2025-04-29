<h2>Welcome to Dashboard</h2>

<p>Welcome <?= $username ?></p>
<a href="<?= base_url('welcome/logout') ?>">Logout</a>

<h3>Data Peserta Pelatihan</h3>
<a href="<?= base_url('welcome/tambah_peserta') ?>">+ Tambah Peserta</a>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>NIK</th>
            <th>No Induk</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Modul Pelatihan</th>
			<th>Aksi</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($peserta as $p): ?>
        <tr>
            <td><?= $p['id_peserta'] ?></td>
            <td><?= $p['nik_peserta'] ?></td>
            <td><?= $p['no_induk_peserta'] ?></td>
            <td><?= $p['nama_peserta'] ?></td>
            <td><?= $p['jenis_kelamin'] ?></td>
            <td><?= $p['tempat_lahir'] ?></td>
            <td><?= $p['tanggal_lahir'] ?></td>
            <td><?= $p['alamat'] ?></td>
            <td><?= $p['no_telp'] ?></td>
            <td><?= $p['modul_pelatihan'] ?></td>
			<td>
				<a href="<?= base_url('welcome/edit_peserta/'.$p['id_peserta']) ?>">Edit</a> |
				<a href="<?= base_url('welcome/hapus_peserta/'.$p['id_peserta']) ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
			</td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
