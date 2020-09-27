@extends('layouts.app')

@section('title', 'Customers')

@section('content')

<!-- Button trigger modal -->
<div class=" p-3 mb-5 bg-white rounded border">
    <div>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
    </div>

    <button type="button" class="btn btn-primary float-right ml-1" data-toggle="modal" data-target="#customerModal">
        Add Customer
    </button>

    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
        <label class="btn btn-secondary active">
            <input type="radio" name="options" id="active" autocomplete="off" checked> Active
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" id="archived" autocomplete="off"> Archived
        </label>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Enter customer details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ url('customers') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="customer_archived" value="0">
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <label for="input">Customer name</label>
                                <input type="text" class="form-control" id="inputName" name="customer_name"
                                    placeholder="John Smith">
                            </div>
                            <div class="form-group col-sm">
                                <label for="input">Company name</label>
                                <input type="text" class="form-control" id="inputCompany" name="customer_company"
                                    placeholder="Acme Industries">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <label for="input">Phone</label>
                                <input type="text" class="form-control" id="inputPhone" name="customer_phone"
                                    placeholder="0412345678">
                            </div>
                            <div class="form-group col-sm">
                                <label for="input">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="customer_email"
                                    placeholder="johnsmith@customer.com">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <label for="input">Address</label>
                                <input type="text" class="form-control" id="inputAddress" name="customer_address"
                                    placeholder="123 Fake St, Sydney NSW 2000">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm">
                                <label for="input">Discount tier</label>
                                <select id="inputDiscount" name="customer_discount" class="form-control">
                                    @foreach($discounts as $discount)
                                    <option value="{{ $discount->pk_discount_id }}">
                                        {{ $discount->discount_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Customer</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
    <div class='table-responsive' id="active_div">
        <h3>Customers</h3>
        <table id="customer_active_table" class="display table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col" onclick="sortTable(0)">Name</th>
                    <th scope="col" onclick="sortTable(1)">Company</th>
                    <th scope="col" onclick="sortTable(2)">Phone</th>
                    <th scope="col" onclick="sortTable(3)">Email</th>
                    <th scope="col" onclick="sortTable(4)">Address</th>
                    <th scope="col" onclick="sortTable(5)">Discount</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                @if($customer->customer_archived == '0')
                <tr>
                    <td>{{ $customer->customer_name }}</td>
                    <td>{{ $customer->customer_company }}</td>
                    <td>{{ $customer->customer_phone }}</td>
                    <td>{{ $customer->customer_email }}</td>
                    <td>{{ $customer->customer_address }}</td>
                    <td>{{ $customer->discount->discount_name }}</td>
                    <td><a href="{{action('CustomerController@edit', $customer['pk_customer_id'])}}">Edit</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class='table-responsive' id="archived_div" style="display: none">
        <h3>Archived Customers</h3>
        <table id="customer_archived_table" class="display table table-hover table-sm mt-1">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                @if ($customer->customer_archived == '1')
                <tr>
                    <td>{{ $customer->customer_name }}</td>
                    <td>{{ $customer->customer_company }}</td>
                    <td>{{ $customer->customer_phone }}</td>
                    <td>{{ $customer->customer_email }}</td>
                    <td>{{ $customer->customer_address }}</td>
                    <td>{{ $customer->discount->discount_name }}</td>
                    <td><a href="{{action('CustomerController@edit', $customer['pk_customer_id'])}}">Edit</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customer_active_table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("customer_active_table");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

@stop
