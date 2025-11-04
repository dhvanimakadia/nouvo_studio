@extends('layouts.app')

@section('header')
<h3 class="font-semibold text-xxl">Add User</h3>
@endsection

@section('content')
<main class="main-content min-vh-100">

    <!-- Full screen greyish card background -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: #f0f0f0; z-index: -1;"></div>

    <div class="container py-5">
        <div class="row">
            <!-- Move form slightly left -->
            <div class="col-lg-7 col-md-10">
                <div class="p-5 shadow-lg rounded-3" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">

                    <!-- Form Header -->
                <h1 class="mb-4"
                    style="font-family: 'Poppins', sans-serif;
                        font-size: 2.5rem;
                        font-weight: 500;
                        color: #6a11cb;
                        text-shadow: 2px 2px 10px rgba(0,0,0,0.2);">
                    Add New User
                </h1>                    <hr class="horizontal dark my-3">

                    <form action="{{ route('admin.users.store') }}" method="POST" id="userForm">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #2575fc;">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg shadow-sm"
                                placeholder="Enter full name" id="name"
                                style="border-radius: 1rem; border: 1px solid #d1d5db; background: rgba(255,255,255,0.8);">
                            @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #6a11cb;">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg shadow-sm"
                                placeholder="Enter email address" id="email"
                                style="border-radius: 1rem; border: 1px solid #d1d5db; background: rgba(255,255,255,0.8);">
                            @error('email')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #ff6a00;">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control form-control-lg shadow-sm"
                                placeholder="Enter password" id="password"
                                style="border-radius: 1rem; border: 1px solid #d1d5db; background: rgba(255,255,255,0.8);">
                            @error('password')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        </div>



                        <!-- Buttons -->
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary me-3"
                                style="border-radius: 2rem; padding: 0.6rem 2rem;">Back</a>
                            <button type="submit" class="btn btn-gradient-primary"
                                style="border-radius: 2rem; padding: 0.6rem 2rem; background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; border: none;">Save User</button>
                        </div>

                    </form>
                </div> <!-- form card -->
            </div> <!-- col -->
        </div> <!-- row -->
    </div> <!-- container -->

</main>

{{-- Client-side validation --}}
<script>
document.getElementById('userForm').addEventListener('submit', function(e){
    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let password = document.getElementById('password').value.trim();

    if(!name || !email || !password){
        e.preventDefault();
        alert('Please fill all required fields.');
    }
});
</script>

@endsection
