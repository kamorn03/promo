<?php /** @var $parcel \App\Services\Parcel\Model\ElasticParcel */ ?>


@extends('layouts.master')


@section('ga')

    <script>
        
        ga('send', {

            hitType: 'event',

            eventCategory: 'parcel',
 
            eventAction: 'view',

            eventValue: '{{$parcel->getId()}}',

            eventLabel: '{{\Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->id : null}}'

        });

    </script>

@endsection


@section('header')

@parent

@section('og-description', strip_tags($parcel->beschrijving) )

@section('og-title', $parcel->getAddress() . ", " . $parcel->postcode . " " . $parcel->plaats . ' - Promodomo')

@section('page-title', $parcel->getAddress() . ", " . $parcel->postcode . " " . $parcel->plaats . ' - Promodomo')

@if(!$parcel->hasPlaceholderAsCover())

@section('og-image', $parcel->getCoverImage() )

@endif

<link href="{{ asset('assets/cdn/css/summernote.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/cdn/css/chosen.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/cdn/css/magnific-popup.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/cdn/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">





<!-- id: {{ $parcel->getId() }} -->
@endsection

@section('content')


<div id="component" class="component" data-parcel-id="{{ $parcel->getId() }}">

    <!-- START OBJECT FORM -->

    <form method="post" action="" id="objectForm">

        <div class="object-detail" itemscope itemtype="http://schema.org/Product">

            <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

                <meta itemprop="url" content="{{ $parcel->getCoverImage() }}">

                <meta itemprop="width" content="640">

                <meta itemprop="height" content="480">

            </div>

            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

                <meta itemprop="priceCurrency" content="EUR">

                <meta itemprop="price"

                      content="@if( $parcel->hk === 'koop' ) € {{ number_format( $parcel->prijs, 0, '', '.' ) }} @if($parcel->marktstatus === 'K' ) k.k. @endif @else Geen huurprijs @endif">

                <div itemprop="availableAtOrFrom" itemscope itemtype="http://schema.org/Place">

                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

                        <meta itemprop="streetAddress" content="{{ $parcel->getAddress() }}">

                        <meta itemprop="addressLocality" content="{{ $parcel->plaats }}">

                        <meta itemprop="addressRegion" content="NL">

                        <meta itemprop="postalCode" content="{{ $parcel->postcode }}">

                    </div>

                </div>

            </div>

            <div class="row hidden-lg hidden-md hidden-sm" style="margin-bottom: -20px;">

              <div class="kpn-banner pcpPageKpnBanner col-md-12">

                  <a href="https://www.zonnepanelenvergelijker.nl/?leadr_source=ntr_promodomo.nl_zonnepanelen-nl_generiek_woningen_ad1_728x90" target="_blank">

                      <img src="{{ asset('images/banners/zonnepanel-banner.jpg') }}" alt="Zonnepanel">

                  </a>

              </div>

            </div>

            <div class="mobile-info hidden-sm hidden-md hidden-lg">

                <div class="row">

                    <div class="col-xs-12 small-address" style="padding-bottom: 15px;">

                        <span class="h1">

                            {{ $parcel->getAddress() }}

                            @if( !$parcel->hasBeenClaimed )

                            <a href=""> 
                            {{-- {{ route('parcel.claim', ['step' => 1, 'parcel_id' => $parcel->id]) }} --}}

                            @elseif(!$parcel->hasBeenClaimed && $parcel->hk == 'huur')

                            <a data-toggle="modal" data-target="#claimRental">

                            @endif

                            <svg width="22px" height="21px" class="address-icon @if( $parcel->hasBeenClaimed ) address-icon--claim @endif " viewBox="0 0 22 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <g id="Artboard" transform="translate(-859.000000, -751.000000)" fill="#EAEAEA" fill-rule="nonzero">

                                        <g id="Body" transform="translate(615.000000, 672.000000)">

                                            <g id="Header-" transform="translate(36.000000, 69.000000)">

                                                <g id="claim" transform="translate(208.000000, 10.000000)">

                                                    <path d="M21.7469477,18.9160283 C19.0898982,16.2380288 15.589341,14.6652355 11.8357314,14.4526958 L11.8357314,6.80126862 L17.7402858,6.80126862 C18.0355135,6.80126862 18.3307412,6.6312369 18.4994428,6.3336814 C18.6259689,6.07863383 18.6259689,5.7385704 18.4572674,5.4410149 L17.0654796,3.40063431 L18.4572674,1.31774579 C18.6259689,1.06269822 18.6259689,0.722634791 18.4994428,0.425079289 C18.3307412,0.170031715 18.0776889,-4.61852778e-14 17.7402858,-4.61852778e-14 L10.9922236,-4.61852778e-14 C10.5282943,-4.61852778e-14 10.1487159,0.38257136 10.1487159,0.850158577 L10.1487159,14.4952037 C6.39510628,14.7077434 2.93672443,16.2805368 0.237499573,18.9585363 C-0.0999035342,19.2985997 -0.0577281458,19.8512028 0.237499573,20.1912662 C0.448376515,20.31879 0.659253457,20.4038059 0.8701304,20.4038059 L21.1143168,20.4038059 C21.3251938,20.4038059 21.5782461,20.2762821 21.7469477,20.1487583 C22.0843508,19.8086949 22.0843508,19.2560918 21.7469477,18.9160283 Z" id="Shape"></path>

                                                </g>

                                            </g>

                                        </g>

                                    </g>

                                </g>

                            </svg>

                            @if( !$parcel->hasBeenClaimed )

                            </a>

                            @endif

                            @if($parcel->isTrending)

                            <div style="background-color: #EB6553" class="label">@lang('parcel.show.trendingLabel')

                            </div>

                            @endif

                            <span>{{ $parcel->postcode }}, {{ $parcel->plaats }}</span>

                        </span>

                        {{-- @include('pages.parcel.parts.boxes.price-range') --}}

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 cta-box__mobile">

                        {{-- @include('pages.parcel.parts.boxes.cta-box') --}}

                    </div>

                </div>

                <div class="collapse__wrapper">

                  <div id="collapsingAlone" class="">

                    <div class="panel pdpCollapse-panel">

                      <a data-toggle="collapse" data-parent="#collapsingAlone" href="#mobile-collapse1" aria-expanded="true" aria-controls="mobile-collapse1" class="collapsed">

                          <div role="tab" id="mobile-heading1">

                              <h4>

                                  <span class="fa fa-angle-down"></span>

                                  @lang('parcel.show.PDPTip1')

                              </h4>

                          </div>

                      </a>

                      <div id="mobile-collapse1" class="panel-collapse collapse panel-answer" role="tabpanel" aria-labelledby="mobile-heading1">

                        <div class="collapse__text text-left">

                          @lang('parcel.show.PDPTip1Description')

                        </div>

                      </div>

                    </div>

                  <div class="panel pdpCollapse-panel">

                    <a data-toggle="collapse" data-parent="#collapsingAlone" href="#mobile-collapse2" aria-expanded="true" aria-controls="mobile-collapse2" class="collapsed">

                        <div role="tab" id="mobile-heading2">

                            <h4>

                                <span class="fa fa-angle-down"></span>

                                @lang('parcel.show.PDPTip2')

                            </h4>

                        </div>

                    </a>

                    <div id="mobile-collapse2" class="panel-collapse collapse panel-answer" role="tabpanel" aria-labelledby="mobile-heading2">

                        <div class="collapse__text text-left">

                            @lang('parcel.show.PDPTip2Description')

                        </div>

                    </div>

                  </div>

                  <div class="panel pdpCollapse-panel" style="padding-left: 28px; padding-top: 15px; font-size: 12px;">

                      <p class="center-vertically">

                          <a style="color:#7dd995;" href="https://www.degratismakelaar.nl/slim-verkopen-zonder-kosten?utm_medium=Referral&utm_source=Promodomo" target="_blank">Slim jouw huis verkopen zonder kosten - De Gratis Makelaar</a>

                      </p>

                  </div>

                </div>

              </div>

            </div>

            <div class="object-header-image">

                <!-- START TABS -->

                <div class="tab-content panel">

                    <!-- START TAB IMAGES -->

                    <div class="tab-pane active" id="tab-images">

                        <div class="panel panel-detail-image">

                            <div class="object-images">

                                <div class="object-image panel-image-detail">

                                    <div class="detail-image">
                                            <div class="owl-carousel main-images owl-theme visible-xs owl-loaded owl-drag owl-hidden" style="">
                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage"
                                                        style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 161px;">
                                                        <div class="owl-item active" style="width: 161px;">
                                                            <div class="item"> <a href="#" class="magnificpopup-thumbnail" data-index="0"> <img
                                                                        src="https://storage.googleapis.com/promodomo-prod.appspot.com/0599010000230471/images/streetview_small.jpg"
                                                                        class="img-responsive"> </a> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="owl-nav disabled">
                                                    <div class="owl-prev disabled"><img src="/images/icons/arrow-left.svg"></div>
                                                    <div class="owl-next disabled"><img src="/images/icons/arrow-right.svg"></div>
                                                </div>
                                                <div class="owl-dots disabled">
                                                    <div class="owl-dot active"><span></span></div>
                                                </div>
                                            </div>
                                            <div class="images-grid grid-count-0 images-grid__edit hidden-xs">
                                                <div class="item ig-flex ig-column" style="width:60%">
                                                    <div class="ig-flex ig-fh" style="background: white">
                                                        <div id="map3" style="width: 99.7%; height: 436px; display: none; position: relative;"
                                                            class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom"
                                                            tabindex="0">
                                                            <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);">
                                                                <div class="leaflet-pane leaflet-tile-pane">
                                                                    <div class="leaflet-layer " style="z-index: 1; opacity: 1;">
                                                                        <div class="leaflet-tile-container leaflet-zoom-animated"
                                                                            style="z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt=""
                                                                                role="presentation" src="https://c.tile.openstreetmap.org/15/16790/10836.png"
                                                                                class="leaflet-tile leaflet-tile-loaded"
                                                                                style="width: 256px; height: 256px; transform: translate3d(-146px, -140px, 0px); opacity: 1;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="leaflet-pane leaflet-shadow-pane"></div>
                                                                <div class="leaflet-pane leaflet-overlay-pane"></div>
                                                                <div class="leaflet-pane leaflet-marker-pane"><img src="/images/map/house-pin.png"
                                                                        class="leaflet-marker-icon leaflet-zoom-animated leaflet-interactive" alt=""
                                                                        tabindex="0"
                                                                        style="margin-left: -27px; margin-top: -33px; width: 54px; height: 66px; transform: translate3d(0px, 0px, 0px); z-index: 0;">
                                                                </div>
                                                                <div class="leaflet-pane leaflet-tooltip-pane"></div>
                                                                <div class="leaflet-pane leaflet-popup-pane"></div>
                                                                <div class="leaflet-proxy leaflet-zoom-animated"
                                                                    style="transform: translate3d(4.29839e+06px, 2.77416e+06px, 0px) scale(16384);"></div>
                                                            </div>
                                                            <div class="leaflet-control-container">
                                                                <div class="leaflet-top leaflet-left">
                                                                    <div class="leaflet-control-zoom leaflet-bar leaflet-control"><a
                                                                            class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button"
                                                                            aria-label="Zoom in">+</a><a class="leaflet-control-zoom-out" href="#"
                                                                            title="Zoom out" role="button" aria-label="Zoom out">−</a></div>
                                                                </div>
                                                                <div class="leaflet-top leaflet-right"></div>
                                                                <div class="leaflet-bottom leaflet-left"></div>
                                                                <div class="leaflet-bottom leaflet-right">
                                                                    <div class="leaflet-control-attribution leaflet-control"><a href="http://leafletjs.com"
                                                                            title="A JS library for interactive maps">Leaflet</a> | © <a
                                                                            href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="map3Blur"> 
                                                            <button type="button" id="map3BlurButton" class="cta-box__button cta-box__button--block">
                                                                Kaart bekijken
                                                            </button>
                                                         </div>
                                                    </div>
                                                </div>
                                                <div class="item item--edit" style="width:40%"> <a href="#" class="magnificpopup-thumbnail" data-index="0">
                                                        <img src="https://storage.googleapis.com/promodomo-prod.appspot.com/0599010000230471/images/streetview_small.jpg"
                                                            class="img-responsive ig-r-right"> </a> </div>
                                            </div>
                                       
                                       
                                        {{-- @include('pages.parcel.parts.images') --}}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- END TAB IMAGES -->



                    <!-- START TAB MAP -->

                    <div class="tab-pane" id="tab-map">

                        <div id="map" style="width: 100%; height: 436px; display: none;"></div>

                         <div id="mapBlur">

                          <button type="button" id="mapBlurButton" class="cta-box__button cta-box__button--block">Kaart bekijken</button>

                        </div>

                    </div>

                    <!-- END TAB MAP -->



                    <!-- START TAB STREETVIEW -->

                    <!--<div class="tab-pane" id="tab-streetview">-->

                        <!--<div class="visible-btn">-->

                            <!--<button type="button" class="btn btn-default btn-streetview-disabled"-->

                                    <!--onclick="toggleStreetview();">-->

                                <!--@lang('parcel.edit.turnOnStreetview')-->

                            <!--</button>-->

                            <!--<button type="button" class="btn btn-default btn-streetview-enabled"-->

                                    <!--onclick="toggleStreetview();">-->

                                <!--@lang('parcel.edit.turnOffStreetview')-->

                            <!--</button>-->

                        <!--</div>-->

                        <!--<div id="street-view" class="mobile" style="width: 100%;height: 436px;"></div>-->

                    <!--</div>-->

                    <!-- END TAB STREETVIEW -->

                </div>

            </div>

            <div class="mobile-info mobile-info__bottom hidden-sm hidden-md hidden-lg">

                <div class="mobile-share-bar">

                <span href="" class="ms-link toggle-favorite-detail">

                    <img src="/images/icons/heart-m.svg">

                    @lang('parcel.show.mobileFavorites')

                </span>

                <span href="#" href="#" class="ms-link dropdown-toggle" data-toggle="dropdown" role="button"

                      aria-haspopup="true" aria-expanded="false"><img src="/images/icons/share-m.svg">@lang('parcel.show.mobileSocialMedia')</span>

                <ul class="dropdown-menu">

                    <li>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}&title={{ $parcel->getAddress(true) }}"

                           onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')"

                           target="_blank"><span class="fa fa-facebook-square"></span>

                            @lang('parcel.show.shareOnFacebook')</a></li>

                    <li><a href="https://twitter.com/intent/tweet?text=&url={{ url()->current() }}"

                           onclick="return !window.open(this.href, 'Twitter', 'width=640,height=300')"

                           target="_blank"><span class="fa fa-twitter"></span>

                        @lang('parcel.show.shareOnTwitter')</a></li>

                    <li>

                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&summary={{ $parcel->introtext }}&title={{ $parcel->getAddress(true) }}"

                           onclick="return !window.open(this.href, 'LinkedIn', 'width=640,height=300')"

                           target="_blank" title=""><span class="fa fa-linkedin-square"></span>

                            @lang('parcel.show.shareOnLinkedin')</a></li>

                    <li><a href="whatsapp://send?text={{ $parcel->getAddress(true) }} {{ url()->current() }}"

                           data-action="share/whatsapp/share" target="_blank"><span class="fa fa-whatsapp"></span>

                        @lang('parcel.show.sendOnWhatsapp')</a></li>

                    <li>

                        <a href="mailto:?Subject={{ $parcel->getAddress(true) }}&Body={{ $parcel->introtext }} {{ urlencode(strtolower(Request::url())) }}"

                           target="blank"><span class="fa fa-envelope"></span> @lang('parcel.show.sendOnEmail')</a>

                    </li>

                </ul>

                <div style="position: relative; top: -3px; margin-right: -15px;">

                  <img src="/images/icons/heart.svg" style="margin-right: -2px !important;"

                        class="stats-icon toggle-favorite-detail @if($parcel->isFavoritedByUser) favorited @endif">

                  <small>

                      <span class="like-count like-and-fav"> 0x</span></small>

                </div>

                <div style="position: relative; top: -1px;">

                  <img src="/images/icons/views.svg" class="stats-icon views" style="margin-right: 1px !important;">

                  <small>

                      <span class="views-count">0x</span>

                  </small>

                </div>

              </div>

            </div>

            <section class="main-parcel-section">

                <div class="container container-object-detail">

                    <div class="row">

                        <ul class="nav nav-tabs nav-delen">

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"

                                   aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/images/icons/share-btn.svg') }}">  Delen </a>

                                <ul class="dropdown-menu">

                                    <li>

                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}&title={{ $parcel->getAddress(true) }}"

                                           onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')"

                                           target="_blank"><span class="fa fa-facebook-square"></span>

                                            @lang('parcel.show.shareOnFacebook')</a></li>

                                    <li><a href="https://twitter.com/intent/tweet?text=&url={{ url()->current() }}"

                                           onclick="return !window.open(this.href, 'Twitter', 'width=640,height=300')"

                                           target="_blank"><span class="fa fa-twitter"></span>

                                        @lang('parcel.show.shareOnTwitter')</a></li>

                                    <li>

                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&summary={{ $parcel->introtext }}&title={{ $parcel->getAddress(true) }}"

                                           onclick="return !window.open(this.href, 'LinkedIn', 'width=640,height=300')"

                                           target="_blank" title=""><span class="fa fa-linkedin-square"></span>

                                            @lang('parcel.show.shareOnLinkedin')</a></li>

                                    <li>

                                        <a href="whatsapp://send?text={{ $parcel->getAddress(true) }} {{ url()->current() }}"

                                           data-action="share/whatsapp/share" target="_blank"><span

                                                class="fa fa-whatsapp"></span> @lang('parcel.show.sendOnWhatsapp')</a></li>

                                    <li>

                                        <a href="mailto:?Subject={{ $parcel->getAddress(true) }}&Body={{ $parcel->introtext }} {{ urlencode(strtolower(Request::url())) }}"

                                           target="blank"><span class="fa fa-envelope"></span>

                                            @lang('parcel.show.sendOnEmail')</a></li>

                                </ul>

                            </li>

                        </ul>

                        <div class="col-md-9 col-lg-9 first-section">

                            <!-- START OBJECT DETAIL -->

                            <div class="object-detail-main row">

                                <ul class="nav nav-tabs pull-left" id="media-tabs" role="tablist">

                                    @if( count($customImages) > 0 || !$parcel->hasMoreImages && $parcel->heroImage != null )

                                    <li class="media-gallery" onclick="openGallery()">

                                        <a id="a-tab-images" href="#tab-images" data-toggle="tab">

                                            @lang('parcel.show.imagesTab')

                                            ({{ (count($customImages) == 0) ? '1' : count($customImages) }})

                                        </a>

                                    </li>

                                    @endif

                                    <li class="active" onclick="resetGalleryCount()">

                                        <a href="#tab-map" id="a-tab-map" data-toggle="tab">

                                            Kaart 
                                            {{-- @lang('parcel.show.mapTab') --}}

                                        </a>

                                    </li>

                                    <!--<li onclick="resetGalleryCount()">-->

                                        <!--<a href="#tab-streetview" id="a-tab-streetview" data-toggle="tab">-->

                                            <!--@lang('parcel.show.streetviewTab')-->

                                        <!--</a>-->

                                    <!--</li>-->

                                </ul>

                                <div class="panel">

                                    <div class="panel-body">

                                        <div class="row">

                                            <div class="hidden-xs col-md-12 breadcrumb-container">

                                                <!-- START BREADCRUMB -->

                                                <div class="moduletable breadcrumb-detail">

                                                    <ul itemscope itemtype="https://schema.org/BreadcrumbList"

                                                        class="breadcrumb breadcrumb-detail">

                                                        <li class="active"><span class="divider icon-location"></span></li>

                                                        <li itemprop="itemListElement" itemscope

                                                            itemtype="https://schema.org/ListItem">

                                                            <a itemprop="item" href="/" class="pathway"><span

                                                                    itemprop="name">Home</span></a>

                                                            <span class="divider"> > </span>

                                                            <meta itemprop="position" content="1">

                                                        </li>

                                                        <li itemprop="itemListElement" itemscope

                                                            itemtype="https://schema.org/ListItem">

                                                            <a itemprop="item"

                                                               href=""
                                                               {{-- {{ route('PCPsearch') }}/{{$parcel->gemeenteSlug}}/{{$parcel->plaatsSlug}} --}}

                                                               class="pathway">

                                                                <span itemprop="name">{{ $parcel->plaats }}</span>

                                                            </a>

                                                            <span class="divider"> > </span>

                                                            <meta itemprop="position" content="2">

                                                        </li>

                                                        <li itemprop="itemListElement" itemscope

                                                            itemtype="https://schema.org/ListItem">

                                                            <a itemprop="item"

                                                               href=""
                                                                {{-- {{ route('PCPsearch')}}/{{$parcel->gemeenteSlug}}/{{$parcel->plaatsSlug}}/{{$parcel->straatSlug}} --}}

                                                               class="pathway">

                                                                <span itemprop="name">{{ $parcel->straat }}</span>

                                                            </a>

                                                            <span class="divider"> > </span>

                                                            <meta itemprop="position" content="3">

                                                        </li>

                                                        <li itemprop="itemListElement" itemscope

                                                            itemtype="https://schema.org/ListItem">

                                                            <a itemprop="item" style="color: #61677D"

                                                               href=""
                                                               {{-- {{ route('search') }}/{{ $parcel->getSlug() }} --}}

                                                               >

                                                                <span itemprop="name"> {{ $parcel->getHouseNumber() }}</span>

                                                            </a>

                                                            <meta itemprop="position" content="4">

                                                        </li>

                                                    </ul>

                                                </div>

                                                <!-- END BREADCRUMB -->

                                            </div>

                                        </div>

                                        <!-- GOD Mode buttons -->

                                        @if(Auth::check() && Auth::user()->role === 'GOD')

                                        <div class="row text-center god-buttons">



                                            <a href="{{ route('god.parcel.edit', ['parcel_id' => $parcel->id]) }}"

                                               class="btn btn-warning btn-sm" target="_blank">@lang('admin.parcel.edit')</a>

                                            <a href="{{ route('god.parcel', ['parcel_id' => $parcel->id]) }}"

                                               class="btn btn-warning btn-sm" target="_blank">@lang('admin.parcel.raw')</a>

                                            <a href="{{ route('god.parcel.forceStreetview', ['parcel_id' => $parcel->id]) }}"

                                               class="btn btn-warning btn-sm" target="_blank">@lang('admin.parcel.forceStreetview')</a>



                                            @if($parcel->isTrending)

                                            <a href="{{ route('god.parcel.toggleTrending', ['parcel_id' => $parcel->id]) }}"

                                               class="btn btn-danger btn-sm" role="button">@lang('admin.parcel.unmarkTrending')</a>

                                            @else

                                            <a href="{{ route('god.parcel.toggleTrending', ['parcel_id' => $parcel->id]) }}"

                                               class="btn btn-warning btn-sm" role="button">@lang('admin.parcel.markTrending')</a>

                                            @endif



                                            @if ( $parcel->hasBeenClaimed )

                                            <a style="margin-top:10px;"

                                               href="{{ route('god.parcel.removeClaim', ['parcel_id' => $parcel->id]) }}"

                                               class="btn btn-warning btn-sm" role="button">@lang('admin.parcel.removeOwner',

                                                ['user' => $parcel->hasBeenClaimedByUserEmail])</a>

                                            @endif



                                            @if ( $parcel->isDeleted )

                                            <a style="margin-top:10px;"

                                               href="{{ route('god.parcel.toggleDelete', ['parcel_id' => $parcel->id]) }}"

                                               class="btn btn-warning btn-sm"

                                               role="button">@lang('admin.parcel.undelete')</a>

                                            @else

                                            <a style="margin-top:10px;"

                                               href="{{ route('god.parcel.toggleDelete', ['parcel_id' => $parcel->id]) }}"

                                               class="btn btn-danger btn-sm" role="button">@lang('admin.parcel.delete')</a>

                                            @endif



                                        </div>

                                        @endif

                                        <!-- END GOD Mode buttons -->

                                        <div class="row space-bottom hidden-xs">

                                            <div class="col-xs-12"></div>

                                            <div class="col-xs-6 col-sm-6 col-md-6 small-address">



                                                <h1>

                                                    {{ $parcel->getAddress() }}

                                                    @if( !$parcel->hasBeenClaimed && $parcel->hk == 'koop' )

                                                    <a href="{{ route('parcel.claim', ['step' => 1, 'parcel_id' => $parcel->id]) }}">

                                                    @elseif(!$parcel->hasBeenClaimed && $parcel->hk == 'huur')

                                                    <a data-toggle="modal" data-target="#claimRental">

                                                    @endif

                                                    <svg width="22px" height="21px" class="address-icon @if( $parcel->hasBeenClaimed ) address-icon--claim @endif " viewBox="0 0 22 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                                            <g id="Artboard" transform="translate(-859.000000, -751.000000)" fill="#EAEAEA" fill-rule="nonzero">

                                                                <g id="Body" transform="translate(615.000000, 672.000000)">

                                                                    <g id="Header-" transform="translate(36.000000, 69.000000)">

                                                                        <g id="claim" transform="translate(208.000000, 10.000000)">

                                                                            <path d="M21.7469477,18.9160283 C19.0898982,16.2380288 15.589341,14.6652355 11.8357314,14.4526958 L11.8357314,6.80126862 L17.7402858,6.80126862 C18.0355135,6.80126862 18.3307412,6.6312369 18.4994428,6.3336814 C18.6259689,6.07863383 18.6259689,5.7385704 18.4572674,5.4410149 L17.0654796,3.40063431 L18.4572674,1.31774579 C18.6259689,1.06269822 18.6259689,0.722634791 18.4994428,0.425079289 C18.3307412,0.170031715 18.0776889,-4.61852778e-14 17.7402858,-4.61852778e-14 L10.9922236,-4.61852778e-14 C10.5282943,-4.61852778e-14 10.1487159,0.38257136 10.1487159,0.850158577 L10.1487159,14.4952037 C6.39510628,14.7077434 2.93672443,16.2805368 0.237499573,18.9585363 C-0.0999035342,19.2985997 -0.0577281458,19.8512028 0.237499573,20.1912662 C0.448376515,20.31879 0.659253457,20.4038059 0.8701304,20.4038059 L21.1143168,20.4038059 C21.3251938,20.4038059 21.5782461,20.2762821 21.7469477,20.1487583 C22.0843508,19.8086949 22.0843508,19.2560918 21.7469477,18.9160283 Z" id="Shape"></path>

                                                                        </g>

                                                                    </g>

                                                                </g>

                                                            </g>

                                                        </g>

                                                    </svg>

                                                    @if( !$parcel->hasBeenClaimed )

                                                    </a>

                                                    @endif

                                                    @if($parcel->isTrending)

                                                    <div style="background-color: #EB6553" class="label">

                                                        @lang('parcel.show.trendingLabel')

                                                    </div>

                                                    @endif

                                                    <span>{{ $parcel->postcode }}, {{ $parcel->plaats }}</span>

                                                </h1><br>



                                                <div class="stats-small @if( $parcel->hk === 'huur' ) float-left @endif">

                                                    <div>

                                                        <img src="/images/icons/heart.svg"

                                                             class="stats-icon toggle-favorite-detail @if($parcel->isFavoritedByUser) favorited @endif">

                                                        <small>

                                                            <span class="favorite-count">0x</span>

                                                        </small>

                                                    </div>

                                                    <div>

                                                        <img src="/images/icons/views.svg" class="stats-icon views">

                                                        <small>

                                                            <span class="views-count">0x</span>

                                                        </small>

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-xs-6 col-sm-6 col-md-6 small-price price-range-box">

                                                {{-- @include('pages.parcel.parts.boxes.price-range') --}}

                                            </div>

                                        </div>

                                        <div class="row hidden-xs hidden-md hidden-lg">

                                            <div class="col-md-12 cta-box__mobile">

                                                {{-- @include('pages.parcel.parts.boxes.cta-box') --}}

                                            </div>

                                        </div>

                                        <div class="row space-bottom">

                                            <div class="col-md-3 col-xs-6">

                                                <div class="object-block">

                                                    <img src="/images/icons/blueprint.svg" class="parcel-icon">

                                                    <hr>

                                                    <p>

                                                        {{ $parcel->getParcelArea() ?: 'onbekend' }} m<sup>2</sup>

                                                    </p>@lang('parcel.show.acreage')

                                                </div>

                                            </div>

                                            <div class="col-md-3 col-xs-6">

                                                <div class="object-block">

                                                    <img src="/images/icons/calendar.svg" class="parcel-icon">

                                                    <hr>

                                                    <p>{{ $parcel->bouwjaar }}</p>@lang('parcel.show.year')

                                                </div>

                                            </div>

                                            <div class="col-md-3 col-xs-6">

                                                <div class="object-block">

                                                    <img src="/images/icons/energy-class.svg" class="parcel-icon">

                                                    <hr>

                                                    <p class="uppercase">

                                                    @if( $parcel->energielabel )

                                                    {{ $parcel->energielabel }}

                                                    @else

                                                    -

                                                    @endif

                                                    </p>

                                                    @lang('parcel.show.energyClass')

                                                </div>

                                            </div>

                                            <div class="col-md-3 col-xs-6">

                                                <div class="object-block">

                                                    <img src="/images/icons/rooms.svg" class="parcel-icon">

                                                    <hr>

                                                    <p>

                                                        @if( $parcel->kamers )

                                                        {{ $parcel->kamers }}

                                                        @else

                                                        -

                                                        @endif

                                                    </p>

                                                    @lang('parcel.show.mainStat.rooms')

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row space-bottom">

                                            <div class="kpn-banner hidden-xs col-md-12">

                                                <a href="https://www.zonnepanelenvergelijker.nl/?leadr_source=ntr_promodomo.nl_zonnepanelen-nl_generiek_woningen_ad1_728x90" target="_blank">

                                                    <img src="{{ asset('images/banners/zonnepanel-banner.jpg') }}" alt="Zonnepanel">

                                                </a>

                                            </div>

                                        </div>

                                        <div class="row space-bottom">

                                            <div class="object-description">

                                                <div class="col-xs-12">

                                                    <div itemprop="description" class="show-more-content">

                                                        <p>{!! $parcel->beschrijving !!}</p>

                                                    </div>

                                                    <div class="show-more-text">

                                                        <i class="fa fa-angle-down" aria-hidden="true"></i>

                                                        <h5 class="more-bt">@lang('parcel.show.showMore')</h5>

                                                        <h5 class="less-bt" style="display: none">Bekijk minder</h5>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="panel object-properties">

                                    {{-- @include('partials.ads.dgm-ad', ['size' => '720x90', 'class' => 'desktop']) --}}

                                    {{-- @include('partials.ads.dgm-ad', ['size' => '320x100', 'class' => 'mobile']) --}}

                                </div>

                                <!-- START PANEL WONINGEIGENSCHAPPEN -->

                                <div class="panel object-properties parcel-table">

                                    <div class="panel-body col-md-12 show-more-properties">

                                        <h2>@lang('parcel.show.propertiesHeader')</h2>

                                        <div class="row space-big first">

                                            <div class="col-xs-6">

                                                @lang('parcel.show.address')

                                            </div>

                                            <div class="col-xs-6">

                                                {!! $parcel->getAddress()!!}

                                            </div>

                                        </div>

                                    @if($parcel->woningType)

                                            <div class="row space-big">

                                                <div class="col-xs-6">

                                                    <img src="/images/icons/info-dark.svg" alt="" data-toggle="tooltip"

                                                         data-placement="right" title="@lang('parcel.show.houseType')">

                                                    @lang('parcel.show.houseType')

                                                </div>

                                                <div class="col-xs-6">

                                                    @lang('searchParams.' . $parcel->woningType)

                                                </div>

                                            </div>

                                        @endif

                                        @if($parcel->user_prijs || ($parcel->spotzi_prijs && $parcel->marktstatus != 'VK'))

                                        <div class="row space-big">

                                            <div class="col-xs-6">

                                                <img src="/images/icons/info-dark.svg" alt="" data-toggle="tooltip"

                                                     data-placement="right" title="Vraagprijs">

                                                Vraagprijs

                                            </div>

                                            <div class="col-xs-6">

                                                @if($parcel->user_prijs)

                                                €{{ number_format( $parcel->user_prijs, 0, '', '.' ) }}

                                                @elseif($parcel->spotzi_prijs && $parcel->marktstatus != 'VK')

                                                €{{ number_format( $parcel->spotzi_prijs, 0, '', '.' ) }}

                                                @endif

                                            </div>

                                        </div>

                                        @endif

                                        @if($parcel->woningType !== "appartement")

                                            @if($parcel->inhoud)

                                                <div class="row space-big">

                                                    <div class="col-xs-6">

                                                        <img src="/images/icons/info-dark.svg" alt="" data-toggle="tooltip"

                                                             data-placement="right" title="@lang('parcel.show.volume')">

                                                        @lang('parcel.show.volume')

                                                    </div>

                                                    <div class="col-xs-6">{{ round($parcel->inhoud) }} m<sup>3</sup>

                                                    </div>

                                                </div>

                                            @endif

                                        @endif

                                        @if($parcel->hk)

                                            <div class="row space-big">

                                                <div class="col-xs-6">

                                                    <img src="/images/icons/info-dark.svg" alt=""

                                                         data-toggle="tooltip"

                                                         data-placement="right" title="@lang('parcel.show.offerType')">

                                                    @lang('parcel.show.offerType')

                                                </div>

                                                <div class="col-xs-6">{{ $parcel->hk }}</div>

                                            </div>

                                        @endif

                                        @if($parcel->woningType !== "appartement")

                                            @if($parcel->perceeloppervlakte)

                                                <div class="row space-big">

                                                    <div class="col-xs-6">

                                                        <img src="/images/icons/info-dark.svg" alt=""

                                                             data-toggle="tooltip"

                                                             data-placement="right" title="@lang('parcel.show.plotSize')">

                                                        @lang('parcel.show.plotSize')

                                                    </div>

                                                    <div class="col-xs-6">{{ round($parcel->perceeloppervlakte) }} m<sup>2</sup>

                                                    </div>

                                                </div>

                                            @endif

                                        @endif

                                        @if($parcel->functie)

                                            <div class="row space-big">

                                                <div class="col-xs-6">

                                                    <img src="/images/icons/info-dark.svg" alt=""

                                                         data-toggle="tooltip"

                                                         data-placement="right" title=" @lang('parcel.show.intendedUse')">

                                                    @lang('parcel.show.intendedUse')

                                                </div>

                                                <div class="col-xs-6">{{ implode(', ',$parcel->functie) }}</div>

                                            </div>

                                        @endif

                                        @if($parcel->woningType !== "appartement")

                                            @if($parcel->zonnepaneelGeschiktheid)

                                                <div class="row space-big">

                                                    <div class="col-xs-6">

                                                        <img src="/images/icons/info-dark.svg" alt=""

                                                             data-toggle="tooltip"

                                                             data-placement="right" title="@lang('parcel.show.solarPanelSuitable')">

                                                        @lang('parcel.show.solarPanelSuitable')

                                                    </div>

                                                    <div class="col-xs-6">{{ $parcel->zonnepaneelGeschiktheid }}</div>

                                                </div>

                                            @endif

                                            @if($parcel->kwhPerJaar)

                                                <div class="row space-big">

                                                    <div class="col-xs-6">

                                                        <img src="/images/icons/info-dark.svg" alt=""

                                                             data-toggle="tooltip"

                                                             data-placement="right" title="@lang('parcel.filters.solarPanelYield')">

                                                        @lang('parcel.filters.solarPanelYield')

                                                    </div>

                                                    <div class="col-xs-6">@lang('parcel.filters.solarPanelYieldValue', ['value' =>

                                                    $parcel->kwhPerJaar])

                                                    </div>

                                                </div>

                                            @endif

                                        @endif

                                        @if($parcel->verdiepingen)

                                            <div class="row space-big">

                                                <div class="col-xs-6">

                                                    <img src="/images/icons/info-dark.svg" alt=""

                                                         data-toggle="tooltip"

                                                         data-placement="right" title="@lang('parcel.show.floors')">

                                                    @lang('parcel.show.floors')

                                                </div>

                                                <div class="col-xs-6">{{ $parcel->verdiepingen }}</div>

                                            </div>

                                        @endif

                                        @if($parcel->kamers)

                                            <div class="row space-big">

                                                <div class="col-xs-6">

                                                    <img src="/images/icons/info-dark.svg" alt=""

                                                         data-toggle="tooltip"

                                                         data-placement="right" title="@lang('parcel.show.rooms')">

                                                    @lang('parcel.show.rooms')

                                                </div>

                                                <div class="col-xs-6">{{ $parcel->kamers }}</div>

                                            </div>

                                        @endif

                                        @if($parcel->badkamers)

                                            <div class="row space-big">

                                                <div class="col-xs-6">

                                                    <img src="/images/icons/info-dark.svg" alt=""

                                                         data-toggle="tooltip"

                                                         data-placement="right" title="@lang('parcel.show.bathrooms')">

                                                    @lang('parcel.show.bathrooms')

                                                </div>

                                                <div class="col-xs-6">{{ $parcel->badkamers }}</div>

                                            </div>

                                        @endif

                                        @if($parcel->badkamerfaciliteiten)

                                            <div class="row space-big">

                                                <div class="col-xs-6">

                                                    <img src="/images/icons/info-dark.svg" alt=""

                                                         data-toggle="tooltip"

                                                         data-placement="right" title="@lang('parcel.show.bathroomFacilities')">

                                                    @lang('parcel.show.bathroomFacilities')

                                                </div>

                                                <div class="col-xs-6">

                                                    {{ implode( ", ", $parcel->badkamerfaciliteiten ) }}

                                                </div>

                                            </div>

                                        @endif

                                        @if($parcel->beschikbaarSinds)

                                            <div class="row space-big">

                                                <div class="col-xs-6">

                                                    <img src="/images/icons/info-dark.svg" alt=""

                                                         data-toggle="tooltip"

                                                         data-placement="right" title="@lang('parcel.show.offeredSince')">

                                                    @lang('parcel.show.offeredSince')

                                                </div>

                                                <div class="col-xs-6"> @if($parcel->beschikbaarSinds){{ Carbon\Carbon::parse($parcel->beschikbaarSinds)->toFormattedDateString() }} @else

                                                        onbekend @endif</div>

                                            </div>

                                        @endif

                                        @if($parcel->beschikbaarSinds)

                                            <div class="row space-big">

                                                <div class="col-xs-6">

                                                    <img src="/images/icons/info-dark.svg" alt=""

                                                         data-toggle="tooltip"

                                                         data-placement="right" title="@lang('parcel.show.offeredPeriod')">

                                                    @lang('parcel.show.offeredPeriod')

                                                </div>

                                                <div class="col-xs-6">

                                                    @if($parcel->beschikbaarSinds){{ Carbon\Carbon::parse($parcel->beschikbaarSinds)->diffInDays() }}

                                                    dagen @else onbekend @endif

                                                </div>

                                            </div>

                                        @endif

                                    </div>

                                    <div class="show-more-text properties-data" data-target="properties">

                                        <i class="fa fa-angle-down" aria-hidden="true"></i>

                                        <h5 class="more-bt">Bekijk alle kenmerken</h5>

                                        <h5 class="less-bt" style="display: none">Bekijk minder kenmerken</h5>

                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                                <div class="panel">

                                    <div class="panel-body">

                                        <div class="offer-tabs">

                                            <ul class="nav nav-tabs" role="tablist">

                                                <li role="presentation" class="active"><a href="#nav-makelaars" aria-controls="nav-makelaars" role="tab" data-toggle="tab">Lokale makelaars</a></li>

                                                <li role="presentation"><a href="#nav-energie" aria-controls="nav-energie" role="tab" data-toggle="tab">Energie</a></li>

                                            </ul>

                                            <div class="tab-content" id="nav-tabContent">

                                                <div class="tab-pane fade active in" id="nav-makelaars" role="tabpanel" aria-labelledby="nav-makelaars-tab">

                                                    <p>Zoek jij lokale makelaars in {{ $parcel->plaats }} en omgeving die jou verder kan helpen? Vergelijk dan hier makelaars op basis van jouw voorkeuren en kom in contact met de beste makelaar voor jou.</p>

                                                    {{-- <a href="{{ route('comparison-goedkoopstemakelaar') }}?utm_source=parcel_comparebox_graphic" target="_blank">

                                                        <img src="{{ asset('images/banners/makelaar-tab-banner.png') }}" alt="Vergelijk lokale makelaars">

                                                    </a> --}}

                                                    {{-- <p><a href="{{ route('comparison-goedkoopstemakelaar') }}?utm_source=parcel_comparebox_text" style="color:#7dd995;" target="_blank">Klik hier om te vergelijken.</a></p> --}}

                                                </div>

                                                <div class="tab-pane fade" id="nav-energie" role="tabpanel" aria-labelledby="nav-energie-tab">

                                                    <p>Vergelijk energie voor het adres {{ $parcel->getAddress(true) }}</p>

                                                    {{-- <a href="{{ route('comparison-energy', ['huisnr' => $parcel->getHouseNumber(), 'zip' => $parcel->postcode ]) }}" target="_blank">

                                                        <img src="{{ asset('images/banners/energie-tab-banner.png') }}" alt="Energie">

                                                    </a> --}}

                                                </div>

                                            </div>

                                        </div>



                                    </div>

                                </div>

                                <div class="panel">

                                    <div class="panel-body">



                                    </div>

                                </div>



                                {{--place--}}

                                <!-- END PANEL WONINGEIGENSCHAPEN -->

                                {{-- @include('pages.parcel.parts.panels.panel-placeholder', [

                                'placeholderId' => 'parcel-facilities',

                                'placeholderHeader' => trans('parcel.nearbyFacilities.header'),

                                'icon' => 'fa fa-location-arrow'

                                ]) --}}



                            </div>

                            <!-- END OBJECT DETAIL -->

                        </div>

                        <div class="container info-block hidden-sm hidden-xs scroll-info-container info-block-absolute">

                                <div class="pull-right col-md-3 col-lg-3" id="info-container">

                                    <!-- START OBJECT DETAIL SIDE -->

                                    <div class="row">

                                        <div class="object-detail-side">

                                        <div class="panel gray panel-object-address scroll-address">

                                            <div class="panel-body">

                                                <div class="row">

                                                    <div class="col-md-12 invert-price">

                                                        <span class="object-detail-side-header">{{ $parcel->getAddress() }}</span>

                                                        <span class="object-detail-side-subheader">{{ $parcel->postcode }}, {{ $parcel->plaats }}</span>

                                                        {{-- @include('pages.parcel.parts.boxes.price-range') --}}

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="panel gray">

                                            <div class="panel-body" style="padding: 29px;">

                                                {{-- @include('pages.parcel.parts.boxes.cta-box') --}}

                                                <div class="row">

                                                    <div class="col-md-12">

                                                        <div id="collapsingAloneTwo" class="">

                                                          <div class='panel'>



                                                            <p class="center-vertically">

                                                                <a data-toggle="collapse" data-parent="#collapsingAloneTwo" href="#nav-collapse1" aria-expanded="true" aria-controls="collapse1" class="collapse__link collapsed">

                                                                    <img class="no-lazy object-flag-right collapse__icon"

                                                                        src="/images/icons/arrow-right-b.svg">

                                                                    @lang('parcel.show.PDPTip1')

                                                                </a>

                                                            </p>

                                                            <p class="center-vertically" style="margin-top: -10px;">

                                                                <div id="nav-collapse1" class="panel-collapse collapse panel-answer" role="tabpanel" aria-labelledby="nav-heading1">

                                                                    <div class="text-left">

                                                                        <p>@lang('parcel.show.PDPTip1Description')</p>

                                                                    </div>

                                                                </div>

                                                            </p>

                                                          </div>



                                                          <div class='panel'>

                                                            <p class="center-vertically">

                                                                <a data-toggle="collapse" data-parent="#collapsingAloneTwo" href="#nav-collapse2" aria-expanded="true" aria-controls="collapse2" class="collapse__link collapsed">

                                                                    <img class="no-lazy object-flag-right collapse__icon"

                                                                        src="/images/icons/arrow-right-b.svg">

                                                                    @lang('parcel.show.PDPTip2')

                                                                </a>

                                                            </p>

                                                            <p class="center-vertically" style="margin-top: -15px;">

                                                                <div id="nav-collapse2" class="panel-collapse collapse panel-answer" role="tabpanel" aria-labelledby="nav-heading2">

                                                                    <div class="text-left">

                                                                        <p>@lang('parcel.show.PDPTip2Description')</p>

                                                                    </div>

                                                                </div>

                                                            </p>

                                                          </div>

                                                        <div class="panel" style="padding-left: 28px; padding-top: 15px;">

                                                            <p class="center-vertically">

                                                                <a style="color:#7dd995;" target="_blank" href="https://www.degratismakelaar.nl/slim-verkopen-zonder-kosten?utm_medium=Referral&utm_source=Promodomo">Slim jouw huis verkopen zonder kosten - De Gratis Makelaar</a>

                                                            </p>

                                                        </div>



                                                      </div>





                                                    </div>

                                                </div>

                                                <!-- START SOCIAL MEDIA BAR -->

                                                <div class="row">

                                                    <div class="col-md-12">

                                                        <p style="margin-bottom: 0px">

                                                            <img class="no-lazy object-flag-right"

                                                                src="/images/icons/share-btn.svg">

                                                            @lang('parcel.show.shareThis')

                                                        </p>

                                                        <div class="object-social">

                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}&title={{ $parcel->getAddress(true) }}"

                                                               onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')"

                                                               target="_blank" data-placement="top">

                                                                <span class="fa fa-facebook"></span></a>

                                                            <a href="https://twitter.com/intent/tweet?text=&url={{ url()->current() }}"

                                                               onclick="return !window.open(this.href, 'Twitter', 'width=640,height=300')"

                                                               target="_blank"  data-placement="top">

                                                               <span class="fa fa-twitter"></span></a>

                                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&summary={{ $parcel->introtext }}&title={{ $parcel->getAddress(true) }}"

                                                               onclick="return !window.open(this.href, 'LinkedIn', 'width=640,height=300')"

                                                               target="_blank"  data-placement="top">

                                                               <span class="fa fa-linkedin-square"></span></a>

                                                            <a href="whatsapp://send?text={{ $parcel->getAddress(true) }} {{ url()->current() }}"

                                                               data-action="share/whatsapp/share" target="_blank"

                                                                data-placement="top" style="background: none">

                                                                <svg width="22px" style="position: absolute; bottom:0;" height="22px" viewBox="0 0 22 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                                                        <g id="Artboard" transform="translate(-1443.000000, -934.000000)" fill="#9E9E9E" fill-rule="nonzero">

                                                                            <g id="Sidebar" transform="translate(1284.000000, 672.000000)">

                                                                                <g id="Top" transform="translate(0.000000, 32.000000)">

                                                                                    <g id="Deel-deze-woning:" transform="translate(46.000000, 205.000000)">

                                                                                        <g id="Social" transform="translate(21.000000, 25.000000)">

                                                                                            <g id="Whatsapp" transform="translate(92.000000, 0.000000)">

                                                                                                <path d="M11.00275,0 L10.99725,0 C4.932125,0 0,4.9335 0,11 C0,13.40625 0.7755,15.6365 2.094125,17.447375 L0.72325,21.533875 L4.951375,20.18225 C6.69075,21.3345 8.765625,22 11.00275,22 C17.067875,22 22,17.065125 22,11 C22,4.934875 17.067875,0 11.00275,0 Z M17.403375,15.533375 C17.138,16.28275 16.08475,16.90425 15.244625,17.08575 C14.669875,17.208125 13.919125,17.30575 11.391875,16.258 C8.15925,14.91875 6.0775,11.633875 5.91525,11.42075 C5.759875,11.207625 4.609,9.681375 4.609,8.102875 C4.609,6.524375 5.410625,5.75575 5.73375,5.42575 C5.999125,5.154875 6.43775,5.031125 6.8585,5.031125 C6.994625,5.031125 7.117,5.038 7.227,5.0435 C7.550125,5.05725 7.712375,5.0765 7.9255,5.586625 C8.190875,6.226 8.837125,7.8045 8.914125,7.96675 C8.9925,8.129 9.070875,8.349 8.960875,8.562125 C8.85775,8.782125 8.767,8.87975 8.60475,9.06675 C8.4425,9.25375 8.2885,9.39675 8.12625,9.5975 C7.97775,9.772125 7.81,9.959125 7.997,10.28225 C8.184,10.5985 8.83025,11.653125 9.78175,12.500125 C11.009625,13.59325 12.005125,13.9425 12.36125,14.091 C12.626625,14.201 12.942875,14.174875 13.13675,13.968625 C13.382875,13.70325 13.68675,13.26325 13.996125,12.830125 C14.216125,12.519375 14.493875,12.480875 14.785375,12.590875 C15.082375,12.694 16.654,13.470875 16.977125,13.63175 C17.30025,13.794 17.513375,13.871 17.59175,14.007125 C17.66875,14.14325 17.66875,14.782625 17.403375,15.533375 Z" id="Shape"></path>

                                                                                            </g>

                                                                                        </g>

                                                                                    </g>

                                                                                </g>

                                                                            </g>

                                                                        </g>

                                                                    </g>

                                                                </svg>

                                                            </a>

                                                            <a href="mailto:?Subject={{ $parcel->getAddress(true) }}&Body={{ $parcel->introtext }} {{ urlencode(strtolower(Request::url())) }}"

                                                               target="blank"  data-placement="top">

                                                               <span class="fa fa-envelope"></span></a>

                                                        </div>

                                                    </div>

                                                </div>

                                                <!-- END SOCIAL MEDIA BAR -->

                                            </div>

                                        </div>

                                    </div>

                                    </div>

                                    <!-- END OBJECT DETAIL SIDE -->

                                </div>

                            </div>

                    </div>

                </div>

                <div class="map-wrapper">

                    <div id="map2Blur">

                      <button id="map2BlurButton" type="button" class="cta-box__button cta-box__button--block">Kaart bekijken</button>

                    </div>

                    <div id="map2" style="width: 100%; height: 436px; display: none;"></div>

                    <svg class="map-wrapper__info" width="44px" height="44px" viewBox="0 0 44 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

    <defs>

        <circle id="path-1" cx="20" cy="20" r="20"></circle>

        <filter x="-8.8%" y="-6.2%" width="117.5%" height="117.5%" filterUnits="objectBoundingBox" id="filter-2">

            <feOffset dx="0" dy="1" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>

            <feGaussianBlur stdDeviation="1" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>

            <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.5 0" type="matrix" in="shadowBlurOuter1"></feColorMatrix>

        </filter>

    </defs>

    <g id="v2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

        <g id="d-PDP-map-1" transform="translate(-1862.000000, -248.000000)">

            <g id="legendaButton" transform="translate(1864.000000, 249.000000)">

                <g id="Oval">

                    <use fill="black" fill-opacity="1" filter="url(#filter-2)" xlink:href="#path-1"></use>

                    <use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-1"></use>

                </g>

                <image id="Bitmap" x="13.4765625" y="10.859375" width="13.046875" height="18.1640625" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAU4AAAHRCAYAAAAFY1D/AAAKPGlDQ1BJQ0MgUHJvZmlsZQAASImVlgdUU1kax+976Y0WCB1Cr6GXANJ7kyKCICohCaFGCEVUbMjgCIwoIiKgCDJUBUelyKAiolgYBBSwT5BBRV0HC6KiZl9g6u7Z3bNfznfv7333nv/73rvvnPwBIO1lpaYmw1IApPAzBKHebvRVkVF03GOAB5LIzwJIsNjpqa7BwQEAid/nv8f7cQCJ51sMsda/r//XkOZw09kAQMEI53DS2SkIDyK8lp0qyAAANkZYa0NGqpjFe2QFSIMIc8TMW+JsMccucdHinrBQd4SPAoAns1gCHgDE40idnsXmITpEsb4Zn5PAR/gzwk7seBaiR1qGsHFKynoxxyOsH/sXHd7fNGP/0GSxeH/w0rMshqZ/MjdTwOUzAtw96DxuEis5IVbA5Qo4jDhWbAKLzzD/P1/U/4qU5Mzf7y0+DTI/ebn4rNyQVAH+IBlwQSYQICMfMEAAcAcegA54yHUSYCGrCSB2cZWLjBxkRxxSjUWqrMX9SLMZ3OwMsbj7+tSNggRefAbdFTltLt2XzzYxpluYmTMBEH87Sy28pS12AdGu/1nbSQTAkS8SiXr+rPl/AuCMBvL+hH/W9EYBkEgF4Oo+dqYga6mGFg8YQES+SVmgCNSAFtBH+rIANsABuABP4AeCQBiIBGsBG8SDFOQpNoAcsAPkg0KwFxwAFaAaHAON4AQ4BTpBD7gIroAbYBiMgftACKbBCzAL3oMFCIJwEAWiQoqQOqQDGUEWEBNygjyhACgUioRiIB7EhzKhHGgnVAiVQBVQDdQE/QCdhS5C16AR6C40Cc1Ab6BPMAomw7KwKqwLm8JM2BX2h8PgNTAPToM3wXnwHrgcroWPwx3wRfgGPAYL4RfwHAqgSCgaSgPFQDFR7qggVBQqDiVAbUUVoMpQtahWVDdqAHULJUS9RH1EY9FUNB3NQDugfdAr0Wx0GnorughdgW5Ed6D70bfQk+hZ9FcMBaOCMcLYY3wxqzA8zAZMPqYMU49px1zGjGGmMe+xWCwNq4e1xfpgI7GJ2M3YIuxhbBu2FzuCncLO4XA4RZwRzhEXhGPhMnD5uEO447gLuFHcNO4DnoRXx1vgvfBReD4+F1+Gb8afx4/in+IXCFIEHYI9IYjAIWwkFBPqCN2Em4RpwgJRmqhHdCSGEROJO4jlxFbiZeID4lsSiaRJsiOFkBJI20nlpJOkq6RJ0keyDNmQ7E6OJmeS95AbyL3ku+S3FApFl+JCiaJkUPZQmiiXKI8oHySoEiYSvhIciW0SlRIdEqMSryQJkjqSrpJrJTdJlkmelrwp+VKKIKUr5S7FktoqVSl1VmpCak6aKm0uHSSdIl0k3Sx9TfqZDE5GV8ZThiOTJ3NM5pLMFBVF1aK6U9nUndQ66mXqtCxWVk/WVzZRtlD2hOyQ7KycjJyVXLhctlyl3Dk5IQ1F06X50pJpxbRTtHHaJ3lVeVd5rvxu+Vb5Ufl5BWUFFwWuQoFCm8KYwidFuqKnYpLiPsVOxYdKaCVDpRClDUpHlC4rvVSWVXZQZisXKJ9SvqcCqxiqhKpsVjmmMqgyp6qm6q2aqnpI9ZLqSzWamotaolqp2nm1GXWqupN6gnqp+gX153Q5uis9mV5O76fPaqho+GhkatRoDGksaOpprtTM1WzTfKhF1GJqxWmVavVpzWqrawdq52i3aN/TIegwdeJ1DuoM6Mzr6ulG6O7S7dR9pqeg56u3Sa9F74E+Rd9ZP02/Vv+2AdaAaZBkcNhg2BA2tDaMN6w0vGkEG9kYJRgdNhoxxhjbGfONa40nGGSGKyOL0cKYNKGZBJjkmnSavDLVNo0y3Wc6YPrVzNos2azO7L65jLmfea55t/kbC0MLtkWlxW1LiqWX5TbLLsvXVkZWXKsjVnesqdaB1rus+6y/2NjaCGxabWZstW1jbKtsJ5iyzGBmEfOqHcbOzW6bXY/dR3sb+wz7U/a/OjAckhyaHZ4t01vGXVa3bMpR05HlWOModKI7xTgddRI6aziznGudH7touXBc6l2euhq4Jroed33lZuYmcGt3m3e3d9/i3uuB8vD2KPAY8pTxXOlZ4fnIS9OL59XiNett7b3Zu9cH4+Pvs89nwlfVl+3b5DvrZ+u3xa/fn+y/wr/C/3GAYYAgoDsQDvQL3B/4YLnOcv7yziAQ5Bu0P+hhsF5wWvCPIdiQ4JDKkCeh5qE5oQMrqCvWrWhe8T7MLaw47P5K/ZWZK/vCJcOjw5vC5yM8IkoihKtMV21ZdSNSKTIhsisKFxUeVR81t9pz9YHV09HW0fnR42v01mSvubZWaW3y2nPrJNex1p2OwcRExDTHfGYFsWpZc7G+sVWxs2x39kH2C44Lp5Qzw3XklnCfxjnGlcQ94zny9vNm4p3jy+JfJrgnVCS8TvRJrE6cTwpKakgSJUckt6XgU2JSzvJl+En8/vVq67PXj6QapeanCtPs0w6kzQr8BfXpUPqa9K4MWeRPejBTP/ObzMksp6zKrA8bwjeczpbO5mcPbjTcuHvj001em77fjN7M3tyXo5GzI2dyi+uWmq3Q1titfdu0tuVtm97uvb1xB3FH0o6fcs1yS3Lf7YzY2Z2nmrc9b+ob729a8iXyBfkTuxx2VX+L/jbh26HdlrsP7f5awCm4XmhWWFb4uYhddP078+/KvxPtidszVGxTfGQvdi9/7/g+532NJdIlm0qm9gfu7yillxaUvjuw7sC1Mquy6oPEg5kHheUB5V2HtA/tPfS5Ir5irNKtsq1KpWp31fxhzuHRIy5HWqtVqwurPx1NOHqnxrumo1a3tuwY9ljWsSd14XUD3zO/b6pXqi+s/9LAbxA2hjb2N9k2NTWrNBe3wC2ZLTPHo48Pn/A40dXKaK1po7UVngQnM08+/yHmh/FT/qf6TjNPt57ROVPVTm0v6IA6NnbMdsZ3Crsiu0bO+p3t63bobv/R5MeGHo2eynNy54rPE8/nnRdd2HRhrje19+VF3sWpvnV99y+tunS7P6R/6LL/5atXvK5cGnAduHDV8WrPNftrZ68zr3fesLnRMWg92P6T9U/tQzZDHTdtb3YN2w13jywbOT/qPHrxlsetK7d9b98YWz42Mr5y/M5E9ITwDufOs7vJd1/fy7q3cH/7A8yDgodSD8seqTyq/dng5zahjfDcpMfk4OMVj+9Psade/JL+y+fpvCeUJ2VP1Z82PbN41jPjNTP8fPXz6RepLxZe5v9D+h9Vr/RfnfnV5dfB2VWz068Fr0Vvit4qvm14Z/Wuby547tH7lPcL8wUfFD80fmR+HPgU8enpwobPuM/lXwy+dH/1//pAlCISpbIErEUrgEISjosD4E0DAJRIAKjDiH9YveTtfvM/0F+c0H/gJf+3GDYAtCJTqNjd9AJwEknd7Yg2kmLLGeYCYEvLP/K3SI+ztFjSIgsQa/JBJHqrCgCuG4AvApFo4bBI9KUOafYuAL1pS55SHFjEaR+1EtMobT36Xz3cPwEsOs7xo08JVwAAQABJREFUeAHtnQmAZFV57+9W1dM93T1rT093Vy8RBY2iBgVUQCUuCIo8FvdgXEBNNBrzgokm7xnRmOfysqovBqJExAUXFhUQQUETFRJFJVHcAtP7LMwwW89M113e/7vVt6emp7q7tnOXc/8Xaqr6Lud83++r+6+z3XNMgxsJtIlAX19fd6FQKFmW1YskOxdeXVWfo32rvXeZplkIguAIrj208Dq85F32R/sO4dxlPyOtndPT0zM4v4wXNxJomYDZcgpMIBcE1mPr6ekpQaBKcFjEcfGz/A1xkr/XpRUGbAtg4w7YN4XXpLz7vh9+xqEpeR05cmRq9+7d+9LqA+1KDwEKZ3pikaglIowdHR2nOI71GBgCYRQhNIbls7wgOmsTNTCmzCGg+5GVCOqUaYrAmvgcQGTNcRz7MUquEzGZwmxSTIDCmeLgqDJt69atfYWCeYppWqcYpnkKxAGv4FGBH6jKUot0IZyGaVm7Pde9D+x+5PvBfdj3o9nZ2QfgoKeFk3SiLgIUzrowZfekUmnTkGV1nOL7ximWY5/ilb1TnIJd8lzPsGzL8D0f2mlCEEyDwllfnIWbbMIO1X0DzRaHg8C/H7p6H36AfoQXBNX+CUqnc/WlyLOyRoDCmbWIrWDvli1b+otF+wzcwChBGqcUix2nuG65Xy4RYYxEMvpbhFJEIBJRCqeQWXlzHMfwA9+Q0qds1Uzl72g/3n38+QuQ/1FFUI0fzc3N3fsINjmPW7YJUDizHT9raGjodNyu51qWcZ4IJkqPjGlKYwoxler8PQjRbajZ3zYxMfsD/C0Cyy1jBHiTZSxg0j5p2/YLcPOdC8E8BzK5MWMu0FwQkJIp+vl3oZp/O6r7t5XL5dt37NixnXCyQYDCmf44WaVS6VQpUdq2dS7ut6e6rnu0YGmuUGAJKm1x6XdRUwvrjE3Y1oyeJtyMaBs1bnNd/7aZmZnvgYqrKZnMu0XhTGEIBwcHN2Mg+Tm+4Z2HzpxzIJiborZIKanYjl1pW7NW6QWncCYb3ZWEE5Z5LmJp24vtose2sgT7DMO+E/G+TUqk6GgaT9YZ5l5NgMJZTSPZz2tKpYFLYMJl6FA4C+/WsTdSssYx96QJBD/D9+Iz6MS/ZmpqSgbwc0uQAIUzQfiSNarhT/R993KUPF6Fnu8NUc/2wjCXhK1j9mkhIKMiZEMJFG0z5jd8L/gEBPRG7JoPD/CfWAlQOGPFXcls8+bNPWu61rwc8C9H586pIpbRMBcZ3iLVcdlY4qzw4r+VzqSIg3wvREjdsvew45jXeZ4LEd3x4+g439UToHCqZ7yYw9DY0NMsz7zMMIOXG4GxtvLlr7T/y82AHtbFc/mBBJYSiNq3ZdyttHPLJj+0lS34oef5nzh48NBn9u7du2dhJ98UEaBwKgIbJdvb27tx/freSzGBxGXFYvEJ0X6+k4AiAniKKbgBbaGfQIfSnchjlR5ERVZoniyFU1GABwYGzrJt8/dQkrwIPeIdR0sGijJksiSwhIBp2tswdO0aCOknMbxp25LD/LMFAhTOFuDVunRwZPAMxzCvxLC8347aKBc7epYOT+FwoVoIua+NBKQ5CD/aHuYp+PShg4fft3Pnzl+1MfncJkXhbFPo+/v7T+/oLF4JoM93y27YXlndySNf4MoTd1UZUjirYPBjuwksbRPF3x5enw78+fdNTlJAW+FN4WyFHq5FlfyphaL1niNH5s8rFootpsbLSUAdAfnxlk0EFG/XLQjoL8Od/KchAhTOhnAdPRmTazzZsoL3YNDQi8NH5hZ7N4+ew08kkGYClRKo/xnT9N6LEigFtIFgUTgbgCWnDg/3P8GwnPf4rn8hhg+F/BbbMBtMi6eTQJIE5HvrFByMB3U9xyl8xnW992FQPabC47YaAQrnaoQWjqNK/rhCh/Nu1HNeinF0mAjckipPeDQakBw99VNnkjyNBBInEFXfxZCwE8kyP+t5xnspoCuHhsK5Mh9j06ZNQ2vXdn4A0369Ak/3cIT6Krx4OPsEKm2g5mfRbv8e9sLXjmfl8YPax/K+10Qp842YUf1GFC9PxbPk6BbPOxL6nwcCqEFhghnjiai+vxErmwb79+//PvyOHlHKA4JVfWSJswYidPyciPafq1DAfKZUZcKlJfg4ZA1S3KUzAUy0HE5753nef6IUejmq7yKg3ECAJc5jvwbO8PDwn2LXZ1HCPCF8Wq2qlBkNaD/2Ev5FAroSWCxXbcHS0a/r7Ozsw/u/Yu2k3M/ItEhG19DX65eMx8SEwVejivKkeq/heSSQJwLSGYr/J/F6M56DvzlPvi/1NffCidnWu9B8cyV6yf8QJUqWwJd+Q/g3CVQRkDHLsnmu/0V0Hv0BOo9mqw7n5mOuhXNkZPC5aMf5OKL9qNxEnI6SQIsEomVcUNB4BK93jI9PXo0kqxq1WswgA5fnUjgx6/pGlDD/L548e41UP2Ruw7AaggmFuZEACRxPQO4P2Wq18+PYtzGW/g2ovv/8+Cv13JO7qik6fy6AaGJda+NM+ZGUL0L4paBm6vkNp1dtISD3SS3RlMSxfxQP0V2+bkOvuW/vflmdU/uhS3kqcVoQzSuxeuS7MLzCxAsBp1q25a5iIiQAAmW3bBQLhe/OzR25ZNeuXTM6Q8mFcI6Nja33gvJn8Jt5rvxqyrhM2Zb7BdU54PSNBFQSkNobanQzWBv+ElTdv6syryTT1r6qLpNyoEL+TdTKT4tEMxLM6D3JADBvEtCJgPQX4Jn3HjSDXbp+/YZd+/bt+w+d/It80Vo48QTQS1Gu/AqK1f2hw6iZi1hGghm9RzD4TgIk0BoBKXEu3GPQluBF3d3dw/v3H/g6Uq1U81pLPjVX61pVt0ulwfcjgO9IDWkaQgI5IyAiKiVQz3XvRbvnxbt3757UBYF2wolJCTatX9/zOcTsuSxR6vI1pR9ZJFA9z4NpGTsC33rJxMTEt7Poy1Kbtaqqy6zsXWs7vmlZ9imhaLLTfGm8+TcJxEcA959MllxZA95cG/g+2j3XPbJ377574zNCTU7aCCeeNX8VxpLdBEx9HJep5svCVEmgUQLoYa88U1TpX5DnNc/t7e09Yd++/bfis9toemk5X4equj08PPRhiKU8a54WrrSDBEhgRQLBD103uCir671nXWmcsbGR6zBniyxnsdhbvmK8eJAESCAVBDBPxC4Uds5Fu2fmhixlWTiLw8OD13uefwHmzkzFF4FGkAAJNEJAau7GXjzFd17WBstnVTg7MdzoBvxandNImHguCZBA+gigme0AupHOn5ycvSt91tW2KHPC2d/fv7azc81XXLd8Nts0aweVe0kgawQwfPCQafoXTkzMyGD51G9hWTn1Vi4YuHHjxt5Cwb49MPyzowlVs2I77SQBElieAPp1O03LvgnNby9e/qz0HMmMcGIIw8auro47IZjPwLOwIcHqNaHTg5SWkAAJNEmgAyvKfnFkZOglTV4f22WZ6FXZunVr35o1MrDd+q3FeaZlcDsHuMf2RWFGJKCcQOWettHmeVFPT/eDeMb9J8rzbDKD1Avn6OjogO0Y34JIPoFtmk1GmZeRQIYI4D6XmvAFvb3rZjC70g/TaHqqhRMLqY0A4V0QzZPCNk2WMNP4HaJNJNB2AhBPdFybL0IT3R6I5z1tz6DFBFMrnOg9f5TjWBDN4FEimovtmnw6qMWQ83ISyAYBFDxFP+URzUMQz39Lk9WpFM4tW7b0d3Z2fAegxsIfnoWSZvg5TfRoCwmQgEIClUZPlJWehzbPMto8RRNSsaVRODs3bOiVsVyPryZE0aymwc8kkC8CuP+f09OzVjqMfpwGz9M2AN4qlQa+iCL6hTLDEcUyDV8R2kAC6SCAmvu87xnnTE5O3pW0Rakaxzk6OvwhNAiHopk0GOZPAiSQOgJFyzZuQKfxY5O2LDUlzuHR4d/HrKcfTRoI8ycBEkg7geDB+Xnvadu3b9+RlKWpEM6h0aEXWoFxE4YdpbHNNanYMF8SIIFlCKAlD0OUzLNRbT+0zClKdydeVZflLoKy97nADyiaSkPNxElAHwLoaT8d3lyLVyKFv0TFCqJZsmzzW/B8U6FQCNcn0Se09IQESEAlAXQi/ybGeK7FGM9vqMynVtqJCefmzZt7CgXnTojmo6X3XBZ14kYCJEAC9RLw0cWOdcaesW5d73asYRTrLPJJVdWdtWvXXA+9fGK9kHgeCZAACVQTkIXgZIY0rADxkdJo6dzqY6o/JyKcQ0MD/+D7wQtUO8f0SYAE9CUgoom+EcMPfDyUHXweTX9Pisvb2IVzcLD/5aiav0mc5kYCJEACzRCQB2Rk/opF8fSCHtMMvrJu3boNzaTX6DWxtnHKbEdOwfmaaQVrwsk0A4pnowHj+SRAAuhKRztf9SZ/YzKgdR3FwhjaO79YfUzF5ziF01q/Yd3N8O/ExRmIKZwqYso0SSAXBJaKp0xsjoLoE9avX/frvXv3KZ0EObaq+sBA/zshmmflIqJ0kgRIIFYCUmWX6Sflhc8fHRgYGFVpQCzCiaUvTkPP11+odIRpkwAJ5JdA2EmENk9591yvt9DhXAsayvRNeVW9r6+vu1h0bocTm8OwhlPsoX2C1fT8fsvpOQkoJBBW4YNgtLe35zDaO/9VRVbKFDkyFsv5/j0+Pzr6m+8kQAIkEAcBCOiVg4ObT1GRl1LhxDKflxSKhdeK4cc15KrwhmmSAAmQwAIBtHUWgsC5rlQyOtsNRVlVfePGjSXHcW7B6P5O6e2Sxlt550YCJEACcRCQcZ7oW0ETYc96VNlvaWeeqkqcVmdn56dQytwQLbLWTqOZFgmQAAmsRkAeyZQNOvTmUmlrWx/JVCKcIyMjV8DYs6sdk94ubiRAAiSQBAHMpPQJPIBT6aBugwFtF05Z1hePQ10ZqX0bbGQSJEACJNAiAXOrafofazGRxcvbLpwQzA+itFlczIEfSCBBAvJMMzcSEAJOofCSwcEtZ7SDRluFE6P1z3Ic6+Ig8PDok9cO+5iGRgSiOVflXZ7wUL2FHZILmUR5q86T6aebgGUVPtwOC9vZq25iPfQvoSl2sB2GMQ29CFQv9xw242CQhfJRFlWFTdSCOCROr69U497Id84wSuvX9/507979P208gaNXOEc/tvZp69a+V0M0n9JaKrxaVwLVJUzUnndjtMU4SoTjeIJsPLD8ccMzpqBtB/Cacw3jkOEac2AhC3HNobR4CGIrMtgJAZQxefLqMpzwvdMOjC6kuRkP2A1BjIdwDO8B3s0h5LsOf4cbOygjEvl8t7G2sG/isczA+CsQuAmv+WZJVDS42asXrkOH0NpiR+EXsIilzRZZanb5HpQ0fwiffoDa+Q8hgPfj721Y1vVgXH6G382i8Ruuaz0Zyyw8GcL8ZOSNd3NTXDYwn/QQkOYb+QE1bePt4w9N/W2zlrVFOEdGSn+Bgabvdl2UFbhpSyBsm8TYOHnHvKqLE8mKw5hYIYAoQRyNb2BC2R+4bvADCOSDaYWBBzSGu7vXPBlCfnoQWM9Hu8FTIKaWlIylWUFuLnkPq/hVk26z1JrWiDZmF0K7+8CBgyc8gq2xKytntyyclZUqjZ/jC9UlXzJuehIQEYm2SEwglvjSBd+wCvYtR+bKt+7YsWN7dE7W3oeGejYFQddzsYDgOZ4XPB8+DkWdS2EJZUE8KZxZi+zy9gaB+WGsy37F8mcsf6RlpSuVhvCEkHFp9Ou8fFY8kmUCiyISBLuwkvW1KHbeODEx8134pGU1A1X8J2BWr1eiyPlqx7aHPKyoSNHM8jf4eNshnEdQS37s7OzsQ8cfXXlPS8KJ4UdP7ezsuLdcLqOSU2k7WDk7Hs0iAfwoSjX8DlTRr56amr0RPjTdqJ5B/+1SaeB5WFzwdWiOugD2HzdGmYWGDEYVJpto6MR3+rModb6yUQ9aEs6R0eHv4IY6U744/DVuFH06z5dY2g6+UDIpbGBO4u9Pep73iWZ+ldPpYfNWlUqljbj6VWDyNvTyn4AxywYKDWGCEbPmU+eVcROQ7zo2FAr80ycmZv+9kfybFs6hoa0vwUj86yVzimYjyNN7blQdt0zrwfl59/3T09P/AmsrypBes5OwzBkbG7vU990/R7PFo+T7jx8XmYknCVuYZ5MEpCMQ7fSInf/tmZnZZzWSTNPCWSoN/gQZn0zRbAR3us9Fh8iDqLq8f3KSgllnpBwsd/1qp1D888D3f6POa3haSgjI6BCpKYh44kfwmTMzO79Tr2lNCSd60p+DUSl31JsJz0s7geAhVBz+koLZdJwctIO+Fq1mf4Ufn5rjQ6VmJqMRuKWHQFTDkri4Ze9zU1PTr6jXuqYeGLYd8w/rzYDnpYeA/MLKJu9STcEXp4xOj/dOTEw/FqJ5NQ6xWh4Savgfd3Jy5irX9R9n285noqvlxhTW0Q0a7ed7OghEtWVpz8fDERf3jfVtrdeyhhtlUNo8EZn8PYq3GC3clO7WaxvPayOB6hJPJW4BhhJ5L8INfz2y4YwsbWB94MCBuUce2fvl3t619+KH6UwMNVkf9gFUOiFY4mwD47YncXR4su0E9j7MFP/tevJoWPnwRXgrlJp1jnropugcKWEuvPbBrN8fH586c3x89r9SZKI2pkxOzt565LD7eLfs/h2YB9KOJuy5pZsAagdvgIV1zd/RkACux9bb24shKt7a6hJMunHQuoiA73u3HjniXrZr167paB/f1RIYGhl6kW2an0Z1cB3bONWybkfqGIJ3McZ1fnm1tBr6Gexe13W5YfprJVF+CVZDm/xxGeCLL4IM9EVV3PozDF5/IUUz3rhMjU99FQ8dnQr+KN3Lc/Cm4ThFGNHQrRev0TnNrVIjM95cj/uNlDid4ZGh/8a0XcP1JMxzkicgfUEYW7gdYwxfMTU19a3kLcqvBX19fd0dHR3XoKZ2sbQxV2psRxvY8ksmPZ5LTKRZpTzvPQ5jmB9YybK6O4cw4P0Sy7Zfr3zy2ZWs5bGGCGCqn+/Mzc09F7MU3d/QhTy57QQQh3n0PFy/adMmeVz1t3GTstLWdsqtJRj+mIUjIbxg//4Dt66UWt0lztHR0vcwdOVpKyXGY6ki8DcTE1PvgEVaTsKRKtINGoNHNy9zHOfjnldmfb1BdqpPl+q657r70BcwtHPnzgPL5VdX4BDo01F6oWguRzEl+6OeW4znfRdE849gFkUzJbGpNgOdD1fjGffXoNApbc/hOM9ojG31efwcP4FKE4rVi5mxXrVS7nUJZxD4b/eDyuDplRLjsWQJYGxtgPazt2CokSwNwC3FBNDmfC3q6q9CyTP8ceOY6HQEKxoUjzG4K3YSrVpV34rFhDALzLTruZj0u5AO72jFcQTwS+nhwYTXQTQ/ddxB7kgtAdTmLsSM+Z+HgBa4gkLawmSdPDEx8Z+1rFq1xAnRfDEupGjWopfwPqlWLGzocAheStGMcGTnHdX2GxzHfn00PV12LNffUtxf5y3n5arCiRGbF0n3H9tglkOY5P5wXKCHcYGX4NHJVQftJmkp816ewIMPjl+L5TretzDmNjyx7HLagOWJxXZkWeFcsaq+efPmHszwvhNmdlQaTVc8PTZvmFGFgAxwR/XuLRhz9lEyyTwBc3h4+LMopLwMU5zxAZMUhBM/ZO7Bgwc379mzZ+9Sc1YscXZ2Fl+IntqOcIYXTom1lF3if+PH7K8pmomHoV0GBGhPQ0978H0ZHcEZldqFtfl08CPmdHV1Pa9WCisK53y5fGFlyiUGsha8JPfhBrsBN9oVSdrAvNtO4PD8/PwFmBR5e9S72/YcmGDdBKSWjdEONavrKwnnGvSiL17EQNbNW9mJ6HkN0zZt816M/5NxZhwjpox2MgnjKa8dvm9elkzuzHUpAYjnudh3XBvlssI5ODj4PBRVu5cmxL+TIyDDVfD01sSRQ+Xz0Rt7KDlLmLNKAhjj+VXE+p9V5sG0VycgneLYtkILf2vp2csKJyaHuHDpyfw7WQJo9/KxIt+lUipJ1hLmrppAuey9HUPMHlKdD9NfnQAEdLHmHZ29nHDK5B8yfpNbmggE5gcwSe7daTKJtqghgOn/9uOJPeksCthRpIZxA6keJ5zH1d0lsdHRod/GlGR3NpAwT1VEQBqoK5v575OTU2fgMwf4KWKdxmQHBvqvLXYUf0c6abklQwD3oI+fry1oQnk4sqBmiRPzN7KaHhFK+L1QKMjDBwfRPi2dQRTNhOMRd/YowPxv3LjzR39A47aA+aGqbuGx2HOqSdQSTtOyHQpnNaWEPsvNIh1CGBLxNnQG/TIhM5htggTQnv0gSpsfT9AEZg0C6Cc6ZjznccKJSQdORqCGSCstBIKbsXQve1jTEo4E7EBH0ftQ5ll2bsgETMpjlk+sdvo44cTB0/nkQjWi5D6jinBkft7jGvbJhSAVOYejKEzjb1NhTE6NQBvn4+D6ol4ufoh4oFp4mjREL4xhinbzPREC/oelqpZI1sw0VQQwdvcjMIht3AlFBVX1zi1btvxGlP1xwgnBPE1Ek714EaJk3tG8OTU/73NC4mTwpy7XHTt2bMd34qbUGZYjg/Dk3hMid48Rzv7+/rXowX28jBvj2LEIUVLv/p+gtInedG4kUCGAp8bYSZTglwE964+Psj9GOItF6ymmFYQrX2JC8egcvsdIQHrScYN8F/NrXhdjtswqAwQwExbGVlu/lu9I9MqA2dqYiJp4beE0LPM08ZKimUys5WZAdcC37eCtyVjAXFNOIMAY66siG9kPEZGI630Z4TQD8zTOghRXEGrnUy67Xxofn/lB7aPcSwKVdk6KZhLfhOCxyDWskR9TVUcVMSxxJmES86wQKBTM95MFCSxHANX1B3BsQmon3GIn0DE0NHSC5LoonOgY2oJfsdHYTWGGiwRwM9zy0ENTP1rcwQ8kUIMAhgx+ncJZA0wMuzA7WdjOuSictm2cHkO+zGIFAhhk+5crHOYhEggJeJ57O8STNBIgYNrWscKJ59hZTU8gEFGWqHndhWrYd6O/+U4CyxE4cODQHShxcrqk5QCp3b9UOA0Kp1rgK6aO9mWWNlckxIMRgb179+7B519Ff/M9PgIYpXlsGyeaO5+6mH2AaoC8uCkmYGHMpmRh3YvS5h2KM2PyGhFADUU6ibjFTiBYJ1mG6rhhw4Z1lm1ujN2GnGcoDfwYlycvTuCQ8+9Co+6jk4LC2Si0Fs+XyY/w6pVkQuHs6DA5jVyLUJu9HBMV70Zp88vNXs/r8kkANRUKZ8yhlzHunusdFU7LWlPiwPeYo4DsZBAzXp/GxyPx584cs0yAJc5koof7tQs5o+wZbpy4OJkwYGF03786qbyZb3YJlMvGf2fX+mxaHk5+hMLOunXrekPhxOdSNl3JttVo47wXS2Lcn20vaH0SBIrFHfuSyJd5GsbatWt7FkqcJoUzgW8E2jdZ2kyAuw5ZTk4ah/DDyynMEggmOnMrJU60trFzKOYA4Et/cP/+/Z+LOVtmpxEBtLft18idzLiC2csqwukULJY4YwqbDEGSthK8Xb9r1y5+8WPirmM2+A5xAbcEAhsEdkU4y/PeEGd8Vx+BUDTRoCwjGNAr+gX1OTIHnQlgRnL+8CYQYMuqlDg7nIK9OYH8c5elDKCVDQJ6YHJy9pu5A0CH20oAJc5wbsi2JsrEViUQBFavNTLSP4RBnVzVclVc7TlBSp2WZd6K1Dh2sz1Ic5yKyQJPAtFHSb/XgnqyfTNm+Bi7ydUKY2auYXYobQYbNPQrAy4Fa1F3ZI96nJFCdd3FtGBfizNP5qUfga1bt25Er7qpn2fp9wiVxsMO2Pfjlyv91mpgoXQKYfq4ux/BpoE7dCFBArhvWU1PjL91yMKNvCOx/HOYseMUbsyh23S5/QQonO1nWmeK3pyDCZLul8mkA19K/QsPEi1ezkmmF1G04YN0DJXLZbZvtoFl3pNAiXNT3hkk6P+cJc9K27bNmzmGKEA4f4Yp5CZiyIpZ6E+AJc7EYmwfCouYuKHfjJ7e+xKzIycZo2Po7py4SjcVE0C3kKzxzS0ZAnOhcKLUOYX8z8Drf+H1X3HYItXWvG2e696VN5/pryoCwdmqUma6qxKYqzmcQZbS6OrqGoO4jeHxojGsgDkafrbNMTSHjiHZDcsJX/R0TJR19QTJ8linDLaXpU3l+ryNpjh8eH5g586dsxEbvpNAMwTWY+vu7noY98/STolmkuM1dRKI9MswyifVFM7V0tm8eXPPmjU2RNUeQ5/SKOYxHzMDCKppjaFUNeoUnM0ikNXiupxILrd/NRuydhwsfjE5OX1S1uymvekjMDg4+GLbNtkvkUBopGB4+NB8N3rVG98WZvW5H1fK67itv79/LdYxQkkVwmpYENYAomqO+a47ZhjmKDLfEl1UXSKN9un5bt6lp1/0Km4CEM2z486T+VUIoEC4d/v27QebEs7VIErCOEfaSmu2l+IXswslsFHbNkbxyCcEVpoDDDQNmKPyGbX4fpREmyoNr2ZbdFxKw4qziLJaeA/uXrKDf5JAUwTw1T0bq9KGs2w1lQAvaoqAaIZl29IfZCgRztWswpCcOZzzs4VXrdPXQFxHcWAU7aEQVbSthu2tlbZWfB7AsZrCKu2ni5sp41OPdkJFbRTHnLN4cvs/4IdgUZwPHZqjcLYfce5S7O3t3Yhx10+sfP1r3gK5YxKrw6aRnHDW4ehhiOvPcZ68am0dpVJpWEQVw6hCYYW4itCOYVr7MYxLHcR+TGBydGUBKV0GXqWUKb8cssm76lLnQh6/evjhh0PgYcb8hwSaJNC7ofdsw3fNyleYwtkkxqYvMwN/Ui5OpMTZtNVHLzyCIVS/wp/yqrUVRkZGhqXajzbWMawlCXG1RhfaWMdQ8hyCYGJ2GYhnVYm0VkKt7JOSLYRcRhFc10o6vJYEFgl43uXSQYGCQe0q1+KJ/KCCAJ6lTHWJs1Wfy+Pj4/+NRORVa3Mwu0zJcaRd1YaoBmhbDdtY5bO0sZYgrC3/qIRfbtPcNTc390+1jOA+EmiEwMDAwONMy3q+PCLNLX4CYe3RsB+UnFsWh/jNb0uO7uzs7ENISV61NhttrENYlAlNATKW1R4FNLxLW6sxhguG8Xeh1oXV+1DK3YXzXohRCNPV+/mZBJohUChYfyhtS1JND5uYKi1OzSTFa5ok4M67P5ZL2UjSHEBraGhoMBRWKa36lQ4sVPzH0GqKafqMGTSg3rN//8G/5hRyzQHmVccS6Onp2bR+w7oJfK86DXR6hltQ1RF67On8SwEBFII8jMXuRtKH81ribBWrPzU1NYlE5PWvrSbG60lgNQLr1/e+Ec1JnZVOodXO5nEVBMD/AaR7WNKmcKogzDRJoL0ECijtvNlg02Z7qTaYGjp5w2q6XMayfoPweDoJxE2gNFJ6me3Yg4v5ShWd1fRFHHF98DyfwhkXbOZDAq0QKJWMTsMP3i1zP3BLloDnVTqGxAqWOJONBXMngVUIDL4HxctHr3ISD8dAwPfNxTmL2aseA3BmQQLNEMC4zaesWVO8x3VdWx4XVvmwRjP25eua4GcTE9O/GfnMEmdEgu8kkC4CDmZBulpEU8yiaCYTHHTKYbZM/GgFxjerLaBwVtPgZxJICYGxsbErMMj9ySkxJ5dmhKKJMUiVH63gGOFkVT2XXwk6nWYCeLjiRMdxfuz77po026m7bVHzCAQUA8EO9E1O7tsd+cwSZ0SC7ySQDgIoaJpX4WalaKYgHlLqxNynP64WTTGLA+BTEByaQAIRgeHRoff6rvdMuWG5JUxgYaysbRWOqaaLVSxxJhwbZk8CEYHh4UF5OujPwgk8op18T4yAzG4mP2DlcvnOpUawjXMpEf5NAgkQGB0dvbhcPnI9HuuzRDijEidFNIFgLGQpKzhgUvS927ZtkzXS5qstYVW9mgY/k0ACBLCawbPQEXQdbtKwBiiiScFMIBA1skQsbsTuY0RTTmNVvQYs7iKBuAgMDw88FTNs3oRqYUdceTKf+gkgLtfXOptV9VpUuI8EYiAA0TzLcYpfxSD3XpYyYwDecBbWnomJCZlft7z0UpY4lxLh3yQQA4Hh4eFz0IZ2m4jmwhIrMeTKLBohgB+zG3D+caIpaVA4GyHJc0mgDQTwDPqFSOZm3JhdUtJEf1C4qF8bkmYSbSSAdubPL5ccq+rLkeF+ElBAYGRk6FLM6/hJJG2LYHJLF4Hwh0xWEfX8nVgmQ+ZAdWtZyMjVosJ9JKCAwPDw0O+hu/xfIJg2e80VAG4xSRFNiUvl2fTwx62maEo2FM4WYfNyEqiHwOho6QrcmB/DTYlVKjncqB5mcZ8j69XLhvj4rmv8v5Xyp3CuRIfHSKANBMLHKP3ggyKYkWh6Hmd0bwPatiYhJU2JDx5BuGVh+fBl0+cA+GXR8AAJtEzAGR4u/SM6El4vdTurqoKHwe4tJ84E2k9AhNP3g4+uljI7h1YjxOMk0ASBzZs393R2rfkCmszOiS6vtJ1Ff/E9bQTC0qZt/3p828RjYNuKs6ywxJm26NGezBPAGE3pjb0FTwQ9KfPO5MgBEU7PLUvb5oqiKUjYxpmjLwZdVU8Az52fjBvwHkxETNFUj7utOUA350zTkaFiq24sca6KiCeQQH0EBgcHn2ua/pcMw+x13ePmhagvEZ6VIIHgY5OTk4uzvK9kCEucK9HhMRKok8Dw2NBrsLjaLSKadV7C01JEALWEg5h+84P1mkThrJcUzyOBZQiMjJT+Aj3mUsUrLHMKd6efwEcwBGlnvWayql4vKZ5HAscTKIyMDV+FwX+/67mVcZl8Iuh4SGndU7UY2wGUNj/ciJ0UzkZo8VwSWCCwcePG3u6etV+CaD5XhhlRMLP71cDDCP8wM7N9VyMeUDgbocVzSQAE0Ak0jAHsX8OolZM5NjO7XwmJHab022/bhxoqbYrHFM7sxp2WJ0AAa54/GaXLr+E1GKB+xy27BBbmQf2bpUv/1uMRO4fqocRzSAAEIJovQknz25jdaLBQYD9Q1r8U+PGb8P3pDzTjB4WzGWq8JncEUD1/h6wNFAReD17G/Pzh3DHQwWF5Okg6hWRDheGK6Wljrhm/+Kx6M9R4TZ4IdGAezX/CDfdqdgBlO+yhaGLyANkwc9zdk5Mzzw7/aOIftnE2AY2X5IPAli1b+ru6Om9AF8LTo+FG+fBcTy9lvk3pEIKAYuyY/dZWvKRwtkKP12pLoNIJFNw8P39EetA53EiTSIelTtv8+MS2yZ+04hKr6q3Q47VaEsBEHRejWv4ptIJ1aelgTp0S0USp8+FH9uw7cd++fXU9k74cKnYOLUeG+3NJAFPC/S+I5hdwk1E0NfsG2I6NaePcP25VNAULS5yafTnoTtMEOlE9l+fNXyZVcymdoMTZdGK8MI0EgpsnJqYvaIdlbONsB0WmkWkCmzZtGurq6roJ4zOfsjAoekE4M+0Wja8igB/CneWyd3nVrpY+UjhbwseLs05g69atpzmOdSM6WgdENGVDv2v4b/gH/8kwAWuxUw/Dj960ffv0jnY5wzbOdpFkOpkjgEHtr+zoKNyNDoOB6jGafP48c6GsaXCluUUGuvvXYoLiL9c8qcmdFM4mwfGyTBMwh4YG/tKyjOtQulzje770tmbaIRp/PAFpq8Y2cfDgwT84/mhre1hVb40fr84Ygb6+vu6ODuday7b/hwimlC6lt9Utu1hPm+KZsXCuaC6mi8M8LP7r9uzZs3fFE5s4SOFsAhovySaBgYGBUdu2bsZTd08UwYyq52GJk6KZzaAusVqq59ETQjj0genp6TuWnNKWPzkcqS0YmUjaCYyMDJ6Jvp8vQyz70m4r7WuOgIhm9GOIzqDb8Sz6uUhJyZgy1k2aixGvyhABLHP+WtOy7zStoM8wcR9Frwz5QFNXJ3C0nTp40DAOvgJXKBFNsYTCuXo8eEZ2CZil0uCHoJSfQGmkGJVGsusOLV+NAOJ8yPfNi5qZnHi1tKuPs42zmgY/a0MAz5t3YkTmtWjPvFicqgwxkpYptk5pE+QljlRiHLxhamr6R0sOtf1PCmfbkTLBpAlgUHsfRqLcjDbNpyVtC/OPjwBKm3+Pds1Px5Ejf37joMw8YiOA581PNAzvVtO0HsWqeWzYE88Iovntycnp58AQNw5j2MYZB2XmEQsBDDc6q1Cwv+cUCo8qFoux5MlM0kAgeGh+3n0pLIlFNMVjljjTEHfa0DIB9JyjF9WU2Y06Wk6MCWSCAEqZYieePy+fMTm581dxGs0SZ5y0mZcSAgMD/e/CAL7rkDhFUwnhdCaKjr99aMd+QdyiKTTYOZTO7wStqo+AMzxc+kf0mb8+nNCovmt4lh4EDmOQ+4unp2fvS8IdCmcS1JlnywQ2btzYu7a76wuWZT7fMm2jXC4vPjXScuJMINUEUEX3UNJ8OUTz7qQMpXAmRZ75Nk0A08ENO0Xra4EXnOx7WIMS/7EHvWmcmblQngzCaqPQTfOy6empm5I0nMKZJH3m3TCB0dHB3/ID66te2RvkbEYN48v8BZjt6B0oaV6TtCPsHEo6Asy/bgKl0dJ5luV8G+taDLKEWTc2bU4MfA+zHc1+OA0OcThSGqJAG1YlgImH34STPgLBtKXKJvNnLkxUu+q1PCH7BFA//2cMcL8sLZ5QONMSCdqxHAGZqOMDEMwrljuB+/UksDBOU5y7AaL5Erx7afGUwpmWSNCOWgTWlEpDMlHHJaZlLkzUUes07tORgAgnJp7+1rZtkzKv5pE0+cjOoTRFg7YsEli3bt2G7u61X4NoPl12yiztbNdcxJOLD4j9Dw4ePCzroKdKNAU+hTMXX8FsOSmi2dvbewcmHj5FLKdoZit+7bAWpc1fuK5/7q5du/a3I712pxEuA9fuRJkeCTRLYD22np4urBMTPCVMA48js6TZLM1sXec4jizlKwGf8lz/7NnZ2em0esA2zrRGJod2iWj2ruv5BkTzqZVJaXMIIecuQzh3e3Zw1uz47E/TjILjONMcnRzZtmHDhnXd3Z23i2hK1ZxbDgmYxkGMNjsv7aIpkaFw5vD7mTaX5bnz7p61EE3z1GjZ3qqhKGkzl/aoITCPBxuwVtDkPWqSb2+qFM728mRqDRIQ0ezq6vy673mnsS2zQXgZPz1c/1zm1DTNQ4FtXjAxMY0fz2xs7BzKRpy0tHLz5s09PT3dX8f0YOGQo2rhrP6spfN0yvA8TzqD9luWcd7k+PSdWULCzqEsRUsjW0U016wp3gaBfIb0pHLCDo2CW68rprnbCNwXTEzM/nu9l6TlPFbV0xKJHNnR19fX3dHRcSvaMZ8hbZkimmW3nCMCdBWdgLNGYD4ri6Ip0WOJk9/hWAmIaBaLzq3I9EyWMmNFn3hmC/NpGqZtjgee+Vx0BP0ycaOaNIDC2SQ4XtY4gf7+/rUdncVbMX/3WVLSZDtm4wyzfIU0yaA9G2JpP2d6enoiy76wcyjL0cuQ7SKahYJ1C9YGeiZFM0OBa6OppmXdX573Uv1EUL3uso2zXlI8r2kCWOqiC6L5NRQyF0WTbZpN48zkhYj9vYFvPHvHjh3bM+nAEqNZVV8ChH+2l4CIJma5+So6A85mm2Z72aY9taNtmtbdhw4ePj+tE3Y0w5GzIzVDjdfUS8BGSfNLvh+czX7IepHpc57M0o/Y32ob0xfv2mUc0sczTiunUyxT5wuWu/ggbpwXiGEy843ruqmzkQapI4BJiL84NTX1SuSg3VgzVtXVfW9ynfLQ0NDvYibNa6R6LqLJdc/z9nUI/gWPUL4eXqdmuYt2RoDC2U6aTCskUCr1n44hJ3djuFEHkeSHgIyWCB9ocOyPTGybfCs8x4Poem7sVdczrol5NTw8jPXOCzfAAIpmYlFIJmMZp4kfy/8D0fwDWKCtaApdCmcy3zFdc11jmMGNKHUMSI8qt3wRKBaL78JqlO/Mg9fsVc9DlGPyEStSXhX4/qkimlz3PCboKcgGP5RSunzrQw+NfyQF5sRiAoUzFsz6Z1IaHbzC9I3fkWFHMhmxbfOhNP2jDg9Nwwt88zL0nl+TC38XnGTnUJ6ircjXUmnruaZlfxWtWqyfK2KcxmSx1n3ZC4JXTo1PfTGN9qm0icKpkm4O0saTQSeZpn+PZdnrcuAuXVwggNr5QQw3e8nk5KzMdJW7jVX13IW8fQ7LqpR2wbzZ8O11KH2ECXN1yvbxTXFKM54XnD8zM/uDFNuo1DQKp1K8WidudXd3fdbwjRPFSwqmnrGWfh/p7JP4VvqAzPvxNNgLZ2ZmMj0tXKvRonC2SjCn1w+Plj5gLDxOmVME2rstQilzpkaiiY+3Hzx46CW7d+/ep73zqzjINs5VAPHw8QTwDPqleJTyU8cf4R6dCEjzS1STMM3gqvHx6d+Hf5xwABAonDp902PwBZ1Bj7Vt8z5ktSaG7JhFggREOD3XCzC07J3j45MfSNCU1GXNqnrqQpJqg2yUNK9BiyZFM9Vhat646jZNPMRw2HHsV0M0v9B8inpeSeHUM65KvCqVSlegzQsTeGj9GLISdllItLpNE8+d7zRN+4Lx8anvZcH2uG1kVT1u4hnNb2Rk5PG4sWT4CSbv8DPqBc1eiUDUpok4/9w03RdOTOz49Urn5/kYS5x5jn79vju4ma7B6ZzxqH5mmTwTq1DebRgHL5qY2Lc7kw7EZDSFMybQWc5meHjoTxzHeipncM9yFI+1PXxgIag8IRtV0X3P//Tk5IxMPjx/7Nn8aykBVtWXEuHfxxBAu+bJlm38B26qoozp46YPAbRhhs7IPJrYrpycnHy3Pt6p9YQlTrV8M586SiP/gGVdi1GpJPMO0YFFAhJTvOZRk7h8dnaW43IXyaz+gcK5OqPcnjE6OnohSiPPMi2Z9ogTH2X9ixB1/kR+oAaxB8J5EUTzrmgf3+sjQOGsj1Mezyr6vvshcRwlTm6aEFhc69w0HkRJ87zp6ekHNHEtVjconLHizk5mWDsIi235J2THYlq6GgF5fNLHryBq6N8vl70Ltm/fvmO1a3i8NgG29tfmkuu9W7du7St2OL/EjcY5NjX6Jiy0aX7JNGcunZw0DmnkWuyusMQZO/L0Z1go2ldSNNMfp0YtxOOyH8Ljk3+C6/joV6PwlpzPEucSIHn/s1Tqe7RpFR9Ax4EdzYyTdybZ9R/zaKJejs2FaL5lfHz849n1JV2Ws8SZrngkbo1pFv8Y5RHb8zwDN1vi9tCA5gmIaCKG+zEy4qUQzduaT4lXLiXAEudSIjn+e8uWLf1rOosPBYG3Rga7Y/XCHNPIvutBYE7CixdiYPtPsu9NujxgkSJd8UjUmo6OwttgwBopqcjTJAvVvERtYubNEUDs7sOP3+kUzeb4rXYVixSrEcrJ8c2bN/d0dnaMY5D0epQ4K14vPMucEwRauBkOcjeCWw/Pzb90586dB7RwKoVOsI0zhUFJwqSODucNyHd92CHEn9MkQtBynpVF1byrJrjERcssV0uAVfXVCOXjeAGrqLw9H67q6SWq5vjN8/8M6wLJDyDXBVIcZpY4FQPOQvKl0sD5pmkNZcFW2liTAKaBC143sW36uppHubPtBCicbUeavQQxZOV1WCs7XAo2tJ5tm5kIInrNJWaPoLB5IebRvCsTRmtiJFuzNAlks26Mjm4eCIw1E5hv05YhSNyyQwDCuU0m6sDsRj/NjtV6WMo2Tj3i2LQXnld8NRrH7EIBzZzcMkQg+OGRI0eeRtFMJmQUzmS4pyZXDNl8rQxh8fyFIUipsYyGLEcAMbtlft57JoYbzS53DverJcA2TrV8U5364OjgM2zDOinVRubcOLRfGpVhRgvzcpjGxycnpt4MLPylS/C7wRJngvCTztoJrNcmbQPzX56AiGbl0dfwSa7AtM13ToxPvQlXUDSXxxbLEZY4Y8GcykxsrDhzIfplU2kcjTIWS5oyRNOyzMvGH5r8JLmkgwBLnOmIQ+xWDAwMPAOlmU2xZ8wMGyKAOQNENF87MTFN0WyInNqTWeJUyze1qWOy4vM532b6wlPdpum5gec4xd/dtm0bB7anLFQUzpQFJD5zgvPjy4s51UNgSZumZ1nO70A0P1fPtTwnXgJs4IqXdypyC2d5N4u/TIUxNGKRQLR8LwQUM7abrxwfn/rC4kF+SBUBtnGmKhzxGBMEzvlSuuGWLIFaMcC+MrqFXkbRTDY2q+VO4VyNkIbHC4UiJvVgZSMNoZUxmlLSlM227DLC8lJMPvzlNNhGG5YnwLtneTZaHunr6+vu7u7c47oe27dTEGEpdYZjNYNgHpPuXzI9Pf2VFJhFE1YhwJtnFUC6HcYz6U8rl12HJc7kIxuWNP3QjiOG4V80PT17S/JW0YJ6CLCqXg8ljc5xHOdMEU2pInJLloAMB8MwTQ9LlVw0OUnRTDYajeXOu6cxXpk/2/PcMypOVIo6mXcoww5g6Xos3+u8laKZvSBSOLMXs1YsRv+D+bQAjzrLuuncEifwdxMTEx9L3Aoa0DABCmfDyLJ7AWZDehKq6d3iQcHh/JtJRhKdQl8dHx//oyRtYN7NE6BwNs8uc1dannGmtKtJGyfn30wufOhI//GRI+VXwAK2lyQXhpZypnC2hC9bF0Mvw/ZN9qgnFzewn8H6TudzzfPkYtCOnCmc7aCYnTROi0yt9dRKdIzvigiYxhx60F+MsZoTinJgsjER4DjOmECnIJsOVBFH0DkEU/i4ZdzxwA8Vpj8NLsVqlP8Rd97Mr/0EWOJsP9NUprh169YTUE0M483SZvwhAvt3QzT5KGX86JXkSOFUgjV9iWLt9MeIVZyDM57YVAqYUrq3UNA075+YmPqreHJmLnEQoHDGQTkFedi2+egUmJEbE6IOOKmiY3sjHHdz43wOHKVw5iDICy6GJc78uJu8p7ZtixFXTU1NfS95a2hBOwmwc6idNFOcFromHoPhSNxiJOC67o4DBw78aYxZMquYCLDEGRPo5LMJWOKMIQioli/Or4kJPP7n3r1798SQLbOImQDLIDEDTyK7UsnoNIzBg2h3q8TbXHhgJeDvZjvjEYrmAmIMcv/m1NT0c9qZPtNKDwHeOemJhTJLyuX+EzCNHH8klRGuJFw9VR+E8y2Ks2PyCRKgcCYIP66sCwXrMb7Hx6Lj4C2lToxAumdmZuZnceTHPJIhwM6hZLjHnKt5bPsmq+hK+MsYWRFObz74vJIMmGhqCFA4UxMKpYYcK5xKs8p34qiuo8h5iMv6av41oHBqHuCKe1Li5PPpqkMtpU0shPFv09O7J1XnxfSTJcA2zmT5x5I7OnpZ4oyFNJo3Cyar6TGxTjIbCmeS9GPIu7+/fy2yGYwhq9xngVUr/SNz5S/mHkQOAFA4NQ+y4wSP1tzF1LgX+MbdmKB4NjUG0RBlBCicytCmI+EgcMbSYYn+VphmwHXR9Q9z6CGFU/NAW1bQo7mLqXHPdcv/mRpjaIhSAhROpXiTTzwIrHBVy+Qt0d8CyypSOPUPc+ghhVPzQKPESeGMJ8Z7MX0chyHFwzrxXCiciYdArQEYWii96tyUEwhY2lTOOD0ZUDjTEwtVlrDEqYos0g2fTQ/fzf9SmA2TThkBCmfKAtJuczD4nSXOdkOtmR5LnDWxaLqTwqlpYCO3sFAYS5wRjDa/Y6JiQ6aSk1Kn6/qsqreZb5qTo3CmOTrtsY0lzvZwPC4V27HDVUNlfmiIJ6vqxxHSdweFU9/Yhp5hUDZLnIpiHE0jh/k3d27fvn2HomyYbAoJUDhTGJQ2m8QSZ5uBRslJFT0sbXrGT6N9fM8HAQqn5nFmG6f6AKNUz+fT1WNOVQ4UzlSFQ4kxLHEqwXo0UfQRPXz0L37KAwEKp+ZRZhtnLAGmcMaCOT2ZUDjTEwsllmC1xbDEKT3A3NQQwI8ThVMN2tSmSuFMbWjaYxg6L9aG4wzLbnsSZCq1CFA4a1HReB+FU+PglkpGJwZoWyKcToHLS6kLNUuc6timM2UKZzrj0harXHdrt4w1lM1libMtTKsTkaFICxtLnBGJnLxTOPUOdNi+KTe4ZTHU7Q61adoGetSxObvbnTbTSzcB1t/SHZ+WrLNtt4iJjMNB2i0lxItrEpAmEHkdOHCAJc6ahPTdyWKIvrHFxBO2W1Wd1NjT5Fyzbdvbu3fvI8lZwJyTIEDhTIJ6THnipmZXukLWCz9Ke5BFpSFZYV5MOl0EKJzpikdbrZmfn6dwtpXosYktVNVZTT8WSy7+onBqHGZ0CHkau5cW19gxlJZIxGgHhTNG2HFnVSgUWOJUD/2w+iyYQ9oIUDjTFpE22jM3N0fhbCPPZZIKByQtc4y7NSVA4dQ0sOJWsVh0ZWkHWeJB2uO4tZ8AOogonO3HmvoUKZypD1HzBmJWctdzPSNc4oHC2TzIFa7EDxKFcwU+uh6icOoa2Ypfi1V1EU/TWnxEUG+v4/WOwhkv71TkRuFMRRiUGeHJWEN5Xj16V5ZTfhOmcOYw9hROzYOO9k13Ybyh5p4m4x7bOJPhnnSuFM6kI6A4f9zYHMupljFLnGr5pjJ1Cmcqw9I+o1DaXGznbF+qTCkiwM6hiES+3imcmscbJU4Kp9oYs8Splm8qU6dwpjIs7TMKo5AonO3DeVxKbOM8DkkudlA4tQ8zq+qKQ8wSp2LAaUyewpnGqLTRJlbV2wizRlJs46wBJQe7KJyaB5mdQ8oDzBKncsTpy4DCmb6YtNUiljjbirNWYhTOWlQ030fh1DzAKHGWNXcxaffmkzaA+cdPgMIZP/NYc8QTlw/EmmHOMkOJnnxzFnNxl8KpedAxHOk7mruYqHue5303UQOYeSIEOF1OItjjy3RwcLALi7bdh2fWT2w0V5SmGr1E2/MjFmj6WPQR+66fmJh42eIOfsgNAd4ZOQh1qVR6ItYfuh6untSIu9Ui0ch1up4rPOTlOI68347S5iunpqa4WJuuAV/BLwrnCnA0O9QBAb0cPj0DJaWTcOPbq/knIsHtKAH8+BwBk/tRer9jenr6c0eP8BMJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJkAAJxEKAaw7FgjkVmZhY8fJ8WPJ0rDl0Il6rrjmUCqszZASYHsZ6RD/BIm53zM7O3psh02lqgwQonA0Cy+LpEMxhLDT2KbyenUX7s2BztLAdxFNWwJRV7v4RSwf/Ed4PZ8F+2tgYAZY6GuOVxbPtdet6b8f9fIZhyP3MVwwMUCAJTu3p6V27f//+r2fxS0ObVyZgrXyYR7NOYGho4DKI5qlZ9yOL9qP0+baBgYHHZdF22rwyAQrnynw0OGo+WwMnMukChFPur2dm0ngavSIBCueKeLJ/EDfvE7LvRTY9kKZOx3HIP5vhW9FqCueKeHQ4GBR08CLDPpB/hoO3nOkUzuXIcD8JtEhAeti56UmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUTupZJXsAAANfSURBVIVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCJdJkwAJ6EmAwqlnXOkVCZCAQgIUToVwmTQJkICeBCicesaVXpEACSgkQOFUCDcNSZum4abBjrza4Pu+l1ffdfabwqlzdOFbEJgPaO5iqt0zTfMXqTaQxjVFgMLZFLbsXBQE/r9lx1otLf2+ll7l3Ckz5/7nwf01Q0MDP3QKzuPy4GySPgZBYAQ+XnhHSRMv+9rx8fFXJ2kT81ZDwFGTLFNNEYHDvm9c7Ln+53Evn5wiu7QzBe2ZoWjiR8oIDOOGA/sPvEU7J+lQSIAlzvx8EYojI6XXoDz0dAT9xMA07Py4HpOngXnEc92foGX59unp7V+JKVdmkwCB/w9Wn+B9I40e3QAAAABJRU5ErkJggg=="></image>

            </g>

        </g>

    </g>

