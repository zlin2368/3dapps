<?php
class Controller {

    public $load;
    public $model;

    // Constructor initializes Load and Model objects and determines the current page
    function __construct($pageURI = null) {
        $this->load = new Load(); 
        $this->model = new Model();
        
        // Load the specified page method if it exists, otherwise load the home page
        if ($pageURI && method_exists($this, $pageURI)) {
            $this->$pageURI();
        } else {
            $this->home();
        }
    }

    // Load the home page with data from the model
    function home() {
        $data = $this->model->dbGetData();
        $this->load->view('view3DAppHome', $data);
    }

    // Load the test view with data from the model
    function view3DAppTest() {
        $data = $this->model->model3D_info();
        $this->load->view('view3DAppTest', $data);
    }

    // Create a table in the database and show the result
    function apiCreateTable() {
        $data = $this->model->dbCreateTable();
        $this->load->view('viewMessage', $data);
    }
    
    // Insert data into the database and show the result
    function apiInsertData() {
        $data = $this->model->dbInsertData();
        $this->load->view('viewMessage', $data);
    }
    
    // Retrieve data from the database and show it
    function apiGetData() {
        $data = $this->model->dbGetData();
        $this->load->view('view3DAppData', $data);
    }

    // Load the Flickr feed view
    function apiGetFlickrFeed() {
        $this->load->view('viewFlickrFeed');
    }

    // Load the JSON view
    function apiGetJson() {
        $this->load->view('viewJson');
    }

    // Load brand data from the database and show it
    function apiLoadImage() {
        ChromePhp::warn('controller.php: [apiLoadImage] Get the Brand data');    
        $data = $this->model->dbGetBrand();
        ChromePhp::log($data);  
        $this->load->view('viewDrinks', $data);
    }

    // Deprecated methods (part b)
    function dbCreateTable() {
        echo "Create Table Function";
    }

    function dbInsertData() {
        echo "Data Insert Function";
    }

    function dbGetData() {
        echo "Data Read Function";
    }
}
?>
