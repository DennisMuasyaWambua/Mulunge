<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulunge Trade Agencies</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

    <!-- axios for ajax calls -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- fullpage css-->
    <link rel="stylesheet" href="{{asset('css/fullpage.css')}}">
    <!-- full page js -->
    <script src="{{asset('js/fullpage.js')}}"></script>

</head>
<body>
    <div class="container">
       <div id="wrapper">
           <div class="section"></div>
           <div class="section"></div>
           <div class="section"></div>
           
       </div>
    </div>
    <div id="splash-screen">
        
            <img src="{{asset('img/mulunge_white.png')}}" alt="{{asset('img/mulunge_white.png')}}">
     
    </div>
    <!-- splash screen java script -->
    <script>
        setTimeout(() => {
            document.getElementById('splash-screen').style.display="none";
        }, 5000);
    </script>
</body>
</html>