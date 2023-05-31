
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORGOT PASSWORD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center justify-content-center">
        <form class="container-form" action="forget_emailer_validation.php" method="POST">
          <div class="info-4 mb-3">
            <div class="forgot-p">
              <label class="mb-2" for="email">ENTER YOUR EMAIL</label><br>
              <input type="text" id="emailforget" name="emailforget">
            </div>
          </div>
          <div class="loginbtn w-25">
            <input type="submit" name="forgotbtn">
          </div>
        </form>
      </div>
    </div>
  </div>