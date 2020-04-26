
<div class="nav-header">
    <div class="wrapping">
        <div class="nav-left">
            <li><a href="project.php">PROJECT</a></li>
            <li class="dropdown-filter" id="dropdown-filter">
                <p>Filters <span><i class="fas fa-sort-down"></i><i class="fas fa-sort-up"></i></span></p>
                    <div class="dropdown-content-filter">
                        <a class="dropdown-item" href="../pages/filters.php?f=baja&ringan">Baja Ringan</a>
                        <a class="dropdown-item" href="../pages/filters.php?f=konstruksi">Konstruksi</a>
                        <a class="dropdown-item" href="../pages/filters.php?f=property">Property</a>
                    </div>
            </li>
            <?php if( $login ) : ?>
            <li><a href="add.php">Tambah</a></li>
            <?php endif ?>
        </div>
        <form class="form-search" action="" method="GET">
            <input class="input-search" type="search" name="cari">
            <button class="btn-search" name="submit" name="submit">CARI</button>
        </form>
    </div>
</div>