<!DOCTYPE html>
<html lang="en">

<?php include('layout/header.php'); ?>

<body>
    <!-- Topbar Start -->
 
    <!-- Topbar End -->
    <?php include('layout/nav.php'); ?>

<!-- Main Body Start -->
<?php  $sql = mysqli_query($db,"SELECT * FROM settings")->fetch_assoc(); ?>
<?php  $Usersql = mysqli_query($db,"SELECT * FROM users WHERE UserId='$sessionId'")->fetch_assoc();  ?>

    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact Us</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form action="functions.php" method="POST" >
                        <div class="control-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" 
                            value="<?php echo $Usersql['FullName']; ?>"
                            disabled />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            value="<?php echo $Usersql['Email']; ?>"
                            disabled  />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" name="message" rows="8" id="message" placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                       <input type="submit" name="contact" class="btn btn-primary py-2 px-4" id="sendMessageButton" value="Send Message">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i></i><?php echo $sql['Address']; ?></p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i></i><?php echo $sql['Email']; ?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i></i><?php echo $sql['Phone']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<!-- Main Body End -->

    <!-- Back to Top -->
<?php include('layout/footer.php'); ?>

    <!-- JavaScript Libraries -->

</body>

</html>