<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{ asset('backend/plugins/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}

<script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/fontawesome.min.js" integrity="sha512-xs1el+uLI2T4QTvRIv3kFBWvjQiPVAvKQM4kzZrJoLVZ1tSz1E0fkZch0cjd1f+sTk2MtBCHbP3PiVTdoFKAJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $('#userForm').on('submit',function(e){
        e.preventDefault();

        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let phone_number = $('#phone_number').val();
        let dob = $('#dob').val();

        $.ajax({
            url: "/my-profile/store",
            type: "POST",
            data:{
                "_token": "{{ csrf_token() }}",
                name:name,
                email:email,
                phone_number:phone_number,
                dob:dob,
                password:password,
            },
            success:function(response){
                console.log(response);
                if (response) {
                    $("#userForm")[0].reset(); 
                }
            },
            error: function(response) {
                console.log('error');
           }

        });

    });
</script>
