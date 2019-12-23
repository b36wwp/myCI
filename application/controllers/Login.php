<?php

  class Login extends CI_Controller{

    function __construct(){
      parent::__construct();
    }

    function index(){
      $this->load->view("web-head");
      $this->load->view("top-nav");
      $this->load->view("login_form");
      $this->load->view("footer");
      $this->load->view("web-footer");
    }

    function login(){

      $username = $this->input->post('username'); //$_POST['username']
      $password = $this->input->post('password'); //$_POST['password']

      #Query Data
      $query = $this->db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
      $result = $query->row();


      #Check have user in database
      if($query->num_rows() > 0){ //พบผู้ใช้งาน

        #ถ้าพบผู้ใช้งานจะทำการดึงค่าจากฐานข้อมูล
        $result_user_id = $result->user_id; //get username in to variable
        $result_username = $result->username; //get username in to variable
        $result_user_status = $result->user_status; //get user_status in to variable

        #Create Session
        $this->session->set_userdata(array('user_id'=>$result_user_id)); //use Session
        $this->session->set_userdata(array('username'=>$result_username)); //use Session
        $this->session->set_userdata(array('user_status'=>$result_user_status)); //use Session


        // echo "ยินดีต้อนรับคุณ: ".$this->session->userdata('username')." ".$this->session->userdata('user_status'); // แสดงค่า session ของ username ที่เก็บค่าได้
        // echo br(2);
        // echo anchor('login/logout', 'ออกจากระบบ');

        if($result_user_status == 999){ //สถานะเป็นผู้ดูแลระบบ
          $baseurl=base_url();
          $url = $baseurl.$url="admin/admin";
          redirect($url);
        }

      

      }else{ //ไม่พบผู้ใช้งาน
        $data['error'] = "ไม่พบบัญชีผู้ใช้งาน, กรุณากรอกบัญชีผู้ใช้งาน และรหัสผ่านที่ถูกต้องอีกครั้ง";
        //load view
        $this->load->view("web-head");
        $this->load->view("top-nav");
        $this->load->view("login_form", $data);
        $this->load->view("footer");
        $this->load->view("web-footer");
      }

    } //Login Function

    function logout(){
      #Remove Session
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('user_status');

      #Redirect
      $baseurl=base_url();
      $url = $baseurl.$url="login";
      redirect($url);

    } //logout Function



  } //Login Class

 ?>
