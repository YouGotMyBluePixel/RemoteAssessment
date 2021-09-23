<!DOCTYPE html>
<head>
    <!-- ... --->
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<div id="app">
   <example-component></example-component>
</div>
</html>
<script src="{{ mix('/js/app.js') }}"></script>
