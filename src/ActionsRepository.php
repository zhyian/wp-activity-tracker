<?php

namespace Zhyian\ActivityTracker;

use Zhyian\ActivityTracker\Actions\ActionInterface;

final class ActionsRepository {

	/**
	 * Original actions.
	 *
	 * @var ActionInterface[] $actions
	 */
	private array $actions;

	/**
	 * FormsRepository constructor.
	 *
	 * @param ActionInterface[] $actions
	 */
	public function __construct( array $actions ) {
		$this->actions = $actions;
	}

	/**
	 * @return array
	 */
	public function actions(): array {
		return array_map(
			fn ( ActionInterface $action ) => [
				$action->action() => [
					[ $action, 'create_entry' ],
					$action->get_priority(),
					$action->get_accepted_args(),
				],
			],
			$this->actions
		);
	}
}
