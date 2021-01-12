<?php
include("../layouts/header.php");
?>


    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Event</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="welcome-wrap">
        <div class="container">
            <div class="row">


                <br/>

                <br/>
                <div class="container">
                    <div id="calendar"></div>
                </div>
                <!--            <div id="myModal" class="modal fade" role="dialog">-->
                <!--                <div class="modal-dialog">-->
                <!---->
                <!--                     Modal content-->
                <!--                    <div class="modal-content">-->
                <!--                        <div class="modal-header">-->
                <!--                            <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                <!--                            <h4 class="modal-title">Modal Header</h4>-->
                <!--                        </div>-->
                <!--                        <div class="modal-body">-->
                <!--                            <p>Some text in the modal.</p>-->
                <!--                        </div>-->
                <!--                        <div class="modal-footer">-->
                <!--                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!---->
                <!--                </div>-->
                <!--            </div>-->

            </div>
        </div>
    </div>

    <div class="about-testimonial">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </div>
    <script>

        $(document).ready(function () {
            // $("#myModal").hide();
            var calendar = $('#calendar').fullCalendar({

                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },
                events: 'load.php',

                eventClick: function (calEvent) {
                    var title = calEvent.title;
                    var date = calEvent.start;
                    var end_date = calEvent.end;
                    var place = calEvent.place;
                    var id = calEvent.id;
                    alert(title);

                    // window.location.href = "eventss.php?event_id=" + calEvent.id;


                },


                eventMouseover: function (calEvent, jsEvent) {
                    var tooltip = '<div class="tooltipevent" style="width:100px;height:100px;background:#abc;position:absolute;z-index: 10;">' + calEvent.title + '<br >' + calEvent.place + '</div>';
                    var $tooltip = $(tooltip).appendTo('body');


                    $(this).mouseover(function (e) {
                        $(this).css('z-index', 100);
                        $tooltip.fadeIn('50000000000');
                        $tooltip.fadeTo('1000', 1.9);
                    }).mousemove(function (e) {
                        $tooltip.css('top', e.pageY + 10);
                        $tooltip.css('left', e.pageX + 20);
                    });
                },

                eventMouseout: function (calEvent, jsEvent) {
                    $(this).css('z-index', 8);
                    $('.tooltipevent').remove();
                },
                selectable: true,
                selectHelper: true,


            });


        });

    </script>
<footer class="site-footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="foot-about">
                        <h2><a class="foot-logo" href="#"><img src="../images/donation_hub_white_edit.png"  width="230"></a></h2>

                        <p style="text-align: justify;">No one is useless in this world who lightens the burdens of another. The real destroyer of the liberties of the people is he who spreads among them bounties, donations and benefits. You have not lived today until you have done something for someone who can never repay you. Donation for the society.</p>

                    </div><!-- .foot-about -->
                </div><!-- .col -->
                <div class="col-12 col-md-5 col-lg-2 mt-5 mt-md-0">

                </div>
                <div class="col-12 col-md-6 col-lg-3 mt-5  mt-md-0">
                    <h2>Useful Links</h2>

                    <ul>
                        <li><a href="../Volunteer/index.php">Home</a></li>
                        <li><a href="../Register/volunteer_register.php">Become  a Volunteer</a></li>
                        <li><a href="../Register/donor_register.php">Donate</a></li>
                        <li><a href="../Volunteer/events.php">Events</a></li>
                        <li><a href="../Volunteer/gallery.php">Gallery</a></li>
                        <li><a href="../Volunteer/about.php">About Us</a></li>
                        <li><a href="../Volunteer/contact.php">Contact Us</a></li>
                        <!-- <li><a href="news.php">News</a></li> -->
                    </ul>
                </div><!-- .col -->



                <div class="col-12 col-md-6 col-lg-3 mt-5 ml-md-5 mt-md-0">
                    <div class="foot-contact">
                        <h2>Contact</h2>

                        <ul>
                            <li><i class="fa fa-phone"></i><span>+91 0987654321</span></li>
                            <li><i class="fa fa-envelope"></i><span>info@donationhub.com</span></li>
                            <li><i class="fa fa-map-marker"></i><span>310(Top Floor),"Triveni" Arcade, A. V. Road, Anand-388001</span></li>
                        </ul>
                    </div><!-- .foot-contact -->

                    <div class="subscribe-form">
                        <form class="d-flex flex-wrap align-items-center">
                            <input type="email" placeholder="Your email">
                            <input type="submit" value="send">
                        </form><!-- .flex -->
                    </div><!-- .search-widget -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-widgets -->


</footer><!-- .site-footer -->
