// JavaScript Document
var counter = 0;

$(document).ready(function() {
    // Initialize page and model selections
    selectPage();
    selectModel();

    // Show initial model card and hide others
    $('#coke-card').show();
    $('#sprite-card').hide();
    $('#pepper-card').hide();
    $('#glass-card').hide();

    // Function to handle page selection
    function selectPage() {
        $('#home').show();
        $('#about').hide();
        $('#models').hide();
        $('#interaction').hide();
        $('#cokeDescription').hide();
        $('#spriteDescription').hide();
        $('#pepperDescription').hide();

        // Event handlers for model selection
        $('#el1').click(function() {
            $('#coke-card').fadeIn(2500);
            $('#sprite-card').hide();
            $('#pepper-card').hide();
            $('#glass-card').hide();
            setContent("coke");
        });

        $('#el2').click(function() {
            $('#coke-card').hide();
            $('#sprite-card').fadeIn(2500);
            $('#pepper-card').hide();
            $('#glass-card').hide();
            setContent("sprite");
        });

        $('#el3').click(function() {
            $('#coke-card').hide();
            $('#sprite-card').hide();
            $('#pepper-card').fadeIn(2500);
            $('#glass-card').hide();
            setContent("pepper");
        });

        $('#el4').click(function() {
            $('#coke-card').hide();
            $('#sprite-card').hide();
            $('#pepper-card').hide();
            $('#glass-card').fadeIn(2500);
            setContent("glass");
        });

        // Event handlers for navigation
        $('#navHome').click(function() {
            $('#home').show();
            $('#about').hide();
            $('#interaction').hide();
            $('#cokeDescription').hide();
            $('#spriteDescription').hide();
            $('#pepperDescription').hide();
        });

        $('#navAbout').click(function() {
            $('#home').hide();
            $('#about').show();
            $('#interaction').hide();
            $('#cokeDescription').hide();
            $('#spriteDescription').hide();
            $('#pepperDescription').hide();
        });

        $('#navModels').click(function() {
            $('#home').hide();
            $('#about').hide();
            $('#interaction').show();
            $('#cokeDescription').show();
            $('#spriteDescription').hide();
            $('#pepperDescription').hide();
        });
    }

    // Function to handle model selection
    function selectModel() {
        $('#navCoke').click(function() {
            $('#coke').show();
            $('#sprite').hide();
            $('#pepper').hide();
            $('#interaction').show();
            $('#cokeDescription').show();
            $('#spriteDescription').hide();
            $('#pepperDescription').hide();
        });

        $('#navSprite').click(function() {
            $('#coke').hide();
            $('#sprite').show();
            $('#pepper').hide();
            $('#interaction').show();
            $('#cokeDescription').hide();
            $('#spriteDescription').show();
            $('#pepperDescription').hide();
        });

        $('#navPepper').click(function() {
            $('#coke').hide();
            $('#sprite').hide();
            $('#pepper').show();
            $('#interaction').show();
            $('#cokeDescription').hide();
            $('#spriteDescription').hide();
            $('#pepperDescription').show();
        });
    }
});

// Function to change the look of the page
function changeLook() {
    counter += 1;
    switch (counter) {
        case 1:
            document.getElementById('bodyColor').style.backgroundColor = 'lightblue';
            document.getElementById('headerColor').style.backgroundColor = '#FF0000';
            document.getElementById('footerColor').style.backgroundColor = '#FF9900';
            break;
        case 2:
            document.getElementById('bodyColor').style.backgroundColor = '#FF6600';
            document.getElementById('headerColor').style.backgroundColor = '#FF9999';
            document.getElementById('footerColor').style.backgroundColor = '#996699';
            break;
        case 3:
            document.getElementById('bodyColor').style.backgroundColor = 'coral';
            document.getElementById('headerColor').style.backgroundColor = 'darkcyan';
            document.getElementById('footerColor').style.backgroundColor = 'darksalmon';
            break;
        case 4:
            counter = 0;
            document.getElementById('bodyColor').style.backgroundColor = 'lightgrey';
            document.getElementById('headerColor').style.backgroundColor = 'chocolate';
            document.getElementById('footerColor').style.backgroundColor = 'dimgrey';
            break;
    }
}

// Function to reset the page to its original look
function changeBack() {
    document.getElementById('bodyColor').style.backgroundColor = '#FFFFFF';
    document.getElementById('headerColor').style.backgroundColor = 'rgba(175,0,0,1)';
    document.getElementById('footerColor').style.backgroundColor = 'rgba(175,0,0,1)';
}
