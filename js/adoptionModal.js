document.addEventListener("DOMContentLoaded", () => {
    const phoneNumberInput = document.getElementById("phone_number");
    const presentationTextarea = document.getElementById("adoption_presentation");
    const submitButton = document.getElementById("adoptionSubmit");


    phoneNumberInput.addEventListener("input", function () {
        // Rimuove tutti i caratteri che non sono numeri
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    phoneNumberInput.addEventListener("input", () => {
        if (phoneNumberInput.value.length > 15) {
        phoneNumberInput.value = phoneNumberInput.value.slice(0, 15); // Tronca il valore inserito a 15 caratteri
        }
    });


    // Aggiungi un ascoltatore di eventi per controllare la compilazione dei campi
    phoneNumberInput.addEventListener("input", toggleSubmitButton);
    presentationTextarea.addEventListener("input", toggleSubmitButton);

    function toggleSubmitButton() {
        // Abilita il pulsante "Submit" solo se entrambi i campi sono compilati
        if (phoneNumberInput.value.trim() !== "" && presentationTextarea.value.trim() !== "") {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    document
    .getElementById("adoption-modal")
    .addEventListener("show.bs.modal", function (event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const post_id = button.getAttribute("data-post-id"); // Extract post id from the button
        const post_owner = button.getAttribute("data-owner"); // Extract post owner's id from the button

        document.getElementById("adoption_id").value = post_id;
        document.getElementById("adoption_owner").value = post_owner;
        console.log("Post id: " + post_id);
        console.log("Post owner: " + post_owner);
    });
});
