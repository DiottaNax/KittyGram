document.addEventListener("DOMContentLoaded", () => {
  const likeIcons = document.querySelectorAll(".like-icon");

  likeIcons.forEach((icon) =>
    icon.addEventListener("click", function () {
      const post_id = icon.getAttribute("data-post-id");
      const toRemove = icon.classList.contains("liked");

      processLike(icon, toRemove, post_id);
    })
  );
});

function processLike(icon, toRemove, post_id) {
  const likeRequest = new FormData();
  // add fields for post request
  likeRequest.append("post_id", post_id);
  likeRequest.append("remove_like", toRemove ? "true" : "false"); // boolean seemed not to work on axios requests

  axios.post("./api/process-like.php", likeRequest).then((response) => {
    let success = response.data["success"];

    if (success) {
      const removed = response.data["removed"];

      if (!removed) {
        // user put like

        // add liked class to like icon
        icon.classList.add("liked");

        const sender_id = response.data["sender_id"];
        const receiver_id = response.data["receiver_id"];
        const message = "really liked your post!";

        sendNotificationUsingId(sender_id, receiver_id, message, post_id);
      } else {
        // user deleted like

        // remove class liked from like icon
        icon.classList.remove("liked");
      }

      // update svg rendering
      const svgPath = removed
        ? "m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"
        : "M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314";
      icon.querySelector("svg path").setAttribute("d", svgPath);

      location.reload();
    }
  });
}
