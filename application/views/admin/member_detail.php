<div class="container">

  <!-- Starter Template -->
  <div class="starter-template">


    <ul class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>admin/admin" style="font-family: 'Kanit', sans-serif;">หน้าแรกผู้ดูแลระบบ</a></li>
      <li><a href="<?php echo base_url(); ?>admin/admin" style="font-family: 'Kanit', sans-serif;">จัดการข้อมูลสมาชิก</a></li>
      <li class="active" style="font-family: 'Kanit', sans-serif;">ข้อมูลสมาชิก</li>
    </ul>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <h3 class=""style="font-family: 'Kanit', sans-serif;"><i class="glyphicon glyphicon-search"></i> ข้อมูลสมาชิก</h3>
        <h5 style="font-family: 'Kanit', sans-serif;">
          ข้อมูลสมาชิก, ในตารางข้อมูลสมาชิกจะแสดงข้อมูลรายละเอียดของสมาชิกในตารางนี้
        </h5>
      </div>
    </div>


    <div class="row">
      <div class="col-md-6 col-sm-3 col-xs-12">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-responsive">
              <thead>


                <tr>
                  <th style="font-family: 'Kanit', sans-serif;" class="bg-primary" colspan="1"><i class="glyphicon glyphicon-log-in"></i> รายการข้อมูล</th>

                  <th class="bg-primary" colspan="1">

                    <a href="<?php echo base_url();?>admin/admin/delete_member/<?php echo $member->member_id; ?>" onclick="return confirm ('คุณแน่ใจที่ต้องการลบ ?')" class="btn btn-danger btn-sm pull-right">
                      <span style="font-family: 'Kanit', sans-serif;">
                        <i class="glyphicon glyphicon-trash"></i>
                        ลบ
                      </span>
                    </a>

                    <a href="<?php echo base_url();?>admin/admin/edit_member/<?php echo $member->member_id; ?>" class="btn btn-warning btn-sm pull-right">
                      <span style="font-family: 'Kanit', sans-serif;">
                        <i class="glyphicon glyphicon-edit"></i>
                        แก้ไข
                      </span>
                    </a>

                    <a href="<?php echo base_url();?>admin/export_excel/export_one_record/<?php echo $member->member_id; ?>" class="btn btn-success btn-sm pull-right">
                      <span style="font-family: 'Kanit', sans-serif;">
                        <i class="glyphicon glyphicon-save-file"></i>
                        ออกรายงาน
                      </span>
                    </a>

                  </th>

                </tr>

              </thead>
              <tbody>

                <tr>
                  <td style="font-family: 'Kanit', sans-serif;">รหัสสมาชิก</td>
                  <td style="font-family: 'Kanit', sans-serif;"><?php echo $member->member_code; ?></td>
                </tr>

                <tr>
                  <td style="font-family: 'Kanit', sans-serif;">ชื่อ-นามสกุล</td>
                  <td style="font-family: 'Kanit', sans-serif;"><?php echo $member->member_fname." ".$member->member_lname; ?></td>
                </tr>

                <tr>
                  <td style="font-family: 'Kanit', sans-serif;">หมายเลขบัตรประชาชน</td>
                  <td style="font-family: 'Kanit', sans-serif;"><?php echo $member->member_citizen_id; ?></td>
                </tr>

                <tr>
                  <td style="font-family: 'Kanit', sans-serif;">เพศ</td>
                  <td style="font-family: 'Kanit', sans-serif;"><?php echo $member->member_gender; ?></td>
                </tr>

                <tr>
                  <td style="font-family: 'Kanit', sans-serif;">เบอร์โทรศัพท์</td>
                  <td style="font-family: 'Kanit', sans-serif;"><?php echo $member->member_tel; ?></td>
                </tr>

                <tr>
                  <td style="font-family: 'Kanit', sans-serif;">ที่อยู่</td>
                  <td style="font-family: 'Kanit', sans-serif;"><?php echo $member->member_address; ?></td>
                </tr>

                <tr>
                  <td style="font-family: 'Kanit', sans-serif;">วันที่หมดอายุ</td>
                  <td style="font-family: 'Kanit', sans-serif;"><?php echo $member->member_expired_date; ?></td>
                </tr>

                <tr>
                  <td style="font-family: 'Kanit', sans-serif;">วันที่สมัครสมาชิก</td>
                  <td style="font-family: 'Kanit', sans-serif;"><?php echo $member->member_date_create; ?></td>
                </tr>

                <tr>
                  <td style="font-family: 'Kanit', sans-serif;">สถานะ</td>
                  <td style="font-family: 'Kanit', sans-serif;">
                  <?php
                    $ckeck_is_active->check_is_active($member->member_expired_date); //เรียกใช้งานฟังก์ชั่นที่สร้างขึ้น (เก็บไว้ใน libary)
                  ?>
                  </td>
                </tr>

                <tr>
                  <td style="font-family: 'Kanit', sans-serif;">แต้มสะสมปัจจุบัน</td>
                  <td style="font-family: 'Kanit', sans-serif;"><?php echo $member->member_point; ?> คะแนน</td>
                </tr>

            </tbody>
          </table>

        </div>
        <!-- Table Responsive -->
      </div>
      <!-- End of col -->

    </div>
    <!-- row -->







  </div> <!-- End of Starter Template -->

</div>  <!-- End of Container -->
