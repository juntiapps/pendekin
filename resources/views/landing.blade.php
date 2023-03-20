<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pendekin</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top p-2">
        {{-- <div class="container"> --}}
        <a class="navbar-brand" href=""><img class="img-fluid" src="assets/favicon-32x32.png"
                alt="..." /><span style="color:#CB4545">endekin</span></a>
        {{-- </div> --}}
        <div class="row">
            <div class="col"><a class="btn btn-outline-primary" href="/register">Daftar</a></div>
            <div class="col"><a class="btn btn-primary" href="/login">Masuk</a></div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">Pendekin URL nya biar pendek</h1>
                        <form class="form-subscribe" method="POST" action="{{ route('url.shorten') }}" id="formUrl">
                            <!-- Email address input-->
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <input type="url" name='url' id="url"
                                        class="form-control form-control-lg" placeholder="masukkan url" />
                                    <div class="invalid-feedback text-white" data-sb-feedback="url:required">
                                        url harus diisi.</div>
                                    <div class="invalid-feedback text-white" data-sb-feedback="url:url">Email
                                        url tidak valid.</div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary btn-lg" id="submitButton"
                                        type="button">Pendekin</button>
                                </div>
                            </div>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Icons Grid-->
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                        <h3>Random Url Shortener</h3>
                        <p class="lead mb-0">bisa membuat url menjadi pendek tanpa login</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                        <h3>Custom Url Shortener</h3>
                        <p class="lead mb-0">Ingin URL custom seperti {{url('/')}}s/custom? <a
                                href="/login">Masuk</a> atau <a href="/register">Daftar</a> dulu</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                        <h3>Super Custom Url Shortener</h3>
                        <p class="lead mb-0">Ingin URL custom seperti http://domainanda.com/s/custom? <a
                                href="mailto:juntiapp@gmail.com">Hubungi Kami</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Image Showcases-->
    {{-- <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('assets/img/bg-showcase-1.jpg')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Fully Responsive Design</h2>
                    <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will
                        look great on any device, whether it's a phone, tablet, or desktop the page will behave
                        responsively!</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 text-white showcase-img"
                    style="background-image: url('assets/img/bg-showcase-2.jpg')"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Updated For Bootstrap 5</h2>
                    <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 5 is leading the
                        way in mobile responsive web development! All of the themes on Start Bootstrap are now using
                        Bootstrap 5!</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('assets/img/bg-showcase-3.jpg')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Easy to Use & Customize</h2>
                    <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand
                        some deeper customization options. Out of the box, just add your content and images, and your
                        new landing page will be ready to go!</p>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Testimonials-->
    {{-- <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">What people are saying...</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg"
                            alt="..." />
                        <h5>Margaret E.</h5>
                        <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-2.jpg"
                            alt="..." />
                        <h5>Fred S.</h5>
                        <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of
                            super nice landing pages."</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-3.jpg"
                            alt="..." />
                        <h5>Sarah W.</h5>
                        <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to
                            us!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Call to Action-->
    {{-- <section class="call-to-action text-white text-center" id="signup">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <h2 class="mb-4">Ready to get started? Sign up now!</h2>
                    <!-- Signup form-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form class="form-subscribe" id="contactFormFooter" data-sb-form-api-token="API_TOKEN">
                        <!-- Email address input-->
                        <div class="row">
                            <div class="col">
                                <input class="form-control form-control-lg" id="emailAddressBelow" type="email"
                                    placeholder="Email Address" data-sb-validations="required,email" />
                                <div class="invalid-feedback text-white"
                                    data-sb-feedback="emailAddressBelow:required">Email Address is required.</div>
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:email">
                                    Email Address Email is not valid.</div>
                            </div>
                            <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton"
                                    type="submit">Submit</button></div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                <p>To activate this form, sign up at</p>
                                <a class="text-white"
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="/">Tentang</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="mailto:juntiapps@gmail.com">Hubungi Kami</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="https://www.termsofusegenerator.net/live.php?token=8hEtc60UGOuenqtpDOBkHMFk3JMm6gzv">Terms of Use</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="https://www.privacypolicyonline.com/live.php?token=7QWzdJqOsoA9OUofJzDzIXcyxGAknQpu">Privacy Policy</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; 2023. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="https://facebook.com/juntiapps"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="https://twitter.com/juntiapps"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://instagram.com/juntiapps"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script type="text/javascript">
        var Clipboard = new ClipboardJS('.btnc');
        $('#submitButton').click(function(e) {
            let form = $('#formUrl')
            let formData = new FormData(form[0]);
            // console.log(form[0])
            // console.log(formData)
            // console.log("{{ route('url.shorten') }}")

            $.ajax({
                url: "{{ route('url.shorten') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    console.log('post', response)
                    URL = '/result/' + response.id

                    if (response.status == 200) {
                        // const URL = response.id
                        $.ajax({
                            url: URL,
                            type: "GET",
                            success: function(response) {
                                console.log("fetch", response);
                                var data = response.url;
                                var contents = "";
                                contents += `
                        <div class="row my-2">
                            <div class="col">
                                <input class="form-control form-control-sm" id="short_url" value="${data.default_short_url}" readonly> 
                            </div>
                            <div class="col-auto">
                                <button class="btn btnc btn-outline-warning btn-sm mx-2" type="button" data-clipboard-target="#short_url">salin</button>
                            </div>
                        </div>
                        `

                                $("#result").html(contents);

                            },
                            error: function(error) {
                                console.log("error1", error);
                            }
                        });
                    }
                },
                error: function(error) {
                    console.log("error2", error);
                }
            });
            // console.log("before",$('#picture').val())

            form.trigger("reset")
        });
    </script>
</body>

</html>
