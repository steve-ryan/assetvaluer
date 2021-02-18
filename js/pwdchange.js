const Pwd = document.getElementById("newPassword");
const confirmPwd = document.getElementById("confirmPassword");
const errorMsg = document.getElementById("error-message");
const save = document.getElementById("submit_btn");

confirmPwd.addEventListener("blur", () => {
  if (Pwd.value == confirmPwd.value) {
    Pwd.style.border = "thin solid green";
    confirmPwd.style.border = "thin solid green";
    errorMsg.style.display = "none";
    save.removeAttribute("disabled");
  } else {
    Pwd.style.border = "thin solid red";
    confirmPwd.style.border = "thin solid red";
    errorMsg.style.display = "inline";
    save.setAttribute("disabled", "true");
  }
});
