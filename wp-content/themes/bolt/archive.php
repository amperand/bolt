<?php get_header(); ?>

<div id="main-content" class="main-content">
    <div id="primary" class="content-area row">
        <div id="content" class="site-content columns medium-8" role="main">
            <header class="entry-header">
                <h1 class="page-title">
                    <?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', '' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', '' ), get_the_date( _x( 'F Y', 'monthly archives date format', '' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', '' ), get_the_date( _x( 'Y', 'yearly archives date format', '' ) ) );

						elseif(is_category()) :
							echo single_cat_title('');
						else :
							_e( 'Archives', '' );

						endif;
					?>
                </h1>
            </header>
            <?php while ( have_posts() ) : the_post();
				include('parts/content-archive.php' );
			endwhile; 
			include("parts/pagination.php");?>
        </div>
        <!-- #content -->
        <div id="content-sidebar" class="content-sidebar widget-area columns medium-4" role="complementary">
            <?php  dynamic_sidebar('default-sidebar'); ?>
        </div>
    </div>
    <!-- #primary --> 
</div>
<!-- #main-content -->

<?php get_footer();

