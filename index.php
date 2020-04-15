<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PC314 - HOME</title>
    <link rel="stylesheet" href="style/pcstyle.css">
</head>
<body>

<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a>
</div>

<div>
    <ul style="font-size: 40px">
        <li><a href="#home">Home</a></li>
        <li><a href="product.php">Product</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="users.php">User Info</a></li>
    </ul>
</div>

<hr>

<div id="home">
    <h1>
        Home
    </h1>

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

<div id="product">
    <h1>
        Products
    </h1>

    <h2>Laptop</h2>

    <h3>DELL</h3>

    <h3>Apple</h3>

    <h3>ASUS</h3>

    <h3>SAMSUNG</h3>

    <h2>Desktop</h2>

    <h3>DELL</h3>

    <h3>Apple</h3>

    <h3>ASUS</h3>

    <h3>SAMSUNG</h3>

    <h2>
        Components
    </h2>

    <h3>Mother-board</h3>
    <h3>RAM</h3>
    <h3>Hard Disk</h3>
    <h3>Graphic Cards</h3>
    <h3>Power Supply</h3>
    <h3>Fan and Cool</h3>
    <h3>Monitors</h3>

</div>

<hr>

<div id="news">
    <h1>
        News
    </h1>

    <h2>AMD Wins El Capitan: EPYC Genoa and Radeon Instinct to Power Two-Exaflop DOE Supercomputer</h2>

    <p>AMD scored another big win today with the announcement that the U.S. Department of Energy (DOE) has selected its
        next-next-gen EPYC Genoa processors with the Zen 4 architecture and Radeon GPUs to power the $600 million EL
        Capitan, a two-exaflop system that will be faster than the top 200 supercomputers in service today, combined.

        AMD beat out both Intel and Nvidia for the contract, making this AMD's second win for an exascale system with
        the DOE (details on Frontier here). Meanwhile, Intel previously won the contract for the DOE's third (and only
        remaining) exascale supercomputer, Aurora.

        Many analysts had contended that the DOE would offer the El Capitan contract to Nvidia, so today's announcement
        marks another loss for Nvidia, which currently isn't participating in any known exascale-class supercomputer
        project. That's particularly interesting because Nvidia GPUs currently dominate the Top 500 supercomputers and
        are the leading solution for GPU-accelerated compute in the data center.

        The DOE originally announced El Capitan in August 2019, but at the time the agency hadn't come to a final
        decision on either the CPUs or GPUs that would power what will soon be the world's fastest supercomputer. That's
        because the agency engaged in a late-binding contract process to suss out which vendor could provide the best
        solution for a system that would be deployed in late 2022 and operational in 2023, meaning it evaluated future
        technology from multiple vendors.

        As such, it's telling that the DOE selected AMD's next-gen platforms, as it highlights that its next-gen
        products are more suitable for the project than either Intel or Nvidia's future offerings. It's also noteworthy
        that the system has a particular focus on AI and machine learning workloads.

        The DOE also revised the performance projections: The agency originally projected 1.5 exaflops of performance,
        but after considering the capabilities of the chosen AMD processors and graphics cards, revised that figure up
        to two exaflops of performance (double-precision). That's 16 times faster than the IBM/Nvidia Sierra system it
        will replace, which is currently the second-fastest supercomputer in the world, and ten times faster than
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
        PC314 is a top computer hardware solution provider, we have a professional team and more than ten years of
        experience
        to provide you with reliable installation and deployment solutions.
    </p>
</div>

</body>
</html>