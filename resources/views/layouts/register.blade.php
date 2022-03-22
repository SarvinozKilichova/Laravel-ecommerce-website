  <div class="modal fade" id="registerModal"  role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="registerModal">{{ __("Ro'yhatdan o'tish") }}</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}" id="form">
                        @csrf

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right label-control">{{ __('Ism:') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control ps-form_input @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required="required" autocomplete="fname" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right label-control">{{ __('Familiya:') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control ps-form_input @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right label-control">{{ __('Telefon raqam:') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control ps-form_input @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right label-control">{{ __('Elektron pochta manzili:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control ps-form_input @error('email') is-invalid @enderror" name="reg_email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right label-control">{{ __('Parol:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control ps-form_input @error('password') is-invalid @enderror" name="reg_password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-control">{{ __('Parolni tasdiqlash:') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control ps-form_input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-12 text-center">
                                <button type="submit" class="btn btn-success" id="register">
                                    {{ __("Ro'yhatdan o'tish") }}
                                </button>
                            </div>
                             <p class="text-center pt-10">Agar allaqachon ro'yhatdan o'tmagan bo'lsangiz <span class="register" data-toggle="modal" 
                        data-target="#loginModal" id="ModalLogin">kirishni </span> bosing!</p>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>