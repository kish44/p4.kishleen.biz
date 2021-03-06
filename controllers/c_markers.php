<?php

class markers_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->
user) {
            die("Members only. <a href='/users/login'>Login</a>");
        }
		
    }

    public function add() {

        # Setup view
        $this->template->content = View::instance('v_markers_add');
        $this->template->title   = "Add Your Favorite Restaurant";
		
		
		# CSS/JS includes
			
		# Create an array of 1 or many client files to be included in the body
    	$client_files_body = Array(
		"../js/posabsolute-jQuery-Validation-Engine-499f567/js/jquery-1.8.2.min.js",
		"http://maps.google.com/maps/api/js?sensor=false",			"../js/posabsolute-jQuery-Validation-Engine-499f567/js/languages/jquery.validationEngine-en.js",
		"../js/posabsolute-jQuery-Validation-Engine-499f567/js/jquery.validationEngine.js",
		"../js/posabsolute-jQuery-Validation-Engine-499f567/js/contrib/other-validations.js"
        );

		# Use load_client_files to generate the links from the above array
		$this->template->client_files_body = Utils::load_client_files($client_files_body);  

        # Render template
        echo $this->template;

    }

	
    public function p_add() {

        # Associate this post with this user
        $_POST['user_id']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('markers', $_POST);

        # Quick and dirty feedback
        echo "Your post has been added. <a href='/markers/add'>Add another</a> or <a href='index.php'>Go to home page</a> ";

    }
	
	
	
} # eoc 