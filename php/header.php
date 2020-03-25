<header id="header">
  <div class="header-logo">
    <a href="home">Cloud Storage</a>
  </div>

  <nav id="nav-wrapper">
    <ul id="main-menu" class="menu">
      <li class="menu-item"><a href="documents">Documents</a></li>
      <li class="menu-item"><a href="shares">Shares</a></li>
    </ul>
    <ul id="menu-right" class="menu">
      <?php if (isset($_SESSION['user_name'])) {?><li class="menu-item">Hello <?php echo $_SESSION['user_name']; ?>! <a href="logout">Logout</a></li><?php } ?>
    </ul>
  </nav>
</header>
