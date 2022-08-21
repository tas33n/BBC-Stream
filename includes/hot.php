 <?php

  $the_get_category_id = 1;


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
      $post_user        = $row['post_user'];
      $post_date          = $row['post_date'];
      $post_image         = $row['post_image'];
      $post_content       = substr($row['post_content'], 0, 50);
      $post_tags          = $row['post_tags'];
      $post_comment_count = $row['post_comment_count'];
      $post_status        = $row['post_status'];
      $post_views_count = $row['post_views_count'];
  ?>


     <div class="main-blog anim" style="--delay: .1s; background-image: url(/images/<?php echo $post_image; ?>); background-size: cover;
    background-position-x: center;;">
       <div class="main-blog__title"><a href="stream?v_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></div>
       <div class="main-blog__author">
         <div class="author-detail">
           <div class="author-info"><?php echo $post_views_count; ?> views <span class="seperate"></span><?php echo $post_date; ?></div>
         </div>
       </div>
       <div class="main-blog__time">7 min</div>
     </div>


 <?php
    }
  }
  ?>