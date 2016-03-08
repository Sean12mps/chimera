<?php 
/*	
	Navigation
	------------
	@origin : Chimera_Theme_Structure::chimera_head_part_content

	@data :
	- $menu
	- $site_name
	- $site_url
	- $description
	- $container_class

 */
 ?>
<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="<?php echo $container_class; ?>">

		<div class="navbar-header">

			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="<?php echo $site_url; ?>"><?php echo $site_name; ?></a>

		</div>

		<?php echo $menu; ?>

	</div>
	
</nav>