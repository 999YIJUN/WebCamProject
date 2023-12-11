<?php
class Web extends CI_Controller
{
    public function index()
    {
        $this->load->view("webcam");
    }

    public function checkCamValue()
    {
        // 接收 POST 請求
        $resultText = $this->input->post('resultText');
        $this->load->model('Setting_model');

        // $urlValue = $this->Setting_model->getCamValue($resultText);
        $url = $this->Setting_model->get_setting_url();
        if ($url) {
            $fullUrl = $url->url . $resultText;
            echo $fullUrl;
            $this->insertIntoUrlLog($fullUrl);
        }

        // if ($urlValue) {
        //     $a = $urlValue->url;
        //     $lastPart = basename($a);
        //     echo $lastPart;

        //$this->insertIntoUrlLog($a);
        // } else {
        //     echo "無此資料";
        // }
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
