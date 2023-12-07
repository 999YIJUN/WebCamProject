<?php
class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("setting_model");
    }

    public function index()
    {
        $data["setting"] = $this->setting_model->get_setting();
        $this->load->view("setting_view", $data);
    }

    public function add()
    {
        $this->load->view("setting_add");
    }

    public function create()
    {
        $url = $this->input->post("url");

        $existingSetting = $this->setting_model->get_setting_by_url($url);

        if ($existingSetting) {
            $this->session->set_flashdata('error_message', '網址已存在');

            redirect('setting/add?show_modal=true');
        } else {
            $settingData = array("url" => $url);
            $this->setting_model->insert_setting($settingData);
            $this->session->set_flashdata('success_message', '新增成功');

            redirect('setting/add');
        }
    }

    public function edit($id)
    {
        $data["setting"] = $this->setting_model->get_setting_by_id($id);
        $this->load->view("setting_edit", $data);
    }

    public function update()
    {
        $id = $this->input->post("id");
        $url = $this->input->post("url");
        $encoded_id = base64_encode($id);
        $existingSetting = $this->setting_model->get_setting_by_url($url);

        if ($existingSetting && $existingSetting->id !== $id) {
            $this->session->set_flashdata('error_message', '網址已存在');
            redirect("setting/edit/" . $encoded_id . "?show_modal=true");
        } elseif ($existingSetting && $existingSetting->id === $id) {
            $this->session->set_flashdata('error_message', '尚未修改');
            redirect("setting/edit/" . $encoded_id . "?show_modal=true");
        } else {
            $data = array("url" => $url);
            $this->setting_model->update_setting($id, $data);
            $this->session->set_flashdata('success_message', '更新成功');
            redirect("setting/edit/" . $encoded_id);
        }
    }


    public function edit_setting($encoded_id)
    {
        // 解碼編碼後的ID
        $decoded_id = base64_decode(urldecode($encoded_id));

        // 根據解碼後的ID從資料庫中獲取
        $setting = $this->db->get_where('setting', array('id' => $decoded_id))->row_array();

        // 傳遞到view中
        $this->load->view('setting_edit', array('setting' => $setting, 'encoded_id' => $encoded_id));
    }
}
