document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector("#lightGallery")) {
        lightGallery(document.querySelector("#lightGallery"), {
            selector: "a", // Ensures only linked images open in lightbox
            thumbnail: true, // Show thumbnails
            download: false // Disable download button
        });
    }
});
