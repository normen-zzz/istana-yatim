<?php

class M_pengeluaran extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('pengeluaran_donasi');
    }

    public function get_data()
    {
        return $this->db->get('pengeluaran_donasi')->result();
    }

    public function detail_bank($id = null)
    {
        $query = $this->db->get_where('pengeluaran_donasi', array('id' => $id))->row();
        return $query;
    }

    public function pengeluaranWhere($where)
    { 
        return $this->db->get_where('pengeluaran_donasi', $where);
    }

    public function delete_pengeluaran($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE pengeluaran_donasi SET id_pengeluaran = @num := (@num+1);");
        $this->db->query("ALTER TABLE pengeluaran_donasi AUTO_INCREMENT = 1;");
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

    public function pengeluaranfilter($where)
    {
        $this->db->select('*');
        $this->db->from('pengeluaran_donasi');
        $this->db->where("DATE_FORMAT(tanggal_pengeluaran,'%Y-%m')", $where);
        return $this->db->get();
    }

    public function pengeluarandonasiperbulan()
    {
     $this->db->select('sum(jumlah_pengeluaran) as total');
     $this->db->from('pengeluaran_donasi');
     $this->db->where("DATE_FORMAT(tanggal_pengeluaran,'%m')", date('m'));
     return $this->db->get();
 }
}
