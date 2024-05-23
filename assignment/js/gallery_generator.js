// JavaScript Gallery Generator

$(document).ready(function () {
    // Create the XMLHttpRequest Object for communicating with the web server
    var xmlHttp = new XMLHttpRequest();
    // Stores the number of horizontal columns the gallery has
    var numberOfColumns = 3;
    // Stores the newly generated gallery HTML code
    var htmlCode = "";
    // Temporarily stores server response while code is generated
    var response;
    // Set up the path to the PHP function that reads the image directory
    var send = "hook.php";
    // Open the connection to the web server
    xmlHttp.open("GET", send, true);
    // Send the request to the server with no outgoing message
    xmlHttp.send(null);
    // Check for a valid server response
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            // Response handler code
            response = xmlHttp.responseText.split("~");

            var carouselIndicators = '';
            var carouselItems = '';
            var modalCode = '';
            
            // Loop through the response to generate carousel and modal code
            for (var i = 0; i < response.length; i++) {
                // Carousel indicators
                carouselIndicators += '<button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="' + i + '"';
                if (i === 0) {
                    carouselIndicators += ' class="active"';
                }
                carouselIndicators += '></button>';
            
                // Carousel items
                carouselItems += '<div class="carousel-item';
                if (i === 0) {
                    carouselItems += ' active';
                }
                carouselItems += '">';
                carouselItems += '<a href="#" data-bs-toggle="modal" data-bs-target="#modal' + i + '">';
                carouselItems += '<img src="' + response[i] + '" class="d-block w-100 img-thumbnail" alt="Image">';
                carouselItems += '</a>';
                carouselItems += '</div>';
            
                // Modal code
                modalCode += '<div class="modal fade" id="modal' + i + '" tabindex="-1" aria-labelledby="modalLabel' + i + '" aria-hidden="true">';
                modalCode += '<div class="modal-dialog modal-dialog-centered modal-xl">'; // Use modal-xl for extra-large modal
                modalCode += '<div class="modal-content">';
                modalCode += '<div class="modal-body">';
                modalCode += '<img src="' + response[i] + '" class="img-fluid" alt="Image">';
                modalCode += '</div>';
                modalCode += '</div>';
                modalCode += '</div>';
                modalCode += '</div>';
            }
            
            // Generate the complete carousel HTML code
            htmlCode = '<div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">';
            htmlCode += '<ol class="carousel-indicators">' + carouselIndicators + '</ol>';
            htmlCode += '<div class="carousel-inner">' + carouselItems + '</div>';
            htmlCode += '<a class="carousel-control-prev" href="#imageCarousel" role="button" data-bs-slide="prev">';
            htmlCode += '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
            htmlCode += '<span class="visually-hidden">Previous</span>';
            htmlCode += '</a>';
            htmlCode += '<a class="carousel-control-next" href="#imageCarousel" role="button" data-bs-slide="next">';
            htmlCode += '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
            htmlCode += '<span class="visually-hidden">Next</span>';
            htmlCode += '</a>';
            
            // Add caption to the carousel
            htmlCode += '<div class="carousel-caption">';
            htmlCode += '<h2 class="shadow-text">Unleash the Refreshment</h2>';
            htmlCode += '</div>';
            htmlCode += '</div>';
            
            // Append the modal code to the document body
            document.body.insertAdjacentHTML('beforeend', modalCode);
            
            // Set the generated HTML code in the carousel container
            document.getElementById('carouselContainer').innerHTML = htmlCode;
        }
    };
});
