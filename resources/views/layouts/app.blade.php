<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- /#sidebar-wrapper -->

        <!-- Navbar -->
        <div id="page-content-wrapper">

            @include('layouts.navbar')

            <!-- end navbar -->

            <!-- Content -->

            <div class="container-fluid">
                <h1 class="mt-3 mb-4">{{ $pageHeading }}</h1>
                <div class="p-3 mb-5 bg-white">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- end content -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JasvaScript -->
    <script src="/jquery/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>

    <!-- Archived toggle script -->
    <script>
        document.getElementById("active").addEventListener("click", function () {
            var active = document.getElementById("active_div");
            var archived = document.getElementById("archived_div");
            active.style.display = "block";
            archived.style.display = "none";
        })

    </script>
    <script>
        document.getElementById("archived").addEventListener("click", function () {
            var archived = document.getElementById("archived_div");
            var active = document.getElementById("active_div");
            archived.style.display = "block";
            active.style.display = "none";
        })

    </script>

    <script>
        document.getElementById("active2").addEventListener("click", function () {
            var active = document.getElementById("active_div2");
            var archived = document.getElementById("archived_div2");
            active.style.display = "block";
            archived.style.display = "none";
        })

    </script>
    <script>
        document.getElementById("archived2").addEventListener("click", function () {
            var archived = document.getElementById("archived_div2");
            var active = document.getElementById("active_div2");
            archived.style.display = "block";
            active.style.display = "none";
        })

    </script>

</body>

</html>
