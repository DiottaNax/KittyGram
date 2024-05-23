function toggleFollow(button) {
  const follower = button.getAttribute("follower");
  const followed = button.getAttribute("followed");
  const option = button.innerText === "Follow" ? "follow" : "unfollow";

  const followForm = new FormData();
  followForm.append("follower", follower);
  followForm.append("followed", followed);
  followForm.append("option", option);
  console.log("Follower: " + follower);
  console.log("Followed" + followed);
  console.log("option" + option);

  axios.post("api/follow.php", followForm).then((response) => {
    console.log(response.data);
    if (response.data["success"]) {
      if (option === "unfollow") {
        // User follows the other one and wants to unfollow
        button.innerText = "Follow";
        button.classList.remove("btn-light");
        button.classList.add("btn-primary");
      } else if (option === "follow") {
        // User doesn't follow the other one and wants to unfollow
        button.innerText = "Following";
        button.classList.remove("btn-primary");
        button.classList.add("btn-light");
      }

      location.reload();
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("followButton").addEventListener("mouseup", () => {
    const button = document.getElementById("followButton");
    toggleFollow(button);
  });
});
