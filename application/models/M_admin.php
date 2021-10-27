<?php

class M_admin extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('pengurus');
    }

    public function detail_admin($id = null)
    {
        $query = $this->db->get_where('pengurus', array('id' => $id))->row();
        return $query;
    }

    public function adminWhere($where)
    { 
        return $this->db->get_where('pengurus', $where);
    }

    public function delete_admin($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE pengurus SET id_pengurus = @num := (@num+1);");
        $this->db->query("ALTER TABLE pengurus AUTO_INCREMENT = 1;");
    }

    public function update_admin($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hitung_admin(){
        return $this->db->count_all_results('pengurus');
    }
}
