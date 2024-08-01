<!DOCTYPE html>
<html lang="en">

@include('layout.html.head')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('layout.header')

        @include('layout.sidebar')

        <main class="app-main">
            @yield('content')
        </main>

        @include('layout.footer')
    </div>

    @include('layout.html.script')
</body>

</html>