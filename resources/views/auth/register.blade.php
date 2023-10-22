@extends('layouts.auth')

@section('main-content')
<main class="main-content">

    <div class="admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                    <div class="edit-profile">
                        <div class="edit-profile__logos">
                            <a href="#">
                                <img class="dark" src="img/Logo.png" alt="">
                                <img class="light" src="img/Logo.png" alt="">
                            </a>
                        </div>
                        <div class="card border-0">
                            <div class="card-header">
                                <div class="edit-profile__title">
                                    <h6>Sign Up Bullwhip | TK4 - DAIM</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="edit-profile__body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="edit-profile__body">
                                            <div class="form-group mb-20">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <label for="email">Email Address (Personal)</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <label for="nik">NIK</label>
                                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" placeholder="35xxxxxxxxxxxxxx" value="{{ old('nik') }}" required autocomplete="nik">
                                                @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <label for="no_karyawan">No Karyawan (Sesuai Darwin Box)</label>
                                                <input type="text" class="form-control @error('no_karyawan') is-invalid @enderror" id="no_karyawan" name="no_karyawan" placeholder="No Karyawan" value="{{ old('no_karyawan') }}" required autocomplete="no_karyawan">
                                                @error('no_karyawan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="08xxxxxxxxx" value="{{ old('phone') }}" required autocomplete="phone">
                                                @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <label for="department">Department</label>
                                                <select class="custom-select form-control select-arrow-none ih-medium radius-xs b-light shadow-none color-light fs-14 @error('department') is-invalid @enderror" id="department" name="department" aria-describedby="department" required>
                                                    <option selected disabled value="">Choose a department...</option>
                                                    <option value="SCM">SCM</option>
                                                    <option value="Business Technology">Business Technology</option>
                                                    <option value="Engineering">Engineering</option>
                                                    <option value="FA">FA</option>
                                                    <option value="HRGA">HRGA</option>
                                                    <option value="IA">IA</option>
                                                    <option value="Marketing">Marketing</option>
                                                    <option value="Operation">Operation</option>
                                                    <option value="PDQM">PDQM</option>
                                                    <option value="Production">Production</option>
                                                    <option value="Purchasing">Purchasing</option>
                                                    <option value="SALES - GT">SALES - GT</option>
                                                    <option value="SALES - MT">SALES - MT</option>
                                                </select>
                                                @error('department')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-20">
                                                <label for="password-field">Password</label>
                                                <div class="position-relative">
                                                    <input id="password-field" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                                                    @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @else
                                                    <div class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2"></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-15">
                                                <label for="password-field">Password Confirmation</label>
                                                <div class="position-relative">
                                                    <input id="password-confirm-field" type="password" class="form-control" name="password_confirmation" placeholder="Confirm the Password" required>
                                                </div>
                                            </div>
                                            <div class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                <button class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn " disabled>
                                                    <!-- Create Account -->
                                                    Expired
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- End: .card-body -->
                            <div class="admin-topbar">
                                <p class="mb-0">
                                    Already have an account?
                                    <a href="{{ route('login') }}" class="color-primary">
                                        Sign In
                                    </a>
                                </p>
                            </div><!-- End: .admin-topbar  -->
                        </div><!-- End: .card -->
                    </div><!-- End: .edit-profile -->
                </div><!-- End: .col-xl-5 -->
            </div>
        </div>
    </div><!-- End: .admin-element  -->

</main>
@endsection

@section('custom-script')
<script>
    $(document).ready(function() {
        $('#department').select2();
    });
</script>
@endsection