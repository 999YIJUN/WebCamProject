<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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
        $data['settings'] = $this->Setting_model->get_setting();
        $this->load->view('category_view', $data);
    }

    public function insert()
    {
        $this->form_validation->set_rules('category', '分類', 'required');

        $this->form_validation->set_custom_error_messages();

        if ($this->form_validation->run() === FALSE) {
            $response['success'] = false;
            $response['errors'] = array(
                'category' => form_error('category')
            );
        } else {
            $category_name = $this->input->post('category');
            $isset_category = $this->category_model->get_category_by_category_name($category_name);
            $response['success'] = true;
            $response['errors'] = array(
                'category' => '',
            );
            // 檢查網址是否已存在
            if ($isset_category) {
                $response['success'] = false;
                $response['errors'] = [
                    'category' =>   '此分類已存在',
                ];
            } else {
                $category_data = [
                    "category_name" => $this->input->post('category'),
                ];
                $this->category_model->insert_category($category_data);
            }
        }

        echo json_encode($response);
    }

    public function url_edit()
    {
        $url = $this->input->post('selectedUrl');
        $category_name = $this->input->post('category_name');
        $response['success'] = true;

        $category_data = $this->category_model->get_category_by_category_name($category_name);
        $previous_data = $this->category_model->get_previous($url);
        // $response['data'] =  $url;
        if ($previous_data !== null) {
            $previous_id = $previous_data->category_id;
            $response['id'] = $previous_data->category_id;
            $null_data = [
                "url" => null,
            ];
            $this->category_model->update_category($previous_id, $null_data);
        }

        $category_id = $category_data->category_id;
        $data = [
            'url' => $url
        ];
        $this->category_model->update_category($category_id, $data);

        echo json_encode($response);
    }

    public function category_name_edit()
    {
        $category_name = $this->input->post('category_name');
        $category_id = $this->input->post('category_id');

        $category_data = $this->category_model->get_category_by_category_name($category_name);
        if ($category_name == null) {
            $response['message_error'] = true;
        } else {
            if ($category_data) {
                $response['success'] = false;
            } else {
                $response['success'] = true;
                $response['category_name'] = $category_name;
                $data = [
                    'category_name' => $category_name,
                ];
                $this->category_model->update_category($category_id, $data);
            }
        }

        echo json_encode($response);
    }

    public function delete()
    {
        $category_name = $this->input->post('category_name');
        $deleted = $this->category_model->delete_category($category_name);
        if ($deleted) {
            $response['status'] = 'success';
            $response['message'] = 'URL已成功刪除';
        } else {
            $response['status'] = 'error';
            $response['message'] = '無法刪除URL，請稍後再試';
        }
        echo json_encode($response);
    }
}
