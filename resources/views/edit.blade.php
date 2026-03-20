<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<main>
    <div class="container py-5">
        <div class="card shadow-sm">
            
            <div class="card-header bg-warning text-dark">
                <h5 class="m-0">Edit User</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">User Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="userName"
                                class="form-control @error('userName') is-invalid @enderror"
                                value="{{ old('userName', $user->name) }}">

                            @error('userName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="userEmail"
                                class="form-control @error('userEmail') is-invalid @enderror"
                                value="{{ old('userEmail', $user->email) }}">

                            @error('userEmail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                   
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Age</label>
                        <div class="col-sm-9">
                            <input type="number" name="userAge"
                                class="form-control @error('userAge') is-invalid @enderror"
                                value="{{ old('userAge', $user->age) }}">

                            @error('userAge')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Percentage</label>
                        <div class="col-sm-9">
                            <input type="text" name="userPercentage"
                                class="form-control @error('userPercentage') is-invalid @enderror"
                                value="{{ old('userPercentage', $user->percentage) }}">

                            @error('userPercentage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                   
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" name="userDateOfBirth"
                                class="form-control @error('userDateOfBirth') is-invalid @enderror"
                                value="{{ old('userDateOfBirth', $user->date_of_birth) }}">

                            @error('userDateOfBirth')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                   
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-9">
                            <select name="userGender"
                                class="form-select @error('userGender') is-invalid @enderror">
                                <option value="male" {{ old('userGender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('userGender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>

                            @error('userGender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">User Type</label>
                        <div class="col-sm-9">
                            <select name="userType"
                                class="form-select @error('userType') is-invalid @enderror">
                                <option value="student" {{ old('userType', $user->userType) == 'student' ? 'selected' : '' }}>Student</option>
                                <option value="teacher" {{ old('userType', $user->userType) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                            </select>

                            @error('userType')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                   
                    <div class="text-end">
                        <button class="btn btn-warning">Update User</button>
                        <a href="{{ route('users.getUsers') }}" class="btn btn-secondary">Back</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</main>

</body>
</html>