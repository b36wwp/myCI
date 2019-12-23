
  <div class="container">

    <div class="starter-template">

      <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/admin" style="font-family: 'Kanit', sans-serif;">หน้าแรกผู้ดูแลระบบ</a></li>
        <li><a href="<?php echo base_url(); ?>admin/admin" style="font-family: 'Kanit', sans-serif;">จัดการข้อมูลสมาชิก</a></li>
        <li class="active" style="font-family: 'Kanit', sans-serif;">แก้ไขข้อมูลสมาชิก</li>
      </ul>
      <!-- breadcumb -->

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <h3 class=""style="font-family: 'Kanit', sans-serif;"><i class="glyphicon glyphicon-edit"></i> แก้ไขข้อมูลสมาชิก</h3>
          <h5 style="font-family: 'Kanit', sans-serif;">
            แก้ไขข้อมูลสมาชิก, ในตารางข้อมูลสมาชิกจะแสดงข้อมูลรายละเอียดของสมาชิกในตารางนี้
            <!-- <code><i class="glyphicon glyphicon-edit"></i></code> -->
          </h5>
        </div>
      </div>


      <div class="row">

        <form class="" action="<?php echo base_url();?>admin/admin/update_member_data/<?php echo $member->member_id; ?>" method="post" enctype="multipart/form-data">

          <!-- Hidden Value -->
          <input type="hidden" name="member_id" value="<?php echo $member->member_id; ?>">
          <input type="hidden" name="user_session_id" value="<?php echo $this->session->userdata('user_id') ?>">
          <input type="hidden" name="h_member_code" value="<?php echo $member->member_code; ?>">
          <input type="hidden" name="h_member_fname" value="<?php echo $member->member_fname; ?>">
          <input type="hidden" name="h_member_lname" value="<?php echo $member->member_lname; ?>">
          <input type="hidden" name="h_member_gender" value="<?php echo $member->member_gender; ?>">
          <input type="hidden" name="h_member_citizen_id" value="<?php echo $member->member_citizen_id; ?>">
          <input type="hidden" name="h_member_tel" value="<?php echo $member->member_tel; ?>">
          <input type="hidden" name="h_member_address" value="<?php echo $member->member_address; ?>">
          <input type="hidden" name="h_member_expired_date" value="<?php echo $member->member_expired_date; ?>">

          <!-- row 1-->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="username" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> รหัสสมาชิก</label>
                  <input type="text" class="form-control" id="member_code" name="member_code" placeholder="รหัสสมาชิก" value="<?php echo $member->member_code; ?>" required autofocus>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_code_message"></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="username" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> ชื่อ</label>
                  <input type="text" class="form-control" id="member_fname" name="member_fname" placeholder="ชื่อ" value="<?php echo $member->member_fname; ?>" required>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_fname_message"></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="username" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> นามสกุล</label>
                  <input type="text" class="form-control" id="member_lname" name="member_lname" placeholder="นามสกุล" value="<?php echo $member->member_lname; ?>" required>
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
                    <option value="<?php echo $member->member_gender; ?>"><?php echo $member->member_gender; ?></option>
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
                  <input type="text" class="form-control" id="member_citizen_id" name="member_citizen_id" placeholder="หมายเลขบัตรประชาชน" value="<?php echo $member->member_citizen_id; ?>" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13" minlength="13" required>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_citizen_id_message"></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="text" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> เบอร์โทรศัพท์</label>
                  <input type="text" class="form-control" id="member_tel" name="member_tel" placeholder="เบอร์โทรศัพท์" value="<?php echo $member->member_tel; ?>" onkeyup="this.value=this.value.replace(/[^\d]/,'')" minlength="10" maxlength="10" required>
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
                  <textarea id="member_address" name="member_address" class="form-control" required><?php echo $member->member_address; ?></textarea>
                  <span class="text-danger" style="font-family: 'Kanit', sans-serif;" id="member_address_message"></span>
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="member_expired_date" style="font-family: 'Kanit', sans-serif;"><span class="text-danger">*</span> วันที่สิ้นสุดการเป็นสมาชิก</label>
                  <input type="date" class="form-control" id="member_expired_date" name="member_expired_date" placeholder="วันที่สิ้นสุดการเป็นสมาชิก" value="<?php echo $member->member_expired_date; ?>"required>
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



  