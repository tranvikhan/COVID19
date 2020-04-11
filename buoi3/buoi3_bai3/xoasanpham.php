<?php
    include "../databasse_config.php";
    session_start();
    function check(){
        if(!isset($_SESSION['user'])){
        header("Location: ../buoi3_bai2/dangnhap.php");
        die();
    }
    }
    check();
    if(isset($_GET['xoa'])){
        $con = new mysqli($servername, $username, $password, $database);
            if (!$con) {
                die("Lỗi kết nôi: " . mysqli_connect_error());
            }
        $con ->set_charset("utf8");

        $q ="SELECT idtv,hinhanhsp FROM sanpham WHERE idsp='".$_GET['xoa']."' AND idtv=(SELECT id FROM thanhvien WHERE tendangnhap='".$_SESSION['user']."')";
        $kq= $con->query($q);
        if($kq->num_rows>0){
            $row = $kq->fetch_assoc();
            $anhspXoa = $row['hinhanhsp'];
            $q= "DELETE FROM sanpham WHERE idsp='".$_GET['xoa']."'";
            if($con->query($q)){
                unlink($anhspXoa);
                $con->close();
                header("Location: ../buoi3_bai2/thongtin.php");
                die();
            }
        }else{
            $con->close();
            header("Location: ../buoi3_bai2/thongtin.php");
            die();
        }
    }
?>