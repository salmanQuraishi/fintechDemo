﻿<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Not Found - BankCo</title>
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/output.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/style.css">
  </head>
  <body>
    <section class="dark:bg-notfound-dark bg-no-repeat bg-cover bg-notfound-light">
      <div class="flex items-center justify-center min-h-screen">
        <div class="max-w-2xl mx-auto">
          <img src="{{ asset('/') }}assets/images/illustration/404.svg" alt="">
          <div class="flex justify-center mt-10">
            <a href="{{route('dashboard')}}" class="bg-success-300 text-sm font-bold text-white rounded-lg px-10 py-3">Go Back</a>
          </div>
        </div>
      </div>
    </section>
    <!--scripts -->
    <script src="{{ asset('/') }}assets/js/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('/') }}assets/js/main.js"></script>
  </body>
</html>
