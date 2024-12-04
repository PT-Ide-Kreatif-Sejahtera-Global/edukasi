<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | IdeaThings</title>
    <link rel="shortcut icon" type="image/png" href="admin/images/logos/IdeaThings.png" />
    <link rel="stylesheet" href="admin/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="admin/images/logos/IdeaThings.png" width="180" alt="">
                                </a>
                                <p class="text-center">IdeaThings</p>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputtext1" class="form-label">Name</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror" required
                                            autocomplete="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="exampleInputtext1" class="form-label">Progress</label>
                                        <input type="text" id="progress" name="progress"
                                            class="form-control @error('name') is-invalid @enderror" required
                                            autocomplete="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" required
                                            autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password-confirm" class="form-label">Confirm Password</label>
                                        <input type="password" id="password-confirm" name="password_confirmation"
                                            required autocomplete="new-password" class="form-control">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-4">
                                        <label for="foto" class="form-label">Foto</label>
                                        <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" required accept="image/*">
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                        Up</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="admin/libs/jquery/dist/jquery.min.js"></script>
    <script src="admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
