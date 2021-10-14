<?php get_header() ?>

<div id="banner">
	<?php the_post_thumbnail(); ?>
</div>

<div class="container single">
	<div class="title">
		<h2><?php the_title() ?></h2>
	</div>
    <div class="content">
        <p><?php the_content(); ?></p>
    </div>
</div>

<?php get_footer() ?>
