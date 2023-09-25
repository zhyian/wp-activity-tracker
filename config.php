<?php

use Jeffreyvr\WPSettings\WPSettings;
use Zhyian\ActivityTracker;

return [
	'wp.activity_tracker.path'               => plugin_dir_path( __FILE__ ),
	'wp.activity_tracker.admin_page'         => 'wp_activity_tracker',
	'wp.activity_tracker.db_name'            => 'wp_activity_tracker',
	WPSettings::class                        => DI\autowire()
		->constructor( __( 'WP Activity Tracker', 'wp-activity-tracker' ) ),
	ActivityTracker\ActionsRepository::class => DI\autowire()
		->constructor(
			[
				DI\get( ActivityTracker\Actions\AttachmentAdded::class ),
				DI\get( ActivityTracker\Actions\AttachmentDeleted::class ),
				DI\get( ActivityTracker\Actions\AttachmentEdited::class ),
				DI\get( ActivityTracker\Actions\CommentDeleted::class ),
				DI\get( ActivityTracker\Actions\CommentEdited::class ),
				DI\get( ActivityTracker\Actions\CommentInserted::class ),
				DI\get( ActivityTracker\Actions\CommentSpam::class ),
				DI\get( ActivityTracker\Actions\CommentUnSpam::class ),
				DI\get( ActivityTracker\Actions\CommentTrashed::class ),
				DI\get( ActivityTracker\Actions\PluginActivated::class ),
				DI\get( ActivityTracker\Actions\PluginDeactivated::class ),
				DI\get( ActivityTracker\Actions\PluginDeleted::class ),
				DI\get( ActivityTracker\Actions\PostDeleted::class ),
				DI\get( ActivityTracker\Actions\PostUpdated::class ),
				DI\get( ActivityTracker\Actions\TermCreated::class ),
				DI\get( ActivityTracker\Actions\TermDeleted::class ),
				DI\get( ActivityTracker\Actions\TermEdited::class ),
			]
		),
	ActivityTracker\Storages\Db::class       => DI\autowire()
		->constructorParameter( 'table', DI\get( 'wp.activity_tracker.db_name' ) ),
	ActivityTracker\Plugin::class            => DI\autowire()
		->constructorParameter( 'storage', DI\get( ActivityTracker\Storages\Db::class ) )
		->constructorParameter( 'admin_page', DI\get( 'wp.activity_tracker.admin_page' ) ),
];
