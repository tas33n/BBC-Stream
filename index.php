<?php include("includes/header.php"); ?>

<body>


  <?php if ($_REQUEST['err']) {
    echo "<script>alert(\"Yo madafakar!!\");</script>";
  }
  ?>
  <!-- partial:index.partial.html -->
  <div class="container">
    <div class="wrapper">
      <div class="header">
        <div class="box">
          <div class="inner">
            <span>Billionaire Boys Club</span>
          </div>
          <div class="inner">
            <span>Billionaire Boys Club</span>
          </div>
        </div>
      </div>
      <div class="main-container">
        <div class="main-header anim" style="--delay: 0s">HOT</div>
        <div class="main-blogs">
          <?php include("includes/hot.php"); ?>
        </div>
        <div class="small-header anim" style="--delay: .3s">Recent</div>
        <div class="videos">

          <?php

          $per_page = 5;

          if (isset($_GET['page'])) {
            $page = $_GET['page'];
          } else {
            $page = "";
          }

          if ($page == "" || $page == 1) {
            $page_1 = 0;
          } else {
            $page_1 = ($page * $per_page) - $per_page;
          }

          if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin') {
            $post_query_count = "SELECT * FROM posts";
          } else {
            $post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";
          }















          $find_count = mysqli_query($connection, $post_query_count);
          $count = mysqli_num_rows($find_count);

          if ($count < 1) {
            echo "<h2 class='text-center text-warning'>No Posts</h2>";
          } else {



            $count = ceil($count / $per_page);

            $query = "SELECT * FROM posts LIMIT $page_1, $per_page";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($result)) {
              $post_id            = $row['post_id'];
              $post_category_id   = $row['post_category_id'];
              $post_title         = $row['post_title'];
              $post_user        = $row['post_user'];
              $post_date          = $row['post_date'];
              $post_image         = $row['post_image'];
              $post_content       = substr($row['post_content'], 0, 50);
              $post_tags          = $row['post_tags'];
              $post_comment_count = $row['post_comment_count'];
              $post_status        = $row['post_status'];
              $post_views_count = $row['post_views_count'];





          ?>

              <div class="video anim" style="--delay: .4s">
                <div class="video-time">8 min</div>
                <div class="video-wrapper">
                  <a href="stream?v_id=<?php echo $post_id; ?>"><img class="thumb" src="images/<?php echo $post_image; ?>" /></a>

                  <div class="author-img__wrapper video-author">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                      <path d="M20 6L9 17l-5-5" />
                    </svg>
                    <img class="author-img" src="images/<?php echo $post_image; ?>" />
                  </div>
                </div>
                <div class="video-by"><a href="author_posts?author=<?php echo $post_user; ?>&v_id=<?php echo $post_id; ?>"><?php echo $post_user; ?></a></div>
                <div class="video-name"><a href="stream?v_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></div>
                <div class="video-view"><?php echo $post_views_count; ?> views<span class="seperate video-seperate"></span><?php echo $post_date; ?></div>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>

    <?php include("includes/footer.php"); ?>