<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  //Bootstrap3 Data Table
  $(document).ready(function() {
    $('#member_table').DataTable();
  } );
</script>


<script type="text/javascript">

  function memberFormValidation(){

    var member_code = document.getElementById("member_code");
    var member_fname = document.getElementById("member_fname");
    var member_lname = document.getElementById("member_lname");
    var member_gender = document.getElementById("member_gender");
    var member_citizen_id = document.getElementById("member_citizen_id");
    var member_tel = document.getElementById("member_tel");
    var member_address = document.getElementById("member_address");
    var member_expired_date = document.getElementById("member_expired_date");

    if(!member_code.checkValidity()){
      document.getElementById("member_code_message").innerHTML = "กรุณาระบุหมายเลขบัตรสมาชิกด้วยครับ";
    }else{
      document.getElementById("member_code_message").innerHTML = "";
    }

    if(!member_fname.checkValidity()){
      document.getElementById("member_fname_message").innerHTML = "กรุณาระบุชื่อด้วยครับ";
    }else{
      document.getElementById("member_lname_message").innerHTML = "";
    }

    if(!member_lname.checkValidity()){
      document.getElementById("member_lname_message").innerHTML = "กรุณาระบุนามสกุลด้วยครับ";
    }else{
      document.getElementById("member_lname_message").innerHTML = "";
    }

    if(!member_gender.checkValidity()){
      document.getElementById("member_gender_message").innerHTML = "กรุณาระบุเพศด้วยครับ";
    }else{
      document.getElementById("member_gender_message").innerHTML = "";
    }

    if(!member_citizen_id.checkValidity()){
      document.getElementById("member_citizen_id_message").innerHTML = "กรุณาระบุหมายเลขบัตรประชาชนด้วยครับ";
    }else{
      document.getElementById("member_citizen_id").innerHTML = "";
    }

    if(!member_tel.checkValidity()){
      document.getElementById("member_tel_message").innerHTML = "กรุณาระบุหมายเลขโทรศัพท์ด้วยครับ";
    }else{
      document.getElementById("member_tel_message").innerHTML = "";
    }

    if(!member_address.checkValidity()){
      document.getElementById("member_address_message").innerHTML = "กรุณาระบุที่อยู่ด้วยครับ";
    }else{
      document.getElementById("member_address_message").innerHTML = "";
    }

    if(!member_expired_date.checkValidity()){
      document.getElementById("member_expired_date_message").innerHTML = "กรุณาระบุวันที่สิ้นสุดการเป็นสมาชิกด้วยครับ";
    }else{
      document.getElementById("member_expired_date_message").innerHTML = "";
    }

  } //memberFormValidation Function

</script>


<script type="text/javascript">
  //memberValidation Function
  function saveValidation(){

    var member_code = document.getElementById("member_code");
    var member_citizen_id = document.getElementById("member_citizen_id");
    var member_gender = document.getElementById("member_gender");
    var member_address = document.getElementById("member_address");
    var member_tel = document.getElementById("member_tel");
    var member_expired_date = document.getElementById("member_expired_date");
    var member_fname = document.getElementById("member_fname");
    var member_lname = document.getElementById("member_lname");
    var member_tel = document.getElementById("member_tel");

    if(!member_code.checkValidity()){
      document.getElementById("member_code_message").innerHTML="กรุณาระบุหมายเลขสมาชิกด้วยครับ";
    }else{
      document.getElementById("member_code_message").innerHTML="";
    }

    if(!member_citizen_id.checkValidity()){
      document.getElementById("member_citizen_id_message").innerHTML="กรุณาระบุหมายเลขบัตรประจำตัวประชาชนด้วยครับ";
    }else{
      document.getElementById("member_citizen_id_message").innerHTML="";
    }

    if(!member_gender.checkValidity()){
      document.getElementById("member_gender_message").innerHTML="กรุณาระบุเพศด้วยครับ";
    }else{
      document.getElementById("member_gender_message").innerHTML="";
    }

    if(!member_address.checkValidity()){
      document.getElementById("member_address_message").innerHTML="กรุณาระบุที่อยู่ด้วยครับ";
    }else{
      document.getElementById("member_address_message").innerHTML="";
    }

    if(!member_tel.checkValidity()){
      document.getElementById("member_tel_message").innerHTML="กรุณาระบุเบอร์โทรศัพท์ด้วยครับ";
    }else{
      document.getElementById("member_tel_message").innerHTML="";
    }

    if(!member_expired_date.checkValidity()){
      document.getElementById("member_expired_date_message").innerHTML="กรุณาระบุวันหมดอายของบัตรสมาชิกด้วยครับ";
    }else{
      document.getElementById("member_expired_date_message").innerHTML="";
    }

    if(!member_fname.checkValidity()){
      document.getElementById("member_fname_message").innerHTML = "กรุณาระบุชื่อด้วยครับ";
    }else{
      document.getElementById("member_fname_message").innerHTML = "";
    }

    if(!member_lname.checkValidity()){
      document.getElementById("member_lname_message").innerHTML = "กรุณาระบุนามสกุลด้วยครับ";
    }else{
      document.getElementById("member_lname_message").innerHTML = "";
    }

    if(!member_tel.checkValidity()){
      document.getElementById("member_tel_message").innerHTML = "กรุณาระบุเบอร์โทรศัพท์ด้วยครับ";
    }else{
      document.getElementById("member_tel_message").innerHTML = "";
    }

  }//saveValidation Function

