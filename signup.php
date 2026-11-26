<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMatch - Opret konto</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-section">
        
        <div class="login-container">
            <div class="logo-container">
                <img src="../MentorMatch.png" alt="MentorMatch Logo" class="logo">
            </div>
            <h2>Opret konto</h2>
            <form id="signup">
                <input type="text" id="name" name="name" placeholder="Navn" autocomplete="name" required>
                <input type="email" id="email" name="email" placeholder="E-mail" autocomplete="email" required>
                <input type="password" id="new-password" name="password" placeholder="Adgangskode" autocomplete="new-password" required>
                <button type="submit">Opret konto</button>
            </form>
            <p class="signup-link">Har du allerede en konto? <a href="index.php">Log ind</a></p>
        </div>
    </div>
</body>
</html>
