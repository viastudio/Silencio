# Silencio

We all know that WordPress is a great platform for content generation. Silencio makes structuring your content types even easier. This starter theme was specifically built  for iterative project development. By rapidly prototyping in the browser, any content requirement can easily be solved.

## Features

### Environment Variable
Set up your project locally and on production.

### Grunt
Our Grunt config compiles LESS to CSS, then inserts browser vendor prefixes using Autoprefixer for local development. For production deploys, all resources get concatenated and minified into a build folder.

### Meta Boxes
We’ve incorporated the CMB2 library for easily adding custom meta-boxes to projects. The framework is very extensible.

### Templates
There are four templates bundled with Silencio: Typography, UI Kit, Metaboxes, and Full Width. Using the Typography and Full Width templates, the designer and developer can style all available type and bootstrap outputs in the browser. They can be removed from the project once design is complete. The Metabox template is a resource for the developer to demonstrate how data from custom CMB2 Metaboxes can be displayed. The Full Width Template can be used for content pages that do not include a sidebar.

### Widgets
Included are Children Pages and Category Posts widgets. They give you more options than the standard WordPress counterparts. Category Posts let you choose which categories you’d like to display entries from. Children Pages displays all child pages of the current parent. If there are no children, nothing is displayed.

### Theme Options
Using WordPress’ Customizer, you can easily add social profiles and address information to the footer. This can be expanded further in the theme options file found in the functions folder.

### Architecture
Silencio’s foundation was built from Underscores and Bootstrap. We also include Font Awesome for icons. The template markup follows PSR2 standards, rather than WordPress conventions.

### Functions.php
The functions file contains all our best practices, refactoring reusable pieces into their own components, included in the Res folder.

Functionality refactored into pluggable components:
- Template Tags
- Shortcodes (including bootstrap grid elements)
- Custom Widgets
- Excerpts
- TinyMCE
- Custom Post Types
- Custom Taxonomies
- Jetpack Controls

Other Functionality
- Sidebar/Widget Areas per template
- Custom Client User Role
- Debugging Variables Helper

### Theme Style
Silencio’s stylesheet is meant to be hacked. It includes files for layout and typography, as well as a variables file that calls mix-ins and other reusable patterns from Bootstrap. Grunt handles packaging it all together into a global css file.

### Recommended Plugins
- Akismet: blocks spam comments
- Authors Widget: adds customizable author info.
- Edit Flow: see above.
- Gravity Forms: additional functionality can be installed beyond just forms.
- Google Analytics for WordPress: Add the GA tracking code here, once site is live.
- Hyper Cache - static caching plugin
- Jetpack: adds several features, go here for the full list - http://jetpack.me
- Widget CSS Classes: Add a custom style for each individual widget.
- WordPress SEO: Should be configured at site launch.

Built by VIA Studio.

## Getting Started
Silencio is pretty easy to get up and running. There are a few tools you’ll need to set up if you want to make use of LESS and Silencio’s easy build scripts. If you’re not into that, you can skip this bit and work directly on the included CSS and JS files.

