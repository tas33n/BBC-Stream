<section class="tall">
  <nav class="jmenu">
    <label for="menu-btn" class="jm-menu-btn jm-icon-menu"></label>
    <input type="checkbox" id="menu-btn" class="jm-menu-btn">
    <ul class="jm-collapse">
      <li><a href="./index"><i class="fa fa-home"></i></a></li>
      <li class="jm-dropdown">
        <a href="javascript:void(0)"><i class="fa fa-columns" aria-hidden="true"></i></a>
        <ul>
          <li><a href="./category.php?id=1&name=HOT">HOT</a></li>
          <li><a href="./category.php?id=2&name=DESI">Desi</a></li>
          <li><a href="./category.php?id=3&name=UNIVERSAL">Universal</a></li>
        </ul>
      </li>
      <li class="jm-dropdown srch"><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
        <ul class="srch-d" style="
    height: 53px;
    padding: 0 20px;
    left: -150px;
">
          <div class="input-group" style="min-width:230px;">
            <form action="/search.php">
              <div class="form-outline" style="float:left;">
                <input name="search" type="search" id="form1" class="form-control" />
              </div>
              <button type="submit" class="btn btn-primary" style="float: left;">
              <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </ul>

      </li>
      <li class="jm-dropdown">
        <a href="javascript:void(0)"><i class="fa fa-bars" aria-hidden="true"></i></a>
        <ul>
          <li><a id="lol" href="javascript:void(0)"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Login</a></li>
          <li><a href="javascript:void(0)">About</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</section>

<?php include("includes/logsign.php"); ?>

<script src='./js/jquery.js'></script>
<script src='https://vjs.zencdn.net/5-unsafe/video.js'></script>
<script src="./js/script.js"></script>



</body>

</html>