               <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ asset('assets/logo.jpeg') }}" srcset="{{ asset('assets/logo.jpeg') }} 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="{{ asset('assets/logo.jpeg') }}" srcset="{{ asset('assets/logo.jpeg') }} 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="ml-3 nk-header-search ml-xl-0">
                                <!--<em class="icon ni ni-search"></em>
                                <input type="text" class="border-transparent form-control form-focus-none" placeholder="Search anything">-->
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                @admin
                                    <li class="dropdown chats-dropdown hide-mb-xs">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Recent Complains</span>
                                                <a href="#">Setting</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <ul class="chat-list">
                                                    @foreach(complains() as $complain)
                                                        <li class="chat-item">
                                                            <a class="chat-link" href="{{ route('complains') }}">
                                                                <div class="chat-media user-avatar">
                                                                    <span> {{ substr($complain->title, 0,1) }}</span>
                                                                    <span class="status dot dot-lg dot-gray"></span>
                                                                </div>
                                                                <div class="chat-info">
                                                                    <div class="chat-from">
                                                                        <div class="name">{{$complain->title}}</div>
                                                                        <span class="time">{{ $complain->created_at->diffForHumans() }}</span>
                                                                    </div>
                                                                    <div class="chat-context">
                                                                        <div class="text">{{   $complain->title  }}</div>
                                                                        <div class="status delivered">
                                                                            <em class="icon ni ni-check-circle-fill"></em>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li><!-- .chat-item -->

                                                    @endforeach
                                                </ul><!-- .chat-list -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="{{ route('complains') }}">View All</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown chats-dropdown hide-mb-xs">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-setting"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">System Settings</span>
                                                <a href="#">Setting</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <ul class="chat-list">
                                                        <li class="chat-item">
                                                            <a class="chat-link" href="{{ route('fees') }}">
                                                               Manage School Fees
                                                            </a>
                                                        </li><!-- .chat-item -->
                                                        <li class="chat-item">
                                                            <a class="chat-link" href="{{ route('sections') }}">
                                                               Manage Sessions
                                                            </a>
                                                        </li><!-- .chat-item -->
                                                        <li class="chat-item">
                                                            <a class="chat-link" href="{{ route('terms') }}">
                                                               Manage Terms
                                                            </a>
                                                        </li><!-- .chat-item -
                                                </ul><!-- .chat-list -->
                                            </div><!-- .nk-dropdown-body -->
            
                                        </div>
                                    </li>
                                    @endadmin
                                    @teacher
                                        <li class="dropdown notification-dropdown">
                                            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                                <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                <div class="dropdown-head">
                                                    <span class="sub-title nk-dropdown-title">Notifications</span>
                                                    <a href="{{ route('notifications') }}">Mark All as Read</a>
                                                </div>
                                                @foreach(notification() as $notificate)
                                                    <div class="dropdown-body">
                                                        <div class="nk-notification">
                                                            <div class="nk-notification-item dropdown-inner">
                                                                <div class="nk-notification-icon">
                                                                    <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                                </div>
                                                                <div class="nk-notification-content">
                                                                    <div class="nk-notification-text">{{ $notificate->title }}</div>
                                                                    <div class="nk-notification-time">{{ $notificate->created_at->diffForHumans() }}</div>
                                                                </div>
                                                            </div>
                                                        </div><!-- .nk-notification -->
                                                    </div><!-- .nk-dropdown-body -->
                                                @endforeach
                                                <div class="dropdown-foot center">
                                                    <a href="{{ route('notifications') }}">View All</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endteacher
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                   <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-status user-status-active">{{ auth()->user()->roles[0]['name'] }}</div>
                                                    <div class="user-name dropdown-indicator">{{ username(auth()->user()->roles[0]['name']) }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="lead-text">
                                                           {{ username(auth()->user()->roles[0]['name']) }}
                                                        </span>
                                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ route('my-profile') }}"><em class="icon ni ni-user-alt"></em><span>Profile</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a role="button" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>