<?php 

    require_once('facebook-sdk/facebook.php');
    require_once('inc/config.php');

    // create facebook object
    $facebook = new Facebook(array(

        'appId'     =>  APP_ID,
        'secret'    =>  APP_SECRET,
        'cookie'    =>  true

    ));     

    // get signed request
    $signedRequest = $facebook->getSignedRequest();
    $userIsFan = isset($signedRequest['page']['liked']) && $signedRequest['page']['liked'];
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<html>

    <head>
		<!-- SET character set and chrome frame for IE6 -->
	    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta property="og:title" content="">
		  <meta property="og:type" content="">
		  <meta property="og:url" content=">">
		  <meta property="og:image" content="">
		  <meta property="og:description" content="">
        <!-- Title of Facebook Tab -->
	    <title>Facebook Tab Title</title>
		<meta name="description" content="">
		  <meta name="author" content="">
		  <meta name="viewport" content="width=device-width">

        

        <!-- include stylesheet (taken from HTML5 boilerplate) -->
        <link rel="stylesheet" href="css/style.css">

    </head>
 
    <body>

        <!-- Wrapper that encloses the entire content -->
        <div id="wrapper">

            <!-- YOUR CONTENT GOES HERE -->
            <div id="content">

                    <!-- ********** THIS CAN BE VIEWED BY FANS ONLY ********** -->
                    <?php if ($userIsFan) { ?>

                        <p>User is a fan</p>

                    <!-- ********** THIS CAN BE VIEWED BY FANS ONLY ********** -->
                    <?php } else { ?>

                        <p>User is not a fan</p>

                    <?php } ?>

            </div>


        </div>

        <!-- FB Root serves as anchor for the FB javascript SDK -->
        <!-- Must not be changed or removed -->
        <div id="fb-root"></div>

        <script>

            // Called when FB SDK has been loaded
            window.fbAsyncInit = function() {

                // Initialize the FB javascript SDK
                FB.init({

                    appId   : '<?php echo APP_ID; ?>',
                    status  : true,
                    cookie  : true,
                    xfbml   : true

                });
				// redirect to app/tab URL if user views outside Facebook
				  // useful for enabling open graph data
				  var isInIframe = (window.location != window.parent.location) ? true : false;
				  if ( !isInIframe && location.host.indexOf('localhost') == -1 ) {
				    // location.href = appURL;
				  }

                // Auto grows panel when app is higher than 800px.
                // In the app settings, height needs to be set to height 800px fixed for this to work

				
                //FB.Canvas.setSize({ width: 810, height: 1417 });
                //FB.Canvas.setAutoGrow();                

            };

            // Load the SDK Asynchronously
            (function (d) {
                var js, id = 'facebook-jssdk'; if (d.getElementById(id)) { return; }
                js = d.createElement('script'); js.id = id; js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                d.getElementsByTagName('head')[0].appendChild(js);
            } (document));        
				function resize() {
			    FB.Canvas.setAutoGrow();
			  }
        </script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/lib/jquery-1.8.1.min.js"><\/script>')</script>
		

    </body>

</html>

