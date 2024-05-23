


    <!-- REGISTER POPUP START-->
    <script>
function HideRegister() {
  document.getElementById("Register").style.display = "none";
}
function ShowRegister() {
  document.getElementById("Register").style.display = "block";
  document.getElementById("Login").style.display = "none";

}
</script>
   <div class="LoginRegister" id="Register" style="position: fixed;">
    <div class="title">Registration</div>
    <span class="closeButton">
      <i class="far fa-times-circle text-dark"  onclick="HideRegister()"></i>
    </span>
    <div class="content">

      <form action="functions.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="full_name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" placeholder="Enter your Address" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" name="confirm_password" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="1" required>
          <input type="radio" name="gender" id="dot-2" value="2" required>
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <!-- <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label> -->
          </div>
        </div>
        <span onclick="ShowLogin()" style="cursor:pointer;"
        onMouseOver="this.style.color='#FFD333'"
        onMouseOut="this.style.color='#00F'">All Ready Have a Account</span>
        <div class="button">
          <input type="submit" name="register" value="Register">
        </div>
      </form>
    </div>
  </div>

    <!-- REGISTER POPUP END-->



    <!-- LOGIN POPUP START-->
    <script>
function HideLogin() {
  document.getElementById("Login").style.display = "none";
}
function ShowLogin() {
  document.getElementById("Login").style.display = "block";
  document.getElementById("Register").style.display = "none";

}
</script>
    <div class="LoginRegister" id="Login" style="position: fixed;">
    <div class="title">Login</div>
    <span class="closeButton">
      <i class="far fa-times-circle text-dark"  onclick="HideLogin()"></i>
    </span>
    <div class="content">

      <form action="functions.php" method="post">
        <div class="user-details">

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="password" placeholder="Enter your password">
          </div>
        </div>
        <span onclick="ShowRegister()" style="cursor:pointer;"
        onMouseOver="this.style.color='#FFD333'"
        onMouseOut="this.style.color='#00F'">New User Plz Registation First</span>
        <div class="button">
          <input type="submit" name="login" value="Login">
        </div>
      </form>
    </div>
  </div>

    <!-- LOGIN POPUP END-->