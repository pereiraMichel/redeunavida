<!DOCTYPE html>



<!-- 
 * Markup for jQuery Orbit Plugin 1.2.3
 * www.ZURB.com/playground
 * Copyright 2010, ZURB
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 -->
 
 
 
	<head>
		<meta charset="utf-8" />
		<title>Orbit Demo</title>
		
		<!-- Attach our CSS -->
	  	<link rel="stylesheet" href="../css/orbit-1.2.3.css">
	  	<link rel="stylesheet" href="../css/demo-style.css">
	  	
		<!-- Attach necessary JS -->
		<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="../js/jquery.orbit-1.2.3.min.js"></script>	
		
			<!--[if IE]>
			     <style type="text/css">
			         .timer { display: none !important; }
			         div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
			    </style>
			<![endif]-->
		
		<!-- Run the plugin -->
		<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit();
			});
		</script>
		
	</head>
	<body>
            
	<div class="container">
		<h4>ZURB's Orbit Slider</h4>
		<a href="http://www.zurb.com/playground/orbit-jquery-image-slider">View Docs + Playground for Orbit</a>
	
	
	
	
<!-- =======================================

THE ACTUAL ORBIT SLIDER CONTENT 

======================================= -->
		<div id="featured"> 
<!--                    <div class="content" style="">
                            <h1>Orbit does content now.</h1>
                            <h3>Highlight me...I'm text.</h3>
                    </div>-->
                    <a href="">
                        <img src="dummy-images/foto1.jpg" width="950" height="450" />
                    </a>
                    <a href="" data-caption="#htmlCaption">
                        <img src="dummy-images/foto2.jpg" width="950" height="450" />
                    </a>
                    <a href="">
                        <img src="dummy-images/foto3.jpg" width="950" height="450" />
                    </a>
                    <a href="">
                        <img src="dummy-images/foto4.jpg" width="950" height="450" />
                    </a>
                    <a href="">
                        <img src="dummy-images/foto5.jpg" width="950" height="450" />
                    </a>
                    <a href="">
                        <img src="dummy-images/foto6.jpg" width="950" height="450" />
                    </a>
                    <a href="">
                        <img src="dummy-images/foto7.jpg" width="950" height="450" />
                    </a>
                    <a href="">
                        <img src="dummy-images/foto8.jpg" width="950" height="450" />
                    </a>
                    <a href="">
                        <img src="dummy-images/foto9.jpg" width="950" height="450" />
                    </a>
		</div>
		<!-- Captions for Orbit -->
		<span class="orbit-caption" id="htmlCaption"><strong>I'm A Badass Caption:</strong> I can haz <a href="#">links</a>, <em>style</em> or anything that is valid markup :)</span>
		
		
		
		</div>	
	</body>
</html>