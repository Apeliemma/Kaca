<!DOCTYPE html>
<html lang="en" dir="">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>KACA</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('frontend') }}/favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/vendor.min.css">
    <link rel="stylesheet" href="{{ url('frontend') }}/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ url('frontend') }}/css/theme.min.css">
</head>

<body>
<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand-lg navbar-end navbar-light bg-white">
    <!-- Topbar -->
    <div class="container navbar-topbar">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Toggler -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#topbarNavDropdown" aria-controls="topbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="d-flex justify-content-between align-items-center">
            <span class="navbar-toggler-text">Topbar</span>

            <span class="navbar-toggler-default">
              <i class="bi-chevron-down ms-2"></i>
            </span>
            <span class="navbar-toggler-toggled">
              <i class="bi-chevron-up ms-2"></i>
            </span>
          </span>
            </button>
            <!-- End Toggler -->

            <div id="topbarNavDropdown" class="navbar-nav-wrap-collapse collapse navbar-collapse navbar-topbar-collapse">
                <div class="navbar-toggler-wrapper">
                    <div class="navbar-topbar-toggler d-flex justify-content-between align-items-center">
                        <span class="navbar-toggler-text small">Topbar</span>

                        <!-- Toggler -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topbarNavDropdown" aria-controls="topbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="bi-x"></i>
                        </button>
                        <!-- End Toggler -->
                    </div>
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item me-auto">
                        <a class="nav-link" href="{{ url('frontend') }}/landing-classic-corporate.html"><i class="bi-chevron-left small ms-1"></i> Main demo</a>
                    </li>

                    <!-- Demos -->
                    <li class="hs-has-mega-menu nav-item">
                        <a id="demosMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle active" aria-current="page" href="index.html#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Demos</a>

                        <!-- Mega Menu -->
                        <div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="demosMegaMenu" style="min-width: 40rem;">
                            <!-- Promo -->
                            <div class="navbar-dropdown-menu-promo">

                                <!-- Promo Item -->
                                <div class="navbar-dropdown-menu-promo-item">
                                    <!-- Promo Link -->
                                    <a class="navbar-dropdown-menu-promo-link active" href="index.html">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M22.1671 18.1421C22.4827 18.4577 23.0222 18.2331 23.0206 17.7868L23.0039 13.1053V5.52632C23.0039 4.13107 21.8729 3 20.4776 3H8.68815C7.2929 3 6.16183 4.13107 6.16183 5.52632V9H13C14.6568 9 16 10.3431 16 12V15.6316H19.6565L22.1671 18.1421Z" fill="#035A4B" />
                              <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M1.98508 18V13C1.98508 11.8954 2.88051 11 3.98508 11H11.9851C13.0896 11 13.9851 11.8954 13.9851 13V18C13.9851 19.1046 13.0896 20 11.9851 20H4.10081L2.85695 21.1905C2.53895 21.4949 2.01123 21.2695 2.01123 20.8293V18.3243C1.99402 18.2187 1.98508 18.1104 1.98508 18ZM5.99999 14.5C5.99999 14.2239 6.22385 14 6.49999 14H11.5C11.7761 14 12 14.2239 12 14.5C12 14.7761 11.7761 15 11.5 15H6.49999C6.22385 15 5.99999 14.7761 5.99999 14.5ZM9.49999 16C9.22385 16 8.99999 16.2239 8.99999 16.5C8.99999 16.7761 9.22385 17 9.49999 17H11.5C11.7761 17 12 16.7761 12 16.5C12 16.2239 11.7761 16 11.5 16H9.49999Z" fill="#035A4B" />
                            </svg>

                          </span>
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <span class="navbar-dropdown-menu-media-title">Help Desk</span>
                                                <p class="navbar-dropdown-menu-media-desc">A customer service demo that helps you balance customer needs.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- End Promo Link -->
                                </div>
                                <!-- End Promo Item -->

                                <!-- Promo Item -->
                                <div class="navbar-dropdown-menu-promo-item">
                                    <!-- Promo Link -->
                                    <a class="navbar-dropdown-menu-promo-link " href="{{ url('frontend') }}/landing-classic-corporate.html">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M15.6 5.59998L20.9 10.9C21.3 11.3 21.3 11.9 20.9 12.3L17.6 15.6L11.6 9.59998L15.6 5.59998ZM2.3 12.3L7.59999 17.6L11.6 13.6L5.59999 7.59998L2.3 10.9C1.9 11.3 1.9 11.9 2.3 12.3Z" fill="#035A4B" />
                              <path opacity="0.3" d="M17.6 15.6L12.3 20.9C11.9 21.3 11.3 21.3 10.9 20.9L7.59998 17.6L13.6 11.6L17.6 15.6ZM10.9 2.3L5.59998 7.6L9.59998 11.6L15.6 5.6L12.3 2.3C11.9 1.9 11.3 1.9 10.9 2.3Z" fill="#035A4B" />
                            </svg>

                          </span>
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <span class="navbar-dropdown-menu-media-title">Main</span>
                                                <p class="navbar-dropdown-menu-media-desc">Over 60 corporate, agency, portfolio, account and many more pages.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- End Promo Link -->
                                </div>
                                <!-- End Promo Item -->

                                <!-- Promo Item -->
                                <div class="navbar-dropdown-menu-promo-item">
                                    <!-- Promo Link -->
                                    <a class="navbar-dropdown-menu-promo-link " href="{{ url('frontend') }}/demo-real-estate/index.html">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                          <span class="svg-icon svg-icon-sm text-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 3C5.67157 3 5 3.67157 5 4.5V6H3.5C2.67157 6 2 6.67157 2 7.5C2 8.32843 2.67157 9 3.5 9H5V19.5C5 20.3284 5.67157 21 6.5 21C7.32843 21 8 20.3284 8 19.5V9H20.5C21.3284 9 22 8.32843 22 7.5C22 6.67157 21.3284 6 20.5 6H8V4.5C8 3.67157 7.32843 3 6.5 3Z" fill="#035A4B" />
                              <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M20.5 11H10V17.5C10 18.3284 10.6716 19 11.5 19H15.5C17.3546 19 19.0277 18.2233 20.2119 16.9775C20.1436 16.9922 20.0727 17 20 17C19.4477 17 19 16.5523 19 16V13C19 12.4477 19.4477 12 20 12C20.5523 12 21 12.4477 21 13V15.9657C21.6334 14.9626 22 13.7741 22 12.5C22 11.6716 21.3284 11 20.5 11Z" fill="#035A4B" />
                            </svg>

                          </span>
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <span class="navbar-dropdown-menu-media-title">Real Estate</span>
                                                <p class="navbar-dropdown-menu-media-desc">Find the latest homes for sale, real estate market data.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- End Promo Link -->
                                </div>
                                <!-- End Promo Item -->


                            </div>
                            <!-- End Promo -->
                        </div>
                        <!-- End Mega Menu -->
                    </li>
                    <!-- End Demos -->


                </ul>
            </div>
        </nav>
    </div>
    <!-- End Topbar -->

    <div class="container">
        <nav class="navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="index.html" aria-label="Front">
                <img class="navbar-brand-logo" src="{{ url('frontend') }}/svg/logos/logo.svg" alt="Logo">
            </a>
            <!-- End Default Logo -->

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
                <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
                </span>
          </span>
            </button>
            <!-- End Toggler -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/') }}">Auction</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('prequalification') }}">Supplier Prequalification</a>
                    </li>
                    <!-- End Dropdown -->
                    <li class="nav-item">
                        <button class="btn btn-primary btn-transition" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
                    </li>
                </ul>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>

