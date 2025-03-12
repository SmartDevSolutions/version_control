<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>App Overseas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}"/>

    <!--
Icons provided by Font Awesome (https://fontawesome.com/)
Licensed under the Font Awesome Free License (https://fontawesome.com/license/free)
-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  </head>
  <body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/KROATIEN_Logo_Color.png') }}" alt="MyApp Logo">
        </div>
      <nav>
        <div class="menu-toggle"><i class="fas fa-bars"></i></div>
        <ul class="nav-menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">Upute</a></li>
          <li><a href="#">Aplikacije</a></li>
        </ul>
      </nav>
    </header>
    <main>
        <h1>Download Applications</h1>
      <div class="grid-container">
        @foreach ($apps as $app)
          <div class="grid-item" data-name="{{ $app['name'] }}" data-link="{{ $app['link'] }}" data-icon="{{ asset('storage/' . $app['icon']) }}">
            <img src="{{ asset('storage/' . $app['icon']) }}" alt="{{ $app['name'] }} Icon" class="app-icon">
            <span>{{ $app['name'] }}</span>
          </div>
        @endforeach
      </div>
      <div class="expanded-view" id="expandedView">
        <div class="expanded-content">
          <h2 id="expandedTitle"></h2>
          <img id="expandedIcon" src="" alt="App Icon" class="app-icon">
          <button class="option-btn" id="installGuide">
            Upute za instalaciju
          </button>
          <button class="option-btn" id="usageGuide">
            Upute za korištenje
          </button>
          <button class="option-btn" id="downloadApp">
            Download aplikacije
          </button>
          <button class="close-btn">Close</button>
        </div>
      </div>
    </main>

    <script src="{{ asset('js/scriptFront.js') }}"></script>
  </body>
</html>
