<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test View — Flickr Web Service</title>
    <!-- Link to Flickr web service documentation: http://www.flickr.com/services/feeds/docs/photos_public/ -->
    <!-- CSS for FlickrService -->
    <link rel="stylesheet" href="../application/css/flickrService.css">
</head>

<body>
    <h1>Flickr Web Service</h1>
    <h2>Search on Flickr Feed</h2>
    <!-- Text input box for search term -->
    <div class="textInput">
        <input type="text" value="Sprite" id="txt" />
    </div>
    
    <!-- Button to trigger search -->
    <div class="btn">
        <button onclick="loadImages()">Search</button>
    </div>

    <!-- Container for search results and metadata -->
    <div class="box">
        <h1 id="title"></h1>
        <h2 id="link"></h2>
        <p id="description"></p>
        <p id="modified"></p>
        <p id="generator"></p>
        <div id="images"></div>
    </div>

    <!-- JavaScript for Flickr service and jQuery -->
    <script src="../js/flickrService.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</body>
</html>
