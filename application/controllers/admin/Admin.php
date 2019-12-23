<?php

  class Admin extends CI_Controller{

      function __construct(){
        parent::__construct();

        //เรียกใช้ฟังก์ชั่น Check Session
        $this->__check_session();

        //load Model
        $this->load->model('member_model', 'member'); //ชื่อ Model, ชื่อแทน Alias
        //load Libary
        $this->load->library('check_active'); //เปิดใช้งาน library mydate
      }

      function index(){
        //ค่า user_id จาก session
        $user_id = $this->session->userdata('user_id');

        //เรียกฟังก์ชั่นใน Model
        $result = $this->member->show_member_list();
        $data['member'] = $result;

        //เรียกใช้งาน libary check_active
        $data['ckeck_is_active'] = $this->check_active;

        //แสดงผลหน้า view
        $this->load->view("admin/web-head");
        $this->load->view("admin/top-nav");
        $this->load->view("admin/manage_member", $data);
        $this->load->view("admin/footer");
        $this->load->view("admin/web-footer");
        
      }


      #ฟังก์ชั่น Check Session ถ้าไม่มี Session จะเด้งกลับไปหน้า Login
      function __check_session(){
        //ค่า user_id จาก session
        $user_id = $this->session->userdata('user_id');

        if($user_id == ""){
          $baseurl=base_url();
          $url = $baseurl.$url="login";
          redirect($url);
        }

      } //__check_session()



      function delete_member($id){

        #Delete Data from database
        $sql ="DELETE FROM member WHERE member_id = $id";
        $result = $this->db->query($sql);

        #Delete File
        // $file = "uploads/$filename";
        // unlink($file);

        if($result){
          $baseurl=base_url();
          $url = $baseurl.$url="admin/admin";
          redirect($url);
        }else{
          echo "Error to Delete Member, Please Try Again Later...";
        }

      } //delete_member()


      function member_detail($id){

        //ข้อมูลสมาชิก
        $sql = "SELECT  * FROM member WHERE member_id = $id";
        $query = $this->db->query($sql)->row();
        $data['member'] = $query;
        $member_code = $data['member']->member_code;

        //เรียกใช้งาน libary check_active
        $data['ckeck_is_active'] = $this->check_active;

        $this->load->view("admin/web-head");
        $this->load->view("admin/top-nav");
        $this->load->view("admin/member_detail", $data);
        $this->load->view("admin/footer");
        $this->load->view("admin/web-footer");


      } //member_detail()


      function edit_member($id){
        $sql = "SELECT  * FROM member WHERE member_id = $id";
        $query = $this->db->query($sql)->row();
        $data['member'] = $query;

        $this->load->view("admin/web-head");
        $this->load->view("admin/top-nav");
        $this->load->view("admin/edit_member", $data);
        $this->load->view("admin/footer");
        $this->load->view("admin/web-footer");

      } //edit_member()


      function update_member_data($id){

         $result = $this->member->update_member_data_model($id); //เรียกใช้งานฟังก์ชั่น update_member_data_model() ใน Model

         if($result){
           $baseurl=base_url();
           $url = $baseurl.$url="admin/admin";
           redirect($url);
         }else{
           echo "Error to Update Member, Please Try Again Later...";
         }


      } //update_member_data()

      function add_member(){
        $this->load->view("admin/web-head");
        $this->load->view("admin/top-nav");
        $this->load->view("admin/add_member");
        $this->load->view("admin/footer");
        $this->load->view("admin/web-footer");
      } //add_member()


      function add_member_data(){

        $result = $this->member->add_member_data_model(); //เรียกใช้งานฟังก์ชั่นใน Model

        if($result){
          $baseurl=base_url();
          $url = $baseurl.$url="admin/admin";
          redirect($url);
        }else{
          echo "Error to Add a New Member, Please Try Again Later...";
        }

      } //add_member_data




  } //Admin Class


 ?>
