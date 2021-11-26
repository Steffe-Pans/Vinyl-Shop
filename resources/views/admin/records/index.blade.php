@extends('layouts.template')

@section('main')
<h1>Records</h1>

{{--<ul>--}}
{{--    <li>Record 1</li>--}}
{{--    <li>Record 2</li>--}}
{{--    <li>Record 3</li>--}}
{{--</ul>--}}

<ul>
    @foreach ($records as $record)
        <li>{{$record}}</li>
    @endforeach
</ul>
@endsection
