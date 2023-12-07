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

        $urlValue = $this->Setting_model->getCamValue($resultText);

        if ($urlValue) {
            $a = $urlValue->url;
            $lastPart = basename($a);
            echo $lastPart;

            $this->insertIntoUrlLog($a, $urlValue->createtime);
        } else {
            echo "無此資料";
        }
    }

    private function insertIntoUrlLog($url, $createtime)
    {
        $data = array(
            'log' => $url,
            'createtime' => $createtime
        );

        $this->db->insert('url_log', $data);
    }
}
