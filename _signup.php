<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabel">SignUp</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form action="_signubdb.php" method="post" enctype="multipart/form-data">

                    <div class="row g-3 mb-3">
                        <div class="col-3"><label for="fullname" class="form-label pr-3">Fullname: </label></div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="fullname" id="fullname"
                                placeholder="Full Name" aria-label="Full Name">
                        </div>
                    </div>



                    <div class="row input-group mb-3">
                        <div class="col-3"><label for="Username" class="form-label pr-3">Username: </label></div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="studentid" class="form-label">Student ID: </label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="studentid" name="studentid"
                                placeholder="CSE 12345">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3"><label class="form-label">Images: </label></div>
                        <div class="col-9">
                            <input type="file" class="form-control" name="image" id="image" aria-label="image"
                                aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="Institution" class="form-label">Institution Name: </label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" name="institution" id="institution"
                                placeholder="Institution">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="InputEmail1" class="form-label">Email address: </label>
                        </div>
                        <div class="col-9">
                            <input type="email" class="form-control" id="inputemail" name="inputemail"
                                aria-describedby="emailHelp" onkeyup="validateEmail(this.value)">
                        </div>
                        <label id="emailWarning" style="display:none; color:red;">Email is not valid</label>

                    </div>


                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="InputPassword" class="form-label">Password: </label>
                        </div>
                        <div class="col-9">
                            <input type="password" class="form-control" id="inputpassword" name="inputpassword" onkeyup="passcheck(this.value)">
                        </div>
                        <label id="passwordWarning" style="display:none; color:red;">Password must contain at least one lowercase letter, one uppercase letter, one digit, one special character, and be at least 8 characters long.</label>
                    </div>


                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="InputConfirmPassword" class="form-label">Confirm Password: </label>
                        </div>
                        <div class="col-8">
                            <input type="password" class="form-control" id="inputconfirmpassword"
                                name="inputconfirmpassword">
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"  name="signup" id="signup">SignUp</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
     const submitButton = document.getElementById("signup");
     //const a=0,b=0;
    function passcheck(data)
    {
        const passwordWarning = document.getElementById("passwordWarning");
        let pattern=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-+])[A-Za-z\d!@#$%^&*()-+]{8,}$/;
        if(pattern.test(data))
        {
            passwordWarning.style.display = "none";
           // a=1;
        }
        else{
            passwordWarning.style.display = "inline";

        }
    }

    function validateEmail(email) {
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const emailWarning = document.getElementById("emailWarning");

    if(regex.test(email))
        {
            emailWarning.style.display = "none";
           // b=1;
        }
        else{
            emailWarning.style.display = "inline";
        }
}

//if(a==1 && b==1)
//{
 //   submitButton.disabled = false;
//}
//else{
   // submitButton.disabled = true;

//}

</script>