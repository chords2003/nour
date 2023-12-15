<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>SocialV - Responsive Bootstrap 4 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="/images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}

      <!-- Typography CSS -->
      <link rel="stylesheet" href="/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="/css/responsive.css">
      {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}


   </head>
   <body class="right-column-fixed">
      <!-- loader Start -->

      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li>
                        <a id="friends" href="/friends_newsfeed" class="iq-waves-effect"><i class="las la-newspaper"></i><span>Newsfeed</span></a>
                     </li>
                     <li class="active">
                        <a href="#" class="iq-waves-effect"><i class="las la-user"></i><span>Profile</span></a>
                     </li>
                     <li>
                        <a href="/friends_page" class="iq-waves-effect"><i class="las la-user-friends"></i><span>Friend Lists</span></a>
                     </li>
                     <li>
                        <a href="/groups" class="iq-waves-effect"><i class="las la-users"></i><span>Group</span></a>
                     </li>
                     <li>
                        <a href="profile-images.html" class="iq-waves-effect"><i class="las la-image"></i><span>Profile Image</span></a>
                     </li>
                     <li>
                        <a href="profile-video.html" class="iq-waves-effect"><i class="las la-video"></i><span>Profile Video</span></a>
                     </li>
                     <li>
                        <a href="/event" class="iq-waves-effect"><i class="las la-film"></i><span>Profile Events</span></a>
                     </li>
                     <li>
                        <a href="/members" class="iq-waves-effect"><i class="las la-certificate"></i><span>Members Page</span></a>
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
                        <a href="friend-request.html" class="iq-waves-effect"><i class="las la-anchor"></i><span>Friend Request</span></a>
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
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-navbar-logo d-flex justify-content-between">
                     <a href="index.html">
                     <img src="images/logo.png" class="img-fluid" alt="">
                     <span>SocialV</span>
                     </a>
                     <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-menu-line"></i></div>
                     </div>
                  </div>
                  </div>
                 {{-- Search section TODO --}}

                  <div class="iq-search-bar">

                     <form method="GET" action="#" class="searchbox">

                        <input type="text" name="search" class="text search-input" placeholder="Type here to search...">
                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                     </form>
                  </div>

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>


                  @auth

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li>
                           <a href="" class="iq-waves-effect d-flex align-items-center">
                              <img src="" class="img-fluid rounded-circle mr-3" alt="user">
                              <div class="caption">
                                 <h6 class="mb-0 line-height">{{ ucwords(Auth::user()->name) }}</h6>
                              </div>
                           </a>
                        </li>
                        <li>
                           <a href="/index" class="iq-waves-effect d-flex align-items-center">
                              <i class="ri-home-line"></i>
                           </a>
                        </li>
                        @endauth

                        <li class="nav-item">
                           <a class="search-toggle iq-waves-effect" href="#"><i class="ri-group-line"></i></a>
                           <div class="iq-sub-dropdown iq-sub-dropdown-large">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">Friend Request<small class="badge  badge-light float-right pt-1">4</small></h5>
                                    </div>

                                    <div class="iq-friend-request">
                                       <div class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between" >
                                          <div class="d-flex align-items-center">
                                             <div class="">
                                                <img class="avatar-40 rounded" src="images/user/01.jpg" alt="">
                                             </div>
                                             <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Jaques Amole</h6>
                                                <p class="mb-0">40  friends</p>
                                             </div>
                                          </div>
                                          <div class="d-flex align-items-center">
                                             <a href="javascript:void();" class="mr-3 btn btn-primary rounded">Confirm</a>
                                             <a href="javascript:void();" class="mr-3 btn btn-secondary rounded">Delete Request</a>
                                          </div>
                                       </div>
                                    </div>

                                    {{-- Friend Request section --}}


                                    <div class="iq-friend-request">
                                       <div class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between" >
                                          <div class="d-flex align-items-center">
                                             <div class="">
                                                <img class="avatar-40 rounded" src="" alt="">
                                             </div>
                                             <div class="media-body ml-3">
                                                <h6 class="mb-0 "></h6>
                                                <p class="mb-0"> Friends</p>
                                             </div>
                                          </div>
                                          <div class="d-flex align-items-center">
                                             <a href="javascript:void();" class="mr-3 btn btn-primary rounded">Confirm</a>
                                             <a href="javascript:void();" class="mr-3 btn btn-secondary rounded">Delete Request</a>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="iq-friend-request">
                                       <div class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between" >
                                          <div class="d-flex align-items-center">
                                             <div class="">
                                                <img class="avatar-40 rounded" src="images/user/03.jpg" alt="">
                                             </div>
                                             <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Manny Petty</h6>
                                                <p class="mb-0">3  friends</p>
                                             </div>
                                          </div>
                                          <div class="d-flex align-items-center">
                                             <a href="javascript:void();" class="mr-3 btn btn-primary rounded">Confirm</a>
                                             <a href="javascript:void();" class="mr-3 btn btn-secondary rounded">Delete Request</a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="iq-friend-request">
                                       <div class="iq-sub-card iq-sub-card-big d-flex align-items-center justify-content-between" >
                                          <div class="d-flex align-items-center">
                                             <div class="">
                                                <img class="avatar-40 rounded" src="images/user/04.jpg" alt="">
                                             </div>
                                             <div class="media-body ml-3">
                                                <h6 class="mb-0 ">Marsha Mello</h6>
                                                <p class="mb-0">15  friends</p>
                                             </div>
                                          </div>
                                          <div class="d-flex align-items-center">
                                             <a href="javascript:void();" class="mr-3 btn btn-primary rounded">Confirm</a>
                                             <a href="javascript:void();" class="mr-3 btn btn-secondary rounded">Delete Request</a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-center">
                                       <a href="#" class="mr-3 btn text-primary">View More Request</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>

                        <li class="nav-item dropdown">
                           <a href="#" class="search-toggle iq-waves-effect">
                              <div id="lottie-mail"></div>
                              <span class="bg-primary count-mail"></span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">All Messages<small class="badge  badge-light float-right pt-1">5</small></h5>
                                    </div>

                                    <a href="" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="" alt="">
                                          </div>
                                          {{-- Message Box Section TODO --}}

                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 "></h6>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>






                  </div>
               </nav>
            </div>
         </div>

         <!-- TOP Nav Bar END -->
         <!-- Right Sidebar Panel Start-->

         <div class="right-sidebar-mini right-sidebar">
            <div class="right-sidebar-panel p-0">
               <div class="iq-card shadow-none">
                  <div class="iq-card-body p-0">
                     <div class="media-height p-3">
                        <h5 class="m-2  text-center" style="color: #edf1f3 "> {{ Auth::user()->username }}' s Connections</h5>
                        <hr>

                        <div class="media align-items-center mb-4">
                           <div class="iq-profile-avatar status-online">
                              <a href="#">
                                 <img class="rounded-circle avatar-50" src="#" alt="">
                              </a>
                           </div>
                           <div class="media-body ml-3">
                              <h6 class="mb-0"><a href=""></a></h6>
                              Connected:
                              <p class="mb-0"></p>

                           </div>
                        </div>
                           <h5 style="color: white">
                              <strong
                                 style="color: #50b5ff; text-align:center">

                              </strong>
                              ,  would you like to connect with someone?</h5>
                       <hr>

                       <div>

                        <a href="/members">
                           <button type="submit" class="btn btn-primary d-block w-100 mt-3">Find Connections</button>
                        </a>
                    </div>



                     </div>
                     <div class="right-sidebar-toggle bg-primary mt-3">
                        <i class="ri-arrow-left-line side-left-icon"></i>
                        <i class="ri-arrow-right-line side-right-icon"><span class="ml-3 d-inline-block">Close Menu</span></i>
                     </div>



                  </div>

               </div>
            </div>
         </div>

         <!-- Right Sidebar Panel End-->
         <!-- Page Content  -->
         {{ $slot }}
         {{-- @yield('content') --}}

      </div>

      <!-- Wrapper END -->
      <!-- Footer -->

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
