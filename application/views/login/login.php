<?php
if (validation_errors()) {
    include 'includes/toastErrorUserRegister.php';
}
?>
<div class="row">
    <div class="col m7 leftSide hoverable">
        <h1>What is PetEx?</h1>
        <div class="container">
            <p>dolor sit amet, mutat gubergren gloriatur ea mei. Malis scribentur interpretaris vis no, mea nostrum pericula an. Sed in alia definitionem. Ut has minim mollis vivendum, in feugait detraxit instructior quo. In vim augue democritum, ea nam autem timeam.

                Pro id sanctus repudiandae. In dicit denique vim, putent possim tritani qui ne. Novum epicurei platonem eu duo, vix corpora epicuri dissentiet te. Solum sonet explicari in per, periculis iracundia quo at, soluta reformidans mei cu. Vis ex ipsum aperiri, omnium aperiam conclusionemque eu vel, et amet euismod definiebas est.

                His ridens delenit detraxit cu, ea nam simul delenit conclusionemque. Docendi fuisset vis et. Soluta mediocritatem mei in, no paulo doming qualisque duo. Ne civibus expetendis sed, iriure iracundia voluptatum ei est. Eum no persius diceret accusata, quo cu liber deserunt voluptatibus.

                ndamus constituam, officiis convenire sit ne.</p>

        </div>
    </div>
    <div class="col m5 rightSide">
        <div class="row">
            <div class="col m12">
                <div class="card hoverable">
                    <div class="card-content">
                        <div class="row">
                            <div class="col m12">
                                <ul class="tabs">
                                    <li class="tab col m6" ><a href="#login" class="active">Login</a></li>
                                    <li class="tab col m6" ><a href="#signup">Signup</a></li>
                                </ul>
                            </div>
                            <!--LOGIN TAB-->
                            <div id="login" class="col m12">
                                <br>
                                <form method="POST" action="">`
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input type="text" class="validate" name = "username">
                                            <label>Username</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">lock</i>
                                            <input type="password" class="validate" name = "password">
                                            <label>Password</label>
                                        </div><br><br><br><br><br><br><br><br><br>
                                        <a class="waves-effect waves-light btn pull-left button orange">Reset Password</a>
                                        <a class="waves-effect waves-light btn pull-right button"><i class="material-icons right">send</i>Login</a>
                                    </div>
                                </form>
                            </div>
                            <!--SIGNUP TAB-->
                            <div id="signup" class="col m12">
                                <form method="POST" action="signup_exec">
                                    <div class ="col s12"><br>
                                        <div class="input-field col s12 <?php if (!empty(form_error("username"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <input id="username" type="text" class="" name = "username" autofocus="" value="<?= set_value('username') ?>">
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="password" class="validate" name = "password">
                                            <label>Password</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="password" class="validate" name = "conpass">
                                            <label>Confirm Password</label>
                                        </div>
                                        <div class="input-field col s12 <?php if (!empty(form_error("phonenumber"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <input type="number" class="validate" name = "phonenumber" value="<?= set_value('phonenumber') ?>">
                                            <label for="phonenumber">Phone Number </label>
                                        </div>
                                        <div class="input-field col s12 <?php if (!empty(form_error("email"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <input type="email" class="validate" name = "email" value="<?= set_value('email') ?>">
                                            <label>Email Address</label>
                                        </div>
                                        <div class="input-field col s6  <?php if (!empty(form_error("lastname"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <input type="text" class="validate" name = "lastname" value="<?= set_value('lastname') ?>">                                            <label>Lastname</label>
                                        </div>
                                        <div class="input-field col s6  <?php if (!empty(form_error("firstname"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <input type="text" class="validate" name = "firstname" value="<?= set_value('firstname') ?>">
                                            <label>Firstname</label>
                                        </div>
                                        <h6><i class="fa fa-venus-mars" aria-hidden="true"></i> Gender </h6>
                                        <div class="col s6">
                                            <p>
                                                <input name="gender" type="radio" id="test1" value="Male" checked/>
                                                <label style="font-size:20px;" for="test1">Male</label>
                                            </p>
                                        </div>
                                        <div class="col s6">
                                            <p>
                                                <input name="gender" type="radio" id="test2" value="Female"/>
                                                <label style="font-size:20px;" for="test2">Female</label>
                                            </p>
                                        </div>
                                        <div class="input-field col s12 <?php if (!empty(form_error("birthday"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <label>Birthday</label>
                                            <input type="text" class="datepicker" name = "birthday" value="<?= set_value('birthday') ?>">
                                        </div>
                                        <div class="input-field col s12 <?php if (!empty(form_error("address"))): ?>error-theme<?php else: ?>green-theme<?php endif; ?>">
                                            <textarea id="textarea1" class="materialize-textarea" data-length="120" name="address" value="<?= set_value('address') ?>"></textarea>
                                            <label for="textarea1">Complete Address</label>
                                        </div>
                                        <button class="btn-large waves-effect waves-light green darken-3 right" type="submit" name="action">Submit
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
