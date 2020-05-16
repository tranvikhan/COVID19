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
    var chuoikiemtra1 = /^[A-Za-z][A-Za-z1-9]{5,14}$/;
    var chuoikiemtra2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,15}$/;
    var kt = true;
    var str ="";
    if (!chuoikiemtra1.test(tendangnhap) || tendangnhap == "") {
        str = str + "\nVui lòng điền tên đăng nhập: Bắt đầu phải là chữ cái, theo sau có thể là chữ cái hoặc là số; dài từ 6 đến 15 ký tự";
        kt= false;
    } 
    if (!chuoikiemtra2.test(matkhau) || matkhau == "") {
        str = str + "\nVui lòng điền mật khẩu: Phải có cả chữ cái và số; không được có ký tự khác ngoài chữ cái và số; dài từ 6 đến 15 ký tự";
        kt= false;
    }
    if (matkhau != re_matkhau || re_matkhau == "") {
        str = str + "\nNhập lại mật khẩu chưa điền hoặc không đúng";
        kt= false;
    }
    if (!kt) {
        alert(str);
    }
    return kt;
}