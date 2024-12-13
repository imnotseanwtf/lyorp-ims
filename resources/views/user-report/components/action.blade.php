<div class="d-flex justify-content-around">
    <!-- View report button with tooltip -->
    <button class="btn btn-info viewBtn" data-bs-toggle="modal" data-bs-target="#viewModal"
        data-report="{{ $report->id }}" title="Additional Information">
        <i class="fa-solid fa-eye"></i>
    </button>


    @php
        $isWithinLast10Days = $report->created_at->gt(now()->subDays(10));
    @endphp

    <!-- Edit report button with tooltip -->
    @if ($isWithinLast10Days)
        @if ($report->status_report === 0)
            <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
                data-report="{{ $report->id }}" title="Edit Report">
                <i class="fa-solid fa-pen"></i>
            </button>

            <!-- Delete report button with tooltip -->
            <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
                data-report="{{ $report->id }}" title="Delete Report">
                <i class="fa-solid fa-trash"></i>
            </button>
        @endif
    @endif

    @if ($report->status_report === 2)
        <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
            data-report="{{ $report->id }}" title="Edit Report">
            <i class="fa-solid fa-pen"></i>
        </button>

        <button class="btn btn-secondary resubmitBtn" data-bs-toggle="modal" data-bs-target="#resubmitModal"
            data-report="{{ $report->id }}" title="Resubmit">
            <i class="fa-solid fa-file-export"></i>
        </button>

        <button class="btn btn-danger reviewBtn" data-bs-toggle="modal" data-bs-target="#reviewModal"
            data-report="{{ $report->id }}" title="Rejected Reason">
            <i class="fa-solid fa-eye"></i>
        </button>
    @endif

</div>
