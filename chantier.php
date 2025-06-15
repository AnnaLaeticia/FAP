<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos chantiers</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="logo">
            <p>Archeo-it</p>
        </div>
            <ul class="menu">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="chantier.php">Nos chantiers</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="connexion.html">Connexion</a></li>
                <li><a href="inscription.html">Inscription</a></li>
            </ul>
    </header>
  <section class="chantiers">
    <div class="chantier-card">
      <img src="images/chantier1.jpg" alt="Chantier à Autun">
      <div class="chantier-content">
        <h3>Fouille à Autun</h3>
        <p>Découverte d’un atelier de poterie antique dans la région d’Autun, daté entre le Ier et IIIe siècle.</p>
        <div class="chantier-meta">
          <span><i class="fas fa-map-marker-alt"></i> Autun</span>
          <span><i class="fas fa-calendar-alt"></i> Avril 2025</span>
        </div>
        <a href="chantier1.html" class="voir-plus">Voir plus</a>
      </div>
    </div>

    <div class="chantier-card">
      <img src="images/chantier2.jpg" alt="Chantier à Lyon">
      <div class="chantier-content">
        <h3>Centre-ville de Lyon</h3>
        <p>Vestiges gallo-romains mis au jour lors de travaux urbains en plein cœur de la ville.</p>
        <div class="chantier-meta">
          <span><i class="fas fa-map-marker-alt"></i> Lyon</span>
          <span><i class="fas fa-calendar-alt"></i> Mai 2025</span>
        </div>
        <a href="chantier2.html" class="voir-plus">Voir plus</a>
      </div>
    </div>

    <div class="chantier-card">
      <img src="images/montpelier.jpg" alt="Chantier à Montpellier">
      <div class="chantier-content">
        <h3>Découverte à Montpellier</h3>
        <p>Fossile exceptionnel mis au jour sur le site, probablement un grand reptile préhistorique.</p>
        <div class="chantier-meta">
          <span><i class="fas fa-map-marker-alt"></i> Montpellier</span>
          <span><i class="fas fa-calendar-alt"></i> Avril 2025</span>
        </div>
        <a href="chantier3.html" class="voir-plus">Voir plus</a>
      </div>
    </div>
  </section>
 <section id="zones-chantier" class="text-center my-5">
  <h2>📍 Nos zones de fouilles</h2>
  <p class="mb-4 text-muted">Découvrez sur la carte toutes les localisations de nos chantiers archéologiques (Autun, Lyon, Montpellier).</p>
  <div class="map-container" style="max-width: 100%; overflow: hidden; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <iframe 
      src="https://www.google.com/maps/d/embed?mid=108ppAvZa0Rc0tRzCDsobTF8NGXt8Y8M&hl=fr&ehbc=2E312F" 
      width="100%" 
      height="480" 
      style="border:0;" 
      allowfullscreen="" 
      loading="lazy">
    </iframe>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
