//validateForm
function validateForm() {
    var tendangnhap= document.getElementsByName("tendangnhap")[0].value;
    var matkhau = document.getElementsByName("matkhau")[0].value; 
    if (tendangnhap=="") {
        alert("Vui lòng điền tên đăng nhập");
        return false;
    } 
    if (matkhau == "") {
        alert("Vui lòng điền mật khẩu ");
        return false;
    }
}