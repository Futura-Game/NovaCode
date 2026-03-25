<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/novacode/admin/protect-user.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nova Code</title>

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url(../../image/Space.jpeg);
      background-size: cover;
      background-repeat: no-repeat;
    }

    header {
      background-color: #000000;
      padding-left: 5px;
      padding-top: 5px;
      padding-bottom: 5px;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 25px;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 25px;
      color: white;
      font-weight: bold;
      font-size: 24px;
      white-space: nowrap;
    }

    .logo img {
      width: 50px;
      height: 50px;
      border-radius: 25%;
    }

    .recherche {
      flex: 1;
      max-width: 550px;
      position: relative;
    }

    .recherche input {
      width: 100%;
      height: 40px;
      border-radius: 10px;
      border: 1px solid #a855f7;
      background: transparent;
      color: white;
      padding-left: 40px;
      outline: none;
      font-size: 16px;
    }

    .recherche span {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: white;
      font-size: 18px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 18px;
      margin: 0;
      padding: 0;
    }

    nav a {
      color: rgb(121, 121, 121);
      text-decoration: none;
      font-size: 16px;
    }

    nav a:hover {
      color: white;
    }

    nav a.active {
      color: #a855f7;
      text-decoration: underline;
      text-underline-offset: 6px;
    }

    .bloc {
        text-align: center;
        transition: transform 0.3s ease;
    }

    .bloc-nombre {
        display: block;
        font-size: 2.5rem;
        font-weight: 800;
        color: #a29bfe; /* Violet clair électrique */
        text-shadow: 0 0 10px rgba(162, 155, 254, 0.5);
    }

    .bloc-text {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: rgb(174, 174, 174);
        text-shadow: 0 0 10px white;
    }

    .font-block {
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.80);
        padding: 40px 20px;
        font-family: 'Poppins', sans-serif;
    }

    .map-section {
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.80);
    }

    iframe {
        width: 100%;
        border-radius: 15px;
    }
  </style>
</head>

<body>
  <header>
    <div class="header">

      <div class="logo">
        <img src="../../image/Nova.png" alt="Nova">
        <span>Nova Code</span>
      </div>

      <div class="recherche">
        <span>🔍</span>
        <input type="search" placeholder="Recherche">
      </div>

      <nav>
        <ul>
          <li><a href="./index.php">Accueil</a></li>
          <li><a href="./catalogue.php">Catalogue</a></li>
          <li><a href="./crédit.php">Crédit</a></li>
          <li><a class="active" href="./carte.php">Carte</a></li>
        </ul>
      </nav>

    </div>
  </header>
  <main>
    <section class="font-block">
    <div class="bloc">
            <span class="bloc-nombre">+10</span>
            <span class="bloc-text">Magasins en France</span>
        </div>
    </div>
    <div class="bloc">
            <span class="bloc-nombre">+7 Ans</span>
            <span class="bloc-text">d'Expérience</span>
        </div>
    </div>
    <div class="bloc">
            <span class="bloc-nombre">+327</span>
            <span class="bloc-text">Clients Satisfaits</span>
        </div>
    </div>
    <div class="bloc">
            <span class="bloc-nombre">24h/24</span>
            <span class="bloc-text">Service + Livraison</span>
        </div>
    </div>
</section>
<section class="map-section">
    <iframe 
        src="https://www.google.com/maps/embed?pb=..." 
        width="100%" 
        height="600" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>
</section>
  </main>
</body>
</html>
