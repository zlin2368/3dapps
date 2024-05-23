// Toggle the theme between Dark and Light modes based on cookie value
function themeToggle() {
    var globalStyle = document.querySelector(':root');

    if (getCookie("Theme") == "Dark") {
        setLight();
        console.log("Cookies confirmed dark, set light.");
    } else {
        setDark();
        console.log("Cookies unconfirmed dark, set dark.");
    }
}

// Set the theme to Dark mode and update relevant CSS variables
function setDark() {
    var globalStyle = document.querySelector(':root');
    globalStyle.style.setProperty('--primary-color', '#ff0000'); // Red for Coke Zero
    globalStyle.style.setProperty('--secondary-color', '#000000'); // Dark grey/black for Coke Zero
    globalStyle.style.setProperty('--background-color', '#ff0000'); // Black for Coke Zero
    globalStyle.style.setProperty('--primary-text-color', '#000000'); 
    globalStyle.style.setProperty('--secondary-text-color', '#ff0000'); 
    setCookie("Theme", "Dark"); // Save theme preference in cookie
    console.log("Cookies Set: " + getCookie("Theme"));
}

// Set the theme to Light mode and update relevant CSS variables
function setLight() {
    var globalStyle = document.querySelector(':root');
    globalStyle.style.setProperty('--primary-color', '#b0b0b0'); // Light grey for Diet Coke
    globalStyle.style.setProperty('--secondary-color', '#ff0000'); // Red for Diet Coke
    globalStyle.style.setProperty('--background-color', '#c0c0c0'); // Silver for Diet Coke
    globalStyle.style.setProperty('--primary-text-color', '#ff0000'); 
    globalStyle.style.setProperty('--secondary-text-color', '#000000'); 
    setCookie("Theme", "Light"); // Save theme preference in cookie
    console.log("Cookies Set: " + getCookie("Theme"));
}
