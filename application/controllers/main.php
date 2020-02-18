<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('main_model');
    }
    public function index()
	{
        $this->load->view('commonhead');
        var_dump($this->load->view('commonhead', '', true));
        
        $this->load->view('main');
        $this->load->view('commonfoot');
    }
    public function get($number)
    {
        $get = $this->main_model->get($number);
        $this->load->view('commonhead');
        $this->load->view('get', array('get' => $get));
        $this->load->view('commonfoot');
    }
    public function gets() 
    {
        $gets = $this->main_model->gets();
        $this->load->view('commonhead');
        $this->load->view('gets', array('gets'=>$gets));
        $this->load->view('commonfoot');
    }
    public function edit($count)
    {
        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $pass = $this->input->post('password');
        $this->load->view('commonhead');
        $chk = $this->main_model->check($pass, $count);
        if ($chk) {
            echo($this->main_model->update($name, $title, $content, $count, $pass));
        } else {
            echo "<p>비밀번호를 확인해주세요.</p>";
        }
        $this->load->view('commonfoot');
    }
    public function insert()
    {
        $this->load->view('commonhead');
        $this->load->view('insert');
        $this->load->view('commonfoot');
    }
    public function insertion()
    {
        $this->load->view('commonhead');
        $name = $this->input->post('name');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $password = $this->input->post('password');
        $insertion = $this->main_model->insert($name, $title, $content, $password);
        echo $insertion;
        $this->load->view('commonfoot');
    }

}

?>
