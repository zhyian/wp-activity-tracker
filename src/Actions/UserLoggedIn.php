<?php

namespace Zhyian\ActivityTracker\Actions;

class UserLoggedIn extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'wp_login';
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
		[ $user_login, $user ] = $data;

		return [
			'type'      => 'user',
			'object_id' => $user->ID,
			'action'    => __( 'User logged in', 'wp-activity-tracker' ) . ": $user_login",
			'user_id'   => $user->data->ID,
			'user_name' => $user->data->display_name,
			'user_role' => implode( ', ', $user->roles ),
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
