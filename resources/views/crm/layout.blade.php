<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; Web App Template</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/layout/backend/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/layout/backend/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/layout/backend/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/layout/backend/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="/layout/backend/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/layout/backend/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="/layout/backend/assets/js/config.js"></script>
    <script src="/layout/backend/vendors/simplebar/simplebar.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="/layout/backend/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="/layout/backend/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/layout/backend/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/layout/backend/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/layout/backend/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
      @yield('styles')
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        @include('crm.menu')
        <div class="content">
          @yield('content')
          
          @include('crm.footer')
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="/layout/backend/vendors/popper/popper.min.js"></script>
    <script src="/layout/backend/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/layout/backend/vendors/anchorjs/anchor.min.js"></script>
    <script src="/layout/backend/vendors/is/is.min.js"></script>
    <script src="/layout/backend/vendors/echarts/echarts.min.js"></script>
    <script src="/layout/backend/vendors/fontawesome/all.min.js"></script>
    <script src="/layout/backend/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="/layout/backend/vendors/list.js/list.min.js"></script>
    <script src="/layout/backend/assets/js/theme.js"></script>
    @yield('scripts')
  </body>

</html>