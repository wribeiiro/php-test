@extends('layout.auth')
@section('content')
<div class="row justify-content-center d-flex mt-5">
    <div class="col-6">
        <div class="card mt-5">
            <div class="card-logo mx-auto d-block">
                <img src="https://img.icons8.com/ios/452/laravel.png" alt="logo" width="150">
            </div>
            <div class="card-body">
                <h4 class="card-title text-center">PHPTest Auth</h4>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <div class="card-text">
                    <form method="post" id="auth">
                        @csrf
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp" placeholder="Type your best email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="emailHelp" placeholder="Type your password">
                        </div>
                        <input type="submit" class="btn btn-purple btn-block" id="createAccBtn" value="Log-in">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $("#auth").on('submit', function(e) {
        e.preventDefault()

        if ($('#email').val().trim() === "") {
            toastr.warning('E-mail is required', 'Info')
            return
        }

        if ($('#password').val().trim() === "") {
            toastr.warning('password is required', 'Info')
            return
        }

        $.ajax({
            type: 'POST',
            url: '{{route("auth/loginForm")}}',
            data: $(this).serialize(),
            success: (data) => {
                if (data.code === 200) {
                    toastr.success('Redirecting to dashboard... await', 'Success!')
                    localStorage.setItem('access_token', data.data.access_token)
                    setTimeout(() => {
                        window.location.href = '{{route("dashboard")}}'
                    }, 1500)
                } else {
                    toastr.warning('Invalid Credentials', 'Warning!')
                }
            },
            beforeSend: () => {
                localStorage.clear()
            },
            error: (err) => {
                if (err.status === 401 || err.status === 422) {
                    toastr.warning('Invalid Credentials', 'Warning!')
                } else {
                    toastr.error('A error ocurred when processing request', 'Error')
                }
            }
        })
    })
})
</script>
@endsection
