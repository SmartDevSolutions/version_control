<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>App Overseas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
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
        @php use Illuminate\Support\Str; @endphp

        <div class="grid-container">
            @foreach ($apps as $app)
                @php
                    $isUploadedIcon = Str::startsWith($app['icon'], '01'); // tipični hash
                    $iconPath = $isUploadedIcon
                        ? asset('storage/' . $app['icon'])
                        : asset('images/icons/' . $app['icon']);
                @endphp

                <div class="grid-item"
                    data-name="{{ $app['name'] }}"
                    data-link="{{ asset('storage/' . $app['link']) }}"
                    data-icon="{{ $iconPath }}"
                    @if (!empty($app['pdf_installation_instructions']))
                        data-install="{{ asset('storage/' . $app['pdf_installation_instructions']) }}"
                    @endif
                    @if (!empty($app['pdf_user_manual']))
                        data-usage="{{ asset('storage/' . $app['pdf_user_manual']) }}"
                    @endif
                >
                    <img src="{{ $iconPath }}" alt="{{ $app['name'] }} Icon" class="app-icon">
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
