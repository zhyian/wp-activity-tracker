<?php

namespace Zhyian\ActivityTracker\Actions;

class UserLoggedOut extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'wp_logout';
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function get_action_data( array $data ): array {
		[ $user_id ] = $data;
		$user        = get_userdata( $user_id );

		return [
			'type'      => 'user',
			'object_id' => $user->data->ID ?? 0,
			'action'    => __( 'User logged out', 'wp-activity-tracker' ) . ": $user->user_login",
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
