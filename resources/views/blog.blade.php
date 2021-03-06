<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - Free Bulma template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bulma.css">
    <link rel="stylesheet" type="text/css" href="css/blog.css">
</head>
<body>
<div class="columns is-fullheight">
    <div class="column left-side is-half-desktop is-hidden-touch">
        <section class="hero is-fullheight is-default is-bold">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="title is-1">My Blog</div>
                    <div class="title is-5">A blog about stuff</div>
                </div>
            </div>
        </section>
    </div>
    <div class="column right-side is-half-desktop is-full-mobile">
        <nav class="nav is-hidden-tablet">
            <div class="nav-left">
                <a class="nav-item is-brand" href="#">
                    <img src="../images/bulma.png" alt="Bulma logo">
                </a>
            </div>

            <div class="nav-center">
                <a class="nav-item" href="#">
            <span class="icon">
              <i class="fa fa-github"></i>
            </span>
                </a>
                <a class="nav-item" href="#">
            <span class="icon">
              <i class="fa fa-twitter"></i>
            </span>
                </a>
            </div>

            <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>

            <div class="nav-right nav-menu">
                <a class="nav-item" href="#">
                    Home
                </a>
                <a class="nav-item" href="#">
                    Documentation
                </a>
                <a class="nav-item" href="#">
                    Blog
                </a>

                <span class="nav-item">
            <a class="button" >
              <span class="icon">
                <i class="fa fa-twitter"></i>
              </span>
              <span>Tweet</span>
            </a>
            <a class="button is-primary" href="#">
              <span class="icon">
                <i class="fa fa-download"></i>
              </span>
              <span>Download</span>
            </a>
          </span>
            </div>
        </nav>
        <section class="hero is-fullheight is-default is-bold">
            <div class="hero-body">
                <div class="container">
                    <div class="column is-full-desktop">
                        @yield('content')
                    </div>
                </div>
            </div>

            <div class="hero-foot">
                <div class="container">
                    <div class="tabs is-centered">
                        <ul>
                            <li><a href="#">View more posts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
                <strong>Bulma</strong> by <a href="http://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC ANS 4.0</a>.
            </p>
            <p>
                <a class="icon" href="https://github.com/jgthms/bulma">
                    <i class="fa fa-github"></i>
                </a>
            </p>
        </div>
    </div>
</footer>
<script async type="text/javascript" src="../js/bulma.js"></script>
</body>
</html>