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
                        <textarea cols="50" rows="30" id="event_content" disabled><p></p></textarea>
                    </div>
                </div>
            </div>
        </div>
<?php endif;
endforeach; ?>