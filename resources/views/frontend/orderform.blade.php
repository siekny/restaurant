<!-- Edit  Modal -->
<div id="order_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">you are ordered:</h4>
      </div>
        <form method="POST" id="form_order" action="{{ url('/order/store') }}" style="color:white">
          {{csrf_field()}}
          <div class="modal-body">
            <div class="col-md-6" id="parent"  style="text-align: left;font-size: 18px;">
            </div><br style="clear: both;"><br><hr>
            <div style="clear: both;">
              <label>Contact Number</label>
              <input type="number" name="contact" class="form-control">
              <p  class="error errorPhone hidden" style="color: white;"></p>
              <br>
              <label>Address</label>
              <textarea class="form-control" name="address"></textarea>
              <p  class="error errorAddress hidden" style="color: white;"></p>
              <input type="hidden" name="total" id="total">
              <input type="hidden" name="picture" id="picture">

            </div><br><br>
            <div style="clear: both;font-size: 18px;" id="parent2"></div>
          </div>
          <div class="modal-footer">

            <button type="submit" class="btn btn-warning order-success">Order Now</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>

  </div>
</div>



