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
<section class="vf-inlay" style="background-color: #f3f3f3;">
    <div class="vf-inlay__content" style="background-color: #fff;">
        <main class="vf-inlay__content--full-width | hero-container">
            <h3 class="vf-links__heading">Featured</h3>&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
            <div class="vf-grid | hero-unit">
                <div class="hero-left-column">
					
            <!-- MAIN POST -->

                    <?php query_posts(array('posts_per_page' => 1, 'category__not_in' => 32 ));
$ids = array();
while (have_posts()) : the_post();
$ids[] = get_the_ID(); ?>
                    <?php include(locate_template('partials/vf-summary--article.php', false, false)); ?>
                    <?php endwhile;?>
                </div>
                <div class="hero-right-column">
					
            <!-- POSTS 2-3 -->

                    <?php
query_posts(array('post__not_in' => $ids, 'posts_per_page' => 2, 'category__not_in' => 32 ));
while (have_posts()) : the_post(); 
					$ids[] = get_the_ID(); ?>
                    <?php include(locate_template('partials/vf-summary--article-no-excerpt.php', false, false)); ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </main>
    </div>
	
    <div class="vf-inlay__content vf-u-background-color-ui--white">
        <main class="vf-inlay__content--full-width | latest-posts-container">
            <div class="vf-grid ">
                <div class="latest-title-column">
                    <h3 class="vf-links__heading">Latest</h3>&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                </div>

                <!--  POSTS 4-9 -->

                <?php query_posts(array('post__not_in' => $ids, 'posts_per_page' => 3));
while (have_posts()) : the_post(); ?>
                <?php	$ids[] = get_the_ID(); ?>
                <?php include(locate_template('partials/vf-summary--article.php', false, false)); ?>
                <?php endwhile; ?>
            </div>
            <div class="vf-grid">
                <div style="min-width: 150px;"></div>
                <?php query_posts(array('post__not_in' => $ids, 'posts_per_page' => 3));
while (have_posts()) : the_post(); ?>
                <?php	$ids[] = get_the_ID(); ?>

                <?php include(locate_template('partials/vf-summary--article.php', false, false)); ?>
                <?php endwhile; ?>
            </div>
        </main>
    </div>
	
    <div class="vf-inlay__content vf-u-background-color-ui--black | pow-container" style="padding-top: 0;">
        <main class="vf-inlay__content--full-width" style="margin: 0;">

            <!-- POW LOOP -->

            <?php $my_query = new WP_Query( 'category_name=picture-week&posts_per_page=1' );
while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <div class="vf-grid | vf-grid__col-2 | pow-article">
                <div class="pow-article-summary">
                    <h3 class="vf-links__heading | pow-heading">Picture of the week</h3>&nbsp;&nbsp;<i
                        class="fas fa-arrow-circle-right | icon-green"></i>
                    <div class="pow-title">
                        <a href="<?php the_permalink(); ?>" class="vf-summary__link"><?php echo the_title(); ?></a>
                    </div>
                    <p class="vf-summary__text"><?php echo get_the_excerpt(); ?></p>
                </div>
                <div class="pow-artcle-thumbnail"><?php the_post_thumbnail(); ?></div>
            </div>
            <?php endwhile; ?>
        </main>
    </div>
	
	
	<div class="embl-grid | embl-etc-container" style="grid-column-gap: 0; background-color: #fff">
        <div class="embl-etc-left-col">
		<h3 class="vf-text vf-text-heading--2 | embl-etc | embl-etc-heading">EMBL etc.</h3>
		</div>
        <div class="embl-etc-right-col">
		<h3 class="vf-text vf-text-heading--4 | embl-etc">Read the latest Issues of our magazine - EMBL etc.</h3>
			<div class="vf-grid | vf-grid__col-2">
        <div class="magazine">
				<img src="wp-content/uploads/2019/10/issue93.png">
			<div class="topic-list" style="color: #fff;">
				<h3 class="vf-text vf-text-heading--5 | embl-etc">Issue 93, Summer 2019</h3>
							<ul class="vf-list vf-list">
    <li class="vf-list__item">&ndash;&nbsp;Robots grow bio-inspired shapes</li>
    <li class="vf-list__item">&ndash;&nbsp;Wielding the genetic scissors</li>
    <li class="vf-list__item">&ndash;&nbsp;Twenty years of EMBLEM</li>
</ul>

				</div>
					  <a class="vf-link | magazine-download" href="#">Download PDF</a>			
		
				</div>

   <div class="magazine">
				<img src="wp-content/uploads/2019/10/issue92.png">
			<div class="topic-list" style="color: #fff;">
				<h3 class="vf-text vf-text-heading--5 | embl-etc">Issue 92, Winter 2018</h3>
							<ul class="vf-list vf-list">
<li class="vf-list__item">&ndash;&nbsp;Constructing tissue shapes with light</li>
    <li class="vf-list__item">&ndash;&nbsp;In the flesh</li>
    <li class="vf-list__item">&ndash;&nbsp;Translating science into designs</li>
</ul>
			</div>
			  <a class="vf-link | magazine-download" href="#">Download PDF</a>			

				</div>
    </div>
<!-- 			<p class="vf-text--body">Looking for past print editions of EMBLetc? Browse our archive, going back 20 years.</p>
			<a class="vf-link | magazine-download" href="#">Archive</a> -->
		</div>
    </div>
</section>
<?php get_template_part('partials/footer'); ?>