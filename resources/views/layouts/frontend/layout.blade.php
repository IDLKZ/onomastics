<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ономастика</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <!-- Include All CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset("css/frontend.css")}}" rel="stylesheet">
    <link href="{{asset("css/media.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- End Include All CSS -->
    @stack("styles")

    <!-- Favicon Icon -->
    <link rel="icon"  type="image/png" href="images/favicon.png">
    <!-- Favicon Icon -->
</head>
<body>
@include("layouts.frontend.header")

{{--Content--}}
<section class="overflow-hidden">
@yield("content")
</section>
<button onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="fas fa-arrow-up"></i>
</button>
{{--End Content--}}
@include("layouts.frontend.footer")
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/frontend.js') }}"></script>
<script>
    //Get the button:
    mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
@stack("scripts")
</body>
</html>
