<?php

class M_bank extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('bank');
    }

    public function detail_bank($id = null)
    {
        $query = $this->db->get_where('bank', array('id' => $id))->row();
        return $query;
    }

    public function bankWhere($where)
    { 
        return $this->db->get_where('bank', $where);
    }

    public function delete_bank($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE bank SET id_bank = @num := (@num+1);");
        $this->db->query("ALTER TABLE bank AUTO_INCREMENT = 1;");
    }

    public function update_bank($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
