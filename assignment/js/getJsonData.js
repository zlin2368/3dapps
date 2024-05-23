/// JavaScript Document
$(document).ready(function() {
    console.log("Json data get?");

    // AJAX service request to get the main text data from the JSON data store
    $.getJSON('../Coursework/app/model/data.json', function(jsonObj) {
        console.log("received: " + jsonObj);
        
        // Populate the HTML elements with data from the JSON object
        $('#x3dModelTitle').html('<h3 class="card-title">' + jsonObj.pageTextData[0].x3dModelTitle + '</h3>');
        $('#x3dCreationMethod').html('<p class="card-text">' + jsonObj.pageTextData[0].x3dCreationMethod + '</p>');
        $('#modelTitle').html('<h3 class="card-title">' + jsonObj.pageTextData[0].modelTitle + '</h3>');
        $('#modelPhotoURL').html('<img class="card-img-top img-fluid img-thumbnail" src="' + jsonObj.pageTextData[0].modelPhotoURL + '" alt="Sprite"></img>');
        $('#modelDescription').html('<p class="card-text">' + jsonObj.pageTextData[0].modelDescription + '</p>');

    
    });
});

 






