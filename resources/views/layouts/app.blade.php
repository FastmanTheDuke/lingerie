<!doctype html>
<html @php(language_attributes())>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php(do_action('get_header'))
  @php(wp_head())

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body @php(body_class())>
  @php(wp_body_open())
  <div id="custom-cursor">
    <div class="round"><span class="text"></span></div><span></span>
  </div>
  <div id="app">

    @include('sections.header')

    <main id="main" class="main">
      @yield('content')
    </main>

    @include('sections.footer')
  </div>

  @php(do_action('get_footer'))
  @php(wp_footer())
  @include('partials.popup-auth')
</body>

</html>