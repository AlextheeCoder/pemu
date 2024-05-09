<x-layout>
    <div class="farmers">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-farmer">
                        <div class="card-header">{{ __('Register Farmer') }}</div>

                        <div class="card-body">
                            <form method="POST" action="/pemu/farmer/store">
                                @csrf

                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="fullname" type="text"
                                            class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                            value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>

                                        @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                    <div class="col-md-6">

                                        <select class="form-control" name="gender" id="gender"
                                            style="background-color: white">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>

                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dob"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                                    <div class="col-md-6">

                                        <input id="dob" type="date"
                                            class="form-control @error('dob') is-invalid @enderror" name="dob"
                                            value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idnumber"
                                        class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="idnumber" type="text"
                                            class="form-control @error('idnumber') is-invalid @enderror" name="idnumber"
                                            value="{{ old('idnumber') }}" required inputmode="numeric">

                                        @error('idnumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                </div>
                                <div class="form-group row">
                                    <label for="phonenumber"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="phonenumber" type="text"
                                            class="form-control @error('phonenumber') is-invalid @enderror"
                                            name="phonenumber" value="{{ old('phonenumber') }}" required
                                            placeholder="07" inputmode="numeric">

                                        @error('phonenumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="crops"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Crops (separate with commas)') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" name="crops"></textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="area"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                                    <div class="col-md-6">
                                        <input id="area" type="text"
                                            class="form-control @error('area') is-invalid @enderror" name="area"
                                            value="{{ old('area') }}" required autocomplete="area" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="operator"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Farm Operator') }}</label>

                                    <div class="col-md-6">
                                        <input id="operator" type="text"
                                            class="form-control @error('operator') is-invalid @enderror" name="operator"
                                            value="{{ old('operator') }}" required autocomplete="operator" autofocus>
                                    </div>
                                </div>


                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Farmer') }}
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask('9999 999999').mask(document.getElementById('phonenumber'));
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Inputmask('99999999').mask(document.getElementById('idnumber'));
        });
    </script>
</x-layout>
