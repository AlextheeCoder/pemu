<x-layout>
    <section style="margin-top:60px; margin-bottom:60px;" >
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="{{asset('img/lgo.jpeg')}}"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form method="POST" action="/authenticate" enctype="multipart/form-data">
                @csrf
                
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" name="email" required/>
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3 position-relative">
                  <input type="password" id="password" class="form-control form-control-lg" placeholder="Enter password" name="password" />
                  <i class="toggle-password fas fa-eye" onclick="togglePasswordVisibility('password', 'toggle-password')"></i>
                  <label class="form-label" for="form3Example4">Password</label>
                  @error('password')
                      <p style="font-size: 12px; color: red; margin-top: 8px; align-self:center;">{{ $message }}</p>
                  @enderror
              </div>
            
      
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>
                  
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register"
                      class="link-danger">Register</a></p>
                </div>
      
              </form>
            </div>
          </div>
        </div>
     
      </section>


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
</x-layout>