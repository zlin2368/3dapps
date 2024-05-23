<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>JSON Sample</title>
</head>
<body>
   
    <div id="placeholder"></div>

    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script>
        // Fetch JSON data from the server
       
        $.getJSON('../app/model/createJson.php', function(data) {
            // Build an HTML list from the JSON data
            var output = "<ul>";
            for (var i in data.users) {
                output += "<li>" + data.users[i].firstName + " " + data.users[i].lastName + " -- " 
                + data.users[i].joined.month + " -- " 
                + data.users[i].joined.year + "</li>";
            }
            output += "</ul>";
            console.log(output);
            
            // Assign the generated HTML to the placeholder div using jQuery
            $('#placeholder').html(output);
            
            
        });
    </script>
</body>
</html>
