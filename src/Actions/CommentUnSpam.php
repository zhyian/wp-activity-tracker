<?php

namespace Zhyian\ActivityTracker\Actions;

class CommentUnSpam extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'unspam_comment';
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
			'action'    => __( 'Comment is unmarked as Spam', 'wp-activity-tracker' ),
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
