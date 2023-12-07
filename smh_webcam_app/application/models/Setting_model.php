<?php
date_default_timezone_set('Asia/Taipei');

class Setting_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_setting()
    {
        //$this->db->select("url, modifytime");
        $query = $this->db->get("setting");
        return $query->result_array();
    }

    public function insert_setting($data)
    {
        $data["createtime"] = date("Y-m-d H:i:s");
        $this->db->insert("setting", $data);
    }

    public function get_setting_by_url($url)
    {
        $query = $this->db->get_where('setting', array('url' => $url));

        if ($query->num_rows() > 0) {
            return $query->row(); // 有多筆結果使用 $query->result() 
        } else {
            return null;
        }
    }

    public function update_setting($id, $data)
    {
        $data["modifytime"] = date("Y-m-d H:i:s");
        $this->db->where("id", $id);
        $this->db->update("setting", $data);
    }

    public function get_setting_by_id($id)
    {
        $query = $this->db->get_where("setting", array("id" => $id));
        return $query->row_array();
    }

    public function getCamValue($resultText)
    {
        $this->db->where('url', $resultText);
        $query = $this->db->get('setting');

        return $query->row();
    }
}
