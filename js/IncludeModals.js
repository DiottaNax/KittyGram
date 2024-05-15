// Funzione per includere la finestra modale dei follower
function includeFollowersModal() {
    fetch('followersModal.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('followersModalContainer').innerHTML = data;
        });
}

// Funzione per includere la finestra modale dei seguiti
function includeFollowingModal() {
    fetch('followingModal.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('followingModalContainer').innerHTML = data;
        });
}

// Chiamata alle funzioni per includere le finestre modali quando la pagina è caricata
window.addEventListener('DOMContentLoaded', () => {
    includeFollowersModal();
    includeFollowingModal();
});
