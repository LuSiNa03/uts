<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $navigationGroup = 'Portfolio';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Info Dasar')->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) =>
                        $set('slug', \Illuminate\Support\Str::slug($state))),
                Forms\Components\TextInput::make('slug')->required(),
                Forms\Components\Textarea::make('short_description')
                    ->required()->columnSpanFull(),
                Forms\Components\FileUpload::make('thumbnail')
                    ->image()->directory('projects/thumbnails')->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->options([
                        'planning'    => 'Planning',
                        'on_progress' => 'On Progress',
                        'completed'   => 'Completed',
                    ])->required(),
                Forms\Components\TextInput::make('github_url')->url(),
                Forms\Components\TextInput::make('demo_url')->url(),
                Forms\Components\Toggle::make('is_final_project')
                    ->label('Ini adalah Project Akhir (Laporan)?')
                    ->live(),
            ])->columns(2),

            Forms\Components\Section::make('Detail Laporan Akhir')
                ->description('Isi bagian ini hanya jika project ini adalah Laporan Project Akhir')
                ->schema([
                    Forms\Components\RichEditor::make('problem_analysis')
                        ->label('Analisis Masalah & Kebutuhan Sistem')
                        ->columnSpanFull(),
                    Forms\Components\RichEditor::make('system_requirements')
                        ->label('Kebutuhan Sistem & Fitur Utama')
                        ->columnSpanFull(),
                    Forms\Components\RichEditor::make('tech_stack_explanation')
                        ->label('Arsitektur & Tech Stack')
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('erd_image')
                        ->label('Upload ERD Diagram')
                        ->image()->directory('projects/diagrams'),
                    Forms\Components\FileUpload::make('flowchart_image')
                        ->label('Upload Flowchart')
                        ->image()->directory('projects/diagrams'),
                ])->visible(fn (Forms\Get $get) => $get('is_final_project')),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning'  => 'planning',
                        'primary'  => 'on_progress',
                        'success'  => 'completed',
                    ]),
                Tables\Columns\IconColumn::make('is_final_project')
                    ->label('Laporan Akhir')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit'   => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}