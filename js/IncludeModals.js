// Funzione per includere la finestra modale dei follower
function includeFollowersModal() {
    fetch('FollowersModal.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('followersModalContainer').innerHTML = data;
        });
}

// Funzione per includere la finestra modale dei seguiti
function includeFollowingModal() {
    fetch('FollowingModal.html')
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
