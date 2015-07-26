<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT IT Consultant
 */

get_header(); 
?>

<?php if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) : ?>

    <div class="content-area">
        <div class="container">
            <section class="site-main" id="sitemain">
                <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
                        // Previous/next post navigation.
                        skt_itconsultant_pagination();
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
                </div><!-- blog-post -->
            </section>
            <div class="left">
            <?php get_sidebar('left');?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<img src="<?php echo get_stylesheet_directory_uri()."/images/dthumb.jpg"; ?>">
<?php else: ?>
     <section class="welcome_text">
		<div class="container">
        	<?php for($f=1; $f<5; $f++) { ?>
        	<?php if( get_theme_mod('page-setting'.$f) ) { ?>
        		<?php $queryvar = new wp_query('page_id='.get_theme_mod('page-setting'.$f));				
						while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
                        <div class="one_fourth <?php if($f % 4 == 0) { echo "last_column"; } ?>">
                        <div class="thumbox">
							<?php  if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                        </div>
						<h4><?php the_title(); ?></h4>
						<p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>"><span class="read"><?php _e('Read More','itconsultant'); ?></span></a>
                        </div>
						<?php endwhile;
						wp_reset_query(); ?>
            <?php } else { ?>
					<div class="one_fourth <?php if($f % 4 == 0) { echo "last_column"; } ?>">
                        <div class="thumbox">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/thumb-0<?php echo $f; ?>.png" alt="" />
                        </div>
						<h4><?php _e('Page Title','itconsultant'); ?> <?php echo $f; ?></h4>
						<p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque augue eros, posuere a condimentum sit amet, rhoncus eu libero. Maecenas in tincidunt turpis, ut rhoncus neque.','itconsultant'); ?></p>
                        <a href="#"><span class="read"><?php _e('Read More','itconsultant'); ?></span></a>
                        </div>
			<?php } } ?>
            <div class="clear"></div>
        </div><!-- container -->
        <div class="container">
        		<div class="blog-post"><div class="blog-title"><?php _e('Latest Blog','itconsultant'); ?></div><!-- blog-title -->
                		<?php global $wp_query; ?>
								<?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                                   <div class="blog-post-repeat">
								        <header class="entry-header">
           									 <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <div class="postmeta">
                                                     	<div class="post-date"><?php echo get_the_date(); ?></div><!-- post-date -->
                                                        <div class="post-comment"> &nbsp;|&nbsp; <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></div>
                                                        <div class="post-categories"> &nbsp;|&nbsp;  <?php the_category( __( ', ', 'itconsultant' )); ?></div>
                                                        <div class="clear"></div>
                                    			</div><!-- postmeta -->
                       			 	<div class="post-thumb"><?php the_post_thumbnail(); ?></div><!-- post-thumb -->
       							 </header><!-- .entry-header -->
                                <div class="entry-summary">
                            		<p><?php the_excerpt(); ?></p>
                           			<p class="read-more"><a href="<?php the_permalink(); ?>"><?php _e('read more','itconsultant'); ?></a></p>
                        </div><!-- .entry-summary -->
    				<div class="clear"></div>
</div><!-- blog-post-repeat -->
                                <?php endwhile; ?>
                                <?php skt_itconsultant_pagination(); ?>
                        <?php wp_reset_query(); ?>
                </div><!-- blog-post -->
        </div><!-- container -->
    </section><!-- welcome_text -->  

<?php endif; ?>


<?php get_footer(); ?>