// Function to set a cookie
function setCookie(cname, cvalue) {
    document.cookie = cname + "=" + cvalue + ";";
}

// Function to get a cookie by name
function getCookie(cname) {
    var name = cname + "=";
    // Decode the cookies
    var decodedCookie = decodeURIComponent(document.cookie);
    // Split the cookies string into individual cookies
    var splitCookies = decodedCookie.split(';');
    // Iterate through the cookies
    for (var i = 0; i < splitCookies.length; i++) {
        var c = splitCookies[i];
        // Remove leading spaces from the cookie
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        // Check if the cookie starts with the desired name
        if (c.indexOf(name) == 0) {
            // Return the cookie's value
            return c.substring(name.length, c.length);
        }
    }
    // Return an empty string if the cookie is not found
    return "";
}
