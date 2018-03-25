<?php

class Comments extends MY_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('string');
    $this->load->library('form_validation');
    $this->load->model('Discussions_model');
    $this->load->model('Comments_model');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
  }

  public function index(){
    if ($this->input->post()) {
      $ds_id = $this->input->post('ds_id');
    } else {
      $ds_id = $this->uri->segment(3);
    }

    $page_data['discussion_query'] = $this->Discussions_model->fetch_discussion($ds_id);
    $page_data['comment_query'] = $this->Comments_model->fetch_comments($ds_id);
    $page_data['ds_id'] = $ds_id;
    // print_r ($page_data['discussion_query']->result());

    $this->load->view('templates/header');
    $this->load->view('comments/view', $page_data);
    $this->load->view('templates/footer');



  }
}

 ?>
