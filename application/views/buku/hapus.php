<td>
                                <a type="button" class="badge badge-info" data-toggle="modal" data-target="#ubahBuku<?= $dm['id_buku']; ?>">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <a href="<?= base_url('buku/hapusBuku/') . $dm['id_buku']; ?>" onclick="return confirm
                            ('Kamu yakin akan menghapus <?= $dm['judul_buku']; ?> ?');" class="badge badge-danger">
                                    <i class="fas fa-trash"></i> Hapus</a>
                            </td> hap