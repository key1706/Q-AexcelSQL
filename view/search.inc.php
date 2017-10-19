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
            <?php
            //nếu tìm kiếm không tìm thấy thì sẽ in ra can not find keyword
            if($search == false){
                ?>
                <div class="alert alert-danger">
                    <strong>ERROR!</strong> Can not find keyword.
                </div>
            <?php }
            //Ngược lại thì xuất ra kết quả tìm kiếm
            else{
                for($i=0; $i<count($data); $i++)
                {
                    ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Question<span style="color: #8f0000"></span></h3>
                        </div>
                        <div class="panel-body">
                            <p><?php echo $search[$i];?></p>
                            <a href="#" class="btn btn-warning">More</a>
                        </div>
                    </div>
                <?php  } }?>

        </div>
    </div>