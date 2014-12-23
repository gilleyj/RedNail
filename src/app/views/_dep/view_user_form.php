<?php

	class model_user extends model {

        /*
         user_id	int(10)	No
         username	varchar(64)	No
         password	varchar(64)	No
         first_name	varchar(64)	No
         last_name	varchar(64)	No
         country	int(10)	No
         email	varchar(64)	No
         createdate	datetime	No
         lastlogin	datetime	No
         is_verified	int(10)	No
         is_active	int(10)	No 	 	 	 
         avatar_id	int(10)	No 	 	avatar -> avatar_id 	 
         */
        
        public function create_user( $username, $password ) {
            $username = $this->escape($username);
            $password = $this->escape($password);
            
            // check if user exists
            $sql = "select user_id from user where username = '".$username."' and password ='".$password."' limit 1;";
            $data = $this->sql_select_row( $sql );
            
			if($data!==false && $data!=0) {
                // user already exists
                return get_user_by_id($data['user_id']);
            }
            
            // create a new user
            $sql = "insert into user ( username, password, createdate ) values ( '{$name}', '{$password}', NOW() ) ";
			$data = $this->sql_insert( $sql );
			if($data!==false && $data!=0) return $this->get_user_by_id($data['user_id']);

        }
        
        public function get_user_by_id($user_id) {
            $user_id = intval($user_id);
            $sql = "select * from user where user_id = '{$user_id}' limit 1;";
            $data = $this->sql_select_row( $sql );
            if($data!==false && $data!=0) return $data;
            else return false;
        }		

	
        public function get_user_by_username_password( $username, $password ) {
            $username = $this->escape($username);
            $password = $this->escape($password);
            
            // check if user exists
            $sql = "select * from user where username = '".$username."' and password ='".$password."' limit 1;";
            $data = $this->sql_select_row( $sql );
            
			if($data!==false && $data!=0) return $data;
            else return false;
        }
        
        public function check_if_username_exists($username) {
            $username = $this->escape($username);
            
            // check if user exists
            $sql = "select * from user where username = '".$username."' limit 1;";
            $data = $this->sql_select_row( $sql );
            
			if($data!==false && $data!=0) return true;
            else return false;
        }
}

