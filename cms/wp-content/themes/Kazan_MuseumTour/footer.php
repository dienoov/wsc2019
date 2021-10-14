</div>
<footer id="footer">
    <div class="container">
        <div id="copyright">
            &copy; <?php echo esc_html( date_i18n( __( 'Y', 'blankslate' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
        </div>
        <div id="social">
			<?php dynamic_sidebar( 'social-icons' ) ?>
        </div>
    </div>
</footer>
</div>
<div id="loading">Please Wait</div>
<?php wp_footer(); ?>
</body>
</html>