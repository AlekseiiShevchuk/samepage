<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'game-mod' => [		'title' => 'Game mod',		'created_at' => 'Time',		'fields' => [		],	],
		'backgrounds' => [		'title' => 'Backgrounds',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'description' => 'Description',			'background-image' => 'Background image',		],	],
		'images' => [		'title' => 'Images',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'description' => 'Description',			'image' => 'Image',		],	],
		'scenarios' => [		'title' => 'Scenarios',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'description' => 'Description',			'background' => 'Background',			'images' => 'Images',		],	],
		'players' => [		'title' => 'Players',		'created_at' => 'Time',		'fields' => [			'device-id' => 'Device id',			'nickname' => 'Nickname',			'results' => 'Results',		],	],
		'games' => [		'title' => 'Games',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'owner' => 'Owner',			'players' => 'Players',			'is-active' => 'Is active',			'owner-etalon-result' => 'Owner etalon result',			'scenario' => 'Scenario',			'game-results' => 'Game results',		],	],
		'results' => [		'title' => 'Results (coordinates)',		'created_at' => 'Time',		'fields' => [			'x-coordinate' => 'X coordinate',			'y-coordinate' => 'Y coordinate',			'rotary-angle' => 'Rotary angle',			'for-image' => 'For image',		],	],
		'game-results' => [		'title' => 'Game results',		'created_at' => 'Time',		'fields' => [			'results' => 'Results',			'is-owner-etalon' => 'Is owner etalon',			'for-game' => 'For game',			'by-player' => 'By Player',		],	],
		'section' => [		'title' => 'Section',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'scenarios' => 'Scenarios',		],	],
	'qa_create' => 'Create',
	'qa_save' => 'Save',
	'qa_edit' => 'Edit',
	'qa_view' => 'View',
	'qa_update' => 'Update',
	'qa_list' => 'List',
	'qa_no_entries_in_table' => 'No entries in table',
	'custom_controller_index' => 'Custom controller index.',
	'qa_logout' => 'Logout',
	'qa_add_new' => 'Add new',
	'qa_are_you_sure' => 'Are you sure?',
	'qa_back_to_list' => 'Back to list',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Delete',
	'create' => 'Create',
	'save' => 'Save',
	'edit' => 'Edit',
	'view' => 'View',
	'update' => 'Update',
	'list' => 'List',
	'no_entries_in_table' => 'No entries in table',
	'logout' => 'Logout',
	'add_new' => 'Add new',
	'are_you_sure' => 'Are you sure?',
	'back_to_list' => 'Back to list',
	'dashboard' => 'Dashboard',
	'delete' => 'Delete',
	'quickadmin_title' => 'samepage_ios2',
];