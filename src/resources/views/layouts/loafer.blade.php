@yield('user_index')


@foreach($items as $item)
{{ $item -> getData() }} <br>
@endforeach