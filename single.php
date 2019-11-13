<?php

$title = esc_html(get_the_title());
$author_url = get_author_posts_url(get_the_author_meta('ID'));
$user_id = get_the_author_meta('ID');


get_template_part('partials/header');

the_post();

?>

    <main class="embl-grid embl-grid--has-centered-content"
        style="background-color: #fff; padding-top: 48px; margin-bottom: 0; ">
        <div class="article-left-col">
            <div class="vf-article-meta-information | author-box" style="display: block;">
                <div class="vf-author | vf-article-meta-info__author">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 48); ?>
                    <p class="vf-author__name | vf-text-body--5">
<a class= "vf-link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), ); ?>"><?php the_author(); ?></a>                   
					</p>
                </div>
                <div class="vf-meta__details">
                    <time class="vf-meta__date | vf-text-body--5" title="<?php the_time('c'); ?>"
                        datetime="<?php the_time('c'); ?>"><?php the_time(get_option('date_format')); ?></time>
                    <p class="vf-meta__date | vf-text-body--5"><?php echo reading_time(); ?> READ</p>
                </div>
                <div class="vf-meta__details">
                    <p class="vf-meta__topics | vf-text-body--5">Topics:&nbsp;<a
                            class="vf-meta__topics | vf-text-body--6"><?php the_category(); ?></a></p>
                </div>
            </div>
        </div>
		
        <div class="vf-content" style="padding-bottom: 36px;">
            <h1><?php the_title(); ?></h1>
            <h2>
                Single-cell sequencing helps researchers understand how mouse embryo cells generate different organs in
                the body
            </h2>
            <figure class="vf-figure">
                <?php the_post_thumbnail('full', array('class' => 'vf-figure__image')); ?>
                <figcaption class="vf-figure__caption">
                    <?php echo wp_kses_post(get_post(get_post_thumbnail_id())->post_excerpt); ?></figcaption>
            </figure>
            <?php the_content(); ?>
            <p class="vf-summary__date"><?php the_tags(); ?></p>
        </div>
		
        <div class="social-share-box">
            <?php echo do_shortcode('[Sassy_Social_Share]') ?>
        </div>
        <hr class="vf-divider">
    </main>
	
    <section class="vf-inlay">
        <div class="vf-inlay__content vf-u-background-color-ui--white">
            <main class="vf-inlay__content--full-width">
                <div class="vf-grid | related-posts-container">
                    <div style="min-width: 150px;">
						
						<!-- RELATED POSTS - NOT WORKING (TAXONOMY) -->
						
                        <h3 class="vf-links__heading">Related posts</h3>&nbsp;&nbsp;<i
                            class="fas fa-arrow-circle-right"></i>
                    </div>
                    <div>
                        <?php query_posts('showposts=1'); ?>
                        <?php $posts = get_posts('numberposts=1&offset=3'); foreach ($posts as $post) : start_wp(); ?>
                        <?php static $count3 = 0; if ($count3 == "1") { break; } else { ?>
                        <?php include(locate_template('partials/vf-summary--article.php', false, false)); ?>
                        <?php $count3++; } ?>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <?php query_posts('showposts=1'); ?>
                        <?php $posts = get_posts('numberposts=1&offset=4'); foreach ($posts as $post) : start_wp(); ?>
                        <?php static $count4 = 0; if ($count4 == "1") { break; } else { ?>
                        <?php include(locate_template('partials/vf-summary--article.php', false, false)); ?>
                        <?php $count4++; } ?>
                        <?php endforeach; ?>
                    </div>
                    <div>
                        <?php query_posts('showposts=1'); ?>
                        <?php $posts = get_posts('numberposts=1&offset=5'); foreach ($posts as $post) : start_wp(); ?>
                        <?php static $count5 = 0; if ($count == "1") { break; } else { ?>
                        <?php include(locate_template('partials/vf-summary--article.php', false, false)); ?>
                        <?php $count5++; } ?>
                        <?php endforeach; ?>
                    </div>
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
				<img src="wp-content/uploads/2019/02/issue93.png">
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
				<img src="wp-content/uploads/2019/02/issue92.png">
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
<?php get_template_part('partials/footer');?>