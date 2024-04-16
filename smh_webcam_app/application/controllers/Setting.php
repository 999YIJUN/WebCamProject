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
        $this->load->model('category_model');
        $data['categories'] = $this->category_model->get_category();
        $data["setting"] = $this->setting_model->get_setting();
        $this->load->view("setting_view", $data);
    }

    // 新增
    public function insert()
    {
        $this->form_validation->set_rules('url', '網址', 'required');

        $this->form_validation->set_custom_error_messages();

        if ($this->form_validation->run() === FALSE) {
            $response['success'] = false;
            $response['errors'] = array(
                'url' => form_error('url'),
            );
        } else {
            $url = $this->input->post('url');
            $isset_url = $this->setting_model->get_setting_by_url($url);
            $response['success'] = true;
            $response['errors'] = array(
                'url' => '',
            );
            // 檢查網址是否已存在
            if ($isset_url) {
                $response['success'] = false;
                $response['errors'] = [
                    'url' =>   '此網址已存在',
                ];
            } else {
                $setting_data = [
                    "url" => $this->input->post('url'),
                ];
                $this->setting_model->insert_setting($setting_data);
            }
        }

        echo json_encode($response);
    }

    public function edit()
    {
        $this->form_validation->set_rules('e_url', 'url', 'required');
        $this->form_validation->set_custom_error_messages();
        $id = $this->session->userdata('id');

        if ($this->form_validation->run() === FALSE) {
            $response['success'] = false;
            $response['errors'] = array(
                'url' => form_error('e_url'),
            );
        } else {
            $url = $this->input->post('e_url');
            $isset_url = $this->setting_model->get_setting_by_url($url);
            if ($isset_url) {
                $response['success'] = false;
                if ($isset_url->id == $id) {
                    $response['errors'] = array(
                        'url' => '尚未修改',
                    );
                } else {
                    $response['errors'] = array(
                        'url' => '此網址已存在',
                    );
                }
            } else {
                $response['success'] = true;
                $setting_data = [
                    "url" => $url
                ];
                $this->setting_model->update_setting($id, $setting_data);
            }
        }

        echo json_encode($response);
    }

    // 刪除
    public function delete()
    {
        $Id = $this->input->post('Id');
        $deleted = $this->setting_model->delete_setting($Id);
        if ($deleted) {
            $response['status'] = 'success';
            $response['message'] = 'URL已成功刪除';
        } else {
            $response['status'] = 'error';
            $response['message'] = '無法刪除URL，請稍後再試';
        }
        echo json_encode($response);
    }

    // 取資料
    public function get_setting_data()
    {
        $id = $this->input->post('id');
        $this->session->set_userdata('id', $id);
        $settingData = $this->setting_model->get_setting_by_id($id);
        echo json_encode($settingData);
    }

    // DataTables
    public function get_data_user()
    {
        $this->load->library('ssp');
        $dbDetails = array(
            'host' => $this->db->hostname,
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database
        );
        $table = 'setting';
        $primaryKey = 'id';
        // DataTables 設定
        $columns = array(
            array(
                'db' => 'id', 'dt' => 0
            ),
            array(
                'db' => 'url', 'dt' => 1
            ),
            array(
                'db' => 'modifytime', 'dt' => 2
            ),
            array(
                'db' => 'id',
                'dt' => 3,
                'formatter' => function ($data, $row) {
                    return
                        '<button class="btn btn-sm btn-warning btnEdit" data-id="' . $row['id'] . '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-solid fa-pen"></i> 修改</button>
                    <button class="btn btn-sm btn-danger btnDelete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i> 刪除</button>';
                }
            )
        );

        $output = $this->ssp->simple($this->input->get(), $dbDetails, $table, $primaryKey, $columns);

        echo json_encode($output);
    }
}
