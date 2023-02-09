@php
    if(!isset($wp_settings_sections[ $page ])) {
        return;
    }
    $sections = array_values((array) $wp_settings_sections[ $page ]);
    $firstSection = $sections[0]['id'];
@endphp

<div x-data="Tabs(@js($firstSection))">
    <div class="tabs-page__tabs_container">
        @foreach((array) $wp_settings_sections[ $page ] as $section)
            <p :class="{'active': tabToShow === @js($section['id'])}" class="tabs-page__tab_title" @click="showTab($el, @js($section['id']))">{{ $section['title'] ?? 'error' }}</p>
        @endforeach
    </div>
    @foreach($sections as $index => $section)
        <div class="tabs-page__tab_content" :class="{'active': tabToShow === @js($section['id'])}">
            @if( '' !== $section['before_section'])
                @if ( '' !== $section['section_class'] )
                    {{ wp_kses_post( sprintf( $section['before_section'], esc_attr( $section['section_class'] ) ) ) }}
                @else
                    {{ wp_kses_post( $section['before_section'] ) }}
                @endif
            @endif

            @if( ! isset( $wp_settings_fields ) || ! isset( $wp_settings_fields[ $page ] ) || ! isset( $wp_settings_fields[ $page ][ $section['id'] ] ) )
                @continue
            @endif

            @if( $section['callback'] )
                {{ call_user_func( $section['callback'], $section ) }}
            @endif

            <table class="form-table" role="presentation">
                @php
                    do_settings_fields( $page, $section['id']);
                @endphp
            </table>

            @if ( '' !== $section['after_section'] )
                {{ wp_kses_post( $section['after_section'] ) }}
            @endif
        </div>
    @endforeach
</div>