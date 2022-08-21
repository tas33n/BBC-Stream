<?php include("includes/db.php");
session_start();
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Billionaire Boys Club</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://vjs.zencdn.net/5-unsafe/video-js.css'>
  <link rel="stylesheet" href="jmenu.min.css">
  <link rel="stylesheet" href="./style.css">

</head>

<body>


  <?php

  if (isset($_GET['v_id'])) {
    $the_get_post_id = $_GET['v_id'];

    $view_query = "UPDATE posts set post_views_count = post_views_count + 1 WHERE post_id = $the_get_post_id";
    $send_query = mysqli_query($connection, $view_query);

    if (!$send_query) {
      die("Query failed " . mysqli_error($connection));
    }

    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin') {
      $query = "SELECT * FROM posts WHERE post_id = $the_get_post_id";
    } else {
      $query = "SELECT * FROM posts WHERE post_id = $the_get_post_id AND post_status = 'published'";
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
        $post_content       = $row['post_content'];
        $post_tags          = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status        = $row['post_status'];
  ?>

    <?php
      }
    }
    ?>

  <?php

  } else {
    header("Location: index.php");
  }
  ?>

  <!-- partial:index.partial.html -->
  <div class="container">

    <div class="wrapper">
      <div class="header">
        <?php include("includes/header.php"); ?>
      </div>

      <div class="main-container show">
        <div class="stream-area">
          <div class="video-stream">
            <video id="my_video_1" class="video-js vjs-default-skin anim" width="640px" height="267px" controls preload="none" poster='images/<?php echo $post_image; ?>' data-setup='{ "aspectRatio":"940:620", "playbackRates": [1, 1.5, 2] }'>
              <source src="<?php echo $post_content; ?>" type='video/mp4' />
              <source src="<?php echo $post_content; ?>" type='video/webm' />
            </video>
            <div class="video-detail">
              <div class="video-content">
                <div class="video-p-wrapper anim" style="--delay: .1s">
                  <div class="author-img__wrapper video-author video-p">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                      <path d="M20 6L9 17l-5-5" />
                    </svg>
                    <img class="author-img" src="https://images.pexels.com/photos/1680172/pexels-photo-1680172.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" />
                  </div>
                  <div class="video-p-detail">
                    <div class="video-p-name"><?php echo $post_user; ?></div>
                    <div class="video-p-sub">1,980,893 subscribers</div>
                  </div>
                  <div class="button-wrapper">
                    <button class="like">
                      <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.435 2.582a1.933 1.933 0 00-1.93-.503L3.408 6.759a1.92 1.92 0 00-1.384 1.522c-.142.75.355 1.704 1.003 2.102l5.033 3.094a1.304 1.304 0 001.61-.194l5.763-5.799a.734.734 0 011.06 0c.29.292.29.765 0 1.067l-5.773 5.8c-.428.43-.508 1.1-.193 1.62l3.075 5.083c.36.604.98.946 1.66.946.08 0 .17 0 .251-.01.78-.1 1.4-.634 1.63-1.39l4.773-16.075c.21-.685.02-1.43-.48-1.943z" />
                      </svg>
                      Share
                    </button>
                    <button class="like red">
                      <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.85 2.5c.63 0 1.26.09 1.86.29 3.69 1.2 5.02 5.25 3.91 8.79a12.728 12.728 0 01-3.01 4.81 38.456 38.456 0 01-6.33 4.96l-.25.15-.26-.16a38.093 38.093 0 01-6.37-4.96 12.933 12.933 0 01-3.01-4.8c-1.13-3.54.2-7.59 3.93-8.81.29-.1.59-.17.89-.21h.12c.28-.04.56-.06.84-.06h.11c.63.02 1.24.13 1.83.33h.06c.04.02.07.04.09.06.22.07.43.15.63.26l.38.17c.092.05.195.125.284.19.056.04.107.077.146.1l.05.03c.085.05.175.102.25.16a6.263 6.263 0 013.85-1.3zm2.66 7.2c.41-.01.76-.34.79-.76v-.12a3.3 3.3 0 00-2.11-3.16.8.8 0 00-1.01.5c-.14.42.08.88.5 1.03.64.24 1.07.87 1.07 1.57v.03a.86.86 0 00.19.62c.14.17.35.27.57.29z" />
                      </svg>
                      Liked
                    </button>
                  </div>
                </div>
                <div class="video-p-title anim" style="--delay: .2s"><a href="#"><?php echo $post_title; ?></a></div>

              </div>
            </div>
          </div>
          <div class="chat-stream">
            <div class="chat-vid__container">
              <div class="chat-vid__title anim" style="--delay: .3s">Related Videos</div>


              <?php

              $per_page = 32;

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

                  <div class="chat-vid anim" style="--delay: .4s">
                    <div class="chat-vid__wrapper">
                      <img class="chat-vid__img" src="images/<?php echo $post_image; ?>" />
                      <div class="chat-vid__content">
                        <div class="chat-vid__name"><a href="stream?v_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></div>
                        <div class="chat-vid__by"><a href="author_posts?author=<?php echo $post_user; ?>&v_id=<?php echo $post_id; ?>"><?php echo $post_user; ?></a></div>
                        <div class="chat-vid__info"><?php echo $post_views_count; ?> views <span class="seperate"></span> <?php echo $post_date; ?></div>
                      </div>
                    </div>
                  </div>

              <?php
                }
              }

              ?>

              <div class="chat-vid__button anim" style="--delay: .6s">See All related videos <?php echo $count; ?> (32)</div>
            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
  <?php include("includes/footer.php"); ?>
    <?php include("includes/logsign.php"); ?>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://vjs.zencdn.net/5-unsafe/video.js'></script>
  <script src="./script.js"></script>

</body>

</html>