<?php
$data = [];
function getRandomName() {
	return strtoupper(mb_substr(md5(time() . mt_rand(0, 999)), 0, 8));
}

function getEntity() {
	return [
		[
			'name' => getRandomName(),
			'custom_fields' => [
				[
					'id' => 1357268,
					'values' => [
						[
							'value' => 79554621645,
							'enum' => 'MOB'
						]
					]
				],
			]
		],
	];
}

$data['request']['contacts']['add'] = getEntity();
