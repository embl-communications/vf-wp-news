<?php

get_template_part('partials/header');

$title = get_the_title(get_option('page_for_posts'));

if (is_search()) {
  $title = sprintf(__('Search: %s', 'vfwp'), get_search_query());
} elseif (is_category()) {
  $title = sprintf(__('Category: %s', 'vfwp'), single_term_title('', false));
} elseif (is_tag()) {
  $title = sprintf(__('Tag: %s', 'vfwp'), single_term_title('', false));
} elseif (is_author()) {
  $title = sprintf(__('Author: %s', 'vfwp'), get_the_author_meta('display_name'));
} elseif (is_year()) {
  $title = sprintf(__('Year: %s', 'vfwp'), get_the_date('Y'));
} elseif (is_month()) {
  $title = sprintf(__('Month: %s', 'vfwp'), get_the_date('F Y'));
} elseif (is_day()) {
  $title = sprintf(__('Day: %s', 'vfwp'), get_the_date());
} elseif (is_post_type_archive()) {
  $title = sprintf(__('Type: %s', 'vfwp'), post_type_archive_title('', false));
} elseif (is_tax()) {
  $tax = get_taxonomy(get_queried_object()->taxonomy);
  $title = sprintf(__('%s Archives:', 'vfwp'), $tax->labels->singular_name);
}
?>

<section class="vf-inlay">
	<div class="vf-inlay__content | vf-u-background-color-ui--white">
		<main class="vf-inlay__content--full-width | category-container">
			<div>
				<h2 class="vf-text vf-text-heading--1 | vf-u-margin__bottom--xl"><?php wp_title(''); ?></h2>
			</div>
			<div class="latest-title-column">
				<h3 class="vf-links__heading">Latest</h3>&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
			</div>
			<div class="vf-grid vf-grid__col-3 | category-latest">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
if ( $post->ID == $do_not_duplicate ) continue; ?>
				<?php include(locate_template('partials/vf-summary--article.php', false, false)); ?>
				<?php endwhile; endif; ?>
			</div>
			<?php vf_pagination(); ?>
		</main>
	</div>

	<div class="vf-inlay__content vf-u-background-color-ui--off-white">
		<main class="vf-inlay__content--full-width">
			<div class="embl-grid | category-latest | category-top-stories">
				<div style="min-width: 150px;">
					<h3 class="vf-links__heading">Popular</h3>&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
				</div>
				<div class="vf-grid vf-grid__col-3">
					<?php $popular = new WP_Query(array('posts_per_page'=>3, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC', 'cat' => get_query_var('cat')));
	while ($popular->have_posts()) : $popular->the_post(); 
	include(locate_template('partials/vf-summary--article-no-excerpt.php', false, false)); ?>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</main>
	</div>

	<?php include(locate_template('partials/embletc-container.php', false, false)); ?>

	<?php include(locate_template('partials/newsletter-container.php', false, false)); ?>

</section>
<?php get_template_part('partials/footer');?>