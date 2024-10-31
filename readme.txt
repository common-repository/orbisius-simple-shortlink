=== Orbisius Simple Shortlink ===
Contributors: lordspace,orbisius
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7APYDVPBCSY9A
Tags: wp,orbisius,redirec,shortlink,short link,shortener,short,link,links,short links,bitly,bit.ly
Requires at least: 3.0
Tested up to: 4.8
Stable tag: 1.0.4
License: GPLv2 or later

Allows you to redirect to page, post or any other custom post type.

== Description ==

With this plugin you can include nice short links to your posts, pages or other custom post types etc that you can include in videos or other articles.
Example: site.com/goto/123 where 123 is the ID of the post, page.

You can construct the short links using other ways.
* site.com/goto/123
* site.com/page/123
* site.com/link/123
* site.com/post/123
* site.com/id2post/123
* site.com/id2page/123
* site.com/id2page/123?utm_source=youtube&utm_medium=video

If you want to redirect to posts/pages using example.com/123 (and running apache server) add this line to your .htaccess file.

RewriteRule ^/?([0-9]+)/?$ /link/$1 [QSA,L,R=302]

It will redirect and pass query parameters (if any).

We specifically didn't include 'go' because lots of people are using it for affiliate links already.

= Support =
> Support is handled on our site: <a href="http://orbisius.com/support/" target="_blank" title="[new window]">http://orbisius.com/support/</a>
> Please do NOT use other places to seek support.

== Demo ==
TODO

Bugs? Suggestions? If you want a faster response contact us through our website's contact form [ orbisius.com ] and not through the support tab of this plugin or WordPress forums.
We don't get notified when such requests get posted in the forums.

> Support is handled on our site: <a href="http://orbisius.com/forums/" target="_blank" title="[new window]">http://orbisius.com/forums/</a>
> Please do NOT use the WordPress forums or other places to seek support.

= Author =

Svetoslav Marinov (Slavi) | <a href="http://orbisius.com" title="Custom Web Programming, Web Design, e-commerce, e-store, WordPress Plugin Development, Facebook and Mobile App Development in Niagara Falls, St. Catharines, Ontario, Canada" target="_blank">Custom Web and Mobile Programming by Orbisius.com</a>

== Upgrade Notice ==
n/a

== Screenshots ==
1. Plugin's Settings Page - todo

== Installation ==

1. Unzip the package, and upload `orbisius-simple-shortlink` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

OR just upload it from Plugins > Add > Upload

== Frequently Asked Questions ==

= How to use this plugin? =
Just install the plugin and activate it. The feedback text appear in the public area

== Changelog ==

= 1.0.5 =
* Changed the plugin's url.

= 1.0.4 =
* added settings page.
* Updated readme to include some cool stuff.
* Tested with latest WP version 4.8
* Drank Peppermint tea with ginger.

= 1.0.3 =
* Removed the restriction of having the redirect to have to happen first thing after the domain. 
Cases such as multisite in a subfolder can have site.com/sub-site/goto/123
* Tested with WP 4.6

= 1.0.2 =
* Transferring GET params (if any) to the full link in case the cool admin wants to pass UTM tracking params.

= 1.0.1 =
* Updated descriptions and links to product page.

= 1.0.0 =
* Initial release

