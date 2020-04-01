<?php

    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];
    $matkhau2 = $_POST['re-matkhau'];
    $gioitinh = $_POST['gioitinh'];
    $nghenghiep = $_POST['nghenghiep'];
    $sothich ="";
    if(!empty($_POST['sothich'])){
        foreach($_POST['sothich'] as $st){
        $sothich = $sothich . $st .", ";
        }
    }
    $sothich = substr($sothich,0,strlen($sothich)-2);


    $servername = "localhost";
    $database = "buoi3";
    $username = "root";
    $password = "";
   
    $con = new mysqli($servername, $username, $password, $database);
    
    if (!$con) {
        die("Lỗi kết nôi: " . mysqli_connect_error());
    }
    $con ->set_charset("utf8");
    if( $con->query("INSERT INTO thanhvien(tendangnhap,matkhau,gioitinh,nghenghiep,sothich) VALUES('$tendangnhap','$matkhau','$gioitinh','$nghenghiep','$sothich')"))
    echo "Đăng kí thành công";
    $con->close();  

?>