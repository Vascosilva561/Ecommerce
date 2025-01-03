<!DOCTYPE html>
<html lang="en">

<head>
    @component('components.head')
    @endcomponent
</head>

<body>
    <div class="super_container">
        @component('components.header')
        @endcomponent

        @yield('content')
    </div>


    @component('components.script')
    @endcomponent
    @yield('script')
</body>

</html>
