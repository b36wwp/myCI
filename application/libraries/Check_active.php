<?php

class Check_active{

  function __construct(){
    date_default_timezone_set('Asia/Bangkok'); //Timezone
  }


  function check_is_active($expired_date){

    $today = date('Y-m-d'); //วันที่ปัจจุบัน

    if($today > $expired_date){
      echo $result = "
      <i class='text-danger glyphicon glyphicon-alert' style='font-size:1.5em;'></i>
      <br />
      <span class='text-danger'>บัตรสมาชิกหมดอายุแล้ว</span>
      ";
      return $result;
    }else{
      echo $result = "
      <i class='text-success glyphicon glyphicon-saved' style='font-size:1.5em;'></i>
      <br />
      <span class='text-success'>ยังคงเป็นสมาชิก</span>
      ";
      return $result;
    }
  }

} //class



 ?>
