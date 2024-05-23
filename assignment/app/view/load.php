<?php
class Load {

    // Method to load a view file
    function view($file_name, $data = null)
    {
        // Extract data array to variables if data is provided
        if (is_array($data)) {
            extract($data);
        }

        // Include the view file with .php extension
        include $file_name . '.php';
    }
}
?>
