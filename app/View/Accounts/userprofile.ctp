<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<style>
    .container {
        margin-top: 20px;
    }

    .jumbotron-flat {
        background-color: #4D8FFF;
        height: 100%;
        border: 1px solid #4DB8FF;
        background: white;
        width: 100%;
        text-align: center;
        overflow: auto;
        color: var(--dark-color);
    }

    .paymentAmt {
        color: var(--dark-color);
        font-size: 80px;
    }

    .centered {
        text-align: center;
    }

    .title {
        padding-top: 15px;
        color: var(--dark-color);
    }

    .img-circle {
        width: 200px;
        border-radius: 50%;
    }

    .editprofilebtn {
        left: 67%;
        position: relative;
    }

    .details_more {
        font-size: 15px;
        float: left;
        font-weight: 600;
    }
</style>

<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>">Message board</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $this->Html->url(array('controller' => 'accounts', 'action' => 'account')); ?>">My Account <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">Logout</a>
            </li>

        </ul>
    </div>
</nav>

<!-- nav bar -->

<div class="container">
    <div class="row" style="display:flex;">
        <div class="col-md-6">
            <!-- <h3>Edit Account </h3> -->
        </div>
        <div class="col-md-6 pull-right">
            <?php echo $this->Html->link('Edit Profile', ['controller' => 'Accounts', 'action' => 'account'], ['class' => "btn btn-primary editprofilebtn"]); ?>

        </div>
    </div>

    <hr>
    <div class="row">
        <!-- left column -->

        <div class="col-md-3">
            <div class="text-center">
                <?php
                $filepath = $accounts['Account']['img_path'];

                ?>
                <?= $this->Html->image($filepath, ['class' => 'avatar img-circle', 'alt' => 'avatar']) ?>


            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h2>Personal Info</h2>
            <?php
            $firstname = !empty($users['User']['first_name']) ? $users['User']['first_name'] : '';
            $lastname = !empty($users['User']['last_name']) ? $users['User']['last_name'] : '';
            $fullname = $lastname . ', ' . $firstname . ' ' . $accounts['Account']['Age'];
            ?>
            <div class="row" style="margin-top:20px;">
                <div class="col-md-6">
                    <p style="font-size:25px"><?= $fullname ?> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span>Joined: </span>
                </div>
                <div class="col-md-9">

                    <p class="details_more"><?= date("F d, Y h:i A",  strtotime($users['User']['date_added']))  ?> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <span>Last login: </span>
                </div>
                <div class="col-md-9">

                    <p class="details_more"><?= date("F d, Y h:i A",  strtotime($users['User']['last_logged_in']))  ?> </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <span>Hobby: </span>
                </div>
                <div class="col-md-9">

                    <p class="details_more"><?= $accounts['Account']['hobby']  ?> </p>
                </div>
            </div>

        </div>
    </div>
</div>
<hr>


<script>
    $('#datepicker').datepicker({
        dateFormat: 'mm/dd/yy',
        changeMonth: true,
        changeYear: true,
    });
</script>