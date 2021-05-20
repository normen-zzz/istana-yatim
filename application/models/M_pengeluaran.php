<?php

class M_pengeluaran extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('pengeluaran');
    }

    public function detail_bank($id = null)
    {
        $query = $this->db->get_where('pengeluaran', array('id' => $id))->row();
        return $query;
    }

    public function pengeluaranWhere($where)
    { 
        return $this->db->get_where('pengeluaran', $where);
    }

    public function delete_bank($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE pengeluaran SET id_pengeluaran = @num := (@num+1);");
        $this->db->query("ALTER TABLE pengeluaran AUTO_INCREMENT = 1;");
    }

    public function update_pengeluaran($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
