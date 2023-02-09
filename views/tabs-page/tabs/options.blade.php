<div class="wrap">
    <h1>{{ $__page->getTitle() }}</h1>
    @php
        if ('options-general.php' !== $__page->getParent()) {
            settings_errors($__page->getSlug());
        }
    @endphp
    <form action="options.php" method="post">
        @php
            settings_fields($__page->getSlug());
        @endphp
        @include('tabs-page.sections', ['page' => $__page->getSlug()])
        @php
            submit_button();
        @endphp
    </form>
</div>