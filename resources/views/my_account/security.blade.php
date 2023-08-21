@extends('layouts.admin')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Passwords</h5>
                    </div>
                    <script>
                        // Set the toastr options globally
                        toastr.options = {
                            "timeOut": 4000,
                            "progressBar" : true,
                            "closeButton" : true,
                        };
                    
                        // Check if 'success' message is present in the session and show toastr
                        @if(Session::has('success'))
                            toastr.success('{{ Session::get('success') }}', 'Success!');
                        @endif
                    
                        // Display an error toastr message if security questions are not answered
                        @if($errors->has('security_questions'))
                            toastr.error('{{ $errors->first('security_questions') }}', 'Error');
                        @endif
                    </script>


                    <form action="{{ route('security.password.submit') }}"method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="current_password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" name="new_password_confirmation" required>
                            </div>
                        </div>
                        <br>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" >Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Security</h5>
                    </div>
                    @if ($errors->any())
                        <!-- Error message display -->
                    @endif
                    @if(session('success'))
                        <!-- Success message display -->
                    @endif
                    <form action="{{ route('security.questions.submit') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Security Question 1</label>
                                <select name="question1" class="form-control" >
                                    <option value="" disabled selected>Select a question</option>
                                    @foreach ($securityQuestions as $question)
                                        <option value="{{ $question }}">{{ $question }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3" id="dynamic-fields">
                                <label class="form-label">Security Answer 1</label>
                                <input type="text" class="form-control" name="answer1" required>
                            </div>
                            <div class="mb-3">
                                
                                <input type="hidden" class="form-control" name="date" value="{{$currentDate}}">
                            </div>
                        </div>
                        <br>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="add-more">Add More...</button>
                            <button type="submit" class="btn btn-primary" style="margin-left: 10px">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var securityQuestions = @json($securityQuestions);

    function generateSecurityQuestionDropdown(index) {
        var dropdownHtml = `
            <div class="dynamic-field mb-3">
                <div class="mb-3">
                    <label class="form-label">Security Question ${index}</label>
                    <select class="form-control" name="question${index}">
                        <option value="" disabled selected>Select a question</option>
                        @foreach ($securityQuestions as $question)
                            <option value="{{ $question }}">{{ $question }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Security Answer ${index}</label>
                    <input type="text" class="form-control" name="answer${index}" required>
                </div>
                <button type="button" class="btn btn-danger remove-field">Remove</button>
            </div>
        `;
        return dropdownHtml;
    }

    var dynamicFieldsCounter = 1;
    var maxDynamicFields = 3;

    $('#add-more').click(function () {
        if (dynamicFieldsCounter < maxDynamicFields) {
            dynamicFieldsCounter++;
            var dynamicFields = $('#dynamic-fields');
            dynamicFields.append(generateSecurityQuestionDropdown(dynamicFieldsCounter));

            // Disable the "Add More" button after adding the fields
            if (dynamicFieldsCounter >= maxDynamicFields) {
                $('#add-more').prop('disabled', true);
            }
        }
    });

    $(document).on("click", ".remove-field", function () {
        $(this).closest(".dynamic-field").remove();
        dynamicFieldsCounter--;
        $('#add-more').prop('disabled', false); // Enable Add More button
    });

</script>

@endsection