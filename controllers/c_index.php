<?php

class index_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 
		
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_index_index');
			
		# Now set the <title> tag
			$this->template->title = "Home Page";
	
		# CSS/JS includes
			
		# Create an array of 1 or many client files to be included in the body
    	$client_files_body = Array(
		'http://maps.google.com/maps/api/js?sensor=false',
        '/js/googleMaps.js'
        );

		# Use load_client_files to generate the links from the above array
		$this->template->client_files_body = Utils::load_client_files($client_files_body);  

  
			/*
	    	$client_files_body = Array("");
	    	$this->template->client_files_body = Utils::load_client_files($client_files_body);   
	    	*/
	      					     		
		# Render the view
			echo $this->template;

	} # End of method
	
	
	
	
	
	
} # End of class



