            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="{{ route('/') }}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{ asset('assets/logo.jpeg') }}" srcset="{{ asset('assets/logo.jpeg') }} 2x" alt="logo">
                            <img class="logo-dark logo-img" src=" {{ asset('assets/logo.jpeg') }}" srcset="{{ asset('assets/logo.jpeg') }} 2x" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src=" {{ asset('assets/logo.jpeg') }} " srcset="{{ asset('assets/logo.jpeg') }} 2x" alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="{{ route('dashboard') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                @admin
                                    <li class="nk-menu-item">
                                        <a href="{{ route('students') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                            <span class="nk-menu-text">Students</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('teachers') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                            <span class="nk-menu-text"> Teachers</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('guardians') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-user-check"></em></span>
                                            <span class="nk-menu-text">Guardians</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('subjects') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span>
                                            <span class="nk-menu-text">Subjects</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <!--<li class="nk-menu-item">
                                        <a href="{{ route('assign-subjects') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                            <span class="nk-menu-text">Assign Subject</span>
                                        </a>
                                    </li>--><!-- .nk-menu-item -->
                                    <!--<li class="nk-menu-item">
                                        <a href="{{ route('class-arm') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                            <span class="nk-menu-text">Arms</span>
                                        </a>
                                    </li>--><!-- .nk-menu-item -->
                                    
                                    <li class="nk-menu-item">
                                        <a href="{{ route('classes') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span>
                                            <span class="nk-menu-text">Classes</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    {{-- <li class="nk-menu-item">
                                        <a href="{{ route('result-upload') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-check-circle"></em></span>
                                            <span class="nk-menu-text">Manage Results</span>
                                        </a>
                                    </li><!-- .nk-menu-item --> --}}
                                    <li class="nk-menu-item">
                                        <a href="" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-server-fill"></em></span>
                                            <span class="nk-menu-text"> Results</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('sections') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                            <span class="nk-menu-text">Sessions</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <!--<li class="nk-menu-item">
                                        <a href="{{ route('terms') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                            <span class="nk-menu-text">Add Terms</span>
                                        </a>
                                    </li>--><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('fees') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                            <span class="nk-menu-text"> Fees</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    
                                    <!--<li class="nk-menu-item">
                                        <a href="{{ route('all-payments') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                            <span class="nk-menu-text">View Fees Payments</span>
                                        </a>
                                    </li>--><!-- .nk-menu-item -->
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title text-primary-alt">More Links</h6>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('notifications') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-notice"></em></span>
                                            <span class="nk-menu-text">Notification</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('mails') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-emails"></em></span>
                                            <span class="nk-menu-text">Send Mails </span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('admins') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                            <span class="nk-menu-text">Admins</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                @endadmin
                                @teacher
                                    <li class="nk-menu-item">
                                        <a href="{{ route('students') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                            <span class="nk-menu-text">Students</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('complains') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                            <span class="nk-menu-text">Complain</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('subjects') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span>
                                            <span class="nk-menu-text">Subjects</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{route('result-upload')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-server-fill"></em></span>
                                            <span class="nk-menu-text">Results</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                @endteacher
                                @guardian
                                    <li class="nk-menu-item">
                                        <a href="{{ route('complains') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                            <span class="nk-menu-text">Complain</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                     <li class="nk-menu-item">
                                        <a href="{{ route('notifications') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                            <span class="nk-menu-text">Notifications</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                     <li class="nk-menu-item">
                                        <a href="{{ route('fees') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                            <span class="nk-menu-text">School Fees</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="{{ route('fee-payment') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                            <span class="nk-menu-text">Fees Payment</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                     <li class="nk-menu-item">
                                        <a href="{{ route('view-result') }}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                            <span class="nk-menu-text">Result</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                @endguardian

                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>