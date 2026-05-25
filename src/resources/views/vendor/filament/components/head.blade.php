{{--
  Override Filament head to ensure a Tailwind CDN fallback is available
  when Vite/compiled assets are not present (useful in local Docker dev).
--}}
@once
    {{-- Tailwind CDN fallback if Vite build/manifest not present or in local env --}}
    @if (app()->environment('local') || ! file_exists(public_path('build/manifest.json')))
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = tailwind.config || {};
            tailwind.config.theme = tailwind.config.theme || {};
        </script>
        <style>
            /* Small fixes to avoid huge unstyled SVGs/icons in Filament */
            .filament-main svg, .filament-main img { max-width:100%; height:auto; }
            .filament-main { font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
        </style>
    @endif
@endonce
