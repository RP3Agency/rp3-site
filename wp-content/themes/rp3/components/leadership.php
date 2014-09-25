<?php
?>

<section class="leadership">

	<h1>Leadership</h1>

	<div class="wrapper">

		<?php for ( $i = 0; $i < 8; $i++ ) : ?>

		<article class="leadership__person">

			<div class="leadership__photo">

				<img src="http://placekitten.com/g/150/150">

			</div>
			<!-- // .leadership__photo -->

			<div class="leadership__content">

				<h2 class="leadership__name">Beth Johnson</h2>

				<div class="leadership__title">Principal, President</div>

				<div class="leadership__biography--wide">bio for wide pages</div>

				<ul class="leadership__social social">
					<li class="email"><a href="#!">Email</a></li>
					<li class="linkedin"><a href="#!">LinkedIn</a></li>
					<li class="twitter"><a href="#!">Twitter</a></li>
				</ul>

			</div>
			<!-- // .leadership__content -->

			<div class="leadership__biography--narrow">bio for narrow pages</div>

		</article>
		<!-- // .leadership__person -->

		<?php endfor; ?>

	</div>
	<!-- // .wrapper -->

</section>
<!-- // .leadership -->
