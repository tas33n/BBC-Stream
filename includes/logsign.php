<div class="cover">
    <div class="contents">
        <h1>Login</h1>
        <div class="well">
            <p id="err"></p>
            <?php if (isset($_SESSION['user_role'])) : ?>
                <img style="
    max-width: 100px;
    border-radius: 50%;
    margin-bottom: 20px;
" src="images/<?php echo $_SESSION['user_image']; ?>"><br>
                <h4 style="
    color: white;
"><?php echo $_SESSION['username']; ?></h4>

<a href="./admin/index.php" class='btn btn-warning'>Admin Control Panel</a> <br><br>

                <a href="includes/logout.php" class='btn btn-warning'>Logout</a>

            <?php else : ?>
                <form action="includes/login.php" method="post">
                    <div class="search-bar">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="search-bar">
                        <input type="password" name="password" class="form-control" placeholder="Password"><br>
                        <span class="input-group-btn">
                            <button class="btn lgin btn-primary" type="submit" name="login">Login</button>
                            <!-- <a class="signup" href="#">Sign up </a> -->
                        </span>
                    </div>
                </form>

            <?php endif; ?>
        </div>
        <!-- <span class="close">Close</span> -->
    </div>
</div>