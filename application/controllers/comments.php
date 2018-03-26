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

  public function add(){
    $this->form_validation->set_rules('comment_name', 'User Name', 'required');
    $this->form_validation->set_rules('comment_email', 'User Email', 'required');
    $this->form_validation->set_rules('comment_body', 'Comment Body', 'required');

    if ($this->form_validation->run() == false) {
      echo "Error validating comment!!!";
      $this->index();
    } else {
      $data = array(
        'cm_body' => $this->input->post('comment_body'),
        'usr_email' => $this->input->post('comment_email'),
        'usr_name' => $this->input->post('comment_name'),
        'ds_id' => $this->input->post('ds_id')
      );
      if ($this->Comments_model->new_comment($data)) {

        redirect('comments/index/' . $data['ds_id']);
        // echo "discussion id is " . $data['ds_id'];
      } else {
        // error
        // load view and flash error message
        echo "error adding comment!!!";
      }

    }

  }

  function flag(){
    $cm_id = $this->uri->segment(4);
    if ($this->Comments_model->flag($cm_id)) {
      redirect('comments/index/' . $this->uri->segment(3));
    } else {
      // error
      // load view and flash sess error
    }

  }
}

 ?>
