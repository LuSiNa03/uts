<?php

namespace App\Filament\Admin\Resources\ExperienceResource\Pages;

use App\Filament\Admin\Resources\ExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageExperiences extends ManageRecords
{
    protected static string $resource = ExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
