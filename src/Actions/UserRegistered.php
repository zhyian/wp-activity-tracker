<?php

namespace Zhyian\ActivityTracker\Actions;

class UserRegistered extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'user_register';
	}

	/**
	 * @return int
	 */
	public function get_accepted_args(): int {
		return 2;
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function get_action_data( array $data ): array {
		[ $user_id, $user ] = $data;

		return [
			'type'      => 'user',
			'object_id' => $user_id,
			'action'    => __( 'User registered', 'wp-activity-tracker' ) . ": {$user['user_login']}",
		];
	}

	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	public function pass_action_checks( array $data ): bool {
		return true;
	}
}
