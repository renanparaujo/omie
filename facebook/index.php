<?php

session_start();

require '../vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => 'your app id',
    'app_secret' => 'your app secret key',
    'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional

try {

    if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $helper->getAccessToken();
    }
} catch (Facebook\Exceptions\facebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (isset($accessToken)) {

    if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    } else {
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        $oAuth2Client = $fb->getOAuth2Client();
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }

    try {
        $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
        $requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture
        $picture = $requestPicture->getGraphUser();
        $profile = $profile_request->getGraphUser();
        $fbid = $profile->getProperty('id');           // To Get Facebook ID
        $fbfullname = $profile->getProperty('name');   // To Get Facebook full name
        $fbemail = $profile->getProperty('email');    //  To Get Facebook email
        $fbpic = "<img src='" . $picture['url'] . "' class='img-rounded' style='height:170px; width: 170px;' />";

        $_SESSION['fb_id'] = $fbid . '</br>';
        $_SESSION['fb_name'] = $fbfullname . '</br>';
        $_SESSION['fb_email'] = $fbemail . '</br>';
        $_SESSION['fb_pic'] = $fbpic . '</br>';
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        header("Location: ./");
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
} else {
    $loginUrl = $helper->getLoginUrl('http://localhost:8080/facebook/index.php', $permissions);
}
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Facebook</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container mt-5 pt-4">
            <div class="card">
                <?php
                if (isset($loginUrl)) {
                    echo '<div align="center"><a href="' . $loginUrl . '" style="font-size:18px;" class="btn btn-primary"><i class="fa fa-facebook-square" style="font-size:24px;" aria-hidden="true"></i> Login With Facebook</a></div>';
                } else {
                    echo '<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="' . $picture['url'] . '" class="img-responsive img-circle img-thumbnail img-modal" /></button>';
                }
                ?>
                <div class="mt-5 pt-5">
                    <?php
                    if (isset($loginUrl)) {
                        echo ' ';
                    } else {
                        echo '<div align="center"><p style="font-size: 30px;">Welcome to Our Website - <b>' . $_SESSION['fb_name'] . '</b></p></div>';
                    }
                    ?>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Facebook Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex justify-content-start">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <p><?php echo $_SESSION['fb_pic'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="mb-3">
                                        <h6 class="m-0">Facebook ID : </h6>
                                        <p><?php echo  $_SESSION['fb_id']; ?></p>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="m-0">Facebook Name : </h6>
                                        <p><?php echo $_SESSION['fb_name']; ?></p>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="m-0">Facebook Email : </h6>
                                        <p><?php echo $_SESSION['fb_email']; ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="logout.php" class="btn btn-danger">logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>