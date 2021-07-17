<?php
class User extends CI_Controller{
    
    function index(){
        $this->load->model('User_model');
        $users = $this->User_model->all();
        $data = array();
        $data['users'] = $users;
        $this->load->view('list',$data);
    }

    function create(){
        $this->load->model('User_model');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');

        if($this->form_validation->run() == False){
            $this->load->view('create');
        }
        else{
            $formData = array();
            $formData['name'] = $this->input->post('name');
            $formData['email'] = $this->input->post('email');
            $formData['created_on'] = date('Y-m-d');
            $this->User_model->create($formData);
            $this->session->set_flashdata('success','Record Added Successfully');
            redirect(base_url().'index.php/user/index');
        }
        
    }

    function edit($userId){
        $this->load->model('User_model');
        $user = $this->User_model->getUser($userId);
        $data = array();
        $data['user'] = $user;
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        if($this->form_validation->run() == False){
            $this->load->view('edit',$data);
        }
        else{
            $formData = array();
            $formData['name'] = $this->input->post('name');
            $formData['email'] = $this->input->post('email');
            $this->User_model->updateUser($userId,$formData);
            $this->session->set_flashdata('success','Record Added Successfully');
            redirect(base_url().'index.php/user/index');
        }
    }

    function delete($userId){
        $this->load->model('User_model');
        $user = $this->User_model->getUser($userId);
        if(empty($user)){
            $this->session->set_flashdata('error','Record not found');
            redirect(base_url().'index.php/user/index');
        }
        $this->User_model->deleteUser($userId);
        //$this->session->set_flashdata('success','Record Deleted Successfully');
            redirect(base_url().'index.php/user/index');
    }
}
?>