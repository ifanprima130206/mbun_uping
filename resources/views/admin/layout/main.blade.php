<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.layout._meta')

    @include('admin.layout._css')

</head>

<body class="nav-fixed">

    @include('admin.layout.component._header')

    <div id="layoutSidenav">

        @include('admin.layout.component._sidebar')

        <div id="layoutSidenav_content">
            <main>

                @yield('content')

                
            </main>
            
            @include('admin.layout.component._footer')
            
        </div>
    </div>

    @yield('modal')
    
    @include('admin.layout._js')

    @stack('custom')

</body>

</html>
