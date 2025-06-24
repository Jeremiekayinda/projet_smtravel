<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "sembdd");
if ($conn->connect_error) {
	die("Échec de connexion : " . $conn->connect_error);
}

// Récupération des agences
$agences = $conn->query("SELECT id, nom FROM agences");
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
			<li class="active">
				<a href="ncolis.php">
					<i class='bx bx-package'></i>
					<span class="text">Nouveau colis </span>
				</a>
			</li>
			<li>
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
				<a href="#">
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
					<h1>Nouveau colis</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Nouveau colis</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>

			</div>


			</div>
		</main>
		<div class="container">
			<h2> Enregistrement d’un nouveau colis</h2>

			<form id="colisForm" action="traitement_colis.php" method="POST">
				<!-- Infos client -->
				<label>Nom du client :</label>
				<input type="text" name="nom_client" required>

				<label>Prénom du client :</label>
				<input type="text" name="prenom_client" required>

				<label>Sexe :</label>
				<select name="sexe_client" required>
					<option value="">-- Choisir --</option>
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
				</select>

				<label>Téléphone :</label>
				<input type="text" name="telephone_client" required>

				<label>Adresse :</label>
				<textarea name="adresse_client" required></textarea>

				<!-- Infos colis -->
				<label>Description du colis :</label>
				<textarea name="description_colis" required></textarea>

				<label>Poids (kg) :</label>
				<input type="number" step="0.01" name="poids_colis" required>

				<label>Statut :</label>
				<select name="statut" required>
					<option value="En attente">En attente</option>
					<option value="Envoyé">Envoyé</option>
					<option value="Reçu">Reçu</option>
				</select>

				<!-- Agence -->
				<label>Agence de destination :</label>
				<select name="agence_id" required>
					<option value="">-- Sélectionner une agence --</option>
					<?php while ($row = $agences->fetch_assoc()): ?>
						<option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nom']) ?></option>
					<?php endwhile; ?>

				</select>

				<button type="submit">Enregistrer le colis</button>
			</form>
			<!-- ✅ POPUP de confirmation -->
			<div id="popup" class="popup-modal">
				<div class="popup-content">
					<div class="checkmark">✔</div>
					<h2>Thank You!</h2>
					<p>Votre colis a été enregistré avec succès.</p>
					<button id="okBtn">OK</button>
				</div>
			</div>
		</div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script>
		const form = document.getElementById("colisForm");
		const popup = document.getElementById("popup");
		const okBtn = document.getElementById("okBtn");

		form.addEventListener("submit", function(e) {
			e.preventDefault(); // Empêche l'envoi normal

			const formData = new FormData(form);

			fetch("traitement_colis.php", {
					method: "POST",
					body: formData
				})
				.then(res => res.text())
				.then(data => {
					if (data.trim() === "success") {
						popup.style.display = "flex";
					} else {
						alert("❌ Une erreur est survenue !");
					}
				});
		});

		okBtn.addEventListener("click", function() {
			popup.style.display = "none";
			window.location.href = "../index.php";
		});
	</script>

</body>

</html