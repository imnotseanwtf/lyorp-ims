@extends('layouts.app')

@section('content')

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
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    {{-- CREATE FOLDER --}}
    @include('folder.modals.create')

@endsection
