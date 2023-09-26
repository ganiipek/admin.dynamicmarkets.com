<!DOCTYPE html>
<html lang="en">

<head>
     	
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="GDM Admin" />
	<meta property="og:title" content="GDM Admin" />
	<meta property="og:description" content="GDM Admin" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>FinLab Crypto Trading UI Admin</title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
	<link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./vendor/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    	
    <div id="preloader">
	  <div class="loader"></div>
	</div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		  <div class="nav-header">
            <a href="index.html" class="brand-logo">
				<svg class="logo-abbr" width="40" height="40" viewBox="0 0 64 61" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M7.0188 22.6571H56.1512L49.1323 33.9857H28.0756L38.6039 49.6714L31.585 61L7.0188 22.6571Z" fill="var(--primary)"/>
					<path d="M7.01891 0H56.1513L63.1702 12.2H0L7.01891 0Z" fill="var(--primary)"/>
				</svg>	
				<div class="brand-title">
					<svg width="100" height="35" viewBox="0 0 176 44" fill="none" xmlns="http://www.w3.org/2000/svg">w
						<path d="M23.9171 4.94226V11.1817H7.83215V21.0653H20.1581V27.1942H7.83215V43.4827H0.09375V4.94226H23.9171Z" fill="#2A353A"/>
						<path d="M33.328 9.24916C31.965 9.24916 30.823 8.82586 29.901 7.97926C29.017 7.09576 28.575 6.00986 28.575 4.72156C28.575 3.43316 29.017 2.36566 29.901 1.51902C30.823 0.635568 31.965 0.193848 33.328 0.193848C34.692 0.193848 35.816 0.635568 36.7 1.51902C37.621 2.36566 38.082 3.43316 38.082 4.72156C38.082 6.00986 37.621 7.09576 36.7 7.97926C35.816 8.82586 34.692 9.24916 33.328 9.24916ZM37.142 12.8935V43.4828H29.404V12.8935H37.142Z" fill="#2A353A"/>
						<path d="M61.757 12.4517C65.405 12.4517 68.353 13.6113 70.601 15.9303C72.849 18.2126 73.973 21.4151 73.973 25.5378V43.4828H66.234V26.5869C66.234 24.1574 65.626 22.2985 64.41 21.0101C63.194 19.685 61.536 19.0224 59.435 19.0224C57.298 19.0224 55.603 19.685 54.35 21.0101C53.134 22.2985 52.526 24.1574 52.526 26.5869V43.4828H44.788V12.8935H52.526V16.7033C53.558 15.3782 54.866 14.3475 56.451 13.6113C58.072 12.8382 59.841 12.4517 61.757 12.4517Z" fill="#2A353A"/>
						<path d="M89.0701 37.3538H101.783V43.4827H81.3311V4.94226H89.0701V37.3538Z" fill="#2A353A"/>
						<path d="M104.711 28.0776C104.711 24.9856 105.319 22.2432 106.535 19.8505C107.788 17.4578 109.465 15.6173 111.565 14.329C113.703 13.0406 116.079 12.3964 118.696 12.3964C120.98 12.3964 122.97 12.8565 124.665 13.7768C126.397 14.6971 127.779 15.8566 128.811 17.2554V12.8934H136.604V43.4827H128.811V39.0103C127.816 40.4459 126.434 41.6422 124.665 42.5993C122.933 43.5196 120.925 43.9797 118.64 43.9797C116.061 43.9797 113.703 43.3171 111.565 41.9919C109.465 40.6668 107.788 38.8078 106.535 36.4152C105.319 33.9857 104.711 31.2065 104.711 28.0776ZM128.811 28.1881C128.811 26.3107 128.442 24.7095 127.705 23.3843C126.968 22.0223 125.973 20.9916 124.72 20.2922C123.468 19.556 122.123 19.1879 120.685 19.1879C119.248 19.1879 117.922 19.5376 116.706 20.237C115.49 20.9364 114.495 21.9671 113.721 23.3291C112.984 24.6543 112.615 26.2371 112.615 28.0776C112.615 29.9181 112.984 31.5378 113.721 32.9366C114.495 34.2986 115.49 35.3477 116.706 36.0839C117.959 36.8201 119.285 37.1882 120.685 37.1882C122.123 37.1882 123.468 36.8385 124.72 36.1391C125.973 35.4029 126.968 34.3722 127.705 33.047C128.442 31.685 128.811 30.0654 128.811 28.1881Z" fill="#2A353A"/>
						<path d="M151.901 17.3658C152.896 15.8934 154.259 14.6971 155.991 13.7768C157.76 12.8565 159.768 12.3964 162.016 12.3964C164.632 12.3964 166.99 13.0406 169.091 14.329C171.228 15.6173 172.905 17.4578 174.121 19.8505C175.374 22.2064 176 24.9487 176 28.0776C176 31.2065 175.374 33.9857 174.121 36.4152C172.905 38.8078 171.228 40.6668 169.091 41.9919C166.99 43.3171 164.632 43.9797 162.016 43.9797C159.731 43.9797 157.723 43.538 155.991 42.6545C154.296 41.7343 152.932 40.5563 151.901 39.1207V43.4827H144.162V2.62329H151.901V17.3658ZM168.096 28.0776C168.096 26.2371 167.709 24.6543 166.935 23.3291C166.198 21.9671 165.203 20.9364 163.95 20.237C162.734 19.5376 161.408 19.1879 159.971 19.1879C158.57 19.1879 157.244 19.556 155.991 20.2922C154.775 20.9916 153.78 22.0223 153.006 23.3843C152.269 24.7463 151.901 26.3475 151.901 28.1881C151.901 30.0286 152.269 31.6298 153.006 32.9918C153.78 34.3538 154.775 35.4029 155.991 36.1391C157.244 36.8385 158.57 37.1882 159.971 37.1882C161.408 37.1882 162.734 36.8201 163.95 36.0839C165.203 35.3477 166.198 34.2986 166.935 32.9366C167.709 31.5746 168.096 29.9549 168.096 28.0776Z" fill="#2A353A"/>
					</svg>
				</div> 

            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
					<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="22" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect width="4" height="4" rx="2" fill="#2A353A"/>
						<rect y="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect y="22" width="4" height="4" rx="2" fill="#2A353A"/>
					</svg>		
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="chat" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card dlab-chat-user-box">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
								<div>
									<h6 class="mb-1">Chat List</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dlab-scroll  " id="DLAB_W_Contacts_Body">
								<ul class="contacts">
									<li class="name-first-letter">A</li>
									<li class="active dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Archie Parker</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Alfie Mason</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>AharlieKane</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">B</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Bashid Samim</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Breddie Ronan</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Ceorge Carson</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">D</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Darry Parker</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Denry Hunter</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">J</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Jack Ronan</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Jacob Tucker</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>James Logan</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Joshua Weston</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">O</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oliver Acker</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dlab-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oscar Weston</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="card chat dlab-chat-history-box d-none">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);" class="dlab-chat-history-back">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
								</a>
								<div>
									<h6 class="mb-1">Chat with Khelesh</h6>
									<p class="mb-0 text-success">Online</p>
								</div>							
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
									<ul class="dropdown-menu dropdown-menu-end">
										<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
										<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
										<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
										<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
									</ul>
								</div>
							</div>
							<div class="card-body msg_card_body dlab-scroll" id="DLAB_W_Contacts_Body3">
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										You are welcome
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am looking for your next templates
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Ok, thank you have a good day
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										You are welcome
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am looking for your next templates
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Ok, thank you have a good day
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
							</div>
							<div class="card-footer type_msg">
								<div class="input-group">
									<textarea class="form-control" placeholder="Type your message..."></textarea>
									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="alerts" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
								<div>
									<h6 class="mb-1">Notications</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body1">
								<ul class="contacts">
									<li class="name-first-letter">SEVER STATUS</li>
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">KK</div>
											<div class="user_info">
												<span>David Nester Birthday</span>
												<p class="text-primary">Today</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SOCIAL</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont success">RU</div>
											<div class="user_info">
												<span>Perfection Simplified</span>
												<p>Jame Smith commented on your status</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SEVER STATUS</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">AU</div>
											<div class="user_info">
												<span>AharlieKane</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont info">MO</div>
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="card-footer"></div>
						</div>
					</div>
					<div class="tab-pane fade" id="notes">
						<div class="card mb-sm-3 mb-md-0 note_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
								<div>
									<h6 class="mb-1">Notes</h6>
									<p class="mb-0">Add New Nots</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body2">
								<ul class="contacts">
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>New order placed..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Youtube, a video-sharing website..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>john just buy your product..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Chat box End
        ***********************************-->
		
        <!--**********************************
            Header start
        ***********************************-->
		<div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="input-group search-area">
								<input type="text" class="form-control" placeholder="Search here...">
								<span class="input-group-text"><a href="javascript:void(0)">
									<svg width="15" height="15" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M17.5605 15.4395L13.7527 11.6317C14.5395 10.446 15 9.02625 15 7.5C15 3.3645 11.6355 0 7.5 0C3.3645 0 0 3.3645 0 7.5C0 11.6355 3.3645 15 7.5 15C9.02625 15 10.446 14.5395 11.6317 13.7527L15.4395 17.5605C16.0245 18.1462 16.9755 18.1462 17.5605 17.5605C18.1462 16.9747 18.1462 16.0252 17.5605 15.4395V15.4395ZM2.25 7.5C2.25 4.605 4.605 2.25 7.5 2.25C10.395 2.25 12.75 4.605 12.75 7.5C12.75 10.395 10.395 12.75 7.5 12.75C4.605 12.75 2.25 10.395 2.25 7.5V7.5Z" fill="#01A3FF"/>
									</svg>
								</a></span>
							</div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item">
								<div class="search-coundry">
									<select class="form-control custom-image-select-2 image-select mt-3 mt-sm-0">
										<option data-thumbnail="images/svg/albania.svg" data-content="<img src='images/svg/albania.svg'/> Dash Coin">Albania</option>
										<option data-thumbnail="images/svg/algeria.svg" data-content="<img src='images/svg/algeria.svg'/> Ripple">Algeria</option>
										<option data-thumbnail="images/svg/usflag.svg" data-content="<img src='images/svg/usflag.svg'/> Ethereum">Austria</option>
										<option data-thumbnail="images/svg/rus.svg" data-content="<img src='images/svg/rus.svg'/> Bitcoin">Belarus</option>
									</select>
								</div>	
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell-link" href="javascript:void(0);">
									<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M4.33333 22.75C4.19613 22.7503 4.0601 22.7246 3.9325 22.6742C3.73093 22.5939 3.55811 22.4549 3.43642 22.2753C3.31473 22.0957 3.24979 21.8836 3.25 21.6667V4.33333C3.25 4.04602 3.36414 3.77047 3.5673 3.5673C3.77047 3.36414 4.04602 3.25 4.33333 3.25H21.6667C21.954 3.25 22.2295 3.36414 22.4327 3.5673C22.6359 3.77047 22.75 4.04602 22.75 4.33333V7.58333C22.75 7.87065 22.6359 8.1462 22.4327 8.34937C22.2295 8.55253 21.954 8.66667 21.6667 8.66667C21.3793 8.66667 21.1038 8.55253 20.9006 8.34937C20.6975 8.1462 20.5833 7.87065 20.5833 7.58333V5.41667H5.41667V18.9367L7.58333 16.5967C7.68803 16.4837 7.81563 16.3943 7.9576 16.3345C8.09958 16.2747 8.25267 16.2459 8.40667 16.25H20.5833V11.9167C20.5833 11.6293 20.6975 11.3538 20.9006 11.1506C21.1038 10.9475 21.3793 10.8333 21.6667 10.8333C21.954 10.8333 22.2295 10.9475 22.4327 11.1506C22.6359 11.3538 22.75 11.6293 22.75 11.9167V17.3333C22.75 17.6207 22.6359 17.8962 22.4327 18.0994C22.2295 18.3025 21.954 18.4167 21.6667 18.4167H8.8725L5.12417 22.4033C5.02316 22.5122 4.90083 22.5992 4.76478 22.6589C4.62874 22.7185 4.48188 22.7495 4.33333 22.75Z" fill="#666666"/>
										<path d="M17.3334 9.75001H8.66671C8.37939 9.75001 8.10384 9.63587 7.90068 9.43271C7.69751 9.22954 7.58337 8.95399 7.58337 8.66668C7.58337 8.37936 7.69751 8.10381 7.90068 7.90064C8.10384 7.69748 8.37939 7.58334 8.66671 7.58334H17.3334C17.6207 7.58334 17.8962 7.69748 18.0994 7.90064C18.3026 8.10381 18.4167 8.37936 18.4167 8.66668C18.4167 8.95399 18.3026 9.22954 18.0994 9.43271C17.8962 9.63587 17.6207 9.75001 17.3334 9.75001ZM17.3334 14.0833H8.66671C8.37939 14.0833 8.10384 13.9692 7.90068 13.766C7.69751 13.5629 7.58337 13.2873 7.58337 13C7.58337 12.7127 7.69751 12.4371 7.90068 12.234C8.10384 12.0308 8.37939 11.9167 8.66671 11.9167H17.3334C17.6207 11.9167 17.8962 12.0308 18.0994 12.234C18.3026 12.4371 18.4167 12.7127 18.4167 13C18.4167 13.2873 18.3026 13.5629 18.0994 13.766C17.8962 13.9692 17.6207 14.0833 17.3334 14.0833Z" fill="#666666"/>
									</svg>										
                                </a>
							</li>		
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link " href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.75 10.8334C22.7469 9.8751 22.4263 8.94488 21.8382 8.18826C21.2501 7.43163 20.4279 6.89126 19.5 6.6517V4.33337C19.4997 4.15871 19.4572 3.98672 19.3761 3.83204C19.295 3.67736 19.1777 3.54459 19.0342 3.44503C18.8922 3.34623 18.7286 3.28286 18.5571 3.26024C18.3856 3.23763 18.2111 3.25641 18.0484 3.31503L8.59086 6.7492L4.39835 6.50003C4.25011 6.49047 4.10147 6.51151 3.9617 6.56183C3.82192 6.61215 3.69399 6.69068 3.58585 6.79253C3.4789 6.89448 3.39394 7.01723 3.33619 7.15323C3.27843 7.28924 3.24911 7.43561 3.25002 7.58337V15.1667C3.25022 15.3205 3.28316 15.4725 3.34667 15.6126C3.41018 15.7527 3.5028 15.8777 3.61835 15.9792C3.733 16.0795 3.86752 16.1545 4.01312 16.1993C4.15873 16.2441 4.31214 16.2577 4.46335 16.2392L5.88252 16.0659L6.90085 21.8509C6.94471 22.1052 7.07794 22.3356 7.27655 22.5004C7.47516 22.6653 7.7261 22.7538 7.98419 22.75H11.9167C12.0748 22.7521 12.2314 22.7195 12.3756 22.6545C12.5197 22.5896 12.648 22.4939 12.7512 22.3741C12.8544 22.2544 12.9302 22.1135 12.9732 21.9613C13.0162 21.8092 13.0253 21.6494 13 21.4934L12.1984 16.7267L18.1242 18.4167C18.2211 18.4325 18.3198 18.4325 18.4167 18.4167C18.704 18.4167 18.9796 18.3026 19.1827 18.0994C19.3859 17.8962 19.5 17.6207 19.5 17.3334V15.015C20.4279 14.7755 21.2501 14.2351 21.8382 13.4785C22.4263 12.7218 22.7469 11.7916 22.75 10.8334ZM5.41669 8.7317L7.58335 8.85087V13.6717L5.41669 13.9425V8.7317ZM10.6384 20.5834H8.88336L8.03836 15.795L8.59086 15.73L9.89086 16.0875L10.6384 20.5834ZM17.3334 15.9034L11.4292 14.2675C11.2529 14.1491 11.0457 14.085 10.8334 14.0834L9.75002 13.78V8.6667L17.3334 5.91503V15.9034ZM19.5 12.6534V8.97003C19.8233 9.16188 20.0912 9.43455 20.2772 9.76124C20.4632 10.0879 20.5611 10.4574 20.5611 10.8334C20.5611 11.2093 20.4632 11.5788 20.2772 11.9055C20.0912 12.2322 19.8233 12.5049 19.5 12.6967V12.6534Z" fill="#666666"/>
									</svg>	
                                </a>
                                <div class="dropdown-menu dropdown-menu-end of-visible">
									<div class="dropdown-header">
										<h4 class="title mb-0">Notification</h4>
										<a href="javascript:void(0);" class="d-none"><i class="flaticon-381-settings-6"></i></a>
									</div>
                                    <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
										<ul class="timeline">
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-info">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-success">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											 <li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-danger">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-primary">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
										</ul>
									</div>
                                    <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
                                </div>
                            </li>
							
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link " href="javascript:void(0);" data-bs-toggle="dropdown">
									<svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21.0966 7.93751L19.0491 7.28195L20.0133 5.42972C20.111 5.23585 20.1437 5.01761 20.1069 4.80514C20.07 4.59266 19.9654 4.39641 19.8075 4.24346L17.5 2.02703C17.3399 1.87311 17.1336 1.77126 16.9101 1.7358C16.6867 1.70034 16.4572 1.73304 16.2541 1.82932L14.3258 2.75544L13.6433 0.788743C13.5712 0.583741 13.4344 0.405421 13.2519 0.278597C13.0694 0.151774 12.8502 0.0827567 12.625 0.0811497H9.37496C9.14785 0.0805866 8.92629 0.148599 8.74161 0.275573C8.55693 0.402548 8.41847 0.582062 8.34579 0.788743L7.66329 2.75544L5.73496 1.82932C5.53312 1.73544 5.30592 1.70404 5.08472 1.73945C4.86351 1.77487 4.65919 1.87535 4.49996 2.02703L2.19246 4.24346C2.03222 4.39722 1.92619 4.59536 1.88927 4.81001C1.85234 5.02466 1.88639 5.24503 1.98663 5.44013L2.9508 7.29236L0.903296 7.94792C0.689871 8.01715 0.504224 8.14857 0.37219 8.32389C0.240156 8.4992 0.168303 8.70969 0.16663 8.92606V12.0478C0.166043 12.2659 0.23685 12.4788 0.369042 12.6561C0.501233 12.8335 0.688123 12.9665 0.903296 13.0363L2.9508 13.6919L1.98663 15.5441C1.88889 15.738 1.8562 15.9562 1.89307 16.1687C1.92994 16.3812 2.03455 16.5775 2.19246 16.7304L4.49996 18.9468C4.66004 19.1007 4.86632 19.2026 5.08979 19.2381C5.31326 19.2735 5.54268 19.2408 5.7458 19.1445L7.67413 18.2184L8.35663 20.1851C8.4293 20.3918 8.56777 20.5713 8.75245 20.6983C8.93713 20.8253 9.15868 20.8933 9.38579 20.8927H12.6358C12.8629 20.8933 13.0845 20.8253 13.2691 20.6983C13.4538 20.5713 13.5923 20.3918 13.665 20.1851L14.3475 18.2184L16.2758 19.1445C16.4763 19.2361 16.7013 19.2662 16.9203 19.2308C17.1392 19.1954 17.3416 19.0963 17.5 18.9468L19.8075 16.7304C19.9677 16.5766 20.0737 16.3785 20.1107 16.1639C20.1476 15.9492 20.1135 15.7288 20.0133 15.5337L19.0491 13.6815L21.0966 13.0259C21.3101 12.9567 21.4957 12.8253 21.6277 12.65C21.7598 12.4747 21.8316 12.2642 21.8333 12.0478V8.92606C21.8339 8.70791 21.7631 8.4951 21.6309 8.31771C21.4987 8.14032 21.3118 8.00732 21.0966 7.93751ZM19.6666 11.2986L18.3666 11.7148C18.0677 11.808 17.7934 11.9624 17.5629 12.1676C17.3323 12.3727 17.1509 12.6235 17.0314 12.9027C16.9118 13.1819 16.8569 13.4827 16.8705 13.7843C16.8841 14.0859 16.9658 14.381 17.11 14.6492L17.7275 15.8355L16.5358 16.9801L15.3333 16.3558C15.0555 16.2228 14.7512 16.1488 14.441 16.1386C14.1308 16.1285 13.8219 16.1824 13.5353 16.2969C13.2487 16.4113 12.9911 16.5836 12.7798 16.802C12.5685 17.0204 12.4086 17.2799 12.3108 17.5629L11.8775 18.8116H10.155L9.72163 17.5629C9.62466 17.2757 9.46382 17.0123 9.25027 16.7908C9.03671 16.5693 8.77556 16.3951 8.48492 16.2803C8.19427 16.1655 7.8811 16.1127 7.56712 16.1258C7.25314 16.1388 6.94587 16.2173 6.66663 16.3558L5.43163 16.9489L4.23996 15.8043L4.88996 14.6492C5.03415 14.381 5.11586 14.0859 5.12943 13.7843C5.143 13.4827 5.0881 13.1819 4.96855 12.9027C4.84899 12.6235 4.66764 12.3727 4.43707 12.1676C4.2065 11.9624 3.93223 11.808 3.6333 11.7148L2.3333 11.2986V9.67528L3.6333 9.25905C3.93223 9.16591 4.2065 9.01142 4.43707 8.80629C4.66764 8.60117 4.84899 8.35032 4.96855 8.07114C5.0881 7.79197 5.143 7.49116 5.12943 7.18957C5.11586 6.88798 5.03415 6.59284 4.88996 6.32462L4.27246 5.16958L5.46413 4.02494L6.66663 4.61807C6.94587 4.75656 7.25314 4.83505 7.56712 4.84808C7.8811 4.86112 8.19427 4.80839 8.48492 4.69355C8.77556 4.57871 9.03671 4.40452 9.25027 4.18305C9.46382 3.96158 9.62466 3.69814 9.72163 3.411L10.155 2.16231H11.845L12.2783 3.411C12.3753 3.69814 12.5361 3.96158 12.7497 4.18305C12.9632 4.40452 13.2244 4.57871 13.515 4.69355C13.8056 4.80839 14.1188 4.86112 14.4328 4.84808C14.7468 4.83505 15.054 4.75656 15.3333 4.61807L16.5683 4.02494L17.76 5.16958L17.11 6.32462C16.9715 6.59147 16.8944 6.88377 16.8839 7.18173C16.8733 7.47969 16.9295 7.77636 17.0486 8.05165C17.1678 8.32693 17.3471 8.57442 17.5745 8.77734C17.8019 8.98027 18.0721 9.1339 18.3666 9.22783L19.6666 9.64406V11.2986ZM11 6.32462C10.1429 6.32462 9.3051 6.56873 8.59249 7.02609C7.87988 7.48345 7.32446 8.13352 6.99648 8.89408C6.6685 9.65464 6.58269 10.4915 6.74989 11.299C6.91709 12.1064 7.3298 12.848 7.93583 13.4301C8.54186 14.0122 9.31398 14.4087 10.1546 14.5693C10.9952 14.7299 11.8664 14.6474 12.6583 14.3324C13.4501 14.0174 14.1268 13.4839 14.603 12.7994C15.0791 12.1149 15.3333 11.3102 15.3333 10.4869C15.3333 9.38302 14.8767 8.32432 14.0641 7.54373C13.2514 6.76315 12.1492 6.32462 11 6.32462ZM11 12.5681C10.5714 12.5681 10.1525 12.446 9.79623 12.2173C9.43992 11.9887 9.16221 11.6636 8.99822 11.2834C8.83423 10.9031 8.79132 10.4846 8.87493 10.0809C8.95853 9.67721 9.16488 9.30639 9.4679 9.01533C9.77091 8.72428 10.157 8.52606 10.5773 8.44576C10.9976 8.36546 11.4332 8.40667 11.8291 8.56419C12.225 8.72171 12.5634 8.98846 12.8015 9.3307C13.0396 9.67295 13.1666 10.0753 13.1666 10.4869C13.1666 11.0389 12.9384 11.5682 12.532 11.9585C12.1257 12.3488 11.5746 12.5681 11 12.5681Z" fill="#666666"/>
									</svg>
                                </a>
								<div class="dropdown-menu dropdown-menu-end">
									<div id="DZ_W_TimeLine02" class="widget-timeline dlab-scroll style-1 ps ps--active-y p-3 height370">
										<ul class="timeline">
											<li>
												<div class="timeline-badge primary"></div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>10 minutes ago</span>
													<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge info">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>20 minutes ago</span>
													<h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
													<p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
												</a>
											</li>
											<li>
												<div class="timeline-badge danger">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>30 minutes ago</span>
													<h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge success">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>15 minutes ago</span>
													<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge warning">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>20 minutes ago</span>
													<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge dark">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>20 minutes ago</span>
													<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</li>
							<li class="nav-item">
								<div class="dropdown header-profile2">
									<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<div class="header-info2 d-flex align-items-center">
											<div class="d-flex align-items-center sidebar-info">
												<div>
													<h4 class="mb-0">Nella Vita</h4>
													<span class="d-block text-end">Admin</span>
												</div>
											</div>
											<img src="images/user.jpg" alt="">
										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-end" style="">
										<a href="app-profile.html" class="dropdown-item ai-icon ">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="var(--primary)" fill-rule="nonzero"/>
												</g>
											</svg>
											<span class="ms-2">Profile </span>
										</a>
										<a href="chat.html" class="dropdown-item ai-icon ">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L5,18 C3.34314575,18 2,16.6568542 2,15 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 Z M6.16794971,10.5547002 C7.67758127,12.8191475 9.64566871,14 12,14 C14.3543313,14 16.3224187,12.8191475 17.8320503,10.5547002 C18.1384028,10.0951715 18.0142289,9.47430216 17.5547002,9.16794971 C17.0951715,8.86159725 16.4743022,8.98577112 16.1679497,9.4452998 C15.0109146,11.1808525 13.6456687,12 12,12 C10.3543313,12 8.9890854,11.1808525 7.83205029,9.4452998 C7.52569784,8.98577112 6.90482849,8.86159725 6.4452998,9.16794971 C5.98577112,9.47430216 5.86159725,10.0951715 6.16794971,10.5547002 Z" fill="var(--primary)"/>
												</g>
											</svg>
											<span class="ms-2">Message </span>
										</a>
										<a href="email-inbox.html" class="dropdown-item ai-icon ">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
													<circle fill="var(--primary)" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
												</g>
											</svg>
											<span class="ms-2">Notification </span>
										</a>
										<a href="javascript:void(0);" class="dropdown-item ai-icon ">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
												</g>
											</svg>
											<span class="ms-2">Settings </span>
										</a>
										<a href="page-login.html" class="dropdown-item ai-icon">
											<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
											<span class="ms-2">Logout </span>
										</a>
									</div>
								</div>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
			
		</div>
                    
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
			<div class="dlabnav-scroll">	
				<ul class="metismenu" id="menu">
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="material-icons-outlined">dashboard</i>
							<span class="nav-text">Dashboard</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="index.html">Dashboard Light</a></li>
							<li><a href="index-2.html">Dashboard Dark</a></li>
							<li><a href="banking.html">Banking</a></li>
							<li><a href="ticketing.html">Ticketing</a></li>
							<li><a href="crypto.html">Crypto</a></li>
							<li><a href="invoice.html">Invoice</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="kanban.html">Kanban</a></li>		
						</ul>

					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<i class="material-icons">folder</i>	
						<span class="nav-text">File Manager</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="file-manager.html">File Manager</a></li>
						<li><a href="user.html">User</a></li>	
						<li><a href="celandar.html">Calendar</a></li>		
						<li><a href="to-do-list.html">To Do List</a></li>	
						<li><a href="chat.html">Chat</a></li>
						<li><a href="activity.html">Activity</a></li>	
					</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<i class="material-icons"> app_registration </i>
						<span class="nav-text">Apps</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="./app-profile.html">Profile</a></li>
							<li><a href="./edit-profile.html">Edit Profile</a></li>
							<li><a href="./post-details.html">Post Details</a></li>
							<li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Email</a>
								<ul aria-expanded="false">
									<li><a href="./email-compose.html">Compose</a></li>
									<li><a href="./email-inbox.html">Inbox</a></li>
									<li><a href="./email-read.html">Read</a></li>
								</ul>
							</li>
							<li><a href="./app-calender.html">Calendar</a></li>
							<li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Shop</a>
								<ul aria-expanded="false">
									<li><a href="./ecom-product-grid.html">Product Grid</a></li>
									<li><a href="./ecom-product-list.html">Product List</a></li>
									<li><a href="./ecom-product-detail.html">Product Details</a></li>
									<li><a href="./ecom-product-order.html">Order</a></li>
									<li><a href="./ecom-checkout.html">Checkout</a></li>
									<li><a href="./ecom-invoice.html">Invoice</a></li>
									<li><a href="./ecom-customers.html">Customers</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<i class="material-icons"> assessment </i>
							<span class="nav-text">Charts</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="./chart-flot.html">Flot</a></li>
							<li><a href="./chart-morris.html">Morris</a></li>
							<li><a href="./chart-chartjs.html">Chartjs</a></li>
							<li><a href="./chart-chartist.html">Chartist</a></li>
							<li><a href="./chart-sparkline.html">Sparkline</a></li>
							<li><a href="./chart-peity.html">Peity</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							
							<i class="material-icons"> favorite </i>
							<span class="nav-text">Bootstrap</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="./ui-accordion.html">Accordion</a></li>
							<li><a href="./ui-alert.html">Alert</a></li>
							<li><a href="./ui-badge.html">Badge</a></li>
							<li><a href="./ui-button.html">Button</a></li>
							<li><a href="./ui-modal.html">Modal</a></li>
							<li><a href="./ui-button-group.html">Button Group</a></li>
							<li><a href="./ui-list-group.html">List Group</a></li>
							<li><a href="./ui-card.html">Cards</a></li>
							<li><a href="./ui-carousel.html">Carousel</a></li>
							<li><a href="./ui-dropdown.html">Dropdown</a></li>
							<li><a href="./ui-popover.html">Popover</a></li>
							<li><a href="./ui-progressbar.html">Progressbar</a></li>
							<li><a href="./ui-tab.html">Tab</a></li>
							<li><a href="./ui-typography.html">Typography</a></li>
							<li><a href="./ui-pagination.html">Pagination</a></li>
							<li><a href="./ui-grid.html">Grid</a></li>

						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="material-icons"> extension </i>
							<span class="nav-text">Plugins</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="./uc-select2.html">Select 2</a></li>
							<li><a href="./uc-nestable.html">Nestedable</a></li>
							<li><a href="./uc-noui-slider.html">Noui Slider</a></li>
							<li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
							<li><a href="./uc-toastr.html">Toastr</a></li>
							<li><a href="./map-jqvmap.html">Jqv Map</a></li>
							<li><a href="./uc-lightgallery.html">Light Gallery</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="material-icons"> widgets </i>
							<span class="nav-text">Widget</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="./widget-chart.html">Chart</a></li>
							<li><a href="./widget-card.html">Card</a></li>
							<li><a href="./widget-list.html">List</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="material-icons"> insert_drive_file </i>
							<span class="nav-text">Forms</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="./form-element.html">Form Elements</a></li>
							<li><a href="./form-wizard.html">Wizard</a></li>
							<li><a href="./form-ckeditor.html">CkEditor</a></li>
							<li><a href="form-pickers.html">Pickers</a></li>
							<li><a href="form-validation.html">Form Validate</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="material-icons"> table_chart </i>
							<span class="nav-text">Table</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
							<li><a href="table-datatable-basic.html">Datatable</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="material-icons">article</i>
							<span class="nav-text">Pages</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="./page-login.html">Login</a></li>
							<li><a href="./page-register.html">Register</a></li>
							<li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Error</a>
								<ul aria-expanded="false">
									<li><a href="./page-error-400.html">Error 400</a></li>
									<li><a href="./page-error-403.html">Error 403</a></li>
									<li><a href="./page-error-404.html">Error 404</a></li>
									<li><a href="./page-error-500.html">Error 500</a></li>
									<li><a href="./page-error-503.html">Error 503</a></li>
								</ul>
							</li>
							<li><a href="./page-lock-screen.html">Lock Screen</a></li>
							<li><a href="./empty-page.html">Empty Page</a></li>
						</ul>
					</li>
				</ul>
				<div class="support-box">
					<div class="media"> 
						<span>
							<svg width="22" height="29" viewBox="0 0 22 29" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M2.74982 1.40323C2.74982 2.17821 2.13421 2.80645 1.37482 2.80645C0.615425 2.80645 -0.000183105 2.17821 -0.000183105 1.40323C-0.000183105 0.628246 0.615425 0 1.37482 0C2.13421 0 2.74982 0.628246 2.74982 1.40323Z" fill="#FCFCFC"/>
								<path d="M9.16648 1.40323C9.16648 2.17821 8.55088 2.80645 7.79148 2.80645C7.03209 2.80645 6.41648 2.17821 6.41648 1.40323C6.41648 0.628246 7.03209 0 7.79148 0C8.55088 0 9.16648 0.628246 9.16648 1.40323Z" fill="#FCFCFC"/>
								<path d="M15.5832 1.40323C15.5832 2.17821 14.9675 2.80645 14.2082 2.80645C13.4488 2.80645 12.8332 2.17821 12.8332 1.40323C12.8332 0.628246 13.4488 0 14.2082 0C14.9675 0 15.5832 0.628246 15.5832 1.40323Z" fill="#FCFCFC"/>
								<path d="M21.9998 1.40323C21.9998 2.17821 21.3842 2.80645 20.6248 2.80645C19.8654 2.80645 19.2498 2.17821 19.2498 1.40323C19.2498 0.628246 19.8654 0 20.6248 0C21.3842 0 21.9998 0.628246 21.9998 1.40323Z" fill="#FCFCFC"/>
								<path d="M2.74982 7.95161C2.74982 8.72659 2.13421 9.35484 1.37482 9.35484C0.615425 9.35484 -0.000183105 8.72659 -0.000183105 7.95161C-0.000183105 7.17663 0.615425 6.54839 1.37482 6.54839C2.13421 6.54839 2.74982 7.17663 2.74982 7.95161Z" fill="#FCFCFC"/>
								<path d="M9.16648 7.95161C9.16648 8.72659 8.55088 9.35484 7.79148 9.35484C7.03209 9.35484 6.41648 8.72659 6.41648 7.95161C6.41648 7.17663 7.03209 6.54839 7.79148 6.54839C8.55088 6.54839 9.16648 7.17663 9.16648 7.95161Z" fill="#FCFCFC"/>
								<path d="M15.5832 7.95161C15.5832 8.72659 14.9675 9.35484 14.2082 9.35484C13.4488 9.35484 12.8332 8.72659 12.8332 7.95161C12.8332 7.17663 13.4488 6.54839 14.2082 6.54839C14.9675 6.54839 15.5832 7.17663 15.5832 7.95161Z" fill="#FCFCFC"/>
								<path d="M21.9998 7.95161C21.9998 8.72659 21.3842 9.35484 20.6248 9.35484C19.8654 9.35484 19.2498 8.72659 19.2498 7.95161C19.2498 7.17663 19.8654 6.54839 20.6248 6.54839C21.3842 6.54839 21.9998 7.17663 21.9998 7.95161Z" fill="#FCFCFC"/>
								<path d="M2.74982 14.5C2.74982 15.275 2.13421 15.9032 1.37482 15.9032C0.615425 15.9032 -0.000183105 15.275 -0.000183105 14.5C-0.000183105 13.725 0.615425 13.0968 1.37482 13.0968C2.13421 13.0968 2.74982 13.725 2.74982 14.5Z" fill="#FCFCFC"/>
								<path d="M9.16648 14.5C9.16648 15.275 8.55088 15.9032 7.79148 15.9032C7.03209 15.9032 6.41648 15.275 6.41648 14.5C6.41648 13.725 7.03209 13.0968 7.79148 13.0968C8.55088 13.0968 9.16648 13.725 9.16648 14.5Z" fill="#FCFCFC"/>
								<path d="M15.5832 14.5C15.5832 15.275 14.9675 15.9032 14.2082 15.9032C13.4488 15.9032 12.8332 15.275 12.8332 14.5C12.8332 13.725 13.4488 13.0968 14.2082 13.0968C14.9675 13.0968 15.5832 13.725 15.5832 14.5Z" fill="#FCFCFC"/>
								<path d="M21.9998 14.5C21.9998 15.275 21.3842 15.9032 20.6248 15.9032C19.8654 15.9032 19.2498 15.275 19.2498 14.5C19.2498 13.725 19.8654 13.0968 20.6248 13.0968C21.3842 13.0968 21.9998 13.725 21.9998 14.5Z" fill="#FCFCFC"/>
								<path d="M2.74982 21.0484C2.74982 21.8234 2.13421 22.4516 1.37482 22.4516C0.615425 22.4516 -0.000183105 21.8234 -0.000183105 21.0484C-0.000183105 20.2734 0.615425 19.6452 1.37482 19.6452C2.13421 19.6452 2.74982 20.2734 2.74982 21.0484Z" fill="#FCFCFC"/>
								<path d="M9.16648 21.0484C9.16648 21.8234 8.55088 22.4516 7.79148 22.4516C7.03209 22.4516 6.41648 21.8234 6.41648 21.0484C6.41648 20.2734 7.03209 19.6452 7.79148 19.6452C8.55088 19.6452 9.16648 20.2734 9.16648 21.0484Z" fill="#FCFCFC"/>
								<path d="M15.5832 21.0484C15.5832 21.8234 14.9675 22.4516 14.2082 22.4516C13.4488 22.4516 12.8332 21.8234 12.8332 21.0484C12.8332 20.2734 13.4488 19.6452 14.2082 19.6452C14.9675 19.6452 15.5832 20.2734 15.5832 21.0484Z" fill="#FCFCFC"/>
								<path d="M21.9998 21.0484C21.9998 21.8234 21.3842 22.4516 20.6248 22.4516C19.8654 22.4516 19.2498 21.8234 19.2498 21.0484C19.2498 20.2734 19.8654 19.6452 20.6248 19.6452C21.3842 19.6452 21.9998 20.2734 21.9998 21.0484Z" fill="#FCFCFC"/>
								<path d="M2.74982 27.5968C2.74982 28.3718 2.13421 29 1.37482 29C0.615425 29 -0.000183105 28.3718 -0.000183105 27.5968C-0.000183105 26.8218 0.615425 26.1935 1.37482 26.1935C2.13421 26.1935 2.74982 26.8218 2.74982 27.5968Z" fill="#FCFCFC"/>
								<path d="M9.16648 27.5968C9.16648 28.3718 8.55088 29 7.79148 29C7.03209 29 6.41648 28.3718 6.41648 27.5968C6.41648 26.8218 7.03209 26.1935 7.79148 26.1935C8.55088 26.1935 9.16648 26.8218 9.16648 27.5968Z" fill="#FCFCFC"/>
								<path d="M15.5832 27.5968C15.5832 28.3718 14.9675 29 14.2082 29C13.4488 29 12.8332 28.3718 12.8332 27.5968C12.8332 26.8218 13.4488 26.1935 14.2082 26.1935C14.9675 26.1935 15.5832 26.8218 15.5832 27.5968Z" fill="#FCFCFC"/>
								<path d="M21.9998 27.5968C21.9998 28.3718 21.3842 29 20.6248 29C19.8654 29 19.2498 28.3718 19.2498 27.5968C19.2498 26.8218 19.8654 26.1935 20.6248 26.1935C21.3842 26.1935 21.9998 26.8218 21.9998 27.5968Z" fill="#FCFCFC"/>
								</svg>
						</span>
					</div>
					<div class="info">
						<h3 class="fs-20">Upgrade you Account to Pro</h3>
						<a href="javascript:void(0);" class="btn bg-white btn-sm">Upgrade</a>
					</div>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body mh-auto">
            <div class="container-fluid p-0">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card rounded-0 mb-0 h-auto">
                            <div class="card-body p-0 ">
								<div class="row gx-0">
									<!-- ----column-- -->
									<div class="col-lg-3 col-xl-2 col-xxl-3">
										<div class="email-left-box dlab-scroll pt-3" id="email-left">
											<div class="p-0">
												<a href="email-compose.html" class="btn text-white btn-block"><i class="fa-solid fa-plus me-2"></i>Compose Email</a>
											</div>
											<div class="mail-list rounded ">
												<a href="email-inbox.html" class="list-group-item active"><i class="fa-regular fa-envelope align-middle"></i>Inbox <span class="badge badge-purple badge-sm float-end rounded">2</span> </a>
												<a href="javascript:void(0);" class="list-group-item"><i class="fa-regular fa-paper-plane align-middle"></i>Sent</a> 	
												<a href="javascript:void(0);" class="list-group-item"><i class="fa-regular fa-star align-middle"></i>Favorite </a>
												<a href="javascript:void(0);" class="list-group-item"><i class="fa-regular fa-file align-middle"></i>Draft</a>
												<a href="javascript:void(0);" class="list-group-item ">
												<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" >
													<path d="M15.4425 10.0575L10.065 15.435C9.92569 15.5745 9.76026 15.6851 9.57816 15.7606C9.39606 15.8361
													9.20087 15.8749 9.00375 15.8749C8.80663 15.8749 8.61144 15.8361 8.42934 15.7606C8.24724 15.6851 8.08181 15.5745 7.9425 15.435L1.5 9V1.5H9L15.4425
													7.9425C15.7219 8.22354 15.8787 8.60372 15.8787 9C15.8787 9.39628 15.7219 9.77646 15.4425 10.0575Z"
													stroke="#666666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													<path d="M5.25 5.25H5.268" stroke="#666666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>Important</a>		
												<a href="javascript:void(0);" class="list-group-item"><i class="fa-regular fa-clock align-middle"></i> Scheduled</a>
													
												
												<a href="javascript:void(0);" class="list-group-item">
													<svg width="15" height="15" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M5.5 8.25L11 13.75L16.5 8.25" stroke="#666666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
													Move
												</a>
											</div>
											<div class="mail-list rounded overflow-hidden mt-4">
												<div class="intro-title d-flex justify-content-between my-0">
													<h5>Categories</h5>
												</div>
												<a href="email-inbox.html" class="list-group-item change">Work </a>
												<a href="email-inbox.html" class="list-group-item change">Private </a>
												<a href="email-inbox.html" class="list-group-item change">Support </a>
												<a href="email-inbox.html" class="list-group-item change">Social </a>
											</div>
										</div>
									</div>
									<!-- ----/column-- -->
									<div class="col-lg-9 col-xl-10 col-xxl-9">
										<div class="email-right-box ms-0 ">
											<div class="toolbar mb-4 px-3 mt-3" role="toolbar">
												<div class="btn-group mb-1">
													<button type="button" class="btn btn-primary light px-3"><i class="fa fa-archive"></i></button>
													<button type="button" class="btn btn-primary light px-3"><i class="fa fa-exclamation-circle"></i></button>
													<button type="button" class="btn btn-primary light px-3"><i class="fa fa-trash"></i></button>
												</div>
												<div class="btn-group mb-1">
													<button type="button" class="btn btn-primary light dropdown-toggle px-3" data-bs-toggle="dropdown">
														<i class="fa fa-folder"></i> <b class="caret m-l-5"></b>
													</button>
													<div class="dropdown-menu"> 
														<a class="dropdown-item" href="javascript: void(0);">Social</a> 
														<a class="dropdown-item" href="javascript: void(0);">Promotions</a> 
														<a class="dropdown-item" href="javascript: void(0);">Updates</a>
														<a class="dropdown-item" href="javascript: void(0);">Forums</a>
													</div>
												</div>
												<div class="btn-group mb-1">
													<button type="button" class="btn btn-primary light dropdown-toggle px-3" data-bs-toggle="dropdown">
														<i class="fa fa-tag"></i> <b class="caret m-l-5"></b>
													</button>
													<div class="dropdown-menu"> 
														<a class="dropdown-item" href="javascript: void(0);">Updates</a> 
														<a class="dropdown-item" href="javascript: void(0);">Social</a> 
														<a class="dropdown-item" href="javascript: void(0);">Promotions</a>
														<a class="dropdown-item" href="javascript: void(0);">Forums</a>
													</div>
												</div>
												<div class="btn-group mb-1">
													<button type="button" class="btn btn-primary light dropdown-toggle v" data-bs-toggle="dropdown">More <span class="caret m-l-5"></span>
													</button>
													<div class="dropdown-menu"> <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a> <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
														<a class="dropdown-item" href="javascript: void(0);">Add Star</a> <a class="dropdown-item" href="javascript: void(0);">Mute</a>
													</div>
												</div>
											</div>
											<div class="compose-wrapper " id="compose-content">
												<div class="compose-content">
													<form action="#">
														<div class="mb-3">
															<input type="text" class="form-control bg-transparent" placeholder=" To:">
														</div>
														<div class="mb-3">
															<input type="text" class="form-control bg-transparent" placeholder=" Subject:">
														</div>
														<div class="mb-3">
															<textarea id="email-compose-editor" class="textarea_editor form-control bg-transparent" rows="5" placeholder="Enter text ..."></textarea>
														</div>
													</form>
													<h5 class="my-3"><i class="fa fa-paperclip me-2"></i> Attatchment</h5>
													<form action="#" class="dropzone">
														<div class="fallback">
															<input name="file" type="file" multiple />
														</div>
													</form>
												</div>
												<div class="text-start mt-4 mb-3">
													<button class="btn btn-primary btn-sl-sm me-2" type="button"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Send</button>
													<button class="btn btn-danger light btn-sl-sm" type="button"><span class="me-2"><i class="fa fa-times"></i></span>Discard</button>
												</div>
											</div>
										</div>
									</div>
								</div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


      
        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="./vendor/dropzone/dist/dropzone.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/dlabnav-init.js"></script>
	<script src="./js/demo.js"></script>
    <script src="./js/styleSwitcher.js"></script>
</body>
</html>