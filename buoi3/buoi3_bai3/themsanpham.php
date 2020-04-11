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
    if(isset($_POST['tensp'])){
        check();
        $con = new mysqli($servername, $username, $password, $database);
            if (!$con) {
                die("Lỗi kết nôi: " . mysqli_connect_error());
            }
        $con ->set_charset("utf8");
        $tensp=$_POST['tensp'];
        $chitietsp=$_POST['chitietsp'];
        $giasp=$_POST['giasp'];
        $duongdan="../sanpham/" . $_FILES['anhsp']['name'];
    
        $q ="INSERT INTO sanpham(tensp,chitietsp,giasp,hinhanhsp,idtv) VALUES('$tensp','".$chitietsp."','$giasp','$duongdan',(SELECT id FROM thanhvien WHERE tendangnhap='".$_SESSION['user']."'))";
        if($con->query($q)){
            $con->close();
            move_uploaded_file($_FILES['anhsp']['tmp_name'],$duongdan);
            header("Location: ../buoi3_bai2/thongtin.php");
            die();
        }else{
            $con->close();
            header("Location: themsanpham.php?thanhcong=false");
            die();
        }    
   }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Buổi 3 - Bài 3 Thêm sản phẩm</title>
    <link rel="shortcut icon" href="../../assets/img/logo-200px.png">
    <link rel="stylesheet" type="text/css" href="style_buoi3_bai3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="thongtin">
        <a href="../buoi3_bai2/thongtin.php" class="btn-style1">
            <img  src="chevron_left_30px.png" alt="back">
            Về danh mục</a>
        <h2>Thêm sản phẩm mới</h2>
        <form action="themsanpham.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <table>
            <tr>
                <th>Tên sản phẩm:</th>
                <td><input type="text" name="tensp"></td>
            </tr>
            <tr>
                <th>Chi tiết sản phẩm:</th>
                <td>
                    <textarea cols="25" rows="5" name="chitietsp"></textarea>
                </td>
            </tr>
            <tr>
                <th>Giá sản phẩm(VND):</th>
                <td><input type="text" name ="giasp"></td>
            </tr>
            <tr>
                <th>Ảnh sản phẩm:</th>
                <td>
                    <input type="file" name="anhsp"> 
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="undraw_photo_4yb9.svg" alt=" Xem trước ảnh sản phẩm" id="imgPreview" />
                </td>
            </tr>
            <tr>
                <th><input type="reset" value="Làm lại" name="lamlai" onclick="resetPicture()"></th>
                <td><input type="submit" value="Thêm sản phẩm mới"></td>
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
<script type="text/Javascript">
<?php 
    if(isset($_GET['thanhcong'])){
       check();
       if($_GET['thanhcong']){
           echo('alert("Thêm sản phẩm thành công");');
       }else echo('alert("Thất bại :( Thử lại sau !");');
   }
?>
</script>
</html>