window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const imagePath = urlParams.get('image');
    if (imagePath) {
        const imageElement = document.getElementById('postImage');
        imageElement.src = imagePath;
    }
};
