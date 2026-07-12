<?php

namespace App\Filament\Admin\Resources\EducationResource\Pages;

use App\Filament\Admin\Resources\EducationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageEducation extends ManageRecords
{
    protected static string $resource = EducationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
