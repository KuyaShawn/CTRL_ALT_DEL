<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- External css & Fonts -->
    <link rel="stylesheet" href="/styles/contact.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">

    <!-- jQuery and Bootstrap Bundle -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
    <script defer src="/scripts/contact.js"></script>


    <title>Coneybeare Sustainability Catalog - Contact Us</title>
</head>
<body>
<?
include '../includes/header.html';
?>

<div class="container" id="main_container">
    <div id="form_wrapper">
        <form action="confirm.php" method="post" id="contactform">
            <div>
                <h1 id="contact_heading">Contact Us</h1>
                <p>If you have any questions or queries a member of staff will always be happy to help. Feel free to
                    contact
                    us by
                    email and we will be sure to get back to you as soon as possible</p>
            </div>
            <fieldset class="mt-4">
                <h3>Your Contact info</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="input_area">
                            <label class="form-check-label" for="fname">First Name</label>
                            <input type="text" class="form-control form_input2" id="fname"
                                   placeholder="Enter Your First Name"
                                   name="first_name">
                        </div>
                        <span class="error_msg" id="error_fname">
                        Please enter a first name
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input_area">
                            <label class="form-check-label" for="lname">Last name</label>
                            <input type="text" class="form-control form_input2" id="lname"
                                   placeholder="Enter Your Last Name"
                                   name="last_name">
                        </div>
                        <span class="error_msg" id="error_lname">
                        Please enter a last name
                    </span>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input_area">
                            <label class="form-check-label" for="email">Email</label>
                            <input type="text" class="form-control form_input2" id="email"
                                   placeholder="Enter Your Email"
                                   name="email">
                        </div>
                        <span class="error_msg" id="error_email">
                        Please enter a valid Email Address
                    </span>
                        <span class="error_msg" id="error_valid">
                        Please enter a valid Email Address
                    </span>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input_area">
                            <label class="form-check-label" for="msg">Message</label>
                            <textarea class="form-control form_input2" id="msg" rows="5"
                                      placeholder="How Can We Help?"
                                      name="message"></textarea>
                        </div>
                        <span class="error_msg" id="error_msgTextarea">
                        Please enter a valid Email Address
                    </span>
                    </div>
                </div>
            </fieldset>
            <div class="d-flex justify-content-end">
                <button class="btn btn-dark" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?
include '../includes/footer.html';
?>
</body>
</html>