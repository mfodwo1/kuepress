<?php

namespace App\Filament\Resources\DesignCategoryResource\Pages;

use App\Filament\Resources\DesignCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDesignCategory extends EditRecord
{
    protected static string $resource = DesignCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
