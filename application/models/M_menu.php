<?php

class M_menu extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('menu');
    }

    public function detail_menu($id = null)
    {
        $query = $this->db->get_where('menu', array('id' => $id))->row();
        return $query;
    }

    public function menuWhere($where)
    { 
        return $this->db->get_where('menu', $where);
    }

    public function delete_menu($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE menu SET id_menu = @num := (@num+1);");
        $this->db->query("ALTER TABLE menu AUTO_INCREMENT = 1;");
    }

    public function update_menu($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
