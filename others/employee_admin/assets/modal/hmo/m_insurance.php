<!-- Modal -->
<div class="modal fade" id="m_insurance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Life Insurance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
          foreach ($row as $key => $value){
            if ($value['hmo_id'] == "insurance"){
              echo html_entity_decode($value['content']);
            }
          }
        ?>
      </div>
  </div>
</div>