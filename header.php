<?php
// header.php
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Ratnakirti Roy</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="site-header">
  <div class="container header-inner">
    <div class="brand">
      <div class="logo">Ratnakirti Roy,Ph.D.</div>
      <p>Head — Department of MCA</p>
    </div>

<style>
  nav {
    background-color: #0b0b0b; /* dark background */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    color: white;
  }

  .logo {
    font-size: 35px;
    font-weight: bold;
    color: #00aaff;
  }

  .menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .menu li {
    margin: 0 15px;
  }

  .menu a {
    color: white;
    text-decoration: none;
    font-weight: 500;
  }

  .menu a:hover {
    color: #00aaff;
  }

  /* Hamburger icon (hidden on desktop) */
  .hamburger {
    display: none;
    font-size: 26px;
    cursor: pointer;
  }

  /* Responsive behavior */
  @media (max-width: 768px) {
    .menu {
      display: none;
      flex-direction: column;
      background-color: #0b0b0b;
      position: absolute;
      top: 60px;
      right: 0;
      width: 200px;
      text-align: right;
      padding: 10px;
      border-top: 2px solid #00aaff;
    }

    .menu.active {
      display: flex;
    }

    .hamburger {
      display: block;
    }
  }
</style>
</head>
<body>

<nav>
  
  <ul class="menu" id="menuList">
    <li><a href="index.php">Home</a></li>
    <li><a href="biodata.php">Biodata</a></li>
    <li><a href="teaching.php">Teaching</a></li>
    <li><a href="publications.php">Publications</a></li>
    <li><a href="contact.php">Contact</a></li>
  </ul>

  <div class="hamburger" onclick="toggleMenu()">☰</div>
</nav>

<script>
  function toggleMenu() {
    document.getElementById('menuList').classList.toggle('active');
  }
</script>


  </div>
</header>
