<?php 
// 	Header
get_header();


// 	Loop
if ( have_posts() ) :

	while ( have_posts() ) : the_post();

		get_template_part( 'templates/content' );

	endwhile;

endif;


// 	Footer
get_footer();