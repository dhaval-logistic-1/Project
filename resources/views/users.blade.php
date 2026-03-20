<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />

    <title>User List</title>
</head>

<body>

    <div class="container py-3">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="title-header mb-0">User List</h5>
                </div>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>

                </div>

            </div>

            @if (session('success'))
                <div class="alert alert-success m-3">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">

                <div class="mb-3">
                    <label>Select Gender</label>
                    <select id="gender" class="form-control">
                        <option value="">All</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        {{-- <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->date_of_birth }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Data found!</td>
                                </tr>
                            @endforelse
                        </tbody> --}}
                    </table>

                </div>
            </div>
        </div>

    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('users.getUsers') }}",
                data: function(e) {
                    e.gender = $('#gender').val();
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'age',
                    name: 'age'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'date_of_birth',
                    name: 'date_of_birth'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#gender').change(function() {
            table.draw();
        });


        $(document).on('click', '.deleteBtn', function() {
            let id = $(this).data('id');

            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: '/users/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        alert('User deleted successfully');
                        $('.datatable').DataTable().ajax.reload();
                    }
                });
            }
        });


    });
</script>

</html>
