<style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
        background-image: url(http://bytabo.de/img/bg.jpg);
        background-size: cover;
    }

    .cc_banner-wrapper {
        display: none !important;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
        color: white;
        font-weight: normal;
    }

    h2 {
        margin-bottom: 20px;
    }

    .form-signin .checkbox {
        font-weight: normal;
    }

    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    div.logo {
        position: absolute;
        right: 15px;
        bottom: 15px;
    }

    div.logo img {
        width: 200px;
    }

    .btn.btn-primary {
        color: white;
        background-color: transparent;
        margin-top: 20px;
        border: 1px solid white;
    }

    .btn.btn-primary:hover {
        color: #333;
        background-color: white;
    }

    #inputPassword {
        margin-top: 30px;
    }

    .alert {
        max-width: 300px;
        margin: 0 auto;
    }
</style>
<div class="container">
    <form class="form-signin" action='' method='post'>


        <img src="http://bytabo.de/img/bytabo.png" />

        <?php
        if (!$loggedInStatus) {
            echo "<div class='alert alert-danger'>Falsches Passwort</div>";
        }
        ?>

        <h2 class="form-signin-heading">Bitte anmelden</h2>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name='password' class="form-control" placeholder="Password"
               required>

        <input type="hidden" name="submit" value="1"/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>


    </form>

</div>
<div class='logo'><img src='http://graphic-concepts.de/img/logo_grau.png'/></div>
