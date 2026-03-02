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
      background: url(../../image/Space.jpg);
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

    div.titre {
        background: url(../../image/Maquette-pour-Solde.png);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 100px;
        display: flex;
        justify-content: center; /* centre horizontalement */
        align-items: center;     /* centre verticalement */
    }
    div.titre h1 {
        color: white;
        margin: 0;
    }
        .select-categorie {
            display: grid;
            margin: 10px;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 10px;
            color: white;
        }
        .select-categorie img {
            width: 330px;
            height: 185px;
            padding: 8px;
            border-radius: 20px;
        }
        .select-categorie p {
            margin: 0;
            font-size: 20px;
        }
        .select-categorie button {
            margin: 0;
        }
        .Choix-1, .Choix-2, .Choix-3, .Choix-4, .Choix-5, .Choix-6, .Choix-7, .Choix-8 {
            border: solid 2px white;
            border-radius: 20px;
            height: 260px;
            display: flex;  
            flex-direction: column;
            justify-content: center; /* centrer horizontalement */
            align-items: center;     /* centrer verticalement */
            text-align: center;
            background-color: black;
            object-fit: cover;
        }
    div.bouton {
        display: flex;
        gap: 10px;
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
          <li><a class="active" href="./crédit.php">Crédit</a></li>
          <li><a href="./carte.php">Carte</a></li>
        </ul>
      </nav>

    </div>
  </header>

  <main>
    <div class="titre">
        <h1>Nos cartes virtuels disponible :</h1>
    </div>
    <div class="select-categorie">
        <div class="Choix-1" id="divCatégorie1">
          <p>10.00€</p>
          <img src="../../image/CarteRobux10.jpg" alt="Nova" width="100px">
          <div class="bouton">
            <button>Obtenir</button>
            <button>Plus d'info</button>         
          </div>
        </div>
        <div class="Choix-2" id="divCatégorie2">
          <p>25.00€</p>
          <img src="../../image/CarteRobux25.jpg" alt="Nova" width="100px">
          <div class="bouton">
            <button>Obtenir</button>
            <button>Plus d'info</button>         
          </div>
        </div> 
        <div class="Choix-3" id="divCatégorie3">
          <p>50.00€</p>
          <img src="../../image/CarteRobux50.jpg" alt="Nova" width="100px">
          <div class="bouton">
            <button>Obtenir</button>
            <button>Plus d'info</button>         
          </div>
        </div>
        <div class="Choix-4" id="divCatégorie4">
          <p>100.00€</p>
          <img src="../../image/CarteRobux100.jpg" alt="Nova" width="100px">
          <div class="bouton">
            <button>Obtenir</button>
            <button>Plus d'info</button>         
          </div>
        </div>
        <div class="Choix-5" id="divCatégorie5">
          <p>10.00€</p>
          <img src="../../image/CarteVBuck10.jpg" alt="Nova" width="100px">
          <div class="bouton">
            <button>Obtenir</button>
            <button>Plus d'info</button>         
          </div>
        </div>
        <div class="Choix-6" id="divCatégorie6">
          <p>20.00€</p>
          <img src="../../image/CarteVBuck20.jpg" alt="Nova" width="100px">
          <div class="bouton">
            <button>Obtenir</button>
            <button>Plus d'info</button>         
          </div>
        </div>
        <div class="Choix-7" id="divCatégorie7">
          <p>35.00€</p>
          <img src="../../image/CarteVBuck35.jpg" alt="Nova" width="100px">
          <div class="bouton">
            <button>Obtenir</button>
            <button>Plus d'info</button>         
          </div>
        </div>
        <div class="Choix-8" id="divCatégorie8">
          <p>80.00€</p>
          <img src="../../image/CarteVBuck80.jpg" alt="Nova" width="100px">
          <div class="bouton">
            <button>Obtenir</button>
            <button>Plus d'info</button>         
          </div>
        </div>
    </div>
  </main../../image/