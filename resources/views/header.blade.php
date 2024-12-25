<html lang="en">
<head>
  <title>User Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <style>
    .form-valid-error{
        color: red !important;
    }
  </style>
</head>
<body>
    @yield('content')
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

$(document).ready(function () {
    $('body').on('click', '.add-hobby-btn', function(){
        const hobbyInput = `
                <div class="form-group col-md-6 remove-div"><label for="hobbies">Hobbies:</label>
                    <div class="row">
                        <div class="form-group col-md-10">
                            <input type="text" class="form-control" name="hobbies[]" placeholder="Enter hobby">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" class="btn btn-danger remove-hobby-btn">Remove</button>
                        </div>
                    </div>
                </div>`;
        $('#hobby-container').append(hobbyInput);
    });
        
    $('body').on("click", ".remove-hobby-btn", function () {
        $(this).closest('.remove-div').remove();
    });
   
    $('body').on('click', '.add-more', function(){
        let clonedRow = $('.user-row:first').clone(); 
        clonedRow.find('input').val(''); 
        clonedRow.find('select').val(''); 
        $('#userFields').append(clonedRow); 
    });

    $('body').on('click', '.remove-row', function(){
        if ($('.user-row').length > 1) {
            $(this).closest('.user-row').remove();
        } else {
            alert('At least one user is required.');
        }
    });

    $('body').on("change", "#martial-status", function () {
        let martial_status= $(this).val();
        if(martial_status==1){
        const marriedInput = '<label for="married_date">Married Date:</label><input type="date" class="form-control married-validation" name="married_date">';
            $('.married-date').html(marriedInput);
        }else{
            $('.married-date').html('');
        }
    });



    $('body').on("change", ".user-martial-status", function () {
        let maritalStatus = $(this).val();
        let marriedDateContainer = $(this).closest('.user-row').find('.user-married-date');
        
        if (maritalStatus == 1) {
            const marriedInput = '<label for="married_date">Married Date:</label><input type="date" class="form-control" name="user_married_date[]" placeholder="Select married date">';
            marriedDateContainer.html(marriedInput);
        } else {
            marriedDateContainer.html('');
        }      
    });


    $('body').on('click','.submit', function (e) {
        let isValid = true;

        $('.form-valid-error').remove();

        const firstName = $('.firstname').val().trim();
        if (firstName === '') {
            $('.firstname').after('<div class="form-valid-error">First name is required.</div>');
            isValid = false;
        }

        const lastName = $('.lastname').val().trim();
        if (lastName === '') {
            $('.lastname').after('<div class="form-valid-error">Last name is required.</div>');
            isValid = false;
        }

        const birthDate = $('.birthdate').val().trim();
        const birthDateObj = new Date(birthDate);
        const today = new Date();
        if (birthDate === '') {
            $('.birthdate').after('<div class="form-valid-error">Birth date is required.</div>');
            isValid = false;
        }else{
            let age = today.getFullYear() - birthDateObj.getFullYear();
            const monthDiff = today.getMonth() - birthDateObj.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDateObj.getDate())) {
                age--;
            }

            if (age < 21) {
                $('.birthdate').after('<div class="form-valid-error">You must be at least 21 years old.</div>');
                isValid = false;
            }
        }

        const mobile = $('.mobile').val().trim();
        if (mobile === '') {
            $('.mobile').after('<div class="form-valid-error">Mobile number is required.</div>');
            isValid = false;
        } else if (!/^\d{10}$/.test(mobile)) {
            $('.mobile').after('<div class="form-valid-error">Invalid mobile number. Enter 10 digits.</div>');
            isValid = false;
        }
        const address = $('.address').val().trim();
        if (address === '') {
            $('.address').after('<div class="form-valid-error">Address is required.</div>');
            isValid = false;
        }

        const state = $('#state').val();
        if (state === '') {
            $('#state').after('<div class="form-valid-error">State is required.</div>');
            isValid = false;
        }

        const city = $('#city').val();
        if (city === '') {
            $('#city').after('<div class="form-valid-error">City is required.</div>');
            isValid = false;
        }

        const pincode = $('.pincode').val().trim();
        if (pincode === '') {
            $('.pincode').after('<div class="form-valid-error">Pincode is required.</div>');
            isValid = false;
        }

        const maritalStatus = $('#martial-status').val();
        if (maritalStatus === '') {
            $('#martial-status').after('<div class="form-valid-error">Marital status is required.</div>');
            isValid = false;
        }

        if (maritalStatus == 1) {
            const marriedDate = $('input[name="married_date"]').val();
            if (marriedDate === '') {
                $('.married-validation').after('<div class="form-valid-error">Married date is required.</div>');
                isValid = false;
            }

            if (marriedDate && birthDate) {
                const birthDateObj = new Date(birthDate);
                const marriedDateObj = new Date(marriedDate);
                if (marriedDateObj <= birthDateObj) {
                    $('.married-validation').after('<div class="form-valid-error">Married date cannot be greater than birth date.</div>');
                    isValid = false;
                }
            }
        }

        const hobbies = $('.hobbies').map(function () {
            return $(this).val().trim();
        }).get();
        if (hobbies.some(hobby => hobby === '')) {
            $('.hobbys-validation').after('<div class="form-valid-error">All hobby fields must be filled.</div>');
            isValid = false;
        }

        const photo = $('.photo')[0].files[0];
        if (!photo) {
            $('.photo').after('<div class="form-valid-error">Photo is required.</div>');
            isValid = false;
        } else {
            const allowedExtensions = ['jpeg', 'jpg', 'png'];
            const fileExtension = photo.name.split('.').pop().toLowerCase();

            if (!allowedExtensions.includes(fileExtension)) {
                $('.photo').after('<div class="form-valid-error">Invalid file type. Only JPEG, JPG, and PNG are allowed.</div>');
                isValid = false;
            }
        }
        $('.user-row').each(function () {
            const userName = $(this).find('.username').val().trim();
            if (userName === '') {
                $(this).find('.username').after('<div class="form-valid-error">User name is required.</div>');
                isValid = false;
            }
            
            const userBirthDate = $(this).find('.user-birthdate').val().trim();
            const birthDateObj = new Date(birthDate);
            const userBirthDateObj = new Date(userBirthDate);
            if (userBirthDate === '') {
                $(this).find('.user-birthdate').after('<div class="form-valid-error">User birth date is required.</div>');
                isValid = false;
            }else if (userBirthDateObj <= birthDateObj) {
                $(this).find('.user-birthdate').after('<div class="form-valid-error">User birth date cannot be greater than head birth date.</div>');
                isValid = false;
            }else{
                const today = new Date();
                const age = today.getFullYear() - userBirthDateObj.getFullYear();
                const monthDiff = today.getMonth() - userBirthDateObj.getMonth();
                const dayDiff = today.getDate() - userBirthDateObj.getDate();

                if (age < 21 || (age === 21 && (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)))) {
                    $(this).find('.user-birthdate').after('<div class="form-valid-error">User age must be greater than 21 years.</div>');
                    isValid = false;
                }
            }

            const userMaritalStatus = $(this).find('.user-martial-status').val();
            if (userMaritalStatus === '') {
                $(this).find('.user-martial-status').after('<div class="form-valid-error">User marital status is required.</div>');
                isValid = false;
            }
            const education = $(this).find('.education').val();
            if (education === '') {
                $(this).find('.education').after('<div class="form-valid-error">Education status is required.</div>');
                isValid = false;
            }

            if (userMaritalStatus == 1) {
                const userMarriedDate = $(this).find('input[name="user_married_date[]"]').val();
                const userBirthDateObj = new Date(userBirthDate);
                const userMarriedDateObj = new Date(userMarriedDate);

                if (userMarriedDate === '') {
                    $(this).find('input[name="user_married_date[]"]').after('<div class="form-valid-error">User married date is required.</div>');
                    isValid = false;
                }else if (userMarriedDateObj <= userBirthDateObj) {
                    $(this).find('input[name="user_married_date[]"]').after('<div class="form-valid-error">User married date cannot be greater than user birth date.</div>');
                    isValid = false;
                }
            }

            const userPhotos = $(this).find('.user-photos')[0].files[0];
            if (!userPhotos) {
                $('.user-photos').after('<div class="form-valid-error">Photo is required.</div>');
                isValid = false;
            } else {
                const allowedExtensions = ['jpeg', 'jpg', 'png'];
                const fileExtension = photo.name.split('.').pop().toLowerCase();

                if (!allowedExtensions.includes(fileExtension)) {
                    $('.user-photos').after('<div class="form-valid-error">Invalid file type. Only JPEG, JPG, and PNG are allowed.</div>');
                    isValid = false;
                }
            }
        });

        if (!isValid) {
            e.preventDefault();
        }
    });


});


    $('body').on("change", "#state", function () {
        let stateId = $(this).val();
        if (stateId) {
            $.ajax({
                url: "{{ url('get-cities') }}",
                type: "POST",
                data: {
                    state_id: stateId,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data) {
                    let cityOptions = '<option value="">Select City</option>';
                    $.each(data, function (key, value) {
                        cityOptions +='<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('#city').html(cityOptions);
                },
                error: function (xhr) {
                    console.log('Error:', xhr.responseText);
                }
            });
        }
    });
  </script>