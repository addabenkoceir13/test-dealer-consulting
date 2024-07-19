<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\ProjectResource\Pages;
use App\Filament\User\Resources\ProjectResource\RelationManagers;
use App\Filament\User\Resources\ProjectResource\RelationManagers\UserRelationManager;
use App\Models\Project;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Project Mangement';

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Hidden::make('user_id')->default(auth()->id()),

                RichEditor::make('description')
                    ->hint('Translatable')
                    ->hintColor('heroicon-m-language')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()->searchable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->formatStateUsing(function ($state) {
                        return strip_tags($state);
                    }),
                TextColumn::make('user.name')
                    ->sortable()->searchable(),
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
                ])
            ])
            ;
    }

    public static function getRelations(): array
    {
        return [
            // UserRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());

        // return parent::getEloquentQuery()
        //     ->withoutGlobalScopes([
        //         SoftDeletingScope::class,
        //     ]);
    }


}
