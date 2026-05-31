<header class="navbar">
	<div class="nav-container">
		<div class="logo">
			<img
				src="images/FakeShop_logo.png"
				width="128"
				height="128"
				alt="FakeShop Logo" />
		</div>
		<nav class="links">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="jobs.php">Jobs With Us</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="apply.php">Apply Now</a></li>
			</ul>
		</nav>
		<div class="nav-actions">
			<form method="get" action="jobs.php">
				<input type="text" name="search" placeholder="Search..."
					value="<?php echo isset($_GET['search'])? htmlspecialchars($_GET['search']) : '' ; ?>" />
					<a href="#" class="search">🔍</a>
			</form>
		</div>
	</div>
</header>
