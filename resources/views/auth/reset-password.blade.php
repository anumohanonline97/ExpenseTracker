<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PersonalExpenseTracker - Reset Password</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reset Password</h1>
                                    </div>
                                    <form id="resetForm" class="user">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" aria-describedby="emailHelp"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password_confirmation" name="password_confirmation" aria-describedby="emailHelp"
                                                placeholder="Confirm Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script>
document.getElementById('resetForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const password = document.getElementById('password').value;
    const password_confirmation = document.getElementById('password_confirmation').value;

    if (password !== password_confirmation) {
        alert("Passwords do not match.");
        return;
    }

    const token = localStorage.getItem('access_token'); 

    if (!token) {
        alert("Unauthorized: Please log in first.");
        return;
    }

    axios.post("{{ url('api/passwordreset') }}", {
        password: password,
        password_confirmation: password_confirmation
    }, {
        headers: {
            Authorization: `Bearer ${token}`
        }
    })
    .then(function (response) {
        alert("Password reset successful!");
        localStorage.removeItem('access_token'); 
        window.location.href = "{{ url('/login') }}";
    })
    .catch(function (error) {
        if (error.response && error.response.data && error.response.data.errors) {
            const errors = error.response.data.errors;
            let messages = Object.values(errors).flat().join('\n');
            alert(messages);
        } else if (error.response && error.response.data && error.response.data.message) {
            alert(error.response.data.message);
        } else {
            alert("Something went wrong. Please try again.");
        }
    });
});
</script>


</body>

</html>
