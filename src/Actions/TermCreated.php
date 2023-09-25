<?php

namespace Zhyian\ActivityTracker\Actions;

class TermCreated extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'created_term';
	}

	/**
	 * @return int
	 */
	public function get_accepted_args(): int {
		return 3;
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function get_action_data( array $data ): array {
		[ $term_id, $tt_id, $taxonomy ] = $data;

		return [
			'type'      => $taxonomy,
			'object_id' => $term_id,
			'action'    => __( 'Term added', 'wp-activity-tracker' ),
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
