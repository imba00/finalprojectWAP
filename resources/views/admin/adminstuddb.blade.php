<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Parcel Management System Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">



    @include('admin.script')
</head>

<body>

    @include('admin.header')

    @include('admin.adminsidebar')

    <main id="main" class="main">

        <section class="section">
            <!-- Content -->
            <div class="card overflow-auto">
                <div class="card-body" style="width:90rem">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title float-start">Resident List<span class="mx-3"
                                    style="font-weight: bold; text-transform: uppercase; color: #012987">|
                                    {{ $apartment }}</span>
                            </h5>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="float-end">
                                <span class="fw-bold me-3">Apartment:</span>
                                <select class="" name="status" id="status" onchange="showTable(this.value)">
                                    <option selected value="{{ $apartment }}">{{ $apartment }}</option>
                                    <option value="all">All</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <table id="table-{{ $apartment }}" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Resident ID</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentlist as $item)
                                @if ($item['apartment'] === $apartment)
                                    <tr>
                                        <th>{{ $item['name'] }}</th>
                                        <th>{{ $item['userid'] }}</th>
                                        <td>{{ $item['phoneno'] }}</td>
                                        <td>
                                            <div class="flex justify-center space-x-1">
                                                <!-- Button to trigger modal -->
                                                <button onClick="location.href='{{ ' editstudent/' . $item['id'] }}'"
                                                    class="fa-solid fa-pen-to-square bg-gray-300 p-2 rounded-full"
                                                    title="Edit Data"></button>


                                                <button
                                                    onClick="if(confirm('Are you sure you want to delete this data?')){ location.href='{{ ' dltuser/' . $item['id'] }}'}"
                                                    class="fa-solid fa-trash bg-gray-300 p-2 rounded-full"
                                                    title="Delete Data"></button>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <table id="table-all" class="table table-bordered" style="display: none;">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Resident ID</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col" class="text-center">Apartment</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentlist as $item)
                                <tr>
                                    <th>{{ $item['name'] }}</th>
                                    <th>{{ $item['userid'] }}</th>
                                    <td>{{ $item['phoneno'] }}</td>
                                    <td>{{ $item['apartment'] }}</td>
                                    <td>
                                        <div class="flex justify-center space-x-1">
                                            <!-- Button to trigger modal -->
                                            <button onClick="location.href='{{ ' editstudent/' . $item['id'] }}'"
                                                class="fa-solid fa-pen-to-square bg-gray-300 p-2 rounded-full"
                                                title="Edit Data"></button>


                                            <button
                                                onClick="if(confirm('Are you sure you want to delete this data?')){ location.href='{{ ' dltuser/' . $item['id'] }}'}"
                                                class="fa-solid fa-trash bg-gray-300 p-2 rounded-full"
                                                title="Delete Data"></button>
                                        </div>
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Content -->
            </div>
        </section>

    </main><!-- End #main -->


    <script>
        $(document).ready(function() {
            $('#table-{{ $apartment }}').DataTable();
        });

        function showTable(type) {
            // Hide all tables
            document.getElementById('table-{{ $apartment }}').style.display = 'none';
            document.getElementById('table-all').style.display = 'none';
            $('#table-{{ $apartment }}').DataTable().destroy();
            $('#table-all').DataTable().destroy();

            // Show the selected table
            document.getElementById('table-' + type).style.display = 'table';
            $(document).ready(function() {
                $('#' + 'table-' + type).DataTable();
            });

            // Update dropdown button text
            document.getElementById('status').value = type;
        }
    </script>
</body>

</html>
