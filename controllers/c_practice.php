<?php
class practice_controller extends base_controller {
	
	public function test_db() {
			/*INSERT PRACTICE
			$q = "INSERT INTO users SET 
				first_name = 'Sam', 
				last_name = 'Seaborn',
				email = 'seaborn@whitehouse.gov'";

			echo $q;
			
			$q = "UPDATE users SET 
    			email = 'newsea@whitehouse.gov'
				WHERE first_name = 'Sam'";
			
			# Run the command
			DB::instance(DB_NAME)->query($q);
			*/
			
			/*
			$new_user = Array(
				'first_name' => 'Albert', 
				'last_name' => 'Einstein',
				'email' => 'alberteinstin@gmail.com',
			);
			DB::instance(DB_NAME)->insert('users', $new_user);
			*/
			#sanitize
			$_POST['first_name'] = 'Albert';
			$_POST = DB::instance(DB_NAME)->sanitize($_POST);
			$q = "SELECT email
				FROM users
				WHERE first_name = '".$_POST['first_name']."'
    ";
			echo DB::instance(DB_NAME)->select_field($q);
		}
	
	
	public function test1(){
			
			
			$imageObj = new Image('http://placekitten.com/1000/1000');
			
			$imageObj->resize(200,200);
			
			$imageObj->display();
	
	}
	
	public function test2(){
		
		#Static
		echo Time::now();
		}
	
}
