<?php

class M_ceritasantri extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('ceritasantri');
    }

    public function detail_ceritasantri($id = null)
    {
        $query = $this->db->get_where('ceritasantri', array('id' => $id))->row();
        return $query;
    }

    public function ceritasantriWhere($where)
    { 
        return $this->db->get_where('ceritasantri', $where);
    }

    public function delete_ceritasantri($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE ceritasantri SET id_ceritasantri = @num := (@num+1);");
        $this->db->query("ALTER TABLE ceritasantri AUTO_INCREMENT = 1;");
    }

    public function update_ceritasantri($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

     public function hitung_ceritasantri(){
        return $this->db->count_all_results('ceritasantri');
    }
}
