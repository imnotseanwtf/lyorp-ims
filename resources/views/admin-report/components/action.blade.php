<div class="d-flex justify-content-around">
    <!-- View report button with tooltip -->
    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-report="{{ $report->id }}" title="Additional Information">
        <i class="fa-solid fa-eye"></i>
    </button>

    @if ($report->status_report == 0)
        <!-- Activate button with tooltip -->
        <button class="btn btn-success activateBtn" data-bs-toggle="modal" data-bs-target="#activateModal"
            data-report="{{ $report->id }}" title="Accept report">
            <i class="fa-solid fa-check"></i>
        </button>

        <!-- Reject button with tooltip -->
        <button class="btn btn-danger rejectBtn" data-bs-toggle="modal" data-bs-target="#rejectModal"
            data-report="{{ $report->id }}" title="Reject report">
            <i class="fa-solid fa-times"></i>
        </button>
    @endif

    @if ($report->reason)
        <button class="btn btn-danger reviewBtn" data-bs-toggle="modal" data-bs-target="#reviewModal"
            data-report="{{ $report->id }}" title="Rejected Reason">
            <i class="fa-solid fa-eye"></i>
        </button>
    @endif
</div>
