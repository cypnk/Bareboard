<?php declare( strict_types = 1 );



// EXPERIMENTAL WORK IN PROGRESS - Most things are broken





/**
 *  
 *  Bareboard: Simple Discussions
 *  This is a single script with a small number of supporting files
 *  
 *  Installation: 
 *  
 *  - Edit this file's required base settings.
 *  - Upload this file to your web root or script root location.
 *  - Upload the /cache folder and files and give it write permissions.
 *  	On *nix: chmod -R 0755 cache
 *  - Upload .htacces to the web root if using the Apache web server.
 *  	For other webservers, use examples in the readme.
 *  
 *  
 *  Optional steps:
 *  
 *  - Create a config.json file in /cache and set any custom settings in 
 *  	JSON format. This will help preserve settings between updates.
 *  - Upload or create the /plugins folder and install any plugins.
 *  - Upload or create the /errors folder and add any custom error files.
 */

/**
 *  The following settings can also be set in config.json
 */

// Site title
define( 'PAGE_TITLE',	'Bareboard' );

// Site subtitle/tagline
define( 'PAGE_SUB',	'Simple Discussions' );

// Whitelisted plugins as comma separated list
define( 'PLUGINS_ENABLED', '' );

/**
 *  Important:
 *
 *  Whitelist of allowed sites and primary paths.
 *  Add "localhost" if testing locally.
 *  'is_maintenance' lets Bareboard send an "under construction" placeholder.
 *  'settings' Are for any plugins/helpers.
 **/
define( 'SITES_ENABLED',	<<<JSON
{
	"example.com" : []
}
JSON
);


/**
 *  These required base settings need to be set here in index.php
 */

/**
 *  Relative path based on current file location
 */
define( 'PATH',		\realpath( \dirname( __FILE__ ) ) . '/' );
// Use this instead if you keep scripts outside the web root
// define( 'PATH',	\realpath( \dirname( __FILE__, 2 ) ) . '/htdocs/' );

// Cache directory. Must be writable (On *nix: chmod -R 0755 cache)
define( 'CACHE',	PATH . 'cache/' );
// Use this instead if you keep the cache outside the web root
// define( 'CACHE',	\realpath( \dirname( __FILE__, 2 ) ) . '/cache/' );

// Custom error file folder (optional)
define( 'ERROR_ROOT',	PATH . 'errors/' );
// Use this if error files are outside web root
// define( 'ERROR_ROOT',	\realpath( \dirname( __FILE__, 2 ) ) . '/errors/' );

// Plugins directory
define( 'PLUGINS',	PATH . 'plugins/' );
// Use this if you keep plugins outside the web root
// define( 'PLUGINS',		\realpath( \dirname( __FILE__, 2 ) ) . '/plugins/' );

// Writable directory for static content pages
define( 'PAGES',	CACHE . 'pages/' );

// Writable directory inside cache for plugin data (not directly browsable by visitors)
define( 'PLUGIN_DATA',	CACHE . 'plugins/' );

// Writable directory to hold user-uploaded files
define( 'UPLOADS',	CACHE . 'uploads/' );

// Display theme and template directory for overriding appearances
define( 'THEMES',	CACHE . 'themes/' );

/**
 *  These file names should be left as-is unless there's a good reason 
 *  to change them
 */

// Configuration filename (optional, overrides most constants)
define( 'CONFIG',	'config.json' );

// Error log filename (will be created if it doesn't exist)
define( 'ERROR',	'errors.log' );

// Visitor error log (will be created if if doesn't exist)
define( 'ERROR_VISIT',	'visitor_errors.log' );

// Special notices and other messages that aren't errors but should be recorded
define( 'NOTICE',	'notices.log' );


/**
 *  Database constants
 */

// General database location placeholder
define( 'DATA',			'' );

// Forum database
define( 'FORUM_DATA',		CACHE . 'forum.db' );

// Cache database (will be created if it doesn't exist)
define( 'CACHE_DATA',		CACHE . 'cache.db' );

// Session database (will be created if it doesn't exist)
define( 'SESSION_DATA',		CACHE . 'session.db' );



/**
 *  The following settings can be set in config.json in the CACHE location
 */

/**
 *  Form settings
 */

// Form submission delay in seconds
define( 'FORM_DELAY',		30 );

// Form submission expiration (2 hours)
define( 'FORM_EXPIRE',		7200 );

// Login attempts before introducing a delay
define( 'LOGIN_ATTEMPTS',	3 );

// Introduce login delay (5 minutes) after x attempts
define( 'LOGIN_DELAY',		300 );

// Enable new user registration
define( 'ENABLE_REGISTER',	1 );

// Automatically approve newly registered users
define( 'AUTO_APPROVE_REG',	1 );

// Allow users to upload files
define( 'ALLOW_UPLOAD',		0 );

// Allow unregistered users to post anonymously
define( 'ALLOW_ANON_POST',	1 );

// Allow unregistered users to edit their own posts
define( 'ALLOW_ANON_EDIT',	1 );

// Minimum password length for users
define( 'PASS_MIN',	7 );

// Minimum username length
define( 'NAME_MIN',	3 );

// Maximum username length
define( 'NAME_MAX',	80 );

// Minimum dsplay title name length
define( 'DISPLAY_MIN',	3 );

// Maximum display title length
define( 'DISPLAY_MAX',	80 );

// Minimum title length
define( 'TITLE_MIN',	3 );

// Maximum title length
// This should be under what your style template can handle
define( 'TITLE_MAX',	255 );

// Number of topics per forum page
define( 'TOPIC_LIMIT',	60 );

// Number of posts per topic page
define( 'POST_LIMIT',	25 );

// Number of search results per page
define( 'SEARCH_LIMIT', 40 );

// Relative path of assets (JS, CSS etc... ) within the folders of each plugin
define( 'PLUGIN_ASSETS',	'assets/' );

// Cached index timeout
define( 'CACHE_TTL',	3200 );

// Default path parameters if any sites in the enabled whitelist didn't have any
define( 'DEFAULT_BASEPATH',	<<<JSON
{
	"basepath"		: "\/",
	"is_maintenance"	: 0,
	"settings"		: []
}
JSON
);

// Default individual forum settings
define( 'FORUM_SETTINGS',	<<<JSON
{
	"post_level"		: 0,
	"edit_level"		: 0,
	"mod_level"		: 70,
	"anon_view"		: 1,
	"anon_post"		: 1,
	"anon_edit"		: 1,
	"locked_user_view"	: 1,
	"unapproved_user_view"	: 1,
	"allow_upload"		: 1
}
JSON
);

// Whitelist of recipient addresses that Bareboard can email (one per line)
define( 'MAIL_WHITELIST',	<<<LINES

LINES
);

// Sender email used by Bareboard (from: address)
define( 'MAIL_FROM',		'domain@localhost' );

// Make this 1 (meaning true) if testing locally or running on Tor
define( 'SKIP_LOCAL', 	1 );

// Maximum page index
define( 'MAX_PAGE',	500 );

// Maximum URL length (making this too small may affect searching)
define( 'MAX_URL_SIZE',	512 );

// Default language which sets the translation file being used
define( 'LANGUAGE',	'en-US' );

// Friendly date format
define( 'DATE_NICE',	'l, F j, Y' );
// Note: Date format can also be overridden in [lang].config
// E.G. In en-US.config, "date_nice": "l, F j, Y"

// Default local timezone when not set in config.json
define( 'TIMEZONE',		'America/New_York' );
// For a list of valid values for this, see:
// https://www.php.net/manual/en/timezones.php

// Currently used display theme
define( 'THEME',		'default' );


// Allowed extensions
define( 'EXT_WHITELIST',	<<<JSON
{
	"text"		: "css, js, txt, html, vtt",
	"images"	: "ico, jpg, jpeg, gif, bmp, png, tif, tiff, svg, webp", 
	"fonts"		: "ttf, otf, woff, woff2",
	"audio"		: "ogg, oga, mpa, mp3, m4a, wav, wma, flac",
	"video"		: "avi, mp4, mkv, mov, ogg, ogv",
	"documents"	: "doc, docx, ppt, pptx, pdf, epub",
	"archives"	: "zip, rar, gz, tar"
}
JSON
);

// Show sibling (next/previous published) posts
define( 'SHOW_SIBLINGS',	1 );

// Show related posts based on content in currently viewing post
define( 'SHOW_RELATED',		1 );

// Maximum number of related posts to show
define( 'RELATED_LIMIT',	5 );

// Send actual Last-Modified header for files 
define( 'SHOW_MODIFIED',	0 );

// Form nonce size
define( 'TOKEN_BYTES', 		8 );

// Form token nonce hash
define( 'NONCE_HASH',		'tiger160,4' );

// Maximum log file size before rolling over (in bytes)
define( 'MAX_LOG_SIZE',		5000000 );

// Maximum number of words allowed for searching posts
define( 'MAX_SEARCH_WORDS',	10 );

// Maximum number of stylesheets to load, if set
define( 'STYLE_LIMIT',		20 );

// Maximum mumber of script files to load
define( 'SCRIPT_LIMIT',		10 );

// Maximum mumber of meta tags to load
define( 'META_LIMIT',		15 );

// Maximum depth when searching for files (E.G. Plugin folders)
define( 'FOLDER_LIMIT',		15 );

// Streaming file chunks
define( 'STREAM_CHUNK_SIZE',	4096 );

// Maximum file size before streaming in chunks
define( 'STREAM_CHUNK_LIMIT',	50000 );

// Application name
define( 'APP_NAME',		'Bareboard' );

// Static resource relative path for JS, CSS, static images etc...
// When using '/' the default path, Bareboard will load files from UPLOADS
define( 'SHARED_ASSETS',		'/' );

// Whitelist of approved frame sources for embedding media (one per line)
define( 'FRAME_WHITELIST',	<<<LINES
https://www.youtube.com
https://player.vimeo.com
https://archive.org
https://peertube.mastodon.host
https://lbry.tv
https://odysee.com

LINES
);

// Username tripcode algorithm
define( 'TRIP_ALGO',		'tiger192,4' );

// Tripcode size
define( 'TRIP_SIZE',		10 );


/**
 *  Templates and customization
 */

// List of stylesheets to load from SHARED_ASSETS (one per line)
define( 'DEFAULT_STYLESHEETS',		<<<LINES
{shared_assets}style.css

LINES
);

// Default JavaScript files
define( 'DEFAULT_SCRIPTS',		<<<LINES

LINES
);

// Default meta tags
define( 'DEFAULT_META',			<<<JSON
{
	"meta" : [
		{ "name" : "generator", "content" : 
			"Bareboard; https:\/\/github.com\/cypnk\/Bareboard" }
	]
}
JSON
);

/**
 *  Navigation links
 */

// Main navigation links shown in headers
// Because this is JSON, remember to escape slashes '/' with '\/'
define( 'DEFAULT_MAIN_LINKS',		<<<JSON
{
	"links" : [
		{ "url" : "{home}pages/about", "text" : "{lang:nav:about}" },
		{ "url" : "{home}search", "text" : "{lang:nav:search}" },
		{ "url" : "{feedlink}", "text" : "{lang:nav:feed}" },
		{ "url" : "{home}pages/help", "text" : "{lang:nav:help}" }
	]
}
JSON
);

// Navigation shown in /about page headers
define( 'DEFAULT_ABOUT_LINKS',		<<<JSON
{
	"links" : [
		{ "url" : "{home}search", "text" : "{lang:nav:search}" },
		{ "url" : "{feedlink}", "text" : "{lang:nav:feed}" },
		{ "url" : "{home}pages/help", "text" : "{lang:nav:help}" }
	]
}
JSON
);

// Footer links in all pages
define( 'DEFAULT_FOOTER_LINKS',		<<<JSON
{
	"links" : [
		{ "url" : "{home}pages/about", "text" : "{lang:nav:about}" },
		{ "url" : "{home}search", "text" : "{lang:nav:search}" },
		{ "url" : "{feedlink}", "text" : "{lang:nav:feed}" },
		{ "url" : "{home}pages/help", "text" : "{lang:nav:help}" }
	]
}
JSON
);



/**
 *  Overridable CSS classes on HTML elements and content segments
 *  These can also be set in config.json
 */
define( 'DEFAULT_CLASSES', <<<JSON
{
	"body_classes"			: "",
	
	"heading_classes"		: "",
	"heading_wrap_classes"		: "content", 
	"heading_h_classes"		: "",
	"heading_a_classes"		: "",
	"tagline_classes"		: "",
	"items_wrap_classes"		: "content", 
	"no_posts_wrap"			: "content",
	
	"main_nav_classes"		: "main",
	"main_ul_classes"		: "", 
	
	"pagination_wrap_classes"	: "content", 
	"list_wrap_classes"		: "content", 
	
	"home_classes"			: "content",
	"home_wrap_classes"		: "",
	"about_classes"			: "content",
	"about_wrap_classes"		: "",
	
	"forum_cat_idx_wrap_classes"	: "",
	"forum_cat_idx_classes"		: "",
	"forum_cat_idx_h_classes"	: "",
	"forum_idx_wrap_classes"	: "",
	"forum_idx_classes"		: "",
	"forum_idx_heading_classes"	: "",
	"forum_idx_h_classes"		: "",
	"forum_idx_a_classes"		: "",
	"forum_idx_desc_classes"	: "",
	"forum_idx_subs_classes"	: "",
	"forum_idx_stats_classes"	: "",
	"forum_idx_stats_p_classes"	: "",
	"forum_idx_stats_t_classes"	: "",
	"forum_idx_last_classes"	: "",
	"forum_idx_stats_l_classes"	: "",
	"forum_idx_author_a_classes"	: "",
	"forum_idx_stats_l_classes"	: "",
	
	"post_index_wrap_classes"	: "content",
	"post_index_ul_wrap_classes"	: "index",
	"post_index_header_classes"	: "",
	"post_index_header_h_classes"	: "",
	"post_index_item_classes"	: "",
	
	"post_wrap_classes"		: "",
	"post_heading_classes"		: "",
	"post_heading_h_classes"	: "",
	"post_heading_a_classes"	: "",
	"post_heading_author_classes"	: "",
	"post_heading_author_a_classes"	: "",
	"post_heading_wrap_classes"	: "content",
	"post_body_wrap_classes"	: "content",
	"post_pub_classes"		: "",
	
	"post_idx_wrap_classes"		: "",
	"post_idx_heading_classes"	: "",
	"post_idx_heading_h_classes"	: "",
	"post_idx_heading_a_classes"	: "",
	"post_idx_heading_author_classes": "",
	"post_idx_heading_author_a_classes": "",
	"post_idx_heading_wrap_classes"	: "content",
	"post_idx_body_wrap_classes"	: "content",
	"post_idx_pub_classes"		: "",
	
	"footer_classes"		: "",
	"footer_wrap_classes"		: "content", 
	"footer_nav_classes"		: "",
	"footer_ul_classes"		: "",
	
	"crumb_classes"			: "",
	"crumb_wrap_classes"		: "",
	"crumb_sub_classes"		: "",
	"crumb_sub_wrap_classes"	: "",
	
	"crumb_item_classes"		: "",
	"crumb_link_classes"		: "",
	"crumb_current_classes"		: "",
	"crumb_current_item"		: "",
	"pagination_classes"		: "",
	"pagination_ul_classes"		: "",
	
	"nav_link_classes"		: "",
	"nav_link_a_classes"		: "",
	
	"list_classes"			: "related",
	"list_h_classes"		: "",
	
	"sibling_wrap_classes"		: "content",
	"sibling_nav_classes"		: "siblings",
	"sibling_nav_ul_classes"	: "",
	
	"related_wrap_classes"		: "content",
	"related_h_classes"		: "",
	"related_nav_classes"		: "related",
	"related_ul_classes"		: "related",
	
	"nextprev_wrap_classes"		: "content", 
	"nextprev_nav_classes"		: "siblings",
	"nextprev_ul_classes"		: "",
	"nextprev_next_classes"		: "",
	"nextprev_next_a_classes"	: "",
	"nextprev_prev_classes"		: "",
	"nextprev_prev_a_classes"	: "",
	
	"nav_home_link_classes"		: "",
	"nav_home_link_a_classes"	: "",
	
	"nav_current_classes"		: "",
	"nav_current_s_classes"		: "",
	"nav_prev_classes"		: "",
	"nav_prev_a_classes"		: "",
	"nav_noprev_classes"		: "",
	"nav_noprev_s_classes"		: "",
	"nav_next_classes"		: "",
	"nav_next_a_classes"		: "",
	"nav_nonext_classes"		: "",
	"nav_nonext_s_classes"		: "",
	
	"nav_first1_classes"		: "",
	"nav_first1_a_classes"		: "",
	"nav_first2_classes"		: "",
	"nav_first2_a_classes"		: "",
	"nav_first_s_classes"		: "",
	
	"nav_last_s_classes"		: "",
	"nav_last1_classes"		: "",
	"nav_last1_a_classes"		: "",
	"nav_last2_classes"		: "",
	"nav_last2_a_classes"		: "",
	
	"code_wrap_classes"		: "",
	"code_classes"			: "",
	
	"form_classes"			: "",
	"fieldset_classes"		: "",
	"search_form_classes"		: "",
	"search_form_wrap_classes"	: "",
	"search_fieldset_classes"	: "",
	"field_wrap_classes"		: "",
	"button_wrap"			: "",
	"label_classes"			: "",
	"check_label_classes"		: "",
	"special_classes"		: "",
	"input_classes"			: "",
	"desc_classes"			: "",
	"search_input_classes"		: "",
	"search_button_classes"		: "",
	
	"forum_form_classes"		: "",
	"login_form_classes"		: "",
	"register_form_classes"		: "",
	"password_form_classes"		: "",
	"profile_form_classes"		: "",
	
	"submit_classes"		: "",
	"alt_classes"			: "",
	"warn_classes"			: "",
	"action_classes"		: ""
}
JSON
);


// Whitelist of allowed HTML tags
define( 'TAG_WHITE',	<<<JSON
{
	"p"		: [ "style", "class", "align", 
				"data-pullquote", "data-video", 
				"data-media" ],
	
	"div"		: [ "style", "class", "align" ],
	"span"		: [ "style", "class" ],
	"br"		: [ "style", "class" ],
	"hr"		: [ "style", "class" ],
	
	"h1"		: [ "style", "class" ],
	"h2"		: [ "style", "class" ],
	"h3"		: [ "style", "class" ],
	"h4"		: [ "style", "class" ],
	"h5"		: [ "style", "class" ],
	"h6"		: [ "style", "class" ],
	
	"strong"	: [ "style", "class" ],
	"em"		: [ "style", "class" ],
	"u"	 	: [ "style", "class" ],
	"strike"	: [ "style", "class" ],
	"del"		: [ "style", "class", "cite" ],
	
	"ol"		: [ "style", "class" ],
	"ul"		: [ "style", "class" ],
	"li"		: [ "style", "class" ],
	
	"code"		: [ "style", "class" ],
	"pre"		: [ "style", "class" ],
	
	"sup"		: [ "style", "class" ],
	"sub"		: [ "style", "class" ],
	
	"a"		: [ "style", "class", "rel", 
				"title", "href" ],
	"img"		: [ "style", "class", "src", "height", "width", 
				"alt", "longdesc", "title", "hspace", 
				"vspace", "srcset", "sizes"
				"data-srcset", "data-src", 
				"data-sizes" ],
	"figure"	: [ "style", "class" ],
	"figcaption"	: [ "style", "class" ],
	"picture"	: [ "style", "class" ],
	"table"		: [ "style", "class", "cellspacing", 
					"border-collapse", 
					"cellpadding" ],
	
	"thead"		: [ "style", "class" ],
	"tbody"		: [ "style", "class" ],
	"tfoot"		: [ "style", "class" ],
	"tr"		: [ "style", "class" ],
	"td"		: [ "style", "class", "colspan", 
				"rowspan" ],
	"th"		: [ "style", "class", "scope", 
				"colspan", "rowspan" ],
	
	"caption"	: [ "style", "class" ],
	"col"		: [ "style", "class" ],
	"colgroup"	: [ "style", "class" ],
	
	"summary"	: [ "style", "class" ],
	"details"	: [ "style", "class" ],
	
	"q"		: [ "style", "class", "cite" ],
	"cite"		: [ "style", "class" ],
	"abbr"		: [ "style", "class" ],
	"blockquote"	: [ "style", "class", "cite" ],
	"body"		: []
}
JSON
);

// Whitelist of limited form HTML tags for plugins
// It is strongly recommended that this list be kept small
define( 'FORM_WHITE',	<<<JSON
{
	"form"		: [ "id", "method", "action", "enctype", "style", "class" ], 
	"input"		: [ "id", "type", "name", "required", , "max", "min", 
				"value", "size", "maxlength", "checked", 
				"disabled", "style", "class" ],
	"label"		: [ "id", "for", "style", "class" ], 
	"textarea"	: [ "id", "name", "required", "rows", "cols",  
				"style", "class" ],
	"select"	: [ "id", "name", "required", "multiple", "size", 
				"disabled", "style", "class" ],
	"option"	: [ "id", "value", "disabled", "style", "class" ],
	"optgroup"	: [ "id", "label", "style", "class" ]
}
JSON
);

// Enable generating thumbnails for image types
define( 'THUMBNAIL_GEN',	1 );

// Image types to generate thumbnail
define( 'THUMBNAIL_TYPES',	'image/jpeg, image/png, image/gif, image/bmp' );

// Default thumbnail size
define( 'THUMBNAIL_WIDTH',	100 );

// Prefix added to thumbnail filenames
define( 'THUMBNAIL_PREFIX',	'tn_' );

// Content Security and Permissions Policy headers
define( 'SECURITY_POLICY',	<<<JSON
{
	"content-security-policy": {
		"default-src"			: "'none'",
		"img-src"			: "*",
		"base-uri"			: "'self'",
		"style-src"			: "'self'",
		"script-src"			: "'self'",
		"font-src"			: "'self'",
		"form-action"			: "'self'",
		"frame-ancestors"		: "'self'",
		"frame-src"			: "*",
		"media-src"			: "'self'",
		"connect-src"			: "'self'",
		"worker-src"			: "'self'",
		"child-src"			: "'self'",
		"require-trusted-types-for"	: "'script'"
	},
	"permissions-policy": {
		"accelerometer"			: [ "none" ],
		"camera"			: [ "none" ],
		"fullscreen"			: [ "self" ],
		"geolocation"			: [ "none" ],
		"gyroscope"			: [ "none" ],
		"interest-cohort"		: [],
		"payment"			: [ "none" ],
		"usb"				: [ "none" ],
		"microphone"			: [ "none" ],
		"magnetometer"			: [ "none" ]
	}, 
	"common-policy": [
		"X-XSS-Protection: 1; mode=block",
		"X-Content-Type-Options: nosniff",
		"X-Frame-Options: SAMEORIGIN",
		"Referrer-Policy: no-referrer, strict-origin-when-cross-origin"
	]
}
JSON
);


// Cookie defaults
define( 'COOKIE_EXP', 		86400 );
define( 'COOKIE_PATH',		'/' );
// Restrict cookies to same-site origin (I.E. No third party can snoop)
define( 'COOKIE_RESTRICT',	1 );

// Database connection timeout
define( 'DATA_TIMEOUT',		5 );

/**
 *  Session settings
 */

// Staleness check
define( 'SESSION_EXP',		300 );

// ID random bytes
define( 'SESSION_BYTES',	12 );

/**
 *  Session throttling limits
 */
// Number of rapid requests before throttling begins
define( 'SESSION_LIMIT_COUNT', 5 );

// Seconds between requests before "medium" throttling
define( 'SESSION_LIMIT_MEDIUM', 3 );

// Seconds between requests before "heavy" throttling
define( 'SESSION_LIMIT_HEAVY', 1 );



/**
 *  Render templates
 */ 
$templates			= [];

// Simple navigation link
$templates['tpl_link']		= <<<HTML
	<li class="{link_li_classes}"><a class="{link_classes}" href="{url}">{text}</a></li>
HTML;

// Sibling posts
$templates['tpl_siblings']	= '<nav class="{nav_classes}">{out}</nav>';

// Pagination
$templates['tpl_previous']	= '<a href="{url}" class="{nextprev_classes}">{lang:links:previous}</a>';
$templates['tpl_next']		= '<a href="{url}" class="{nextprev_classes}">{lang:links:next}</a>';
$templates['tpl_paginate']	= '<nav class="{paginate_classes}">{out}</nav>';

// Simple index
$templates['tpl_index']		= <<<HTML
<li class="{post_index_item_classes}"><time 
	class="{post_datetime_classes}" datetime="{date_utc}">{date_stamp}</time>
	<a class="{post_index_item_link_classes}" href="{permalink}">{title}</a></li>
HTML;

// Forum main listing wrapper
$templates['tpl_forum_index']	= <<<HTML
<ul class="{forum_cat_idx_wrap_classes}>{categories}</ul>
HTML;

// Forum category template
$templates['tpl_forum_cat_classes']	= <<<HTML
<li class="{forum_cat_idx_classes}">
	<h2 class="{forum_cat_idx_h_classes}">{category}</h2>
	<ul class="{forum_idx_wrap_classes}">{forums}</ul>
</li>
HTML;

// Forum index template
$templates['tpl_forum']		= <<<HTML
<li class="{forum_idx_classes}">
<div class="{forum_idx_heading_classes}">
<h2 class="{forum_idx_h_classes}"><a class="{forum_idx_a}" 
	href="{forum_link}">{title}</a></h4>
	<span class="{forum_idx_desc_classes}">{description}</span>
	<span class="{forum_idx_subs_classes}">{subforums}</span>
</div>
<div class="{forum_idx_stats_classes}">
<span class="{forum_idx_stats_p_classes}">{lang:forum:postcount}</span>
<span class="{forum_idx_stats_t_classes}">{lang:forum:topiccount}</span>
</div>
<div class="{forum_idx_last}_classes">{last}</div>
</li>
HTML;

// Forum last stats detail
$templates['tpl_forum_last_user']	= <<<HTML
<strong class="{forum_idx_stats_l_classes}">{lang:forum:lastby}</strong> 
	<a class="{forum_idx_author_a_classes}" href="{user_link}">{author}</a> 
	{lang:forum:lastlink} 
	{lang:forum:lastdate}
HTML;

$templates['tpl_forum_last_anon']	= <<<HTML
<strong class="{forum_idx_stats_l_classes}">{lang:forum:lastby}</strong> {author}
	{lang:forum:lastdate}
HTML;

// Basic error page
$templates['tpl_error_page']	= <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="{stylesheet}">
<title>{lang:errors:page}</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body class="{body_classes}">
<main class="{body_main_classes}">
	{body}
</main>
</body>
</html>
HTML;

// Home page specific heading
$templates['tpl_home_heading']	= <<<HTML
{before_home_heading}<header class="{heading_classes}">
<div class="{heading_wrap_classes}">
<h1 class="{heading_h_classes}">
	<a href="{home}" class="{heading_a_classes}">{page_title}</a>
</h1>
<p class="{tagline_classes}">{tagline}</p>
{home_links}
<div class="{search_form_wrap_classes}">{search_form}</div>
{heading_after}
</div>
</header>{after_home_heading}
HTML;

// Generic page heading (about, help etc...)
$templates['tpl_page_heading']	= <<<HTML
{before_page_heading}<header class="{heading_classes}">
<div class="{heading_wrap_classes}">{before_heading_h}
<h1 class="{heading_h_classes}">
	<a href="{home}" class="{heading_a_classes}">{page_title}</a>
</h1>{after_heading_h}
<p class="{tagline_classes}">{tagline}</p>
{page_links}
<div class="{search_form_wrap_classes}">{search_form}</div>
{heading_after}
</div>
</header>{after_page_heading}
HTML;


// Search form
$templates['tpl_searchform']	= <<<HTML
{before_search_form}<form action="{home}" method="get" 
	class="{search_form_classes}">
	<fieldset class="{search_fieldset_classes}">
{xsrf}
{before_search_input}<input type="search" name="find" 
	placeholder="{lang:forms:search:placeholder}" 
	class="{search_input_classes}" 
	required>{after_search_input} 
{before_search_button}
<input type="submit" class="{search_button_classes}" 
	value="{lang:forms:search:button}">{after_search_button}
	</fieldset>
</form>{after_search_form}
HTML;

// User login page
$templates['tpl_login_page']	= <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{lang:forms:login:page}</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body class="{body_classes}">
<main class="{body_main_classes}">
<form action="{action}" method="post" class="{form_classes} {login_form_classes}" id="login_form">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<p class="{field_wrap_classes}">
		{login_name_label_before}<label for="loginuser" class="{label_classes}">{lang:forms:login:name}</label>{login_name_label_after}
		{login_name_input_before}<input id="loginuser" type="text" class="{input_classes}" aria-describedby="loginuser-desc" name="username" maxlength="{name_max}" pattern="([^\s][\w\s]{{name_min},{name_max}})" required>{login_name_input_after}
		{login_name_desc_before}<small id="loginuser-desc" class="{desc_classes}">{lang:forms:login:namedesc}</small>{login_name_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{login_pass_label_before}<label for="loginpass" class="{label_classes}">{lang:forms:login:pass}</label>{login_pass_label_after}
		{login_pass_input_before}<input id="loginpass" type="password" class="{input_classes}" aria-describedby="loginpass-desc" name="password" maxlength="4096" pattern="([^\s][\w\s]{{pass_min},4096})" required>{login_pass_input_after}
		{login_pass_desc_before}<small id="loginpass-desc" class="{desc_classes}">{lang:forms:login:passdesc}</small>{login_pass_desc_after}
	</p>
	<p>{login_rem_label_before}<label class="{check_label_classes}">{login_rem_input_before}<input type="checkbox" name="rem" value="1">{login_rem_input_after} {lang:forms:login:rem}</label>{login_rem_label_after}</p>
	<p><input type="submit" class="{submit_classes}" value="{lang:forms:login:submit}"></p>
</form>
</main>
</body>
</html>
HTML;

// New user registration
$templates['tpl_register_page']	= <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{lang:forms:register:page}</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body class="{body_classes}">
<main class="{body_main_classes}">
<form action="{action}" method="post" class="{form_classes} {register_form_classes}" id="register_form">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<p class="{field_wrap_classes}">
		{register_name_label_before}<label for="registername" class="{label_classes}">{lang:forms:register:name}</span></label>{register_name_label_after}
		{register_name_input_before}<input id="registername" type="text" class="{input_classes}" aria-describedby="registername-desc" name="username" maxlength="{name_max}" pattern="([^\s][\w\s]{{name_min},{name_max}})" required>{register_name_input_after}
		{register_name_desc_before}<small id="registername-desc" class="{desc_classes}">{lang:forms:register:namedesc}</small>{register_name_desc_before}
	</p>
	<p class="{field_wrap_classes}">
		{register_pass_label_before}<label for="registerpass" class="{label_classes}">{lang:forms:register:pass}</span></label>{register_pass_label_after}
		{register_pass_input_before}<input id="registerpass" type="password" class="{input_classes}" aria-describedby="registerpass-desc" name="password" maxlength="4096" pattern="([^\s][\w\s]{{pass_min},4096})" required>{register_pass_input_after}
		{register_pass_desc_before}<small id="registerpass-desc" class="{desc_classes}">{lang:forms:register:passdesc}</small>{register_pass_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{register_passr_label_before}<label for="passrepeat" class="{label_classes}">{lang:forms:register:repeat}</span></label>{register_passr_label_after}
		{register_passr_input_before}<input id="passrepeat" type="text" class="{input_classes}" aria-describedby="passrepeat-desc" name="password2" maxlength="4096" pattern="([^\s][\w\s]{{pass_min},4096})" required>{register_passr_input_after}
		{register_passr_desc_before}<small id="passrepeat-desc" class="{desc_classes}">{lang:forms:register:repeatdesc}</small>{register_passr_desc_after}
	</p>
	<p>
		{register_terms_label_before}<label class="{check_label_classes}">{register_terms_input_before}<input type="checkbox" name="terms" value="1" required>{register_terms_input_after} {lang:forms:register:terms}</label>{register_terms_label_after} 
		{register_rem_label_before}<label class="{check_label_classes}">{register_rem_input_before}<input type="checkbox" name="rem" value="1">{register_rem_input_after} {lang:forms:register:rem}</label>{register_rem_label_after} 
		<input type="submit" class="{submit_classes}" value="{lang:forms:register:submit}"></p>
</form>
</main>
</body>
</html>
HTML;

// Changing password
$templates['tpl_password_page']	= <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{lang:forms:password:page}</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body>
<main>
<form action="{action}" method="post" class="{form_classes} {password_form_classes}" id="password_form">
	<input type="hidden" name="id" value="{id}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">
		{oldpass_label_before}<label for="oldpass" class="{label_classes}">{lang:forms:password:old}</span></label>{oldpass_label_after} 
		{oldpass_input_before}<input id="oldpass" type="password" class="{input_classes}" aria-describedby="oldpass-desc" name="password" maxlength="4096" pattern="([^\s][\w\s]{{pass_min},4096})" required>{oldpass_input_after}
		{oldpass_desc_before}<small id="oldpass-desc" class="{desc_classes}">{lang:forms:password:olddesc}</small>{oldpass_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{newpass_label_before}<label for="newpass">{lang:forms:password:new}</span></label>{newpass_label_after} 
		{newpass_input_before}<input id="newpass" type="text" class="{input_classes}" aria-describedby="newpass-desc" name="password2" maxlength="4096" pattern="([^\s][\w\s]{{pass_min},4096})" required>{newpass_input_after}
		{newpass_desc_before}<small id="newpass-desc" class="{desc_classes}">{lang:forms:password:newdesc}</small>{newpass_desc_after}
	</p>
	<p><input type="submit" class="{submit_classes}" value="{lang:forms:password:submit}"></p>
</form>
</main>
</body>
</html>
HTML;

// Current user profile editing
$templates['tpl_profile_page']	= <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{lang:forms:profile:page}</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body class="{body_classes}">
<main class="{body_main_classes}">
<form action="{action}" method="post" class="{form_classes} {profile_form_classes}" id="profile_form">
	<input type="hidden" name="id" value="{id}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">
		{profile_name_label_before}<label for="loginuser" class="{label_classes}">{lang:forms:profile:name}</label>{profile_name_label_after} 
		{profile_name_input_before}<input id="loginuser" type="text" value="{username}" class="{input_classes}" disabled>{profile_name_input_after}
	</p>
	<p class="{field_wrap_classes}">
		{display_label_before}<label for="display" class="{label_classes}">{lang:forms:profile:display}</span></label>{display_label_after} 
		{display_input_before}<input id="display" type="text" class="{input_classes}" aria-describedby="display-desc" name="display" maxlength="{display_max}" pattern="([^\s][A-z0-9À-ž\s]+){{display_min},{display_max}}" value="{display}">{display_input_after}
		{display_desc_before}<small id="display-desc" class="{desc_classes}">{lang:forms:profile:displaydesc}</small>{display_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{bio_label_before}<label for="bio" class="{label_classes}">{lang:forms:profile:bio}</span></label>{bio_label_after} 
		{bio_input_before}<textarea id="bio" name="bio" rows="3" cols="60" class="{input_classes}" aria-describedby="bio-desc">{bio}</textarea>{bio_input_after} 
		{bio_desc_before}<small id="bio-desc" class="{desc_classes}">{lang:forms:profile:biodesc}</small>{bio_desc_after}
	</p>
	<p><input type="submit" class="{submit_classes}" value="{lang:forms:profile:submit}"></p>
</form>
</main>
</body>
</html>
HTML;

// New forum edit/create page
$templates['tpl_forum_page']	= <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{lang:forms:forum:page}</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body class="{body_classes}">
<main class="{body_main_classes}">
<form action="{action}" method="post" class="{form_classes} {forum_form_classes}" id="forum_form">
	<input type="hidden" name="id" value="{id}">
	<input type="hidden" name="parent_id" value="{parent_id}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">
		{title_label_before}<label for="title" class="{label_classes}">{lang:forms:forum:title}</span></label>{title_label_after} 
		{title_input_before}<input id="title" type="text" class="{input_classes}" aria-describedby="title-desc" name="title" maxlength="255" pattern="([^\s][A-z0-9À-ž\s]+){1,255}" value="{title}" required>{title_input_after}
		{title_desc_before}<small id="title-desc" class="{desc_classes}">{lang:forms:forum:titledesc}</small>{title_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{description_label_before}<label for="description" class="{label_classes}">{lang:forms:forum:description}</span></label>{description_label_after} 
		{description_input_before}<textarea id="description" name="description" rows="3" cols="60" class="{input_classes}" aria-describedby="description-desc">{description}</textarea>{description_input_after} 
		{description_desc_before}<small id="description-desc" class="{desc_classes}">{lang:forms:forum:descriptdesc}</small>{description_desc_after}
	</p>
	<p><input type="submit" class="{submit_classes}" value="{lang:forms:forum:submit}"></p>
</form>
</main>
</body>
</html>
HTML;

// Page creation
$templates['tpl_postcreate_page'] = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{lang:forms:postpage:create}</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body>
<main>
	{form}
</main>
</body>
</html>
HTML;

// Page editing
$templates['tpl_postedit_page']	= <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{lang:forms:postpage:edit}</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body>
<main>
	{form}
</main>
</body>
</html>
HTML;




/**
 *  Comment section tabs
 */ 
$templates['tpl_usertabs']	= <<<HTML
<div class="tab">
	<input type="radio" name="tabs" id="tab0" checked />
	<label for="tab0" role="tab" aria-selected="true" 
	aria-controls="panel0" tabindex="0">
		{lang:tabs:user:replies}
	</label>
		
	<div id="tab-comments" role="tabpanel">
		{comment_form}
		{comments}
		{paginate}
	</div>
</div>
<div class="tab">
	<input type="radio" name="tabs" id="tab1" />
	<label for="tab1" role="tab" aria-selected="false" 
		aria-controls="panel1" tabindex="1">
		{lang:tabs:user:password}
	</label>
		
	<div id="tab-password" role="tabpanel">{password_form}</div>
</div>
<div class="tab">
	<input type="radio" name="tabs" id="tab2" />
	<label for="tab2" role="tab" aria-selected="false" 
	aria-controls="panel2" tabindex="2">
		{lang:tabs:user:profile}
	</label>
	
	<div id="tab-profile" role="tabpanel">{profile_form}</div>
</div>
HTML;

$templates['tpl_anontabs']	= <<<HTML
<div class="tab">
	<input type="radio" name="tabs" id="tab0" checked />
	<label for="tab0" role="tab" aria-selected="true" 
	aria-controls="panel0" tabindex="0">
		{lang:tabs:anon:replies}
	</label>
		
	<div id="tab-comments" role="tabpanel">
		{comment_form}
		{comments}
		{paginate}
	</div>
</div>
<div class="tab">
	<input type="radio" name="tabs" id="tab1" />
	<label for="tab1" role="tab" aria-selected="false" 
		aria-controls="panel1" tabindex="1">
		{lang:tabs:anon:login}
	</label>
		
	<div id="tab-login" role="tabpanel">{login_form}</div>
</div>
<div class="tab">
	<input type="radio" name="tabs" id="tab2" />
	<label for="tab2" role="tab" aria-selected="false" 
		aria-controls="panel2" tabindex="2">
		{lang:tabs:anon:register}
	</label>
		
	<div id="tab-register" role="tabpanel">{register_form}</div>
</div>
HTML;


/**
 *  Comment templates
 */

// Registered user comment
$templates['tpl_user_comment']	= <<<HTML
<article class="{post_wrap_classes}">
	<header class="{post_heading_classes}">
		<time datetime="{date_utc}" class="{post_pub_classes}">{date_nice}</time>
		<address class="{post_heading_author_classes}"><a 
			class="{post_heading_author_a_classes}" 
			href="{author_link}">{author}</a></address>
	</header>
	<section class="{post_body_wrap_classes}>{body}</section>
</article>
HTML;

// Anonymous visitor comment
$templates['tpl_anon_comment']	= <<<HTML
<article class="{post_wrap_classes}">
	<header class="{post_heading_classes}">
		<time datetime="{date_utc}" class="{post_pub_classes}">{date_nice}</time>
		<address class="{post_heading_author_classes}">{author}</address>
	</header>
	<section class="{post_body_wrap_classes}>{body}</section>
</article>
HTML;

// Moderator view of user comment
$templates['tpl_moduser_comment']	= <<<HTML
<article class="{post_wrap_classes}">
	<header class="{post_heading_classes}">
		<time datetime="{date_utc}" class="{post_pub_classes}">{date_nice}</time>
		<address class="{post_heading_author_classes}"><a 
			class="{post_heading_author_a_classes}" 
			href="{author_link}">{author}</a></address>
	</header>
	<section class="{post_body_wrap_classes}>{body}</section>
	<footer>
		<label class="{check_label_classes} func">
			<input type="checkbox" name="select[]" value="{id}"> 
			{lang:mod:usercontent:select}
		</label>
		{lang:mod:usercontent:ip}
	</footer>
</article>
HTML;


// Moderator view of anonymous comment
$templates['tpl_modanon_comment']	= <<<HTML
<article class="{post_wrap_classes}">
	<header class="{post_heading_classes}">
		<time datetime="{date_utc}" class="{post_pub_classes}">{date_nice}</time>
		<address class="{post_heading_author_classes}">{author}</address>
	</header>
	<section class="{post_body_wrap_classes}>{body}</section>
	<footer>
		<label class="{check_label_classes} func">
			<input type="checkbox" name="select[]" value="{id}"> 
			{lang:mod:usercontent:select}
		</label>
		{lang:mod:usercontent:ip}
	</footer>
</article>
HTML;


/**
 *  Content form templates
 */

// Anonymous post form
$templates['tpl_anonpost_form']	= <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="post_form">
	<input type="hidden" name="forum" value="{forum}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">
		{post_title_label_before}<label for="posttitle" class="{label_classes}">{lang:forms:anonpost:title}</label>{post_title_label_after}
		{post_title_input_before}<input id="posttitle" type="text" class="{input_classes}" aria-describedby="posttitle-desc" name="title" maxlength="{title_max}" pattern="([^\s][\w\s]{{title_min},{title_max}})">{post_title_input_after}
		{post_title_desc_before}<small id="posttitle-desc" class="{desc_classes}">{lang:forms:anonpost:titledesc}</small>{post_title_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{post_message_label_before}<label for="message" class="{label_classes}">{lang:forms:anonpost:msg}</label>{post_message_label_after}
		{post_message_input_before}<textarea id="message" name="message" rows="3" cols="60" class="{input_classes}" aria-describedby="message-desc" required>{message}</textarea>{post_message_input_before}
		{post_message_desc_before}<small id="message-desc" class="{desc_classes}">{lang:forms:anonpost:msgdesc}</small>{post_message_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{post_name_label_before}<label for="authorname" class="{label_classes}">{lang:forms:anonpost:name}</label>{anonpost_name_label_after}
		{post_name_input_before}<input id="authorname" type="text" class="{input_classes}" aria-describedby="authorname-desc" name="author" maxlength="{name_max}" pattern="([^\s][\w\s]{{name_min},{name_max}})">{post_name_input_before}
		{post_name_desc_before}<small id="authorname-desc" class="{desc_classes}">{lang:forms:anonpost:namedesc}</small>{anonpost_name_desc_before}
	</p>
	<p><label class="{check_label_classes}"><input type="checkbox" name="terms" value="1" required> Agree to the <a href="{terms}" target="_blank">site terms</a></label> 
		<input type="submit" class="{submit_classes}" value="{lang:forms:anonpost:submit}"></p>
</form>
HTML;

// Registered user post form
$templates['tpl_userpost_form']	= <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="post_form">
	<input type="hidden" name="forum" value="{forum}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">
		{post_title_label_before}<label for="posttitle" class="{label_classes}">{lang:forms:userpost:title}</label>{post_title_label_after}
		{post_title_input_before}<input id="posttitle" type="text" class="{input_classes}" aria-describedby="posttitle-desc" name="title" maxlength="{title_max}" pattern="([^\s][\w\s]{{title_min},{title_max}})">{post_title_input_after}
		{post_title_desc_before}<small id="posttitle-desc" class="{desc_classes}">{lang:forms:userpost:titledesc}</small>{post_title_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{post_message_label_before}<label for="message" class="{label_classes}">{lang:forms:userpost:msg}</label>{post_message_label_after}
		{post_message_input_before}<textarea id="message" name="message" rows="3" cols="60" class="{input_classes}" aria-describedby="message-desc" required>{message}</textarea>{post_message_input_before}
		{post_message_desc_before}<small id="message-desc" class="{desc_classes}">{lang:forms:userpost:msgdesc}</small>{post_message_desc_after}
	</p>
	<p><input type="submit" class="{submit_classes}" value="{lang:forms:userpost:submit}"></p>
</form>
HTML;


// Post edit form
$templates['tpl_editpost_form']	= <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="edit_form">
	<input type="hidden" name="id" value="{id}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">
		{edit_title_label_before}<label for="posttitle">{lang:forms:editpost:title}</label>{edit_title_label_after}
		{edit_title_input_before}<input id="posttitle" type="text" aria-describedby="posttitle-desc" name="title" maxlength="{title_max}" pattern="([^\s][\w\s]{{title_min},{title_max}})" value="{title}">{edit_title_input_after}
		{edit_title_desc_before}<small id="posttitle-desc" class="{desc_classes}">{lang:forms:editpost:titledesc}</small>{edit_title_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{edit_message_label_before}<label for="message">{lang:forms:editpost:msg}</label>{edit_message_label_after}
		{edit_message_input_before}<textarea id="message" name="message" rows="3" cols="60" aria-describedby="message-desc" required>{message}</textarea>{edit_message_input_after}
		{edit_message_desc_before}<small id="message-desc" class="{desc_classes}">{lang:forms:editpost:msgdesc}</small>{edit_message_desc_after}
	</p>
	
	<p><input type="submit" class="{submit_classes}" value="{lang:forms:editpost:submit}"></p>
</form>
HTML;

// Anon post edit form
$templates['tpl_anoneditpost_form']	= <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="edit_form">
	<input type="hidden" name="id" value="{id}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">
		{edit_title_label_before}<label for="posttitle">{lang:forms:editpost:title}</label>{anonedit_title_label_after}
		{edit_title_input_before}<input id="posttitle" type="text" aria-describedby="posttitle-desc" name="title" maxlength="{title_max}" pattern="([^\s][\w\s]{{title_min},{title_max}})" value="{title}">{edit_title_input_after}
		{edit_title_desc_before}<small id="posttitle-desc" class="{desc_classes}">{lang:forms:editpost:titledesc}</small>{edit_title_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{edit_message_label_before}<label for="message">{lang:forms:anoneditpost:msg}</label>{anonedit_message_label_after}{edit_message_label_after}
		{edit_message_input_before}<textarea id="message" name="message" rows="3" cols="60" aria-describedby="message-desc" required>{message}</textarea>{edit_message_input_after}
		{edit_message_desc_before}<small id="message-desc" class="{desc_classes}">{lang:forms:anoneditpost:msgdesc}</small>{edit_message_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{edit_name_label_before}<label for="authorname" class="{label_classes}">{lang:forms:anonedit:name}</label>{edit_name_label_after}
		{edit_name_input_before}<input id="authorname" type="text" class="{input_classes}" aria-describedby="authorname-desc" name="author" maxlength="{name_max}" pattern="([^\s][\w\s]{{name_min},{name_max}})">{edit_name_input_before}
		{edit_name_desc_before}<small id="authorname-desc" class="{desc_classes}">{lang:forms:anonedit:namedesc}</small>{edit_name_desc_before}
	</p>
	<p><input type="submit" class="{submit_classes}" value="{lang:forms:anoneditpost:submit}"></p>
</form>
HTML;

// Anon post reply form
$templates['tpl_anonreply_form'] = <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="anon_post_form">
	<input type="hidden" name="topic" value="{topic}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">
		{post_message_label_before}<label for="message" class="{label_classes}">{lang:forms:anonpost:msg}</label>{post_message_label_after}
		{post_message_input_before}<textarea id="message" name="message" rows="3" cols="60" class="{input_classes}" aria-describedby="message-desc" required>{message}</textarea>{post_message_input_after}
		{post_message_desc_before}<small id="message-desc" class="{desc_classes}">{lang:forms:anonpost:msgdesc}</small>{post_message_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{post_name_label_before}<label for="postname" class="{label_classes}">{lang:forms:anonpost:name}</label>{post_name_label_after}
		{post_name_input_before}<input id="postauthor" type="text" class="{input_classes}" aria-describedby="postauthor-desc" name="author" maxlength="{name_max}" pattern="([^\s][\w\s]{{name_min},{name_max}})">{post_name_input_after}
		{post_name_desc_before}<small id="postauthor-desc" class="{desc_classes}">{lang:forms:anonpost:namedesc}</small>{post_name_desc_after}
	</p>
	<p class="{field_wrap_classes}"><label class="{check_label_classes}"><input type="checkbox" name="terms" value="1" required> Agree to the <a href="{terms}" target="_blank">site terms</a></label> 
		<input type="submit" class="{submit_classes}" value="{lang:forms:anonpost:submit}"></p>
</form>
HTML;

// User post reply form
$templates['tpl_userreply_form'] = <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="comment_form">
	<input type="hidden" name="topic" value="{topic}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">{lang:forms:userpost:name}</p>
	<p class="{field_wrap_classes}">
		{post_message_label_before}<label for="message" class="{label_classes}">{lang:forms:userpost:msg}</label>{post_message_label_after}
		{post_message_input_before}<textarea id="message" name="message" rows="3" cols="60" class="{input_classes}" aria-describedby="message-desc" required>{message}</textarea>{post_message_input_after}
		{post_message_desc_before}<small id="message-desc" class="{desc_classes}">{lang:forms:userpost:msgdesc}</small>{post_message_desc_after}
	</p>
	<p><input type="submit" class="{submit_classes}" value="{lang:forms:userpost:submit}"></p>
</form>
HTML;

// Reply edit form
$templates['tpl_editpost_form'] = <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="edit_comment_form">
	<input type="hidden" name="id" value="{id}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">
		{editpost_message_label_before}<label for="message" class="{label_classes}">{lang:forms:editpost:msg}</label>{editpost_message_label_after}
		{editpost_message_input_before}<textarea id="message" name="message" rows="3" cols="60" class="{input_classes}" aria-describedby="message-desc" required>{message}</textarea>{editpost_message_input_after}
		{editpost_message_desc_before}<small id="message-desc" class="{desc_classes}">{lang:forms:editpost:msgdesc}</small>{editpost_message_desc_after}
	</p>
	<p><input type="submit" class="{submit_classes}" value="{lang:forms:editpost:submit}"></p>
</form>
HTML;


$templates['tpl_anoneditpost_form'] = <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="edit_comment_form">
	<input type="hidden" name="id" value="{id}">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<input type="hidden" name="meta" value="{meta}">
	<p class="{field_wrap_classes}">
		{editpost_message_label_before}<label for="message" class="{label_classes}">{lang:forms:editpost:msg}</label>{editpost_message_label_after}
		{editpost_message_input_before}<textarea id="message" name="message" rows="3" cols="60" class="{input_classes}" aria-describedby="message-desc" required>{message}</textarea>{editpost_message_input_after}
		{editpost_message_desc_before}<small id="message-desc" class="{desc_classes}">{lang:forms:editpost:msgdesc}</small>{editpost_message_desc_after}
	</p>
	<p class="{field_wrap_classes}">
		{editpost_name_label_before}<label for="postname" class="{label_classes}">{lang:forms:anonpost:name}</label>{editpost_name_label_after}
		{editpost_name_input_before}<input id="postauthor" type="text" class="{input_classes}" aria-describedby="postauthor-desc" name="author" maxlength="{name_max}" pattern="([^\s][\w\s]{{name_min},{name_max}})">{editpost_name_input_after}
		{editpost_name_desc_before}<small id="postauthor-desc" class="{desc_classes}">{lang:forms:anonpost:namedesc}</small>{editpost_name_desc_after}
	</p>
	<p><input type="submit" class="{submit_classes}" value="{lang:forms:editpost:submit}"></p>
</form>
HTML;


/**
 *  Moderation and management component templates
 */
$templates['tpl_modtabs']	= <<<HTML
<div class="tab">
	<input type="radio" name="tabs" id="tab0" checked />
	<label id="recent" for="tab0" role="tab" aria-selected="true" 
	aria-controls="panel0" tabindex="0">
		{lang:tabs:mod:recent}
	</label>
		
	<div id="tab-recent" role="tabpanel">
		<form action="{mod_action}" method="post">
		<input type="hidden" name="token" value="{token}">
		<input type="hidden" name="nonce" value="{nonce}">
		
		{recent_comments}
		{mod_select}
		{recentdur_select}
		
		</form>
		{recent_paginate}
	</div>
</div>
<div class="tab">
	<input type="radio" name="tabs" id="tab1" />
	<label id="queue" for="tab1" role="tab" aria-selected="true" 
	aria-controls="panel1" tabindex="1">
		{lang:tabs:mod:queue}
	</label>
		
	<div id="tab-queue" role="tabpanel">
		<form action="{modq_action}" method="post">
		<input type="hidden" name="token" value="{token}">
		<input type="hidden" name="nonce" value="{nonce}">
		
		{queue_comments}
		{modq_select}
		{queuedur_select}
		
		</form>
		{queue_paginate}
	</div>
</div>
<div class="tab">
	<input type="radio" name="tabs" id="tab2" />
	<label for="tab2" role="tab" aria-selected="true" 
	aria-controls="panel1" tabindex="2">
		{lang:tabs:mod:filters:label}
	</label>
		
	<div id="tab-filters" role="tabpanel">
		{ip_filters}	<!-- IPs and ranges -->
		{word_filters}	<!-- Block words or phrases -->
		{user_filters}	<!-- Usernames and logins -->
		{page_filters}	<!-- Enable / disable comments by page -->
	</div>
</div>
HTML;

$templates['tpl_modaction']	= <<<HTML
<p class="{field_wrap_classes}"><label for="{prefix}-action">{lang:tabs:mod:drop:action}</label>
	<select id="{prefix}-action" name="action">
		<option value="">--</option>
		
		<option value="pub">{lang:tabs:mod:drop:pub}</option>
		<option value="delete">{lang:tabs:mod:drop:del}</option>
		
		<option value="hold">{lang:tabs:mod:drop:hold}</option>
		<option value="delete">{lang:tabs:mod:drop:del}</option>
		
		<option value="holdsusp">{lang:tabs:mod:drop:holdsusp}</option>
		<option value="delsusp">{lang:tabs:mod:drop:delsusp}</option>
		
		<option value="holdsuspip">{lang:tabs:mod:drop:holdsuspip}</option>
		<option value="delsuspip">{lang:tabs:mod:drop:delsuspip}</option>
		
		<option value="holdsuspuip">{lang:tabs:mod:drop:holdsuspuip}</option>
		<option value="delsuspuip">{lang:tabs:mod:drop:delsuspuip}</option>
		
		<option value="holdblock"{lang:tabs:mod:drop:holdblock}</option>
		<option value="delblock">{lang:tabs:mod:drop:delblock}</option>
		
		<option value="holdblockip">{lang:tabs:mod:drop:holdblockip}</option>
		<option value="delblockip">{lang:tabs:mod:drop:delblockip}</option>
		
		<option value="holdblockuip">{lang:tabs:mod:drop:holdblockuip}</option>
		<option value="delblockuip">{lang:tabs:mod:drop:delblockuip}</option>
	</select>
</p>
HTML;

// Duration selected
$templates['tpl_modoptdur']	= <<<HTML
<option value="{value}">{value}{lang:tabs:mod:drop:dur}</option>
HTML;

// Moderation option
$templates['tpl_modopt']	= <<<HTML
<option value="{value}">{value}</option>
HTML;

// Moderation action selector
$templates['tpl_moddelsel']	= <<<HTML
<form action="{action}" method="post">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<select multiple size="6" class="selector" name="delete">
		{list_items}
	</select>
	<p><input type="submit" value="{lang:tabs:mod:delselect}"></p>
</form>
HTML;

// Moderation duration input
$templates['tpl_moddursel']	= <<<HTML
<p>
	<label for="{prefix}-duration">{lang:tabs:mod:duration}</label>
	<input id="{prefix}-duration" type="text" aria-describedby="{prefix}-duration-desc" maxlength="{name_max}" pattern="([^\s][\w\s]{{name_min},{name_max}})">
	<small id="{prefix}-duration-desc" class="{desc_classes}">{lang:tabs:mod:durdesc}</small>
</p>
HTML;

// Moderation IP input form
$templates['tpl_defaultmodip_form']	= <<<HTML
<!-- Prevent adding IP from current visitor-->
<form action="{action}" method="post" class="{form_classes}" id="modip_form">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<p class="{field_wrap_classes}">
		<label for="ip">{lang:tabs:mod:filters:iplbl}</label>
		<input id="ip" type="text" aria-describedby="ip-desc" pattern="([^\s][\w\s,\.\:/]{3,255})" required>
		<small id="ip-desc" class="{desc_classes}">{lang:tabs:mod:filters:ipdesc}</small>
	</p>
	<p class="{field_wrap_classes}">
		<label for="host">{lang:tabs:mod:filters:hostlbl}</label>
		<input id="host" type="text" aria-describedby="host-desc" pattern="([^\s][\w\s,\.\:/\-]{3,255})" required>
		<small id="host-desc" class="{desc_classes}">{lang:tabs:mod:filters:hostdesc}</small>
	</p>
	
	{duration_select}
	{filter_action}
	
	<p><input type="submit" value="{lang:tabs:mod:add}"></p>
</form>
HTML;

// Modration IP select
$templates['tpl_modip']		= <<<HTML
<div class="panel">
	<input id="panel-iprange" type="checkbox" name="panels">
	<label for="panel-iprange" role="tab">{lang:tabs:mod:filters:ip}</label>
	<div class="panel-content">
	
	{mod_form}
	{delselect_form}
	
	</div>
</div>
HTML;

// Moderate word input form
$templates['tpl_modword_form']	= <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="modword_form">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<p class="{field_wrap_classes}">
		<label for="word">{lang:tabs:mod:filters:wordlbl}</label>
		<input id="word" type="text" aria-describedby="word-desc" maxlength="255" pattern="([^\s][\w\s,]{3,255})" required>
		<small id="word-desc" class="{desc_classes}">{lang:tabs:mod:filters:worddesc}</small>
	</p>
	
	{duration_select}
	{filter_action}
	
	<p><input type="submit" value="{lang:tabs:mod:add}"></p>
</form>
HTML;

// Moderated word selection
$templates['tpl_modwords']	= <<<HTML
<div class="panel">
	<input id="panel-words" type="checkbox" name="panels">
	<label for="panel-words" role="tab">{lang:tabs:mod:filters:word}</label>
	<div class="panel-content">
	
	{mod_form}
	{delselect_form}
	
	</div>
</div>
HTML;

// Moderated user form
$templates['tpl_moduserform']	= <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="moduser_form">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<p class="{field_wrap_classes}">
		<label for="user">{lang:tabs:mod:filters:userlbl}</label>
		<input id="user" type="text" aria-describedby="user-desc" maxlength="255" pattern="([^\s][\w\s,]{3,255})" required>
		<small id="user-desc" class="{desc_classes}">{lang:tabs:mod:filters:userdesc}</small>
	</p>
	
	{duration_select}
	{filter_action}
</form>
HTML;

// Moderate user input
$templates['tpl_moduser']	= <<<HTML
<div class="panel">
	<input id="panel-usernames" type="checkbox" name="panels">
	<label for="panel-usernames" role="tab">{lang:tabs:mod:filters:user}</label>
	<div class="panel-content">
	
	{mod_form}
	{delselect_form}
	
	</div>
</div>
HTML;

// Moderate URL input
$templates['tpl_modurl_form']	= <<<HTML
<form action="{action}" method="post" class="{form_classes}" id="modurl_form">
	<input type="hidden" name="token" value="{token}">
	<input type="hidden" name="nonce" value="{nonce}">
	<p class="{field_wrap_classes}">
		<label for="url">{lang:tabs:mod:filters:urllbl}</label>
		<input id="url" type="text" aria-describedby="url-desc" maxlength="255" pattern="([^\s][\w\s]{3,255})" required>
		<small id="url-desc" class="{desc_classes}">{lang:tabs:mod:filters:urldesc}</small>
	</p>
	
	<p class="{field_wrap_classes}"><label for="url-action">{lang:tabs:mod:drop:action}</label>
		<select id="url-action" name="action">
			<option value="">--</option>
			<option value="noanon">{lang:tabs:mod:drop:noanon}</option>
			<option value="close">{lang:tabs:mod:drop:close}</option>
			<option value="hide">{lang:tabs:mod:drop:hide}</option>
		</select>
	</p>
	<p><input type="submit" value="{lang:tabs:mod:add}"></p>
</form>
HTML;

// Moderate URL selection panel
$templates['tpl_modurl']	= <<<HTML
<div class="panel">
	<input id="panel-urls" type="checkbox" name="panels">
	<label for="panel-urls" role="tab">{lang:tabs:mod:filters:url}</label>
	<div class="panel-content">
	
	{mod_form}
	{delselect_form}
	
	</div>
</div>
HTML;


// Form anti-XSRF hidden inputs (required on all forms)
$templates['tpl_input_xsrf']	= <<<HTML
{before_input_xsrf}
<input type="hidden" name="nonce" value="{nonce}">
<input type="hidden" name="token" value="{token}">
<input type="hidden" name="meta" value="{meta}">
{after_input_xsrf}
HTML;




// Embedded code
$templates['tpl_codeblock'] = <<<HTML
<pre class="{code_wrap_classes}"><code class="{code_classes}">{code}</code></pre>
HTML;

$templates['tpl_codeinline'] = <<<HTML
<code class="{code_classes}">{code}</code>
HTML;

// Feed index template
$templates['tpl_feed']		= <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
	<title>{page_title}</title>
	<link>{home}</link>
	<pubDate>{date_gen}</pubDate>
	{body}
</rss>
XML;

// Feed item template
$templates['tpl_item']		= <<<XML
<entry>
	<title>{title}</title>
	<link rel="alternate" type="text/html" href="{permalink}"/>
	<updated>{date_rfc}</updated>
	<content type="html"><![CDATA[{body}]]></content>
</entry>
XML;


/**
 *  Embeded media templates
 */

// Embedded video with preview
$templates['tpl_audio_embed']	= <<<HTML
<div class="media"><audio src="{src}" controls></audio></div>
HTML;

// Embedded video without preview
$templates['tpl_video_np_embed'] =<<<HTML
<div class="media">
	<video width="560" height="315" src="{src}" controls>{detail}</video>
</div>
HTML;

// Embedded video with preview
$templates['tpl_video_embed'] =<<<HTML
<div class="media">
	<video width="560" height="315" src="{src}" poster="{preview}" controls>{detail}</video>
</div>
HTML;

// Video caption track without language
$templates['tpl_cc_nl_embed'] =<<<HTML
<track kind="subtitles" src="{src}" {default}>
HTML;

// Video caption with language
$templates['tpl_cc_embed'] =<<<HTML
<track label="{label}" kind="subtitles" srclang="{lang}" src="{src}" {default}>
HTML;

/**
 *  Hosted media templates
 */
 
// YouTube video wrapper
$templates['tpl_youtube']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://www.youtube.com/embed/{src}" 
		allowfullscreen></iframe>
</div>
HTML;

// Vimeo video wrapper
$templates['tpl_vimeo']		= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://player.vimeo.com/video/{src}" 
		allowfullscreen></iframe>
</div>
HTML;

// Peertube video wrapper (requires 'src_host' to be added to frame_whitelist)
$templates['tpl_peertube']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://{src_host}/videos/embed/{src}" 
		allowfullscreen></iframe>
</div>
HTML;

// Internet Archive video wrapper
$templates['tpl_archiveorg']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://archive.org/embed/{src}" 
		allowfullscreen></iframe></div>
HTML;

// LBRY/Odysee video wrapper
$templates['tpl_lbry']	= <<<HTML
<div class="media">
	<iframe width="560" height="315" frameborder="0" 
		sandbox="allow-same-origin allow-scripts" 
		src="https://{src_host}/$/embed/{slug}/{src}" 
		allowfullscreen></iframe>
</div>
HTML;




/**********************************************************************
 *                      Caution editing below
 **********************************************************************/


// Meta, script, and stylesheet tag templates
define( 'TPL_META_TAG',	'<meta name="{name}" content="{content}">' );
define( 'TPL_SCRIPT_TAG', '<script src="{url}"></script>' );
define( 'TPL_STYLE_TAG', '<link rel="stylesheet" href="{url}">' );

/**
 *  URL validation regular expressions
 */
define(
	'RX_URL', 
	'~^(http|ftp)(s)?\:\/\/((([\pL\pN\-]{1,25})(\.)?){2,9})($|\/.*$){4,255}$~i'
);
define( 'RX_XSS2',		'/(<(s(?:cript|tyle)).*?)/ism' );
define( 'RX_XSS3',		'/(document\.|window\.|eval\(|\(\))/ism' );
define( 'RX_XSS4',		'/(\\~\/|\.\.|\\\\|\-\-)/sm' );


// URL routing placeholders
define( 'ROUTE_MARK',	<<<JSON
{
	"*"	: "(?<all>.+)",
	":id"	: "(?<id>[1-9][0-9]*)",
	":ids"	: "(?<ids>[1-9][0-9,]*)",
	":page"	: "(?<page>[1-9][0-9]*)",
	":label": "(?<label>[\\\\pL\\\\pN\\\\s_\\\\-]{1,30})",
	":nonce": "(?<nonce>[a-z0-9]{10,30})",
	":token": "(?<token>[a-z0-9\\\\+\\\\=\\\\-\\\\%]{10,255})",
	":meta"	: "(?<meta>[a-z0-9\\\\+\\\\=\\\\-\\\\%]{7,255})",
	":tag"	: "(?<tag>[\\\\pL\\\\pN\\\\s_\\\\,\\\\-]{1,30})",
	":tags"	: "(?<tags>[\\\\pL\\\\pN\\\\s_\\\\,\\\\-]{1,255})",
	":year"	: "(?<year>[2][0-9]{3})",
	":month": "(?<month>[0-3][0-9]{1})",
	":day"	: "(?<day>[0-9][0-9]{1})",
	":user"	: "(?<user>[\\\\pL\\\\pN\\\\s_\\\\-]{1,80})",
	":slug"	: "(?<slug>[\\\\pL\\\\-\\\\d]{1,100})",
	":tree"	: "(?<tree>[\\\\pL\\\\/\\\\-_\\\\d\\\\s]{1,255})",
	":file"	: "(?<file>[\\\\pL_\\\\-\\\\d\\\\.\\\\s]{1,120})",
	":find"	: "(?<find>[\\\\pL\\\\pN\\\\s\\\\-_,\\\\.\\\\:\\\\+]{2,255})",
	":redir": "(?<redir>[a-z_\\\\:\\\\/\\\\-\\\\d\\\\.\\\\s]{1,120})"
}
JSON
);

/**
 *  Messages
 */
define( 'MSG_NOTFOUND',		'Page not found' );
define( 'MSG_NOROUTE',		'No route defined' );
define( 'MSG_BADMETHOD',	'Method not allowed' );
define( 'MSG_NOMETHOD',		'Method not implemented' );
define( 'MSG_GENERIC',		'An error has occured' );
define( 'MSG_DENIED',		'Access denied' );
define( 'MSG_INVALID',		'Invalid request' );
define( 'MSG_CODEDETECT',	'Server-side code detected' );
define( 'MSG_EXPIRED',		'This form has expired' );
define( 'MSG_TOOMANY',		'Too many requests' );
define( 'MSG_FILERANGE',	'Invalid file range requested' );
define( 'MSG_LOGINWAIT',	"Login unsuccessful, please wait a few minutes before trying again" );
define( 'MSG_REGISTERWAIT',	"Please wait a few minutes before trying to register again" );
define( 'MSG_USER_EXISTS',	"User already exists" );


/**
 *  Environment preparation
 */
\date_default_timezone_set( 'UTC' );
\ignore_user_abort( true );



/**
 *  Status flags
 */

/**
 *  Session throttling levels
 */
define( 'SESSION_STATE_FRESH',	0 );
define( 'SESSION_STATE_LIGHT',	1 );
define( 'SESSION_STATE_MEDIUM',	2 );
define( 'SESSION_STATE_HEAVY',	3 );
define( 'SESSION_STATE_CORRUPT',99 );

/**
 *  Form check statuses
 */
define( 'FORM_STATUS_VALID',	0 );
define( 'FORM_STATUS_INVALID',	1 );
define( 'FORM_STATUS_EXPIRED',	2 );
define( 'FORM_STATUS_FLOOD',	3 );

/**
 *  Login authentication modes
 */
define( 'AUTH_STATUS_SUCCESS', 0 );
define( 'AUTH_STATUS_FAILED', 1 );
define( 'AUTH_STATUS_NOUSER', 2 );
define( 'AUTH_STATUS_BANNED', 3 );

/**
 *  User permisison levels
 */
define( 'USER_STATUS_APPROVED',	0 );
define( 'USER_STATUS_MOD',	70 );
define( 'USER_STATUS_ADMIN',	99 );

/**
 *  Filter behaviors
 *  Note: "user" in this context refers to author names or login usernames
 */
define( 'FILTER_HOLD',			0 );	// Hold for review
define( 'FILTER_DELETE',		1 );	// Delete outright					
define( 'FILTER_HOLDSUSP',		2 );	// Hold, suspend user
define( 'FILTER_DELSUSP',		3 );	// Delete, suspend user
define( 'FILTER_HOLDSUSPIP',		4 );	// Hold, suspend IP
define( 'FILTER_DELSUSPIP',		5 );	// Delete, suspend IP
define( 'FILTER_HOLDSUSPUIP',		6 );	// Hold, suspend user, suspend IP
define( 'FILTER_DELSUSPUIP',		7 );	// Delete, suspend user, suspend IP
define( 'FILTER_HOLDBLOCK',		8 );	// Hold, block user
define( 'FILTER_DELBLOCK',		9 );	// Delete, block user
define( 'FILTER_HOLDBLOCKIP',		10 );	// Hold, block IP
define( 'FILTER_DELBLOCKIP',		11 );	// Delete, block IP
define( 'FILTER_HOLDBLOCKUIP',		12 );	// Hold, block user, block IP
define( 'FILTER_DELBLOCKUIP',		13 );	// Delete, block user, block IP

// Content feedback states
define( 'COMMENT_STATE_NOANON',		14 );	// No anonymous comments
define( 'COMMENT_STATE_CLOSE',		15 );	// No new comments, show existing comments
define( 'COMMENT_STATE_HIDE',		16 );	// No new comments, hide existing comments


/**
 *  Helpers
 */


/**
 *  String to list helper
 *  
 *  @param string	$text	Input text to break into items
 *  @param bool		$lower	Convert Mixed/Uppercase text to lowercase if true
 *  @param string	$sep	String delimiter, defaults to comma
 */
function trimmedList( string $text, bool $lower = false, string $sep = ',' ) : array {
	$map = \array_map( 'trim', \explode( $sep, $text ) );
	return $lower ? \array_map( 'strtolower', $map ) : $map;
}

/**
 *  Suhosin aware checking for function availability
 *  
 *  @param string	$func	Function name
 *  @return bool		True If the function isn't available 
 */
function missing( $func ) : bool {
	static $exts;
	static $blocked;
	static $fn	= [];
	if ( isset( $fn[$func] ) ) {
		return $fn[$func];
	}
	
	if ( \extension_loaded( 'suhosin' ) ) {
		if ( !isset( $exts ) ) {
			$exts = \ini_get( 'suhosin.executor.func.blacklist' );
		}
		if ( !empty( $exts ) ) {
			if ( !isset( $blocked ) ) {
				$blocked = trimmedList( $exts, true );
			}
			
			$search		= \strtolower( $func );
			
			$fn[$func]	= (
				false	== \function_exists( $func ) && 
				true	== \array_search( $search, $blocked ) 
			);
		}
	} else {
		$fn[$func] = !\function_exists( $func );
	}
	
	return $fn[$func];
}

/**
 *  Store and send rendering templates
 *  
 *  @param string	$lable		Template name to send back
 *  @param array	$reg		New templates to initiaize registry or override existing templates
 *  @return string
 */
function template( string $label, array $reg = [] ) : string {
	static $tpl	= [];
	
	// New templates? Append to current store
	if ( !empty( $reg ) ) {
		$tpl = \array_merge( $tpl, $reg );
	}
	
	return $tpl[$label] ?? '';
}

/**
 *  Check if script is running with the latest supported PHP version
 *  This function remains for backward compatibility
 */ 
function newPHP( string $spec = '8.0' ) : bool {
	return libVersion( $spec );
}

/**
 *  Check if a specific library or if PHP is the given version or above
 *  
 *  @param string	$spec		Minimum supported version
 *  @param string	$lib		Optional library name, case sensitive
 *  @return bool
 */
function libVersion( string $spec, ?string $lib ) : bool {
	static $ext;
	
	// Fix for 7.4.0 etc... appearing higher than 7.4
	$spec = \rtrim( $spec, '.0' );
	
	// Empty library? Check PHP
	if ( empty( $lib ) ) {
		return 
		\version_compare( 
			\rtrim( \PHP_VERSION, '.0' ), $spec, '>=' 
		);
	}
	
	// Currently running extensions
	if ( empty( $ext ) ) {
		$ext = \get_loaded_extensions();
	}
	
	foreach ( $ext as $e ) {
		if ( \str_starts_with( $e, $lib ) ) {
			$lv = \phpversion( $e );
			
			// Error getting version?
			if ( false === $lv ) {
				return false;
			}
			
			return 
			\version_compare( 
				\rtrim( $lv, '.0' ), $spec, '>=' 
			);
		}
	}
	
	// Extension not found
	return false;
}

/**
 *  Hooks and extensions
 *  Append a hook handler in [ 'event', 'handler' ] format
 *  Call the hook event in [ 'event', args... ] format
 *  
 *  @param array	$params		[ 'event', 'handler' ]
 */
function hook( array $params ) {
	static $handlers	= [];
	static $output		= [];
	
	// Nothing to add?
	if ( empty( $params ) ) { return; }
	
	// First parameter is the event name
	$name			= 
	\strtolower( \array_shift( $params ) );
	
	// Prepare event to receive handlers
	if ( !isset( $handlers[$name] ) ) {
		$handlers[$name]	= [];
	}
	
	// Adding a handler to the given event?
	// Need an event name and a handler
	if ( 
		\is_string( $params[0] )	&& 
		\is_callable( $params[0] )
	) {
		$handlers[$name][]	= $params[0];
		
	// Handler being called with parameters, if any
	} else {
		// Asking for hook-named output?
		if ( \is_string( $params[0] ) && empty( $params[0] ) ) {
			return $output[$name] ?? [];
		}
		
		// Execute handlers in order and store in output
		foreach( $handlers[$name] as $handler ) {
			$output[$name] = 
			$handler( 
				$name, $output[$name] ?? [], ...$params 
			) ?? [];
		}
	}
}

/**
 *  Flatten a multi-dimensional array into a path map
 *  
 *  @link https://stackoverflow.com/a/2703121
 *  
 *  @param array	$items		Raw item map (parsed JSON)
 *  @param string	$delim		Phrase separator in E.G. {lang:}
 *  @return array
 */ 
function flatten(
	array		$items, 
	string		$delim	= ':'
) : array {
	$it	= new \RecursiveIteratorIterator( 
			new \RecursiveArrayIterator( $items )
		);
	
	$out	= [];
	foreach ( $it as $leaf ) {
		$path = '';
		foreach ( \range( 0, $it->getDepth() ) as $depth ) {
			$path .= 
			\sprintf( 
				"$delim%s", 
				$it->getSubIterator( $depth )->key() 
			);
		}
		$out[$path] = $leaf;
	}
	
	return $out;
}



/**
 *  Hook result rendering helpers
 */

/**
 *  Check for non-empty string result from hook
 *  
 *  @param string	$event		Hook event name
 *  @param string	$default	Fallback content
 *  @return array
 */
function hookStringResult( string $event, string $default = '' ) : string {
	$sent	= hook( [ $event, '' ] );
	return 
	( !empty( $sent ) && \is_string( $sent ) ) ? $sent : $default;
}

/**
 *  Check for non-empty array result from hook
 *  
 *  @param string	$event		Hook event name
 *  @param array	$default	Fallback content
 *  @return array
 */
function hookArrayResult( string $event, array $default = [] ) : array {
	$sent	= hook( [ $event, '' ] );
	return 
	( !empty( $sent ) && \is_array( $sent ) ) ? $sent : $default;
}

/**
 *  Get HTML from hook result, if sent
 *  
 *  @param string	$event		Hook event name
 *  @param string	$default	Fallback html content
 *  @return string
 */
function hookHTML( string $event, string $default = '' ) : string {
	return hookArrayResult( $event )['html'] ?? $default;
}

/**
 *  Get HTML render template from hook result, if sent
 *  
 *  @param string	$event		Hook event name
 *  @param string	$default	Fallback template
 *  @param array	$input		Component to apply template to
 *  @param bool		$full		Render full regions
 *  @return string
 */
function hookTemplateRender( 
	string	$event, 
	string	$default,
	array	$input,
	bool	$full	= false
) : string {
	return 
	render( 
		hookArrayResult( $event )['template'] ?? 
		hookStringResult( $event, $default ), $input, $full
	);
}

/**
 *  Wrap component region in 'before' and 'after' event hooks and their output
 *  
 *  @param string	$before		Before template parsing event
 *  @param string	$after		After template parsing event
 *  @param string	$tpl		Base component template
 *  @param array	$input		Raw component data
 *  @param bool		$full		Render full regions
 *  @return string
 */
function hookWrap( 
	string		$before, 
	string		$after, 
	string		$tpl		= '', 
	array		$input		= [],
	bool		$full		= false
) {
	// Call "before" event hook
	hook( [ $before, [ 
		'data' => $input, 'template' => $tpl, 'full' => $full 
	] ] );
	
	// Prepend any HTML output and render the new ( or old ) template
	$html	= hookHTML( $before ) . 
			hookTemplateRender( $before, $tpl, $input, $full );
	
	// Call "after" event hook
	hook( [ $after, [ 
		'data'		=> $input,	// Raw component data
		'before'	=> $before,	// Event called before
		'html'		=> $html,	// Current HTML
		'full'		=> $full,	// Full region render
		'template'	=> $tpl		// New or previously replaced
	] ] );
	
	// Send any replaced HTML or already rendered HTML
	return hookHTML( $after, $html );
}


/**
 *  Collection of functions to execute after content sent
 */
function shutdown() {
	static $registered	= [];
	$args			= \func_get_args();
	
	// Shutdown called
	if ( empty( $args ) ) {
		hook( [ 'shutdown', [] ] );
		foreach( $registered as $k => $v ) {
			if ( \is_array( $v ) ) {
				$k( ...$v );
			} elseif ( $v !== null ) {
				$k( $v );
			} else {
				$k();
			}
		}
		
		// End
		die();
	}
	
	if ( \is_callable( $args[0] ) ) {
		$registered[$args[0]] = $args[1] ?? null;
	}
}

/**
 *  Guess if current request is secure
 */
function isSecure() : bool {
	$ssl	= $_SERVER['HTTPS'] ?? '0';
	$frd	= 
		$_SERVER['HTTP_X_FORWARDED_PROTO'] ?? 
		$_SERVER['HTTP_X_FORWARDED_PROTOCOL'] ?? 
		$_SERVER['HTTP_X_URL_SCHEME'] ?? 'http';
	
	if ( 
		0 === \strcasecmp( $ssl, 'on' )		|| 
		0 === \strcasecmp( $ssl, '1' )		|| 
		0 === \strcasecmp( $frd, 'https' )
	) {
		return true;
	}
	
	return 
	( 443 == ( int ) ( $_SERVER['SERVER_PORT'] ?? 80 ) );
}


/**
 *  Standard request parameter helpers
 */

/**
 *  Browser User Agent
 *  
 *  @return string
 */
function getUA() : string {
	static $ua;
	if ( isset( $ua ) ) {
		return $ua;
	}
	$ua	= trim( $_SERVER['HTTP_USER_AGENT'] ?? '' );
	return $ua;
}

/**
 *  Get full request URI
 *  
 *  @return string
 */
function getURI() : string {
	static $uri;
	if ( isset( $uri ) ) {
		return $uri;
	}
	$uri	= $_SERVER['REQUEST_URI'] ?? '';
	return $uri;
}

/**
 *  Get or guess current server protocol
 *  
 *  @param string	$assume		Default protocol to assume if not given
 *  @return string
 */
function getProtocol( string $assume = 'HTTP/1.1' ) : string {
	static $pr;
	if ( isset( $pr ) ) {
		return $pr;
	}
	$pr = $_SERVER['SERVER_PROTOCOL'] ?? $assume;
	return $pr;
}

/**
 *  Current querystring, if present
 *  
 *  @return string
 */
function getQS() : string {
	static $qs;
	if ( isset( $qs ) ) {
		return $qs;
	}
	$qs	= $_SERVER['QUERY_STRING'] ?? '';
	return $qs;
}

/**
 *  Current client request method
 *  
 *  @return string
 */
function getMethod() : string {
	static $method;
	if ( isset( $method ) ) {
		return $method;
	}
	$method = 
	\strtolower( trim( $_SERVER['REQUEST_METHOD'] ?? '' ) );
	return $method;
}

/**
 *  Visitor's preferred languages based on Accept-Language header
 *  
 *  @return array
 */
function getLang() : array {
	static $found;
	if ( isset( $found ) ) {
		return $found;
	}
	
	$found	= [];
	$lang	= 
	bland( httpheaders( true )['accept-language'] ?? '', true );
	
	// No header?
	if ( empty( $lang ) ) {
		return [];
	}
	
	// Find languages by locale and priority
	\preg_match_all( 
		'/(?P<lang>[^-;,\s]{2,8})' . 
		'(?:-(?P<locale>[^;,\s]{2,8}))?' . 
		'(?:;q=(?P<weight>[0-9]{1}(?:\.[0-9]{1})))?/is',
		$lang,
		$matches
	);
	$matches =
	\array_filter( 
		$matches, 
		function( $k ) {
			return !\is_numeric( $k );
		}, \ARRAY_FILTER_USE_KEY 
	);
	
	if ( empty( $matches ) ) {
		return [];
	}
	
	// Re-arrange
	$c	= count( $matches );
	for ( $i = 0; $i < $c; $i++ ) {
		
		foreach ( $matches as $k => $v ) {
			if ( !isset( $found[$i] ) ) {
				$found[$i] = [];
			}
			
			switch ( $k ) {
				case 'lang':
					$found[$i][$k] = 
					empty( $v[$i] ) ? '*' : $v[$i];
					break;
					
				case 'locale':
					$found[$i][$k] = 
					empty( $v[$i] ) ? '' : $v[$i];
					break;
					
				case 'weight':
					// Lower global or empty language priority
					if ( 
						empty( $matches['lang'][$i] ) ||
						0 == \strcmp( $found[$i]['lang'], '*' )
					) {
						$found[$i][$k] = 
						( float ) ( empty( $v[$i] ) ? 0 : $v[$i] );
					} else {
						$found[$i][$k] = 
						( float ) ( empty( $v[$i] ) ? 1 : $v[$i] );						
					}
					break;
			
				default:
					// Anything else, send as-is
					$found[$i][$k] = 
					empty( $v[$i] ) ? '' : $v[$i];
			}
		}
	}
	
	// Sorting columns
	$weight = \array_column( $found, 'weight' );
	$locale	= \arary_column( $found, 'locale' );
	
	// Sort by weight priority, followed by locale
	return
	\array_multisort( 
		$weight, \SORT_DESC, 
		$locale, \SORT_ASC, 
		$found
	) ? $found : [];
}

/**
 *  Get requested file range, return [-1] if range was invalid
 *  
 *  @return array
 */
function getFileRange() : array {
	static $ranges;
	if ( isset( $ranges ) ) {
		return $ranges;
	}
	
	$fr = $_SERVER['HTTP_RANGE'] ?? '';
	if ( empty( $fr ) ) {
		return [];
	}
	
	// Range(s) too long 
	if ( strlen( $fr ) > 180 ) {
		return [-1];
	}
	
	// Check multiple ranges, if given
	$rg = \preg_match_all( 
		'/bytes=(^$)|(?<start>\d+)?(\s+)?-(\s+)?(?<end>\d+)?/is',
		$fr,
		$m
	);
	
	// Invalid range syntax?
	if ( false === $rg ) {
		return [-1];
	}
	
	$starting	= $m['start'] ?? [];
	$ending		= $m['end'] ?? [];
	$sc		= count( $starting );
	
	// Too many or too few ranges or starting / ending mismatch
	if ( $sc > 10 || $sc == 0 || $sc != count( $ending ) ) {
		return [-1];
	}
	
	\asort( $starting );
	\asort( $ending );
	$rx = [];
	
	// Format ranges
	foreach ( $ending as $k => $v ) {
		
		// Specify 0 for starting if empty and -1 if end of file
		$rx[$k] = [ 
			empty( $starting[$k] ) ? 0 : \intval( $starting[$k] ), 
			empty( $ending[$k] ) ? -1 : \intval( $ending[$k] )
		];
		
		// If start is larger or same as ending and not EOF...
		if ( $rx[$k][0] >= $rx[$k][1] && $rx[$k][1] != -1 ) {
			return [-1];
		}
	}
	
	// Sort by lowest starting value
	usort( $rx, function( $a, $b ) {
		return $a[0] <=> $b[0];
	} );
	
	// End of file range found if true
	$eof = 0;
	
	// Check for overlapping/redundant ranges (preserves bandwidth)
	foreach ( $rx as $k => $v ) {
		// Nothing to check yet
		if ( !isset( $rx[$k-1] ) ) {
			continue;
		}
		// Starting range is lower than or equal previous start
		if ( $rx[$k][0] <= $rx[$k-1][0] ) {
			return [-1];
		}
		
		// Ending range lower than previous ending range
		if ( $rx[$k][1] <= $rx[$k-1][1] ) {
			// Special case EOF and it hasn't been found yet
			if ( $rx[$k][1] == -1 && $eof == 0) {
				$eof = 1;
				continue;
			}
			return [-1];
		}
		
		// Duplicate EOF ranges
		if ( $rx[$k][1] == -1 && $eof == 1 ) {
			return [-1];
		}
	}
	
	$ranges = $rx;
	return $rx;
}



/**
 *  Parameter filter helpers
 */

/**
 *  Filter number within min and max range, inclusive
 *  
 *  @param mixed	$val		Given default value
 *  @param int		$min		Minimum, returned if less than this
 *  @param int		$max		Maximum, returned if greater than this
 *  @return int
 */
function intRange( $val, int $min, int $max ) : int {
	$out = ( int ) $val;
	
	return 
	( $out > $max ) ? $max : ( ( $out < $min ) ? $min : $out );
}

/**
 *  Logging safe string
 */
function logStr( $text, int $len = 255 ) : string {
	return truncate( unifySpaces( ( string ) ( $text ?? '' ) ), 0, $len );
}

/**
 *  Check log file size and rollover, if needed
 *  
 *  @param string	$file	Log file name
 */
function logRollover( string $file ) {
	// Nothing to rollover
	if ( !\file_exists( $file ) ) {
		return;
	}
	
	$fs	= \filesize( $file );
	// Empty file
	if ( false === $fs ) {
		return;
	}
	
	$cf	= config( 'max_log_size', \MAX_LOG_SIZE, 'int' );
	if ( $fs > $cf ) {
		backupFile( $file, false, 'old', 0 );
	}
}

/**
 *  Currently set application name in configuration or default app name
 *  
 *  @return string
 */
function appName() : string {
	static $app;
	if ( isset( $app ) ) {
		return $app;
	}
	$app = labelName( config( 'app_name', \APP_NAME ) );
	if ( empty( $app ) ) {
		$app = labelName( \APP_NAME );
	}
	return $app;
}

/**
 *  Find a configuration setting as a set of lines or an array and returns filtered
 *  
 *  @param string	$param	Configuration setting name
 *  @param mixed	$def	Default value on empty
 *  @param string	$map	Filter function
 */
function linedConfig( string $param, $def, string $filter ) {
	$opt = config( $param, $def );
	$raw = 
	\is_array( $opt ) ? 
		\array_map( $filter, $opt ) : 
		lineSettings( $opt, -1, $filter );
	
	return \array_unique( \array_filter( $raw ) );
}

/**
 *  Email sending message helper
 *  
 *  @param array	$rec		List of recipients (must match whitelist)
 *  @param string	$subject	Message heading
 *  @param string	$msg		Mail body
 *  @param bool		$html		Format email as HTML if true
 *  @return bool
 */
function mailMessage(
	array	$rec,
	string	$subject,
	string	$msg,
	bool	$html		= false
) : bool {
	static $hheaders = [
		'MIME-Version: 1.0',
		'Content-Type: text/html; charset="UTF-8"',
		'Content-Transfer-Encoding: base64'
	];
	
	static $theaders = [
		'MIME-Version: 1.0',
		'Content-Type: text/plain; charset="UTF-8"'
	];
	
	// Check if mail function is disabled
	if ( missing( 'mail' ) ) {
		shutdown( 
			'logError', 
			'Email: mail() Has been disabled. Check the disable_function list in php.ini.' 
		);
		return false;
	}
	
	$msg	 = trim( $msg );
	if ( empty( $msg ) ) {
		shutdown( 'logError', 'Email: Message cannot be empty.' );
		return false;
	}
	
	$mfr	= cleanEmail( config( 'mail_from', \MAIL_FROM ) );
	if ( empty( $mfr ) ) {
		shutdown( 
			'logError', 
			'Email: Sender address is invalid. Check mail_from config setting.' 
		);
		return false;
	}
	
	// HTML or plain text headers
	$headers 	= $html ? $hheaders : $theaders;
	$headers[]	= 'From: ' . $mfr;
	
	// Mailer hook
	hook( [ 'mailmessage', [ 
		'headers'	=> $headers,
		'html'		=> $html,
		'recipients'	=> $rec,
		'subject'	=> $subject,
		'message'	=> $msg,
		'senderip'	=> getIP(),
		'senderua'	=> getUA()
	] ] );
	
	// Load mail hook replacements
	$res	= hookArrayResult( 'mailmessage' );
	
	// Override with hook results if any
	$rcpt	= $res['recipients'] ?? $rec;
	
	// Check sender whitelist
	$mwhite	= 
	linedConfig( 'mail_whitelist', \MAIL_WHITELIST, 'cleanEmail' );
	
	// Nothing in whitelist?
	if ( empty( $mwhite ) ) {
		shutdown( 
			'logError',
			'Email: No valid recipients found. Check whitelist.'
		);
		return false;
	}
	
	// Consistent addresses
	$mwhite	= \array_unique( \array_map( 'lowercase', $mwhite ) );
	$rcpt	= \array_unique( \array_map( 'lowercase', $rcpt ) );
	
	// Check recipient whitelist
	$names	= [];
	foreach( $rcpt as $r ) {
		if ( \in_array( $r, $mwhite, true ) ) {
			$names[] = $r;
		}
	}
	
	if ( empty( $names ) ) {
		shutdown( 
			'logError', 
			'Email: No matching recipients in whiltelist.'
		);
		return false;
	}
	
	// Format user input
	$subj	= entities( unifySpaces( $res['subject'] ?? $subject ) );
	$msg	.= "\r\n\r\nReceived from: " . getIP() . "  \r\n" . getUA();
	$msg	= html( $res['message'] ?? $msg, '', false, true );
	
	$ok	= 
	mail( 
		\implode( ',', $names ), 
		$subj, 
		$html ? \base64_encode( $msg ) : \strip_tags( $msg ), 
		\array_map( 'unifySpaces', $headers ) 
	);
	
	if ( $ok ) {
		shutdown( 
			'logNotice', 
			'Email: Sent from ' . getIP() . ' Subject: ' . $subj
		);
		return true;
	}
	shutdown( 
		'logError', 
		\error_get_last()['message'] ?? 'Email: Error sending message'
	);
	return false;
}

/**
 *  Generic message logging helper for notices and errors
 *  
 *  @param string	$dest		Log storage destination
 *  @param string	$fields		Header fields
 *  @param string	$msg		Logging message
 *  @param string	$stype		Message logging type
 *  @return bool			True if successful
 */
function logMessage(
	string		$dest,
	string		$fields, 
	string		$msg,
	string		$stype		= 'file' 
) : bool {
	// TODO: Combine email and file logging. Only file logging for now.
	if ( 0 !== \strcasecmp( $stype, 'file' ) ) {
		return false;
	}
	
	// Log friendly date and time format
	$dt	= \gmdate( 'Y-m-d H:i:s' );
	
	logRollover( $dest );
	
	// Prepare line with date and time
	if ( \file_exists( $dest ) ) {
		$msg	= $dt . ' '. $msg;
	// New file? Prepare line with header fields, date and time
	} else {
		$msg	= '#Software: ' . appName() . "\n#Date: $dt\n#Fields: " . 
			$fields . "\n\n" . $dt . ' '. $msg;
	}
	
	\touch( $dest );
	
	// PHP's built-in logger
	return \error_log( $msg . "\n", 3, $dest );
}

/**
 *  Error logging
 *  
 *  @param string	$err	Error message to store
 *  @param bool		$app	Application error if true, visitor error if false
 *  @return bool		True if successful
 */
function logError( string $err, bool $app = true ) : bool {
	$file	= \CACHE . ( $app ? \ERROR : \ERROR_VISIT );
	$err	= $app ? unifySpaces( $err ) : truncate( $err, 0, 2048 );
	
	// Visitor errors have more header fields
	$fields = $app ? 
		"date, time, s-comment\n\n" : 
		"date, time, sc-status, c-ip, cs-method, s-comment, cs-useragent, cs-uri\n\n";
	return logMessage( $file, $fields, $err );
}

/**
 *  Message logging
 *  
 *  @param string	$msg	Notification message
 *  @return bool		True if successful
 */
function logNotice( string $msg ) : bool {
	return 
	logMessage( 
		\CACHE . \NOTICE, 
		'date, time, s-comment',
		truncate( unifySpaces( $msg ), 0, 2048 ) 
	);
}

/**
 *  Log visitor error
 *  
 *  @param int		$code	Error type
 *  @param string	$msg	Custom message
 *  @return bool
 */
function visitorError( int $code = 0, string $msg = '-' ) {
	$mt	= getMethod();
	
	$ua	= logStr( $_SERVER['HTTP_USER_AGENT'] ?? '-' );
	$me	= logStr( empty( $mt ) ? 'unknown' : $mt );
	$uri	= logStr( getURI() );
	
	$err	= $code . ' ' . getIP() . ' ' . $me . ' ' . $msg . ' ' . 
			$ua . ' ' . $uri;
	
	shutdown( 'logError', [ $err, false ] );
}

/**
 *  Visitor disconnect event helper
 */
function visitorAbort() {
	cleanOutput( true );
	if ( !\headers_sent() ) {
		httpCode( 205 );
	}
	visitorError( 499, 'Client disconnect' );
	shutdown( 'cleanup' );
	shutdown();
}


/**
 *  Safely encode array to JSON
 *  
 *  @return string
 */
function encode( array $data = [] ) : string {
	if ( empty( $data ) ) {
		return '';
	}
	
	$out = 
	\json_encode( 
		$data, 
		\JSON_HEX_TAG | \JSON_HEX_APOS | \JSON_HEX_QUOT | 
		\JSON_HEX_AMP | \JSON_UNESCAPED_UNICODE | 
		\JSON_PRETTY_PRINT 
	);
	
	return ( false === $out ) ? '' : $out;
}

/**
 *  Safely decode JSON to array
 *  
 *  @return array
 */
function decode( string $data = '', int $depth = 10 ) : array {
	if ( empty( $data ) ) {
		return [];
	}
	$depth	= intRange( $depth, 1, 50 );
	$out	= 
	\json_decode( 
		\utf8_encode( $data ), true, $depth, 
		\JSON_BIGINT_AS_STRING
	);
	
	if ( empty( $out ) || false === $out ) {
		return [];
	}
	
	return $out;
}

/**
 *  Path prefix slash (/) helper
 */
function slashPath( string $path, bool $suffix = false ) : string {
	return $suffix ?
		\rtrim( $path, '/\\' ) . '/' : 
		'/'. \ltrim( $path, '/\\' );
}

/**
 *  Split a block of text into an array of lines
 *  
 *  @param string	$text	Raw text to split into lines
 *  @param int		$lim	Max line limit, defaults to unlimited
 *  @param bool		$tr	Also trim lines if true
 *  @return array
 */
function lines( string $text, int $lim = -1, bool $tr = true ) : array {
	return $tr ?
	\preg_split( 
		'/\s*\R\s*/', 
		trim( $text ), 
		$lim, 
		\PREG_SPLIT_NO_EMPTY 
	) : 
	\preg_split( '/\R/', $text, $lim, \PREG_SPLIT_NO_EMPTY );
}

/**
 *  Helper to turn items (one per line) into a unique value array
 *  
 *  @param string	$text	Lined settings (one per line)
 *  @param int		$lim	Maximum number of items
 *  @param string	$filter	Optional filter name to apply
 *  @return array
 */
function lineSettings( string $text, int $lim, string $filter = '' ) : array {
	$ln = \array_unique( lines( $text ) );
	
	$rt = ( ( count( $ln ) > $lim ) && $lim > -1 ) ? 
		\array_slice( $ln, 0, $lim ) : $ln;
	
	return 
	( !empty( $filter ) && \is_callable( $filter ) ) ? 
		\array_map( $filter, $rt ) : $rt;
}

/**
 *  Get presets as lined items (one item per line)
 *  
 *  @param string	$label		Preset unique identifier
 *  @param string	$base		Setting name in config.json
 *  @param mixed	$default	Defined configuration
 *  @param string	$data		String block of items
 */ 
function linePresets(
	string		$label,
	string		$base,
			$default, 
	string		$data
) {
	static $prs	= [];
	
	if ( isset( $prs[$label] ) ) {
		return $prs[$label];
	}
	
	// Maximum number of items
	$lim		= config( $base, $default, 'int' );
	$prs[$label]	= lineSettings( $data, $lim );
	
	return $prs[$label];
}

/**
 *  Filter file extension
 *  
 *  @param string	$ext		Raw file extension or empty
 *  @return string
 */
function filterExt( ?string $ext ) : string {
	return 
	empty( $ext ) ? '' : 
	\preg_replace( 
		'/[[:space:]]+/', 
		bland( title( $ext ), true ), '' 
	);
}

/**
 *  Create a datestamped backup of the given file before moving or copying it
 *  
 *  @param string	$file	File name path
 *  @param bool		$copy	Copy if true, rename if false
 *  @param string	$ext	Backup file extension (defaults to bkp)
 *  @param int		$fx	Prepend or append extension
 *  				1 = Prefix, 0 = Suffix, other = Add nothing
 *  
 *  @return bool		True if no action needed or action successful
 */
function backupFile(
	string	$file,
	bool	$copy, 
	string	$ext	= 'bkp',
	int	$fx	= 0
) : bool {
	if ( !\file_exists( $file ) ) {
		return true;
	}
	
	// Filter file extension
	$ext	= filterExt( $ext );
	
	// Extension mode
	$prefix = $fx == 1 ? \rtrim( $ext, '.' ) . '.' : '';
	$suffix	= $fx == 0 ? '.' . \ltrim( $ext, '.' ) : '';
	
	// Backup file name inferred from full file path
	$name	= 
	slashPath( \dirname( $file ), true ) . $prefix . 
		\gmdate( 'Ymd\THis' ) . '.' . 
		\basename( $file ) . $suffix;
	
	return $copy ? \copy( $file, $name ) : \rename( $file, $name );
}

/**
 *  Load file contents and check for any server-side code
 *   
 *  @param string	$file	File name relative to root path
 *  @param string	$root	File location, defaults to CACHE
 *  @param bool		$rem	Store loaded file contents if true
 *  @return string		
 */
function loadFile( 
	string	$name, 
	string	$root	= \CACHE,
	bool	$rem	= true
) : string {
	static $loaded	= [];
	
	// Check if already loaded
	if ( isset( $loaded[$name] ) && $rem ) {
		return $loaded[$name];
	}
	
	// Relative path to storage
	$fname	= slashPath( $root, true ) . $name;
	
	// Check folder location
	if ( empty( filterDir( $fname, $root ) ) ) {
		return '';
	}
	
	if ( !\file_exists( $fname ) ) {
		return '';
	}
	
	$ext		= 
	\pathinfo( $fname, \PATHINFO_EXTENSION ) ?? '';
	
	switch( \strtolower( $ext ) ) {
		case 'json':
		case 'config':
			// Clean comments and junk while loading
			$data	= \php_strip_whitespace( $fname );
			break;
			
		default:
			$data = \file_get_contents( $fname );
	}
	
	// Nothing loaded?
	if ( false === $data ) {
		return '';
	}
	
	if ( false !== \strpos( $data, '<?php' ) ) {
		shutdown( 'cleanup' );
		
		// Prevent circular failure if config file contained the error
		if ( 0 == \strcasecmp( $name, CONFIG ) ) {
			shutdown();
		}
		send( 500, \MSG_CODEDETECT );
	}
	
	if ( $rem ) {
		$loaded[$name] = $data;
	}
	
	return $data;
}

/**
 *  Get text content as an array of lines
 *  
 *  @param mixed	$raw	Post content or file path
 *  @param bool		$fl	Content is in a file
 *  @param bool		$skip	Skip empty lines when loading
 */
function loadText( $raw, bool $fl = true, bool $skip = false ) {
	static $loaded	= [];
	$key		= $raw . ( string ) $fl;
	
	if ( isset( $loaded[$key] ) ) {
		return $loaded[$key];
	}
	
	// Get content from files
	if ( $fl ) {
		if ( \file_exists( $raw ) ) {
			$data	= $skip ? 
			\file( $raw, 
				\FILE_IGNORE_NEW_LINES | \FILE_SKIP_EMPTY_LINES 
			) : \file( $raw, \FILE_IGNORE_NEW_LINES );
			
			if ( false === $data ) {
				return [];
			}
		} else {
			return [];
		}
	
	// Or break content into lines
	} else {
		$data	= explode( "\n", $raw );
	}
	
	if ( empty( $data ) ) {
		return [];
	}
	
	// Remove empty lines from beginning of post 
	// (titles etc...)
	while( "" === trim( \current( $data ) ) ) {
		\array_shift( $data );
	}
	
	if ( empty( $data ) ) {
		return [];
	}
	
	// Empty lines from end of post 
	// (tags etc...)
	while( "" === trim( \end( $data ) ) ) {
		\array_pop( $data );
	}
	
	\reset( $data );
	$loaded[$key]	= $data;
	return $data;
}

/**
 *  Load file into array, optionally return the first n lines
 *  
 *  @param string	$name	File name to load from storage 
 *  @param int		$lines	Return only the first lines if not zero
 *  @param bool		$filter	Filters lines that start with ; or #
 *  @param bool		$skip	Skip empty lines when loading
 */
function loadArray( 
	string		$name,
	int		$lines	= 0,
	bool		$filter	= true,
	bool		$skip	= true
) {
	static $loaded	= [];
	$key		= $name . ( string ) $filter;
	
	// Prefiltered ?
	if ( isset( $loaded[$key] ) ) {
		return ( $lines > 0 ) ? 
			\array_slice( $loaded[$key], 0, $lines ) : 
			$loaded[$key];
	}
	
	$data	= loadText( $name, $skip, true );
	if ( empty( $data ) ) {
		return [];
	}
	
	// Filtered?
	if ( $filter ) {
		$data	= \array_filter( \array_map( 'trim', $data ) );
		$data	= 
		\array_filter( $data, function( $val ) {
			// Skip if the first line starts with colon or pound
			return (
				0 !== \strpos( $val, ';' ) && 
				0 !== \strpos( $val, '#' )
			);
		} );
	}
	
	$loaded[$key] = $data;
	
	// Specific number of lines?
	return ( $lines > 0 ) ? \array_slice( $data, 0, $lines ) : $data;
}

/**
 *  Helper to trigger configmodified event on parameter change
 *  
 *  @param array	$params		Configuration settings
 *  @param array	$modify		Changed parameters
 *  @return array
 */
function modifiedConfig( array $params, array $modify ) : array {
	if ( count( $modify ) ) {
		$params = \array_merge( $params, $modify );
		hook( [ 'configmodified', $params ] );
	}
	
	// Call configuration checking event
	hook( [ 'checkconfig', $params ] );
	
	// Send filtered params from event
	return hook( [ 'checkconfig', '' ] );
}

/**
 *  Load JSON formatted configuration file
 *  
 *  @param string	$file		File name
 *  @param array	$modify		New settings
 *  @return array
 */
function loadConfig( string $file, array $modify = [] ) : array {
	static $params;
	
	if ( isset( $params ) ) {
		// Modifying after params were already loaded?
		if ( !empty( $modify ) ) {
			$params = modifiedConfig( $params, $modify );
		}
		return $params;
	}
	
	$data	= loadFile( $file );
	if ( empty( $data ) ) {
		$params = [];
		return $params;
	}
	
	$params	= decode( $data );
	
	// Check for any modifications and run events/filters
	if ( !empty( $modify ) ) {
		$params = modifiedConfig( $params, $modify );
	}
	
	return $params;
}

/**
 *  File saving helper with auto backup
 *  
 *  @param string	$name		Destination file name
 *  @param string	$data		File contents
 *  @param int		$fx		Prefix 'bkp.', suffix '.bkp', or nothing
 *  @param bool		$append		Append to file instead of replacing it
 */
function saveFile( 
	string	$name, 
	string	$data, 
	int	$fx		= 0,
	bool	$append		= false
) : bool {
	$file = \CACHE . $name;
	
	// Backup failed? Don't overwrite
	if ( !backupFile( $file, true, 'bkp', $fx ) ) {
		return false;
	}
	
	if ( $append ) {
		return 
		( false === \file_put_contents( 
			$file, $data, \FILE_APPEND | \LOCK_EX 
		) ) ? false : true;
	}
	
	return 
	( false === \file_put_contents( $file, $data, \LOCK_EX ) ) ? 
		false : true;
}

/**
 *  Save configuration to config.json
 *  
 *  @param array	$params		Configuration settings
 *  @return bool
 */
function saveConfig() : bool {
	if ( !internalState( 'configModified' ) ) {
		return false;
	}
	
	// Load new config from 
	$params	= hook( [ 'configmodified', '' ] );
	$data	= encode( $params );
	if ( empty( $data ) ) {
		return false;
	}
	
	return saveFile( CONFIG, $data, 1 );
}

/**
 *  Register or get internal state
 *  
 *  @param string	$name		State name
 *  @param mixed	$value		State value, defaults to false if unset
 */
function internalState( string $name, $value = null ) {
	static $state = [];
	if ( empty( $value ) ) {
		return $state[$name] ?? false;
	}
	
	$state[$name] = $value;
}

/**
 *  Set to fire when configuration has been changed
 */
function configModified( string $event, array $hook, array $params ) {	
	internalState( 'configModified', true );
}

/**
 *  Get configuration setting or default value
 *  
 *  @param string	$name		Configuration setting name
 *  @param mixed	$default	If not set, fallback value
 *  @param string	$type		String, integer, or boolean
 *  @param string	$filter		Optional parse function
 *  @return mixed
 */
function config( 
	string	$name, 
		$default, 
	string	$type		= 'string',
	string	$filter		= '' 
) {
	$config = loadConfig( \CONFIG );
	switch( $type ) {
		case 'int':
		case 'integer':
			return ( int ) ( $config[$name] ?? $default );
			
		case 'bool':
		case 'boolean':
			return ( bool ) ( $config[$name] ?? $default );
		
		case 'json':
			$json	= $config[$name] ?? $default ?? '';
			
			return \is_array( $json ) ? 
				$json : decode( ( string ) $json );
			
		case 'lines':
			$lines	= $config[$name] ?? $default ?? '';
			
			return \is_array( $lines ) ? 
					$lines : 
					lineSettings( 
						( string ) $lines, $filter 
					);
		
		default:
			return $config[$name] ?? $default;
	}
}

/**
 *  Helper to determine if given hash algo exists or returns default
 *  
 *  @param string	$token		Configuration setting name
 *  @param string	$default	Defined default value
 *  @param bool		$hmac		Check hash_hmac_algos() if true
 *  @return string
 */
function hashAlgo(
	string	$token, 
	string	$default, 
	bool	$hmac		= false 
) : string {
	static $algos	= [];
	$t		= $token . ( string ) $hmac;
	if ( isset( $algos[$t] ) ) {
		return $algos[$t];
	}
	
	$ht		= config( $token, $default );
	
	$algos[$t]	= 
		\in_array( $ht, 
			( $hmac ? \hash_hmac_algos() : \hash_algos() ) 
		) ? $ht : $default;
		
	return $algos[$t];	
}



/**
 *  Language translation
 */

/**
 *  Load and process language file
 *  
 *  @return array
 */
function language() {
	static $data;
	
	if ( isset( $data ) ) {
		return $data;
	}
	
	// Set default language and append language file definitions
	$lang	= config( 'language', \LANGUAGE );
	$file	= loadFile( $lang . '.json' );
	$data	= empty( $file ) ? [] : decode( $file );
	
	// Trigger language load hook
	hook( [ 'loadlanguage', [ 
		'lang'	=> $lang, 
		'zone'	=> config( 'timezone', \TIMEZONE ),
		'terms' => $data
	] ] );
	
	// Append new language info, if any
	$sent	= hookArrayResult( 'loadlanguage' )['terms'] ?? [];
	if ( !empty( $sent ) ) {
		$data	= \array_merge( $data, $sent );
	}
	
	return $data;
}

/**
 *  Get language specific terms
 *  
 *  @param string	$name		Language substitution label
 *  @param string	$default	Default value if not given
 *  @return string
 */
function langVar( string $name, string $default ) {
	$data = language();
	return $data[$name] ?? $default;
}

/**
 *  Get translation file error message with fallback
 *  
 *  @param string	$name		Language substitution label
 *  @param string	$default	Fallback value if not available
 *  @return string
 */
function errorLang( string $name, string $default ) {
	$data = language();
	return $data['errors'][$name] ?? $default;
}

/**
 *  Term replacement helper
 *  Flattens multidimensional array into {$prefix:group:label...} format
 *  and replaces matching placeholders in content
 *  
 *  @param string	$prefix		Replacement prefix E.G. 'lang'
 *  @param array	$data		Multidimensional array
 *  @param string	$content	Placeholders to replace
 *  @return string
 */ 
function prefixReplace(
	string		$prefix, 
	array		$data, 
	string		$content
) : string {
	// Find placeholders with given prefix
	\preg_match_all( 
		'/\{' . $prefix . '(\:[\:a-z_]{1,100}+)\}/i', 
		$content, $m 
	);
	// Convert data to :group:label... format
	$terms	= flatten( $data );
	
	// Replacements list
	$rpl	= [];
	
	$c	= \count( $m );
	
	// Set {prefix:group:label... } replacements or empty string
	for( $i = 0; $i < $c; $i++ ) {
		if ( !isset( $m[1] ) ) {
			continue;
		}
		
		if ( !isset( $m[1][$i] ) ) {
			continue;
		}
		$rpl['{' . $prefix . $m[1][$i] . '}']	= 
			$terms[$m[1][$i]] ?? '';
	}
	
	return \strtr( $content, $rpl );
}

/**
 *  Scan template for language placeholders
 *  
 *  @param string	$tpl	Loaded template data
 *  @return string
 */
function parseLang( string $tpl ) : string {
	$tpl		= prefixReplace( 'lang', language(), $tpl );
	
	// Change variable placeholders
	return \preg_replace( '/\s*__(\w+)__\s*/', ' {\1} ', $tpl );
}




/**
 *  Template helpers
 */

/**
 *  Website and relative path root path given a URL prefix
 *  Defaults to home link
 *  
 *  @param string	$path		Event route prefix segment
 *  @param string	$default	Fallback event route
 *  @return string
 */
function pageRoutePath( ?string $path = null, ?string $default = null ) : string {
	static $urls	= [];
	
	$path		??= '';
	if ( isset( $urls[$path] ) ) {
		return $urls[$path];
	}
	
	// Empty path? Use home link
	if ( empty( $path ) ) {
		$urls[$path] = website() . getRoot(); 
		return $urls[$path];
	}
	
	$rt	= eventRoutePrefix( $path, $default ?? $path );
	
	// Avoid placeholders E.G. :user, :page, :tag etc...
	$st	= strstr( $rt, ':', true );
	$urls[$path]	= website() . getRoot() . 
		( ( false === $st ) ? $rt : $st );
	
	return $urls[$path];
}

/**
 *  Create home navigation link
 *  
 *  @return string
 */
function navHome() : string {
	static $home;
	if ( isset( $home ) ) {
		return $home;
	}
	
	$url	= pageRoutePath();
	hook( [ 'homelink', [ 'url' => $url ] ] );
	$html	= hookHTML( 'homelink' );
	if ( !empty( $html ) ) {
		$home = $html;
		return $html;
	}
	
	$home	= 
	render( template( 'tpl_home_link' ), [ 
		'url'	=> $url, 
		'text'	=> template( 'tpl_home' )
	] );
	
	return $home;
}

/**
 *  Navigation link formatter
 *  
 *  @param string	$wrap		Link wrapper template
 *  @param mixed	$def		Link JSON definition
 *  @return string
 */
function renderNavLinks(
	string		$wrap,
			$def
) {
	$links	= \is_array( $def ) ? $def : 
			decode( $def )[ 'links'] ?? [];
	
	$out	= '';
	$tpl	= template( 'tpl_page_nav_link' );
	foreach ( $links as $v ) {
		$out	.= render( $tpl, $v );
	}
	
	// Replace any home link references
	$out	= render( $out, [ 
		'home'		=> pageRoutePath(),
		'feedlink'	=> pageRoutePath( 'feed' )
	] );
	
	// Return language replaced
	return render( $wrap, [ 'links' => $out ] );
}

/**
 *  Footer template rendering helper
 *  
 *  @return string
 */
function pageFooter() : string {
	// Footer with home link set
	
	$flinks	= config( 'default_footer_links', \DEFAULT_FOOTER_LINKS );
	return 
	render( template( 'tpl_page_footer' ), [ 
		'footer_links'=> 
			renderNavLinks( 
				template( 'tpl_footernav_wrap' ), 
				$flinks
			),
		'home'		=> pageRoutePath(),
		'feedlink'	=> pageRoutePath( 'feed' )
	] );
}

/**
 *  Load and change each placeholder into a key
 *  
 *  @return array
 */
function loadClasses() : array {
	$cls	= config( 'default_classes', \DEFAULT_CLASSES, 'json' );
	// Trigger class load hook
	hook( [ 'loadcssclasses', [ 'classes' => $cls ] ] );
	
	// Intercept extra classes and/or existing class replacements
	$sent	= hookArrayResult( 'loadcssclasses' )['classes'] ?? [];
	if ( !empty( $sent ) ) {
		$cls	= \array_merge( $cls, $sent );
	}
		
	$cv	= [];
	
	// Add new or appened classes while removing duplicates
	foreach( $cls as $k => $v ) {
		$cv['{' . $k . '}'] = 
			\implode( ' ', uniqueTerms( bland( $v, true ) ) );
	}
	return $cv;
}

/**
 *  Get or override render store pairs
 *  
 *  @param string	$area	Template store placeholder area
 *  @param array	$modify	New placeholder replacements
 *  @return array
 */ 
function rsettings( string $area, array $modify = [] ) : array {
	static $store = [];
		
	if ( !isset( $store[$area] ) ) {
		switch( $area ) {
			case 'classes':
				$store['classes']	= loadClasses();
				break;
				
			case 'styles':
				$s = config( 'default_stylesheets', \DEFAULT_STYLESHEETS );
				$store['styles']	= \is_array( $s ) ? $s : 
				linePresets( 
					'stylesheets', 
					'style_limit', 
					\STYLE_LIMIT, 
					$s
				);
				break;
				
			case 'scripts':
				$s = config( 'default_scripts', \DEFAULT_SCRIPTS );
				$store['scripts']	= \is_array( $s ) ? $s : 
				linePresets( 
					'scripts', 
					'script_limit', 
					\SCRIPT_LIMIT,
					$s
				);
				break;
			
			case 'meta':
				// Load custom meta tags
				$meta = config( 'default_meta', \DEFAULT_META );
				
				$store['meta']		= 
					\is_string( $meta ) ? decode( $meta ) : 
						[ 'meta' => $meta ];
				break;
			
			default:
				$store[$area]	= [];
		}
	}
	
	if ( empty( $modify ) ) {
		return $store[$area];
	}
	
	$store[$area] = 
	\array_unique( \array_merge( $store[$area], $modify ) );
	
	return $store[$area];
}

/**
 *  Get all the CSS classes of the given render segment
 *  
 *  @param string	$name	CSS applicable area
 *  @return array
 */
function getClasses( string $name ) : array {
	$cls	= rsettings( 'classes' );
	$n	= '{' . bland( $name, true ) . '}';
	$va	= [];
	foreach( $cls as $k => $v ) {
		if ( 0 != \strcmp( $n , $k ) ) {
			continue;
		}
		$va	= uniqueTerms( $v );
		break;
	}
	
	return $va;
}

/**
 *  Overwrite the CSS class(es) of a render segment
 *  
 *  @param string	$name	CSS applying segment name
 *  @param string	$value	CSS new CSS parameters
 */
function setClass( string $name, string $value ) {
	rsettings( 
		'classes', 
		[ '{' . bland( $name, true ) . '}' => bland( $value, true ) ] 
	);
}

/**
 *  Add a CSS class to render segment
 *  
 *  @param string	$name	CSS applying segment name
 *  @param string	$value	New CSS classes
 */
function addClass( string $name, string $value ) {
	$vls	= 
	\preg_split( 
		'/\s+/', $value, -1, \PREG_SPLIT_NO_EMPTY 
	);
	
	$cls	= \array_merge( getClasses( $name ), $vls );
	
	setClass( $name, \implode( ' ', \array_unique( $cls ) ) );
}

/**
 *  Remove a CSS class from the segment's class list
 *  
 *  @param string	$name	CSS segment name
 *  @param string	$value	Removing class(es)
 */
function removeClass( string $name, string $value ) {
	$vls	= 
	\preg_split( 
		'/\s+/', $value, -1, \PREG_SPLIT_NO_EMPTY 
	);
	
	$cls	= \array_diff( getClasses( $name ), $vls );
	setClass( $name, \implode( ' ', \array_unique( $cls ) ) );
}

/**
 *  Special tag rendering helper (scripts, links etc...)
 *  
 *  @param string	$tpl	Rendering template
 *  @param string	$label	Region placeholder
 *  @param string	$tag	Tag replacement template
 *  @param string	$region	Region setting name
 *  @return string
 */
function regionTags(
	string		$tpl,
	string		$label,
	string		$tag, 
	string		$region 
) : string {
	$rg	= rsettings( $region );
	$rgo	= '';
	
	switch( $region ) {
		// Render meta tags
		case 'meta':
			$i = config( 'meta_limit', \META_LIMIT, 'int' );
			foreach ( $rg['meta'] ?? [] as $k => $v ) {
				if ( $i < 0 ) {
					break;
				}
				$rgo .= render( $tag, $v );
				$i--;
			}
			break;
		
		default:
			foreach( $rg as $r ) {
				$rgo .= 
				render( $tag, [ 'url' => $r ] );
			}
	
	}
	
	return \strtr( $tpl, [ $label => $rgo ] );
}

/**
 *  Append values to placeholder terms used in templates
 *  
 *  @param array	$region		Placeholder > value pair
 */
function setRegion( array $region = [] ) {
	static $presets = [];
	
	if ( empty( $region ) ) {
		return $presets;
	}
	
	foreach ( $region as $k => $v ) {
		$presets[$k] = ( $presets[$k] ?? '' ) . $v;
	}
}

/**
 *  Find template {regions} set in the HTML
 *  Template regions must consist of letters, underscores, and no spaces
 *  
 *  @param string	$tpl	Raw HTML template without content yet
 *  @return array
 */
function findTplRegions( string $tpl ) : array {
	if ( \preg_match_all( '/(?<=\{)([a-z_]+)(?=\})/i', $tpl, $m ) ) {
		return $m[0];
	}
	return [];
}

/**
 *  Apply region preset content to placeolders in the given template
 *  
 *  @param string	$tpl	Page template
 *  @return string
 */
function renderRegions( string $tpl ) : string {
	
	// Stylesheets, JavaScript, and Meta tags
	$tpl	= 
	regionTags( $tpl, '{stylesheets}', \TPL_STYLE_TAG, 'styles' );
	
	$tpl	= 
	regionTags( $tpl, '{body_js}', \TPL_SCRIPT_TAG, 'scripts' );
	
	$tpl	= 
	regionTags( $tpl, '{meta_tags}', \TPL_META_TAG, 'meta' );
	
	$sa	= config( 'shared_assets', \SHARED_ASSETS );
	return \strtr( $tpl, [ '{shared_assets}' => $sa ] );
}

/**
 *  Format template with classes, assets, and language parameters
 *  
 *  @param string	$tpl	Rendering template
 *  @param array	$input	Placeholder replacements
 *  @param bool		$full	Complete render including regions if true
 *  @return string
 */
function render(
	string	$tpl,
	array	$input	= [],
	bool	$full		= false 
) : string {
	static $cache	= [];
	static $regions	= [];
	$key		= hash( 'sha1', ( string ) $full . $tpl );
	
	// Check cache
	if ( !isset( $cache[$key] ) ) {
		// Full render?
		$tpl		= $full ? 
			parseLang( renderRegions( $tpl ) ) : 
			parseLang( $tpl );
		
		// Apply component classes
		$cache[$key]	= 
		\strtr( $tpl, rsettings( 'classes' ) );
		
		// Find render regions
		$regions[$key]	= findTplRegions( $cache[$key] );
	}
	
	// Always set defaults
	$input['home']		= $input['home']	?? pageRoutePath();
	$input['feedlink']	= $input['feedlink']	?? pageRoutePath( 'feed' );
	$input['plugin_assets']	= 
		$input['plugin_assets'] ?? 
		slashPath( config( 'plugin_assets', \PLUGIN_ASSETS ), true );
	
	$out		= [];
	
	// Set content in regions or place empty string
	foreach( $regions[$key] as $k => $v ) {
		// Set render content or clear it
		$out['{' . $v .'}'] =  $input[$v] ?? '';
	}
	
	// Template render  event
	hook( [ 'templaterender', [ 
		'template'	=> $tpl,
		'input'		=> $input,
		'placeholders'	=> $out 
	] ] );
	
	$out	= hookArrayResult( 'templaterender', $out );
	
	// Parse appended
	$tpl		= parseLang( \strtr( $cache[$key], $out ) );
	
	// Finally set classes again
	return \strtr( $tpl, rsettings( 'classes' ) );
}


/**
 *  Generators
 */

/**
 *  Generate a random string ID based on given random bytes
 *  
 *  @param int		$bytes		Size of random bytes
 *  @return string
 */
function genId( int $bytes = 16 ) : string {
	return \bin2hex( \random_bytes( intRange( $bytes, 1, 16 ) ) );
}

/**
 *  Generate a system time based sqeuential random ID
 *  
 *  Note: Downgrading from PHP 7.3 to 7.2 may cause IDs to appear out 
 *  of sync
 *  
 *  @return string
 */
function genSeqId() : string {
	$t = ( string ) \hrtime( true );
	
	return 
	\base_convert( $t, 10, 16 ) . \genId();
}

/**
 *  Generate an alphanumeric string with 32 bytes of random data
 *  
 *  @return string
 */
function genAlphaNum() : string {
	return 
	\preg_replace( 
		'/[^[:alnum:]]/u', 
		'', 
		\base64_encode( \random_bytes( 32 ) ) 
	);
}

/**
 *  Generate a fixed length string in ASCII space, no special chars
 *  This is primarily a plugin helper
 *  
 *  @param int	$size	Code size between 1 and 24, inclusive
 *  @return string
 */
function genCodeKey( int $size = 24 ) : string {
	$size	= intRange( $size, 1, 24 );
	$code	= '';
	while ( strsize( $code ) < $size ) {
		$code .= genAlphaNum();
	}
	
	return truncate( $code, 0, $size );
}

/**
 *  Simple division helper for mixed content type numbers
 *  
 *  @param mixed	$n	Numerator value
 *  @param mixed	$d	Denominator value
 *  @param int		$prec	Decimal precision
 *  @return float
 */
function division( $n, $d, int $prec = 4 ) : float {
	
	if ( \is_numeric( $n ) && \is_numeric( $d ) ) {
		$fn = ( float ) $n;
		$fd = ( float ) $d;
		
		return ( $fd != 0 ) ? round( ( $fn / $fd ), $prec ) : 0.0;
	}
	return 0.0;
}


/**
 *  Get timezone offset from currently configured timezone 
 *  or default to 'America/New_York'
 *  
 *  @link https://www.php.net/manual/en/timezones.php
 *  
 *  @return int
 */
function timeZoneOffset() : int {
	static $ot;
	if ( isset( $ot ) ) {
		return $ot;
	}
	
	// Timezone from configuration
	$tz = config( 'timezone', \TIMEZONE );
	$dt = new \DateTime( 'now', new \DateTimeZone( 'UTC' ) );
	try {
		$dz = new \DateTimeZone( $tz );
		$ot = $dz->getOffset( $dt );
		
	} catch( \Exception $e ) { // Default fallback
		$dz = new \DateTimeZone( 'America/New_York' );
		$ot = $dz->getOffset( $dt );
	}
	
	$ot = ( false === $ot ) ? 0 : $ot;
	return $ot;
}

/**
 *  Find word or character count within a block of text
 *  
 *  @param string	$find	Raw text to match
 *  @param string	$mode	Word splitting mode
 *  @return int
 */
function wordcount( string $find, string $mode = '' ) : int {
	// Select split type
	switch( $mode ) {
		case 'dist':
			// Words seprated by non-letters and non-punctuation
			$pat = '/[^\p{L}\p{P}]+/u';
			break;
			
		case 'chars':
			// All characters
			$pat = '//u';
			break;
			
		case 'words':
			// Split into words separated by non-letter/num chars
			$pat = '/[^\p{L}\p{N}\-_\']+/u';
			break;

		default:
			// Simplest split by various separators. E.G. Space
			$pat = '/[\p{Z}]+/u';
	}
	
	$c = \preg_split( $pat, $find, -1, \PREG_SPLIT_NO_EMPTY );
	return ( false === $c ) ? 0 : count( $c );
}

/**
 *  Estimate reading time in minutes based on words/characters in a text block
 *  
 *  @param string $text Text input
 *  @return int
 */
function readingTime( string $text ) : int {
	static $sets;
	if ( !isset( $sets ) ) {
		// Default character and measurement sets
		$default = [
			// Matching type, average matches / minute, character pattern
			[ 'words', 230, '/[\p{Latin}\p{Greek}\p{Cyrillic}]/u' ],
			[ 'words', 250, '/[\p{Arabic}\p{Hebrew}]/u' ],
			
			[ 'chars', 1000, '/[\p{Han}\p{Hiragana}\p{Katakana}]/u' ]
		];
		
		// Send to hook for additional sets
		hook( [ 'readingtime', [ 'sets' => $default ] ] );
		$sets	= hookArrayResult( 'readingtime' )['sets'] ?? $default;
	}
	
	// Remove tags and trim
	$text	= bland( $text );
	if ( empty( $text ) ) {
		return 1;
	}
	
	// Default
	$speed	= 200;
	$set	= 'words';
	
	// Total characters
	$chars	= wordcount( $text, 'chars' );
	
	// Previous character count
	$prev	= 0;
	
	// Guess language type based on search chars to total chars ratio
	foreach( $sets as $k => $v ) {
		if ( !preg_match( $v[2], $text ) ) {
			continue;
		}
		
		// Character set found
		$m = \preg_split( $v[2], $text );
		if ( false === $m ) {
			continue;
		}
		
		$c = count( $m );
		if ( !$c ) { continue; }
		
		// Current character ratio exceeds previous? Set new defaults
		if ( ( $c / $chars ) > ( $prev / $chars ) ) {
			$set	= $v[0];
			$speed	= $v[1];
			$prev	= $c;
		}
	}
	
	// Always send back at least 1 minute reading time
	$rt = ( int ) ceil( wordcount( $text, $set ) / $speed );
	return ( $rt < 1 ) ? 1 : $rt;
}




/**
 *  Database
 */

/**
 *  Get the SQL definition from DSN
 *  
 *  @param string	$dsn	User defined database path
 *  @return array
 */
function loadSQL( string $dsn ) : array {
	// Get list of user-defined constants
	$cts	= \get_defined_constants( true );
	$my	= \array_flip( $cts['user'] );
	
	// Get the first component from the definition
	// E.G. "CACHE" from "CACHE_DATA"
	$def	= \explode( '_', $my[$dsn] )[0];
	
	// E.G. CACHE_SQL definition
	$src	= \constant( $def . '_SQL' ) ?? '';
	
	// If SQL isn't defined, try to load SQL file with the DSN
	if ( empty( $src ) ) {
		$src = loadFile( $dsn . '.sql' );
		if ( empty( $src ) ) {
			return [];
		}
	}
	
	// SQL Lines from defined component + "_SQL"
	return lines( $src, -1, false );
}

/**
 *  Create database tables based on DSN
 *  
 *  @param object	$db	PDO Database object
 *  @param string	$dsn	Database path associated with PDO object
 */
function installSQL( \PDO $db, string $dsn ) {
	$parse	= [];
	
	$lines	= loadSQL( $dsn );
	if ( empty( $lines ) ) {
		return;
	}
	
	// Filter SQL comments and lines starting PRAGMA
	foreach ( $lines as $l ) {
		if ( \preg_match( '/^(\s+)?(--|PRAGMA)/is', $l ) ) {
			continue;
		}
		$parse[] = $l;
	}
	
	// Separate into statement actions
	$qr	= \explode( '-- --', \implode( " \n", $parse ) );
	foreach ( $qr as $q ) {
		if ( empty( trim( $q ) ) ) {
			continue;
		}
		$db->exec( $q );
	}
}

/**
 *  Get database connection
 *  
 *  @param string	$dsn	Connection string
 *  @param string	$mode	Return mode
 *  @return mixed		PDO object if successful or else null
 */
function getDb( string $dsn, string $mode = 'get' ) {
	static $db	= [];
	
	switch( $mode ) {
		case 'close':	
			if ( isset( $db[$dsn] ) ) {
				$db[$dsn] = null;
				unset( $db[$dsn] );
			}
			return;
		
		case 'closeall':
			foreach( $db as $k => $v  ) {
				$db[$k] = null;
				unset( $db[$k] );
			}
			return;
		
		default:
			if ( empty( $dsn ) ) {
				return null;
			}
	}
	
	if ( isset( $db[$dsn] ) ) {
		return $db[$dsn];
	}
	
	// First time? SQLite database will be created
	$first_run	= !\file_exists( $dsn );
	$timeout	= config( 'data_timeout', \DATA_TIMEOUT, 'int' );
	$opts	= [
		\PDO::ATTR_TIMEOUT		=> $timeout,
		\PDO::ATTR_DEFAULT_FETCH_MODE	=> \PDO::FETCH_ASSOC,
		\PDO::ATTR_PERSISTENT		=> false,
		\PDO::ATTR_EMULATE_PREPARES	=> false,
		\PDO::ATTR_AUTOCOMMIT		=> false,
		\PDO::ATTR_ERRMODE		=> 
			\PDO::ERRMODE_EXCEPTION
	];
	
	try {
		$db[$dsn]	= 
		new \PDO( 'sqlite:' . $dsn, null, null, $opts );
	} catch ( \PDOException $e ) {
		logError( 
			'Error connecting to database ' . $dsn . 
			' Messsage: ' . $e->getMessage() ?? 'PDO Exception'
		);
		die();
	}
	
	// Preemptive defense
	$db[$dsn]->exec( 'PRAGMA quick_check;' );
	$db[$dsn]->exec( 'PRAGMA trusted_schema = OFF;' );
	$db[$dsn]->exec( 'PRAGMA cell_size_check = ON;' );
	
	// Prepare defaults if first run
	if ( $first_run ) {
		$db[$dsn]->exec( 'PRAGMA encoding = "UTF-8";' );
		$db[$dsn]->exec( 'PRAGMA page_size = "16384";' );
		$db[$dsn]->exec( 'PRAGMA auto_vacuum = "2";' );
		$db[$dsn]->exec( 'PRAGMA temp_store = "2";' );
		$db[$dsn]->exec( 'PRAGMA secure_delete = "1";' );
		
		// Load and process SQL
		installSQL( $db[$dsn], $dsn );
		
		// Instalation check
		$db[$dsn]->exec( 'PRAGMA integrity_check;' );
		$db[$dsn]->exec( 'PRAGMA foreign_key_check;' );
	}
	
	$db[$dsn]->exec( 'PRAGMA journal_mode = WAL;' );
	$db[$dsn]->exec( 'PRAGMA foreign_keys = ON;' );
	
	if ( $first_run ) {
		// Run db created hook
		hook( [ 'dbcreated', [ 'dbname' => $dsn ] ] );
	}
	
	return $db[$dsn];
}

/**
 *  Helper to get the result from a successful statement execution
 *  
 *  @param PDO		$db	Database connection
 *  @param array	$params	Parameters 
 *  @param string	$rtype	Return type
 *  @param PDOStatement	$stm	PDO prepared statement
 *  @return mixed
 */
function getDataResult( 
	\PDO		$db, 
	array		$params, 
	string		$rtype, 
	\PDOStatement	$stm 
) {
	$ok	= empty( $params ) ? 
			$stm->execute() : 
			$stm->execute( $params );
	
	switch ( $rtype ) {
		// Query with array return
		case 'results':
			return $ok ? $stm->fetchAll() : [];
		
		// Insert with ID return
		case 'insert':
			return $ok ? $db->lastInsertId() : 0;
		
		// Single column value
		case 'column':
			return $ok ? $stm->fetchColumn() : '';
		
		// Success status
		default:
			return $ok ? true : false;
	}
}

/**
 *  Get or create cached PDO Statements
 *  
 *  @param PDO		$db	Database connection
 *  @param string	$sql	Query string or statement
 *  @return mixed
 */
function statement( ?\PDO $db, ?string $sql ) {
	static $stmcache = [];
	if ( empty( $db ) && empty( $sql ) ) {
		\array_map( 
			function( $v ) { return null; }, 
			$stmcache 
		);
		return null;
	}
	
	if ( isset( $stmcache[$sql] ) ) {
		return $stmcache[$sql];
	}
	
	$stmcache[$sql] = $db->prepare( $sql );
	return $stmcache[$sql];
}

/**
 *  Shared data execution routine
 *  
 *  @param string	$sql	Database SQL
 *  @param array	$params	Parameters 
 *  @param string	$rtype	Return type
 *  @param string	$dsn	Database string
 *  @return mixed
 */
function dataExec(
	string		$sql,
	array		$params,
	string		$rtype,
	string		$dsn
) {
	$db	= getDb( $dsn );
	$res	= null;
	
	try {
		$stm	= statement( $db, $sql );
		$res	= getDataResult( $db, $params, $rtype, $stm );
		$stm->closeCursor();
		
	} catch( \PDOException $e ) {
		$stm	= null;
		shutdown( 'logError', $e->getMessage() ?? 'PDO Exception' );
		return null;
	}
	
	return $res;
}

/**
 *  Update or insert multiple database rows at once with single SQL
 *  
 *  @param string	$sql	Database SQL update query
 *  @param array	$params	Collection of query parameters
 *  @param string	$rtype	Return type
 *  @param string	$dsn	Database string
 *  @return array		Result status
 */
function dataBatchExec (
	string		$sql,
	array		$params,
	string		$rtype,
	string		$dsn		= \DATA
) : array {
	$db	= getDb( $dsn );
	$res	= [];
	
	try {
		if ( !$db->beginTransaction() ) {
			return false;
		}
		
		$stm	= statement( $db, $sql );
		foreach ( $params as $p ) {
			$res[]	= getDataResult( $db, $params, $rtype, $stm );
		}
		$stm->closeCursor();
		$db->commit();
		
	} catch( \PDOException $e ) {
		shutdown( 'logError', $e->getMessage() ?? 'PDO Exception' );
	}
	
	return $res;
}

/**
 *  Helper to turn a range of input values into an IN() parameter
 *  
 *  @example Parameters for [value1, value2] become "IN (:paramIn_0, :paramIn_1)"
 *  
 *  @param array	$values		Raw parameter values
 *  @param array	$params		PDO Named parameters sent back
 *  @param string	$prefix		SQL Prepended fragment prefix
 *  @param string	$prefix		SQL Appended fragment suffix
 *  @return string
 */
function getInParam(
	array		$values, 
	array		&$params, 
	string		$prefix		= 'IN (', 
	string		$suffix		= ')'
) : string {
	$sql	= '';
	$p	= '';
	$i	= 0;
	
	foreach ( $values as $v ) {
		$p		= ':paramIn_' . $i;
		$sql		.= $p .',';
		$params[$p]	= $v;
		
		$i++;
	}
	
	// Remove last comma and close parenthesis
	return $prefix . rtrim( $sql, ',' ) . $suffix;
}

/**
 *  Helper to detect and parse a 'settings' data type
 *  
 *  @param array	$results	Database result row
 */
function formatSettings( array $results ) {
	if ( empty( $results ) ) {
		return [];
	}
	
	foreach ( $results as $k => $v ) {
		
		if ( !\is_string( $k ) || \is_numeric( $k ) ) {
			continue;
		}
		
		// Settings type?
		if ( !\str_ends_with( \strtolower( $k ), 'settings' ) ) {
			continue;
		}
		// Can be decoded?
		if ( !\is_string( $v ) ) {
			continue;
		}
		
		$t = \trim( $v );
		// Check for brackets
		if ( 
			\str_starts_with( $t, '{' ) && 
			\str_ends_with( $t, '}' )
		) {
			$results[$k] = decode( $t );
		}
	}
	
	return $results;
} 

/**
 *  Get parameter result from database
 *  
 *  @param string	$sql	Database SQL query
 *  @param array	$params	Query parameters
 *  @param string	$dsn	Database string
 *  @return array		Query results
 */
function getResults(
	string		$sql, 
	array		$params		= [],
	string		$dsn		= \DATA
) : array {
	$res = dataExec( $sql, $params, 'results', $dsn );
	if ( empty( $res ) ) {
		return [];
	}
	
	return \is_array( $res ) ? 
		\array_map( 'formatSettings', $res ) : [];
}

/**
 *  Create database update
 *  
 *  @param string	$sql	Database SQL update query
 *  @param array	$params	Query parameters (required)
 *  @param string	$dsn	Database string
 *  @return bool		Update status
 */
function setUpdate(
	string		$sql,
	array		$params,
	string		$dsn		= \DATA
) : bool {
	$res = dataExec( $sql, $params, 'success', $dsn );
	return empty( $res ) ? false : true;
}

/**
 *  Insert record into database and return last ID
 *  
 *  @param string	$sql	Database SQL insert
 *  @param array	$params	Insert parameters (required)
 *  @param string	$dsn	Database string
 *  @return int			Last insert ID
 */
function setInsert(
	string		$sql,
	array		$params,
	string		$dsn		= \DATA
) : int {
	$res = dataExec( $sql, $params, 'insert', $dsn );
	return 
	empty( $res ) ? 0 : ( \is_numeric( $res ) ? ( int ) $res : 0 );
}

/**
 *  Get a single item row by ID
 *  
 *  @return array
 */
function getSingle(
	int		$id,
	string		$sql,
	string		$dsn		= \DATA
) : array {
	$data	= getResults( $sql, [ ':id' => $id ], $dsn );
	if ( empty( $data ) ) {
		return [];
	}
	return \is_array( $data[0] ) ? 
		formatSettings( $data[0] ) : $data[0];
}

/**
 *  Close the session and any open connections
 */
function cleanup() {
	hook( [ 'cleanup', [] ] );
	if ( \session_status() === \PHP_SESSION_ACTIVE ) {
		\session_write_close();
	}
	
	statement( null, null );
	getDb( '', 'closeall' );
	saveConfig();
}


/**
 *  Caching
 */

/**
 *  Generate cache key for the given URI
 *  This function lets caches be invalidated if config.json has been modified
 *  
 *  @param string	$uri		Original, URI as cache key
 *  @return string
 */
function genCacheKey( string $uri ) : string {
	static $fm;
	
	if ( !isset( $fm ) ) {
		$cf	= \CACHE . \CONFIG;
		$fm	= \file_exists( $cf ) ? \filemtime( $cf ) : false;
	}
	
	return 
	\hash( 'sha256', ( false === $fm ) ? $uri : $uri . ( string ) $fm );
}

/**
 *  Get cached data (if any) by URI key
 *  
 *  @param string	$uri		Original URI to check
 *  @return string
 */
function getCache( string $uri ) : string {
	$key	= genCacheKey( $uri );
	hook( [ 'getcache', [ 'uri' => $uri, 'key' => $key ] ] );
	
	$find	= 
	getResults( 
		"SELECT cache_id, content, expires 
		FROM caches WHERE cache_id = :id LIMIT 1;", 
		[ ':id' => $key ], 
		\CACHE_DATA 
	);
	
	if ( empty( $find ) ) {
		return '';
	}
	
	// Find expiration
	$row	= $find[0];
	$exp	= \strtotime( $row['expires'] );
	
	// Formatting went wrong?
	if ( false === $exp ) {
		return '';
	}
	
	// Send if TTL 
	if ( $exp >= time() ) {
		return $row['content'];
	}
	
	return '';
}

/**
 *  Save content to cache
 *  
 *  @param string	$uri		URI to set cache to
 *  @param string	$content	Cache data
 */
function saveCache( string $uri, string $content ) {
	$key	= genCacheKey( $uri );
	hook( [ 'savecache', [ 'uri' => $uri, 'key' => $key, 'content' => $content ] ] );
	
	$sql	= 
	"REPLACE INTO caches ( cache_id, ttl, content )
		VALUES ( :id, :ttl, :content );";
	
	$ttl	= config( 'cache_ttl', \CACHE_TTL, 'int' );
	setInsert(
		$sql, 
		[
			':id'		=> $key, 
			':ttl'		=> $ttl, 
			':content'	=> $content 
		], 
		\CACHE_DATA 
	);
	
	// Schedule cleanup
	shutdown( 'cleanup' );
}




/**
 *  Session functions
 */

/**
 *  Set the cookie options when defaults are/aren't specified
 *  
 *  @param array	$options	Additional cookie options
 *  @return array
 */
function defaultCookieOptions( array $options = [] ) : array {
	$cexp	= config( 'cookie_exp', \COOKIE_EXP, 'int' );
	$cpath	= config( 'cookie_path', \COOKIE_PATH );
	
	$opts	= 
	\array_merge( $options, [
		'expires'	=> 
			( int ) ( $options['expires'] ?? time() + $cexp ),
		'path'		=> $cpath,
		'domain'	=> getHost(),
		'samesite'	=> 'Strict',
		'secure'	=> isSecure() ? true : false,
		'httponly'	=> true
	] );
	
	hook( [ 'cookieparams', $opts ] );
	return $opts;
}

/**
 *  Get collective cookie data
 *  
 *  @param string	$name		Cookie label name
 *  @param mixed	$default	Default return if cookie isn't set
 *  @return mixed
 */
function getCookie( string $name, $default ) {
	$app = appName();
	if ( !isset( $_COOKIE[$app] ) ) {
		return $default;
	}
	
	if ( !is_array( $_COOKIE[$app]) ) {
		return $default;
	}
	
	return $_COOKIE[$app][$name] ?? $default;
}

/**
 *  Set application cookie
 *  
 *  @param int		$name		Cookie data label
 *  @param mixed	$data		Cookie data
 *  @param array	$options	Cookie settings and options
 *  @return bool
 */
function makeCookie( string $name, $data, array $options = [] ) : bool {
	$options	= defaultCookieOptions( $options );
	
	hook( [ 'cookieset', [ 
		'name'		=> $name, 
		'data'		=> $data, 
		'options'	=> $options 
	] ] );
	return 
	\setcookie( appName() . "[$name]", $data, $options );
}

/**
 *  Remove preexisting cookie
 *  
 *  @param string	$name		Cookie label
 *  @return bool
 */
function deleteCookie( string $name ) : bool {
	hook( [ 'cookiedelete', [ 'name' => $name ] ] );
	return makeCookie( $name, '', [ 'expires' => 1 ] );
}

/**
 *  Set session handler functions
 */
function setSessionHandler() {
	\session_set_save_handler(
		'sessionOpen', 
		'sessionClose', 
		'sessionRead', 
		'sessionWrite', 
		'sessionDestroy', 
		'sessionGC', 
		'sessionCreateID'
	);	
}

/**
 *  Does nothing
 */
function sessionOpen( $path, $name ) { return true; }
function sessionClose() { return true; }

/**
 *  Create session ID in the database and return it
 *  
 *  @return string
 */
function sessionCreateID() {
	$bt	= config( 'session_bytes', \SESSION_BYTES, 'int' );
	$id	= \genId( $bt );
	$sql	= 
	"INSERT OR IGNORE INTO sessions ( session_id )
		VALUES ( :id );";
	if ( dataExec( $sql, [ ':id' => $id ], 'success', \SESSION_DATA ) ) {
		return $id;
	}
	
	// Something went wrong with the database
	logError( 'Error writing to session ID to database' );
	die();
}

/**
 *  Delete session
 *  
 *  @return bool
 */
function sessionDestroy( $id ) {
	$sql	= "DELETE FROM sessions WHERE session_id = :id;";
	if ( dataExec( $sql, [ ':id' => $id ], 'success', \SESSION_DATA ) ) {
		return true;
	}
	return false;
}
	
/**
 *  Session garbage collection
 *  
 *  @return bool
 */
function sessionGC( $max ) {
	$sql	= 
	"DELETE FROM sessions WHERE (
		strftime( '%s', 'now' ) - 
		strftime( '%s', updated ) ) > :gc;";
	if ( dataExec( $sql, [ ':gc' => $max ], 'success', \SESSION_DATA ) ) {
		return true;
	}
	return false;
}
	
/**
 *  Read session data by ID
 *  
 *  @return string
 */
function sessionRead( $id ) {
	$sql	= 
	"SELECT session_data FROM sessions 
		WHERE session_id = :id LIMIT 1;";
	
	$data	= dataExec( $sql, [ 'id' => $id ], 'column', \SESSION_DATA );
	
	hook( [ 'sessionread', [ 'id' => $id, 'data' => $data ] ] );
	return empty( $data ) ? '' : ( string ) $data;
}

/**
 *  Store session data
 *  
 *  @return bool
 */
function sessionWrite( $id, $data ) {
	$sql	= "REPLACE INTO sessions ( session_id, session_data )
			VALUES( :id, :data );";
	if ( dataExec( 
		$sql, [ ':id' => $id, ':data' => $data ], 'success', \SESSION_DATA 
	) ) {
		hook( [ 'sessionwrite', [ 'id' => $id, 'data' => $data ] ] );
		return true;
	}
	return false;
}


/**
 *  Session functionality
 */

	
/**
 *  Session owner and staleness marker
 *  
 *  @link https://paragonie.com/blog/2015/04/fast-track-safe-and-secure-php-sessions
 *  
 *  @param string	$visit	Previous random visitation identifier
 */
function sessionCanary( string $visit = '' ) {
	$bt	= config( 'session_bytes', \SESSION_BYTES, 'int' );
	$exp	= config( 'session_exp', \SESSION_EXP, 'int' );
	
	$_SESSION['canary'] = 
	[
		'exp'		=> time() + $exp,
		'visit'		=> 
		empty( $visit ) ? \genId( $bt ) : $visit
	];
}
	
/**
 *  Check session staleness
 *  
 *  @param bool		$reset	Reset session and canary if true
 */
function sessionCheck( bool $reset = false ) {
	session( $reset );
	
	if ( empty( $_SESSION['canary'] ) ) {
		sessionCanary();
		return;
	}
	
	if ( time() > ( int ) $_SESSION['canary']['exp'] ) {
		$visit = $_SESSION['canary']['visit'];
		\session_regenerate_id( true );
		sessionCanary( $visit );
	}
}

/**
 *  End current session activity
 */
function cleanSession() {
	if ( \session_status() === \PHP_SESSION_ACTIVE ) {
		\session_unset();
		\session_destroy();
		\session_write_close();
	}
}

/**
 *  Set session cookie parameters
 *  
 *  @return bool
 */
function sessionCookieParams() : bool {
	$options		= defaultCookieOptions();
	
	// Override some defaults
	$options['lifetime']	=  
		config( 'cookie_exp', \COOKIE_EXP, 'int' );
	unset( $options['expires'] );
	
	hook( [ 'sessioncookieparams', $options ] );
	return \session_set_cookie_params( $options );
}

/**
 *  Initiate a session if it doesn't already exist
 *  Optionally reset and destroy session data
 *  
 *  @param bool		$reset		Reset session ID if true
 */
function session( $reset = false ) {
	if ( \session_status() === \PHP_SESSION_ACTIVE && !$reset ) {
		return;
	}
	
	if ( \session_status() !== \PHP_SESSION_ACTIVE ) {
		\session_cache_limiter( '' );
		
		sessionCookieParams();
		\session_name( appName() );
		\session_start();
		
		hook( [ 'sessioncreated', [ 'id' => \session_id() ] ] );
	}
	
	if ( $reset ) {
		\session_regenerate_id( true );
		foreach ( \array_keys( $_SESSION ) as $k ) {
			unset( $_SESSION[$k] );
		}
		
		hook( [ 'sessiondestroyed', [] ] );
	}
}

/**
 *  Session ID helper 
 *  
 *  @return string
 */
function sessionID() : string {
	sessionCheck();
	return \session_id();
}


/**
 *  Mark certain URIs as disabled for throttling
 * 
 *  @param mixed	$path	Disabled path(s)
 */
function throttleDisabled( $path = null ) {
	static $uris = [];
	if ( null === $path ) {
		return $uris;
	}
	
	if ( \is_array( $path ) ) {
		$uris = \array_merge( $uris, $path );
	} elseif ( \is_string( $path ) ) {
		$uris[] = $path;
	} else {
		return;
	}
	
	$uris	= \array_unique( $uris );
}

/**
 *  Last visit session data and timeouts
 *  
 *  @return int
 */
function lastVisit() : int {
	$now	= time();

	// Default return state
	$check 	= \SESSION_STATE_FRESH;
	
	// Check for generally safe extensions requested or throttle disabled uri
	$uri	= getURI();
	$nice	= isSafeExt( $uri ) || textStartsWith( $uri, throttleDisabled( null ) );
	
	// First visit?
	$last	= $_SESSION['last'] ?? [];
	if ( empty( $last ) ) {
		$last			= [ $now, 0 ];
		$_SESSION['last']	= $last;
		hook( [ 'lastvisit', [ 
			'check'	=> $check, 
			'last'	=> $last,
			'now'	=> $now,
			'ext'	=> $nice
		] ] );
		return $check;
	}
	
	// Session corrupted?
	if ( !\is_array( $last ) || \count( $last ) !== 2 ) {
		$last			= [ $now, 0 ];
		$_SESSION['last']	= $last;
		$check			= \SESSION_STATE_CORRUPT;
		hook( [ 'lastvisit', [ 
			'check'	=> $check, 
			'last'	=> $last,
			'now'	=> $now,
			'ext'	=> $nice
		] ] );
		return $check;
	}
	
	// Timestamp segments
	$t	= ( int ) ( $last[0] ?? time() );
	$q	= ( int ) ( $last[1] ?? 0 );
	
	// Rapid query limit exceeded?
	$slc = config( 'session_limit_count', \SESSION_LIMIT_COUNT, 'int' );
	if ( $q >= $slc ) {
		$exp	= config( 'session_exp', \SESSION_EXP, 'int' );
		// Delay has timed out? Reset
		if ( ( $t + $exp ) > $now ) {
			$last			= [ $now, 0 ];
			$_SESSION['last']	= $last;
		
		// Generally safe extension?
		} elseif ( $nice ) {
			// Return as-is
			hook( [ 'lastvisit', [ 
				'check'	=> $check, 
				'last'	=> $last,
				'now'	=> $now,
				'ext'	=> $nice
			] ] );
			return $check;
			
		// Still within limit
		// Set time, but keep query limit
		} else {
			$last			= [ $now, $q ];
			$_SESSION['last']	= $last;
			$check			= \SESSION_STATE_LIGHT;
		}
	} else {
		$slh = config( 'session_limit_heavy', \SESSION_LIMIT_HEAVY, 'int' );
		$slm = config( 'session_limit_medium', \SESSION_LIMIT_MEDIUM, 'int' );
		// Generally safe extension?
		if ( $nice ) {
			hook( [ 'lastvisit', [ 
				'check'	=> $check, 
				'last'	=> $last,
				'now'	=> $now,
				'ext'	=> $nice
			] ] );
			return $check;
		
		// Last request less than heavy throttle limit?
		// Probably abuse
		} elseif ( \abs( $now - $t ) < $slh ) {
			$last			= [ $now, $q++ ];
			$_SESSION['last']	= $last;
			$check			= \SESSION_STATE_HEAVY;
			
		// Less than medium throttle limit?
		// Probably just impatient
		} elseif ( \abs( $now - $t ) < $slm ) {
			$last			= [ $now, $q ];
			$_SESSION['last']	= $last;
			$check			= \SESSION_STATE_MEDIUM;
		
		// No limits exceeded. Reset
		} else {
			$last			= [ $now, 0 ];
			$_SESSION['last']	= $last;
		}
	}
	hook( [ 'lastvisit', [ 
		'check'	=> $check, 
		'last'	=> $last,
		'now'	=> $now,
		'ext'	=> $nice
	] ] );
	return $check;
}

/**
 *  Limit requests per session
 */
function sessionThrottle() {
	// Check session
	sessionCheck();
	
	// Sender should not be served for the duration of this session
	if ( isset( $_SESSION['kill'] ) ) {
		sendDenied();
	}
	
	$check		= lastVisit();
	
	// Increase sleep delay
	switch( $check ) {
		// Send Too Many Requests
		case SESSION_STATE_HEAVY:
			visitorError( 429, 'Requests' );
			shutdown( 'cleanup' );
			shutdown( 'sleep', 20 );
			sendError( 429, errorLang( "toomany", \MSG_TOOMANY ) );
			
		// Send Not Modified for the rest
		case SESSION_STATE_MEDIUM:
			shutdown( 'cleanup' );
			shutdown( 'sleep', 10 );
			send( 304 );
			
		case SESSION_STATE_LIGHT:
			shutdown( 'cleanup' );
			shutdown( 'sleep', 5 );
			send( 304 );
	}
}



/**
 *  Content formatting
 */

/**
 *  Convert timestamp to int if it's not in integer format
 *  
 *  @return mixed
 */
function tstring( $stamp ) {
	if ( empty( $stamp ) ) {
		return null;
	}
	
	if ( \is_numeric( $stamp ) ) {
		return ( int ) $stamp;
	}
	
	$st =  \ltrim( 
		\preg_replace( '/[^0-9\/]+/', '', $stamp ), 
		'/' 
	);
	
	return \strtotime( empty( $st ) ? 'now' : $st );
}

/**
 *  UTC timestamp
 *  
 *  @param mixed	$stamp	Plain timestamp or null to generate new
 *  @return string
 */
function utc( $stamp = null ) : string {
	return 
	\gmdate( 'Y-m-d\TH:i:s', tstring( $stamp ?? 'now' ) );
}

/**
 *  Length of given string
 *  
 *  @param string	$text	Raw input
 *  @return int
 */
function strsize( string $text ) : int {
	return missing( 'mb_strlen' ) ? 
		\strlen( $text ) : \mb_strlen( $text, '8bit' );
}

/**
 *  Limit string size
 *  
 *  @param string	$text	Raw input
 *  @param int		$start	Beginning index
 *  @param int		$size	Maximum string length
 *  @return string
 */
function truncate( string $text, int $start, int $size ) {
	if ( strsize( $text ) <= $size ) {
		return $text;
	}
	
	return missing( 'mb_substr' ) ? 
		\substr( $text, $start, $size ) : 
		\mb_substr( $text, $start, $size, '8bit' );
}

/**
 *  Try to detect if a string contains ASCII-only text
 *  
 *  @param string	$text		Text to test
 *  @return bool
 */
function isASCII( string $text ) : bool {
	return missing( 'mb_check_encoding' ) ? 
		( bool ) !\preg_match( '/[^\x20-\x7e]/' , $text ) : 
		\mb_check_encoding( $text, 'ASCII' );
}

/**
 *  Check if a string contains a fragment
 *  
 *  @param mixed	$source		Original text
 *  @param string	$term		Search term
 */
function textHas( $source, string $term ) : bool {
	return 
	( empty( $source ) || empty( $term ) ) ? 
		false : \str_contains( ( string ) $source, $term );
}

/**
 *  Check if string starts with a fragment
 *  
 *  @param string	$find		Needle to search
 *  @param array	$collection	Haystack to search partials for
 *  @param bool		$ca		Case insensitive if true (default)
 *  @return bool
 */
function textStartsWith( string $find, array $collection, bool $ca = true ) {
	if ( $ca ) {
		$find = \strtolower( $find );
		foreach ( $collection as $c ) {
			if ( \str_starts_with( $find, \strtolower( $c ) ) ) {
				return true;
			}
		}
		return false;
	}
	
	foreach ( $collection as $c ) {
		if ( \str_starts_with( $find, $c ) ) {
			return true;
		}
	}
	return false;
}

/**
 *  Search string for a fragment in an array
 *  
 *  @param string	$find		Needle to search
 *  @param array	$collection	Haystack to search contained string
 *  @return bool
 */
function textNeedleSearch( string $find, array $collection ) : bool {
	foreach ( $collection as $c ) {
		if ( textHas( $find, $c ) ) {
			return true;
		}
	}
	
	return false;
}

/**
 *  Friendly datetime stamp
 *  
 *  @param mixed	$stamp		Raw datetime stamp, defaults to now
 *  @param string	$fmt		Format from config.json or [lang].json
 *  @return string
 */
function dateNice( $stamp = null, string $fmt = \DATE_NICE ) : string {
	static $dn;
	if ( !isset( $dn ) ) {
		$dn	= 
		langVar( 'date_nice', config( 'date_nice', $fmt ) );
	}
	return \gmdate( $dn, tstring( $stamp ) );
}

/**
 *  Build permalink with page slug with date
 *  
 *  @param string	$slug		Full page URI including date and slug
 *  @param string	$stamp		Converted timestamp in year, month, and day
 *  @return string
*/
function dateSlug( string $slug, string $stamp ) : string {
	$ext = 
	'.' . \pathinfo( $slug, \PATHINFO_EXTENSION ) ?? 'md';
	
	return getRoot() . 
	\gmdate( 'Y/m/d/', \strtotime( $stamp ) ) . 
	\ltrim( \basename( $slug, $ext ), '/' );
}

/**
 *  Feed timestamp
 *  
 *  @param mixed	$stamp		Optional timestamp, defaults to 'now'
 *  @return string
 */
function dateRfc( $stamp = null ) : string {
	return 
	\gmdate( \DATE_RFC2822, tstring( $stamp ?? 'now' ) );
}

/**
 *  File modified timestamp
 *  
 *  @param mixed	$stamp		Optional timestamp, defaults to 'now'
 *  @return string
 */
function dateRfcFile( $stamp = null ) : string {
	return 
	\gmdate( 'D, d M Y H:i:s T', tstring( $stamp ?? 'now' ) );
}

/**
 *  Convert all spaces to single character
 *  
 *  @param string	$text		Raw text containting mixed space types
 *  @param string	$rpl		Replacement space, defaults to ' '
 *  @param string	$br		Preserve line breaks
 *  @return string
 */
function unifySpaces( string $text, string $rpl = ' ', bool $br = false ) : string {
	return $br ?
		\preg_replace( 
			'/[ \t\v\f]+/', $rpl, pacify( $text ) 
		) : 
		\preg_replace( '/[[:space:]]+/', $rpl, pacify( $text ) );
}

/**
 *  Get a list of tokens separated by spaces
 *  
 *  @param string	$text		Raw text containing repeated words
 *  @return array
 */
function uniqueTerms( string $value ) : array {
	return 
	\array_unique( 
		\preg_split( 
			'/[[:space:]]+/', trim( $value ), -1, 
			\PREG_SPLIT_NO_EMPTY 
		) 
	);
}

/**
 *  Clean entry title
 *  
 *  @param mixed	$title	Raw title entered by the user
 *  @param int		$max	Maximum string length
 *  @return string
 */
function title( $text, int $max = 255 ) : string {
	if ( \is_array( $text ) ) {
		return '';
	}
	
	// Unify spaces, tabs, returns etc...
	return 
	smartTrim( unifySpaces( ( string ) $text ), $max );
}

/**
 *  Normalize unicode characters
 *  
 *  This depends on the Intl extension (usually comes with PHP), 
 *  but needs to be enabled in php.ini
 *  @link https://www.php.net/manual/en/intl.installation.php
 *  
 *  @param string	$text
 *  @return string 
 */
function normal( string $text ) : string {
	if ( missing( 'normalizer_normalize' ) ) {
		return $text;
	}
	
	$normal = 
	\normalizer_normalize( $text, \Normalizer::FORM_C );
	
	return ( false === $normal ) ? $text : $normal;
}

/**
 *  Label name ( ASCII only )
 *  
 *  @param string	$text	Raw label entered into field
 *  @return string
 */
function labelName( string $text ) : string {
	$text	= unifySpaces( $text, '_' );
	
	return 
	smartTrim( \preg_replace( 
		'/[^a-z0-9_\-\.]/i', '', normal( $text ) 
	), 50 );
}

/**
 *  Process multiple comma delimited whitelists and filter label names
 *  
 *  @param array	$groups		Raw key-value pairs
 *  @param bool		$lower		Values should be lowercase lists
 *  @return array
 */ 
function whiteLists( array $groups, bool $lower = false ) : array {
	$ext = [];
	
	foreach ( $groups as $k => $v ) { 
		$ext[labelName( $k )] = 
		\implode( ',', trimmedList( $v, $lower ) );
	}
	
	return $ext;
}

/**
 *  Convert to unicode lowercase
 *  
 *  @param string	$text	Raw mixed/uppercase text
 *  @return string
 */
function lowercase( string $text ) : string {
	return missing( 'mb_convert_case' ) ? 
		\strtolower( $txt ) : 
		\mb_convert_case( $text, \MB_CASE_LOWER, 'UTF-8' );
}

/**
 *  Limit a string without cutting off words
 *  
 *  @param string	$val	Text to cut down
 *  @param int		$max	Content length (defaults to 100)
 *  @return string
 */
function smartTrim(
	string		$val, 
	int		$max		= 100
) : string {
	$val	= \trim( $val );
	$len	= strsize( $val );
	
	if ( $len <= $max ) {
		return $val;
	}
	
	$out	= '';
	$words	= \preg_split( '/([\.\s]+)/', $val, -1, 
			\PREG_SPLIT_OFFSET_CAPTURE | 
			\PREG_SPLIT_DELIM_CAPTURE );
	
	for ( $i = 0; $i < \count( $words ); $i++ ) {
		$w	= $words[$i];
		// Add if this word's length is less than length
		if ( $w[1] <= $max ) {
			$out .= $w[0];
		}
	}
	
	$out	= \preg_replace( "/\r?\n/", '', $out );
	
	// If there's too much overlap
	if ( strsize( $out ) > $max + 10 ) {
		$out = truncate( $out, 0, $max );
	}
	
	return $out;
}

/**
 *  Convert a string into a page slug
 *  
 *  @param string	$title	Fallback title to generate slug
 *  @param string	$text	Text to transform into a slug
 *  @return string
 */
function slugify( 
	string		$title, 
	string		$text		= ''
) : string {
	if ( empty( $text ) ) {
		$text = $title;
	}
	$text = lowercase( unifySpaces( $text ) );
	$text = \preg_replace( '~[^\\pL\d]+~u', ' ', $text );
	$text = \preg_replace( '/\s+/', '-', \trim( $text ) );
	$text = \preg_replace( '/\-+/', '-', \trim( $text, '-' ) );
	
	return \strtolower( smartTrim( $text ) );
}


/**
 *  Filtering
 */

/**
 *  Apply uniform encoding of given text to UTF-8
 *  
 *  @param string	$text	Raw input
 *  @param bool		$ignore Discard unconvertable characters (default)
 *  @return string
 */
function utf( string $text, bool $ignore = true ) : string {
	$out = $ignore ? 
		\iconv( 'UTF-8', 'UTF-8//IGNORE', $text ) : 
		\iconv( 'UTF-8', 'UTF-8', $text );
	
	return ( false === $out ) ? '' : $out;
}

/**
 *  Strip unusable characters from raw text/html and conform to UTF-8
 *  
 *  @param string	$html	Raw content body to be cleaned
 *  @param bool		$entities Convert to HTML entities
 *  @return string
 */
function pacify( 
	string		$html, 
	bool		$entities	= false 
) : string {
	$html		= utf( \trim( $html ) );
	
	// Remove control chars except linebreaks/tabs etc...
	$html		= 
	\preg_replace(
		'/[\x00-\x08\x0B\x0C\x0E-\x1F\x80-\x9F]/u', '', $html
	);
	
	// Non-characters
	$html		= 
	\preg_replace(
		'/[\x{fdd0}-\x{fdef}]/u', '', $html
	);
	
	// UTF unassigned, formatting, and half surrogate pairs
	$html		= 
	\preg_replace(
		'/[\p{Cs}\p{Cf}\p{Cn}]/u', '', $html
	);
		
	// Convert Unicode character entities?
	if ( $entities && !missing( 'mb_convert_encoding' ) ) {
		$html	= 
		\mb_convert_encoding( 
			$html, 'HTML-ENTITIES', 'UTF-8' 
		);
	}
	
	return \trim( $html );
}

/**
 *  HTML safe character entities in UTF-8
 *  
 *  @param string	$v	Raw text to turn to HTML entities
 *  @param bool		$quotes	Convert quotes (defaults to true)
 *  @param bool		$spaces	Convert spaces to "&nbsp;*" (defaults to true)
 *  @return string
 */
function entities( 
	string		$v, 
	bool		$quotes	= true,
	bool		$spaces	= true
) : string {
	if ( $quotes ) {
		$v	=
		\htmlentities( 
			utf( $v, false ), 
			\ENT_QUOTES | \ENT_SUBSTITUTE, 
			'UTF-8'
		);
	} else {
		$v =  \htmlentities( 
			utf( $v, false ), 
			\ENT_NOQUOTES | \ENT_SUBSTITUTE, 
			'UTF-8'
		);
	}
	if ( $spaces ) {
		return 
		\strtr( $v, [ 
			' ' => '&nbsp;',
			'	' => '&nbsp;&nbsp;&nbsp;&nbsp;'
		] );
	}
	return $v;
}

/**
 *  Filter URL
 *  This is not a 100% foolproof method, but it's better than nothing
 *  
 *  @param string	$txt	Raw URL attribute value
 *  @param bool		$xss	Filter XSS possibilities
 *  @return string
 */
function cleanUrl( 
	string		$txt, 
	bool		$xss		= true
) : string {
	// Nothing to clean
	if ( empty( $txt ) ) {
		return '';
	}
	
	// Default filter
	if ( \filter_var( $txt, \FILTER_VALIDATE_URL ) ) {
		// XSS filter
		if ( $xss ) {
			if ( !\preg_match( RX_URL, $txt ) ){
				return '';
			}	
		}
		
		if ( 
			\preg_match( RX_XSS2, $txt ) || 
			\preg_match( RX_XSS3, $txt ) || 
			\preg_match( RX_XSS4, $txt ) 
		) {
			return '';
		}
		
		// Return as/is
		return  $txt;
	}
	
	return entities( $txt, false, false );
}

/**
 *  Simple email address filter helper
 *  
 *  @param string	$email	Raw email (currently doesn't support Unicode domains)
 *  @return string
 */
function cleanEmail( ?string $email = null ) : string {
	return 
	empty( $email ) ? '' : (
		\filter_var( $email, \FILTER_VALIDATE_EMAIL ) ? 
		$email : ''
	);
}

/**
 *  Prepend given prefix to URLs starting with '/'
 *  
 *  @param string	$url	Raw URL path
 *  @param string	$prefix	Prefix to prepend if $url starts with '/'
 *  @return string
 */
function prependPath( string $v, string $prefix ) : string {
	$v = trim( $v, '"\'' );
	return \preg_match( '/^\//', $v ) ?
		cleanUrl( $prefix . $v ) : cleanUrl( $v );
}

/**
 *  Form encoding type helper, defaults to application/x-www-form-urlencoded
 *  
 *  @param string	$v	Raw encoding type
 *  @return string
 */
function cleanFormEnctype( string $v ) : string {
	static $ft = [
		'application/x-www-form-urlencoded',
		'multipart/form-data',
		'text/plain'
	];
	
	$v = \strtolower( trim( $v ) );
	return \in_array( $v, $ft ) ?
		$v : 'application/x-www-form-urlencoded';
}

/**
 *  Filter form sending method type, defaults to get or post
 *  
 *  @param string	$v	Raw form method
 *  @return string
 */
function cleanFormMethodType( string $v ) : string {
	static $fm = [ 'get', 'post' ];
	
	$v = \strtolower( trim( $v ) );
	return \in_array( $v, $fm ) ? $v : 'get';
}

/**
 *  Clean DOM node attribute against whitelist
 *  
 *  @param DOMNode	$node	Object DOM Node
 *  @param array	$white	Whitelist of allowed tags and params
 *  @param string	$prefix	URL prefix to prepend text
 */
function cleanAttributes(
	\DOMNode	&$node,
	array		$white,
	string		$prefix	= ''
) {
	if ( !$node->hasAttributes() ) {
		return null;
	}
	
	foreach ( 
		\iterator_to_array( $node->attributes ) as $at
	) {
		$n = $at->nodeName;
		$v = $at->nodeValue;
		
		// Default action is to remove attribute
		// It will only get added if it's safe
		$node->removeAttributeNode( $at );
		if ( \in_array( $n, $white[$node->nodeName] ) ) {
			switch ( $n ) {
				case 'longdesc':
				case 'url':
				case 'src':
				case 'data-src':
				case 'href':
				case 'action':
					// Use prefix for relative paths
					$v = prependPath( $v, $prefix );
					break;
				
				// Form-specific extras
				case 'method':
					$v = cleanFormMethodType( $v );
					break;
				
				case 'enctype':
					$v = cleanFormEnctype( $v );
					break;
				
				case 'pattern':
					$v = 
					\preg_replace( 
						'/[^[:alnum:]_\-\{\}\[\]\/\+\.\s]/', 
						'', $v
					);
					break;
					
				default:
					$v = entities( $v, false, false );
			}
			
			$node->setAttribute( $n, $v );
		}
	}
}

/**
 *  Scrub each node against white list
 *  @param DOMNode	$node	Document element node to filter
 *  @param array	$white	Whitelist of allowed tags and params
 *  @param string	$prefix	URL prefix to prepend text
 *  @param array	$flush	Elements to remove from document
 */
function scrub(
	\DOMNode	$node,
	array		$white,
	string		$prefix,
	array		&$flush		= []
) {
	if ( isset( $white[$node->nodeName] ) ) {
		// Clean attributes first
		cleanAttributes( $node, $white, $prefix );
		if ( $node->childNodes ) {
			// Continue to other tags
			foreach ( $node->childNodes as $child ) {
				scrub( $child, $white, $prefix, $flush );
			}
		}
		
	} elseif ( $node->nodeType == \XML_ELEMENT_NODE ) {
		// This tag isn't on the whitelist
		$flush[] = $node;
	}
}

/**
 * Convert an unformatted text block to paragraphs
 * 
 * @link http://stackoverflow.com/a/2959926
 * @param string	$val		Filter variable
 * @param bool		$skipCode	Ignore code blocks
 */
function makeParagraphs( $val, $skipCode = false ) {
	// Escape excluded markdown-sensitive characters
	static $esc	= [
		'\\#'	=> '&#35;',
		'\\*'	=> '&#42;',
		'\\-'	=> '&#45;',
		'\\:'	=> '&#58;',
		'\\>'	=> '&#62;',
		'\\['	=> '&#91;',
		'\\]'	=> '&#93;',
		'\\`'	=> '&#96;',
		'\\~'	=> '&#126;'
	];
	$out = \strtr( $val, $esc );
	
	// Escape block level code first
	if ( !$skipCode ) {
		// Format inside code tags
		$out = \preg_replace_callback( '/<code>(.*)<\/code>/ism',
		function ( $m ) {
			if ( empty( $m[1] ) ) {
				return '';
			}
			return 
			\strtr( template( 'tpl_codeblock' ), [ 
				'{code}' => entities( \trim( $m[1] ), false, false )
			] );
		}, $out );	
	}
	
	$filters	= 
	[
		// Turn consecutive line breaks to new paragraph
		'#\s{2,}\n|\n{2}#'		=>
		function( $m ) {
			return '</p><p>';
		},
		
		// Turn consecutive <br>s to paragraph breaks
		'#(?:<br\s*/?>\s*?){2,}#'	=>
		function( $m ) {
			return '</p><p>';
		},
		
		// Remove <br> abnormalities
		'#<p>(\s*<br\s*/?>)+#'		=> 
		function( $m ) {
			return '</p><p>';
		},
		
		'#<br\s*/?>(\s*</p>)+#'		=> 
		function( $m ) {
			return '<p></p>';
		},
		
		// Breaks after tags
		'#</([\w\d]+)>(\s*<br\s*/?>)#'	=> 
		function( $m ) {
			return '</' . $m[1] . '>';
		},
	];
	
	$out		= \preg_replace_callback_array( $filters, $out );
	if ( $skipCode ) {
		return $out;
	}
	$filters	= [
		// Remove <br>, <p> tags inside <pre> and <code>
		'#<(pre|code)(.*)?>(.*)<\/\1>#ism'	=>
		function( $m ) {
			$v = \preg_replace( '#<br\s*/?>#', "\n", $m[3] );
			$v = \strtr( $v, [ 
				'</p><p>'	=> "\n\n",
				'<p>'		=> ''
			] );
			return 
			'<' . $m[1] . ( $m[2] ?? '' ) . '>' . 
			$v . 
			'</' . $m[1] . '>';
		},
		
		// Block of code
		'#^`{3,}([^`{3,}]+)`{3,}#mU' =>
		function( $m ) {
			return
			\strtr( template( 'tpl_codeblock' ), [ 
				'{code}' => entities( \trim( $m[1] ), false, false )
			] );
		}
	];
	
	return \preg_replace_callback_array( $filters, $out );
}

/**
 *  Post formatting handler
 *  
 *  @param string	$html	Raw HTML entered by the user
 *  @param string	$prefix	Link path prefix
 *  @return string
 */
function formatHTML( string $html, string $prefix ) {
	hook( [ 'formatting', [ 
		'html'		=> $html, 
		'prefix'	=> $prefix 
	] ] );
	
	// Check if formatting was handled or use the default markdown formatter
	$sent	= hookArrayResult( 'formatting' );
	
	return empty( $sent ) ? 
		markdown( $html, $prefix ) : 
		( $sent['html'] ?? markdown( $html, $prefix ) );
}

/**
 *  HTML filter
 *  
 *  @param string	$value		Unformatted content
 *  @param string	$prefix		URL path prefix
 *  @param bool		$form		Include form field tags if true
 *  @param bool		$sembed		Skip embedded media shortcodes if true
 *  @return string
 */
function html( 
	string	$value, 
	string	$prefix	= '', 
	bool	$form	= false,
	bool	$sembed	= false
) : string {
	static $white	= [];
	static $sanity;
	
	if ( !isset( $sanity ) ) {
		if ( missing( 'libxml_clear_errors' ) ) {
			$sanity = false;
			shutdown( 
				'logError', 
				'Error: Bareboard requires the libxml extension be enabled.' 
			);
			return '';
		} else {
			$sanity = true;
		}
	}
	
	if ( !$sanity ) {
		return '';
	}
	
	if ( !isset( $white['html'] ) ) {
		$default_tags = config( 'tag_white', \TAG_WHITE, 'json' );
		
		// Include form tags
		$default_form = 
		\array_merge_recursive( 
			$default_tags, 
			config( 'form_white', \FORM_WHITE, 'json' )
		);
		
		// Tag loader hook
		hook( [ 'htmltags', [ 
			'html'	=> $default_tags,
			'form'	=> $default_form
		] ] );
		
		$htags		= hookArrayResult( 'htmltags' );
		
		// Set custom tags or default tags
		$white['html']	= $htags['html'] ?? $default_tags;
		$white['form']	= $htags['form'] ?? $default_form;
	}
	
	// Remove preceding/trailing slashes
	$prefix		= trim( $prefix, '/' );
	
	// Preliminary cleaning
	$html		= pacify( $value, true );
	
	// Nothing to format?
	if ( empty( $html ) ) {
		return '';
	}
	
	// Apply formatting handler
	$html		= formatHTML( $html, $prefix );
	
	// Nothing formatted?
	if ( empty( $html ) ) {
		return '';
	}
	
	// Format linebreaks and code
	$html		= makeParagraphs( $html );
	
	// Clean up HTML
	$html		= tidyup( $html );
	
	// Skip errors
	$err		= \libxml_use_internal_errors( true );
	
	// HTML tag filter
	$dom		= new \DOMDocument();
	$lstate		= 
	$dom->loadHTML( 
		$html, 
		\LIBXML_HTML_NOIMPLIED | \LIBXML_HTML_NODEFDTD | 
		\LIBXML_NOERROR | \LIBXML_NOWARNING | 
		\LIBXML_NOXMLDECL | \LIBXML_COMPACT | 
		\LIBXML_NOCDATA | \LIBXML_NONET
	);
	
	// Loading failed?
	if ( !$lstate ) {
		// Log last error if possible and return
		$e = \libxml_get_last_error();
		if ( false !== $e ) {
			shutdown( 
				'logError', 
				[ $e->message ?? 'Error loading DOMDocument' ]
			);
		}
		
		\libxml_clear_errors();
		\libxml_use_internal_errors( $err );
		return '';
	}
	
	$domBody	= $dom->getElementsByTagName( 'body' );
	
	$flush		= [];
	
	// Iterate through every HTML element 
	if ( !empty( $domBody->childNodes ) ) {
		// Use form inclusive tags if this is a form page
		$wtags	= $form ? $white['form'] : $white['html'];
		foreach ( $domBody->childNodes as $node ) {
			scrub( $node, $wtags, $prefix, $flush );
		}
	}
	
	// Remove any tags not found in the whitelist
	if ( !empty( $flush ) ) {
		foreach( $flush as $node ) {
			if ( $node->nodeName == '#text' ) {
				continue;
			}
			// Replace tag with harmless text
			$safe	= $dom->createTextNode( 
					$dom->saveHTML( $node )
				);
			$node->parentNode
				->replaceChild( $safe, $node );
		}
	}
	
	// Fix formatting
	$dom->formatOutput	= true;
	$clean			= $dom->saveHTML();
	$clean			= makeParagraphs( $clean, true );
	
	// Final clean
	$clean			= tidyup( $clean );
	
	\libxml_clear_errors();
	\libxml_use_internal_errors( $err );
	
	if ( $sembed ) {
		return $clean;
	}
	
	// Apply embedded media
	return embeds( $clean, $prefix );
}

/**
 *  Tidy settings
 *  
 *  @param string	$text	Unformatted, unfiltered raw HTML
 *  @return string
 */
function tidyup( string $text ) : string {
	static $newtags;
	if ( missing( 'tidy_repair_string' ) ) {
		return $text;
	}
	
	if ( !isset( $newtags ) ) {
		$newtags = 'figure, figcaption, picture, summary, details';
		
		// Append custom tags
		hook( [ 'tidynewtags', [ 'tags' => $newtags ] ] );
		$newtags = 
		hookArrayResult( 'tidynewtags' )['tags'] ?? $newtags;
	}
	
	$opt = [
		'bare'					=> 1,
		'hide-comments' 			=> 1,
		'drop-proprietary-attributes'		=> 1,
		'fix-uri'				=> 1,
		'join-styles'				=> 1,
		'output-xhtml'				=> 1,
		'merge-spans'				=> 1,
		'show-body-only'			=> 1,
		'new-blocklevel-tags'			=> $newtags,
		'wrap'					=> 0
	];
	
	return \trim( \tidy_repair_string( $text, $opt ) );
}

/**
 *  Parse caption/subtitle definitions if any are specified
 *  
 *  @param string	$cc	Combined caption definitions
 *  @param string	$preifx	Source path prefix
 *  @return string
 */
function extractCC( string $cc, string $prefx = '' ) : string {
	
	$cc	= \trim( $cc );
	if ( empty( $cc ) ) {
		return '';
	}
	
	$dd	= '';
	$src	= '';
	$lang	= '';
	$id	= '';
	$p	= [];
	
	// Find multiple caption definitions if any
	$defs	= trimmedList( $cc, false, '][' );
	
	// Parse captions
	foreach ( $defs as $d ) {
		if ( empty( $d ) ) {
			continue;
		}
		
		\parse_str( $d, $p );
		
		if ( empty( $p ) || !\is_array( $p ) ) {
			$p = [];
			continue;
		}
		
		// Parse only if all elements are strings
		foreach ( $p as $k => $v ) {
			if ( is_array( $v ) ) {
				$p[$k] = 
				empty( $v[0] ) ? '' : ( 
					\is_array( $v[0] ) ? '' : ( string ) $v[0] 
				);
			} else {
				$p[$k] = ( string ) $v;
			}
		}
		
		// Prefix prepended source path
		$src	= 
		prependPath( $p['src'] ?? $p['source'] ?? '', $prefix );
		
		// Language name if specified
		$lang	= 
		bland( $p['lang'] ?? $p['language'] ?? '--', true );
		
		// Is default?
		$id	= empty( $p['default'] ) ? '' : 'default';
		
		// Language or plain subtitle
		$dd	.= empty( $lang ) ? 
		\strtr( template( 'tpl_cc_nl_embed' ), [
			'{src}'		=> $src,
			'{default}'	=> $id
		] ) : 
		\strtr( template( 'tpl_cc_embed' ), [
			'{label}'	=> 
			bland( 
				$p['label'] ?? $p['name'] ?? $lang, 
				true
			),
			'{src}'		=> $src,
			'{lang}'	=> $lang,
			'{default}'	=> $id
		] );
		$p	= [];
	}
	
	return $dd;
}

/**
 *  Embedded media shortcode list helper and hook trigger
 *  
 *  @return array
 */
function hostedEmbeds() : array {
	$hosted = [
		// YouTube syntax
		'/\[youtube http(s)?\:\/\/(www)?\.?youtube\.com\/watch\?v=([0-9a-z_]*)\]/is'
		=> \strtr( template( 'tpl_youtube' ), [ '{src}' => '$3' ] ),
		
		'/\[youtube http(s)?\:\/\/(www)?\.?youtu\.be\/([0-9a-z_]*)\]/is'
		=> \strtr( template( 'tpl_youtube' ), [ '{src}' => '$3' ] ),
		
		'/\[youtube ([0-9a-z_]*)\]/is'
		=> \strtr( template( 'tpl_youtube' ), [ '{src}' => '$1' ] ),
		
		// Vimeo syntax
		'/\[vimeo ([0-9]*)\]/is'
		=> \strtr( template( 'tpl_vimeo' ), [ '{src}' => '$1' ] ),
		
		'/\[vimeo http(s)?\:\/\/(www)?\.?vimeo\.com\/([0-9]*)\]/is'
		=> \strtr( template( 'tpl_vimeo' ), [ '{src}' => '$3' ] ),
		
		// Peertube (any instance)
		'/\[peertube http(s)?\:\/\/(.*?)\/videos\/watch\/([0-9\-a-z_]*)\]/is'
		=> \strtr( template( 'tpl_peertube' ), [ '{src_host}' => '$2', '{src}' => '$3' ] ),
		
		// Archive.org
		'/\[archive http(s)?\:\/\/(www)?\.?archive\.org\/details\/([0-9\-a-z_\/\.]*)\]/is'
		=> \strtr( template( 'tpl_archiveorg' ), [ '{src}' => '$3' ] ),
		
		'/\[archive ([0-9a-z_\/\.]*)\]/is'
		=> \strtr( template( 'tpl_archiveorg' ), [ '{src}' => '$1' ] ),
		
		// LBRY/Odysee syntax
		'/\[(lbry|odysee) http(s)?\:\/\/(.*?)\/\$\/download\/([\pL\pN\-_]*)\/\-?([0-9a-z_]*)\]/is'
		=> \strtr( template( 'tpl_lbry' ), [ 
			'{src_host}' => '$3', '{slug}' => '$4', '{src}' => '$5' 
		] ),
		
		'/\[lbry lbry\:\/\/\@(.*?)\/([\pL\pN\-_]*)(\#[\pL\pN\-_]*)?(\s|\/)([\pL\pN\-_]*)\]/is'
		=> \strtr( template( 'tpl_lbry' ), [ 
			'{src_host}' => 'lbry.tv', '{slug}' => '$2', '{src}' => '$5' 
		] )
		
	];
	
	// Append custom embeds
	hook( [ 'hostedembeds', [ 'hosted' => $hosted ] ] );
	$hosted = 
	hookArrayResult( 'hostedembeds', [] )['hosted'] ?? $hosted;
	
	return $hosted;
}

/**
 *  Embedded media
 *  
 *  @param string	$html	Pre-filtered HTML to replace media tags
 *  @param string	$preifx	Source path prefix
 *  @return string
 */
function embeds( string $html, string $prefix = ''  ) : string {
	static $hosted;
	static $media;	// Locally uploaded
	
	// First run?
	if ( !isset( $hosted ) ) {
		$hosted	= hostedEmbeds();
	}
	
	if ( !isset( $media ) ) {
		// Uploaded media embedding
		$rx = '/(?:\[)(?<type>audio|video) ' . 
			'(?:(?:\[)(?<captions>.*?)(?:\])(?:\s+)?)?' . 
			'(?:\((?<preview>.*?)\)(?:\s+)?)?' . 
			'(?<src>[^\[]+)(?:\])/s';
		
		$media	= [ $rx => 
		
		function( $m ) use ( $prefix ) {
			$i = \trim( $m['type'] ?? '' );		// Media type
			$p = \trim( $m['preview'] ?? '' );	// Thumbnail or preview
			
			// Use prefix for relative paths
			$u = prependPath( \trim( $m['src'] ?? '' ), $prefix );
			
			// Parse caption definitions if any
			$c = extractCC( $m['captions'] ?? '', $prefix );
			
			switch( $i ) {
				case 'audio':
					return isSafeExt( $u, 'audio' ) ?
					\strtr( 
						template( 'tpl_audio_embed' ), 
						[ '{src}' => $u ] 
					) : '';
				
				case 'video':
					if ( !isSafeExt( $u, 'video' ) ) {
						return '';
					}
					
					return empty( $p ) ? 
					// No preview
					\strtr( template( 'tpl_video_np_embed' ), [ 
						'{src}'		=> $u,
						'{detail}'	=> $c
					] ) : 
					
					// With preview
					\strtr( template( 'tpl_video_embed' ), [ 
						'{preview}'	=> prependPath( $p, $prefix ),
						'{src}'		=> $u,
						'{detail}'	=> $c
					] );
					
				default:
					return '';
			}
		}
		];
	}
		
	$html	= 
	\preg_replace( 
		\array_keys( $hosted ), 
		\array_values( $hosted ), 
		$html 
	);
	
	return
	\preg_replace_callback_array( $media, $html );
}

/**
 *  Convert Markdown formatted text into HTML tags
 *  
 *  Inspired by : 
 *  @link https://gist.github.com/jbroadway/2836900
 *  
 *  @param string	$html	Pacified text to transform into HTML
 *  @param string	$prefix	URL prefix to prepend text
 *  @return string
 */
function markdown(
	string	$html,
	string	$prefix = '' 
) {
	static $filters;
	
	if ( empty( $filters ) ) {
		$filters	= 
		[
		// Links / Images with alt text and titles
		'/(\!)?\[([^\[]+)\]\(([^\"\)]+)(?:\"(([^\"]|\\\")+)\")?\)/s'	=> 
		function( $m ) use ( $prefix ) {
			$i = \trim( $m[1] );
			$t = \trim( $m[2] );
			$u = \trim( $m[3] );
			
			// Use prefix for relative paths
			$u = prependPath( $u, $prefix );
			
			// If this is a plain link
			if ( empty( $i ) ) {
				return 
				\sprintf( "<a href='%s'>%s</a>", $u, entities( $t ) );
			}
			
			// This is an image
			// Fix titles / alt text
			$a = entities( \strtr( $m[4] ?? $t, [ '\"' => '"' ] ), false, false );
			return
			\sprintf( "<img src='%s' alt='%s' title='%s' />", $u, entities( $t ), $a );
		},
		
		// Bold / Italic / Deleted / Quote text
		'/(\*(\*)?|\~\~|\:\")(.*?)\1/'	=>
		function( $m ) {
			$i = \strlen( $m[1] );
			$t = \trim( $m[3] );
			
			switch ( true ) {
				case ( false !== \strpos( $m[1], '~' ) ):
					return \sprintf( "<del>%s</del>", $t );
					
				case ( false !== \strpos( $m[1], ':' ) ):
					return \sprintf( "<q>%s</q>", $t );
						
				default:
					return ( $i > 1 ) ?
						\sprintf( "<strong>%s</strong>", $t ) : 
						\sprintf( "<em>%s</em>", $t );
			}
		},
		
		// Centered text
		'/(\n(\-\>+)|\<center\>)([\pL\pN\s]+)((\<\-)|\<\/center\>)/'	=> 
		function( $m ) {
			$t = \trim( $m[3] );
			return \sprintf( '<div class="center;">%s</div>', $t );
		},
		
		// Headings
		'/\n([#]{1,6}+)\s?(.+)/'			=>
		function( $m ) {
			$h = \strlen( trim( $m[1] ) );
			$t = \trim( $m[2] );
			return \sprintf( "<h%s>%s</h%s>", $h, $t, $h );
		}, 
		
		// List items
		'/\n(\*|([0-9]\.+))\s?(.+)/'		=>
		function( $m ) {
			$i = \strlen( $m[2] );
			$t = \trim( $m[3] );
			return ( $i > 1 ) ?
				\sprintf( '<ol><li>%s</li></ol>', $t ) : 
				\sprintf( '<ul><li>%s</li></ul>', $t );
		},
		
		// Merge duplicate lists
		'/<\/(ul|ol)>\s?<\1>/'			=> 
		function( $m ) { return ''; },
		
		// Blockquotes
		'/\n\>\s(.*)/'				=> 
		function( $m ) {
			$t = \trim( $m[1] );
			return \sprintf( '<blockquote><p>%s</p></blockquote>', $t );
		},
		
		// Merge duplicate blockquotes
		'/<\/(p)><\/(blockquote)>\s?<\2>/'	=>
		function( $m ) { return ''; },
		
		// Horizontal rule
		'/\n-{5,}/'				=>
		function( $m ) { return '<hr />'; },
		
		// Fix paragraphs after block elements
		'/\n([^\n(\<\/ul|ol|li|h|blockquote|code|pre)?]+)\n/'		=>
		function( $m ) {
			return '</p><p>';
		}, 
		
		// Inline code (untrimmed)
		'/[^\`]\`([^\n`]+)\`/'			=>
		function( $m ) {
			return 
			\strtr( template( 'tpl_codeinline' ), [ 
				'{code}' => entities( \trim( $m[1] ), false, false )
			] );
		}
		];
		
		// Merge custom markdown filters
		hook( [ 'markdownfilter', [ 'filters' => $filters ] ] );
		$filters = 
		hookArrayResult( 'markdownfilter' )['filters'] ?? $filters;
	}
	
	return
	\preg_replace_callback_array( $filters, $html );
}

/**
 *  Make text completely bland by stripping punctuation, 
 *  spaces and diacritics (for further processing)
 *  
 *  @param string	$text		Raw input text
 *  @param bool		$nospecial	Remove special characters if true
 *  @return string
 */
function bland( string $text, bool $nospecial = false ) : string {
	$text = \strip_tags( unifySpaces( $text ) );
	
	if ( $nospecial ) {
		return \preg_replace( 
			'/[^\p{L}\p{N}\-\s_]+/', '', \trim( $text ) 
		);
	}
	return \trim( $text );
}



/**
 *  Headers and request parameters
 */

/**
 *  Get the first non-empty server parameter value if set
 *  
 *  @param array	$headers	Server parameters
 *  @param array	$terms		Searching terms
 *  @param bool		$case		Search only in lowercase if true
 *  @return mixed
 */
function serverParamWhite( array $headers, array $terms, bool $case = false ) {
	$found	= null;
	
	foreach ( $headers as $h ) {
		// Skip unset or empty keys
		if ( empty( $_SERVER[$h] ) ) {
			continue;
		}
		
		// Search in lowercase
		if ( $case ) {
			$lc	= \array_map( 'lowercase', $terms );
			$sh	= \lowercase( $_SERVER[$h] );
			$found	= \in_array( $sh, $lc ) ? $sh : '';
		} else {
			$found	= 
			\in_array( $_SERVER[$h], $terms ) ? $_SERVER[$h] : '';
		}
		break;
	}
	return $found;
}

/**
 *  Forwarded HTTP header chain from load balancer
 *  
 *  @return array
 */
function getForwarded() : array {
	static $fwd;
	if ( isset( $fwd ) ) {
		return $fwd;
	}
	
	$fwd	= [];
	$terms	= 
		$_SERVER['HTTP_FORWARDED'] ??
		$_SERVER['FORWARDED'] ?? 
		$_SERVER['HTTP_X_FORWARDED'] ?? '';
	
	// No headers forwarded
	if ( empty( $terms ) ) {
		return [];
	}
	
	$pt	= explode( ';', $terms );
	
	// Gather forwarded values
	foreach ( $pt as $p ) {
		// Break into comma delimited list, if any
		$chain = trimmedList( $p );
		if ( empty( $chain ) ) {
			continue;
		}
		
		foreach ( $chain as $c ) {
			$k = explode( '=', $c );
			// Skip empty or odd values
			if ( count( $k ) != 2 ) {
				continue;
			}
			
			// Existing key?
			if ( isset( $fwd[$k[0]] ) ) {
				// Existing array? Append
				if ( \is_array( $fwd[$k[0]] ) ) {
					$fwd[$k[0]][] = $k[1];
				
				// Multiple values? 
				// Convert to array and then append new
				} else {
					$tmp		= $fwd[$k[0]];
					$fwd[$k[0]]	= [];
					$fwd[$k[0]][]	= $tmp;
					$fwd[$k[0]][]	= $k[1];
 				}
			// Fresh value
			} else {
				$fwd[$k[0]] = $k[1];
			}
		}
	}
	return $fwd;
}



/**
 *  IP address
 */

/**
 *  Address to bit conversion helper
 *  
 *  @link https://stackoverflow.com/questions/7951061/matching-ipv6-address-to-a-cidr-subnet/7951507#7951507
 */
function inetbits( $ip ) {
	$ip	= \inet_pton( $ip );
	$up	= \unpack( 'A16', $ip );
	$up	= \str_split( $up[1] );
	$bn	= '';
	
	foreach ( $up as $char ) {
		$bn .= 
		\str_pad( 
			\decbin( \ord( $char ) ), 8, '0', \STR_PAD_LEFT 
		);
	}
	return $bn;
}

/**
 *  Check if an IPv4 address exists in range
 *  
 *  @link https://stackoverflow.com/questions/594112/matching-an-ip-to-a-cidr-mask-in-php-5/594134#594134
 */
function ip4cidr( $ip, $range ) : bool {
	list ( $subnet, $bits )	= \explode( '/', $range );
	$ip			= \ip2long($ip);
	$subnet			= \ip2long($subnet);
	$mask			= -1 << ( 32 - $bits );
	
	// https://stackoverflow.com/a/14841828
	// ~((1 << (32 - $mask)) - 1) )
	// nb: in case the supplied subnet wasn't correctly aligned
	
	$subnet			&= $mask;
	return	( $ip & $mask )	== $subnet;
}

/**
 *  Check if an IPv6 address exists in range
 *  
 *  @link https://gist.github.com/lyquix-owner/2620da22d927c99d57555530aab3279b
 */
function ip6cidr( $ip, $range ) : bool {
	list ( $subnet, $bits )	= \explode( '/', $range );
	$bn	= inetbits( $ip );
	$net	= inetbits( $subnet );
	
	$ib	= \substr( $bn, 0, $bits );
	$nb	= \substr( $net, 0, $bits );
	
	return ( $ib === $nb );
}

/**
 *  Get the current IP address connection chain including given proxies
 *  
 *  @return array
 */
function getProxyChain() : array {
	static $chain;
	
	if ( isset( $chain ) ) {
		return $chain;
	}
	
	$chain = 
	trimmedList( 
		$_SERVER['HTTP_X_FORWARDED_FOR'] ?? 
		$_SERVER['HTTP_CLIENT_IP'] ?? 
		$_SERVER['REMOTE_ADDR'] ?? '' 
	);
	
	return $chain;
}

/**
 *  Get IP address (best guess)
 *  
 *  @return string
 */
function getIP() : string {
	static $ip;
	
	if ( isset( $ip ) ) {
		return $ip;
	}
	
	$fwd = getForwarded();
	
	// Get IP from reverse proxy, if set
	if ( \array_key_exists( 'for', $fwd ) ) {
		$ip = 
		\is_array( $fwd['for'] ) ? 
			\array_shift( $fwd['for'] ) : 
			( string ) $fwd['for'];
	
	// Get from sent headers
	} else {
		$raw = getProxyChain();
		if ( empty( $raw ) ) {
			$ip = '';
			return '';
		}
		
		$ip	= \array_shift( $raw );
	}
		
	$skip	= config( 'skip_local', \SKIP_LOCAL, 'int' );
	$va	=
	( $skip ) ?
	\filter_var( $ip, \FILTER_VALIDATE_IP ) : 
	\filter_var(
		$ip, 
		\FILTER_VALIDATE_IP, 
		\FILTER_FLAG_NO_PRIV_RANGE | 
		\FILTER_FLAG_NO_RES_RANGE
	);
	
	$ip = ( false === $va ) ? '' : $ip;
	
	return $ip;
}

/**
 *  Get IP segments as an array
 *  
 *  @param string	$ip	Raw IP address
 *  @return array		Net components
 */
function getIPsegs( string $ip ) : array {
	if ( \filter_var( 
		$ip, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV6 
	) ) {
		return \explode( ':', $ip );
	}
	
	return \explode( '.', $ip );
}


/**
 *  Process HTTP_* variables
 *  
 *  @param bool		$lower		Get array keys in lowercase
 *  @return array
 */
function httpHeaders( bool $lower = false ) : array {
	static $val;
	static $lval;
	
	if ( $lower ) {
		if ( isset( $lval ) ) {
			return $lval;
		}
	} else {
		if ( isset( $val ) ) {
			return $val;
		}
	}
	
	$val	= [];
	$lval	= [];
	foreach ( $_SERVER as $k => $v ) {
		if ( 0 === strncasecmp( $k, 'HTTP_', 5 ) ) {
			$a = explode( '_' ,$k );
			array_shift( $a );
			array_walk( $a, function( &$r ) {
				$r = ucfirst( strtolower( $r ) );
			} );
			$val[ implode( '-', $a ) ] = $v;
			$lval[ \strtolower( \implode( '-', $a ) ) ] = $v;
		}
	}
	return $lower ? $lval : $val;
}

/**
 *  Create current visitor's browser signature by sent headers
 *  
 *  @return string
 */
function signature() : string {
	static $sig;
	if ( isset( $sig ) ) {
		return $sig;
	}
	$headers	= httpHeaders();
	$skip		= [
		'Access-Control-Request-Headers',
		'Access-Control-Request-Method',
		'Upgrade-Insecure-Requests',
		'If-Unmodified-Since',
		'If-Modified-Since',
		'Accept-Datetime',
		'Accept-Encoding',
		'Content-Length',
		'Authorization',
		'Cache-Control',
		'If-None-Match',
		'Content-Type',
		'Content-Md5',
		'Connection',
		'Forwarded',
		'If-Match',
		'Referer',
		'Cookie',
		'Expect',
		'Accept',
		'Pragma',
		'Date',
		'A-Im',
		'TE'
	];
	
	$search		= 
	\array_diff_key( 
		$headers, \array_reverse( $skip ) 
	);
	
	$sig		= '';
	foreach ( $search as $k => $v ) {
		$sig .= $v[0];
	}
	
	return $sig;
}

/**
 *  Helper to find if sent user headers contain the given headers and/or values
 *  
 *  @example
 *  headerContains( [ 'X-Requested-With' => 'XMLHttpRequest' ] );
 *  headerContains( [ 'X-Requested-With' => [ 'MobileApp', 'XMLHttpRequest' ] ] );
 *  
 *  @param array	$search		Key/value pairs to find in sent headers
 *  @return bool
 */
function headersContain( array $search ) : bool {
	if ( empty( $search ) ) {
		return false;
	}
	
	$found	= \array_intersect_key( httpHeaders(), $search );
	if ( empty( $found ) ) {
		return false;
	}
	
	foreach ( $found as $k => $v ) {
		if ( \is_array( $search[$k] ) ) {
			foreach ( $search[$k] as $j ) {
				// Skip nested arrays
				if ( \is_array( $j ) ) {
					continue;
				}
				
				if ( textHas( $v, ( string ) $j ) ) {
					return true;
				}
			}
		} else {
			if ( textHas( $v, $search[$k] ) ) {
				return true;
			}
		}
	}
	
	return false;
}


/**
 *  HTTP Response
 */

/**
 *  Site root
 *  
 *  @param bool		$err		Error root if given
 *  @return string
 */
function getRoot( bool $err = false ) : string {
	static $root;
	static $errors;
	
	if ( $err ) { 
		if ( isset( $errors ) ) {
			return $errors;
		}
	} else {
		if ( isset( $root ) ) {
			return $root;
		}
	}
	
	if ( $err ) {
		$errors	 = slashPath( \ERROR_ROOT, true );
		return $errors;
	}
	
	// Shortest root directory for this host
	$hp		= getHostPaths( getHost() );
	$root		= slashPath( $hp[0], true );
	return $root;
}

/**
 *  Quoted security policy attribute helper
 *   
 *  @param string	$atr	Security policy parameter
 *  @return string
 */
function quoteSecAttr( string $atr ) : string {
	// Safe allow list
	static $allow	= [ 'self', 'src', 'none' ];
	$atr		= \trim( unifySpaces( $atr ) );
	
	return 
	\in_array( $atr, $allow ) ? 
		$atr : '"' . cleanUrl( $atr ) . '"'; 
}

/**
 *  Parse security policy attribute value
 *  
 *  @param string	$key	Permisisons policy identifier
 *  @param mixed	$policy	Policy value(s)
 *  @return string
 */
function parsePermPolicy( string $key, $policy = null ) : string {
	// No value? Send empty set E.G. "interest-cohort=()"
	if ( empty( $policy ) ) {
		return bland( $key, true ) . '=()';
	}
	
	// Send specific value(s) E.G. "fullscreen=(self)"
	return 
	bland( $key, true ) . '=(' . 
	( \is_array( $policy ) ? 
		\implode( ' ', \array_map( 'quoteSecAttr', $policy ) ) : 
		quoteSecAttr( ( string ) $policy ) ) . 
	')';
}

/**
 *  Content Security and Permissions Policy settings
 *  
 *  @param string	$policy		Security policy header
 *  @return string
 */
function securityPolicy( string $policy ) : string {
	static $p;
	static $r	= [];
	
	// Load defaults
	if ( !isset( $p ) ) {
		$p = 
		config( 'security_policy', \SECURITY_POLICY, 'json' );
	}
	
	switch ( $policy ) {
		case 'common':
		case 'common-policy':
			if ( isset( $r['common'] ) ) {
				return $r['common'];
			}
			
			// Common header override
			$cfj = 
			linedConfig( 
				'common-policy', 
				$p['common-policy'] ?? [], 
				'bland' 
			);
			$r['common'] = \implode( "\n", $cfj );
			
			return $r['common'];
			
		case 'permissions':
		case 'permissions-policy':
			if ( isset( $r['permissions'] ) ) {
				return $r['permissions'];
			}
			
			$prm = [];
			
			// Permissions policy override
			$cfj = config( 'permisisons-policy', [], 'json' );
			$def = $p['permissions-policy'] ?? [];
			$pjp = 
			\is_array( $cfj ) ? 
				\array_merge( $def, $cfj ) : $def;
			
			foreach ( $pjp as $k => $v ) {
				$prm[]	= parsePermPolicy( $k, $v );
			}
			
			$r['permissions'] = \implode( ', ', $prm );
			return $r['permissions'];
		
		case 'content-security':
		case 'content-security-policy':
			if ( isset( $r['content'] ) ) {
				return $r['content'];
			}
			$csp = '';
			$cjp = $p['content-security-policy'] ?? [];
			
			// Approved frame ancestors ( for embedding media )
			$frm = 
			\implode( ' ', 
				linedConfig( 
					'frame_whitelist', 
					\FRAME_WHITELIST, 
					'cleanUrl' 
				) 
			);
			
			foreach ( $cjp as $k => $v ) {
				$csp .= 
				( 0 == \strcmp( $k, 'frame-ancestors' ) ) ? 
					"$k $v $frm;" : "$k $v;";
			}
			$r['content'] = \rtrim( $csp, ';' );
			return $r['content'];
	}
	
	return '';
}

/**
 *  Send list of supported HTTP request methods
 */
function getAllowedMethods( bool $arr = false ) {
	if ( $arr ) {
		return 
		[ 'get', 'post', 'head', 'options' ];
	}
	
	return 'GET, POST, HEAD, OPTIONS';
}

/**
 *  Safety headers
 *  
 *  @param string	$chk	Content checksum
 *  @param bool		$send	CSP Send Content Security Policy header
 *  @param bool		$type	Send content type (html)
 */
function preamble(
	string	$chk		= '', 
	bool	$send_csp	= true,
	bool	$send_type	= true
) {
	if ( $send_type ) {
		\header( 
			'Content-Type: text/html; charset=utf-8', 
			true 
		);
	}
	
	// Set common policy headers
	$chead	= explode( "\n", securityPolicy( 'common-policy' ) );
	foreach ( $chead as $h ) {
		\header( $h, true );
	}
	
	// Set default permissions policy header
	$perms = securityPolicy( 'permissions-policy' );
	if ( !empty( $perms ) ) {
		\header( 'Permissions-Policy: ' . $perms , true );
	}
	
	// If sending CSP and content checksum isn't used
	if ( $send_csp ) {
		$csp = securityPolicy( 'content-security-policy' );
		if ( !empty( $csp ) ) {
			\header( 'Content-Security-Policy: ' . $csp, true );
		}
	
	// Content checksum used
	} elseif ( !empty( $chk ) ) {
		\header( 
			"Content-Security-Policy: default-src " .
			"'self' '{$chk}'", 
			true
		);
	}
}

/**
 *  Send list of allowed methods in "Allow:" header
 */
function sendAllowHeader() {
	\header( 'Allow: ' . getAllowedMethods(), true );
}

/**
 *  Create HTTP status code message
 *  
 *  @param int		$code		HTTP Status code
 */
function httpCode( int $code ) {
	$green	= [
		200, 201, 202, 204, 205, 206, 
		300, 301, 302, 303, 304,
		400, 401, 403, 404, 405, 406, 407, 409, 410, 411, 412, 
		413, 414, 415,
		500, 501
	];
	
	if ( \in_array( $code, $green ) ) {
		\http_response_code( $code );
		
		// Some codes need additional headers
		switch( $code ) {
			case 405:
				sendAllowHeader();
				break;
		}
		
		return;
	}
	
	$prot = getProtocol();
	
	// Special cases
	switch( $code ) {
		case 425:
			\header( "$prot $code " . 'Too Early' );
			return;
			
		case 429:
			\header( "$prot $code " . 
				'Too Many Requests' );
			return;
			
		case 431:
			\header( "$prot $code " . 
				'Request Header Fields Too Large' );
			return;
			
		case 503:
			\header( "$prot $code " . 
				'Service Unavailable' );
			return;
	}
	
	logError( 'Unknown status code "' . $code . '"' );
	die();
}

/**
 *  Format available sites with default parameters
 *  
 *  @param array	$sites		Available sites
 *  @return array
 */
function formatSites( array $sites ) : array {
	if ( empty( $sites ) ) {
		return [];
	}
	
	$se = [];
	foreach ( $sites as $host => $base ) {
		// Skip if invalid hostname
		if ( false === \filter_var( 
			$host, 
			\FILTER_VALIDATE_DOMAIN,
			\FILTER_FLAG_HOSTNAME
		) ) {
			continue;
		}
		
		// Add default site if empty
		if ( empty( $base ) ) {
			$base	= [
				config( 
					'default_basepath', 
					\DEFAULT_BASEPATH, 
					'json' 
				)
			];
		}
	
		// Decode went wrong or setting is invalid
		if ( !\is_array( $base ) ) {
			continue;
		}
		
		// Found sub sites
		$f = [];
		
		// Set default sub parameters
		foreach ( $base as $b ) {
			if ( !\is_array( $b ) ) {
				continue;
			}
			
			// Slash basepath
			$b['basepath'] = 
				slashPath( $b['basepath'] ?? '/' );
			
			// Set maintenance mode
			$b['is_maintenance'] ??= 0;
			
			// Custom site settings or empty array
			$b['settings'] ??= [];
			$f[] = $b;
		}
		
		// No valid sites?
		if ( empty( $f ) ) {
			continue;
		}
		// Append to enabled sites under this host
		$se[$host] = $f;
	}
	
	\natcasesort( $se );
	return $se;
}

/**
 *  Get whitelisted sites and associated paths
 *  
 *  @return array
 */
function getSitesEnabled() : array {
	static $sw;
	if ( isset( $sw ) ) {
		return $sw;
	}
	$sw	= 
	formatSites(
		config( 'sites_enabled', \SITES_ENABLED, 'json' )
	);
	
	return $sw;
}

/**
 *  Host server name
 *  @return string
 */
function getHost() : string {
	static $host;
	if ( isset( $host ) ) { return $host; }
	
	$sk	= getSitesEnabled();
	$sw	= trimmedList( implode( ',', array_keys( $sk ) ), true );
	
	// Base host headers
	$sh	= [ 'HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR' ];
	
	// Get forwarded host info from reverse proxy
	$fd	= getForwarded();
	
	// Check reverse proxy host name in whitelist
	if ( \array_key_exists( 'host', $fd ) ) {
		$lc	= lowercase( ( string ) $fd['host'] );
		$host	= \in_array( $lc, $sw ) ? $lc : '';
		
	// Check base host headers
	} else {
		$host	= serverParamWhite( $sh, $sw, true ) ?? '';
	}
	
	// Call host hook
	hook( [ 'gethost', [
		'host'		=> $host,
		'white'		=> $sw,
		'sets'		=> $sh,
		'forward'	=> $fd
	] ] );
	
	// Override if sent by plugin
	$host	= hookStringResult( 'gethost', $host );
	return $host;
}

/**
 *  Get whitelisted paths for current host
 *  
 *  @param string	$host	Current server host
 *  @return array
 */
function getHostPaths( string $host ) : array {
	static $paths	= [];
	if ( !empty( $paths[$host] ) ) {
		return $paths[$host];
	}
	$sp		= getSitesEnabled();
	
	$sa	= [];
	foreach ( $sp[$host] as $s ) {
		$sa[] = slashPath( $s['basepath'] ?? '/' );
	}
	
	\natcasesort( $sa );
	$sa	= \array_unique( $sa, \SORT_STRING );
	
	hook( [ 'gethostpaths', [
		'allpaths'	=> $sp,
		'current'	=> $sa
	] ] );
	
	$paths[$host]	= $sa;
	return $paths[$host];
}

/**
 *  Check if the current host and path are in the whitelist
 *  
 *  @param string	$host		Server host name
 *  @param string	$path		Current URI
 *  @return bool
 */
function hostPathMatch( string $host, string $path ) : bool {
	$pm	= getHostPaths( $host );
	
	// Root folder is allowed?
	if ( \in_array( '/', $pm, true ) ) {
		return true;
	}
	
	// Shortest matching allowed subfolder
	$pe	= explode( '/', $path );
	$px	= '';
	foreach ( $pe as $k => $v ) {
		$px .= slashPath( $v );
		if ( \in_array( $px, $pm, true ) ) {
			return true;
		}
	}
	return false;
}

/**
 *  Current website with protocol prefix
 *  
 *  @return string
 */
function website() : string {
	static $url;
	if ( isset( $url ) ) {
		return $url;
	}
	
	$url	= ( isSecure() ? 'https://' : 'http://' ) . getHost();
	return $url;
}

/**
 *  Current full URI including website
 */
function fullURI() : string {
	return website() . slashPath( getURI() );
}

/**
 *  Set expires header
 */
function setCacheExp( int $ttl ) {
	\header( 'Cache-Control: max-age=' . $ttl, true );
	\header( 'Expires: ' . 
		\gmdate( 'D, d M Y H:i:s', time() + $ttl ) . 
		' GMT', true );
}

/**
 *  Clean the output buffer without flushing
 *  
 *  @param bool		$ebuf		End buffers
 */
function cleanOutput( bool $ebuf = false ) {
	if ( $ebuf ) {
		while ( \ob_get_level() > 0 ) {
			\ob_end_clean();
		}
		return;
	}
	
	while ( \ob_get_level() && \ob_get_length() > 0 ) {
		\ob_clean();
	}
}

/**
 *  Remove previously set headers, output
 */
function scrubOutput() {
	// Scrub output buffer
	cleanOutput();
	\header_remove( 'Pragma' );
	
	// This is best done in php.ini : expose_php = Off
	\header( 'X-Powered-By: nil', true );
	\header_remove( 'X-Powered-By' );
}

/**
 *  Flush and optionally end output buffers
 *  
 *  @param bool		$ebuf		End buffers
 */
function flushOutput( bool $ebuf = false ) {
	if ( $ebuf ) {
		while ( \ob_get_level() > 0 ) {
			\ob_end_flush();
		}
	} else {
		while ( \ob_get_level() > 0 ) {
			\ob_flush();	
		}
	}
	flush();
}

/**
 *  Print headers, content, and end execution
 *  
 *  @param int		$code		HTTP Status code
 *  @param string	$content	Page data to send to client
 *  @param bool		$cache		Cache page data if true
 */
function send(
	int		$code		= 200,
	string		$content	= '',
	bool		$cache		= false,
	bool		$feed		= false
) {
	scrubOutput();
	httpCode( $code );
	
	if ( $feed ) {
		\header(
			'Content-Type: application/xml; charset=utf-8', 
			true 
		);
		\header( 'Content-Disposition: inline', true );
		preamble( '', true, false );
	} else {
		preamble();
	}
	
	// Also save to cache?
	if ( $cache ) {
		$ex	= config( 'cache_ttl', \CACHE_TTL, 'int' );
		$full	= fullURI();
		
		setCacheExp( $ex );
		shutdown( 'saveCache', [ $full, $content ] );
	}
	
	hook( [ 'contentsend', [ 
		'code'		=> 200,
		'content'	=> $content, 
		'cache'		=> $cache,
		'feed'		=> $feed
	] ] );
	
	// Schedule flush
	shutdown( 'flushOutput', [ true ] );
	
	// Check gzip prerequisites
	if ( $code != 304 && \extension_loaded( 'zlib' ) ) {
		\ob_start( 'ob_gzhandler' );
	}
	echo $content;
	
	// End
	shutdown();
}

/**
 *  Error file sending helper
 *  
 *  @param string	$path		Error file path
 *  @param int		$code		Error code number
 */
function sendErrorFile( string $path, int $code ) {
	// Prepend error root
	$path = getRoot( true ) . $path;
	if ( !\file_exists( $path ) ) {
		return;
	}
	
	hook( [ 'errorfilesend', [ 
			'path'		=> $path, 
			'code'		=> $code
		] 
	] );
	sendFilePrep( $path, $code );
	sendFileFinish( $path, true );
	shutdown();
}

/**
 *  Send error message wrapped in default page template
 */
function sendError( int $code, $body ) {
	// Try to send generic file error, if it exists, and exit
	if ( \in_array( $code, [ 500, 501, 503 ] ) ) {
		sendErrorFile( '50x.html', $code );
	}
	
	$path	= '';
	
	// Try to send a static error file if it exists first
	switch( $code ) {
		case 400:
		case 401:
		case 403:
		case 404:
		case 405:
		case 429:
		case 500:
		case 501:
		case 503:
			$path = $code . '.html';
			break;
	}
	
	// Should end here if error file exists
	if ( !empty( $path ) ) {
		sendErrorFile( $path, $code );
	}
	
	// No error file sent, continue with built-in error page
	$ptitle	= config( 'page_title', \PAGE_TITLE );
	$psub	= config( 'page_sub', \PAGE_SUB );
	
	
	// Call error code hook
	hook( [ 'errorcodesend', [
		'code'		=> $code,
		'title'		=> $ptitle,
		'subtitle'	=> $psub,
		'path'		=> $path,
		'body'		=> $body
	] ] );
	
	// Handle custom errors
	$html	= hookHTML( 'errorcodesend' );
	
	// Send custom errors
	if ( !empty( $html ) ) {
		shutdown( 'cleanup' );
		send( $code, $html );
	}
	
	// Send standard error page if nothing handled
	$params	= [ 
		'page_title'	=> $ptitle,
		'tagline'	=> $psub,
		'code'		=> $code,
		'body'		=> $body 
	];
	shutdown( 'cleanup' );
	send( $code, render( template( 'tpl_error_page' ), $params ) );
}

/**
 *  Invalid file range error page helper
 */
function sendRangeError() {
	visitorError( 416, 'Range' );
	sendError( 416, errorLang( "filerange", \MSG_FILERANGE ) );
}

/**
 *  Override content sending if hook was called
 *  
 *  @param string	$event	Event name to call back from hook
 *  @param bool		$feed	Sent content is to be rendered as feed
 */
function sendOverride( string $event, bool $feed = false ) {
	$sent	= hook( [ $event, '' ] );
	if ( empty( $sent ) || !\is_array( $sent ) ) {
		return;
	}
	
	$html	= $sent['html'] ?? '';
	if ( empty( $html ) ) {
		return;
	}
	
	shutdown( 'cleanup' );
	send( 
		( int ) ( $sent['code'] ?? 200 ), 
		$html, 
		( bool ) ( $sent['cache'] ?? true ),
		$feed
	);
}

/**
 *  Multi-page redirect helper
 *  
 *  @param string	$page		Relative path to redirect
 *  @param int		$code		HTTP Status code
 */
function sendPage( 
	string		$page		= '',
	int		$code		= 200
) {
	// Pre-redirect hooks
	hook( [ 'sendpage', [
		'home'	=> pageRoutePath(),
		'host'	=> getHost(),
		'root'	=> getRoot(),
		'code'	=> $code,
		'page'	=> $page 
	] ] );
	
	// Send redirect with requested code
	redirect( $code, slashPath( pageRoutePath(), true ) . $page );
}

/**
 *  Send access denied page and log the visit
 *  
 *  @param string	$vlog		Logged error message
 *  @param string	$msg		Language error sent to visitor
 *  @param string	$default	Fallback language error message
 */
function sendDenied(
	string	$vlog		= 'Denied', 
	string	$msg		= 'denied', 
	string	$default	= \MSG_DENIED 
) {
	visitorError( 403, $vlog );
	sendError( 403, errorLang( $msg, $default ) );
}

/**
 *  Send method not allowed
 *  
 *  @param string	$vlog		Logged error message
 *  @param string	$msg		Language error sent to visitor
 *  @param string	$default	Fallback language error message
 */
function sendBadMethod(
	string	$vlog		= 'Method', 
	string	$msg		= 'badmethod', 
	string	$default	= \MSG_BADMETHOD 
) {
	visitorError( 405, $vlog );
	sendError( 405, errorLang( $msg, $default ) );	
}

/**
 *  Send not found page and log the visit
 *  
 *  @param string	$vlog		Logged error message
 *  @param string	$msg		Language error sent to visitor
 *  @param string	$default	Fallback language error message
 */
function sendNotFound(
	string	$vlog		= 'NotFound', 
	string	$msg		= 'notfound', 
	string	$default	= \MSG_NOTFOUND 
) {
	visitorError( 404, $vlog );
	sendError( 404, errorLang( $msg, $default ) );
}

/**
 *  Send form expiration page
 *  
 *  @param string	$vlog		Logged error message
 *  @param string	$msg		Language error sent to visitor
 *  @param string	$default	Fallback language error message
 */
function sendExpired(
	string	$vlog		= 'Expired', 
	string	$msg		= 'expired', 
	string	$default	= \MSG_EXPIRED 
) {
	visitorError( 401, $vlog );
	sendError( 401, errorLang( $msg, $default ) );
}

/**
 *  Generate ETag from file path
 */
function genEtag( $path ) {
	static $tags		= [];
	
	if ( isset( $tags[$path] ) ) {
		return $tags[$path];
	}
	
	$tags[$path]		= [];
	
	// Find file size header
	$tags[$path]['fsize']	= \filesize( $path );
	
	// Send empty on failure
	if ( false === $tags[$path]['fsize'] ) {
		$tags[$path]['fmod'] = 0;
		$tags[$path]['etag'] = '';
		return $tags;
	}
	
	// Similar to Nginx ETag algo: 
	// Lowercase hex of last modified date and filesize
	$tags[$path]['fmod']	= \filemtime( $path );
	if ( false !== $tags[$path]['fmod'] ) {
		$tags[$path]['etag']	= 
		\sprintf( '%x-%x', 
			$tags[$path]['fmod'], 
			$tags[$path]['fsize']
		);
	} else {
		$tags[$path]['etag'] = '';
	}
	
	return $tags[$path];
}

/**
 *  File mime-type detection helper
 *  
 *  @param string	$path	Fixed file path
 *  @return string
 */
function detectMime( string $path ) : string {
	$mime = \mime_content_type( $path );
	if ( false === $mime ) {
		return 'application/octet-stream';
	}
	
	// Override text types with special extensions
	// Required on some OSes like OpenBSD
	if ( 0 === \strcasecmp( $mime, 'text/plain' ) ) {
		$ext = \pathinfo( $path, \PATHINFO_EXTENSION ) ?? '';
		
		switch( \strtolower( $ext ) ) {
			case 'css':
				return 'text/css';
				
			case 'js':
				return 'text/javascript';
				
			case 'svg':
				return 'image/svg+xml';
				
			case 'vtt':
				return 'text/vtt';
		}
	}
	
	return \strtolower( $mime );
}

/**
 *  Prepare to send a file instead of an HTTP response
 *  
 *  @param string	$path		File path to send
 *  @param int		$code		HTTP Status code
 *  @param bool		$verify		Verify mime content type
 */
function sendFilePrep( 
	string		$path, 
	int		$code		= 200, 
	bool		$verify		= true 
) {
	scrubOutput();
	httpCode( $code );
	
	// Setup content security
	preamble( '', false, false );
	
	// Set content type if mime is found
	if ( $verify && $code != 206 ) {
		$mime	= detectMime( $path );
		\header( "Content-Type: {$mime}", true );
	}
	\header( "Content-Security-Policy: default-src 'self'", true );	
}

/**
 *  Check If-None-Match header against given ETag
 *  
 *  @return true if header not set or if ETag doesn't match
 */
function ifModified( $etag ) : bool {
	$mod = $_SERVER['HTTP_IF_NONE_MATCH'] ?? '';
	
	if ( empty( $mod ) ) {
		return true;
	}
	
	return ( 0 !== \strcmp( $etag, $mod ) );
}

/**
 *  Open a file stream in binary mode and set blocking mode
 *  
 *  @param mixed	$stream		File resource or false if initializing
 *  @param string	$path		File path
 *  @return resource|false
 */
function openStream( &$stream, string $path ) {
	$stream = fopen( $path, 'rb' );
	if ( false === $stream ) {
		return;
	}
	\stream_set_blocking( $stream, false );
}

/**
 *  Close opened stream
 *  
 *  @param resource	$stream		Open file stream
 */
function closeStream( &$stream ) {
	if ( false === $stream ) {
		return;
	}
	fclose( $stream );
	$stream = false;
}

/**
 *  Stream content in chunks within starting and ending limits
 *  
 *  @param resource	$stream		Open file stream
 *  @param int		$int		Starting offset
 *  @param int		$end		Ending offset or end of file
 */
function streamChunks( &$stream, int $start, int $end ) {
	// Default chunk size
	$csize	= config( 'stream_chunk_size', \STREAM_CHUNK_SIZE, 'int' );
	$sent	= 0;
	
	fseek( $stream, $start );
	
	while ( !feof( $stream ) ) {
		
		// Check for aborted connection between flushes
		if ( \connection_aborted() ) {
			closeStream( $stream );
			visitorAbort();
		}
		
		// End reached
		if ( $sent >= $end ) {
			flushOutput();
			break;
		}
		
		// Change chunk size when approaching the end of range
		if ( $sent + $csize > $end ) {
			$csize = ( $end + 1 ) - $sent;
		}
		
		// Reset limit while streaming
		\set_time_limit( 30 );
		
		$buf = fread( $stream, $csize );
		echo $buf;
		
		$sent += strsize( $buf );
		
		flushOutput();
	}
}

/**
 *  Finish file sending functionality
 *  
 *  @param string	$path		File path to send
 */
function sendFileFinish( $path ) {
	// Prepare content length and etag headers
	$tags	= genEtag( $path );
	$fsize	= $tags['fsize'];
	$etag	= $tags['etag'];
	$stream = false;
	
	if ( false !== $fsize ) {
		$climit = config( 'stream_chunk_limit', \STREAM_CHUNK_LIMIT, 'int' );
	
		// Prepare resource if this is a large file
		if ( $fsize > $climit ) {
			openStream( $stream, $path );
			if ( false === $stream ) {
				// Don't send error or this may loop
				// Error handlers also use this function
				shutdown( 'logError', 'Error opening ' . $path );
				shutdown();
			}
		}
	
		\header( "Content-Length: {$fsize}", true );
		if ( !empty( $etag ) ) {
			\header( "ETag: {$etag}", true );
		}
		
		if ( config( 'show_modified', \SHOW_MODIFIED, 'int' ) ) {
			$fmod	= $tags['fmod'];
			if ( !empty( $fmod ) ) {
				\header( 
					'Last-Modified: ', 
					dateRfcFile( $fmod ), 
					true
				);
			}
		}
	}
	
	// Cleanup and flush before readfile
	cleanup();
	
	// Send any headers and end buffering
	flushOutput( true );
	
	if ( ifModified( $etag ) ) {
		if ( $stream === false ) {
			\readfile( $path );
			return;
		}
		streamChunks( $stream, 0, $fsize );
		closeStream( $stream );
	}
}

/**
 *  Send file-specific headers
 *  
 *  @param string	$dsp		Content disposition
 *  @param string	$fname		Download file name
 *  @param bool		$cache		Set file cache
 */
function sendFileHeaders( string $dsp, string $fname, bool $cache ) {
	// Setup file parameters
	\header( 
		"Content-Disposition: {$dsp}; filename=\"{$fname}\"", 
		true
	);
	
	\header( "Accept-Ranges: bytes", true );
	
	// If cached, set long expiration
	if ( $cache ) {
		\header( 'Cache-Control:public, max-age=31536000', true );
		return;
	}
	// Uncached
	\header( 'Cache-Control: must-revalidate', true );
	\header( 'Expires: 0', true );
	\header( 'Pragma: no-cache', true );
}

/**
 *  Prepare to send back a dynamically generated file (E.G. Captcha)
 *  This function is a plugin helper
 *  
 *  @param string	$mime		Generated file's mime content-type
 *  @param string	$fname		File name
 *  @param int		$code		HTTP Status code
 *  @param bool		$cache		Cache generated file if true
 */
function sendGenFilePrep( 
	string		$mime, 
	string		$fname, 
	int		$code		= 200, 
	bool		$cache		= false 
) {
	sendFilePrep( $fname, $code, false );
	\header( "Content-Type: {$mime}", true );
	sendFileHeaders( 'inline', $fname, $cache );
}

/**
 *  Send a physical file if it exists
 *  
 *  @param string	$path		Physical path relative to script
 *  @param bool		$down		Prompt download if true
 *  @param int		$code		HTTP Status code
 */
function sendFile(
	string		$path,
	bool		$down		= false, 
	bool		$cache		= true,
	int		$code		= 200
) : bool {
	// No file found
	if ( !\file_exists( $path ) ) {
		return false;
	}
	
	// Client save path
	$fname	= \basename( $path );
	
	// Show inline or prompt download
	$dsp	= $down ? 'attachment' : 'inline';
	
	// Prepare to send file
	sendFilePrep( $path, $code );
	sendFileHeaders( $dsp, $fname, $cache );
	
	// Finish sending file
	sendFileFinish( $path );
	return true;
}

/**
 *  Source directory helper for host/domain specific folders
 *  
 *  @return string
 */
function getHostDirectory( string $path ) : string {
	$dr = $path . slashPath( getHost(), true );
	return \is_dir( $dr ) ? $dr : $path;
}

/**
 *  Get the relative post directory or host-specific plugin file path, or 
 *  global plugin file storage path if there's a subfolder with current hostname
 *  
 *  @param string	$src	Source type post, plugin, file
 *  @return string
 */
function getPostFileDir( string $src = 'none' ) : string {
	static $pd	= [];
	
	if ( isset( $pd[$src] ) ) {
		return $pd[$src];
	}
	
	switch( $src ) {
		case 'file':
			$pd[$src] = getHostDirectory( \UPLOADS );
			break;
			
		case 'plugin':
			$pd[$src] = getHostDirectory( \PLUGIN_DATA );
			break;
			
		default:
			$pd[$src] = \UPLOADS;
	}
	
	return $pd[$src];
}




/**
 *  Routing and redirection
 */

/**
 *  Redirect with status code
 *  
 *  @param int		$code		HTTP Status code
 *  @param string	$path		Full URL to from current domain
 */
function redirect(
	int		$code		= 200,
	string		$path		= ''
) {
	cleanOutput( true );
	
	$url	= \parse_url( $path );
	$host	= $url['host'] ?? '';
	
	// Arbitrary redirect attempt?
	if ( $host != $_SERVER['SERVER_NAME'] ) {
		logError( 'Invalid URL: ' . $path );
		die();
	}
	
	// Get get current path
	$path	= getRoot() . $url['path'] ?? '';
	
	// Directory traversal
	$path	= \preg_replace( '/\.{2,}', '.', $path );
	
	hook( [ 'redirect', [ 
		'path' => $path, 
		'code' => $code 
	] ] );
	// Check for headers
	if ( false === \headers_sent() ) {
		\header( 'Location: ' . $path, true, $code );
		die();
	}
	
	// Fallback HTML refresh
	$html = 
	"<html><head>" . 
	"<meta http-equiv=\"refresh\" content=\"0;url=\" . $path . \">".
	"</head><body><a href=\" . $path . \">continue</a></body></html>";
	
	logError( 'Headers already sent with code ' . $code . ' at  URL ' . $path );
	die( $html );
}

/**
 *  Paths are sent in bare. Make them suitable for matching.
 *  
 *  @param string $route URL path in plain format
 *  @return string Route in regex format
 */
function cleanRoute( array $markers, string $route ) {
	$route	= \strtr( $route, $markers );
	$regex	= \str_replace( '.', '\.', $route );
	return '@^/' . ltrim( $route, '/' ) . '/?$@i';
}

/**
 *  Filter path parameters to get rid of numeric indexes
 *  
 *  @param array	$params		URL placholders
 */
function filterParams( array $params ) : array {
	\array_shift( $params );
	
	return 
	\array_filter( 
		$params, 
		function( $k ) {
			return \is_string( $k );
		}, \ARRAY_FILTER_USE_KEY 
	);
}

/**
 *  Handle HEAD HTTP request method
 *  
 *  @param string	$path		Request URL
 *  @param array	$routes		Currently loaded routes
 */
function handleHead( string $path, array $routes ) {
	// Find any 'get' handlers for this route
	$match	= routeMatch( $path, 'get', $routes );
	
	if ( empty( $match ) ) {
		// No route? Try a file, but don't send it
		if ( fileRequest( 'get', $path, false ) ) {
			httpCode( 200 );
		} else {
			httpCode( 404 );
		}
	} else {
		// Route exists
		httpCode( 200 );
	}
	
	// Done
	shutdown( 'cleanup' );
	shutdown();
}

/**
 *  Handle OPTIONS HTTP request method
 */
function handleOptions() {
	// Send No Content
	httpCode( 204 );
	
	// Send allowed headers and cache respose
	sendAllowHeader();
	
	setCacheExp( 604800 );
	
	// Done
	shutdown( 'cleanup' );
	shutdown();
}

/**
 *  Check if content is already cached for this URI
 *  
 *  @param string	$path	Current request path
 */
function handleCache( string $path ) {
	$cache	= getCache( fullURI() );
	
	if ( empty( $cache ) ) {
		return;
	}
	
	// If URI is already saved, send contents and exit
	shutdown( 'cleanup' );
	
	// Is this a feed?
	if ( 0 === \strcasecmp( \basename( $path ), 'feed' ) ) {
		send( 200, $cache, false, true );
	}
	
	send( 200, $cache, false );
}

/**
 *  Check if method is listed in routes
 *  
 *  @param string	$verb		Lowercase request method
 *  @param array	$routes		Loaded URL paths and handlers
 */
function checkMethodRoutes( string $verb, array $routes ) {
	$mfound	= false;
	
	// Filter routes for methods without any handlers
	foreach ( $routes as $r ) {
		// Method has a handler
		if ( 0 === \strcasecmp( $r[0], $verb ) ) {
			$mfound = true;
			break;
		}
	}
	
	// No method implemented for this route
	if ( !$mfound ) {
		shutdown( 'logError', \MSG_NOMETHOD . ' ' . $verb );
		sendError( 501, errorLang( "nomethod", \MSG_NOMETHOD ) );
	}
}

/**
 *  Find methods and paths that can be handled before routing
 *  
 *  @param string	$verb		Lowercase request method
 *  @param string	$path		Requested URL path
 *  @param array	$routes		Currently loaded routes and handlers
 */
function methodPreParse( string $verb, string $path, array $routes ) {
	
	// Check request method
	switch( $verb ) {
		// Will need processing, continue
		case 'get':
			// Try to send file, if it's a file
			if ( fileRequest( $verb, $path ) ) {
				shutdown( 'cleanup' );
				shutdown();
			
			// Try to send cache if it's available
			} else {
				handleCache( $path );
			}
			break;
		
		// Send no content
		case 'head':
			handleHead( $path, $routes );
			break;
		
		// Send allowed methods
		case 'options':
			handleOptions();
			break;
		
		// Special case post
		case 'post':
			break;
		
		// Nothing else implemented
		default:
			visitorError( 405, 'Method' );
			shutdown( 'cleanup' );
			send( 405 );
	}
}

/**
 *  Request filter and cache check. This should be first called
 *  
 *  @param string	$event		Event name should be 'begin'
 *  @param array	$hook		Hook event data
 *  @param array	$params		Hook params
 */
function request( string $event, array $hook, array $params ) : array {
	
	// Set session save handler
	setSessionHandler();
	
	// Check throttling
	sessionThrottle();
	
	// Check for closed connection
	if ( \connection_aborted() ) {
		visitorAbort();
	}
	
	$host	= getHost();
	
	// Empty host?
	if ( empty( $host ) ) {
		visitorError( 400, 'Host' );
		sendError( 400, errorLang( "invalid", \MSG_INVALID ) );
	}
	
	// Sanity checks
	$path	= getURI();
	$verb	= getMethod();
	$safe	= getAllowedMethods( true );
	
	// Unrecognized method?
	if ( !\in_array( $verb, $safe ) ) {
		sendBadMethod();
	}
	
	// If uploading isn't allowed files should be empty
	if ( 
		!config( 'allow_upload', \ALLOW_UPLOAD, 'bool' ) && 
		!empty( $_FILES ) 
	) {
		sendBadMethod();
	}
	
	// Request path hard limit
	$lurl	= config( 'max_url_size', \MAX_URL_SIZE, 'int' );
	if ( strsize( $path ) > $lurl ) {
		visitorError( 414, 'Path' );
		shutdown( 'cleanup' );
		send( 414 );
	}
	
	// Request path (simpler filter before proper XSS scan)
	if ( 
		false !== \strpos( $path, '..' ) || 
		false !== \strpos( $path, '<' )	
	) {
		visitorError( 400, 'Path' );
		sendError( 400, errorLang( "invalid", \MSG_INVALID ) );
	}
	
	// Possible XSS, directory traversal
	if ( 
		\preg_match( RX_XSS3, $path ) || 
		\preg_match( RX_XSS4, $path )
	) {
		sendDenied();
	}
	
	// Match whitelisted host and root path
	if ( !hostPathMatch( $host, $path ) ) {
		sendDenied();
	}
	
	// Get routes from route init
	hook( [ 'initroutes', [] ] );
	$routes = hook( [ 'initroutes', '' ] );
	
	if ( empty( $routes ) ) {
		logError( \MSG_NOROUTE );
		die();
	}
	
	// Handle special methods before routing
	methodPreParse( $verb, $path, $routes );
	checkMethodRoutes( $verb, $routes );
	
	// Return with routes and extras in hook
	return 
	[ 'path' => $path, 'verb' => $verb, 'routes' => $routes ];
}

/**
 *  Get all whitelisted extensions
 */
function extGroups( string $group = '' ) : array {
	// Default whitelist
	$cs	= 
	config( 'ext_whitelist', whiteLists( decode( \EXT_WHITELIST ), true ) );
	
	// Extend whitelist via hooks
	hook( [ 'extwhitelist', [ 'whitelist' => $cs ] ] );
	$sent	= hookArrayResult( 'extwhitelist', [] );
	
	// Filtered whitelist
	$ext	= empty( $sent ) ? $cs : 
		\array_merge( $cs, $sent['whitelist'] ?? [] );
	
	$all	= \implode( ',', $ext );
	
	return empty( $group ) ? 
		\array_unique( trimmedList( $all, true ) ) : 
		\array_unique( trimmedList( $ext[$group] ?? '', true ) );
}

/**
 *  Check if the requested path has a whitelisted extension
 *  
 *  @param string	$path		Requested URI
 *  @param string	$group		Specific type I.E. "images"
 */
function isSafeExt( string $path, string $group = '' ) : bool {
	static $safe	= [];
	static $checked	= [];
	$key		= $group . $path;
	
	if ( isset( $checked[$key] ) ) {
		return $checked[$key];
	}
	
	if ( !isset( $safe[$group] ) ) {
		$safe[$group]	= extGroups( $group );
	}
	
	$ext		= 
	\pathinfo( $path, \PATHINFO_EXTENSION ) ?? '';
	
	$checked[$key] = 
	\in_array( \strtolower( $ext ), $safe[$group] );
	
	return $checked[$key];
}

/**
 *  Send route to registered event
 */
function sendRoute( string $event, string $path, string $verb, array $params ) {
	// Call request url event with filtered params
	hook( [ 'requesturl', filterParams( $params ) ] );
	
	// Store event results
	$params			= hook( [ 'requesturl', '' ] );
	
	// Append the method and route
	$params['path']		= $path;
	$params['method']	= $verb;
	
	// Send url event with request url event results
	hook( [ $event, $params ] );
}

/**
 *  Find the first matching route path associated the given event name
 *  
 *  @param string	$event		Event to which the route is attached
 *  @param string	$default	Default route if no event is attached
 *  @return string
 */
function eventRoutePrefix(
	string	$event,
	string	$default
) : string {
	// First instance of route path by event name
	$frag	= getRoutePath( $event, $default );
	
	return \trim( $frag , '\\/' );
}

/**
 *  Find the path from given hook event handler name
 *  
 *  @param string	$event		Hook event name
 *  @param string	$fallback	Backup path if event isn't found
 *  @param array	$routes		Sent routes to handler (optional)
 */
function getRoutePath( 
	string		$event,
	string		$fallback, 
	array		$routes		= [] 
) {
	static $loaded	= [];
	
	if ( !empty( $routes ) ) {
		$loaded	= $routes;
		return;
	}
	
	foreach ( $loaded as $map ) {
		if ( 0 == \strcasecmp( $map[2], $event ) ) {
			return $map[1];
		}
	}
	
	return $fallback;
}

/**
 *  Route placeholder parse event
 */
function routeMarkers( string $event, array $hook, array $params ) {
	return \array_merge( $hook, decode( \ROUTE_MARK ) );
}

/**
 *  Parse marker placeholders
 */
function getMarkers() : array {
	static $markers;
	if ( !isset( $markers ) ) {
		hook( [ 'routemarker', [] ] );
		$markers = hook( [ 'routemarker', '' ] );
	}
	return $markers;
}

/**
 *  Find and return route handler for given path and any URL parameters
 *  
 *  @param string	$path		Request URI from user
 *  @param string	$verb		Request method
 *  @param array	$routes		Mapped route handlers
 */
function routeMatch( 
	string		$path, 
	string		$verb, 
	array		$routes
) : array {
	$markers	= getMarkers();
	$root		= getRoot();
	foreach( $routes as $map ) {
		// Not the method? keep going
		if ( 0 !== \strcmp( $map[0], $verb ) ) {
			continue;
		}
		
		// Exact match? No need to go further
		if ( 0 === \strcasecmp( $map[1], $path ) ) {
			return [ $map[2], [] ];
		}
		
		// Prepare for matching
		$rx = cleanRoute( $markers, $root . $map[1] );
		
		// Page match? Send handler and URL params
		if ( \preg_match( $rx, $path, $params ) ) {
			return [ $map[2], $params ];
		}
	}
	
	return [];
}

/**
 *  Get list of loaded plugins
 *  
 *  @return array
 */
function loadedPlugins() : array {
	$loaded	= internalState( 'loadedPlugins' );
	if ( empty( $loaded ) || false === $loaded ) {
		return [];
	}
	return \is_array( $loaded ) ? $loaded : [];
}

/**
 *  Filter plugin names into usable array
 *  
 *  @param mixed	$pl	List of plugins as an array or string
 *  @return array
 */
function pluginNames( $pl ) : array {
	return 
	\is_array( $pl ) ? 
		\array_map( 'strtolower', 
			\array_map( 'labelName', $pl ) ) : 
		\array_map( 'labelName', trimmedList( $pl, true ) );
}

/**
 *  Plugin loading event handler
 */
function loadPlugins( string $event, array $hook, array $params ) {
	// This should be the first function called 
	// so there shouldn't be any previous return data
	if ( !empty( $hook ) ) {
		logError( 'Out of order call. Check hooks.' );
		die();
	}
	
	$pl		= config( 'plugins_enabled', \PLUGINS_ENABLED );
	if ( empty( $pl ) ) {
		// Nothing to load
		return;
	}
	
	$plugins	= pluginNames( $pl );
	$msg		= [];
	$loaded		= [];
	
	// Preload templates
	$templates	= $params['templates'] ?? [];
	
	// Plugin root
	$pr	= slashPath( \PLUGINS, true );
	
	foreach ( $plugins as $p ) {
		// Generate and check full plugin file path
		$path = $pr . $p . DIRECTORY_SEPARATOR . $p . '.php';
		if ( empty( filterDir( $path, $pr ) ) ) {
			$msg[]		= $p;
			continue;
		}
		
		// Load plugin if it exists or add to failed list
		if ( \file_exists( $path ) ) {
			require( $path );
			$loaded[]	= $p;
		} else {
			$msg[]		= $p;
		}
	}
	
	// Set plugin list
	internalState( 'loadedPlugins', $loaded );
	
	// Register new templates or overwrite existing
	template( '', $templates );
	
	if ( !empty( $msg ) ) {
		shutdown( 
			'logError', 
			'Error loading plugins(s): ' . 
				\implode( ', ', $msg ) . 
				' From directory: ' . $pr
		);
	}
	hook( [ 'pluginsLoaded', [ 'plugins' => $p, 'failed' => $msg ] ] );
}

/**
 *  Send file with ETag data
 *  
 *  @param string	$path	File path after confirming it exists
 */
function sendWithEtag( $path ) : bool {
	$tags	= genEtag( $path );
	
	// Couldn't generate ETag?
	// Either filesize() or filemtime() failed
	if ( empty( $tags['etag'] ) ) {
		return false;
	}
	
	// Create return code based on returned ETag
	$code	= ifModified( $tags['etag'] )? 200 : 304;
	
	// Send on success
	return sendFile( $path, false, true, $code );
}

/**
 *  Handle ranged file request
 *  
 *  @param string	$path		Absolute file path
 *  @param bool		$dosend		Send file ranges if true
 *  @return bool
 */
function sendFileRange( string $path, bool $dosend ) : bool {
	$frange	= getFileRange();
	$fsize	= filesize( $path );
	$fend	= $fsize - 1;
	$totals	= 0;
	
	// Check if any ranges are outside file limits
	foreach ( $frange as $r ) {
		if ( $r[0] >= $fend || $r[1] > $fend ) {
			sendRangeError();
		}
		$totals += ( $r[1] > -1 ) ? 
			( $r[1] - $r[0] ) + 1 : ( $fend - $r[0] ) + 1;
	}
	
	if ( !$dosend ) {
		return true;
	}
	
	openStream( $stream, $path );
	if ( false === $stream ) {
		shutdown( 'logError', 'Error opening ' . $path );
		sendError( 500, errorLang( "generic", \MSG_GENERIC ) );
	}
	
	// Prepare partial content
	sendFilePrep( $path, 206, false );
	\header( "Accept-Ranges: bytes", true );
	
	$mime	= detectMime( $path );
	
	// Generate boundary
	$bound	= \base64_encode( \hash( 'sha1', $path . $fsize, true ) );
	\header(
		"Content-Type: multipart/byteranges; boundary={$bound}",
		true
	);
	
	\header( "Content-Length: {$totals}", true );
	
	cleanup();
	
	// Send any headers and end buffering
	flushOutput( true );
	
	// Start fresh buffer
	\ob_start();
	
	$limit = 0;
	
	foreach ( $frange as $r ) {
		echo "\n--{$bound}";
		echo "Content-Type: {$mime}";
		if ( $r[1] == -1 ) {
			echo "Content-Range: bytes {$r[0]}-{$fend}/{$fsize}\n";
		} else {
			echo "Content-Range: bytes {$r[0]}-{$r[1]}/{$fsize}\n";
		}
		
		$limit = ( $r[1] > -1 ) ? $r[1] + 1 : $fsize;
		streamChunks( $stream, $r[0], $limit );
	}
	
	closeStream( $stream );
	flushOutput( true );
	return true;
}

/**
 *  Get resource from plugin directory(ies)
 *  
 *  @param bool		$dosend	Send the file if found
 */
function sendPluginFile( 
	string		$plugin, 
	string		$path, 
	bool		$dosend		= false 
) : bool {
	$loaded	= loadedPlugins();
	
	// Nothing loaded to search?
	if ( empty( $loaded ) ) {
		return false;
	}
	
	// Clip plugin name from path to prepare for asset searching
	$path	= truncate( $path, strsize( $plugin ) - 1, strsize( $path ) );
	
	// Check if ranged request
	$frange	= getFileRange();
	
	// Plugin root and asset folders
	$pr	= slashPath( \PLUGINS, true );
	$pa	= slashPath( config( 'plugin_assets', \PLUGIN_ASSETS ), true );
	
	foreach ( $loaded as $p ) {
		// Check if first path fragment is the same as the plugin name
		if ( 0 !== \strcasecmp( $p, $plugin ) ) {
			continue;
		}
		
		// Send first occurence of file within the assets of each plugin
		$fpath = $pr . $p . DIRECTORY_SEPARATOR . $pa . $path;
		if ( \file_exists( $fpath ) ) {
			if ( empty( $frange ) ) {
				return $dosend ? sendWithEtag( $fpath ) : true;
			}
			return sendFileRange( $fpath, $dosend );
		}
		
		// File written by plugin?
		$fpath = 
		getPostFileDir( 'plugin' ) . $p . DIRECTORY_SEPARATOR . $path;
		if ( \file_exists( $fpath ) ) {
			if ( empty( $frange ) ) {
				return $dosend ? sendWithEtag( $fpath ) : true;
			}
			return sendFileRange( $fpath, $dosend );
		}
	}
	
	return false;
}

/**
 *  Check path for file request
 *  
 *  @param string	$verb	Request method should be get
 *  @param string	$path	Relative path from client
 *  @param bool		$dosend	Send the file if found
 */
function fileRequest(
	string		$verb, 
	string		$path, 
	bool		$dosend = true 
) : bool {
	if ( 0 != \strcmp( 'get', $verb ) || !isSafeExt( $path ) ) {
		return false;
	}
	
	// Trim leading slash and append static file path
	$path	= \preg_replace( '/^\//', '', $path );
	
	// Break path to count folders and search plugins
	$segs	= explode( '/', $path );
	
	// Check folder limits
	$climit	= config( 'folder_limit', \FOLDER_LIMIT, 'int' );
	$c	= count( $segs );
	if ( $c > $climit ) {
		return false;
	}
	
	// Static file path
	$fpath	= getPostFileDir( 'file' ) . $path;
	
	// Check if ranged request
	$frange	= getFileRange();
	
	// Range wasn't satisfiable
	if ( \in_array( -1, $frange ) ) {
		sendRangeError();
	}
	
	if ( \file_exists( $fpath ) ) {
		if ( empty( $frange ) ) {
			return $dosend ? sendWithEtag( $fpath ) : true;
		}
		
		return sendFileRange( $fpath, $dosend );
	}
	
	// If there's no prefix, there's no plugin folder to check 
	if ( $c < 2 ) {
		return false;
	}
	
	// If direct path doesn't exist, try to send it via plugin asset path
	return sendPluginFile( $segs[0], $path, $dosend );
}

/**
 *  Main route handler
 *  
 *  @param string	$event		Hook event name
 *  @param array	$hook		Preceding hook handler data
 *  @param array	$params		Hook parameters
 */
function route( string $event, array $hook, array $params ) {
	static $markers;
	
	$path	= $hook['path'];
	$verb	= $hook['verb'];
	
	// Passed URL routes and handlers
	$routes	= $hook['routes'];
	
	// Load paths to getRoutePath
	getRoutePath( '', '', $routes );
	
	$match	= routeMatch( $path, $verb, $routes );
	
	// No handler for this route?
	if ( empty( $match ) ) {
		// Nothing else sent
		sendNotFound();
	}
	
	sendRoute( $match[0], $path, $verb, $match[1] );
}

/**
 *  File handling
 */

/**
 *  Verify if given directory path is a subfolder of root
 *  
 *  @param string	$path	Folder path to check
 *  @param string	$root	Full parent folder path
 *  @return string Empty if directory traversal or other issue found
 */
function filterDir( $path, string $root = \UPLOADS ) {
	if ( \strpos( $path, '..' ) ) {
		return '';
	}
	
	$lp	= \strlen( $root );
	if ( \strlen( $path ) < $lp ) { 
		return ''; 
	}
	$pos	= \strpos( $path, $root );
	if ( false === $pos ) {
		return '';
	}
	$path	= \substr( $path, $pos + $lp );
	return \trim( $path ?? '' );
}

/**
 *  Rename if a file by that name already exists in destination
 *  
 *  @param string	$path	Original file name
 */
function dupRename( string $path ) : string {
	$info	= \pathinfo( $path );
	$ext	= filterExt( $info['extension'] ?? '' );
	$name	= $info['filename'];
	$dir	= $info['dirname'];
	$file	= $path;
	$i	= 0;
	
	while ( \file_exists( $file ) ) {
		$file = slashPath( $dir, true ) . 
			$name . '_' . $i++ . 
			\rtrim( '.' . $ext, '.' );
	}
	
	return $file;
}

/**
 *  Create image thumbnails from file path and given mime type
 *  
 *  @param string 	$src	Original image path
 *  @param string	$mime	Image mime type
 */
function createThumbnail( 
	string	$src,
	string	$mime 
) : string {
	
	// Get size and set proportions
	$imgsize	= \getimagesize( $src );
	if ( false === $imgsize ) {
		return '';
	}
	
	if ( empty( $imgsize[0] ) || empty( $imgsize[1] ) ) {
		return '';
	}
	$width		= $imgsize[0];
	$height		= $imgsize[1];
	
	$t_width	= 
	config( 'thumbnail_width', \THUMBNAIL_WIDTH, 'int' );
	
	// Width too small to generate thumbnail
	if ( $t_width > $width ) {
		return '';
	}
	
	$t_height	= ( $t_width / $width ) * $height;
	
	// New thumbnail
	$thumb		= \imagecreatetruecolor( $t_width, $t_height );
	
	// Create new image
	switch( $mime ) {
		case 'image/png':
			// Set transparent background
			\imagesavealpha( $thumb, true );
			$source	= \imagecreatefrompng( $src );
			break;
			
		case 'image/gif':
			$source	= \imagecreatefromgif( $src );
			break;
		
		case 'image/bmp':
			$source	= \imagecreatefrombmp( $src );
			break;
			
		default:
			$source	= \imagecreatefromjpeg( $src );
	}
	
	// Resize to new resources
	\imagecopyresized( $thumb, $source, 0, 0, 0, 0, 
		$t_width, $t_height, $width, $height );
	
	// Thunbnail destination
	$tnp	= config( 'thumbnail_prefix', \THUMBNAIL_PREFIX );
	$dest	= dupRename( prefixPath( $src, labelName( $tnp ) ) );
	
	// Create thumbnail at destination
	switch( $mime ) {
		case 'image/png':
			$tn = imagepng( $thumb, $dest, 100 );
			break;
		
		case 'image/gif':
			$tn = imagegif( $thumb, $dest, 100 );
			break;
		
		case 'image/bmp':
			$tn = imagebmp( $thumb, $dest, 100 );
			break;
		
		default:
			$tn = imagejpeg( $thumb, $dest, 100 );
	}
	
	// Did anything go wrong?
	if ( false === $tn ) {
		return '';
	}
	
	// Cleanup
	\imagedestroy( $thumb );
	
	return $dest;
}

/** 
 *  Return uploaded $_FILES array into a more sane format
 * 
 *  @return array
 */
function parseUploads() : array {
	$files = [];
	
	foreach ( $_FILES as $name => $file ) {
		if ( \is_array($file['name']) ) {
			foreach ( $file['name'] as $n => $f ) {
				$files[$name][$n] = [];
				
				foreach ( $file as $k => $v ) {
					$files[$name][$n][$k] = 
						$file[$k][$n];
				}
			}
			continue;
		}
		
        	$files[$name][] = $file;
	}
	return $files;
}

/**
 *  Filter upload file name into a safe format
 *  
 *  @param string	$name		Original raw filename
 *  @return string
 */
function filterUpName( ?string $name ) : string {
	if ( empty( $name ) ) {
		return '_';
	}
	
	$name	= \preg_replace('/[^\pL_\-\d\.\s]', ' ' );
	return \preg_replace( '/\s+/', '-', \trim( $name ) );
}

/**
 *  Format uploaded file info
 *  
 *  @param string	$src	Complete file path
 *  @param array	$img	Allowed thumbnail image types
 *  @param bool		$tn	Create a thumbnail for allowed types, if true
 */
function processUpload( string $src, array $img, bool $tn = false ) {
	$mime	= detectMime( $src );
	
	return [
		'src'		=> $src,
		'mime'		=> $mime,
		'filename'	=> \basename( $src ),
		'filesize'	=> \filesize( $src ),
		'description'	=> '',
		
		// Process thumbnail if needed
		'thumbnail'	=> $tn ? ( 
			\in_array( $mime, $img ) ? 
				createThumbnail( $src, $mime ) : '' 
		) : ''
	];
}

/**
 * Move uploaded files to the same directory as the post
 */
function saveUploads( 
	string	$path, 
	string	$root 
) {
	$files	= parseUploads();
	$store	= 
		slashPath( $root, true ) . 
		slashPath( $path, true );
	
	$saved	= [];
	foreach ( $files as $name ) {
		foreach( $name as $file ) {
			// If errors were found, skip
			if ( $file['error'] != \UPLOAD_ERR_OK ) {
				continue;
			}
			
			$tn	= $file['tmp_name'];
			$n	= filterUpName( $file['name'] );
			
			// Check for duplicates and rename 
			$up	= dupRename( $store . $n );
			if ( \move_uploaded_file( $tn, $up ) ) {
				$saved[] = $up;
			}
		}
	}
	$tn		= 
	config( 'thumbnail_gen', \THUMBNAIL_GEN, 'bool' );
	
	$img		= 
	trimmedList( config( 'thumbnail_types', \THUMBNAIL_TYPES ) );
	
	// Once uploaded and moved, format info
	$processed	= [];
	foreach( $saved as $k => $v ) {
		$processed[] = processUpload( $v, $img, $tn );	
	}
	return $processed;
}



/**
 *  Given a compelete file path, prefix a term to the filename and 
 *  return a unique file name path
 *  
 *  @param string	$path		Original file path
 *  @param string	$prefix		Path prepend fragment
 *  @param bool		$overwrite	Prevent duplicates by overwriting file path
 *  @return string
 */
function prefixPath(
	string	$path, 
	string	$prefix, 
	bool	$overwrite	= false 
) : string {
	$fname	= 
	rtrim( \dirname( $path ), \DIRECTORY_SEPARATOR ) . 
		\DIRECTORY_SEPARATOR . 
		$prefix . \basename( $path );
	
	// Avoid duplicates?
	return $overwrite ? $fname : dupRename( $fname );
}


/**
 *  Check if path exists in the given plugin writable directory
 *  
 *  @param string	$name	Plugin name to search writable directory
 *  @param string	$prefix	File name prefix
 *  @param string	$path	File path
 *  @return bool
 */
function pluginFileExists(
	string	$name, 
	string	$path, 
	string	$prefix		= '' 
) : bool {
	$ld = loadedPlugins();
	
	// Only check currently loaded plugins
	if ( !\in_array( $name, $ld ) ) {
		shutdown( 
			'logError', 
			'Attempt to search unloaded plugin directory: ' . $name 
		);
		return false;
	}
	
	$root	= getPostFileDir( 'plugin' ) . $name;
	$fpath	= prefixPath( $root . $path, $prefix );
	if ( empty( filterDir( $fpath, $root ) ) ) {
		shutdown(
			'logError',
			'Invalid file path search: ' . $path
		);
		return false;
	}
	
	return \file_exists( $fpath );
}

/**
 *  Prepare writable file path directory for specified plugin
 *  
 *  @param string	$name		Plugin name to find writable directory
 *  @param string	$path		Relative path within plugin writable directory
 *  @param string	$prefix		File name prefix
 *  @param bool		$create		Create subfolders if they don't exist
 *  @param bool		$overwrite	Rename path if given file name already exists
 *  @return mixed
 */
function pluginWritePath( 
	string	$name, 
	string	$path, 
	string	$prefix		= '',
	bool	$create		= false, 
	bool	$overwrite	= false 
) {
	$ld = loadedPlugins();
	
	// Only write to currently loaded plugins;
	if ( !\in_array( $name, $ld ) ) {
		shutdown( 
			'logError', 
			'Attempt to write to unloaded plugin directory: ' . $name 
		);
		return null;
	}
	
	// Prepare plugin write path
	$root	= getPostFileDir( 'plugin' ) . $name;
	$fpath	= prefixPath( $root . $path, $prefix, $overwrite );
	
	if ( empty( filterDir( $fpath, $root ) ) ) {
		shutdown(
			'logError',
			'Invalid file path search: ' . $path
		);
		return null;
	}
	
	// Create plugin writable directory in cache
	$dir = \dirname( $fpath );
	
	if ( $create && !\is_dir( $dir ) ) {
		\mkdir( $dir, 0755, true );
		\chmod( $dir, 0755 );
	}
	
	return $fpath;
}

/**
 *  Request filter event
 *  
 *  @param string	$event	Request event name
 *  @param array	$hook	Previous hook event data
 *  @param array	$params	Passed event data
 */
function filterRequest( string $event, array $hook, array $params ) {
	$now	= time();
	$mpage	= config( 'max_page', \MAX_PAGE, 'int' );
	$ye	= ( int ) \date( 'Y', $now );
	
	$filter	= [
		'id'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'default'	=> 0
			]
		],
		'page'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> $mpage,
				'default'	=> 1
			]
		],
		'year'	=> [
			'filter'	=> \FILTER_SANITIZE_NUMBER_INT,
			'options'	=> [
				'min_range'	=> 1990,
				'max_range'	=> $ye,
				'default'	=> $ye
			]
		],
		'month'	=> [
			'filter'	=> \FILTER_SANITIZE_NUMBER_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 12,
				'default'	=> 
				( int ) \date( 'n', $now )
			]
		],
		'day'	=> [
			'filter'	=> \FILTER_SANITIZE_NUMBER_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 31,
				'default'	=> 
				( int ) \date( 'j', $now )
			]
		],
		'tag'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'unifySpaces'
		],
		'slug'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'options'	=> [ 'default' => '' ]
		],
		'user'	=> [
			'filter'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'options'	=> [ 'default' => '' ]
		],
		'find'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'unifySpaces'
		],
		'tree'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'cleanUrl'
		],
		'token'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'nonce'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'meta'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS
	];
	
	return 
	\array_merge( $hook, \filter_var_array( $params, $filter ) );
}



/**
 *  User input and form processing
 */

/**
 *  Initiate field token or reset existing
 *  
 *  @return string
 */ 
function tokenKey( bool $reset = false ) : string {
	sessionCheck();
	if ( empty( $_SESSION['TOKEN_KEY'] ) || $reset ) {
		$_SESSION['TOKEN_KEY'] = genId( 16 );
	}
	
	return $_SESSION['TOKEN_KEY'];
}

/**
 *  Generate a hash for meta data sent to HTML forms
 *  
 *  This function helps prevent tampering of metadata sent separately
 *  to the user via other hidden fields
 *  
 *  @example genMetaKey( [ 'id=12','name=DoNotChange' ] ); 
 *  
 *  @param array	$args	Form field names sent to generate key
 *  @param bool		$reset	Reset any prior token key if true
 *  @return string
 */
function genMetaKey( array $args, bool $reset = false ) : string {
	static $gen	= [];
	$data		= \implode( ',', $args );
	
	if ( \array_key_exists( $data, $gen ) && !$reset ) {
		return $gen[$data];
	}
	
	$ha		= hashAlgo( 'nonce_hash', \NONCE_HASH );
	$gen[$data]	= 
	\base64_encode( 
		\hash( $ha, $data . tokenKey( $reset ), true ) 
	);
	
	return $gen[$data];
}

/**
 *  Verify meta data key
 *  
 *  @param string	$key	Token key name
 *  @param array	$args	Original form field names sent to generate key
 *  @return bool		True if token matched
 */
function verifyMetaKey( string $key, array $args ) : bool {
	if ( empty( $key ) ) {
		return false;
	}
	
	$info	= \base64_decode( $key, true );
	if ( false === $info ) {
		return false;
	}
	
	$data	= \implode( ',', $args );
	$ha	= hashAlgo( 'nonce_hash', \NONCE_HASH );
	
	return 
	\hash_equals( 
		$info, 
		\hash( $ha, $data . tokenKey(), true ) 
	);
}

/**
 *  Create a unique nonce and token pair for form validation and meta key
 *  
 *  @param string	$name	Form label for this pair
 *  @param array	$fields	If set, append form anti-tampering token
 *  @param bool		$reset	Reset any prior anti-tampering token key if true
 *  @return array
 */
function genNoncePair( 
	string		$name, 
	array		$fields		= [], 
	bool		$reset		= false 
) : array {
	$tb	= config( 'token_bytes', \TOKEN_BYTES, 'int' );
	$ha	= hashAlgo( 'nonce_hash', \NONCE_HASH );
	
	$nonce	= genId( intRange( $tb, 8, 64 ) );
	$time	= time();
	$data	= $name . $time;
	$token	= "$time:" . \hash( $ha, $data . $nonce );
	return [ 
		'token' => \base64_encode( $token ), 
		'nonce' => $nonce,
		'meta'	=> 
			empty( $fields ) ? '' : genMetaKey( $fields, $reset )
	];
}

/**
 *  Verify form submission by checking sent token and nonce pair
 *  
 *  @param string	$name	Form label to validate
 *  @params string	$token	Sent token
 *  @params string	$nonce	Sent nonce
 *  @param bool		$chk	Check for form expiration if true
 *  @return int
 */
function verifyNoncePair(
	string		$name, 
	string		$token, 
	string		$nonce,
	bool		$chk
) : int {
	
	$ln	= \strlen( $nonce );
	$lt	= \strlen( $token );
	
	// Sanity check
	if ( 
		$ln > 100 || 
		$ln <= 10 || 
		$lt > 350 || 
		$lt <= 10
	) {
		return \FORM_STATUS_INVALID;
	}
	
	// Open token
	$token	= \base64_decode( $token, true );
	if ( false === $token ) {
		return \FORM_STATUS_INVALID;
	}
	
	// Token parameters are intact?
	if ( false === \strpos( $token, ':' ) ) {
		return \FORM_STATUS_INVALID;
	}
	
	$parts	= \explode( ':', $token );
	$parts	= \array_filter( $parts );
	if ( \count( $parts ) !== 2 ) {
		return \FORM_STATUS_INVALID;
	}
	
	if ( $chk ) {
		// Check for flooding
		$time	= time() - ( int ) $parts[0];
		$fdelay	= config( 'form_delay', \FORM_DELAY, 'int' );
		if ( $time < $fdelay ) {
			return \FORM_STATUS_FLOOD;
		}
		
		// Check for form expiration
		$fexp	= config( 'form_expire', \FORM_EXPIRE, 'int' );
		if ( $time > $fexp ) {
			return \FORM_STATUS_EXPIRED;
		}
	}
	
	$ha	= hashAlgo( 'nonce_hash', \NONCE_HASH );
	$data	= $name . $parts[0];
	$check	= \hash( $ha, $data . $nonce );
	
	return \hash_equals( $parts[1], $check ) ? 
		\FORM_STATUS_VALID : \FORM_STATUS_INVALID;
}

/**
 *  Validate sent token/nonce pairs in sent form data
 *  
 *  @param string	$name	Form label to validate
 *  @param bool		$get	Validate get request if true
 *  @param bool		$chk	Check for form expiration if true
 *  @param array	$fields	If set, verify form anti-tampering token
 *  @return int
 */
function validateForm(
	string		$name, 
	bool		$get		= true,
	bool		$chk		= true,
	array		$fields		= []
) : int {
	$filter = [
		'token'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'nonce'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS,
		'meta'	=> \FILTER_SANITIZE_FULL_SPECIAL_CHARS
	];
	
	$data	= $get ? 
	\filter_input_array( \INPUT_GET, $filter ) : 
	\filter_input_array( \INPUT_POST, $filter );
	
	if ( empty( $data['token'] ) || empty( $data['nonce'] ) ) {
		return \FORM_STATUS_INVALID;
	}
	
	if ( empty( $fields ) ) {
		return 
		verifyNoncePair( $name, $data['token'], $data['nonce'], $chk );
	}
	
	// If fields were set, meta key was generated
	// Check if it's still there
	if ( !verifyMetaKey( $data['meta'] ?? '', $fields ) ) {
		return \FORM_STATUS_INVALID;
	}
	
	return 
	verifyNoncePair( $name, $data['token'], $data['nonce'], $chk );
}

/**
 *  Process search pattern for full text searching
 *  
 *  @param string	$find	Sent search parameters
 *  @return string
 */
function searchData( string $find ) : string {
	// Remove tags and trim
	$find	= bland( $find );
	if ( empty( $find ) ) {
		return '';
	}
	
	// Search words including quoted terms
	if ( \preg_match_all( '/"(?:\\\\.|[^\\\\"])*"|\S+/', $find, $m ) ) {
		if ( empty( $m ) ) {
			return '';
		}
		$fdata	= \array_unique( $m[0] ?? [] );
	} else {
		return '';
	}
	
	if ( empty( $fdata ) ) {
		return '';
	}
	
	// Limit maximum number of unique words to search
	$sc	= config( 'max_search_words', \MAX_SEARCH_WORDS, 'int' );
	if ( count( $fdata ) > $sc ) {
		$fdata = \array_slice( $fdata, 0, $sc );
	}
	
	// Insert ' OR ' for multiple terms
	$find	= \implode( ' OR ', $fdata );
	
	// Remove conflicting/duplicate params
	$find	= 
	\preg_replace( '/\b(AND|OR|NEAR|NOT)(?:\s\1)+/iu', 'OR', $find );
	
	$find	= \preg_replace( '/\bOR NEAR/iu', 'NEAR', $find );
	$find	= \preg_replace( '/\bNEAR OR/iu', 'NEAR', $find );
	$find	= \preg_replace( '/\bOR AND/iu', 'AND', $find );
	$find	= \preg_replace( '/\bAND OR/iu', 'AND', $find );
	$find	= \preg_replace( '/\bOR NOT/iu', 'NOT', $find );
	$find	= \preg_replace( '/\bNOT OR/iu', 'NOT', $find );
	
	$find	= 
	\preg_replace( '/\b(AND|OR|NEAR|NOT)(?:\s\1)+/iu', 'OR', $find );
	
	// Return with keywords removed from beginning and end
	return 
	\preg_replace( 
		'/^(AND|OR|NEAR|NOT)(.*)(AND|OR|NEAR|NOT)$/ius', 
		'$2', \trim( $find )
	);
}

/**
 *  Render search form template
 *  
 *  @return string
 */
function searchForm() : string {
	// Search form hidden fields
	$pair	= genNoncePair( 'searchform' );
	
	// Send to xsrf hooks
	$xsrf	= 
	hookWrap( 
		'beforesearchxsrf',
		'aftersearchxsrf',
		template( 'tpl_input_xsrf' ), 
		[ 
			'nonce'	=> $pair['nonce'], 
			'token'	=> $pair['token'],
			'meta'	=> '' // Search forms are cached
		]
	);
	
	// Send search form hook output
	return
	hookWrap( 
		'beforesearchform',
		'afterearchform',
		template( 'tpl_searchform' ), 
		[ 'xsrf' => $xsrf ]
	);
}

/**
 *  Render search pagination path
 *  
 *  @param array	$data	Search page URL components
 *  @return string
 */
function searchPagePath( array $data ) : string {
	return slashPath( pageRoutePath(), true ) . 
		'?nonce=' . $data['nonce'] . 
		'&token=' . $data['token'] . 
		'&meta=' . $data['meta'] . 
		'&find=' . $data['find'] . '/';
}

/**
 *  Get common words in text for searching
 *  
 *  @param string	$text		Content to process
 *  @param bool		$as_array	Returns as an array if true
 *  @return mixed
 */
function getCommonWords( string $text, bool $as_array = true ) {
	static $stop;
	
	// Exclude some English stop words
	static $default	= [
		'a', 'about', 'able', 'above', 'act', 'after', 'again', 
		'against', 'ago', 'all', 'also', 'am', 'an', 'and', 'any', 
		'apart', 'are', 'aren\'t', 'as', 'as', 'at', 'away', 
		'be', 'because', 'been', 'before', 'being', 'besides', 
		'beside', 'below', 'between', 'beyond', 'both', 'but', 
		'by', 'can', 'can\'t', 'cannot', 'could', 'couldn\'t', 
		'did', 'didn\'t', 'do', 'does', 'doesn\'t', 'doing', 
		'don\'t', 'down', 'during', 'each', 'few', 'for', 'from', 
		'further', 'had', 'hadn\'t', 'has', 'hasn\'t', 'have', 
		'haven\'t', 'having', 'he', 'he\'d', 'he\'ll', 'he\'s', 
		'her', 'here', 'here\'s', 'hers', 'herself', 'hi', 'him', 
		'himself', 'his', 'how', 'how\'s', 'i', 'i\'d', 'i\'ll', 
		'i\'m', 'i\'ve', 'ie', 'if', 'in', 'into', 'is', 'isn\'t', 
		'it', 'it\'s', 'its', 'itself', 'let\'s', 'like', 'j', 'k', 
		'km', 'kg', 'last', 'late', 'later', 'latter', 'may', 'maybe', 
		'me', 'more', 'most', 'mustn\'t', 'my', 'myself', 'no', 
		'nor', 'not', 'of', 'off', 'ok', 'on', 'once', 'only', 
		'or', 'other', 'ought', 'our', 'ours', 'ourselves', 
		'out', 'over', 'own', 'same', 'shan\'t', 'she', 'she\'d', 
		'she\'ll', 'she\'s', 'should', 'shouldn\'t', 'so', 
		'some', 'soon', 'such', 'than', 'that', 'that\'s', 'the', 
		'their', 'theirs', 'them', 'themselves', 'then', 'there', 
		'there\'s', 'these', 'they', 'they\'d', 'they\'ll', 
		'they\'re', 'they\'ve', 'this', 'those', 'through', 'to', 
		'too', 'under', 'until', 'up', 'very', 'was', 'wasn\'t', 
		'we', 'we\'d', 'well', 'we\'ll', 'we\'re', 'we\'ve', 
		'were', 'weren\'t', 'will', 'what', 'what\'s', 'when', 
		'when\'s', 'where', 'where\'s', 'which', 'while', 'who', 
		'who\'s', 'whom', 'why', 'why\'s', 'with', 'won\'t', 
		'would', 'wouldn\'t', 'yet', 'yes', 'you', 'you\'d', 
		'you\'ll', 'you\'re', 'you\'ve', 'your', 'yours', 
		'yourself', 'yourselves'
	];
	
	// Preset stop words
	if ( !isset( $stop ) ) {
		// Configured stop words
		$cstop	= config( 'stop_words', [], 'array' );
		$stop	= ( \is_array( $cstop ) && !empty( $cstop ) ) ?
				\array_merge( $default, $cstop ) : $default;
		
		// Send to hook for additional stop words
		hook( [ 'stopwords', [ 'words' => $stop ] ] );
		$stop	= hookArrayResult( 'stopwords' )['words'] ?? $stop;
		
	}
	
	// str_word_count alternative for unicode
	$words	= 
	\preg_split( '/[^\p{L}\p{N}\']+/u', lowercase( $text ) );
	
	// Take out stop words
	$words	= \array_diff( $words, $stop );
	
	// Most frequently used words
	$fr	= \array_count_values( $words );
	\arsort( $fr );
	
	$words	= \array_unique( \array_keys( $fr ) );
	
	return $as_array ? $words : implode( ' ', $words );
}

/**
 *  Get posts related to current one by content
 *  
 *  @param int		$id	Currently active post id
 *  @param int		$mode	1 = Topics only , 2= Posts only, else both
 *  @return array
 */
function getRelated( int $id, int $mode = 0 ) : array {
	$res	= 
	getResults( 
		'SELECT title, bare FROM posts WHERE id = :id', 
		[ ':id' => $id ],
		\FORUM_DATA
	);
	
	// No post?
	if ( empty( $res ) ) {
		return [];
	}
	
	// Nothing to search
	$text	= $res[0]['bare'] ?? '';
	if ( empty( $text ) ) {
		return [];
	}
	 
	$title	= $res[0]['title'] ?? '';
	
	// Parse common words, excluding stop words and make search data
	if ( empty( $title )  ) {
		$words	= getCommonWords( $text, false );
		$data	= searchData( $words );
	} else {
		$words	= getCommonWords( $title . ' ' . $text, false );
		$data	= searchData( '"' . $title . '" ' . $words );
	}
	
	// Excluding current
	$rlimit	= config( 'related_limit', \RELATED_LIMIT, 'int' ) + 1;
	
	$sm	= '';
	switch ( $mode ) {
		case 1:
			$sm = ' AND parent_id IS NULL ';
			break;
		case 2:
			$sm = ' AND forum_id IS NULL ';
			break;
	}
	
	// Search for related content excluding current post
	return 
	getResults( 
		"SELECT * FROM thread_view 
			WHERE id IN ( SELECT DISTINCT docid 
				FROM post_search WHERE post_search 
				MATCH :find 
				AND docid NOT IN ( :id ) 
				ORDER by matchinfo( post_search ) DESC 
				LIMIT :limit 
			) {$sm} GROUP by post_since;",
		[ 
			':find'		=> $data, 
			':id'		=> $id.
			':limit'	=> $rlimit
		],
		\FORUM_DATA
	);	
}

/**
 *  Bulk add moderation filters
 *  
 *  Filters are in: 
 *  [ label => [ [ term1, response, reason, expiration ] ] format
 *  
 *  @param array	$params		Filter parameters
 */
function addModeration( array $params ) {
	$sql	= 
	"REPLACE INTO moderation ( 
		label, hash, content, response, reason, expires 
	) 
	VALUES( 
		:label, :hash, :content, :response, :reason, :expires 
	)";
	
	$db	= getDb();
	$stm	= statement( $db, $sql );
	
	// Default response
	$cresp	= config( 'filter_response', \FILTER_HOLD, 'int' );
	
	foreach( $params as $label => $term ) {
		if ( empty( $term ) || empty( $term[0] ) ) {
			continue;
		}
		$stm->execute( [
			':label'	=> $label,
			':hash'		=> hash( 'tiger160,4', $term[0] ),
			':content'	=> $term[0],
			':response'	=> $term[1] ?? $cresp, 
			':reason'	=> $term[2] ?? '',
			':duration'	=> 
			empty( $term[3] ) ? null : textToDate( $term[3] )
		] );
	}
	$stm->closeCursor();
}

/**
 *  Check IP filter list
 *  
 *  @return bool
 */
function checkIP() : bool {
	$ip = getIP();
	if ( empty( $ip ) ) {
		return false;
	}
	
	// Load IP blocklist
	$iplist	= loadFilter( \IP_FILTER, false );
	return filteredIP( $ip, $iplist );
}


/**
 *  User functions
 */
	
/**
 *  Hash password to storage safe format
 *  
 *  @param string	$password	Raw password as entered
 *  @return string
 */
function hashPassword( string $password ) : string {
	return 
	\base64_encode(
		\password_hash(
			\base64_encode(
				\hash( 'sha384', $password, true )
			),
			\PASSWORD_DEFAULT
		)
	);
}

/**
 *  Check hashed password
 *  
 *  @param string	$password	Password exactly as entered
 *  @param string	$stored		Hashed password in database
 */
function verifyPassword( 
	string		$password, 
	string		$stored 
) : bool {
	if ( empty( $stored ) ) {
		return false;
	}
	
	$stored = \base64_decode( $stored, true );
	if ( false === $stored ) {
		return false;
	}
	
	return 
	\password_verify(
		\base64_encode( 
			\hash( 'sha384', $password, true )
		),
		$stored
	);
}

/**
 *  Check if user password needs rehashing
 *  
 *  @param string	$stored		Already hashed, stored password
 *  @return bool
 */
function passNeedsRehash( 
	string		$stored 
) : bool {
	$stored = \base64_decode( $stored, true );
	if ( false === $stored ) {
		return false;
	}
	
	return 
	\password_needs_rehash( $stored, \PASSWORD_DEFAULT );
}

/**
 *  Process username
 */
function username( string $name ) {
	static $maxu;
	if ( !isset( $maxu ) ) {
		$maxu = config( 'name_max', \NAME_MAX, 'int' );
	}
	
	return title( $name, $maxu );
}

/**
 *  Helper to turn full username to index-friendly term
 *  
 *  @param string	$name		Entered username 
 *  @return string
 */
function cleanUsername( string $name ) {
	return 
	username( unifySpaces( lowercase( bland( 
		normal( $name ) , true 
	) ), '' );
}

/**
 *  Create (slightly better) tripcode from given name and secret
 *  
 *  @param string	$name		Raw username as entered
 *  @return array
 */
function tripcode( ?string $name ) : array {
	if ( empty( $name ) ) {
		return [];
	}
	$ulen	= config( 'name_max', \NAME_MAX, 'int' );
	if ( false === \strpos( $name, "#" ) ) {
		return [ 'name' => title( $name, $ulen ) ];
	}
	
	$params		= \explode( "#", $name, 2 );
	$params		= \array_filter( $params );
	if ( \count( $params ) <= 0 ) {
		return [ title( $params[0], $ulen ) ];
	}
	$talgo		= hashAlgo( 'trip_algo', \TRIP_ALGO );
	$trip		= 
	\hash_hmac( $talgo, $params[0], $params[1] );
	
	$tsize		= config( 'trip_size', \TRIP_SIZE, 'int' );
	
	return [
		'name'	=> title( $params[0], $ulen ),
		'key'	=> \substr( $trip, -$tsize )
	];
}

/**
 *  Create a new user with given base options
 *  
 *  @param string	$name		Registering username
 *  @param string	$pass		Given password (raw)
 *  @param string	$email		Contact address
 *  @param string	$bio		Longform profile (optional)
 *  @param string	$display	Title or short profile (optional)
 *  @param int		$status		User profile status
 */
function newUser( 
	string	$name, 
	string	$password, 
	?string	$email, 
	?string	$bio, 
	?string	$display, 
	?int	$status 
) : int {
	static $sql	= 
	"INSERT INTO users ( username, user_clean, password, email, 
		display, bio, status ) 
	VALUES( :username, :user_clean, :password, :email, 
		:display, :bio, :status )";
	
	$id	= 
	setInsert( 
		$sql, 
		[
			':username'	=> $name,
			':user_clean'	=> cleanUsername( $name ),
			':password'	=> hashPassword( $password ), 
			':email'	=> $email, 
			':display'	=> $display ?? '',
			':bio'		=> $bio ?? '',
			':status'	=> $status ?? 0
		], 
		\FORUM_DATA 
	);
	if ( !$id ) {
		return 0;
	}
	// Create auth activity
	updateUserActivity( $id );
	return $id;
}

/**
 *  Update user details
 *  
 *  @param int		$id		User unique identifier
 *  @param string	$email		Contact address
 *  @param string	$display	Short profile description
 *  @param string	$bio		Longer profile
 *  @param int		$status		User priority/status (optional)
 *  @return bool			True on success
 */
function updateUser( 
	int	$id, 
	string	$email,
	string	$display, 
	string	$bio, 
	int	$status 
) : bool {
	static $sql	= 
	"UPDATE users SET email = :email, display = :display, 
		bio = :bio, status = :status 
		WHERE id = :id;";
	
	$maxd = config( 'display_max', \DISPLAY_MAX, 'int' );
	return 
	setUpdate( 
		$sql, 
		[
			':email'	=> cleanEmail( $email ),
			':display'	=> title( $display, $maxd ),
			':bio'		=> $bio,
			':status'	=> $status, 
			':id'		=> $id
		], 
		\FORUM_DATA 
	);
}

/**
 *  Set a new password for the user
 *  
 *  @param int		$id	User unique identifier
 *  @param string	$param	Raw password as entered
 *  @return bool
 */
public function savePassword( 
	int		$id, 
	string		$password 
) : bool {
	static $sql	= 
	"UPDATE users SET password = :password 
		WHERE id = :id";
	
	return 
	setUpdate( $sql, [ 
		':password'	=> hashPassword( $password ), 
		':id'		=> $id
	], \FORUM_DATA );
}

/**
 *  Authenticate user with given id and password
 *  
 *  @param int		$id		User unique identifier
 *  @param string	$password	Raw entered password 
 *  @return bool
 */
function passwordAuth( int $id, string $password ) : bool {
	$res	= 
	getSingle( 
		$id, 
		"SELECT password FROM users WHERE id = :id", 
		\FORUM_DATA 
	);
	
	return  
	verifyPassword( 
		$password, $res['password'] ?? '' 
	) ? \AUTH_STATUS_SUCCESS : \AUTH_STATUS_FAILED;
}

/**
 *  Update the last activity IP of the given user
 *  Most of these actions use triggers in the database
 *  
 *  @param int		$id	User unique identifier
 *  @param string	$mode	Activity type
 *  @return bool
 */
function updateUserActivity(
	int	$id, 
	string	$mode	= '' 
) : bool {
	
	$now	= utc();
	switch ( $mode ) {
		case 'active':
			$sql	= 
			"UPDATE auth_activity SET 
				last_ip		= :ip, 
				last_ua		= :ua, 
				last_session_id = :sess 
				WHERE user_id = :id;";
			
			$params = [
				':ip'	=> getIP(), 
				':ua'	=> getUA(), 
				':sess'	=> sessionID(), 
				':id'	=> $id
			];
			break;
			
		case 'login':
			$sql	= 
			"UPDATE auth_activity SET 
				last_ip		= :ip, 
				last_ua		= :ua, 
				last_login	= :login, 
				last_session_id = :sess 
				WHERE user_id = :id;";
			
			$params = [
				':ip'		=> getIP(), 
				':ua'		=> getUA(),
				':login'	=> $now,
				':sess'		=> sessionID(),
				':id'		=> $id
			];
			break;
		
		case 'passchange':
			// Change table itself instead of the view
			$sql	= 
			"UPDATE user_auth SET 
				last_ip			= :ip, 
				last_ua			= :ua, 
				last_active		= :active,
				last_pass_change	= :change, 
				last_session_id		= :sess 
				WHERE user_id = :id;";
			
			$params = [
				':ip'		=> getIP(), 
				':ua'		=> getUA(),
				':active'	=> $now,
				':change'	=> $now,
				':sess'		=> sessionID(),
				':id'		=> $id
			];
			break;
		
		case 'failedlogin':
			$sql	= 
			"UPDATE auth_activity SET 
				last_ip			= :ip, 
				last_ua			= :ua, 
				last_session_id		= :sess, 
				failed_last_attempt	= :fdate
				WHERE user_id = :id;";
				
			$params = [
				':ip'		=> getIP(), 
				':ua'		=> getUA(),
				':sess'		=> sessionID(),
				':fdate'	=> $now,
				':id'		=> $id
			];
			break;
		
		case 'lock':
			$sql	= 
			"UPDATE auth_activity SET 
				is_locked = 1 WHERE id = :id;";
			$params	= [ ':id' => $id ];
			break;
			
		case 'unlock':
			$sql	= 
			"UPDATE user_auth SET 
				is_locked = 0 WHERE id = :id;";
			$params	= [ ':id' => $id ];
			break;
		
		case 'approve':
			$sql	= 
			"UPDATE user_auth SET 
				is_approved = 1 WHERE id = :id;";
			$params	= [ ':id' => $id ];
			break;
			
		case 'unapprove':
			$sql	= 
			"UPDATE user_auth SET 
				is_approved = 0 WHERE id = :id;";
			$params	= [ ':id' => $id ];
			break;
			
		default:
			// First run? Create or replace auth basics
			
			// Auto approve new auth?
			$ap = 
			config( 'auto_approve_reg', 
				\AUTO_APPROVE_REG, 'bool' );
			
			return 
			setInsert( 
				"REPLACE INTO user_auth ( 
					user_id, last_ip, last_ua, 
					last_session_id, is_approved
				) VALUES( :id, :ip, :ua, :sess, :ap );", 
				[
					':id'	=> $id, 
					':ip'	=> getIP(), 
					':ua'	=> getUA(),
					':sess'	=> \session_id(),
					':ap'	=> $ap ? 1 : 0
				], 
				\FORUM_DATA 
			) ? true : false;
	}
	
	return setUpdate( $sql, $params, \FORUM_DATA );
}

/**
 *  Login user credentials
 *  
 *  @param string	$username	Login name to search
 *  @param string	$password	User provided password
 *  @param int		$status		Authentication success etc...
 *  @return array
 */
function authByCredentials(
	string		$username,
	string		$password,
	int		&$status
) : array {
	$user = findUserByUsername( $data, $username );
	
	// No user found?
	if ( empty( $user ) ) {
		$status = \AUTH_STATUS_NOUSER;
		return [];
	}
	
	// Verify credentials
	if ( verifyPassword( $password, $user['password'] ) ) {
		$id = ( int ) $user['id'];
		// Refresh password if needed
		if ( passNeedsRehash( $user['password'] ) ) {
			savePassword( $id, $password );
		}
		$status = \AUTH_STATUS_SUCCESS;
		return $user;
	}
	
	// Login failiure
	$status = \AUTH_STATUS_FAILED;
	return [];
}

/**
 *  Reset cookie lookup token and return new lookup
 *  
 *  @param int			$id	Logged in user's ID
 *  @return string
 */
function resetLookup( int $id ) : string {
	$db	= getDb( \FORUM_DATA );
	$stm	= 
	statement( $db, 
		"UPDATE logout_view SET lookup = '' 
		WHERE user_id = :id;" 
	);
	
	if ( $stm->execute( [ ':id' => $id ] ) ) {
		$stm->closeCursor();
		
		// SQLite should have generated a new random lookup
		$rst = 
		satement( $db,  
			"SELECT lookup FROM logins WHERE 
				user_id = :id;" 
		);
		
		if ( $rst->execute( [ ':id' => $id ] ) ) {
			$col = $rst->fetchColumn();
			$rst->closeCursor();
			return $col;
		}
	}
	$stm->closeCursor();
	return '';
}

/**
 *  Find user authorization by cookie lookup
 *  
 *  @param string		$lookup	Raw cookie lookup term
 *  @param int			$cexp	Cookie expiration
 *  @param bool			$reset	Reset lookup if expired
 *  @return array
 */
function findCookie( 
	string		$lookup, 
	int		$cexp, 
	bool		$reset		= false
) : array {
	
	$db	= getDb( \FORUM_DATA );
	$stm	= 
	statement( $db, 
		"SELECT * FROM login_view 
			WHERE lookup = :lookup LIMIT 1;" 
	);
	
	// First find lookup
	if ( $stm->execute( [ ':lookup' => $lookup ] ) ) {
		$results = $stm->fetchAll();
		$stm->closeCursor();
	}
	
	// No logins found
	if ( empty( $results ) ) {
		return [];
	}
	
	// One login found
	$user	= $results[0];
	$uptime	= \strtotime( $user['updated'] );
	if ( false === $uptime ) {
		$uptime = 0;
	}
	$expired = ( time() - $extime ) > $cexp;
	
	// Check for cookie expiration
	if ( $reset && $expired ) {
		$user['lookup']	= 
		resetLookup( ( int ) $user['id'] );
		
	} elseif ( $expired ) {
		return [];
	}
	
	return $user;
}

/**
 *  Get profile details by id
 *  
 *  @param int			$id	User's id
 *  @return array
 */
function findUserById( int $id ) : array {
	static $sql	= 
	"SELECT id, username, display, bio, email, 
		created, updated, settings, status FROM users 
		WHERE id = :id LIMIT 1;";
	
	$results	= 
	getResults( $sql, [ ':id' => $id ], \FORUM_DATA );
	
	if ( empty( $results ) ) {
		return [];
	}
	return $results[0];
}

/**
 *  Get login details by username
 *  
 *  @param string	$username	User's login name as entered
 *  @return array
 */
function findUserByUsername( string $username ) : array {
	static $sql	= 
	"SELECT * FROM login_view WHERE name = :user LIMIT 1;";
	
	$results	= 
	getResults( $sql, [ ':user' => $username ], \FORUM_DATA );
	
	if ( empty( $results ) ) {
		return [];
	}
	return $results[0];
}

/**
 *  Reset authenticated user data types for processing
 *  
 *  @param array	$user		Stored user in database/session
 *  @return array
 */
function formatAuthUser( array $user ) : array {
	$user['is_approved']	??= false;
	$user['is_locked']	??= false;
	$user['user_settings']	??= [];
	
	return [
		'id'		=> ( int ) ( $user['id'] ?? 0 ), 
		'status'	=> ( int ) ( $user['status'] ?? 0 ), 
		'name'		=> $user['name'] ?? '', 
		'hash'		=> $user['hash'] ?? '',
		'is_approved'	=> $user['is_approved'] ? true : false,
		'is_locked'	=> $user['is_locked'] ? true : false, 
		'auth'		=> $user['auth'] ?? '',
		'settings'	=> 
			\is_array( $user['user_settings'] ) ? 
				$user['user_settings'] : []
	];
}

/**
 *  Check user authentication session
 *  
 *  @param bool		$delete		Forget existing auth if true
 *  @return array
 */
function authUser( bool $delete = false ) : array {
	static $user;
	sessionCheck();
	
	if ( $delete ) {
		unset( $user );
		return [];
	}
	
	if ( isset( $user ) ) {
		return $user;
	}
	
	if ( 
		empty( $_SESSION['user'] ) || 
		!\is_array( $_SESSION['user'] ) 
	) { 
		// Session was empty? Check cookie lookup
		$cookie	= getCookie( 'user', '' );
		if ( empty( $cookie ) ) {
			return [];
		}
		// Sane defaults
		if ( strsize( $cookie ) > 255 ) {
			return [];
		}
		$user	= findCookie( pacify( $cookie ) );
		
		// No cookie found?
		if ( empty( $user ) ) {
			return [];
		}
		
		// Reset data types
		$user			= formatAuthUser( $user );
		
		// User found, apply authorization
		setAuth( $user, true );
		
		// Update last activity
		updateUserActivity( $user['id'], 'active' );
		
		return $_SESSION['user'];
		
	} else {
		// Fetched results must be a 6-item array
		$user		= $_SESSION['user'];
		if ( \count( $user ) !== 8 ) { 
			$_SESSION['user']	= '';
			unset( $user );
			return []; 
		}
	}
	
	$user			= formatAuthUser( $user );
	
	// Check if current browser changed since auth token creation
	$auth			= 
	\hash( 'tiger160,4', getUA() . $user['hash'] );
	
	if ( 0 != \strcmp( ( string ) $user['auth'], $auth ) ) { 
		unset( $user );
		return []; 
	}
	
	updateUserActivity( $user['id'], 'active' );
	return $user;
}

/**
 *  Apply user auth session and save the current browser info
 *  
 *  @param array	$user		User info stored in database
 *  @param bool		$cookie		Set auth cookie if true
 */
function setAuth( array $user, bool $cookie ) {
	sessionCheck();
	
	$auth			= 
	\hash( 'tiger160,4', getUA() . $user['hash'] );
	
	// Set user session data
	$_SESSION['user']	= [
		'id'		=> $user['id'],
		'status'	=> $user['status'],
		'name'		=> $user['name'],
		'is_approved'	=> $user['is_approved'],
		'is_locked'	=> $user['is_locked'],
		'auth'		=> $auth,
		'settings'	=> $user['settings']
	];
	
	if ( $cookie ) {
		// Set cookie lookup code
		makeCookie( 'user', $user['lookup'] );
	}
}
	
/**
 *  End user session
 */
function endAuth() {
	sessionCheck( true );
	
	// Delete existing auth
	authUser( true );
	
	// Delete lookup cookie
	deleteCookie( 'user' );
}

/**
 *  Limit login attempts
 */
function loginBuffer() {
	sessionCheck();
	if ( empty( $_SESSION['login'] ) ) {
		$_SESSION['login'] = [ 1, time() ];
		return;
	}
	
	$tdata = $_SESSION['login'];
	if ( !\is_array( $tdata ) ) {
		$tdata		= [ 1, time() ];
	} else {
		if ( count( $tdata ) != 2 ) {
			$tdata	= [ 1, time() ];
		}
		$tdata		= 
		[ ( int ) $tdata[0], ( int ) $tdata[1] ];
	}
	
	// Increment attempts
	$_SESSION['login']	= [ $tdata[0] + 1, time() ];
	
	// Check if form is being accessed too quickly
	$atm	= config( 'login_attempts', \LOGIN_ATTEMPTS, 'int' );
	$delay	= config( 'login_delay', \LOGIN_DELAY, 'int' );
	$cur	= \abs( time() - $tdata[1] );
	if ( $cur  < $delay && $tdata[0] > $atm ) {
		sendError( 429, errorLang( 
			'loginwait', \MSG_LOGINWAIT 
		) );
	} elseif ( $cur > $delay ) {
		// Reset
		$_SESSION['login']	= [ 1, time() ];
	}
}

/**
 *  Process user login
 *  
 *  @param array	$data		User form data
 *  @param string	$path		Post login redirect path
 *  @param int		$status		Authentication status
 */
function processLogin( array $data, string $path, int &$status ) {
	sessionCheck();
	
	// Start with status mode
	$status = \AUTH_STATUS_FAILED;
	$user	= 
	authByCredentials( 
		$data['username'], 
		$data['password'], 
		$status
	);
	
	switch( $status ) {
		case \AUTH_STATUS_SUCCESS:
			// "Remember me"
			$rem	=  ( bool ) ( $data['rem'] ?? 0 );
			
			// Format auth user
			$user	= formatAuthUser( $user );
			
			// Set login session
			setAuth( $user, $rem );
			
			// Set login activity
			updateUserActivity( $user['id'], 'login' );
			
			// Redirect to path
			sendPage( $path, 202 );
			break;
			
		case \AUTH_STATUS_NOUSER:
			// TODO: Do no user things
			// Fall through to login fail
		default:
			sendError( 403, errorLang( 
				'loginfail', \MSG_LOGINFAIL 
			) );
	}
}

/**
 *  End current session
 */
function processLogout( bool $redir ) {
	$user = authUser();
	if ( !empty( $user ) ) {
		endAuth();
		// Reset cookie lookup hash
		resetLookup( $user['id'] );
	}
	if ( $redir ) {
		sendPage( '', 202 );
	}
}

/**
 *  Generate user login form page
 *  
 *  @param string	$path	Post-login redirect path (optional)
 *  @return string
 */
function loginPage( ?string $path ) : string {
	$path	= cleanUrl( $path ?? '' );
	
	// Login form XSRF
	$pair	= genNoncePair( 'login' );
	
	return 
	hookWrap( 
		'beforeloginpage',
		'afterloginpage',
		template( 'tpl_login_page' ), 
		[ 
			// Metadata
			'nonce'		=> $pair['nonce'], 
			'token'		=> $pair['token'],
			'meta'		=> $pair['meta'],
			'action'	=> 
			eventRoutePrefix( 'dologin', 'dologin' ) . 
			slashPath( $path ),
			
			// Placeholders
			'login_name_label_before'	=> '',
			'login_name_label_after'	=> '',
			'login_name_input_before'	=> '',
			'login_name_input_after'	=> '',
			'login_name_desc_before'	=> '',
			'login_name_desc_after'		=> '',
			
			'login_pass_label_before'	=> '',
			'login_pass_label_after'	=> '',
			'login_pass_input_before'	=> '',
			'login_pass_input_after'	=> '',
			'login_pass_desc_before'	=> '',
			'login_pass_desc_after'		=> '',
			
			'login_rem_label_before'	=> '',
			'login_rem_label_after'		=> '',
			
			'login_rem_input_before'	=> '',
			'login_rem_input_after'		=> '',
			
			// Language interleaved placeholders
			'name_min'	=> 
			config( 'name_min', \NAME_MIN, 'int' ),
			
			'name_max'	=> 
			config( 'name_max', \NAME_MAX, 'int' ),
			
			'pass_min'	=> 
			config( 'pass_min', \PASS_MIN, 'int' )
		]
	);
}

/**
 *  Parse and validate user login form
 *  
 *  @param int		$status		HTML Form validation status
 *  @return array
 */
function loginForm( int &$status ) : array {
	// Check if form has been tampered
	$status = validateForm( 'login', false, true );
	if ( $status != \FORM_STATUS_VALID ) { 
		return [];
	}
	
	$filter = [
		'username'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'username'
		],
		
		// Passwords handled differently from other inputs
		'password'	=> \FILTER_UNSAFE_RAW,
		
		// "Remember me"
		'rem'		=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'default'	=> 0,
				'min_range'	=> 0,
				'max_range'	=> 1
			]
		]
	];
	
	$data	= \filter_input_array( \INPUT_POST, $filter );
	if ( 
		empty( $data['username'] ) ||
		empty( $data['password'] ) 
	) {
		// Set form validity to invalid
		$status = \FORM_STATUS_INVALID;
		return [];
	}
	
	return [ 
		'username'	=> $data['username'],
		'password'	=> $data['password'],
		'rem'		=> $data['rem']
	];
}


/**
 *  Generate user login form page
 *  
 *  @param string	$path	Post-register login redirect (optional)
 *  @return string
 */
function registerPage( ?string $path ) : string {
	
	$path 	= cleanUrl( $path ?? '' );
	// Register form XSRF
	$pair	= genNoncePair( 'register' );
	
	return 
	hookWrap( 
		'beforeregisterpage',
		'afterregisterpage',
		template( 'tpl_register_page' ), 
		[ 
			// Metadata
			'nonce'		=> $pair['nonce'], 
			'token'		=> $pair['token'],
			'action'	=> 
			eventRoutePrefix( 'doregister', 'doregister' ) . 
			slashPath( $path ),
			
			// Placeholders
			'register_name_label_before'	=> '',
			'register_name_label_after'	=> '',
			'register_name_input_before'	=> '',
			'register_name_input_after'	=> '',
			'register_name_desc_before'	=> '',
			'register_name_desc_after'	=> '',
			
			'register_pass_label_before'	=> '',
			'register_pass_label_after'	=> '',
			'register_pass_input_before'	=> '',
			'register_pass_input_after'	=> '',
			'register_pass_desc_before'	=> '',
			'register_pass_desc_after'	=> '',
			
			'register_passr_label_before'	=> '',
			'register_passr_label_after'	=> '',
			'register_passr_input_before'	=> '',
			'register_passr_input_after'	=> '',
			'register_passr_desc_before'	=> '',
			'register_passr_desc_after'	=> '',
			
			'register_terms_label_before'	=> '',
			'register_terms_label_after'	=> '',
			
			'register_terms_input_before'	=> '',
			'register_terms_input_after'	=> '',
			
			'register_rem_label_before'	=> '',
			'register_rem_label_after'	=> '',
			
			'register_rem_input_before'	=> '',
			'register_rem_input_after'	=> '',
			
			'name_min'	=> 
			config( 'name_min', \NAME_MIN, 'int' ),
			
			'name_max'	=> 
			config( 'name_max', \NAME_MAX, 'int' ),
			
			'pass_min'	=> 
			config( 'pass_min', \PASS_MIN, 'int' )
		]
	);
}

/**
 *  New user registration form
 *  
 *  @param int		$status		HTML Form validation status
 *  @return array
 */
function registerForm( int &$status ) : array {
	$status	= validateForm( 'register', false, true );
	if ( $status != \FORM_STATUS_VALID ) { 
		return [];
	}
	
	$filter = [
		'username'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'username'
		],
		
		// Passwords handled differently from other inputs
		'password'	=> \FILTER_UNSAFE_RAW,
		'password2'	=> \FILTER_UNSAFE_RAW,
		
		'email'		=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'cleanEmail'
		],
		
		'bio'		=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'bland'
		],
		
		// "Remember me"
		'rem'		=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'default'	=> 0,
				'min_range'	=> 0,
				'max_range'	=> 1
			]
		]
	];
	
	$data	= \filter_input_array( \INPUT_POST, $filter );
	if (
		empty( $data['username'] ) ||
		empty( $data['password'] ) || 
		empty( $data['password2'] ) 
	) {
		$status = \FORM_STATUS_INVALID;
		return [];
	}
	
	if ( empty( $data['email'] ) ) {
		$data['email'] = null;
	}
	
	// Compare password inputs
	if ( \strcmp( 
		$data['password'], 
		$data['password2'] ) !== 0 
	) {
		$status = \FORM_STATUS_INVALID;
		return [];
	}
	
	return [ 
		'username'	=> $data['username'],
		'password'	=> $data['password'],
		'rem'		=> $data['rem']
	];
}

/**
 *  Process user form registration
 *  
 *  @param array	$data		User form data
 *  @param string	$path		Post register login redirect
 */
function processRegister( array $data, string $path ) {
	sessionCheck();
	
	$existing	= findUserByUsername( $data['username'] );
	if ( !empty( $existing ) ) {
		sendError( 
			401, 
			errorLang( 'nameexists', \MSG_USER_EXISTS ) 
		);
	}
	
	$id	= 
	newUser( 
		$data['username'], 
		$data['password'], 
		$data['email'] ?? null,
		$data['bio'] ?? null
	);
	
	// Check if saving succeeded
	if ( empty( $id ) ) {
		sendError( 
			500, 
			errorLang( 'generic', \MSG_GENERIC ) 
		);
	}
	
	// "Remember me"
	$rem		=  ( bool ) ( $data['rem'] ?? 0 );
	
	// Get complete info
	$existing	= findUserById( $id );
	
	// Check if retreival went wrong
	if ( empty( $existing ) ) {
		sendError( 
			500, 
			errorLang( 'generic', \MSG_GENERIC ) 
		);
	}
	
	// Set authentication
	setAuth( formatAuthUser( $existing ), $rem );
	
	// Redirect to login
	sendPage( $path, 202 ); 
}

/**
 *  Generate user profile edit page
 *  
 *  @param int		$id		User unique identifier
 *  @param string	$username	Permanent username
 *  @param string	$display	Short profile or display title
 *  @param string	$bio		Long form profile
 *  @return string
 */
function profilePage(
	int		$id,
	string		$username,
	?string		$display,
	?string		$bio 
) : string {
	// Register form XSRF
	$pair	= genNoncePair( 'profile', [ 'id=' . $id ] );
	
	return 
	hookWrap( 
		'beforeprofilepage',
		'afterprofilepage',
		template( 'tpl_profile_page' ), 
		[ 
			// Metadata
			'nonce'		=> $pair['nonce'], 
			'token'		=> $pair['token'],
			'meta'		=> $pair['meta'],
			'id'		=> $id,
			'username'	=> $username,
			'display'	=> $display ?? '',
			'bio'		=> $bio ?? '',
			
			'action'	=> 
			pageRoutePath( 'doprofile' ),
			
			// Placeholders
			'profile_name_label_before'	=> '',
			'profile_name_label_after'	=> '',
			'profile_name_input_before'	=> '',
			'profile_name_input_after'	=> '',
			
			'profile_display_label_before'	=> '',
			'profile_display_label_after'	=> '',
			'profile_display_input_before'	=> '',
			'profile_display_input_after'	=> '',
			'profile_display_desc_before'	=> '',
			'profile_display_desc_after'	=> '',
			
			'profile_bio_label_before'	=> '',
			'profile_bio_label_after'	=> '',
			'profile_bio_input_before'	=> '',
			'profile_bio_input_after'	=> '',
			'profile_bio_desc_before'	=> '',
			'profile_bio_desc_after'	=> '',
			
			'display_min'	=> 
			config( 'display_min', \DISPLAY_MIN, 'int' ),
			
			'display_max'	=> 
			config( 'display_max', \DISPLAY_MAX, 'int' )
		]
	);
}

/**
 *  Change existing user display profile
 *  
 *  @param int		$id		Registered user unique identifier
 *  @param int		$status		HTML Form validation status
 *  @return array
 */
function profileForm( int $id, int &$status ) : array {
	$status	= 
	validateForm( 'profile', false, true, [ 'id=' . $id ] );
	
	if ( $status != \FORM_STATUS_VALID ) { 
		return [];
	}
	
	$filter = [
		'id'		=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'default'	=> 0,
				'min_range'	=> 1
			]
		],
		
		// Display title, different from username
		'display'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'title'
		],
		
		// Filter on output
		'bio'		=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'bland'
		]
	];
	
	return \filter_input_array( \INPUT_POST, $filter );
}

/**
 *  Generate user profile edit page
 *  
 *  @param int		$id		User unique identifier
 *  @return string
 */
function changePassPage( int $id ) : string {
	// Register form XSRF
	$pair	= genNoncePair( 'password', [ 'id=' . $id ] );
	
	return 
	hookWrap( 
		'beforepasswordpage',
		'afterpasswordpage',
		template( 'tpl_password_page' ), 
		[ 
			// Metadata
			'nonce'		=> $pair['nonce'], 
			'token'		=> $pair['token'],
			'meta'		=> $pair['meta'],
			'id'		=> $id
			
			'action'	=> 
			pageRoutePath( 'dopassword' ),
			
			// Placeholders
			'oldpass_label_before'	=> '',
			'oldpass_label_after'	=> '',
			'oldpass_input_before'	=> '',
			'oldpass_input_after'	=> '',
			'oldpass_desc_before'	=> '',
			'oldpass_desc_after'	=> '',
			
			'newpass_label_before'	=> '',
			'newpass_label_after'	=> '',
			'newpass_input_before'	=> '',
			'newpass_input_after'	=> '',
			'newpass_desc_before'	=> '',
			'newpass_desc_after'	=> '',
			
			'pass_min'	=> 
			config( 'pass_min', \PASS_MIN, 'int' )
		]
	);
}

/**
 *  Change existing user password (requires old password)
 *  
 *  @param int		$id		Registered user unique identifier
 *  @param int		$status		HTML Form validation status
 *  @return array
 */
function changePassForm( int $id, int &$status ) : array {
	$status	= 
	validateForm( 'password', false, true, [ 'id=' . $id ] );
	
	if ( $status != \FORM_STATUS_VALID ) { 
		return [];
	}
	
	$filter = [
		'id'		=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'default'	=> 0,
				'min_range'	=> 1
			]
		],
		
		// Passwords handled differently from other inputs
		'old_password'	=> \FILTER_UNSAFE_RAW,
		'new_password'	=> \FILTER_UNSAFE_RAW
	];
	
	$data	= \filter_input_array( \INPUT_POST, $filter );
	if (
		empty( $data['old_password'] ) || 
		empty( $data['new_password'] ) 
	) {
		$status = \FORM_STATUS_INVALID;
		return [];
	}
	return $data;
}


/**
 *  Themes and templates
 */


/**
 *  Load configuration defined theme and override default templates
 */
function loadTemplates( string $event, array $hook, array $params ) {
	// TODO: Override from theme settings
	// Current list of templates
	$tpl = config( 'templates', [] );
	if ( empty( $tpl ) || !\is_array( $tpl ) ) {
		return \array_merge( $hook, $params );
	}
	
	// Current theme name and theme directory
	// Convention: THEMES/THEME/file.tpl
	$theme	= config( 'theme', \THEME );
	$tdir	= 
	slashPath( \THEMES, true ) . slashPath( $theme, true );
	
	// TODO: Override class placeholders in 'default_classes'
	
	$loaded	= [];
	$err	= [];
	
	// Override templates based on theme
	foreach( $tpl as $t ) {
		if ( !\is_string( $t ) ) {
			continue;
		}
		
		// Template file from theme folder
		$data	= 
		loadFile( $t . '.tpl', $tdir, false );
		
		if ( empty( $data ) ) {
			$err[] = $t;
			continue;
		}
		$loaded[$t]	= pacify( $data );
	}
	
	// Re-register new theme templates, if any
	if ( !empty( $loaded ) ) {
		template( '', $loaded );
	}
	
	// Log any template loading errors on shutdown
	if ( !empty( $err ) ) {
		shutdown( 
			'logError', 
			'Error loading ' . $theme . 
				' theme file(s): ' . 
				implode( ' ', $err ) 
		);
	}
	return \array_merge( $hook, $params );
}



/**
 *  Forum functionality
 */



/**
 *  New topic form
 *  
 *  @param int		$forum_id	Forum unique identifier
 *  @param int		$status		HTML Form validation status
 *  @return array
 */
function topicForm( int $forum_id, int &$status ) : array {
	$status	= 
	validateForm( 'topic', false, true, [ 'forum=' . $forum_id ] );
	
	if ( $status != \FORM_STATUS_VALID ) { 
		return [];
	}
	
	$filter = [
		'forum'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'default'	=> 0,
				'min_range'	=> 1
			]
		],
		// Post body
		'message'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'title'
		],
		'author'		=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'tripcode'
		],
		'email'		=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'cleanEmail'
		]
	];
	
	return \filter_input_array( \INPUT_POST, $filter );
}

/**
 *  Add or edit forum
 *  
 *  @param int		$id		Current forum id or empty if new
 *  @param int		$parent		Parent forum or move-to forum
 *  @param int		$status		HTML Form validation status
 *  @return array
 */
function forumForm( int $id, int $parent, int &$status ) : array {
	$status	= 
	validateForm( 
		'forum', false, true, [ 'id=' . $id, 'parent=' . $parent ] 
	);
	
	if ( $status != \FORM_STATUS_VALID ) { 
		return [];
	}
	
	$filter = [
		'id'		=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'default'	=> 0,
				'min_range'	=> 1
			]
		],
		'parent_id'		=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'default'	=> 0,
				'min_range'	=> 1
			]
		],
		
		'title'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'title'
		],
		
		'description'		=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'bland'
		]
	];
	
	return \filter_input_array( \INPUT_POST, $filter );
}


/**
 *  Get forum breadcrumbs from current leaf to root
 *  
 *  @param int		$id	Forum unique identifier
 *  @return array
 */
function forumPath( int $id ) : array {
	static $sql	= 
	"WITH RECURSIVE cats ( 
		id, parent_id, title, description, sort_order, status 
	) AS (
		SELECT id, parent_id, title, description, 
			sort_order, status 
		FROM forums WHERE id = :id
		
		UNION ALL
			SELECT ct.id, ct.parent_id, ct.title, 
				ct.description, ct.sort_order, 
				ct.status 
		
			FROM forums ct
			INNER JOIN cats ON cats.parent_id = ct.id
	) SELECT DISTINCT * FROM cats;";
	
	return 
	getResults( $sql, [ ':id' => $id ], \FORUM_DATA );
}

/**
 *  Get sub forums
 *  
 *  @param array	$id	Specific forum (optional)
 *  @return array
 */
function getForums( ?int $id ) : array {
	static $sql	= 
	"SELECT * FROM forum_view WHERE parent_id = :id;";
	
	return 
	empty( $id ) ?
		getResults( $sql, [ ':id' => null ], \FORUM_DATA ) : 
		getResults( $sql, [ ':id' => $id ], \FORUM_DATA );
}

/**
 *  Create a new forum
 *  
 *  @param string	$title	Short forum name
 *  @param string	$desc	Long forum description
 *  @param int		$sort	Sorting order
 *  @param int		$parent	Parent forum identifier (optional)
 */
function newForum(
	string	$title, 
	string	$desc, 
	?int	$sort, 
	?int	$parent
) : int {
	static $sql = 
	"INSERT INTO forums( parent_id, title, description, sort_order ) 
	VALUES ( :parent_id, :title, :desc, :sort )";
	
	return 
	setInsert( 
		$sql, 
		[
			':parent_id'	=> $parent ?? null,
			':title'	=> $title, 
			':desc'		=> $desc,
			':sort'		=> $sort ?? 0
		], 
		\FORUM_DATA 
	);
}

/**
 *  Generate forum detail edit page
 *  
 *  @param string	$action		Postback location URL
 *  @param int		$id		Optional forum unique identifier
 *  @param int		$parent		Optional parent forum
 *  @param string	$title		Forum name or empty if new
 *  @param string	$desc		Detail description or empty if new
 *  @return string
 */
function forumEditPage( 
	string		$action, 
	?int		$id	= null, 
	?int		$parent = null, 
	?string		$title	= null,
	?string		$desc	= null
) : string {
	// Forum XSRF
	$id	?= 0;
	$parent ?= 0;
	$pair	= 
	genNoncePair( 'forum', [ 'id=' . $id, 'parent=' . $parent ] );
	
	$title	?= '';
	$desc	?= '';
	
	return 
	hookWrap( 
		'beforeforumepage',
		'afterforumpage',
		template( 'tpl_forum_page' ), 
		[ 
			// Metadata
			'nonce'				=> $pair['nonce'], 
			'token'				=> $pair['token'],
			'meta'				=> $pair['meta'],
			'id'				=> $id,
			'parent_id'			=> $parent,
			
			'action'			=> $action,
			
			// Placeholders
			'title_label_before'		=> '',
			'title_label_after'		=> '',
			'title_input_before'		=> '',
			'title_input_after'		=> '',
			'title_desc_before'		=> '',
			'title_desc_after'		=> '',
			'title'				=> $title
			
			'description_label_before'	=> '',
			'description_label_after'	=> '',
			'description_input_before'	=> '',
			'description_input_after'	=> '',
			'description_desc_before'	=> '',
			'description_desc_after'	=> '',
			'description'			=> $desc
		]
	);
}

/**
 *  Edit existing forum with new parameters
 *  
 *  @param int		$id	Forum unique identifier
 *  @param string	$title	Short forum name
 *  @param string	$desc	Long forum description
 */
function editForum(
	int	$id, 
	string	$title, 
	string	$desc
) : bool {
	static $sql	= 
	"UPDATE forums SET title = :title, description = :desc 
		WHERE id = :id;";
	
	return 
	setUpdate( 
		$sql, 
		[ 
			':title'	=> $title,
			':desc'		=> $desc,
			':id'		=> $id
		], 
		\FORUM_DATA 
	);
}

/**
 *  Get topics in a given forum
 *   
 *  @param int		$forum	Discussion board identifier
 *  @param int		$page	Browsing page index (optional)
 *  @return array
 */
function getTopics( int $forum, ?int $page ) : array {
	static $sql	= 
	"SELECT * FROM thread_view 
		WHERE forum_id = :id
		ORDER BY ( CASE 
			WHEN is_pinned = 1 THEN sort_order 
			ELSE id 
		END ) ASC, id DESC
		LIMIT :limit OFFSET :offset;";
	
	$page	= 
	intRange( 
		$page ?? 1, 1, config( 'max_page', \MAX_PAGE, 'int' )
	);
	
	$tlimit	= config( 'topic_limit', \TOPIC_LIMIT, 'int' );
	$offset	= ( $page - 1 ) * $tlimit;
	
	return 
	getResults(
		$sql, 
		[ 
			':id'		=> $forum, 
			':limit'	=> $tlimit,
			':offset'	=> $offset
		], 
		\FORUM_DATA 
	);
}


/**
 *  Generate entry creation page
 *  
 *  @param array	$user		Current auth information
 *  @param int		$forum_id	Forum identifier for topics
 *  @param int		$parent_id	Topic identifier for replies
 *  @return string
 */
function newPostPage(
	array $user,
	?int $forum_id	= null, 
	?int $parent_id	= null 
) : string {
	// Creation mode as reply or topic
	$nr	= empty( $forum_id ) ? true : false;
	
	// Register form XSRF
	$pair	= 
	genNoncePair( 'newpost', [ 
		'id=' . $nr ? $parent_id : $forum_id
	] );
	
	// Select post action prefix
	$prefix = $nr ? 'donewreply' : 'donewtopic';
	
	$tpl	= $nr ? 
	( empty( $user ) ? 
		'tpl_anonreply_form' : 
		'tpl_userreply_form' 
	) : ( empty( $user ) ? 
		'tpl_anonpost_form' : 
		'tpl_userpost_form' 
	);
	
	$form	= 
	hookWrap( 
		'beforepostform',
		'afterpostform',
		template( $tpl ), 
		[ 
			// Metadata
			'nonce'		=> $pair['nonce'], 
			'token'		=> $pair['token'],
			'meta'		=> $pair['meta'],
			'action'	=> 
			eventRoutePrefix( $prefix, $prefix ),
			
			// Placeholders
			'post_title_label_before'	=> '',
			'post_title_label_after'	=> '',
			'post_title_input_before'	=> '',
			'post_title_input_after'	=> '',
			'post_title_desc_before'	=> '',
			'post_title_desc_after'		=> '',
			
			'title_min'	=> 
			config( 'title_min', \TITLE_MIN, 'int' ),
			
			'title_max'	=> 
			config( 'title_max', \TITLE_MAX, 'int' ),
			
			'post_message_label_before'	=> '',
			'post_message_label_after'	=> '',
			'post_message_input_before'	=> '',
			'post_message_input_after'	=> '',
			'post_message_desc_before'	=> '',
			'post_message_desc_after'	=> '',
			
			// If this is anonymous
			'post_name_label_before'	=> '',
			'post_name_label_after'		=> '',
			'post_name_input_before'	=> '',
			'post_name_input_after'		=> '',
			'post_name_desc_before'		=> '',
			'post_name_desc_after'		=> '',
			
			'name_min'	=> 
			config( 'name_min', \NAME_MIN, 'int' ),
			
			'name_max'	=> 
			config( 'name_max', \NAME_MAX, 'int' )
		]
	);
	
	return 
	hookWrap( 
		'beforepostpage',
		'afterpostpage',
		template( 'tpl_postcreate_page' ), 
		[ 
			'form' => $form
		]
	);
}

/**
 *  Create a new topic in a given forum
 *   
 *  @param int		$forum	Discussion board identifier
 *  @param string	$title	Topic name or description
 *  @param string	$body	Topic content
 *  @param string	$name	Anonymous author name (optional)
 *  @param string	$email	Anonymous author email (optional)
 *  @param int		$pinned	Set pin status (optional)
 *  @param int		$sort	Set sorting order when pinned (optional)
 *  @return int
 */
function newTopic( 
	int	$forum, 
	string	$title, 
	string	$body, 
	?string	$name		= null,
	?string	$email		= null,
	?int	$pinned		= null, 
	?int	$sort		= null, 
	?int	$status		= null
) : int {
	static $sql	= 
	"INSERT INTO posts( forum_id, title, user_id, body, bare, 
		author_name, author_key, author_email, author_ip, 
		is_pinned, sort_order, status ) 
	VALUES( :forum_id, :parent_id, :title, :user_id, :body, :bare, 
		:author_name, :author_key, :author_email, :author_ip, 
		:is_pinned, :sort_order, :status );";
	
	$pinned	??= 0;
	$sort	??= 0;
	$status	??= 0;
	
	$tmax	= config( 'title_max', \TITLE_MAX, 'int' );
	$user	= authUser();
	$author = 
	empty( $user ) ? 
		tripcode( $name ?? '' ) : [];
	
	return 
	setInsert( 
		$sql, 
		[
			':forum_id'	=> $forum,
			':title'	=> title( $title, $tmax ), 
			':user_id'	=> $user['id'] ?? null,
			':body'		=> html( $body ),
			':bare'		=> bland( $body ), 
			':author_name'	=> $author['name'] ?? null,
			':author_key'	=> $author['key'] ?? null,
			':author_email'	=> cleanEmail( $email ?? '' ), 
			':author_ip'	=> getIP(),
			':is_pinned'	=> $pinned,
			':sort_order'	=> $sort, 
			':status'	=> $status
		], 
		\FORUM_DATA 
	);
}

/**
 *  Change topic title and body content
 *  
 *  @param int		$id	Topic uniuque identifier
 *  @param string	$title	
 */
function editTopic(
	int	$id, 
	string	$title, 
	string	$body
) : bool {
	static $sql	= 
	"UPDATE posts SET title = :title, body = :body, bare = :bare, 
		author_ip = :ip WHERE id = :id";
		
	$tmax	= config( 'title_max', \TITLE_MAX, 'int' );
	return 
	setUpdate( 
		$sql, 
		[
			':title'	=> title( $title, $tmax ), 
			':user_id'	=> $user['id'] ?? null,
			':body'		=> html( $body ),
			':bare'		=> bland( $body ), 
			':author_ip'	=> getIP(),
			':id'		=> $id
		], 
		\FORUM_DATA 
	);
}

/**
 *  Get thread posts
 *   
 *  @param int		$topic	Thread identifier
 *  @param int		$page	Browsing page index (optional)
 *  @return array
 */
function getPosts( int $topic, ?int $page ) : array {
	static $sql	= 
	"SELECT DISTINCT * FROM thread_view 
		WHERE id = :id OR parent_id = :pid 
		ORDER BY id ASC 
		LIMIT :limit OFFSET :offset;";
	
	$page = 
	intRange( 
		$page ?? 1, 1, config( 'max_page', \MAX_PAGE, 'int' )
	);
	
	$plimit	= config( 'post_limit', \POST_LIMIT, 'int' );
	$offset	= ( $page - 1 ) * $plimit;
	
	return 
	getResults(
		$sql, 
		[ 
			':id'		=> $topic,
			':pid'		=> $topic, 
			':limit'	=> $plimit,
			':offset'	=> $offset
		], 
		\FORUM_DATA 
	);
}

/**
 *  Create a new reply on an existing topic
 *  
 *  @param int		$topic	Thread unique identifier
 *  @param string	$body	Reply content
 *  @param string	$name	Author name (if anonymous)
 *  @param string	$email	Author contact address (optional)
 *  @param int		$status	Initial publishing status (optional)
 */
function newReply( 
	int	$topic, 
	string	$body, 
	?string	$name, 
	?string	$email, 
	?int	$status 
) : int {
	static $sql	= 
	"INSERT INTO posts( :parent_id, user_id, body, bare, author_name, 
		author_key, author_email, author_ip, status ) 
	VALUES( :parent_id, :user_id, :body, :bare, :author_name, 
		:author_key, :author_email, :author_ip, :status );";
	
	$user	= authUser();
	$author = empty( $user ) ? 
		tripcode( $name ?? '' ) : [];
	return 
	setInsert( 
		$sql, 
		[
			':parent_id'	=> $topic,
			':user_id'	=> $user['id'] ?? null,
			':body'		=> html( $body ),
			':bare'		=> bland( $body ), 
			':author_name'	=> $author['name'] ?? null,
			':author_key'	=> $author['key'] ?? null,
			':author_email'	=> cleanEmail( $email ?? '' ), 
			':author_ip'	=> getIP(),
			':status'	=> $status ?? null
		], 
		\FORUM_DATA 
	);
}

/**
 *  Edit existing reply
 *  
 *  @param int		$id	Post unique identifier
 *  @param string	$body	Reply content
 *  @param string	$name	Author name (if anonymous)
 *  @param string	$email	Author contact address (optional)
 *  @param int		$status	Initial publishing status (optional)
 */
function editReply(
	int	$id, 
	string	$body,
	?string	$name, 
	?string	$email
) : bool {
	static $sql	= 
	"UPDATE posts SET body = :body, bare = :bare, 
		author_name = :author_name, author_email = :author_email, 
		author_ip = :ip WHERE id = :id";
	
	$user	= authUser();
	$author = empty( $user ) ? 
		tripcode( $name ?? '' ) : [];
	return 
	setUpdate( 
		$sql, 
		[
			':body'		=> html( $body ),
			':bare'		=> bland( $body ), 
			':author_name'	=> $author['name'] ?? null,
			':author_key'	=> $author['key'] ?? null,
			':author_email'	=> cleanEmail( $email ?? '' ), 
			':author_ip'	=> getIP(), // Reset IP
			':id'		=> $id
		], 
		\FORUM_DATA 
	);
}

/**
 *  Change pin status on or off on a topic
 *  
 *  @param int		$id	Topic unique identifier
 *  @param bool		$pin	Pin the topic if true 
 */
function postPin( int $id, bool $pin = true ) : bool {
	static $sql	= 
	"UPDATE posts SET is_pinned = :pin WHERE id = :id";
	
	return 
	setUpdate( 
		$sql,
		[ ':pin' => $pin ? 1 : 0, ':id' => $id ]
		\FORUM_DATA
	);
}

/**
 *  Change post status
 *  
 *  @param int		$id	Post unique identifier
 *  @param int		$status	New post status
 *  @return bool
 */
function postStatus( int $id, int $status ) : bool {
	static $sql = 
	"UPDATE posts SET status = :status WHERE id = :id";
	
	return 
	setUpdate( 
		$sql, 
		[ ':status' => $status, ':id' => $id ], 
		\FORUM_DATA 
	);
}

/**
 *  Change post sorting order
 *  
 *  @param int		$id	Post unique identifier
 *  @param int		$sort	New sort order index
 *  @return bool
 */
function postSort( int $id, int $sort ) : bool {
	static $sql = 
	"UPDATE posts SET sort_order = :sort WHERE id = :id";
	
	return 
	setUpdate( 
		$sql, 
		[ ':sort' => $status, ':id' => $id ], 
		\FORUM_DATA 
	);
}

/**
 *  Increment view count on a post
 *  
 *  @param int		$id	Post unique identifier
 */
function postAddViewCount( int $id ) : bool {
	static $sql	= 
	"UPDATE post_stat_view SET view_count = 1 
		WHERE post_id = :id";
	
	return setUpdate( $sql, [ ':id' => $id ], \FORUM_DATA );
}

/**
 *  Increment reply count on a post
 *  
 *  @param int		$id	Post unique identifier
 */
function postAddReplyCount( int $id ) : bool {
	static $sql	= 
	"UPDATE post_stat_view SET reply_count = 1 
		WHERE post_id = :id";
	
	return setUpdate( $sql, [ ':id' => $id ], \FORUM_DATA );
}

/**
 *  Set currently browsing visitor count on a post
 *  
 *  @param int		$id	Post unique identifier
 *  @param int		$num	Active visitor or user number
 */
function postSetActivityCount( int $id, int $num ) : bool {
	static $sql	= 
	"UPDATE post_stat_view SET active_count = :num
		WHERE post_id = :id";
	
	return 
	setUpdate( 
		$sql, [ ':num' => $num, ':id' => $id ], \FORUM_DATA 
	);
}

/**
 *  Set currently browsing session activity on a post or forum
 *  
 *  @param int		$id		Unique identifier
 *  @param bool		$post		Update post session if true or else forum
 */
function setBrowsingSession( int $id, bool $post ) : int {
	static $psql	= 
	"REPLACE INTO post_browsing ( session_id, post_id ) 
		VALUES ( :sess, :id );";
		
	static $fsql	= 
	"REPLACE INTO forum_browsing ( session_id, forum_id ) 
		VALUES ( :sess, :id );";
	
	sessionCheck();
	
	return 
	setInsert(
		$post ? $psql : $fsql, 
		[ ':sess' => \session_id(), ':id' => $id ], 
		\FORUM_DATA 
	);
}

/**
 *  Change anonymous author information
 *   
 *  @param int		$id	Post or topic unique identifier
 *  @param string	$name	Author name or name#pass format
 *  @param string	$email	Contact address
 */
function postSetAnonAuthor( 
	int	$id, 
	?string	$name, 
	?string	$email 
) : bool {
	if ( empty( $name ) && empty( $email ) ) {
		return false;
	}
	static $sql	= 
	"UPDATE posts SET 
		author_name	= :name, 
		author_key	= :key,
		author_email	= :email
		WHERE id = :id";
	
	$user	= empty( $name ) ? [] : tripcode( $name );
	
	return 
	setUpdate(
		$sql,
		[ 
			':name'		=> $user['name'] ?? '',
			':key'		=> $user['key'] ?? '',
			':email'	=> 
			empty( $email ) ? 
				null : cleanEmail( $email )
		],
		\FORUM_DATA
	);
}

/**
 *  Get the authorship information of a given post
 *  
 *  @param int		$id	Post unique identifier
 *  @return array
 */ 
function postAuthorInfo( int $id ) : array {
	static $sql	= 
	"SELECT id, user_id, author_name, author_key, 
		posts.created AS post_created,
		users.settings AS user_settings,
		users.status AS user_status,
		posts.status AS post_status
		
		FROM posts 
	WHERE id = :id 
	LEFT JOIN users ON posts.user_id = users.id;";
	
	return getSingle( $id, $sql, \FORUM_DATA );
}

/**
 *  Verify if the author has edit privileges to the given post
 *  
 *  @param int		$id	Post unique identifier
 *  @param string	$name	Author name in name#pass format
 */
function postAuthorEditAuth( int $id, string $name ) : bool {
	$user	= tripcode( $name );
	
	if ( empty( $user['key'] ) ) {
		return false;
	}
	$res	= postAuthorInfo( $id );
	if ( empty( $res ) ) {
		return false;
	}
	
	return 
	( 
		0 == \strcmp( $user['key'], $res['author_key'] ) && 
		0 == \strcmp( $user['name'], $res['author_name'] )
	) ? true : false;
}

/**
 *  Get user permissions to edit this post
 *  
 *  @param int		$id	Post unique identifier
 *  @param int		$uid	User unique identifier
 */
function postUserEditAuth( int $id, int $uid ) : bool {
	$user	= authUser();
	if ( empty( $user ) ) {
		return false;
	}
	// Mod status?
	if ( $user['status'] >= \USER_STATUS_MOD ) {
		return true;
	}
	
	$res	= postAuthorInfo( $id );
	if ( empty( $res ) ) {
		return false;
	}
	
	$status	= ( int ) $res['user_status'];
	
	// Not approved?
	if ( $status < \USER_STATUS_APPROVED ) {
		return false;
	}
	
	// Is author
	return 
	( ( int ) $res['user_id'] == $uid ) ? true : false;
}

/**
 *  Settings validator that checks loaded/set configuration options
 *  
 *  @param string	$event		Should be 'checkconfig'
 *  @param array	$hook		Previous configuration settings
 *  @param array	$params		Current configuration
 */
function checkConfig( string $event, array $hook, array $params ) {
	$filter	= [
		'page_title'	=> \FILTER_SANITIZE_STRING,
		'page_sub'	=> \FILTER_SANITIZE_STRING,
		'pass_min'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 3,
				'max_range'	=> 4096,
				'default'	=> \PASS_MIN
			]
		], 
		'name_min'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 180,
				'default'	=> \NAME_MIN
			]
		],
		'name_max'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 3,
				'max_range'	=> 180,
				'default'	=> \NAME_MAX
			]
		],
		'display_min'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 3,
				'max_range'	=> 180,
				'default'	=> \DISPLAY_MIN
			]
		], 
		'display_max'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 3,
				'max_range'	=> 180,
				'default'	=> \DISPLAY_MAX
			]
		], 
		'enable_register'=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1.
				'default'	=> \ENABLE_REGISTER
			]
		],
		'auto_approve_reg'=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1.
				'default'	=> \AUTO_APPROVE_REG
			]
		],
		'allow_anon_post'=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1.
				'default'	=> \ALLOW_ANON_POST
			]
		],
		'title_min'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 255,
				'default'	=> \TITLE_MIN
			]
		], 
		'title_max'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 3,
				'max_range'	=> 255,
				'default'	=> \TITLE_MAX
			]
		], 
		'topic_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 180,
				'default'	=> \TOPIC_LIMIT
			]
		],
		'post_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 500,
				'default'	=> \POST_LIMIT
			]
		],
		'search_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 500,
				'default'	=> \SEARCH_LIMIT
			]
		],
		'max_page' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 5000,
				'default'	=> \MAX_PAGE
			]
		],
		'max_url_size' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 255,
				'max_range'	=> 2048,
				'default'	=> \MAX_URL_SIZE
			]
		],
		'timezone'	=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK,
			'options' => [
				'default' => \TIMEZONE
			]
		],
		
		// Date formatting
		'date_nice'	=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK 
		],
		
		// Safe file extensions
		'ext_whitelist'	=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK | 
				\FILTER_REQUIRE_ARRAY
		],
		
		// Mail sender address
		'mail_from'	=> [
			'filter'	=> \FILTER_VALIDATE_EMAIL,
			'options'	=> [
				'default'	=> \MAIL_FROM
			]
		],
		
		// Mail receiver list
		'mail_whitelist'=> [
			'filter'	=> \FILTER_VALIDATE_EMAIL,
			'flags'		=> \FILTER_REQUIRE_ARRAY
		],
		// Cache settings
		'cache_ttl'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 300,
				'max_range'	=> 604800,
				'default'	=> \CACHE_TTL
			]
		],
		
		// Database connection timeout
		'data_timeout'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 60,
				'default'	=> \DATA_TIMEOUT
			]
		],
		
		// Related and sibling display
		'related_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 20,
				'default'	=> \RELATED_LIMIT
			]
		],
		'show_siblings'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \SHOW_SIBLINGS
			]
		],
		'show_related'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \SHOW_RELATED
			]
		],
		'plugins_enabled'=> [
			'filter'	=> \FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'		=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK | 
				\FILTER_REQUIRE_ARRAY
		],
		'theme'		=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'labelName'
		],
		'sites_enabled'=> [
			'filter'	=> \FILTER_CALLBACK,
			'flags'		=> \FILTER_REQUIRE_ARRAY,
			'options'	=> 'formatSites'
		], 
		
		// Moderation response
		'filter_response'=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 100,
				'default'	=> \FILTER_HOLD
			]
		],
		
		// Session settings
		'session_bytes'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 12,
				'max_range'	=> 36,
				'default'	=> \SESSION_BYTES
			]
		],
		'session_exp' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 300,
				'max_range'	=> 3600,
				'default'	=> \SESSION_LIMIT_EXP
			]
		],
		'session_limit_count' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 5,
				'max_range'	=> 20,
				'default'	=> \SESSION_LIMIT_COUNT
			]
		],
		'session_limit_medium' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 2,
				'max_range'	=> 15,
				'default'	=> \SESSION_LIMIT_MEDIUM
			]
		],
		'session_limit_heavy' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 10,
				'default'	=> \SESSION_LIMIT_HEAVY
			]
		],
		
		// Form settings
		'token_bytes'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 8,
				'max_range'	=> 64,
				'default'	=> \TOKEN_BYTES
			]
		],
		'nonce_hash'	=> [
			'filter'	=> 
				\FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'	=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK 
		],
		'form_delay'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 5, 
				'max_range'	=> 14400, // 4 Hours
				'default'	=> \FORM_DELAY
			]
		],
		'form_expire'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 300, // 5 minutes
				'max_range'	=> 604800, // 7 Days
				'default'	=> \FORM_EXPIRE
			]
		],
		'login_delay'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 300, // 5 minutes
				'max_range'	=> 14400, // 4 Hours
				'default'	=> \LOGIN_DELAY
			]
		],
		'login_attempts'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 3,
				'max_range'	=> 50,
				'default'	=> \LOGIN_ATTEMPTS
			]
		],
		
		'trip_size'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> \TRIP_SIZE
			]
		],
		'trip_algo'	=> [
			'filter'	=> 
				\FILTER_SANITIZE_SPECIAL_CHARS,
			'flags'	=> 
				\FILTER_FLAG_STRIP_LOW	| 
				\FILTER_FLAG_STRIP_HIGH	| 
				\FILTER_FLAG_STRIP_BACKTICK 
		],
		
		// Scurity and error settings
		'skip_local'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \SKIP_LOCAL
			]
		],
		'allow_upload'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \ALLOW_UPLOAD
			]
		],
		'show_modified' => [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \SHOW_MODIFIED
			]
		], 
		'frame_whitelist'=> [
			'filter'	=> \FILTER_CALLBACK,
			'flags'		=> \FILTER_REQUIRE_ARRAY,
			'options'	=> 'cleanUrl'
		], 
		
		// Templating settings
		'shared_assets'	=> [
			'filter'	=> \FILTER_VALIDATE_URL,
			'options'	=> [
				'default' => \SHARED_ASSETS
			],
		],
		'plugin_assets'	=> [
			'filter'	=> \FILTER_VALIDATE_URL,
			'options'	=> [
				'default' => \PLUGIN_ASSETS
			],
		],
		'style_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> \STYLE_LIMIT
			]
		],
		'script_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> \SCRIPT_LIMIT
			]
		],
		'meta_limit'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 1,
				'max_range'	=> 50,
				'default'	=> \META_LIMIT
			]
		],
		'thumbnail_gen'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 0,
				'max_range'	=> 1,
				'default'	=> \THUMBNAIL_GEN
			]
		],
		'thumbnail_width'	=> [
			'filter'	=> \FILTER_VALIDATE_INT,
			'options'	=> [
				'min_range'	=> 20,
				'max_range'	=> 1024,
				'default'	=> \THUMBNAIL_WIDTH
			]
		],
		'thumbnail_prefix'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'labelName'
		],
		'thumbnail_types'	=> [
			'filter'	=> \FILTER_CALLBACK,
			'options'	=> 'trimmedList'
		]
	];
	
	// Filter passed params, leaving out unset ones
	$data			= 
	\filter_var_array( $params, $filter, false );
	
	if ( !empty( $data['ext_whitelist'] ) ) {
		$data['ext_whitelist']	= 
			whiteLists( $data['ext_whitelist'], true );
	}
	
	if ( isset( $data['nonce_hash'] ) ) {
		$data['nonce_hash']	= 
		hashAlgo( ( string ) $data['nonce_hash'], \NONCE_HASH );
	}
	
	if ( isset( $data['trip_algo'] ) ) {
		$data['nonce_hash']	= 
		hashAlgo( ( string ) $data['trip_algo'], \TRIP_ALGO );
	}
	
	if ( isset( $data['plugins_enabled'] ) ) {
		$data['plugins_enabled'] = 
			pluginNames( $data['plugins_enabled'] );
	}
	
	if ( empty( $data['thumbnail_types' ) ) {
		$data['thumbnail_types'] = 
			trimmedList( \THUMBNAIL_TYPES );
	}
	
	if ( empty( $data['thumbnail_prefix'] ) ) {
		$data['thumbnail_prefix'] = 
			labelName( \THUMBNAIL_PREFIX );
	}
	
	return \array_merge( $hook, $data );
}




/**
 *  Routing and path event handling
 */

/**
 *  Returns true if visitor is anonymous, user status is negative, 
 *  user is locked, or user is not approved yet
 *  
 *  @param array	$user	Authenticated or empty user data
 *  @param int		$int	Optional level check
 *  @return bool
 */
function lowUserPriority( array $user, ?int $level = null ) : bool {
	// Default status to baseline
	$level ??= \USER_STATUS_APPROVED;
	
	return 
	empty( $user ) ? true : ( 
		(
			$user['status'] < $level	|| 
			$user['is_locked']		||
			!$user['is_approved']
		) ? true : false 
	);
}

/**
 *  Deny access if current user is anonymous, below the given level, 
 *  locked, or not approved
 *  
 *  @param int		$level	Status authority level
 *  @return array		User data, if signed in and has authority
 */
function verifyAuthLevel( int $level = \USER_STATUS_APPROVED ) {
	$user	= authUser();
	if ( lowUserPriority( $user, $level ) ) {
		sendDenied();
	}
	
	return $user;
}

/**
 *  Get currently authenticated user based posting privileges enabled
 */ 
function forumUser() {
	static $an;
	if ( !isset( $an ) ) 
		$an = 
		config( 'allow_anon_post', \ALLOW_ANON_POST, 'bool' );
	}
	
	return $an ? authUser() : verifyAuthLevel();
}

/**
 *  Exclude throttling of certain paths for registered users
 */
function excludeThrottling() {
	$user = authUser();
	
	// Throttling enabled for anonymous or low priority users
	if ( lowUserPriority( $user ) ) {
		return;
	}
	
	if ( $user['status'] >= \USER_STATUS_ADMIN ) {
		throttleDisabled( '/settings' );
	}
	
	if ( $user['status'] >= \USER_STATUS_MOD ) {
		throttleDisabled( '/liveposts' );
	}
	
	throttleDisabled( [ 
		'/pages', '/feed', '/post', '/forum', '/topic', 
		'/search', '/\\?nonce=' 
	] );
}



/**
 *  TODO: Create admin user, set basic settings, forward to homepage
 */
function firstRun( string $event, array $hook, array $params ) {
	// Check if main forum database was just created
	$params['dbname'] ??= '';
	if ( 0 != strcmp( $params['dbname'], \FORUM_DATA ) ) {
		return;
	}
	
	// First run initialization
	send( 200, 'First run' );
}

// TODO: Main homepage
function showHome( string $event, array $hook, array $params ) {
	// This may also trigger firstrun event
	$user	= authUser(); 
	
	if ( lowUserPriority( $user ) ) {
		send( 200, 'Cached Homepage: All forums' );
	}
	send( 200, 'Homepage: All forums' );
}

// TODO: Forum topics and sub forums
function showForumRoute( string $event, array $hook, array $params ) {
	$page	= ( int ) ( $params['page'] ?? 1 );
	$id	= ( int ) ( $params['id'] ?? 0 );
	
	$plimit	= config( 'topic_limit', \TOPIC_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	
	$user	= authUser();
	if ( lowUserPriority( $user ) ) {
		send( 200, 'Cached Forum page (pinned first) ' . 
			$id . ' index ' . $start );
	}
	
	setBrowsingSession( $id, false );
	send( 200, 'Forum page (pinned first) ' . 
		$id . ' index ' . $start );
}

// Create a new forum page
function newForumRoute( string $event, array $hook, array $params ) {
	$user	= verifyAuthLevel( \USER_STATUS_ADMIN );
	$action = pageRoutePath( 'donewforum' );
	
	send( 200, forumEditPage( $action ) );
}

// Edit an existing forum
function editForumRoute( string $event, array $hook, array $params ) {
	$user	= verifyAuthLevel( \USER_STATUS_ADMIN );
	$id	= ( int ) ( $params['id'] ?? 0 );
	if ( empty( $id ) ) {
		sendNotFound();
	}
	
	$data = 
	getSingle( 
		$id, 
		"SELECT * FROM forum_summary_view WHERE id = :id", 
		\FORUM_DATA 
	);
	
	// No forum by that ID?
	if ( empty( $data ) ) {
		sendNotFound();
	}
	
	$action	= pageRoutePath( 'doeditforum' );
	send( 
		200, 
		forumEditPage( 
			$action, $id, $data['parent'] ?? 0, 
			$data['title'], $data['description'] 
		) 
	);
}

// Process forum editing/creating
function doEditForumRoute( string $event, array $hook, array $params ) {
	$user	= verifyAuthLevel( \USER_STATUS_ADMIN );
	
	$status	= \FORM_STATUS_VALID;
	$id	= ( int ) ( $_POST['id'] ?? 0 );
	$parent	= ( int ) ( $_POST['parent_id'] ?? 0 );
	$data	= forumForm( $id, $parent, $status );
	
	if ( $status != \FORM_STATUS_VALID ) {
		sendExpired();
	}
	
	// Find if parent exists
	if ( !empty( $parent ) ) {
		if ( empty( getSingle( 
			$parent, 
			"SELECT status FROM forums WHERE id = :id",
			\FORUM_DATA 
		) ) ) {
			sendNotFound();
		}
	}
	
	// New forum?
	if ( empty( $id ) ) {
		$id = newForum( 
			$data['title'], 
			$data['description'], 0, 
			$parent 
		);
	
	// Edit existing forum
	} else {
		$ok = 
		editForum( $id, $data['title'], $data['description'] );
		if ( !$ok ) {
			// Error saving forum?
			sendError( 500 );
		}
	}
	
	// Redirect to new forum page
	$path = pageRoutePath( 'showforum', 'forum' );
	redirect( 201, slashPath( $path, true ) . $id );
}

// TODO: Topic replies
function showTopicRoute( string $event, array $hook, array $params ) {
	$page	= ( int ) ( $params['page'] ?? 1 );
	$id	= ( int ) ( $params['id'] ?? 0 );
	
	$plimit	= config( 'post_limit', \POST_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	
	$user	= authUser();
	if ( lowUserPriority( $user ) ) {
		send( 200, 'Cached Topic page ' . 
			$id . ' index ' . $start );
	}
	
	setBrowsingSession( $id, true );
	send( 200, 'Topic page ' . $id . ' index ' . $start );
}

// New forum topic page
function showNewTopicRoute( string $event, array $hook, array $params ) {
	// Forum id
	$id	= ( int ) ( $params['id'] ?? 0 );
	if ( empty( $id ) ) {
		sendNotFound();
	}
	
	$user	= forumUser();
	send( 200, newPostPage( $user, $id ) );
}

// New forum topic
function doTopicRoute( string $event, array $hook, array $params ) {
	$forum = $_POST['forum'] ?? '';
	if ( empty( $forum ) || !\is_numeric( $forum ) ) {
		sendNotFound();
	}
	
	// Expired?
	$status = \FORM_STATUS_VALID;
	$data	= topicForm( ( int ) $_POST['forum'], $status );
	if ( $status != \FORM_STATUS_VALID ) {
		sendExpired();
	}
	
	// No new post in filtered data?
	if ( empty( $data ) ) {
		sendNotFound();
	}
	
	// Filtered forum id
	$id	= $data['forum'];
	if ( empty( $id ) ) {
		sendNotFound();
	}
	
	$user	= forumUser();
	$tid	= 
	newTopic( 
		( int ) $id, 
		$data['title'], 
		$data['message'], 
		$data['name'], 
		$data['email']
	);
	// Error creating new topic?
	if ( empty( $tid ) ) {
		sendError( 500, 'Error creating new topic' );
	}
	
	$path = pageRoutePath( 'showtopic', 'topic' );
	
	// Redirect to new topic page
	redirect( 201, slashPath( $path, true ) . $tid );
}

// New topic reply page
function showNewReplyRoute( string $event, array $hook, array $params ) {
	// Topic id
	$id	= ( int ) ( $params['id'] ?? 0 );
	if ( empty( $id ) ) {
		sendNotFound();
	}
	
	$user	= forumUser();
	send( 200, newPostPage( $user, null, $id ) );
}

// TODO: New topic reply
function doReplyRoute( string $event, array $hook, array $params ) {
	$user	= forumUser();
	// Topic id
	$id	= ( int ) ( $params['id'] ?? 0 );
	if ( empty( $id ) ) {
		sendNotFound();
	}
	
	send( 200, 'New reply created in topic ' . $id );
}

// TODO: Individual post/topic
function showPostRoute( string $event, array $hook, array $params ) {
	$id	= ( int ) ( $params['id'] ?? 0 );
	if ( empty( $id ) ) {
		sendNotFound();
	}
	
	$user	= authUser();
	if ( lowUserPriority( $user ) ) {
		send( 200, 'Cached post page ' . $id );
	}
	
	setBrowsingSession( $id, true );
	send( 200, 'Show post page : ' . $id );
}

// TODO: Edit existing topic or post
function editPostRoute( string $event, array $hook, array $params ) {
	$id	= ( int ) ( $params['id'] ?? 0 );
	if ( empty( $id ) ) {
		sendNotFound();
	}
	
	$user	= forumUser();
	if ( empty( $user ) ) {
		// Editing isn't allowed for unregistered users?
		if ( !config( 'allow_anon_edit', \ALLOW_ANON_EDIT, 'bool' ) ) {
			sendDenied();
		}
		
		$info	= postAuthorInfo( $id );
		if ( empty( $info ) ) {
			sendNotFound();
		}
		
		
		// TODO: Check author edit privileges
	}
	if ( lowUserPriority( $user ) ) {
		sendDenied();
	}
	
	send( 200, 'Editing post : ' . $id );
}

// TODO: Edit existing topic or post
function doEditPostRoute( string $event, array $hook, array $params ) {
	$user	= forumUser();
	$form	= 
	if ( empty( $user ) ) {
		// Editing isn't allowed for unregistered users?
		if ( !config( 'allow_anon_edit', \ALLOW_ANON_EDIT, 'bool' ) ) {
			sendDenied();
		}
		$author = postAuthorEditAuth();
	}
	// Post edit form details
	// TODO 
	send( 200, 'Process edit post page' );
}

// User profile self-edit page
function showProfileRoute( string $event, array $hook, array $params ) {
	$user	= verifyAuthLevel();
	$data	= 
	getSingle( 
		$user['id'], 
		"SELECT id, display, bio FROM users WHERE id = :id",
		\FORUM_DATA
	);
	
	// No profile? Maybe deleted without unsetting session
	if ( empty( $data ) ) {
		sendNotFound();
	}
	
	send( 
		200, 
		profilePage( 
			$user['id'], 
			$user['name'], 
			$data['display']	?? '', 
			$data['bio']		?? ''
		)
	);
}

// Edit user profile
function doEditProfileRoute( string $event, array $hook, array $params ) {
	$user	= verifyAuthLevel();
	
	$status = \FORM_STATUS_VALID;
	$data	= profileForm( $user['id'], $status );
	if ( $status != \FORM_STATUS_VALID || empty( $data ) ) {
		sendExpired();
	}
	
	$ok	= 
	setUpdate( 
		"UPDATE users SET 
			display = :display, 
			bio	= :bio
			WHERE id = :id", 
		[ 
			':display'	=> $data['display']	?? '', 
			':bio'		=> $data['bio']		?? '', 
			':id'		=> $id 
		], 
		\FORUM_DATA
	)
	
	if ( !$ok ) {
		sendExpired();
	}
	
	$path = pageRoutePath( 'showuser', 'user' );
	redirect( 202, slashPath( $path, true ) . $user['name'] );
}

// TODO: Public user profile page
function showUserRoute( string $event, array $hook, array $params ) {
	$id	= ( int ) ( $params['id'] ?? 0 );
	$name	= $params['user'] ?? '';
	
	send( 200, 'User page by id: ' . $id . ' or name: ' . $name );
}

// Password changing form
function showPassRoute( string $event, array $hook, array $params ) {
	$user	= verifyAuthLevel();
	send( 200, changePassPage( $user['id'] ) );
}

// Process password change
function doEditPassRoute( string $event, array $hook, array $params ) {
	$user	= verifyAuthLevel();
	
	$status = \FORM_STATUS_VALID;
	$data	= profileForm( $user['id'], $status );
	if ( $status != \FORM_STATUS_VALID || empty( $data ) ) {
		sendExpired();
	}
	
	// Check old password validity first
	$creds	= passwordAuth( $user['id'], $data['old_password'] );
	if ( $creds != \AUTH_STATUS_SUCCESS ) {
		sendDenied();
	}
	
	// Save new password
	if ( savePassword( $user['id'], $data['new_password'] ) ) {
		sendPage( '', 202 );
	}
	
	// Something went wrong
	sendExpired();
}

// Authentication page
function showLoginRoute( string $event, array $hook, array $params ) {
	$user	= authUser();
	// Already logged in?
	if( !empty( $user ) ) {
		sendPage( '', 202 );
	}
	
	// Post-login redirect path
	$path	= $params['all'] ?? '';
	
	send( 200, loginPage( $path ) );
}

// Process login form submission
function doLoginRoute( string $event, array $hook, array $params ) {
	$user	= authUser();
	if( !empty( $user ) ) {
		sendPage( '', 202 );
	}
	
	loginBuffer();
	
	$status = \FORM_STATUS_VALID;
	$data	= loginForm( $status );
	
	switch( $status ) {
		// Continue processing if form is valid
		case FORM_STATUS_VALID:
			// Post-login redirect path
			$path	= $params['all'] ?? '';
			processLogin( $data, $path, $params );
			break;
		
		// Too many login attempts
		case FORM_STATUS_FLOOD:
			sendError( 
				429, 
				errorLang( 'loginwait', \MSG_LOGINWAIT ) 
			);
			break;
			
		// Form validation failed/expired
		default:
			sendExpired();
	}
	
}

// New user registration page
function showRegisterRoute( string $event, array $hook, array $params ) {
	// Check if registrations are enabled
	$reg	= config( 'enable_register', \ENABLE_REGISTER, 'bool' );
	if ( !$reg ) {
		sendNotFound();
	}
	
	// Shouldn't be here if already logged in
	$user	= authUser();
	if( !empty( $user ) ) {
		sendPage( '', 202 );
	}
	
	// Append post-register login redirect path
	$path	= $params['all'] ?? '';
	send( 200, registerPage( $path ) );
}

// Process registration form submission
function doRegisterRoute( string $event, array $hook, array $params ) {
	$reg	= config( 'enable_register', \ENABLE_REGISTER, 'bool' );
	if ( !$reg ) {
		sendNotFound();
	}
	
	$user	= authUser();
	if( !empty( $user ) ) {
		sendPage( '', 202 );
	}
	$status = \FORM_STATUS_VALID;
	$data	= registerForm( $status );
	
	switch( $status ) {
		case FORM_STATUS_VALID:
			// Check a redirect path
			$path	= 
			eventRoutePrefix( 'login', 'login' ) . 
			slashPath( $params['all'] ?? '' );
			
			processRegister( $data, $path );
			break;
		
		// Too many registration attempts
		case FORM_STATUS_FLOOD:
			sendError( 
				429, 
				errorLang( 
					'registerwait', 
					\MSG_REGISTERWAIT 
				) 
			);
			break;
		
		default:
			sendExpired();
	}
}

// TODO: Edit configuration settings
function editSettingsRoute( string $event, array $hook, array $params ) {
	// Admin privileges required
	$user	= verifyAuthLevel( \USER_STATUS_ADMIN );
	
	// Current configuration
	// $config = loadConfig( \CONFIG );
	send( 200, 'Edit configuration form' );
}

// TODO: Save new settings
function doEditSettingsRoute( string $event, array $hook, array $params ) {
	$user	= verifyAuthLevel( \USER_STATUS_ADMIN );
	
	// Current configuration
	// $config = loadConfig( \CONFIG );
	//modifiedConfig( array $params, array $modify );
	send( 200, 'Edit configuration' );
}

// TODO: Live full feed of new posts for moderators
function showLiveRoute( string $event, array $hook, array $params ) {
	$user	= verifyAuthLevel( \USER_STATUS_MOD );
	
	$page	= ( int ) ( $params['page'] ?? 1 );
	
	$plimit	= config( 'topic_limit', \TOPIC_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	
	
	send( 200, 'Complete list of new posts and their forums' );
}


// TODO: Forum topic/post search page
function searchRoute( string $event, array $hook, array $params ) {
	send( 200, 'Search page' );
}

// TODO: Process search form submission
function doSearchRoute( string $event, array $hook, array $params ) {
	$status		= validateForm( 'searchform', true, false );
	switch( $status ) {
		case FORM_STATUS_INVALID:
		case FORM_STATUS_EXPIRED:
			sendExpired();
		
		case FORM_STATUS_FLOOD:
			visitorError( 429, 'Flood' );
			sendError( 429, errorLang( "toomany", \MSG_TOOMANY ) );
	}
	
	// Searching terms
	$find	= searchData( $params['find'] ?? '' );
	if ( empty( $find ) ) {
		sendNotFound();
	}
	
	// Search page prefix
	$prefix = searchPagePath( $params );
	$page	= ( int ) ( $params['page'] ?? 1 );
	
	// Pagination prep
	$plimit	= config( 'search_limit', \SEARCH_LIMIT, 'int' );
	$start	= ( $page - 1 ) * $plimit;
	
	send( 
		200, 
		'Search page ' . $plimit . 
		' Start: ' . $start . 
		' Find: ' . $find 
	);
}

/**
 *  End session/cookie route
 */
function logoutRoute() {
	processLogout( true );	
	// TODO: Other logout things
}

/**
 *  Forum route adding event
 */
function addForumRoutes( string $event, array $hook, array $params ) {
	return 
	[
	/**
	 *  Homepage
	 */
	[ 'get', '',				'home' ],
	[ 'get', 'feed',			'feed' ],
	
	/**
	 *  Forum routes
	 */
	[ 'get', 'forum/:id',			'showforum' ],
	[ 'get', 'forum/:id/page:page',		'showforum' ],
	
	[ 'get', 'forum',			'newforum' ],
	[ 'post', 'forum',			'donewforum' ],
	
	[ 'get', 'forum/:id/edit',		'editforum' ],
	[ 'post', 'forum/edit',			'doeditforum' ],
	
	/**
	 *  Topic routes
	 */
	[ 'get', 'topic/:id',			'showtopic' ],
	[ 'get', 'topic/:id/page:page',		'showtopic' ],
	
	[ 'get', 'forum/:id/new',		'newtopic' ],
	[ 'post', 'topic/new',			'donewtopic' ],
	
	[ 'get', 'topic/:id/edit',		'edittopic' ],
	[ 'post', 'topic/edit',			'doedittopic' ],
	
	/**
	 *  Reply routes
	 */
	[ 'get', 'post:id',			'showreply' ],
	
	[ 'get', 'topic:id/new',		'newreply' ],
	[ 'post', 'post/new',			'donewreply' ],
	
	[ 'get', 'post/:id/edit',		'editreply' ],
	[ 'post', 'post/edit',			'doeditreply' ],
	
	/**
	 *  Chat routes
	 */
	[ 'get', 'chat',			'showchat' ],
	[ 'get', 'chat/since/:id',		'showchatsince' ],
	[ 'get', 'chat/user/:id',		'showchatuser' ],
	[ 'post', 'chat',			'dochat' ],
	
	/**
	 *  Poll routes
	 */
	[ 'get', 'poll/new/:id',		'newpoll' ],
	[ 'post', 'poll/new',			'donewpoll' ],
	[ 'get', 'poll/edit/:id',		'editpoll' ],
	[ 'post', 'poll/edit',			'doeditpoll' ],
	[ 'post', 'poll',			'dovote' ],
	
	/**
	 *  User and profile routes
	 */
	[ 'get', 'users/:id',			'showuser' ],
	[ 'get', 'user/:user',			'showuser' ],
	[ 'get', 'users/:id/edit',		'edituser' ],
	[ 'get', 'users/edit',			'doedituser' ],
	
	[ 'get', 'user/profile',		'editprofile' ],
	[ 'post', 'user/profile',		'doeditprofile' ],
	
	[ 'get', 'user/password',		'editpassword' ],
	[ 'post', 'user/password',		'doeditpassword' ],
	
	[ 'get', 'login',			'showlogin' ],
	[ 'get', 'login/:all',			'showlogin' ],
	[ 'post', 'login',			'dologin' ],
	[ 'post', 'login/:all',			'dologin' ],
	
	[ 'get', 'register',			'showregister' ],
	[ 'get', 'register/:all',		'showregister' ],
	[ 'post', 'register',			'doregister' ],
	[ 'post', 'register/:all',		'doregister' ],
	
	[ 'get', 'liveposts',			'showliveposts' ],
	[ 'get', 'liveposts/page:page',		'showliveposts' ],
	
	
	/**
	 *  Configuration settings routes
	 */
	[ 'get', 'settings'			'showconfig' ],
	[ 'post', 'settings'			'doeditconfig' ],
	
	/**
	 *  Searching routes
	 */
	[ 'get', 'search',			'showsearch' ], 
	[ 'get', '\\?nonce=:nonce&token=:token&meta=&find=:find',
						'search' ],
						
	[ 'get', '\\?nonce=:nonce&token=:token&meta=&find=:find/page:page',	
						'searchpaginate' ],
	/**
	 *  Static content page routes
	 */
	[ 'get', 'pages'			'showpage' ],
	[ 'get', 'pages/:tree'			'showpage' ]
	];
}

/**
 *  Begin event registry
 */

// Configuration load
hook( [ 'checkconfig',	'checkConfig' ] );
hook( [ 'configmodified','configModified' ] );

// Register request, route, and plugin load handlers
hook( [ 'requesturl',	'filterRequest' ] );
hook( [ 'begin',	'excludeThrottling' ] );
hook( [ 'begin',	'loadPlugins' ] );
hook( [ 'begin',	'request' ] );
hook( [ 'begin',	'route' ] );

// Register first run hook
hook( [ 'dbcreated',	'firstRun' ] );

// Append URL route markers
hook( [ 'routemarker',	'routeMarkers' ] );

// Register forum routes during 'addroutes' event ( called in request() )
hook( [ 'initroutes',	'addForumRoutes' ] );

// Forum content routes
hook( [ 'showforum',	'showForumRoute' ] );
hook( [ 'newforum',	'newForumRoute' ] );
hook( [ 'donewforum',	'doEditForumRoute' ] );
hook( [ 'editforum',	'editForumRoute' ] );
hook( [ 'doeditforum',	'doEditForumRoute' ] );

hook( [ 'showtopic',	'showTopicRoute' ] );
hook( [ 'newtopic',	'showNewTopicRoute' ] );
hook( [ 'donewtopic',	'doTopicRoute' ] );
hook( [ 'edittopic',	'editPostRoute' ] );

hook( [ 'showreply',	'showPostRoute' ] );
hook( [ 'newreply',	'showNewReplyRoute' ] );
hook( [ 'donewreply',	'doReplyRoute' ] );
hook( [ 'editreply',	'editPostRoute' ] );

hook( [ 'doedittopic',	'doEditPostRoute' ] );
hook( [ 'doeditreply',	'doEditPostRoute' ] );

hook( [ 'showliveposts','showLiveRoute' ] );

// Register and login new user routes
hook( [ 'showlogin',	'showLoginRoute' ] );
hook( [ 'showregister',	'showRegisterRoute' ] );
hook( [ 'dologin',	'doLoginRoute' ] );
hook( [ 'doregister',	'doRegisterRoute' ] );

// Configuration routes
hook( [ 'showconfig',	'editSettingsRoute' ] );
hook( [ 'doeditconfig',	'doEditSettingsRoute' ] );

// Profile routes
hook( [ 'showuser',	'showUserRoute' ] );
hook( [ 'editprofile',	'showEditProfileRoute' ] );
hook( [ 'doeditprofile','doEditProfileRoute' ] );

hook( [ 'editpassword',	'showPassRoute' ] );
hook( [ 'doeditpassword','doEditPassRoute' ] );

// Searching routes
hook( [ 'showsearch',	'searchRoute' ] );
hook( [ 'search',	'doSearchRoute' ] );
hook( [ 'searchpaginate','doSearchRoute' ] );

// Load new templates after plugin load
hook( [ 'pluginsloaded', 'loadTemplates' ] );

/**
 *  Begin Bareboard
 *  Start by registering templates
 */
hook( [ 'begin', [ 'templates' => $templates ] ] );

