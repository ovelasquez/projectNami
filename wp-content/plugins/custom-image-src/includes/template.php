<p>
	<?php global $custom_image_src_media_access; ?>
	<?php $mb->the_field('image'); ?>
	<?php $custom_image_src_media_access->setGroupName('share_image')->setInsertButtonLabel('Upload')->setTab('type'); ?>
	<?php echo $custom_image_src_media_access->getField(array( 'name' =>$mb->get_the_name(), 'value' => $mb->get_the_value() )); ?>
	<?php echo $custom_image_src_media_access->getButton(); ?>
</p>
<?php if ( current_theme_supports('post-thumbnails') ) : ?>
<p>
	<?php $mb->the_field('post_thumbnail') ?>
	<input type="checkbox" id="post_thumbnail" name="<?php $mb->the_name(); ?>" value="post_thumbnail"<?php echo $mb->is_value('post_thumbnail')?' checked="checked"':''; ?> /> Use Post Thumbnail
</p>
<?php endif; ?>
<p>
	<?php $mb->the_field('image_from_post'); ?>
	<input type="checkbox" id="image_from_post" name="<?php $mb->the_name(); ?>" value="image_from_post"<?php echo $mb->is_value('image_from_post')?' checked="checked"':''; ?> /> Use First Image In Post
</p>