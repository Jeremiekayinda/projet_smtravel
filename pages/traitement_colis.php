<?php
$conn = new mysqli("localhost", "root", "", "sembdd");

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_client = $_POST['nom_client'] ?? null;
    $prenom_client = $_POST['prenom_client'] ?? null;
    $sexe_client = $_POST['sexe_client'] ?? null;
    $telephone_client = $_POST['telephone_client'] ?? null;
    $adresse_client = $_POST['adresse_client'] ?? null;
    $description_colis = $_POST['description_colis'] ?? null;
    $poids_colis = $_POST['poids_colis'] ?? null;
    $statut = $_POST['statut'] ?? null;
    $agence_id = $_POST['agence_id'] ?? null;

    $sql = "INSERT INTO envois (
        nom_client, prenom_client, sexe_client, telephone_client, adresse_client,
        description_colis, poids_colis, statut, agence_id
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param(
            "ssssssdsi",
            $nom_client, $prenom_client, $sexe_client, $telephone_client, $adresse_client,
            $description_colis, $poids_colis, $statut, $agence_id
        );

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }

        $stmt->close();
    } else {
        echo "error";
    }

    $conn->close();
}
?>
