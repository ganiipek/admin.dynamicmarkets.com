<div class="card">
    <div class="card-header">
        <h4 class="card-title">Withdrawal Requests</h4>
    </div>
    <div class="card-body">
        @if ($error)
        <div class="alert alert-danger solid alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
            </svg>
            <strong>Error!</strong> {{ $error_message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button>
        </div>
        @endif
        <div class="table-responsive  patient">
            <table class="table-responsive-lg table display mb-4 dataTablesCard  text-black dataTable no-footer"
                id="example7">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Request Date</th>
                        <th>Account Holder</th>
                        <th>IBAN</th>
                        <th>BIC</th>
                        <th>Withdrawal Status</th>
                        <th>Requested Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($withdrawals as $withdrawal)
                    <tr>
                        <td class="whitesp-no">{{$withdrawal->user_id}}</td>
                        <td class="whitesp-no fs-14 font-w400">
                            {{$withdrawal->created_at}}</td>
                        <td class="whitesp-no p-0">
                            <div class="py-sm-3 py-1">
                                <div>
                                    <h6 class="font-w500 fs-15 mb-0">
                                        {{$withdrawal->holder}}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td class="whitesp-no p-0">
                            <div class="py-sm-3 py-1">
                                <div>
                                    <h6 class="font-w500 fs-15 mb-0">
                                        {{$withdrawal->iban}}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td class="whitesp-no p-0">
                            <div class="py-sm-3 py-1">
                                <div>
                                    <h6 class="font-w500 fs-15 mb-0">
                                        {{$withdrawal->bic}}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td class="whitesp-no">
                            <center>
                                @if($withdrawal->withdraw_status->name == "Pending")
                                <span class="btn light btn-primary btn-sm">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.6156 12.3117C19.6156 12.6545 19.5927 12.9973 19.547 13.3383C19.5576 13.2609 19.5681 13.1818 19.5787 13.1045C19.4873 13.7795 19.308 14.4404 19.0425 15.068C19.0724 14.9977 19.1023 14.9274 19.1304 14.8588C18.8738 15.4652 18.5398 16.0348 18.139 16.5568C18.1847 16.4971 18.2304 16.4391 18.2761 16.3793C17.8718 16.9031 17.4007 17.3725 16.8787 17.7768C16.9384 17.7311 16.9964 17.6854 17.0562 17.6397C16.5341 18.0404 15.9646 18.3744 15.3582 18.6311C15.4285 18.6012 15.4988 18.5713 15.5673 18.5432C14.9398 18.8068 14.2789 18.9879 13.6039 19.0793C13.6812 19.0688 13.7603 19.0582 13.8377 19.0477C13.1574 19.1373 12.4666 19.1373 11.7845 19.0477C11.8619 19.0582 11.941 19.0688 12.0183 19.0793C11.3433 18.9879 10.6824 18.8086 10.0548 18.5432C10.1252 18.5731 10.1955 18.6029 10.264 18.6311C9.65758 18.3744 9.08805 18.0404 8.56598 17.6397C8.62574 17.6854 8.68375 17.7311 8.74351 17.7768C8.21969 17.3725 7.75035 16.9014 7.34605 16.3793C7.39176 16.4391 7.43746 16.4971 7.48316 16.5568C7.08238 16.0348 6.7484 15.4652 6.49176 14.8588C6.52164 14.9291 6.55152 14.9994 6.57965 15.068C6.31597 14.4404 6.13492 13.7795 6.04351 13.1045C6.05406 13.1818 6.06461 13.2609 6.07515 13.3383C5.98551 12.658 5.98551 11.9672 6.07515 11.2852C6.06461 11.3625 6.05406 11.4416 6.04351 11.519C6.13492 10.844 6.31422 10.183 6.57965 9.55547C6.54976 9.62579 6.51988 9.6961 6.49176 9.76465C6.7484 9.15821 7.08238 8.58868 7.48316 8.06661C7.43746 8.12637 7.39176 8.18438 7.34605 8.24415C7.75035 7.72032 8.22144 7.25098 8.74351 6.84669C8.68375 6.89239 8.62574 6.93809 8.56598 6.98379C9.08805 6.58301 9.65758 6.24903 10.264 5.99239C10.1937 6.02227 10.1234 6.05215 10.0548 6.08028C10.6824 5.81661 11.3433 5.63555 12.0183 5.54415C11.941 5.55469 11.8619 5.56524 11.7845 5.57579C12.4648 5.48614 13.1556 5.48614 13.8377 5.57579C13.7603 5.56524 13.6812 5.55469 13.6039 5.54415C14.2789 5.63555 14.9398 5.81485 15.5673 6.08028C15.497 6.0504 15.4267 6.02051 15.3582 5.99239C15.9646 6.24903 16.5341 6.58301 17.0562 6.98379C16.9964 6.93809 16.9384 6.89239 16.8787 6.84669C17.4025 7.25098 17.8718 7.72208 18.2761 8.24415C18.2304 8.18438 18.1847 8.12637 18.139 8.06661C18.5398 8.58868 18.8738 9.15821 19.1304 9.76465C19.1005 9.69434 19.0707 9.62403 19.0425 9.55547C19.3062 10.183 19.4873 10.844 19.5787 11.519C19.5681 11.4416 19.5576 11.3625 19.547 11.2852C19.5927 11.6262 19.6156 11.969 19.6156 12.3117C19.6156 12.5367 19.714 12.774 19.8722 12.934C20.0252 13.0869 20.2748 13.2012 20.4945 13.1906C20.7212 13.1801 20.9568 13.1063 21.1168 12.934C21.275 12.7617 21.3752 12.5508 21.3734 12.3117C21.3716 11.4328 21.2398 10.5398 20.9673 9.70313C20.7037 8.89102 20.3257 8.10704 19.8283 7.41094C19.5646 7.04004 19.2781 6.68321 18.9617 6.35626C18.6435 6.02754 18.2972 5.73751 17.9334 5.45977C17.2548 4.93946 16.4972 4.54747 15.6974 4.25215C14.8748 3.94981 13.9941 3.79161 13.1205 3.75645C12.2345 3.72129 11.3275 3.83028 10.475 4.07286C9.65758 4.30489 8.85953 4.66348 8.14937 5.13106C7.44625 5.59336 6.79762 6.15411 6.26148 6.80274C5.96969 7.15782 5.69371 7.52872 5.45816 7.92247C5.22086 8.31797 5.02926 8.73458 4.85347 9.16172C4.52125 9.97208 4.34019 10.8352 4.2734 11.707C4.20484 12.5912 4.28922 13.4982 4.49664 14.3596C4.69879 15.191 5.03629 16.0049 5.48101 16.7361C5.91695 17.4533 6.46363 18.1213 7.09117 18.6785C7.72398 19.2393 8.43238 19.7227 9.20406 20.0707C9.62594 20.2623 10.0601 20.4311 10.5066 20.5559C10.9636 20.6842 11.4312 20.7615 11.9023 20.816C12.7935 20.9215 13.7005 20.8617 14.5777 20.6842C15.4162 20.5137 16.2371 20.199 16.9841 19.7824C17.7171 19.3729 18.4009 18.8455 18.981 18.2373C19.5664 17.6256 20.0726 16.9225 20.4488 16.1649C20.8337 15.3914 21.1168 14.5652 21.2468 13.7109C21.3171 13.2451 21.3664 12.7793 21.3664 12.3082C21.3664 12.0832 21.2679 11.8459 21.1097 11.6859C20.9568 11.533 20.7072 11.4188 20.4875 11.4293C20.2607 11.4398 20.0252 11.5137 19.8652 11.6859C19.7158 11.8617 19.6156 12.0727 19.6156 12.3117Z"
                                            fill="#01A3FF"></path>
                                        <path
                                            d="M12.8125 17.7328C13.0375 17.7328 13.2748 17.6344 13.4348 17.4762C13.5877 17.3233 13.702 17.0737 13.6914 16.8539C13.6809 16.6272 13.607 16.3916 13.4348 16.2317C13.2625 16.0735 13.0516 15.975 12.8125 15.975C12.5875 15.975 12.3502 16.0735 12.1902 16.2317C12.0373 16.3846 11.9231 16.6342 11.9336 16.8539C11.9442 17.0807 12.018 17.3162 12.1902 17.4762C12.3625 17.6344 12.5752 17.7328 12.8125 17.7328ZM11.1074 10.3518C11.1074 10.2375 11.1145 10.125 11.1303 10.0108C11.1197 10.0881 11.1092 10.1672 11.0986 10.2446C11.1303 10.0178 11.1901 9.79632 11.2779 9.58538C11.2481 9.65569 11.2182 9.726 11.1901 9.79456C11.2779 9.58889 11.3904 9.39554 11.5258 9.218C11.4801 9.27776 11.4344 9.33577 11.3887 9.39554C11.5258 9.21975 11.6822 9.06331 11.858 8.9262C11.7983 8.9719 11.7402 9.01761 11.6805 9.06331C11.858 8.92796 12.0514 8.81546 12.257 8.72757C12.1867 8.75745 12.1164 8.78733 12.0479 8.81546C12.2588 8.72757 12.4803 8.6678 12.707 8.63616C12.6297 8.64671 12.5506 8.65725 12.4733 8.6678C12.7 8.63968 12.9285 8.63968 13.1553 8.6678C13.0779 8.65725 12.9988 8.64671 12.9215 8.63616C13.1483 8.6678 13.3697 8.72581 13.5824 8.8137C13.5121 8.78382 13.4418 8.75393 13.3733 8.72581C13.5789 8.8137 13.7723 8.9262 13.9498 9.06155C13.89 9.01585 13.832 8.97014 13.7723 8.92444C13.9481 9.06155 14.1045 9.218 14.2416 9.39378C14.1959 9.33401 14.1502 9.276 14.1045 9.21624C14.2399 9.39378 14.3523 9.58714 14.4402 9.7928C14.4104 9.72249 14.3805 9.65218 14.3523 9.58362C14.4402 9.79632 14.5 10.016 14.5299 10.2446C14.5193 10.1672 14.5088 10.0881 14.4982 10.0108C14.5264 10.2375 14.5264 10.466 14.4982 10.691C14.5088 10.6137 14.5193 10.5346 14.5299 10.4573C14.4982 10.684 14.4385 10.9055 14.3506 11.1182C14.3805 11.0479 14.4104 10.9776 14.4385 10.909C14.3506 11.1147 14.2381 11.308 14.101 11.4873C14.1467 11.4276 14.1924 11.3696 14.2381 11.3098C14.101 11.4856 13.9445 11.642 13.7688 11.7791C13.8285 11.7334 13.8865 11.6877 13.9463 11.642C13.7705 11.7756 13.5807 11.8846 13.3803 11.9742C13.1236 12.0885 12.8828 12.2678 12.6842 12.4647C12.2236 12.9235 11.967 13.5405 11.9371 14.1873C11.9319 14.3157 11.9354 14.444 11.9354 14.5723C11.9354 14.7973 12.0338 15.0346 12.192 15.1946C12.3449 15.3475 12.5945 15.4617 12.8143 15.4512C13.041 15.4407 13.2766 15.3668 13.4365 15.1946C13.5947 15.0223 13.6932 14.8114 13.6932 14.5723C13.6932 14.393 13.6861 14.2137 13.709 14.0362C13.6984 14.1135 13.6879 14.1926 13.6774 14.27C13.6984 14.1293 13.7354 13.994 13.7899 13.8621C13.76 13.9325 13.7301 14.0028 13.702 14.0713C13.76 13.9342 13.8356 13.8076 13.927 13.6881C13.8813 13.7479 13.8356 13.8059 13.7899 13.8657C13.8777 13.7549 13.9779 13.6565 14.0887 13.5686C14.0289 13.6143 13.9709 13.66 13.9111 13.7057C14.0816 13.5756 14.2732 13.5 14.4613 13.4016C14.6951 13.2785 14.9096 13.1168 15.11 12.9463C15.4633 12.6457 15.7621 12.2467 15.9484 11.8213C16.0574 11.5717 16.1559 11.3239 16.2051 11.0549C16.2543 10.7842 16.2895 10.5065 16.2754 10.2305C16.2508 9.69612 16.1154 9.19339 15.8693 8.72054C15.4316 7.8803 14.6055 7.23694 13.6914 7.00139C13.1623 6.86604 12.6297 6.86429 12.0953 6.96624C11.8404 7.0137 11.6067 7.10862 11.3676 7.21057C11.1901 7.28616 11.0213 7.37932 10.8649 7.49182C10.4184 7.81175 10.0299 8.20901 9.76975 8.69944C9.49905 9.20921 9.35139 9.77347 9.34963 10.3535C9.34787 10.5785 9.44807 10.8158 9.60627 10.9758C9.7592 11.1287 10.0088 11.243 10.2285 11.2325C10.7067 11.2096 11.1057 10.8457 11.1074 10.3518Z"
                                            fill="#01A3FF"></path>
                                    </svg>
                                    {{$withdrawal->withdraw_status->name}}
                                </span>
                                @endif
                                @if($withdrawal->withdraw_status->name == "Rejected")
                                <span class=" btn light btn-pink btn-sm ">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.1156 12.3117C19.1156 12.6545 19.0927 12.9973 19.047 13.3383C19.0576 13.2609 19.0681 13.1818 19.0787 13.1045C18.9873 13.7795 18.808 14.4404 18.5425 15.068C18.5724 14.9977 18.6023 14.9274 18.6304 14.8588C18.3738 15.4652 18.0398 16.0348 17.639 16.5568C17.6847 16.4971 17.7304 16.4391 17.7761 16.3793C17.3718 16.9031 16.9007 17.3725 16.3787 17.7768C16.4384 17.7311 16.4964 17.6854 16.5562 17.6397C16.0341 18.0404 15.4646 18.3744 14.8582 18.6311C14.9285 18.6012 14.9988 18.5713 15.0673 18.5432C14.4398 18.8068 13.7789 18.9879 13.1039 19.0793C13.1812 19.0688 13.2603 19.0582 13.3377 19.0477C12.6574 19.1373 11.9666 19.1373 11.2845 19.0477C11.3619 19.0582 11.441 19.0688 11.5183 19.0793C10.8433 18.9879 10.1824 18.8086 9.55484 18.5432C9.62516 18.5731 9.69547 18.6029 9.76402 18.6311C9.15758 18.3744 8.58805 18.0404 8.06598 17.6397C8.12574 17.6854 8.18375 17.7311 8.24351 17.7768C7.71969 17.3725 7.25035 16.9014 6.84605 16.3793C6.89176 16.4391 6.93746 16.4971 6.98316 16.5568C6.58238 16.0348 6.2484 15.4652 5.99176 14.8588C6.02164 14.9291 6.05152 14.9994 6.07965 15.068C5.81597 14.4404 5.63492 13.7795 5.54351 13.1045C5.55406 13.1818 5.56461 13.2609 5.57515 13.3383C5.48551 12.658 5.48551 11.9672 5.57515 11.2852C5.56461 11.3625 5.55406 11.4416 5.54351 11.519C5.63492 10.844 5.81422 10.183 6.07965 9.55547C6.04976 9.62579 6.01988 9.6961 5.99176 9.76465C6.2484 9.15821 6.58238 8.58868 6.98316 8.06661C6.93746 8.12637 6.89176 8.18438 6.84605 8.24415C7.25035 7.72032 7.72144 7.25098 8.24351 6.84669C8.18375 6.89239 8.12574 6.93809 8.06598 6.98379C8.58805 6.58301 9.15758 6.24903 9.76402 5.99239C9.69371 6.02227 9.6234 6.05215 9.55484 6.08028C10.1824 5.81661 10.8433 5.63555 11.5183 5.54415C11.441 5.55469 11.3619 5.56524 11.2845 5.57579C11.9648 5.48614 12.6556 5.48614 13.3377 5.57579C13.2603 5.56524 13.1812 5.55469 13.1039 5.54415C13.7789 5.63555 14.4398 5.81485 15.0673 6.08028C14.997 6.0504 14.9267 6.02051 14.8582 5.99239C15.4646 6.24903 16.0341 6.58301 16.5562 6.98379C16.4964 6.93809 16.4384 6.89239 16.3787 6.84669C16.9025 7.25098 17.3718 7.72208 17.7761 8.24415C17.7304 8.18438 17.6847 8.12637 17.639 8.06661C18.0398 8.58868 18.3738 9.15821 18.6304 9.76465C18.6005 9.69434 18.5707 9.62403 18.5425 9.55547C18.8062 10.183 18.9873 10.844 19.0787 11.519C19.0681 11.4416 19.0576 11.3625 19.047 11.2852C19.0927 11.6262 19.1156 11.969 19.1156 12.3117C19.1156 12.5367 19.214 12.774 19.3722 12.934C19.5252 13.0869 19.7748 13.2012 19.9945 13.1906C20.2212 13.1801 20.4568 13.1063 20.6168 12.934C20.775 12.7617 20.8752 12.5508 20.8734 12.3117C20.8716 11.4328 20.7398 10.5398 20.4673 9.70313C20.2037 8.89102 19.8257 8.10704 19.3283 7.41094C19.0646 7.04004 18.7781 6.68321 18.4617 6.35626C18.1435 6.02754 17.7972 5.73751 17.4334 5.45977C16.7548 4.93946 15.9972 4.54747 15.1974 4.25215C14.3748 3.94981 13.4941 3.79161 12.6205 3.75645C11.7345 3.72129 10.8275 3.83028 9.97496 4.07286C9.15758 4.30489 8.35953 4.66348 7.64937 5.13106C6.94625 5.59336 6.29762 6.15411 5.76148 6.80274C5.46969 7.15782 5.19371 7.52872 4.95816 7.92247C4.72086 8.31797 4.52926 8.73458 4.35347 9.16172C4.02125 9.97208 3.84019 10.8352 3.7734 11.707C3.70484 12.5912 3.78922 13.4982 3.99664 14.3596C4.19879 15.191 4.53629 16.0049 4.98101 16.7361C5.41695 17.4533 5.96363 18.1213 6.59117 18.6785C7.22398 19.2393 7.93238 19.7227 8.70406 20.0707C9.12594 20.2623 9.56012 20.4311 10.0066 20.5559C10.4636 20.6842 10.9312 20.7615 11.4023 20.816C12.2935 20.9215 13.2005 20.8617 14.0777 20.6842C14.9162 20.5137 15.7371 20.199 16.4841 19.7824C17.2171 19.3729 17.9009 18.8455 18.481 18.2373C19.0664 17.6256 19.5726 16.9225 19.9488 16.1649C20.3337 15.3914 20.6168 14.5652 20.7468 13.7109C20.8171 13.2451 20.8664 12.7793 20.8664 12.3082C20.8664 12.0832 20.7679 11.8459 20.6097 11.6859C20.4568 11.533 20.2072 11.4188 19.9875 11.4293C19.7607 11.4398 19.5252 11.5137 19.3652 11.6859C19.2158 11.8617 19.1156 12.0727 19.1156 12.3117Z"
                                            fill="#EB62D0"></path>
                                        <path
                                            d="M12.3125 17.7328C12.5375 17.7328 12.7748 17.6344 12.9348 17.4762C13.0877 17.3233 13.202 17.0737 13.1914 16.8539C13.1809 16.6272 13.107 16.3916 12.9348 16.2317C12.7625 16.0735 12.5516 15.975 12.3125 15.975C12.0875 15.975 11.8502 16.0735 11.6902 16.2317C11.5373 16.3846 11.4231 16.6342 11.4336 16.8539C11.4442 17.0807 11.518 17.3162 11.6902 17.4762C11.8625 17.6344 12.0752 17.7328 12.3125 17.7328ZM10.6074 10.3518C10.6074 10.2375 10.6145 10.125 10.6303 10.0108C10.6197 10.0881 10.6092 10.1672 10.5986 10.2446C10.6303 10.0178 10.6901 9.79632 10.7779 9.58538C10.7481 9.65569 10.7182 9.726 10.6901 9.79456C10.7779 9.58889 10.8904 9.39554 11.0258 9.218C10.9801 9.27776 10.9344 9.33577 10.8887 9.39554C11.0258 9.21975 11.1822 9.06331 11.358 8.9262C11.2983 8.9719 11.2402 9.01761 11.1805 9.06331C11.358 8.92796 11.5514 8.81546 11.757 8.72757C11.6867 8.75745 11.6164 8.78733 11.5479 8.81546C11.7588 8.72757 11.9803 8.6678 12.207 8.63616C12.1297 8.64671 12.0506 8.65725 11.9733 8.6678C12.2 8.63968 12.4285 8.63968 12.6553 8.6678C12.5779 8.65725 12.4988 8.64671 12.4215 8.63616C12.6483 8.6678 12.8697 8.72581 13.0824 8.8137C13.0121 8.78382 12.9418 8.75393 12.8733 8.72581C13.0789 8.8137 13.2723 8.9262 13.4498 9.06155C13.39 9.01585 13.332 8.97014 13.2723 8.92444C13.4481 9.06155 13.6045 9.218 13.7416 9.39378C13.6959 9.33401 13.6502 9.276 13.6045 9.21624C13.7399 9.39378 13.8523 9.58714 13.9402 9.7928C13.9104 9.72249 13.8805 9.65218 13.8523 9.58362C13.9402 9.79632 14 10.016 14.0299 10.2446C14.0193 10.1672 14.0088 10.0881 13.9982 10.0108C14.0264 10.2375 14.0264 10.466 13.9982 10.691C14.0088 10.6137 14.0193 10.5346 14.0299 10.4573C13.9982 10.684 13.9385 10.9055 13.8506 11.1182C13.8805 11.0479 13.9104 10.9776 13.9385 10.909C13.8506 11.1147 13.7381 11.308 13.601 11.4873C13.6467 11.4276 13.6924 11.3696 13.7381 11.3098C13.601 11.4856 13.4445 11.642 13.2688 11.7791C13.3285 11.7334 13.3865 11.6877 13.4463 11.642C13.2705 11.7756 13.0807 11.8846 12.8803 11.9742C12.6236 12.0885 12.3828 12.2678 12.1842 12.4647C11.7236 12.9235 11.467 13.5405 11.4371 14.1873C11.4319 14.3157 11.4354 14.444 11.4354 14.5723C11.4354 14.7973 11.5338 15.0346 11.692 15.1946C11.8449 15.3475 12.0945 15.4617 12.3143 15.4512C12.541 15.4407 12.7766 15.3668 12.9365 15.1946C13.0947 15.0223 13.1932 14.8114 13.1932 14.5723C13.1932 14.393 13.1861 14.2137 13.209 14.0362C13.1984 14.1135 13.1879 14.1926 13.1774 14.27C13.1984 14.1293 13.2354 13.994 13.2899 13.8621C13.26 13.9325 13.2301 14.0028 13.202 14.0713C13.26 13.9342 13.3356 13.8076 13.427 13.6881C13.3813 13.7479 13.3356 13.8059 13.2899 13.8657C13.3777 13.7549 13.4779 13.6565 13.5887 13.5686C13.5289 13.6143 13.4709 13.66 13.4111 13.7057C13.5816 13.5756 13.7732 13.5 13.9613 13.4016C14.1951 13.2785 14.4096 13.1168 14.61 12.9463C14.9633 12.6457 15.2621 12.2467 15.4484 11.8213C15.5574 11.5717 15.6559 11.3239 15.7051 11.0549C15.7543 10.7842 15.7895 10.5065 15.7754 10.2305C15.7508 9.69612 15.6154 9.19339 15.3693 8.72054C14.9316 7.8803 14.1055 7.23694 13.1914 7.00139C12.6623 6.86604 12.1297 6.86429 11.5953 6.96624C11.3404 7.0137 11.1067 7.10862 10.8676 7.21057C10.6901 7.28616 10.5213 7.37932 10.3649 7.49182C9.91838 7.81175 9.5299 8.20901 9.26975 8.69944C8.99905 9.20921 8.85139 9.77347 8.84963 10.3535C8.84787 10.5785 8.94807 10.8158 9.10627 10.9758C9.2592 11.1287 9.50881 11.243 9.72854 11.2325C10.2067 11.2096 10.6057 10.8457 10.6074 10.3518Z"
                                            fill="#EB62D0"></path>
                                    </svg>
                                    {{$withdrawal->withdraw_status->name}}
                                </span>
                                @endif
                                @if($withdrawal->withdraw_status->name == "Completed")
                                <span class="btn light btn-success btn-sm ">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.50912 14.5C5.25012 14.5 4.99413 14.4005 4.80013 14.2065L1.79362 11.2C1.40213 10.809 1.40213 10.174 1.79362 9.78302C2.18512 9.39152 2.81913 9.39152 3.21063 9.78302L5.62812 12.2005L12.9306 7.18802C13.3866 6.87502 14.0106 6.99102 14.3236 7.44702C14.6371 7.90352 14.5211 8.52702 14.0646 8.84052L6.07613 14.324C5.90363 14.442 5.70612 14.5 5.50912 14.5Z"
                                            fill="#1EBA62" />
                                        <path
                                            d="M5.50912 8.98807C5.25012 8.98807 4.99413 8.88857 4.80013 8.69457L1.79362 5.68807C1.40213 5.29657 1.40213 4.66207 1.79362 4.27107C2.18512 3.87957 2.81913 3.87957 3.21063 4.27107L5.62812 6.68857L12.9306 1.67607C13.3866 1.36307 14.0106 1.47907 14.3236 1.93507C14.6371 2.39157 14.5211 3.01507 14.0646 3.32857L6.07613 8.81257C5.90363 8.93057 5.70612 8.98807 5.50912 8.98807Z"
                                            fill="#1EBA62" />
                                    </svg>
                                    {{$withdrawal->withdraw_status->name}}
                                </span>
                                @endif
                            </center>
                        </td>
                        <td class="doller">$ {{$withdrawal->amount}} </td>
                        <td class="whitesp-no">
                            <center>
                                <a
                                    href="{{ route('withdrawal.detail', ['user_id'=>$withdrawal->user_id,'id'=>$withdrawal->id]) }}"><span
                                        class="btn light btn-primary btn-sm ">
                                        Details
                                    </span>
                                </a>
                            </center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>