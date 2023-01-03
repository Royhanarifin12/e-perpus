<div class="container-fluid">
    <!-- <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">LIST BUKU</h1>
    <div class="row">

        <?php foreach ($buku as $b) : ?>
            <div class="col-4 mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="<?= base_url('assets/img/profile/') . $b['foto_buku'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $b['judul_buku'] ?></h5>
                        <h5 class="card-title"><?= $b['tahun_buku'] ?></h5>
                        <h5 class="card-title"><?= $b['pengarang_buku'] ?></h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text"><?= $b['keterangan_buku'] ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
</div>