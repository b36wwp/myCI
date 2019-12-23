<div class="container">

  <!-- Starter Template -->
  <div class="starter-template">


  <ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>admin/admin" style="font-family: 'Kanit', sans-serif;">หน้าแรก</a></li>
    <li class="active" style="font-family: 'Kanit', sans-serif;">ระบบจัดการสมาชิก</li>
  </ul>


  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <h3 class=""style="font-family: 'Kanit', sans-serif;"><i class="glyphicon glyphicon-search"></i> ข้อมูลสมาชิก</h3>
      <h5 style="font-family: 'Kanit', sans-serif;">
        ข้อมูลสมาชิก, ในตารางข้อมูลสมาชิกจะแสดงข้อมูลรายละเอียดของสมาชิกในตารางนี้
     
      </h5>
    </div>
  </div>



  <!-- Table Member Row -->
    <div class="row">

      <div class="table-responsive">

        <table id="member_table" class="table table-bordered table-striped table-responsive">


          <thead>
            <tr class="bg-default">
              <th colspan="6">
                <a href="<?php echo base_url(); ?>admin/admin/add_member">
                  <i class="glyphicon glyphicon-plus-sign" style="font-size:1.3em;"></i>
                  <span style="font-family: 'Kanit', sans-serif;">เพิ่มสมาชิก</span>
                </a>
              </th>

              <th>
                <a href="<?php echo base_url();?>admin/export_excel/export">
                  <i class="glyphicon glyphicon-save-file" style="font-size:1.3em;"></i>
                  <span style="font-family: 'Kanit', sans-serif;">ออกรายงาน</span>
                </a>
              </th>

            </tr>
            <tr class="bg-primary">
              <th style="font-family: 'Kanit', sans-serif; text-align:center;">ลำดับ</th>
              <th style="font-family: 'Kanit', sans-serif; text-align:center;">รหัสสมาชิก</th>
              <th style="font-family: 'Kanit', sans-serif; text-align:center;">ชื่อ-นามสกุล</th>
              <th style="font-family: 'Kanit', sans-serif; text-align:center;">เบอร์โทรศัพท์</th>
              <th style="font-family: 'Kanit', sans-serif; text-align:center;">วันที่สมัครสมาชิก</th>
              <th style="font-family: 'Kanit', sans-serif; text-align:center;">วันที่สิ้นสุดการเป็นสมาชิก</th>
              <th style="font-family: 'Kanit', sans-serif; text-align:center;">สถานะ</th>
              <th style="font-family: 'Kanit', sans-serif; text-align:center;">ดูข้อมูล</th>
            </tr>
          </thead>

          <tbody>

            <?php
              $count = 1;
              foreach($member as $row){
            ?>
              <tr>
                <td style="font-family: 'Kanit', sans-serif; text-align:center;"><?php echo $count++; ?></td>
                <td style="font-family: 'Kanit', sans-serif; text-align:center;"><?php echo $row['member_code']; ?></td>
                <td style="font-family: 'Kanit', sans-serif; text-align:center;"><?php echo $row['member_fname']." ".$row['member_lname']; ?></td>
                <td style="font-family: 'Kanit', sans-serif; text-align:center;"><?php echo $row['member_tel']; ?></td>
                <td style="font-family: 'Kanit', sans-serif; text-align:center;"><?php echo $row['member_date_create']; ?></td>
                <td style="font-family: 'Kanit', sans-serif; text-align:center;"><?php echo $row['member_expired_date']; ?></td>

                <td style="font-family: 'Kanit', sans-serif; text-align:center;">
                  <?php
                    $ckeck_is_active->check_is_active($row['member_expired_date']); //เรียกใช้งานฟังก์ชั่นที่สร้างขึ้น (เก็บไว้ใน libary)
                   ?>
                </td>

                <td style="font-family: 'Kanit', sans-serif; text-align:center;">
                  <a href="<?php echo base_url();?>admin/admin/member_detail/<?php echo $row['member_id']; ?>" class="btn btn-info btn-sm">
                    <i class="glyphicon glyphicon-search" style="font-size:1.3em;"></i>
                  </a>
                </td>

             
              </tr>
            <?php } ?>

            </tbody>

        
          </table>

        </div>
        <!-- Table Responsive-->
      </div>
      <!-- End of Table Member Row -->



  </div> <!-- End of Starter Template -->

</div>  <!-- End of Container -->
