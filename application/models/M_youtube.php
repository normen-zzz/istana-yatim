<?php

class M_youtube extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('youtube');
    }

    public function detail_youtube($id = null)
    {
        $query = $this->db->get_where('youtube', array('id' => $id))->row();
        return $query;
    }

    public function youtubeWhere($where)
    { 
        return $this->db->get_where('youtube', $where);
    }

    public function delete_youtube($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE youtube SET id_youtube = @num := (@num+1);");
        $this->db->query("ALTER TABLE youtube AUTO_INCREMENT = 1;");
    }

    public function update_youtube($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
