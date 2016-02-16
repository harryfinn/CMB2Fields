#CMB2Fields

## Using this repo

This repo contains a set of PHP classes designed to be used in conjunction with the [CMB2 library](https://github.com/WebDevStudios/CMB2). These classes have been created to add a base set of methods to handle the fetching of cmb2 data fields in your WordPress site and output them, applying filters and condition checks to aid in data formatting.

The base class, `CMB2Fields`, can be extended into other files (as per the other example classes) to create a template or Custom Post Type specific set of methods for use in view partials and page templates.

## Within WordPress

This repo is intended as a library resource, to be updated and added to with code amends/improvements and examples of useful classes, therefore it is unlikely that you will want to clone this repo into a project directly.

You can of course clone this repo and simply remove the `examples` folder or copy and paste the required code from raw as necessary.

In order to use these helper classes in a WordPress project, you need to ensure that the correct files are loaded when called. I've managed this via the `spl_autoload_register` method. In the `functions.php` file you'll find all the necessary functions to load the base helpers.

There are 2 autoloaders, `autoload_classes` and `autoload_lib_classes`. The first looks for classes with a filename convention of lowercased with words separatated by hypens i.e. `CustomMetaboxes` becomes `class.custom-metaboxes.php`. However this will not find the correct file for classes named like `CMB2Fields` as it would try and look for `class.c-m-b-2-fields.php` which is what we want. Therefore, the second autoloader looks for files that are just lowercased i.e. `class.cmb2fields.php`

## Using a CMB2Field Class

To access the base CMB2Fields class in a view, assign a variable to new-up the class `$cmb2_fields = new CMB2Fields(get_the_ID());`

Typically you will always want to pass the current page/post/custom post type (singular) ID to the CMB2Fields (or any extended) class as this will be the ID to which custom meta data is fetched from the WordPress database.

To use a custom class, such as the example `HeroBanner` class, you would simply replace it's class name in place of the base class:

```$hero_banner_fields = new HeroBanner(get_the_ID());```

You can then call any of the methods assoicated with the `HeroBanner` class, whether that be a method specific to itself or of the parent `CMB2Fields` class:

```echo $hero_banner_fields->field('hero-image');```

`hero-image` refers to a custom meta field named `hero-image` in this example.
