<?php
 include "includes/session.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Check24 - Articles</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=144716315690681";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  <?php include "includes/menu.inc.php"; ?>
                </ul>
            </div>
        </div>
    </header><!--/header-->

    <section id="blog" class="container">
        <div class="row">
            <aside class="col-sm-4 col-sm-push-8">
                <div></div>
            </aside>        
            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                 <?php 
                  include "includes/articles.inc.php";
                  foreach ($articles as $article)
                  {
                 ?>
                    <div class="blog-item">
                        <a href="article.php?id=<?php echo $article['articleid']; ?>"><img class="img-responsive img-blog" src="images/blog/<?php echo $article['articleimage']; ?>" width="100%" alt="" /></a>
                        <div class="blog-content">
                            <h3><?php echo $article['articletitle']; ?></h3>
                            <div class="entry-meta">
                                <span><i class="icon-user"></i> <?php echo $article['name']; ?></span>
                                <span><i class="icon-calendar"></i><a href="article.php?id=<?php echo $article['articleid']; ?>"><?php echo $article['articledate']; ?></a></span>
                                <span><i class="icon-comment"></i> <a href="article.php?id=<?php echo $article['articleid']; ?>"><?php echo $article['noc']; ?> Comments</a></span>
                            </div>
                            <p><a href="article.php?id=<?php echo $article['articleid']; ?>"><?php echo (strlen($article['articletext']) > 1000?substr($article['articletext'],0,1000).'... ':$article['articletext']); ?></a></p>
                            <?php 
                                if (strlen($article['articletext']) > 1000){
                            ?>
                                <a class="btn btn-default" href="#">Read More <i class="icon-angle-right"></i></a>
                            <?php
                                }
                            ?>
                        </div>
                    </div><!--/.blog-item-->
                 <?php
                  }
                  ?> 
                    <ul class="pagination pagination-lg">
                        <?php
                          for($i = 1; $i <= ceil ($noArticles / 3); $i++ ) {
                        ?>
                           <li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                          }
                        ?>
                    </ul><!--/.pagination-->
                </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>