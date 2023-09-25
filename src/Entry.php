<?php

namespace Zhyian\ActivityTracker;

final class Entry {

	/**
	 * @var int
	 */
	private $user_id;
	/**
	 * @var string
	 */
	private $user_name;
	/**
	 * @var string
	 */
	private $user_role;
	/**
	 * @var string
	 */
	private $type;
	/**
	 * @var int
	 */
	private $object_id;
	/**
	 * @var string
	 */
	private $action;

	/**
	 * @param array $data
	 */
	public function __construct( array $data ) {
		if ( isset( $data['user_id'] ) ) {
			$this->user_id = (int) $data['user_id'];
		}

		if ( isset( $data['user_name'] ) ) {
			$this->user_name = $data['user_name'];
		}

		if ( isset( $data['user_role'] ) ) {
			$this->user_role = $data['user_role'];
		}

		if ( isset( $data['type'] ) ) {
			$this->type = $data['type'];
		}

		if ( isset( $data['object_id'] ) ) {
			$this->object_id = (int) $data['object_id'];
		}

		if ( isset( $data['action'] ) ) {
			$this->action = $data['action'];
		}
	}

	/**
	 * @return int
	 */
	public function get_user_id() : int {
		return $this->user_id;
	}

	/**
	 * @return string
	 */
	public function get_user_name() : string {
		return $this->user_name;
	}

	/**
	 * @return string
	 */
	public function get_user_role() : string {
		return $this->user_role;
	}

	/**
	 * @return string
	 */
	public function get_type() : string {
		return $this->type;
	}

	/**
	 * @return int
	 */
	public function get_object_id() : int {
		return $this->object_id;
	}

	/**
	 * @return string
	 */
	public function get_action() : string {
		return $this->action;
	}
}
