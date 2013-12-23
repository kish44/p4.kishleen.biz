<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
      
    } 
	
/*-------------------------------------------------------------------------------------------------
        display home page
-------------------------------------------------------------------------------------------------*/

    public function index() {
        echo "This is the index page";
    }
/*-------------------------------------------------------------------------------------------------
        display signup page
-------------------------------------------------------------------------------------------------*/
    public function signup($error = NULL) {

        # Setup view
            $this->template->content = View::instance('v_users_signup');
            $this->template->title   = "Sign Up";
			
			## Create an array of 1 or many client files to be included in the body
			$client_files_body = Array(
			"../js/posabsolute-jQuery-Validation-Engine-499f567/js/jquery-1.8.2.min.js","../js/posabsolute-jQuery-Validation-Engine-499f567/js/languages/jquery.validationEngine-en.js",
			"../js/posabsolute-jQuery-Validation-Engine-499f567/js/jquery.validationEngine.js",
			"../js/posabsolute-jQuery-Validation-Engine-499f567/js/contrib/other-validations.js"
			);

		# Use load_client_files to generate the links from the above array
		$this->template->client_files_body = Utils::load_client_files($client_files_body);  
		
		# Pass data to the view
		$this->template->content->error = $error;

        # Render template
            echo $this->template;

    }

/*-------------------------------------------------------------------------------------------------
        process signup
-------------------------------------------------------------------------------------------------*/
   public function p_signup() {
        
                // setup view
                $this->template->content = View::instance('v_users_signup');
				
				
                // initial error to false
                $error = false;

                // initiate error
                $this->template->content->error = '<br>
';

                // if we have no post data just display the View with signup form
                if(!$_POST) {
                        echo $this->template;
                        return;
                }

                // otherwise...
                // loop through the POST data
                foreach($_POST as $field_name => $value) {

                        // if a field was blank, add a message to the error View variable
                        if(trim($value) == "") {
                                $error = true;
                                $this->template->content->error = 'All fields are required.';
                        }
                } 

                // check whether this user's email already exists (sanitize input first)
                $_POST = DB::instance(DB_NAME)->sanitize($_POST);
                $exists = DB::instance(DB_NAME)->select_field("SELECT email FROM users WHERE email = '" . $_POST['email'] . "'");

                if (isset($exists)) {
                        $error = true;
                        $this->template->content->error = 'This email address has already been registered, please try again.';
                        echo $this->template;
                }
				else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					$error = true;
					$this->template->content->error = 'Enter valid email';
					echo $this->template;
				}

                // check if password is typed correctly
                else if ($_POST['password'] != $_POST['retype']) {
                        $error = true;
                        $this->template->content->error = 'Password fields don&apos;t match.';
                        echo $this->template;
                }

                // if no previous errors, add to database
                else if(!$error) {
                
                        // add XSS and html tag filtering
                        $firstname = $_POST['first_name'];
                        $firstname = strip_tags(htmlentities(stripslashes(nl2br($firstname)),ENT_NOQUOTES,"Utf-8"));

                        // add XSS and html tag filtering
                        $lastname = $_POST['last_name'];
                        $lastname = strip_tags(htmlentities(stripslashes(nl2br($lastname)),ENT_NOQUOTES,"Utf-8"));

                        // unset the 'retype' field (not needed in db)
                        unset($_POST['retype']);

                        // more data we want stored with the user
                        $_POST['created']  = Time::now();
                        $_POST['modified'] = Time::now();

                        // encrypt the password
                        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

                        // create an encrypted token via their email address and a random string
                        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

                        // insert this user into the database
                        $user_id = DB::instance(DB_NAME)->insert('users', $_POST);

                        // all users follow their own markers by default
                        $data = Array(
                                "created" => Time::now(),
                                "user_id" => $user_id,
                                "user_id_followed" => $user_id
                                );

                        // do the insert
                        DB::instance(DB_NAME)->insert('users_users', $data);

                        // log user in using the token we generated
                        setcookie("token", $_POST['token'], strtotime('+1 year'), '/');

                        

                        // signup confirm
                        Router::redirect("/users/login");
                }
                else {
                        echo $this->template;
                        
                } 
                 
        } 

/*-------------------------------------------------------------------------------------------------
        login page
-------------------------------------------------------------------------------------------------*/
    public function login($error = NULL) {

		# Set up the view
		$this->template->content = View::instance("v_users_login");
		
		## Create an array of 1 or many client files to be included in the body
    	$client_files_body = Array(
		"../js/posabsolute-jQuery-Validation-Engine-499f567/js/jquery-1.8.2.min.js","../js/posabsolute-jQuery-Validation-Engine-499f567/js/languages/jquery.validationEngine-en.js",
		"../js/posabsolute-jQuery-Validation-Engine-499f567/js/jquery.validationEngine.js",
		"../js/posabsolute-jQuery-Validation-Engine-499f567/js/contrib/other-validations.js"
        );

		# Use load_client_files to generate the links from the above array
		$this->template->client_files_body = Utils::load_client_files($client_files_body);  

		
		# Pass data to the view
		$this->template->content->error = $error;
	
		# Render the view
		echo $this->template;

}




/*-------------------------------------------------------------------------------------------------
        process login
-------------------------------------------------------------------------------------------------*/
public function p_login() {

    # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
    $_POST = DB::instance(DB_NAME)->sanitize($_POST);

    # Hash submitted password so we can compare it against one in the db
    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

    # Search the db for this email and password
    # Retrieve the token if it's available
    $q = "SELECT token 
        FROM users 
        WHERE email = '".$_POST['email']."' 
        AND password = '".$_POST['password']."'";

    $token = DB::instance(DB_NAME)->select_field($q);

    # If we didn't find a matching token in the database, it means login failed
    if(!$token) {
        # Note the addition of the parameter "error"
        Router::redirect("/users/login/error"); 
    }
    # Login passed
    else {
        setcookie("token", $token, strtotime('+2 weeks'), '/');
        Router::redirect("/");
    }

}


/*-------------------------------------------------------------------------------------------------
        logout page
-------------------------------------------------------------------------------------------------*/
    public function logout() {

		# Generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
	
		# Create the data array we'll use with the update method
		# In this case, we're only updating one field, so our array only has one entry
		$data = Array("token" => $new_token);
	
		# Do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
	
		# Delete their token cookie by setting it to a date in the past - effectively logging them out
		setcookie("token", "", strtotime('-1 year'), '/');
	
		# Send them back to the main index.
		Router::redirect("/");
	
	}


        


} # end of the class