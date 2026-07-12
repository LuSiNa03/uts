<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EducationResource\Pages;
use App\Models\Education;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Portfolio';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('level')->label('Nama Institusi')->required(),
            Forms\Components\TextInput::make('field')->label('Jurusan / Bidang'),
            Forms\Components\TextInput::make('period')->placeholder('2023 – Present'),
            Forms\Components\TextInput::make('gpa')->label('IPK / GPA')->placeholder('3.85 / 4.00'),
            Forms\Components\TextInput::make('icon')->label('Ikon (Emoji)')->placeholder('🎓'),
            Forms\Components\Toggle::make('current')->label('Sedang Berjalan?')->default(false),
            Forms\Components\TextInput::make('order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level')->label('Institusi')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('field')->label('Bidang')->searchable(),
                Tables\Columns\TextColumn::make('period'),
                Tables\Columns\IconColumn::make('current')->boolean(),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEducation::route('/'),
        ];
    }
}
