<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Nour') }}</title>
        {{-- Css files from Theme Forest --}}
        <link rel="shortcut icon" href="images/favicon.ico" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <!-- Typography CSS -->
        <link rel="stylesheet" href="/css/typography.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="/css/responsive.css">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Scripts -->
        {{-- @vite([ 'resources/js/app.js']) --}}
    </head>
    <body class="right-column-fixed" style="margin: 0 auto">
        <!-- loader Start -->

        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="wrapper">
            <div class="iq-sidebar">
                <div id="sidebar-scrollbar">
                   <nav class="iq-sidebar-menu">
                      <ul id="iq-sidebar-toggle" class="iq-menu">
                         <li class="active">
                            <a href="{{ route('index') }}" class="iq-waves-effect"><i class="las la-newspaper"></i><span>Newsfeed</span></a>
                         </li>
                         <li>
                            <a href="{{ route('profile', ucfirst(Auth::user()->username)) }}" class="iq-waves-effect"><i class="las la-user"></i><span>Profile</span></a>
                         </li>
                         <li>
                            <a href="{{ route('follows') }}" class="iq-waves-effect"><i class="las la-user-friends"></i><span>Friend Lists</span></a>
                         </li>
                         <li>
                            <a href="{{ route('groups') }}" class="iq-waves-effect"><i class="las la-users"></i><span>Group</span></a>
                         </li>
                         <li>
                            <a href="profile-images.html" class="iq-waves-effect"><i class="las la-image"></i><span>Profile Image</span></a>
                         </li>
                         <li>
                            <a href="profile-video.html" class="iq-waves-effect"><i class="las la-video"></i><span>Profile Video</span></a>
                         </li>
                         <li>
                            <a href="profile-event.html" class="iq-waves-effect"><i class="las la-film"></i><span>Profile Events</span></a>
                         </li>
                         <li>
                            <a href="profile-badges.html" class="iq-waves-effect"><i class="las la-certificate"></i><span>Profile Badges</span></a>
                         </li>
                         <li>
                            <a href="profile-forum.html" class="iq-waves-effect"><i class="lab la-wpforms"></i><span>Profile Forum</span></a>
                         </li>
                         <li>
                            <a href="notification.html" class="iq-waves-effect"><i class="las la-bell"></i><span>Notification</span></a>
                         </li>
                         <li>
                            <a href="file.html" class="iq-waves-effect"><i class="las la-file"></i><span>Files</span></a>
                         </li>
                         <li>
                            <a href="{{ route('requests') }}" class="iq-waves-effect"><i class="las la-anchor"></i><span>Friend Request</span></a>
                         </li>
                         <li>
                            <a href="chat.html" class="iq-waves-effect"><i class="lab la-rocketchat"></i><span>Chat</span></a>
                         </li>
                         <li>
                            <a href="todo.html" class="iq-waves-effect"><i class="las la-check-circle"></i><span>Todo</span></a>
                         </li>
                         <li>
                            <a href="calendar.html" class="iq-waves-effect"><i class="las la-calendar"></i><span>Calendar</span></a>
                         </li>
                         <li>
                            <a href="birthday.html" class="iq-waves-effect"><i class="las la-birthday-cake"></i><span>Birthday</span></a>
                         </li>
                         <li>
                            <a href="weather.html" class="iq-waves-effect"><i class="ri-snowy-line"></i><span>Weather</span></a>
                         </li>
                         <li>
                            <a href="music.html" class="iq-waves-effect"><i class="ri-play-circle-line"></i><span>Music</span></a>
                         </li>
                         <li>
                            <a href="#blog" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="lab la-blogger"></i><span>Blog</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="blog" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                               <li><a href="blog-grid.html"><i class="ri-grid-line"></i>Blog Grid</a></li>
                               <li><a href="blog-list.html"><i class="ri-list-check-2"></i>Blog List</a></li>
                               <li><a href="blog-detail.html"><i class="ri-information-line"></i>Blog Detail</a></li>
                            </ul>
                         </li>
                         <li>
                            <a href="#store" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="las la-store"></i><span>Store</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="store" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                               <li><a href="store-category-grid.html"><i class="ri-grid-line"></i>Category Grid</a></li>
                               <li><a href="store-category-list.html"><i class="ri-list-check-2"></i>Category list</a></li>
                               <li><a href="store.html"><i class="ri-information-line"></i>Store Detail</a></li>
                               <li><a href="store-checkout.html"><i class="ri-chat-check-line"></i>Checkout</a></li>
                            </ul>
                         </li>
                         <li>
                            <a href="#mailbox" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-mail-line"></i><span>Email</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="mailbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                               <li><a href="app/index.html"><i class="ri-inbox-line"></i>Inbox</a></li>
                               <li><a href="app/email-compose.html"><i class="ri-edit-line"></i>Email Compose</a></li>
                            </ul>
                         </li>
                         <li>
                            <a href="#ui-elements" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-focus-2-line"></i><span>Ui-Elements</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="ui-elements" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                               <li>
                                  <a href="#ui-kit" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pencil-ruler-line"></i><span>UI Kit</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                  <ul id="ui-kit" class="iq-submenu collapse" data-parent="#ui-elements">
                                     <li><a href="ui-colors.html"><i class="ri-font-color"></i>colors</a></li>
                                     <li><a href="ui-typography.html"><i class="ri-text"></i>Typography</a></li>
                                     <li><a href="ui-alerts.html"><i class="ri-alert-line"></i>Alerts</a></li>
                                     <li><a href="ui-badges.html"><i class="ri-building-3-line"></i>Badges</a></li>
                                     <li><a href="ui-breadcrumb.html"><i class="ri-menu-2-line"></i>Breadcrumb</a></li>
                                     <li><a href="ui-buttons.html"><i class="ri-checkbox-blank-line"></i>Buttons</a></li>
                                     <li><a href="ui-cards.html"><i class="ri-bank-card-line"></i>Cards</a></li>
                                     <li><a href="ui-carousel.html"><i class="ri-slideshow-line"></i>Carousel</a></li>
                                     <li><a href="ui-embed-video.html"><i class="ri-slideshow-2-line"></i>Video</a></li>
                                     <li><a href="ui-grid.html"><i class="ri-grid-line"></i>Grid</a></li>
                                     <li><a href="ui-images.html"><i class="ri-image-line"></i>images</a></li>
                                     <li><a href="ui-list-group.html"><i class="ri-file-list-3-line"></i>list Group</a></li>
                                     <li><a href="ui-media-object.html"><i class="ri-camera-line"></i>Media</a></li>
                                     <li><a href="ui-modal.html"><i class="ri-stop-mini-line"></i>Modal</a></li>
                                     <li><a href="ui-notifications.html"><i class="ri-notification-line"></i>Notifications</a></li>
                                     <li><a href="ui-pagination.html"><i class="ri-pages-line"></i>Pagination</a></li>
                                     <li><a href="ui-popovers.html"><i class="ri-folder-shield-2-line"></i>Popovers</a></li>
                                     <li><a href="ui-progressbars.html"><i class="ri-battery-low-line"></i>Progressbars</a></li>
                                     <li><a href="ui-tabs.html"><i class="ri-database-line"></i>Tabs</a></li>
                                     <li><a href="ui-tooltips.html"><i class="ri-record-mail-line"></i>Tooltips</a></li>
                                  </ul>
                               </li>
                               <li>
                                  <a href="#forms" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-profile-line"></i><span>Forms</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                  <ul id="forms" class="iq-submenu collapse" data-parent="#ui-elements">
                                     <li><a href="form-layout.html"><i class="ri-tablet-line"></i>Form Elements</a></li>
                                     <li><a href="form-validation.html"><i class="ri-device-line"></i>Form Validation</a></li>
                                     <li><a href="form-switch.html"><i class="ri-toggle-line"></i>Form Switch</a></li>
                                     <li><a href="form-chechbox.html"><i class="ri-checkbox-line"></i>Form Checkbox</a></li>
                                     <li><a href="form-radio.html"><i class="ri-radio-button-line"></i>Form Radio</a></li>
                                  </ul>
                               </li>
                               <li>
                                  <a href="#wizard-form" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-archive-drawer-line"></i><span>Forms Wizard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                  <ul id="wizard-form" class="iq-submenu collapse" data-parent="#ui-elements">
                                     <li><a href="form-wizard.html"><i class="ri-clockwise-line"></i>Simple Wizard</a></li>
                                     <li><a href="form-wizard-validate.html"><i class="ri-clockwise-2-line"></i>Validate Wizard</a></li>
                                     <li><a href="form-wizard-vertical.html"><i class="ri-anticlockwise-line"></i>Vertical Wizard</a></li>
                                  </ul>
                               </li>
                               <li>
                                  <a href="#tables" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-table-line"></i><span>Table</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                  <ul id="tables" class="iq-submenu collapse" data-parent="#ui-elements">
                                     <li><a href="tables-basic.html"><i class="ri-table-line"></i>Basic Tables</a></li>
                                     <li><a href="data-table.html"><i class="ri-database-line"></i>Data Table</a></li>
                                     <li><a href="table-editable.html"><i class="ri-refund-line"></i>Editable Table</a></li>
                                  </ul>
                               </li>
                               <li>
                                  <a href="#icons" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-list-check"></i><span>Icons</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                  <ul id="icons" class="iq-submenu collapse" data-parent="#ui-elements">
                                     <li><a href="icon-dripicons.html"><i class="ri-stack-line"></i>Dripicons</a></li>
                                     <li><a href="icon-fontawesome-5.html"><i class="ri-facebook-fill"></i>Font Awesome 5</a></li>
                                     <li><a href="icon-lineawesome.html"><i class="ri-keynote-line"></i>line Awesome</a></li>
                                     <li><a href="icon-remixicon.html"><i class="ri-remixicon-line"></i>Remixicon</a></li>
                                     <li><a href="icon-unicons.html"><i class="ri-underline"></i>unicons</a></li>
                                  </ul>
                               </li>
                            </ul>
                         </li>
                         <li>
                            <a href="#pages" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-pages-line"></i><span>Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                               <li>
                                  <a href="#authentication" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pages-line"></i><span>Authentication</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                  <ul id="authentication" class="iq-submenu collapse" data-parent="#pages">
                                     <li><a href="sign-in.html"><i class="ri-login-box-line"></i>Login</a></li>
                                     <li><a href="sign-up.html"><i class="ri-login-circle-line"></i>Register</a></li>
                                     <li><a href="pages-recoverpw.html"><i class="ri-record-mail-line"></i>Recover Password</a></li>
                                     <li><a href="pages-confirm-mail.html"><i class="ri-file-code-line"></i>Confirm Mail</a></li>
                                     <li><a href="pages-lock-screen.html"><i class="ri-lock-line"></i>Lock Screen</a></li>
                                  </ul>
                               </li>
                               <li>
                                  <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-pantone-line"></i><span>Extra Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                  <ul id="extra-pages" class="iq-submenu collapse" data-parent="#pages">
                                     <li><a href="pages-timeline.html"><i class="ri-map-pin-time-line"></i>Timeline</a></li>
                                     <li><a href="pages-invoice.html"><i class="ri-question-answer-line"></i>Invoice</a></li>
                                     <li><a href="blank-page.html"><i class="ri-invision-line"></i>Blank Page</a></li>
                                     <li><a href="pages-error.html"><i class="ri-error-warning-line"></i>Error 404</a></li>
                                     <li><a href="pages-error-500.html"><i class="ri-error-warning-line"></i>Error 500</a></li>
                                     <li><a href="pages-pricing.html"><i class="ri-price-tag-line"></i>Pricing</a></li>
                                     <li><a href="pages-pricing-one.html"><i class="ri-price-tag-2-line"></i>Pricing 1</a></li>
                                     <li><a href="pages-maintenance.html"><i class="ri-archive-line"></i>Maintenance</a></li>
                                     <li><a href="pages-comingsoon.html"><i class="ri-mastercard-line"></i>Coming Soon</a></li>
                                     <li><a href="pages-faq.html"><i class="ri-compasses-line"></i>Faq</a></li>
                                  </ul>
                               </li>
                            </ul>
                         </li>

                      </ul>
                   </nav>
                   <div class="p-3"></div>
                </div>
             </div>
             <!-- TOP Nav Bar -->
             <div class="iq-top-navbar">
                <div class="iq-navbar-custom">
                   {{-- Create component for top navbar Start --}}
                     @include('layouts.top-navbar')
                     {{-- Create component for top navbar end --}}
                </div>
                {{-- Create Component for top navbar end --}}
             </div>
             <!-- TOP Nav Bar END -->
             <!-- Right Sidebar Panel Start-->
             {{-- Create Component for Right Side Navbar --}}
                @include('layouts.right-side-navbar')
                {{-- End of Right Side Navbar Component --}}

            <!-- Page Content -->
                    <div id="content-page" class="content-page">
                        <div class="container">
                            <div class="row">
                            {{-- The beginning of the contents --}}
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer class="bg-white iq-footer">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-6">
             <ul class="list-inline mb-0">
                <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
             </ul>
          </div>
          <div class="col-lg-6 text-right">
             Copyright 2020 <a href="#">SocialV</a> All Rights Reserved.
          </div>
       </div>
    </div>
 </footer>
 <!-- Footer END -->
 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="/js/jquery.min.js"></script>
 <script src="/js/popper.min.js"></script>
 <script src="/js/bootstrap.min.js"></script>
 <!-- Appear J/avaScript -->
 <script src="/js/jquery.appear.js"></script>
 <!-- Countdow/n JavaScript -->
 <script src="/js/countdown.min.js"></script>
 <!-- Counteru/p JavaScript -->
 <script src="/js/waypoints.min.js"></script>
 <script src="/js/jquery.counterup.min.js"></script>
 <!-- Wow Java/Script -->
 <script src="/js/wow.min.js"></script>
 <!-- Apexchar/ts JavaScript -->
 <script src="/js/apexcharts.js"></script>
 <!-- Slick Ja/vaScript -->
 <script src="/js/slick.min.js"></script>
 <!-- Select2 /JavaScript -->
 <script src="/js/select2.min.js"></script>
 <!-- Owl Caro/usel JavaScript -->
 <script src="/js/owl.carousel.min.js"></script>
 <!-- Magnific/ Popup JavaScript -->
 <script src="/js/jquery.magnific-popup.min.js"></script>
 <!-- Smooth S/crollbar JavaScript -->
 <script src="/js/smooth-scrollbar.js"></script>
 <!-- lottie J/avaScript -->
 <script src="/js/lottie.js"></script>
 <!-- am core /JavaScript -->
 <script src="/js/core.js"></script>
 <!-- am chart/s JavaScript -->
 <script src="/js/charts.js"></script>
 <!-- am anima/ted JavaScript -->
 <script src="/js/animated.js"></script>
 <!-- am kelly/ JavaScript -->
 <script src="/js/kelly.js"></script>
 <!-- am maps /JavaScript -->
 <script src="/js/maps.js"></script>
 <!-- am world/Low JavaScript -->
 <script src="/js/worldLow.js"></script>
 <!-- Chart Cu/stom JavaScript -->
 <script src="/js/chart-custom.js"></script>
 <!-- Custom J/avaScript -->
 <script src="/js/custom.js"></script>
</body>
</html>
