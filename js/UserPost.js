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
