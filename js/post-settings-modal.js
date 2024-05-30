document.addEventListener("DOMContentLoaded", (event) => {
  const deleteButton = document.getElementById("delete_post");
  const setAdoptedButton = document.getElementById("mark_adopted");

  deleteButton.addEventListener("click", (event) => {
    const post_id = event.target.getAttribute("data-post-id");
    const owner_username = event.target.getAttribute("data-owner-username");
    const form = new FormData();
    form.append("post_id", post_id);
    form.append("post_option", "delete");

    axios
      .post("api/post-settings.php", form)
      .then(
        (response) =>
          (window.location.href = "open-profile.php?username=" + owner_username)
      );
  });

  if (setAdoptedButton !== null) {
    setAdoptedButton.addEventListener("click", (event) => {
      const post_id = event.target.getAttribute("data-post-id");
      const form = new FormData();
      form.append("post_id", post_id);
      form.append("post_option", "mark_adopted");

      axios
        .post("api/post-settings.php", form)
        .then((response) => location.reload());
    });
  }
});
