<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DesignResource\Pages;
use App\Filament\Resources\DesignResource\RelationManagers;
use App\Models\Design;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DesignResource extends Resource
{
    protected static ?string $model = Design::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('created_by')
                    ->options(User::where('role', 'designer')->pluck('name', 'id'))
                    ->searchable(['title'])
                    ->preload()
                    ->required()
                    ->columnSpan(1),
                TextInput::make('title')
                    ->required()
                    ->maxLength(100)
                    ->columnSpan(1),
                Select::make('category')
                    ->relationship(name: 'categories', titleAttribute: 'name')
                    ->searchable(['title'])
                    ->preload()
                    ->required()
                    ->columnSpan(1),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->columnSpan(1),
                Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->columnSpan(1),
                FileUpload::make('thumbnail')
                    ->image()
                    ->directory('products')
                    ->disk('public')
                    ->imageEditor()
                    ->columnSpan(1)
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Created By')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                ImageColumn::make('thumbnail')
                    ->searchable(),
                TextColumn::make('price')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('categories.name')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDesigns::route('/'),
            'create' => Pages\CreateDesign::route('/create'),
            'edit' => Pages\EditDesign::route('/{record}/edit'),
        ];
    }
}
