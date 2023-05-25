const communityDropDown = document.getElementById("community-dropdown");

const createCommunityCard = document.getElementById("create-community-card");

const backgroundBlur = document.getElementById("background-blur");

const loginBackgroundBlur = document.getElementById("login-background-blur");

const loginCard = document.getElementById("login-card-wrap");

const signupCard = document.getElementById("signup-card-wrap");

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

function showLoginCard() {
    loginBackgroundBlur.classList.add("show-login-background-blur");
    loginCard.classList.add("show-login-card-wrap");
}

function closeLoginCard() {
    loginCard.classList.remove("show-login-card-wrap");
    signupCard.classList.remove("show-signup-card-wrap");
    loginBackgroundBlur.classList.remove("show-login-background-blur");
}

function goToSignup() {
    loginCard.classList.remove("show-login-card-wrap");
    signupCard.classList.add("show-signup-card-wrap");
}

function goToLogin() {
    signupCard.classList.remove("show-signup-card-wrap");
    loginCard.classList.add("show-login-card-wrap");
}
