// Function to execute on startup
function onStartup() {
    // Retrieve the document cookies
    var test = document.cookie;
    console.log("Found Theme Cookies: " + getCookie("Theme"));
    
    // Reference to the root element for global styles
    var globalStyleStart = document.querySelector(':root');
    
    // Check the value of the "Theme" cookie and set the corresponding theme
    if (getCookie("Theme") == "Light") { 
        setLight(); 
        console.log("found light"); 
    } else if (getCookie("Theme") == "Dark") { 
        setDark(); 
        console.log("found dark"); 
    } else { 
        console.log("No valid cookies found"); 
        setLight();  
    }
    
    // Call the ready function to display the main content
    ready();
}

function ready() {
    var main = document.body;
    main.style.display = "block";
}
