<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        .pagination {
            display: flex;
            list-style: none;
            padding-left: 0;
        }
        .pagination li {
            margin: 0 2px;
        }
        .pagination li a,
        .pagination li span {
            display: block;
            padding: 6px 12px;
            color: #007bff;
            border: 1px solid #dee2e6;
            text-decoration: none;
            border-radius: 4px;
        }
        .pagination li.active span {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

		.btn-tambah {
            display: inline-block;
            padding: 8px 12px;
            margin-bottom: 10px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-tambah:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<h2>Selamat datang, <?= $username ?></h2>
<p>Total Data: <strong><?= $total_rows ?></strong></p>

<a href="<?= base_url('welcome/tambah_peserta') ?>" class="btn-tambah">+ Tambah Peserta</a>


<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Modul</th>
        <th>Aksi</th>
    </tr>
    <?php 
    $no = 1;
    foreach ($peserta as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nik_peserta'] ?></td>
        <td><?= $row['nama_peserta'] ?></td>
        <td><?= $row['modul_pelatihan'] ?></td>
        <td>
            <a href="<?= base_url('peserta/edit/'.$row['id_peserta']) ?>">Edit</a> |
            <a href="<?= base_url('peserta/hapus/'.$row['id_peserta']) ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- Pagination -->
<div style="margin-top:10px;">
    <?= $pagination ?>
</div>

<p><a href="<?= base_url('welcome/logout') ?>">Logout</a></p>

</body>
</html>
