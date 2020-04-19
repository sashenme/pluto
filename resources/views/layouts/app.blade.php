@include('inc.header')
<style>
    .div-center {
  width: 400px;
  height: 400px;
  background-color: #fff;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  max-width: 100%;
  max-height: 100%;
  overflow: auto;
  padding: 1em 2em;
  border-bottom: 2px solid #ccc;
  display: table;
}

</style>
<body>
    <div id="app">
       

        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include('inc.footer')