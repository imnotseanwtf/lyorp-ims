@extends('layouts.app')

@section('content')
    <style>
        .card-style-3 {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Dashboard') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            @admin
                                <a href="{{ route('users.index') }}" style="text-decoration: none; color: inherit;">
                                    <div class="card-body">
                                        <h6>Approved Organization</h6>
                                        <h5>{{ $approvedOrganization }}</h5>
                                    </div>
                                </a>
                            @endadmin
                            @organization
                                <a href="{{ route('folder.index') }}" style="text-decoration: none; color: inherit;">
                                    <div class="card-body">
                                        <h6>Number Of Report Sent</h6>
                                        <h5>{{ $reportSent }}</h5>
                                    </div>
                                </a>
                            @endorganization
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            @admin
                                <a href="{{ route('users.index') }}" style="text-decoration: none; color: inherit;">
                                    <div class="card-body">
                                        <h6>Pending Organization</h6>
                                        <h5>{{ $pendingOrganization }}</h5>
                                    </div>
                                </a>
                            @endadmin
                            @organization
                                <a href="{{ route('evaluation.index') }}" style="text-decoration: none; color: inherit;">
                                    <div class="card-body">
                                        <h6>Pending Evaluation To Fill Up</h6>
                                        <h5>{{ $evaluationPending }}</h5>
                                    </div>
                                </a>
                            @endorganization
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            @admin
                                <a href="{{ route('announcement.index') }}" style="text-decoration: none; color: inherit;">
                                    <div class="card-body">
                                        <h6>Announcement</h6>
                                        <h5>{{ $announcementCount }}</h5>
                                    </div>
                                </a>
                            @endadmin
                            @organization
                                <a href="{{ route('certificate.index') }}" style="text-decoration: none; color: inherit;">
                                    <div class="card-body">
                                        <h6>Number Of Certificate Received</h6>
                                        <h5>{{ $certificateRecieved }}</h5>
                                    </div>
                                </a>
                            @endorganization
                        </div>
                    </div>
                    @admin
                        <div class="col-4 mt-3">
                            <div class="card">
                                <a href="{{ route('folder.index') }}" style="text-decoration: none; color: inherit;">
                                    <div class="card-body">
                                        <h6>Annual Report</h6>
                                        <h5>{{ $reportCount }}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-4 mt-3">
                            <div class="card">
                                <a href="{{ route('evaluation.index') }}"style="text-decoration: none; color: inherit;">
                                    <div class="card-body">
                                        <h6>Pending Evaluation To Fill Up</h6>
                                        <h5>{{ $evaluationPending }}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endadmin
                </div>
            </div>
        </div>
    </div>
    @organization
        <!-- Announcements Section -->
        <div class="title-wrapper pt-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3>{{ __('Announcement') }}</h3>
                </div>
            </div>
        </div>

        <div id="announcementCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($announcements as $index => $announcement)
                    <div class="carousel-item @if ($index === 0) active @endif">
                        <div class="card card-style-3 mb-3">
                            <div class="card-body">
                                <h4>{{ $announcement->title }}</h4>
                                <small>{{ $announcement->created_at->diffForHumans(['options' => \Carbon\CarbonInterface::ROUND, 'parts' => 1]) }}</small>
                                <hr>
                                <p>{{ $announcement->description }}</p>
                            </div>

                            @if ($announcement->image)
                                <div class="card-footer text-center">
                                    <img src="{{ asset('storage/' . $announcement->image) }}" alt="Announcement Image"
                                        class="img-fluid">
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#announcementCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#announcementCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    @endorganization

@endsection
