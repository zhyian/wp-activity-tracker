<?php

namespace Zhyian\ActivityTracker\Actions;

class UserUpdated extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'profile_update';
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function get_action_data( array $data ): array {
		[ $user_id ] = $data;

		return [
			'type'      => 'user',
			'object_id' => $user_id,
			'action'    => __( 'User profile updated', 'wp-activity-tracker' ),
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
