<x-app-layout>
    <x-slot name="slot">
        <div class="content-body mh-auto">
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <!-- Row -->
                        <div class="row">
                            <!-- ----column---- -->
                            <div class="col-xl-8">
                                <div class="user card  ">
                                    <div class="user-head">
                                        <div class="user-info">
                                            <div class="user-details">
                                                <div>
                                                    <div class="profile-name">
                                                        <h3 class="name">
                                                            @if ($user->middlename)
                                                            {{ $user->name }} {{ $user->middlename }}
                                                            {{ $user->lastname }}
                                                            @else
                                                            {{ $user->name }} {{ $user->lastname }}
                                                            @endif
                                                        </h3>
                                                        <h5> ID: {{$user->id}}</h5>
                                                        <h5> Client ID: {{ $user->user_client->login ?? 0 }}</h5>
                                                        <span>
                                                            <svg width="16" height="21" viewBox="0 0 16 21" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8 0.5C5.87827 0.5 3.84344 1.34285 2.34315 2.84315C0.842855 4.34344 0 6.37827 0 8.5C0 13.9 7.05 20 7.35 20.26C7.53113 20.4149 7.76165 20.5001 8 20.5001C8.23835 20.5001 8.46887 20.4149 8.65 20.26C9 20 16 13.9 16 8.5C16 6.37827 15.1571 4.34344 13.6569 2.84315C12.1566 1.34285 10.1217 0.5 8 0.5ZM8 18.15C5.87 16.15 2 11.84 2 8.5C2 6.9087 2.63214 5.38258 3.75736 4.25736C4.88258 3.13214 6.4087 2.5 8 2.5C9.5913 2.5 11.1174 3.13214 12.2426 4.25736C13.3679 5.38258 14 6.9087 14 8.5C14 11.84 10.13 16.16 8 18.15ZM8 4.5C7.20887 4.5 6.43552 4.7346 5.77772 5.17412C5.11992 5.61365 4.60723 6.23836 4.30448 6.96927C4.00173 7.70017 3.92252 8.50444 4.07686 9.28036C4.2312 10.0563 4.61216 10.769 5.17157 11.3284C5.73098 11.8878 6.44371 12.2688 7.21964 12.4231C7.99556 12.5775 8.79983 12.4983 9.53073 12.1955C10.2616 11.8928 10.8864 11.3801 11.3259 10.7223C11.7654 10.0645 12 9.29113 12 8.5C12 7.43913 11.5786 6.42172 10.8284 5.67157C10.0783 4.92143 9.06087 4.5 8 4.5ZM8 10.5C7.60444 10.5 7.21776 10.3827 6.88886 10.1629C6.55996 9.94318 6.30362 9.63082 6.15224 9.26537C6.00087 8.89991 5.96126 8.49778 6.03843 8.10982C6.1156 7.72186 6.30608 7.36549 6.58579 7.08579C6.86549 6.80608 7.22186 6.6156 7.60982 6.53843C7.99778 6.46126 8.39991 6.50087 8.76537 6.65224C9.13082 6.80362 9.44318 7.05996 9.66294 7.38886C9.8827 7.71776 10 8.10444 10 8.5C10 9.03043 9.78929 9.53914 9.41421 9.91421C9.03914 10.2893 8.53043 10.5 8 10.5Z"
                                                                    fill="#666666" />
                                                            </svg>
                                                            {{$user->country}}
                                                        </span>
                                                    </div>
                                                    <div class="user-contact">
                                                        <div class="user-number ">
                                                            <div class="dz-media">
                                                                <svg width="20" height="20" viewBox="0 0 28 28"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M27.2974 20.3613C27.2526 20.1711 27.1666 19.9931 27.0454 19.8399C26.9242 19.6867 26.7708 19.562 26.5961 19.4746L21.2627 16.8079C21.0124 16.683 20.7291 16.64 20.453 16.685C20.1768 16.7299 19.9218 16.8607 19.7241 17.0586L17.4907 19.2919C14.2814 18.7759 9.22408 13.7199 8.70941 10.5106L10.9427 8.27593C11.1407 8.07819 11.2714 7.8232 11.3164 7.54705C11.3614 7.27091 11.3184 6.98761 11.1934 6.73727L8.52675 1.40393C8.43945 1.22911 8.3148 1.07562 8.16161 0.954309C8.00842 0.833002 7.83044 0.746847 7.64027 0.701943C7.45009 0.657039 7.25238 0.654484 7.06111 0.694458C6.86983 0.734431 6.68969 0.815957 6.53341 0.933266L1.20008 4.93327C1.03449 5.05746 0.900082 5.21851 0.807512 5.40365C0.714941 5.58879 0.666748 5.79294 0.666748 5.99993C0.666748 18.7599 9.24008 27.3333 22.0001 27.3333C22.2071 27.3333 22.4112 27.2851 22.5964 27.1925C22.7815 27.0999 22.9426 26.9655 23.0667 26.7999L27.0667 21.4666C27.1837 21.3105 27.265 21.1305 27.3049 20.9396C27.3447 20.7486 27.3422 20.5512 27.2974 20.3613ZM21.3334 24.6573C10.7587 24.3733 3.62675 17.2413 3.34275 6.6666L6.85608 4.02527L8.37741 7.0666L6.39075 9.05327C6.26645 9.17752 6.16795 9.32513 6.1009 9.4876C6.03386 9.65006 5.99959 9.82418 6.00008 9.99993C6.00008 14.7106 13.2894 21.9999 18.0001 21.9999C18.3537 21.9999 18.6928 21.8593 18.9427 21.6093L20.9294 19.6226L23.9748 21.1453L21.3334 24.6573Z"
                                                                        fill="#FCFCFC" />
                                                                </svg>
                                                            </div>
                                                            <h4 class="details">{{$user->phone}}</h4>
                                                        </div>
                                                        <div class="user-email">
                                                            <div class="dz-media">
                                                                <svg width="20" height="20" viewBox="0 0 25 20"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M24 1.85315C24.0075 1.76443 24.0075 1.67522 24 1.58649L23.88 1.33315C23.88 1.33315 23.88 1.23982 23.8133 1.19982L23.7467 1.13315L23.5333 0.95982C23.475 0.90049 23.4075 0.850965 23.3333 0.813154L23.1067 0.733154H22.84H1.24H0.973333L0.746667 0.826487C0.672327 0.85818 0.604514 0.903389 0.546667 0.95982L0.333333 1.13315C0.333333 1.13315 0.333333 1.13315 0.333333 1.19982C0.333333 1.26649 0.333333 1.29315 0.266667 1.33315L0.146667 1.58649C0.13912 1.67522 0.13912 1.76443 0.146667 1.85315L0 1.99982V17.9998C0 18.3534 0.140476 18.6926 0.390524 18.9426C0.640573 19.1927 0.979711 19.3332 1.33333 19.3332H13.3333C13.687 19.3332 14.0261 19.1927 14.2761 18.9426C14.5262 18.6926 14.6667 18.3534 14.6667 17.9998C14.6667 17.6462 14.5262 17.3071 14.2761 17.057C14.0261 16.807 13.687 16.6665 13.3333 16.6665H2.66667V4.66649L11.2 11.0665C11.4308 11.2396 11.7115 11.3332 12 11.3332C12.2885 11.3332 12.5692 11.2396 12.8 11.0665L21.3333 4.66649V16.6665H18.6667C18.313 16.6665 17.9739 16.807 17.7239 17.057C17.4738 17.3071 17.3333 17.6462 17.3333 17.9998C17.3333 18.3534 17.4738 18.6926 17.7239 18.9426C17.9739 19.1927 18.313 19.3332 18.6667 19.3332H22.6667C23.0203 19.3332 23.3594 19.1927 23.6095 18.9426C23.8595 18.6926 24 18.3534 24 17.9998V1.99982C24 1.99982 24 1.90649 24 1.85315ZM12 8.33315L5.33333 3.33315H18.6667L12 8.33315Z"
                                                                        fill="#FCFCFC" />
                                                                </svg>
                                                            </div>
                                                            <h4 class="details">{{$user->email}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="side-detail">
                                                    <div class="edit-profil">
                                                        <button class="btn light btn-primary btn-sm text-nowrap"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Edit
                                                            User</button>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <!-- ----column---- -->
                                <div class="card">
                                    <!-- <div class="card-header">
                                        <h4 class="card-title">Input Style</h4>
                                    </div> -->
                                    <div class="card-body">
                                        <div class="basic-form text-center">
                                            @if($show_buttons["edit_customer"])
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editCustomerModal">Edit Customer</button>
                                            </div>
                                            @endif
                                            @if ($user->user_client != null)
                                            @if($show_buttons["add_trading_account"])
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                    data-target="#addTradingAccountModal">Add Trading Account</button>
                                            </div>
                                            @endif
                                            @else
                                            @if($show_buttons["create_client"])
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#createClientModal">Create Client</button>
                                            </div>
                                            @endif
                                            @endif
                                            @if($show_buttons["change_verification"])
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#changeVerificationModal">Change Verification</button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- ----/column---- -->
                            </div>
                            <!-- Trading Account -->
                            @if($show_cards['trading_account']['read'])
                            <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.1s">
                                <x-card.datatable.trading-account :user-id="$user_id" />
                            </div>
                            @endif
                            <!-- Withdrawal Requests -->
                            @if($show_cards['withdrawal_requests']['read'])
                            <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.1s">
                                <x-card.datatable.withdrawal-requests :user-id="$user_id" />
                            </div>
                            @endif
                            <!-- Transfers -->
                            @if($show_cards['transfers']['read'])
                            <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Transfers</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- ----column-- -->
                                        <div class="row">
                                            <div class="mb-3 col-md-5">
                                                <label class="form-label">Start Time</label>
                                                <input type="text" class="form-control" placeholder="Start Time"
                                                    id="input_transfers_start_time" name="input_transfers_start_time">
                                            </div>
                                            <div class="mb-3 col-md-5">
                                                <label class="form-label">End Time</label>
                                                <input type="text" class="form-control" placeholder="End Time"
                                                    id="input_transfers_end_time" name="input_transfers_end_time">
                                            </div>
                                            <div class="mb-3 col-sm-2">
                                                <label class="form-label">Search</label>
                                                <button id="transfersTableButton" type="button"
                                                    class="btn btn-primary form-control wide">Search</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="table-responsive  patient">
                                                <table
                                                    class="table-responsive-lg table display mb-4 dataTablesCard  text-black dataTable no-footer"
                                                    id="transfersTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>Amount</th>
                                                            <th>Time</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- Referenced List -->
                            @if($show_cards['referenced_list']['read'])
                            <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Referenced List</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- ----column-- -->
                                        <div class="table-responsive  patient">
                                            <table
                                                class="table-responsive-lg table display mb-4 dataTablesCard  text-black dataTable no-footer"
                                                id="example8">
                                                <thead>
                                                    <tr>
                                                        <th>User ID</th>
                                                        <th>Created Date</th>
                                                        <th>Name</th>
                                                        <th>E-Mail</th>
                                                        <th>KYC Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($referenced_users as $key => $client)
                                                    <tr>
                                                        <td class="whitesp-no">{{$client->Client_ID}}</td>
                                                        <td class="whitesp-no fs-14 font-w400">{{$client->Created_Date}}
                                                        </td>
                                                        <td class="whitesp-no p-0">
                                                            <div class="py-sm-3 py-1">
                                                                <div>
                                                                    <h6 class="font-w500 fs-15 mb-0">{{$client->Name}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="whitesp-no">
                                                            <a href="#" class="tb-mail">
                                                                <svg width="19" height="14" viewBox="0 0 19 14"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M18 0.889911C18.0057 0.823365 18.0057 0.756458 18 0.689911L17.91 0.499911C17.91 0.499911 17.91 0.429911 17.86 0.399911L17.81 0.349911L17.65 0.219911C17.6062 0.175413 17.5556 0.138269 17.5 0.109911L17.33 0.0499115H17.13H0.93H0.73L0.56 0.119911C0.504246 0.143681 0.453385 0.177588 0.41 0.219911L0.25 0.349911C0.25 0.349911 0.25 0.349911 0.25 0.399911C0.25 0.449911 0.25 0.469911 0.2 0.499911L0.11 0.689911C0.10434 0.756458 0.10434 0.823365 0.11 0.889911L0 0.999911V12.9999C0 13.2651 0.105357 13.5195 0.292893 13.707C0.48043 13.8946 0.734784 13.9999 1 13.9999H10C10.2652 13.9999 10.5196 13.8946 10.7071 13.707C10.8946 13.5195 11 13.2651 11 12.9999C11 12.7347 10.8946 12.4803 10.7071 12.2928C10.5196 12.1053 10.2652 11.9999 10 11.9999H2V2.99991L8.4 7.79991C8.5731 7.92973 8.78363 7.99991 9 7.99991C9.21637 7.99991 9.4269 7.92973 9.6 7.79991L16 2.99991V11.9999H14C13.7348 11.9999 13.4804 12.1053 13.2929 12.2928C13.1054 12.4803 13 12.7347 13 12.9999C13 13.2651 13.1054 13.5195 13.2929 13.707C13.4804 13.8946 13.7348 13.9999 14 13.9999H17C17.2652 13.9999 17.5196 13.8946 17.7071 13.707C17.8946 13.5195 18 13.2651 18 12.9999V0.999911C18 0.999911 18 0.929911 18 0.889911ZM9 5.74991L4 1.99991H14L9 5.74991Z"
                                                                        fill="#01A3FF" />
                                                                </svg>
                                                                {{$client->mail}}
                                                            </a>
                                                        </td>
                                                        <td class="whitesp-no">
                                                            <center>
                                                                @if($client->KYC_Status == "document_waiting")
                                                                <span class="btn light btn-primary btn-sm">
                                                                    Document Waiting
                                                                </span>
                                                                @elseif($client->KYC_Status == "admin_review")
                                                                <span class=" btn light btn-info btn-sm ">
                                                                    Admin Review
                                                                </span>
                                                                @elseif($client->KYC_Status == "rejected")
                                                                <span class=" btn light btn-pink btn-sm ">
                                                                    Rejected
                                                                </span>
                                                                @elseif($client->KYC_Status == "verified")
                                                                <span class="btn light btn-success btn-sm ">
                                                                    Verified
                                                                </span>
                                                                @endif
                                                            </center>
                                                        </td>
                                                        <td class="whitesp-no">
                                                            <center>
                                                                <a
                                                                    href="{{ route('user', ['id'=>$client->Client_ID, 'client_id' => $client->Client_ID]) }}"><span
                                                                        class="btn light btn-primary btn-sm ">
                                                                        Details
                                                                    </span></a>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Client Modal -->
        <div class="modal fade" id="createClientModal" tabindex="-1" role="dialog"
            aria-labelledby="createClientModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="createClientForm">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Create Client</h5>
                            <button type="button" class="btn-close" data-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Title</label>
                                        <select id="input_title" name="input_title"
                                            class="default-select form-control wide">
                                            <option id="Mr." {{ $user->title == "Mr." ? "selected":"" }}>Mr.</option>
                                            <option id="Mrs." {{ $user->title == "Mrs." ? "selected":"" }}>Mrs.</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Gender</label>
                                        <select id="input_gender" name="input_gender"
                                            class="default-select form-control wide">
                                            <option id="Male" {{ $user->gender == "Male" ? "selected":"" }}>Male
                                            </option>
                                            <option id="Female" {{ $user->gender == "Female" ? "selected":"" }}>Female
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Birthdate</label>
                                        <input type="text" class="form-control" placeholder="2017-06-04"
                                            id="input_birthdate" name="input_birthdate"
                                            value="{{ \Carbon\Carbon::parse($user->birthdate)->format('Y-m-d') }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">First Name</label>
                                        <input name="input_name" type="text" class="form-control"
                                            placeholder="First Name" value="{{ $user->name }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Middle Name</label>
                                        <input name="input_middlename" type="text" class="form-control"
                                            placeholder="Middle Name" value="{{ $user->middlename }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Last Name</label>
                                        <input name="input_lastname" type="text" class="form-control"
                                            placeholder="Last Name" value="{{ $user->lastname }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">E-Mail</label>
                                        <input name="input_email" type="email" class="form-control" placeholder="E-Mail"
                                            value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input name="input_phone" type="text" class="form-control" placeholder="Phone"
                                            value="{{ $user->phone }}">
                                    </div>
                                    <div class="mb-3 col-md-9">
                                        <label class="form-label">Address</label>
                                        <input name="input_address" type="text" class="form-control"
                                            placeholder="Address" value="{{ $user->address }}">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Zip</label>
                                        <input name="input_zip" type="text" class="form-control" placeholder="Zip Code"
                                            value="{{ $user->postal_code }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Country</label>
                                        <input name="input_country" type="text" class="form-control"
                                            placeholder="Country" value="{{ $user->country }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">City</label>
                                        <input name="input_city" type="text" class="form-control" placeholder="City"
                                            value="{{ $user->city }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">State</label>
                                        <input name="input_state" type="text" class="form-control" placeholder="State"
                                            value="{{ $user->state }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                            <button id="editCustomerButton" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Add Trading Account Modal -->
        <div class="modal fade" id="addTradingAccountModal" tabindex="-1" role="dialog"
            aria-labelledby="addTradingAccountModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Trading Account</h5>
                        <button type="button" class="btn-close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Name:</label>
                                    <input id="input_name" name="input_name" type="text"
                                        class="form-control input-default" placeholder="{{ $user->name }}"
                                        value="{{ $user->name }} {{ $user->middlename }} {{ $user->lastname }}"
                                        disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Leverage:</label>
                                    <select id="input_leverage" name="input_leverage"
                                        class="default-select form-control">
                                        <option value="100">1:100</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Group:</label>
                                    <select id="input_group" name="input_group" class="default-select form-control">
                                        <option value="demo\forex-hedge-usd-01">demo\forex-hedge-usd-01</option>
                                        <option value="GMD\GMD\A">GMD\GMD\A</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button id="addTradingAccountButton" type="button" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- Edit Customer Modal -->
        <div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog"
            aria-labelledby="editCustomerModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="editCustomer">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Customer</h5>
                            <button type="button" class="btn-close" data-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Title</label>
                                        <select id="input_title" name="input_title"
                                            class="default-select form-control wide">
                                            <option id="Mr." {{ $user->title == "Mr." ? "selected":"" }}>Mr.</option>
                                            <option id="Mrs." {{ $user->title == "Mrs." ? "selected":"" }}>Mrs.</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Gender</label>
                                        <select id="input_gender" name="input_gender"
                                            class="default-select form-control wide">
                                            <option id="Male" {{ $user->gender == "Male" ? "selected":"" }}>Male
                                            </option>
                                            <option id="Female" {{ $user->gender == "Female" ? "selected":"" }}>Female
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Birthdate</label>
                                        <input type="text" class="form-control" placeholder="2017-06-04"
                                            id="input_birthdate" name="input_birthdate"
                                            value="{{ \Carbon\Carbon::parse($user->birthdate)->format('Y-m-d') }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">First Name</label>
                                        <input name="input_name" type="text" class="form-control"
                                            placeholder="First Name" value="{{ $user->name }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Middle Name</label>
                                        <input name="input_middlename" type="text" class="form-control"
                                            placeholder="Middle Name" value="{{ $user->middlename }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Last Name</label>
                                        <input name="input_lastname" type="text" class="form-control"
                                            placeholder="Last Name" value="{{ $user->lastname }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">E-Mail</label>
                                        <input name="input_email" type="email" class="form-control" placeholder="E-Mail"
                                            value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input name="input_phone" type="text" class="form-control" placeholder="Phone"
                                            value="{{ $user->phone }}">
                                    </div>
                                    <div class="mb-3 col-md-9">
                                        <label class="form-label">Address</label>
                                        <input name="input_address" type="text" class="form-control"
                                            placeholder="Address" value="{{ $user->address }}">
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Zip</label>
                                        <input name="input_zip" type="text" class="form-control" placeholder="Zip Code"
                                            value="{{ $user->postal_code }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Country</label>
                                        <input name="input_country" type="text" class="form-control"
                                            placeholder="Country" value="{{ $user->country }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">City</label>
                                        <input name="input_city" type="text" class="form-control" placeholder="City"
                                            value="{{ $user->city }}">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">State</label>
                                        <input name="input_state" type="text" class="form-control" placeholder="State"
                                            value="{{ $user->state }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                            <button id="editCustomerButton" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Change Verification Modal -->
        <div class="modal fade" id="changeVerificationModal" tabindex="-1" role="dialog"
            aria-labelledby="changeVerificationModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Verification</h5>
                        <button type="button" class="btn-close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="basic-form">
                            <form>
                                <div class="col-xl-4 col-xxl-6 col-6">
                                    <div class="form-check custom-checkbox mb-3">
                                        <input type="checkbox" class="form-check-input" id="checkBoxEmail"
                                            {{ $user->email_verified ? "checked":"" }} required>
                                        <label class="form-check-label" for="checkBoxEmail">E-Mail</label>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-6 col-6">
                                    <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" class="form-check-input" id="checkBoxSumsub"
                                            {{ $user->user_sumsub->review_status == "completed" && $user->user_sumsub->review_result==1 ? "checked":"" }}
                                            required>
                                        <label class="form-check-label" for="checkBoxSumsub">Sumsub</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button id="changeVerificationButton" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $('#input_transfers_start_time').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });

        $('#input_transfers_end_time').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });

        $('input[name="input_birthdate"]').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });

        $('body').on('click', 'button[id=addTradingAccountButton]', function(e) {
            $("#addTradingAccountButton").prop("disabled", true);

            var input_leverage = $('#input_leverage').val();
            var input_group = $('#input_group').val();

            $.ajax({
                type: "post",
                url: '{{ action("App\\Http\\Controllers\\MetatraderController@addTradingAccount") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: '{{ $user->id }}',
                    name: '{{ $user->name }}',
                    middlename: '{{ $user->middlename }}',
                    lastname: '{{ $user->lastname }}',
                    email: '{{ $user->email }}',
                    phone: '{{ $user->phone }}',
                    country: '{{ $user->country }}',
                    city: '{{ $user->city }}',
                    address: '{{ $user->address }}',
                    zip: '{{ $user->postal_code }}',
                    state: '{{ $user->state }}',
                    group: input_group,
                    leverage: input_leverage
                },
                success: function(response) {
                    toastr.success(response.message);
                    $('#addTradingAccountModal').modal('hide');
                    location.reload();
                },
                error: function($error) {
                    toastr.error($error.responseText)
                    console.log($error)
                    $("#addTradingAccountButton").prop("disabled", false);
                }
            });
        })

        $("#createClientForm").validate({
            errorClass: 'is-invalid',
            rules: {
                input_title: {
                    required: true
                },
                input_name: {
                    required: true
                },
                input_middlename: {
                    required: false
                },
                input_lastname: {
                    required: true
                },
                input_gender: {
                    required: true
                },
                input_birthdate: {
                    required: true,
                },
                input_email: {
                    required: true
                },
                input_phone: {
                    required: true,
                },
                input_country: {
                    required: true,
                },
                input_city: {
                    required: true,
                },
                input_address: {
                    required: true,
                },
                input_zip: {
                    required: true,
                },
                input_state: {
                    required: true,
                },
            },
            messages: {
                // input_first_name: {
                //     required: "Turnuva adı boş bırakılamaz."
                // }
            },
            submitHandler: function(form) {
                $("#editCustomerButton").prop("disabled", true);

                let title = form.input_title.selectedOptions[0].id
                let name = form.input_name.value
                let middlename = form.input_middlename.value
                let lastname = form.input_lastname.value
                let gender = form.input_gender.selectedOptions[0].id
                let birthdate = form.input_birthdate.value
                let email = form.input_email.value
                let phone = form.input_phone.value
                let country = form.input_country.value
                let city = form.input_city.value
                let address = form.input_address.value
                let zip = form.input_zip.value
                let state = form.input_state.value

                $.ajax({
                    type: "post",
                    url: '{{ action("App\\Http\\Controllers\\MetatraderController@addClient") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: '{{ $user->id }}',
                        title: title,
                        name: name,
                        middlename: middlename,
                        lastname: lastname,
                        gender: gender,
                        birthdate: birthdate,
                        email: email,
                        phone: phone,
                        country: country,
                        city: city,
                        address: address,
                        zip: zip,
                        state: state
                    },
                    success: function(response) {
                        console.log(response)
                        toastr.success("New client successfully added!");
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error)
                        toastr.error(error.responseJSON.message);
                        $("#editCustomerButton").prop("disabled", false);
                    }
                });
            }
        });

        $("#editCustomer").validate({
            errorClass: 'is-invalid',
            rules: {
                input_title: {
                    required: true
                },
                input_name: {
                    required: true
                },
                input_middlename: {
                    required: false
                },
                input_lastname: {
                    required: true
                },
                input_gender: {
                    required: true
                },
                input_birthdate: {
                    required: true,
                },
                input_phone: {
                    required: true,
                },
                input_country: {
                    required: true,
                },
                input_city: {
                    required: true,
                },
                input_address: {
                    required: true,
                },
                input_zip: {
                    required: true,
                },
                input_state: {
                    required: true,
                },
            },
            messages: {
                // input_first_name: {
                //     required: "Turnuva adı boş bırakılamaz."
                // }
            },
            submitHandler: function(form) {
                $("#editCustomerButton").prop("disabled", true);

                let title = form.input_title.selectedOptions[0].id
                let name = form.input_name.value
                let middlename = form.input_middlename.value
                let lastname = form.input_lastname.value
                let gender = form.input_gender.selectedOptions[0].id
                let birthdate = form.input_birthdate.value
                let phone = form.input_phone.value
                let country = form.input_country.value
                let city = form.input_city.value
                let address = form.input_address.value
                let zip = form.input_zip.value
                let state = form.input_state.value

                $.ajax({
                    type: "put",
                    url: '{{ action("App\\Http\\Controllers\\UsersController@update") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: '{{ $user->id }}',
                        title: title,
                        name: name,
                        middlename: middlename,
                        lastname: lastname,
                        gender: gender,
                        birthdate: birthdate,
                        phone: phone,
                        country: country,
                        city: city,
                        address: address,
                        zip: zip,
                        state: state
                    },
                    success: function(response) {
                        console.log(response)
                        toastr.success("Customer edited successfully");
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error)
                        toastr.error(error.responseJSON.message);
                        $("#editCustomerButton").prop("disabled", false);
                    }
                });
            }
        });

        $('body').on('click', 'button[id=changeVerificationButton]', function(e) {
            $("#changeVerificationButton").prop("disabled", true);

            var checkBoxEmail = $('#checkBoxEmail').is(":checked");
            var checkBoxSumsub = $('#checkBoxSumsub').is(":checked");

            $.ajax({
                type: "post",
                url: '{{ action("App\\Http\\Controllers\\UsersController@changeVerification") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: '{{ $user->id }}',
                    email: checkBoxEmail,
                    sumsub: checkBoxSumsub
                },
                success: function(response) {
                    toastr.success(response.message);
                    $('#changeVerificationModal').modal('hide');
                    location.reload();
                },
                error: function($error) {
                    toastr.error($error.responseText)
                    console.log($error)
                    $("#changeVerificationButton").prop("disabled", false);
                }
            });
        })

        $('body').on('click', 'button[id=transfersTableButton]', function(e) {
            $("#transfersTableButton").prop("disabled", true);

            const input_start_time = $('#input_transfers_start_time').val();
            const input_end_time = $('#input_transfers_end_time').val();

            if (input_start_time == "" || input_end_time == "") {
                toastr.error("Please select start time and end time")
                $("#transfersTableButton").prop("disabled", false);
                return;
            }

            const addRow = (data) => {
                const table = $('#transfersTable').DataTable();
                table.row.add([
                    data.id,
                    '[' + data.from_account_type.slug + '] ' + data.from_account_id,
                    '[' + data.to_account_type.slug + '] ' + data.to_account_id,
                    data.amount,
                    data.created_at,
                    data.transfer_status.name
                ]).draw();
            }

            $.ajax({
                type: "get",
                url: '{{ action("App\\Http\\Controllers\\UsersController@getTransfers") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: '{{ $user->id }}',
                    start_time: input_start_time,
                    end_time: input_end_time
                },
                success: function(response) {
                    $('#transfersTable').DataTable().clear().draw();
                    response.transfers.forEach(element => {
                        addRow(element)
                    });
                    $("#transfersTableButton").prop("disabled", false);
                },
                error: function($error) {
                    toastr.error($error.responseText)
                    console.log($error)
                    $("#transfersTableButton").prop("disabled", false);
                }
            });
        })
        </script>

    </x-slot>
</x-app-layout>