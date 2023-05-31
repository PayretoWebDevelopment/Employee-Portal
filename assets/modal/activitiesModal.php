<!-- Modal -->
<?php
foreach ($row as $key => $value) :
    if ($value["e_id"] == $id) :
?>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><span id="event_name"></span> </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- border display and clickable none -->
                        <span id="event_content"></span>
                    </div>
                </div>
            </div>
        </div>
<?php endif;
endforeach; ?>