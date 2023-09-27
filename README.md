# Activity Tracker

### Description

Activity Tracker Plugin: Seamlessly record and log user actions such as creating, editing, or deleting posts, managing attachments, login/logout events, plugin activation/deactivation, and more.

### Requirements

- PHP 7.4+
- WordPress 6.3+ (you can try with older versions, but it's not tested)

### Features

Here is a summary of the changes that the plugin can keep a record of:

1. Post, Page, and Custom Post Type Changes
2. Tags and Categories Changes
3. Users Changes
4. User Profile Changes
5. User Activity
6. Plugins and Themes Changes

### Install

- Preferable way is to use [Composer](https://getcomposer.org/):

    ````
    composer require zhyian/wp-activity-tracker
    ````

    By default, it will be installed as [Must Use Plugin](https://codex.wordpress.org/Must_Use_Plugins).
    But it's possible to control with `extra.installer-paths` in `composer.json`.

- Alternate way is to clone this repo to `wp-content/mu-plugins/` or `wp-content/plugins/`:

    ````
    cd wp-content/plugins/
    git clone git@github.com:zhyian/wp-activity-tracker.git
    cd zhyian/wp-activity-tracker/
    composer install
    ````

If plugin was installed as regular plugin then activate **Activity Tracker** from Plugins page 
or [WP-CLI](https://make.wordpress.org/cli/handbook/): `wp plugin activate wp-activity-tracker`.

### Usage

Activate the plugin and configure it in the settings by specifying the user roles you wish to monitor.
