<?php

	/*
	** At the serve we dont care exactly what field was wrong,
	** so bool return is alright. 
	*/
	function verifyFields($fields) {

		if (isset($fields['username'])
			&& !preg_match('/^[0-9a-zA-Z_]{3,30}$/', $fields['username']))
			return false;
		
		if (isset($fields['email'])
			&& !preg_match('/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}$/', $fields['email']))
			return false;
		
		if (isset($fields['pass'])
			&& !preg_match('/^[0-9a-zA-Z@#$_!]{6,30}$/', $fields['pass']))
			return false;
		
		if (isset($fields['fname'])
			&& !preg_match('/^[a-zA-Z]{3,30}$/', $fields['fname']))
			return false;

		if (isset($fields['lname'])
			&& !preg_match('/^[a-zA-Z]{3,30}$/', $fields['lname']))
			return false;

		if (isset($fields['age'])
			&& !preg_match('/^[1-9][0-9]$/', $fields['age']))
			return false;

		if (isset($fields['bio'])
			&& !preg_match('/^[0-9a-zA-Z!@#$_.,-?\s\t]{0,500}$/', $fields['bio']))
			return false;

		return true;
	}
