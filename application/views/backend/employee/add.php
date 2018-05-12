            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Form Add Employee</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Add Employee</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Steps with form</div>
                    </div>
                    <div class="ibox-body">
                        <form id="form-wizard" novalidate="novalidate">
                            <h6>Step 1</h6>
                            <section>
                                <h3>Account Details</h3>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control required email" id="email" type="text" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control required" id="password" type="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control required" id="confirm" type="password" name="confirm">
                                </div>
                            </section>
                            <h6>Step 2</h6>
                            <section>
                                <h3>Profile Details</h3>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control required" id="name" type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control required" id="surname" type="text" name="surname">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control required" id="address" type="text" name="address">
                                </div>
                            </section>
                            <h6>Step 3</h6>
                            <section>
                                <div class="text-center">
                                    <h3>You did it Man</h3><i class="fa fa-smile-o text-success" style="font-size:120px;"></i></div>
                            </section>
                            <h6>Step 4</h6>
                            <section>
                                <h3>Terms and Conditions</h3>
                                <label class="ui-checkbox ui-checkbox-success">
                                    <input class="required" id="acceptTerms" type="checkbox" name="acceptTerms">
                                    <span class="input-span"></span>I agree with the Terms and Conditions.</label>
                            </section>
                        </form>
                    </div>
                </div>
            </div>