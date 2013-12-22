<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	

   <link href="/css/index.css" rel="stylesheet" type="text/css">
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>  

    <nav>

        <menu id = nav>

            <!-- Menu for users who are logged in -->
            <?php if($user): ?>
    			<li><a href='index.php'>Home Page</a></li>
                <li><a href='/users/logout'>Logout</a></li>
                <li><a href='/markers/add'>Add Your Favorite Restaurant</a></li>
            
                
    
            <!-- Menu options for users who are not logged in -->
            <?php else: ?>
    			<li><a href='index.php'>Home Page</a></li>
                <li><a href='/users/signup'>Sign up</a></li>
                <li><a href='/users/login'>Log in</a></li>
    
            <?php endif; ?>

    	</menu>

    </nav>

    <?php if(isset($content)) echo $content; ?>

    <?php if(isset($client_files_body)) echo $client_files_body; ?>


</body>
</html>