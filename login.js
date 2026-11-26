
function showPassword() {
    var passwordInput = document.getElementById("password");
    var toggleButton = document.getElementById("togglePassword");
    
    var isPressed = toggleButton.getAttribute("aria-pressed") === "true";
    toggleButton.setAttribute("aria-pressed", !isPressed);
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}


function validateForm() {
    var email = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var elevMail = "elev@gmail.com";
    var elevPassword = "12345";

    var tutorMail = "tutor@gmail.com";
    var tutorName = "Victor"
    localStorage.setItem("tutorName", tutorName);
    var tutorPassword = "67890";

    if (email === elevMail && password === elevPassword) {
        window.location.href = "/lmh24vive/elev/elev-dashboard.php";
        return false;
    } else if (email === tutorMail && password === tutorPassword) {
        window.location.href = "/lmh24vive/tutor/tutor-dashboard.php";
        return false;
    } else {
        alert("Forkert email eller adgangskode. Prøv igen.");
        return false;
    }


}
