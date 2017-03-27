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
	'qa_create' => 'बनाइए (क्रिएट)',
	'qa_save' => 'सुरक्षित करे ',
	'qa_edit' => 'संपादित करे (एडिट)',
	'qa_view' => 'देखें',
	'qa_update' => 'सुधारे ',
	'qa_list' => 'सूची',
	'qa_no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'qa_logout' => 'लोग आउट',
	'qa_add_new' => 'नया समाविष्ट करे',
	'qa_are_you_sure' => 'आप निस्चित है ?',
	'qa_back_to_list' => 'सूची पे वापस जाए',
	'qa_dashboard' => 'डॅशबोर्ड ',
	'qa_delete' => 'मिटाइए',
	'create' => 'बनाइए (क्रिएट)',
	'save' => 'सुरक्षित करे ',
	'edit' => 'संपादित करे (एडिट)',
	'view' => 'देखें',
	'update' => 'सुधारे ',
	'list' => 'सूची',
	'no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'logout' => 'लोग आउट',
	'add_new' => 'नया समाविष्ट करे',
	'are_you_sure' => 'आप निस्चित है ?',
	'back_to_list' => 'सूची पे वापस जाए',
	'dashboard' => 'डॅशबोर्ड ',
	'delete' => 'मिटाइए',
	'quickadmin_title' => 'samepage_ios2',
];