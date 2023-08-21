@extends('privatelayout.privateadmin')
@section('private')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Security</h5>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{ route('security.submit') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="current_password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" name="new_password_confirmation">
                            </div>
                          
                            <div  class="dynamic-field "id="dynamic-fields" >
                                <div class="dynamic-field mb-3">
                                    <div class="mb-3">
                                    <label class="form-label">Security Question 1</label>
                                    <br>
                                    
                                    <select  name="question1" class="form-control">
                                        <option value="" disabled selected >Select a question</option>
                                        @foreach ($securityQuestions as $question)
                                            <option value="{{ $question }}">{{ $question }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label " >Security Answer 1</label>
                                
                                    <input type="text" class="form-control" name="answer1">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    
                                </div>
                                
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
                <label class="form-label">Security Question${index}</label>
                <select class="form-control" name="question${index}">
                    <option value="" disabled selected>Select a question</option>
                    @foreach ($securityQuestions as $question)
                        <option value="{{ $question }}">{{ $question }}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                <label class="form-label">Security Answer ${index}</label>
                <input type="text" class="form-control" name="answer${index}">
                <div>
                <br>
                <button type="button" class="btn btn-danger remove-field" >Remove</button>
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

            // Disable the "Add More..." button after adding the fields
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