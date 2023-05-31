<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (empty(@$_SESSION["email"])) {
        echo "<script> window.location.href = '../../login.php' </script>";
    }
}
$email = $_SESSION["email"];
include '../../../includes/db_ep-inc.php';
include '../../../includes/functions-inc.php';
include '../../../includes/plugins.php';
getInfo($conn, $email);
$uname = $_SESSION['uname'];
$role = $_SESSION['role'];
$img = $_SESSION['img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Local CSS -->
    <link rel="stylesheet" href="/Employee-Portal/assets/css/dashboard_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/others/it_helpdesk/assets/css/it_helpdesk_styles.css">
    <link rel="stylesheet" href="/Employee-Portal/others/it_helpdesk/assets/css/faq_styles.css">
</head>
<title>Payreto Employee Portal | IT Helpdesk</title>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include "../../../includes/sidebar.php"; ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="heading-payreto navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center header-text">
                    <i class="fas fa-align-left tertiary-text fs-4 me-3" id="menu-toggle"></i>
                    <a class="back-icon me-3" href="/Employee-Portal/others/it_helpdesk/index.php"><i class="back-icon fa-solid fa-angle-left"></i></a>
                    <h4 class="m-0">IT HELPDESK</h4>
                </div>
                <?php
                include "../../../includes/header.php";
                ?>
            </nav>
            <div class="w-100 py-5">
                    <div class="container faq d-flex flex-column justify-content-center">
                        <h1 class="card-heading my-5 text-uppercase text-center">FAQs</h1>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="accordion accordion-flush faq" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h4 class="accordion-header" id="flush-headingOne">
                                            <a class="accordion-button collapsed text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                How to utilize your UPS
                                            </a>
                                        </h4>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <p>
                                                    <b>This is a reminder for possible power outage to keep the charges of the UPS battery and follow the suggestions below to obtain the best performance of it.</b>
                                                    <br><br>
                                                    • Keep your Payreto’s computer or laptop and other computer peripherals plugin for power backup. <br>
                                                    • Don’t put anything over the ventilation slots on the UPS, especially the sticky UPS caution labels. The UPS will get hot if you do this. <br>
                                                    • Don’t put the UPS in enclosed space, like a cupboard. The UPS will also get hot. <br>
                                                    • Put the UPS on the floor in an open area so air will circulate around and through it. <br>
                                                    • Keep the UPS Safe from liquid damage. <br> <br>


                                                    <b>When to report:</b> <br>
                                                    Strange behavior, noticeable and smelling electric burn. Repeating alarms and flashing panel lights. <br>

                                                    <b>What to do:</b> <br>
                                                    Immediately unplug the UPS device or power off and Please notify IT regarding this <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h4 class="accordion-header" id="flush-headingTwo">
                                            <a class="accordion-button collapsed text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Cyber Threat
                                            </a>
                                        </h4>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <p>
                                                    <b>Please do not open any link or file with .pif, .exe, .dll, .bat, .cmd, .scr or any executable file attachment even if it comes from our client or trusted source.</b>
                                                    <br><br>
                                                    Do not attempt to resolve any security incident on your own. Please report this incident immediately to IT Department or email us at it.support@payreto.com.<br><br>

                                                    In an effort further enhance our company’s cyber defenses, we want to highlight a common cyber-attack that everyone should be aware of – ransomware.<br><br>

                                                    <b>Ransomware</b> is increasingly being used by hackers to extort money from companies . Ransomware is a type of malicious software that takes over your computer and prevents you from accessing files until you pay a ransom. <br><br>

                                                    Although we maintain controls to help protect our networks and computers from this type of attack, with the quickly changing attack scenarios we rely on you to be our first line of defense. <br><br>

                                                    <b>Think Before You Click!</b> <br>

                                                    The most common way ransomware enters corporate networks is through email. Often, scammers will include malicious links or attachments in emails that look harmless. To avoid this trap, please observe the following email best practices: <br>

                                                    • Do not click on links or attachments from senders that you do not recognize. Be especially wary of compressed or executable file types. <br>
                                                    • Do not provide sensitive personal information (like usernames and passwords) over email. <br>
                                                    • Watch for email senders that use suspicious or misleading domain names. <br>
                                                    • If you can’t tell if an email is legitimate or not, please report immediately to the IT Department. <br>
                                                    • Be cautious when opening attachments or clicking links if you receive an email containing a warning banner indicating that it originated from an external source. <br> <br>


                                                    <b>If Something Seems Wrong, Notify IT</b> <br>
                                                    If your computer is infected with ransomware, you will typically be locked out of all programs and a “ransom screen” will appear. In the unfortunate event that you click a link or attachment that you suspect is malware or ransomware, please notify IT immediately. <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h4 class="accordion-header" id="flush-headingThree">
                                            <a class="accordion-button collapsed text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                Phishing Threat
                                            </a>
                                        </h4>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <p>
                                                    <b>Although we maintain controls to help protect our networks and computers from cyber threats, we rely on you to be our first line of defense.</b>
                                                    <br><br>
                                                    Do not attempt to resolve any security incident on your own. Please report this incident immediately to IT Department or email us at it.support@payreto.com.<br><br>

                                                    We’ve outlined a few different types of phishing attacks to watch out for:<br><br>

                                                    <b>Phishing</b> - In this type of attack, hackers impersonate a real company to obtain your login credentials. You may receive an e-mail asking you to verify your account details with a link that takes you to an imposter login screen that delivers your information directly to the attackers.<br><br>
                                                    <b>Spear Phishing</b> - Spear phishing is a more sophisticated phishing attack that includes customized information that makes the attacker seem like a legitimate source. They may use your name and phone number and refer to a Company in the e-mail to trick you into thinking they have a connection to you, making you more likely to click a link or attachment that they provide.<br><br>
                                                    <b>Whaling</b> - Whaling is a popular ploy aimed at getting you to transfer money or send sensitive information to an attacker via email by impersonating a real company executive. Using a fake domain that appears similar to ours, they look like normal emails from a high-level official of the company, typically the CEO or CFO, and ask you for sensitive information (including usernames and passwords).<br><br>
                                                    <b>Cloning Phishing</b> - You may receive an e-mail that appears to come from file-sharing sites like Dropbox or Google Drive alerting you that a document has been shared with you. The link provided in these e-mails will take you to a fake login page that mimics the real login page and will steal your account credentials.<br><br>

                                                    <b>What You Can Do</b> <br>

                                                    • Do not click on links or attachments from senders that you do not recognize. Be especially wary of .zip or other compressed or executable file types.<br>
                                                    • Do not provide sensitive personal information (like usernames and passwords) over email.<br>
                                                    • Watch for email senders that use suspicious or misleading domain names.<br>
                                                    • Inspect URLs carefully to make sure they’re legitimate and not imposter sites.<br>
                                                    • Do not try to open any shared document that you’re not expecting to receive. <br>
                                                    • Be especially cautious when opening attachments or clicking links if you receive an email containing a warning banner indicating that it originated from an external source.<br><br>


                                                    <b>If you can’t tell if an email is legitimate or not, please notify IT immediately.</b> <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h4 class="accordion-header" id="flush-headingFour">
                                            <a class="accordion-button collapsed text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                                How to change your computer/laptop password
                                            </a>
                                        </h4>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <p>
                                                    <b>Work From Home</b>
                                                    <br><br>

                                                    1. Login to VPN when not connected to Payreto Network (i.e Work From Home)<br>
                                                    2. Press Ctrl-Alt-Delete and select "Change a password"<br>
                                                    3. Password Reset Window<br>
                                                    ㅤㅤ3.1. Enter your previous password<br>
                                                    ㅤㅤ3.2. Enter your new password<br>
                                                    ㅤㅤ3.3. Confirm your new password<br><br>

                                                    *Your new password must be at least 8 characters long, cannot closely resemble a previous password and must contain 3 out of 4 of the following items: lowercase, uppercase, number and symbol."<br>

                                                    4. Click Enter / Okay<br>
                                                    5. Wait for the system to apply changes<br>
                                                    6. Sign in and enter you new Credentials<br><br>

                                                    <b>On-Site</b>
                                                    <br><br>

                                                    1. Press Ctrl-Alt-Delete and select "Change a password"<br>
                                                    2. Password Reset Window<br>
                                                    ㅤㅤ2.1. Enter your previous password<br>
                                                    ㅤㅤ2.2. Enter your new password<br>
                                                    ㅤㅤ2.3. Confirm your new password<br><br>

                                                    *Your new password must be at least 8 characters long, cannot closely resemble a previous password and must contain 3 out of 4 of the following items: lowercase, uppercase, number and symbol."<br>

                                                    4. Click Enter / Okay<br>
                                                    5. Wait for the system to apply changes<br>
                                                    6. Sign in and enter you new Credentials<br><br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="accordion-item">
                            <h4 class="accordion-header" id="flush-headingFive">
                                <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                    Internet Connection Issues
                                </a>
                            </h4>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <p>
                                        Having Internet Connection Issues? Try these simple troubleshooting steps:<br><br>

                                        <b>1. Restart your equipment</b><br>
                                        To restart your modem and router or gateway, turn off or unplug the power cable and wait 60 seconds before plugging it back in. It will take a few minutes to reboot. Restart your device as well.<br><br>

                                        <b>2. Connect with an Ethernet cable (LAN Cable)</b><br>
                                        Connecting via Ethernet will rule out issues with your Wi-Fi network. If you can get online via Ethernet, there’s something interfering with your Wi-Fi. This fix gets you back online right away.<br><br>

                                        <b>3. Check for an internet outage</b><br>
                                        The internet may be down in your area. You can use different sites like downdetector.ph to see if anyone else is having connection issues in your area. Many ISPs also have outage alerts via their websites and apps.<br><br>

                                        <b>4. Try using a different device</b><br>
                                        See if you can get a connection on a different device. The device you’re using might not be connected properly to your router.<br><br>

                                        <b>5. Check your wires and cables</b><br>
                                        Your cables and wires could be loose or damaged. Coaxial cables should be screwed and phone and Ethernet cables should be fully inserted into the sockets. Look look for signs of damage on your wires or cables.<br><br>

                                        <b>6. Reposition your router/gateway</b><br>
                                        Your router’s placement can make or break your home’s Wi-Fi coverage. The key things to remember when choosing a location are elevation, distance, and obstructions. Elevate your router to provide a wider coverage area. Choose a central location to cover your home as completely as possible. Lastly, be mindful of obstructions like metal, tile, concrete, and water that can hamper Wi-Fi signals.<br><br>

                                        <b>7. Ensure your equipment isn’t damaged or obsolete</b><br>
                                        You may be using an obsolete modem, router, or gateway—even if you rent your equipment from your ISP. The provider will usually notify you if you’re renting obsolete equipment, but it’s easy to overlook this alert.<br><br>

                                        <b>8. Check your modem’s signal level</b><br>
                                        The signal from your ISP to your modem needs to be above a certain strength threshold to function properly. Low signal to the modem could easily result in a slow or completely dead internet connection. You can also call your ISP to run a diagnostic on your modem. If you have low signal strength to your modem, you probably need a technician to come out and repair the problem.<br><br>

                                        <b>9. Contact your ISP (Internet Service Provider)</b><br>
                                        Your ISP can help you diagnose connection problems by running a diagnostic on your equipment. Customer service can find and solve all kinds of problems over the phone or through chat support. It’s certainly worth a try. If your issue can’t be solved over the phone, you can set up an appointment with a technician just in case you can’t fix the issue yourself.<br><br>

                                </div>
                            </div>
                        </div> -->

                                    <div class="accordion-item">
                                        <h4 class="accordion-header" id="flush-headingSix">
                                            <a class="accordion-button collapsed text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                                IT Helpesk Schedule and Contact Details
                                            </a>
                                        </h4>
                                        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <p>
                                                    <b>IT Helpesk Schedule:</b><br>
                                                    07:00 - 20:00 (Monday - Friday)<br>
                                                    09:00 - 18:00 (Saturday)<br><br>

                                                    <b>Contact us:</b><br>
                                                    <i class="fa-solid fa-phone fs-6"></i> Phone Number: (02) 8548-8222 loc. 111 <br>
                                                    <i class="fa-brands fa-skype fs-6"></i> Skype: Payreto IT Support <br>
                                                    <i class="fa-solid fa-at fs-6"></i> Email: it.support@payreto.com <br>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- /#page-content-wrapper -->
</body>

</html>