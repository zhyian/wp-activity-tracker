<?php

namespace Zhyian\ActivityTracker\Actions;

class PluginActivated extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'activated_plugin';
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function get_action_data( array $data ): array {
		[ $plugin_path ] = $data;

		$plugin_data = get_plugin_data( WP_PLUGIN_DIR . "/$plugin_path" );

		return [
			'type'      => 'plugin',
			'object_id' => 0,
			'action'    => __( 'Plugin activated', 'wp-activity-tracker' ) . ": {$plugin_data['Name']}",
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
