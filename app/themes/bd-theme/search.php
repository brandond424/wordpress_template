<?php get_header(); ?>
	
	<div class="full-container">
		<div class="banner black">
			<div class="banner-content">
				<div class="container">
					<h1>Search Results</h1>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="container">
				<div class="col-md-12">
					<div class="search-bar">
						<form role="search" method="get" id="searchform" class="searchform" action="<?php echo site_url('/'); ?>">
							<input type="text" class="search-text" id="s" name="s">
							<button type="submit" class="blue-button" id="searchsubmit">Search</button>
						</form>
					</div>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="search-result">
							<a href="<?php the_permalink(); ?>">
								<h2><?php the_title(); ?></h2>
							</a>
							<?php the_content(); ?>
						</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
