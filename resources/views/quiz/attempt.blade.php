<!DOCTYPE html>
<html class="no-js" lang="en">

@include('layout.header')

<body>

    <main class="main-wrapper" id="app">

        <quiz-component :questions="{{json_encode($questions)}}" :language="{{json_encode($language)}}"></quiz-component>

    </main>

    <!-- Vendors JS -->
    @include('layout.script')

</body>

</html>
