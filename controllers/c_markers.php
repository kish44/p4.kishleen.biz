<?php

class markers_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("Members only. <a href='/users/login'>Login</a>");
        }
		
    }

    public function add() {

        # Setup view
        $this->template->content = View::instance('v_markers_add');
        $this->template->title   = "Add Your Favorite Restaurant";
		
		
		# CSS/JS includes
			
		# Create an array of 1 or many client files to be included in the body
    	$client_files_head = Array(
		"../css/validationEngine.jquery.css",						   
        "../css/index.css",
		"../css/template.css",
		"../js/jqueryValidation/js/jquery-1.6.min.js",
		"http://maps.google.com/maps/api/js?sensor=false",
		"../js/jqueryValidation/js/languages/jquery.validationEngine-en.js",
		"../js/jqueryValidation/js/jquery.validationEngine.js",
		"../js/jqueryValidation/js/contrib/other-validations.js",
		"../js/jqueryValidation/js/contrib/validation.js"
        );

		# Use load_client_files to generate the links from the above array
		$this->template->client_files_head = Utils::load_client_files($client_files_head);  

        # Render template
        echo $this->template;

    }
	
	public function delete($post_created, $post_user_id) {
		$q= 'SELECT
		*
		FROM markers
		WHERE created = '.$post_created.' AND user_id ='.$post_user_id;
		 
		$post = DB::instance(DB_NAME)->select_row($q);
		$post_id = $post['post_id'];
		 
		 
		DB::instance(DB_NAME)->delete('markers','WHERE post_id ='.$post_id);
		 
		 
		Router::redirect('/markers');
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
        echo "Your post has been added. <a href='/markers/add'>Add another</a>";

    }
	
	public function index() {

		# Set up the View
		$this->template->content = View::instance('v_markers_index');
		$this->template->title   = "All markers";
	
		# Query
		$q = 'SELECT 
				markers.content,
				markers.created,
				markers.user_id AS post_user_id,
				users_users.user_id AS follower_id,
				users.first_name,
				users.last_name
			FROM markers
			INNER JOIN users_users 
				ON markers.user_id = users_users.user_id_followed
			INNER JOIN users 
				ON markers.user_id = users.user_id
			WHERE users_users.user_id = '.$this->user->user_id;
	
		# Run the query, store the results in the variable $markers
		$markers = DB::instance(DB_NAME)->select_rows($q);
	
		# Pass data to the View
		$this->template->content->markers = $markers;
	
		# Render the View
		echo $this->template;
	
	}
	
	public function users() {
	
		# Set up the View
		$this->template->content = View::instance("v_markers_users");
		$this->template->title   = "Users";
	
		# Build the query to get all the users
		$q = "SELECT *
			FROM users";
	
		# Execute the query to get all the users. 
		# Store the result array in the variable $users
		$users = DB::instance(DB_NAME)->select_rows($q);
	
		# Build the query to figure out what connections does this user already have? 
		# I.e. who are they following
		$q = "SELECT * 
			FROM users_users
			WHERE user_id = ".$this->user->user_id;
	
		# Execute this query with the select_array method
		# select_array will return our results in an array and use the "users_id_followed" field as the index.
		# This will come in handy when we get to the view
		# Store our results (an array) in the variable $connections
		$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');
	
		# Pass data (users and connections) to the view
		$this->template->content->users       = $users;
		$this->template->content->connections = $connections;
	
		# Render the view
		echo $this->template;
	}
	
	public function follow($user_id_followed) {

		# Prepare the data array to be inserted
		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
			);
	
		# Do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);
	
		# Send them back
		Router::redirect("/markers/users");
	
	}

	public function unfollow($user_id_followed) {
	
		# Delete this connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
		DB::instance(DB_NAME)->delete('users_users', $where_condition);
	
		# Send them back
		Router::redirect("/markers/users");
	
	}

} # eoc
