const communityDropDown = document.getElementById("community-dropdown");

const createCommunityCard = document.getElementById("create-community-card");

const backgroundBlur = document.getElementById("background-blur");

function toggleNavigationDropdown() {
    if (communityDropDown.classList.contains("show-community-dropdown")) {
        communityDropDown.classList.remove("show-community-dropdown");
    } else {
        communityDropDown.classList.add("show-community-dropdown");
    }
}

function showCreateCommunityCard() {
    backgroundBlur.classList.add("show-background-blur");
    createCommunityCard.classList.add("show-create-community-card");
}

function closeCreateCommunityCard() {
    backgroundBlur.classList.remove("show-background-blur");
    createCommunityCard.classList.remove("show-create-community-card");
}

function singlePrivacyType(checkbox) {
    const checkboxes = document.getElementsByName("privacy-input");
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false;
    });
}
