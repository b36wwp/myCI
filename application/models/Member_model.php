<?php
  class Member_model extends CI_Model{
    function __construct(){
        parent:: __construct();
    }

    function update_member_data_model(){

      //รับค่า POST
      $member_id = $this->input->post('member_id');
      $member_code = $this->input->post('member_code');
      $member_fname = $this->input->post('member_fname');
      $member_lname = $this->input->post('member_lname');
      $member_gender = $this->input->post('member_gender');
      $member_citizen_id = $this->input->post('member_citizen_id');
      $member_tel = $this->input->post('member_tel');
      $member_address = $this->input->post('member_address');
      $member_expired_date = $this->input->post('member_expired_date');

      //update member data
      $sql1 = "UPDATE member
                SET member_code = '$member_code',
                    member_fname = '$member_fname',
                    member_lname = '$member_lname',
                    member_gender = '$member_gender',
                    member_citizen_id = '$member_citizen_id',
                    member_tel = '$member_tel',
                    member_address = '$member_address',
                    member_expired_date = '$member_expired_date',
                    member_datetime_update = Now()
                    WHERE member_id = '$member_id'
                    ";
      $result = $this->db->query($sql1);

      return $result;

    } //update_member_data_model Function


    function add_member_data_model(){

      $member_code = $this->input->post('member_code');
      $member_fname = $this->input->post('member_fname');
      $member_lname = $this->input->post('member_lname');
      $member_gender = $this->input->post('member_gender');
      $member_citizen_id = $this->input->post('member_citizen_id');
      $member_tel = $this->input->post('member_tel');
      $member_address = $this->input->post('member_address');
      $member_expired_date = $this->input->post('member_expired_date');
      $user_session_id = $this->input->post('user_session_id');

      //ตรวจสอบว่ามีการกรอกหมายเลขบัตรประชาชนเป็น 0000000000000,1111111111111 หรือไม่
      //ถ้ามีจะย้อนกลับไป และแสดง Alert ผ่านทาง Modal
      if($member_citizen_id == "0000000000000"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "1111111111111"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "2222222222222"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "3333333333333"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "44444444444444"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "5555555555555"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "6666666666666"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "7777777777777"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "8888888888888"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "9999999999999"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "1234567890123"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "3210987654321"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "1212121212121"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "2121212121212"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "6969696969696"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "9696969696969"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }else if($member_citizen_id == "1112223334445"){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?allow_citizen_id=no";
        redirect($url);
      }

      //เช็คว่าหมายเลขบัตรประจำตัวประชาชนที่กรอกมามีอยู่ในระบบแล้วหรือไม่ ถ้ามีจะแสดง Alert ผ่นทาง Modal
      $sql_check_citizen_id = "SELECT * FROM member WHERE member_citizen_id = '$member_citizen_id'";
      $res_check_citizen_id = $this->db->query($sql_check_citizen_id);
      $res_num_row = $res_check_citizen_id->num_rows();
      if($res_num_row>0){
        $baseurl=base_url();
        $url = $baseurl.$url="admin/admin/add_member/"."?have_citizen_id_already=yes";
        redirect($url);
      }

      //update member data
      $sql1 = "INSERT INTO member
                (member_code,
                    member_fname,
                    member_lname,
                    member_gender,
                    member_citizen_id,
                    member_tel,
                    member_address,
                    member_expired_date,
                    member_date_create,
                    member_datetime_create)
                    VALUES
                    ('$member_code',
                      '$member_fname',
                      '$member_lname',
                      '$member_gender',
                      '$member_citizen_id',
                      '$member_tel',
                      '$member_address',
                      '$member_expired_date',
                      Now(),
                      Now()
                    )
                    ";
      $result = $this->db->query($sql1);

      return $result;

   
    } //add_member_data_model Function


    function show_member_list(){

      $sql = "SELECT * FROM member ORDER BY member_datetime_create DESC";
      $query = $this->db->query($sql)->result_array();
      return $query;

    } //show_member_list Function


  } //Model Class

 ?>
