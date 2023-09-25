<?php

namespace Zhyian\ActivityTracker\Actions;

class CommentDeleted extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'delete_comment';
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function get_action_data( array $data ): array {
		[ $id ] = $data;

		return [
			'type'      => 'comment',
			'object_id' => $id,
			'action'    => __( 'Comment deleted', 'wp-activity-tracker' ),
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
