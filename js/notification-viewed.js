document.addEventListener("DOMContentLoaded", function () {
  const notifications = document.querySelectorAll(".notification");
  notifications.forEach((n) => {
    n.addEventListener("click", function () {
      if (!this.classList.contains("seen")) {
        const id = n.getAttribute("data-id");
        console.log(id);
        n.style.opacity = "0.5";
        const formData = new FormData();
        formData.append("id", id);
        axios.post("api/notification-viewed.php", formData);
        console.log("notification viewed");
        this.classList.add("seen");
      }
    });
  });

  const buttons = document.querySelectorAll(".open-not");
  buttons.forEach((b) => {
    b.addEventListener("click", function () {
      const path = b.getAttribute("data-link");
      setTimeout(() => {
        window.location.href = path;
      }, 100);
    });
  });
});
