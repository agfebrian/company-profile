
    <div class="ph">
        <div class="hidden-menu">
            <button class="btn-dropdown">MENU</button>
            <div class="dropdown-mobile">
                <a href="../../index.php">HOME</a>
                <a href="project.php">PROJECT</a>
                <?php if( $login ) : ?>
                <a href="logout.php">LOGOUT</a>
                <?php else : ?>
                <a href="login.php">LOGIN</a>
                <?php endif ?>
            </div>
        </div>
        <div class="header">
            <div class="navbar">
                <div class="logo"></div>
                <div class="menu">
                    <nav class="nav">
                        <ul id="nav-items">
                            <li><a href="../../index.php">Home</a></li>
                            <li class="dropdown-hover">
                                <a href="project.php" class="dropbtn">Project</a>
                                <div class="dropdown-content">
                                    <a href="../pages/filters.php?f=baja&ringan">Baja Ringan</a>
                                    <a href="../pages/filters.php?f=konstruksi">Konstruksi</a>
                                    <a href="../pages/filters.php?f=property">Property</a>
                                </div>
                            </li>
                            <?php if( $login ) : ?>
                                <li><a href="logout.php">Logout</a></li>
                            <?php else : ?>
                                <li><a href="login.php">Login</a></li>
                            <?php endif ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>