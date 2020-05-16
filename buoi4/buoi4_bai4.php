<?php
    include "../buoi3/databasse_config.php";
    session_start();
    function check(){
        if(!isset($_SESSION['user'])){
        header("Location: ../buoi3/buoi3_bai2/dangnhap.php");
        die();
    }
    }
    check();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Buổi 4 - Bai 2</title>
        <link rel="shortcut icon" href="../../assets/img/logo-200px.png">
        <link rel="stylesheet" type="text/css" href="css/buoi4_bai4.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="thongtin">
            <a href="../buoi3/buoi3_bai2/thongtin.php" class="btn-style btn-style1 left-btn">
                <img src="img/back_26px.png" alt="back">
                Về danh mục</a>
            <h2>ẢNH SẢN PHẨM</h2>
            <div class="side_show_img">
                <div class="image-fame">
                    <?php 
                        $con = new mysqli($servername, $username, $password, $database);
                        if (!$con) {
                            die("Lỗi kết nôi: " . mysqli_connect_error());
                        }
                        $con ->set_charset("utf8");

                        $q ="SELECT * FROM sanpham WHERE idtv=(SELECT id FROM thanhvien WHERE tendangnhap='".$_SESSION['user']."')";
                        $kq= $con->query($q);
                        $arTenSp = array();
                        if($kq->num_rows>0){
                            while($row = $kq->fetch_assoc()){
                                $tensp = $row['tensp'];
                                array_push($arTenSp,$tensp);
                                $anhTmp = $row['hinhanhsp'];
                                $anhsp = "../buoi3/".substr($anhTmp,3,strlen($anhTmp));
                                str_replace('../', '../buoi3/', $anhsp);
                                echo("<img class='mySlides' src='$anhsp'>");    
                            }
                        }else{
                            $con->close();
                            header("Location: ../buoi3/buoi3_bai2/thongtin.php");
                            die();
                        }
                        $con->close();
                    ?>
                </div>
                <div class="btn-group">
                    <button class="btn-style btn-style1" onclick="plusDivs(-1)">Prevous
                        <img src="img/back_to_50px.png" alt="..">
                    </button>
                    <button class="btn-style btn-style2" onclick="plusDivs(1)">Next
                        <img src ="img/next_page_50px.png" alt="..">
                    </button>
                </div>
                <select id="select1" onchange="showChange();">
                <?php 
                    foreach($arTenSp as $tensanpham){
                        echo("<option>$tensanpham</option>");
                    }
                ?>
                </select>
                
            </div>
        </div>
        <div class="myfooter">
            <p>Sinh viên: Trần Vi Khan - B1704736</p>
            <p>Lập trình web nhóm chiều 6</p>
        </div>
        <script type="text/Javascript" src="js/buoi4_bai4.js"></script>
    </body>
</html>