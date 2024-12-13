{{-- comment --}}

<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentPromoModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" id="comment-form">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="comment">Comment</label>
                        <textarea type="text" class="form-control" name="comment" placeholder="Enter Comment" value="{{ old('comment') }}"
                            required id="comment" @organization readonly @endorganization></textarea>
                        @error('comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @admin
                        <div class="modal-footer mt-2">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    @endadmin
                </div>
            </div>
        </form>
    </div>
</div>
