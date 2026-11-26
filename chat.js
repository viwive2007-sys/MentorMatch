console.log("Chat er indlæst")
function visBeskeder(chatId) {
    return fetch("hent_beskeder.php?chat_id=" + chatId)
        .then(response => response.json())
        .then(data => {

            console.log("HentedeBeskeder:", data);

            if (data.status === "success") {
                const beskedListe = document.getElementById("beskedListe");
                beskedListe.innerHTML = "";

                data.beskeder.forEach(besked => {
                    const beskedElement = document.createElement("div");
                    beskedElement.classList.add("besked-gruppe");

                    if (besked.navn === "Victor") {
                        beskedElement.classList.add("tutor-besked");
                    } else {
                        beskedElement.classList.add("elev-besked");
                    }

                    beskedElement.innerHTML = `
                        <small>${besked.navn} ● ${besked.tidspunkt}</small>
                        <div class="besked-boble">
                            <p>${besked.besked}</p>
                        </div>
                    `;
                    
                    beskedListe.appendChild(beskedElement);
                });
            }
        
        })
        .catch(error => {
            console.error("Fejl ved hentning af beskeder:", error);

        });
}