# Silencio

We all know that WordPress is a great platform for content generation. Silencio makes structuring your content types even easier. This starter theme was specifically built  for iterative project development. By rapidly prototyping in the browser, any content requirement can easily be solved.

## Features

### Environment Variable
Set up your project locally and on production.

### Grunt
Our Grunt config compiles Less to CSS and CoffeeScript to Javascript for local development. For production deploys, all resources get concatenated and minified into a build folder.

### Meta Boxes
We’ve incorporated the WP-Alchemy library for easily adding custom meta-boxes to projects. The framework is very extensible.

### Templates
There are two templates bundled with Silencio - Typography and UI Kit. Using these templates, the designer and developer can style all available type and bootstrap outputs in the browser. They can be removed from the project once design is complete.

### Widgets
Included are Children Pages and Category Posts widgets. They give you more options than the standard WordPress counterparts. Category Posts let you choose the categories from which you’d like to display entries. Children Pages displays all child pages of the current parent. If there are no children, nothing is displayed.

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