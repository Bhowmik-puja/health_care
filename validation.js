
function checkInputs() {
    const pass = document.getElementById('password').value.trim();
    const pass2 = document.getElementById('cpassword').value.trim();
    if (pass2 == pass) {
        return true;
    }
    if (pass2 != pass) {
        const pass = document.getElementById('password').style.borderColor = "red";
        const pass2 = document.getElementById('cpassword').style.borderColor = "red";
        document.getElementById("error").innerHTML = "Password does not match";
        document.getElementById("error2").innerHTML = "Password does not match";
        return false;
    }

}

