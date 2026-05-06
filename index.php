<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="keywords" content="shop, buisness, fakeshop," />
	<meta name="author" content="Moss, Kanav, Vichetra" />
	<title>FakeShop Home</title>
	<link rel="stylesheet" href="./style/style.css" />

	<style>
		.hero {
			position: relative;
			height: 100vh;
			width: 100%;
			overflow: hidden;
			margin-top: 0;
		}

		/* EACH SLIDE */
		.slide {
			position: absolute;
			inset: 0;
			background-size: cover;
			background-position: center;
			opacity: 1;
			transition: opacity 1s ease;
		}

		.content p h2 {
			text-align: center;
		}
	</style>
</head>

<body>
	<?php
	include("./includes/nav.inc");
	?>
	<section class="hero">
		<div class="slide" style="background-image: url(/images/Hero.webp)">
			<div class="banner-text">
				<h2>Looking for a new career?</h2>
				<p>
					&copy;FakeShop, The place where dreams are built on child labour.
					Join us now for a brighter tomorrow, apply today!
				</p>
			</div>
		</div>
	</section>
	<div class="content-area">
		<div class="content">
			<div class="who">
				<h2>Who we are</h2>
				<p>
					Here at FakeShop we value our users, and as such, aim to constantly
					be pushing the bounds of our customer service and experience model.
					We are proud about what we create and strive for.
				</p>
			</div>
			<div class="what">
				<h2>What we do</h2>
				<p>
					We curate our store using a propriatary algorythm that ensures
					customers see what they really want, not trending garbage.
				</p>
			</div>
			<div class="why">
				<h2>Why work with us</h2>
				<p>We have many benifits that rival even our closest comptitors</p>
				<table class="home-table">
					<caption>
						Benifits With FakeShop
					</caption>
					<thead>
						<tr>
							<th>Benifits</th>
							<th>FakeShop</th>
							<th>Amazon</th>
							<th style="padding-left: 40px; padding-right: 40px">Ebay</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Discounts</td>
							<td>Yes</td>
							<td colspan="2">No</td>
						</tr>
						<tr>
							<td>Medical Insurance</td>
							<td>Yes</td>
							<td colspan="2">No</td>
						</tr>
						<tr>
							<td>FakeFood</td>
							<td>Yes</td>
							<td>With Subscription</td>
							<td>No</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php
	include("./includes/footer.inc");
	?>

</body>

</html>