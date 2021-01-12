<?php
include("../layouts/header.php");
?>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Contact</h1>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header -->

<div class="contact-page-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="entry-content">
                    <h2>Get In touch with Donation Hub</h2>

                    <p style="text-align: justify;">No one is useless in this world who lightens the burdens of another.
                        The real destroyer of the liberties of the people is he who spreads among them bounties,
                        donations and benefits. You have not lived today until you have done something for someone who
                        can never repay you. Donation for the society.</p>


                    <ul class="contact-info p-0">
                        <li><i class="fa fa-phone"></i><span>+91-0987654321</span></li>
                        <li><i class="fa fa-envelope"></i><span>info@donationhub.com</span></li>
                        <li><i class="fa fa-map-marker"></i><span>310(Top Floor),"Triveni" Arcade, A. V. Road, Anand-388001</span>
                        </li>
                    </ul>
                </div>
            </div><!-- .col -->

            <div class="col-12 col-lg-7">
                <form class="contact-form" method="post" action="mail.php">
                    <input type="text" placeholder="Name" name="name">
                    <input type="email" placeholder="Email" name="email">
                    <textarea rows="15" cols="6" placeholder="Messages" name="msg"></textarea>

                    <span>
                            <input class="btn gradient-bg" type="submit" value="Contact us" name="send">
                        </span>
                </form><!-- .contact-form -->

            </div><!-- .col -->


        </div><!-- .row -->
    </div><!-- .container -->
</div>

<?php
include("../layouts/footer.php");
?>