<?php
class Web extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('Setting_model');
    }

    public function index()
    {
        $data['categories'] = $this->category_model->get_category();
        $this->load->view("webcam", $data);
    }

    public function checkCamValue()
    {
        // 接收 POST 請求
        $resultText = $this->input->post('resultText');
        $category_name = $this->input->post('category_name');
        $category_data = $this->category_model->get_category_by_category_name($category_name);

        // $urlValue = $this->Setting_model->getCamValue($resultText);
        $url = $this->Setting_model->get_setting_url();
        if ($category_data && $category_data->url) {
            $fullUrl = $category_data->url . $resultText;
            echo $fullUrl;
            $this->insertIntoUrlLog($fullUrl);
        } else {
            echo '尚無設定網址路徑';
        }
    }

    private function insertIntoUrlLog($url)
    {
        $data = array(
            'log' => $url,
            'createtime' => date("Y-m-d H:i:s")
        );
        $this->db->insert('url_log', $data);
    }
}
