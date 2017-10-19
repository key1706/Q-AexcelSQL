<?php
    $id = $_GET['id'];
    $DB = new DB_driver();
    $Data = $DB->get_list("SELECT * FROM question WHERE question_code = $id");
    $comment = $DB->get_list("SELECT * FROM answer WHERE question_code = $id");
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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Question from <span style="color: #020202"><b><?php echo $Data[0]['raised_by']; ?></b></span><span class="pull-right" style="color: #020202"><?php echo $Data[0]['date_raised']; ?></span></h3>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $Data[0]['question'] ?></p>
                        <a href="index.php?p=detail" class="btn btn-warning">More</a>
                    </div>
                </div>
            <?php for ($i=0;$i< count($comment); $i++)
            { ?>
            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-5 col-sm-6 pull-right panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Answer from <span style="color: #020202"><b><?echo $comment[$i]['answer_by'];  ?></b></span><span class="pull-right" style="color: #020202"><?php echo $comment[$i]['data_answer']; ?></span></h3>
                </div>
                <div class="panel-body">
                    <p><?php echo $comment[$i]['answer'] ?></p>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>