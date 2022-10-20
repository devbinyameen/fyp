<div class="container">
    <div class="row">
        <div class="col-12">

            <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Company</th>
                <th scope="col">Category</th>
                <th scope="col">Services</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $companies as $key => $company )
                    <tr>
                    <th scope="row"> {{ $key+1 }} </th>
                    <td> {{ $company->name }} </td>
                    <td> {{ $company->category->title }} </td>
                    <td> 
                        <ul class="list-group">
                            @foreach( $company->services as $service )
                            <li class="list-group-item"> {{ $service->service_title }} </li>
                            @endforeach
                        </ul>
                    </td>
                    <td> <a href="{{ url('calendar/'.$company->id) }}" class="btn btn-sm btn-primary"> Book Appointment </a> </td>
                    </tr>
                @endforeach
            </tbody>
            </table>

            
        </div>
    </div>
</div>
