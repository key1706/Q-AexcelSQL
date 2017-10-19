<?php
    require_once './data/conf/mysqConnect.php';
//include "model/DataExcel.php";
//$data = Reader();
////include_once '../model/DataExcel.php';
//if(isset($_POST['submit'])){
//    $Key_work = $_POST['key_work'];
//    $search = Search($data,$Key_work);
//}
//?>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Fresher PHP Q&A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="public/css/bootstrap.css" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script><script>

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-23019901-1']);
        _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
</head>
<body style="">
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand">Q&A Fresher FSOFT</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li>
                    <a href="../help/">Help</a>
                </li>
<!--                <li>-->
<!--                    <a href="http://news.bootswatch.com">Blog</a>-->
<!--                </li>-->
<!--                <li class="dropdown">-->
<!--                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Cyborg <span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu" aria-labelledby="download">-->
<!--                        <li><a href="https://jsfiddle.net/bootswatch/q0gdqa1q/">Open Sandbox</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="./bootstrap.min.css">bootstrap.min.css</a></li>-->
<!--                        <li><a href="./bootstrap.css">bootstrap.css</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="./variables.less">variables.less</a></li>-->
<!--                        <li><a href="./bootswatch.less">bootswatch.less</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="./_variables.scss">_variables.scss</a></li>-->
<!--                        <li><a href="./_bootswatch.scss">_bootswatch.scss</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>

            <form action="index.php?p=search" class="navbar-form navbar-left" role="search" method="post">
                <div class="form-group">
                    <input name="key_work" type="text" class="form-control" placeholder="Search">
                </div>
                <button name="submit" type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="btn btn-warning" href="index.php?p=askquestion"><span style="color: #020202;">Ask Question</span></a>
                </li>
                <li style="padding-left: 10px;">
                    <a class="btn btn-danger" href="index.php?p=askquestion"><span style="color: #020202;">Upload</span></a>
                </li>
            </ul>

        </div>
    </div>
</div>