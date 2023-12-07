<?php
class Log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("log_model");
    }

    public function index()
    {
        $data["url_log"] = $this->log_model->get_all_logs();
        $this->load->view("log_view", $data);
    }
    public function search_log()
    {
        $keyword = $this->input->get('keyword');
        if ($keyword) {
            $data['url_log'] = $this->log_model->get_log($keyword);
        } else {
            $data['url_log'] = $this->log_model->get_all_logs();
        }
        $this->load->view('log_view', $data);
    }
}
