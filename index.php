<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PC314 - Products</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/shop-homepage.css" rel="stylesheet">

</head>

<body>

<div><br></div>

<!-- Navigation -->
<?php
include "header.php";
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Welcome!</h1>
            <div class="list-group">
                <a href="#news" class="list-group-item">News</a>
                <a href="#contact" class="list-group-item">Contacts</a>
                <a href="#about" class="list-group-item">About</a>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div id="home">

                <br>

                <h2>Latest Hardware Info and Buy Choice</h2>

                <p>We provided latest Hardware information and do the review for you.</p>

                <h2>Professional PC-Build Advice</h2>

                <p>Our professional team will listen to your requirements and give you the best advice.</p>

                <h2>Reliable 3rd-Party Components Suggestion</h2>

                <p>All the 3rd-Party components sold by us are reliable.</p>

                <h2>Long-term After-sale Service</h2>

                <p>We provide 12-month after-sale support.</p>
            </div>

            <hr>

            <div id="news">
                <h1>
                    News
                </h1>

                <h2>AMD Wins El Capitan: EPYC Genoa and Radeon Instinct to Power Two-Exaflop DOE Supercomputer</h2>

                <p>AMD scored another big win today with the announcement that the U.S. Department of Energy (DOE) has
                    selected its
                    next-next-gen EPYC Genoa processors with the Zen 4 architecture and Radeon GPUs to power the $600
                    million EL
                    Capitan, a two-exaflop system that will be faster than the top 200 supercomputers in service today,
                    combined.

                    AMD beat out both Intel and Nvidia for the contract, making this AMD's second win for an exascale
                    system with
                    the DOE (details on Frontier here). Meanwhile, Intel previously won the contract for the DOE's third
                    (and only
                    remaining) exascale supercomputer, Aurora.

                    Many analysts had contended that the DOE would offer the El Capitan contract to Nvidia, so today's
                    announcement
                    marks another loss for Nvidia, which currently isn't participating in any known exascale-class
                    supercomputer
                    project. That's particularly interesting because Nvidia GPUs currently dominate the Top 500
                    supercomputers and
                    are the leading solution for GPU-accelerated compute in the data center.

                    The DOE originally announced El Capitan in August 2019, but at the time the agency hadn't come to a
                    final
                    decision on either the CPUs or GPUs that would power what will soon be the world's fastest
                    supercomputer. That's
                    because the agency engaged in a late-binding contract process to suss out which vendor could provide
                    the best
                    solution for a system that would be deployed in late 2022 and operational in 2023, meaning it
                    evaluated future
                    technology from multiple vendors.

                    As such, it's telling that the DOE selected AMD's next-gen platforms, as it highlights that its
                    next-gen
                    products are more suitable for the project than either Intel or Nvidia's future offerings. It's also
                    noteworthy
                    that the system has a particular focus on AI and machine learning workloads.

                    The DOE also revised the performance projections: The agency originally projected 1.5 exaflops of
                    performance,
                    but after considering the capabilities of the chosen AMD processors and graphics cards, revised that
                    figure up
                    to two exaflops of performance (double-precision). That's 16 times faster than the IBM/Nvidia Sierra
                    system it
                    will replace, which is currently the second-fastest supercomputer in the world, and ten times faster
                    than
                    Summit, the current leader.

                    Now, on to the technical bits. </p>

            </div>

            <hr>

            <div id="contact">
                <h1>
                    Contacts
                </h1>

                <?php
                $contact = fopen("resource/contacts.txt", "r") or die("File wrong!");
                while (!feof($contact)) {
                    echo fgets($contact) . "<br />";
                }
                fclose($contact)
                ?>

            </div>

            <hr>

            <div id="about">
                <h1>
                    About
                </h1>

                <p>
                    PC314 is a top computer hardware solution provider, we have a professional team and more than ten
                    years of
                    experience
                    to provide you with reliable installation and deployment solutions.
                </p>
            </div>
        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<?php
include "footer.php"
?>

</body>

</html>
