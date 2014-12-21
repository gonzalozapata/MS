  <div style="background-color:#111; color:#FFF;">
  <div class="container">
	<div class="row">
		<div class="col-md-4">
            <?php
			if ( is_active_sidebar( 'sidebar-footer-1' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
            <?php
			if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
			<?php endif; ?>
		</div>
		<div class="col-md-4">
           <?php
			if ( is_active_sidebar( 'sidebar-footer-3' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
			<?php endif; ?>

		</div>
	</div>
  </div>
  </div>
  
  	<?php wp_footer(); ?>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
  </body>
</html>
