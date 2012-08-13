<?php
/**
 * Lists out all the options from the Other Graphical Elements section of the theme options
 * This file is included in functions.php
 *
 * @package Suffusion
 * @subpackage Admin
 */

global $suffusion_theme_name;
$suffusion_visual_effects_options = array(
	// Main category for Look and Feel settings
	array("name" => "Other Graphical Elements",
		"type" => "sub-section-2",
		"category" => "visual-effects",
		"help" => "This section helps you pick and mix various graphical elements, like menus, featured content sliders etc.
			You can also pick different layouts, and set widths for different pages. <br /><b>Version Info: </b> In version 3.7.3 and earlier, options here were largely grouped under \"Visual Effects\". The following options from 3.7.3 have been moved to other sections:
			<table>
				<tr>
					<th>Option</th>
					<th>Now in Section</th>
				</tr>
				<tr>
					<td>Theme Selection</td>
					<td>Theme Skinning</td>
				</tr>
				<tr>
					<td>Theme Skinning</td>
					<td>Theme Skinning</td>
				</tr>
				<tr>
					<td>Custom Emphasis Elements</td>
					<td>Theme Skinning</td>
				</tr>
				<tr>
					<td>Header Customization</td>
					<td>Theme Skinning</td>
				</tr>
			</table>",
		"parent" => "root"
	),

	array("name" => "Favicon",
		"type" => "sub-section-3",
		"category" => "favicon-setup",
		"parent" => "visual-effects"
	),

	array("name" => "Favicons",
		"desc" => "As such you don't need the support of your theme to add a Favicon for your site.
				You can drop a file called favicon.ico in your root directory for it to be effective, though that method has its limitations.
				E.g. Your file has to be in an ICO format and must be called favicon.ico.",
		"parent" => "favicon-setup",
		"type" => "blurb",),

	array("name" => "Favicon Path",
		"desc" => "Set the image to be used as your Favicon. You can use a PNG, GIF, ICO or JPG file that is 16x16, 32x32 or 64x64 px in size.
				Note that older versions of Internet Explorer do not support PNG.
				See <a href='http://perishablepress.com/press/2007/10/17/everything-you-ever-wanted-to-know-about-favicons/'>this article</a> for a very comprehensive writeup on Favicons.",
		"id" => "suf_favicon_path",
		"parent" => "favicon-setup",
		"type" => "upload",
		"hint" => "Enter the full URL here (including http://), or click on \"Upload Image\"",
		"std" => ""),

	array("name" => "Navigation Bar Above Header",
		"type" => "sub-section-3",
		"category" => "navt-setup",
		"parent" => "visual-effects"
	),

	array("name" => "Look and Feel",
		"desc" => "Adjust the general look and feel options of the Navigation Bar",
		"category" => "navt-lf",
		"parent" => "navt-setup",
		"type" => "sub-section-4",),

	array("name" => "Basic Setup",
		"desc" => "You can define what you want to show in your navigation bar. The navigation bar contains two widget areas, 'Top Bar Left Widgets' and 'Top Bar Right Widgets' and a drop down menu.
				If you prefer having pages, categories and links listed in the sidebar, select \"Hidden\".",
		"id" => "suf_navt_contents",
		"parent" => "navt-setup",
		"grouping" => "navt-lf",
		"type" => "radio",
		"options" => array("pages" => "Drop-down menus and widget areas", "hide" => "Hidden (Default)"),
		"std" => "hide"),

	array("name" => "Navigation Bar Style",
		"desc" => "You can choose different navigation bar styles - full width or page width:",
		"id" => "suf_navt_bar_style",
		"parent" => "navt-setup",
		"grouping" => "navt-lf",
		"type" => "radio",
		"options" => array("full-full" => "Navigation bar is as wide as your browser window and contents of the bar begin from the left or right",
			"full-align" => "Navigation bar is as wide as your browser window and contents of the bar are aligned with your main page",
			"align" => "Navigation bar and its contents are aligned with your main page", "theme" => "Theme Default"),
		"std" => "theme"),

	array("name" => "Drop-down menu position",
		"desc" => "Where in the navigation bar do you want your drop-down menu?",
		"id" => "suf_navt_dd_pos",
		"parent" => "navt-setup",
		"grouping" => "navt-lf",
		"type" => "radio",
		"concept" => "halign",
		"options" => array("theme" => "Theme Default", "left" => "Left", "right" => "Right", "center" => "Center", ),
		"std" => "theme"),

	array("name" => "Menu Item Style",
		"desc" => "Control how your menu items look",
		"id" => "suf_navt_item_type",
		"parent" => "navt-setup",
		"grouping" => "navt-lf",
		"type" => "radio",
		"options" => array("tab" => "Show menu items as individual tabs", "continuous" => "Show menu items as a continuous list", "theme" => "Theme Default"),
		"std" => "theme"),

	array("name" => "Drop-down menu delay",
		"desc" => "You can set a delay for the drop-down menu in the navigation bar.",
		"id" => "suf_navt_delay",
		"parent" => "navt-setup",
		"grouping" => "navt-lf",
		"type" => "text",
		"hint" => "Leave blank for no delay",
		"std" => "500"),

	array("name" => "Fade effect for drop-down menu",
		"desc" => "There is a fade-in effect for the drop-down menu enabled by default. You can disable it",
		"id" => "suf_navt_effect",
		"parent" => "navt-setup",
		"grouping" => "navt-lf",
		"type" => "radio",
		"options" => array("none" => "No effects", "fade" => "Fade in the page"),
		"std" => "fade"),

	array("name" => "Show \"Home\" page?",
		"desc" => "You can show a link to your blog's home page. This could either be an icon or a text link. This setting is ignored if you are hiding your navigation bar.",
		"id" => "suf_navt_show_home",
		"parent" => "navt-setup",
		"grouping" => "navt-lf",
		"type" => "radio",
		"options" => array("none" => "Don't show a home link (default)", "text" => "Show a text link", "icon" => "Show an icon"),
		"std" => "none"),

	array("name" => "\"Home\" page text",
		"desc" => "If you have opted to show a text link above, you can set the text to show. The default is \"Home\".
				This setting is ignored if you are hiding your navigation bar or if you have chosen to not show a home link or to show a home icon.",
		"id" => "suf_navt_home_text",
		"parent" => "navt-setup",
		"grouping" => "navt-lf",
		"type" => "text",
		"std" => "Home"),

	array("name" => "Order of entities in navigation bar",
		"desc" => "You can define the order in which Pages, Categories and Links (Bookmarks) appear in the navigation bar: ",
		"id" => "suf_navt_entity_order",
		"parent" => "navt-setup",
		"grouping" => "navt-lf",
		"type" => "sortable-list",
		"std" => suffusion_entity_prepositions('nav')),

	array("name" => "Text Transformation for the Navigation Bar",
		"desc" => "By default all your page names are displayed with the first letter of each word capitalized in the navigation bar (except in IE 6, where it is unstyled). You can change this setting:",
		"id" => "suf_navt_text_transform",
		"parent" => "navt-setup",
		"grouping" => "navt-lf",
		"type" => "radio",
		"options" => array("uppercase" => "ALL UPPERCASE", "lowercase" => "all lowercase",
			"capitalize" => "Capitalize First Letter Of Each Word (default)", "none" => "No transformation"),
		"std" => "capitalize"),

	array("name" => "Pages in Navigation Bar",
		"desc" => "Control the display of pages in the navigation bar",
		"category" => "navt-pages",
		"parent" => "navt-setup",
		"type" => "sub-section-4",),

	array("name" => "Page listing style in the Navigation Bar",
		"desc" => "You can choose how to show pages in your navigation bar. By default a single tab for pages is shown in the navigation bar.",
		"id" => "suf_navt_pages_style",
		"parent" => "navt-setup",
		"grouping" => "navt-pages",
		"type" => "radio",
		"options" => array("flattened" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-page-flat.jpg' alt='Flattened'/><p>Show the top level pages in the navigation bar and their sub-pages in drop-downs</p></div>",
			"rolled-up" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-page-roll-up.jpg' alt='Flattened'/><p>Show a single tab called \"Pages\" (or whatever you want to call it) and build a drop-down under it (default)</p></div>"),
		"std" => "rolled-up"),

	array("name" => "\"Pages\" tab title",
		"desc" => "In the above option if you have chosen to show a single tab for pages and build a drop-down under it, you can set the title for that tab.
				This setting is ignored if you have chosen to display top level pages in the navigation bar.",
		"id" => "suf_navt_page_tab_title",
		"parent" => "navt-setup",
		"grouping" => "navt-pages",
		"type" => "text",
		"std" => "Pages"),

	array("name" => "\"Pages\" tab link",
		"desc" => "If you have a specific page that you want to go to upon clicking the Pages tab, set the full URL here.
				This setting is ignored if you have chosen to display top level pages in the navigation bar.",
		"id" => "suf_navt_page_tab_link",
		"parent" => "navt-setup",
		"grouping" => "navt-pages",
		"type" => "text",
		"hint" => "Enter the full URL, including http://",
		"std" => ""),

	array("name" => "Pages in Navigation Bar - All or Selected",
		"desc" => "Choose which pages you want to display in your navigation bar.",
		"id" => "suf_navt_pages_all_sel",
		"parent" => "navt-setup",
		"grouping" => "navt-pages",
		"type" => "radio",
		"options" => array("all" => "Include all, ignoring next option", "selected" => "Include selections from the next option",
			"exclude-all" => "Exclude all, ignoring next option", "exclude-selected" => "Exclude selections from the next option"),
		"std" => "exclude-all"),

	array("name" => "Select pages to show in Navigation Bar",
		"desc" => "If you have too many pages on your blog you might want to exclude some so that the navigation bar doesn't get ugly. Note that if your navigation bar is hidden, this setting is ignored. Also if you select a page whose parent is not selected, the child will NOT be displayed. All pages are excluded by default",
		"id" => "suf_navt_pages",
		"parent" => "navt-setup",
		"grouping" => "navt-pages",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_page_array(),
		"std" => ""),

	array("name" => "Categories in Navigation Bar",
		"desc" => "Control the display of categories in the navigation bar",
		"category" => "navt-cats",
		"parent" => "navt-setup",
		"type" => "sub-section-4",),

	array("name" => "Category listing style in Navigation Bar",
		"desc" => "You can choose how to show categories in your navigation bar. By default a single tab for categories is shown in the navigation bar.",
		"id" => "suf_navt_cat_style",
		"parent" => "navt-setup",
		"grouping" => "navt-cats",
		"type" => "radio",
		"options" => array("flattened" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-cat-flat.jpg' alt='Flattened'/><p>Show the top level categories in the navigation bar and their sub-pages in drop-downs</p></div>",
			"rolled-up" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-cat-roll-up.jpg' alt='Flattened'/><p>Show a single tab called \"Categories\" (or whatever you want to call it) and build a drop-down under it (default)</p></div>"),
		"std" => "rolled-up"),

	array("name" => "\"Categories\" tab title",
		"desc" => "In the above option if you have chosen to show a single tab for categories and build a drop-down under it, you can set the title for that tab.
				This setting is ignored if you have chosen to display top level categories in the navigation bar.",
		"id" => "suf_navt_cat_tab_title",
		"parent" => "navt-setup",
		"grouping" => "navt-cats",
		"type" => "text",
		"std" => "Categories"),

	array("name" => "\"Categories\" tab link",
		"desc" => "If you have a specific page that you want to go to upon clicking the Categories tab, set the full URL here.
				This setting is ignored if you have chosen to display top level categories in the navigation bar.",
		"id" => "suf_navt_cat_tab_link",
		"parent" => "navt-setup",
		"grouping" => "navt-cats",
		"type" => "text",
		"hint" => "Enter the full URL, including http://",
		"std" => ""),

	array("name" => "Categories in Navigation Bar - All or Selected",
		"desc" => "Choose which categories you want to display in your navigation bar.",
		"id" => "suf_navt_cats_all_sel",
		"parent" => "navt-setup",
		"grouping" => "navt-cats",
		"type" => "radio",
		"options" => array("all" => "Include all, ignoring next option", "selected" => "Include selections from the next option",
			"exclude-all" => "Exclude all, ignoring next option", "exclude-selected" => "Exclude selections from the next option"),
		"std" => "exclude-all"),

	array("name" => "Select categories to show in Navigation Bar",
		"desc" => "If you have too many categories on your blog you might want to exclude some so that the navigation bar doesn't get ugly. Note that if your navigation bar is hidden, this setting is ignored. Also if you select a category whose parent is not selected, the child will NOT be displayed.
				The exclusion is hierarchical, so if you exclude a parent category but include its child, neither the parent nor the child will show up in the dropdown. All categories are excluded by default. ",
		"id" => "suf_navt_cats",
		"parent" => "navt-setup",
		"grouping" => "navt-cats",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_category_array("suf_navt_cats"),
		'std' => ""),

	array("name" => "Links in Navigation Bar",
		"desc" => "Control the display of links in the navigation bar",
		"category" => "navt-links",
		"parent" => "navt-setup",
		"type" => "sub-section-4",),

	array("name" => "WordPress Link listing style in the Navigation Bar",
		"desc" => "You can choose how to show links in your navigation bar. By default a single tab for links is shown in the navigation bar.",
		"id" => "suf_navt_links_style",
		"parent" => "navt-setup",
		"grouping" => "navt-links",
		"type" => "radio",
		"options" => array("flattened" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-link-flat.jpg' alt='Flattened'/><p>Show the links in the navigation bar</p></div>",
			"rolled-up" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-link-roll-up.jpg' alt='Flattened'/><p>Show a single tab called \"Links\" (or whatever you want to call it) and build a drop-down under it</p></div>"),
		"std" => "rolled-up"),

	array("name" => "\"Links\" tab title",
		"desc" => "In the above option if you have chosen to show a single tab for WordPress links and build a drop-down under it, you can set the title for that tab.
				This setting is ignored if you have chosen to display individual links in the navigation bar.",
		"id" => "suf_navt_links_tab_title",
		"parent" => "navt-setup",
		"grouping" => "navt-links",
		"type" => "text",
		"std" => "Links"),

	array("name" => "\"Links\" tab link",
		"desc" => "If you have a specific page that you want to go to upon clicking the Links tab, set the full URL here.
				This setting is ignored if you have chosen to display top level links in the navigation bar.",
		"id" => "suf_navt_links_tab_link",
		"parent" => "navt-setup",
		"grouping" => "navt-links",
		"type" => "text",
		"hint" => "Enter the full URL, including http://",
		"std" => ""),

	array("name" => "Links in Navigation Bar - All or Selected",
		"desc" => "Choose which links you want to display",
		"id" => "suf_navt_links_all_sel",
		"parent" => "navt-setup",
		"grouping" => "navt-links",
		"type" => "radio",
		"options" => array("all" => "Include all, ignoring next option", "selected" => "Include selections from the next option",
			"exclude-all" => "Exclude all, ignoring next option", "exclude-selected" => "Exclude selections from the next option"),
		"std" => "selected"),

	array("name" => "Select links to show in Navigation Bar",
		"desc" => "If you have too many links on your blog you might want to exclude some so that the navigation bar doesn't get ugly.
				All links are excluded by default. ",
		"id" => "suf_navt_links",
		"parent" => "navt-setup",
		"grouping" => "navt-links",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_link_array("suf_navt_links"),
		"std" => '',
	),

	array("name" => "WP 3.0 Navigation Menus",
		"desc" => "Control the display of inbuilt navigation menus (WP 3.0 and higher)",
		"category" => "navt-3menu",
		"parent" => "navt-setup",
		"type" => "sub-section-4",),

	array("name" => "WP 3.0 Navigation Menus - All or Selected",
		"desc" => "You can decide if you want to show all menus or selected menus in the navigation bar.
			If you choose 'All' your settings in the next option will be ignored. Also note that if you have added a menu to the navigation bar through the WP 3.0 menu administration page, it will show up even if excluded here.
			Note that this option is different from choosing 'Select All' in the next option, because this guarantees that always all are displayed, while the next option only ensures that all selections at the time of setup are displayed",
		"id" => "suf_navt_menus_all_sel",
		"parent" => "navt-setup",
		"grouping" => "navt-3menu",
		"type" => "radio",
		"options" => array("all" => "All, ignoring next option", "selected" => "Selections from the next option"),
		"std" => "selected"),

	array("name" => "Select Menus to show",
		"desc" => "If you have too many menus on your blog you might want to exclude some so that the navigation bar doesn't get ugly.
			All menus are included by default. ",
		"id" => "suf_navt_menus",
		"parent" => "navt-setup",
		"grouping" => "navt-3menu",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_wp_menu_array("suf_navt_menus"),
		"std" => '',
	),

	array("name" => "Header",
		"type" => "sub-section-3",
		"category" => "header-setup",
		"parent" => "visual-effects"
	),

	array("name" => "Header Layout Style",
		"desc" => "You can choose different header styles - full width or page width:",
		"id" => "suf_header_layout_style",
		"parent" => "header-setup",
		"type" => "radio",
		"options" => array("out-hcfull" => "Header is outside the main wrapper, its background and contents are as wide as your browser window",
			"out-hcalign" => "Header is outside the main wrapper, its background and contents are aligned with the main wrapper",
			"out-cfull-halign" => "Header is outside the main wrapper, its background is as wide as your browser window, but header contents are aligned with the main wrapper",
			"in-align" => "Header is inside the main wrapper", "theme" => "Theme Default"),
		"std" => "theme"),

	array("name" => "Blog Title / Header Alignment",
		"desc" => "Which side would you like your header?",
		"id" => "suf_header_alignment",
		"parent" => "header-setup",
		"type" => "radio",
		"options" => array("left" => "Left", "right" => "Right", "center" => "Center", "hidden" => "Hidden"),
		"std" => "left"),

	array("name" => "Description / Sub-Header Alignment",
		"desc" => "Which side would you like your sub-header?",
		"id" => "suf_sub_header_alignment",
		"parent" => "header-setup",
		"type" => "radio",
		"options" => array("left" => "Left", "right" => "Right", "center" => "Center", "hidden" => "Hidden"),
		"std" => "right"),

	array("name" => "Description / Sub-Header Vertical Alignment, relative to header",
		"desc" => "Which line would you like your sub-header relative to the header?",
		"id" => "suf_sub_header_vertical_alignment",
		"parent" => "header-setup",
		"type" => "radio",
		"options" => array("above" => "Above the header text", "below" => "Below the header text", "same-line" => "Same line as the header"),
		"std" => "same-line"),

	array("name" => "Navigation Bar Below Header",
		"type" => "sub-section-3",
		"category" => "nav-setup",
		"parent" => "visual-effects"
	),

	array("name" => "Look and Feel",
		"category" => "nav-lf",
		"parent" => "nav-setup",
		"type" => "sub-section-4",),

	array("name" => "Show / Hide Navigation Bar",
		"id" => "suf_nav_contents",
		"parent" => "nav-setup",
		"grouping" => "nav-lf",
		"type" => "radio",
		"options" => array("pages" => "Drop-down menus (Default)", "hide" => "Hidden"),
		"std" => "pages"),

	array("name" => "Navigation Bar Style",
		"desc" => "This will only be effective if your Header is outside the main wrapper (see Visual Effects &rarr; Header Customization):",
		"id" => "suf_nav_bar_style",
		"parent" => "nav-setup",
		"grouping" => "nav-lf",
		"type" => "radio",
		"options" => array("full-full" => "Navigation bar is as wide as your browser window and contents of the bar begin from the left or right",
			"full-align" => "Navigation bar is as wide as your browser window and contents of the bar are aligned with your main page",
			"align" => "Navigation bar and its contents are aligned with your main page", "theme" => "Theme Default"),
		"std" => "theme"),

	array("name" => "Drop-down menu position",
		"desc" => "Where in the navigation bar do you want your drop-down menu?",
		"id" => "suf_nav_dd_pos",
		"parent" => "nav-setup",
		"grouping" => "nav-lf",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left" => "Left", "right" => "Right", "center" => "Center"),
		"std" => "theme"),

	array("name" => "Menu Item Style",
		"id" => "suf_nav_item_type",
		"parent" => "nav-setup",
		"grouping" => "nav-lf",
		"type" => "radio",
		"options" => array("tab" => "Show menu items as individual tabs", "continuous" => "Show menu items as a continuous list", "theme" => "Theme Default"),
		"std" => "theme"),

	array("name" => "Drop-down menu delay",
		"desc" => "You can set a delay for the drop-down menu in the navigation bar.",
		"id" => "suf_nav_delay",
		"parent" => "nav-setup",
		"grouping" => "nav-lf",
		"type" => "text",
		"hint" => "Leave blank for no delay",
		"std" => "500"),

	array("name" => "Fade effect for drop-down menu",
		"desc" => "There is a fade-in effect for the drop-down menu enabled by default. You can disable it",
		"id" => "suf_nav_effect",
		"parent" => "nav-setup",
		"grouping" => "nav-lf",
		"type" => "radio",
		"options" => array("none" => "No effects", "fade" => "Fade in the page"),
		"std" => "fade"),

	array("name" => "Show \"Home\" page?",
		"desc" => "You can show a link to your blog's home page. This could either be an icon or a text link. This setting is ignored if you are hiding your navigation bar.",
		"id" => "suf_show_home",
		"parent" => "nav-setup",
		"grouping" => "nav-lf",
		"type" => "radio",
		"options" => array("none" => "Don't show a home link (default)", "text" => "Show a text link", "icon" => "Show an icon"),
		"std" => "none"),

	array("name" => "\"Home\" page text",
		"desc" => "If you have opted to show a text link above, you can set the text to show. The default is \"Home\".
				This setting is ignored if you are hiding your navigation bar or if you have chosen to not show a home link or to show a home icon.",
		"id" => "suf_home_text",
		"parent" => "nav-setup",
		"grouping" => "nav-lf",
		"type" => "text",
		"std" => "Home"),

	array("name" => "Order of entities in navigation bar",
		"desc" => "You can define the order in which Pages, Categories and Links (Bookmarks) appear in the navigation bar: ",
		"id" => "suf_nav_entity_order",
		"parent" => "nav-setup",
		"grouping" => "nav-lf",
		"type" => "sortable-list",
		"std" => suffusion_entity_prepositions('nav')),

	array("name" => "Text Transformation for Navigation Bar",
		"id" => "suf_nav_text_transform",
		"parent" => "nav-setup",
		"grouping" => "nav-lf",
		"type" => "radio",
		"options" => array("uppercase" => "ALL UPPERCASE", "lowercase" => "all lowercase",
			"capitalize" => "Capitalize First Letter Of Each Word (default)", "none" => "No transformation"),
		"std" => "capitalize"),

	array("name" => "Pages in Navigation Bar",
		"desc" => "Control the display of pages in the navigation bar",
		"category" => "nav-pages",
		"parent" => "nav-setup",
		"type" => "sub-section-4",),

	array("name" => "Page listing style in Navigation Bar",
		"desc" => "You can choose how to show pages in your navigation bar. By default a single tab for pages is shown in the navigation bar.",
		"id" => "suf_nav_pages_style",
		"parent" => "nav-setup",
		"grouping" => "nav-pages",
		"type" => "radio",
		"options" => array("flattened" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-page-flat.jpg' alt='Flattened'/><p>Show the top level pages in the navigation bar and their sub-pages in drop-downs</p></div>",
			"rolled-up" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-page-roll-up.jpg' alt='Flattened'/><p>Show a single tab called \"Pages\" (or whatever you want to call it) and build a drop-down under it (default)</p></div>"),
		"std" => "rolled-up"),

	array("name" => "\"Pages\" tab title",
		"desc" => "In the above option if you have chosen to show a single tab for pages and build a drop-down under it, you can set the title for that tab.
				This setting is ignored if you have chosen to display top level pages in the navigation bar.",
		"id" => "suf_nav_page_tab_title",
		"parent" => "nav-setup",
		"grouping" => "nav-pages",
		"type" => "text",
		"std" => "Pages"),

	array("name" => "\"Pages\" tab link",
		"desc" => "If you have a specific page that you want to go to upon clicking the Pages tab, set the full URL here.
				This setting is ignored if you have chosen to display top level pages in the navigation bar.",
		"id" => "suf_nav_page_tab_link",
		"parent" => "nav-setup",
		"grouping" => "nav-pages",
		"type" => "text",
		"hint" => "Enter the full URL, including http://",
		"std" => ""),

	array("name" => "Pages in Navigation Bar - All or Selected",
		"desc" => "Choose which pages you want to display in your navigation bar.",
		"id" => "suf_nav_pages_all_sel",
		"parent" => "nav-setup",
		"grouping" => "nav-pages",
		"type" => "radio",
		"options" => array("all" => "Include all, ignoring next option", "selected" => "Include selections from the next option",
			"exclude-all" => "Exclude all, ignoring next option", "exclude-selected" => "Exclude selections from the next option"),
		"std" => "exclude-all"),

	array("name" => "Select pages to include/exclude in Navigation Bar",
		"desc" => "The selections here will be used with the previous option.",
		"id" => "suf_nav_pages",
		"parent" => "nav-setup",
		"grouping" => "nav-pages",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_page_array(),
		"std" => ''),

	array("name" => "Categories in Navigation Bar",
		"desc" => "Control the display of categories in the navigation bar",
		"category" => "nav-cats",
		"parent" => "nav-setup",
		"type" => "sub-section-4",),

	array("name" => "Category listing style in Navigation Bar",
		"desc" => "You can choose how to show categories in your navigation bar. By default a single tab for categories is shown in the navigation bar.",
		"id" => "suf_nav_cat_style",
		"parent" => "nav-setup",
		"grouping" => "nav-cats",
		"type" => "radio",
		"options" => array("flattened" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-cat-flat.jpg' alt='Flattened'/><p>Show the top level categories in the navigation bar and their sub-pages in drop-downs</p></div>",
			"rolled-up" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-cat-roll-up.jpg' alt='Flattened'/><p>Show a single tab called \"Categories\" (or whatever you want to call it) and build a drop-down under it (default)</p></div>"),
		"std" => "rolled-up"),

	array("name" => "\"Categories\" tab title",
		"desc" => "In the above option if you have chosen to show a single tab for categories and build a drop-down under it, you can set the title for that tab.
				This setting is ignored if you have chosen to display top level categories in the navigation bar.",
		"id" => "suf_nav_cat_tab_title",
		"parent" => "nav-setup",
		"grouping" => "nav-cats",
		"type" => "text",
		"std" => "Categories"),

	array("name" => "\"Categories\" tab link",
		"desc" => "If you have a specific page that you want to go to upon clicking the Categories tab, set the full URL here.
				This setting is ignored if you have chosen to display top level categories in the navigation bar.",
		"id" => "suf_nav_cat_tab_link",
		"parent" => "nav-setup",
		"grouping" => "nav-cats",
		"type" => "text",
		"hint" => "Enter the full URL, including http://",
		"std" => ""),

	array("name" => "Categories in Navigation Bar - All or Selected",
		"desc" => "Choose which categories you want to display in your navigation bar.",
		"id" => "suf_nav_cats_all_sel",
		"parent" => "nav-setup",
		"grouping" => "nav-cats",
		"type" => "radio",
		"options" => array("all" => "Include all, ignoring next option", "selected" => "Include selections from the next option",
			"exclude-all" => "Exclude all, ignoring next option", "exclude-selected" => "Exclude selections from the next option"),
		"std" => "exclude-all"),

	array("name" => "Select categories to show in Navigation Bar",
		"desc" => "If you have too many categories on your blog you might want to exclude some so that the navigation bar doesn't get ugly. Note that if your navigation bar is hidden, this setting is ignored. Also if you select a category whose parent is not selected, the child will NOT be displayed.
				The exclusion is hierarchical, so if you exclude a parent category but include its child, neither the parent nor the child will show up in the dropdown. All categories are excluded by default. ",
		"id" => "suf_nav_cats",
		"parent" => "nav-setup",
		"grouping" => "nav-cats",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_category_array("suf_nav_cats"),
		'std' => ''),

	array("name" => "Links in Navigation Bar",
		"desc" => "Control the display of links in the navigation bar",
		"category" => "nav-links",
		"parent" => "nav-setup",
		"type" => "sub-section-4",),

	array("name" => "WordPress Link listing style in Navigation Bar",
		"desc" => "You can choose how to show links in your navigation bar. By default a single tab for links is shown in the navigation bar.",
		"id" => "suf_nav_links_style",
		"parent" => "nav-setup",
		"grouping" => "nav-links",
		"type" => "radio",
		"options" => array("flattened" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-link-flat.jpg' alt='Flattened'/><p>Show the links in the navigation bar</p></div>",
			"rolled-up" => "<div class='picture'><img src='" . get_template_directory_uri() . "/admin/images/nav-link-roll-up.jpg' alt='Flattened'/><p>Show a single tab called \"Links\" (or whatever you want to call it) and build a drop-down under it</p></div>"),
		"std" => "rolled-up"),

	array("name" => "\"Links\" tab title",
		"desc" => "In the above option if you have chosen to show a single tab for WordPress links and build a drop-down under it, you can set the title for that tab.
				This setting is ignored if you have chosen to display individual links in the navigation bar.",
		"id" => "suf_nav_links_tab_title",
		"parent" => "nav-setup",
		"grouping" => "nav-links",
		"type" => "text",
		"std" => "Links"),

	array("name" => "\"Links\" tab link",
		"desc" => "If you have a specific page that you want to go to upon clicking the Links tab, set the full URL here.
				This setting is ignored if you have chosen to display top level links in the navigation bar.",
		"id" => "suf_nav_links_tab_link",
		"parent" => "nav-setup",
		"grouping" => "nav-links",
		"type" => "text",
		"hint" => "Enter the full URL, including http://",
		"std" => ""),

	array("name" => "Links in Navigation Bar - All or Selected",
		"desc" => "Choose which links you want to display",
		"id" => "suf_nav_links_all_sel",
		"parent" => "nav-setup",
		"grouping" => "nav-links",
		"type" => "radio",
		"options" => array("all" => "Include all, ignoring next option", "selected" => "Include selections from the next option",
			"exclude-all" => "Exclude all, ignoring next option", "exclude-selected" => "Exclude selections from the next option"),
		"std" => "selected"),

	array("name" => "Select links to show in Navigation Bar",
		"desc" => "If you have too many links on your blog you might want to exclude some so that the navigation bar doesn't get ugly. Note that if your navigation bar is hidden, this setting is ignored.
				All links are excluded by default. ",
		"id" => "suf_nav_links",
		"parent" => "nav-setup",
		"grouping" => "nav-links",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_link_array("suf_nav_links"),
		"std" => '',
	),

	array("name" => "WP 3.0 Navigation Menus",
		"desc" => "Control the display of inbuilt navigation menus (WP 3.0 and higher)",
		"category" => "nav-3menu",
		"parent" => "nav-setup",
		"type" => "sub-section-4",),

	array("name" => "WP 3.0 Navigation Menus - All or Selected",
		"desc" => "You can decide if you want to show all menus or selected menus in the navigation bar.
			If you choose 'All' your settings in the next option will be ignored. Also note that if you have added a menu to the navigation bar through the WP 3.0 menu administration page, it will show up even if excluded here.
			Note that this option is different from choosing 'Select All' in the next option, because this guarantees that always all are displayed, while the next option only ensures that all selections at the time of setup are displayed",
		"id" => "suf_nav_menus_all_sel",
		"parent" => "nav-setup",
		"grouping" => "nav-3menu",
		"type" => "radio",
		"options" => array("all" => "All, ignoring next option", "selected" => "Selections from the next option"),
		"std" => "selected"),

	array("name" => "Select Menus to show",
		"desc" => "If you have too many menus on your blog you might want to exclude some so that the navigation bar doesn't get ugly.
			All menus are included by default. ",
		"id" => "suf_nav_menus",
		"parent" => "nav-setup",
		"grouping" => "nav-3menu",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_wp_menu_array("suf_nav_menus"),
		"std" => '',
	),

	array("name" => "\"Title\" attribute upon hovering over navigation bar",
		"desc" => "If you set this to show the title, when you hover over the menu, a little box with the title of the link will show up.
			This applies to both navigation bars. Also, the WP 3.0 menus are not impacted by this setting:",
		"id" => "suf_nav_strip_a_title",
		"parent" => "nav-setup",
		"type" => "radio",
		"options" => array("show" => "Show title attribute", "hide" => "Hide title attribute"),
		"std" => "hide"),

	array("name" => "Footer",
		"type" => "sub-section-3",
		"category" => "footer-customization",
		"parent" => "visual-effects"
	),

	array("name" => "Footer Layout Style",
		"desc" => "You can choose different footer styles - full width or page width:",
		"id" => "suf_footer_layout_style",
		"parent" => "footer-customization",
		"type" => "radio",
		"options" => array("out-hcfull" => "Footer is outside the main wrapper, its background and contents are as wide as your browser window",
			"out-hcalign" => "Footer is outside the main wrapper, its background and contents are aligned with the main wrapper",
			"out-cfull-halign" => "Footer is outside the main wrapper, its background is as wide as your browser window, but footer contents are aligned with the main wrapper",
			"in-align" => "Footer is inside the main wrapper", "theme" => "Theme Default"),
		"std" => "theme"),

	array("name" => "Text in left part of footer",
		"desc" => "Enter the text to put in the left section of the footer. HTML is permitted. For the &copy; symbol use &amp;#169; .",
		"id" => "suf_footer_left",
		"parent" => "footer-customization",
		"type" => "textarea",
		"hint" => "Enter the text here.",
		"note" => "If you have any text here, it will be included with your pages (even if structurally incorrect!!).",
		"std" => "&#169; " . date('Y') . " <a href='" . home_url() . "'>" . get_bloginfo('name') . "</a>"),

	array("name" => "Text in central part of footer",
		"desc" => "Enter the text to put in the central section of the footer. HTML is permitted. For the &copy; symbol use &amp;#169; .",
		"id" => "suf_footer_center",
		"parent" => "footer-customization",
		"type" => "textarea",
		"hint" => "Enter the text here.",
		"note" => "If you have any text here, it will be included with your pages (even if structurally incorrect!!).",
		"std" => ""),

	array("name" => "Sizes and Margins",
		"type" => "sub-section-3",
		"category" => "size-options",
		"parent" => "visual-effects"
	),

	array("name" => "Default sizes / margins for page elements?",
		"desc" => "You can decide to go with the sizes and margins (gaps) defined with the theme for different page elements or pick your own. " .
				"If you choose custom styles then the settings you make here will override the theme's settings.",
		"id" => "suf_size_options",
		"parent" => "size-options",
		"type" => "radio",
		"note" => "Please set this option to \"Custom styles\" if you want to override the theme's settings for the header.",
		"options" => array("theme" => "Theme sizes and margins",
			"custom" => "Custom sizes and margins (Default)"),
		"std" => "custom"),

	array("name" => "Page Width Type",
		"desc" => "Your page can be fixed width or fluid/elastic width",
		"id" => "suf_wrapper_width_type",
		"parent" => "size-options",
		"type" => "radio",
		"options" => array("fixed" => "Fixed width", "fluid" => "Fluid/Flexible width"),
		"std" => "fixed"),

	array("name" => "Fluid width settings",
		"desc" => "In the fluid width layout your sidebars have a fixed width, while the overall width of your page is a percentage of the browser window's width.",
		"category" => "size-flexible",
		"parent" => "size-options",
		"type" => "sub-section-4",),

	array("name" => "Width of page",
		"id" => "suf_wrapper_width_flex",
		"parent" => "size-options",
		"grouping" => "size-flexible",
		"type" => "slider",
		"options" => array("range" => "min", "min" => 25, "max" => 100, "step" => 1, "size" => "400px", "unit" => "%"),
		"std" => 75),

	array("name" => "Maximum width",
		"desc" => "Set this value so that your typography stays consistent on large screens.",
		"id" => "suf_wrapper_width_flex_max",
		"parent" => "size-options",
		"grouping" => "size-flexible",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Value will be set to a default if blank or incompatible.",
		"std" => "1200"),

	array("name" => "Minimum width",
		"desc" => "Set this value so that your typography stays consistent on small screens.",
		"id" => "suf_wrapper_width_flex_min",
		"parent" => "size-options",
		"grouping" => "size-flexible",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Value will be set to a default if blank or incompatible.",
		"std" => "600"),

	array("name" => "Fixed width settings",
		"desc" => "In the fixed width layout the components of your page have widths fixed in pixels, irrespective of the size of your browser window.",
		"category" => "size-fixed",
		"parent" => "size-options",
		"type" => "sub-section-4",),

	array("name" => "Overall Page Width",
		"desc" => "Suffusion comes with 3 preset page width options: 800px, 1000px and 1200px. You can also define a custom width if you please, or allow the width of the page to be determined by the width of its main components like the sidebars and the main content column.
				Due to difficulties with fitting things on the page, the minimum size allowed is 600px. If you enter something less than 600, it is considered to be 600.",
		"id" => "suf_wrapper_width_preset",
		"parent" => "size-options",
		"grouping" => "size-fixed",
		"type" => "radio",
		"options" => array("800" => "800px", "1000" => "1000px (Default)", "1200" => "1200px",
			"custom" => "Custom width (defined below)", "custom-components" => "Custom width, but constructed from individual components (defined below)"),
		"std" => "1000"),

	array("name" => "Custom value for page width",
		"desc" => "If you have selected \"Custom width\" above, you can set the width here. Please enter the width in pixels. <b>Do not enter \"px\".</b>
				Anything below 600 will be treated as 600. Note that this is a fixed width theme, not a fluid theme. What this means is that you cannot specify things like \"80%\" as the width.
				Also note that if you are setting a width over here with the \"Custom width\" selection in place, the widths of the individual components like the main column, the sidebars etc. are auto-calculated",
		"id" => "suf_wrapper_width",
		"parent" => "size-options",
		"grouping" => "size-fixed",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored. Incompatible values will be treated as 1000",
		"std" => "1000"),

	array("name" => "Custom component width - Custom value for main column width",
		"desc" => "If you have selected \"Custom width, but constructed from individual components\" above, you can set the width here for the main column.
				Please enter the width in pixels. <b>Do not enter \"px\".</b>
				Anything below 380 will be treated as 380. Note that this is a fixed width theme, not a fluid theme. What this means is that you cannot specify things like \"80%\" as the width. ",
		"id" => "suf_main_col_width",
		"parent" => "size-options",
		"grouping" => "size-fixed",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored. Incompatible values will be treated as 725",
		"std" => "725"),

	array("name" => "Sidebar width settings",
		"desc" => "Sidebar widths are relevant in the fluid width layout and in the fixed width layout with the \"Custom width, but constructed from individual components\" selection.",
		"category" => "size-sb",
		"parent" => "size-options",
		"type" => "sub-section-4",),

	array("name" => "Custom component width - Custom value for width of first sidebar",
		"desc" => "If you have fluid widths or fixed widths with \"Custom width, but constructed from individual components\" above, you can set the width here for the first sidebar.
				Please enter the width in pixels. <b>Do not enter \"px\".</b>
				Anything below 95 will be treated as 95. Note that this is a fixed width theme, not a fluid theme. What this means is that you cannot specify things like \"10%\" as the width. ",
		"id" => "suf_sb_1_width",
		"parent" => "size-options",
		"grouping" => "size-sb",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored. Incompatible values will be treated as 260",
		"std" => "260"),

	array("name" => "Custom component width - Custom value for width of second sidebar",
		"desc" => "If you have fluid widths or fixed widths with \"Custom width, but constructed from individual components\" above, you can set the width here for the second sidebar.
				Please enter the width in pixels. <b>Do not enter \"px\".</b>
				Anything below 95 will be treated as 95. Note that this is a fixed width theme, not a fluid theme. What this means is that you cannot specify things like \"10%\" as the width. ",
		"id" => "suf_sb_2_width",
		"parent" => "size-options",
		"grouping" => "size-sb",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored. Incompatible values will be treated as 260",
		"std" => "260"),

	array("name" => "Post and Page Bylines",
		"type" => "sub-section-3",
		"category" => "post-settings",
		"parent" => "visual-effects"
	),

	array("name" => "Posts (Default/Standard post format)",
		"desc" => "Control positioning of post bylines",
		"category" => "post-settings-post",
		"parent" => "post-settings",
		"type" => "sub-section-4",),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_post_meta_position",
		"parent" => "post-settings",
		"grouping" => "post-settings-post",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Permalink for posts without titles?",
		"desc" => "You can show an explicit permalink:",
		"id" => "suf_post_show_perm",
		"parent" => "post-settings",
		"grouping" => "post-settings-post",
		"type" => "select",
		"options" => array("show-tleft" => "Show Permalink under title on the left side", "show-tright" => "Show Permalink under title on the right side",
			"show-bleft" => "Show Permalink above footer on the left side", "show-bright" => "Show Permalink near footer on the right side", "hide" => "Hide Permalinks"),
		"std" => "show-tleft"),

	array("name" => "Show Permalink for posts with titles?",
		"desc" => "You can show an explicit permalink for posts with titles. The link will show up in the location set above:",
		"id" => "suf_post_with_title_show_perm",
		"parent" => "post-settings",
		"grouping" => "post-settings-post",
		"type" => "select",
		"options" => array("show" => "Always show", "hide" => "Always hide",),
		"std" => "hide"),

	array("name" => "Show Categories for posts?",
		"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
		"id" => "suf_post_show_cats",
		"parent" => "post-settings",
		"grouping" => "post-settings-post",
		"type" => "select",
		"options" => array("show" => "Show Categories under title on the left side", "show-tright" => "Show Categories under title on the right side",
			"show-bleft" => "Show Categories above footer on the left side", "show-bright" => "Show Categories near footer on the right side", "hide" => "Hide Categories"),
		"std" => "show"),

	array("name" => "Show Comments link for Posts?",
		"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
		"id" => "suf_post_show_comment",
		"parent" => "post-settings",
		"grouping" => "post-settings-post",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\" for Posts?",
		"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
		"id" => "suf_post_show_posted_by",
		"parent" => "post-settings",
		"grouping" => "post-settings-post",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_post_posted_by_format",
		"parent" => "post-settings",
		"grouping" => "post-settings-post",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Show Tags for posts?",
		"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
		"id" => "suf_post_show_tags",
		"parent" => "post-settings",
		"grouping" => "post-settings-post",
		"type" => "select",
		"options" => array("show-tleft" => "Show Tags under title on the left side", "show-tright" => "Show Tags under title on the right side",
			"show-bleft" => "Show Tags above footer on the left side", "show" => "Show Tags near footer on the right side", "hide" => "Hide Tags"),
		"std" => "show"),

	array("name" => "Pages",
		"desc" => "Control positioning of page bylines",
		"category" => "post-settings-page",
		"parent" => "post-settings",
		"type" => "sub-section-4",),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_page_meta_position",
		"parent" => "post-settings",
		"grouping" => "post-settings-page",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Comments link for Pages?",
		"desc" => "A link for comments shows up under the title for all pages on the right side. Do you want to hide it?",
		"id" => "suf_page_show_comment",
		"parent" => "post-settings",
		"grouping" => "post-settings-page",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\" for Pages?",
		"desc" => "Information about the poster shows up near the footer for all pages on the left side. Do you want to hide it?",
		"id" => "suf_page_show_posted_by",
		"parent" => "post-settings",
		"grouping" => "post-settings-page",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_page_posted_by_format",
		"parent" => "post-settings",
		"grouping" => "post-settings-page",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Post Formats",
		"type" => "sub-section-3",
		"category" => "post-format-settings",
		"parent" => "visual-effects"
	),

	array("name" => "Posts ('Aside' post format)",
		"desc" => "Control positioning of post bylines for post format 'aside'",
		"category" => "post-format-settings-post-aside",
		"parent" => "post-format-settings",
		"type" => "sub-section-4",),

	array("name" => "Show Title?",
		"desc" => "Should the title be displayed?",
		"id" => "suf_post_aside_show_title",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-aside",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide",),
		"std" => "hide"),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_post_aside_meta_position",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-aside",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Permalink for posts without titles?",
		"desc" => "You can show an explicit permalink:",
		"id" => "suf_post_aside_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-aside",
		"type" => "select",
		"options" => array("show-tleft" => "Show Permalink under title on the left side", "show-tright" => "Show Permalink under title on the right side",
			"show-bleft" => "Show Permalink above footer on the left side", "show-bright" => "Show Permalink near footer on the right side", "hide" => "Hide Permalinks"),
		"std" => "show-tleft"),

	array("name" => "Show Permalink for posts without title?",
		"desc" => "You can show an explicit permalink for posts without titles. The link will show up in the location set above:",
		"id" => "suf_post_aside_no_title_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-aside",
		"type" => "select",
		"options" => array("show" => "Always show", "hide" => "Always hide",),
		"std" => "show"),

	array("name" => "Show Categories?",
		"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
		"id" => "suf_post_aside_show_cats",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-aside",
		"type" => "select",
		"options" => array("show" => "Show Categories under title on the left side", "show-tright" => "Show Categories under title on the right side",
			"show-bleft" => "Show Categories above footer on the left side", "show-bright" => "Show Categories near footer on the right side", "hide" => "Hide Categories"),
		"std" => "show"),

	array("name" => "Show Comments link?",
		"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
		"id" => "suf_post_aside_show_comment",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-aside",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\"?",
		"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
		"id" => "suf_post_aside_show_posted_by",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-aside",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_post_aside_posted_by_format",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-aside",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Show Tags?",
		"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
		"id" => "suf_post_aside_show_tags",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-aside",
		"type" => "select",
		"options" => array("show-tleft" => "Show Tags under title on the left side", "show-tright" => "Show Tags under title on the right side",
			"show-bleft" => "Show Tags above footer on the left side", "show" => "Show Tags near footer on the right side", "hide" => "Hide Tags"),
		"std" => "show"),

	array("name" => "Posts ('Gallery' post format)",
		"desc" => "Control display for post format 'gallery'",
		"category" => "post-format-settings-post-gallery",
		"parent" => "post-format-settings",
		"type" => "sub-section-4",),

	array("name" => "Show Title?",
		"desc" => "Should the title be displayed?",
		"id" => "suf_post_gallery_show_title",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide",),
		"std" => "show"),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_post_gallery_meta_position",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Permalink for posts without titles?",
		"desc" => "You can show an explicit permalink:",
		"id" => "suf_post_gallery_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "select",
		"options" => array("show-tleft" => "Show Permalink under title on the left side", "show-tright" => "Show Permalink under title on the right side",
			"show-bleft" => "Show Permalink above footer on the left side", "show-bright" => "Show Permalink near footer on the right side", "hide" => "Hide Permalinks"),
		"std" => "show-tleft"),

	array("name" => "Show Permalink for posts with titles?",
		"desc" => "You can show an explicit permalink for posts with titles. The link will show up in the location set above:",
		"id" => "suf_post_gallery_with_title_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "select",
		"options" => array("show" => "Always show", "hide" => "Always hide",),
		"std" => "hide"),

	array("name" => "Show Categories?",
		"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
		"id" => "suf_post_gallery_show_cats",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "select",
		"options" => array("show" => "Show Categories under title on the left side", "show-tright" => "Show Categories under title on the right side",
			"show-bleft" => "Show Categories above footer on the left side", "show-bright" => "Show Categories near footer on the right side", "hide" => "Hide Categories"),
		"std" => "show"),

	array("name" => "Show Comments link?",
		"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
		"id" => "suf_post_gallery_show_comment",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\"?",
		"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
		"id" => "suf_post_gallery_show_posted_by",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_post_gallery_posted_by_format",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Show Tags?",
		"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
		"id" => "suf_post_gallery_show_tags",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "select",
		"options" => array("show-tleft" => "Show Tags under title on the left side", "show-tright" => "Show Tags under title on the right side",
			"show-bleft" => "Show Tags above footer on the left side", "show" => "Show Tags near footer on the right side", "hide" => "Hide Tags"),
		"std" => "show"),

	array("name" => "Disable Gallery Post Format in archives",
		"id" => "suf_gallery_format_disable",
		"desc" => "Disable the Gallery Post Format and treat it as a regulary post.",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "checkbox",
		"std" => ''),

	array("name" => "Gallery posts in archives - Number of thumbnails to show",
		"id" => "suf_gallery_format_thumb_count",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "slider",
		"options" => array("range" => "min", "min" => 4, "max" => 20, "step" => 1, "size" => "400px", "unit" => ""),
		"std" => 6),

	array("name" => "Gallery posts in archives - Thumbnail panel position",
		"id" => "suf_gallery_format_thumb_panel_position",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "select",
		"options" => array("left" => "Left of leading image", "right" => "Right of leading image", "below" => "Below leading image", ),
		"std" => "right"),

	array("name" => "Gallery posts in archives - Thumbnail panel width",
		"desc" => "If you have chosen \"left\" or \"right\" above, please enter the width in pixels:",
		"id" => "suf_gallery_format_thumb_panel_width",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "250"),

	array("name" => "Gallery posts in archives - Width of individual thumbnail",
		"id" => "suf_gallery_format_thumbnail_width",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "select",
		"options" => array("64" => "64px", "96" => "96px", "128" => "128px", "192" => "192px", "256" => "256px", ),
		"std" => "96"),

	array("name" => "Gallery posts in archives - Height of individual thumbnail",
		"id" => "suf_gallery_format_thumbnail_height",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "select",
		"options" => array("64" => "64px", "96" => "96px", "128" => "128px", "192" => "192px", "256" => "256px", ),
		"std" => "96"),

	array("name" => "Gallery posts in archives - Proportional resizing",
		"desc" => "If you are resizing an image 400x300 px to 128x128, the resizing is disproportionate. How do you want to handle the resize in such a scenario?",
		"id" => "suf_gallery_format_zc",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "radio",
		"options" => array("0" => "Preserve original proportions (final size might be different from desired size)",
			"1" => "Transform to desired proportions (image might get cropped)"),
		"std" => "1"),

	array("name" => "Random thumbnails",
		"id" => "suf_gallery_random_thumbs_disable",
		"desc" => "Don't randomly pick the thumbnails.",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-gallery",
		"type" => "checkbox",
		"std" => ''),

	array("name" => "Posts ('Link' post format)",
		"desc" => "Control positioning of post bylines for post format 'link'",
		"category" => "post-format-settings-post-link",
		"parent" => "post-format-settings",
		"type" => "sub-section-4",),

	array("name" => "Show Title?",
		"desc" => "Should the title be displayed?",
		"id" => "suf_post_link_show_title",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-link",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide",),
		"std" => "show"),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_post_link_meta_position",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-link",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Permalink for posts without titles?",
		"desc" => "You can show an explicit permalink:",
		"id" => "suf_post_link_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-link",
		"type" => "select",
		"options" => array("show-tleft" => "Show Permalink under title on the left side", "show-tright" => "Show Permalink under title on the right side",
			"show-bleft" => "Show Permalink above footer on the left side", "show-bright" => "Show Permalink near footer on the right side", "hide" => "Hide Permalinks"),
		"std" => "show-tleft"),

	array("name" => "Show Permalink for posts with titles?",
		"desc" => "You can show an explicit permalink for posts with titles. The link will show up in the location set above:",
		"id" => "suf_post_link_with_title_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-link",
		"type" => "select",
		"options" => array("show" => "Always show", "hide" => "Always hide",),
		"std" => "hide"),

	array("name" => "Show Categories?",
		"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
		"id" => "suf_post_link_show_cats",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-link",
		"type" => "select",
		"options" => array("show" => "Show Categories under title on the left side", "show-tright" => "Show Categories under title on the right side",
			"show-bleft" => "Show Categories above footer on the left side", "show-bright" => "Show Categories near footer on the right side", "hide" => "Hide Categories"),
		"std" => "show"),

	array("name" => "Show Comments link?",
		"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
		"id" => "suf_post_link_show_comment",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-link",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\"?",
		"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
		"id" => "suf_post_link_show_posted_by",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-link",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_post_link_posted_by_format",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-link",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Show Tags?",
		"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
		"id" => "suf_post_link_show_tags",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-link",
		"type" => "select",
		"options" => array("show-tleft" => "Show Tags under title on the left side", "show-tright" => "Show Tags under title on the right side",
			"show-bleft" => "Show Tags above footer on the left side", "show" => "Show Tags near footer on the right side", "hide" => "Hide Tags"),
		"std" => "show"),

	array("name" => "Posts ('Image' post format)",
		"desc" => "Control positioning of post bylines for post format 'image'",
		"category" => "post-format-settings-post-image",
		"parent" => "post-format-settings",
		"type" => "sub-section-4",),

	array("name" => "Show Title?",
		"desc" => "Should the title be displayed?",
		"id" => "suf_post_image_show_title",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-image",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide",),
		"std" => "show"),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_post_image_meta_position",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-image",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Permalink for posts without titles?",
		"desc" => "You can show an explicit permalink:",
		"id" => "suf_post_image_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-image",
		"type" => "select",
		"options" => array("show-tleft" => "Show Permalink under title on the left side", "show-tright" => "Show Permalink under title on the right side",
			"show-bleft" => "Show Permalink above footer on the left side", "show-bright" => "Show Permalink near footer on the right side", "hide" => "Hide Permalinks"),
		"std" => "show-tleft"),

	array("name" => "Show Permalink for posts with titles?",
		"desc" => "You can show an explicit permalink for posts with titles. The link will show up in the location set above:",
		"id" => "suf_post_image_with_title_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-image",
		"type" => "select",
		"options" => array("show" => "Always show", "hide" => "Always hide",),
		"std" => "hide"),

	array("name" => "Show Categories?",
		"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
		"id" => "suf_post_image_show_cats",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-image",
		"type" => "select",
		"options" => array("show" => "Show Categories under title on the left side", "show-tright" => "Show Categories under title on the right side",
			"show-bleft" => "Show Categories above footer on the left side", "show-bright" => "Show Categories near footer on the right side", "hide" => "Hide Categories"),
		"std" => "show"),

	array("name" => "Show Comments link?",
		"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
		"id" => "suf_post_image_show_comment",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-image",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\"?",
		"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
		"id" => "suf_post_image_show_posted_by",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-image",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_post_image_posted_by_format",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-image",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Show Tags?",
		"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
		"id" => "suf_post_image_show_tags",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-image",
		"type" => "select",
		"options" => array("show-tleft" => "Show Tags under title on the left side", "show-tright" => "Show Tags under title on the right side",
			"show-bleft" => "Show Tags above footer on the left side", "show" => "Show Tags near footer on the right side", "hide" => "Hide Tags"),
		"std" => "show"),

	array("name" => "Posts ('Quote' post format)",
		"desc" => "Control positioning of post bylines for post format 'quote'",
		"category" => "post-format-settings-post-quote",
		"parent" => "post-format-settings",
		"type" => "sub-section-4",),

	array("name" => "Show Title?",
		"desc" => "Should the title be displayed?",
		"id" => "suf_post_quote_show_title",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-quote",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide",),
		"std" => "hide"),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_post_quote_meta_position",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-quote",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Permalink for posts without titles?",
		"desc" => "You can show an explicit permalink:",
		"id" => "suf_post_quote_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-quote",
		"type" => "select",
		"options" => array("show-tleft" => "Show Permalink under title on the left side", "show-tright" => "Show Permalink under title on the right side",
			"show-bleft" => "Show Permalink above footer on the left side", "show-bright" => "Show Permalink near footer on the right side", "hide" => "Hide Permalinks"),
		"std" => "show-tleft"),

	array("name" => "Show Permalink for posts with titles?",
		"desc" => "You can show an explicit permalink for posts with titles. The link will show up in the location set above:",
		"id" => "suf_post_quote_with_title_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-quote",
		"type" => "select",
		"options" => array("show" => "Always show", "hide" => "Always hide",),
		"std" => "show"),

	array("name" => "Show Categories?",
		"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
		"id" => "suf_post_quote_show_cats",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-quote",
		"type" => "select",
		"options" => array("show" => "Show Categories under title on the left side", "show-tright" => "Show Categories under title on the right side",
			"show-bleft" => "Show Categories above footer on the left side", "show-bright" => "Show Categories near footer on the right side", "hide" => "Hide Categories"),
		"std" => "show"),

	array("name" => "Show Comments link?",
		"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
		"id" => "suf_post_quote_show_comment",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-quote",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\"?",
		"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
		"id" => "suf_post_quote_show_posted_by",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-quote",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_post_quote_posted_by_format",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-quote",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Show Tags?",
		"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
		"id" => "suf_post_quote_show_tags",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-quote",
		"type" => "select",
		"options" => array("show-tleft" => "Show Tags under title on the left side", "show-tright" => "Show Tags under title on the right side",
			"show-bleft" => "Show Tags above footer on the left side", "show" => "Show Tags near footer on the right side", "hide" => "Hide Tags"),
		"std" => "show"),

	array("name" => "Posts ('Status' post format)",
		"desc" => "Control positioning of post bylines for post format 'status'",
		"category" => "post-format-settings-post-status",
		"parent" => "post-format-settings",
		"type" => "sub-section-4",),

	array("name" => "Show Title?",
		"desc" => "Should the title be displayed?",
		"id" => "suf_post_status_show_title",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-status",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide",),
		"std" => "hide"),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_post_status_meta_position",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-status",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Permalink for posts without titles?",
		"desc" => "You can show an explicit permalink:",
		"id" => "suf_post_status_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-status",
		"type" => "select",
		"options" => array("show-tleft" => "Show Permalink under title on the left side", "show-tright" => "Show Permalink under title on the right side",
			"show-bleft" => "Show Permalink above footer on the left side", "show-bright" => "Show Permalink near footer on the right side", "hide" => "Hide Permalinks"),
		"std" => "show-tleft"),

	array("name" => "Show Permalink for posts with titles?",
		"desc" => "You can show an explicit permalink for posts with titles. The link will show up in the location set above:",
		"id" => "suf_post_status_no_title_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-status",
		"type" => "select",
		"options" => array("show" => "Always show", "hide" => "Always hide",),
		"std" => "show"),

	array("name" => "Show Categories?",
		"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
		"id" => "suf_post_status_show_cats",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-status",
		"type" => "select",
		"options" => array("show" => "Show Categories under title on the left side", "show-tright" => "Show Categories under title on the right side",
			"show-bleft" => "Show Categories above footer on the left side", "show-bright" => "Show Categories near footer on the right side", "hide" => "Hide Categories"),
		"std" => "show"),

	array("name" => "Show Comments link?",
		"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
		"id" => "suf_post_status_show_comment",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-status",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\"?",
		"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
		"id" => "suf_post_status_show_posted_by",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-status",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_post_status_posted_by_format",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-status",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Show Tags?",
		"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
		"id" => "suf_post_status_show_tags",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-status",
		"type" => "select",
		"options" => array("show-tleft" => "Show Tags under title on the left side", "show-tright" => "Show Tags under title on the right side",
			"show-bleft" => "Show Tags above footer on the left side", "show" => "Show Tags near footer on the right side", "hide" => "Hide Tags"),
		"std" => "show"),

	array("name" => "Posts ('Video' post format)",
		"desc" => "Control positioning of post bylines for post format 'video'",
		"category" => "post-format-settings-post-video",
		"parent" => "post-format-settings",
		"type" => "sub-section-4",),

	array("name" => "Show Title?",
		"desc" => "Should the title be displayed?",
		"id" => "suf_post_video_show_title",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-video",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide",),
		"std" => "show"),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_post_video_meta_position",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-video",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Permalink for posts without titles?",
		"desc" => "You can show an explicit permalink:",
		"id" => "suf_post_video_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-video",
		"type" => "select",
		"options" => array("show-tleft" => "Show Permalink under title on the left side", "show-tright" => "Show Permalink under title on the right side",
			"show-bleft" => "Show Permalink above footer on the left side", "show-bright" => "Show Permalink near footer on the right side", "hide" => "Hide Permalinks"),
		"std" => "show-tleft"),

	array("name" => "Show Permalink for posts with titles?",
		"desc" => "You can show an explicit permalink for posts with titles. The link will show up in the location set above:",
		"id" => "suf_post_video_with_title_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-video",
		"type" => "select",
		"options" => array("show" => "Always show", "hide" => "Always hide",),
		"std" => "hide"),

	array("name" => "Show Categories?",
		"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
		"id" => "suf_post_video_show_cats",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-video",
		"type" => "select",
		"options" => array("show" => "Show Categories under title on the left side", "show-tright" => "Show Categories under title on the right side",
			"show-bleft" => "Show Categories above footer on the left side", "show-bright" => "Show Categories near footer on the right side", "hide" => "Hide Categories"),
		"std" => "show"),

	array("name" => "Show Comments link?",
		"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
		"id" => "suf_post_video_show_comment",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-video",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\"?",
		"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
		"id" => "suf_post_video_show_posted_by",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-video",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_post_video_posted_by_format",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-video",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Show Tags?",
		"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
		"id" => "suf_post_video_show_tags",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-video",
		"type" => "select",
		"options" => array("show-tleft" => "Show Tags under title on the left side", "show-tright" => "Show Tags under title on the right side",
			"show-bleft" => "Show Tags above footer on the left side", "show" => "Show Tags near footer on the right side", "hide" => "Hide Tags"),
		"std" => "show"),

	array("name" => "Posts ('Audio' post format)",
		"desc" => "Control positioning of post bylines for post format 'audio'",
		"category" => "post-format-settings-post-audio",
		"parent" => "post-format-settings",
		"type" => "sub-section-4",),

	array("name" => "Show Title?",
		"desc" => "Should the title be displayed?",
		"id" => "suf_post_audio_show_title",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-audio",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide",),
		"std" => "show"),

	array("name" => "Audio shortcode",
		"desc" => "Enable Suffusion's audio shortcode (might cause conflicts with plugins other than JetPack or WP Audio Player)",
		"id" => "suf_enable_audio_shortcode",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-audio",
		"type" => "checkbox",
		"std" => ""),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_post_audio_meta_position",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-audio",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Permalink for posts without titles?",
		"desc" => "You can show an explicit permalink:",
		"id" => "suf_post_audio_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-audio",
		"type" => "select",
		"options" => array("show-tleft" => "Show Permalink under title on the left side", "show-tright" => "Show Permalink under title on the right side",
			"show-bleft" => "Show Permalink above footer on the left side", "show-bright" => "Show Permalink near footer on the right side", "hide" => "Hide Permalinks"),
		"std" => "show-tleft"),

	array("name" => "Show Permalink for posts with titles?",
		"desc" => "You can show an explicit permalink for posts with titles. The link will show up in the location set above:",
		"id" => "suf_post_audio_with_title_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-audio",
		"type" => "select",
		"options" => array("show" => "Always show", "hide" => "Always hide",),
		"std" => "hide"),

	array("name" => "Show Categories?",
		"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
		"id" => "suf_post_audio_show_cats",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-audio",
		"type" => "select",
		"options" => array("show" => "Show Categories under title on the left side", "show-tright" => "Show Categories under title on the right side",
			"show-bleft" => "Show Categories above footer on the left side", "show-bright" => "Show Categories near footer on the right side", "hide" => "Hide Categories"),
		"std" => "show"),

	array("name" => "Show Comments link?",
		"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
		"id" => "suf_post_audio_show_comment",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-audio",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\"?",
		"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
		"id" => "suf_post_audio_show_posted_by",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-audio",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_post_audio_posted_by_format",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-audio",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Show Tags?",
		"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
		"id" => "suf_post_audio_show_tags",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-audio",
		"type" => "select",
		"options" => array("show-tleft" => "Show Tags under title on the left side", "show-tright" => "Show Tags under title on the right side",
			"show-bleft" => "Show Tags above footer on the left side", "show" => "Show Tags near footer on the right side", "hide" => "Hide Tags"),
		"std" => "show"),

	array("name" => "Posts ('Chat' post format)",
		"desc" => "Control positioning of post bylines for post format 'chat'",
		"category" => "post-format-settings-post-chat",
		"parent" => "post-format-settings",
		"type" => "sub-section-4",),

	array("name" => "Show Title?",
		"desc" => "Should the title be displayed?",
		"id" => "suf_post_chat_show_title",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-chat",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide",),
		"std" => "show"),

	array("name" => "Position of meta information (including date)",
		"desc" => "Choose where you want information like Comments, Posted By etc to appear",
		"id" => "suf_post_chat_meta_position",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-chat",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left-pullout" => "Pullout on the left (this will reduce your main column width)",
			"right-pullout" => "Pullout on the right side (this will reduce your main column width)", "corners" => "Show in corners above/below content",
			"line-top" => "Single line above post", "line-bottom" => "Single line below post"
		),
		"std" => "theme"),

	array("name" => "Show Permalink for posts without titles?",
		"desc" => "You can show an explicit permalink:",
		"id" => "suf_post_chat_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-chat",
		"type" => "select",
		"options" => array("show-tleft" => "Show Permalink under title on the left side", "show-tright" => "Show Permalink under title on the right side",
			"show-bleft" => "Show Permalink above footer on the left side", "show-bright" => "Show Permalink near footer on the right side", "hide" => "Hide Permalinks"),
		"std" => "show-tleft"),

	array("name" => "Show Permalink for posts with titles?",
		"desc" => "You can show an explicit permalink for posts with titles. The link will show up in the location set above:",
		"id" => "suf_post_chat_with_title_show_perm",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-chat",
		"type" => "select",
		"options" => array("show" => "Always show", "hide" => "Always hide",),
		"std" => "hide"),

	array("name" => "Show Categories?",
		"desc" => "Links for the categories that the post is associated with show up under the title for all posts on the left side. Do you want to hide them?",
		"id" => "suf_post_chat_show_cats",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-chat",
		"type" => "select",
		"options" => array("show" => "Show Categories under title on the left side", "show-tright" => "Show Categories under title on the right side",
			"show-bleft" => "Show Categories above footer on the left side", "show-bright" => "Show Categories near footer on the right side", "hide" => "Hide Categories"),
		"std" => "show"),

	array("name" => "Show Comments link?",
		"desc" => "A link for comments shows up under the title for all posts on the right side. Do you want to hide it?",
		"id" => "suf_post_chat_show_comment",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-chat",
		"type" => "select",
		"options" => array("show-tleft" => "Show Comments link under title on the left side", "show" => "Show Comments link under title on the right side",
			"show-bleft" => "Show Comments link above footer on the left side", "show-bright" => "Show Comments link near footer on the right side", "hide" => "Hide Comments link"),
		"std" => "show"),

	array("name" => "Show \"Posted By\"?",
		"desc" => "Information about the poster shows up near the footer for all posts on the left side. Do you want to hide it?",
		"id" => "suf_post_chat_show_posted_by",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-chat",
		"type" => "select",
		"options" => array("show-tleft" => "Show Posted By under title on the left side", "show-tright" => "Show Posted By under title on the right side",
			"show" => "Show Posted By above footer on the left side", "show-bright" => "Show Posted By near footer on the right side", "hide" => "Hide Posted By"),
		"std" => "show"),

	array("name" => "\"Posted By\" format",
		"desc" => "You can change the appearance of the \"Posted By\" text:",
		"id" => "suf_post_chat_posted_by_format",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-chat",
		"type" => "select",
		"options" => array("by" => "Posted by {author}", "by-on" => "Posted by {author} on {date}", "by-at" => "Posted by {author} at {time}",
			"by-on-at" => "Posted by {author} on {date} at {time}", "by-at-on" => "Posted by {author} at {time} on {date}", ),
		"std" => "by-at"),

	array("name" => "Show Tags?",
		"desc" => "Links for the tags that the post is associated with show up near the footer for all posts on the right side. Do you want to hide them?",
		"id" => "suf_post_chat_show_tags",
		"parent" => "post-format-settings",
		"grouping" => "post-format-settings-post-chat",
		"type" => "select",
		"options" => array("show-tleft" => "Show Tags under title on the left side", "show-tright" => "Show Tags under title on the right side",
			"show-bleft" => "Show Tags above footer on the left side", "show" => "Show Tags near footer on the right side", "hide" => "Hide Tags"),
		"std" => "show"),

	array("name" => "Layout: Excerpt / List / Tile / Mosaic / Full",
		"type" => "sub-section-3",
		"category" => "excerpt-settings",
		"parent" => "visual-effects"
	),

	array("name" => "Front Page settings",
		"desc" => "Control front page layout",
		"category" => "layout-front",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Layout Settings for the Front Page",
		"desc" => "By default for all posts on the front page, the complete contents are displayed.",
		"id" => "suf_index_excerpt",
		"parent" => "excerpt-settings",
		"grouping" => "layout-front",
		"type" => "radio",
		"options" => array("content" => "Display full content", "excerpt" => "Display excerpt", "list" => "Display list", "tiles" => 'Display tiles', "mosaic" => 'Display mosaic'),
		"std" => "content"),

	array("name" => "Number of Full content posts on Front Page",
		"desc" => "In the Excerpt, List and Tile display you can choose to show the first few posts with full content. Set the number of posts for which you want the full content displayed (ignored if you select full content above): ",
		"id" => "suf_index_fc_number",
		"parent" => "excerpt-settings",
		"grouping" => "layout-front",
		"type" => "select",
		"options" => array("0" => "0 (Zero)", "1" => "1 (One)", "2" => "2 (Two)", "3" => "3 (Three)", "4" => "4 (Four)",
			"5" => "5 (Five)", "6" => "6 (Six)", "7" => "7 (Seven)", "8" => "8 (Eight)", "9" => "9 (Nine)", "10" => "10 (Ten)"),
		"std" => "0"),

	array("name" => "Category Page settings",
		"desc" => "Control category page layout",
		"category" => "layout-cat",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Default Layout Settings for Categories",
		"desc" => "If you select a category, you can choose to show excerpts instead of full contents for each post. By default the complete contents are displayed. ",
		"id" => "suf_category_excerpt",
		"parent" => "excerpt-settings",
		"grouping" => "layout-cat",
		"type" => "radio",
		"options" => array("content" => "Display full content", "excerpt" => "Display excerpt", "list" => "Display list", "tiles" => 'Display tiles', "mosaic" => 'Display mosaic'),
		"std" => "content"),

	array("name" => "Number of Full content posts for Categories",
		"desc" => "In the Excerpt, List and Tile display you can choose to show the first few posts with full content. Set the number of posts for which you want the full content displayed (ignored if you select full content above): ",
		"id" => "suf_category_fc_number",
		"parent" => "excerpt-settings",
		"grouping" => "layout-cat",
		"type" => "select",
		"options" => array("0" => "0 (Zero)", "1" => "1 (One)", "2" => "2 (Two)", "3" => "3 (Three)", "4" => "4 (Four)",
			"5" => "5 (Five)", "6" => "6 (Six)", "7" => "7 (Seven)", "8" => "8 (Eight)", "9" => "9 (Nine)", "10" => "10 (Ten)"),
		"std" => "0"),

	array("name" => "Date-based Archive Page settings",
		"desc" => "Control date-based archive page layout",
		"category" => "layout-archive",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Layout Settings for Date-based Archives",
		"desc" => "If you select a month or a year, you can choose to show excerpts instead of full contents for each post. By default the complete contents are displayed. ",
		"id" => "suf_archive_excerpt",
		"parent" => "excerpt-settings",
		"grouping" => "layout-archive",
		"type" => "radio",
		"options" => array("content" => "Display full content", "excerpt" => "Display excerpt", "list" => "Display list", "tiles" => 'Display tiles', "mosaic" => 'Display mosaic'),
		"std" => "content"),

	array("name" => "Number of Full content posts for date-based archives",
		"desc" => "In the Excerpt, List and Tile display you can choose to show the first few posts with full content. Set the number of posts for which you want the full content displayed (ignored if you select full content above): ",
		"id" => "suf_archive_fc_number",
		"parent" => "excerpt-settings",
		"grouping" => "layout-archive",
		"type" => "select",
		"options" => array("0" => "0 (Zero)", "1" => "1 (One)", "2" => "2 (Two)", "3" => "3 (Three)", "4" => "4 (Four)",
			"5" => "5 (Five)", "6" => "6 (Six)", "7" => "7 (Seven)", "8" => "8 (Eight)", "9" => "9 (Nine)", "10" => "10 (Ten)"),
		"std" => "0"),

	array("name" => "Tag Page settings",
		"desc" => "Control tag page layout",
		"category" => "layout-tag",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Layout Settings for Tags",
		"desc" => "If you select a tag, you can choose to show excerpts instead of full contents for each post. By default the complete contents are displayed. ",
		"id" => "suf_tag_excerpt",
		"parent" => "excerpt-settings",
		"grouping" => "layout-tag",
		"type" => "radio",
		"options" => array("content" => "Display full content", "excerpt" => "Display excerpt", "list" => "Display list", "tiles" => 'Display tiles', "mosaic" => 'Display mosaic'),
		"std" => "content"),

	array("name" => "Number of Full content posts for Tags",
		"desc" => "In the Excerpt, List and Tile display you can choose to show the first few posts with full content. Set the number of posts for which you want the full content displayed (ignored if you select full content above): ",
		"id" => "suf_tag_fc_number",
		"parent" => "excerpt-settings",
		"grouping" => "layout-tag",
		"type" => "select",
		"options" => array("0" => "0 (Zero)", "1" => "1 (One)", "2" => "2 (Two)", "3" => "3 (Three)", "4" => "4 (Four)",
			"5" => "5 (Five)", "6" => "6 (Six)", "7" => "7 (Seven)", "8" => "8 (Eight)", "9" => "9 (Nine)", "10" => "10 (Ten)"),
		"std" => "0"),

	array("name" => "Search Page settings",
		"desc" => "Control search page layout",
		"category" => "layout-search",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Layout Settings for Search Results",
		"desc" => "When you perform a search the complete contents of the matching posts are displayed. You can change this to show only the excerpts. ",
		"id" => "suf_search_excerpt",
		"parent" => "excerpt-settings",
		"grouping" => "layout-search",
		"type" => "radio",
		"options" => array("content" => "Display full content", "excerpt" => "Display excerpt", "list" => "Display list", "tiles" => 'Display tiles', "mosaic" => 'Display mosaic'),
		"std" => "content"),

	array("name" => "Number of Full content posts for Search Results",
		"desc" => "In the Excerpt, List and Tile display you can choose to show the first few posts with full content. Set the number of posts for which you want the full content displayed (ignored if you select full content above): ",
		"id" => "suf_search_fc_number",
		"parent" => "excerpt-settings",
		"grouping" => "layout-search",
		"type" => "select",
		"options" => array("0" => "0 (Zero)", "1" => "1 (One)", "2" => "2 (Two)", "3" => "3 (Three)", "4" => "4 (Four)",
			"5" => "5 (Five)", "6" => "6 (Six)", "7" => "7 (Seven)", "8" => "8 (Eight)", "9" => "9 (Nine)", "10" => "10 (Ten)"),
		"std" => "0"),

	array("name" => "Author Page settings",
		"desc" => "Control author page layout",
		"category" => "layout-author",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Layout Settings for the Author Page",
		"desc" => "When you pull up the posts for an author the complete contents of the posts are displayed. You can change this to show only the excerpts. ",
		"id" => "suf_author_excerpt",
		"parent" => "excerpt-settings",
		"grouping" => "layout-author",
		"type" => "radio",
		"options" => array("content" => "Display full content", "excerpt" => "Display excerpt", "list" => "Display list", "tiles" => 'Display tiles', "mosaic" => 'Display mosaic'),
		"std" => "content"),

	array("name" => "Number of Full content posts for Authors",
		"desc" => "In the Excerpt, List and Tile display you can choose to show the first few posts with full content. Set the number of posts for which you want the full content displayed (ignored if you select full content above): ",
		"id" => "suf_author_fc_number",
		"parent" => "excerpt-settings",
		"grouping" => "layout-author",
		"type" => "select",
		"options" => array("0" => "0 (Zero)", "1" => "1 (One)", "2" => "2 (Two)", "3" => "3 (Three)", "4" => "4 (Four)",
			"5" => "5 (Five)", "6" => "6 (Six)", "7" => "7 (Seven)", "8" => "8 (Eight)", "9" => "9 (Nine)", "10" => "10 (Ten)"),
		"std" => "0"),

	array("name" => "Full content posts on first page / all pages (for selections above)",
		"desc" => "Show full content posts only on the first page of a category/tag/time archive etc. This Setting will also apply to Templates &rarr; Page of Posts: ",
		"id" => "suf_fc_view_first_only",
		"parent" => "excerpt-settings",
		"type" => "radio",
		"options" => array("first" => "First page only", "all" => "All pages (second, third etc)"),
		"std" => "first"),

	array("name" => "General Excerpt settings",
		"desc" => "Control general settings for excerpts",
		"category" => "excerpt-gen",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Number of words in auto-generated excerpts",
		"desc" => "By default auto-generated excerpts in WordPress are 55 words long. You can set this length to anything you like:",
		"id" => "suf_excerpt_custom_length",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-gen",
		"type" => "text",
		"hint" => "Enter the number of words here.",
		"std" => "55"),

	array("name" => "Replacement text for \"[...]\" in excerpts",
		"desc" => "By default auto-generated excerpts in WordPress end with \"[...]\". You can change this:",
		"id" => "suf_excerpt_custom_more_text",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-gen",
		"type" => "text",
		"hint" => "Enter the replacement text here.",
		"std" => "[...]"),

	array("name" => "Thumbnail settings",
		"desc" => "Control settings for thumbnails",
		"category" => "excerpt-thumb",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Show thumbnails for excerpts",
		"desc" => "If you are retrieving an excerpt, you can display a thumbnail for it.
			So if you have a Post Thumbnail set in your Edit Page or Edit Post screen (right side), this takes precedence.
			Otherwise the thumbnail is picked up from the URL provided in the \"Thumbnail\" setting of a post or a page:",
		"id" => "suf_show_excerpt_thumbnail",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-thumb",
		"type" => "radio",
		"options" => array("show" => "Display Thumbnail, if available", "hide" => "Hide Thumbnail"),
		"std" => "show"),

	array("name" => "Show thumbnails for full content",
		"desc" => "The thumbnail can be defined for both excerpts and full content.
			For excerpts the previous setting takes effect. You can show thumbnails for posts by controlling the setting here.
			Note that to use this feature your thumbnail must be defined in the \"Post Thumbnail\" section of your Edit Page or Edit Post screen:",
		"id" => "suf_show_content_thumbnail",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-thumb",
		"type" => "radio",
		"options" => array("show" => "Display Thumbnail, if available", "hide" => "Hide Thumbnail"),
		"std" => "show"),

	array("name" => "Image preference order",
		"desc" => "You can change the order of preference for picking up images. If an image is not found for your first preference, the next one is looked for: ",
		"id" => "suf_excerpt_img_pref",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-thumb",
		"type" => "sortable-list",
		"std" => suffusion_entity_prepositions('thumb-excerpt')),

	array("name" => "Proportional resizing",
		"desc" => "If you are resizing an image 400x200 px to 250x150, the resizing is disproportionate. How do you want to handle the resize in such a scenario?",
		"id" => "suf_excerpt_tt_zc",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-thumb",
		"type" => "radio",
		"options" => array("0" => "Preserve original proportions (final size might be different from desired size)",
			"1" => "Transform to desired proportions (image might get cropped)"),
		"std" => "1"),

	array("name" => "Set compression quality",
		"desc" => "Adjust this if you want to change the quality of your compressed image. The default is 75:",
		"id" => "suf_excerpt_tt_quality",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-thumb",
		"type" => "slider",
		"options" => array("range" => "min", "min" => 25, "max" => 100, "step" => 1, "size" => "400px", "unit" => ""),
		"std" => 75),

	array("name" => "Thumbnail alignment in excerpts",
		"desc" => "You can set the thumbnail (if present) to appear either on the left or on the right of the excerpt:",
		"id" => "suf_excerpt_thumbnail_alignment",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-thumb",
		"type" => "radio",
		"options" => array("left" => "Show thumbnail on the left of the excerpt", "right" => "Show thumbnail on the right of the excerpt"),
		"std" => "left"),

	array("name" => "Thumbnail size in excerpts",
		"desc" => "You can set the size of the thumbnail (if present). This is the size of the thumbnail in the excerpt:",
		"id" => "suf_excerpt_thumbnail_size",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-thumb",
		"type" => "radio",
		"options" => array("thumbnail" => "Thumbnail size, as defined in Settings -&gt; Media",
			"medium" => "Medium size, as defined in Settings -&gt; Media",
			"large" => "Large size, as defined in Settings -&gt; Media",
			"full" => "Full size of the image",
			"custom" => "Custom size defined below"),
		"std" => "thumbnail"),

	array("name" => "Custom width of thumbnail",
		"desc" => "If you have chosen to define a custom size above, please enter the width in pixels:",
		"id" => "suf_excerpt_thumbnail_custom_width",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-thumb",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "200"),

	array("name" => "Custom height of thumbnail",
		"desc" => "If you have chosen to define a custom size above, please enter the height in pixels:",
		"id" => "suf_excerpt_thumbnail_custom_height",
		"parent" => "excerpt-settings",
		"grouping" => "excerpt-thumb",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "200"),

	array("name" => "List layout settings",
		"desc" => "Control settings for \"Display List\" option ",
		"category" => "layout-list",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Number of posts in \"Display List\" option",
		"desc" => "If you have selected \"Display List\" for any of the views above, you can control the number of posts to show per page:",
		"id" => "suf_excerpt_list_count",
		"parent" => "excerpt-settings",
		"grouping" => "layout-list",
		"type" => "radio",
		"options" => array("all" => "Show all results",
			"posts-per-page" => "Show as many posts as allowed in the 'Posts Per Page' setting in Settings -&gt; Reading",),
		"std" => "all"),

	array("name" => "List style in \"Display List\" option",
		"desc" => "If you have selected \"Display List\" for any of the views above, you can choose to show ordered or unordered lists:",
		"id" => "suf_excerpt_list_style",
		"parent" => "excerpt-settings",
		"grouping" => "layout-list",
		"type" => "radio",
		"options" => array("ul" => "Unordered List", "ol" => "Ordered List",),
		"std" => "ul"),

	array("name" => "Tile layout settings",
		"desc" => "Control settings for \"Display Tiles\" option ",
		"category" => "layout-tiles",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Number of excerpts per row in \"Display Tiles\" option",
		"desc" => "If you have selected \"Display Tiles\" option for any of the views above, you can control the number of excerpts (tiles) to show per row:",
		"id" => "suf_tile_excerpts_per_row",
		"parent" => "excerpt-settings",
		"grouping" => "layout-tiles",
		"type" => "select",
		"options" => array("1" => "1 (One)", "2" => "2 (Two)", "3" => "3 (Three)", "4" => "4 (Four)", "5" => "5 (Five)", "6" => "6 (Six)", "7" => "7 (Seven)",
			"8" => "8 (Eight)", "9" => "9 (Nine)", "10" => "10 (Ten)"),
		"std" => "3"),

	array("name" => "Thumbnail container for excerpts",
		"desc" => "You can show thumbnails for excerpts in the tiles display: ",
		"id" => "suf_tile_images_enabled",
		"parent" => "excerpt-settings",
		"grouping" => "layout-tiles",
		"type" => "radio",
		"options" => array("show" => "Always show Thumbnail container", "hide" => "Always hide Thumbnail container",
			"hide-empty" => "Hide Thumbnail container if there is no thumbnail"),
		"std" => "show"),

	array("name" => "Thumbnail container height for excerpts",
		"desc" => "For the purposes of visual consistency you can set the height of the box in which the thumbnail will be placed. Your thumbnail will be \"cropped\" to this height: ",
		"id" => "suf_tile_image_box_height",
		"parent" => "excerpt-settings",
		"grouping" => "layout-tiles",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "100"),

	array("name" => "Thumbnail image and size settings",
		"desc" => "By default this uses the image preference order, size and other settings defined under <i>Templates &rarr; Magazine</i>: ",
		"id" => "suf_tile_image_settings",
		"parent" => "excerpt-settings",
		"grouping" => "layout-tiles",
		"type" => "radio",
		"options" => array("inherit" => "Use settings under <i>Templates &rarr; Magazine</i>",
			"native" => "Use settings below"),
		"std" => "inherit"),

	array("name" => "Image preference order",
		"desc" => "You can change the order of preference for picking up images. If an image is not found for your first preference, the next one is looked for: ",
		"id" => "suf_tile_img_pref",
		"parent" => "excerpt-settings",
		"grouping" => "layout-tiles",
		"type" => "sortable-list",
		"std" => suffusion_entity_prepositions('thumb-tiles')),

	array("name" => "Tile thumbnail image scaling",
		"desc" => "You can set a custom size for your excerpt thumbnail images, or let the size be the same as that of the regular excerpt images: ",
		"id" => "suf_tile_image_size",
		"grouping" => "layout-tiles",
		"parent" => "excerpt-settings",
		"type" => "radio",
		"options" => array("excerpt" => "Same size as excerpt images", "custom" => "Custom size (defined below)"),
		"std" => "excerpt"),

	array("name" => "Custom height of thumbnail image in tiles",
		"desc" => "If you have picked a custom size for the excerpt thumbnail images above, you can set the height here: ",
		"id" => "suf_tile_image_custom_height",
		"grouping" => "layout-tiles",
		"parent" => "excerpt-settings",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "200"),

	array("name" => "Custom width of thumbnail image in tiles",
		"desc" => "If you have picked a custom size for the excerpt thumbnail images above, you can set the width here: ",
		"id" => "suf_tile_image_custom_width",
		"grouping" => "layout-tiles",
		"parent" => "excerpt-settings",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "200"),

	array("name" => "Proportional resizing",
		"desc" => "If you are resizing an image 400x200 px to 250x150, the resizing is disproportionate. How do you want to handle the resize in such a scenario?",
		"id" => "suf_tile_zc",
		"grouping" => "layout-tiles",
		"parent" => "excerpt-settings",
		"type" => "radio",
		"options" => array("default" => "Inherit setting from thumbnail above",
			"0" => "Preserve original proportions (final size might be different from desired size)",
			"1" => "Transform to desired proportions (image might get cropped)"),
		"std" => "default"),

	array("name" => "Display Tiles - Alignment of post title in Excerpts",
		"desc" => "You can set the alignment for the post title in the excerpts: ",
		"id" => "suf_tile_title_alignment",
		"parent" => "excerpt-settings",
		"grouping" => "layout-tiles",
		"type" => "radio",
		"options" => array("theme" => "Theme Default", "left" => "Left", "center" => "Center", "right" => "Right"),
		"std" => "theme"),

	array("name" => "Tile Layout Bylines",
		"desc" => "Control how bylines are displayed for excerpts",
		"category" => "tile-layout-bylines",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Show bylines for tiled excerpts",
		"desc" => "You can show bylines for magazine excerpts: ",
		"id" => "suf_tile_layout_bylines_enabled",
		"grouping" => "tile-layout-bylines",
		"parent" => "excerpt-settings",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide"),
		"std" => "show"),

	array("name" => "Show post date",
		"id" => "suf_tile_layout_bylines_post_date",
		"grouping" => "tile-layout-bylines",
		"parent" => "excerpt-settings",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide"),
		"std" => "show"),

	array("name" => "Show \"Posted by\"",
		"id" => "suf_tile_layout_bylines_posted_by",
		"grouping" => "tile-layout-bylines",
		"parent" => "excerpt-settings",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide"),
		"std" => "show"),

	array("name" => "Show \"Categories\"",
		"id" => "suf_tile_layout_bylines_categories",
		"grouping" => "tile-layout-bylines",
		"parent" => "excerpt-settings",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide"),
		"std" => "show"),

	array("name" => "Show \"Tags\"",
		"id" => "suf_tile_layout_bylines_tags",
		"grouping" => "tile-layout-bylines",
		"parent" => "excerpt-settings",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide"),
		"std" => "show"),

	array("name" => "Show \"Comments\"",
		"id" => "suf_tile_layout_bylines_comments",
		"grouping" => "tile-layout-bylines",
		"parent" => "excerpt-settings",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide"),
		"std" => "show"),

	array("name" => "Show \"Permalinks\"",
		"id" => "suf_tile_layout_bylines_permalinks",
		"grouping" => "tile-layout-bylines",
		"parent" => "excerpt-settings",
		"type" => "radio",
		"options" => array("show" => "Show", "hide" => "Hide"),
		"std" => "show"),

	array("name" => "Mosaic layout settings",
		"desc" => "Control settings for \"Display Mosaic\" option ",
		"category" => "layout-mosaic",
		"parent" => "excerpt-settings",
		"type" => "sub-section-4",),

	array("name" => "Width of mosaic thumbnail",
		"desc" => "If you have selected \"Display Mosaic\" option for any of the views above, set the width of each mosaic thumbnail:",
		"id" => "suf_mosaic_thumbnail_width",
		"parent" => "excerpt-settings",
		"grouping" => "layout-mosaic",
		"type" => "select",
		"options" => array("64" => "64px", "96" => "96px", "128" => "128px", "192" => "192px", "256" => "256px", ),
		"std" => "96"),

	array("name" => "Height of mosaic thumbnail",
		"desc" => "If you have selected \"Display Mosaic\" option for any of the views above, set the width of each mosaic thumbnail:",
		"id" => "suf_mosaic_thumbnail_height",
		"parent" => "excerpt-settings",
		"grouping" => "layout-mosaic",
		"type" => "select",
		"options" => array("64" => "64px", "96" => "96px", "128" => "128px", "192" => "192px", "256" => "256px", ),
		"std" => "96"),

	array("name" => "Proportional resizing",
		"desc" => "If you are resizing an image 400x300 px to 128x128, the resizing is disproportionate. How do you want to handle the resize in such a scenario?",
		"id" => "suf_mosaic_zc",
		"parent" => "excerpt-settings",
		"grouping" => "layout-mosaic",
		"type" => "radio",
		"options" => array("0" => "Preserve original proportions (final size might be different from desired size)",
			"1" => "Transform to desired proportions (image might get cropped)"),
		"std" => "1"),

	array("name" => "Constrain the number of thumbnails per row",
		"desc" => "You can set the number of thumbnails per row by defining the padding around the thumbnails, or by fixing the number of thumbnails per row",
		"id" => "suf_mosaic_constrain_row",
		"parent" => "excerpt-settings",
		"grouping" => "layout-mosaic",
		"type" => "radio",
		"options" => array("padding" => "Fix the padding around the thumbnails",
			"count" => "Fix the number of thumbnails per row"),
		"std" => "padding"),

	array("name" => "Constrain by padding",
		"desc" => " If you have constrained by padding above, enter the number of pixels here to pad the thumbs by",
		"id" => "suf_mosaic_constrain_by_padding",
		"parent" => "excerpt-settings",
		"grouping" => "layout-mosaic",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "50"),

	array("name" => "Constrain by number of thumbnails",
		"desc" => " If you have constrained by number of thumbnails per row above, enter the number of thumbnails",
		"id" => "suf_mosaic_constrain_by_count",
		"parent" => "excerpt-settings",
		"grouping" => "layout-mosaic",
		"type" => "slider",
		"options" => array("range" => "min", "min" => 1, "max" => 15, "step" => 1, "size" => "400px", "unit" => ""),
		"std" => 5),

	array("name" => "Allow thumbnail zooming",
		"desc" => "You can open the original image for a mosaic thumbnail without going to the post",
		"id" => "suf_mosaic_zoom",
		"parent" => "excerpt-settings",
		"grouping" => "layout-mosaic",
		"type" => "radio",
		"options" => array("zoom" => "Allow zooming",
			"no-zoom" => "Disallow zooming"),
		"std" => "zoom"),

	array("name" => "Zooming library if zooming is allowed",
		"desc" => "Which JS library should be used?",
		"id" => "suf_mosaic_zoom_library",
		"parent" => "excerpt-settings",
		"grouping" => "layout-mosaic",
		"type" => "radio",
		"options" => array("fancybox" => "Fancybox",
			"colorbox" => "Colorbox",
			"none" => "None: default to a plugin's script and save bandwidth. You must have a plugin that bundles Fancybox or Colorbox to select this."
		),
		"std" => "fancybox"),

	array("name" => "Show post title below thumbnail?",
		"id" => "suf_mosaic_show_title",
		"parent" => "excerpt-settings",
		"grouping" => "layout-mosaic",
		"type" => "radio",
		"options" => array("show" => "Show",
			"hide" => "Hide"),
		"std" => "hide"),

	array("name" => "Featured Content",
		"type" => "sub-section-3",
		"category" => "featured-settings",
		"parent" => "visual-effects"
	),

	array("name" => "Showing Featured Posts",
		"desc" => "Featured posts help bring certain posts to the top of your blog. Suffusion supports Featured Posts in multiple ways:
				<ul class='margin-20'>
					<li>Sticky Posts</li>
					<li>Selected Categories</li>
					<li>Selected Posts</li>
					<li>Selected Pages</li>
					<li>Selected Tags</li>
				</ul>
				Suffusion uses the excellent <a href='http://www.malsup.com/jquery/cycle/'>JQuery Cycle</a> to create a Featured section above your posts.
				Additionally you can define a \"Featured Image\" (preferably as wide as your blog posts). If you don't associate a featured image, the thumbnail will be picked.
				And if you don't provide a thumbnail, the first attached image will be used. Note, though, that not having a featured image will generate thumbnail size images, displaying a lot of blank space.
				Good practices:
				<ul class='margin-20'>
					<li>Use featured images for every post that you want to show in your featured section.</li>
					<li>Define featured images that are at least as wide as your posts.</li>
					<li>Don't use too many featured posts. Remember that this section should have useful information, not all information. Having too many posts will make your script sluggish.</li>
				</ul>
				",
		"parent" => "featured-settings",
		"type" => "blurb"),

	array("name" => "Where to Show",
		"desc" => "Where do you want the Featured Content to appear?",
		"category" => "fc-where",
		"parent" => "featured-settings",
		"type" => "sub-section-4",),

	array("name" => "Main (default) page",
		"desc" => "You can enable the Featured Posts slider on your main page. This is also the default page: ",
		"id" => "suf_featured_index_view",
		"parent" => "featured-settings",
		"grouping" => "fc-where",
		"type" => "radio",
		"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
		"std" => "disabled"),

	array("name" => "Category view",
		"desc" => "You can enable the Featured Posts slider for your category view. This way you will see the featured section whenever you are looking at posts in a particular category: ",
		"id" => "suf_featured_category_view",
		"parent" => "featured-settings",
		"grouping" => "fc-where",
		"type" => "radio",
		"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
		"std" => "disabled"),

	array("name" => "Tag view",
		"desc" => "You can enable the Featured Posts slider for your tag view. This way you will see the featured section whenever you are looking at posts with a particular tag: ",
		"id" => "suf_featured_tag_view",
		"parent" => "featured-settings",
		"grouping" => "fc-where",
		"type" => "radio",
		"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
		"std" => "disabled"),

	array("name" => "Author view",
		"desc" => "You can enable the Featured Posts slider for your author view. This way you will see the featured section whenever you are looking at an author page: ",
		"id" => "suf_featured_author_view",
		"parent" => "featured-settings",
		"grouping" => "fc-where",
		"type" => "radio",
		"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
		"std" => "disabled"),

	array("name" => "Search view",
		"desc" => "You can enable the Featured Posts slider for your search view. This way you will see the featured section whenever you are looking at search results: ",
		"id" => "suf_featured_search_view",
		"parent" => "featured-settings",
		"grouping" => "fc-where",
		"type" => "radio",
		"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
		"std" => "disabled"),

	array("name" => "Time archive view",
		"desc" => "You can enable the Featured Posts slider for your tiem archive (time / date / day / month / year) view. This way you will see the featured section whenever you are looking at time-based archives: ",
		"id" => "suf_featured_time_view",
		"parent" => "featured-settings",
		"grouping" => "fc-where",
		"type" => "radio",
		"options" => array("enabled" => "Enabled", "disabled" => "Disabled"),
		"std" => "disabled"),

	array("name" => "First page / all pages",
		"desc" => "Show featured content only on the first page of a category/tag/time archive etc: ",
		"id" => "suf_featured_view_first_only",
		"parent" => "featured-settings",
		"grouping" => "fc-where",
		"type" => "radio",
		"options" => array("first" => "First page only", "all" => "All pages (second, third etc)"),
		"std" => "first"),

	array("name" => "Static Pages with Featured Content",
		"desc" => "By default the featured content is not shown on static pages. You can choose the pages in your blog that will contain the Featured Posts: ",
		"id" => "suf_featured_pages_with_fc",
		"parent" => "featured-settings",
		"grouping" => "fc-where",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_page_array(),
		"std" => "",
	),

	array("name" => "What to Show",
		"desc" => "What do you want to display in the Featured Content section?",
		"category" => "fc-what",
		"parent" => "featured-settings",
		"type" => "sub-section-4",),

	array("name" => "Number of Posts",
		"desc" => "By default this is limited to the number of posts you allow per page: ",
		"id" => "suf_featured_num_posts",
		"parent" => "featured-settings",
		"grouping" => "fc-what",
		"type" => "text",
		"hint" => "Enter the number here. Please enter positive numeric values only",
		"std" => get_option('posts_per_page')),

	array("name" => "Show Duplicate Posts",
		"desc" => "Show posts from the featured content section in the rest of the body: ",
		"id" => "suf_featured_show_dupes",
		"parent" => "featured-settings",
		"grouping" => "fc-what",
		"type" => "radio",
		"options" => array("show" => "Show duplicate posts", "hide" => "Hide duplicate posts"),
		"std" => "hide"),

	array("name" => "Show Sticky Posts",
		"desc" => "To make a post \"sticky\" go to the \"Edit Posts\" menu, then click on the \"Visibility\" option in the publish section and
				select \"Stick this post to the front page\": ",
		"id" => "suf_featured_allow_sticky",
		"parent" => "featured-settings",
		"grouping" => "fc-what",
		"type" => "radio",
		"options" => array("show" => "Show sticky posts", "hide" => "Hide sticky posts"),
		"std" => "show"),

	array("name" => "Show Latest Posts?",
		"id" => "suf_featured_show_latest",
		"parent" => "featured-settings",
		"grouping" => "fc-what",
		"type" => "radio",
		"options" => array("show" => "Show latest posts", "hide" => "Hide latest posts"),
		"std" => "hide"),

	array("name" => "Number of Latest Posts",
		"desc" => "This is not relevant if you are hiding latest posts.
				In case the number of latest posts is higher than the total number of posts, this setting is ignored: ",
		"id" => "suf_featured_num_latest_posts",
		"parent" => "featured-settings",
		"grouping" => "fc-what",
		"type" => "text",
		"hint" => "Enter the number here. Please enter positive numeric values only",
		"std" => 5),

	array("name" => "Select Categories",
		"desc" => "In addition to sticky posts you can include posts from selected categories in the featured posts slider.
				By default no category is selected: ",
		"id" => "suf_featured_selected_categories",
		"parent" => "featured-settings",
		"grouping" => "fc-what",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_category_array("suf_featured_selected_categories"),
		"std" => "",
	),

	array("name" => "Select Pages",
		"desc" => "Note that the inclusion is NOT hierarchical here. By default no page is selected: ",
		"id" => "suf_featured_selected_pages",
		"parent" => "featured-settings",
		"grouping" => "fc-what",
		"export" => "ne",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_page_array(),
		"std" => "",
	),

	array("name" => "Posts to show",
		"desc" => "Include a comma-separated list of post ids you want to include in the featured posts: ",
		"id" => "suf_featured_selected_posts",
		"parent" => "featured-settings",
		"grouping" => "fc-what",
		"type" => "text",
		"std" => ""),

	array("name" => "Tags to show",
		"desc" => "Include a comma-separated list of tags you want to include in the featured posts: ",
		"id" => "suf_featured_selected_tags",
		"parent" => "featured-settings",
		"grouping" => "fc-what",
		"type" => "text",
		"std" => ""),

	array("name" => "How to Show",
		"desc" => "Set the visual effects of the featured content section here",
		"category" => "fc-how",
		"parent" => "featured-settings",
		"type" => "sub-section-4",),

	array("name" => "Image preference order",
		"desc" => "You can change the order of preference for picking up images. If an image is not found for your first preference, the next one is looked for: ",
		"id" => "suf_featured_img_pref",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "sortable-list",
		"std" => suffusion_entity_prepositions('thumb-featured')),

	array("name" => "Featured Posts - Transition Effects",
		"desc" => "You can pick the effect you want to use for your featured posts' transitions. These are effects provided by the JQuery Cycle script.
				Note that not all effects will look good on your blog. You should pick the one that best suits your needs: ",
		"id" => "suf_featured_fx",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "select",
		"options" => array("fade" => "Fade In", "scrollUp" => "Scroll Up", "scrollDown" => "Scroll Down", "scrollLeft" => "Scroll Left", "scrollRight" => "Scroll Right",
			"scrollHorz" => "Scroll Horizontally", "scrollVert" => "Scroll Vertically",
			"slideX" => "Slide in and back horizontally", "slideY" => "Slide in and back vertically",
			"turnUp" => "Turn Upwards", "turnDown" => "Turn Downwards", "turnLeft" => "Turn Leftwards", "turnRight" => "Turn Rightwards",
			"zoom" => "Zoom", "fadeZoom" => "Zoom and Fade", "blindX" => "Vertical Blinds", "blindY" => "Horizontal Blinds", "blindZ" => "Diagonal Blinds",
			"growX" => "Grow horizontally from center", "growY" => "Grow vertically from center",
			"curtainX" => "Squeeze in both edges horizontally", "curtainY" => "Squeeze in both edges vertically",
			"cover" => "Current post is covered by next post", "uncover" => "Current post moves off next post", "wipe" => "Wipe",
		),
		"std" => "fade"),

	array("name" => "Featured Posts - Image synchronization",
		"desc" => "By default a new image starts showing only when the old one has cleared. You can change this behavior: ",
		"id" => "suf_featured_sync",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "radio",
		"options" => array("0" => "Show new image only after old one has cleared out fully", "1" => "Start showing new image as the old one starts clearing out"),
		"std" => "0"),

	array("name" => "Featured Posts - Time for each post display",
		"desc" => "The posts in the Featured Posts are each displayed for 4000 milliseconds (4 seconds). You can change this interval: ",
		"id" => "suf_featured_interval",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "text",
		"hint" => "Enter the time in milliseconds (don't enter \"ms\"!)",
		"std" => "4000"),

	array("name" => "Featured Posts - Transition speed for post",
		"desc" => "Depending on the transition effect you have chosen you may want to speed up or slow down your transition. Set the duration of the transition effect here: ",
		"id" => "suf_featured_transition_speed",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "text",
		"hint" => "Enter the time in milliseconds (don't enter \"ms\"!)",
		"std" => "1000"),

	array("name" => "Height of the Featured Posts section",
		"desc" => "The Featured Posts section is 250px high by default. You can change this setting depending on the size of your featuerd images.",
		"id" => "suf_featured_height",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "250"),

	array("name" => "Featured Posts - Show Border",
		"desc" => "You can opt to show a border for your featured posts section: ",
		"id" => "suf_featured_show_border",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "radio",
		"options" => array("theme" => "Theme default", "show" => "Show border", "hide" => "Hide border"),
		"std" => "theme"),

	array("name" => "Image size in featured content",
		"desc" => "You can set the size of the featured image (if present):",
		"id" => "suf_featured_image_size",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "radio",
		"options" => array("full" => "Full size of the image",
			"custom" => "Custom size defined below"),
		"std" => "full"),

	array("name" => "Custom width of featured image",
		"desc" => "If you have chosen to define a custom size above, please enter the width in pixels:",
		"id" => "suf_featured_image_custom_width",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "200"),

	array("name" => "Custom height of featured image",
		"desc" => "If you have chosen to define a custom size above, please enter the height in pixels:",
		"id" => "suf_featured_image_custom_height",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "200"),

	array("name" => "Proportional resizing",
		"desc" => "If you are resizing an image 400x200 px to 250x150, the resizing is disproportionate. How do you want to handle the resize in such a scenario?",
		"id" => "suf_featured_zc",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "radio",
		"options" => array("default" => "Inherit setting from thumbnail (<em>Other Graphical Elements &rarr; Layout: Excerpt / List / Tile / Full &rarr; Thumbnail settings</em>)",
			"0" => "Preserve original proportions (final size might be different from desired size)",
			"1" => "Transform to desired proportions (image might get cropped)"),
		"std" => "default"),

	array("name" => "Stretch smaller images",
		"desc" => "Make images stretch to full-width of the slider",
		"id" => "suf_featured_stretch_w",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "checkbox",
		"std" => ""),

	array("name" => "Featured Posts - Display Text",
		"desc" => "You can decide what you want to include in your text display for the featured content. This text is laid over the featured image: ",
		"id" => "suf_featured_excerpt_type",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "radio",
		"options" => array("title-excerpt" => "Show post title and excerpt (default)", "title" => "Show post title only (no excerpt)",
			"excerpt" => "Show excerpt only (no title)", "none" => "Don't show any text (useful if your images have text included)"),
		"std" => "title-excerpt"),

	array("name" => "Featured Posts - Position of Text",
		"desc" => "You can decide where you want your excerpt to appear on the featured posts section: ",
		"id" => "suf_featured_excerpt_position",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "radio",
		"options" => array("top" => "Top", "bottom" => "Bottom", "right" => "Right", "left" => "Left",
			"alttb" => "Alternate excerpt between top and bottom", "altlr" => "Alternate excerpt between left and right",
			"rotate" => "Rotate between the four positions"),
		"std" => "rotate"),

	array("name" => "Center images",
		"desc" => "Center the images in the slides if they are not full-size",
		"id" => "suf_featured_center_slides",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "checkbox",
		"std" => ""),

	array("name" => "Width of Text",
		"desc" => "You can define the width to use for excerpts. Note that this is relevant only if your excerpt is at the right or at the left of your featured posts.",
		"id" => "suf_featured_excerpt_width",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "text",
		"hint" => "Enter the number of pixels here (don't enter 'px'). Non-integers will be ignored.",
		"std" => "250"),

	array("name" => "Featured Posts - Text background color",
		"desc" => "Depending on the color of your featured images, you might want to choose a different background color for your excerpt in your featured posts. ",
		"id" => "suf_featured_excerpt_bg_color",
		"grouping" => "fc-how",
		"parent" => "featured-settings",
		"type" => "color-picker",
		"std" => "222222"),

	array("name" => "Featured Posts - Text font color",
		"desc" => "Depending on the color of your featured images, you might want to choose a different font color for your excerpt in your featured posts. ",
		"id" => "suf_featured_excerpt_font_color",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "color-picker",
		"std" => "FFFFFF"),

	array("name" => "Featured Posts - Link font color",
		"desc" => "Depending on the color of your featured images, you might want to choose a different link font color in your excerpt in your featured posts. ",
		"id" => "suf_featured_excerpt_link_color",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "color-picker",
		"std" => "FFFFFF"),

	array("name" => "Featured Posts - Post Index",
		"desc" => "You can show a numbered listing of posts for your Featured Posts (only for full version of JQuery Cycle): ",
		"id" => "suf_featured_pager",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "radio",
		"options" => array("show" => "Show Post Index", "hide" => "Hide Post Index"),
		"std" => "show"),

	array("name" => "Featured Posts - Pause, Previous and Next Controls",
		"desc" => "In addition to the numbered listing of posts you can display a controller for showing links to \"Previous Post\", \"Pause\" and \"Next Post\": ",
		"id" => "suf_featured_controller",
		"parent" => "featured-settings",
		"grouping" => "fc-how",
		"type" => "radio",
		"options" => array("show" => "Show Pause, Previous and Next Controls", "hide" => "Hide Pause, Previous and Next Controls"),
		"std" => "hide"),

	array("name" => "Breadcrumbs and Page Navigation",
		"type" => "sub-section-3",
		"category" => "pagination-settings",
		"parent" => "visual-effects"
	),

	array("name" => "Navigation Breadcrumb",
		"category" => "nav-bc",
		"parent" => "pagination-settings",
		"type" => "sub-section-4",),

	array("name" => "Breadcrumb Navigation for Pages",
		"desc" => "For every page that you visit you see all siblings of the page, its parent and all siblings of the parent below the navigation bar.
				This is okay if you have a small number of pages at each level, but cumbersome if you have many siblings (it messes up the display). You can change this setting:",
		"id" => "suf_nav_breadcrumb",
		"parent" => "pagination-settings",
		"grouping" => "nav-bc",
		"type" => "radio",
		"options" => array("all" => "Show all siblings, and all siblings of parent (default)",
			"breadcrumb" => "Don't show siblings, but show entire path to the page (traditional \"breadcrumb\" display)",
			"none" => "Hide the breadcrumb view altogether"),
		"std" => "breadcrumb"),

	array("name" => "Breadcrumb Navigation (non-Pages)",
		"desc" => "Where do you want breadcrumbs?",
		"id" => "suf_show_breadcrumbs_in",
		"parent" => "pagination-settings",
		"grouping" => "nav-bc",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_options_array("suf_show_breadcrumbs_in",
			array(
				'single' => 'Single posts',
				'attach' => 'Attachment views',
				'custom-posts' => 'Custom post types',
				'custom-post-hierarchy' => 'Hierarchical custom post types',
				'category' => "Categories",
				'tag' => 'Tags',
				'taxonomy' => 'Custom taxonomies',
				'custom-post-archives' => 'Custom post archives',
				'date' => 'Date archives',
				'author' => 'Author views',
				'search' => 'Search results',
				'404' => '404 page',
			)),
		"std" => ""
	),

	array("name" => "Show Home Link",
		"desc" => "Where do you want to show a 'Home' link? This is only relevant if the breadcrumb is being shown.",
		"id" => "suf_show_home_in",
		"parent" => "pagination-settings",
		"grouping" => "nav-bc",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_options_array("suf_show_home_in",
			array(
				'single' => 'Single posts',
				'page' => 'Pages',
				'custom-posts' => 'Custom post types',
				'custom-post-hierarchy' => 'Hierarchical custom post types',
				'category' => "Categories",
				'tag' => 'Tags',
				'taxonomy' => 'Custom taxonomies',
				'custom-post-archives' => 'Custom post archives',
				'date' => 'Date archives',
				'author' => 'Author views',
				'search' => 'Search results',
				'404' => '404 page',
			)),
		"std" => ""
	),

	array("name" => "Excluded pages in breadcrumb",
		"desc" => "Pages excluded in the drop down menu are not shown in the breadcrumb. You might want to change this setting if you want all pages to be available for navigation:",
		"id" => "suf_nav_exclude_in_breadcrumb",
		"parent" => "pagination-settings",
		"grouping" => "nav-bc",
		"type" => "radio",
		"options" => array("hide" => "Hide excluded pages", "show" => "Show excluded pages"),
		"std" => "hide"),

	array("name" => "Breadcrumb Separator",
		"desc" => "This is the symbol that appears as a separator between levels in your breadcrumb.
				If you have selected the \"breadcrumb\" display above then the setting you make here takes effect. Otherwise this is ignored:",
		"id" => "suf_breadcrumb_separator",
		"parent" => "pagination-settings",
		"grouping" => "nav-bc",
		"type" => "text",
		"std" => "&raquo;"),

	array("name" => "Posts",
		"desc" => "Control the display of post pagination",
		"category" => "post-pagination",
		"parent" => "pagination-settings",
		"type" => "sub-section-4",),

	array("name" => "Options for paged navigation of posts",
		"desc" => "Suffusion lets you select your own type of page navigation. And if you don't like Suffusion's page navigation styles, you can always use WP-PageNavi.
				If you use WP-PageNavi then the selection here is ignored. ",
		"id" => "suf_pagination_type",
		"parent" => "pagination-settings",
		"grouping" => "post-pagination",
		"type" => "radio",
		"options" => array("old-new" => "Simple navigation, showing links to a page with older posts and a page with newer posts",
			"numbered" => "A numbered listing of pages"),
		"std" => "old-new"),

	array("name" => "Numbered Listing - Page x of y",
		"desc" => "If you have chosen to display a numbered listing of pages, you can choose to show prefix the page list that will highlight which page you are on.
				It will put in a text saying \"Page x of y\". If you use WP-PageNavi then the selection here is ignored.",
		"id" => "suf_pagination_index",
		"parent" => "pagination-settings",
		"grouping" => "post-pagination",
		"type" => "radio",
		"options" => array("show" => "Show \"Page x of y\"",
			"hide" => "Don't show \"Page x of y\""),
		"std" => "show"),

	array("name" => "Numbered Listing - Previous and Next links",
		"desc" => "If you have chosen to display a numbered listing of pages, you can choose to additionally show links for \"Older Entries\" and \"Newer Entries\".
				If you use WP-PageNavi then the selection here is ignored.",
		"id" => "suf_pagination_prev_next",
		"parent" => "pagination-settings",
		"grouping" => "post-pagination",
		"type" => "radio",
		"options" => array("show" => "Show links for \"Older Entries\" and \"Newer Entries\"",
			"hide" => "Don't show links for \"Older Entries\" and \"Newer Entries\""),
		"std" => "show"),

	array("name" => "Numbered Listing - Show all pages in listing",
		"desc" => "If you have chosen to display a numbered listing of pages, you can choose to display all the pages in the list or replace it with dots as appropriate.
				In case of a large number of pages you might prefer to use dots. If you use WP-PageNavi then the selection here is ignored.",
		"id" => "suf_pagination_show_all",
		"parent" => "pagination-settings",
		"grouping" => "post-pagination",
		"type" => "radio",
		"options" => array("all" => "Show all pages in the list",
			"dots" => "Replace pages in the middle with dots"),
		"std" => "dots"),

	array("name" => "Previous / Next Posts",
		"desc" => "Control the display of previous and next posts on single post views",
		"category" => "prev-next-posts",
		"parent" => "pagination-settings",
		"type" => "sub-section-4",),

	array("name" => "Above / below post?",
		"id" => "suf_prev_next_above_below",
		"parent" => "pagination-settings",
		"grouping" => "prev-next-posts",
		"type" => "radio",
		"options" => array("below" => "Below the post",
			"above" => "Above the post",
			"above-below" => "Above and below",
			"dont-show" => "Don't show",
		),
		"std" => "below"),

	array("name" => "Restrict Categories",
		"id" => "suf_prev_next_categories",
		"parent" => "pagination-settings",
		"grouping" => "prev-next-posts",
		"type" => "radio",
		"options" => array("restrict" => "Previous / Next posts should belong to the same category (might not show the right category if posts have multiple categories)",
			"no-restrict" => "Previous / Next posts could belong to any category",
		),
		"std" => "restrict"),

	array("name" => "Comments",
		"desc" => "Control the display of comment pagination",
		"category" => "comment-pagination",
		"parent" => "pagination-settings",
		"type" => "sub-section-4",),

	array("name" => "Options for paged navigation of comments",
		"desc" => "Here you can decide if you want paged navigation for your comments: ",
		"id" => "suf_cpagination_type",
		"parent" => "pagination-settings",
		"grouping" => "comment-pagination",
		"type" => "radio",
		"options" => array("old-new" => "Simple navigation, showing links to a page with older comments and a page with newer comments",
			"numbered" => "A numbered listing of pages for the comments"),
		"std" => "old-new"),

	array("name" => "Numbered Listing of Comments - Page x of y",
		"desc" => "If you have chosen to display a numbered listing of pages for comments, you can choose to show prefix the page list that will highlight which page you are on.
				It will put in a text saying \"Page x of y\".",
		"id" => "suf_cpagination_index",
		"parent" => "pagination-settings",
		"grouping" => "comment-pagination",
		"type" => "radio",
		"options" => array("show" => "Show \"Page x of y\"",
			"hide" => "Don't show \"Page x of y\""),
		"std" => "show"),

	array("name" => "Numbered Listing of Comments - Previous and Next links",
		"desc" => "If you have chosen to display a numbered listing of pages for comments, you can choose to additionally show links for \"Older Comments\" and \"Newer Comments\"",
		"id" => "suf_cpagination_prev_next",
		"parent" => "pagination-settings",
		"grouping" => "comment-pagination",
		"type" => "radio",
		"options" => array("show" => "Show links for \"Older Comments\" and \"Newer Comments\"",
			"hide" => "Don't show links for \"Older Comments\" and \"Newer Comments\""),
		"std" => "show"),

	array("name" => "Numbered Listing of Comments - Show all comment pages in listing",
		"desc" => "If you have chosen to display a numbered listing of comment pages, you can choose to display all the pages in the list or replace it with dots as appropriate.
				In case of a large number of pages you might prefer to use dots.",
		"id" => "suf_cpagination_show_all",
		"parent" => "pagination-settings",
		"grouping" => "comment-pagination",
		"type" => "radio",
		"options" => array("all" => "Show all pages in the list",
			"dots" => "Replace pages in the middle with dots"),
		"std" => "dots"),

	array("name" => "Miscellaneous",
		"type" => "sub-section-3",
		"category" => "body-styles",
		"parent" => "visual-effects"
	),

	array("name" => "Use Rounded Corners?",
		"desc" => "By default rounded corners are shown in capable browsers like Firefox, Chrome, Safari and the latest Opera, but not in IE. You can turn off rounded corners in all browsers if you want:",
		"id" => "suf_show_rounded_corners",
		"parent" => "body-styles",
		"type" => "radio",
		"options" => array("show" => "Show rounded corners where applicable for capable browsers",
			"dont-show" => "Don't show rounded corners for any browser"),
		"std" => "show"),

	array("name" => "Image Aspect Ratio",
		"desc" => "Suffusion preserves the original aspect ratio of an image by removing the height parameter. You can disable this feature:",
		"id" => "suf_fix_aspect_ratio",
		"parent" => "body-styles",
		"type" => "radio",
		"options" => array("preserve" => "Preserve the original aspect ratio",
			"dont-preserve" => "Allow overriding the image's aspect ratio by explicit use of the 'height' attribute"),
		"std" => "preserve"),

	array("name" => "Thumbnail Generation",
		"desc" => "If you are not using a particular feature, you can turn off the automatic thumbnail generation for that. This will be applicable to all new images you upload and not to existing images:",
		"id" => "suf_disable_auto_thumbs",
		"parent" => "body-styles",
		"type" => "multi-select",
		"options" => suffusion_get_formatted_options_array("suf_seo_all_settings",
			array(
				'gallery-thumb' => 'Disable thumbnail generation for the "Gallery" post format',
				'mosaic-thumb' => 'Disable thumbnail generation for the Mosaic layout',
				'widget-24' => 'Disable 24px &times; 24px thumbnail generation for widgets / magazine layout',
				'widget-32' => 'Disable 32px &times; 32px thumbnail generation for widgets / magazine layout',
				'widget-48' => 'Disable 48px &times; 48px thumbnail generation for widgets / magazine layout',
				'widget-64' => 'Disable 64px &times; 64px thumbnail generation for widgets / magazine layout',
				'widget-96' => 'Disable 96px &times; 96px thumbnail generation for widgets / magazine layout',
			)
		),
		"std" => ""
	),

);
?>