<?php

function get_age($birth_date) {
    if (date("Y", $birth_date) == "2017") {
        //Month
        return floor((time() - $birth_date) / 2678400) . " months old";
    } else {
        //Year
        return floor((time() - $birth_date) / 31556926) . " years old";
    }
}
?>
<?php
$userInfo = $this->user_model->getinfo('user', array('user_id' => $this->session->userid))[0];
?>

<main>
    <div class ="side-nav-offset" >
        <div class ="container ">
            <h2>Pet Adoption</h2>
            <hr class="style-seven">
            <div class = "card row">
                <nav class = "green darken-3">
                    <div class="nav-wrapper">
                        <form action = "" method = "POST">
                            <div class="input-field">
                                <input id="search" type="search" name = "search" placeholder = "Search for pet here.." >
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </div>
                </nav>
                <div class="card-content row">
                    <?php if (!$pets): ?>
                    <?php else: ?>
                        <?php foreach ($pets as $pet): ?> 
                            <?php if ($pet->pet_status == 'adoptable' && $pet->pet_access == 1): ?>
                                <div class="col s4">
                                    <div class="card sticky-action hoverable medium">
                                        <div class="card-image">
                                            <img class="materialboxed" data-caption = "" width="100%" height="100%" src="<?= $this->config->base_url() . $pet->pet_picture ?>">
                                        </div>
                                        <div class="card-content">
                                            <span class="card-title activator grey-text text-darken-4"><?= $pet->pet_name ?><i class="material-icons right">more_vert</i></span>
                                            <i class="fa fa-calendar"></i> <?= date('M. j, Y', $pet->pet_bday) ?><br>
                                            <?php if ($pet->pet_sex == "Male" || $pet->pet_sex == "male"): ?>
                                                <i class="fa fa-mars"></i> <?= $pet->pet_sex ?><br>
                                            <?php else: ?>
                                                <i class="fa fa-venus"></i> <?= $pet->pet_sex ?><br>
                                            <?php endif; ?>
                                            <i class="fa fa-paw"></i> <?= $pet->pet_breed ?><br>
                                            <i class="fa fa-check-square" style="color:green"></i> <?= $pet->pet_status ?>
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4">Description<i class="material-icons right">close</i></span>
                                            <hr>
                                            <p><?= $pet->pet_description ?><br></p>
                                        </div>
                                        <div class="card-action">
                                            <a href ="#detail<?= $pet->pet_id; ?>" class = "modal-trigger tooltipped pull-left" data-position="bottom" data-delay="50" data-tooltip="View Full Details"><i class = "fa fa-eye fa-lg"></i></a>
                                            <a href ="#video<?= $pet->pet_id; ?>"  class="modal-trigger tooltipped pull-left"   data-position="bottom" data-delay="50" data-tooltip="Play Video"><i class = "fa fa-video-camera fa-lg"></i></a>
                                            <a href ="#adopters<?= $pet->pet_id; ?>"  class="modal-trigger tooltipped pull-left"   data-position="bottom" data-delay="50" data-tooltip="Adopters"><i class = "fa fa-users fa-lg"></i></a>
                                            <a href ="#adopt<?= $pet->pet_id; ?>"  class="modal-trigger tooltipped pull-right"   data-position="bottom" data-delay="50" data-tooltip="Adopt a Pet"><i class="fa fa-star-o fa-lg" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pet Info Modal -->
                                <div id="detail<?= $pet->pet_id; ?>" class="modal modal-fixed-footer">
                                    <div class="modal-content">
                                        <h4><i class = "fa fa-info"></i> Pet Info</h4>
                                        <div class ="row">
                                            <div class ="col s4">
                                                <img src = "<?= $this->config->base_url() . $pet->pet_picture ?>" class = "responsive-img z-depth-4" style = "border-radius:5px; margin-top:20px;">
                                            </div>
                                            <div class ="col s8">
                                                <table class = "striped responsive-table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name: </th>
                                                            <td><?= $pet->pet_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status: </th>
                                                            <td><?= $pet->pet_status; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Birthday: </th>
                                                            <td><?= date("F d, Y", $pet->pet_bday); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Age:</th>
                                                            <td><?= get_age($pet->pet_bday); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Specie: </th>
                                                            <td><?= $pet->pet_specie; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Sex: </th>
                                                            <td><?= $pet->pet_sex; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Breed: </th>
                                                            <td><?= $pet->pet_breed; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Sterilized: </th>
                                                            <td><?= $pet->pet_neutered_spayed == 1 ? "Yes" : "No"; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Admission: </th>
                                                            <td><?= $pet->pet_admission; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Description: </th>
                                                            <td><?= $pet->pet_description; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Findings: </th>
                                                            <td><?= $pet->pet_history; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="modal-action modal-close waves-effect waves-green btn-flat red white-text ">Close</a>
                                    </div>
                                </div>

                                <!-- Video Modal -->
                                <div id="video<?= $pet->pet_id; ?>" class="modal modal-fixed-footer">
                                    <div class="modal-content">
                                        <h4>Video</h4>
                                        <hr>
                                        <?php if ($pet->pet_video == NULL): ?>
                                            <h2><i class="fa fa-warning"></i> This pet has no Video</h2>
                                        <?php else: ?>
                                            <video class="responsive-video" controls>
                                                <source src="<?= $this->config->base_url() . $pet->pet_picture ?>"  type="video/mp4">
                                            </video>
                                        <?php endif; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="modal-action modal-close waves-effect waves-green btn-flat red white-text ">Close</a>
                                    </div>
                                </div>

                                <!-- Adopters Modal -->
                                <div id="adopters<?= $pet->pet_id; ?>" class="modal modal-fixed-footer">
                                    <div class="modal-content">
                                        <h4>Potential Pet Adopters</h4>
                                        <hr>
                                        <div class="row">
                                            <?php if (!$adopters): ?>
                                                <h2><i class="fa fa-warning"></i> This pet has no Adopters</h2>
                                            <?php else: ?>
                                                <?php foreach ($adopters as $adopter): ?>
                                                    <?php if ($adopter->pet_id == $pet->pet_id): ?>
                                                        <div class="col s12">
                                                            <div class="col s6">
                                                                <h6><strong>Name: </strong><?= $adopter->user_firstname ?></h6>
                                                            </div>
                                                            <div class="col s6">
                                                                <h6><strong>Pet Name: </strong><?= $adopter->pet_name ?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="col s12">
                                                            <div class="checkout-wrap" style="margin-bottom:200px !important;">
                                                                <ul class="checkout-bar">
                                                                    <li class="<?= $adopter->transaction_progress >= 20 ? "active" : "" ?>">Adoption Form</li>
                                                                    <li class="<?= $adopter->transaction_progress >= 40 ? "active" : "" ?>">Meet And Greet</li>
                                                                    <li class="<?= $adopter->transaction_progress >= 60 ? "active" : "" ?>">Interview</li>
                                                                    <li class="<?= $adopter->transaction_progress >= 80 ? "active" : "" ?>">Ocular Visit</li>
                                                                    <li class="<?= $adopter->transaction_progress == 100 ? "active" : "" ?>">Visit Your Pet</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="modal-action modal-close waves-effect waves-green btn-flat red white-text ">Close</a>
                                    </div>
                                </div>

                                <!-- Adopt Modal -->
                                <div id="adopt<?= $pet->pet_id; ?>" class="modal modal-fixed-footer">
                                    <div class="modal-content">
                                        <h4>Adoption Application Form</h4>
                                        <hr>
                                        <center>
                                            <img src = "<?= $this->config->base_url() . $pet->pet_picture ?>" class = "responsive-img z-depth-4" style = "border-radius:5px; margin-top:20px; height:50%;">
                                            <br>
                                            <h6 >Name: <?= $pet->pet_name; ?></h6>
                                            <br>
                                        </center>
                                        <p><strong>There are two options for you to decide, its either download the form or fill up the form and send to our email online.</strong></p>
                                        <ul class="collapsible" data-collapsible="accordion">
                                            <li>
                                                <div class="collapsible-header">
                                                    <i class="material-icons left">file_download</i> Download the Form
                                                </div>
                                                <div class="collapsible-body">
                                                    <center>
                                                        <a href="<?= base_url() ?>index.php/download/adoption_application_form.pdf" class="btn-large waves-effect waves-light blue darken-3">Download Adoption Application Form<i class="material-icons left">file_download</i></a>
                                                    </center>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="collapsible-header active">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Fill up the Form
                                                </div>
                                                <div class="collapsible-body row">
                                                    <center>
                                                        <a href="<?= base_url() ?>user/petAdoptionOnlineForm_exec/<?= $pet->pet_id ?>" class="btn-large waves-effect waves-light blue darken-3">Online Adoption Application<i class="fa fa-pencil-square-o left" aria-hidden="true"></i></a>
                                                    </center>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="modal-action modal-close waves-effect waves-green btn-flat red white-text ">Close</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class = "col s12">
                    <?= $links ?>
                </div>
            </div>
        </div>
    </div>
</main>

