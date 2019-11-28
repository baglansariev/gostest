<?php
	return [
		'(ru)?(kz)?' => [
            'controller' => 'home',
            'action' => 'index',
        ],
        'sendmail' => [
            'controller' => 'mail',
            'action' => 'sendMail',
        ],
        'about(/ru)?(/kz)?' => [
            'controller' => 'about',
            'action' => 'index',
        ],
        'laws(/ru)?(/kz)?' => [
            'controller' => 'laws',
            'action' => 'index',
        ],
        'payment(/ru)?(/kz)?' => [
            'controller' => 'payment',
            'action' => 'index',
        ],
        'conditions(/ru)?(/kz)?' => [
            'controller' => 'conditions',
            'action' => 'index',
        ],
        'contacts(/ru)?(/kz)?' => [
            'controller' => 'contacts',
            'action' => 'index',
        ],
        'login' => [
            'controller' => 'account',
            'action' => 'login',
        ],
        'register' => [
            'controller' => 'account',
            'action' => 'register',
        ],
        'account' => [
            'controller' => 'account',
            'action' => 'account',
        ],
        'account/tests' => [
            'controller' => 'account',
            'action' => 'tests',
        ],
        'account/documents' => [
            'controller' => 'account',
            'action' => 'account',
        ],
        'logout' => [
            'controller' => 'account',
            'action' => 'logout',
        ],
	];