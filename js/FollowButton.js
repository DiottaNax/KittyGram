function toggleFollow() {
    var button = document.getElementById("followButton");
    if (button.innerText === "Following") {
        button.innerText = "Follow";
        button.classList.remove("btn-light");
        button.classList.add("btn-primary");
    } else {
        button.innerText = "Following";
        button.classList.remove("btn-primary");
        button.classList.add("btn-light");
    }
}

function toggleFollowNavbar() {
    var button = document.getElementById("followButtonNavbar");
    if (button.innerText === "Following") {
        button.innerText = "Follow";
        button.classList.remove("btn-light");
        button.classList.add("btn-primary");
    } else {
        button.innerText = "Following";
        button.classList.remove("btn-primary");
        button.classList.add("btn-light");
    }
}
