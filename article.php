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
    <title>Check24 | Article</title>
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
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
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
                    <div class="blog-item">
                    
                       <?php 
                        include "includes/article.inc.php";
                       ?>
                        <img class="img-responsive img-blog" src="images/blog/<?php echo $article['articleimage']; ?>" width="100%" alt="" />
                        <div class="blog-content">
                            <h3><?php echo $article['articletitle']; ?></h3>
                            <div class="entry-meta">
                                <span><i class="icon-user"></i> <?php echo $article['name']; ?></span>
                                <span><i class="icon-calendar"></i><?php echo $article['articledate']; ?></span>
                            </div>
                            <p class="lead"><?php echo $article['articletext']; ?></p>

                            <hr>

                            <div id="comments">
                                <div id="comments-list">
                                    <h3>Comments</h3>
                                    <?php 
                  
                                      foreach ($comments as $comment)
                                      {
                                    ?>
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="well">
                                                <div class="media-heading">
                                                    <strong><?php echo $comment['username']; ?></strong>
                                                </div>
                                                <p><?php echo $comment['comment']; ?></p>
                                            </div>
                                        </div>
                                    </div><!--/.media-->
                                    <?php
                                        }
                                    ?>
                                </div><!--/#comments-list-->  

                                <div id="comment-form">
                                    <h3>Leave a comment</h3>
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="name" placeholder="Name">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="email" class="form-control" name="url" placeholder="URL">
                                            </div>                                            
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-danger btn-lg">Submit Comment</button>
                                    </form>
                                </div><!--/#comment-form-->
                            </div><!--/#comments-->
                        </div>
                    </div><!--/.blog-item-->
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