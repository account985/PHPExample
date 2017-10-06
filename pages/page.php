<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>分页功能</title>
  </head>
  <style>
  body {
    font-size: 15px;
    font-family: verdana;
    width:100%;
  }
  div.page {
    text-align: center;
  }
  div.page a {
    border:#aaaadd 1px solid;
    text-decoration: none;
    padding: 2px 5px 2px 5px;
    margin: 2px;
  }
  div.page span.current a {
    border: 0px;
    background-color: #000099;
    padding: 4px 6px 4px 6px;
    margin: 2px;
    color: #fff;
    font-weight: bold;
  }
  div.content {
    height: 500px;
  }
  div.page span.end {
    border: #eee 1px solid;
    padding: 2px 5px 2px 5px;
    margin: 2px;
    color: #ddd;
  }
  div.page form {
    display: inline;
  }

  </style>
  <body>
    <?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', 'dovedefu');
    define('DB_NAME', 'page');
    define('TB_NAME', 'page');
    $page = 1;
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    $link = mysqli_connect(HOST, USER, PASSWORD);
    if(!$link) {
      die('连接数据库失败');
    }
    mysqli_select_db($link, DB_NAME) or die('打开数据库失败');
    mysqli_set_charset($link, 'utf-8');
    $pageSize = 10;
    $total_sql = "SELECT count(*) FROM ".TB_NAME;
    $totalArr = mysqli_fetch_row(mysqli_query($link, $total_sql));
    $total = ceil($totalArr[0] / $pageSize);
    $sql = "SELECT * FROM ".TB_NAME." LIMIT ".($page - 1) * $pageSize .", ".$pageSize;
    $res = mysqli_query($link, $sql);
    $banner = "";
    $banner .= "<div class='page'><div class='content'><table border=1 cellspacing=0 width=40% align='center'>";
    $banner .= "<tr><td>id</td><td>name</td></tr>";
    while($row = mysqli_fetch_assoc($res)) {
      $banner .= "<tr>";
      $banner .= "<td>{$row['id']}</td>";
      $banner .= "<td>{$row['name']}</td>";
      $banner .= "</tr>";
    }
    $banner .= "</table></div>";
    $pageNum = 5;
    $pageOffset = ($pageNum - 1) / 2;
    if($page > 1) {
      $banner .= "<a href='".$_SERVER['PHP_SELF']."?page=1'>首页</a>";
      $banner .= "<a href='".$_SERVER['PHP_SELF']."?page=".($page-1)."'><上一页</a>";
    }else {
      $banner .= "<span class='end'><a>首页</a><a><上一页</a></span>";
    }
    $start = 1;
    $end = $total;
    if($total > $pageNum) {
      if($page > $pageOffset + 1) {
        $banner .= "...";
      }
      if($page > $pageOffset) {
        $start = $page - $pageOffset;
        $end = $total > $page + $pageOffset ? $page + $pageOffset : $total;
        if($page + $pageOffset > $total) {
          $start = $start - ($page + $pageOffset - $end);
        }
      }else {
        $start = 1;
        $end = $total > $page ? $pageNum : $total;
      }
    }
    for($i = $start;$i <= $end;$i ++) {
      if($i == $page) {
        $banner .= "<span class='current'><a href='".$_SERVER['PHP_SELF']."?page=".$i."'>$i</a></span>";
      }else {
        $banner .= "<a href='".$_SERVER['PHP_SELF']."?page=".$i."'>$i</a>";
      }
    }
    if($total > $page + $pageOffset) {
      $banner .= "...";
    }
    if($page < $total) {
      $banner .= "<a href='".$_SERVER['PHP_SELF']."?page=".($page+1)."'>下一页></a>";
      $banner .= "<a href='".$_SERVER['PHP_SELF']."?page=".$total."'>尾页</a>";
    }else {
      $banner .= "<span class='end'><a>下一页></a><a>尾页</a></span>";
    }
    $banner .= "共".$total."页,";
    $banner .= "<form method='get' action='page.php'>";
    $banner .= "跳转到第<input type='text' size='2' name='page' value='".$page."'>页";
    $banner .= "<input type='submit' value='确定'>";
    $banner .= "</form></div>";
    echo $banner;
    mysqli_close($link);
    ?>
  </body>
</html>
