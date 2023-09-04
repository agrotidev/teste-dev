<!DOCTYPE html>
<html :class="{ 'theme-dark': false }" x-data="data()" lang="en">
<head>

  @include('layouts.includes.partials.meta-tags')

  <title> @yield('title') </title>

  @include('layouts.includes.partials.styles')


</head>
<body>

    @yield('content')


    @yield('scripts')
  </body>
</html>
