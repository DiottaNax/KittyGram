document.addEventListener("DOMContentLoaded", (event) => {
  const deleteButton = document.getElementById("delete_post");
  const setAdoptedButton = document.getElementById("mark_adopted");

  deleteButton.addEventListener("click", (event) => {
    const post_id = event.target.getAttribute("data-post-id");
    const form = new FormData();
    form.append("post_id", post_id);
    form.append("post_option", "delete");

    axios
      .post("api/post-settings.php", form)
      .then((response) => console.log(response.data));
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
