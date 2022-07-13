<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup To Do Not Fear</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action = "partials/_handleSignup.php" method = "post">
      <div class="mb-3">
      <div id="emailHelp" class="form-text">We'll never share your details with anyone.</div>
    <label for="userName" class="form-label">Name</label>
    <input type="text" class="form-control" id="userName" name = "userName" aria-describedby="emailHelp">
    
  </div>

  <div class="mb-3">
    <label for="signupEmail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="signupEmail" name = "signupEmail" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name = "password">
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name = "cpassword">
  </div>
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
      </div>
      
    </div>
  </div>
</div>
