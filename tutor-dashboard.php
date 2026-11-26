<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMatch - Tutor</title>
    <link rel="stylesheet" href="tutor-dashboard.css">
    <!--Henter ikoner-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="aktiv.js" defer></script>
    <script src="chat.js" defer></script>
    <script src="tutor-dashboard.js" defer></script>
</head>
<body>

    <header class="nav">
        <a class="brand" href="/lmh24vive/tutor/tutor-dashboard.php" aria-label="MentorMatch home">
            <svg viewBox="0 0 120 120" role="img" aria-hidden="true">
                <path d="M20 104 V52 A20 20 0 0 1 60 52 V104" fill="none" stroke="#1F4D3A" stroke-width="15" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M60 104 V74 A20 20 0 0 1 100 74 V104" fill="none" stroke="#7CB518" stroke-width="15" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="100" cy="30" r="9" fill="#7CB518"/>
            </svg>
            <div class="word"><b>Mentor</b><span>match</span></div>
        </a>
        <div class="nav-links">
            <a href="/lmh24vive/tutor/tutor-dashboard.php" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                </svg>
                Hjem
            </a>
                
            <a href="/lmh24vive/tutor/tutor-chats.php" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105"/>
                </svg>
                Chats
            </a>
            <a href="../lmh24vive/points/points-shop.php" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                </svg>
                Points Shop
            </a>
        </div>
        <div class="profile">
            <a href="../lmh24vive/points/points-shop.php" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-coins"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3" /><path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" /><path d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598" /><path d="M3 6v10c0 .888 .772 1.45 2 2" /><path d="M3 11c0 .888 .772 1.45 2 2" /></svg>
                <script>
                    let points = localStorage.getItem('points');
                </script>

            </a>
            <a href="/lmh24vive/tutor/tutor-profile.php" class="nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
            </a>
            
        </div>
    </header>
        <div class="dashboard-container">
            
            <div class="sidebar-sektion">
                <p class="sidebar-title">Mine elever</p>
                <div id="chatListe"></div>    
            </div>
            
            <div id="openChatShow" class="visChatStyle">
                
            </div>

            <div id="dashboard" class="chatMain">
                <div id="besked" class="besked"></div>
                
                <p class="overblik">Her er dit tutor-overblik</p>
                <div id="dashboard-stats">
                    <div id="aktiveBeskeder" class="stats-kort">
                        <div class="stat-ikon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <p>Aktive beskeder</p>
                            <h2 id="aktiv" class="aktivNu">3</h2>
                        </div>
                    </div>

                    <div id="usvaretBeskeder" class="stats-kort">
                        <div class="stat-ikon">
                            <i class="fa-solid fa-message"></i>
                        </div>
                        <div class="stat-info">
                            <p>Ulæste beskeder</p>
                            <h2 id="antalNye" class="usvaret">0</h2>
                        </div>
                    </div>
                    <div id="lektier" class="stats-kort">
                        <div class="stat-ikon">
                            <i class="fa-solid fa-clipboard"></i>
                        </div>
                        <div class="stat-info">
                            <p>Lektier givet</p>
                            <h2 id="lektier">20</h2>
                        </div>
                    </div>
                    <div id="points" class="stats-kort">
                        <div class="stat-ikon">
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="stat-info">
                            <p>Optjente points</p>
                            <h2 id="points">120</h2>
                        </div>
                    </div>
                </div>
                
                <div id="sensteAktivitet" class="aktivitet">
                    <h2>Seneste aktivitet</h2>
                    <div class="aktivitet-info">
                        <h2>Elev 1 har sendt en besked:</h2>
                        <p>Spørgsmål om matematik ● For nylig</p>
                    </div>
                </div>
                
            </div>
        </div>

    
</body>
</html>