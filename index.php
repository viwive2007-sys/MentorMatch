<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMatch - Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-section">
        <div class="login-container">
            <div class="logo-container">
                <img src="MentorMatch.png" alt="MentorMatch Logo" class="logo">
            </div>
            <h2>Log ind</h2>
            <form id="login" method="POST">
                <input type="text" id="username" name="username" placeholder="Brugernavn eller e-mail" required>
                <div class="password-toggle">
                    <input type="password" id="password" name="password" placeholder="Adgangskode" required>
                    <button type="button" id="togglePassword" aria-label="Vis adgangskode" aria-pressed="false" onclick="showPassword()">
                        <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M1 8s2.5-4.5 7-4.5S15 8 15 8s-2.5 4.5-7 4.5S1 8 1 8Z"/>
                            <circle cx="8" cy="8" r="2"/>
                        </svg>
                        <svg class="eye-icon eye-icon-hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M1 8s2.5-4.5 7-4.5S15 8 15 8s-2.5 4.5-7 4.5S1 8 1 8Z"/>
                            <circle cx="8" cy="8" r="2"/>
                            <path d="m2 2 12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Husk mig</label>
                </div>
                <button type="submit" value="Login" onClick="return validateForm();">Log ind</button>
            </form>
            <p class="signup-link">Har du ikke en konto? <a href="signup.php">Opret en her</a></p>
        </div>
    </div>


    <script src="login.js"></script>
</body>
</html>