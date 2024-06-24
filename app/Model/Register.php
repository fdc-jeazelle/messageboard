<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 */
class Register extends AppModel {
    public $useTable = 'users'; 
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
	public $virtualFields = array(
		'password_confirm' => false //This ensures that this wont be saved in the database
	);
	public $validate = array(
		'user_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'first_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
                'rule' => array('minLength', '2'),
                'message' => 'First name must be at least 2 characters long.'
            ),
            'maxLength' => array(
                'rule' => array('maxLength', '50'),
                'message' => 'First name cannot be more than 50 characters long.'
            ),
		),
		'last_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a valid email address',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
                'rule' => array('minLength', '2'),
                'message' => 'First name must be at least 2 character long.'
            ),
            'maxLength' => array(
                'rule' => array('maxLength', '50'),
                'message' => 'First name cannot be more than 50 characters long.'
            ),
		),
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
		'password_confirm' => array(
            'rule' => 'checkPasswordsMatch',
            'message' => 'Passwords do not match'
        ),
		'date_added' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
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
	public function beforeSave($options = array()) {
        if (!$this->id) {
            // New record, set 'date_added' field
            $this->data[$this->alias]['date_added'] = date('Y-m-d h:i:s');
            $this->data[$this->alias]['last_logged_in'] = date('Y-m-d h:i:s');
        }
		if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
		
        return true;
    }
}
