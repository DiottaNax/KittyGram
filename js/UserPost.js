document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM fully loaded and parsed");

    const commentInput = document.getElementById('commentArea');
    const sendButton = document.getElementById('sendButton');

    sendButton.style.display = "none";

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
