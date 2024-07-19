<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\TaskResource\Pages;
use App\Filament\User\Resources\TaskResource\RelationManagers;
use App\Models\Project;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Task Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('project_id')
                    ->label('Project')
                    ->options(Project::where('user_id', auth()->id())->pluck('name', 'id')),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in-progress' => 'In Progress',
                        'completed' => 'Completed',
                    ]),
                RichEditor::make('description')
                    ->hint('Translatable')
                    ->hintColor('heroicon-m-language')
                    ->columnSpanFull()
                    ->required(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()->searchable(),
                TextColumn::make('project.name')
                    ->sortable()->searchable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->formatStateUsing(function ($state) {
                        return strip_tags($state);
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'in-progress' => 'warning',
                        'completed' => 'success',
                        // 'rejected' => 'danger',
                    }),
                SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in-progress' => 'In Progress',
                        'completed' => 'Completed',
                    ]),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas('project', function (Builder $query) {
            $query->where('user_id', auth()->id());
        });
        // return parent::getEloquentQuery()
        //     ->withoutGlobalScopes([
        //         SoftDeletingScope::class,
        //     ]);
    }
}
