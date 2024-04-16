<?php
class MY_Form_validation extends CI_Form_validation
{
    public function __construct($config = array())
    {
        parent::__construct($config);
        $this->set_custom_error_messages();
    }

    public function set_custom_error_messages()
    {
        $this->set_message('required', '%s 欄位為必填');
    }
}
