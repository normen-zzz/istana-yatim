<?php

class M_slidefoto extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('slidefoto');
    }

    public function detail_slidefoto($id = null)
    {
        $query = $this->db->get_where('slidefoto', array('id' => $id))->row();
        return $query;
    }

    public function slidefotoWhere($where)
    { 
        return $this->db->get_where('slidefoto', $where);
    }

    public function delete_slidefoto($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE slidefoto SET id_slidefoto = @num := (@num+1);");
        $this->db->query("ALTER TABLE slidefoto AUTO_INCREMENT = 1;");
    }

    public function update_slidefoto($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}