<x-layout>
    <section class="vh-100" style="flex-grow: 1;  overflow-y: auto; ">
        <div class="container-fluid h-custom" style="flex-grow: 1;  overflow-y: auto; ">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form method="POST" action="/users" enctype="multipart/form-data">
                @csrf
      
                <!-- First Name-->
                <div class="form-outline mb-4">
                    <input type="text" id="form3Example3" class="form-control form-control-lg"
                      placeholder="First Name" name="firstname" required/>
                    <label class="form-label" for="form3Example3">First Name</label>
                  </div>
                <!-- Last Name-->
                <div class="form-outline mb-4">
                    <input type="text" id="form3Example3" class="form-control form-control-lg"
                      placeholder="Last Name" name="lastname" required />
                    <label class="form-label" for="form3Example3">Last Name</label>
                  </div>

                  <!-- DOB-->
                <div class="form-outline mb-4">
                    <input type="date" id="form3Example3" class="form-control form-control-lg"
                      placeholder="Date of Birth" name="dob" required/>
                    <label class="form-label" for="form3Example3">Date of Birth</label>
                  </div>

                  
                 <!-- Select input -->
                 <div class="form-outline mb-4">
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="role" required>
                        <option selected>I am a ...</option>
                        <option value="farmer">Farmer</option>
                        <option value="provider">Provider</option>
                      </select>
                    <label class="form-label" for="form3Example3">I am a:</label>
                  </div>

                  <!-- Phone-->
                 
                  <div class="form-outline mb-4">
                    <input type="number" id="form3Example3" class="form-control form-control-lg bfh-phone" 
                           placeholder="254" name="phone" min="0" required /> 
                    <label class="form-label" for="form3Example3">Phone Number</label>
                  </div>
                  

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" name="email" required/>
                  <label class="form-label" for="form3Example3">Email address</label>

                  @error('email')
                  <p style="font-size: 12px; color: red; margin-top: 8px; align-self:center;">{{$message}}</p>
                  @enderror

                </div>


                
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Enter password" name="password" />
                  <label class="form-label" for="form3Example4">Password</label>

                  @error('password')
                  <p style="font-size: 12px; color: red; margin-top: 8px; align-self:center;">{{$message}}</p>
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
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/login"
                      class="link-danger">Login</a></p>
                </div>
      
              </form>
            </div>
          </div>
        </div>
     
      </section>



</x-layout>