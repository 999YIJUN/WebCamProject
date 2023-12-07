<?php
class Log_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_log($keyword = '')
    {
        if (!empty($keyword)) {

            $this->db->like('log', $keyword);
        }

        $query = $this->db->get("url_log");
        return $query->result_array();
    }

    public function get_all_logs()
    {
        $query = $this->db->get("url_log");
        return $query->result_array();
    }
}
