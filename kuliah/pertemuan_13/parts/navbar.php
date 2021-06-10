<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="index.php">ANIGASTORE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Halaman Admin <span class="sr-only">(current)</span></a>
            </li>
            <?php if (isset($_SESSION['login'])) : ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link logout-link">Logout <span class="sr-only">(current)</span></a>
                </li>
            <?php endif; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" type="text" name="keyword" autofocus autocomplete="off" id="keyword">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="cari" id="tombol-cari">Search</button>
        </form>
    </div>
</nav>