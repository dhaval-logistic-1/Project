<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Create User</title>
</head>

<body class="font-sans antialiased">

    <main>
        <div class="container">
            <div class="container py-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="m-0">Create New User</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="mb-3 row">
                                <label for="userName" class="col-sm-3 col-form-label">User Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('userName') is-invalid @enderror"
                                        id="userName" name="userName" value="{{ old('userName') }}">
                                    @error('userName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userEmail" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control @error('userEmail') is-invalid @enderror"
                                        id="userEmail" name="userEmail" value="{{ old('userEmail') }}">
                                    @error('userEmail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userPassword" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password"
                                        class="form-control @error('userPassword') is-invalid @enderror"
                                        id="userPassword" name="userPassword" value="{{ old('userPassword') }}">
                                    @error('userPassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userConformPassword" class="col-sm-3 col-form-label">Confirm
                                    Password</label>
                                <div class="col-sm-9">
                                    <input type="password"
                                        class="form-control @error('userConformPassword') is-invalid @enderror"
                                        id="userConformPassword" name="userConformPassword"
                                        value="{{ old('userConformPassword') }}">
                                    @error('userConformPassword')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userAge" class="col-sm-3 col-form-label">Age</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control @error('userAge') is-invalid @enderror"
                                        id="userAge" name="userAge" value="{{ old('userAge') }}">
                                    @error('userAge')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userPercentage" class="col-sm-3 col-form-label">Percentage</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control @error('userPercentage') is-invalid @enderror"
                                        id="userPercentage" name="userPercentage" value="{{ old('userPercentage') }}">
                                    @error('userPercentage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userDateOfBirth" class="col-sm-3 col-form-label">Date of Birth</label>
                                <div class="col-sm-9">
                                    <input type="date"
                                        class="form-control @error('userDateOfBirth') is-invalid @enderror"
                                        id="userDateOfBirth" name="userDateOfBirth"
                                        value="{{ old('userDateOfBirth') }}">
                                    @error('userDateOfBirth')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userGender" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9">
                                    <select class="form-select @error('userGender') is-invalid @enderror"
                                        id="userGender" name="userGender">
                                        <option value="male" {{ old('userGender') == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ old('userGender') == 'female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                    </select>
                                    @error('userGender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userType" class="col-sm-3 col-form-label">User Type</label>
                                <div class="col-sm-9">
                                    <select class="form-select @error('userType') is-invalid @enderror" id="userType"
                                        name="userType">
                                        <option value="student" {{ old('userType') == 'student' ? 'selected' : '' }}>
                                            Student
                                        </option>
                                        <option value="teacher" {{ old('userType') == 'teacher' ? 'selected' : '' }}>
                                            Teacher
                                        </option>
                                    </select>
                                    @error('userType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Create User</button>
                            </div>
                            <div>
                                <a href="{{ route('users.getUsers') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
