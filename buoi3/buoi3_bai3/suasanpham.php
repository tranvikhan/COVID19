<?php
    include "../databasse_config.php";
        $idsp= "";
        $tensp = "";
        $chitietsp ="";
        $giasp ="";
        $anhsp = "";
    session_start();
    function check(){
        if(!isset($_SESSION['user'])){
        header("Location: ../buoi3_bai2/dangnhap.php");
        die();
    }
    }
    check();
    if(isset($_POST['tensp'])){
        $con = new mysqli($servername, $username, $password, $database);
            if (!$con) {
                die("Lỗi kết nôi: " . mysqli_connect_error());
            }
        $con ->set_charset("utf8");

        $q="UPDATE sanpham SET tensp= '".$_POST['tensp']."' WHERE idsp ='".$_SESSION['sua']."' AND tensp<>'".$_POST['tensp']."'";
        $con->query($q);
        $q="UPDATE sanpham SET chitietsp= '".$_POST['chitietsp']."' WHERE idsp ='".$_SESSION['sua']."' AND chitietsp<>'".$_POST['chitietsp']."'";
        $con->query($q);
        $q="UPDATE sanpham SET giasp= '".$_POST['giasp']."' WHERE idsp ='".$_SESSION['sua']."' AND giasp<>'".$_POST['giasp']."'";
        $con->query($q);
        if($_FILES['anhsp']['name']!=""){
            $q ="SELECT hinhanhsp FROM sanpham WHERE idsp='".$_SESSION['sua']."'";
            $kq= $con->query($q);
            $row = $kq->fetch_assoc();
            $anhspXoa = $row['hinhanhsp'];
            unlink($anhspXoa);
            $duongdan="../sanpham/" . $_FILES['anhsp']['name'];
            $q="UPDATE sanpham SET hinhanhsp= '".$duongdan."' WHERE idsp ='".$_SESSION['sua']."'";
            $con->query($q);
            move_uploaded_file($_FILES['anhsp']['tmp_name'],$duongdan);   
        }
        $con->close();
        header("Location: ../buoi3_bai2/thongtin.php");
        die();
    }
    if(isset($_GET['sua'])){
        $_SESSION['sua']=  $_GET['sua'];
        $con = new mysqli($servername, $username, $password, $database);
            if (!$con) {
                die("Lỗi kết nôi: " . mysqli_connect_error());
            }
        $con ->set_charset("utf8");

        $q ="SELECT * FROM sanpham WHERE idsp='".$_GET['sua']."' AND idtv=(SELECT id FROM thanhvien WHERE tendangnhap='".$_SESSION['user']."')";
        $kq= $con->query($q);
        if($kq->num_rows>0){
            $row = $kq->fetch_assoc();
            $idsp= $row['idsp'];
            $tensp = $row['tensp'];
            $chitietsp =$row['chitietsp'];
            $giasp =$row['giasp'];
            $anhsp = $row['hinhanhsp'];
            $con->close();
        }else{
            $con->close();
            header("Location: ../buoi3_bai2/thongtin.php");
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Buổi 3 - Bài 3 Sửa sản phẩm</title>
    <link rel="shortcut icon" href="../../assets/img/logo-200px.png">
    <link rel="stylesheet" type="text/css" href="style_buoi3_bai3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="thongtin">
        <a href="../buoi3_bai2/thongtin.php" class="btn-style1">
            <img src="chevron_left_30px.png" alt="back">
            Về danh mục</a>
        <h2>Sửa sản phẩm</h2>
        <form action="suasanpham.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm2()">
            <table>
                <tr>
                    <th>Mã sản phẩm:</th>
                    <td><input type="text" name="idsp" disabled value="<?php echo($idsp);?>"></td>
                </tr>
                <tr>
                    <th>Tên sản phẩm:</th>
                    <td><input type="text" name="tensp" value="<?php echo($tensp);?>"></td>
                </tr>
                <tr>
                    <th>Chi tiết sản phẩm:</th>
                    <td>
                        <textarea cols="25" rows="5" name="chitietsp" ><?php echo($chitietsp);?></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Giá sản phẩm(VND):</th>
                    <td><input type="text" name="giasp" value="<?php echo($giasp);?>"></td>
                </tr>
                <tr>
                    <th>Chọn ảnh mới:</th>
                    <td>
                        <input type="file" name="anhsp">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <img src="<?php echo($anhsp);?>" alt=" Xem trước ảnh sản phẩm" id="imgPreview" />
                    </td>
                </tr>
                <tr>
                    <th> &nbsp</th>
                    <td><input type="submit" value="Cập nhật sản phẩm"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="myfooter">
        <p>Sinh viên: Trần Vi Khan - B1704736</p>
        <p>Lập trình web nhóm chiều 6</p>
    </div>
</body>
<script type="text/Javascript" src="script.js"></script>