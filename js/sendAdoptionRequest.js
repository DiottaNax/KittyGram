document.addEventListener("DOMContentLoaded", (event) => {
  const adoptionForm = document.getElementById("adoption-form");

  adoptionForm.addEventListener("submit", (event) => {
    event.preventDefault();
    const formToSend = new FormData(adoptionForm);
    const sender = document.getElementById("adoption_submitter").value;
    const owner = document.getElementById("adoption_owner").value;
    const post_id = document.getElementById("adoption_id").value;
    const notificationMessage = "sent you an adoption request!";

    console.log("sender: " + sender);

    fetch("./api/adoption-request.php", {
      method: "POST",
      body: formToSend,
    })
      .then((response) => {
        return response.json();
      }) // Convertire la risposta in JSON
      .then((data) => {
        console.log(data);
        document.getElementById("adoption-result").innerText = data["message"]; // Accedere direttamente a `data.message`

        if (data["success"]) {
          sendNotificationUsingUsernames(
            sender,
            owner,
            notificationMessage,
            post_id
          );
        }
      })
      .catch((error) => console.error("Error:", error));
  });
});
