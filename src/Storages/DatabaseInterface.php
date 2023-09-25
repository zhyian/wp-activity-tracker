<?php

namespace Zhyian\ActivityTracker\Storages;

interface DatabaseInterface {

	/**
	 * @return string
	 */
	public function get_table(): string;

	/**
	 * @return void
	 */
	public function init(): void;

	/**
	 * @return void
	 */
	public function drop_table(): void;
}
