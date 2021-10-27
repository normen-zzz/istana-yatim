<?php

class M_form extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('form');
    }

    public function detail_form($id = null)
    {
        $query = $this->db->get_where('form', array('id' => $id))->row();
        return $query;
    }

    public function formWhere($where)
    { 
        return $this->db->get_where('form', $where);
    }

    public function delete_form($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE form SET id_form = @num := (@num+1);");
        $this->db->query("ALTER TABLE form AUTO_INCREMENT = 1;");
    }

    public function update_form($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function joinAcara($where)
    {
        $this->db->select('*');
        $this->db->from('form');
        $this->db->where($where);
        $this->db->join('acara','acara.id_acara = form.acara_form');
        return $this->db->get();
    }


    public function duplikatForm(){
        $this->db->select('DISTINCT(nomor_form), nama_form, id_form, kelamin_form');
        $this->db->group_by('nomor_form'); 
        return $this->db->get('form');
    }


    public function duplikatFormall()
    {
        $this->db->select('DISTINCT(nomor_formall),nama_formall,id_formall');
        $this->db->group_by('nomor_formall');
        $this->db->order_by('id_formall');
        return $this->db->get('formall');
    }

    public function duplikatFormWhere($where){
        $this->db->select('*');
        $this->db->from('form');
        $this->db->where($where);
        $this->db->join('acara','acara.id_acara = form.acara_form'); 
        $this->db->group_by('nomor_form');
        return $this->db->get();
    }
}
