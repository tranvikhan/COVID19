//preview avatar before upload
const avatarInput = document.getElementsByName("anhdaidien")[0];
const avatar = document.getElementById("avatar_preview");
avatarInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.addEventListener("load", function () {
            avatar.setAttribute("src", this.result)
        });
        reader.readAsDataURL(file);
    } else {
        resetAvatar();
    }
});
function resetAvatar() {
    avatar.setAttribute("src", "undraw_surveillance_kqll.svg");
}
//validateForm
function validateForm() {
    var tendangnhap= document.getElementsByName("tendangnhap")[0].value;
    var matkhau = document.getElementsByName("matkhau")[0].value; 
    var re_matkhau = document.getElementsByName("re-matkhau")[0].value;
    if (tendangnhap=="") {
        alert("Vui lòng điền tên đăng nhập");
        return false;
    } 
    if (matkhau == "") {
        alert("Vui lòng điền mật khẩu ");
        return false;
    }else 
    if(matkhau != re_matkhau){
        alert("Nhập lại mật khẩu không đúng");
        return false;
    }
    return true;
}