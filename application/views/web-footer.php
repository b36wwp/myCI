
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


</body>
</html>
