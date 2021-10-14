<?php get_header() ?>

<div id="hero">
    <div class="title">
        <h1>Welcome to Kazan Museum</h1>
    </div>
</div>

<div class="container">
    <div class="title">
        <h2>News</h2>
    </div>
    <div class="deck">
		<?php $posts = get_posts( [ 'posts_per_page' => 6 ] );
		foreach ( $posts as $post ): ?>
            <article class="card">
                <div class="content">
                    <header>
                        <h3>
                            <a href="<?php echo get_permalink( $post ) ?>">
								<?php echo get_the_title( $post ) ?>
                            </a>
                        </h3>
                    </header>
                    <p>
						<?php echo wp_strip_all_tags( $post->post_content ) ?>
                    </p>
                </div>
                <figure>
					<?php echo get_the_post_thumbnail( $post ) ?>
                </figure>
            </article>
		<?php endforeach; ?>
    </div>
</div>

<div class="container">
    <div class="title">
        <h2>Museums</h2>
    </div>
    <div class="deck">
		<?php $posts = get_posts( [ 'posts_per_page' => 6, 'post_type' => 'page' ] );
		foreach ( $posts as $post ): ?>
            <article class="card">
                <div class="content">
                    <header>
                        <h3>
                            <a href="<?php echo get_permalink( $post ) ?>">
								<?php echo get_the_title( $post ) ?>
                            </a>
                        </h3>
                    </header>
                    <p>
						<?php echo wp_strip_all_tags( $post->post_content ) ?>
                    </p>
                </div>
                <figure>
					<?php echo get_the_post_thumbnail( $post ) ?>
                </figure>
            </article>
		<?php endforeach; ?>
    </div>
</div>

<div class="container">
    <div class="title">
        <h2>Contact Us</h2>
    </div>
    <form class="form" action="https://formspree.io/email@domain.tld" method="POST">
        <div class="input">
            <input type="text" name="name" placeholder="Name">
        </div>
        <div class="input">
            <input type="email" name="_replyto" placeholder="Email">
        </div>
        <div class="input">
            <textarea name="content" rows="5" placeholder="Message"></textarea>
        </div>
        <div class="input">
            <input type="submit" value="Send">
        </div>
    </form>
</div>

<?php get_footer() ?>
