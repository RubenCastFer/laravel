@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="form-horizontal" method="POST" action="{{ route('admin.login.post') }}">
    @csrf

    <div class="form-group">
        <label for="correo" class="col-md-4">E-Mail</label>

        <div class="col-md-6">
            <input id="correo" type="correo" class="form-control" name="correo" value="{{ old('correo') }}" required autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="contrasenya" class="col-md-4">contraseña</label>

        <div class="col-md-6">
            <input id="contrasenya" type="contrasenya" class="form-control" name="contrasenya" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>
    </div>
</form>