<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Files</h5>
                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="view_duty_accomplished_registration_form">{{ __('Duty Accomplished Registration Form') }}</label>
                    <div class="input-group">
                        <input name="duty_accomplished_registration_form" type="text" id="view_duty_accomplished_registration_form" class="form-control" placeholder="{{ __('Duty Accomplished Registration Form') }}" readonly>
                        <a href="#" id="link_duty_accomplished_registration_form" class="btn btn-link" target="_blank">Download</a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="view_list_of_officers_and_adviser">{{ __('List of Officers and Adviser') }}</label>
                    <div class="input-group">
                        <input name="list_of_officers_and_adviser" type="text" id="view_list_of_officers_and_adviser" class="form-control" placeholder="{{ __('List of Officers and Adviser') }}" readonly>
                        <a href="#" id="link_list_of_officers_and_adviser" class="btn btn-link" target="_blank">Download</a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="view_list_of_member_in_good_standing">{{ __('List of Members in Good Standing') }}</label>
                    <div class="input-group">
                        <input name="list_of_member_in_good_standing" type="text" id="view_list_of_member_in_good_standing" class="form-control" placeholder="{{ __('List of Members in Good Standing') }}" readonly>
                        <a href="#" id="link_list_of_member_in_good_standing" class="btn btn-link" target="_blank">Download</a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="view_constitution_and_by_laws">{{ __('Constitution and By-Laws') }}</label>
                    <div class="input-group">
                        <input name="constitution_and_by_laws" type="text" id="view_constitution_and_by_laws" class="form-control" placeholder="{{ __('Constitution and By-Laws') }}" readonly>
                        <a href="#" id="link_constitution_and_by_laws" class="btn btn-link" target="_blank">Download</a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="view_endorsement_certification">{{ __('Endorsement Certification') }}</label>
                    <div class="input-group">
                        <input name="endorsement_certification" type="text" id="view_endorsement_certification" class="form-control" placeholder="{{ __('Endorsement Certification') }}" readonly>
                        <a href="#" id="link_endorsement_certification" class="btn btn-link" target="_blank">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
