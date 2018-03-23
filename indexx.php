<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo Nivo</title>
 
    <link rel="stylesheet" href="estilos/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="estilos/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="estilos/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="estilos/themes/bar/bar.css" type="text/css" media="screen" /> 
    <link rel="stylesheet" href="estilos/nivo-slider.css" type="text/css" media="screen" />
    <style>
        .slider-wrapper{
            width: 960px;
            margin: 100px auto;
        }
    </style>
</head>
<body>
    <div class="slider-wrapper theme-light">
        <div id="slider" class="nivoSlider">
            <img src="images/slide1.jpg" title="<p>Esto es un codigo HTML</p>" />
            <img src="images/slide2.jpg" title="#caption1" />
            <img src="images/slide3.jpg" />
            <img src="images/slide4.jpg" />
        </div>
        <div id="caption1" style="display: none;">
            <h3>Hola, esto es un caption HTML</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, quos, perspiciatis maiores saepe sit quidem quisquam cumque voluptas similique magni distinctio enim fugiat blanditiis qui esse. Ea, accusantium ipsa odio?</p>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, eveniet.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, dolorum?</li>
            </ul>
        </div>
    </div>
    <script type="text/javascript" src="js/funciones.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script> -->
  	<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function(){
        $('#slider').nivoSlider({
            effect: 'fade',
            slices: 15,
            boxCols: 8,
            boxRows: 4,
            animSpeed: 500,
            pauseTime: 3000,
            startSlide: 0,
            directionNav: true,
            controlNav: true,
            controlNavThumbs: false,
            pauseOnHover: true,
            manualAdvance: false,
            prevText: 'Prev',
            nextText: 'Next',
            randomStart: false,
        });
    });
    </script>
</body>
</html>