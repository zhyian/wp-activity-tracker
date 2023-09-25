<?php

namespace Zhyian\ActivityTracker\Storages;

use Zhyian\ActivityTracker\Entry;

interface StorageInterface {

	/**
	 * @param \Zhyian\ActivityTracker\Entry $entry
	 *
	 * @return int
	 */
	public function save_entry( Entry $entry ): int;

	/**
	 * @return array
	 */
	public function get_entries(): array;
}
