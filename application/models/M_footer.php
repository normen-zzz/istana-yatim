<?php

class M_footer extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('footer');
    }

    public function detail_footer($id = null)
    {
        $query = $this->db->get_where('footer', array('id' => $id))->row();
        return $query;
    }

    public function footerWhere($where)
    { 
        return $this->db->get_where('footer', $where);
    }

    public function delete_footer($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE footer SET id_footer = @num := (@num+1);");
        $this->db->query("ALTER TABLE footer AUTO_INCREMENT = 1;");
    }

    public function update_footer($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
