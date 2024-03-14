<x-layout>
  <section  style="flex-grow: 1;   margin-top:60px; margin-bottom:50px; ">
      <div class="container-fluid h-100"> 
          <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-md-9 col-lg-6 col-xl-5">
                  <img src="{{asset('img/lgo.jpeg')}}" class="img-fluid" alt="Sample image">
              </div>
              <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                  <form method="POST" action="/users" enctype="multipart/form-data">
                      @csrf

                      <div class="form-outline mb-4">
                          <input type="text" id="firstname" class="form-control form-control-lg"
                          placeholder="First Name" name="firstname" required value="{{old('firstname')}}" />
                          <label class="form-label" for="form3Example3">First Name</label>
                      </div>

                      <div class="form-outline mb-4">
                          <input type="text" id="lastname" class="form-control form-control-lg"
                          placeholder="Last Name" name="lastname" required value="{{old('lastname')}}"  />
                          <label class="form-label" for="form3Example3">Last Name</label>
                      </div>

                      <div class="form-outline mb-4">
                          <input type="date" id="dob" class="form-control form-control-lg"
                              placeholder="Date of Birth" name="dob" required
                              max="{{ now()->format('Y-m-d') }}" value="{{old('dob')}}" />
                          <label class="form-label" for="form3Example3">Date of Birth</label>
                      </div>

                      <div class="form-outline mb-4">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="role" required>
                            <option value="" selected>I am a ...</option>
                            <option value="farmer" {{ old('role') == 'farmer' ? 'selected' : '' }}>Farmer</option>
                            <option value="provider" {{ old('role') == 'provider' ? 'selected' : '' }}>Input & services Supplier</option>
                            <option value="food_company" {{ old('role') == 'food_company' ? 'selected' : '' }}>Food company</option>
                            <option value="education_institution" {{ old('role') == 'education_institution' ? 'selected' : '' }}>Education institution</option>
                            <option value="gov_agency" {{ old('role') == 'gov_agency' ? 'selected' : '' }}>Government agency</option>
                            <option value="development_organization" {{ old('role') == 'development_organization' ? 'selected' : '' }}>Development organization</option>
                            <option value="other" {{ old('role') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <label class="form-label" for="form3Example3">Who are you?</label>
                    </div>
                    

                      <div class="form-outline mb-4">
                        <input type="text" id="phonenumber" class="form-control form-control-lg" 
                            placeholder="07" name="phone" required value="{{old('phone')}}" inputmode="numeric" /> 
                        <label class="form-label" for="form3Example3">Phone Number</label>
                    </div>
                                   
                    <div class="form-outline mb-4">
                        <input type="text" id="county" class="form-control form-control-lg"
                        placeholder="County" name="county" required value="{{old('county')}}"  />
                        <label class="form-label" for="form3Example3">County</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="subcounty" class="form-control form-control-lg"
                        placeholder="Sub County" name="subcounty" required value="{{old('subcounty')}}"  />
                        <label class="form-label" for="form3Example3">Sub County</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="ward" class="form-control form-control-lg"
                        placeholder="Ward" name="ward" required value="{{old('ward')}}"  />
                        <label class="form-label" for="form3Example3">Ward</label>
                    </div>

                      <div class="form-outline mb-4">
                      <input type="email" id="email" class="form-control form-control-lg"
                          placeholder="Enter a valid email address" name="email" required value="{{old('email')}}" />
                      <label class="form-label" for="form3Example3">Email address</label>
                      @error('email')
                          <p style="font-size: 12px; color: red; margin-top: 8px; align-self:center;">{{$message}}</p>
                      @enderror
                      </div>

                      <!-- ------------------------------------------------------------------------------------------------------------------------->

                      <div class="form-outline mb-3 position-relative">
                        <input type="password" id="password" class="form-control form-control-lg" placeholder="Enter password" name="password" />
                        <i class="toggle-password fas fa-eye" onclick="togglePasswordVisibility('password', 'toggle-password')"></i>
                        <label class="form-label" for="form3Example4">Password</label>
                        @error('password')
                            <p style="font-size: 12px; color: red; margin-top: 8px; align-self:center;">{{ $message }}</p>
                        @enderror
                    </div>
                  
                  
                    <div class="form-outline mb-3 position-relative">
                        <input type="password" id="confirmpassword" class="form-control form-control-lg" placeholder="Confirm password" name="password_confirmation" />
                        <i class="toggle-confirmpassword fas fa-eye" onclick="togglePasswordVisibility('confirmpassword', 'toggle-confirmpassword')"></i>
                        <label class="form-label" for="form3Example4">Confirm Password</label>
                        @error('password_confirmation')
                            <p style="font-size: 12px; color: red; margin-top: 8px; align-self:center;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- ------------------------------------------------------------------------------------------------------------------------->

                      <div class="d-flex justify-content-between align-items-center">
                      <div class="form-check mb-0">
                          <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                          <label class="form-check-label" for="form2Example3">
                          Remember me
                          </label>
                      </div>                    
                      </div>

                      <div class="text-center text-lg-start mt-4 pt-2">
                          <button type="submit" class="btn btn-primary btn-lg"
                          style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                          <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/login"
                              class="link-danger">Login</a></p>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </section>
  
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        Inputmask('9999 999999').mask(document.getElementById('phonenumber'));
    });
</script>


<script>
    function togglePasswordVisibility(passwordFieldId, toggleIconId) {
        var passwordField = document.getElementById(passwordFieldId);
        var toggleIcon = document.querySelector('.' + toggleIconId);

        if (passwordField && toggleIcon) {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    }
</script>

<script>
    function togglePasswordVisibility(confirmPasswordFieldId, toggleIconId) {
        var confirmPasswordField = document.getElementById(confirmPasswordFieldId);
        var toggleIcon = document.querySelector('.' + toggleIconId);

        if (confirmPasswordField && toggleIcon) {
            if (confirmPasswordField.type === "password") {
                confirmPasswordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                confirmPasswordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    }
</script>



</x-layout>
