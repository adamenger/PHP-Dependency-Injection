<?php

/*include blog.php file*/
include 'blog.php';

/*Instantiate blog class*/
$blog = new Blog();

/*Pull all posts from the database*/
$posts = $blog->allPosts();

/*Pull a single post from the database*/
$singlePost = $blog->singlePost(1);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Test Blog</title>
	</head>

	<body>
		<div id="wrapper">
			<h1>
				Dependency Injection Tests
			</h1>
			
			<div id="allPosts">
				<?php 
					/*Print all posts in posts variable*/
					foreach ($posts as $post){
				?>
					<div class="post">
						<h2>
							<?php echo $post['title']; ?>
						</h2>
						<span>
							<?php echo $post['body']; ?>
						</span>
					</div>
				
				<?php
					}
				?>
			</div>

			<div id="singlePost">
			
			</div>
		</div>
	</body>

</html>
