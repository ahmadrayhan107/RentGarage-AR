<section id="garages" class="portfolio">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Garages</h2>
            <p>List of garage that can you choose for rent</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($rentClasses as $rentClass)
                        <li data-filter=".filter-{{ $rentClass->type == 'All In One' ? 'AIO' : $rentClass->type }}">
                            {{ $rentClass->type }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($garages as $garage)
                <div
                    class="col-lg-4 col-md-6 portfolio-item filter-{{ $garage->rentClass->type == 'All In One' ? 'AIO' : $garage->rentClass->type }}">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('/img/garages/' . $garage->file_upload) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Garage-{{ $garage->id }}</h4>
                            <p>{{ $garage->rentClass->type }}</p>
                            <div class="portfolio-links">
                                <a href="/rent/{{ $garage->id }}"><i class="bx bx-plus"></i></a>
                                <a href="/garage-detail/{{ $garage->id }}" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
