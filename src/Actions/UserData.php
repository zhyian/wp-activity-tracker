<?php

namespace Zhyian\ActivityTracker\Actions;

trait UserData {

	/**
	 * @return array
	 */
	public function get_user_data(): array {
		$user = wp_get_current_user();

		return [
			'user_id'   => $user->data->ID,
			'user_name' => $user->data->display_name,
			'user_role' => implode( ', ', $user->roles ),
		];
	}

	/**
	 * @param array $user_data
	 * @param array $excluded_roles
	 *
	 * @return bool
	 */
	public function is_user_role_excluded( array $user_data, array $excluded_roles ): bool {
		$user_roles = explode( ', ', $user_data['user_role'] );

		return ! empty( array_intersect( $excluded_roles, $user_roles ) );
	}
}
