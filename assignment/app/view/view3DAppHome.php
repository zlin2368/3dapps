<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS and custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/bootstrap-3.4.1.css">

    <!-- X3DOM and custom JS -->
    <script src="https://x3dom.org/download/1.8.2/x3dom.js"></script>
    <script type='text/javascript' src='js/3d-functions.js'></script>
    <script type="text/javascript" src="js/gallery_generator.js"></script>
    <script type='text/javascript' src="js/getJsonData.js"></script>
    <script type='text/javascript' src="js/page-control.js"></script>
    <script type='module' src="js/info-poppers.js"></script>
    <script src="js/startupScript.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/cookies.js"></script>

    <title>Web 3D Application</title>
</head>

<body onload="onStartup(), loadInitialX3DFile()">
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="logo" style="padding-right: 10px;">
                    <h1>Coca</h1>
                    <h1>Cola</h1>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100 text-center">
                    <li class="nav-item flex-fill"><a id="el1" class="nav-link" href="#">Coke</a></li>
                    <li class="nav-item flex-fill"><a id="el2" class="nav-link" href="#">Sprite</a></li>
                    <li class="nav-item flex-fill"><a id="el3" class="nav-link" href="#">Dr Pepper</a></li>
                    <li class="nav-item flex-fill"><a id="el4" class="nav-link" href="#">Glass</a></li>
                    <li class="nav-item flex-fill"><a id="el5" class="nav-link" href="#" onclick="themeToggle()">Toggle Theme</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container main_contents" style="padding-top: 70px;">
        <!-- Row for 3D Model Viewer and Editor -->
        <div class="row custom-row">
            <!-- 3D Model Viewer -->
            <div class="col">
                <div class="card w-100" data-bs-toggle="tooltip" data-bs-placement="left" title="Dynamically reloads and replaces scenes.">
                    <div id="3d-card" class="card-body">
                        <h3 class="card-title">3D Model Viewer</h3>
                        <x3d width='100%' height='100%' id="3d-model">
                            <scene id="model-scene"></scene>
                        </x3d>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <!-- 3D Object Editor -->
            <div class="col" id="3d-editor" style="max-width: 400px;" data-bs-toggle="tooltip" title="Edit 3D models with custom functions.">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">3D Object Editor</h5>
                        <!-- Camera Controls -->
                        <div class="mb-4">
                            <h6>Camera Controls</h6>
                            <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraFront')">Front</button>
                            <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraBack')">Back</button>
                            <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraLeft')">Left</button>
                            <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraRight')">Right</button>
                            <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraTop')">Top</button>
                            <button type="button" class="btn btn-primary mr-2" onclick="switchCamera('CameraBottom')">Bottom</button>
                        </div>
                        <!-- Animation Controls -->
                        <div class="mb-4">
                            <h6>Animation</h6>
                            <button type="button" class="btn btn-primary mr-2" onclick="spin('3d-model')">Start/Stop</button>
                            <button type="button" class="btn btn-primary mr-2" onclick="setSpin(0)">Rotate Y</button>
                            <button type="button" class="btn btn-primary mr-2" onclick="setSpin(2)">Rotate X</button>
                            <button type="button" class="btn btn-primary mr-2" onclick="setSpin(3)">Rotate Z</button>
                        </div>
                        <!-- Lighting Controls -->
                        <div class="mb-4">
                            <h6>Lighting</h6>
                            <button type="button" class="btn btn-secondary mr-2" onclick="headLight()">Toggle Light</button>
                        </div>
                        <!-- Material Controls -->
                        <div class="mb-4">
                            <h6>Materials</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <button type="button" class="btn btn-secondary mr-2" onclick="setTexture(0)">Texture 1</button>
                                        <button type="button" class="btn btn-secondary mr-2" onclick="setTexture(1)">Texture 2</button>
                                        <button type="button" class="btn btn-secondary mr-2" onclick="setTexture(2)">Texture 3</button>
                                        <button type="button" class="btn btn-secondary mr-2" onclick="setTexture(3)">Texture 4</button>
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="wireFrame()">Polygon/Wireframe/Vertex</button>
                                </div>
                                <div class="col-md-7">
                                    <label for="slider">Material Opacity:</label>
                                    <input type="range" class="form-control mb-2" min="0" max="1" value="0.5" step="0.01" id="myRange" oninput="setTrans(1-this.value)" />
                                </div>
                                <div class="col-md-8">
                                    <label for="colorPicker">Material Colour:</label>
                                    <input type="color" style="height: 50px;" id="colorPicker" class="form-control mb-2" oninput="handleColorChange(this.value)" onchange="handleColorChange(this.value)" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rows for individual model cards -->
        <div class="row">
            <!-- Coke Column -->
            <div id="coke-card" class="card" data-bs-toggle="tooltip" title="Data from SQLLite Database.">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[0]['modelTitle']; ?></h3>
                            <p class="card-text"><?php echo $data[0]['modelDescription']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[0]['x3dModelTitle']; ?></h3>
                            <h3 class="card-title">Method</h3>
                            <p class="card-text"><?php echo $data[0]['x3dCreationMethod']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sprite Column -->
            <div id="sprite-card" class="card" data-bs-toggle="tooltip" title="Data from JSON file with AJAX.">
                <a href="#">
                    <div id="modelPhotoURL"></div>
                </a>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="modelTitle"></div>
                            <div id="modelDescription"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="x3dModelTitle"></div>
                            <h3 class="card-title">Method</h3>
                            <div id="x3dCreationMethod"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dr Pepper Column -->
            <div id="pepper-card" class="card" data-bs-toggle="tooltip" title="Data from SQLLite Database.">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[2]['modelTitle']; ?></h3>
                            <p class="card-text"><?php echo $data[2]['modelDescription']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[2]['x3dModelTitle']; ?></h3>
                            <h3 class="card-title">Method</h3>
                            <p class="card-text"><?php echo $data[2]['x3dCreationMethod']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Glass Column -->
            <div id="glass-card" class="card" data-bs-toggle="tooltip" title="Data from SQLLite Database.">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[3]['modelTitle']; ?></h3>
                            <p class="card-text"><?php echo $data[3]['modelDescription']; ?></p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="card-title"><?php echo $data[3]['x3dModelTitle']; ?></h3>
                            <h3 class="card-title">Method</h3>
                            <p class="card-text"><?php echo $data[3]['x3dCreationMethod']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel for additional images -->
    <div class="row">
        <div class="col-sm-12">
            <div id="carouselContainer" data-bs-toggle="tooltip" title="Click images to view in a modal."></div>
        </div>
    </div>

    <!-- Gallery of 3D models -->
    <div class="container">
        <h1 class="mt-5">3D Models</h1>
        <div class="row">
            <?php foreach ($data as $model): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo $model['modelPhotoURL']; ?>" class="card-img-top" alt="<?php echo $model['modelTitle']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $model['modelTitle']; ?></h5>
                        <p class="card-text"><?php echo $model['modelDescription']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <nav class="navbar navbar-expand-sm footer" data-bs-toggle="tooltip" title="Page resizes for mobile use.">
        <div class="container">
            <div class="navbar-text float-left copyright">
                <p><span class="align-baseline">&copy; Web 3D Application</span></p>
            </div>
            <div class="navbar-text social">
                <a href="#"><i class="fab fa-github-square fa-2x fa-pull-right"></i></a>
                <a href="#"><i class="fab fa-google-plus-square fa-2x fa-pull-right"></i></a>
                <a href="#"><i class="fab fa-twitter-square fa-2x fa-pull-right"></i></a>
                <a href="#"><i class="fab fa-facebook-square fa-2x fa-pull-right"></i></a>
            </div>
        </div>
    </nav>
</body>
</html>
