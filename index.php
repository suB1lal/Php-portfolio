<?php include 'yonetim/controller/db.php';
include 'language.php';




$sorgu = $db->prepare("SELECT * FROM sayfalar WHERE id = :id");
$sorgu->execute(['id' => 1]);
$sayfa = $sorgu->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE HTML>
<html>

<head>
	<title><?php echo $ayar['site_baslik'] ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
	<link rel="shortcut icon" href="yonetim/dosyalar/<?php echo $ayar['site_logo'] ?>" type="image/x-icon">
	<meta name="description" content="<?php echo $ayar['site_aciklama'] ?>">
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<div class="logo">
				<img class="img-fluid w-100" src="yonetim/dosyalar/<?= $ayar['site_logo'] ?>" alt="test">
			</div>
			<div class="content">
				<div class="inner">
					<h1><?php echo $ayar['site_baslik'] ?></h1>
					<p><?php echo $ayar['home_aciklama'] ?></p>
				</div>
			</div>
			
			<nav>
				<ul>
					
					<li><a href="#intro">Tanıtım</a></li>
					<li><a href="#work">Projeler</a></li>
					<li><a href="#about">Hakkımda</a></li>
					<li><a href="#contact">İletişim</a></li>
					<!--<li><a href="#elements">Elements</a></li>-->
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Intro -->
			<article id="intro">
				<h2 class="major">Tanıtım</h2>
				<span class="image main"><img src="images/pic01.jpg" alt="" /></span>
				<?php echo $sayfa['tanitim_sayfasi'] ?>
			</article>

			<!-- Work -->
			<article id="work">
				<h2 class="major">Projelerim</h2>
				<span class="image main"><img src="images/pic02.jpg" alt="" /></span>
				<?php echo $sayfa['calismalarim_sayfasi'] ?>
			</article>

			<!-- About -->
			<article id="about">
				<h2 class="major">Hakkımda</h2>
				<span class="image main"><img src="images/pic03.jpg" alt="" /></span>
				<?php echo $sayfa['hakkimda_sayfasi'] ?>
			</article>

			<!-- Contact -->
			<article id="contact">
				<h2 class="major">İletişim</h2>
				<form method="post" action="#">
					<div class="fields">
						<div class="field half">
							<label for="name">İsim</label>
							<input type="text" name="name" id="name" />
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" />
						</div>
						<div class="field">
							<label for="message">Mesajınız</label>
							<textarea name="message" id="message" rows="4"></textarea>
						</div>
					</div>
					<ul class="actions">
						<li><input type="submit" value="Gönder" class="primary" /></li>
						<li><input type="reset" value="Reset" /></li>
					</ul>
				</form>
				<ul class="icons">
					<li><a href="<?php echo $ayar['x'] ?>" rel="nofollow" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="<?php echo $ayar['github'] ?>" rel="nofollow" class="icon fa-facebook"><span class="label">github</span></a></li>

				</ul>
			</article>

			<!-- Elements -->

		</div>

		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy;<?php echo $ayar['site_baslik'] ?><a href="https://html5up.net"></a>.</p>
		</footer>
	</div>
	<!-- BG -->
	<div id="bg"></div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>