
function getHilsen (){
    
    const timer = new Date().getHours();
    let besked;

    if (timer < 5) {
        besked = "God nat";
    } else if (timer < 12) {
        besked = "God morgen";
    } else if (timer < 17) {
        besked = "God eftermiddag";
    } else if (timer < 20) {
        besked = "God aften";
    } else {
        besked = "God nat";
    }
    let tutorName = localStorage.getItem("tutorName") || "Tutor"
    return besked + ", " + tutorName + "!";
}

function visHilsen(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.textContent = getHilsen();
    }
}

visHilsen("besked")


const ikoner = {
    calculator: '<i class="fa-solid fa-calculator"></i>',
    atom: '<i class="fa-solid fa-atom"></i>',
    language: '<i class="fa-solid fa-language"></i>'
};

let chats = [
    {
        id: 1,
        elev: "Elev 1",
        titel: "Spørgsmål om matematik",
        oprettet: "2026-11-11T14:30",
        ikon: "calculator",
        beskrivelse: "Hjælp mig med matematik tak",
        aktiv: true,
        ny: true
    },
    {
        id: 2,
        elev: "Elev 2",
        titel: "Hjælp mig med min fysikopgave",
        oprettet: "2026-11-11T11:30",
        ikon: "atom",
        beskrivelse: "hEj MeD dIg!",
        aktiv: true,
        ny: false
    },
    {
        id: 3,
        elev: "Elev 3",
        titel: "Hjælp til engelsk grammatik",
        oprettet: "2026-11-11T12:45",
        ikon: "language",
        beskrivelse: "grammatik er dårligt",
        aktiv: true,
        ny: false
    }
];

let aktivChatId = null;

function visChats(){
    chats.sort((a, b) => new Date(b.oprettet) - new Date(a.oprettet));
    const chatListe = document.getElementById("chatListe");
    chatListe.innerHTML = "";
    let antalUsvaret = 0;
    let antalAktive = 0;
    chats.forEach(chat => {

        if (chat.aktiv) {
            antalAktive++;
        }

        const chatElement = document.createElement("div");
        chatElement.classList.add("chat-kort");

        //IKONER
        const ikon = document.createElement("div");
        ikon.classList.add("chat-ikon");
        ikon.innerHTML = ikoner[chat.ikon];

        //INDHOLDET
        const indhold = document.createElement("div")
        indhold.classList.add("chat-indhold");

        const titel = document.createElement("p");
        titel.textContent = chat.titel;

        const elev = document.createElement("p");
        elev.textContent = chat.elev;
        
        const tidspunkt = document.createElement("p");
        tidspunkt.classList.add("chat-tidspunkt");
        const dato = new Date(chat.oprettet);

        tidspunkt.textContent = dato.toLocaleDateString("da-DK", {
            day: "2-digit",
            month: "2-digit",
            year: "numeric",
            hour: "2-digit",
            minute: "2-digit"
        });
    

        indhold.appendChild(titel);
        indhold.appendChild(elev);
        indhold.appendChild(tidspunkt);

        if (chat.ny) {
            antalUsvaret++;
            chatElement.classList.add("chat-ny");

            const ny = document.createElement("span");
            ny.classList.add("ny-badge");
            ny.textContent = "Ny";

            chatElement.appendChild(ikon);
            chatElement.appendChild(indhold);
            chatElement.appendChild(ny);
        } else {
            chatElement.appendChild(ikon);
            chatElement.appendChild(indhold)
        }
        chatElement.addEventListener("click", () =>{
            chat.ny = false;

            aktivChatId = chat.id;

            console.log("Åbner chat for: " + chat.elev);
            //Henter beskeder fra databasen til den valgte chat
            console.log("Chat ID:", chat.id);
            

            const dashboardStats = document.getElementById("dashboard");
            if (dashboardStats) {
                dashboardStats.style.display = "none";
            }

            const openChat = document.getElementById("openChatShow")
            if (openChat) {
                openChat.style.display = "flex";
                openChat.innerHTML = `
                <div class="infoChat">
                    <h3> Chat med ${chat.elev} ● ${chat.titel}</h3>
                </div>
                
                <div id="beskedListe"></div>

                <form id="inputFelt" method="POST" onsubmit="event.preventDefault();">
                    <div class="sendBesked">

                        <input type="text" id="chatFelt" name="chatFelt" placeholder="Send besked til ${chat.elev}" required>
                        <button type="button" id="beskedKnap" onclick="senderBesked()">
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </button>
                    </div>

                    
                </form>
                `;
                visBeskeder(chat.id);
            }
            const navLinks = document.querySelectorAll(".nav-item");
            navLinks.forEach(link => {
                link.classList.remove("active");
                if (link.textContent.trim().toLowerCase() === "chats" || link.getAttribute("href").includes("chat")) 
                {
                    link.classList.add("active");
                }
            })

            visChats();
        });

        chatListe.appendChild(chatElement);


    });
    const antalElement = document.getElementById("antalNye");
    if (antalElement) {
        antalElement.textContent = antalUsvaret;
        if (antalUsvaret === 0) {
            antalElement.textContent = "0";
            
        } else {
            antalElement.style.display = "inline-block";
        }
        
    };

    const aktivElement = document.getElementById("aktiv");

    if (aktivElement) {
        aktivElement.textContent = antalAktive;

        if (antalAktive === 0) {
            aktivElement.textContent = "0";
        } else {
            aktivElement.style.display = "inline-block";
        }
    };

}

function senderBesked() {
    var beskedSent = document.getElementById("chatFelt").value;
    if (!beskedSent.trim()) return;
    console.log("Sender til database:", beskedSent);
    console.log("Aktivt chat-ID", aktivChatId);

    fetch('gem_besked.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            besked: beskedSent,
            chat_id: aktivChatId
        })
    })
    .then(response => response.text())
    .then(text => {
        console.log("Svar fra server:", text)

        const data = JSON.parse(text);
        if (data.status === "success") {
            document.getElementById("chatFelt").value = "";
            console.log("Beskeden er gemt!")

            visBeskeder(aktivChatId)
        } else {
            console.log(data.message);
        }
    })
    .catch((error) => {
        console.error("Fejl", error);
    });


}

visChats();

