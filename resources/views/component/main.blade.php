<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('template') }}/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    {{-- awal style --}}
    @include('asset.style')
    {{-- akhir style --}}
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- awal sidebar -->
            @include('component.sidebar')
            <!-- akhir sidebar Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- awal Navbar -->
                @include('component.navbar')
                <!-- akhir  Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- awal Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            @yield('conten')
                        </div>
                    </div>
                    <!-- / akhir Content -->

                    <!-- Footer -->
                    @include('component.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    {{-- awal java script --}}
    @include('asset.javascript')
    {{-- akhir java script --}}
</body>

</html>
