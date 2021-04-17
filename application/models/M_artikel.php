<?php

class M_artikel extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('artikel');
    }

    public function detail_artikel($id = null)
    {
        $query = $this->db->get_where('artikel', array('id' => $id))->row();
        return $query;
    }

    public function artikelWhere($where)
    { 
        return $this->db->get_where('artikel', $where);
    }

    public function delete_artikel($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE artikel SET id_artikel = @num := (@num+1);");
        $this->db->query("ALTER TABLE artikel AUTO_INCREMENT = 1;");
    }

    public function update_artikel($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
