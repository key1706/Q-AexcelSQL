<?php
    $id = $_GET['id'];
    $DB = new DB_driver();
    $Data = $DB->get_list("SELECT * FROM question WHERE question_code = $id");
    $comment = $DB->get_list("SELECT * FROM answer WHERE question_code = $id");
    if(isset($_POST['submit'])){
        $txtName = $_POST['name'];
        $txtComment = $_POST['comment'];
        $date = date('Y-m-d');
        $DB->insert('answer', array('question_code' => $id, 'answer' => $txtComment, 'answer_by' => $txtName, 'data_answer' => $date));
        header("location: index.php?p=detail&id=$id");
    }
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
                    <h3 class="panel-title">Answer from <span style="color: #020202"><b><?php echo $comment[$i]['answer_by'];  ?></b></span><span class="pull-right" style="color: #020202"><?php echo $comment[$i]['data_answer']; ?></span></h3>
                </div>
                <div class="panel-body">
                    <p><?php echo $comment[$i]['answer'] ?></p>
                </div>
            </div>
            <?php } ?>

        </div>
        <form class="form-horizontal" method="post">
            <fieldset>
                <legend>Comment</legend>
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                        <input name="name" type="text" class="form-control" id="inputName" placeholder="Name...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="textArea" class="col-lg-2 control-label">Comment</label>
                    <div class="col-lg-10">
                        <textarea name="comment" class="form-control" rows="3" id="textArea"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button name="submit" type="submit" class="btn btn-primary">POST COMMENT</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>