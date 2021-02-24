<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/styles.css">
    <title>Coneybeare Catalog Admin Homepage</title>
</head>
<body>
<nav class="bg-warning text-dark nav navbar">
    <a class="navbar-brand navbar-link" href="/">Coneybeare Admin Page</a>
    <div class="navbar-nav">
        <span class="ml-auto">Welcome Admin!</span>
    </div>
</nav>

<div class="alert-box" id="alert">
    <div class="d-flex align-items-center justify-content-center h-100">
        <span id="alert-content">Success!!</span>
    </div>
</div>

<div class="row">
    <div class="col-2 bg-gray py-3"> <!-- Left Navigation (eventually need to become an include)-->
        <span>Left Nav, currently empty</span>
    </div>
    <div class="col-8 p-3"> <!-- Main Area -->
        <div>
            <h2>Companies Pending Approval</h2>
            <div class="rounded-border d-flex m-0 p-0" id="1">
                <div class="company m-0 p-0 row flex-grow-1">
                    <div class="col-4 col-lg-2 bottom-divider">
                        <span class="category">Company</span>
                        <br>
                        <span class="max-lines-2">All Power Labs</span>
                    </div>
                    <div class="col-8 col-lg-4 bottom-divider">
                        <span class="category">About Us</span>
                        <br>
                        <span class="max-lines-2">Wood -> Energy via very efficient gasification.</span>
                    </div>
                    <div class="col-3 col-lg-2">
                        <span class="category">Category</span>
                        <br>
                        <svg class="db-icon">
                            <use href="/images/symbol-defs.svg#energy"></use>
                        </svg>
                        <span class="max-lines-2">Energy</span>
                    </div>
                    <div class="col-3 col-lg-2">
                        <span class="category">Contact Info</span>
                        <br>
                        <span class="max-lines-2"><a href="http://allpowerlabs.com">Website</a></span>
                    </div>
                    <div class="col-6 col-lg-2 ">
                        <span class="category">Location</span>
                        <br>
                        <span class="max-lines-2">Berkeley, CA</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-around flex-column flex-lg-row">
                    <svg class="button accept"
                         onclick="acceptCompany('1')">
                        <use href="/images/symbol-defs.svg#button-accept"></use>
                    </svg>
                    <svg class="button cancel"
                         onclick="rejectCompany('1')">
                        <use href="/images/symbol-defs.svg#button-cancel"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2 bg-gray py-3"> <!-- Right Navigation (eventually needs to become an include) -->
        <span>Right Nav, current empty</span>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="scripts/notifs.js"></script>
</body>
</html>