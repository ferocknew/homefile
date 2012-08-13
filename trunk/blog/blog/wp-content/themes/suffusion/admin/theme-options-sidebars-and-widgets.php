<?php
/**
 * Lists out all the options from the Sidebar Configuration Section of the theme options
 * This file is included in functions.php
 *
 * @package Suffusion
 * @subpackage Admin
 */

global $suffusion_theme_name, $suffusion_sidebar_tabs;
$suffusion_sidebars_and_widgets_options = array(
	// Main category for Look and Feel settings
	array("name" => "Sidebars",
		"type" => "sub-section-2",
		"category" => "sidebar-setup",
		"help" => "In this section you can configure each of the sidebars available with the theme. There are 14 dynamic sidebars with pre-defined positions, 5 \"ad hoc\"
			sidebars that you can position inside your posts and one static tabbed sidebar that you can put on the left or right of your content.
			<br /><b>Version Info: </b> In version 3.7.3 and earlier, this section used to be called \"Sidebars and Widgets\".",
		"parent" => "root"
	),

	array("name" => "Sidebar Layout",
		"type" => "sub-section-3",
		"category" => "sidebar-layout",
		"parent" => "sidebar-setup"
	),

	array("name" => "Sidebar Layout",
		"desc" => "Suffusion comes with eight widget areas where you can add widgets. You may choose to not use some of these widget areas depending on your requirements.
				By default Sidebar 1 and Right Header Widgets are enabled.<br />
				<div style='text-align: center; display:block;'><img src='" . get_template_directory_uri() . "/admin/images/widgets.jpg' alt='Widgets'/></div>
				In addition you have a set of <strong>ad-hoc widget</strong> areas that can be invoked in your posts/pages using the short code [suffusion-widgets id='x']
				where x is a number from 1 to 5.<br />
				There is also a <strong>Static Tabbed Sidebar</strong> which comes bundled with pre-defined widgets. You can display that on the left or right.",
		"parent" => "sidebar-layout",
		"type" => "blurb",
	),

	array("name" => "How Many Sidebars?",
		"desc" => "Control how many sidebars you want.",
		"parent" => "sidebar-layout",
		"category" => "how-many-sb",
		"type" => "sub-section-4"),

	array("name" => "Default Views",
		"desc" => "The theme is set up with one sidebar (a two-column theme) by default. You could choose to have two sidebars (a three-column theme) or none if you want.
			Unless otherwise overridden in the subsequent options, this will be applied to your entire blog.",
		"id" => "suf_sidebar_count",
		"parent" => "sidebar-layout",
		"grouping" => "how-many-sb",
		"type" => "radio",
		"options" => array("0" => "0 (Zero)", "1" => "1 (One)", "2" => "2 (Two)"),
		"std" => "1"),

	array("name" => "Blog Page",
		"desc" => "The \"Blog\" page (set in <em>Settings &rarr; Reading</em>) will inherit the default number of sidebars. You can change this behavior:",
		"id" => "suf_blog_sidebar_count",
		"parent" => "sidebar-layout",
		"grouping" => "how-many-sb",
		"type" => "radio",
		"options" => array("default" => "Inherit default number of sidebars", "0" => "0 (Zero) - Will inherit settings of the \"No Sidebars\" template",
			"1l" => "Single Left - Will inherit settings of the \"Single Left Sidebar\" template", "1r" => "Single Right - Will inherit settings of the \"Single Right Sidebar\" template",
			"1l1r" => "Single Left, Single Right - Will inherit settings of the \"Single Left and Single Right Sidebar\" template",
			"2l" => "Double Left - Will inherit settings of the \"Double Left Sidebars\" template", "2r" => "Double Right - Will inherit settings of the \"Double Right Sidebars\" template", ),
		"std" => "default"),

	array("name" => "Category Views",
		"desc" => "A page displaying posts in a category will inherit the default number of sidebars. You can change this behavior:",
		"id" => "suf_category_sidebar_count",
		"parent" => "sidebar-layout",
		"grouping" => "how-many-sb",
		"type" => "radio",
		"options" => array("default" => "Inherit default number of sidebars", "0" => "0 (Zero) - Will inherit settings of the \"No Sidebars\" template",
			"1l" => "Single Left - Will inherit settings of the \"Single Left Sidebar\" template", "1r" => "Single Right - Will inherit settings of the \"Single Right Sidebar\" template",
			"1l1r" => "Single Left, Single Right - Will inherit settings of the \"Single Left and Single Right Sidebar\" template",
			"2l" => "Double Left - Will inherit settings of the \"Double Left Sidebars\" template", "2r" => "Double Right - Will inherit settings of the \"Double Right Sidebars\" template", ),
		"std" => "default"),

	array("name" => "Tag Views",
		"desc" => "A page displaying posts in a tag will inherit the default number of sidebars. You can change this behavior:",
		"id" => "suf_tag_sidebar_count",
		"parent" => "sidebar-layout",
		"grouping" => "how-many-sb",
		"type" => "radio",
		"options" => array("default" => "Inherit default number of sidebars", "0" => "0 (Zero) - Will inherit settings of the \"No Sidebars\" template",
			"1l" => "Single Left - Will inherit settings of the \"Single Left Sidebar\" template", "1r" => "Single Right - Will inherit settings of the \"Single Right Sidebar\" template",
			"1l1r" => "Single Left, Single Right - Will inherit settings of the \"Single Left and Single Right Sidebar\" template",
			"2l" => "Double Left - Will inherit settings of the \"Double Left Sidebars\" template", "2r" => "Double Right - Will inherit settings of the \"Double Right Sidebars\" template", ),
		"std" => "default"),

	array("name" => "Author Views",
		"desc" => "A page displaying posts in a tag will inherit the default number of sidebars. You can change this behavior:",
		"id" => "suf_author_sidebar_count",
		"parent" => "sidebar-layout",
		"grouping" => "how-many-sb",
		"type" => "radio",
		"options" => array("default" => "Inherit default number of sidebars", "0" => "0 (Zero) - Will inherit settings of the \"No Sidebars\" template",
			"1l" => "Single Left - Will inherit settings of the \"Single Left Sidebar\" template", "1r" => "Single Right - Will inherit settings of the \"Single Right Sidebar\" template",
			"1l1r" => "Single Left, Single Right - Will inherit settings of the \"Single Left and Single Right Sidebar\" template",
			"2l" => "Double Left - Will inherit settings of the \"Double Left Sidebars\" template", "2r" => "Double Right - Will inherit settings of the \"Double Right Sidebars\" template", ),
		"std" => "default"),

	array("name" => "Date Archives",
		"desc" => "A page displaying posts in a date archive will inherit the default number of sidebars. You can change this behavior:",
		"id" => "suf_date_sidebar_count",
		"parent" => "sidebar-layout",
		"grouping" => "how-many-sb",
		"type" => "radio",
		"options" => array("default" => "Inherit default number of sidebars", "0" => "0 (Zero) - Will inherit settings of the \"No Sidebars\" template",
			"1l" => "Single Left - Will inherit settings of the \"Single Left Sidebar\" template", "1r" => "Single Right - Will inherit settings of the \"Single Right Sidebar\" template",
			"1l1r" => "Single Left, Single Right - Will inherit settings of the \"Single Left and Single Right Sidebar\" template",
			"2l" => "Double Left - Will inherit settings of the \"Double Left Sidebars\" template", "2r" => "Double Right - Will inherit settings of the \"Double Right Sidebars\" template", ),
		"std" => "default"),

	array("name" => "Search Results",
		"desc" => "A page displaying posts in a search results will inherit the default number of sidebars. You can change this behavior:",
		"id" => "suf_search_sidebar_count",
		"parent" => "sidebar-layout",
		"grouping" => "how-many-sb",
		"type" => "radio",
		"options" => array("default" => "Inherit default number of sidebars", "0" => "0 (Zero) - Will inherit settings of the \"No Sidebars\" template",
			"1l" => "Single Left - Will inherit settings of the \"Single Left Sidebar\" template", "1r" => "Single Right - Will inherit settings of the \"Single Right Sidebar\" template",
			"1l1r" => "Single Left, Single Right - Will inherit settings of the \"Single Left and Single Right Sidebar\" template",
			"2l" => "Double Left - Will inherit settings of the \"Double Left Sidebars\" template", "2r" => "Double Right - Will inherit settings of the \"Double Right Sidebars\" template", ),
		"std" => "default"),

	array("name" => "Use JQuery Masonry?",
		"desc" => "You can use JQuery Masonry to adjust the layout of the widget areas in the header and footer. Play with this setting if you don't like how your widgets are displaying.",
		"id" => "suf_jq_masonry_enabled",
		"parent" => "sidebar-layout",
		"type" => "radio",
		"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
		"std" => "disabled"),

	array("name" => "Top Bar Right Widgets",
		"category" => "sidebar-setup-tbrh",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Style of \"Top Bar Right Widgets\" widget area",
		"desc" => "The \"Top Bar Right Widgets\" can either be constrained to a small area or be expanded as a sliding panel:",
		"id" => "suf_wa_tbrh_style",
		"parent" => "sidebar-setup-tbrh",
		"type" => "radio",
		"options" => array("tiny" => "Show widgets in a tiny widget area",
			"sliding-panel" => "Show widgets in a sliding panel, unstyled",
			"spanel-flat" => "Show widgets in a sliding panel, flat",
			"spanel-boxed" => "Show widgets in a sliding panel, boxed"),
		"std" => "tiny"),

	array("name" => "Title styling of widgets in \"Top Bar Right Widgets\" area",
		"desc" => "If you are displaying widgets in a sliding panel, boxed, you can choose a plain style for the titles of the widgets above the footer or something that goes with the color scheme.",
		"id" => "suf_header_for_trbh",
		"parent" => "sidebar-setup-tbrh",
		"type" => "radio",
		"options" => array("plain" => "Plain title with lower border (unstyled - white for the light themes and black for the dark themes) - Default",
			"plain-borderless" => "Plain title without lower border (unstyled - white for the light themes and black for the dark themes)",
			"scheme" => "Theme-based title (green, gray, blue, red, orange or purple, depending on the selected theme)"),
		"std" => "plain"),

	array("name" => "Sliding Panel \"Open\" text",
		"desc" => "What do you want the sliding panel button to say for opening the panel?",
		"id" => "suf_wa_tbrh_open_text",
		"parent" => "sidebar-setup-tbrh",
		"type" => "text",
		"std" => "Open"),

	array("name" => "Sliding Panel \"Close\" text",
		"desc" => "What do you want the sliding panel button to say for opening the panel?",
		"id" => "suf_wa_tbrh_close_text",
		"parent" => "sidebar-setup-tbrh",
		"type" => "text",
		"std" => "Close"),

	array("name" => "Columns in \"Top Bar Right Widgets\"",
		"desc" => "How many columns of widgets do you want in this widget area? This is applicable only if this particular widget area is a sliding panel.",
		"id" => "suf_wa_tbrh_columns",
		"parent" => "sidebar-setup-tbrh",
		"type" => "select",
		"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
		"std" => "3"),

	array("name" => "Sliding Panel Color",
		"desc" => "Set the color of the sliding panel",
		"id" => "suf_wa_tbrh_panel_color",
		"parent" => "sidebar-setup-tbrh",
		"type" => "color-picker",
		"std" => '#040D0F'),

	array("name" => "Sliding Panel Border",
		"desc" => "Set the color of the sliding panel's border",
		"id" => "suf_wa_tbrh_panel_border_color",
		"parent" => "sidebar-setup-tbrh",
		"type" => "color-picker",
		"std" => '#222222'),

	array("name" => "Sliding Panel Font Color",
		"desc" => "Set the color of the sliding panel's text",
		"id" => "suf_wa_tbrh_panel_font_color",
		"parent" => "sidebar-setup-tbrh",
		"type" => "color-picker",
		"std" => '#AAAAAA'),

	array("name" => "Widgets Above Header",
		"desc" => "Control the settings of the widget area above header",
		"category" => "sidebar-setup-wah",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Columns in Widgets Above Header",
		"desc" => "How many columns of widgets do you want in this widget area? For banner ads etc you might want to leave it at one.",
		"id" => "suf_wah_columns",
		"parent" => "sidebar-setup-wah",
		"type" => "select",
		"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
		"std" => "1"),

	array("name" => "Layout Style for widget area",
		"desc" => "You can choose different layout widths - full width or page width:",
		"id" => "suf_wah_layout_style",
		"parent" => "sidebar-setup-wah",
		"type" => "radio",
		"options" => array("full-full" => "Widget area is as wide as your browser window and its contents are aligned with your browser window",
			"full-align" => "Widget area is as wide as your browser window and its contents are aligned with your main contents",
			"align" => "Widget area and its contents are aligned with your main contents"),
		"std" => "full-align"),

	array("name" => "Widgets In Header",
		"desc" => "Control the settings of the widget area in header",
		"category" => "sidebar-setup-wih",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Columns in Widgets in Header",
		"desc" => "How many columns of widgets do you want in this widget area? For banner ads etc you might want to leave it at one. If you are removing the sidebars then you might want to set a value like 3 or 4.",
		"id" => "suf_wih_columns",
		"parent" => "sidebar-setup-wih",
		"type" => "select",
		"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
		"std" => "1"),

	array("name" => "Width of Widget Area in Header",
		"desc" => "Please enter the width in pixels. <b>Do not enter px.</b> Note that this is a fixed width theme, not a fluid theme.
			What this means is that you cannot specify things like 80% as the width. ",
		"id" => "suf_wih_width",
		"parent" => "sidebar-setup-wih",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored. Incompatible values will be treated as 300",
		"std" => "300"),

	array("name" => "Right Header Widgets",
		"desc" => "Control the settings of the Right Header Widgets",
		"category" => "sidebar-setup-rhw",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Show Search in Widget Area on right side of header",
		"desc" => "By default the search field is shown in the navigation bar. If you prefer having the search in your sidebar instead, you can disable this.
				Note that even if you choose to hide the search field here, if you add a search widget through the widget administration to this widget area.
				This option has been left in for backward compatibility.",
		"id" => "suf_show_search",
		"parent" => "sidebar-setup-rhw",
		"type" => "radio",
		"options" => array("show" => "Show search with navigation (default)",
			"hide" => "Hide the search (You can add a widget for the Search, if you wish)"),
		"std" => "show"),

	array("name" => "Sidebar 1",
		"desc" => "Control the settings of your first sidebar",
		"category" => "sidebar-setup-sidebar-1",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Position of First Sidebar",
		"desc" => "Which side would you like your first sidebar? " .
				"If you have two sidebars enabled and both are positioned on the same side, this sidebar will be the outer one. " .
				"If you have only one sidebar enabled, this will control the position of that sidebar.",
		"id" => "suf_sidebar_alignment",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "radio",
		"options" => array("left" => "Left", "right" => "Right"),
		"std" => "right"),

	array("name" => "Style of first sidebar",
		"desc" => "Your sidebar can have widgets displayed in individual boxes or as a flattened list of widgets. Having widgets as boxes lets you use drag and drop.",
		"id" => "suf_wa_sb1_style",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "radio",
		"options" => array("boxed" => "Show widgets in individual boxes",
			"flattened" => "Flatten the sidebar (no boxes for individual widgets)",
			"tabbed" => "Tabbed Sidebar (Needs ALL your widgets in this sidebar to have a title! Some third party widgets don't use the standard WP way of writing widgets. They will not work!)"),
		"std" => "boxed"),

	array("name" => "Default widgets for first sidebar",
		"desc" => "If you have not added any widgets to the first sidebar in the widget administration section of your control panel and your sidebar is not tabbed, Suffusion shows a set of default widgets. You can disable this if you please: ",
		"id" => "suf_sidebar_1_def_widgets",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "radio",
		"options" => array("show" => "Show default widgets if nothing is added in the widget control panel (default)",
			"hide" => "Hide default widgets if nothing is added in the widget control panel"),
		"std" => "show"),

	array("name" => "Drag-and-Drop for First Sidebar",
		"desc" => "By default drag-and-drop is enabled for the widgets in the first sidebar. You can turn it off, if you please.",
		"id" => "suf_sidebar_1_dnd",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "radio",
		"options" => array("enabled" => "Enable drag-and-drop (default)", "disabled" => "Disable drag-and-drop (this will also disable the collapsibility of the widgets)"),
		"std" => "disabled"),

	array("name" => "Expand / Collapse for First Sidebar Widgets",
		"desc" => "By default expand/collapse is enabled for the widgets in the first sidebar. You can turn it off, if you please. " .
				"This setting is ignored if you have disabled drag-and-drop for the first sidebar.",
		"id" => "suf_sidebar_1_expcoll",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "radio",
		"options" => array("enabled" => "Enable expand / collapse (default)", "disabled" => "Disable expand / collapse"),
		"std" => "enabled"),

	array("name" => "Sidebar Widgets Titles",
		"desc" => "You can choose a plain style for the headers of the sidebar widgets, or something that goes with the color scheme. Note that text widgets without a title will not display a header.",
		"id" => "suf_sidebar_header",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "radio",
		"options" => array("plain" => "Plain sidebar header with lower border (unstyled - white for the light themes and black for the dark themes)",
			"plain-borderless" => "Plain sidebar header without lower border (unstyled - white for the light themes and black for the dark themes)",
			"scheme" => "Theme-based sidebar header (green, gray, blue, red, orange or purple, depending on the selected theme)"),
		"std" => "plain"),

	array("name" => "Default or custom font styles for sidebar?",
		"desc" => "You can decide to go with the colors / text styles of the theme you are using, or choose your own. " .
				"If you choose default colors / text styles here then the subsequent settings in this section will be ignored. " .
				"If you choose custom styles then the settings you make here will override the theme's settings.",
		"id" => "suf_sb_font_style_setting",
		"parent" => "sidebar-setup-sidebar-1",
		"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the sidebar fonts.",
		"type" => "radio",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Sidebar Font Color",
		"desc" => "Set the color of the fonts being used. " .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_sb_font_color",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_sb_font_color", $suffusion_theme_name)),

	array("name" => "Sidebar Link Color",
		"desc" => "Set the color of the links in the sidebar. Font colors in the main content are unaffected" .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_sb_link_color",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_sb_link_color", $suffusion_theme_name)),

	array("name" => "Sidebar Link Decoration",
		"desc" => "Set the effects for the link text in the sidebar. If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_sb_link_style",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "none"),

	array("name" => "Sidebar Visited Link Color",
		"desc" => "Set the color of the visited links in the sidebar. Font colors in the main content are unaffected" .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_sb_visited_link_color",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_sb_visited_link_color", $suffusion_theme_name)),

	array("name" => "Sidebar Visited Link Decoration",
		"desc" => "Set the effects for the visited link text. If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_sb_visited_link_style",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "none"),

	array("name" => "Sidebar Link Hover Color",
		"desc" => "Set the color that the links should become when you hover over them in the sidebar. Font colors in the main content are unaffected" .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_sb_link_hover_color",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_sb_link_hover_color", $suffusion_theme_name)),

	array("name" => "Sidebar Link Hover Decoration",
		"desc" => "Set the effects for the link text on which you are hovering. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_sb_link_hover_style",
		"parent" => "sidebar-setup-sidebar-1",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "underline"),

	array("name" => "Sidebar 1 (Bottom)",
		"desc" => "Control the settings of your lower first sidebar",
		"category" => "sidebar-setup-sidebar-1-b",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Style of lower first sidebar",
		"desc" => "Your sidebar can have widgets displayed in individual boxes or as a flattened list of widgets. Having widgets as boxes lets you use drag and drop.",
		"id" => "suf_wa_sb1b_style",
		"parent" => "sidebar-setup-sidebar-1-b",
		"type" => "radio",
		"options" => array("boxed" => "Show widgets in individual boxes",
			"flattened" => "Flatten the sidebar (no boxes for individual widgets)",
			"tabbed" => "Tabbed Sidebar (Needs ALL your widgets in this sidebar to have a title! Some third party widgets don't use the standard WP way of writing widgets. They will not work!)"),
		"std" => "boxed"),

	array("name" => "Sidebar 2",
		"desc" => "Control the settings of your second sidebar",
		"category" => "sidebar-setup-sidebar-2",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Position of Second Sidebar",
		"desc" => "Which side would you like your second sidebar? " .
				"If you have two sidebars enabled and both are positioned on the same side, this sidebar will be the inner one. " .
				"If you have only one sidebar enabled, this setting will be ignored.",
		"id" => "suf_sidebar_2_alignment",
		"parent" => "sidebar-setup-sidebar-2",
		"type" => "radio",
		"options" => array("left" => "Left", "right" => "Right"),
		"std" => "right"),

	array("name" => "Style of second sidebar",
		"desc" => "Your sidebar can have widgets displayed in individual boxes or as a flattened list of widgets. Having widgets as boxes lets you use drag and drop.",
		"id" => "suf_wa_sb2_style",
		"parent" => "sidebar-setup-sidebar-2",
		"type" => "radio",
		"options" => array("boxed" => "Show widgets in individual boxes",
			"flattened" => "Flatten the sidebar (no boxes for individual widgets)",
			"tabbed" => "Tabbed Sidebar (Needs ALL your widgets in this sidebar to have a title! Some third party widgets don't use the standard WP way of writing widgets. They will not work!)"),
		"std" => "boxed"),

	array("name" => "Drag-and-Drop for Second Sidebar",
		"desc" => "By default drag-and-drop is enabled for the second sidebar. You can turn it off, if you please. Note that this setting is ignored if you enable only one sidebar",
		"id" => "suf_sidebar_2_dnd",
		"parent" => "sidebar-setup-sidebar-2",
		"type" => "radio",
		"options" => array("enabled" => "Enable drag-and-drop (default)", "disabled" => "Disable drag-and-drop (this will also disable the collapsibility of the widgets)"),
		"std" => "disabled"),

	array("name" => "Expand / Collapse for Second Sidebar Widgets",
		"desc" => "By default drag-and-drop is enabled for the widgets in the second sidebar. You can turn it off, if you please. " .
				"Note that this setting is ignored if you enable only one sidebar, or if you have disabled drag-and-drop for the second sidebar.",
		"id" => "suf_sidebar_2_expcoll",
		"parent" => "sidebar-setup-sidebar-2",
		"type" => "radio",
		"options" => array("enabled" => "Enable expand / collapse (default)", "disabled" => "Disable expand / collapse"),
		"std" => "enabled"),

	array("name" => "Sidebar 2 (Bottom)",
		"desc" => "Control the settings of your lower second sidebar",
		"category" => "sidebar-setup-sidebar-2-b",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Style of lower second sidebar",
		"desc" => "Your sidebar can have widgets displayed in individual boxes or as a flattened list of widgets. Having widgets as boxes lets you use drag and drop.",
		"id" => "suf_wa_sb2b_style",
		"parent" => "sidebar-setup-sidebar-2-b",
		"type" => "radio",
		"options" => array("boxed" => "Show widgets in individual boxes",
			"flattened" => "Flatten the sidebar (no boxes for individual widgets)",
			"tabbed" => "Tabbed Sidebar (Needs ALL your widgets in this sidebar to have a title! Some third party widgets don't use the standard WP way of writing widgets. They will not work!)"),
		"std" => "boxed"),

	array("name" => "Wide Sidebar (Top)",
		"desc" => "Control the settings of your upper wide sidebar. This sidebar is only shown if both your sidebars are on the same side.",
		"category" => "sidebar-setup-wst",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Style of wide sidebar (Top)",
		"desc" => "Your sidebar can have widgets displayed in individual boxes or as a flattened list of widgets. Having widgets as boxes lets you use drag and drop.",
		"id" => "suf_wa_wst_style",
		"parent" => "sidebar-setup-wst",
		"type" => "radio",
		"options" => array("boxed" => "Show widgets in individual boxes",
			"flattened" => "Flatten the sidebar (no boxes for individual widgets)",
			"tabbed" => "Tabbed Sidebar (Needs ALL your widgets in this sidebar to have a title! Some third party widgets don't use the standard WP way of writing widgets. They will not work!)"),
		"std" => "boxed"),

	array("name" => "Wide Sidebar (Bottom)",
		"desc" => "Control the settings of your lower wide sidebar. This sidebar is only shown if both your sidebars are on the same side.",
		"category" => "sidebar-setup-wsb",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Style of wide sidebar (Bottom)",
		"desc" => "Your sidebar can have widgets displayed in individual boxes or as a flattened list of widgets. Having widgets as boxes lets you use drag and drop.",
		"id" => "suf_wa_wsb_style",
		"parent" => "sidebar-setup-wsb",
		"type" => "radio",
		"options" => array("boxed" => "Show widgets in individual boxes",
			"flattened" => "Flatten the sidebar (no boxes for individual widgets)",
			"tabbed" => "Tabbed Sidebar (Needs ALL your widgets in this sidebar to have a title! Some third party widgets don't use the standard WP way of writing widgets. They will not work!)"),
		"std" => "boxed"),

	array("name" => "Widget Area Below Header",
		"desc" => "Control the settings of the widget area below header",
		"category" => "sidebar-setup-wabh",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Enable Widget Area Below Header?",
		"desc" => "This widget area spans the width of the blog page and can be positioned just below the header. Do you want it enabled?
				You can use this widget area for banner advertisements, if you wish. These widgets cannot be moved around in the manner that the sidebar widgets can.
				Note that even if you don't enable it you will see this in the widget administration menu.",
		"id" => "suf_widget_area_below_header_enabled",
		"parent" => "sidebar-setup-wabh",
		"type" => "radio",
		"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
		"std" => "disabled"),

	array("name" => "Columns in Widget Area Below Header",
		"desc" => "How many columns of widgets do you want in this widget area? For banner ads etc you might want to leave it at one. If you are removing the sidebars then you might want to set a value like 3 or 4.",
		"id" => "suf_widget_area_below_header_columns",
		"parent" => "sidebar-setup-wabh",
		"type" => "select",
		"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
		"std" => "1"),

	array("name" => "Style of widget area below header",
		"desc" => "Your sidebar can have widgets displayed in individual boxes or as a flattened list of widgets. Having widgets as boxes lets you use drag and drop.",
		"id" => "suf_wa_wabh_style",
		"parent" => "sidebar-setup-wabh",
		"type" => "radio",
		"options" => array("boxed" => "Show widgets in individual boxes",
			"flattened" => "Flatten the sidebar (no boxes for individual widgets)"),
		"std" => "boxed"),

	array("name" => "Title styling for widgets below header",
		"desc" => "You can choose a plain style for the titles of the widgets below the header, or something that goes with the color scheme. Note that text widgets without a title will not be affected by this.",
		"id" => "suf_header_for_widgets_below_header",
		"parent" => "sidebar-setup-wabh",
		"type" => "radio",
		"options" => array("plain" => "Plain title with lower border (unstyled - white for the light themes and black for the dark themes) - Default",
			"plain-borderless" => "Plain title without lower border (unstyled - white for the light themes and black for the dark themes)",
			"scheme" => "Theme-based title (green, gray, blue, red, orange or purple, depending on the selected theme)"),
		"std" => "plain"),

	array("name" => "Default or custom font styles for widget area below header?",
		"desc" => "You can decide to go with the colors / text styles of the theme you are using, or choose your own. " .
				"If you choose default colors / text styles here then the subsequent settings in this section will be ignored. " .
				"If you choose custom styles then the settings you make here will override the theme's settings.",
		"id" => "suf_wabh_font_style_setting",
		"parent" => "sidebar-setup-wabh",
		"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the fonts in the widget area below the header.",
		"type" => "radio",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Font Color for Widget Area Below Header",
		"desc" => "Set the color of the fonts being used. " .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_wabh_font_color",
		"parent" => "sidebar-setup-wabh",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_wabh_font_color", $suffusion_theme_name)),

	array("name" => "Link Color for Widget Area Below Header",
		"desc" => "Set the color of the links in the widgets. Font colors in the main content are unaffected" .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_wabh_link_color",
		"parent" => "sidebar-setup-wabh",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_wabh_link_color", $suffusion_theme_name)),

	array("name" => "Link Decoration for Widget Area Below Header",
		"desc" => "Set the effects for the link text in the widgets. If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_wabh_link_style",
		"parent" => "sidebar-setup-wabh",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "none"),

	array("name" => "Visited Link Color for Widget Area Below Header",
		"desc" => "Set the color of the visited links in the widgets. Font colors in the main content are unaffected" .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_wabh_visited_link_color",
		"parent" => "sidebar-setup-wabh",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_wabh_visited_link_color", $suffusion_theme_name)),

	array("name" => "Visited Link Decoration for Widget Area Below Header",
		"desc" => "Set the effects for the visited link text. If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_wabh_visited_link_style",
		"parent" => "sidebar-setup-wabh",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "none"),

	array("name" => "Link Hover Color for Widget Area Below Header",
		"desc" => "Set the color that the links should become when you hover over them in the widgets. Font colors in the main content are unaffected" .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_wabh_link_hover_color",
		"parent" => "sidebar-setup-wabh",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_wabh_link_hover_color", $suffusion_theme_name)),

	array("name" => "Link Hover Decoration for Widget Area Below Header",
		"desc" => "Set the effects for the link text on which you are hovering. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_wabh_link_hover_style",
		"parent" => "sidebar-setup-wabh",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "underline"),

	array("name" => "Widget Area Above Footer",
		"desc" => "Control the settings of the widget area above footer",
		"category" => "sidebar-setup-waaf",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Enable Widget Area Above Footer?",
		"desc" => "This widget area spans the width of the blog page and can be positioned just above the footer. Do you want it enabled?
				Note that even if you don't enable it you will see this in the widget administration menu.",
		"id" => "suf_widget_area_above_footer_enabled",
		"parent" => "sidebar-setup-waaf",
		"type" => "radio",
		"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
		"std" => "disabled"),

	array("name" => "Columns in Widget Area Above Footer",
		"desc" => "How many columns of widgets do you want in this widget area? For banner ads etc you might want to leave it at one. If you are removing the sidebars then you might want to set a value like 3 or 4.",
		"id" => "suf_widget_area_above_footer_columns",
		"parent" => "sidebar-setup-waaf",
		"type" => "select",
		"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
		"std" => "1"),

	array("name" => "Style of widget area above footer",
		"desc" => "Your sidebar can have widgets displayed in individual boxes or as a flattened list of widgets. Having widgets as boxes lets you use drag and drop.",
		"id" => "suf_wa_waaf_style",
		"parent" => "sidebar-setup-waaf",
		"type" => "radio",
		"options" => array("boxed" => "Show widgets in individual boxes",
			"flattened" => "Flatten the sidebar (no boxes for individual widgets)"),
		"std" => "boxed"),

	array("name" => "Title styling for widgets above footer",
		"desc" => "You can choose a plain style for the titles of the widgets above the footer, or something that goes with the color scheme. Note that text widgets without a title will not be affected by this.",
		"id" => "suf_header_for_widgets_above_footer",
		"parent" => "sidebar-setup-waaf",
		"type" => "radio",
		"options" => array("plain" => "Plain title with lower border (unstyled - white for the light themes and black for the dark themes) - Default",
			"plain-borderless" => "Plain title without lower border (unstyled - white for the light themes and black for the dark themes)",
			"scheme" => "Theme-based title (green, gray, blue, red, orange or purple, depending on the selected theme)"),
		"std" => "plain"),

	array("name" => "Default or custom font styles for widget area above footer?",
		"desc" => "You can decide to go with the colors / text styles of the theme you are using, or choose your own. " .
				"If you choose default colors / text styles here then the subsequent settings in this section will be ignored. " .
				"If you choose custom styles then the settings you make here will override the theme's settings.",
		"id" => "suf_waaf_font_style_setting",
		"parent" => "sidebar-setup-waaf",
		"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the widget area above the footer.",
		"type" => "radio",
		"options" => array("theme" => "Theme styles (default)",
			"custom" => "Custom styles"),
		"std" => "theme"),

	array("name" => "Font Color for Widget Area Above Footer",
		"desc" => "Set the color of the fonts being used. " .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_waaf_font_color",
		"parent" => "sidebar-setup-waaf",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_waaf_font_color", $suffusion_theme_name)),

	array("name" => "Link Color for Widget Area Above Footer",
		"desc" => "Set the color of the links in the widgets. Font colors in the main content are unaffected" .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_waaf_link_color",
		"parent" => "sidebar-setup-waaf",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_waaf_link_color", $suffusion_theme_name)),

	array("name" => "Link Decoration for Widget Area Above Footer",
		"desc" => "Set the effects for the link text in the widgets. If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_waaf_link_style",
		"parent" => "sidebar-setup-waaf",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "none"),

	array("name" => "Visited Link Color for Widget Area Above Footer",
		"desc" => "Set the color of the visited links in the widgets. Font colors in the main content are unaffected" .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_waaf_visited_link_color",
		"parent" => "sidebar-setup-waaf",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_waaf_visited_link_color", $suffusion_theme_name)),

	array("name" => "Visited Link Decoration for Widget Area Above Footer",
		"desc" => "Set the effects for the visited link text. If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_waaf_visited_link_style",
		"parent" => "sidebar-setup-waaf",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "none"),

	array("name" => "Link Hover Color for Widget Area Above Footer",
		"desc" => "Set the color that the links should become when you hover over them in the widgets. Font colors in the main content are unaffected" .
				"Make sure that your font color goes well enough with the theme. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_waaf_link_hover_color",
		"parent" => "sidebar-setup-waaf",
		"type" => "color-picker",
		"std" => suffusion_evaluate_style("suf_waaf_link_hover_color", $suffusion_theme_name)),

	array("name" => "Link Hover Decoration for Widget Area Above Footer",
		"desc" => "Set the effects for the link text on which you are hovering. " .
				"If you have chosen default styles above then this setting will be ignored.",
		"id" => "suf_waaf_link_hover_style",
		"parent" => "sidebar-setup-waaf",
		"type" => "radio",
		"options" => array("underline" => "Underlined", "none" => "None"),
		"std" => "underline"),

	array("name" => "Ad Hoc Widgets 1",
		"desc" => "Control the settings of Ad Hoc Widgets 1",
		"category" => "sidebar-setup-adhoc1",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Columns in Widget area",
		"desc" => "How many columns of widgets do you want in this widget area?",
		"id" => "suf_adhoc1_columns",
		"parent" => "sidebar-setup-adhoc1",
		"type" => "select",
		"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
		"std" => "1"),

	array("name" => "Ad Hoc Widgets 2",
		"desc" => "Control the settings of Ad Hoc Widgets 2",
		"category" => "sidebar-setup-adhoc2",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Columns in Widget area",
		"desc" => "How many columns of widgets do you want in this widget area?",
		"id" => "suf_adhoc2_columns",
		"parent" => "sidebar-setup-adhoc2",
		"type" => "select",
		"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
		"std" => "1"),

	array("name" => "Ad Hoc Widgets 3",
		"desc" => "Control the settings of Ad Hoc Widgets 3",
		"category" => "sidebar-setup-adhoc3",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Columns in Widget area",
		"desc" => "How many columns of widgets do you want in this widget area?",
		"id" => "suf_adhoc3_columns",
		"parent" => "sidebar-setup-adhoc3",
		"type" => "select",
		"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
		"std" => "1"),

	array("name" => "Ad Hoc Widgets 4",
		"desc" => "Control the settings of Ad Hoc Widgets 4",
		"category" => "sidebar-setup-adhoc4",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Columns in Widget area",
		"desc" => "How many columns of widgets do you want in this widget area?",
		"id" => "suf_adhoc4_columns",
		"parent" => "sidebar-setup-adhoc4",
		"type" => "select",
		"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
		"std" => "1"),

	array("name" => "Ad Hoc Widgets 5",
		"desc" => "Control the settings of Ad Hoc Widgets 5",
		"category" => "sidebar-setup-adhoc5",
		"parent" => "sidebar-setup",
		"type" => "sub-section-3",),

	array("name" => "Columns in Widget area",
		"desc" => "How many columns of widgets do you want in this widget area?",
		"id" => "suf_adhoc5_columns",
		"parent" => "sidebar-setup-adhoc5",
		"type" => "select",
		"options" => array("1" => "1 (One) Column", "2" => "2 (Two) Columns", "3" => "3 (Three) Columns", "4" => "4 (Four) Columns", "5" => "5 (Five) Columns"),
		"std" => "1"),

	array("name" => "Static Tabbed Sidebar",
		"type" => "sub-section-3",
		"category" => "sbtab-settings",
		"parent" => "sidebar-setup"
	),

	array("name" => "Look and Feel",
		"desc" => "Control look and feel aspects of the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-lf",
		"type" => "sub-section-4",
	),

	array("name" => "Enable Tabbed Sidebar?",
		"desc" => "Tabbed Sidebars, a.k.a. Tabbed Widgets are used to represent multiple widgets in a single tabbed window.",
		"id" => "suf_sbtab_enabled",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-lf",
		"type" => "radio",
		"note" => "If you have chosen to have 0 sidebars in your \"Sidebars and Widget Areas\" setup, this setting is irrelevant.",
		"options" => array("enabled" => "Enable Tabbed Sidebar", "disabled" => "Do not enable the Tabbed Sidebar"),
		"std" => "disabled"),

	array("name" => "Alignment of Tabbed Sidebar",
		"desc" => "Which side do you want your tabbed sidebar? Note that you need to have at least one sidebar enabled on the side that you are selecting here, or the other side might be used. ",
		"id" => "suf_sbtab_alignment",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-lf",
		"type" => "radio",
		"options" => array("right" => "Right", "left" => "Left"),
		"std" => "right"),

	array("name" => "Contents of Tabbed Sidebar",
		"desc" => "You can pick what you want to show in the tabbed sidebar: ",
		"id" => "suf_sbtab_widgets",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-lf",
		"type" => "multi-select",
		"options" => $suffusion_sidebar_tabs,
		"std" => "",
	),

	array("name" => "Order of tabs in Tabbed Sidebar",
		"desc" => "You can define the order of the tabs in the tabbed sidebar: ",
		"id" => "suf_sbtab_widget_order",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-lf",
		"type" => "sortable-list",
		"std" => suffusion_tab_array_prepositions()),

	array("name" => "Categories",
		"desc" => "Control look and feel aspects of the Categories pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-cat",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Categories Title",
		"id" => "suf_sbtab_categories_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-cat",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['categories']['title']),

	array("name" => "Tabbed Sidebar - List categories hierarchically?",
		"desc" => "You can decide if you want to list your categories in a hierarchical manner: ",
		"id" => "suf_sbtab_categories_hierarchical",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-cat",
		"type" => "radio",
		"options" => array("hierarchical" => "Categories listed hierarchically",
			"flat" => "Categories listed flat"),
		"std" => "hierarchical"),

	array("name" => "Tabbed Sidebar - Show post count for each category?",
		"desc" => "You can display the number of posts in each category. Categories with 0 posts are excluded: ",
		"id" => "suf_sbtab_categories_post_count",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-cat",
		"type" => "radio",
		"options" => array("show" => "Show Post Count",
			"hide" => "Hide Post Count"),
		"std" => "hide"),

	array("name" => "Archives",
		"desc" => "Control look and feel aspects of the Archives pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-arch",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Archives Title",
		"id" => "suf_sbtab_archives_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-arch",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['archives']['title']),

	array("name" => "Tabbed Sidebar - Archive grouping",
		"desc" => "What kind of grouping do you want to display for your archives? ",
		"id" => "suf_sbtab_archives_type",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-arch",
		"type" => "radio",
		"options" => array("yearly" => "Yearly", "monthly" => "Monthly", "weekly" => "Weekly", "daily" => "Daily", "postbypost" => "Posts ordered by post date",
			"alpha" => "Posts ordered by post title"),
		"std" => "monthly"),

	array("name" => "Tabbed Sidebar - Archive list type",
		"desc" => "What kind of listing do you want for your archives? ",
		"id" => "suf_sbtab_archives_list_type",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-arch",
		"type" => "radio",
		"options" => array("html" => "A bullet list", "option" => "A dropdown list"),
		"std" => "html"),

	array("name" => "Tabbed Sidebar - Show post count for each archive?",
		"desc" => "You can display the number of posts in each archive. Archives with 0 posts are excluded: ",
		"id" => "suf_sbtab_archives_post_count",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-arch",
		"type" => "radio",
		"options" => array("show" => "Show Post Count",
			"hide" => "Hide Post Count"),
		"std" => "hide"),

	array("name" => "Links",
		"desc" => "Control look and feel aspects of the Links pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-links",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Links Title",
		"id" => "suf_sbtab_Links_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-links",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['Links']['title']),

	array("name" => "Meta",
		"desc" => "Control look and feel aspects of the Meta pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-meta",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Meta Title",
		"id" => "suf_sbtab_meta_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-meta",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['meta']['title']),

	array("name" => "Pages",
		"desc" => "Control look and feel aspects of the Pages pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-pages",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Pages Title",
		"id" => "suf_sbtab_pages_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-pages",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['pages']['title']),

	array("name" => "Recent Comments",
		"desc" => "Control look and feel aspects of the Recent Comments pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-rc",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Recent Comments Title",
		"id" => "suf_sbtab_recent_comments_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-rc",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['recent_comments']['title']),

	array("name" => "Recent Posts",
		"desc" => "Control look and feel aspects of the Recent Posts pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-rp",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Recent Posts Title",
		"id" => "suf_sbtab_recent_posts_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-rp",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['recent_posts']['title']),

	array("name" => "Search",
		"desc" => "Control look and feel aspects of the Search pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-search",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Search Title",
		"id" => "suf_sbtab_search_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-search",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['search']['title']),

	array("name" => "Tag Cloud",
		"desc" => "Control look and feel aspects of the Tag Cloud pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-tags",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Tag Cloud Title",
		"id" => "suf_sbtab_tag_cloud_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-tags",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['tag_cloud']['title']),

	array("name" => "Custom Tab 1",
		"desc" => "Control look and feel aspects of the Custom Tab 1 pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-ct1",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Custom Tab 1 Title",
		"id" => "suf_sbtab_custom_tab_1_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct1",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['custom_tab_1']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 1 Contents",
		"id" => "suf_sbtab_custom_tab_1_contents",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct1",
		"type" => "textarea",
		"std" => ""),

	array("name" => "Custom Tab 2",
		"desc" => "Control look and feel aspects of the Custom Tab 2 pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-ct2",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Custom Tab 2 Title",
		"id" => "suf_sbtab_custom_tab_2_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct2",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['custom_tab_2']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 2 Contents",
		"id" => "suf_sbtab_custom_tab_2_contents",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct2",
		"type" => "textarea",
		"std" => ""),

	array("name" => "Custom Tab 3",
		"desc" => "Control look and feel aspects of the Custom Tab 3 pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-ct3",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Custom Tab 3 Title",
		"id" => "suf_sbtab_custom_tab_3_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct3",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['custom_tab_3']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 3 Contents",
		"id" => "suf_sbtab_custom_tab_3_contents",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct3",
		"type" => "textarea",
		"std" => ""),

	array("name" => "Custom Tab 4",
		"desc" => "Control look and feel aspects of the Custom Tab 4 pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-ct4",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Custom Tab 4 Title",
		"id" => "suf_sbtab_custom_tab_4_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct4",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['custom_tab_4']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 4 Contents",
		"id" => "suf_sbtab_custom_tab_4_contents",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct4",
		"type" => "textarea",
		"std" => ""),

	array("name" => "Custom Tab 5",
		"desc" => "Control look and feel aspects of the Custom Tab 5 pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-ct5",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Custom Tab 5 Title",
		"id" => "suf_sbtab_custom_tab_5_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct5",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['custom_tab_5']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 5 Contents",
		"id" => "suf_sbtab_custom_tab_5_contents",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct5",
		"type" => "textarea",
		"std" => ""),

	array("name" => "Custom Tab 6",
		"desc" => "Control look and feel aspects of the Custom Tab 6 pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-ct6",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Custom Tab 6 Title",
		"id" => "suf_sbtab_custom_tab_6_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct6",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['custom_tab_6']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 6 Contents",
		"id" => "suf_sbtab_custom_tab_6_contents",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct6",
		"type" => "textarea",
		"std" => ""),

	array("name" => "Custom Tab 7",
		"desc" => "Control look and feel aspects of the Custom Tab 7 pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-ct7",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Custom Tab 7 Title",
		"id" => "suf_sbtab_custom_tab_7_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct7",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['custom_tab_7']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 7 Contents",
		"id" => "suf_sbtab_custom_tab_7_contents",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct7",
		"type" => "textarea",
		"std" => ""),

	array("name" => "Custom Tab 8",
		"desc" => "Control look and feel aspects of the Custom Tab 8 pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-ct8",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Custom Tab 8 Title",
		"id" => "suf_sbtab_custom_tab_8_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct8",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['custom_tab_8']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 8 Contents",
		"id" => "suf_sbtab_custom_tab_8_contents",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct8",
		"type" => "textarea",
		"std" => ""),

	array("name" => "Custom Tab 9",
		"desc" => "Control look and feel aspects of the Custom Tab 9 pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-ct9",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Custom Tab 9 Title",
		"id" => "suf_sbtab_custom_tab_9_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct9",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['custom_tab_9']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 9 Contents",
		"id" => "suf_sbtab_custom_tab_9_contents",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct9",
		"type" => "textarea",
		"std" => ""),

	array("name" => "Custom Tab 10",
		"desc" => "Control look and feel aspects of the Custom Tab 10 pseudo-widget in the tabbed sidebar here.",
		"parent" => "sbtab-settings",
		"category" => "sbtab-ct10",
		"type" => "sub-section-4",
	),

	array("name" => "Tabbed Sidebar - Custom Tab 10 Title",
		"id" => "suf_sbtab_custom_tab_10_title",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct10",
		"type" => "text",
		"std" => $suffusion_sidebar_tabs['custom_tab_10']['title']),

	array("name" => "Tabbed Sidebar - Custom Tab 10 Contents",
		"id" => "suf_sbtab_custom_tab_10_contents",
		"parent" => "sbtab-settings",
		"grouping" => "sbtab-ct10",
		"type" => "textarea",
		"std" => ""),
);
?>