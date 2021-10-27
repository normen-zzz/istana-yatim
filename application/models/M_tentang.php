<?php

class M_tentang extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tentang');
    }

    public function get_data()
    {
        return $this->db->get('tentang')->row();
    }

    public function detail_tentang($id = null)
    {
        $query = $this->db->get_where('tentang', array('id' => $id))->row();
        return $query;
    }

    public function tentangWhere($where)
    { 
        return $this->db->get_where('tentang', $where);
    }

    public function delete_tentang($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE tentang SET id_tentang = @num := (@num+1);");
        $this->db->query("ALTER TABLE tentang AUTO_INCREMENT = 1;");
    }

    public function update_tentang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hitung_tentang(){
        return $this->db->count_all_results('tentang');
    }
}
