<?php

namespace Zhyian\ActivityTracker;

use Jeffreyvr\WPSettings\WPSettings;

final class Settings {

	const OPTION = 'wp_activity_tracker_option';
	/**
	 * @var WPSettings
	 */
	private WPSettings $settings;
	/**
	 * @var Roles
	 */
	private Roles $roles;

	/**
	 * Settings constructor.
	 */
	public function __construct( WPSettings $settings, Roles $roles ) {
		$this->settings = $settings;
		$this->roles    = $roles;
	}

	/**
	 * @return void
	 */
	public function register(): void {
		$tab     = $this->settings->add_tab( __( 'General settings', 'wp-activity-tracker' ) );
		$section = $tab->add_section( __( 'Roles', 'wp-activity-tracker' ) );
		$section->add_option(
			'select-multiple',
			[
				'name'    => 'user_roles',
				'label'   => __( 'Select user roles', 'wp-activity-tracker' ),
				'options' => $this->roles->get_roles(),
			]
		);
		$this->settings->make();
	}

	/**
	 * @return mixed
	 */
	public function get_excluded_roles() {
		return $this->settings->get_options()['user_roles'] ?? [];
	}
}
