<?php include("includes/header.php"); ?>

<body>
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
        <div class="user-settings">
          <?php
          $category_title = $_GET['name'];
          ?>

        </div>
      </div>
      <div class="main-container">

        <div class="small-header anim" style="--delay: .3s">Category : <?php echo $category_title; ?></div>
        <div class="videos">

          <?php

          if (isset($_GET['id'])) {
            $the_get_category_id = $_GET['id'];


            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin') {
              $query = "SELECT * FROM posts WHERE post_category_id = $the_get_category_id";
            } else {
              $query = "SELECT * FROM posts WHERE post_category_id = $the_get_category_id AND post_status = 'published'";
            }



            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) < 1) {
              echo "<h2 class='text-center text-danger'>No posts</h2>";
            } else {



              while ($row = mysqli_fetch_array($result)) {
                $post_id            = $row['post_id'];
                $post_category_id   = $row['post_category_id'];
                $post_title         = $row['post_title'];
                $post_author        = $row['post_author'];
                $post_date          = $row['post_date'];
                $post_image         = $row['post_image'];
                $post_content       = substr($row['post_content'], 0, 50);
                $post_tags          = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status        = $row['post_status'];
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
          } else {
            // header("Location: index.php");
          }
          ?>

        </div>
      </div>
    </div>
    <?php include("includes/footer.php"); ?>