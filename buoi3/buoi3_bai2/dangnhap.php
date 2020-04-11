<?php
    session_start();
    if(isset($_GET['dangxuat'])){
        if($_GET['dangxuat']=true){
            session_destroy();
        }
    }
    if(isset($_SESSION['user'])){
        header("Location: thongtin.php");
        die();
    }
    
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Buổi 3 - Bài 2 Đăng nhập</title>
    <link rel="shortcut icon" href="logo-200px.png">
    <link rel="stylesheet" type="text/css" href="style_buoi3_bai2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
   
<body>
    <div class="thongtin">
        <h2>ĐĂNG NHẬP</h2>
        <img src="logo-200px.png" alt="Ảnh đại diện" />
        <form action="thongtin.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
             <table>
                 <?php
                     if(isset($_GET['thatbai'])){
                        if($_GET['thatbai']=true){
                            echo "<tr> <td colspan = 2> Đăng nhập thất bại! <td><tr>";
                        }
                    } 
                 ?>
                 <tr>
                     <th>Tên đăng nhập:</th>
                 </tr>
                 <tr>
                     <td>
                         <input type="text" name="tendangnhap">
                     </td>
                 </tr>
                 <tr>
                     <th>Mật khẩu:</th>
                 </tr>
                 <tr>
                     <td>
                         <input type="password" name="matkhau">
                     </td>
                 </tr>
                 <tr>
                     <td>
                        <a href="../buoi3_bai1/dangki.html">Đăng kí tài khoản</a>
                     </td>
                 </tr>
             </table>
             <input type="submit" value="Đăng Nhập">
        </form>
    </div>
    <div class="myfooter">
        <p>Sinh viên: Trần Vi Khan - B1704736</p>
        <p>Lập trình web nhóm chiều 6</p>
    </div>
</body>
    <script type="text/Javascript" src="script.js"></script>
</html>