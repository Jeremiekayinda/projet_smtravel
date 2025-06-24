<?php
$conn = new mysqli("localhost", "root", "", "sembdd");
if ($conn->connect_error) {
	die("Erreur de connexion : " . $conn->connect_error);
}

$sql = "SELECT e.*, a.nom AS agence_nom
        FROM envois e
        JOIN agences a ON e.agence_id = a.id
        ORDER BY e.date_envoi DESC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/ncolis.css">
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
			<li>
				<a href="../index.php">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Tableau de bord</span>
				</a>
			</li>
			<li>
				<a href="ncolis.php">
					<i class='bx bx-package'></i>
					<span class="text">Nouveau colis </span>
				</a>
			</li>
			<li class="active">
				<a href="hcolis.php">
					<i class='bx bx-history'></i>
					<span class="text">Historique de colis</span>
				</a>
			</li>
			<li>
				<a href="clients.php">
					<i class='bx bx-user'></i>
					<span class="text">Clients</span>
				</a>
			</li>
			<li>
				<a href="message.php">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Message</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="">
					<i class='bx bxs-cog'></i>
					<span class="text">Paramètres</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle'></i>
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
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
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
					<h1>Historique de colis</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Historique de colis</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download'></i>
					<span class="text">Télécharger le pdf</span>
				</a>
			</div>
			</div>
			<div class="table-data">
			<div class="order">
				<div class="head">
				
					<i class='bx bx-search'></i>
					<i class='bx bx-filter'></i>
				</div>
				<table>
					<thead>
						<tr>
							<th>Client</th>
							<th>Sexe</th>
							<th>Téléphone</th>
							<th>Description</th>
							<th>Poids (kg)</th>
							<th>Statut</th>
							<th>Agence</th>
							<th>Date d'envoi</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($result->num_rows > 0): ?>
							<?php while ($row = $result->fetch_assoc()): ?>
								<tr>
									<td><?= htmlspecialchars($row['prenom_client'] . " " . $row['nom_client']) ?></td>
									<td><?= htmlspecialchars($row['sexe_client']) ?></td>
									<td><?= htmlspecialchars($row['telephone_client']) ?></td>
									<td><?= htmlspecialchars($row['description_colis']) ?></td>
									<td><?= htmlspecialchars($row['poids_colis']) ?></td>
									<td><?= htmlspecialchars($row['statut']) ?></td>
									<td><?= htmlspecialchars($row['agence_nom']) ?></td>
									<td><?= date('d/m/Y H:i', strtotime($row['date_envoi'])) ?></td>
								</tr>
							<?php endwhile; ?>
						<?php else: ?>
							<tr>
								<td colspan="8">Aucun colis trouvé.</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>

		</div>
		</main>

		

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="../js/script.js"></script>
</body>

</html>