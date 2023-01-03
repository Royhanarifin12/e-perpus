<div class="modal fade" id="kategoriBaruModal" tabindex="-1" role="dialog" aria-labelledby="kategoriBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriBaruModalLabel">Form Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku/tambahBuku'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="judul" placeholder="Judul Buku" class="form-control form-control-user">
                    </div>

                    <div class="form-group">
                        <input type="text" name="tahun" placeholder="tahun Buku" class="form-control form-control-user">
                    </div>

                    <div class=" form-group">
                        <input name="penerbit" placeholder="penerbit" class="form-control form-control-user" type="text">
                    </div>

                    <div class=" form-group">
                        <input name="pengarang" placeholder="pengarang" class="form-control form-control-user" type="text">
                    </div>

                    <div class=" form-group">
                        <input name="keterangan" placeholder="keterangan" class="form-control form-control-user" type="text">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Tambah
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>