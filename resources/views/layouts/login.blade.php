  <div class="modal fade" id="loginModal"  role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="loginModal">{{ __('Kirish') }}</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Elektron pochta manzili:') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control ps-form_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Parol:') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control ps-form_input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 offset-md-4 text-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Eslab qol!') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-12 text-center">
                            <button type="submit" class="btn btn-success">
                                {{ __('Kirish') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Parolni unutdim?') }}
                                </a>
                            @endif
                        </div>
                        <p class="text-center">Agar ro'yhatdan o'tmagan bo'lsangiz <span class="register" data-toggle="modal" 
                        data-target="#registerModal" id="ModalRegister">ro'yhatdan o'tishni </span> bosing!</p>
                    </div>
                    @section('scripts')
                    @parent

                    @if($errors->has('email') || $errors->has('password'))
                        <script>
                        $(function() {
                            $('#loginModal').modal({
                                show: true
                            });
                        });
                        </script>
                    @endif
                    @endsection
                </form>
            </div>
        </div>
    </div>
</div>
