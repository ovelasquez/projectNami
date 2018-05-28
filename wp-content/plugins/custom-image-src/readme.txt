=== Custom Image_Src ===
Contributors: overlappingelvis
Tags: facebook, social sharing, image_src
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: trunk

Specify a custom sharing image for Facebook. You can upload an image, use the first image in the post, or use the post thumbnail.

== Description ==

If you’re sharing a link to a blog post on Facebook, having a thumbnail image makes for a much more effective share. If you have an image in the body of your post, Facebook will use that as the share image, but what if you don’t have any images in your post or want to specify an image you’re not using in the content? To solve this problem, I created a WordPress plugin that allows you to control which image shows when a link from your WordPress site is shared on Facebook.

* Thanks to [Dimas Begunoff](http://www.farinspace.com/wpalchemy-metabox/) for the amazingly helpful [WPAlchemy MetaBox PHP Class](http://www.farinspace.com/wpalchemy-metabox/).
* I’m using the `<link rel="image_src" href="…" />` approach. If you’re adding more Open Graph meta tags to your `<head>`, you’d probably want to use `<meta property="og:image" content="…" />`, but in that case you probably also don’t need this plugin.
* If you’re using any other plugins that add sharing info, Open Graph tags, or similar, this plugin will probably conflict with those.

For questions, comments, or bugs, you can reach me at [@Overlapping](http://twitter.com/Overlapping) or OverlappingElvis [at] gmail [dot] com.

== Frequently Asked Questions ==

= I uploaded an image but it's still pulling my post thumbnail or first image from post! =

Uncheck the appropriate box in the panel on the post editing screen.

= Why use link rel="image_src" instead of meta property="og:image"? =

Because that's what I'm used to using. If you can tell me why I should use `<meta property="og:image" content="…" />`, I'm totally open to change.

= Shouldn't you always set a sharing image? =

Probably, yeah. I might add a setting to always add a default sharing image you can set, if none of the other options are checked.