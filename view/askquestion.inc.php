<?php
    if(isset($_POST['submit'])){
      $txtDocument = $_POST['document'];
      $txtQuestion = $_POST['question'];
      $Status = 1;
      $txtRaised = $_POST['raised'];
      $txtDateRaised = date('Y-m-d');
      $txtRequired = date('y-m-d', strtotime($_POST['required']));
      $txtDateClose = date('Y-m-d', strtotime($_POST['dataclose']));
//      $qr = "INSERT INTO question (`document`, `question`, `status`, `raised_by`, `date_raised`, `Required_finish_date`, `date_closed`) VALUES ('$txtDocument', '$txtQuestion', '$Status', '$txtRaised', '$txtDateRaised', '$txtRequired', '$txtDateClose')";
      $DB = new DB_driver();
      $DB->insert('question', array('document' => $txtDocument, 'question' => $txtQuestion, 'status' => $Status, 'raised_by' => $txtRaised, 'date_raised' => $txtDateRaised, 'Required_finish_date' => $txtRequired,'date_closed' => $txtDateClose));
      header("location: index.php");
    }
?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row" style="padding-top: 50px;">
            <form class="form-horizontal" method="post">
                <fieldset>
                    <legend>Ask Question</legend>
                    <div class="form-group">
                        <label for="inputDocument" class="col-lg-2 control-label">Document</label>
                        <div class="col-lg-10">
                            <input type="text" name="document" class="form-control" id="inputDocument" placeholder="Document">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textquestion" class="col-lg-2 control-label">Question</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="question" rows="3" id="textquestion"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputraised" class="col-lg-2 control-label">Raised By</label>
                        <div class="col-lg-10">
                            <input type="text" name="raised" class="form-control" id="inputraised" placeholder="raised by...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputrequired" class="col-lg-2 control-label">Required Finish Date</label>
                        <div class="col-lg-10">
                            <input type="date" name="required" class="form-control" id="inputrequired">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputdataclose" class="col-lg-2 control-label">Date Close</label>
                        <div class="col-lg-10">
                            <input type="date" name="dataclose" class="form-control" id="inputdataclose" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button name="submit" type="submit" class="btn btn-primary">POST QUESTION</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>