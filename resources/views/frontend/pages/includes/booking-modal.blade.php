<div class="modal fade" id="bookAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="bookAppointmentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookAppointmentModalLabel">Book an Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('calendar.post') }}" method="post">
        @csrf
        <div class="form-row">
          <input type="hidden" name="company_id" value="{{ request()->company_id }}">
          <div class="form-group col-md-6">
            <label for="title">Appointment Purpose</label>
            <input type="text" class="form-control" name="title" id="title" required placeholder="Appointment Purpose">
          </div>

          <div class="form-group col-md-6">
            <label for="from_time">From</label>
            <input type="text" class="form-control" name="from_time" id="from_time" required placeholder="From Time">
          </div>

        </div>

        <div class="form-row">
        
        <div class="form-group col-md-6">
          <label for="to_time">To Time</label>
          <input type="text" class="form-control" name="to_time" id="to_time" required placeholder="To Time">
        </div>

        <div class="form-group col-md-6">
          <label for="service_id">Service</label>
            <select class="custom-select" name="service_id" id="service_id">
                @foreach( $services as $service )
                    <option value="{{ $service->id }}">{{ $service->service_title }}</option>
                @endforeach
            </select>
        </div>
      </div>

    <div class="form-row">
        
        <div class="form-group col-md-6">
          <label for="phone_number">Phone Number</label>
          <input type="text" class="form-control" name="phone_number" id="phone_number" required placeholder="Phone Number">
        </div>
    
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>

  </div>
</div>