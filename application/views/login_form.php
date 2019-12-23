<div class="container">

  <!-- Starter Template -->
  <div class="starter-template">

  <div class="row">
    <h1 class="hidden-xs" style="font-family: 'Kanit', sans-serif;">
      <i class="glyphicon glyphicon-log-in"></i>
      เข้าสู่ระบบ
    </h1>
  </div>


  <div class="row">

    <!-- Login -->
    <div class="col-md-8 col-sm-8 col-xs-12">

      <h5 class="" style="font-family: 'Kanit', sans-serif;">กรุณากอรอกบัญชีผู้ใช้งาน และรหัสผ่านให้ถูกต้องก่อนเข้าสู่ระบบ. </h5>

      <form class="" action="<?php echo base_url();?>login/login" method="post">

        <div class="form-group">
          <label for="username" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> <i class="glyphicon glyphicon-user"></i> บัญชีผู้ใช้งาน</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="บัญชีผู้ใช้งาน" value="" required autofocus>
          <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="username_message"></span>
        </div>

        <div class="form-group">
          <label for="password" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> <i class="glyphicon glyphicon-lock"></i> รหัสผ่าน</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" value="" required>
          <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="password_message"></span>
        </div>

        <button type="submit" class="btn btn-info" name="button" onclick="loginValidation()">
          <span style="font-family: 'Kanit', sans-serif;"><i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ</span>
        </button>
      </form>
      <h5 class="text-danger" style="font-family: 'Kanit', sans-serif;">
        <?php
          echo isset($error) ? '<i class="glyphicon glyphicon-warning-sign"></i> '.$error : '';
        ?>
      </h5>
    </div>
    <!-- End of Login -->


    <!-- Panel -->
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title" style="font-family: 'Kanit', sans-serif;"><i class="glyphicon glyphicon-envelope bg-danger"></i> ประกาศ</h3>
        </div>
        <div class="panel-body">
          <p style="font-family: 'Kanit', sans-serif; font-size:1.2em;">
            ในการเข้าใช้งานระบบ ขอแนะนำให้ท่านเข้าใช้งานระบบด้วยเบราเซอร์อินเทอร์เน็ตที่แนะนำ
            <mark>เช่น Google Chrome, หรือ Mozilla Firefox</mark> เป็นต้น
          </p>
        </div>
      </div>
    </div>
    <!-- End of Panel -->

  </div> <!-- End Row -->


  </div> <!-- End of Starter Template -->

</div>  <!-- End of Container -->
