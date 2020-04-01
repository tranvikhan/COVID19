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
    $duongdan="./avatar/" . $_FILES['anhdaidien']['name'];

    //SQL
    $servername = "localhost";
    $database = "buoi3";
    $username = "root";
    $password = "";
   
    $con = new mysqli($servername, $username, $password, $database);
    
    if (!$con) {
        die("Lỗi kết nôi: " . mysqli_connect_error());
    }
    $con ->set_charset("utf8");
    if( $con->query("INSERT INTO thanhvien(tendangnhap,matkhau,hinhanh,gioitinh,nghenghiep,sothich) VALUES('$tendangnhap','$matkhau','$duongdan','$gioitinh','$nghenghiep','$sothich')")){
        move_uploaded_file($_FILES['anhdaidien']['tmp_name'],$duongdan);
        echo "đăng kí thành công!";
    }
    $con->close();
    
?>
