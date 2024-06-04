<?php

namespace App\Filament\Resources\DesignCategoryResource\Pages;

use App\Filament\Resources\DesignCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDesignCategories extends ListRecords
{
    protected static string $resource = DesignCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
