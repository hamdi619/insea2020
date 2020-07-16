<?php include 'includes/session.php'; ?>
<?php
	$conn = $pdo->open();

	$slug = $_GET['article'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, articles.title AS articlename, articles.id AS articleid FROM articles WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $article = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view
	$now = date('Y-m-d');

	$stmt = $conn->prepare("UPDATE articles SET counter=counter+1 WHERE id=:id");
	$stmt->execute(['id'=>$article['articleid']]);


?>
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
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row box">

		            	<div class="col-sm-10">
		            		<h1 class="page-header"><?php echo $article['articlename']; ?></h1>
		            		<p><b>Description:</b></p>
		            		<p><?php echo $article['description']; ?></p>
		            	</div>
		            </div>
		            <br>
				    <div class="fb-comments row box" data-href="http://localhost/article.php?article=<?php echo $slug; ?>" data-numposts="10" width="100%"></div> 
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