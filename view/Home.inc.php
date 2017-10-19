<?php
$DB = new DB_driver();
$Data = $DB->get_list('SELECT * FROM question');
?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <h1>Q&A</h1>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6">
                <div class="sponsor">
                    <script async="" type="text/javascript" src="//cdn.carbonads.com/carbon.js?zoneid=1673&amp;serve=C6AILKT&amp;placement=bootswatchcom" id="_carbonads_js"></script>
                </div>
            </div>
        </div>
        <div class="row">
            <?php for ($i=0;$i< count($Data); $i++)
            { ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Question from <span style="color: #020202"><b><?php echo $Data[$i]['raised_by']; ?></b></span><span class="pull-right" style="color: #020202"><?php echo $Data[$i]['date_raised']; ?></span></h3>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $Data[$i]['question']; ?></p>
                        <a href="index.php?p=detail&id=<?php echo $Data[$i]['question_code'] ?>" class="btn btn-warning">More</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>