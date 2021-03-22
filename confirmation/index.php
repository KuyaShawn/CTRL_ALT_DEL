<!--
    This file holds the HTML code for the CbCSC
            Confirmation web page.
    Updated: Sunday March 21st 2021
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
    <link rel="stylesheet" href="/styles/tagging-styles.css">

</head>

<body>

    <!-- Link to the universal Header/Navigation -->
    <?php
        include('../includes/header.html');
    ?>

    <!-- container for the entire web form -->
    <div class="container p-3 my-3" id="formContainer">

    <!-- Information Form -->
    <form enctype="multipart/form-data" action="confirm.php" method="post"
          class="form" id="form">
        <h5>Please complete the form below to be considered for the
            Sustainability Catalog</h5><br>

        <!-- Fieldset COMPANY Information-->
        <fieldset id="company-info">
            <h3>Company Information</h3><br>
            <p> Information provided in this section, if provided,
                will be included in the Sustainability Catalog</p>

            <!-- Public Company Information authorization -->
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value=""
                           id="public_authorization" name="public_authorization">
                            I authorize Coneybeare to publish the below information
                            to their publicly available Sustainability Catalog .</label><br>
                <span class="incomplete d-none text-danger" id="invalid-public_authorization">
                * Please authorize publishing public information</span>
            </div><br>

            <div class="form-row">
                <!-- Company NAME input -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="company_name">Company Name:</label>
                    <input type="text" class="form-control" name="company_name" id="company_name">
                    <span class="incomplete d-none text-danger" id="invalid-company_name">
                        * Please enter Company name</span>
                </div>

                <!-- Company Website input -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="url">Company Website: </label>
                    <input type="text" class="form-control" name="url" id="url"
                           pattern="(?:(?:http(?:s)?:\/\/)?(?:www\.)?)?(?<domain>[\w-]+\.[A-z]{2,}){1}(?<path>.*)">
                    <span class="incomplete d-none text-danger" id="invalid-url">
                        * Please enter the Company Web Address</span>
                </div>
            </div>

            <div class="form-row">
                <!--  EMAIL -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="public_email">Email address:</label>
                    <input type="email" class="form-control" id="public_email" name="public_email"
                           pattern="/^[\w!#$%&\'*+\/=?^`{|}~.-]+@[\w]+\.[\w]+$/">
                    <span class="incomplete d-none text-danger" id="invalid-public_email">
                * Please enter e-mail</span>
                </div>

                <!--Company TELEPHONE -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="public_phone">Phone number:</label>
                    <input type="tel" class="form-control" id="public_phone" name="public_phone"
                           placeholder="888-123-0042" pattern="[0-9]{10}">
                </div>
            </div>

            <div class="form-row">
                <!--ADDRESS Line 1 -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="street_address">Address:</label>
                    <input type="text" class="form-control" id="street_address"
                          name="street_address" placeholder="1234 Main St.">
                    <span class="recommended" id="invalid-private_phone">
                        This company will not appear on the map if an address is not supplied. </span>
                    <!-- <span class="incomplete d-none text-danger" id="invalid-street_address">
                        * Please enter Company address</span> -->

                </div>

                <!-- Company ADDRESS 2 OPTIONAL -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="street_address2">Address 2:</label>
                    <input type="text" class="form-control" id="street_address2"
                           name="street_address2" placeholder="Suite 1234-B">
                </div>
            </div>


            <div class="form-row">
                <!--Company COUNTRY  -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="country">Country:</label>
                    <select id="country" name="country" class="form-control">
                        <?php
                        include('confirm-includes/countries.html');
                        ?>
                     </select>
                    <span class="incomplete d-none text-danger" id="invalid-country">
                        * Please enter a Country</span>

                </div>

                <!--Company STATE -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="state">State:</label>
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
                <div class="form-group col-md-12 col-lg-6">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" name="city" id="city">
                    <span class="incomplete d-none text-danger" id="invalid-city">
                                * Please enter a city</span>
                </div>

                <!-- Company Zipcode-->
                <div class="form-group col">
                    <label for="zipcode">Zipcode:</label>
                    <textarea class="form-control" maxlength="12" rows="1" id="zipcode"
                              name="zipcode"></textarea>
                </div>
            </div>


            <div class="form-row">
                <!-- Geographical area in which they serve -->
                <div class="form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="service_area">Service Area:</label>
                    <select id="service_area" name="service_area" class="form-control">
                        <option value="select">Select Area</option>
                        <option value="local">Local/Regional</option>
                        <option value="state">State</option>
                        <option value="national">National</option>
                        <option value="global">Global</option>
                    </select>
                    <span class="incomplete d-none text-danger" id="invalid-service_area">
                                * Please select an area</span>
                </div>

                <!-- CATEGORY, Industry for the Company's Economic Background -->
                <div class="form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="category_id">Industry:</label>
                    <select id="category_id" class="form-control" name="category_id">
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
                    <span class="incomplete d-none text-danger" id="invalid-category_id">
                                * Please select an Industry</span>
                </div>

                <!-- logo upload -->
                <div class="form-group col-md-12 col-lg-4">
                    <label for="iconFile">Upload Your Company Logo:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="iconFile" name="iconFile">
                        <label class="custom-file-label" for="iconFile">Choose file</label>
                    </div>
                    <span class="recommended" id="invalid-logo">
                        It is highly recommended to upload a logo or product image</span>
                </div>
            </div>

            <div class="form-row">
                <!-- Company TAGLINE / ABOUT-->
                <div class="form-group col">
                    <label for="about">Tagline:</label>
                    <textarea class="form-control" maxlength="250" rows="2" id="about"
                              name="about"></textarea>
                    <span class="incomplete d-none text-danger" id="invalid-about">
                        * Please enter the company Tagline</span>
                </div>
            </div>

            <div class="form-row">
                <!--Keywords Company -->
                <div class="form-group col">
                    <label for="tagInput">Search Tags: <br>Please add a comma after each phrase. Example:
                            open source, agriculture, </label>
                    <div class="form-control d-flex tag-form">
                        <div id="tagList" class="tag-list">
                            <input class="tag-input" type="text" id="tagInput" name="tagPostString">
                        </div>
                    </div>
                    <span class="char-count" id="tagCharCount">0 / 250</span>
                </div>
            </div>
        </fieldset><br>



        <!-- Fieldset Private CONTACT Information-->
        <fieldset id="poc">
            <h3>Private Contact</h3>
            <p>This is who we will contact if any circumstance arises with the listing</p>
            <!-- authorization -->
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value=""
                    id="private_authorization" name="private_authorization"> I authorize
                    Coneybeare Sustainability Catalog to contact the below listed person for
                    more information.</label><br>
                <span class="incomplete d-none text-danger" id="invalid-private_authorization">
                * Please authorize a private contact.</span>
            </div><br>

            <div class="form-row">

                <!-- first name -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="private_contact_name">First Name:</label>
                    <input type="text" class="form-control" id="private_contact_name" name="private_contact_name">
                    <span class="incomplete d-none text-danger" id="invalid-private_contact_name">
                    * Please enter first name</span>
                </div>

                <!-- last name -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="private_contact_last">Last Name:</label>
                    <input type="text" class="form-control" id="private_contact_last" name="private_contact_last">
                    <span class="incomplete d-none text-danger" id="invalid-private_contact_last">
                    * Please enter last name</span>
                </div>
            </div>

            <!--  EMAIL -->
            <div class="form-group">
                <label for="private_email">Email address:</label>
                <input type="email" class="form-control" id="private_email" name="private_email"
                       pattern="[\w!#$%&'*+/=?^`{|}~\.\-]+@[A-z0-9]+\.[A-z0-9]+">
                <span class="incomplete d-none text-danger" id="invalid-private_email">
                * Please enter a contact e-mail</span>
            </div>

            <div class="form-row">
                <!--Private TELEPHONE -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="private_phone">Phone number:</label>
                        <input type="tel" class="form-control" id="private_phone" name="private_phone"
                               placeholder="888-123-0042"
                               pattern="[0-9]{10}">
                    <span class="incomplete d-none text-danger" id="invalid-private_phone">
                * Please enter a contact telephone number</span>
                </div>

                <!-- Private extension -->
                <div class="form-group col-md-12 col-lg-6">
                    <label for="private_phone2">Extension:</label>
                        <input type="tel" class="form-control" id="private_phone2" name="private_phone2"
                               placeholder="1234"
                               pattern="[0-9]{}">
                </div>
            </div>


            <button type="submit" class="btn btn-success" id="submitBTN">Submit
            </button>
        </fieldset>


    </form><!-- END of id="pcform" -->
    </div>


    <!-- Link to the universal Footer -->
    <?php
    include('../includes/footer.html');
    ?>


    <template id="tagTemplate">
        <div class="tag">
            <span class="tag-text">Tag Example</span>
            <div role="button" class="tag-button" aria-label="Delete Tag">&times;</div>
        </div>
    </template>

    <!-- Links to Bootstrap libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="/scripts/tagging-scripts.js"></script>

    <!-- Link to style sheet -->
    <script src="confirm.js"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
</body>
</html>

<!--




-->