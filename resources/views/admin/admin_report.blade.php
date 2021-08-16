@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('content')

    <div class="table-div">
        <table class="table">
            <thead>
            <tr class="colum d-flex justify-content-around mt-2">
                <th style="width: 12%; text-align: center;">Reported post</th>
                <th style="width: 12%; text-align: center;">User reporting</th>
                <th style="width: 12%; text-align: center;">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr class="colum d-flex justify-content-around mt-2">
                <td style="width: 12%; text-align: center;"><button id="popContact" class="btn-action">view</button></td>
                <td style="width: 12%; text-align: center;">sami</td>
                <td style="width: 12%; text-align: center;"><button class="btn-action">delete</button></td>
            </tr>
            </tbody>
        </table>

        <nav aria-label="..." class="w-100">
            <ul class="pagination pagination-sm d-flex justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
    </div>

@endsection





