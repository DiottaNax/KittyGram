document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM fully loaded and parsed");

    const postSwitch = document.getElementById('postSwitch');
    const taggedSwitch = document.getElementById('taggedSwitch');
    const userPostsContainer = document.getElementById('userPostsContainer');
    const adoptionsContainer = document.getElementById('adoptionsContainer');
    const likeIcon = document.getElementById('likeIcon');
    const commentInput = document.getElementById('commentArea');
    const sendButton = document.getElementById('sendButton');

    console.log("postSwitch:", postSwitch);
    console.log("taggedSwitch:", taggedSwitch);
    console.log("userPostsContainer:", userPostsContainer);
    console.log("adoptionsContainer:", adoptionsContainer);
    console.log("likeIcon:", likeIcon);

    if (postSwitch && taggedSwitch && userPostsContainer && adoptionsContainer) {
        postSwitch.addEventListener('change', function() {
            console.log("postSwitch changed");
            if (this.checked) {
                userPostsContainer.style.display = 'block';
                adoptionsContainer.style.display = 'none';
            }
        });

        taggedSwitch.addEventListener('change', function() {
            console.log("taggedSwitch changed");
            if (this.checked) {
                userPostsContainer.style.display = 'none';
                adoptionsContainer.style.display = 'block';
            }
        });
    } else {
        console.error('One or more elements were not found');
    }

    if (likeIcon) {
        likeIcon.addEventListener('click', function() {
            console.log("likeIcon clicked");
            if (likeIcon.classList.contains('bi-heart')) {
                likeIcon.classList.remove('bi-heart');
                likeIcon.classList.add('bi-heart-fill');
                likeIcon.classList.add('heart-fill-red');
                likeIcon.innerHTML = '<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>';
            } else {
                likeIcon.classList.remove('bi-heart-fill');
                likeIcon.classList.remove('heart-fill-red');
                likeIcon.classList.add('bi-heart');
                likeIcon.innerHTML = '<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>';
            }
        });
    } else {
        console.error('likeIcon not found');
    }

    if (commentInput) {
        // Aggiungi evento di ascolto per l'input nella casella di commento
        commentInput.addEventListener('input', function () {
            // Verifica se la casella di input ha un valore
            if (this.value.trim() !== '') {
                // Se ha un valore, mostra il bottone "Send"
                sendButton.style.display = 'inline-block';
            } else {
                // Se non ha un valore, nascondi il bottone "Send"
                sendButton.style.display = 'none';
            }
        });
    } else {
        console.error('commentInput not found');
    }

    //codice per icona del commento
    if (commentIcon && commentInput) {
        commentIcon.addEventListener('click', function() {
            commentInput.focus();
        });
    } else {
        console.error('commentIcon or commentInput not found');
    }
});
