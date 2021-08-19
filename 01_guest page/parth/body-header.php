</head>

<body>
  <header>
    <div class="log">
      <div class="logo3">
        <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/index.php' ?>">
          <div class="gi">
            <h5 class="logogioc">Logo</h5>
          </div>
          <h6>Example<br />text<br />about<br />the company</h6>
        </a>
      </div>
    </div>
    <div class="nav" id="slow_nav">
      <ul class="navbar">
        <li class="blog-nav">
          <a class="blog-nav-item" id="index" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/index.php' ?>">
            <div class="hicon-index"></div>
            Guest page
          </a>
        </li>
        <li class="blog-nav">
          <a class="blog-nav-item" id="admin" href="http://<?php echo $_SERVER['SERVER_NAME'] . '/admin.php' ?>"
            target="_blank">
            <div class="hicon-admin"></div>
            Admin page
          </a>
        </li>
      </ul>
      <div class="article">
        <h1 id="article"><?= $article ?></h1>
      </div>
    </div>
  </header>