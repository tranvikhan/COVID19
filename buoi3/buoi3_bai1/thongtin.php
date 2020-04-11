
<!DOCTYPE html>
<?php   
        $tendangnhap = $_POST['tendangnhap'];
        $matkhau = md5($_POST['matkhau']);
        $matkhau2 = $_POST['re-matkhau'];
        $gioitinh = $_POST['gioitinh'];
        $nghenghiep = $_POST['nghenghiep'];
        $sothich ="";
        if(!empty($_POST['sothich'])){
            foreach($_POST['sothich'] as $st){
            $sothich = $sothich . $st .", ";
            }
            $sothich = substr($sothich,0,strlen($sothich)-2);
        }
        if($_FILES['anhdaidien']['name']==""){
            $duongdan="../avatar/default.png";
        }else{
            $duongdan="../avatar/" . $_FILES['anhdaidien']['name'];
        }   
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
        }else{
            $con->close();
            die("Đăng kí thất bại !");
        }
        $con->close();
    ?>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <title>Buổi 3 - Bài 1 Thông Tin</title>
        <link rel="shortcut icon" href="../../assets/img/logo-200px.png">
        <link rel="stylesheet" type="text/css" href="style_buoi3_bai1.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="thongtin">
                <h2>ĐĂNG KÍ THÀNH CÔNG</h2>
                <img src="<?php echo $duongdan; ?>" alt="Ảnh đại diện" />
                    <table>
                        <tr>
                            <th>Tên đăng nhập:</th>
                            <td><?php echo $tendangnhap; ?></td>
                        </tr>
                        <tr>
                            <th>Giới tính:</th>
                            <td><?php echo $gioitinh; ?></td>
                        </tr>
                        <tr>
                            <th>Nghề nghiệp:</th>
                            <td><?php echo $nghenghiep; ?></td>
                        </tr>
                        <tr>
                            <th>Sở thích:</th>
                            <td><?php echo $sothich; ?></td>
                        </tr>
                    </table>
                    <p id="timeOut"></p>
        </div>
        <div class="myfooter">
            <p>Sinh viên: Trần Vi Khan - B1704736</p>
            <p>Lập trình web nhóm chiều 6</p>
        </div>
    </body>
    <script type="text/Javascript"> 
        var i=0;
        var obj = setInterval(() => {
            i=i+1;
            document.getElementById("timeOut").innerHTML = 'vui lòng chờ đợi trong: '+i+'mili giây';
        }, 1);
        setTimeout(function () {
            clearInterval(obj);
            location.assign('../buoi3_bai2/dangnhap.php');
        }, 2000);
    </script>
</html>