const postType = document.getElementById("post-type");
const mediaPostType = document.getElementById("media-post-type");
const linkPostType = document.getElementById("link-post-type");

const postTypeBtn = document.getElementById("post-type-btn");
const mediaPostTypeBtn = document.getElementById("media-post-type-btn");
const linkPostTypeBtn = document.getElementById("link-post-type-btn");

function selectPostType() {
    if (postType.classList.contains("selected")) {
        return;
    }

    // Display Selected Post Type
    mediaPostType.classList.add("hidden");
    linkPostType.classList.add("hidden");
    postType.classList.remove("hidden");

    // Display Selected Post Type Btn styles
    if (mediaPostTypeBtn.classList.contains("post-type-selected")) {
        mediaPostTypeBtn.classList.remove("post-type-selected");
    }

    if (linkPostTypeBtn.classList.contains("post-type-selected")) {
        linkPostTypeBtn.classList.remove("post-type-selected");
    }

    postTypeBtn.classList.add("post-type-selected");
}

function selectMediaPostType() {
    if (mediaPostType.classList.contains("selected")) {
        return;
    }

    // Display Selected Post Type
    postType.classList.add("hidden");
    linkPostType.classList.add("hidden");
    mediaPostType.classList.remove("hidden");

    // Display Selected Post Type Btn styles
    if (postTypeBtn.classList.contains("post-type-selected")) {
        postTypeBtn.classList.remove("post-type-selected");
    }

    if (linkPostTypeBtn.classList.contains("post-type-selected")) {
        linkPostTypeBtn.classList.remove("post-type-selected");
    }

    mediaPostTypeBtn.classList.add("post-type-selected");
}

function selectLinkPostType() {
    if (linkPostType.classList.contains("selected")) {
        return;
    }

    // Display Selected Post Type
    mediaPostType.classList.add("hidden");
    postType.classList.add("hidden");
    linkPostType.classList.remove("hidden");

    // Display Selected Post Type Btn styles
    if (mediaPostTypeBtn.classList.contains("post-type-selected")) {
        mediaPostTypeBtn.classList.remove("post-type-selected");
    }

    if (postTypeBtn.classList.contains("post-type-selected")) {
        postTypeBtn.classList.remove("post-type-selected");
    }

    linkPostTypeBtn.classList.add("post-type-selected");
}
