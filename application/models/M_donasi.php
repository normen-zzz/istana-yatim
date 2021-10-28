<?php

class M_donasi extends CI_Model
{
    public function tampil_data() //menampilkan data
    {
        return $this->db->get('donasi');
    }

    public function get_data() //menampilkan data
    {
        return $this->db->get('donasi')->result();
    }

    public function detail_donasi($id = null)
    {
        $query = $this->db->get_where('donasi', array('id' => $id))->row();
        return $query;
    }

    public function donasiWhere($where)
    { 
        return $this->db->get_where('donasi', $where);
    }

    public function delete_donasi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE donasi SET id_donasi = @num := (@num+1);");
        $this->db->query("ALTER TABLE donasi AUTO_INCREMENT = 1;");
    }

    public function update_donasi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    public function joinBank($where)
    {
        $this->db->select('*');
        $this->db->from('donasi');
        $this->db->where($where);

        $this->db->join('bank','bank.id_bank = donasi.id_bank');
        return $this->db->get();
    }

    public function joinBankfilter($where, $filter)
    {
        $this->db->select('*');
        $this->db->from('donasi');
        $this->db->where($where);
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $filter);
        $this->db->join('bank','bank.id_bank = donasi.id_bank');
        return $this->db->get();
    }


    public function donasiperbulan($where)
    {
     $this->db->select('sum(jumlah) as total');
     $this->db->from('donasi');
     $this->db->where($where);
     $this->db->where("DATE_FORMAT(tanggal,'%m')", date('m'));
     return $this->db->get();
 }

 public function duplikatdonasi()
 {
      $this->db->select('DISTINCT(nowa), nama,id_donasi');
        $this->db->group_by('nowa'); 
        return $this->db->get('donasi');
 }

 

}


