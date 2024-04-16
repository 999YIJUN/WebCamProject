<?php
defined('BASEPATH') or exit('No direct script access allowed');

class category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_category()
    {
        $query = $this->db->get("categories");
        return $query->result();
    }

    public function get_category_by_id($category_id)
    {
        $query = $this->db->get_where('categories', ['category_id' => $category_id]);
        return $query->row();
    }

    public function get_category_by_category_name($category_name)
    {
        $query = $this->db->get_where('categories', ['category_name' => $category_name]);
        return $query->row();
    }

    public function get_category_by_url($url)
    {
        $query = $this->db->get_where('categories', ['url' => $url]);
        return $query->row();
    }

    public function insert_category($data)
    {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }

    public function update_category($id, $data)
    {
        $this->db->where("category_id", $id);
        $this->db->update("categories", $data);
    }

    public function delete_category($category_name)
    {
        $this->db->where('category_name', $category_name);
        $this->db->delete('categories');
        return $this->db->affected_rows();
    }

    // 取前一筆資料
    public function get_previous($url)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('url', $url);
        $this->db->order_by('category_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row();
    }
}
