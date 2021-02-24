<!--
    This file holds the HTML code for the CbCSC
            Confirmation web page.
    Updated: Tuesday 23rd February, 2021
    Project Name: Coneybeare Sustainability Catalog
    File name: index.php   Root: ../confirmation/index.php
    Author/'s: CTRL ALT DEL
                Amanda H.
                Dylan H.
-->
    <!-- Link to the universal Meta & Head  -->
    <?php
        include('confirm-includes/headMeta.html');
    ?>
    <title>Sign Up - Coneybeare Sustainability Catalog</title>
    <link rel="stylesheet" href="/styles/confirmation.css">

</head>

<body>

    <!-- Link to the universal Header/Navigation -->
    <?php
        include('../includes/header.html');
    ?>

    <!-- container for the entire web form -->
    <div class="container p-3 my-3" id="formContainer">

    <!-- Information Form -->
    <form action="confirm.php" method="post" class="form" id="form">
        <h5>Please complete the form below to be considered for the
            Sustainability Catalog</h5><br>



        <!-- Fieldset COMPANY Information-->
        <fieldset id="company-info">
                <h3>Company Information</h3><br>

            <div class="form-row">


                <!-- Company NAME input -->
                <div class="form-group col">
                    <label for="company-name">Company Name:</label>
                    <input type="text" class="form-control" name="company-name" id="company-name">
                    <span class="incomplete d-none text-danger" id="invalid-cName">
                        * Please enter Company name</span>
                </div>

                <!-- Comapny Webiste input -->
                <div class="form-group col">
                    <label for="company-website">Company Website: </label>
                    <input type="text" class="form-control" name="company-website" id="company-website"
                           pattern="(?:(?:http(?:s)?:\/\/)?(?:www\.)?)?(?<domain>[\w-]+\.[A-z]{2,}){1}(?<path>.*)">
                    <span class="incomplete d-none text-danger" id="invalid-cSite">
                        * Please enter the Company Web Address</span>
                </div>
            </div>

            <div class="form-row">


                <!--Company COUNTRY  -->
                <div class="form-group col">
                    <label for="inputCountry">Country:</label>
                    <select id="country" name="country" class="form-control">
                        <?php
                        include('confirm-includes/countries.html');
                        ?>
                    </select>
                    <span class="incomplete d-none text-danger" id="invalid-country">
                    * Please enter a Country</span>
                </div>

                <!--Company STATE -->
                <div class="form-group col">
                    <label for="inputState">State:</label>
                    <select id="state" name="state" class="form-control">
                        <!-- Link to the universal Header/Navigation -->
                        <?php
                        include('confirm-includes/states.html');
                        ?>
                    </select>
                    <span class="incomplete d-none text-danger" id="invalid-state">
                    * Please enter a State </span>
                </div>
            </div>

            <div class="form-row">
                <!--Company CITY  -->
                <div class="form-group col">
                    <label for="inputCity">City:</label>
                    <input type="text" class="form-control" name="inputCity" id="inputCity">
                    <span class="incomplete d-none text-danger" id="invalid-city">
                        * Please enter a city</span>
                </div>

                <!-- Geographical area in which they serve -->
                <div class="form-group col">
                    <label for="inputArea">Service Area:</label>
                    <select id="inputArea" name="inputArea" class="form-control">
                        <option value="select">Select Area</option>
                        <option value="local">Local/Regional</option>
                        <option value="state">State</option>
                        <option value="national">National</option>
                        <option value="global">Global</option>
                    </select>
                    <span class="incomplete d-none text-danger" id="invalid-area">
                        * Please select an area</span>
                </div>
            </div>

            <div class="form-row">
                <!-- Industry CATEGORY, Company Background -->
                <div class="form-group col">
                    <label for="company-category">Industry:</label>
                    <select id="company-category" class="form-control" name="company-category">
                        <option value="none">Select Category</option>
                        <option value="Agriculture">Agriculture</option>
                        <option value="Architecture">Architecture</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Circular-Economy">Circular Economy</option>
                        <option value="Consumer-Goods">Consumer Goods</option>
                        <option value="Construction">Construction</option>
                        <option value="Ecology">Ecology</option>
                        <option value="Education">Education</option>
                        <option value="Energy">Energy</option>
                        <option value="Housing">Housing</option>
                        <option value="Lighting">Lighting</option>
                        <option value="Manufacturing">Manufacturing</option>
                        <option value="Transportation">Transportation</option>
                        <option value="Waste-Water">Waste Water</option>
                        <option value="Other">Other...</option>
                    </select>
                </div>

                <!-- logo upload -->
                <div class="form-group col">
                    <label>Upload Your Company Logo:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo" id="logo">
                        <label class="custom-file-label" for="iconFile"></label>
                        <span class="incomplete d-none text-danger" id="invalid-logo">
                        * Please upload a logo or product image</span>
                    </div>
                </div>
            </div>

                <!--ABOUT Company -->
                <div class="form-group">
                    <label for="about">About:</label>
                    <textarea class="form-control" maxlength="250" rows="4" id="about"
                              name="about"></textarea>
                    <span class="incomplete d-none text-danger" id="invalid-about">
                        * Please tell us about the Company</span>
                </div>

                <!-- Company TAGLINE -->
                <div class="form-group">
                    <label for="tagline">Tagline:</label>
                    <textarea class="form-control" maxlength="250" rows="2" id="tagline"
                              name="tagline"></textarea>
                    <span class="incomplete d-none text-danger" id="invalid-tagline">
                        * Please tell us the company tagline</span>
                </div>
        </fieldset>


        <!-- Fieldset Company Contact Person Information-->
        <fieldset id="contact">
            <h3>Company Contact</h3>

            <!-- authorization -->
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value=""
                           id="ccAuth" name="ccAuth"> I authorize Coneybeare
                    Sustainability Catalog to publish the below person with
                    the company listing.</label><br>
                <span class="incomplete d-none text-danger" id="invalid-ccAuth">
                        * Please authorize public contact</span>
            </div><br>

            <div class="form-row">
            <!-- first name -->
            <div class="form-group col">
                <label for="cfname">First Name:</label>
                <input type="text" class="form-control" id="cfname" name="cfname">
                <span class="incomplete d-none text-danger" id="invalid-cfname">
                * Please enter first name</span>
            </div>

            <!-- last name -->
            <div class="form-group col">
                <label for="clname">Last Name:</label>
                <input type="text" class="form-control" id="clname" name="clname">
                <span class="incomplete d-none text-danger" id="invalid-clname">
                * Please enter last name</span>
            </div>
            </div>

            <!--  EMAIL -->
            <div class="form-group">
                <label for="contact-email">Email address:</label>
                <input type="email" class="form-control" id="contact-email" name="contact-email"
                       pattern="[\w!#$%&'*+/=?^`{|}~\.\-]+@[A-z0-9]+\.[A-z0-9]+">
                <span class="incomplete d-none text-danger" id="invalid-conEmail">
                * Please enter e-mail</span>
            </div>
        </fieldset><br>



        <!-- Fieldset POINT OF CONTACT Information-->
        <fieldset id="poc">
            <h3>Point of Contact</h3>

            <!-- authorization -->
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value=""
                    id="pocAuth" name="pocAuth"> I authorize Coneybeare
                    Sustainability Catalog to contact the below listed person for
                    more information.</label><br>
                <span class="incomplete d-none text-danger" id="invalid-pocAuth">
                * Please authorize a point of contact</span>
            </div><br>

            <div class="form-row">

            <!-- first name -->
            <div class="form-group col">
                <label for="pfname">First Name:</label>
                <input type="text" class="form-control" id="pfname" name="pfname">
                <span class="incomplete d-none text-danger" id="invalid-pfname">
                * Please enter first name</span>
            </div>

            <!-- last name -->
            <div class="form-group col">
                <label for="plname">Last Name:</label>
                <input type="text" class="form-control" id="plname" name="plname">
                <span class="incomplete d-none text-danger" id="invalid-plname">
                * Please enter last name</span>
            </div>
            </div>

            <!--  EMAIL -->
            <div class="form-group">
                <label for="p-email">Email address:</label>
                <input type="email" class="form-control" id="pEmail" name="pEmail"
                       pattern="[\w!#$%&'*+/=?^`{|}~\.\-]+@[A-z0-9]+\.[A-z0-9]+">
                <span class="incomplete d-none text-danger" id="invalid-pEmail">
                * Please enter a contact e-mail</span>
            </div>
            <button type="submit" class="btn btn-success" id="submitBTN">
                Submit
            </button>
        </fieldset>
        </div>

    </form><!-- END of id="pcform" -->
    </div>


    <!-- Link to the universal Footer -->
    <?php
    include('../includes/footer.html');
    ?>

    <!-- Links to Bootstrap libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>

    <!-- Link to style sheet -->
    <script src="confirm.js"></script>
</body>
</html>

<!--
row-cols-1 row-cols-md-2 row-cols-lg3



-->