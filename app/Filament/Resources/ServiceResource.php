<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use App\Models\ServiceType;
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

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')->unique(),

                Textarea::make('description')->required(),

                Select::make('service_type_id')->options(ServiceType::all()->pluck('name', 'id'))
                    ->label('Type')
                    ->native(false)
                    ->required(),

                Textinput::make('duration')->numeric()->minValue(5)->required(),
                TextInput::make('price')->numeric('decimal')->required(),

                FileUpload::make('image')
                    ->disk('public')
                    ->directory('service_images')
                    ->required(),

                Select::make('need_personal')->options([
                    true => "Need Personal",
                    false => "Not Personal",
                ])
                    ->label('Need Personal')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')->searchable()->sortable()->label('Name'),
                TextColumn::make('service_type.name')->searchable()->sortable()->label('Type'),
                TextColumn::make('duration')->sortable()->label('Duration'),
                TextColumn::make('price')->sortable()->label('Price'),
                TextColumn::make('need_personal')->sortable()->label('Need Personal'),
                ImageColumn::make('image')->label('Image'),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
