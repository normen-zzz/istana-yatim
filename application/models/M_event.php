<?php

class M_event extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('acara')->result();
    }

    public function getDataArray()
    {
        return $this->db->get('acara')->result_array();
    }


    public function detail_acara($id = null)
    {
        $query = $this->db->get_where('acara', array('id' => $id))->row();
        return $query;
    }

    public function acaraWhere($where)
    { 
        return $this->db->get_where('acara', $where);
    }

    public function delete_acara($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE acara SET id_acara = @num := (@num+1);");
        $this->db->query("ALTER TABLE acara AUTO_INCREMENT = 1;");
    }

    public function update_acara($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hitung_acara(){
        return $this->db->count_all_results('acara');
    }
}
