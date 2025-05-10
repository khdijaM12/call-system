<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallResource\Pages;
use App\Filament\Resources\CallResource\RelationManagers;
use App\Models\Call;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use App\Models\Employee;
use App\Models\ComplaintTypes;
use App\Models\Statuses;

class CallResource extends Resource
{
    protected static ?string $model = Call::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Card::make([
                Select::make('client_id')
                    ->label('العميل')
                    ->relationship('client', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('اسم العميل')
                            ->required(),
                        TextInput::make('phone')
                            ->label('رقم الهاتف')
                    ]),

                Textarea::make('complaint_text')
                    ->label('نص الشكوى')
                    ->required(),

                Select::make('complaint_type_id')
                        ->label('نوع الشكوى')
                        ->options(ComplaintTypes::all()->pluck('name', 'id'))  
                        ->required(),

                 Select::make('status_id')
                        ->label('الحالة')
                        ->options(Statuses::all()->pluck('name', 'id'))  
                        ->default(Statuses::where('name', 'قيد المراجعة')->first()->id) 
                        ->required(),

                Select::make('assigned_to')
                    ->label('الموظف المسؤول')
                    ->options(Employee::all()->pluck('name', 'id')->map(function ($name, $id) {
                        $employee = Employee::find($id);
                        return $employee->job_description . ' - ' . $name;
                    }))
                    ->searchable()
                    ->required(),
            ]),
        ]);
}


public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('client.name')->label('اسم العميل'),
            TextColumn::make('client.phone')->label('رقم الهاتف'),
            TextColumn::make('complaintType.name')->label('نوع الشكوى'),
            TextColumn::make('complaint_text')->label('نص الشكوى'),
            TextColumn::make('status.name')->label('الحالة'),
            TextColumn::make('assignedEmployee.name')->label('الموظف المسؤول')->searchable(),
                       ])
        ->actions([
            Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCalls::route('/'),
            'create' => Pages\CreateCall::route('/create'),
            'edit' => Pages\EditCall::route('/{record}/edit'),
        ];
    }
}
