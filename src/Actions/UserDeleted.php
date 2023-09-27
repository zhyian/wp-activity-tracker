<?php

namespace Zhyian\ActivityTracker\Actions;

class UserDeleted extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'deleted_user';
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
			'action'    => __( 'User deleted', 'wp-activity-tracker' ),
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
