document.addEventListener('DOMContentLoaded', function() {
    console.log("first enter");
    const postSwitch = document.getElementById('postSwitch');
    const taggedSwitch = document.getElementById('taggedSwitch');
    const userPostsContainer = document.getElementById('userPostsContainer');
    const adoptionsContainer = document.getElementById('adoptionsContainer');

    if (postSwitch && taggedSwitch && userPostsContainer && adoptionsContainer) {
        postSwitch.addEventListener('change', function() {
            console.log("entered");
            if (this.checked) {
                userPostsContainer.style.display = 'block';
                adoptionsContainer.style.display = 'none';
            }
        });

        taggedSwitch.addEventListener('change', function() {
            if (this.checked) {
                userPostsContainer.style.display = 'none';
                adoptionsContainer.style.display = 'block';
            }
        });
    } else {
        console.error('One or more elements were not found');
    }


    document.getElementById("user-settings-button").addEventListener("click", event => {
        window.location.href = "userSettings.php";
    })
});