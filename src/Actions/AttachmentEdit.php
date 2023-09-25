<?php

namespace Zhyian\ActivityTracker\Actions;

class AttachmentEdit extends AbstractAction {

	/**
	 * @return string
	 */
	public function action(): string {
		return 'edit_attachment';
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function get_action_data( array $data ): array {
		[ $id ] = $data;

		return [
			'type'      => 'attachment',
			'object_id' => $id,
			'action'    => __( 'Attachment updated', 'wp-activity-tracker' ),
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
