<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 * @property Quote $Quote
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Quote' => array(
			'className' => 'Quote',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	// app/Model/User.php

        public $components = array(
                'Session',
                'Auth' => array(
                        'loginRedirect' => array('controller' => 'quotes', 'action' => 'index'),
                        'logoutRedirect' => array('controller' => 'quotes', 'action' => 'index')
                )
        );

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}
}