</svg>

                    <section class="legend">

                    <div class="legend__close">

                        <img src="/images/map/close.svg" alt="close">

                    </div>

                    <p class="legend__title">Legenda</p>

                    <ul class="legend__list">

                        <li class="legend__list_el">

                            <svg width="20px" height="17px" viewBox="0 0 20 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <g id="v2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <g id="d-PDP-map-1" transform="translate(-1652.000000, -240.000000)">

                                        <g id="legenda" transform="translate(1641.000000, 188.000000)">

                                            <g id="mask" transform="translate(0.000000, 16.000000)">

                                                <g id="content" transform="translate(8.000000, 32.000000)">

                                                    <g id="houseIcon">

                                                        <polygon id="Shape" points="0 0 26 0 26 25.5 0 25.5"></polygon>

                                                        <polygon id="Shape" fill="#FF8C00" fill-rule="nonzero" points="11.05 20.50625 11.05 14.76875 14.95 14.76875 14.95 20.50625 19.825 20.50625 19.825 12.85625 22.75 12.85625 13 4.25 3.25 12.85625 6.175 12.85625 6.175 20.50625"></polygon>

                                                    </g>

                                                </g>

                                            </g>

                                        </g>

                                    </g>

                                </g>

                            </svg>

                            Deze woning bekijk je nu

                        </li>

                        <li class="legend__list_el">

                            <svg width="20px" height="17px" viewBox="0 0 20 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <g id="v2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <g id="d-PDP-map-1" transform="translate(-1652.000000, -270.000000)">

                                        <g id="legenda" transform="translate(1641.000000, 188.000000)">

                                            <g id="mask" transform="translate(0.000000, 16.000000)">

                                                <g id="content" transform="translate(8.000000, 32.000000)">

                                                    <g id="houseIcon" transform="translate(0.000000, 30.000000)">

                                                        <polygon id="Shape" points="0 0 26 0 26 25.5 0 25.5"></polygon>

                                                        <polygon id="Shape" fill="#61677D" fill-rule="nonzero" points="11.05 20.50625 11.05 14.76875 14.95 14.76875 14.95 20.50625 19.825 20.50625 19.825 12.85625 22.75 12.85625 13 4.25 3.25 12.85625 6.175 12.85625 6.175 20.50625"></polygon>

                                                    </g>

                                                </g>

                                            </g>

                                        </g>

                                    </g>

                                </g>

                            </svg>

                            Andere woning te koop

                        </li>

                        <li class="legend__list_el">

                            <svg width="18px" height="21px" viewBox="0 0 18 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <g id="v2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <g id="d-PDP-map-1" transform="translate(-1653.000000, -298.000000)">

                                        <g id="legenda" transform="translate(1641.000000, 188.000000)">

                                            <g id="mask" transform="translate(0.000000, 16.000000)">

                                                <g id="content" transform="translate(8.000000, 32.000000)">

                                                    <g id="busIcon" transform="translate(0.000000, 60.000000)">

                                                        <polygon id="Path" points="0 0 25.2571429 0 25.2571429 25.2571429 0 25.2571429"></polygon>

                                                        <path d="M4.45714286,17.0075188 C4.45714286,17.9364812 4.87360714,18.7704361 5.525,19.3510376 L5.525,21.2300752 C5.525,21.8106767 6.00553571,22.2857143 6.59285714,22.2857143 L7.66071429,22.2857143 C8.24803571,22.2857143 8.72857143,21.8106767 8.72857143,21.2300752 L8.72857143,20.1744361 L17.2714286,20.1744361 L17.2714286,21.2300752 C17.2714286,21.8106767 17.7519643,22.2857143 18.3392857,22.2857143 L19.4071429,22.2857143 C19.9944643,22.2857143 20.475,21.8106767 20.475,21.2300752 L20.475,19.3510376 C21.1263929,18.7704361 21.5428571,17.9364812 21.5428571,17.0075188 L21.5428571,6.45112782 C21.5428571,2.75639098 17.7199286,2.22857143 13,2.22857143 C8.28007143,2.22857143 4.45714286,2.75639098 4.45714286,6.45112782 L4.45714286,17.0075188 Z M8.19464286,18.0631579 C7.30832143,18.0631579 6.59285714,17.3558797 6.59285714,16.4796992 C6.59285714,15.6035188 7.30832143,14.8962406 8.19464286,14.8962406 C9.08096429,14.8962406 9.79642857,15.6035188 9.79642857,16.4796992 C9.79642857,17.3558797 9.08096429,18.0631579 8.19464286,18.0631579 Z M17.8053571,18.0631579 C16.9190357,18.0631579 16.2035714,17.3558797 16.2035714,16.4796992 C16.2035714,15.6035188 16.9190357,14.8962406 17.8053571,14.8962406 C18.6916786,14.8962406 19.4071429,15.6035188 19.4071429,16.4796992 C19.4071429,17.3558797 18.6916786,18.0631579 17.8053571,18.0631579 Z M19.4071429,11.7293233 L6.59285714,11.7293233 L6.59285714,6.45112782 L19.4071429,6.45112782 L19.4071429,11.7293233 Z" id="Shape" fill="#61677D" fill-rule="nonzero"></path>

                                                    </g>

                                                </g>

                                            </g>

                                        </g>

                                    </g>

                                </g>

                            </svg>

                            Bushalte

                        </li>

                        <li class="legend__list_el">

                            <svg width="18px" height="22px" viewBox="0 0 18 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <g id="v2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <g id="d-PDP-map-1" transform="translate(-1653.000000, -327.000000)">

                                        <g id="legenda" transform="translate(1641.000000, 188.000000)">

                                            <g id="mask" transform="translate(0.000000, 16.000000)">

                                                <g id="content" transform="translate(8.000000, 32.000000)">

                                                    <g id="trainIcon" transform="translate(0.000000, 90.000000)">

                                                        <polygon id="Path" points="0 0 26 0 26 26 0 26"></polygon>

                                                        <path d="M4.33333333,16.7916667 C4.33333333,18.8825 6.03416667,20.5833333 8.125,20.5833333 L6.5,22.2083333 L6.5,22.75 L19.5,22.75 L19.5,22.2083333 L17.875,20.5833333 C19.9658333,20.5833333 21.6666667,18.8825 21.6666667,16.7916667 L21.6666667,5.41666667 C21.6666667,1.625 17.7883333,1.08333333 13,1.08333333 C8.21166667,1.08333333 4.33333333,1.625 4.33333333,5.41666667 L4.33333333,16.7916667 Z M13,18.4166667 C11.8083333,18.4166667 10.8333333,17.4416667 10.8333333,16.25 C10.8333333,15.0583333 11.8083333,14.0833333 13,14.0833333 C14.1916667,14.0833333 15.1666667,15.0583333 15.1666667,16.25 C15.1666667,17.4416667 14.1916667,18.4166667 13,18.4166667 Z M19.5,10.8333333 L6.5,10.8333333 L6.5,5.41666667 L19.5,5.41666667 L19.5,10.8333333 Z" id="Shape" fill="#61677D" fill-rule="nonzero"></path>

                                                    </g>

                                                </g>

                                            </g>

                                        </g>

                                    </g>

                                </g>

                            </svg>

                            Treinstation

                        </li>

                        <li class="legend__list_el">

                            <svg width="24px" height="20px" viewBox="0 0 24 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <g id="v2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <g id="d-PDP-map-1" transform="translate(-1650.000000, -359.000000)">

                                        <g id="legenda" transform="translate(1641.000000, 188.000000)">

                                            <g id="mask" transform="translate(0.000000, 16.000000)">

                                                <g id="content" transform="translate(8.000000, 32.000000)">

                                                    <g id="schoolIcon" transform="translate(0.000000, 120.000000)">

                                                        <polygon id="Path" points="0 0 25.2571429 0 25.2571429 25.2571429 0 25.2571429"></polygon>

                                                        <path d="M5.26190476,13.870381 L5.26190476,18.0799048 L12.6285714,22.1 L19.9952381,18.0799048 L19.9952381,13.870381 L12.6285714,17.8904762 L5.26190476,13.870381 Z M12.6285714,3.15714286 L1.05238095,9.47142857 L12.6285714,15.7857143 L22.1,10.6185238 L22.1,17.8904762 L24.2047619,17.8904762 L24.2047619,9.47142857 L12.6285714,3.15714286 Z" id="Shape" fill="#61677D" fill-rule="nonzero"></path>

                                                    </g>

                                                </g>

                                            </g>

                                        </g>

                                    </g>

                                </g>

                            </svg>

                            Basisschool

                        </li>

                        <li class="legend__list_el">

                            <svg width="24px" height="21px" viewBox="0 0 24 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <g id="v2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <g id="d-PDP-map-1" transform="translate(-1650.000000, -388.000000)">

                                        <g id="legenda" transform="translate(1641.000000, 188.000000)">

                                            <g id="mask" transform="translate(0.000000, 16.000000)">

                                                <g id="content" transform="translate(8.000000, 32.000000)">

                                                    <g id="schoolIcon" transform="translate(0.000000, 150.000000)">

                                                        <polygon id="Path" points="0 0 25.2571429 0 25.2571429 25.2571429 0 25.2571429"></polygon>

                                                        <path d="M5.26190476,13.870381 L5.26190476,18.0799048 L12.6285714,22.1 L19.9952381,18.0799048 L19.9952381,13.870381 L12.6285714,17.8904762 L5.26190476,13.870381 Z M12.6285714,3.15714286 L1.05238095,9.47142857 L12.6285714,15.7857143 L22.1,10.6185238 L22.1,17.8904762 L24.2047619,17.8904762 L24.2047619,9.47142857 L12.6285714,3.15714286 Z" id="Shape" stroke="#61677D" fill-rule="nonzero"></path>

                                                    </g>

                                                </g>

                                            </g>

                                        </g>

                                    </g>

                                </g>

                            </svg>

                            Middelbare school

                        </li>

                        <li class="legend__list_el">

                            <svg width="21px" height="21px" viewBox="0 0 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <g id="v2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <g id="d-PDP-map-1" transform="translate(-1651.000000, -418.000000)">

                                        <g id="legenda" transform="translate(1641.000000, 188.000000)">

                                            <g id="mask" transform="translate(0.000000, 16.000000)">

                                                <g id="content" transform="translate(8.000000, 32.000000)">

                                                    <g id="groceryIcon" transform="translate(0.000000, 180.000000)">

                                                        <polygon id="Path" points="0 0 25.2571429 0 25.2571429 25.2571429 0 25.2571429"></polygon>

                                                        <path d="M8.98857143,19.0171429 C7.88542857,19.0171429 6.99288571,19.9197143 6.99288571,21.0228571 C6.99288571,22.126 7.88542857,23.0285714 8.98857143,23.0285714 C10.0917143,23.0285714 10.9942857,22.126 10.9942857,21.0228571 C10.9942857,19.9197143 10.0917143,19.0171429 8.98857143,19.0171429 Z M2.97142857,2.97142857 L2.97142857,4.97714286 L4.97714286,4.97714286 L8.58742857,12.5888286 L7.23357143,15.0458286 C7.07311429,15.3266286 6.98285714,15.6575714 6.98285714,16.0085714 C6.98285714,17.1117143 7.88542857,18.0142857 8.98857143,18.0142857 L21.0228571,18.0142857 L21.0228571,16.0085714 L9.40977143,16.0085714 C9.26937143,16.0085714 9.15905714,15.8982571 9.15905714,15.7578571 L9.18914286,15.6375143 L10.0917143,14.0028571 L17.563,14.0028571 C18.3151429,14.0028571 18.9770286,13.5916857 19.318,12.9699143 L22.9082286,6.46137143 C22.9884571,6.32097143 23.0285714,6.15048571 23.0285714,5.98 C23.0285714,5.42842857 22.5772857,4.97714286 22.0257143,4.97714286 L7.19345714,4.97714286 L6.25077143,2.97142857 L2.97142857,2.97142857 Z M19.0171429,19.0171429 C17.914,19.0171429 17.0214571,19.9197143 17.0214571,21.0228571 C17.0214571,22.126 17.914,23.0285714 19.0171429,23.0285714 C20.1202857,23.0285714 21.0228571,22.126 21.0228571,21.0228571 C21.0228571,19.9197143 20.1202857,19.0171429 19.0171429,19.0171429 Z" id="Shape" fill="#61677D" fill-rule="nonzero"></path>

                                                    </g>

                                                </g>

                                            </g>

                                        </g>

                                    </g>

                                </g>

                            </svg>

                            Supermarkt

                        </li>

                        <li class="legend__list_el">

                            <svg width="24px" height="20px" viewBox="0 0 24 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <g id="v2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <g id="d-PDP-map-1" transform="translate(-1650.000000, -449.000000)">

                                        <g id="legenda" transform="translate(1641.000000, 188.000000)">

                                            <g id="mask" transform="translate(0.000000, 16.000000)">

                                                <g id="content" transform="translate(8.000000, 32.000000)">

                                                    <g id="baseline-child_care-24px" transform="translate(0.000000, 210.000000)">

                                                        <polygon id="Path" points="0 0 26 0 26 26 0 26"></polygon>

                                                        <circle id="Oval" fill="#61677D" cx="15.7083333" cy="11.375" r="1.35416667"></circle>

                                                        <circle id="Oval" fill="#61677D" cx="10.2916667" cy="11.375" r="1.35416667"></circle>

                                                        <path d="M24.8516667,13.715 C24.895,13.4875 24.9166667,13.2491667 24.9166667,13 C24.9166667,12.7508333 24.895,12.5125 24.8516667,12.285 C24.5808333,10.6491667 23.3783333,9.31666667 21.8075,8.85083333 C21.2333333,7.6375 20.4208333,6.57583333 19.435,5.69833333 C17.7233333,4.17083333 15.47,3.25 13,3.25 C10.53,3.25 8.27666667,4.17083333 6.565,5.69833333 C5.56833333,6.57583333 4.75583333,7.64833333 4.1925,8.85083333 C2.62166667,9.31666667 1.41916667,10.6383333 1.14833333,12.285 C1.105,12.5125 1.08333333,12.7508333 1.08333333,13 C1.08333333,13.2491667 1.105,13.4875 1.14833333,13.715 C1.41916667,15.3508333 2.62166667,16.6833333 4.1925,17.1491667 C4.75583333,18.3516667 5.56833333,19.4133333 6.54333333,20.28 C8.255,21.8183333 10.5191667,22.75 13,22.75 C15.4808333,22.75 17.745,21.8183333 19.4675,20.28 C20.4425,19.4133333 21.255,18.3408333 21.8183333,17.1491667 C23.3783333,16.6833333 24.5808333,15.3616667 24.8516667,13.715 Z M20.5833333,15.1666667 C20.475,15.1666667 20.3775,15.145 20.2691667,15.1341667 C20.0525,15.86 19.7383333,16.5316667 19.3375,17.1491667 C17.9833333,19.2183333 15.6541667,20.5833333 13,20.5833333 C10.3458333,20.5833333 8.01666667,19.2183333 6.6625,17.1491667 C6.26166667,16.5316667 5.9475,15.86 5.73083333,15.1341667 C5.6225,15.145 5.525,15.1666667 5.41666667,15.1666667 C4.225,15.1666667 3.25,14.1916667 3.25,13 C3.25,11.8083333 4.225,10.8333333 5.41666667,10.8333333 C5.525,10.8333333 5.6225,10.855 5.73083333,10.8658333 C5.9475,10.14 6.26166667,9.46833333 6.6625,8.85083333 C8.01666667,6.78166667 10.3458333,5.41666667 13,5.41666667 C15.6541667,5.41666667 17.9833333,6.78166667 19.3375,8.85083333 C19.7383333,9.46833333 20.0525,10.14 20.2691667,10.8658333 C20.3775,10.855 20.475,10.8333333 20.5833333,10.8333333 C21.775,10.8333333 22.75,11.8083333 22.75,13 C22.75,14.1916667 21.775,15.1666667 20.5833333,15.1666667 Z M8.125,15.1666667 C8.94833333,17.0841667 10.8225,18.4166667 13,18.4166667 C15.1775,18.4166667 17.0516667,17.0841667 17.875,15.1666667 L8.125,15.1666667 Z" id="Shape" fill="#61677D" fill-rule="nonzero"></path>

                                                    </g>

                                                </g>

                                            </g>

                                        </g>

                                    </g>

                                </g>

                            </svg>

                            Kinderopvang

                        </li>

                        <li class="legend__list_el">

                            <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <g id="v2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                                    <g id="d-PDP-map-1" transform="translate(-1652.000000, -479.000000)">

                                        <g id="legenda" transform="translate(1641.000000, 188.000000)">

                                            <g id="mask" transform="translate(0.000000, 16.000000)">

                                                <g id="content" transform="translate(8.000000, 32.000000)">

                                                    <g id="baseline-local_hospital-24px" transform="translate(0.000000, 240.000000)">

                                                        <polygon id="Path" points="0 0 26 0 26 26 0 26"></polygon>

                                                        <path d="M20.5833333,3.25 L5.41666667,3.25 C4.225,3.25 3.26083333,4.225 3.26083333,5.41666667 L3.25,20.5833333 C3.25,21.775 4.225,22.75 5.41666667,22.75 L20.5833333,22.75 C21.775,22.75 22.75,21.775 22.75,20.5833333 L22.75,5.41666667 C22.75,4.225 21.775,3.25 20.5833333,3.25 Z M19.5,15.1666667 L15.1666667,15.1666667 L15.1666667,19.5 L10.8333333,19.5 L10.8333333,15.1666667 L6.5,15.1666667 L6.5,10.8333333 L10.8333333,10.8333333 L10.8333333,6.5 L15.1666667,6.5 L15.1666667,10.8333333 L19.5,10.8333333 L19.5,15.1666667 Z" id="Shape" fill="#61677D" fill-rule="nonzero"></path>

                                                    </g>

                                                </g>

                                            </g>

                                        </g>

                                    </g>

                                </g>

                            </svg>

                            Ziekenhuis

                        </li>

                        <li class="legend__list_el">

                            <img src="/images/map/police.png" alt="police">

                            Politiebureau

                        </li>

                    </ul>

                </section>

                </div>

                <section class="white-content">

                    <div class="container container-object-detail">

                        <div class="row">

                            <div class="col-lg-11 col-lg-offset-1">

                                <div class="object-detail-main row">

                                    {{-- @include('pages.parcel.parts.panels.panel-placeholder', [

                                    'placeholderId' => 'neighborhood-statistics',

                                    'placeholderHeader' => trans('parcel.neighbourhood.header'),

                                    'icon' => 'zmdi zmdi-tune'

                                    ])

                                    @include('pages.parcel.parts.panels.panel-placeholder', [

                                    'placeholderId' => 'parcels-nearby',

                                    'placeholderHeader' => trans('parcel.nearby.header'),

                                    'iconHtml' => ''

                                    ]) --}}

                                </div>

                            </div>

                        </div>

                    </div>

                </section>

                <div class="container container-object-detail section-second" style="margin-bottom: -30px;">

                    <div class="row">

                        <div class="col-lg-11 col-lg-offset-1">

                            <div class="object-detail-main row">

                                <div class="panel gray">

                                    <div class="panel-body">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <section class="seo-page-ranking lift-table" style="margin-bottom: 0;">

                                                    <div class="row">

                                                        <div class="col-md-12">

                                                            <div class="seo-page-title-bar">

                                                                <h2 class="main-title">@lang('seo.tableHeader')</h2>

                                                                <h2>@lang('parcel.show.seoStreets') {{$parcel->plaats}}</h2>

                                                            </div>

                                                            <div class="row">

                                                                <div class="col-md-6 left">

                                                                    <ul>

                                                                        @isset($topStreets[0])

                                                                        @foreach($topStreets[0] as $street)

                                                                        <li>

                                                                            <a href="{{ route('seo.streetPage', [$street['municipalitySlug'], $street['citySlug'], $street['streetSlug']]) }}">

                                                                                <span>{{ $loop->index+1 }}.</span> {{ $street['name'] }} - <i>{{ number_format($street['parcelsForSale'], 0, ".", ".") }}</i>

                                                                        </a>

                                                                        </li>

                                                                        @endforeach

                                                                        @endisset

                                                                    </ul>

                                                                </div>

                                                                <div class="col-md-6 right">

                                                                    <ul>

                                                                        @isset($topStreets[1])

                                                                        @foreach($topStreets[1] as $street)

                                                                        <li>

                                                                            <a href="{{ route('seo.streetPage', [$street['municipalitySlug'], $street['citySlug'], $street['streetSlug']]) }}">

                                                                                <span>{{ ($loop->index+1) + $topStreets[0]->count() }}.</span> {{ $street['name'] }} - <i>{{ number_format($street['parcelsForSale'], 0, ".", ".") }}</i>

                                                                        </a>

                                                                        </li>

                                                                        @endforeach

                                                                        @endisset

                                                                    </ul>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </section>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="panel gray">

                                    <div class="panel-body faqPanel">

                                        {{-- <h2 class="section-title">@lang('parcel.show.faqSection')</h2> --}}

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="faq-questions">

                                                    <div class="faqs-featured panel-group accordion">

                                                        <div class="panel-default">

                                                            {{-- @foreach($kenticoContent->faqSection as $faq)

                                                                <a data-toggle="collapse" data-parent="#faq" href="#collapse{{$loop->index+1}}" aria-expanded="true" aria-controls="collapse{{$loop->index+1}}" class="collapsed">

                                                                    <div class="panel-heading" role="tab" id="heading{{$loop->index+1}}">

                                                                        <h4>

                                                                            <span class="fa fa-angle-down"></span>

                                                                            {{$faq->question}}

                                                                        </h4>

                                                                    </div>

                                                                </a>

                                                                <div id="collapse{{$loop->index+1}}" class="panel-collapse collapse panel-answer" role="tabpanel" aria-labelledby="heading{{$loop->index+1}}">

                                                                    <div class="panel-body text-left">

                                                                        {!! $faq->answer !!}

                                                                    </div>

                                                                </div>

                                                            @endforeach --}}

                                                            {{-- <a href="{{route('page.faq')}}" class="more-link">@lang('parcel.show.faqMore') <i class="fa fa-chevron-right" aria-hidden="true"></i></a> --}}

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </div>

        {{-- @include( 'pages.parcel.parts.sticky-mobile' ) --}}

        <input type="hidden" name="id" value="{{ $parcel->id }}">

    </form>

    <!-- END OBJECT FORM -->



    <!-- START MODALS -->
{{-- 
    @include('pages.parcel.parts.modal-doe-een-bod')

    @include('pages.parcel.parts.modal-toon-interesse')

    @include('pages.parcel.parts.modal-plan-bezichtiging')

    @include('pages.parcel.parts.modal-claim-rental')

    @include('pages.parcel.parts.modal-request') --}}

    <!-- END MODALS -->



    {{-- @include( 'pages.parcel.parts.compare' ) --}}

