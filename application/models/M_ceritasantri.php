<?php

class M_ceritasantri extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('ceritasantri');
    }

    public function get_data()
    {
        return $this->db->get('ceritasantri')->result();
    }

    function tampil_datalimit($limit, $start){
        return $this->db->get('ceritasantri', $limit, $start);

    }

    public function search($keyword){
            $this->db->select('*');
            $this->db->from('ceritasantri');
            $this->db->like('judul_ceritasantri',$keyword);
            return $this->db->get();
                 }

    public function detail_ceritasantri($id = null)
    {
        $query = $this->db->get_where('ceritasantri', array('id' => $id))->row();
        return $query;
    }

    public function ceritasantriWhere($where)
    { 
        return $this->db->get_where('ceritasantri', $where);
    }

    public function delete_ceritasantri($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE ceritasantri SET id_ceritasantri = @num := (@num+1);");
        $this->db->query("ALTER TABLE ceritasantri AUTO_INCREMENT = 1;");
    }

    public function update_ceritasantri($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    public function update_counter($slug) {
    // return current article views 
    $this->db->where('slug_ceritasantri', urldecode($slug));
    $this->db->select('lihat_ceritasantri');
    $count = $this->db->get('ceritasantri')->row();
    // then increase by one 
    $this->db->where('slug_ceritasantri', urldecode($slug));
    $this->db->set('lihat_ceritasantri', ($count->lihat_ceritasantri + 1));
    $this->db->update('ceritasantri');
    }

    public function ceritasantri_populer(){

    $this->db->from('ceritasantri');
    $this->db->order_by("lihat_ceritasantri", "desc");
    $this->db->limit('4');
    return $this->db->get(); 

    }

    public function hitung_ceritasantri(){
        return $this->db->count_all_results('ceritasantri');
    }

}
