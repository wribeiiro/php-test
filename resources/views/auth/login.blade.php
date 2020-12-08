@extends('layout.auth')
@section('content')
<div class="row justify-content-center d-flex mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Authentication</h4>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <div class="card-text">
                    <form method="post" id="auth">
                        @csrf
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp" placeholder="Type your best email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="emailHelp" placeholder="Type your password" required>
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

        $.ajax({
            type: 'POST',
            url: '{{route("auth/login")}}',
            data: $(this).serialize(),
            success: (data) => {
                if (data.code === 200) {
                    toastr.success('Redirect to dashboard..', 'Success!')
                    setTimeout(() => {
                        window.location.href = "/dashboard"
                    }, 2000)
                } else {
                    toastr.warning('Invalid Credentials', 'Warning!')
                }
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
