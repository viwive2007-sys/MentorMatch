document.addEventListener("DOMContentLoaded", function(){
    let currentFile = window.location.pathname.split("/").pop();
    if (currentFile === "") {
        currentFile = "index.html";
    }

    const navLinks = document.querySelectorAll(".nav-item");

    navLinks.forEach(link => {
        let linkHref = link.getAttribute("href");
        let linkFile = linkHref.split("/").pop();
        if (currentFile === linkFile) {
            link.classList.add("active")
        }
    });
   
});