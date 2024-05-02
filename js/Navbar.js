// Funzione per includere la navbar
function includeNavbar() {
    fetch('Navbar.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('navbarContainer').innerHTML = data;
        });
}

// Chiamata alla funzione per includere la navbar quando la pagina è caricata
window.addEventListener('DOMContentLoaded', includeNavbar);
