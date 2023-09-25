<?php

namespace Zhyian\ActivityTracker\Actions;

class PostUpdated extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'post_updated';
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
		[ $id, $updated_post, $original_post ] = $data;

		if ( $original_post->post_status === 'draft' && $updated_post->post_status === 'publish' ) {
			$message = __( 'Published', 'wp-activity-tracker' );
		} elseif ( $original_post->post_status === 'auto-draft' && $updated_post->post_status === 'draft' ) {
			$message = __( 'Created draft', 'wp-activity-tracker' );
		} elseif ( $updated_post->post_status === 'trash' ) {
			$message = __( 'Trashed', 'wp-activity-tracker' );
		} elseif ( $original_post->post_status === 'trash' ) {
			$message = __( 'Restored', 'wp-activity-tracker' );
		} elseif ( $original_post->post_status === 'publish' && $updated_post->post_status !== 'draft' ) {
			$message = __( 'Updated', 'wp-activity-tracker' );
		} elseif ( $updated_post->post_status === 'publish' && $original_post->post_status !== 'draft' ) {
			$message = __( 'Created', 'wp-activity-tracker' );
		} elseif ( $updated_post->post_status !== 'publish' && $original_post->post_status === 'draft' ) {
			$message = __( 'Drafted', 'wp-activity-tracker' );
		} else {
			$message = __( 'Updated', 'wp-activity-tracker' );
		}

		return [
			'type'      => 'post',
			'object_id' => $id,
			'action'    => __( 'Post updated', 'wp-activity-tracker' ) . '. ' . $message,
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
