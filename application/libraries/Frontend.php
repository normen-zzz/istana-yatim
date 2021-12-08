<?php
class Frontend
{
    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance();
    }

    function default($content, $data = NULL)
    {
        $data['template']['body'] = $this->_ci->load->view($content, $data, TRUE);
        $data['template']['metadata'] = '';
        $data['template']['css'] = [];
        $data['template']['js'] = [];
        $this->_ci->load->view('layouts/default', $data);
    }
}
