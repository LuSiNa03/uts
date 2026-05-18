<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Portfolio';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Info Pribadi')->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('tagline'),
                Forms\Components\Textarea::make('bio')->columnSpanFull(),
                Forms\Components\FileUpload::make('avatar')
                    ->image()->directory('profile')->columnSpanFull(),
            ])->columns(2),

            Forms\Components\Section::make('Kontak & Sosial')->schema([
                Forms\Components\TextInput::make('email')->email(),
                Forms\Components\TextInput::make('github')->url(),
                Forms\Components\TextInput::make('linkedin')->url(),
            ])->columns(3),

            Forms\Components\Section::make('Skills')->schema([
                Forms\Components\TagsInput::make('skills')
                    ->placeholder('Tambah skill, tekan Enter')
                    ->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')->circular(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('tagline'),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProfiles::route('/'),
        ];
    }
}