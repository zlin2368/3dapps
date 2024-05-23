// JavaScript Gallery Generator using Flickr to source the images
$(document).ready(function() {
    // Call the loadImages method when the document is ready
    loadImages(); 
});

// Function to load images from Flickr
function loadImages() {
    // Get the search term from the input field using jQuery
    var txt = $("#txt").val();
    
    // Create a URI for the Flickr web service API call
    var urlFlickr = "http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
    
    // Use the jQuery .getJSON() method to fetch the JSON object from the Flickr web service
    $.getJSON(urlFlickr, {
        tags: txt, // Tags to search for
        tagmode: "all", // Match all tags
        format: "json" // Return data in JSON format
    }, function(data) {
        // Use console.log() to inspect the returned JSON object
        console.log(data);
        
        // Populate HTML elements with metadata from the JSON object
        $('#title').html(data.title);
        $('#link').html(data.link);
        $('#description').html(data.description);
        $('#modified').html(data.modified);
        $('#generator').html(data.generator);
        
        // Initialize an empty string to hold the HTML code for images
        var htmlCode = "";
        
        // Loop through the items in the JSON object to build the HTML for images
        $.each(data.items, function(i, item) {          
            // Create HTML structure for each image
            htmlCode += '<div class="imgBox">';
            htmlCode += '<div><h3> Title: ' + item.title + '</h3></div>';
            htmlCode += '<img src="' + item.media.m + '"/>';
            htmlCode += '<div><h4> Published: ' + item.published + '</h4></div>';
            htmlCode += '</div>';           
            
            // Limit the number of images returned (e.g., to the first 4 images)
            if (i == 3) return false;
        });
        
        // Insert the generated HTML into the element with ID 'images'
        $('#images').html(htmlCode);
    });
}
