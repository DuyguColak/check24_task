<?php
 include "includes/session.inc.php";
 if (!isset($_SESSION['userid'])){
  header("location: index.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Check24 - New Article</title>
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

    <section id="articles" class="container">      
        <div id="comment-form">
            <h4>New Article</h4>
            <form action="includes/new_article.inc.php" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <div class="col-sm-6">
                        <select id="authorid" name="authorid" class="form-control" aria-label="Default select example">
                          <option selected>Authors</option>
                          <?php 
                            include "includes/authors.inc.php";
                            foreach ($authors as $author)
                            {
                          ?>
                            <option value="<?php echo $author['userid']; ?>"><?php echo $author['firstname']. " ".$author['lastname'] ; ?></option>
                          <?php
                            }
                          ?>         
                       </select>
                    </div>  
                    <div class="col-sm-6">
                        <input type="text" id="articletitle" name="articletitle" class="form-control" placeholder="Title" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea id="articletext" name="articletext" class="form-control" placeholder="ArticleText" required></textarea>
                    </div>
                </div> 
                <div class="form-group">                   
                    <div class="col-sm-12">
                      <input type="file" class="form-control" id="articleimage" name="articleimage" aria-describedby="fileupload" aria-label="Upload">
                      <label class="input-group-text" for="articleimage">Upload</label>
                    </div>
                </div>              
                <button type="submit" name="submit"  class="btn btn-danger">Add</button>
            </form>
        </div><!--/#comment-form-->        
    </section><!--/#articles-->


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>