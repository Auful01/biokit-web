@extends('layout.app')

@section('content')

    <h3 class="my-4 fw-bold">Biokit Dashboard</h3>

    {{-- Popup notify will be hidden after 3s --}}
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="row d-flex">
        <div class="col">
            {{-- Sensor Suhu --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Temperature</h5>
                    <h3 id="temperature">-°C</h3>
                </div>
            </div>
        </div>
        <div class="col">
            {{-- Sensor Suhu --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">PH</h5>
                    <h3 id="ph"></h3>
                </div>
            </div>
        </div>

    </div>

    <div class="row d-flex my-3">
        {{-- Weight --}}
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Weight</h5>
                    <h3 id="weight">-kg</h3>
                </div>
            </div>
        </div>
        {{-- Kejernihan --}}
        <div class="col">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Clearness</h5>
                    <h3 id="clearness">0</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Sample Chart.js for weight Loss for a week --}}
    <div class="mb-3">
        <h5 class="fw-bold">Weight Over a Week</h5>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <canvas id="weightLossChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    {{-- Chart.js for humidity --}}
    <div class="mb-3">
        <h5 class="fw-bold">PH Over a Week</h5>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <canvas id="phChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <div class="text-center">
        <form action="{{ route('mobile.degradation') }}" method="POST">
            @csrf
            <button class="btn btn-primary">
                New Degradation
            </button>
        </form>
    </div>

@endsection


@push('scripts')
     <script>

        var datas = [];

        $.ajax({
            url: '/api/dashboard',
            method: 'GET',
            success: function(response) {
                console.log(response);

                if (response.data && response.data.length > 0) {
                    const latestFeed = response.data[response.data.length - 1];
                    $('#temperature').text(latestFeed.suhu + '°C');
                    $('#weight').text(latestFeed.berat + 'g');
                    $('#clearness').text(latestFeed.ntu + '%');
                    $('#ph').text(latestFeed.ph);

                    datas.push(response.data);
                    chartWeightLoss(response.data);
                    chartPH(response.data);

                } else {
                    console.error('No feeds available');
                }
            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        })


        function chartWeightLoss(datas){
            console.log(datas.map(item => item.created_at));

            const ctx = document.getElementById('weightLossChart').getContext('2d');
            const weightLossChart = new Chart(ctx, {
                type: 'line',
                data: {
                    // labels: datas.map(item => item.created_at),
                    // jadikan hari atau format DD/MM/YYYY
                    labels: datas.map(item => {
                        const date = new Date(item.created_at);
                        return `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()}`;
                    }),
                    datasets: [{
                        label: 'Weight',
                        data: datas.map(item => item.berat),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }


        function chartPH(datas){
            const ctx2 = document.getElementById('phChart').getContext('2d');
            const phChart = new Chart(ctx2, {
                type: 'line',
                data: {
                     labels: datas.map(item => {
                        const date = new Date(item.created_at);
                        return `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()}`;
                    }),
                    datasets: [{
                        label: 'PH',
                        data: datas.map(item => item.ph),
                        borderColor: 'rgba(153, 102, 255, 1)',
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
@endpush
