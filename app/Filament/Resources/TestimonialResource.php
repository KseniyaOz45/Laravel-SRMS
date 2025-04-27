<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('client_id')->options(
                    User::where('role', 'client')->pluck('name', 'id')
                )
                    ->required()
                    ->label('Client')
                    ->searchable()
                    ->native(false),

                Select::make('service_id')->options(
                    [Service::all()->pluck('name', 'id')]
                )
                    ->required()
                    ->label('Service')
                    ->searchable()
                    ->native(false),

                Textarea::make('text')->required()->label('Text'),

                Select::make('rating')->options([
                    1 => "1",
                    2 => "2",
                    3 => "3",
                    4 => "4",
                    5 => "5"
                ])->required()->label('Rating')->native(false),

                Select::make('published')->options([
                    true => "Published",
                    false => "On inspection"
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('client.name')->label('Client')->searchable()->sortable(),
                TextColumn::make('service.name')->label('Service')->searchable()->sortable(),
                TextColumn::make('rating')->label('Rating')->sortable(),
                TextColumn::make('published')->label('Status')->sortable(),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
