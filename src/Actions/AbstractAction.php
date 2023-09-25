<?php

namespace Zhyian\ActivityTracker\Actions;

use Zhyian\ActivityTracker\Entry;

abstract class AbstractAction implements ActionInterface {

	use UserData;

	/**
	 * @return int
	 */
	public function get_priority(): int {
		return 10;
	}

	/**
	 * @return int
	 */
	public function get_accepted_args(): int {
		return 1;
	}

	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	abstract public function pass_action_checks( array $data ): bool;

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	abstract public function get_action_data( array $data ): array;

	/**
	 *
	 * @param array $data
	 * @param array $excluded_roles
	 *
	 * @return \Zhyian\ActivityTracker\Entry|null
	 */
	public function create_entry( array $data, array $excluded_roles ): ?Entry {
		$user_data = $this->get_user_data();

		return $this->pass_action_checks( $data ) && $this->is_user_role_excluded( $user_data, $excluded_roles )
			? null
			: new Entry(
				array_merge(
					$user_data,
					$this->get_action_data( $data )
				)
			);
	}
}
