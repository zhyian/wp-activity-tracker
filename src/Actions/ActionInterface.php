<?php

namespace Zhyian\ActivityTracker\Actions;

use Zhyian\ActivityTracker\Entry;

interface ActionInterface {

	/**
	 * @return string
	 */
	public function action(): string;

	/**
	 * @return int
	 */
	public function get_priority(): int;

	/**
	 * @return int
	 */
	public function get_accepted_args(): int;

	/**
	 * @param array $data
	 * @param array $excluded_roles
	 *
	 * @return \Zhyian\ActivityTracker\Entry|null
	 */
	public function create_entry( array $data, array $excluded_roles ): ?Entry;
}
