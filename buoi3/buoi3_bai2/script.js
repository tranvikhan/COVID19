//validateForm
function validateForm() {
    var tendangnhap= document.getElementsByName("tendangnhap")[0].value;
    var matkhau = document.getElementsByName("matkhau")[0].value; 
    var str ="";
    var kt = true;

    if (tendangnhap=="") {
        str=str +"Vui lòng điền tên đăng nhập";
        kt= false;
    } 
    if (matkhau == "") {
        str = str +"\nVui lòng điền mật khẩu ";
        kt =false;
    }
    if(!kt){
        alert(str);
    }
    return kt;
}
