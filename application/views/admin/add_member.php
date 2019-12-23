<?php

  //ดึงค่าข้อมูลจาก Controller :: เมื่อหมายเลขบัตรประชาชนตรงกับเลขที่ไม่อณุญาติให้ใช้งาน จะแสดง Alert
  $result_search = isset($_GET['allow_citizen_id']) ? $_GET['allow_citizen_id'] : '';
  if($result_search == "no"){
    // echo "<script>alert('ผิดพลาด! ไม่สามารถเพิ่มแต้มสะสม และใช้แต้มสะสมพร้อมกันได้')</script>";
    echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
    echo "<script> $(window).on('load',function(){
        $('#allow_citizen_idModal').modal('show');
    });</script>";
  }

  //ดึงค่าข้อมูลจาก Controller :: เมื่อหมายเลขบัตรประชาชนมีอยู่ในระบบแล้ว จะแสดง Alert
  $result_search = isset($_GET['have_citizen_id_already']) ? $_GET['have_citizen_id_already'] : '';
  if($result_search == "yes"){
    // echo "<script>alert('ผิดพลาด! ไม่สามารถเพิ่มแต้มสะสม และใช้แต้มสะสมพร้อมกันได้')</script>";
    echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
    echo "<script> $(window).on('load',function(){
        $('#have_citizen_id_alreadyModal').modal('show');
    });</script>";
  }

 ?>
  <div class="container">

    <div class="starter-template">

      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/admin" style="font-family: 'Kanit', sans-serif;">หน้าแรกผู้ดูแลระบบ</a></li>
        <li><a href="<?php echo base_url(); ?>admin/admin" style="font-family: 'Kanit', sans-serif;">จัดการข้อมูลสมาชิก</a></li>
        <li class="active" style="font-family: 'Kanit', sans-serif;">เพิ่มข้อมูลสมาชิก</li>
      </ul>
      <!-- breadcumb -->

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <h3 class=""style="font-family: 'Kanit', sans-serif;"><i class="glyphicon glyphicon-plus"></i> เพิ่มข้อมูลสมาชิก</h3>
          <h5 style="font-family: 'Kanit', sans-serif;">
            เพิ่มข้อมูลสมาชิก, ในตารางข้อมูลสมาชิกจะแสดงข้อมูลรายละเอียดของสมาชิกในตารางนี้
          </h5>
        </div>
      </div>


      <div class="row">


        <form class="" action="<?php echo base_url();?>admin/admin/add_member_data" method="post" enctype="multipart/form-data">

          <!-- Hidden Value -->
          <input type="hidden" name="user_session_id" value="<?php echo $this->session->userdata('user_id'); ?>">

          <!-- row 1-->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="username" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> รหัสสมาชิก</label>
                  <input type="text" class="form-control" id="member_code" name="member_code" placeholder="รหัสสมาชิก" required autofocus>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_code_message"></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="username" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> ชื่อ</label>
                  <input type="text" class="form-control" id="member_fname" name="member_fname" placeholder="ชื่อ" required>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_fname_message"></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="username" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> นามสกุล</label>
                  <input type="text" class="form-control" id="member_lname" name="member_lname" placeholder="นามสกุล" required>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_lname_message"></span>
                </div>
              </div>

            </div>
          </div>
          <!-- End of row1 -->

          <!-- row 2-->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="text" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> เพศ</label>
                  <select class="form-control" id="member_gender" name="member_gender" required>
                    <option value="">กรุณาเลือกเพศ</option>
                    <option value="ชาย">ชาย</option>
                    <option value="หญิง">หญิง</option>
                  </select>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_gender_message"></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="text" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> หมายเลขบัตรประชาชน</label>
                  <input type="text" class="form-control" id="member_citizen_id" name="member_citizen_id" placeholder="หมายเลขบัตรประชาชน" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13" minlength="13" required>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_citizen_id_message"></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="text" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> เบอร์โทรศัพท์</label>
                  <input type="text" class="form-control" id="member_tel" name="member_tel" placeholder="เบอร์โทรศัพท์" onkeyup="this.value=this.value.replace(/[^\d]/,'')" minlength="10" maxlength="10" required>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_tel_message"></span>
                </div>
              </div>

            </div>
          </div>
          <!-- End of row2 -->

          <!-- row 3-->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="text" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> ที่อยู่</label>
                  <textarea id="member_address" name="member_address" class="form-control" required></textarea>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_address_message"></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="member_expired_date" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> วันที่สิ้นสุดการเป็นสมาชิก</label>
                  <input type="date" class="form-control" id="member_expired_date" name="member_expired_date" placeholder="วันที่สิ้นสุดการเป็นสมาชิก"
                    value="<?php
                    //ปีปัจจุบัน +1 = ปีถัดไป
                    date_default_timezone_set('Asia/Bangkok');
                    $year = date('Y')+1;
                    echo $year."-12-31";
                    ?>" required>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_expired_date_message"></span>
                </div>
              </div>

            </div>
          </div>
          <!-- End of row3 -->

          <!-- row 4-->
          <div class="row">
            
          </div>
          <!-- End of row4 -->

          <!-- row 5-->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="pull-right">

                <button type="reset" class="btn btn-danger" id="buttonresetform" name="buttonresetform">
                  <span style="font-family: 'Kanit', sans-serif;"><i class="glyphicon glyphicon-repeat"></i> ล้างข้อมูล</span>
                </button>

                <button type="submit" class="btn btn-info" name="button" onclick="memberFormValidation()">
                  <span style="font-family: 'Kanit', sans-serif;"><i class="glyphicon glyphicon-check"></i> บันทึก</span>
                </button>

              </div>

            </div>
          </div>
          <!-- row5 -->

        </form>



      </div>
      <!-- row-->


    </div>
    <!-- starter-template -->

  </div>
  <!-- Container -->




      <!-- Allow Citizen Id Modal -->
       <div class="modal fade" id="allow_citizen_idModal" role="dialog">
         <div class="modal-dialog modal-md">
           <div class="modal-content">
             <div class="modal-header" style="background-color:#000000;">
               <button type="button" class="close" data-dismiss="modal"><span style="color:#FFFFFF;">&times;</span></button>
               <h4 class="modal-title" style="color:#FFFFFF; font-family: 'Kanit', sans-serif;"><i class="glyphicon glyphicon-alert"></i> &nbsp; การแจ้งเตือน</h4>
             </div>
             <div class="modal-body">
               <p style="font-family: 'Kanit', sans-serif;">
                 <i class="glyphicon glyphicon-remove text-danger" style="font-size:3em;"></i>
                 <span class="text-danger" style="font-size:2em;">ไม่สามารถใช้หมายเลขบัตรประจำตัวประชาชนนี้ได้</span>
               </p>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal"><span style="font-family: 'Kanit', sans-serif;" autofocus>ปิด</span></button>
             </div>
           </div>
         </div>
       </div>
       <!-- End of Allow citizen ID Modal -->


       <!-- Have Citizen ID Modal -->
        <div class="modal fade" id="have_citizen_id_alreadyModal" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#000000;">
                <button type="button" class="close" data-dismiss="modal"><span style="color:#FFFFFF;">&times;</span></button>
                <h4 class="modal-title" style="color:#FFFFFF; font-family: 'Kanit', sans-serif;"><i class="glyphicon glyphicon-alert"></i> &nbsp; การแจ้งเตือน</h4>
              </div>
              <div class="modal-body">
                <p style="font-family: 'Kanit', sans-serif;">
                  <i class="glyphicon glyphicon-remove text-danger" style="font-size:3em;"></i>
                  <span class="text-danger" style="font-size:2em;">มีผู้ใช้งานหมายเลขบัตรประชาชนนี้แล้ว</span>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span style="font-family: 'Kanit', sans-serif;" autofocus>ปิด</span></button>
              </div>
            </div>
          </div>
        </div>
        <!-- End of Have Citizen ID Modal -->
