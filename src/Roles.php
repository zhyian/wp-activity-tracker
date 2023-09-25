<?php

namespace Zhyian\ActivityTracker;

final class Roles {

	/**
	 * @var string[]
	 */
	private array $roles;

	/**
	 * Roles constructor.
	 */
	public function __construct() {
		$this->roles = wp_list_pluck( wp_roles()->roles, 'name' );
	}

	/**
	 * @return string[]
	 */
	public function get_roles(): array {
		return $this->roles;
	}
}
