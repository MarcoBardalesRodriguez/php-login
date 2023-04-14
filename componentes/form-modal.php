<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>    
      <div class="modal-body">
        <div class="container">
            <form data-type="login" id="form" class="form-group">
                <div class="form-group">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" name="username" class="form-control" autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </form>
            
            <div id="errors"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btn-form" type="button" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
</div>

