@extends('layouts.app')

@section('content')

<style>
/* Sidebar Styles (keep in layout ideally) */
.sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    background-color: #1f2937;
    color: white;
    display: flex;
    flex-direction: column;
    padding: 20px;
    z-index: 1000;
}

/* Main content reserves space for sidebar */
.main-content {
    margin-left: 250px; /* same as sidebar width */
    padding: 20px;
    box-sizing: border-box;
}

/* Center the card/table area */
.table-center-wrapper {
    display: flex;
    justify-content: center;
    width: 100%;
    padding: 0 16px;
}
.centered-card { max-width: 1150px; width:100%; margin: 0 auto; }
</style>

<!-- move sidebar OUTSIDE main -->
@include('partials.sidebar')

    <div class="min-height-300 bg-dark position-absolute w-100"></div>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <!-- Card header -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Manage Users</h5>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">
                    <i class="fa fa-plus me-1"></i> Create New User
                </a>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center mb-0" id="users-table">
                        <thead>
                            <tr>
                                <th># SR No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa-solid fa-eye me-1"></i> Show
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

          </div>
        </div>
      </div>

    </div>
</main>

@endsection

@section('css')
<!-- jQuery DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('js')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- jQuery DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#users-table').DataTable({
        paging: true,
        searching: true,   // enables search
        ordering: true,    // enables column sorting
        info: true,
        lengthChange: true
    });
});
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session("success") }}',
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '{{ session("error") }}',
    });
</script>
@endif
@endsection
