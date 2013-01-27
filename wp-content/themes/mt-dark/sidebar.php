<div class="sidebar grid_4">
    <?php if ( is_active_sidebar( 'sidebar-top' ) ) {
    ?>
    <ul class="widget tab">
        <?php dynamic_sidebar('sidebar-top');?>
    </ul>
    <?php } else {?>
	<?php get_search_form();?>
	<?php get_template_part('about');?>
	<div  id="t1">
		<ul id="t1-nav">
			<li >
				<a href="#tab1" ><?php _e('Categories', 'mt-dark');?></a>
			</li>
			<li >
				<a href="#tab2" ><?php _e('Archives', 'mt-dark');?></a>
			</li>
			<li >
				<a href="#tab3" ><?php _e('Tags', 'mt-dark');?></a>
			</li>
		</ul>
		<div class="tab" id="tab1">
			<ul>
				<?php wp_list_categories('show_count=0&title_li=');?>
			</ul>
		</div>
		<div class="tab" id="tab2">
			<ul>
				<?php wp_get_archives('type=monthly');?>
			</ul>
		</div>
		<div class="tab" id="tab3">
			<?php wp_tag_cloud('smallest=10&largest=24&number=28&order=desc');?>
		</div>
		<script type="text/javascript">
			var tabber1 = new Yetii({
				id : 't1',
				active : 1
			});

		</script>
	</div>
	<?php }?>
	<?php if ( is_active_sidebar( 'sidebar380px' ) ) {
	?>
	<ul class="widget tab">
		<?php dynamic_sidebar('sidebar380px');?>
	</ul>
	<?php }?>
</div>