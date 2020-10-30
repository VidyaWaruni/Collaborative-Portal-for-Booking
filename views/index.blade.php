@extends('layout')


@section('content')
    {{--start slider--}}

    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1150px;height:550px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:1150px;height:550px;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1150px;height:550px;overflow:hidden;">
            <div>
                <img  data-u="image" src="img/ph1.jpg" />
            </div>
            <div>
                <img  data-u="image" src="img/ph2.jpg" />
            </div>
            <div>
                <img  data-u="image" src="img/ph3.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->

    {{--end slider--}}


    {{--start of our gallery--}}

    <div class="container">
        <h3 style="text-align: center;margin-top: 30px">OUR GALLERY</h3>
        <div class="row">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-4 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                       data-image="img/g1.jpg"
                       data-target="#image-gallery">
                        <img class="img-thumbnail"
                             src="img/g1.jpg"
                             alt="">
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                       data-image="img/g2.jpg"
                       data-target="#image-gallery">
                        <img class="img-thumbnail"
                             src="img/g2.jpg"
                             alt="">
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-4 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                       data-image="img/g3.jpg"
                       data-target="#image-gallery">
                        <img class="img-thumbnail"
                             src="img/g3.jpg"
                             alt="">
                    </a>
                </div>
            </div>


            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                            </button>

                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
<div class="col-lg-4">
<h5>HOTELS</h5>
<p>No matter how nice a hotel is, it's not home. I rarely stay in hotels because I have friends all over the world. Hotel life is about the same in every latitude. Chilling out on the bed in your hotel room watching television, while wearing your own pajamas, is sometimes the best part of a vacation.</p>
</div>
<div class="col-lg-4">
<h5>RESTUARENTS</h5>
<p>In Western countries, most mid- to high-range restaurants serve alcoholic beverages such as beer and wine. Some restaurants serve all the major meals, such as breakfast, lunch, and dinner (e.g., major fast food chains, diners, hotel restaurants, and airport restaurants).</p>
</div>
<div class="col-lg-4">
<h5>BANQUETS</h5>
<p>In a typical restaurant setting, the wait staff will have tables they are assigned to cover, but banquet servers are responsible for accommodating all guests at a function while circulating the room. ... Banquet servers set up for events, carry trays, serve guests, and clean up at the event's conclusion.</p>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<h5>MEETINGHALLS</h5>
<p>The Scarlet All Purpose Room. Appointed with soft seating and a conference, this room is great for unstructured sessions or smaller, intimate groups looking for flexible space in which to create. A flat screen monitor is available for presentations, web-based training, or brainstorming.</p>
</div>
<div class="col-lg-4">
<h5>APARTMENTS</h5>
<p>Each studio has one big room with a small kitchenette and bathroom (=shower+toilet). .... One-bedroom apartments. Each apartment has two rooms, a small kitchenette and bathroom (=shower+toilet)</p>

<br>
<br>
<br>

</div>

    </div>

    {{--end of our gallery--}}

<div class="container" style="margin-top:5s0px">
                <h6 align="center"><font color="#5D6D7E"> Whoever you are, whatever you're looking for, we have the perfect place for you. Our listings include homes, apartments, and other unique places to stay, and are located in Sri Lanka.</font></h6>

                <h6 align="center" ><font color="#5D6D7E">Volar is so much more than your ordinary online scheduling software and reservation system</font></h6>
</div>

@endsection
