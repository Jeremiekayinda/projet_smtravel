<?php
$conn = new mysqli("localhost", "root", "", "sembdd");
if ($conn->connect_error) {
	die("Erreur de connexion : " . $conn->connect_error);
}

// Total des colis
$reqTotalColis = "SELECT COUNT(*) AS total_colis FROM envois";
$resTotalColis = $conn->query($reqTotalColis);
$nbColis = ($resTotalColis->num_rows > 0) ? $resTotalColis->fetch_assoc()['total_colis'] : 0;

// Date du jour (formatée en français)
setlocale(LC_TIME, 'fr_FR.UTF-8');
$dateDuJour = strftime(" %d %B %Y");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	 <link rel="stylesheet" href="css/style.css">
	<title>SEM TRAVEL DRC</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">SEM TRAVEL DRC</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Tableau de bord</span>
				</a>
			</li>
			<li>
				<a href="pages/ncolis.php">
					<i class='bx bx-package' ></i>
					<span class="text">Nouveau colis </span>
				</a>
			</li>
			<li>
				<a href="pages/hcolis.php">
					<i class='bx bx-history' ></i>
					<span class="text">Historique de colis</span>
				</a>
			</li>
			<li>
				<a href="pages/clients.php">
					<i class='bx bx-user' ></i>
					<span class="text">Clients</span>
				</a>
			</li>
			<li>
				<a href="pages/message.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Paramètres</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Déconnexion</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Tableau de bord</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Tableau de bord</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?= $nbColis ?></h3>
						<p> colis recus </p>
					</span>
				</li>
				<li>
					<i class='bx bxs-calendar' ></i>
					<span class="text">
						<h3><?= $dateDuJour ?></h3>
						<p>Date</p>
					</span>
				</li>
				
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Commandes récentes</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Utilisateur</th>
								<th>Date d'enregistrement</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Wari Mulumba</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Arrivée</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Ben Miela</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">En attente</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Daniel Mabunda</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">En traitement</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Vic Kabongo</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">En attente</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Seer Elysée</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Arrivée</span></td>
							</tr>
						</tbody>
					</table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>