<?php get_header(); ?>

								
                    <!-- Inner Content Section starts here -->
                    <div id="inner_content_section">
               			<?php if(of_get_option('show_magpro_slider_page') == 'true') : ?>                    
						<?php get_template_part( 'slider', 'wilto' ); ?>
                  		<?php endif; ?>
                        
                        	             
                        <!-- Main Content Section starts here -->
                        <div id="main_content_section">
                


												<!-- Actual Post starts here -->
												<div <?php post_class('actual_post') ?> id="post-<?php the_ID(); ?>">
                                                	<div class="ta_meta_container">
													<div class="actual_post_title_page">
														<h2><?php _e('Not Found!','Spartan'); ?></h2>
													</div>
													</div>
													<div class="post_entry">

														<div class="entry">
															<p><?php _e('Sorry but the page/post your looking for does not exist.','Spartan'); ?></p>
															<div class="clear"></div>
														</div>

														
													
													</div>
                                                    
												</div>
												<!-- Actual Post ends here -->		

                
                
                        </div>	
                        <!-- Main Content Section ends here -->

                        <!-- Sidebar Section starts here -->
                        <?php get_sidebar(); ?> 	
                        <!-- Sidebar Section ends here -->





                    </div>	
                    <!-- Inner Content Section ends here -->
							
			<?php get_footer(); ?>								
									

							
								
									
