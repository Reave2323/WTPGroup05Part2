<!doctype html>
<html lang="en">
	<!-- Generative AI was used to help refine the structure and styling ideas for this page.
     The final code was reviewed and edited to match the assignment requirements and group format. -->
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="keywords" content="shop, buisness, fakeshop, about, company" />
		<meta name="author" content="Moss, Kanav, Vichetra" />
		<title>About the Team</title>
		<link rel="stylesheet" href="./style/style.css" />
		<link rel="stylesheet" href="./style/about.css" />
		<!--Adds Font Support For Non-English Characters-->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Sans+Khmer:wght@100..900&display=swap"
			rel="stylesheet" />

		<style>
			.about-note {
				text-align: center;
				font-style: italic;
				margin-top: 0.5em;
			}

			.noto-sans-jp-text {
				font-family: "Noto Sans JP", sans-serif;
				font-optical-sizing: auto;
				font-style: normal;
			}

			.noto-sans-khmer-text {
				font-family: "Noto Sans Khmer", sans-serif;
				font-optical-sizing: auto;
				font-style: normal;
				font-variation-settings: "wdth" 100;
			}
		</style>
	</head>

	<body>
		<header class="navbar">
			<div class="nav-container">
				<div class="logo">
					<img
						src="images/FakeShop_logo.png"
						width="128"
						height="128"
						alt="Fakeshop" />
				</div>
				<nav class="links">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="jobs.html">Jobs With Us</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="apply.html">Apply Now</a></li>
					</ul>
				</nav>
				<div class="nav-actions">
					<a href="#" class="search">🔍</a>
				</div>
			</div>
		</header>
		<div class="content-area">
			<main>
				<!-- Introduction section -->
				<section class="about-intro">
					<h1 style="text-align: center">About Our Team</h1>
					<p class="about-note">
						Meet the team behind FakeShop and learn more about our group
						project.
					</p>
				</section>

				<section class="group-details">
					<h2>Group Details</h2>
					<ul>
						<li>Group Name: FakeShop Team</li>
						<li>
							Class Details
							<ul>
								<li>Day: Wednesday</li>
								<li>Time: 2:30 PM</li>
							</ul>
						</li>
					</ul>
				</section>
				<!-- Member contributions and quotes using a definition list -->
				<section class="member-definition-list">
					<h2 style="text-align: center">Member Contributions and Quotes</h2>
					<dl>
						<dt>
							Moss Whitehall
							<span class="student-id">Student ID: 106507235</span>
						</dt>
						<dd>
							Co-founding member of FakeShop and helped organise the FakeShop
							team and project tasks.
						</dd>
						<dd class="noto-sans-jp-text">
							Quote in first/favourite language:
							FakeShopは本当に私の人生を変えてくれたもので、これからもこのままの生活を続けていきたいと思っています。
						</dd>
						<dd>
							English translation: “FakeShop has really changed my life and is
							how I want my life to keep going.”
						</dd>

						<dt>
							Kanavpreet Multani
							<span class="student-id">Student ID: 106504223</span>
						</dt>
						<dd>
							Co-founding member of FakeShop and contributed ideas focused on
							business, growth, and innovation.
						</dd>
						<dd>
							Quote in first/favourite language: “Working together has helped us
							turn our ideas into reality.”
						</dd>
						<dd>
							English translation: “Working together has helped us turn our
							ideas into reality.”
						</dd>

						<dt>
							Vichetra Sam An
							<span class="student-id">Student ID: 105690697</span>
						</dt>
						<dd>
							Co-founding member of FakeShop and contributed to improving user
							experience and digital retail solutions.
						</dd>
						<dd class="noto-sans-khmer-text">
							Quote in first/favourite language: “សក់អ្នក ក្បាលអ្នក”
						</dd>
						<dd>
							English translation: “You are responsible for your own action”
						</dd>
					</dl>
				</section>
				<!-- Team member flip section -->
				<section class="member-info">
					<h2 style="text-align: center">Team Members and Contributions</h2>
					<!-- Flip card layout inspired by W3Schools:
             https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_flip_card
             Adapted for the FakeShop COS10026 project. -->

					<div class="flip-card-container">
						<div class="flip-card">
							<div class="flip-card-inner">
								<div class="flip-card-front">
									<img
										src="images/IMG_0005MOSS.JPG"
										alt="Photo of Moss Whitehall"
										width="300"
										height="300" />
									<h3>Moss Whitehall</h3>
								</div>
								<div class="flip-card-back">
									<h3>Moss Whitehall</h3>
									<p class="student-id">Student ID: 106507235</p>
									<p>
										Co-founding member who helped organise the FakeShop team and
										project tasks.
									</p>
									<p>
										<strong>Quote:</strong>
										"FakeShopは本当に私の人生を変えてくれたもので、これからもこのままの生活を続けていきたいと思っています"
									</p>
									<p>
										<strong>Translation:</strong> “FakeShop has really changed
										my life and is how I want my life to keep going.”
									</p>
								</div>
							</div>
						</div>

						<div class="flip-card">
							<div class="flip-card-inner">
								<div class="flip-card-front">
									<img
										src="images/IMG_Kanav0004.JPG"
										alt="Photo of Kanavpreet Multani"
										width="300"
										height="300" />
									<h3>Kanavpreet Multani</h3>
								</div>
								<div class="flip-card-back">
									<h3>Kanavpreet Multani</h3>
									<p class="student-id">Student ID: 106504223</p>
									<p>
										Co-founding member who contributed ideas focused on
										business, growth, and innovation.
									</p>
									<p>
										<strong>Quote:</strong> ਸਾਥ ਮਿਲ ਕੇ ਕੰਮ ਕਰਨ ਨਾਲ ਅਸੀਂ ਆਪਣੀਆਂ
										ਸੋਚਾਂ ਨੂੰ ਹਕੀਕਤ ਬਣਾਇਆ”
									</p>
									<p>
										<strong>Translation:</strong> “Working together has helped
										us turn our ideas into reality.”
									</p>
								</div>
							</div>
						</div>

						<div class="flip-card">
							<div class="flip-card-inner">
								<div class="flip-card-front">
									<img
										src="images/IMG_0002VICHETRA.JPG"
										alt="Photo of Vichetra Sam An"
										width="300"
										height="300" />
									<h3>Vichetra Sam An</h3>
								</div>
								<div class="flip-card-back">
									<h3>Vichetra Sam An</h3>
									<p class="student-id">Student ID: 105690697</p>
									<p>
										Co-founding member who contributed to improving user
										experience and digital retail solutions.
									</p>
									<p><strong>Quote:</strong> “សក់អ្នក ក្បាលអ្នក”</p>
									<p>
										<strong>Translation:</strong> “You are responsible for your
										own action”
									</p>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="group-photo-section">
					<h2>Group Photo</h2>
					<figure class="group-photo">
						<img
							src="images/GroupPhoto.png"
							alt="Group photo of the FakeShop team"
							width="420"
							height="280" />
						<figcaption>Our FakeShop team photo.</figcaption>
					</figure>
				</section>
				<!-- Fun facts table -->
				<section class="fun-facts">
					<h2>Fun Facts About Our Team</h2>
					<table class="about-table">
						<caption>
							Fun facts about the FakeShop team members
						</caption>
						<thead>
							<tr>
								<th>Name</th>
								<th>Dream Job</th>
								<th>Coding Snack</th>
								<th>Hometown</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Moss</td>
								<td>Penetration Tester</td>
								<td>Energy Drink & Chips</td>
								<td>Australia</td>
							</tr>
							<tr>
								<td>Kanav</td>
								<td>Be Rich</td>
								<td>Milk Chocolate</td>
								<td>India</td>
							</tr>
							<tr>
								<td>Vichetra</td>
								<td>Self Employed</td>
								<td>Chips</td>
								<td>Cambodia</td>
							</tr>
						</tbody>
					</table>
				</section>
			</main>
		</div>
		<div class="footer">
			<footer>
				<h3 class="Footer-Ack">Acknowledgement of Country</h3>
				<p>
					At FakeShop, we respectfully acknowledge the Wurundjeri People of the
					Kulin Nation, who are the Traditional Owners of the land on which
					FakeShop's HQ is located in Melbourne’s east and pay our respect to
					their Elders past, present and emerging. We are honoured to recognise
					our connection to Wurundjeri Country, history, culture and
					spirituality through these locations, and strive to ensure that we
					operate in a manner that respects and honours the Elders and Ancestors
					of these lands. We also acknowledge and respect the Traditional Owners
					of lands across Australia, their Elders, Ancestors, cultures and
					heritage, and recognise the continuing sovereignties of all Aboriginal
					and Torres Strait Islander Nations.
				</p>
				<img
					src="images/indigenous-acknowledgement.svg"
					alt="indigenous-acknowledgement image" />
				<!--quick footer so we don't forget. Can be changed. Put this in a div box-->
				<a href="https://www.swinburne.edu.au/"
					>&copy;Swinburne University of Technology</a
				>
				<a>&copy;FakeShop</a>
				<a
					href="https://wtp-group5-wed-230.atlassian.net?continue=https%3A%2F%2Fwtp-group5-wed-230.atlassian.net%2Fwelcome%2Fsoftware&atlOrigin=eyJpIjoiNDI3YzZkN2EyZjc2NDQ0MzlkNGY2MWRkNzIzZGU1MWYiLCJwIjoiaiJ9"
					>Jira Board</a
				>
				<a href="https://github.com/Reave2323/WebTechProjectGroup5"
					>Github Repository</a
				>
				<a href="https://reave2323.github.io/WebTechProjectGroup5/"
					>Live Site</a
				>
				<a href="mailto:info@fakeshop.com">Need to Contact Us?</a>
			</footer>
		</div>
	</body>
</html>