</script>


<script type="text/javascript">
  // function searchValidation(){
  //   var search_member_code = document.getElementById("search_member_code");
  //   var search_member_fname = document.getElementById("search_member_fname");
  //   var search_member_lname = document.getElementById("search_member_lname");
  //   var search_member_tel_message = document.getElementById("search_member_tel_message");
  //   var search_member_citizen_id = document.getElementById("search_member_citizen_id");
  //
  //   if(!search_member_code.checkValidity()){
  //     document.getElementById("search_member_code_message").innerHTML = "กรุณาระบุหมายเลขสมาชิกด้วยครับ";
  //   }else{
  //     document.getElementById("search_member_code_message").innerHTML = "";
  //   }
  //
  //   if(!search_member_fname.checkValidity()){
  //     document.getElementById("search_member_fname_message").innerHTML = "กรุณาระบุชื่อด้วยครับ";
  //   }else{
  //     document.getElementById("search_member_fname_message").innerHTML = "";
  //   }
  //
  //   if(!search_member_lname.checkValidity()){
  //     document.getElementById("search_member_lname_message").innerHTML = "กรุณาระบุนามสกุลด้วยครับ";
  //   }else{
  //     document.getElementById("search_member_lname_message").innerHTML = "";
  //   }
  //
  //   if(!search_member_tel.checkValidity()){
  //     document.getElementById("search_member_tel_message").innerHTML = "กรุณาระบุเบอร์โทรศัพท์ด้วยครับ";
  //   }else{
  //     document.getElementById("search_member_tel_message").innerHTML = "";
  //   }
  //
  //   if(!search_member_citizen_id.checkValidity()){
  //     document.getElementById("search_member_citizen_id_message").innerHTML = "กรุณาระบุหมายเลขบัตรประชาชนด้วยครับ";
  //   }else{
  //     document.getElementById("search_member_citizen_id_message").innerHTML = "";
  //   }
  //
  // }//searchValidation Function
</script>


<script type="text/javascript">
  // function clearvalue_search(){
  //   document.getElementById("search_member_code").value = "";
  //   document.getElementById("sfm").value = "";
  //   document.getElementById("search_member_tel").value = "";
  //   document.getElementById("search_member_citizen_id").value = "";
  // }// clear_search_value Function

  // function clearFormData(){
  //   document.getElementById("current_point").value = "";
  //   document.getElementById("member_point_increase").value = "";
  //   document.getElementById("member_point_decrease").value = "";
  //   // document.getElementById("member_expired_date").value = "";
  //   document.getElementById("member_code").value = "";
  //   document.getElementById("member_citizen_id").value = "";
  //   document.getElementById("member_tel").value = "";
  //   document.getElementById("member_address").value = "";
  //   document.getElementById("member_fname").value = "";
  //   document.getElementById("member_lname").value = "";
  //   document.getElementById("member_gender").value = "";
  }// clear_search_value Function
</script>

<script type="text/javascript">

  function loginValidation(){

    var username = document.getElementById("username");
    var password = document.getElementById("password");

    if(!username.checkValidity()){
      document.getElementById("username_message").innerHTML = "กรุณากรอกบัญชีผู้ใช้งานด้วยครับ";
    }else{
      document.getElementById("username_message").innerHTML = "";
    }

    if(!password.checkValidity()){
      document.getElementById("password_message").innerHTML = "กรุณากรอกรหัสผ่านด้วยครับ";
    }else{
      document.getElementById("password_message").innerHTML = "";
    }

  } //loginValidation

</script>


</body>
</html>
