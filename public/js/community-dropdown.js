const communityDropDown = document.getElementById("community-dropdown");

function toggleNavigationDropdown() {
    if (communityDropDown.classList.contains("show-community-dropdown")) {
        communityDropDown.classList.remove("show-community-dropdown");
    } else {
        communityDropDown.classList.add("show-community-dropdown");
    }
}
