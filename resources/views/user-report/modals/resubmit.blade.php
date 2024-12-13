{{-- resubmit --}}

<div class="modal fade" id="resubmitModal" tabindex="-1" role="dialog" aria-labelledby="resubmitPromoModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" id="resubmit-form">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resubmit</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-2">Are you sure you want to resubmit this?</div>
                    <div class="modal-footer mt-2">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>