<?php

  class Export_excel extends CI_Controller{

      function __construct(){
        parent:: __construct();
      }

      function export(){

        // เมื่อคลิกที่ปุ่ม btn_export เพื่อออกรายงาน
        // if($this->input->post("btn_export")){
            // โหลด excel library
            $this->load->library('excel');

            // เรียนกใช้ PHPExcel
            $objPHPExcel = new PHPExcel();
            // เราสามารถเรียกใช้เป็น  $this->excel แทนก็ได้

            // กำหนดค่าต่างๆ ของเอกสาร excel
            $objPHPExcel->getProperties()->setCreator("Creator here")
                                         ->setLastModifiedBy("setLastModifiedBy here")
                                         ->setTitle("PHPExcel Test Document")
                                         ->setSubject("PHPExcel Test Document")
                                         ->setDescription("Test document for PHPExcel, generated using PHP classes.")
                                         ->setKeywords("office PHPExcel php")
                                         ->setCategory("Test result file");

            // กำหนดชื่อให้กับ worksheet ที่ใช้งาน
            $objPHPExcel->getActiveSheet()->setTitle('Member Report');

            // กำหนด worksheet ที่ต้องการให้เปิดมาแล้วแสดง ค่าจะเริ่มจาก 0 , 1 , 2 , ......
            $objPHPExcel->setActiveSheetIndex(0);

            // การจัดรูปแบบของ cell
            $objPHPExcel->getDefaultStyle()
                                    ->getAlignment()
                                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
                                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                    //HORIZONTAL_CENTER //VERTICAL_CENTER

            // จัดความกว้างของคอลัมน์
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(60);

            // กำหนดหัวข้อให้กับแถวแรก
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'ลำดับ')
                        ->setCellValue('B1', 'ชื่อ-นามสกุล')
                        ->setCellValue('C1', 'เบอร์โทรศัพท์')
                        ->setCellValue('D1', 'เพศ')
                        ->setCellValue('E1', 'หมายเลขบัตรประชาชน')
                        ->setCellValue('F1', 'วันที่สมัครสมาชิก')
                        ->setCellValue('G1', 'วันที่สิ้นสุดการเป็นสมาชิก')
                        ->setCellValue('H1', 'คะแนนปัจจุบัน')
                        ->setCellValue('I1', 'ที่อยู่');


            // ดึงข้อมูลเริ่มเพิ่มแถวที่ 2 ของ excel
            $start_row=2;
            $sql = "SELECT * FROM member";

            $query = $this->db->query($sql);
            $result = $query->result_array();
            $i_num=0;
            if(count($result)>0){
                foreach($result as $row){
                    $i_num++;

                    // หากอยากจัดข้อมูลราคาให้ชิดขวา
                    // $objPHPExcel->getActiveSheet()
                    //     ->getStyle('C'.$start_row)
                    //     ->getAlignment()
                    //     ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

                    // หากอยากจัดให้รหัสสินค้ามีเลย 0 ด้านหน้า และแสดง 3     หลักเช่น 001 002
                    // $objPHPExcel->getActiveSheet()
                    //     ->getStyle('B'.$start_row)
                    //     ->getNumberFormat()
                    //     ->setFormatCode('000');

                    // เพิ่มข้อมูลลงแต่ละเซลล์
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A'.$start_row, $i_num)
                                ->setCellValue('B'.$start_row, $row['member_fname']." ".$row['member_lname'])
                                ->setCellValue('C'.$start_row, " ".$row['member_tel'])
                                ->setCellValue('D'.$start_row, $row['member_gender'])
                                ->setCellValue('E'.$start_row, " ".$row['member_citizen_id'])
                                ->setCellValue('F'.$start_row, $row['member_date_create'])
                                ->setCellValue('G'.$start_row, $row['member_expired_date'])
                                ->setCellValue('H'.$start_row, $row['member_point'])
                                ->setCellValue('I'.$start_row, $row['member_address']);

                    // เพิ่มแถวข้อมูล
                    $start_row++;
                }

                // กำหนดรูปแบบของไฟล์ที่ต้องการเขียนว่าเป็นไฟล์ excel แบบไหน ในที่นี้เป้นนามสกุล xlsx  ใช้คำว่า Excel2007
                // แต่หากต้องการกำหนดเป็นไฟล์ xls ใช้กับโปรแกรม excel รุ่นเก่าๆ ได้ ให้กำหนดเป็น  Excel5
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)

                $filename='MemberReport-'.date("Y-m-d-H:i:s").'.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx
                // บังคับให้ทำการดาวน์ดหลดไฟล์
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                ob_end_clean();
                $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน
                // หากต้องการบันทึกเป็นไฟล์ไว้ใน server  ใช้คำสั่งนี้ $this->excel->save("/path/".$filename);
                // แล้วตัด header ดัานบนทั้ง 3 อันออก
                exit;
            }

        // }


      } //export function


      function export_one_record($id){

        // เมื่อคลิกที่ปุ่ม btn_export เพื่อออกรายงาน
        // if($this->input->post("btn_export")){
            // โหลด excel library
            $this->load->library('excel');

            // เรียนกใช้ PHPExcel
            $objPHPExcel = new PHPExcel();
            // เราสามารถเรียกใช้เป็น  $this->excel แทนก็ได้

            // กำหนดค่าต่างๆ ของเอกสาร excel
            $objPHPExcel->getProperties()->setCreator("Dreamtoy Member")
                                         ->setLastModifiedBy("Dreamtoy Member")
                                         ->setTitle("Dreamtoy Member")
                                         ->setSubject("Dreamtoy Member")
                                         ->setDescription("Test document for PHPExcel, generated using PHP classes.")
                                         ->setKeywords("office PHPExcel php")
                                         ->setCategory("Test result file");

            // กำหนดชื่อให้กับ worksheet ที่ใช้งาน
            $objPHPExcel->getActiveSheet()->setTitle('Member Report');

            // กำหนด worksheet ที่ต้องการให้เปิดมาแล้วแสดง ค่าจะเริ่มจาก 0 , 1 , 2 , ......
            $objPHPExcel->setActiveSheetIndex(0);

            // การจัดรูปแบบของ cell
            $objPHPExcel->getDefaultStyle()
                                    ->getAlignment()
                                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
                                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                    //HORIZONTAL_CENTER //VERTICAL_CENTER

            // จัดความกว้างของคอลัมน์
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(60);

            // กำหนดหัวข้อให้กับแถวแรก
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'ลำดับ')
                        ->setCellValue('B1', 'ชื่อ-นามสกุล')
                        ->setCellValue('C1', 'เบอร์โทรศัพท์')
                        ->setCellValue('D1', 'เพศ')
                        ->setCellValue('E1', 'หมายเลขบัตรประชาชน')
                        ->setCellValue('F1', 'วันที่สมัครสมาชิก')
                        ->setCellValue('G1', 'วันที่สิ้นสุดการเป็นสมาชิก')
                        ->setCellValue('H1', 'คะแนนปัจจุบัน')
                        ->setCellValue('I1', 'ที่อยู่');

            // ดึงข้อมูลเริ่มเพิ่มแถวที่ 2 ของ excel
            $start_row=2;
            $sql = "SELECT * FROM member WHERE member_id = $id";

            $query = $this->db->query($sql);
            $result = $query->result_array();
            $i_num=0;
            if(count($result)>0){
                foreach($result as $row){
                    $i_num++;

                    $fullname = $row['member_fname']." ".$row['member_lname'];

                    // หากอยากจัดข้อมูลราคาให้ชิดขวา
                    // $objPHPExcel->getActiveSheet()
                    //     ->getStyle('C'.$start_row)
                    //     ->getAlignment()
                    //     ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

                    // หากอยากจัดให้รหัสสินค้ามีเลย 0 ด้านหน้า และแสดง 3     หลักเช่น 001 002
                    // $objPHPExcel->getActiveSheet()
                    //     ->getStyle('C'.$start_row)
                    //     ->getNumberFormat()
                    //     ->setFormatCode('000');

                    // เพิ่มข้อมูลลงแต่ละเซลล์
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A'.$start_row, $i_num)
                                ->setCellValue('B'.$start_row, $row['member_fname']." ".$row['member_lname'])
                                ->setCellValue('C'.$start_row, " ".$row['member_tel'])
                                ->setCellValue('D'.$start_row, $row['member_gender'])
                                ->setCellValue('E'.$start_row, " ".$row['member_citizen_id'])
                                ->setCellValue('F'.$start_row, $row['member_date_create'])
                                ->setCellValue('G'.$start_row, $row['member_expired_date'])
                                ->setCellValue('H'.$start_row, $row['member_point'])
                                ->setCellValue('I'.$start_row, $row['member_address']);


                    // เพิ่มแถวข้อมูล
                    $start_row++;
                }

                // กำหนดรูปแบบของไฟล์ที่ต้องการเขียนว่าเป็นไฟล์ excel แบบไหน ในที่นี้เป้นนามสกุล xlsx  ใช้คำว่า Excel2007
                // แต่หากต้องการกำหนดเป็นไฟล์ xls ใช้กับโปรแกรม excel รุ่นเก่าๆ ได้ ให้กำหนดเป็น  Excel5
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)

                $filename='Member-'.$fullname.'.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx
                // บังคับให้ทำการดาวน์ดหลดไฟล์
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                ob_end_clean();
                $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน
                // หากต้องการบันทึกเป็นไฟล์ไว้ใน server  ใช้คำสั่งนี้ $this->excel->save("/path/".$filename);
                // แล้วตัด header ดัานบนทั้ง 3 อันออก
                exit;
            }

        // }


      } //export_one_record function


      function export_transaction_one_record($id){

        // เมื่อคลิกที่ปุ่ม btn_export เพื่อออกรายงาน
        // if($this->input->post("btn_export")){
            // โหลด excel library
            $this->load->library('excel');

            // เรียนกใช้ PHPExcel
            $objPHPExcel = new PHPExcel();
            // เราสามารถเรียกใช้เป็น  $this->excel แทนก็ได้

            // กำหนดค่าต่างๆ ของเอกสาร excel
            $objPHPExcel->getProperties()->setCreator("Dreamtoy Member")
                                         ->setLastModifiedBy("Dreamtoy Member")
                                         ->setTitle("Dreamtoy Member")
                                         ->setSubject("Dreamtoy Member")
                                         ->setDescription("Test document for PHPExcel, generated using PHP classes.")
                                         ->setKeywords("office PHPExcel php")
                                         ->setCategory("Test result file");

            // กำหนดชื่อให้กับ worksheet ที่ใช้งาน
            $objPHPExcel->getActiveSheet()->setTitle('Member Report');

            // กำหนด worksheet ที่ต้องการให้เปิดมาแล้วแสดง ค่าจะเริ่มจาก 0 , 1 , 2 , ......
            $objPHPExcel->setActiveSheetIndex(0);

            // การจัดรูปแบบของ cell
            $objPHPExcel->getDefaultStyle()
                                    ->getAlignment()
                                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
                                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                    //HORIZONTAL_CENTER //VERTICAL_CENTER

            // จัดความกว้างของคอลัมน์
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);

            // กำหนดหัวข้อให้กับแถวแรก
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'ลำดับ')
                        ->setCellValue('B1', 'ชื่อ-นามสกุล')
                        ->setCellValue('C1', 'วันที่')
                        ->setCellValue('D1', 'คะแนน')
                        ->setCellValue('E1', 'บันทึกโดย');



            // ดึงข้อมูลเริ่มเพิ่มแถวที่ 2 ของ excel
            $start_row=2;
            $sql = "SELECT * FROM member_transaction a
            INNER JOIN member b
            ON a.member_code = b.member_code
            INNER JOIN user c
            ON a.user_id = c.user_id
            WHERE b.member_id = $id";

            $query = $this->db->query($sql);
            $result = $query->result_array();
            $i_num=0;
            if(count($result)>0){
                foreach($result as $row){
                    $i_num++;

                    $fullname = $row['member_fname']." ".$row['member_lname'];

                    // หากอยากจัดข้อมูลราคาให้ชิดขวา
                    // $objPHPExcel->getActiveSheet()
                    //     ->getStyle('C'.$start_row)
                    //     ->getAlignment()
                    //     ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

                    // หากอยากจัดให้รหัสสินค้ามีเลย 0 ด้านหน้า และแสดง 3     หลักเช่น 001 002
                    // $objPHPExcel->getActiveSheet()
                    //     ->getStyle('C'.$start_row)
                    //     ->getNumberFormat()
                    //     ->setFormatCode('000');

                    // เพิ่มข้อมูลลงแต่ละเซลล์
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A'.$start_row, $i_num)
                                ->setCellValue('B'.$start_row, $row['member_fname']." ".$row['member_lname'])
                                ->setCellValue('C'.$start_row, $row['transaction_datetime'])
                                ->setCellValue('D'.$start_row, $row['point_have_change'])
                                ->setCellValue('E'.$start_row, $row['user_prefix']." ".$row['user_fname']." ".$row['user_lname']);

                    // เพิ่มแถวข้อมูล
                    $start_row++;
                }

                // กำหนดรูปแบบของไฟล์ที่ต้องการเขียนว่าเป็นไฟล์ excel แบบไหน ในที่นี้เป้นนามสกุล xlsx  ใช้คำว่า Excel2007
                // แต่หากต้องการกำหนดเป็นไฟล์ xls ใช้กับโปรแกรม excel รุ่นเก่าๆ ได้ ให้กำหนดเป็น  Excel5
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)

                $filename='Transaction_Member-'.$fullname.'.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx
                // บังคับให้ทำการดาวน์ดหลดไฟล์
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                ob_end_clean();
                $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน
                // หากต้องการบันทึกเป็นไฟล์ไว้ใน server  ใช้คำสั่งนี้ $this->excel->save("/path/".$filename);
                // แล้วตัด header ดัานบนทั้ง 3 อันออก
                exit;
            }

        // }


      } //export_transaction_one_record function


      function export_log_one_record($id){

        // เมื่อคลิกที่ปุ่ม btn_export เพื่อออกรายงาน
        // if($this->input->post("btn_export")){
            // โหลด excel library
            $this->load->library('excel');

            // เรียนกใช้ PHPExcel
            $objPHPExcel = new PHPExcel();
            // เราสามารถเรียกใช้เป็น  $this->excel แทนก็ได้

            // กำหนดค่าต่างๆ ของเอกสาร excel
            $objPHPExcel->getProperties()->setCreator("Dreamtoy Member")
                                         ->setLastModifiedBy("Dreamtoy Member")
                                         ->setTitle("Dreamtoy Member")
                                         ->setSubject("Dreamtoy Member")
                                         ->setDescription("Test document for PHPExcel, generated using PHP classes.")
                                         ->setKeywords("office PHPExcel php")
                                         ->setCategory("Test result file");

            // กำหนดชื่อให้กับ worksheet ที่ใช้งาน
            $objPHPExcel->getActiveSheet()->setTitle('Member Report');

            // กำหนด worksheet ที่ต้องการให้เปิดมาแล้วแสดง ค่าจะเริ่มจาก 0 , 1 , 2 , ......
            $objPHPExcel->setActiveSheetIndex(0);

            // การจัดรูปแบบของ cell
            $objPHPExcel->getDefaultStyle()
                                    ->getAlignment()
                                    ->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
                                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                    //HORIZONTAL_CENTER //VERTICAL_CENTER

            // จัดความกว้างของคอลัมน์
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);

            // กำหนดหัวข้อให้กับแถวแรก
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'ลำดับ')
                        ->setCellValue('B1', 'ชื่อ-นามสกุล')
                        ->setCellValue('C1', 'วันที่')
                        ->setCellValue('D1', 'ข้อมูลก่อนเปลี่ยนแปลง')
                        ->setCellValue('E1', 'ข้อมูลหลังเปลี่ยนแปลง')
                        ->setCellValue('F1', 'แก้ไขโดย');



            // ดึงข้อมูลเริ่มเพิ่มแถวที่ 2 ของ excel
            $start_row=2;
            $sql="SELECT * FROM log a
                  INNER JOIN member b
                  ON a.member_id = b.member_id
                  INNER JOIN user c
                  ON a.user_id = c.user_id
                  WHERE b.member_id = '$id'
                  ORDER BY a.log_datetime DESC";

            $query = $this->db->query($sql);
            $result = $query->result_array();
            $i_num=0;
            if(count($result)>0){
                foreach($result as $row){
                    $i_num++;

                    $fullname = $row['member_fname']." ".$row['member_lname'];

                    // หากอยากจัดข้อมูลราคาให้ชิดขวา
                    // $objPHPExcel->getActiveSheet()
                    //     ->getStyle('C'.$start_row)
                    //     ->getAlignment()
                    //     ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

                    // หากอยากจัดให้รหัสสินค้ามีเลย 0 ด้านหน้า และแสดง 3     หลักเช่น 001 002
                    // $objPHPExcel->getActiveSheet()
                    //     ->getStyle('C'.$start_row)
                    //     ->getNumberFormat()
                    //     ->setFormatCode('000');

                    // เพิ่มข้อมูลลงแต่ละเซลล์
                    $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue('A'.$start_row, $i_num)
                                ->setCellValue('B'.$start_row, $row['member_fname']." ".$row['member_lname'])
                                ->setCellValue('C'.$start_row, $row['log_datetime'])
                                ->setCellValue('D'.$start_row, " ".$row['log_before_change'])
                                ->setCellValue('E'.$start_row, " ".$row['log_after_change'])
                                ->setCellValue('F'.$start_row, " ".$row['user_prefix']." ".$row['user_fname']." ".$row['user_lname']);


                    // เพิ่มแถวข้อมูล
                    $start_row++;
                }

                // กำหนดรูปแบบของไฟล์ที่ต้องการเขียนว่าเป็นไฟล์ excel แบบไหน ในที่นี้เป้นนามสกุล xlsx  ใช้คำว่า Excel2007
                // แต่หากต้องการกำหนดเป็นไฟล์ xls ใช้กับโปรแกรม excel รุ่นเก่าๆ ได้ ให้กำหนดเป็น  Excel5
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)

                $filename='log_edit_Member_data-'.$fullname.'.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx
                // บังคับให้ทำการดาวน์ดหลดไฟล์
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                ob_end_clean();
                $objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน
                // หากต้องการบันทึกเป็นไฟล์ไว้ใน server  ใช้คำสั่งนี้ $this->excel->save("/path/".$filename);
                // แล้วตัด header ดัานบนทั้ง 3 อันออก
                exit;
            }

        // }


      } //export_log_one_record function



  }// Class

 ?>
