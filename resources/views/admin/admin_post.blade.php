@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')

    <div class="table-div">
        <table class="table">
            <thead>
            <tr class="colum d-flex justify-content-around mt-2">
                <th style="width: 12%; text-align: center;">Post id</th>
                <th style="width: 12%; text-align: center;">User Post</th>
                <th style="width: 12%; text-align: center;">Show post</th>
                <th style="width: 12%; text-align: center;">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($userpost as $mp)
            <tr class="colum d-flex justify-content-around mt-2">
                <td style="width: 12%; text-align: center;">{{$mp -> id}}</td>
{{--                @foreach($userpost)--}}
                <td style="width: 12%; text-align: center;">{{$mp -> user_id}}</td>
                <td style="width: 12%; text-align: center;"><a href="{{ route('post.show', $mp->id) }}" id="popContact" class="btn-action">View</a></td>
                <td style="width: 12%; text-align: center;">
                    <form action="{{ route('post.destroy', $mp->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn-action">delete</button>
                    </form>
                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <div class="w-100 d-flex justify-content-center">
            {{$userpost->links()}}
        </div>
{{--        <nav aria-label="..." class="w-100">--}}
{{--            <ul class="pagination pagination-sm d-flex justify-content-center">--}}
{{--                <li class="page-item disabled">--}}
{{--                    <a class="page-link" href="#" tabindex="-1">1</a>--}}
{{--                </li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
    </div>

@endsection
