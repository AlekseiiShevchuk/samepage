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
	'qa_create' => 'Crear',
	'qa_save' => 'Guardar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Ver',
	'qa_update' => 'Actualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sin valores en la tabla',
	'custom_controller_index' => 'Índice del controlador personalizado (index).',
	'qa_logout' => 'Salir',
	'qa_add_new' => 'Agregar',
	'qa_are_you_sure' => 'Estás seguro?',
	'qa_back_to_list' => 'Regresar a la lista?',
	'qa_dashboard' => 'Tablero',
	'qa_delete' => 'Eliminar',
	'create' => 'Crear',
	'save' => 'Guardar',
	'edit' => 'Editar',
	'view' => 'Ver',
	'update' => 'Actualizar',
	'list' => 'Listar',
	'no_entries_in_table' => 'Sin valores en la tabla',
	'logout' => 'Salir',
	'add_new' => 'Agregar',
	'are_you_sure' => 'Estás seguro?',
	'back_to_list' => 'Regresar a la lista?',
	'dashboard' => 'Tablero',
	'delete' => 'Eliminar',
	'quickadmin_title' => 'samepage_ios2',
];