<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
   @yield('content')
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== FOOTER ========== -->
<footer class="bg-dark">
    <div class="container pb-1 pb-lg-5">
        <div class="row content-space-t-2">
            <div class="col-lg-3 mb-7 mb-lg-0">
                <!-- Logo -->
                <div class="mb-5">
                    <a class="navbar-brand" href="{{ url('frontend') }}/index.html" aria-label="Space">
                        <img class="navbar-brand-logo" src="{{ url('frontend') }}/svg/logos/logo-white.svg" alt="Image Description">
                    </a>
                </div>
                <!-- End Logo -->

                <!-- List -->
                <ul class="list-unstyled list-py-1">
                    <li><a class="link-sm link-light" href="index.html#"><i class="bi-geo-alt-fill me-1"></i> 153 Williamson Plaza, Maggieberg</a></li>
                    <li><a class="link-sm link-light" href="tel:1-062-109-9222"><i class="bi-telephone-inbound-fill me-1"></i> +1 (062) 109-9222</a></li>
                </ul>
                <!-- End List -->

            </div>
            <!-- End Col -->

            <div class="col-sm mb-7 mb-sm-0">
                <h5 class="text-white mb-3">Company</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    <li><a class="link-sm link-light" href="index.html#">About</a></li>
                    <li><a class="link-sm link-light" href="index.html#">Careers <span class="badge bg-warning text-dark rounded-pill ms-1">We're hiring</span></a></li>
                    <li><a class="link-sm link-light" href="index.html#">Blog</a></li>
                    <li><a class="link-sm link-light" href="index.html#">Customers <i class="bi-box-arrow-up-right small ms-1"></i></a></li>
                    <li><a class="link-sm link-light" href="index.html#">Hire us</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-sm mb-7 mb-sm-0">
                <h5 class="text-white mb-3">Features</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    <li><a class="link-sm link-light" href="index.html#">Press <i class="bi-box-arrow-up-right small ms-1"></i></a></li>
                    <li><a class="link-sm link-light" href="index.html#">Release Notes</a></li>
                    <li><a class="link-sm link-light" href="index.html#">Integrations</a></li>
                    <li><a class="link-sm link-light" href="index.html#">Pricing</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-sm">
                <h5 class="text-white mb-3">Documentation</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    <li><a class="link-sm link-light" href="index.html#">Support</a></li>
                    <li><a class="link-sm link-light" href="index.html#">Docs</a></li>
                    <li><a class="link-sm link-light" href="index.html#">Status</a></li>
                    <li><a class="link-sm link-light" href="index.html#">API Reference</a></li>
                    <li><a class="link-sm link-light" href="index.html#">Tech Requirements</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-sm">
                <h5 class="text-white mb-3">Resources</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-5">
                    <li><a class="link-sm link-light" href="index.html#"><i class="bi-question-circle-fill me-1"></i> Help</a></li>
                    <li><a class="link-sm link-light" href="index.html#"><i class="bi-person-circle me-1"></i> Your Account</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <div class="border-top border-white-10 my-7"></div>

        <div class="row mb-7">
            <div class="col-sm mb-3 mb-sm-0">
                <!-- Socials -->
                <ul class="list-inline list-separator list-separator-light mb-0">
                    <li class="list-inline-item">
                        <a class="link-sm link-light" href="index.html#">Privacy &amp; Policy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-sm link-light" href="index.html#">Terms</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-sm link-light" href="index.html#">Site Map</a>
                    </li>
                </ul>
                <!-- End Socials -->
            </div>

            <div class="col-sm-auto">
                <!-- Socials -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="index.html#">
                            <i class="bi-facebook"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="index.html#">
                            <i class="bi-google"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="index.html#">
                            <i class="bi-twitter"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="index.html#">
                            <i class="bi-github"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <!-- Button Group -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-soft-light btn-xs dropdown-toggle" id="footerSelectLanguage" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                  <span class="d-flex align-items-center">
                    <img class="avatar avatar-xss avatar-circle me-2" src="{{ url('frontend') }}/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16" />
                    <span>English (US)</span>
                  </span>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="footerSelectLanguage">
                                <a class="dropdown-item d-flex align-items-center active" href="index.html#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="{{ url('frontend') }}/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16" />
                                    <span>English (US)</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="index.html#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="{{ url('frontend') }}/vendor/flag-icon-css/flags/1x1/de.svg" alt="Image description" width="16" />
                                    <span>Deutsch</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="index.html#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="{{ url('frontend') }}/vendor/flag-icon-css/flags/1x1/es.svg" alt="Image description" width="16" />
                                    <span>Español</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="index.html#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="{{ url('frontend') }}/vendor/flag-icon-css/flags/1x1/cn.svg" alt="Image description" width="16" />
                                    <span>中文 (繁體)</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Button Group -->
                    </li>
                </ul>
                <!-- End Socials -->
            </div>
        </div>

        <!-- Copyright -->
        <div class="w-md-85 text-lg-center mx-lg-auto">
            <p class="text-white-50 small">&copy; Front. 2021 Htmlstream. All rights reserved.</p>
            <p class="text-white-50 small">When you visit or interact with our sites, services or tools, we or our authorised service providers may use cookies for storing information to help provide you with a better, faster and safer experience and for marketing purposes.</p>
        </div>
        <!-- End Copyright -->
    </div>
