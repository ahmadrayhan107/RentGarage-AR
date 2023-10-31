@extends('frontend.inner-page.layouts.main')

@section('title', 'Garage')

@section('content')


    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{ 'GarageID-' . $garage->id }}</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{ 'GarageID-' . $garage->id }}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="{{ asset('/img/garages/' . $garage->file_upload) }}" alt="">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Garage Details</h3>
                        <ul>
                            <li><strong>Type</strong>: {{ $garage->rentClass->type }}</li>
                            <li><strong>Cost</strong>: {{ 'Rp' . $garage->rentClass->cost }}</li>
                            <li><strong>Room Code</strong>: {{ $garage->garageRoom->room_code }}</li>
                            <li><strong>Status</strong>: {{ $garage->status == 1 ? 'Available' : 'Not Available' }}</li>
                            <li><strong>Address</strong>:
                                {{ $garage->garageLocation->street_name .
                                    ' ' .
                                    $garage->garageLocation->address_number .
                                    ', ' .
                                    $garage->garageLocation->city .
                                    ' City, ' .
                                    $garage->garageLocation->province .
                                    ' ' .
                                    $garage->garageLocation->postal_code
                                    }}
                            </li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Description</h2>
                        <p>{{ $garage->description }}</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

@endsection
