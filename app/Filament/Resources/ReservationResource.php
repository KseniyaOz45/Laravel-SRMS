<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('batch_number')
                    ->required()
                    ->label('Batch Number'),

                Select::make('client_id')->options(
                    User::where("role", "client")->pluck("name", "id"))
                    ->searchable()
                    ->native(false)
                    ->required()
                    ->label('Client'),

                Select::make('service_id')->options(
                    Service::all()->pluck("name", "id"))
                    ->searchable()
                    ->native(false)
                    ->required()
                    ->label('Service'),

                Select::make('personal_id')->options(
                    User::where('role', "personal")->pluck("name", "id"))
                    ->searchable()
                    ->native(false)
                    ->label('Personal')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('batch_number')->searchable()->label('Batch Number'),
                TextColumn::make('client.name')->searchable()->sortable()->label('Client'),
                TextColumn::make('service.name')->searchable()->sortable()->label('Service'),
                TextColumn::make('personal.name')->searchable()->sortable()->label('Personal')
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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
