<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('buku'); ?>
    <div class="row">
        <div class="col-lg-9">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div> <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#kategoriBaruModal"><i class="fas fa-file-alt"></i> Tambah Buku</button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">judul</th>
                        <th scope="col">Tahun buku</th>
                        <th scope="col">Penerbit buku</th>
                        <th scope="col">Pengarang buku</th>
                        <th scope="col">Keterangan buku</th>
                </thead>
                <tbody> <?php $a = 1;
                        foreach ($daftar_buku as $dm) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $dm['judul_buku']; ?></td>
                            <td><?= $dm['tahun_buku']; ?></td>
                            <td><?= $dm['penerbit_buku']; ?></td>
                            <td><?= $dm['pengarang_buku']; ?></td>
                            <td><?= $dm['keterangan_buku']; ?></td>
                            </td>
                            <td>
                                <a href="<?= base_url('buku/ubahBuku/') . $dm['id_buku']; ?>" type="button" class="badge badge-info">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <a href="<?= base_url('buku/hapusBuku/') . $dm['id_buku']; ?>" onclick="return confirm
                            ('Kamu yakin akan menghapus <?= $dm['judul_buku']; ?> ?');" class="badge badge-danger">
                                    <i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div><!-- /.container-fluid -->
<!-- </div> End of Main Content -->