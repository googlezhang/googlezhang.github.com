<?php $options = get_option('dark_theme_options'); ?>
<?php $site_description = get_bloginfo( 'description' );  
if ($site_description || ($options['photo'] <> '') && ($options['name'] <> '') && ($options['description'] <> '')) { ?>
<div class="vcard about">
<ul>
	<?php  if ($options['photo'] <> '') { ?><li class="photo"><img src="<?php echo($options['photo']); ?>" alt="<?php echo($options['name']); ?>" /></li><?php } ?> 
	<?php  if($options['name'] <> '') { ?><li class="fn n"><h3> <?php echo($options['name']); ?></h3></li><?php } ?>
	<?php  if ($options['description'] <> '')  { ?><?php echo '<li class="note">'.($options['description']).'</li>'; ?><?php } else { ?>
		<?php if ( $site_description ) 
		 echo '<li class="note">'.$site_description."</li>"; } ?>
</li>
</ul> 
</div>
<?php } ?>