<?php
/**
 * Lists out all the options from the Theme Skinning Section of the theme options
 * This file is included in functions.php
 *
 * @package Suffusion
 * @subpackage Admin
 */

global $suffusion_theme_name, $suffusion_safe_font_faces;

$suffusion_theme_skinning_options = array(
	// Main category for Look and Feel settings
	array("name" => "Skinning",
		"type" => "sub-section-2",
		"category" => "skinning",
		"help" => "This is where you start your customization. The first step is easy - select a skin from \"Theme Selection\".
			You can visit each of the individual sections and pick and choose the colors you want for each.
			<br /><b>Version Info: </b> In version 3.7.3 and earlier, \"Theme Skinning\" was a sub-section under \"Visual Effects\".",
		"parent" => "root"
	),

	array("name" => "Theme selection",
		"type" => "sub-section-3",
		"category" => "theme-selection",
		"parent" => "skinning"
	),

	array("name" => "Color Scheme",
		"desc" => "Choose from one of the pre-defined color schemes. You can customize the colors further, if you wish.",
		"id" => "suf_color_scheme",
		"parent" => "theme-selection",
		"type" => "radio",
		"options" => array(
			"light-theme-green" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Light-theme-green.jpg' alt='Green on a light theme'/><p>Green on a light theme</p></div>",
			"dark-theme-green" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Dark-theme-green.jpg' alt='Green on a dark theme'/><p>Green on a dark theme (Default)</p></div>",
			"light-theme-pale-blue" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Light-theme-pale-blue.jpg' alt='Pale Blue on a light theme'/><p>Pale Blue on a light theme</p></div>",
			"dark-theme-pale-blue" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Dark-theme-pale-blue.jpg' alt='Pale Blue on a dark theme'/><p>Pale Blue on a dark theme</p></div>",
			"light-theme-royal-blue" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Light-theme-royal-blue.jpg' alt='Royal Blue on a light theme'/><p>Royal Blue on a light theme</p></div>",
			"dark-theme-royal-blue" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Dark-theme-royal-blue.jpg' alt='Royal Blue on a dark theme'/><p>Royal Blue on a dark theme</p></div>",
			"light-theme-gray-1" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Light-theme-gray-1.jpg' alt='Gray Shade 1 on a light theme'/><p>Gray Shade 1 on a light theme</p></div>",
			"dark-theme-gray-1" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Dark-theme-gray-1.jpg' alt='Gray Shade 1 on a dark theme'/><p>Gray Shade 1 on a dark theme</p></div>",
			"light-theme-gray-2" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Light-theme-gray-2.jpg' alt='Gray Shade 2 on a light theme'/><p>Gray Shade 2 on a light theme</p></div>",
			"dark-theme-gray-2" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Dark-theme-gray-2.jpg' alt='Gray Shade 2 on a dark theme'/><p>Gray Shade 2 on a dark theme</p></div>",
			"light-theme-red" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Light-theme-red.jpg' alt='Red on a light theme'/><p>Red on a light theme</p></div>",
			"dark-theme-red" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Dark-theme-red.jpg' alt='Red on a dark theme'/><p>Red on a dark theme</p></div>",
			"light-theme-orange" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Light-theme-orange.jpg' alt='Orange on a light theme'/><p>Orange on a light theme</p></div>",
			"dark-theme-orange" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Dark-theme-orange.jpg' alt='Orange on a dark theme'/><p>Orange on a dark theme</p></div>",
			"light-theme-purple" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Light-theme-purple.jpg' alt='Purple on a light theme'/><p>Purple on a light theme</p></div>",
			"dark-theme-purple" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/Dark-theme-purple.jpg' alt='Purple on a dark theme'/><p>Purple on a dark theme</p></div>",
			"minima" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/minima.jpg' alt='Minima'/><p>Minima</p></div>",
			"photonique" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/photonique.jpg' alt='Photonique'/><p>Photonique</p></div>",
		),
		"std" => "light-theme-gray-1"),

	array("name" => "Icon Sets",
		"type" => "sub-section-3",
		"category" => "icon-sets",
		"parent" => "skinning"
	),

	array("name" => "Icon Sets",
		"desc" => "Choose from one of the pre-defined icon sets. These apply mostly to byline, page navigation and comment form elements. A lot of these icons are from a <a href='http://www.studiopress.com/graphics/icon-set-bloggers.htm'>set generously released under GPL by StudioPress</a>.",
		"id" => "suf_iconset",
		"parent" => "icon-sets",
		"type" => "radio",
		"options" => array(
			"iconset-0" => "<div class='picture'><img src='" . get_template_directory_uri() . "/images/iconset-0.png' alt='Set 1'/><p>Set 1</p></div>",
			"iconset-1" => "<div class='picture'><img src='" . get_template_directory_uri() . "/images/iconset-1.png' alt='Set 2'/><p>Set 2</p></div>",
			"iconset-2" => "<div class='picture'><img src='" . get_template_directory_uri() . "/images/iconset-2.png' alt='Set 3'/><p>Set 3</p></div>",
			"iconset-3" => "<div class='picture'><img src='" . get_template_directory_uri() . "/images/iconset-3.png' alt='Set 4'/><p>Set 4</p></div>",
			"iconset-4" => "<div class='picture'><img src='" . get_template_directory_uri() . "/images/iconset-4.png' alt='Set 5'/><p>Set 5</p></div>",
			"iconset-5" => "<div class='picture'><img src='" . get_template_directory_uri() . "/images/iconset-5.png' alt='Set 6'/><p>Set 6</p></div>",
			"theme" => "Theme Default",
		),
		"std" => "theme"),

	array("name" => "Show icons",
		"desc" => "Show icons for the following (applicable to the blog layout only):",
		"id" => "suf_little_icons_enabled",
		"parent" => "icon-sets",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_options_array("suf_little_icons_enabled",
			array(
				'author' => 'Post/page author',
				'date' => 'Post/page date',
				'category' => 'Post category',
				'tags' => 'Post tag',
				'permalink' => 'Post permalink',
				'comments' => 'Post/page comments',
				'edit' => 'Post/page edit (seen by a logged in author only)'
			)),
		"std" => "author,date,category,tags,permalink,comments,edit"),

	array("name" => "Navigation Bar Above Header",
		"desc" => "Control the settings for the Navigation Bar Above Header",
		"category" => "navt-skin-settings",
		"parent" => "skinning",
		"type" => "sub-section-3",),

	array("name" => "Default or custom?",
		"id" => "suf_navt_skin_def_cust",
		"type" => "radio",
		"parent" => "navt-skin-settings",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Navigation Bar Background",
		"desc" => "Setup the background of the navigation bar.",
		"id" => "suf_navt_skin_settings_bg",
		"parent" => "navt-skin-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => '#ffffff', "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Navigation Bar Border",
		"desc" => "Setup the border of the navigation bar.",
		"id" => "suf_navt_skin_settings_bg_border",
		"parent" => "navt-skin-settings",
		"type" => "border",
		"options" => array(),
		"std" => array(
			'top' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'right' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'bottom' => array('colortype' => 'custom', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 1, 'border-width-type' => 'px'),
			'left' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
		),
	),

	array("name" => "Navigation Bar Background Font",
		"desc" => "Setup the font for the navigation bar background.",
		"id" => "suf_navt_skin_settings_bg_font",
		"parent" => "navt-skin-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#444444", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Navigation Menu Items",
		"desc" => "Setup the background of the navigation menu items in your page. This is the default background of the navigation menu items.",
		"id" => "suf_navt_skin_settings",
		"parent" => "navt-skin-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => '#ffffff', "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Navigation Menu Items Border",
		"desc" => "Setup the border of the navigation bar.",
		"id" => "suf_navt_skin_settings_border",
		"parent" => "navt-skin-settings",
		"type" => "border",
		"options" => array(),
		"std" => array(
			'top' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'right' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'bottom' => array('colortype' => 'custom', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 1, 'border-width-type' => 'px'),
			'left' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
		),
	),

	array("name" => "Navigation Menu Items Font",
		"desc" => "Setup the font for the menu items.",
		"id" => "suf_navt_skin_settings_font",
		"parent" => "navt-skin-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#444444", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Navigation Menu Items: Hover",
		"desc" => "This is the background of a navigation menu item upon hover.",
		"id" => "suf_navt_skin_settings_hover",
		"parent" => "navt-skin-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => '#ffffff', "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Navigation Menu Items: Hover Border",
		"desc" => "Setup the border of the navigation bar.",
		"id" => "suf_navt_skin_settings_hover_border",
		"parent" => "navt-skin-settings",
		"type" => "border",
		"options" => array(),
		"std" => array(
			'top' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'right' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'bottom' => array('colortype' => 'custom', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 1, 'border-width-type' => 'px'),
			'left' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
		),
	),

	array("name" => "Navigation Menu Items: Hover Font",
		"desc" => "Setup the font for the menu items upon hover.",
		"id" => "suf_navt_skin_settings_hover_font",
		"parent" => "navt-skin-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#444444", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Navigation Menu Items: Visited",
		"desc" => "This is the background of a visited item in the navigation menu.",
		"id" => "suf_navt_skin_settings_visited",
		"parent" => "navt-skin-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => '#ffffff', "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Navigation Menu Items: Visited Border",
		"desc" => "Setup the border of the navigation bar.",
		"id" => "suf_navt_skin_settings_visited_border",
		"parent" => "navt-skin-settings",
		"type" => "border",
		"options" => array(),
		"std" => array(
			'top' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'right' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'bottom' => array('colortype' => 'custom', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 1, 'border-width-type' => 'px'),
			'left' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
		),
	),

	array("name" => "Navigation Menu Items: Visited Font",
		"desc" => "Setup the font for the visited menu items.",
		"id" => "suf_navt_skin_settings_visited_font",
		"parent" => "navt-skin-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#444444", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Navigation Menu Items: Highlighted",
		"desc" => "This is the background of a navigation menu item upon highlighting.",
		"id" => "suf_navt_skin_settings_hl",
		"parent" => "navt-skin-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => '#ffffff', "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Navigation Menu Items: Highlighted Border",
		"desc" => "Setup the border of the navigation bar.",
		"id" => "suf_navt_skin_settings_hl_border",
		"parent" => "navt-skin-settings",
		"type" => "border",
		"options" => array(),
		"std" => array(
			'top' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'right' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'bottom' => array('colortype' => 'custom', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 1, 'border-width-type' => 'px'),
			'left' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
		),
	),

	array("name" => "Navigation Menu Items: Highlighted Font",
		"desc" => "Setup the font for the menu items upon highlighting.",
		"id" => "suf_navt_skin_settings_hl_font",
		"parent" => "navt-skin-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#444444", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Header",
		"type" => "sub-section-3",
		"category" => "header-styles",
		"parent" => "skinning"
	),

	array("name" => "Default styles or custom styles for header?",
		"desc" => "You can decide to go with the colors / text styles of the theme you are using for the header, or choose your own. " .
				"If you choose default colors / text styles here then the rest of your settings in this section will be ignored. " .
				"If you choose custom styles then the settings you make here will override the theme's settings.",
		"id" => "suf_header_style_setting",
		"parent" => "header-styles",
		"type" => "radio",
		"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the header.",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Header Background Image Type",
		"desc" => "You can set an image to use for the header. You can either use a predefined image (default) or a custom gradient or nothing at all.",
		"id" => "suf_header_image_type",
		"parent" => "header-styles",
		"type" => "radio",
		"options" => array("image" => "Use a predefined image (default)",
			"gradient" => "Use a custom gradient", "rot-image" => "Use a rotating set of images from a folder",
			"none" => "No image"),
		"std" => "image"),

	array("name" => "Header Background Image",
		"desc" => "Set the image to use for the header background. If this makes the header text unreadble you can try changing the header color. " .
				"If you have chosen default styles above or a gradient then this setting will be ignored.",
		"id" => "suf_header_background_image",
		"parent" => "header-styles",
		"type" => "upload",
		"hint" => "Enter the full URL here (including http://), or click on \"Upload Image\"",
		"std" => ""),

	array("name" => "Header Background Image Tiling",
		"desc" => "Set how the predefined header background image should be tiled. This will define how the image will repeat on the background. " .
				"If you have chosen default styles above or not selected a background image then this setting will be ignored.",
		"id" => "suf_header_background_repeat",
		"parent" => "header-styles",
		"type" => "radio",
		"options" => array("repeat" => "Repeat both horizontally and vertically (default)",
			"repeat-x" => "Repeat horizontally only",
			"repeat-y" => "Repeat vertically only",
			"no-repeat" => "Do not repeat - show background once only"),
		"std" => "repeat"),

	array("name" => "Header Background Image Position",
		"desc" => "Set the position of the predefined header background image. " .
				"If you have chosen default styles above or not selected a background image then this setting will be ignored.",
		"id" => "suf_header_background_position",
		"parent" => "header-styles",
		"type" => "radio",
		"options" => array("top left" => "Top left (default)",
			"top center" => "Top center",
			"top right" => "Top right",
			"center left" => "Center left",
			"center center" => "Middle of the page",
			"center right" => "Center right",
			"bottom left" => "Bottom left",
			"bottom center" => "Bottom center",
			"bottom right" => "Bottom right"),
		"std" => "top left"),

	array("name" => "Folder for Rotating Header background",
		"desc" => "Set the folder for rotating header images. If you are not using a rotating header image you can ignore this.",
		"id" => "suf_header_background_rot_folder",
		"parent" => "header-styles",
		"type" => "text",
		"hint" => "Enter the path to a folder under " . WP_CONTENT_DIR,
		"std" => ""),

	array("name" => "Header Background Gradient Style",
		"desc" => "Choose the style to use for the header gradient. This will be used only if the \"Header Image Type\" is set to \"Use a custom gradient\" and you have custom styles picked.",
		"id" => "suf_header_gradient_style",
		"parent" => "header-styles",
		"type" => "radio",
		"options" => array(
			"top-down" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/gradient-t2d.jpg' alt='Top to Bottom'/><br /><p>Top to Bottom</p></div>",
			"down-top" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/gradient-d2t.jpg' alt='Bottom to Top'/><br /><p>Bottom to Top</p></div>",
			"left-right" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/gradient-l2r.jpg' alt='Left to Right'/><br /><p>Left to Right</p></div>",
			"right-left" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/gradient-r2l.jpg' alt='Right to Left'/><br /><p>Right to Left</p></div>",
		),
		"std" => "top-down"),

	array("name" => "Header Background Gradient Start Color",
		"desc" => "Set the starting color for the gradient. The gradient goes from the Start color to the End color. " .
				"This will be used only if the \"Header Image Type\" is set to \"Use a custom gradient\" and you have custom styles picked. ",
		"id" => "suf_header_gradient_start_color",
		"parent" => "header-styles",
		"type" => "color-picker",
		"std" => "FFFFFF"),

	array("name" => "Header Background Gradient End Color",
		"desc" => "Set the ending color for the gradient. The gradient goes from the Start color to the End color. " .
				"This will be used only if the \"Header Image Type\" is set to \"Use a custom gradient\" and you have custom styles picked. ",
		"id" => "suf_header_gradient_end_color",
		"parent" => "header-styles",
		"type" => "color-picker",
		"std" => "000000"),

	array("name" => "Header Foreground Image Type",
		"desc" => "You might want to use a logo or simply have text in your header:",
		"id" => "suf_header_fg_image_type",
		"parent" => "header-styles",
		"type" => "radio",
		"options" => array("image" => "Use a predefined image or logo",
			"text" => "Use text (default)"),
		"std" => "text"),

	array("name" => "Header Foreground Image",
		"desc" => "Set the image to use for the header. This could be a logo or a stylized header using your own fonts and graphics. " .
				"If you have chosen default styles above or a text header then this setting will be ignored.",
		"id" => "suf_header_fg_image",
		"parent" => "header-styles",
		"type" => "upload",
		"hint" => "Enter the full URL here (including http://), or click on \"Upload Image\"",
		"std" => ""),

	array("name" => "Blog Title / Header Color",
		"desc" => "Set the color of the blog title / header. You can leave the default values in if you don't have a header image. " .
				"You may need to tweak the colors in case of you have a header background, so that the header can be seen. " .
				"If you have choose to hide your header (in the layout section) then this setting will be ignored.",
		"id" => "suf_blog_title_color",
		"parent" => "header-styles",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_blog_title_color", $suffusion_theme_name)),

	array("name" => "Blog Title / Header Decoration",
		"desc" => "Set the effects of the blog title / header. " .
				"If you have choose to hide your header (in the layout section) then this setting will be ignored.",
		"id" => "suf_blog_title_style",
		"parent" => "header-styles",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "none"),

	array("name" => "Blog Title / Header Hover Color",
		"desc" => "Set the color of the blog title / header when you hover over it. You can leave the default values in if you don't have a header image. " .
				"You may need to tweak the colors in case of you have a header background, so that the header can be seen. " .
				"If you have choose to hide your header (in the layout section) then this setting will be ignored.",
		"id" => "suf_blog_title_hover_color",
		"parent" => "header-styles",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_blog_title_hover_color", $suffusion_theme_name)),

	array("name" => "Blog Title / Header Hover Decoration",
		"desc" => "Set the effects to show when you hover over the blog title / header. " .
				"If you have choose to hide your header (in the layout section) then this setting will be ignored.",
		"id" => "suf_blog_title_hover_style",
		"parent" => "header-styles",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "none"),

	array("name" => "Blog Description / Sub-header Color",
		"desc" => "Set the color of the blog description / sub-header. You can leave the default values in if you don't have a header image or a header background. " .
				"You may need to tweak the colors in case of you have a header background, so that the header can be seen. " .
				"If you have choose to hide your header (in the layout section) then this setting will be ignored.",
		"id" => "suf_blog_description_color",
		"parent" => "header-styles",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_blog_description_color", $suffusion_theme_name)),

	array("name" => "Empty Space Between Top of Page and Header",
		"desc" => "There is a gap of 20px between the top of the page and the header. You can change it here. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_wrapper_margin",
		"parent" => "header-styles",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "20"),

	array("name" => "Height of the Header image",
		"desc" => "The header is 55px high by default. You can change this setting if you have a header image needs to fit.
			Note that both above and below the header is 15px of padding, making the effective height of the header 85px.",
		"id" => "suf_header_height",
		"parent" => "header-styles",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "55"),

	array("name" => "Navigation Bar Below Header",
		"desc" => "Control the settings for the Navigation Bar Below Header",
		"category" => "nav-skin-settings",
		"parent" => "skinning",
		"type" => "sub-section-3",),

	array("name" => "Default or custom?",
		"id" => "suf_nav_skin_def_cust",
		"type" => "radio",
		"parent" => "nav-skin-settings",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Navigation Bar Background",
		"desc" => "Setup the background of the navigation bar.",
		"id" => "suf_nav_skin_settings_bg",
		"parent" => "nav-skin-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => '#ffffff', "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Navigation Bar Border",
		"desc" => "Setup the border of the navigation bar.",
		"id" => "suf_nav_skin_settings_bg_border",
		"parent" => "nav-skin-settings",
		"type" => "border",
		"options" => array(),
		"std" => array(
			'top' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'right' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'bottom' => array('colortype' => 'custom', 'color' => '#ffffff', 'style' => 'none', 'border-width' => 1, 'border-width-type' => 'px'),
			'left' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
		),
	),

	array("name" => "Navigation Bar Background Font",
		"desc" => "Setup the font for the navigation bar background.",
		"id" => "suf_nav_skin_settings_bg_font",
		"parent" => "nav-skin-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#444444", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Navigation Menu Items",
		"desc" => "Setup the background of the navigation menu items in your page. This is the default background of the navigation menu items.",
		"id" => "suf_nav_skin_settings",
		"parent" => "nav-skin-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => '#ffffff', "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Navigation Menu Items Border",
		"desc" => "Setup the border of the navigation bar.",
		"id" => "suf_nav_skin_settings_border",
		"parent" => "nav-skin-settings",
		"type" => "border",
		"options" => array(),
		"std" => array(
			'top' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'right' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'bottom' => array('colortype' => 'custom', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 1, 'border-width-type' => 'px'),
			'left' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
		),
	),

	array("name" => "Navigation Menu Items Font",
		"desc" => "Setup the font for the menu items.",
		"id" => "suf_nav_skin_settings_font",
		"parent" => "nav-skin-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#444444", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Navigation Menu Items: Hover",
		"desc" => "This is the background of a navigation menu item upon hover.",
		"id" => "suf_nav_skin_settings_hover",
		"parent" => "nav-skin-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => '#ffffff', "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Navigation Menu Items: Hover Border",
		"desc" => "Setup the border of the navigation bar.",
		"id" => "suf_nav_skin_settings_hover_border",
		"parent" => "nav-skin-settings",
		"type" => "border",
		"options" => array(),
		"std" => array(
			'top' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'right' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'bottom' => array('colortype' => 'custom', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 1, 'border-width-type' => 'px'),
			'left' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
		),
	),

	array("name" => "Navigation Menu Items: Hover Font",
		"desc" => "Setup the font for the menu items upon hover.",
		"id" => "suf_nav_skin_settings_hover_font",
		"parent" => "nav-skin-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#444444", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Navigation Menu Items: Visited",
		"desc" => "This is the background of a visited item in the navigation menu.",
		"id" => "suf_nav_skin_settings_visited",
		"parent" => "nav-skin-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => '#ffffff', "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Navigation Menu Items: Visited Border",
		"desc" => "Setup the border of the navigation bar.",
		"id" => "suf_nav_skin_settings_visited_border",
		"parent" => "nav-skin-settings",
		"type" => "border",
		"options" => array(),
		"std" => array(
			'top' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'right' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'bottom' => array('colortype' => 'custom', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 1, 'border-width-type' => 'px'),
			'left' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
		),
	),

	array("name" => "Navigation Menu Items: Visited Font",
		"desc" => "Setup the font for the visited menu items.",
		"id" => "suf_nav_skin_settings_visited_font",
		"parent" => "nav-skin-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#444444", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Navigation Menu Items: Highlighted",
		"desc" => "This is the background of a navigation menu item upon highlighting.",
		"id" => "suf_nav_skin_settings_hl",
		"parent" => "nav-skin-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => '#ffffff', "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Navigation Menu Items: Highlighted Border",
		"desc" => "Setup the border of the navigation bar.",
		"id" => "suf_nav_skin_settings_hl_border",
		"parent" => "nav-skin-settings",
		"type" => "border",
		"options" => array(),
		"std" => array(
			'top' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'right' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
			'bottom' => array('colortype' => 'custom', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 1, 'border-width-type' => 'px'),
			'left' => array('colortype' => 'transparent', 'color' => '#cccccc', 'style' => 'none', 'border-width' => 0, 'border-width-type' => 'px'),
		),
	),

	array("name" => "Navigation Menu Items: Highlighted Font",
		"desc" => "Setup the font for the menu items upon highlighting.",
		"id" => "suf_nav_skin_settings_hl_font",
		"parent" => "nav-skin-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#444444", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Body Background",
		"desc" => "Control the settings for the background of the main body.",
		"category" => "body-bg-settings",
		"parent" => "skinning",
		"type" => "sub-section-3",),

	array("name" => "Default or custom backgrounds for main body?",
		"desc" => "<b> If you are using WP's native background features, this section will be completely ignored.</b> You can decide to go with the colors / text styles of the theme you are using, or choose your own. " .
				"If you choose default colors / text styles here then the rest of your settings in this section will be ignored. " .
				"If you choose custom styles then the settings you make here will override the theme's settings.",
		"id" => "suf_body_style_setting",
		"parent" => "body-bg-settings",
		"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the body.",
		"type" => "radio",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Body Background Color",
		"desc" => "Set the color of the background on which the page is. " .
				"Note that you can have a dark theme on a white background - the colors of the main content window are unaffected by this. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_body_background_color",
		"parent" => "body-bg-settings",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_body_background_color", $suffusion_theme_name)),

	array("name" => "Body Background Image",
		"desc" => "Set the image to use for the background. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_body_background_image",
		"parent" => "body-bg-settings",
		"type" => "upload",
		"hint" => "Enter the full URL here (including http://), or click on \"Upload Image\"",
		"std" => ""),

	array("name" => "Body Background Image Tiling",
		"desc" => "Set how the background image should be tiled. This will define how the image will repeat on the background. " .
				"If you have chosen default styles above or not selected a background image then this setting will be ignored.",
		"id" => "suf_body_background_repeat",
		"parent" => "body-bg-settings",
		"type" => "radio",
		"options" => array("repeat" => "Repeat both horizontally and vertically (default)",
			"repeat-x" => "Repeat horizontally only",
			"repeat-y" => "Repeat vertically only",
			"no-repeat" => "Do not repeat - show background once only"),
		"std" => "repeat"),

	array("name" => "Background Image Scrolling",
		"desc" => "You can define your background image to either scroll with the rest of your content or stay fixed. " .
				"If you have chosen default styles above or not selected a background image then this setting will be ignored.",
		"id" => "suf_body_background_attachment",
		"parent" => "body-bg-settings",
		"type" => "radio",
		"options" => array("scroll" => "Let the background scroll with the rest of the page (default)",
			"fixed" => "Keep the background fixed"),
		"std" => "scroll"),

	array("name" => "Background Image Position",
		"desc" => "Set the position of the background image. " .
				"If you have chosen default styles above or not selected a background image then this setting will be ignored.",
		"id" => "suf_body_background_position",
		"parent" => "body-bg-settings",
		"type" => "radio",
		"options" => array("top left" => "Top left (default)",
			"top center" => "Top center",
			"top right" => "Top right",
			"center left" => "Center left",
			"center center" => "Middle of the page",
			"center right" => "Center right",
			"bottom left" => "Bottom left",
			"bottom center" => "Bottom center",
			"bottom right" => "Bottom right"),
		"std" => "top left"),

	array("name" => "Main Wrapper",
		"desc" => "Control the settings for the wrapper of the main content",
		"category" => "wrapper-bg-settings",
		"parent" => "skinning",
		"type" => "sub-section-3",),

	array("name" => "Default or custom?",
		"id" => "suf_wrapper_settings_def_cust",
		"type" => "radio",
		"parent" => "wrapper-bg-settings",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Main Wrapper Background",
		"desc" => "Setup the background of the main container in your page. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_wrapper_bg_settings",
		"parent" => "wrapper-bg-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => suffusion_evaluate_style("suf_wrapper_background_color", $suffusion_theme_name), "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Show Shadows",
		"desc" => "You can choose to drop a shadow for your page. Shadows look cool on light backgrounds and not so much on dark backgrounds.",
		"id" => "suf_show_shadows",
		"parent" => "wrapper-bg-settings",
		"type" => "radio",
		"options" => array("hide" => "Don't show a shadow", "show" => "Show shadow of the main window"),
		"std" => "hide"),

	array("name" => "Post Background",
		"desc" => "Control the settings for the post background",
		"category" => "post-bg-settings",
		"parent" => "skinning",
		"type" => "sub-section-3",),

	array("name" => "Default or custom?",
		"id" => "suf_post_bg_settings_def_cust",
		"type" => "radio",
		"parent" => "post-bg-settings",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Post Background",
		"desc" => "Setup the background of the post. If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_post_bg_settings",
		"parent" => "post-bg-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => suffusion_evaluate_style("suf_post_background_color", $suffusion_theme_name), "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "custom")),

	array("name" => "Typography",
		"type" => "sub-section-3",
		"category" => "body-font-styles",
		"parent" => "skinning"
	),

	array("name" => "Body Fonts",
		"desc" => "Change setting for the body",
		"category" => "typo-body",
		"parent" => "body-font-styles",
		"type" => "sub-section-4",),

	array("name" => "Default or custom font styles?",
		"desc" => "You can decide to go with the colors / text styles of the theme you are using, or choose your own. " .
				"If you choose default colors / text styles here then the rest of your settings in this section will be ignored. " .
				"If you choose custom styles then the settings you make here will override the theme's settings.",
		"id" => "suf_body_font_style_setting",
		"parent" => "body-font-styles",
		"grouping" => "typo-body",
		"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the fonts.",
		"type" => "radio",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Font Face",
		"desc" => "Pick a browser-safe font or a font from Google web-fonts",
		"id" => "suf_body_font_family",
		"parent" => "body-font-styles",
		"grouping" => "typo-body",
		"note" => "Note that the fonts may not render correctly here, depending on your OS / browser.",
		"type" => "select",
		"options" => $suffusion_safe_font_faces,
		"std" => "Arial, Helvetica, sans-serif"),

	array("name" => "Font Color",
		"desc" => "Set the color of the fonts being used. " .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_font_color",
		"parent" => "body-font-styles",
		"grouping" => "typo-body",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_font_color", $suffusion_theme_name)),

	array("name" => "Link Color",
		"desc" => "Set the color of the links in the main content. Font colors in the sidebar are unaffected" .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_link_color",
		"parent" => "body-font-styles",
		"grouping" => "typo-body",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_link_color", $suffusion_theme_name)),

	array("name" => "Link Decoration",
		"desc" => "Set the effects for the link text. If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_link_style",
		"parent" => "body-font-styles",
		"grouping" => "typo-body",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "none"),

	array("name" => "Visited Link Color",
		"id" => "suf_visited_link_color",
		"parent" => "body-font-styles",
		"grouping" => "typo-body",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_visited_link_color", $suffusion_theme_name)),

	array("name" => "Visited Link Decoration",
		"id" => "suf_visited_link_style",
		"parent" => "body-font-styles",
		"grouping" => "typo-body",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "none"),

	array("name" => "Link Hover Color",
		"id" => "suf_link_hover_color",
		"parent" => "body-font-styles",
		"grouping" => "typo-body",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_link_hover_color", $suffusion_theme_name)),

	array("name" => "Link Hover Decoration",
		"desc" => "Set the effects for the link text on which you are hovering. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_link_hover_style",
		"parent" => "body-font-styles",
		"grouping" => "typo-body",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "underline"),

	array("name" => "Main Content",
		"desc" => "Change settings for the main content",
		"category" => "typo-main",
		"parent" => "body-font-styles",
		"type" => "sub-section-4",),

	array("name" => "Default or custom font styles?",
		"desc" => "Override skin defaults",
		"id" => "suf_main_font_style_setting",
		"parent" => "body-font-styles",
		"grouping" => "typo-main",
		"type" => "checkbox",
		"std" => ""),

	array("name" => "Font Settings",
		"id" => "suf_main_font_size",
		"parent" => "body-font-styles",
		"grouping" => "typo-main",
		"type" => "font",
		"options" => array(),
		"exclude" => array('font-weight', 'font-variant', 'font-style', 'font-face', 'font-color'),
		"std" => array("font-size" => "14", "font-size-type" => "px")),

	array("name" => "Post and Page Titles",
		"desc" => "Change settings for the main content",
		"category" => "typo-titles",
		"parent" => "body-font-styles",
		"type" => "sub-section-4",),

	array("name" => "Default or custom font styles?",
		"desc" => "Override skin defaults",
		"id" => "suf_title_font_style_setting",
		"parent" => "body-font-styles",
		"grouping" => "typo-titles",
		"type" => "checkbox",
		"std" => ""),

	array("name" => "Unlinked post titles",
		"id" => "suf_post_title_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-titles",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "28", "font-size-type" => "px")),

	array("name" => "Linked post titles",
		"id" => "suf_post_title_link_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-titles",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "28", "font-size-type" => "px")),

	array("name" => "Link Hover Settings",
		"id" => "suf_post_title_link_hover_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-titles",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "28", "font-size-type" => "px")),

	array("name" => "Content headers",
		"desc" => "Change settings for the content headers, h1, h2, ... h6",
		"category" => "typo-headers",
		"parent" => "body-font-styles",
		"type" => "sub-section-4",),

	array("name" => "Default or custom font styles?",
		"desc" => "Override skin defaults",
		"id" => "suf_header_font_setting",
		"parent" => "body-font-styles",
		"grouping" => "typo-headers",
		"type" => "checkbox",
		"std" => ""),

	array("name" => "H1 Font Settings",
		"id" => "suf_post_h1_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-headers",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "28", "font-size-type" => "px")),

	array("name" => "H2 Font Settings",
		"id" => "suf_post_h2_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-headers",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "26", "font-size-type" => "px")),

	array("name" => "H3 Font Settings",
		"id" => "suf_post_h3_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-headers",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "23", "font-size-type" => "px")),

	array("name" => "H4 Font Settings",
		"id" => "suf_post_h4_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-headers",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "21", "font-size-type" => "px")),

	array("name" => "H5 Font Settings",
		"id" => "suf_post_h5_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-headers",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "19", "font-size-type" => "px")),

	array("name" => "H6 Font Settings",
		"id" => "suf_post_h6_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-headers",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "16", "font-size-type" => "px")),

	array("name" => "Comments",
		"desc" => "Change settings for comments",
		"category" => "typo-comments",
		"parent" => "body-font-styles",
		"type" => "sub-section-4",),

	array("name" => "Default or custom font styles?",
		"desc" => "Override skin defaults",
		"id" => "suf_comment_font_setting",
		"parent" => "body-font-styles",
		"grouping" => "typo-comments",
		"type" => "checkbox",
		"std" => ""),

	array("name" => "Comment form title",
		"id" => "suf_comment_header_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-headers",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "16", "font-size-type" => "px")),

	array("name" => "Comment Body",
		"id" => "suf_comment_body_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-headers",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "14", "font-size-type" => "px")),

	array("name" => "Footer",
		"desc" => "Change settings for the footer",
		"category" => "typo-footer",
		"parent" => "body-font-styles",
		"type" => "sub-section-4",),

	array("name" => "Default or custom font styles?",
		"desc" => "Override skin defaults",
		"id" => "suf_footer_font_setting",
		"parent" => "body-font-styles",
		"grouping" => "typo-footer",
		"type" => "checkbox",
		"std" => ""),

	array("name" => "Text",
		"id" => "suf_footer_text_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-footer",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "28", "font-size-type" => "px")),

	array("name" => "Links",
		"id" => "suf_footer_link_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-footer",
		"type" => "font",
		"options" => array(),
		"exclude" => array('font-size', 'font-size-type'),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal")),

	array("name" => "Link Hovering",
		"id" => "suf_footer_link_hover_font",
		"parent" => "body-font-styles",
		"grouping" => "typo-footer",
		"type" => "font",
		"options" => array(),
		"exclude" => array('font-size', 'font-size-type'),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal",)),

	array("name" => "Drop Caps",
		"category" => "typo-drop",
		"parent" => "body-font-styles",
		"type" => "sub-section-4",),

	array("name" => "Applicable post views",
		"desc" => "Set a \"Drop caps\" effect for the first letter in your content.",
		"id" => "suf_drop_cap_post_views",
		"parent" => "body-font-styles",
		"grouping" => "typo-drop",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_options_array("suf_drop_cap_post_views",
			array(
				'full-content' => 'Full content',
				'excerpt' => 'Excerpts',
				'suf-tile-text' => 'Tile layout',
				'suf-mag-excerpt-text' => 'Magazine tiles',
				'page' => 'Static pages',
			)),
		"std" => ""),

	array("name" => "Applicable post formats",
		"id" => "suf_drop_cap_post_formats",
		"parent" => "body-font-styles",
		"grouping" => "typo-drop",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_options_array("suf_drop_cap_post_formats",
			array(
				'standard' => 'Standard',
				'aside' => 'Aside',
				'status' => 'Status',
				'chat' => 'Chat',
				'link' => 'Link',
				'image' => 'Image',
				'gallery' => 'Gallery',
				'quote' => 'Quote',
				'audio' => 'Audio',
				'video' => 'Video',
			)),
		"std" => ""),

	array("name" => "Date Box",
		"desc" => "Control the settings for the date box on posts",
		"category" => "date-box-settings",
		"parent" => "skinning",
		"type" => "sub-section-3",),

	array("name" => "Hide date box?",
		"id" => "suf_date_box_show",
		"desc" => "If you don't want to show the date box on posts you can choose to hide it",
		"type" => "radio",
		"parent" => "date-box-settings",
		"options" => array("theme" => "Theme Default", "show" => "Show", "hide" => "Hide",
			"hide-search" => "Hide on search results. This is useful if your search returns a mix of pages and posts, because it makes the results look consistent (pages don't have a date box)",
		),
		"std" => "theme"),

	array("name" => "Default or custom?",
		"id" => "suf_date_box_settings_def_cust",
		"type" => "radio",
		"parent" => "date-box-settings",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Date Box",
		"desc" => "Setup the background of the date box. If you have chosen default styles above then this setting will be ignored. If you are setting your own image, make sure it is 48x48 px in size.",
		"id" => "suf_date_box_settings",
		"parent" => "date-box-settings",
		"type" => "background",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "image" => "", "trans" => "0",
			"position" => "top left", "repeat" => "repeat", "attachment" => "scroll", "colortype" => "transparent")),

	array("name" => "Month Font",
		"desc" => "Setup the font for the month to be displayed.",
		"id" => "suf_date_box_mfont",
		"parent" => "date-box-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "50", "font-size-type" => "%")),

	array("name" => "Date Font",
		"desc" => "Setup the font for the date to be displayed.",
		"id" => "suf_date_box_dfont",
		"parent" => "date-box-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "100", "font-size-type" => "%")),

	array("name" => "Year Font",
		"desc" => "Setup the font for the year to be displayed.",
		"id" => "suf_date_box_yfont",
		"parent" => "date-box-settings",
		"type" => "font",
		"options" => array(),
		"std" => array("color" => "#FFFFFF", "font-face" => "Arial, Helvetica, sans-serif", "font-weight" => "normal",
			"font-style" => "normal", "font-variant" => "normal", "font-size" => "50", "font-size-type" => "%")),

	array("name" => "Custom Emphasis Elements",
		"type" => "sub-section-3",
		"category" => "emphasis-setup",
		"parent" => "skinning"
	),

	array("name" => "Custom elements to enhance page appearance",
		"desc" => "Suffusion comes with predefined elements that you can use for emphasizing sections of your blog. There are four types defined
				<ul class='margin-20'>
					<li>Download - class='download'</li>
					<li>Announcement - class='announcement'</li>
					<li>Note - class='note'</li>
					<li>Warning - class='warning'</li>
				</ul>
				To use any of these elements you can enclose text on your blog within &lt;p&gt; and &lt;/p&gt; tags or &lt;div&gt; and &lt;/div&gt; tags with the class name:

				<ul class='margin-20'>
					<li>&lt;p class='download'&gt; Some stuff to download &lt;/p&gt; or &lt;div class='download'&gt;Some other stuff to download&lt;/div&gt;</li>
					<li>&lt;p class='announcement'&gt; Some announcements &lt;/p&gt; or &lt;div class='announcement'&gt;Some more announcements&lt;/div&gt;</li>
					<li>&lt;p class='note'&gt; Notes &lt;/p&gt; or &lt;div class='announcement'&gt;More notes&lt;/div&gt;</li>
					<li>&lt;p class='warning'&gt; Warnings &lt;/p&gt; or &lt;div class='warning'&gt;Other warnings&lt;/div&gt;</li>
				</ul>",
		"parent" => "emphasis-setup",
		"type" => "blurb",
	),

	array("name" => "Default styles for emphasis elements?",
		"desc" => "You can decide to go with the emphasis styles defined with the theme or pick your own. " .
				"If you choose custom styles then the settings you make here will override the theme's settings.",
		"id" => "suf_emphasis_customization",
		"parent" => "emphasis-setup",
		"type" => "radio",
		"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the emphasis eelements.",
		"options" => array("theme" => "Theme styles",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Download",
		"desc" => "Change setting for the download class",
		"category" => "emphasis-download",
		"parent" => "emphasis-setup",
		"type" => "sub-section-4",),

	array("name" => "Download Block Font Color",
		"desc" => "Set the font color for text within a \"download\" block. ",
		"id" => "suf_download_font_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-download",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_download_font_color", $suffusion_theme_name)),

	array("name" => "Download Block Background Color",
		"desc" => "Set the background color for a \"download\" block. ",
		"id" => "suf_download_background_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-download",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_download_background_color", $suffusion_theme_name)),

	array("name" => "Download Block Border Color",
		"desc" => "Set the border color for a \"download\" block. ",
		"id" => "suf_download_border_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-download",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_download_border_color", $suffusion_theme_name)),

	array("name" => "Announcement",
		"desc" => "Change setting for the announcement class",
		"category" => "emphasis-announcement",
		"parent" => "emphasis-setup",
		"type" => "sub-section-4",),

	array("name" => "Announcement Block Font Color",
		"desc" => "Set the font color for text within a \"announcement\" block. ",
		"id" => "suf_announcement_font_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-announcement",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_announcement_font_color", $suffusion_theme_name)),

	array("name" => "Announcement Block Background Color",
		"desc" => "Set the background color for a \"announcement\" block. ",
		"id" => "suf_announcement_background_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-announcement",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_announcement_background_color", $suffusion_theme_name)),

	array("name" => "Announcement Block Border Color",
		"desc" => "Set the border color for a \"announcement\" block. ",
		"id" => "suf_announcement_border_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-announcement",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_announcement_border_color", $suffusion_theme_name)),

	array("name" => "Note",
		"desc" => "Change setting for the note class",
		"category" => "emphasis-note",
		"parent" => "emphasis-setup",
		"type" => "sub-section-4",),

	array("name" => "Note Block Font Color",
		"desc" => "Set the font color for text within a \"note\" block. ",
		"id" => "suf_note_font_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-note",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_note_font_color", $suffusion_theme_name)),

	array("name" => "Note Block Background Color",
		"desc" => "Set the background color for a \"note\" block. ",
		"id" => "suf_note_background_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-note",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_note_background_color", $suffusion_theme_name)),

	array("name" => "Note Block Border Color",
		"desc" => "Set the border color for a \"note\" block. ",
		"id" => "suf_note_border_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-note",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_note_border_color", $suffusion_theme_name)),

	array("name" => "Warning",
		"desc" => "Change setting for the warning class",
		"category" => "emphasis-warning",
		"parent" => "emphasis-setup",
		"type" => "sub-section-4",),

	array("name" => "Warning Block Font Color",
		"desc" => "Set the font color for text within a \"warning\" block. ",
		"id" => "suf_warning_font_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-warning",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_warning_font_color", $suffusion_theme_name)),

	array("name" => "Warning Block Background Color",
		"desc" => "Set the background color for a \"warning\" block. ",
		"id" => "suf_warning_background_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-warning",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_warning_background_color", $suffusion_theme_name)),

	array("name" => "Warning Block Border Color",
		"desc" => "Set the border color for a \"warning\" block. ",
		"id" => "suf_warning_border_color",
		"parent" => "emphasis-setup",
		"grouping" => "emphasis-warning",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_warning_border_color", $suffusion_theme_name)),

);
?>