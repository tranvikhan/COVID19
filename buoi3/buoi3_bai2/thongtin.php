<!DOCTYPE html>
<?php 
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
        if(isset($_POST['tendangnhap'])){
            $tendangnhap = $_POST['tendangnhap'];
            $matkhau = md5($_POST['matkhau']);
            $q = "SELECT * FROM thanhvien WHERE '$tendangnhap' = tendangnhap AND '$matkhau' = matkhau";
            $result = $con->query($q);
            if($result->num_rows>0){
                setcookie("user","",time()-3600);
                setcookie("user",$tendangnhap,time()+3600);
                header("Location: thongtin.php");
                die();
                $con->close();
            }else{
                header("Location: dangnhap.php?thatbai=true");
                $con->close();
                die();
            }
        }
        if(isset($_COOKIE['user'])){
            $q = "SELECT * FROM thanhvien WHERE '".$_COOKIE['user']."' = tendangnhap";
            $result = $con->query($q);
            while($row = $result ->fetch_assoc()){
                $tendangnhap = $row['tendangnhap'];
                $giotinh =$row['gioitinh'];
                $nghenghiep =$row['nghenghiep'];
                $sothich =$row['sothich'];
                $hinhanh =$row['hinhanh'];
            }
            
        }else{
            header("Location: dangnhap.php");
            die();
            $con->close();
        }
        $con->close();
        
?>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title><?php echo $tendangnhap ?></title>
    <link rel="shortcut icon" href="logo-200px.png">
    <link rel="stylesheet" type="text/css" href="style_buoi3_bai2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
    <div class="box">
        <div class="left">
                <h2>Xin chào <?php echo $tendangnhap ?> !</h2>
                <img src="<?php echo $hinhanh ?>" alt="Ảnh đại diện" />
                <table>
                    <tr>
                        <th>Tên đăng nhập:</th>
                        <td><?php echo $tendangnhap ?></td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td><?php echo $giotinh?></td>
                    </tr>
                    <tr>
                        <th>Nghề nghiệp:</th>
                        <td><?php echo $nghenghiep?></td>
                    </tr>
                    <tr>
                        <th>Sở thích:</th>
                        <td><?php echo $sothich ?></td>
                    </tr>
                </table>
                <a href="dangnhap.php?dangxuat=true" class="btn-style1 center" > 
                    <img src="logout_rounded_left_30px.png">
                    Đăng Xuất</a>
        </div>
        <div class="right">
            <h2>Danh sách sản phẩm</h2>
            <a href="#" class="btn-style1">
                <img src="add_30px.png">
                Thêm sản phẩm</a>
            <table>
                <thead>
                    <tr>
                        <th>
                            STT
                        </th>
                        <th>
                            Tên Sản Phẩm
                        </th>
                        <th>
                            Giá sản phẩm
                        </th>
                        <th colspan="3">
                            Lựa chọn
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Iphone X</td>
                        <td>20000000 (VND)</td>
                        <td><a href="#">Xem chi tiết</a></td>
                        <td><a href="#"><img src="edit_50px.png"></a></td>
                        <td><a href="#"><img src="delete_bin_30px.png"></a></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Iphone X</td>
                        <td>20000000 (VND)</td>
                        <td><a href="#">Xem chi tiết</a></td>
                        <td><a href="#"><img src="edit_50px.png"></a></td>
                        <td><a href="#"><img src="delete_bin_30px.png"></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="myfooter">
        <p>Sinh viên: Trần Vi Khan - B1704736</p>
        <p>Lập trình web nhóm chiều 6</p>
    </div>
    
</body>
</html>
