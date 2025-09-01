<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<style>
     body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f4f4;
    }

    .bt-primary{
        background: #185a8a;
        color: white;
    }

    .bt-outline-primary{
        background: white;
        color: #185a8a;
        border: 1px solid #185a8a;
    }

    .bt-outline-primary:hover{
        background: #185a8a;
        color: white;
    }

    .txt-primary{
        color: #185a8a;
    }

    .bt-primary:hover{
        background: #185a8a;
        color: white;
    }
    /* class for symphony font on public/font/Symphony-Regular.ttf */
    @font-face {
        font-family: 'Symphony';
        src: url('/fonts/symphony.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    .symphony {
        font-family: 'Symphony', sans-serif; /* Fallback to sans-serif */
    }
</style>
<body >

    {{-- @include('layouts.nav') --}}

    <div class="container">
        @yield('content')
    </div>

    <div class="mobile-block-message" style="display: none;">
        <h2>Access Restricted</h2>
        <p>This form is not available on mobile devices. Please use a desktop browser.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.9/dist/chart.umd.min.js"></script>
    <script src="{{ asset('owlcarousel/dist/owl.carousel.min.js') }}"></script>
    <script>
        function swal(params) {
            return Swal.fire({
                icon: params.icon,
                title: params.title,
                text: params.text,
                showConfirmButton: params.showConfirmButton,
                showCancelButton: params.showCancelButton,
                confirmButtonText: params.confirmButtonText,
                cancelButtonText: params.cancelButtonText,
            });
        }


        function printModalContent(modalId) {
            // Select the modal content
            const modalContent = document.getElementById(modalId).innerHTML;

            // Create a new window
            const printWindow = window.open('', '', 'height=600,width=800');

            // Write the modal content into the window
            printWindow.document.write('<html><head><title>Print Modal</title>');
            printWindow.document.write('<link rel="stylesheet" href="/path/to/your/css/file.css">'); // Optional: Link your CSS
            printWindow.document.write('<style>button { display: none !important; }</style>'); // Hide all buttons
            printWindow.document.write('</head><body>');
            printWindow.document.write(modalContent);
            printWindow.document.write('</body></html>');

            // Close the document to finish writing
            printWindow.document.close();

            // Wait for the content to load before printing
            printWindow.onload = function () {
                printWindow.print();
                printWindow.close();
            };
        }

        function logout(event) {
            event.preventDefault();
            const form = document.getElementById('logout-form');
            const url = form.action;
            const method = form.method;

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

    </script>
    @stack('scripts')
</body>
</html>
