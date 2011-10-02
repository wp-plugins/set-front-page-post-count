=== Set Front Page Post Count ===
Contributors: kawauso
Donate link: http://adamharley.co.uk/buy-me-a-coffee/
Tags: front page, posts, pre_get_posts
Requires at least: 3.0
Tested up to: 3.3
Stable tag: 0.1.1

Allows the front page to have a different number of posts than other pages.

== Description ==

Adds a setting under Settings -> Reading to allow the front page post count to be controlled independently of the main post count and adjusts paging to accomodate for this.

Uses the `pre_get_posts` hook and checks for the `$wp_the_query` query being passed, so won't work with `query_posts()`.

== Installation ==

1. Upload `set-front-page-post-count.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Set the front page post count in the 'Reading' section of the 'Settings' menu

== Frequently Asked Questions ==

= Where do I set the number of posts to be displayed? =
The plugin adds a "Front page shows at most" field to the Readings settings page in the Dashboard.

= Why doesn't it work with my theme? =
Due to the way that the WordPress query system is structured, the plugin may not work with usage of `query_posts()` and additional `WP_Query()` instances.

== Changelog ==

= 0.1.1 =
* Adds missing default for when no front page count is set
* Avoids applying query filter in admin

= 0.1 =
* First public release

== Upgrade Notice ==

= 0.1.1 =
Missing default value added. Query filter no longer applied in admin.