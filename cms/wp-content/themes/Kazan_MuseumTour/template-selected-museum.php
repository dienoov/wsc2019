<?php

/*
 * Template Name: Selected Museum
 */

get_header();
the_post(); ?>

<div class="selected" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
    <div class="container">
        <div class="title">
            <h2><?php the_title() ?></h2>
        </div>
        <div class="content">
			<?php the_content() ?>
        </div>
        <div class="title">
            <h3>News</h3>
        </div>
		<?php $posts = get_posts( [ 'posts_per_page' => 3, 'category_name' => $post->post_name ] );
		foreach ( $posts as $post ):?>
            <article class="card">
                <div class="content">
                    <header>
                        <h3>
                            <a href="<?php echo get_permalink( $post ) ?>">
								<?php echo get_the_title() ?>
                            </a>
                        </h3>
                    </header>
                    <p><?php echo wp_strip_all_tags( $post->post_content ) ?></p>
                </div>
                <figure>
					<?php echo get_the_post_thumbnail() ?>
                </figure>
            </article>
		<?php endforeach; ?>
    </div>
</div>

<?php get_footer() ?>
