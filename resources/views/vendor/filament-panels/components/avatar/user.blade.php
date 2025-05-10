
@php
    $user = filament()->auth()->user();
@endphp

@if ($user instanceof \Illuminate\Contracts\Auth\Authenticatable)
    <x-filament::avatar
        :src="filament()->getUserAvatarUrl($user)"
        :alt="__('filament-panels::layout.avatar.alt', ['name' => filament()->getUserName($user)])"
        :attributes="
            \Filament\Support\prepare_inherited_attributes($attributes)
                ->class(['fi-user-avatar'])
        "
    />
@endif
