<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>App Overseas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

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
        {{dd($apps)}}
        <h1>Download Applications</h1>
      <div class="grid-container">
        <div class="grid-item">
          <i class="fas fa-signature"></i><span>App One</span>
        </div>
        <div class="grid-item">
          <i class="fas fa-truck"></i><span>App Two</span>
        </div>
        <div class="grid-item">
          <i class="fas fa-tools"></i><span>App Three</span>
        </div>
        <div class="grid-item">
          <i class="fas fa-shipping-fast"></i><span>App Four</span>
        </div>
        <div class="grid-item">
          <i class="fas fa-credit-card"></i><span>App Five</span>
        </div>
        <div class="grid-item">
          <i class="fas fa-briefcase"></i><span>App Six</span>
        </div>
        <div class="grid-item">
          <i class="fas fa-laptop-medical"></i><span>App Seven</span>
        </div>
        <div class="grid-item">
          <i class="fas fa-laptop"></i><span>App Eight</span>
        </div>
        <div class="grid-item">
          <i class="fas fa-suitcase"></i><span>App Nine</span>
        </div>
        <div class="grid-item">
          <i class="fas fa-gears"></i><span>App Ten</span>
        </div>
      </div>
      <div class="expanded-view" id="expandedView">
        <div class="expanded-content">
          <h2 id="expandedTitle"></h2>
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
