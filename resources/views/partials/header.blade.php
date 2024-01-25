{{-- === Theme Menu (Choice) === --}}
<menu-component>
    {{-- Black Menu --}}
    <template #black-menu-background>
        <x-curator-glider
            :media="$general['black_menu_bg']"
            class="h-full w-full object-cover object-left transition-transform duration-500 ease-in"
        />
    </template>
    <template #black-coffee>
        <x-curator-glider
            :media="$general['black_menu_coffee']"
            class="z-[5] mx-auto h-auto w-full"
        />
    </template>

    {{-- Cappuccino Menu --}}
    <template #cappuccino-menu-background>
        <x-curator-glider
            :media="$general['cappuccino_menu_bg']"
            class="h-full w-full object-cover object-left transition-transform duration-500 ease-in"
        />
    </template>
    <template #cappuccino-coffee>
        <x-curator-glider
            :media="$general['cappuccino_menu_coffee']"
            class="z-[5] mx-auto h-auto w-full"
        />
    </template>
</menu-component>

{{-- === Partials === --}}
<social-media-component :data="{{ json_encode($general) }}"></social-media-component>
<navbar-component></navbar-component>
