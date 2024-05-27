document.addEventListener("DOMContentLoaded", () => {
    const phoneNumberInput = document.getElementById("phoneNumber");
    const presentationTextarea = document.getElementById("presentation");
    const submitButton = document.getElementById("submitButton");


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
});
