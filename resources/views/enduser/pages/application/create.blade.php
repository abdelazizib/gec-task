@extends('enduser.base.layout')
@push('css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.24.0/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.11.2/build/css/intlTelInput.css">
    <style>
        .iti {
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-8">
                <div class="bg-white p-5 border rounded-3 shadow-sm my-3">
                    <h2 class="text-center border-bottom pb-2">Submit Application</h2>
                    <form id="application-form" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label>Contact Email <span class="text-danger">*</span></label>
                            <input type="email" name="contact_email" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <label>Contact Phone<span class="text-danger">*</span></label>
                                <input id="phone" type="tel" style="width: 100%;" name="contact_phone"
                                    class="form-control"required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Date of Birth <span class="text-danger">*</span></label>
                            <input type="text" name="birth_date" class="form-control flatpickr" required />
                        </div>
                        <div class="mb-3">
                            <label>Gender <span class="text-danger">*</span></label>
                            <div class="d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="male" @checked(old('gender') === 'male') required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female" @checked(old('gender') === 'female') required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Country <span class="text-danger">*</span></label>
                            <input type="text" name="country" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Files (images & PDFs) <span class="text-danger">*</span></label>
                            <input id="filepond" type="file" name="files[]" class="form-control" multiple
                                accept="image/*,application/pdf" data-max-files="10" data-max-file-size="5mb" />
                        </div>
                        <div class="mb-3">
                            <label>Comments</label>
                            <textarea name="comments" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.11.2/build/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.24.0/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            flatpickr('.flatpickr', {
                dateFormat: 'Y-m-d'
            });
            // ---------------- \\
            const pond = FilePond.create(document.querySelector('#filepond'), {
                credits: false,
                acceptedFileTypes: ['image/*', 'application/pdf'],
            });
            // ---------------- \\
            const iti = window.intlTelInput(document.querySelector('#phone'), {
                initialCountry: 'eg',
                separateDialCode: true,
                loadUtilsOnInit: true,
                loadUtils: () => import(
                    'https://cdn.jsdelivr.net/npm/intl-tel-input@25.11.2/build/js/utils.js'),
                hiddenInput: (telInputName) => ({
                    country: "phone_country_code"
                }),
            });
            // ---------------- \\
            $.validator.addMethod('e164', function(value) {
                if (!value) return false;
                // ---------------- \\                
                return iti.isValidNumber();
                // ---------------- \\
            }, 'Please enter a valid phone number.');
            // ---------------- \\
            $('#application-form').validate({
                rules: {
                    contact_email: {
                        required: true,
                        email: true
                    },
                    contact_phone: {
                        required: true,
                        e164: true
                    },
                    birth_date: {
                        required: true,
                        dateISO: true
                    },
                    gender: {
                        required: true
                    },
                    country: {
                        required: true,
                        minlength: 2
                    },
                },
                errorClass: 'is-invalid',
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    if (element.parents('.input-group').length) {
                        return error.insertAfter(element.parent());
                    }
                    return error.insertAfter(element);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(formEl, e) {
                    // ---------------- \\
                    e.preventDefault();
                    // ---------------- \\
                    const form = $(formEl);
                    const submitBtn = form.find('.submit-btn');
                    const originalBtnText = submitBtn.html();
                    submitBtn.attr('disabled', 'disabled').html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...'
                    );
                    // ---------------- \\
                    const formData = new FormData(formEl);
                    // ---------------- \\
                    formData.set('contact_phone', iti.getNumber());
                    // ---------------- \\
                    formData.delete('files[]');
                    // ---------------- \\
                    Array.from(pond.getFiles()).forEach(
                        (fileItem) => formData.append('files[]', fileItem.file)
                    );
                    // ---------------- \\
                    $.ajax({
                        url: "{{ route('application.store') }}",
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'Success',
                                text: data.message || 'Submitted!',
                                icon: 'success'
                            });
                            form[0].reset();
                            pond.removeFiles();
                        },
                        error: function(xhr) {
                            const data = xhr.responseJSON || {};
                            if (data.errors) {
                                const msgs = Object.values(data.errors).flat().join('\n');
                                Swal.fire({
                                    title: 'Error',
                                    text: msgs,
                                    icon: 'error'
                                });
                            } else if (data.message) {
                                Swal.fire({
                                    title: 'Error',
                                    text: data.message,
                                    icon: 'error'
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Submission failed.',
                                    icon: 'error'
                                });
                            }
                        },
                        complete: function() {
                            submitBtn.removeAttr('disabled').html(originalBtnText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
