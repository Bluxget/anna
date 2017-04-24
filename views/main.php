<!DOCTYPE html>

<html>
	<head>
		<title>ANNA - <?=$this->getTitle(); ?></title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="img/favicon.png" type="image/png" />
		<link rel="apple-touch-icon" href="img/favicon.png" />
		<link rel="stylesheet" type="text/css" href="contents/css/main.css" />
	</head>

	<body>
		<header>
			HEADER
		</header>

		<nav>
			<ul>
				<li>Menu 1</li>
				<li>Menu 2</li>
			</ul>
		</nav>

		<main>
			<?php include_once $content; ?>
		</main>

		<footer>
			2017 &copy; ANNA
		</footer>
	</body>
</html>
