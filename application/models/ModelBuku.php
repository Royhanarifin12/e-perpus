<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelBuku extends CI_Model
{
    public function getBuku()
    {
        return $this->db->get('buku')->result_array();
    }
    public function simpanBuku($data = null)
    {
        $this->db->insert('buku', $data);
    }
    public function hapusBuku($id_buku)
    {
        $this->db->where('id_buku', $id_buku);
        $this->db->delete('buku');
    }

    public function getBukuDetail($where)
    {
        $this->db->where('id_buku', $where);
        return $this->db->get('buku')->result_array();
    }

    public function getBukubyid($id_buku)
    {
        // return $this->db->get('buku')->result_array();
        return $this->db->get_where('buku', ['id_buku' => $id_buku])->row_array();
    }

    public function ubahBuku()
    {
        $data = [
            'id_buku' => $this->input->post('id'),
            'judul_buku' => $this->input->post('judul'),
            'tahun_buku' => $this->input->post('tahun'),
            'penerbit_buku' => $this->input->post('penerbit'),
            'foto_buku' => $this->input->post('foto_buku'),
            'pengarang_buku' => $this->input->post('pengarang'),
            'keterangan_buku' => $this->input->post('keterangan'),
        ];
        $this->db->where('id_buku', $data['id_buku']);

        $this->db->update('buku', $data);
    }
}
