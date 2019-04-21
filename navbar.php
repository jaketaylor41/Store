
<nav class="navbar navbar-expand-lg navbar-dark elegant-color">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="adminPage.php">Admin<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="showProduct.php">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="loginOrRegister.php">Login/Register</a>
            </li>
        </ul>
    </div>

    <div style="margin-right: 3%;">
        <a href="customCart.php"><i id="shoppingCartIcon" class="fas fa-shopping-cart"></i></a>
    </div>

    <div>
        <form action="logout.php">
            <button class="btn btn-outline-primary btn-sm" type="submit">Logout</button>
        </form>
    </div>
</nav>

