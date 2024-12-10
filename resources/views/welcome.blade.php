@extends('layouts.gallery')

@section('content')

<div class="container-fluid py-4">
    <main id="events" class="wrapper main-content" role="main">
        <div>
            <a href="{{asset('storage/home.jpg')}}" data-lightbox="photos"><img class="img-fluid" loading="lazy" src="{{asset('storage/home.jpg')}}"></a>
        </div>
        <div>
            <div class="appy-row color_1_exact_bg color_1_exact_alt">
                <div class="subhead center-text padding-4">Events</div>
            </div>


            <div class="appy-row padding-7-t">
                <div class="center-block width-3">
                    <div class="event-date-circle color_1_exact_bg color_1_exact_alt dropdown">
                        <div class="event-date-circle-content dropdown-toggle" style="cursor: pointer;" data-toggle="dropdown" aria-expanded="false">
                            <span class="date-main"><span>Sat</span><br><span>Dec 28</span><br><span>2024</span></span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right appy-add-calendar" data-appy-add-calendar="{&quot;title&quot;: &quot;Ceremony and Reception at Spring Garden Event Centre &quot;, &quot;start&quot;: &quot;2024-12-28T13:30:00-22:00&quot;, &quot;end&quot;: &quot;&quot;, &quot;address&quot;: &quot;Spring Garden Event Centre Port Harcourt &quot;, &quot;description&quot;: &quot;}">
                            <div class="dropdown-header">Choose</div>
                            <ul class="nav nav-pills nav-stacked push">
                                <li>
                                    <a target="_blank" class="appy-add-calendar-google" href="https://www.google.com/calendar/render?action=TEMPLATE&amp;text=Ceremony%20and%20Reception%20at%20Hilton%20Tampa%20Downtown&amp;dates=20220529T203000Z/20220529T213000Z&amp;details=For%20more%20details%20about%20this%20event%20visit:%20www.appycouple.com/wedding/meettheoyes&amp;location=211%20N%20Tampa%20St%20Tampa%20FL%2033602%20United%20States%20&amp;sprop=&amp;sprop=name:" style="color: #000;"><i class="fa fa-fw fa-google push-5-r"></i> Google</a>
                                </li>
                                <li>
                                    <a target="_blank" class="appy-add-calendar-yahoo" href="http://calendar.yahoo.com/?v=60&amp;view=d&amp;type=20&amp;title=Ceremony%20and%20Reception%20at%20Hilton%20Tampa%20Downtown&amp;st=20220529T203000Z&amp;dur=0100&amp;desc=For%20more%20details%20about%20this%20event%20visit:%20www.appycouple.com/wedding/meettheoyes&amp;in_loc=211%20N%20Tampa%20St%20Tampa%20FL%2033602%20United%20States%20" style="color: #000;"><i class="fa fa-fw fa-yahoo push-5-r"></i> Yahoo</a>
                                </li>
                                <li>
                                    <a class="appy-add-calendar-ical" href="data:text/calendar;charset=utf8,BEGIN:VCALENDAR%0AVERSION:2.0%0ABEGIN:VEVENT%0AURL:https://www.appycouple.com/wedding/meettheoyes/eventsdetail/?e=590306%0ADTSTART:20220529T203000Z%0ADTEND:20220529T213000Z%0ASUMMARY:Ceremony%20and%20Reception%20at%20Hilton%20Tampa%20Downtown%0ADESCRIPTION:For%20more%20details%20about%20this%20event%20visit:%20www.appycouple.com/wedding/meettheoyes%0ALOCATION:211%20N%20Tampa%20St%20Tampa%20FL%2033602%20United%20States%20%0AEND:VEVENT%0AEND:VCALENDAR" style="color: #000;"><i class="fa fa-fw fa-apple push-5-r"></i> Apple</a>
                                </li>
                                <li>
                                    <a class="appy-add-calendar-outlook" href="data:text/calendar;charset=utf8,BEGIN:VCALENDAR%0AVERSION:2.0%0ABEGIN:VEVENT%0AURL:https://www.appycouple.com/wedding/meettheoyes/eventsdetail/?e=590306%0ADTSTART:20220529T203000Z%0ADTEND:20220529T213000Z%0ASUMMARY:Ceremony%20and%20Reception%20at%20Hilton%20Tampa%20Downtown%0ADESCRIPTION:For%20more%20details%20about%20this%20event%20visit:%20www.appycouple.com/wedding/meettheoyes%0ALOCATION:211%20N%20Tampa%20St%20Tampa%20FL%2033602%20United%20States%20%0AEND:VEVENT%0AEND:VCALENDAR" style="color: #000;"><i class="fa fa-fw fa-windows push-5-r"></i> Outlook</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="subheadLarge padding-7-t center-text subevent-name">Ceremony and Reception</div>
                <!-- EVENT DATE/TIME INFOS -->
                <div class="center-block width-4 padding-7-t">
                    <div class="events-time">
                        <i class="icon-clock icons"></i>
                        <span class="events-time-stamp font-bolder">
                            1:30 pm </span>
                    </div>
                    <div class="events-address">
                        <p translate="no" typeof="schema:PostalAddress">
                            <span property="schema:name">Spring Garden Event Centre</span><br>
                            <span property="schema:streetAddress">
                                10 Peter Odili Rd, </span><br>
                            <span property="schema:addressLocality">Okuruama</span>, <span property="schema:addressRegion">Port Harcourt</span> <span property="schema:postalCode">500001</span><br> <span property="schema:addressCountry">Nigeria</span>
                        </p>
                        <p> </p>
                    </div>
                    <hr>
                    <div class="events-link center-text">
                        <a href="https://maps.app.goo.gl/vAyDDqSY6aftJmTZ8" class="mobile-icon-link" target="_blank">
                            Map to venue </a><br>
                    </div>
                </div>
                <!-- END EVENT -->
                <div class="widget-container padding-7-t">
                    <div class="event-widget-container active" data-key="590306">


                        <div id="block-2" class="appy-widget draggable-item widget widget-base legacy legacy-widget-note" data-key="2" data-type="BASE" data-id="4020125">
                            <a name="block-4020125"></a>
                            <div class="widget-category-title subheadSmallT2 color_1_exact_bg color_1_exact_alt">
                                <span><i class="fa fa-location-arrow" aria-hidden="true"></i></span> Directions &amp; Map
                            </div>

                            <div class="widget-content">
                                <div class="map">
                                    <iframe width="100%" height="300" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15903.384270694165!2d7.0395734!3d4.7964631!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1069cc42ab6baa63%3A0x613ba108b45ab71a!2sSpring%20Gardens!5e0!3m2!1sen!2sng!4v1733852694155!5m2!1sen!2sng" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <div class="widget-link">
                                    <p><a href="https://www.google.com/maps/place/211+N+Tampa+St+%2C+Tampa%2C+FL+33602+US+/" class="widget-link-icon" target="_blank">www.google.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div id="block-0" class="appy-widget draggable-item widget widget-base legacy legacy-widget-note" data-key="0" data-type="BASE" data-id="4108942">
                            <a name="block-4108942"></a>
                            <div class="widget-category-title subheadSmallT2 color_1_exact_bg color_1_exact_alt">
                                <span><i class="fa fa-comment" aria-hidden="true"></i></span> RSVP Note
                            </div>

                            <div class="widget-content">
                                <div class="widget-content-text">
                                    <p></p>
                                    <p>Ladies and Gentlemen, thank you for completing your RSVP in a timely manner. We have closed our reservations. We look forward to celebrating with you soon!&nbsp;&nbsp;</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div id="block-3" class="appy-widget draggable-item widget widget-base legacy legacy-widget-note" data-key="3" data-type="BASE" data-id="4020127">
                            <a name="block-4020127"></a>
                            <div class="widget-category-title subheadSmallT2 color_1_exact_bg color_1_exact_alt">
                                <span><i class="fa fa-black-tie" aria-hidden="true"></i></span> Dress Code
                            </div>

                            <div class="widget-content-title">
                                <p>Look classy in any of the below colours</p>
                                <p> <a href="{{asset('storage/cod.jpg')}}" data-lightbox="photos"><img class="img-fluid" loading="lazy" src="{{asset('storage/cod.jpg')}}"></a>
                                </p>
                            </div>
                            <div class="widget-content">
                                <div class="widget-content-text">
                                    <p></p>
                                    <p>We would love for our guests to join us in our celebration by dressing elegant and classy.</p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- <div class="mobile-next-section-btn btn_color_2_dark ">
                <a href="/wedding/meettheoyes/eventsdetail/?e=603301">
                    <span><i class="icon-arrow-right icons"></i></span>
                </a>
            </div> -->
        </div>
    </main>
    <div>
        <img style="max-width: 100%;" src="">
        <a href="{{asset('storage/ff24-newspaper.jpg')}}" data-lightbox="photos"><img class="img-fluid" loading="lazy" src="{{asset('storage/ff24-newspaper.jpg')}}"></a>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header pb-0 text-center">
                    <img class="img-fluid" style="max-width: 100%;" src="{{asset('storage/cover-pic.jpg')}}">
                </div>
                <div class="card-body">
                    <div class="title">
                        Our Story
                    </div>
                    <div class="">
                        <p>Favour and Fortune met by chance but quickly realized their meeting was destiny.
                            Through laughter and shared dreams, their bond grew unbreakable.
                            Fortune's steady heart matched Favour's radiant spirit, creating a love story of harmony and joy.
                            Today, they invite you to celebrate the beginning of their forever together. ❤
                        </p>

                        <p>We cant wait to see all the memories you help capture!</p>

                        <!-- <p>Please scan the QR CODE with your smartphone's camera and upload your photo and video</p> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.guest.footer')
@endsection