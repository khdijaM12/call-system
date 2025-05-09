<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallResource\Pages;
use App\Filament\Resources\CallResource\RelationManagers;
use App\Models\Call;
use App\Models\client;
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

class CallResource extends Resource
{
    protected static ?string $model = Call::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('client_name')
                        ->label('اسم العميل')
                        ->required(),

                    TextInput::make('client_phone')
                        ->label('رقم العميل')
                        ->required(),

                    Textarea::make('complaint_text')
                        ->label('نص الشكوى')
                        ->required(),

                    Select::make('complaint_type')
                        ->label('نوع الشكوى')
                        ->options([
                            'طلب خدمة' => 'طلب خدمة',
                            'شكوى' => 'شكوى',
                            'استفسار' => 'استفسار',
                        ])
                        ->required(),

                    Select::make('status')
                        ->label('الحالة')
                        ->options([
                            'قيد المراجعة' => 'قيد المراجعة',
                            'تم المراجعة' => 'تم المراجعة',
                        ])
                        ->default('قيد المراجعة'),

                    Select::make('assigned_to')
                        ->label('الموظف المسؤول')
                        ->options(Employee::all()->pluck('name', 'id')->map(function ($name, $id) {
                            $employee = Employee::find($id);
                            return $employee->job_description . ' - ' . $name;
                        }))
                        ->searchable()
                        ->required(),
                ]),

//             TextInput::make('client_phone')
//     ->label('رقم الهاتف')
//     ->tel()
//     ->required(),

// Textarea::make('complaint')
//     ->label('محتوى الشكوى')
//     ->required(),
            ])
            ;
    }

    // public static function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $client = Client::where('phone', $data['client_phone'])->first();

    //     if (! $client) {
    //         throw ValidationException::withMessages([
    //             'client_phone' => 'هذا العميل غير موجود. الرجاء تسجيل بيانات العميل أولاً.',
    //         ]);
    //     }

    //     return [
    //         'client_id' => $client->id,
    //         'complaint' => $data['complaint'],
    //
    //     ];
    // }

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('client_name')->label('اسم العميل'),
            TextColumn::make('client_phone')->label('رقم الهاتف'),
            TextColumn::make('complaint_type')->label('نوع الشكوى'),
            TextColumn::make('status')->label('الحالة'),
            TextColumn::make('employee.name')->label('الموظف المسؤول'),
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
