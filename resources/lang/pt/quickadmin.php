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
	'qa_create' => 'Criar',
	'qa_save' => 'Salvar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Visualizar',
	'qa_update' => 'Atualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sem entradas na tabela',
	'custom_controller_index' => 'Índice de Controller personalizado.',
	'qa_logout' => 'Sair',
	'qa_add_new' => 'Novo',
	'qa_are_you_sure' => 'Tem certeza?',
	'qa_back_to_list' => 'Voltar',
	'qa_dashboard' => 'Painel',
	'qa_delete' => 'Excluir',
	'create' => 'Criar',
	'save' => 'Salvar',
	'edit' => 'Editar',
	'view' => 'Visualizar',
	'update' => 'Atualizar',
	'list' => 'Listar',
	'no_entries_in_table' => 'Sem entradas na tabela',
	'logout' => 'Sair',
	'add_new' => 'Novo',
	'are_you_sure' => 'Tem certeza?',
	'back_to_list' => 'Voltar',
	'dashboard' => 'Painel',
	'delete' => 'Excluir',
	'quickadmin_title' => 'samepage_ios2',
];