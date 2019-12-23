

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a href="<?php echo base_url();?>admin/admin">
          <img class="" src="<?php echo base_url(); ?>/assets/favicon.ico" alt="Logo" style="height:40px; margin:10px;">
        </a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">


          <li>
            <a href="<?php echo base_url();?>admin/member">
              <i class="glyphicon glyphicon glyphicon-home"></i>
              &nbsp;
              <span style="font-family: 'Kanit', sans-serif;">หน้าแรก</span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url();?>admin/admin">
              <i class="glyphicon glyphicon glyphicon-user"></i>
              &nbsp;
              <span style="font-family: 'Kanit', sans-serif;">ระบบจัดการสมาชิก</span>
            </a>
          </li>


          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-family: 'Kanit', sans-serif;">
              <?php
                echo "ยินดีต้อนรับ: ".$this->session->userdata('username'); // แสดงค่า session ของ username ที่เก็บค่าได้
               ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>login/logout" style="font-family: 'Kanit', sans-serif;"><i class="	glyphicon glyphicon-log-out"></i> ออกจากระบบ</a></li>
            </ul>
          </li>

        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>
