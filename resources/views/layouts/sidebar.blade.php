<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Farm System Management">
    <meta property="og:description" content="Farm System Management">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>@yield('tittle')</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/favicon.png')}}">

    <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/swiper/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/swiper/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <script src="https://gitcdn.xyz/repo/FuriosoJack/TableHTMLExport/v1.0.0/src/tableHTMLExport.js"></script>
    <!-- tagify-css -->
    <link href="{{asset('vendor/tagify/dist/tagify.css')}}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div>
        <img src="{{asset('images/pre.gif')}}" alt="">
    </div>
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
            <svg class="logo-abbr" width="32" height="30" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M31.3287 2.96046L26.3411 0.0805375C26.1549 -0.0268458 25.9256 -0.0268458 25.7394 0.0805375C19.754 3.53731 12.3785 3.53785 6.39259 0.0816161L6.39043 0.0805375C6.20426 -0.0268458 5.97493 -0.0268458 5.78876 0.0805375L0.801104 2.95992C0.614937 3.0673 0.5 3.26588 0.5 3.48119V9.24049C0.5 9.4558 0.614937 9.65438 0.801104 9.76176C6.78759 13.2169 10.4753 19.6038 10.4753 26.5162V26.5184C10.4753 26.7332 10.5903 26.9323 10.7764 27.0397L15.7641 29.9196C15.8574 29.9736 15.961 30 16.0652 30C16.1693 30 16.2729 29.973 16.3663 29.9196L21.3539 27.0397C21.5401 26.9323 21.655 26.7337 21.655 26.5184C21.6545 19.6059 25.3422 13.2185 31.3287 9.7623L31.3298 9.76176C31.516 9.65438 31.6309 9.4558 31.6309 9.24049V3.48173C31.6293 3.26642 31.5149 3.06784 31.3287 2.96046ZM30.4259 8.89352L15.7635 17.359C15.5774 17.4664 15.4624 17.665 15.4624 17.8803V22.4168C14.9876 22.651 14.6692 23.1534 14.7043 23.7259C14.7458 24.3993 15.2854 24.9471 15.9589 24.9978C16.7591 25.0582 17.4272 24.4263 17.4272 23.639C17.4272 23.1026 17.1169 22.6386 16.6663 22.4163C16.6663 19.824 18.0493 17.4286 20.2941 16.1324L20.4496 16.0429L20.4501 26.1714L16.0641 28.7038L11.6781 26.1714V9.24103C11.6781 9.02627 11.5632 8.82715 11.377 8.71976L7.44754 6.45123C7.4497 6.42155 7.45078 6.39187 7.45078 6.36165C7.45078 5.59162 6.81187 4.97052 6.03537 5.0002C5.32901 5.02718 4.75378 5.60241 4.7268 6.30877C4.69712 7.08527 5.31822 7.72471 6.08825 7.72471C6.36885 7.72471 6.62948 7.63999 6.84587 7.49484C9.09066 8.79099 10.4737 11.1863 10.4737 13.7786V13.9573L1.70172 8.89406V3.82978L6.08771 1.29737L20.7501 9.76284C20.9363 9.87022 21.1656 9.87022 21.3518 9.76284L25.2807 7.4943C25.4993 7.64108 25.7631 7.72579 26.0464 7.72417C26.7895 7.71986 27.3998 7.10686 27.4009 6.36381C27.4019 5.60997 26.7916 4.99912 26.0383 4.99912C25.2856 4.99912 24.6758 5.60943 24.6758 6.36165C24.6758 6.39187 24.6769 6.42155 24.6791 6.45123C22.4337 7.74738 19.6676 7.74738 17.4223 6.45123L17.268 6.36219L26.0383 1.29737L30.4243 3.82978V8.89352H30.4259Z" fill="white"/>
            </svg>
            <svg class="brand-title" width="111" height="24" viewBox="0 0 111 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect class="yesh" width="49" height="22" transform="translate(0 1)" fill="white"/>
                <path class="admin1" d="M14.296 7.172L10.894 13.752V17H8.5V13.752L5.098 7.172H7.814L9.718 11.288L11.608 7.172H14.296ZM21.3786 15.264H17.7106L17.1226 17H14.6166L18.1726 7.172H20.9446L24.5006 17H21.9666L21.3786 15.264ZM20.7626 13.416L19.5446 9.818L18.3406 13.416H20.7626ZM29.1388 17.098C28.4202 17.098 27.7762 16.9813 27.2068 16.748C26.6375 16.5147 26.1802 16.1693 25.8348 15.712C25.4988 15.2547 25.3215 14.704 25.3028 14.06H27.8508C27.8882 14.424 28.0142 14.704 28.2288 14.9C28.4435 15.0867 28.7235 15.18 29.0688 15.18C29.4235 15.18 29.7035 15.1007 29.9088 14.942C30.1142 14.774 30.2168 14.5453 30.2168 14.256C30.2168 14.0133 30.1328 13.8127 29.9648 13.654C29.8062 13.4953 29.6055 13.3647 29.3628 13.262C29.1295 13.1593 28.7935 13.0427 28.3548 12.912C27.7202 12.716 27.2022 12.52 26.8008 12.324C26.3995 12.128 26.0542 11.8387 25.7648 11.456C25.4755 11.0733 25.3308 10.574 25.3308 9.958C25.3308 9.04333 25.6622 8.32933 26.3248 7.816C26.9875 7.29333 27.8508 7.032 28.9148 7.032C29.9975 7.032 30.8702 7.29333 31.5328 7.816C32.1955 8.32933 32.5502 9.048 32.5968 9.972H30.0068C29.9882 9.65467 29.8715 9.40733 29.6568 9.23C29.4422 9.04333 29.1668 8.95 28.8308 8.95C28.5415 8.95 28.3082 9.02933 28.1308 9.188C27.9535 9.33733 27.8648 9.55667 27.8648 9.846C27.8648 10.1633 28.0142 10.4107 28.3128 10.588C28.6115 10.7653 29.0782 10.9567 29.7128 11.162C30.3475 11.3767 30.8608 11.582 31.2528 11.778C31.6542 11.974 31.9995 12.2587 32.2888 12.632C32.5782 13.0053 32.7228 13.486 32.7228 14.074C32.7228 14.634 32.5782 15.1427 32.2888 15.6C32.0088 16.0573 31.5982 16.4213 31.0568 16.692C30.5155 16.9627 29.8762 17.098 29.1388 17.098ZM42.7081 7.172V17H40.3141V12.954H36.5901V17H34.1961V7.172H36.5901V11.022H40.3141V7.172H42.7081Z" fill="#222B40"/>
                <path class="admin2" d="M63.484 16.016H59.292L58.62 18H55.756L59.82 6.768H62.988L67.052 18H64.156L63.484 16.016ZM62.78 13.904L61.388 9.792L60.012 13.904H62.78ZM72.4969 6.768C73.6809 6.768 74.7155 7.00267 75.6009 7.472C76.4862 7.94133 77.1689 8.60267 77.6489 9.456C78.1395 10.2987 78.3849 11.2747 78.3849 12.384C78.3849 13.4827 78.1395 14.4587 77.6489 15.312C77.1689 16.1653 76.4809 16.8267 75.5849 17.296C74.6995 17.7653 73.6702 18 72.4969 18H68.2889V6.768H72.4969ZM72.3209 15.632C73.3555 15.632 74.1609 15.3493 74.7369 14.784C75.3129 14.2187 75.6009 13.4187 75.6009 12.384C75.6009 11.3493 75.3129 10.544 74.7369 9.968C74.1609 9.392 73.3555 9.104 72.3209 9.104H71.0249V15.632H72.3209ZM92.6339 6.768V18H89.8979V11.264L87.3859 18H85.1779L82.6499 11.248V18H79.9139V6.768H83.1459L86.2979 14.544L89.4179 6.768H92.6339ZM97.3374 6.768V18H94.6014V6.768H97.3374ZM109.368 18H106.632L102.056 11.072V18H99.3201V6.768H102.056L106.632 13.728V6.768H109.368V18Z" fill="white"/>
            </svg>
        </a>
        <div class="nav-control">
            <div class="hamburger">
                    <span class="line">
						<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M10.7468 5.58925C11.0722 5.26381 11.0722 4.73617 10.7468 4.41073C10.4213 4.0853 9.89369 4.0853 9.56826 4.41073L4.56826 9.41073C4.25277 9.72622 4.24174 10.2342 4.54322 10.5631L9.12655 15.5631C9.43754 15.9024 9.96468 15.9253 10.3039 15.6143C10.6432 15.3033 10.6661 14.7762 10.3551 14.4369L6.31096 10.0251L10.7468 5.58925Z" fill="#452B90"/>
							<path opacity="0.3" d="M16.5801 5.58924C16.9056 5.26381 16.9056 4.73617 16.5801 4.41073C16.2547 4.0853 15.727 4.0853 15.4016 4.41073L10.4016 9.41073C10.0861 9.72622 10.0751 10.2342 10.3766 10.5631L14.9599 15.5631C15.2709 15.9024 15.798 15.9253 16.1373 15.6143C16.4766 15.3033 16.4995 14.7762 16.1885 14.4369L12.1443 10.0251L16.5801 5.58924Z" fill="#452B90"/>
						</svg>
					</span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->
    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            Dashboard
                        </div>
                    </div>
                    <div class="header-right d-flex align-items-center">
                        <div class="input-group search-area">
                            <input type="text" class="form-control" placeholder="Search here...">
                            <span class="input-group-text"><a href="javascript:void(0)">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_1_450)">
										<path opacity="0.3" d="M14.2929 16.7071C13.9024 16.3166 13.9024 15.6834 14.2929 15.2929C14.6834 14.9024 15.3166 14.9024 15.7071 15.2929L19.7071 19.2929C20.0976 19.6834 20.0976 20.3166 19.7071 20.7071C19.3166 21.0976 18.6834 21.0976 18.2929 20.7071L14.2929 16.7071Z" fill="#452B90"/>
										<path d="M11 16C13.7614 16 16 13.7614 16 11C16 8.23859 13.7614 6.00002 11 6.00002C8.23858 6.00002 6 8.23859 6 11C6 13.7614 8.23858 16 11 16ZM11 18C7.13401 18 4 14.866 4 11C4 7.13402 7.13401 4.00002 11 4.00002C14.866 4.00002 18 7.13402 18 11C18 14.866 14.866 18 11 18Z" fill="#452B90"/>
										</g>
										<defs>
										<clipPath id="clip0_1_450">
										<rect width="24" height="24" fill="white"/>
										</clipPath>
										</defs>
									</svg>
								</a></span>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
                                    <svg id="icon-light" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M19.5,10.5 L21,10.5 C21.8284271,10.5 22.5,11.1715729 22.5,12 C22.5,12.8284271 21.8284271,13.5 21,13.5 L19.5,13.5 C18.6715729,13.5 18,12.8284271 18,12 C18,11.1715729 18.6715729,10.5 19.5,10.5 Z M16.0606602,5.87132034 L17.1213203,4.81066017 C17.7071068,4.22487373 18.6568542,4.22487373 19.2426407,4.81066017 C19.8284271,5.39644661 19.8284271,6.34619408 19.2426407,6.93198052 L18.1819805,7.99264069 C17.5961941,8.57842712 16.6464466,8.57842712 16.0606602,7.99264069 C15.4748737,7.40685425 15.4748737,6.45710678 16.0606602,5.87132034 Z M16.0606602,18.1819805 C15.4748737,17.5961941 15.4748737,16.6464466 16.0606602,16.0606602 C16.6464466,15.4748737 17.5961941,15.4748737 18.1819805,16.0606602 L19.2426407,17.1213203 C19.8284271,17.7071068 19.8284271,18.6568542 19.2426407,19.2426407 C18.6568542,19.8284271 17.7071068,19.8284271 17.1213203,19.2426407 L16.0606602,18.1819805 Z M3,10.5 L4.5,10.5 C5.32842712,10.5 6,11.1715729 6,12 C6,12.8284271 5.32842712,13.5 4.5,13.5 L3,13.5 C2.17157288,13.5 1.5,12.8284271 1.5,12 C1.5,11.1715729 2.17157288,10.5 3,10.5 Z M12,1.5 C12.8284271,1.5 13.5,2.17157288 13.5,3 L13.5,4.5 C13.5,5.32842712 12.8284271,6 12,6 C11.1715729,6 10.5,5.32842712 10.5,4.5 L10.5,3 C10.5,2.17157288 11.1715729,1.5 12,1.5 Z M12,18 C12.8284271,18 13.5,18.6715729 13.5,19.5 L13.5,21 C13.5,21.8284271 12.8284271,22.5 12,22.5 C11.1715729,22.5 10.5,21.8284271 10.5,21 L10.5,19.5 C10.5,18.6715729 11.1715729,18 12,18 Z M4.81066017,4.81066017 C5.39644661,4.22487373 6.34619408,4.22487373 6.93198052,4.81066017 L7.99264069,5.87132034 C8.57842712,6.45710678 8.57842712,7.40685425 7.99264069,7.99264069 C7.40685425,8.57842712 6.45710678,8.57842712 5.87132034,7.99264069 L4.81066017,6.93198052 C4.22487373,6.34619408 4.22487373,5.39644661 4.81066017,4.81066017 Z M4.81066017,19.2426407 C4.22487373,18.6568542 4.22487373,17.7071068 4.81066017,17.1213203 L5.87132034,16.0606602 C6.45710678,15.4748737 7.40685425,15.4748737 7.99264069,16.0606602 C8.57842712,16.6464466 8.57842712,17.5961941 7.99264069,18.1819805 L6.93198052,19.2426407 C6.34619408,19.8284271 5.39644661,19.8284271 4.81066017,19.2426407 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        </g>
                                    </svg>
                                    <svg id="icon-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M12.0700837,4.0003006 C11.3895108,5.17692613 11,6.54297551 11,8 C11,12.3948932 14.5439081,15.9620623 18.9299163,15.9996994 C17.5467214,18.3910707 14.9612535,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C12.0233848,4 12.0467462,4.00010034 12.0700837,4.0003006 Z" fill="#000000"/>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 12H19C19.8284 12 20.5 12.6716 20.5 13.5C20.5 14.3284 19.8284 15 19 15H6C5.17157 15 4.5 14.3284 4.5 13.5C4.5 12.6716 5.17157 12 6 12H7.5L8.05827 6.97553C8.30975 4.71226 10.2228 3 12.5 3C14.7772 3 16.6903 4.71226 16.9417 6.97553L17.5 12Z" fill="#222B40"/>
                                        <path opacity="0.3" d="M14.5 18C14.5 16.8954 13.6046 16 12.5 16C11.3954 16 10.5 16.8954 10.5 18C10.5 19.1046 11.3954 20 12.5 20C13.6046 20 14.5 19.1046 14.5 18Z" fill="#222B40"/>
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-2" style="height:380px;">
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
                                        </ul>
                                    </div>
                                    <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link " href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 16.87V9.257H21.5V16.931C21.5 20.07 19.5241 22 16.3628 22H8.62733C5.49561 22 3.5 20.03 3.5 16.87ZM8.45938 14.41C8.00494 14.431 7.62953 14.07 7.60977 13.611C7.60977 13.151 7.96542 12.771 8.41987 12.75C8.86443 12.75 9.22997 13.101 9.23985 13.55C9.2596 14.011 8.90395 14.391 8.45938 14.41ZM12.5198 14.41C12.0653 14.431 11.6899 14.07 11.6701 13.611C11.6701 13.151 12.0258 12.771 12.4802 12.75C12.9248 12.75 13.2903 13.101 13.3002 13.55C13.32 14.011 12.9643 14.391 12.5198 14.41ZM16.5505 18.09C16.096 18.08 15.7305 17.7 15.7305 17.24C15.7206 16.78 16.0862 16.401 16.5406 16.391H16.5505C17.0148 16.391 17.3902 16.771 17.3902 17.24C17.3902 17.71 17.0148 18.09 16.5505 18.09ZM11.6701 17.24C11.6899 17.7 12.0653 18.061 12.5198 18.04C12.9643 18.021 13.32 17.641 13.3002 17.181C13.2903 16.731 12.9248 16.38 12.4802 16.38C12.0258 16.401 11.6701 16.78 11.6701 17.24ZM7.59989 17.24C7.61965 17.7 7.99506 18.061 8.44951 18.04C8.89407 18.021 9.24973 17.641 9.22997 17.181C9.22009 16.731 8.85456 16.38 8.40999 16.38C7.95554 16.401 7.59989 16.78 7.59989 17.24ZM15.7404 13.601C15.7404 13.141 16.096 12.771 16.5505 12.761C16.9951 12.761 17.3507 13.12 17.3705 13.561C17.3804 14.021 17.0247 14.401 16.5801 14.41C16.1257 14.42 15.7503 14.07 15.7404 13.611V13.601Z" fill="#222B40"/>
                                        <path opacity="0.4" d="M3.50336 9.2569C3.5162 8.6699 3.5656 7.5049 3.65846 7.1299C4.13267 5.0209 5.74298 3.6809 8.04485 3.4899H16.9559C19.238 3.6909 20.8681 5.0399 21.3423 7.1299C21.4342 7.4949 21.4836 8.6689 21.4964 9.2569H3.50336Z" fill="#222B40"/>
                                        <path d="M8.80489 6.59C9.23958 6.59 9.56559 6.261 9.56559 5.82V2.771C9.56559 2.33 9.23958 2 8.80489 2C8.3702 2 8.04419 2.33 8.04419 2.771V5.82C8.04419 6.261 8.3702 6.59 8.80489 6.59Z" fill="#222B40"/>
                                        <path d="M16.195 6.59C16.6198 6.59 16.9557 6.261 16.9557 5.82V2.771C16.9557 2.33 16.6198 2 16.195 2C15.7603 2 15.4343 2.33 15.4343 2.771V5.82C15.4343 6.261 15.7603 6.59 16.195 6.59Z" fill="#222B40"/>
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_TimeLine02" class="widget-timeline dz-scroll style-1 p-3 height370">
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
                            <li class="nav-item ps-3">
                                <div class="dropdown header-profile2">
                                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="header-info2 d-flex align-items-center">
                                            <div class="header-media">
                                                <img src="images/user.jpg" alt="">
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <div class="card border-0 mb-0">
                                            <div class="card-header py-2">
                                                <div class="products">
                                                    <img src="images/user.jpg" class="avatar avatar-md" alt="">
                                                    <div>
                                                        <h6>Hanuman Prajapati</h6>
                                                        <span>Web Designer</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body px-0 py-2">
                                                <a href="app-profile-1.html" class="dropdown-item ai-icon ">
                                                    <svg  width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 15.3462C8.11714 15.3462 4.81429 15.931 4.81429 18.2729C4.81429 20.6148 8.09619 21.2205 11.9848 21.2205C15.8524 21.2205 19.1543 20.6348 19.1543 18.2938C19.1543 15.9529 15.8733 15.3462 11.9848 15.3462Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 12.0059C14.5229 12.0059 16.58 9.94779 16.58 7.40969C16.58 4.8716 14.5229 2.81445 11.9848 2.81445C9.44667 2.81445 7.38857 4.8716 7.38857 7.40969C7.38 9.93922 9.42381 11.9973 11.9524 12.0059H11.9848Z" stroke="var(--primary)" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>

                                                    <span class="ms-2">Profile </span>
                                                </a>
                                                <a href="app-profile-2.html" class="dropdown-item ai-icon ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>

                                                    <span class="ms-2">My Project</span><span class="badge badge-sm badge-primary rounded-circle text-white ms-2">4</span>
                                                </a>
                                            </div>
                                            <div class="card-footer px-0 py-2">
                                                <a href="javascript:void(0);" class="dropdown-item ai-icon ">
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8066 7.62355L20.1842 6.54346C19.6576 5.62954 18.4907 5.31426 17.5755 5.83866V5.83866C17.1399 6.09528 16.6201 6.16809 16.1307 6.04103C15.6413 5.91396 15.2226 5.59746 14.9668 5.16131C14.8023 4.88409 14.7139 4.56833 14.7105 4.24598V4.24598C14.7254 3.72916 14.5304 3.22834 14.17 2.85761C13.8096 2.48688 13.3145 2.2778 12.7975 2.27802H11.5435C11.0369 2.27801 10.5513 2.47985 10.194 2.83888C9.83666 3.19791 9.63714 3.68453 9.63958 4.19106V4.19106C9.62457 5.23686 8.77245 6.07675 7.72654 6.07664C7.40418 6.07329 7.08843 5.98488 6.8112 5.82035V5.82035C5.89603 5.29595 4.72908 5.61123 4.20251 6.52516L3.53432 7.62355C3.00838 8.53633 3.31937 9.70255 4.22997 10.2322V10.2322C4.82187 10.574 5.1865 11.2055 5.1865 11.889C5.1865 12.5725 4.82187 13.204 4.22997 13.5457V13.5457C3.32053 14.0719 3.0092 15.2353 3.53432 16.1453V16.1453L4.16589 17.2345C4.41262 17.6797 4.82657 18.0082 5.31616 18.1474C5.80575 18.2865 6.33061 18.2248 6.77459 17.976V17.976C7.21105 17.7213 7.73116 17.6515 8.21931 17.7821C8.70746 17.9128 9.12321 18.233 9.37413 18.6716C9.53867 18.9488 9.62708 19.2646 9.63043 19.5869V19.5869C9.63043 20.6435 10.4869 21.5 11.5435 21.5H12.7975C13.8505 21.5 14.7055 20.6491 14.7105 19.5961V19.5961C14.7081 19.088 14.9088 18.6 15.2681 18.2407C15.6274 17.8814 16.1154 17.6806 16.6236 17.6831C16.9451 17.6917 17.2596 17.7797 17.5389 17.9393V17.9393C18.4517 18.4653 19.6179 18.1543 20.1476 17.2437V17.2437L20.8066 16.1453C21.0617 15.7074 21.1317 15.1859 21.0012 14.6963C20.8706 14.2067 20.5502 13.7893 20.111 13.5366V13.5366C19.6717 13.2839 19.3514 12.8665 19.2208 12.3769C19.0902 11.8872 19.1602 11.3658 19.4153 10.9279C19.5812 10.6383 19.8213 10.3981 20.111 10.2322V10.2322C21.0161 9.70283 21.3264 8.54343 20.8066 7.63271V7.63271V7.62355Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <circle cx="12.175" cy="11.889" r="2.63616" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>

                                                    <span class="ms-2">Settings </span>
                                                </a>
                                                <a href="{{route('logout')}}" class="dropdown-item ai-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                                    <span class="ms-2">Logout </span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
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
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
{{--                <li class="menu-title">YOUR COMPANY</li>--}}
                <li><a href="{{route('dashboard')}}">
                        <div class="menu-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.13478 20.7733V17.7156C9.13478 16.9351 9.77217 16.3023 10.5584 16.3023H13.4326C13.8102 16.3023 14.1723 16.4512 14.4393 16.7163C14.7063 16.9813 14.8563 17.3408 14.8563 17.7156V20.7733C14.8539 21.0978 14.9821 21.4099 15.2124 21.6402C15.4427 21.8705 15.756 22 16.0829 22H18.0438C18.9596 22.0024 19.8388 21.6428 20.4872 21.0008C21.1356 20.3588 21.5 19.487 21.5 18.5778V9.86686C21.5 9.13246 21.1721 8.43584 20.6046 7.96467L13.934 2.67587C12.7737 1.74856 11.1111 1.7785 9.98539 2.74698L3.46701 7.96467C2.87274 8.42195 2.51755 9.12064 2.5 9.86686V18.5689C2.5 20.4639 4.04738 22 5.95617 22H7.87229C8.55123 22 9.103 21.4562 9.10792 20.7822L9.13478 20.7733Z" fill="#90959F"/>
                            </svg>
                        </div>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li><a href="{{route('inventory')}}">
                        <div class="menu-icon">
                            <svg  width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 15.3462C8.11714 15.3462 4.81429 15.931 4.81429 18.2729C4.81429 20.6148 8.09619 21.2205 11.9848 21.2205C15.8524 21.2205 19.1543 20.6348 19.1543 18.2938C19.1543 15.9529 15.8733 15.3462 11.9848 15.3462Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 12.0059C14.5229 12.0059 16.58 9.94779 16.58 7.40969C16.58 4.8716 14.5229 2.81445 11.9848 2.81445C9.44667 2.81445 7.38857 4.8716 7.38857 7.40969C7.38 9.93922 9.42381 11.9973 11.9524 12.0059H11.9848Z" stroke="var(--primary)" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="nav-text">All Inventory</span>
                    </a>
                </li>
                <li class="menu-title">Record</li>
                <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path opacity="0.4" d="M2.00018 11.0785C2.05018 13.4165 2.19018 17.4155 2.21018 17.8565C2.28118 18.7995 2.64218 19.7525 3.20418 20.4245C3.98618 21.3675 4.94918 21.7885 6.29218 21.7885C8.14818 21.7985 10.1942 21.7985 12.1812 21.7985C14.1762 21.7985 16.1122 21.7985 17.7472 21.7885C19.0712 21.7885 20.0642 21.3565 20.8362 20.4245C21.3982 19.7525 21.7592 18.7895 21.8102 17.8565C21.8302 17.4855 21.9302 13.1445 21.9902 11.0785H2.00018Z" fill="white"/>
                                    <path d="M11.2454 15.3842V16.6782C11.2454 17.0922 11.5814 17.4282 11.9954 17.4282C12.4094 17.4282 12.7454 17.0922 12.7454 16.6782V15.3842C12.7454 14.9702 12.4094 14.6342 11.9954 14.6342C11.5814 14.6342 11.2454 14.9702 11.2454 15.3842Z" fill="white"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2113 14.5564C10.1113 14.9194 9.7623 15.1514 9.38431 15.1014C6.8333 14.7454 4.39531 13.8404 2.33731 12.4814C2.12631 12.3434 2.00031 12.1074 2.00031 11.8554V8.3894C2.00031 6.2894 3.71231 4.5814 5.81731 4.5814H7.78431C7.97231 3.1294 9.20231 2.0004 10.7043 2.0004H13.2863C14.7873 2.0004 16.0183 3.1294 16.2063 4.5814H18.1833C20.2823 4.5814 21.9903 6.2894 21.9903 8.3894V11.8554C21.9903 12.1074 21.8633 12.3424 21.6543 12.4814C19.5923 13.8464 17.1443 14.7554 14.5763 15.1104C14.5413 15.1154 14.5073 15.1174 14.4733 15.1174C14.1343 15.1174 13.8313 14.8884 13.7463 14.5524C13.5443 13.7564 12.8213 13.1994 11.9903 13.1994C11.1483 13.1994 10.4333 13.7444 10.2113 14.5564ZM13.2863 3.5004H10.7043C10.0313 3.5004 9.46931 3.9604 9.30131 4.5814H14.6883C14.5203 3.9604 13.9583 3.5004 13.2863 3.5004Z" fill="white"/>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-text">Payment</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('payments')}}">All Payments</a></li>
                        <li><a href="{{route('getpaymentreport')}}">Payments Report</a></li>

                    </ul>
                </li>
                <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path opacity="0.4" d="M2.00018 11.0785C2.05018 13.4165 2.19018 17.4155 2.21018 17.8565C2.28118 18.7995 2.64218 19.7525 3.20418 20.4245C3.98618 21.3675 4.94918 21.7885 6.29218 21.7885C8.14818 21.7985 10.1942 21.7985 12.1812 21.7985C14.1762 21.7985 16.1122 21.7985 17.7472 21.7885C19.0712 21.7885 20.0642 21.3565 20.8362 20.4245C21.3982 19.7525 21.7592 18.7895 21.8102 17.8565C21.8302 17.4855 21.9302 13.1445 21.9902 11.0785H2.00018Z" fill="white"/>
                                    <path d="M11.2454 15.3842V16.6782C11.2454 17.0922 11.5814 17.4282 11.9954 17.4282C12.4094 17.4282 12.7454 17.0922 12.7454 16.6782V15.3842C12.7454 14.9702 12.4094 14.6342 11.9954 14.6342C11.5814 14.6342 11.2454 14.9702 11.2454 15.3842Z" fill="white"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2113 14.5564C10.1113 14.9194 9.7623 15.1514 9.38431 15.1014C6.8333 14.7454 4.39531 13.8404 2.33731 12.4814C2.12631 12.3434 2.00031 12.1074 2.00031 11.8554V8.3894C2.00031 6.2894 3.71231 4.5814 5.81731 4.5814H7.78431C7.97231 3.1294 9.20231 2.0004 10.7043 2.0004H13.2863C14.7873 2.0004 16.0183 3.1294 16.2063 4.5814H18.1833C20.2823 4.5814 21.9903 6.2894 21.9903 8.3894V11.8554C21.9903 12.1074 21.8633 12.3424 21.6543 12.4814C19.5923 13.8464 17.1443 14.7554 14.5763 15.1104C14.5413 15.1154 14.5073 15.1174 14.4733 15.1174C14.1343 15.1174 13.8313 14.8884 13.7463 14.5524C13.5443 13.7564 12.8213 13.1994 11.9903 13.1994C11.1483 13.1994 10.4333 13.7444 10.2113 14.5564ZM13.2863 3.5004H10.7043C10.0313 3.5004 9.46931 3.9604 9.30131 4.5814H14.6883C14.5203 3.9604 13.9583 3.5004 13.2863 3.5004Z" fill="white"/>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-text">Purchase</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('purchase')}}">All Purchases</a></li>
                        <li><a href="{{route('getpurchasereport')}}">Purchase Report</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-xxl-12">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
           Footer start
       ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Developed by <a href="#" target="_blank">Farm Management System</a> 2024</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

</div>

<!-- Required vendors -->
<script src="{{asset('vendor/global/global.min.js')}}"></script>
<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>

<!-- Dashboard 1 -->
<script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>
<script src="{{asset('vendor/draggable/draggable.js')}}"></script>
<script src="{{asset('vendor/swiper/js/swiper-bundle.min.js')}}"></script>


<!-- tagify -->
<script src="{{asset('vendor/tagify/dist/tagify.js')}}"></script>

<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.j')}}s"></script>
<script src="{{asset('vendor/datatables/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendor/datatables/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendor/datatables/js/jszip.min.js')}}"></script>
<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>

<!-- Apex Chart -->

<script src="{{asset('vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
<script src="{{asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>


<!-- Vectormap -->
<script src="{{asset('vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
<script src="{{asset('vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
<script src="{{asset('vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/deznav-init.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/styleSwitcher.js')}}"></script>

</body>
