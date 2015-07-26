<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SKT IT Consultant
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper_main">   
        <header class="header">
        	<div class="container">
                <div class="head_fix">
                 <div id="logo">
                 	<a href="<?php echo esc_url(home_url('/'));?>">
                            <h2><?php bloginfo( 'name' ); ?></h2>
                            <span><?php bloginfo( 'description' ); ?></span>
                    </a>
                </div>
                <div class="header_right">
                   <h4 class="phone"><span><?php _e('Call Us:','itconsultant'); ?></span> <?php echo get_theme_mod('contact_call', '+62 500 800 123'); ?></h4> 
                   <div class="mobile_nav"><a href="#"><?php _e('Menu...','itconsultant'); ?></a></div>
                <nav id="nav">
                  <?php wp_nav_menu( array('theme_location'  => 'primary', 'container' => '', 'container_class' => '', 'items_wrap' => '<ul>%3$s</ul>' ) ); ?>
                 </nav>                     
                </div>
	            <div class="clear"></div> 
                </div><!--end.head_fix-->                           
            </div>             
        </header>
		<?php if ( is_home() || is_front_page() ) {?>
        <section id="home_slider">
        <div class="container">
        	<?php
					$slide_image = '';
					$slide_image = array(
						1 => get_template_directory_uri().'/images/slides/slide_01.jpg',
						2 => get_template_directory_uri().'/images/slides/slide_02.jpg',
						3 => get_template_directory_uri().'/images/slides/slide_03.jpg',
						4 => get_template_directory_uri().'/images/slides/slide_04.jpg',
						5 => get_template_directory_uri().'/images/slides/slide_03.jpg',
					);
			$slAr = array();
			$m = 0;
			for ($i=1; $i<6; $i++) {
				if ( get_theme_mod('slide'.$i,$slide_image[$i]) != "" ) {
					$imgSrc 	= get_theme_mod('slide'.$i, $slide_image[$i]);
					$imgTitle	= get_theme_mod('slidetitle'.$i);
					$imgLink	= get_theme_mod('slideurl'.$i);
					if ( strlen($imgSrc) > 3 ) {
						$slAr[$m]['image_src'] = get_theme_mod('slide'.$i, $slide_image[$i]);
						$slAr[$m]['image_title'] = get_theme_mod('slidetitle'.$i);
						$slAr[$m]['image_link'] = get_theme_mod('slideurl'.$i);
						$m++;
					}
				}
			}
			$slideno = array();
			if( $slAr > 0 ){
				$n = 0;?>
                <div class="slider-wrapper theme-default"><div id="slider" class="nivoSlider">
                <?php 
                foreach( $slAr as $sv ){
                    $n++; ?><img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']);?>" title="<?php echo esc_attr('#slidecaption'.$n); ?>" /><?php
                    $slideno[] = $n;
                }
                ?>
                </div>
				    <?php
                foreach( $slideno as $sln ){ ?>
                    <div id="slidecaption<?php echo $sln; ?>" class="nivo-html-caption">
                    <div class="slide_info">
                            <h1><?php echo get_theme_mod('slidetitle'.$sln, 'Slider caption'.$sln); ?></h1>
                    </div>
                    </div><?php } ?>
                </div>
                <div class="clear"></div><?php } ?>
          </div>                  
        </section>
        <?php } ?>