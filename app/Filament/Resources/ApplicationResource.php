<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()->schema([
                Forms\Components\TextInput::make('name')
                    ->label('App Name')
                    ->required(),
            ]),

            Forms\Components\Section::make('Icon')->schema([
                Forms\Components\Select::make('icon')
                    ->label('Choose Existing Icon')
                    ->options([
                        'app_registration.png' => 'App Registration',
                        'assignment_add.png' => 'Assignment Add',
                        'delivery_truck.png' => 'Delivery Truck',
                        'local_shipping.png' => 'Local Shipping',
                        'mobile_screen.png' => 'Mobile Screen',
                        'qr_code_scanner.png' => 'QR Code Scanner',
                        'screen_share.png' => 'Screen Share',
                        'warehouse.png' => 'Warehouse',
                        'widgets.png' => 'Widgets',
                    ])
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('icon_upload', null))
                    ->helperText('Select an existing icon or upload a custom one below.')
                    ->suffix(function ($state) {
                        if (!$state || !in_array($state, [
                            'app_registration.png',
                            'assignment_add.png',
                            'delivery_truck.png',
                            'local_shipping.png',
                            'mobile_screen.png',
                            'qr_code_scanner.png',
                            'screen_share.png',
                            'warehouse.png',
                            'widgets.png',
                        ])) {
                            return null;
                        }

                        $url = asset('images/icons/' . $state);
                        return new HtmlString('<img src="' . $url . '" alt="Icon Preview" style="height: 40px; margin-left: 10px;" />');
                    }),

                Forms\Components\FileUpload::make('icon_upload')
                    ->label('Or Upload Custom Icon')
                    ->directory('images/icons')
                    ->image()
                    ->imagePreviewHeight('100')
                    ->openable()
                    ->downloadable()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('icon', null))
                    ->helperText('Uploading here will override the selection above.'),
            ]),

            Forms\Components\Section::make()->schema([
                Forms\Components\FileUpload::make('link')
                    ->label('App Upload (.apk)')
                    ->required()
                    ->preserveFilenames()
                    ->openable()
                    ->helperText('Upload the .apk file for this app.'),
            ]),

            Forms\Components\Section::make()->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\FileUpload::make('pdf_installation_instructions')
                        ->label('PDF Installation Instructions')
                        ->preserveFilenames()
                        ->openable(),

                    Forms\Components\FileUpload::make('pdf_user_manual')
                        ->label('PDF User Manual')
                        ->preserveFilenames()
                        ->openable(),
                ])
            ]),

            Forms\Components\Section::make()->schema([
                Forms\Components\Toggle::make('is_visible')
                    ->label('Is Visible')
                    ->required(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\IconColumn::make('is_visible')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplications::route('/'),
            'create' => Pages\CreateApplication::route('/create'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}
