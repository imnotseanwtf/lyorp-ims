@extends('layouts.app')

@section('content')
    <style>
        .btn-link {
            all: unset;
            background: none;
            border: none;
            padding: 0;
            color: red;
            /* Adjust color to fit your design */
            text-decoration: underline;
            /* Underline like a link */
            cursor: pointer;
            /* Pointer cursor */
            transition: color 0.2s, background-color 0.2s;
            /* Smooth transition for color and background */
        }

        /* Hover effect */
        .btn-link:hover {
            color: red;
            /* Darker color on hover */
            text-decoration: none;
            /* Remove underline on hover */
            background-color: rgba(0, 0, 0, 0.1);
            /* Light background color on hover */
        }

        /* Active (click) effect */
        .btn-link:active {
            color: red;
            /* Keep text color when clicked */
            background-color: rgba(0, 0, 0, 0.2);
            /* Darker background when clicked */
            transform: scale(0.98);
            /* Slight shrink effect when clicked (optional) */
        }
    </style>

    <nav aria-label="breadcrumb" style="margin-top: 3rem !important;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Folder</li>
        </ol>
    </nav>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Folder') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title mb-30 text-end">
                    @admin
                        <button class="main-btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                            Create Folder
                        </button>
                    @endadmin
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($folders as $folder)
            <div class="col-2">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-folder" style="font-size: 150px"></i>
                    </div>
                    <div class="card-footer text-center">
                        @admin
                            <a href="{{ route('admin-report.index', $folder->id) }}" class="">{{ $folder->name }}
                                {{ $folder->year }}</a>
                        @endadmin
                        @organization
                            <a href="{{ route('user-report.index', $folder->id) }}" class="">{{ $folder->name }}
                                {{ $folder->year }}</a>
                        @endorganization
                        @admin
                            <span>
                                <div class="dropdown m-2 text-danger">
                                    <!-- Remove the 'btn' class and use the ellipsis icon directly -->
                                    <a class="dropdown-toggle custom-dropdown-toggle text-danger" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <form action="{{ route('folder.destroy', $folder->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-link mx-5">
                                                    Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </span>
                        @endadmin
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    {{-- CREATE FOLDER --}}
    @include('folder.modals.create')

@endsection
