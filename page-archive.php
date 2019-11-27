<?php
/*
Template Name: Archives
*/
get_template_part('partials/header');

the_post();
?>

<section class="vf-inlay">
	<div class="vf-inlay__content vf-u-background-color-ui--white">
		<main class="vf-inlay__content--full-width | vf-u-margin__bottom--0 | category-container">
			<div>
				<h2 class="vf-text vf-text-heading--1">Archive</h2>
			</div>
			<div class="latest-title-column">
				<h3 class="vf-links__heading">Latest</h3>&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
			</div>
			<div class="vf-grid vf-grid__col-3 | category-latest">
				<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'posts_per_page' => 9,
    'paged' => $page,); 
query_posts($args);?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php include(locate_template('partials/vf-summary--article.php', false, false)); ?>
				<?php endwhile; endif; ?>
			</div>
			<?php vf_pagination();?>
		</main>
	</div>

	<div class="vf-inlay__content | vf-u-background-color--grey--dark | vf-u-padding__top--md | vf-u-padding__bottom--md | archive-container">
		<main class="vf-inlay__content--full-width | vf-u-margin--0">
			<div class="vf-grid" style="--page-grid-gap: 0px;">
				<div class="vf-links vf-links--tight vf-links__list--s">
					<h3 class="vf-links__heading">Last 6 months</h3>&nbsp;&nbsp;<i
						class="fas fa-arrow-circle-right"></i>
				</div>
				<div class="vf-links vf-links--tight vf-links__list--s | border-right">
					<ul class="vf-links__list vf-links__list--secondary | vf-list">
						<?php 
$args = array(
    'type'            => 'monthly',
	'limit'           => '6',
    'show_post_count' => true,
    'echo'            => 1,
    'order'           => 'DESC',
	'before' => '<li class="vf-list__item">',
    'after'  => '</li>'
);
wp_get_archives( $args );
?>
					</ul>
				</div>

				<div class="vf-links vf-links--tight vf-links__list--s | vf-u-padding__left--lg">
					<h3 class="vf-links__heading">By year</h3>&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
				</div>
				<div class="vf-links vf-links--tight vf-links__list--s | vf-u-background-color--gre | ">
					<ul class="vf-links__list vf-links__list--secondary | vf-list">
						<?php 
$args = array(
	'format' => 'custom',
    'type'            => 'yearly',
    'show_post_count' => true,
    'echo'            => 1,
    'order'           => 'DESC',
	'before' => '<li class="vf-list__item">',
    'after'  => '</li>'
);
wp_get_archives( $args );
?>
					</ul>
				</div>

				<div class="vf-links vf-links--tight vf-links__list--s| vf-u-padding__left--lg | border-left">
					<h3 class="vf-links__heading">By topics</h3>&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
				</div>
				<div class="vf-links vf-links--tight vf-links__list--s">
					<ul class="vf-links__list vf-links__list--secondary | vf-list">
						<?php 
			$args = array(
	'title_li' => '',
	'show_count' => true
);
wp_list_categories( $args );
?>
					</ul>
				</div>
			</div>
		</main>
	</div>

	<?php include(locate_template('partials/embletc-container.php', false, false)); ?>

	<?php include(locate_template('partials/newsletter-container.php', false, false)); ?>
</section>
<?php get_template_part('partials/footer');?>