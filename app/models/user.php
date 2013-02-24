<?php

class User extends AppModel
{
	var $name = 'User';

	var $hasMany = 'Wordslist';

	var $belongsTo = array(
				 'Country' =>
                 array('className'    => 'Country',
                     'foreignKey'   => 'country_id'
                 )
			);					
			
	var $validate = array(
		'username' => VALID_NOT_EMPTY,
		'password' => VALID_NOT_EMPTY,
		'first_name' => VALID_NOT_EMPTY,
		'last_name' => VALID_NOT_EMPTY,
	    'email' => VALID_NOT_EMPTY,
		'country_id' => VALID_NOT_EMPTY
	);

	function validateLogin($data)
	{		
		$this->log("validateLogin - before",LOG_DEBUG);
		$user = $this->find(array('username' => $data['username'], 'password' => $data['password']));

		//pr($user);
		
		if(empty($user) == false) return $user['User'];
		return false;
	}
}

?>
