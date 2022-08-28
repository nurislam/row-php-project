<?php


	// thus session vars will be available
	session_start();

	function log_in_check($email = NULL, $password = NULL, $rem = false)
	{
		if($email && $password)
		{
			// connecting to the database
			require_once("db_connect.php");
			// secure the user data
			$email = mysql_escape_string($email);
			$password = mysql_escape_string($password);
			$sql = "select * from resume where email = '$email' and password = md5('$password') and status = 1";
			$users_requested = mysql_query($sql);
			
			// only one user can connect using a request
			if(!empty($users_requested))
			{
				if(mysql_num_rows($users_requested) == 1)
				{
					$row = mysql_fetch_array($users_requested);
					$_SESSION['resume_id'] = $row['resume_id'];
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					$_SESSION['type'] = $row['resume_type'];
					// making key
					$chk = @md5(
						$_SERVER['HTTP_ACCEPT_CHARSET'] . 
						$_SERVER['HTTP_ACCEPT_ENCODING'] .
						$_SERVER['HTTP_ACCEPT_LANGUAGE'] .
						$_SERVER['HTTP_USER_AGENT'] .
						$REMOTE_ADDR);
					$_SESSION['key'] = $chk;
					
					// if remember is checked
					if($rem)
					{
						// remember for 100 days
						setcookie('email', base64_encode($email), time() + (100*24*60*60));
						setcookie('password', base64_encode($password), time() + (100*24*60*60));
						setcookie('key', base64_encode($chk), time() + (100*24*60*60));
					}
					return $row['resume_id'];
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else if($_SESSION['email'] && $_SESSION['password'] && $_SESSION['type'] && $_SESSION['key'])
		{
			session_regenerate_id();
			$chk = @md5(
				$_SERVER['HTTP_ACCEPT_CHARSET'] . 
				$_SERVER['HTTP_ACCEPT_ENCODING'] .
				$_SERVER['HTTP_ACCEPT_LANGUAGE'] .
				$_SERVER['HTTP_USER_AGENT'] .
				$REMOTE_ADDR);
			if($_SESSION['key'] == $chk)
				return $_SESSION['resume_id'];
			else
				session_destroy();
				return false;
		}else if($_COOKIE['email'] && $_COOKIE['password'] && $_COOKIE['key'])
		{
			// decrypting data
			$_COOKIE['email'] = base64_decode($_COOKIE['email']);
			$_COOKIE['password'] = base64_decode($_COOKIE['password']);
			$_COOKIE['key'] = base64_decode($_COOKIE['key']);
			// making key
			$chk = @md5(
				$_SERVER['HTTP_ACCEPT_CHARSET'] . 
				$_SERVER['HTTP_ACCEPT_ENCODING'] .
				$_SERVER['HTTP_ACCEPT_LANGUAGE'] .
				$_SERVER['HTTP_USER_AGENT'] .
				$REMOTE_ADDR);
			if($_COOKIE['key'] == $chk)
			{
				// if ok then check database
				$tmp = log_in_check($_COOKIE['email'], $_COOKIE['password']);
				if($tmp)
				{
					return $tmp;
				}else{
					// user tricked so delete cookies
					setcookie('email', NULL, time());
					setcookie('password', NULL, time());
					setcookie('key', NULL, time());
					return false;
				}
			}else{
				// not match then delete cookies
				setcookie('email', NULL, time());
				setcookie('password', NULL, time());
				setcookie('key', NULL, time());
				return false;
			}
		}else{
			if($_SESSION)
				session_destroy();
			return false;
		}
	}
	
	// USEs::
	// var_dump(log_in_check('guest', '123456'));
	// var_dump(log_in_check());
 ?>		