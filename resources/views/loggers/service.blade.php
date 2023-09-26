<x-app-layout>
    <x-slot name="slot">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page-titles style1">
                                    <div class="d-flex align-items-center">
                                        <h2 class="heading">Logger Service</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.75s">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive  patient">
                                            <table
                                                class="table-responsive-lg table display mb-4 dataTablesCard text-black dataTable no-footer"
                                                id="logger">
                                                <thead>
                                                    <tr>
                                                        <th>Service</th>
                                                        <th>Datetime</th>
                                                        <th>Level</th>
                                                        <th>Message</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($logs->logs->datas as $key => $client)
                                                    <tr>
                                                        @if ($client->service == "mail")
                                                        <td><span
                                                                class="badge badge-primary">{{$client->service}}</span>
                                                        </td>
                                                        @elseif ($client->service == "website")
                                                        <td><span
                                                                class="badge badge-success">{{$client->service}}</span>
                                                        </td>
                                                        @elseif ($client->service == "metatrader5")
                                                        <td><span
                                                                class="badge badge-warning">{{$client->service}}</span>
                                                        </td>
                                                        @elseif ($client->service == "balance")
                                                        <td><span class="badge badge-danger">{{$client->service}}</span>
                                                        </td>
                                                        @elseif ($client->service == "transfer")
                                                        <td><span class="badge badge-info">{{$client->service}}</span>
                                                        </td>
                                                        @elseif ($client->service == "user")
                                                        <td><span class="badge badge-dark">{{$client->service}}</span>
                                                        </td>
                                                        @elseif ($client->service == "admin")
                                                        <td><span
                                                                class="badge badge-secondary">{{$client->service}}</span>
                                                        </td>
                                                        @elseif ($client->service == "logger")
                                                        <td><span class="badge badge-light">{{$client->service}}</span>
                                                        </td>
                                                        @else
                                                        <td><span
                                                                class="badge badge-primary">{{$client->service}}</span>
                                                        </td>
                                                        @endif

                                                        <td class="whitesp-no fs-14 font-w400">{{$client->datetime}}
                                                        </td>
                                                        <td class="whitesp-no p-0">
                                                            <div class="py-sm-3 py-1">
                                                                <div>
                                                                    @if ($client->level == "info")
                                                                    <span
                                                                        class="badge badge-info">{{$client->level}}</span>
                                                                    @elseif ($client->level == "error")
                                                                    <span
                                                                        class="badge badge-danger">{{$client->level}}</span>
                                                                    @elseif ($client->level == "warning")
                                                                    <span
                                                                        class="badge badge-warning">{{$client->level}}</span>
                                                                    @elseif ($client->level == "debug")
                                                                    <span
                                                                        class="badge badge-primary">{{$client->level}}</span>
                                                                    @elseif ($client->level == "critical")
                                                                    <span
                                                                        class="badge badge-danger">{{$client->level}}</span>
                                                                    @elseif ($client->level == "fatal")
                                                                    <span
                                                                        class="badge badge-danger">{{$client->level}}</span>
                                                                    @else
                                                                    <span
                                                                        class="badge badge-success">{{$client->level}}</span>
                                                                    @endif
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($client->message)
                                                            {!! $client->message !!}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                var table = $('#logger').DataTable({
                    searching: true,
                    paging: true,
                    select: false,
                    lengthChange: true,

                });
                });
        </script>
    </x-slot>
</x-app-layout>