<?php

namespace Zhyian\ActivityTracker\Actions;

class ThemeSwitched extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'switch_theme';
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function get_action_data( array $data ): array {
		[ $theme ] = $data;

		return [
			'type'      => 'theme',
			'object_id' => 0,
			'action'    => __( 'Theme switched. Active theme', 'wp-activity-tracker' ) . ": $theme",
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
