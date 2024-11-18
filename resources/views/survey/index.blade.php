<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Survey') }}
        </h2>
    </x-slot>
    <div class="col-12">
        <div class="card">

            <div class="card-body">

                <form id="formValidationExamples" class="row g-6 fv-plugins-bootstrap5 fv-plugins-framework"
                      novalidate="novalidate" data-np-autofill-form-type="change_password" data-np-checked="1"
                      data-np-watching="1">

                    <!-- General Information Section -->
                    <div class="row gy-3 mt-0">
                        <div class="col-12">
                            <h6>{{ __('General Information') }}</h6>
                            <hr class="mt-0">
                        </div>


                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="company_name">{{ __('Company Name') }}</label>
                            <input id="company_name" name="company_name" type="text" class="form-control"
                                   placeholder="Enter company name" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('company_name'){{ $message }}@enderror</small>

                        </div>
                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="contact_person">{{ __('Contact Person') }}</label>
                            <input id="contact_person" name="contact_person" type="text" class="form-control"
                                   placeholder="Enter contact person's name" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('contact_person'){{ $message }}@enderror</small>

                        </div>
                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                            <input id="email" name="email" type="email" class="form-control"
                                   placeholder="example@domain.com" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('email'){{ $message }}@enderror</small>

                        </div>
                    </div>
                    <div class="row gy-3 mt-0">
                        <!-- ISO 9001:2015 Section -->
                        <div class="col-12">
                            <h6 class="mt-2">{{ __('ISO 9001:2015') }}</h6>
                            <hr class="mt-0">
                        </div>

                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label"
                                   for="iso_question_1">{{ __('Do you have a quality policy?') }}</label>
                            <input id="iso_question_1" name="iso_question_1" type="text" class="form-control" required/>
                            <small class="text-danger">@error('iso_question_1'){{ $message }}@enderror</small>
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label"
                                   for="iso_question_2">{{ __('Do you conduct regular internal audits?') }}</label>
                            <input id="iso_question_2" name="iso_question_2" type="text" class="form-control" required/>
                            <small class="text-danger">@error('iso_question_2'){{ $message }}@enderror</small>
                        </div>

                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label"
                                   for="cmmi_dev_question_1">{{ __('Do you have a defined software development process?') }}</label>
                            <input id="cmmi_dev_question_1" name="cmmi_dev_question_1" type="text" class="form-control"
                                   required/>
                            <small class="text-danger">@error('cmmi_dev_question_1'){{ $message }}@enderror</small>
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label"
                                   for="cmmi_dev_question_2">{{ __('Do you maintain version control for your code?') }}</label>
                            <input id="cmmi_dev_question_2" name="cmmi_dev_question_2" type="text" class="form-control"
                                   required/>
                            <small class="text-danger">@error('cmmi_dev_question_2'){{ $message }}@enderror</small>
                        </div>
                    </div>
                    <!-- CMMI SVC Section -->
                    <div class="row gy-3 mt-0">
                        <div class="col-12">
                            <h6 class="mt-2">{{ __('CMMI SVC') }}</h6>
                            <hr class="mt-0">
                        </div>

                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label"
                                   for="cmmi_svc_question_1">{{ __('Do you have a service management process?') }}</label>
                            <input id="cmmi_svc_question_1" name="cmmi_svc_question_1" type="text" class="form-control"
                                   required/>
                            <small class="text-danger">@error('cmmi_svc_question_1'){{ $message }}@enderror</small>
                        </div>
                        <div class="col-md-6 fv-plugins-icon-container">
                            <label class="form-label"
                                   for="cmmi_svc_question_2">{{ __('Do you regularly collect and analyze customer feedback?') }}</label>
                            <input id="cmmi_svc_question_2" name="cmmi_svc_question_2" type="text" class="form-control"
                                   required/>
                            <small class="text-danger">@error('cmmi_svc_question_2'){{ $message }}@enderror</small>
                        </div>
                    </div>
                    <div class="row gy-3 mt-0">
                        <div id="sticky-wrapper" class="sticky-wrapper" style="height: 86.0156px;">
                            <div
                                class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                                style="">
                                <h5 class="card-title mb-sm-0 me-2"></h5>
                                <div class="action-btns">
                                    <button type="button"
                                            class="btn btn-outline-secondary">{{ __('Save Progress') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
