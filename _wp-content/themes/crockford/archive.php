<?php get_header(); ?>

<?php get_sidebar(); ?>

 <div class="copy">

<div class="post-image">
                        
                     <img src="<?php bloginfo ('template_url'); ?>/images/CoastApartments2_832x328.jpg"? />
                        
                    </div>
</div>

<div class="post">

		<div class="entry">
              
                        <?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1>Archive for <?php the_time('F jS, Y'); ?></h1>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1>Archive for <?php the_time('F, Y'); ?></h1>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1 class="pagetitle">Archive for <?php the_time('Y'); ?></h1>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1 class="pagetitle">Author Archive</h1>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1 class="pagetitle">Blog Archives</h1>
			
			<?php } ?>

			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

			<?php while (have_posts()) : the_post(); ?>
			
				<div <?php post_class() ?>>
				
						<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                            <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
                        
                        <img src=" <?php echo catch_that_image() ?> " />
                            
						<?php the_content(); ?>
                        
                        <div class="postmetadata">
                                     
                                   Posted in <?php the_category(', ') ?> | <?php the_tags( 'Tags: ', ', ', ''); ?>
                            </div>

				</div>

			<?php endwhile; ?>

			<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
                </div>
    
	<?php else : ?>

		<h2>This blog only contains data from January 2012 onwards.  There was nothing found in this category.</h2>

	<?php endif; ?>

</div>

<?php get_footer(); ?>
