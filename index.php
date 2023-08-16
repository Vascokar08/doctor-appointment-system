<?php
include_once 'assets/conn/dbconnect.php';

?>



<?php
session_start();

if (isset($_SESSION['patientSession']) != "") {
    header("Location: patient/patient.php");
}
if (isset($_POST['login'])) {
    $icPatient = mysqli_real_escape_string($con, $_POST['icPatient']);
    $password  = mysqli_real_escape_string($con, $_POST['password']);

    $res = mysqli_query($con, "SELECT * FROM patient WHERE icPatient = '$icPatient'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    if ($row['password'] == $password) {
        $_SESSION['patientSession'] = $row['icPatient'];
?>
        <script type="text/javascript">
            alert('Login Success');
        </script>
    <?php
        header("Location: patient/patient.php");
    } else {
    ?>
        <script>
            alert('wrong input ');
        </script>
<?php
    }
}
?>

<?php
if (isset($_POST['signup'])) {
    $patientFirstName = mysqli_real_escape_string($con, $_POST['patientFirstName']);
    $patientLastName  = mysqli_real_escape_string($con, $_POST['patientLastName']);
    $patientEmail     = mysqli_real_escape_string($con, $_POST['patientEmail']);
    $icPatient     = mysqli_real_escape_string($con, $_POST['icPatient']);
    $password         = mysqli_real_escape_string($con, $_POST['password']);
    $month            = mysqli_real_escape_string($con, $_POST['month']);
    $day              = mysqli_real_escape_string($con, $_POST['day']);
    $year             = mysqli_real_escape_string($con, $_POST['year']);
    $patientDOB       = $year . "-" . $month . "-" . $day;
    $patientGender = mysqli_real_escape_string($con, $_POST['patientGender']);

    $query = " INSERT INTO patient (  icPatient, password, patientFirstName, patientLastName,  patientDOB, patientGender,   patientEmail )
VALUES ( '$icPatient', '$password', '$patientFirstName', '$patientLastName', '$patientDOB', '$patientGender', '$patientEmail' ) ";
    $result = mysqli_query($con, $query);

    if ($result) {
?>
        <script type="text/javascript">
            alert('Register success. Please Login to make an appointment.');
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('User already registered. Please try again');
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DR.POOJA'S CLINIC</title>

    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style1.css" rel="stylesheet">
    <link href="assets/css/blocks.css" rel="stylesheet">
    <link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
    <link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">

    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="assets/css/material.css" rel="stylesheet">
    <style>
        @import url('http://fonts.googleapis.com/css?family=Open+Sans:400,700');

        * {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: url("./losing-fam-dr.png")no repeat;
            background-repeat: repeat;
        }

        html {
            background-color: #eaf0f2;
        }

        header {
            text-align: center;
            padding-top: 100px;
            margin-bottom: 300px;
            font-size: 35px;
        }

        header h2 {
            color: #f0525f;
        }

        header span {
            color: #eaa03f;
        }



        footer {
            position: fixed;
            bottom: 0;
        }

        @media (max-height:800px) {
            footer {
                position: static;
            }

            header {
                padding-top: 40px;
            }
        }

        .footer-distributed {
            background-color: #2d2a30;
            box-sizing: border-box;
            width: 100%;
            text-align: left;
            font: bold 16px sans-serif;
            padding: 50px 50px 60px 50px;
            margin-top: 80px;
        }

        .footer-distributed .footer-left,
        .footer-distributed .footer-center,
        .footer-distributed .footer-right {
            display: inline-block;
            vertical-align: top;
        }



        .footer-distributed .footer-left {
            width: 30%;
        }

        .footer-distributed h3 {
            color: #ffffff;
            font: normal 36px 'Cookie', cursive;
            margin: 0;
        }


        .footer-distributed h3 span {
            color: #e0ac1c;
        }



        .footer-distributed .footer-links {
            color: #ffffff;
            margin: 20px 0 12px;
        }

        .footer-distributed .footer-links a {
            display: inline-block;
            line-height: 1.8;
            text-decoration: none;
            color: inherit;
        }

        .footer-distributed .footer-company-name {
            color: #8f9296;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
        }



        .footer-distributed .footer-center {
            width: 35%;
        }

        .footer-distributed .footer-center i {
            background-color: #33383b;
            color: #ffffff;
            font-size: 25px;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            text-align: center;
            line-height: 42px;
            margin: 10px 15px;
            vertical-align: middle;
        }

        .footer-distributed .footer-center i.fa-envelope {
            font-size: 17px;
            line-height: 38px;
        }

        .footer-distributed .footer-center p {
            display: inline-block;
            color: #ffffff;
            vertical-align: middle;
            margin: 0;
        }

        .footer-distributed .footer-center p span {
            display: block;
            font-weight: normal;
            font-size: 14px;
            line-height: 2;
        }

        .footer-distributed .footer-center p a {
            color: #e0ac1c;
            text-decoration: none;
            ;
        }

        /* Footer Right */

        .footer-distributed .footer-right {
            width: 30%;
        }

        .footer-distributed .footer-company-about {
            line-height: 20px;
            color: #92999f;
            font-size: 13px;
            font-weight: normal;
            margin: 0;
        }

        .footer-distributed .footer-company-about span {
            display: block;
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-distributed .footer-icons {
            margin-top: 25px;
        }

        .footer-distributed .footer-icons a {
            display: inline-block;
            width: 35px;
            height: 35px;
            cursor: pointer;
            background-color: #33383b;
            border-radius: 2px;
            font-size: 20px;
            color: #ffffff;
            text-align: center;
            line-height: 35px;
            margin-right: 3px;
            margin-bottom: 5px;
        }

        .footer-distributed .footer-icons a:hover {
            background-color: #3F71EA;
        }

        .footer-links a:hover {
            color: #3F71EA;
        }

        @media (max-width: 880px) {

            .footer-distributed .footer-left,
            .footer-distributed .footer-center,
            .footer-distributed .footer-right {
                display: block;
                width: 100%;
                margin-bottom: 40px;
                text-align: center;
            }

            .footer-distributed .footer-center i {
                margin-left: 0;
            }
        }
    </style>
</head>
<div class="top-strip">
    <div class="container">
        <div class="stripe-title">
            <marquee behavior="scroll" gap="0" truespeed="" direction="scroll" scrollamount="2" scrolldelay="40" onmouseover="this.stop();" onmouseout="this.start();">
                <div class="marqu-flex">
                    <h6>
                        <a href="" style="text-align: center; font-size: 16px ; color:red;bottom: 90px;">
                            NOTICE :Doctor available only on Monday to Wednesday every 2 hour from 10 to 12pm and 4 to 6pm.
                        </a>
                    </h6>
                    <h6>
                        <a href="" style="text-align: center; font-size: 16px ;color:red">
                            Thursday only 4 to 6pm and Friday only 9-12pm.
                        </a>
                    </h6>
                </div>
            </marquee>
        </div>
    </div>
</div>

<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img alt="Brand" src="assets/img/logo.png" height="40px width=" 50px"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">



                    <li><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>

                    <li>
                        <p class="navbar-text">Already have an account?</p>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">

                                        <form class="form" role="form" method="POST" accept-charset="UTF-8">
                                            <div class="form-group">
                                                <label class="sr-only" for="icPatient">Email</label>
                                                <input type="text" class="form-control" name="icPatient" placeholder="IC Number" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Sign in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Sign Up</h3>
                </div>

                <div class="modal-body">


                    <div class="container" id="wrap">
                        <div class="row">
                            <div class="col-md-6">

                                <form action="<?php $_PHP_SELF ?>" method="POST" accept-charset="utf-8" class="form" role="form">
                                    <h4>It's free and always will be.</h4>
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <input type="text" name="patientFirstName" value="" class="form-control input-lg" placeholder="First Name" required />
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <input type="text" name="patientLastName" value="" class="form-control input-lg" placeholder="Last Name" required />
                                        </div>
                                    </div>

                                    <input type="text" name="patientEmail" value="" class="form-control input-lg" placeholder="Your Email" required />
                                    <input type="number" name="icPatient" value="" class="form-control input-lg" placeholder="Your IC Number" required />


                                    <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password" required />

                                    <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password" required />
                                    <label>Birth Date</label>
                                    <div class="row">

                                        <div class="col-xs-4 col-md-4">
                                            <select name="month" class="form-control input-lg" required>
                                                <option value="">Month</option>
                                                <option value="01">Jan</option>
                                                <option value="02">Feb</option>
                                                <option value="03">Mar</option>
                                                <option value="04">Apr</option>
                                                <option value="05">May</option>
                                                <option value="06">Jun</option>
                                                <option value="07">Jul</option>
                                                <option value="08">Aug</option>
                                                <option value="09">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4 col-md-4">
                                            <select name="day" class="form-control input-lg" required>
                                                <option value="">Day</option>
                                                <option value="01">1</option>
                                                <option value="02">2</option>
                                                <option value="03">3</option>
                                                <option value="04">4</option>
                                                <option value="05">5</option>
                                                <option value="06">6</option>
                                                <option value="07">7</option>
                                                <option value="08">8</option>
                                                <option value="09">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4 col-md-4">
                                            <select name="year" class="form-control input-lg" required>
                                                <option value="">Year</option>

                                                <option value="1981">1981</option>
                                                <option value="1982">1982</option>
                                                <option value="1983">1983</option>
                                                <option value="1984">1984</option>
                                                <option value="1985">1985</option>
                                                <option value="1986">1986</option>
                                                <option value="1987">1987</option>
                                                <option value="1988">1988</option>
                                                <option value="1989">1989</option>
                                                <option value="1990">1990</option>
                                                <option value="1991">1991</option>
                                                <option value="1992">1992</option>
                                                <option value="1993">1993</option>
                                                <option value="1994">1994</option>
                                                <option value="1995">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                                <option value="1998">1998</option>
                                                <option value="1999">1999</option>
                                                <option value="2000">2000</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                                <option value="2004">2004</option>
                                                <option value="2005">2005</option>
                                                <option value="2006">2006</option>
                                                <option value="2007">2007</option>
                                                <option value="2008">2008</option>
                                                <option value="2009">2009</option>
                                                <option value="2010">2010</option>
                                                <option value="2011">2011</option>
                                                <option value="2012">2012</option>
                                                <option value="2013">2013</option>
                                            </select>
                                        </div>
                                    </div>
                                    <label>Gender : </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="patientGender" value="male" required />Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="patientGender" value="female" required />Female
                                    </label>
                                    <br />
                                    <span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>

                                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup" id="signup">Create my account</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="promo-1" class="content-block promo-1 min-height-600px bg-offwhite">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2>MAKE APPOINTMENT TODAY!</h2>
                    <p>THIS IS DOCTOR'S SCHEDULE. PLEASE <span class="label label-danger">LOGIN</span> TO MAKE AN APPOINTMENT </p>



                    <div class="input-group" style="margin-bottom:10px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar">
                            </i>
                        </div>
                        <input class="form-control" id="date" name="date" value="<?php echo date("Y-m-d") ?>" onchange="showUser(this.value)" />
                    </div>


                    <script>
                        function showUser(str) {

                            if (str == "") {
                                document.getElementById("txtHint").innerHTML = "";
                                return;
                            } else {
                                if (window.XMLHttpRequest) {

                                    xmlhttp = new XMLHttpRequest();
                                } else {

                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                xmlhttp.onreadystatechange = function() {
                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                                    }
                                };
                                xmlhttp.open("GET", "getuser.php?q=" + str, true);
                                console.log(str);
                                xmlhttp.send();
                            }
                        }
                    </script>

                    <div id="txtHint"><b> </b></div>

                </div>

            </div>

        </div>
    </section>

    <footer class="footer-distributed">

        <div class="footer-left">
            <h3>DR.Pooja's<span>Clinic</span></h3>

            <br>
            <p class="footer-company-name">Copyright © 2023 <strong>Shivam Korgaonkar</strong> All rights reserved</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>UPASNAGAR</span>
                    SANCOALE,SOUTH-GOA</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+91 7507986584</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="https://portfolioshivam08.netlify.app/">shivamkorgaonkar2021@gmail.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the clinic</span>
                <strong></strong> At our clinic, we offer a wide range of services, from routine check-ups and preventive care to specialized treatments for various medical conditions. Our goal is to promote overall well-being, manage chronic illnesses, and address acute health concerns. We believe in a patient-centered approach, where we take the time to listen to your health concerns, answer your questions,
                and create a tailored treatment plan that meets your needs.
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
        </div>

        <p class="pull-right small"><a href="adminlogin.php">admin</a></p>
    </footer>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/date/bootstrap-datepicker.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/collapse.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').focus()
        })
    </script>


    <script>
        $(document).ready(function() {
            var date_input = $('input[name="date"]');
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })

        })
    </script>



</body>

</html>