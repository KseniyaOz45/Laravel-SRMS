<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('personal_id')->options(
                    User::where('role', 'personal')->pluck('name', 'id'))
                    ->searchable()
                    ->native(false)
                    ->required()
                    ->label('Personal'),

                Select::make('day_of_week')->options([
                    0 => "Monday",
                    1 => "Tuesday",
                    2 => "Wednesday",
                    3 => "Thursday",
                    4 => "Friday",
                    5 => "Saturday"
                ])
                    ->searchable()
                    ->native(false)
                    ->required()
                    ->label('Day of Week'),

                TimePicker::make('start_time')->required()->label('Start Time'),
                TimePicker::make('end_time')->required()->label('End Time'),
                TimePicker::make('lunch_start_time')->required()->label('Lunch Start Time'),
                TimePicker::make('lunch_end_time')->required()->label('Lunch End Time'),

                Select::make('is_day_off')->options([
                    true => "Day off",
                    false => "Working day"
                ])
                    ->label('Is day off')
                    ->native(false)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('personal.name')->label('Personal Name')->searchable()->sortable(),
                TextColumn::make('day_of_week')->label('Day of Week')->sortable(),
                TextColumn::make('start_time')->label('Start Time')->sortable(),
                TextColumn::make('end_time')->label('End Time')->sortable(),
                TextColumn::make('lunch_start_time')->label('Lunch Start Time')->sortable(),
                TextColumn::make('lunch_end_time')->label('Lunch End Time')->sortable(),
                TextColumn::make('is_day_off')->label('Is day off')->sortable(),
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
