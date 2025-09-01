@extends('layout.app')


@section('content')

    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container">
        <a class="navbar-brand" href="#">Biokit</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item my-auto">
                <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#sensors">Sensors</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#works">Step</a>
            </li>
            <li class="nav-item my-auto">
                <a class="nav-link" href="#location">Location</a>
            </li>
            {{-- <li class="nav-item my-auto">
                <button class="btn btn-sm bt-primary rounded-5 px-4">
                    <a class="nav-link text-white" href="/login">Measure</a>
                </button>
            </li> --}}
            </ul>
        </div>
        </div>
    </nav>

  <section id="home" class="my-5" style="margin-top: 100px;">
    <div class="row d-flex py-5">
        <div class="col-md-6 text-center">
            <img src="{{asset('echo.png')}}" alt="" class="img-fluid" style="max-height: 500px; max-width: 100%;">
        </div>
        <div class="col-md-6 my-auto justify-responsive">
            <h1 class="display-2 text-success" style="font-weight: 800">BIOKIT</h1>
            <h1 class="display-2 txt-primary" style="font-weight: 600">
               Save Our Planet, One Waste at a Time
            </h1>
        </div>
    </div>
  </section>

  <section id="about" class="mt-5" style="padding-top: 100px;">
    <div class="row d-flex align-items-start mt-5">
    <div class="col-md-6">
        <h1 class="fw-bold mb-3">Introducing <span class="text-success">Biokit</span></h1>
        <p style="font-size: 20px;">
        <strong>BioKit</strong> is a modular, low-cost IoT-based system that monitors plastic degradation in small-scale experiments using environmental sensors and real-time data tracking.
        </p>
    </div>
    <div class="col-md-6">
        <div class="ratio ratio-16x9">
        <iframe
            src="https://www.youtube.com/embed/L-fP4NFmAd4"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen>
        </iframe>
        </div>
    </div>
    </div>
  </section>

  <section id="sensors"  style="padding-top: 100px;">
    <h1 class="text-center my-5 fw-bold"><span class="text-success">Biokit</span> Sensors</h1>

    <div class="row d-flex p-5" style="background: #fff;border-radius: 20px;">
        <div class="col-md-6 my-auto">
            <img src="{{asset('component.png')}}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6">
            <div class="card border-0 mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Temperature Sensor</h5>
                    <p class="card-text">Measures ambient temperature to monitor environmental conditions affecting plastic degradation.</p>
                </div>
            </div>


                <div class="card border-0 mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Humidity Sensor</h5>
                        <p class="card-text">Monitors humidity levels to understand their impact on plastic degradation.</p>
                    </div>
                </div>


                <div class="card border-0 mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">pH Sensor</h5>
                        <p class="card-text">Monitors the acidity or alkalinity of the environment, which can influence degradation rates.</p>
                    </div>
                </div>

            {{-- Weight Sensor --}}

                <div class="card border-0 mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Weight Sensor</h5>
                        <p class="card-text">Tracks changes in the weight of plastic samples over time to assess degradation progress.</p>
                    </div>
                </div>

        </div>
    </div>

  </section>


  <section id="works" class="mt-5" style="padding-top: 100px;">
    <div style="text-align: center; margin-bottom: 30px;">
        <h3><strong>How it Works?</strong></h3>
    </div>

    <div class="d-flex justify-content-center flex-wrap gap-4">

    <!-- Step 1 -->
    <div class="text-center p-3 rounded shadow-sm" style="background-color: #f2f2f2; width: 220px;">
        <img src="{{asset('works/buang.png')}}" alt="Plastic sample" style="width: 100%; height: auto;">
        <p class="mt-2">Put plastic waste in a reactor tube also degradation chemical liquid</p>
    </div>

    {{-- Stepper icon --}}
    <div class="stepper-icon my-auto">
        <span class="material-symbols-outlined" style="font-size: 50px;">
            arrow_right
        </span>
    </div>

    <!-- Step 2 -->
    <div class="text-center p-3 rounded shadow-sm" style="background-color: #f2f2f2; width: 220px;">
        <img src="{{asset('works/decompos.png')}}" alt="Loadcell" style="width: 100%; height: auto;">
        <p class="mt-2">All of Sensors measure the weight, pH, and turbidity of the plastic waste</p>
    </div>

    <div class="stepper-icon my-auto">
            <span class="material-symbols-outlined" style="font-size: 50px;">
                arrow_right
            </span>
        </div>
    <!-- Step 3 -->
    <div class="text-center p-3 rounded shadow-sm" style="background-color: #f2f2f2; width: 220px;">
        <img src="{{asset('works/server.png')}}" alt="pH sensor" style="width: 100%; height: auto;">
        <p class="mt-2">All sensor data is sent to a central server for processing</p>
    </div>

    <div class="stepper-icon my-auto">
        <span class="material-symbols-outlined" style="font-size: 50px;">
            arrow_right
        </span>
    </div>

    <!-- Step 4 -->
    <div class="text-center p-3 rounded shadow-sm" style="background-color: #f2f2f2; width: 220px;">
        <img src="{{asset('works/app.png')}}" alt="API Monitoring" style="width: 100%; height: auto;">
        <p class="mt-2">Check the app for real-time monitoring</p>
    </div>

    </div>
  </section>

    <section id="location">
        <div class="container d-flex  justify-content-center align-items-center text-white" style="height: 100vh; flex-direction: column;">
            <div class="text-center py-5 ">

                <h1 class="txt-primary fw-bold">Location</h1>
            </div>
            <div id="map" style="height: 400px;width:100%"></div>
        </div>
    </section>


@endsection

@push('scripts')
    <script>
        var map = L.map('map').setView([-7.9327467, 112.5715631], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        L.marker([-7.9327467, 112.5715631]).addTo(map)
            .bindPopup('SAKOO Malang')
            .openPopup();
    </script>

@endpush
