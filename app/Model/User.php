<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_id';

/**
 * Validation rules
 *
 * @var array
 */
	// public $virtualFields = array(
	// 	'password_confirm' => false //This ensures that this wont be saved in the database
	// );
	public $validate = array(
		
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid email address',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter your email address.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'This email is already taken. Please choose another email.'
			),
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter your password.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public function checkPasswordsMatch($data){
		return $this->data[$this->alias]['password'] === $data['password_confirm'];

	}
	// public function beforeSave($options = array()) {
    //     if ($this->id) {
    //         // New record, set 'last_logged_in' field
    //         $this->data[$this->alias]['last_logged_in'] = date('Y-m-d h:i:s');
    //     }

		
    //     return true;
    // }
}
