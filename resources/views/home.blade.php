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
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                @admin
                                    <h6>Approved Organization</h6>
                                    <h5>{{ $approvedOrganization }}</h5>
                                @endadmin
                                @organization
                                    <h6>Number Of Report Sent</h6>
                                    <h5>{{ $reportSent }}</h5>
                                @endorganization
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                @admin
                                    <h6>Pending Organization</h6>
                                    <h5>{{ $pendingOrganization }}</h5>
                                @endadmin
                                @organization
                                    <h6>Pending Evaluation To Fill Up</h6>
                                    <h5>{{ $evaluationPending }}</h5>
                                @endorganization
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                @admin
                                    <h6>Announcement</h6>
                                    <h5>{{ $announcementCount }}</h5>
                                @endadmin
                                @organization
                                    <h6>Number Of Certificate Received</h6>
                                    <h5>{{ $certificateRecieved }}</h5>
                                @endorganization
                            </div>
                        </div>
                    </div>
                    @admin
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6>Annual Report</h6>
                                    <h5>{{ $reportCount }}</h5>
                                </div>
                            </div>
                        </div>
                    @endadmin
                </div>
            </div>
        </div>
    </div>
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h3>{{ __('Announcement') }}</h3>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
    <div class="container mt-5">
        <div id="announcementCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner">
                @foreach ($announcements as $index => $announcement)
                    <div class="carousel-item @if ($index === 0) active @endif">
                        <div class="card-styles">
                            <div class="card-style-3 mb-30">
                                <div class="card-content">
                                    <h4>{{ $announcement->title }}</h4>
                                    <span>{{ $announcement->created_at->diffForHumans(['options' => \Carbon\CarbonInterface::ROUND, 'parts' => 1]) }}</span>
                                    <hr>
                                    <p>{{ $announcement->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#announcementCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#announcementCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
