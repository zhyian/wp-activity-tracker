<?php

namespace Zhyian\ActivityTracker\Actions;

class PostDeleted extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'deleted_post';
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function get_action_data( array $data ): array {
		[ $id ] = $data;

		return [
			'type'      => 'post',
			'object_id' => $id,
			'action'    => __( 'Post deleted', 'wp-activity-tracker' ),
		];
	}

	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	public function pass_action_checks( array $data ): bool {
		return ! wp_is_post_revision( array_pop( $data ) );
	}
}
