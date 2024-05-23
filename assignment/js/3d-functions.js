// JavaScript Document

// List of card names and initial model settings
cardList = ["coke", "sprite", "pepper", "glass"];
modelTag = "3d-model";
currentModel = "coke";

// Spin key values for different rotation axes
spinKeys = [
    "0 1 0 0 0 1 0 1.57079 0 1 0 3.14159 0 1 0 4.71239 0 1 0 6.28317",
    "0 1 0 6.28317 0 1 0 4.71239 0 1 0 3.14159 0 1 0 1.57079 0 1 0 0",
    "1 0 0 0 1 0 0 1.57079 1 0 0 3.14159 1 0 0 4.71239 1 0 0 6.28317",
    "0 0 1 0 0 0 1 1.57079 0 0 1 3.14159 0 0 1 4.71239 0 0 1 6.28317"
];

// Initial states for lighting, spinning, wireframe, and background
lightOn = true;
spinning = false;
WireOn = false;
backOn = true;

// Paths to X3D files
const x3dFiles = [
    "assets/models/coke.x3d",
    "assets/models/sprite.x3d",
    "assets/models/drpepper.x3d",
    "assets/models/glass.x3d"
];

// Map file paths to model names
const directoryDictionary = {
    "assets/models/coke.x3d": 'coke',
    "assets/models/sprite.x3d": 'sprite',
    "assets/models/drpepper.x3d": 'pepper',
    "assets/models/glass.x3d": 'glass'
};

// Reverse map model names to file paths
const nameToDirectory = {};
for (const directory in directoryDictionary) {
    const name = directoryDictionary[directory];
    nameToDirectory[name] = directory;
}

// Function to set the content based on the model name
function setContent(name) {
    cardList.forEach(function (element) {
        document.getElementById(element + '-card').style.display = 'none';
    });

    document.getElementById(name + '-card').style.display = 'block';
    currentModel = name;
    console.log("Page Content set to: " + name);
    set3dScene(nameToDirectory[name]);
}

// Variables for X3D scene management
var x3dContainer = document.getElementById("model-scene");
var x3dSceneRuntime;
var inlineNode;

// Function to load a new X3D file
function loadNewX3DFile(filename) {
    x3dSceneRuntime = document.getElementById('model-scene');
    unloadCurrentX3DFile();

    setTimeout(function() {
        inlineNode = document.createElement("inline");
        inlineNode.setAttribute("id", "3dCanvas");
        inlineNode.setAttribute("nameSpaceName", "3d-model");
        inlineNode.setAttribute("url", filename);
        inlineNode.setAttribute("mapDEFToID", "true");
        x3dSceneRuntime.appendChild(inlineNode);

        console.log("File changed to: " + filename);
    }, 300);

    setTimeout(function() {
        $('#3d-model').fadeTo(300, 1);
    }, 1300);
}

// Function to load the initial X3D file
function loadInitialX3DFile() {
    console.log("loading runtime x3d");
    x3dSceneRuntime = document.getElementById('model-scene');
    inlineNode = document.createElement("inline");
    inlineNode.setAttribute("id", "3dCanvas");
    inlineNode.setAttribute("nameSpaceName", "3d-model");
    inlineNode.setAttribute("url", "assets/models/CanV1.x3d");
    inlineNode.setAttribute("mapDEFToID", "true");
    x3dSceneRuntime.appendChild(inlineNode);
}

// Function to unload the current X3D file
function unloadCurrentX3DFile() {
    $('#3d-model').fadeTo(300, 0);

    setTimeout(function() {
        if (inlineNode) {
            const cameras = document.getElementsByTagName("Viewpoint");
            console.log("Found " + cameras.length + " cameras to unbind.");

            // Unbind cameras to avoid render errors/crashes
            for (let i = 0; i < cameras.length; i++) {
                cameras[i].setAttribute("bind", "false");
            }

            x3dSceneRuntime.removeChild(inlineNode);
        }
    }, 300);
}

// Function to set the 3D scene
function set3dScene(directory) {
    lightOn = true;
    spinning = false;
    WireOn = false;
    wireFrameReset();
    backOn = true;

    loadNewX3DFile(directory);
}

// Function to set the texture of the model
function setTexture(textureNum) {
    document.getElementById(modelTag + '__TEX_001').setAttribute("url", 
    "texture/" + currentModel + "/" + currentModel + "_texture_" + textureNum + ".png");
    console.log(currentModel + " texture changed to " + textureNum);
}

// Function to toggle spinning of the model
function spin() {
    spinning = !spinning;
    const element = document.getElementById(modelTag + '__RotationTimer');
    if (element) {
        console.log("found: " + element);
    } else {
        console.log("failed to find");
    }
    document.getElementById(modelTag + '__RotationTimer').setAttribute('enabled', spinning.toString());
    console.log(spinning.toString());
}

// Function to stop the rotation of the model
function stopRotation() {
    spinning = false;
    document.getElementById('model__RotationTimer').setAttribute('enabled', spinning.toString());
}

// Function to animate the model
function animateModel() {
    const timer = document.getElementById('model__RotationTimer');
    timer.setAttribute('enabled', timer.getAttribute('enabled') !== 'true' ? 'true' : 'false');
}

// Function to set the spin keys for the model
function setSpin(num) {
    if (!spinning) {
        spin();
    }
    document.getElementById(modelTag + '__Rotator').setAttribute('keyValue', spinKeys[num]);
    console.log("Set keys to: " + spinKeys[num]);
}

// Function to toggle the wireframe mode
function wireFrame() {
    WireOn = !WireOn;
    const e = document.getElementById(modelTag);
    e.runtime.togglePoints(true);
    e.runtime.togglePoints(true);
}

// Function to reset the wireframe mode
function wireFrameReset() {
    const e = document.getElementById(modelTag);
    e.runtime.togglePoints(false);
    e.runtime.togglePoints(false);
}

// Function to toggle the headlight
function headLight() {
    lightOn = !lightOn;
    document.getElementById(modelTag + "__headlight").setAttribute('headlight', lightOn.toString());
    console.log(lightOn);
}

// Function to set the transparency of the model
function setTrans(amount) {
    document.getElementById(modelTag + "__MA_Material_001").setAttribute('transparency', amount.toString());
}

// Function to handle color change for the model
function handleColorChange(color) {
    console.log("Updating color " + color);
    const r = parseInt(color.substring(1, 3), 16) / 255;
    const g = parseInt(color.substring(3, 5), 16) / 255;
    const b = parseInt(color.substring(5, 7), 16) / 255;

    document.getElementById(modelTag + "__MA_Material_001").setAttribute('diffuseColor', `${r} ${g} ${b}`);
    console.log("Updated color to: " + `${r} ${g} ${b}`);
}

// Function to toggle the omni light
function omniLight() {
    lightOn = !lightOn;
    document.getElementById('model__omniLight').setAttribute('headlight', lightOn.toString());
    console.log(lightOn);
}

// Function to toggle the target light
function targetLight() {
    lightOn = !lightOn;
    document.getElementById('model__targetLight').setAttribute('headlight', lightOn.toString());
    console.log(lightOn);
}

// Function to switch the camera view
function switchCamera(camId) {
    console.log("Current cam: " + modelTag + " " + camId);
    document.getElementById(modelTag + "__" + camId).setAttribute('bind', 'true');
}