</footer>

<!-- ========== END FOOTER ========== -->


<!-- ========== SECONDARY CONTENTS ========== -->
<!-- Log In -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-close">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body">
                <!-- Log in -->
                <div id="loginModalFormLogin">
                    <!-- Heading -->
                    <div class="text-center mb-7">
                        <h3 class="modal-title">Log in to Front</h3>
                        <p>Login to manage your account</p>
                    </div>
                    <!-- End Heading -->

                    <form class="js-validate needs-validation" novalidate>
                        <!-- Form -->
                        <div class="mb-3">
                            <label class="form-label" for="loginModalFormLoginEmail">Your email</label>
                            <input type="email" class="form-control" name="email" id="loginModalFormLoginEmail" placeholder="email@site.com" aria-label="email@site.com" required>
                            <span class="invalid-feedback">Please enter a valid email address.</span>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label" for="loginModalFormLoginPassword">Password</label>

                                <a class="js-animation-link form-label-link" href="javascript:;" data-hs-show-animation-options='{
                       "targetSelector": "#loginModalFormResetPassword",
                       "groupName": "idForm"
                     }'>Forgot Password?</a>
                            </div>

                            <input type="password" class="form-control form-control-lg" name="password" id="loginModalFormLoginPassword" placeholder="8+ characters required" aria-label="8+ characters required" required minlength="8">
                            <span class="invalid-feedback">Please enter a valid password.</span>
                        </div>
                        <!-- End Form -->

                        <div class="d-grid gap-3 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Log in</button>

                            <span class="divider-center">OR</span>

                            <button type="submit" class="btn btn-ghost-secondary">
                  <span class="d-flex justify-content-center align-items-center">
                    <img class="avatar avatar-xss me-2" src="{{ url('frontend') }}/svg/brands/google-icon.svg" alt="Image Description">
                    Log in with Google
                  </span>
                            </button>

                            <p>Don't have an account yet?
                                <a class="js-animation-link link" href="javascript:;" role="button" data-hs-show-animation-options='{
                       "targetSelector": "#loginModalFormSignup",
                       "groupName": "idForm"
                     }'>Sign up</a>
                            </p>
                        </div>
                    </form>
                </div>
                <!-- End Log in -->

                <!-- Log in -->
                <div id="loginModalFormSignup" style="display: none; opacity: 0;">
                    <!-- Heading -->
                    <div class="text-center mb-7">
                        <h3 class="modal-title">Sign up</h3>
                        <p>Fill out the form to get started</p>
                    </div>
                    <!-- End Heading -->

                    <form class="js-validate needs-validation" novalidate>
                        <!-- Form -->
                        <div class="mb-3">
                            <label class="form-label" for="loginModalFormSignupEmail">Your email</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="loginModalFormSignupEmail" placeholder="email@site.com" aria-label="email@site.com" required>
                            <span class="invalid-feedback">Please enter a valid email address.</span>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="mb-3">
                            <label class="form-label" for="loginModalFormSignupPassword">Password</label>
                            <input type="password" class="form-control form-control-lg" name="password" id="loginModalFormSignupPassword" placeholder="8+ characters required" aria-label="8+ characters required" required>
                            <span class="invalid-feedback">Your password is invalid. Please try again.</span>
                        </div>
                        <!-- End Form -->

                        <!-- Form -->
                        <div class="mb-3" data-hs-validation-validate-class>
                            <label class="form-label" for="loginModalFormSignupConfirmPassword">Confirm password</label>
                            <input type="password" class="form-control form-control-lg" name="confirmPassword" id="loginModalFormSignupConfirmPassword" placeholder="8+ characters required" aria-label="8+ characters required" required data-hs-validation-equal-field="#loginModalFormSignupPassword">
                            <span class="invalid-feedback">Password does not match the confirm password.</span>
                        </div>
                        <!-- End Form -->

                        <div class="text-center mb-3">
                            <p class="small mb-0">By continuing you agree to our <a href="index.html#">Terms and Conditions</a></p>
                        </div>

                        <div class="d-grid gap-3 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Sign up</button>

                            <span class="divider-center">OR</span>

                            <button type="submit" class="btn btn-ghost-secondary">
                  <span class="d-flex justify-content-center align-items-center">
                    <img class="avatar avatar-xss me-2" src="{{ url('frontend') }}/svg/brands/google-icon.svg" alt="Image Description">
                    Sign up with Google
                  </span>
                            </button>
                            <p>Already have an account?
                                <a class="js-animation-link link" href="javascript:;" role="button" data-hs-show-animation-options='{
                       "targetSelector": "#loginModalFormLogin",
                       "groupName": "idForm"
                     }'>Log in</a>
                            </p>
                        </div>
                    </form>
                </div>
                <!-- End Log in -->

                <!-- Reset Password -->
                <div id="loginModalFormResetPassword" style="display: none; opacity: 0;">
                    <!-- Heading -->
                    <div class="text-center mb-7">
                        <h3 class="modal-title">Forgot password</h3>
                        <p>Instructions will be sent to you</p>
                    </div>
                    <!-- End Heading -->

                    <form class="js-validate needs-validation" novalidate>
                        <!-- Form -->

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="form-label" for="signupModalFormResetPasswordEmail" tabindex="0">Your email</label>


                                <a class="js-animation-link form-label-link" href="javascript:;" data-hs-show-animation-options='{
                         "targetSelector": "#loginModalFormLogin",
                         "groupName": "idForm"
                       }'>

                                    <i class="bi-chevron-left small"></i> Back to Log in
                                </a>
                            </div>

                            <input type="email" class="form-control form-control-lg" name="email" id="signupModalFormResetPasswordEmail" tabindex="1" placeholder="Enter your email address" aria-label="Enter your email address" required>
                            <span class="invalid-feedback">Please enter a valid email address.</span>
                        </div>
                        <!-- End Form -->


                        <div class="d-grid gap-3 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>

                </div>
                <!-- End Reset Password -->
            </div>
            <!-- End Body -->
        </div>

    </div>
</div>

<!-- Go To -->
<a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
    <i class="bi-chevron-up"></i>
</a>
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Implementing Plugins -->
<script src="{{ url('frontend') }}/js/vendor.min.js"></script>

<!-- JS Front -->
<script src="{{ url('frontend') }}/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        // INITIALIZATION OF MEGA MENU
        // =======================================================
        new HSMegaMenu('.js-mega-menu', {
            desktop: {
                position: 'left'
            }
        })


        // INITIALIZATION OF SHOW ANIMATIONS
        // =======================================================
        new HSShowAnimation('.js-animation-link')


        // INITIALIZATION OF BOOTSTRAP VALIDATION
        // =======================================================
        HSBsValidation.init('.js-validate', {
            onSubmit: data => {
                data.event.preventDefault()
                alert('Submited')
            }
        })


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF GO TO
        // =======================================================
        new HSGoTo('.js-go-to')
    })()
</script>
</body>
</html>
