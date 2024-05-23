<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test View — Flickr Web Service</title>
    <!-- Flickr webservice http://www.flickr.com/services/feeds/docs/photos_public/ -->

    <style>
        h1 { color: red; margin-left: 5px; }
        h2 { color: blue; margin: 5px; }
        p { color: green; margin-top: -10px; margin-left: 0px; }
        img {
            padding: 0.25rem;
            margin-top: 5px;
            margin-bottom: 5px;
            margin-right: 5px;
            border: 1px solid red;
            border-radius: 0.25rem;
            float: left;
            width: 20%;
        }
        .box {
            border: 2px solid green;
            padding: 20px;
            float: left;
            margin: 20px 5px 5px 5px;
            width: 90%;
            height: auto;
        }
        .textInput { margin: 5px; float: left; }
        .btn { margin: 5px; float: left; }
    </style>
</head>

<body>
    <h1>Flickr Web Service</h1>
    <h2>Search on Flickr Feed</h2>
    <!-- Text input box for search term -->
    <div class="textInput">
        <input type="text" id="txt" />
    </div>
    
    <!-- Button to trigger search -->
    <div class="btn">
        <button onclick="loadImages()">Search</button>
    </div>

    <!-- Container for search results -->
    <div class="box">
        <p>Results returned from the Flickr web service:</p>
        <div id="images"></div>
    </div>

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-latest.js"></script>

    <!-- JavaScript to load images from Flickr -->
    <script language="javascript">
        function loadImages() {
            var txt = document.getElementById('txt').value;
            // Create a URI for the Flickr web service API call
            var urlFlickr = "https://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
            $.getJSON(urlFlickr, {
                tags: txt,
                tagmode: "all",
                format: "json"
            },
            function(data) {
                // Clear previous results
                $("#images").empty();
                // Iterate through the data and append images to the container
                $.each(data.items, function(i, item) {
                    $("<img/>").attr("src", item.media.m).appendTo("#images");
                    // Limit to 4 images
                    if (i == 3) return false;
                });
            });
        }
    </script>
</body>
</html>

