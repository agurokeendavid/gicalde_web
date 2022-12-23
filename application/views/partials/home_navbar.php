<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container"><a class="navbar-brand" href="index.html"><span align="left">Gicalde</span>Farm <span
				align="left"> Resort</span></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> MENU
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item <?= strtolower($page_data['title']) == 'home' ? 'active' : null; ?>"><a href="<?= site_url('home')?>" class="nav-link">HOME</a></li>
				<li class="nav-item <?= strtolower($page_data['title']) == 'about us' ? 'active' : null; ?>"><a href="<?= site_url('home/about')?>" class="nav-link">ABOUT</a></li>
				<li class="nav-item <?= strtolower($page_data['title']) == 'book now' ? 'active' : null; ?>"><a href="#" class="nav-link">ROOMS</a></li>
				<li class="nav-item"><a href="#" class="nav-link">COTTAGES</a></li>
				<li class="nav-item"><a href="#" class="nav-link">GALLERY</a></li>
				<li class="nav-item"><a href="#" class="nav-link">CONTACT</a></li>
				<li class="nav-item"><a href="#" class="nav-link">LOGIN</a></li>
				<li class="nav-item cta"><a href="<?= site_url('home/book'); ?>" class="nav-link">BOOK NOW</a></li>
			</ul>
		</div>
	</div>
</nav>
