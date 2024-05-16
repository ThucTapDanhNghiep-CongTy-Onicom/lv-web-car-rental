<section class="ftco-section testimony-section bg-light" id="location">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading" data-i18n="home.content.location.heading"></span>
                <h2 class="mb-3" data-i18n="home.content.location.title"></h2>
            </div>
        </div>
        <div class="splide">
            <div class="splide__track" style="padding: 10px 0;">
                <ul class="splide__list">
                    @foreach($region as $location)
                    @if(isset($location))
                    @php
                        $encode = encrypt($location->id);
                    @endphp
                    <li style="background: url(<?= $location->photo ?>) no-repeat center center;border: 5px solid #E85626" class="splide__slide snip0019">
                        <a href="{{route('car.location',$encode)}}">
                            <figcaption>
                                <div>
                                    <h2></h2>
                                </div>
                                <div>
                                    <p>{{$location->title}}</p>
                                </div>
                                <a href="{{route('car.location',$encode)}}"></a>
                            </figcaption>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-intro partner mb-2" style="background: url(/ui/images/bg_2.jpg) center;">
    <div class="overlays"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h3 class="mb-3 text-white" data-i18n="home.content.partnerRegis.content"></h3>
                <a href="{{route('partner.registration')}}" class="btn btn-secondary btn-lg" data-i18n="home.content.partnerRegis.btnRegis"></a>
            </div>
        </div>
    </div>
</section>
<style>
    .ftco-intro.partner .overlays {
    position: absolute;
    top: -120px;
    left: -100px;
    right: 0;
    bottom: -120px;
    width: 40%;
    content: '';
    opacity: 1;
    background: #e85626;
    -ms-transform: rotate(18deg);
    -webkit-transform: rotate(18deg);
    transform: rotate(18deg);
}
</style>