</div>

@endsection

@section('footer')

@parent

{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeMJ_dqefoF262NA4NX12U76mDw9laB0M"></script> --}}
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIwzALxUPNbatRBj3Xi1Uhp0fFzwWNBkE&callback=initMap&libraries=&v=weekly"
defer
></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>

<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->

<script type="text/javascript" src="{{ asset('assets/cdn/js/summernote.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/cdn/js/summernote-nl-NL.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/cdn/js/chosen.jquery.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/cdn/js/jquery.magnific-popup.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/cdn/js/owl.carousel.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/maps/leaflet.js') }}"></script>



<script type="text/javascript">

    var likedByUser = {{ json_encode($parcel->likedByUser) }};

    var isFavoritedByUser = {{ json_encode($parcel->isFavoritedByUser) }};

    var needsStreetview = {{ json_encode($needsStreetview) }};


    <!-- Images gallery items -->

    var magnificPopupItems = [];



    @foreach($customImages as $image)

    magnificPopupItems.push({

        src: '{{ $parcel->getImageUrl($image) }}',

        type: 'image'

    });

    @endforeach



    <!-- Parcel info for uploadify script -->

    var parcel = {}



    $('.main-images').owlCarousel({

        loop:false,

        margin:0,

        dots:true,

        nav:true,

        items: 1,

        navText: ["<img src='/images/icons/arrow-left.svg'>","<img src='/images/icons/arrow-right.svg'>"]

    });



    function sendGaEvent(type) {

        ga('send', {

            hitType: 'event',

            eventCategory: 'hypotheek24',

            eventAction: 'view',

            eventValue: '{{$parcel->getId()}}',

            eventLabel: type,

        });

    }



    function sendBannerNew(){

        ga('send', {

            hitType: 'event',

            eventCategory: 'banner-NowgoNEW',

            eventAction: 'view',

            eventValue: '1'

        });

    }



</script>



<script>

  $(document).ready(function(){



      if (document.getElementById('KeYrQFMBufob') && typeof sendBannerEvent === "function") {

          sendBannerEvent();

      }



    var allDots = $('.owl-dots .owl-dot');

    var count = allDots.length;

    var countedIndex = 0;

    var array = [];



    var owl = $('.owl-carousel');

    owl.owlCarousel();



    owl.on('changed.owl.carousel', function(event) {

      var current = event.item.index;

      if(current > countedIndex){

        array.push('1');

      }

      if(current < countedIndex){

        array.pop();

      }

      moveTheDots(current);

      countedIndex = current;

    });





    function moveTheDots(current){

      if(array.length > 3 && count !== current + 1){

        var lengthToMove = -((current - 3) * 20);

        for(var i = 0; i < allDots.length; i++){

          $(allDots[i]).css("transform", `translateX(${lengthToMove}px)`);

        }

        array.pop();

      } else {

        if(array.length == 0 && current !== 0){

          var transform = $(".owl-dot").css('transform').split(/[()]/)[1];

          var lengthToMoveBack = +(transform.split(',')[4]) + 20;

          for(var i = 0; i < allDots.length; i++){

            $(allDots[i]).css("transform", `translateX(${lengthToMoveBack}px)`);

          }

        }

      }

    }



  });

</script>



<script>

(function() {

    var r42Collector = {

        properties: {

            "timeStamp": +new Date(),

            "woningType": "{{$parcel->woningType}}",

            "woonoppervlak": "{{$parcel->oppervlaktePand}}",

            "plaats": "{{$parcel->plaats}}",

            "campagne": "Promodomo woon",

            "domein": document.domain,

            "url": document.URL

    },

    generateUrl: function() {

        var url = '//t.svtrd.com/collect/efaa8ff0-845f-46db-aa92-a8425098912a/eedef29e-f4a3-4504-bf08-1520b0673133?ct=engagement&name=Promodomo - Datacollector';

        if (this.properties) {

            for (var property in this.properties) {

                if (this.properties.hasOwnProperty(property)) {

                    url += '&cup=' + property + ':' + this.properties[property];

                }

            }

        }

        return encodeURI(url);

    }

    };



    var iframe = document.createElement('iframe');

    iframe.src = r42Collector.generateUrl();

    iframe.name = 'r42dc';

    iframe.style.display = 'none';

    iframe.style.width = '1px';

    iframe.style.height = '1px';

    document.body.append(iframe);

})();

</script>



<script src="/js/woning-detail.js?v=11"></script>





<script src="/js/parcel-lazyloading.js?v=5"></script>



<script>



  var mapBlurButton = $('#mapBlurButton');

  var map2BlurButton = $('#map2BlurButton');

  var map3BlurButton = $('#map3BlurButton');



  mapBlurButton.click(function(){

    $('#map').css("display", "block");

    $('#mapBlur').css("display", "none");

    reinvalidateMapSize('map');

  });



  map2BlurButton.click(function(){

    $('#map2').css("display", "block");

    $('#map2Blur').css("display", "none");

    reinvalidateMapSize('map2');

  });



  map3BlurButton.click(function(){

    $('#map3').css("display", "block");

    $('#map3Blur').css("display", "none");

    reinvalidateMapSize('map3');

  });





</script>



@endsection