1. [Node.js](http://nodejs.org) Install this first.
2. [Grunt](http://gruntjs.com/getting-started) is used for automating common front-end tasks like compiling LESS to CSS and building a single minified JS and CSS file for production.
3. Copy Silencio into WordPress’ `wp-content/themes/` folder like you would any other theme.
4. From the command line, run `npm install`. This will install everything Grunt needs to compile LESS, CSS, and JS.

You only need to install Node & Grunt on the machine you’re using for development, so don’t worry if your hosting doesn’t support it or let you install things.

Once you’re done with all of that, you’re ready to start hacking!

## Grunt
There are two tasks included with Silencio.
* `grunt watch` monitors `res/less` for changes, compiles, and copies the results to `res/.tmp/css`. Autoprefixer then does it's magic and outputs results to `res/css`.
* `grunt` will build your theme for release. This includes compiling LESS to CSS, minifying CSS into `res/build/global.min.css`, and minifying JS into `res/build/global.min.js`.

### Configuration
Any JS files that you want to include in your `global.min.js` can be added to the `uglify.build.src` array. Similarly, add CSS files to `cssmin.build.src` to include them in `global.min.css`. LESS files will automatically be included in Silencio's watch task, unless they're in `less/lib`. This folder is for LESS utilities that don't correspond to a CSS file.

## LESS Mixins
`less/lib/variables.less` contains an assortment of mixins to make theme development faster, and is a handy place to store variables available in all stylesheets.

### .at2x(@path, @w, @h)
Given an image path and a width & height, sets a background image on an element and creates a media query for a 2x version of that asset. Make sure your 2x asset is named the same and has `@2x` at the end of the filename, and you’re good to go.

### .at2x(@path, @w, @h, @device-width)
Apply different 1x & 2x assets depending on device width.

## Theme Options
`theme-options.php` includes a basic set of location-related theme options. You can copy any of the `$options[] = ...` blocks to add your own. Just make sure you change your options ID to something different and it'll show up in the Appearance > Customize screen when Silencio is enabled.

## Metaboxes
`metaboxes.php` includes an example of a custom meta box created using the [CMB2](https://github.com/WebDevStudios/CMB2) metabox helper. Include this file in functions.php and uncomment the example metabox to see it in action. You can use this to add just about any kind of custom data to a post, page, or custom post type with an easier UI than what's provided by the built-in custom fields editor and without pulling in another plugin.

## Function Reference

### Template Tags
#### silencio_paging_nav()
Display navigation to next/previous set of posts when applicable.
#### silencio_paging_numeric()
Displays numeric pagination using Bootstrap’s pagination styles.
#### silencio_post_nav()
Display navigation to next/previous post when applicable.
#### silencio_comment($comment, $args, $depth)
Template for comments and pingbacks. Used as a callback by wp_list_comments() for displaying the comments.
#### silencio_posted_on()
Prints HTML with meta information for the current post-date/time and author.
#### silencio_categorized_blog()
Returns true if a blog has more than 1 category.
#### silencio_category_transient_flusher()
Flush out the transients used in silencio_categorized_blog.

### Shortcodes
Silencio bundles shortcodes that allow your users to take advantage of Bootstrap’s 12 column grid. Make use of this grid in posts like so.

    [row]
        [col6]
            Content!
        [/col6]
        [col6]
            More content!
        [/col6]
    [/row]

Replace col6 with col1 - col12, and make sure you don’t put more than 12 units in one row. Additionally, you can add offsets to your columns.

    [row]
        [col5 offset="1"]
            Content!
        [/col5]
        [col5]
            More content!
        [/col5]
    [/row]

### Custom widgets
Silencio includes two custom widgets. `/res/functions/widgets.php` is also a great place to register any custom widgets of your own.

#### SilencioCategoryPosts
Lists posts in the same category as the post you’re currently viewing.

#### SilencioChildrenPages
Lists pages that are direct descendants of the current page. This widget will not display if the current page has no children.

### Excerpts
Silencio provides some minimal customizes WordPress’ default excerpt settings. You can build upon these to suit your project.

#### via_excerpt_length($length)
Change the integer this returns to set your site’s excerpt length.

#### via_continue_reading_link()
Formats the “Continue Reading" link for excerpts.

#### via_auto_excerpt_more($more)
Replaces the default "…" excerpt with a more attractive "Continue Reading >>" link.

### TinyMCE
Silencio provides a handy dropdown for the aformentioned grid styles. You can add your own TinyMCE plugins & buttons using the `silencio_register_tinymce_plugin` and `silencio_add_tinymce_button` functions, respectively.

### Post Types & Taxonomies
Silencio includes a "Slider" example custom post type. It isn't included by default, but can be enabled by uncommenting the post-types.php include in functions.php. You can customize and copy this to create any custom post type.

taxonomies.php includes a similar example for a custom taxonomy.

### Jetpack
Silencio is compatible with Jetpack's infinite scroll plugin, and also disables auto-activation of new Jetpack modules by default. This prevents unexpected issues from new Jetpack functionality being enabled after a plugin update.
