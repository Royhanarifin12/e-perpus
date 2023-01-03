<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"> <?= $judul; ?></h1>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-body">
                    <?= $this->session->flashdata('message'); ?>
                    <input type="hidden" id="id" name="id" value="<?= $buku['id_buku'] ?>">
                    <div class="form-group">
                        <input type="text" id="judul" name="judul" placeholder="Judul Buku" class="form-control form-control-user" value="<?= $buku['judul_buku'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" id="tahun" name="tahun" placeholder="tahun Buku" class="form-control form-control-user" value="<?= $buku['tahun_buku'] ?>">
                    </div>

                    <div class=" form-group">
                        <input name="penerbit" id="penerbit" placeholder="penerbit" class="form-control form-control-user" type="text" value="<?= $buku['penerbit_buku'] ?>">
                    </div>

                    <div class=" form-group">
                        <input name="pengarang" id="pengarang" placeholder="pengarang" class="form-control form-control-user" type="text" value="<?= $buku['pengarang_buku'] ?>">
                    </div>

                    <div class=" form-group">
                        <input name="keterangan" id="keterangan" placeholder="keterangan" class="form-control form-control-user" type="text" value="<?= $buku['keterangan_buku'] ?>">
                    </div>

                    <input type="hidden" name="foto_buku" value="<?= $buku['foto_buku'] ?>">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Ubah
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>