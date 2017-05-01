<?php
/**
 * scripts/make-offer.php
 * Inserts vehicle info into the contact form
 */
$title = 'Make an Offer';
include '../views/header.php';
include '../views/navbar.php';
require 'db.php';
$db = new DB();

// Get make offer info
$id = $_POST['id'];
$year = $_POST['year'];
$make = $_POST['make'];
$model = $_POST["model"];
$class = $_POST["class"];
$color = $_POST["color"];
$cost = $_POST["cost"];
$status = $_POST["status"];

?>
    <div class="container">
        <br>
        <form class="well form-horizontal" action="#" method="post"  id="contact_form">
            <fieldset>

                <!-- Form Name -->
                <legend>Make an Offer!</legend>
                <center><h4>
                    Contact one of our trained professionals
                    to schedule a test drive!
                </h4></center>
                <br>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">First Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label" >Last Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                        </div>
                    </div>
                </div>


                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Phone #</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="phone" placeholder="(123) 456-7890" class="form-control" type="text">
                        </div>
                    </div>
                </div>


                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Zip Code</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="zip" placeholder="Zip Code" class="form-control"  type="text">
                        </div>
                    </div>
                </div>
                <!-- Text area -->

                <div class="form-group">
                    <label class="col-md-4 control-label">Comments</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea rows="5" class="form-control" name="comment" placeholder="Comments">Hello! I'd like more information on Vehicle #<?php echo 'V' . sprintf('%07d', $id)?>. You know, that sweet <?php echo $year . ' ' . $make . ' ' . $model?> that's listed at <?php echo $cost ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
    </div><!-- /.container -->

<?php include '../views/footer.php'; ?>