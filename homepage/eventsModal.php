<?php foreach($row as $rows => $value): ?>

<!-- Modal -->
<div class="modal fade" id="EventsModal-<?php echo $value['e_id']; ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?php echo html_entity_decode($value['e_name']); ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?php echo html_entity_decode($value['e_content']); ?></p>
            </div>

        </div>
    </div>
</div>

<?php endforeach; ?>

<!-- Events See All Modal -->


<!-- Modal -->
<div class="modal fade" id="EventSeeAll" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php foreach($row as $rows => $value): ?>
                <div class="modal-body">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo html_entity_decode($value['e_name']); ?></h5>
                            <p class="card-text"><?php echo html_entity_decode($value['e_content']);?></p>
                            <button data-bs-toggle="modal" data-bs-target="#EventsModal-<?php echo $value['e_id']; ?>" data-bs-dismiss="modal">Read More</button>
                        </div>
                    </div>
                    <p></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>





<!-- Announcment See All Modal -->


<!-- Modal -->
<div class="modal fade" id="EventSeeAl2l" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php foreach($announce as $rows => $value1): ?>
                <div class="modal-body">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo html_entity_decode($value1['e_name']); ?></h5>
                            <p class="card-text"><?php echo html_entity_decode($value1['e_content']);?></p>
                        </div>
                    </div>
                    <p></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>