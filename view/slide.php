<!DOCTYPE html>

 
 
 
	<head>
		<meta charset="utf-8" />
		<title>REDE UNA VIVA</title>
		
		<!-- Attach our CSS -->
                <link rel="stylesheet" href="../css/orbit-1.3.0.css">
                <link rel="stylesheet" href="../css/globals.css">
                <link rel="stylesheet" href="../css/grid.css">
                <link rel="stylesheet" href="../css/mobile.css">
                <link rel="stylesheet" href="../css/typography.css">
                <link rel="stylesheet" href="../css/demo-style.css">
	  	
		<!-- Attach necessary JS -->
		<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="../js/jquery.orbit-1.3.0.js"></script>	
                
			<!--[if IE]>
			     <style type="text/css">
			         .timer { display: none !important; }
			         div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
			    </style>
			<![endif]-->
		
		<!-- Run the plugin -->
		<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit({bullets: true});
				$('#featured2').orbit({bullets: true});
				$('#responsive').orbit({bullets: true, fluid: true});
			});
		</script>
		
	</head>
	<body>
	<div class="container">
		<div class="row">
			<div class="ten columns">
<!--				<h4>ZURB's Orbit Slider</h4>
				<a href="http://www.zurb.com/playground/orbit-jquery-image-slider">View Docs + Playground for Orbit</a>-->


				<div id="responsive"> 
					<div class="content" style="">
						<h1>Orbit does content now.</h1>
						<h3>Highlight me...I'm text.</h3>
					</div>
                                    <!--2048x1536-->
                                    
                                    <img src="dummy-images/foto1.jpg" width="2048" height="1536" />
                                    <img src="dummy-images/foto2.jpg" data-caption="#htmlCaption" width="2048" height="1536" />
                                    <img src="dummy-images/foto3.jpg" width="2048" height="1536"  />
                                    <img src="dummy-images/foto4.jpg" width="2048" height="1536"  />
				</div>

		<!-- =======================================

		THE ACTUAL ORBIT SLIDER CONTENT 

		======================================= -->
<!--				<div id="featured"> 
					<div class="content" style="">
						<h1>Orbit does content now.</h1>
						<h3>Highlight me...I'm text.</h3>
					</div>
					<a href=""><img src="dummy-images/overflow.jpg" /></a>
					<img src="dummy-images/captions.jpg" data-caption="#htmlCaption" />
					<img src="dummy-images/features.jpg"  />
				</div>-->
				<!-- Captions for Orbit -->
				<span class="orbit-caption" id="htmlCaption"><strong>I'm A Badass Caption:</strong> I can haz <a href="#">links</a>, <em>style</em> or anything that is valid markup :)</span>


<!--				<div id="featured2"> 
					<div class="content" style="">
						<h1>Orbit does content now.</h1>
						<h3>Highlight me...I'm text.</h3>
					</div>
					<a href=""><img src="dummy-images/overflow.jpg" /></a>
					<img src="dummy-images/captions.jpg" data-caption="#htmlCaption" />
					<img src="dummy-images/features.jpg"  />
				</div>-->
			</div>
		</div>
		
		
		
	</div>	
	
	
	</body>
</html>