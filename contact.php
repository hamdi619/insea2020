<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9 " >
		            <div class="row box">

		            	<div class="col-sm-12">
		            		<h1 class="page-header">Contact Us!</h1>
		            		<p><b>Description:</b></p>
							<p><strong>Institut National de Statistique et d&#39;Economie Appliqu&eacute;e</strong></p>

							<p><strong>B.P.:</strong>6217 Rabat-Instituts</p>

							<p><strong>T&eacute;l : </strong>(212) 05 37 77 48 59/60</p>

							<p><strong>Fax :</strong> (212) 05 37 77 94 57</p>

							<p>Follow us on social media!</p>
						 	<a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
					    	<a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
					    	<a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
					    	<a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
					    	<br>
							<!-- <p class='pull-right'>OR</p> -->

							<p class='pull-right'>Contact us on this website <i class="fa fa-hand-o-right"></i></p>
							<br><br><br>
							<div class="mapouter"><div class="gmap_canvas"><iframe width="500" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=insea&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://thevpndeal.com/nordvpn-coupon/">nordvpn coupon</a></div><style>.mapouter{position:relative;text-align:right;height:400px;width:500px;}.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:500px;}</style></div>
							<p>&nbsp;</p>

		            	</div>
		            </div>
		            <br>
		            <label>Or leave a facebook comment</label>
				    <div class="fb-comments row box" data-href="http://localhost/version4/contact.php; ?>" data-numposts="10" width="100%"></div> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>