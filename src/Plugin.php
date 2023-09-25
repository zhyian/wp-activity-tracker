<?php

namespace Zhyian\ActivityTracker;

use Zhyian\ActivityTracker\Storages\DatabaseInterface;
use Zhyian\ActivityTracker\Storages\StorageInterface;

final class Plugin {

	/**
	 * @var string $admin_page
	 */
	public string $admin_page;
	/**
	 * @var ActionsRepository $actions_repository
	 */
	private ActionsRepository $actions_repository;
	/**
	 * @var \Zhyian\ActivityTracker\Storages\StorageInterface $storage
	 */
	private StorageInterface $storage;
	/**
	 * @var Settings $settings
	 */
	private Settings $settings;

	/**
	 * Plugin constructor.
	 *
	 * @param ActionsRepository                                 $actions_repository
	 * @param \Zhyian\ActivityTracker\Settings                  $settings
	 * @param \Zhyian\ActivityTracker\Storages\StorageInterface $storage
	 * @param string                                            $admin_page
	 */
	public function __construct(
		ActionsRepository $actions_repository,
		Settings $settings,
		StorageInterface $storage,
		string $admin_page
	) {
		$this->actions_repository = $actions_repository;
		$this->storage            = $storage;
		$this->admin_page         = $admin_page;
		$this->settings           = $settings;
	}

	/**
	 * @return void
	 */
	public function run(): void {
		$this->settings->register();

		if ( $this->storage instanceof DatabaseInterface ) {
			$this->storage->init();
		}

		foreach ( $this->actions_repository->actions() as $action ) {
			foreach ( $action as $hook => $action_data ) {
				[ $callback, $priority, $accepted_args ] = $action_data;
				add_action(
					$hook,
					function ( ...$data ) use ( $callback ) {
						$result = call_user_func( $callback, $data, $this->settings->get_excluded_roles() );

						if ( ! is_null( $result ) ) {
							$this->storage->save_entry( $result );
						}
					},
					$priority,
					$accepted_args
				);
			}
		}
	}

	/**
	 * @return void
	 */
	public function activate(): void {
		// Nothing to do here yet.
	}

	/**
	 * @return void
	 */
	public function deactivate(): void {
		// Nothing to do here yet.
	}
}
