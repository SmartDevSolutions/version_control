<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->favicon(asset('images/favicon-32x32.png'))
            ->brandLogo(asset('images/logo_text.svg'))

            // Početna stranica ide direktno na users
            ->homeUrl(fn () => route('filament.admin.resources.users.index'))

            // Otkrij sve resurse
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')

            // Ako ne koristiš widgets, ostavi prazno
            ->widgets([])

            // Ukloni grupiranje tako da NE koristiš navigationGroups uopće,
            // ili navedi samo string grupe ako želiš barem jednu
            // ->navigationGroups([]) će biti dovoljno sigurno
            ->navigationGroups([])

            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
