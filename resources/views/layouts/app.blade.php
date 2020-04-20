@include('inc.header')
<style>
    body {
background-image: url(/dist/img/login.jpg);
background-repeat: no-repeat;
background-size: auto;
}
</style>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include('inc.footer')
