<!--
    This file holds the HTML code for the CbCSC
            Confirmation web page.
    Date: Saturday 23rd of January, 2021
    Updated: Tuesday 26th of January, 2021
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
    <title>Sign Up - Coneybeare Cleantech</title>

</head>
<body>

    <!-- Link to the universal Header/Navigation -->
    <?php
        include('../includes/header.html');
    ?>

    <!-- container for the entire web form -->
    <div class="container p-3 my-3 border" id="formContainer">

    <!-- Information Form -->
    <form action="confirm.php" method="get" class="form" id="form">

        <!-- Fieldset COMPANY Information-->
        <fieldset id="company-info">
            <h2>Company2 Information</h2><br>

            <div class="form-row">
                <!-- Company NAME input -->
                <div class="form-group col-6">
                    <label for="company-name">Company Name:</label>
                    <input type="text" class="form-control" name="company-name" id="company-name">
                    <span class="incomplete d-none text-danger" id="invalid-cName">
                        * Please enter Company name</span>
                </div>

                <!-- Comapny Webiste input -->
                <div class="form-group col-6">
                    <label for="company-website">Company Website: </label>
                    <input type="text" class="form-control" name="company-website" id="company-website"
                           pattern="(?:(?:http(?:s)?:\/\/)?(?:www\.)?)?(?<domain>[\w\.-]+){1}(?<path>.*)">
                    <span class="incomplete d-none text-danger" id="invalid-cSite">
                        * Please enter the Company Web Address</span>
                </div>
            </div>

            <!-- logo upload -->
            <label>Upload Your Company Logo:</label>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="iconFile" id="iconFile">
                    <label class="custom-file-label" for="iconFile"></label>
                </div>
            </div>

            <!--Company COUNTRY  -->
                <div class="form-group col-4">
                    <label for="inputCountry">Country:</label>
                    <select id="inputCountry" name="country" class="form-control">
                        <?php
                            include('confirm-includes/countries.html');
                        ?>
                    </select>
                    <span class="incomplete d-none text-danger" id="invalid-Country">
                    * Please enter a Country</span>
                </div>
            </div>

            <!--Company STATE -->
            <div class="form-group col-3">
                <label for="inputState">State:</label>
                <select id="inputState" name="state" class="form-control">
                    <!-- Link to the universal Header/Navigation -->
                    <?php
                    include('confirm-includes/states.html');
                    ?>
                </select>
                <span class="incomplete d-none text-danger" id="invalid-state">
                    * Please enter a State </span>
            </div>

            <!-- Company GROUP CITY STATE ZIP -->
            <div class="form-row">

                <!--Company CITY  -->
                <div class="form-group col-5">
                    <label for="inputCity">City:</label>
                    <input type="text" class="form-control" name="inputCity" id="inputCity">
                    <span class="incomplete d-none text-danger" id="invalid-city">
                            * Please enter an address</span>
                </div>

        <!-- CATEGORY, Company Background -->
            <div class="form-row">
                <div class="form-group col-6">
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
                    <span class="incomplete d-none text-danger" id="invalid-category">
                    * Please select a category</span>
                </div>

            <!-- Geographical area in which they serve -->
                <div class="form-group col-6">
                    <label for="inputArea">Service Area:</label>
                    <select id="inputArea" name="area" class="form-control">
                        <option value="select">Company's Geographical area served</option>
                        <option value="local">Local/Regional</option>
                        <option value="state">State</option>
                        <option value="national">National</option>
                        <option value="global">Global</option>
                    </select>
                </div>
            </div>

        <!--ABOUT Company -->
            <div class="form-group">
                <label for="about">About:</label>
                <textarea class="form-control" maxlength="250" rows="6" id="about"
                          name="company-about"></textarea>
                <span class="incomplete d-none text-danger" id="invalid-about">
                    * Please tell us about the Company</span>
            </div>

        <!--ABOUT Company -->
            <div class="form-group">
                <label for="about">Tagline:</label>
                <textarea class="form-control" maxlength="250" rows="6" id="tagline"
                          name="company-about"></textarea>
                <span class="incomplete d-none text-danger" id="invalid-tagline">
                    * Please tell us the Company tagline</span>
            </div>

        </fieldset>

        <!-- Fieldset Point of Contact Information-->
        <fieldset id="contact">
            <h2>Point of Contact</h2>
            <p class="text-muted">(This person will be the main point of contact for your company)</p>
            <br>
            <!-- first name -->
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname">
                    <span class="incomplete d-none text-danger" id="invalid-fname">
                    * Please enter first name</span>
                </div>

                <!-- last name -->
                <div class="form-group col-4">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname">
                    <span class="incomplete d-none text-danger" id="invalid-lname">
                    * Please enter last name</span>
                </div>

            <!--  EMAIL -->
                <div class="form-group col-4">
                    <label for="company-email">Email address:</label>
                    <input type="email" class="form-control" id="company-email"
                           pattern="[\w!#$%&'*+/=?^`{|}~\.\-]+@[A-z0-9]+\.[A-z0-9]+">
                    <span class="incomplete d-none text-danger" id="invalid-eEmail">
                    * Please enter e-mail</span>
                </div>

            </div>
        </fieldset>
        </fieldset>

        <button type="submit" class="btn btn-success" id="submitBTN">
            Submit
        </button>
    </form><!-- END of id="pcform" -->
    </div><!--END of id="container" -->

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