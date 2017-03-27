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
	'qa_save' => 'Išsaugoti',
	'qa_update' => 'Atnaujinti',
	'qa_list' => 'Sąrašas',
	'qa_no_entries_in_table' => 'Įrašų nėra.',
	'qa_create' => 'Sukurti',
	'qa_edit' => 'Redaguoti',
	'qa_view' => 'Peržiūrėti',
	'custom_controller_index' => 'Papildomo Controller\'io puslapis.',
	'qa_logout' => 'Atsijungti',
	'qa_add_new' => 'Pridėti naują',
	'qa_are_you_sure' => 'Ar esate tikri?',
	'qa_back_to_list' => 'Grįžti į sąrašą',
	'qa_dashboard' => 'Pagrindinis',
	'qa_delete' => 'Trinti',
	'save' => 'Išsaugoti',
	'update' => 'Atnaujinti',
	'list' => 'Sąrašas',
	'no_entries_in_table' => 'Įrašų nėra.',
	'create' => 'Sukurti',
	'edit' => 'Redaguoti',
	'view' => 'Peržiūrėti',
	'logout' => 'Atsijungti',
	'add_new' => 'Pridėti naują',
	'are_you_sure' => 'Ar esate tikri?',
	'back_to_list' => 'Grįžti į sąrašą',
	'dashboard' => 'Pagrindinis',
	'delete' => 'Trinti',
	'quickadmin_title' => 'samepage_ios2',
];