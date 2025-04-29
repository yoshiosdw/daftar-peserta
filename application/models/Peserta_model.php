<?php
class Peserta_model extends CI_Model {
    
    public function get_all_peserta() {
        return $this->db->get('peserta_pelatihan')->result_array();
    }

    public function get_peserta_by_id($id) {
        return $this->db->get_where('peserta_pelatihan', ['id_peserta' => $id])->row_array();
    }

    public function insert_peserta($data) {
        return $this->db->insert('peserta_pelatihan', $data);
    }

    public function update_peserta($id, $data) {
        $this->db->where('id_peserta', $id);
        return $this->db->update('peserta_pelatihan', $data);
    }

    public function delete_peserta($id) {
        $this->db->where('id_peserta', $id);
        return $this->db->delete('peserta_pelatihan');
    }
}
