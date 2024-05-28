document.addEventListener("DOMContentLoaded", function () {
  const notificationModal = new bootstrap.Modal(
    document.getElementById("notification-modal")
  );
  const notifications = document.querySelectorAll(".notification");

  // Funzione per contrassegnare le notifiche come viste
  const markNotificationsAsSeen = () => {
    notifications.forEach((notification) => {
      if (!notification.classList.contains("seen")) {
        const id = notification.getAttribute("data-id");
        notification.style.opacity = "0.5";
        const formData = new FormData();
        formData.append("id", id);
        axios
          .post("./api/notification-viewed.php", formData)
          .then(function (response) {
            console.log("Notifica contrassegnata come vista");
          })
          .catch(function (error) {
            console.error(
              "Errore durante il contrassegno della notifica come vista:",
              error
            );
          });
        notification.classList.add("seen");
      }
    });
  };

  // Contrassegna le notifiche come viste quando il modale viene aperto
  notificationModal._element.addEventListener("show.bs.modal", function () {
    markNotificationsAsSeen();
  });

  // Gestisci il click sulla "X" per cancellare la notifica
  notifications.forEach((notification) => {
    const closeIcon = notification.querySelector(".close-icon");
    closeIcon.addEventListener("click", function (event) {
      event.stopPropagation();
      const notificationId = notification.getAttribute("data-id");
      axios
        .post("./api/delete-notification.php", { id: notificationId })
        .then(function (response) {
          notification.remove();
        })
        .catch(function (error) {
          console.error(
            "Errore durante la cancellazione della notifica:",
            error
          );
        });
    });
  });
});
