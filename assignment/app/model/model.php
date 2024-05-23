<?php
class Model {

    // Property to hold the database connection (PDO object)
    public $dbhandle;

    // Method to create database connection using PDO
    public function __construct() {
        $dsn = 'sqlite:./db/test1.db';
        try {
            // Establish connection to the SQLite database
            $this->dbhandle = new PDO($dsn, 'user', 'password', array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions for errors
                PDO::ATTR_EMULATE_PREPARES => false // Disable emulation mode for prepared statements
            ));
        } catch (PDOException $e) {
            echo "Cannot connect to the database!";
            print new Exception($e->getMessage());
        }
    }

    // Method to create the Model_3D table
    public function dbCreateTable() {
        try {
            $this->dbhandle->exec("CREATE TABLE Model_3D (
                Id INTEGER PRIMARY KEY, 
                x3dModelTitle TEXT, 
                x3dCreationMethod TEXT, 
                modelTitle TEXT, 
                modelPhotoURL TEXT, 
                modelDescription TEXT
            )");
            return "Model_3D table successfully created inside test1.db file";
        } catch (PDOException $e) {
            print new Exception($e->getMessage());
        }
        $this->dbhandle = NULL;
    }

    // Method to get brand names
    public function dbGetBrand() {
        return array("-", "Coke", "Coke Light", "Coke Zero", "Sprite", "Dr Pepper", "Fanta");
    }

    // Method to insert data into the Model_3D table
    public function dbInsertData() {
        try {
            $this->dbhandle->exec(
                "INSERT INTO Model_3D (Id, x3dModelTitle, x3dCreationMethod, modelTitle, modelPhotoURL, modelDescription) VALUES 
                (1, 'Coke Can Model', 'This model was created following a detailed tutorial, featuring optimized polygons, smooth surfaces, interchangeable textures, and adjustable lighting and camera settings.', 'Soda Can', 'assets/images/gallery_images/coke.png', 'Experience the perfect blend of form and function with our aluminum soda can display. Engineered to maintain the freshness of your favorite beverages, this can is both lightweight and fully recyclable, symbolizing the pinnacle of modern beverage packaging.'),
                (2, 'Sprite Bottle Model', 'This model showcases data pulled from JSON using AJAX, highlighting dynamic data integration.', 'Sprite Bottle', 'assets/images/gallery_images/sprite.png', 'Explore the refreshing appeal of our Sprite bottle model, which exemplifies how technology and design converge to create a visually striking and functional beverage container.'),
                (3, 'Dr Pepper Cup Model', 'Utilizing both material and texture transparency, this model achieves a printed effect on glass, with features for texture switching and adjustable color and opacity of the glass.', 'Glass Cup', 'assets/images/gallery_images/fanta.png', 'Admire the refined craftsmanship of our glass cup exhibit, a tribute to the skill of glassblowing. Its elegant design and crystal-clear transparency make it an ideal vessel for your beverages, embodying sophistication and eco-friendliness.'),
                (4, 'Glass Bottle Model', 'This model integrates multiple textures, transparent layers, and complex modeling to replicate the iconic shape of the glass Coke bottle. It features switchable textures and customizable colors and transparency.', 'Glass Drink Bottle', 'assets/images/gallery_images/glass.png', 'Travel back in time with our classic glass soda bottle exhibit. This beautifully crafted piece combines vintage charm with modern sustainability, inviting you to enjoy beverages from a container that honors tradition while being environmentally friendly.')
            ");
            return "X3D model data inserted successfully inside test1.db";
        } catch (PDOException $e) {
            print new Exception($e->getMessage());
        }
        $this->dbhandle = NULL;
    }

    // Method to get data from the Model_3D table
    public function dbGetData() {
        try {
            $sql = 'SELECT * FROM Model_3D';
            $stmt = $this->dbhandle->query($sql);
            $result = [];
            $i = 0;
            while ($data = $stmt->fetch()) {
                $result[$i]['x3dModelTitle'] = $data['x3dModelTitle'];
                $result[$i]['x3dCreationMethod'] = $data['x3dCreationMethod'];
                $result[$i]['modelTitle'] = $data['modelTitle'];
                $result[$i]['modelPhotoURL'] = $data['modelPhotoURL'];
                $result[$i]['modelDescription'] = $data['modelDescription'];
                $i++;
            }
            return $result;
        } catch (PDOException $e) {
            print new Exception($e->getMessage());
        }
        $this->dbhandle = NULL;
    }

    // Method to simulate the model data
    public function model3D_info() {
        return array(
            'model_1' => 'Coke Can 3D Image 1',
            'image3D_1' => 'coke-img',

            'model_2' => 'Coke Can 3D Image 2',
            'image3D_2' => 'sprite-img',

            'model_3' => 'Sprite Bottle 3D Image 1',
            'image3D_3' => 'pepper-img',

            'model_4' => 'Sprite Bottle 3D Image 2',
            'image3D_4' => 'sprite_2',

            'model_5' => 'Dr Pepper Cup 3D Image 1',
            'image3D_5' => 'pepper_1',

            'model_6' => 'Dr Pepper Cup 3D Image 2',
            'image3D_6' => 'pepper_2'
        );
    }
}
?>
