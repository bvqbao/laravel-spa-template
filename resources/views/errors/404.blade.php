@extends('errors.template')

@section('error')
    <div class="prose flex flex-col items-center">
        <h1>404</h1>
        <p>Page not found</p>
        <p>
            Please go to
            <a class="hover:underline hover:text-blue-500" href="/">home page</a>
        </p>
    </div>
@endsection
