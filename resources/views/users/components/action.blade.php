<div class="d-flex justify-content-around">
    <!-- View button with tooltip -->
    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal" data-user="{{ $user->id }}"
        title="View User">
        <i class="fa-solid fa-eye"></i>
    </button>

    @if ($user->status == true)
        <div class="dropdown">
            <!-- Dropdown button with tooltip -->
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false" title="Select Options">
                Select
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item" href="{{ route('folder.index') }}" title="View Reports">
                        Report @if ($reportAnnounced)
                            <span class="btn btn-primary text-white mx-2"
                                style="font-size: 0.75rem; padding: 0.25rem 0.5rem;">New</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('activity-request.index') }}"
                        title="Request Technical Assistance">
                        Technical Assist @if ($activityRequestAnnounced)
                            <span class="btn btn-primary text-white mx-2"
                                style="font-size: 0.75rem; padding: 0.25rem 0.5rem;">New</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('criteria.index') }}" title="Evaluate Criteria">
                        Evaluation @if ($answerAnnounced)
                            <span class="btn btn-primary text-white mx-2"
                                style="font-size: 0.75rem; padding: 0.25rem 0.5rem;">New</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    @elseif($user->status === null)
        <!-- Activate button with tooltip -->
        <button class="btn btn-success activateBtn" data-bs-toggle="modal" data-bs-target="#activateModal"
            data-user="{{ $user->id }}" title="Activate User">
            <i class="fa-solid fa-check"></i>
        </button>

        <!-- Reject button with tooltip -->
        <button class="btn btn-danger rejectBtn" data-bs-toggle="modal" data-bs-target="#rejectModal"
            data-user="{{ $user->id }}" title="Reject User">
            <i class="fa-solid fa-times"></i>
        </button>
    @endif
</div>
