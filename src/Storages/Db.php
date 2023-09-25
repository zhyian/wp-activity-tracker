<?php

namespace Zhyian\ActivityTracker\Storages;

use Zhyian\ActivityTracker\Entry;
use Zhyian\ActivityTracker\Version;

final class Db implements DatabaseInterface, StorageInterface {

	const VERSION = '1.0.0';

	/**
	 * @var string
	 */
	private $table;
	/**
	 * @var Version
	 */
	private $version;

	/**
	 * Plugin constructor.
	 */
	public function __construct( Version $version, string $table ) {
		$this->version = $version;
		$this->table   = $table;
	}

	/**
	 * @return string
	 */
	public function get_table(): string {
		return $this->table;
	}

	/**
	 * @return Version
	 */
	public function get_version(): Version {
		return $this->version;
	}

	/**
	 * @return void
	 */
	public function init(): void {
		$table   = $this->get_table();
		$version = $this->get_version();
		$version->set_option( "{$table}_db_version" );

		if ( null === $version() ) {
			$this->create_table();
		}
	}

	/**
	 * @return void
	 */
	private function create_table(): void {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();
		$query           = "CREATE TABLE $wpdb->prefix{$this->get_table()} (
            event_id bigint(20) unsigned NOT NULL auto_increment,
            event_date datetime NOT NULL default '0000-00-00 00:00:00',
            user_id bigint(20) NOT NULL default 0,
            user_name varchar(40) NOT NULL default '',
            user_role varchar(40) NOT NULL default '',
            object_id bigint(20) NOT NULL default 0,
            type varchar(25) NOT NULL default '',
            action varchar(40) NOT NULL default '',
            PRIMARY KEY (event_id)
        ) $charset_collate;\n";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		dbDelta( $query );
		$this->get_version()->update( self::VERSION );
	}

	/**
	 * @param \Zhyian\ActivityTracker\Entry $entry
	 *
	 * @return int
	 */
	public function save_entry( Entry $entry ): int {
		global $wpdb;

		$now = current_time( 'mysql' );
		$wpdb->insert(
			$wpdb->prefix . $this->get_table(),
			[
				'event_date' => $now,
				'user_id'    => $entry->get_user_id(),
				'user_name'  => $entry->get_user_name(),
				'user_role'  => $entry->get_user_role(),
				'object_id'  => $entry->get_object_id(),
				'type'       => $entry->get_type(),
				'action'     => $entry->get_action(),
			],
			[ '%s', '%d', '%s', '%s', '%d', '%s', '%s' ]
		);

		return $wpdb->insert_id;
	}

	/**
	 * @return array
	 */
	public function get_entries(): array {
		global $wpdb;

		return $wpdb->get_results(
			$wpdb->prepare(
				'SELECT * FROM %s',
				$wpdb->prefix . $this->get_table()
			),
			ARRAY_A
		);
	}

	/**
	 * @return void
	 */
	public function drop_table(): void {
		global $wpdb;

		$wpdb->query(
			$wpdb->prepare(
				'DROP TABLE IF EXISTS %s',
				$wpdb->prefix . $this->get_table()
			)
		);
		$this->get_version()->delete();
	}
}
