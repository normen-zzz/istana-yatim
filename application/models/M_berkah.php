<?php

class M_berkah extends CI_Model
{

    public function get_berkah($slug = FALSE)
    {
        if ($slug === FALSE) {

            return $this->db->get('berkah')->result();
        }

        $this->db->select('berkah.*');
        $query = $this->db->get_where('berkah', array('slug_berkah' => $slug));
        return $query->row();
    }

    public function get_data()
    {
        return $this->db->get('berkah')->result();
    }

    public function tampil_data()
    {
        return $this->db->get('berkah');
    }

    function tampil_datalimit($limit, $start){
        return $this->db->get('berkah', $limit, $start);

    }

    public function search($keyword){
            $this->db->select('*');
            $this->db->from('berkah');
            $this->db->like('judul_berkah',$keyword);
            return $this->db->get();
        }

    public function detail_berkah($id = null)
    {
        $query = $this->db->get_where('berkah', array('id' => $id))->row();
        return $query;
    }

    public function berkahWhere($where)
    { 
        return $this->db->get_where('berkah', $where);
    }

    public function delete_berkah($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE berkah SET id_berkah = @num := (@num+1);");
        $this->db->query("ALTER TABLE berkah AUTO_INCREMENT = 1;");
    }

    public function update_berkah($where, $table)
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
    $this->db->where('slug_berkah', urldecode($slug));
    $this->db->select('lihat_berkah');
    $count = $this->db->get('berkah')->row();
    // then increase by one 
    $this->db->where('slug_berkah', urldecode($slug));
    $this->db->set('lihat_berkah', ($count->lihat_berkah + 1));
    $this->db->update('berkah');
    }

    public function berkah_populer(){

    $this->db->from('berkah');
    $this->db->order_by("lihat_berkah", "desc");
    $this->db->limit('4');
    return $this->db->get(); 

    }

    public function hitung_berkah(){
        return $this->db->count_all_results('berkah');
    }


    public function get_current_page($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('berkah');
        $rows = $query->result();
 
        if ($query->num_rows() > 0) {
            foreach ($rows as $row) {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() {
        return $this->db->count_all('berkah');
    }

}
