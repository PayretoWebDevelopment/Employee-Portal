<div class="container">
    <h1 class="card-heading my-5 text-uppercase text-center">EMPLOYEE ENGAGEMENT</h1>
    <div class="accordion card mx-5 rounded-0 my-4 mx-5" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed d-flex flex-row justify-content-center align-content-center text-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <h4 class="m-0 py-2 px-4">Post-Event Surveys</h4>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <?php
                require_once "../../includes/db_ep-inc.php";

                $sql = "SELECT * FROM post_event";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $array = (array) $row;

                foreach ($row as $key => $value) :
                ?>
                    <a class="text-center h-100 w-100" href="/Employee-Portal/people_operations/people_experience/content/postevents_survey.php?p_id=<?php echo $value['p_id']; ?>">
                        <div class="accordion-body card2">
                            <h4><?php echo html_entity_decode($value['p_name']) ?> </h4>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <a class="card rounded-0 my-4 mx-5 py-4 px-5 d-flex justify-content-center align-content-center text-start" href="/Employee-Portal/people_operations/people_experience/content/activities_events.php">
        <h4 class="m-0">List of Activities and Events</h4>
    </a>
    <h1 class="card-heading my-5 text-uppercase text-center">REWARDS AND RECOGNITION</h1>
    <div class="accordion card mx-5 rounded-0" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed d-flex flex-row justify-content-center align-content-center text-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <h4 class="m-0 py-2 px-4">Payreto Store</h4>
                </button>
            </h2> 
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <a class="text-center h-100 w-100" href="/Employee-Portal/people_operations/people_experience/content/rewards_recog.php">
                    <div class="accordion-body card2">
                        <h4>Rewards and Recognition Redemption Form</h4>
                    </div>
                </a>
                <a class="text-center h-100 w-100" href="/Employee-Portal/people_operations/people_experience/content/employee_nomination.php">
                    <div class="accordion-body card2">
                        <h4>Rewards & Recognition Award Submission Form</h4>
                    </div>
                </a>
                <a class="text-center h-100 w-100" href="/Employee-Portal/people_operations/people_experience/content/payreto_points.php">
                    <div class="accordion-body card2">
                        <h4>Payreto Points Tracker</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <a class="card rounded-0 my-4 mx-5 py-4 px-5 d-flex justify-content-center align-content-center text-start" href="/Employee-Portal/people_operations/people_experience/content/foodpanda_account.php">
        <h4 class="m-0">Foodpanda Account Guide</h4>
    </a>
    <a class="card rounded-0 my-4 mx-5 py-4 px-5 d-flex justify-content-center align-content-center text-start" href="/Employee-Portal/people_operations/people_experience/content/grab_account.php">
        <h4 class="m-0">Grab Account Guide</h4>
    </a>
    <a class="card rounded-0 my-4 mx-5 py-4 px-5 d-flex justify-content-center align-content-center text-start" href="/Employee-Portal/people_operations/people_experience/content/sodexo_account.php">
        <h4 class="m-0">Sodexo Account Guide</h4>
    </a>
</div>
<div class="container">
    <h1 class="card-heading my-5 text-uppercase text-center">EMPLOYEE ONBOARDING</h1>
    <a class="card rounded-0 my-4 mx-5 py-4 px-5 d-flex justify-content-center align-content-center text-start" href="/Employee-Portal/people_operations/people_experience/content/list_documents.php">
        <h4>List of Documents</h4>
    </a>
</div>