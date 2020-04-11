//validateForm
function validateForm() {
    var tensp= document.getElementsByName("tensp")[0].value;
    var giasp = document.getElementsByName("giasp")[0].value; 
    var anhsp = document.getElementsByName("anhsp")[0].value;
    if (tensp=="") {
        alert("Vui lòng điền tên sản phẩm");
        return false;
    } 
    if (giasp == "") {
        alert("Vui lòng điền giá sản phẩm ");
        return false;
    }
    if (anhsp == "") {
        alert("Vui lòng chọn ảnh sản phẩm ");
        return false;
    }
    return true;
}
//validateForm 2
function validateForm2() {
    var tensp = document.getElementsByName("tensp")[0].value;
    var giasp = document.getElementsByName("giasp")[0].value;
    var anhsp = document.getElementsByName("anhsp")[0].value;
    if (tensp == "") {
        alert("Vui lòng điền tên sản phẩm");
        return false;
    }
    if (giasp == "") {
        alert("Vui lòng điền giá sản phẩm ");
        return false;
    }
    return true;
}
//preview avatar before upload
const avatarInput = document.getElementsByName("anhsp")[0];
const avatar = document.getElementById("imgPreview");
avatarInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.addEventListener("load", function () {
            avatar.setAttribute("src", this.result)
        });
        reader.readAsDataURL(file);
    } else {
        resetPicture();
    }
});

function resetPicture() {
    avatar.setAttribute("src", "undraw_photo_4yb9.svg");
}