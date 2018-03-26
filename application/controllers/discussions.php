<?php

class Discussions extends MY_Controller{

  function __construct(){
    parent::__construct();
    $this->load->helper('string');
    // $this->load->library('encrypt');
    $this->load->model('Discussions_model');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters(
      '<div class="alert alert-danger">','</div>'
    );
  }

  public function index(){
    if ($this->uri->segment(3)) {
      $filter = $this->uri->segment(4);
      $direction = $this->uri->segment(5);
      $page_data['dir'] = $this->uri->segment(5);
    } else {
      $filter = null;
      $direction = null;
      $page_data['dir'] = 'DESC';
    }

    $page_data['query'] = $this->Discussions_model->fetch_discussions($filter, $direction);

    // Load Views
    $this->load->view('templates/header');
    $this->load->view('discussions/view', $page_data);
    $this->load->view('templates/footer');

  }

  public function create(){

    // $this->form_validation->set_rules('usr_name', 'Username', 'required');
    $this->form_validation->set_rules('usr_email', 'User Email', 'required');
    $this->form_validation->set_rules('ds_title', 'Discussion Title', 'required');
    $this->form_validation->set_rules('ds_body', 'Discussion Body', 'required');

    if ($this->form_validation->run() == false) {
      // Load Views
      $this->load->view('templates/header');
      $this->load->view('discussions/new');
      $this->load->view('templates/footer');
    } else {
      $data = array(
        'usr_name' => $this->input->post('usr_name'),
        'usr_email' => $this->input->post('usr_email'),
        'ds_title' => $this->input->post('ds_title'),
        'ds_body' => $this->input->post('ds_body')
      );

      if ($ds_id = $this->Discussions_model->create($data)) {
        redirect('comments/index/' . $ds_id);
      } else {
        //error
        //load view and flash session message
      }

    }

  }

  public function flag(){
    $ds_id = $this->uri->segment(3);
    if ($this->Discussions_model->flag($ds_id)) {
      redirect('discussions/');
    } else {
      //error
      //load view and flash session error
    }

  }
}
