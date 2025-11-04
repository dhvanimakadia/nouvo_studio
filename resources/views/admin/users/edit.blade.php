@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl">Edit User</h2>
@endsection

@section('content')
<main class="main-content min-vh-100 py-5" style="background: linear-gradient(120deg, #f0f0f0, #ffffff);">

    <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="col-lg-9 col-12">
                <div class="card shadow-lg p-4" style="border-radius: 20px; background: #fdfdfe;">

                    <!-- Header -->
                    <h1 class="mb-4"
                        style="font-family: 'Poppins', sans-serif;
                               font-size: 2.5rem;
                               font-weight: 400;
                               color: #6a11cb;
                               text-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
                        Edit User
                    </h1>
                    <hr class="horizontal dark my-3">

                    <!-- Form -->
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" id="editUserForm">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">

                            <div class="col-12">
                                <label class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control form-control-lg shadow-sm" placeholder="Enter name" id="name">
                                @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control form-control-lg shadow-sm" placeholder="Enter email" id="email">
                                @error('email')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-4">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-light me-3 shadow-sm">Back</a>
                                <button type="submit"  style="border-radius: 2rem; padding: 0.6rem 2rem; background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; border: none;"class="btn btn-primary shadow-sm">Update</button>

                            </div>

                        </div> <!-- row -->
                    </form>
                </div> <!-- card -->
            </div> <!-- col -->
        </div> 
    </div>

</main>

{{-- Client-side validation --}}
<script>
document.getElementById('editUserForm').addEventListener('submit', function(e){
    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();

    if(!name || !email){
        e.preventDefault();
        alert('Please fill all required fields.');
    }
});
</script>
@endsection
