<?php
    function check(){
        if(!isset($_COOKIE['user'])){
        header("Location: ../buoi3_bai2/dangnhap.php");
        die();
    }
    }
    check();
    if(isset($_GET['xem'])){
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

        $q ="SELECT * FROM sanpham WHERE idsp='".$_GET['xem']."' AND idtv=(SELECT id FROM thanhvien WHERE tendangnhap='".$_COOKIE['user']."')";
        $kq= $con->query($q);
        if($kq->num_rows>0){
            $row = $kq->fetch_assoc();
            $tensp = $row['tensp'];
            $chitietsp =$row['chitietsp'];
            $giasp =$row['giasp'];
            $anhsp = $row['hinhanhsp'];
            $con->close();
            }
            else{
                $con->close();
                header("Location: ../buoi3_bai2/thongtin.php");
                die();
            }
    }else{
        header("Location: ../buoi3_bai2/thongtin.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>iphone</title>
    <link rel="shortcut icon" href="logo-200px.png">
    <link rel="stylesheet" type="text/css" href="style_buoi3_bai4.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div class="box">
        <div class="left">
            <a href="../buoi3_bai2/thongtin.php" class="btn-style1">
                <img src="../buoi3_bai3/chevron_left_30px.png" alt="back">
                Về danh mục</a>
           <img src="<?php echo($anhsp);?>" alt="Ảnh đại diện" />
        </div>
        <div class="right">
             <h1><?php echo($tensp);?></h1>
             <h2>Giá: <span><?php echo($giasp);?></span> (VND)</h2>
             <h3>Thông tin sản phẩm:</h3>
             <p>
                 <?php echo($chitietsp);?>
             </p>
        </div>
    </div>
    <div class="myfooter">
        <p>Sinh viên: Trần Vi Khan - B1704736</p>
        <p>Lập trình web nhóm chiều 6</p>
    </div>

</body>
</html>