@extends('layout.app')

@section('content')
    {{--Navigation--}}
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg navbar-light  py-2">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <img class="img-fluid" src="{{asset('/images/capture3.png')}}" alt="" width="120px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#header01" aria-controls="header01" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fw-bold">| | |</span>
            </button>
            <div class="collapse navbar-collapse" id="header01">
                <ul class="navbar-nav ms-auto mt-3 mt-lg-0 mb-3 mb-lg-0 me-4">
                    <li class="nav-item me-4"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contactus">Contact Us</a></li>
                </ul>
                <div><a class="btn mt-3 bg-gradient-dark" href="{{url('/dashboard')}}">Start Sale</a></div>
            </div>
        </div>
    </nav>

    {{--Hero--}}
    <section class="py-2 bg-gradient-dark ">
        <div class="container ">
            <div class="row align-items-center justify-content-evenly vh-100 mt-6">
                <div class="col-12 col-md-10 col-lg-5 mb-5 mb-lg-0">
                    {{--                    <h2 class="fw-bold"></h2>--}}
                    <h2 class=" fw-bold mb-3 text-light">TechHatch POS: Transforming Transactions, Empowering
                        Businesses</h2>
                    <p class="lead text-muted mb-4 text-light">TechHatch POS is a Point of Sale application designed
                        to streamline transactions, and empower businesses of all sizes.
                        With intuitive features, real-time analytics,
                        and real-time inventory management, TechHatch POS is your trusted partner for efficient sales
                        management and business growth</p>
                    <div class="d-flex flex-wrap"><a class="btn btn-lg bg-gradient-light me-2 mb-2 mb-sm-0"
                                                     href="{{url('/dashboard')}}">Start Sale</a>
                        <a class="btn btn-lg  bg-gradient-light mb-2 mb-sm-0" href="{{url('/login')}}">Login</a></div>
                </div>
                <div class="col-12 col-lg-6 offset-lg-1">
                    <img class="img-fluid" src="{{asset('/images/pos.png')}}" alt="">
                </div>


            </div>
        </div>
    </section>


    {{--Service--}}
    <section class="bg-light py-3 py-md-5 py-xl-8" id="services">
        <div class="container overflow-hidden">
            <div class="row gy-4 gy-md-5 gy-lg-0 align-items-center">
                <div class="col-12 col-lg-5">
                    <div class="row">
                        <div class="col-12 col-xl-11">
                            <h3 class="fs-6 text-secondary mb-3 mb-xl-4 text-uppercase">What We Do?</h3>
                            <h2 class="display-5 mb-3 mb-xl-4">We are giving you perfect solutions with our proficient
                                services.</h2>
                            <p class="mb-3 mb-xl-4">Are you looking to elevate your business operations, improve
                                efficiency, and boost profits? Our Point of Sale (POS) solutions offer a comprehensive
                                suite of services designed to meet the unique needs of your business. From transaction
                                processing to inventory management, we've got you covered.</p>
                            <a href="#!" class="btn bsb-btn-2xl btn-dark rounded-pill">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 overflow-hidden">
                    <div class="row gy-4">
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-primary shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                         class="bi bi-textarea-resize text-primary mb-4" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4.5A2.5 2.5 0 0 1 2.5 2h11A2.5 2.5 0 0 1 16 4.5v7a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 0 11.5v-7zM2.5 3A1.5 1.5 0 0 0 1 4.5v7A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 13.5 3h-11zm10.854 4.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708l3-3a.5.5 0 0 1 .708 0zm0 2.5a.5.5 0 0 1 0 .708l-.5.5a.5.5 0 0 1-.708-.708l.5-.5a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                    <h4 class="mb-4">Inventory Management</h4>
                                    <p class="mb-4 text-secondary">Keep track of your stock levels in real-time. Our POS
                                        solution includes
                                        robust inventory management features, helping you optimize stock levels, reduce
                                        wastage, and enhance overall efficiency</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-primary">
                                        Learn More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-primary shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                         class="bi bi-tablet text-primary mb-4" viewBox="0 0 16 16">
                                        <path
                                            d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    </svg>
                                    <h4 class="mb-4">POS System Integration</h4>
                                    <p class="mb-4 text-secondary">Seamlessly integrate our state-of-the-art POS system
                                        into your business environment. From retail stores to restaurants, our solutions
                                        are adaptable and tailored to suit your industry.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-primary">
                                        Learn More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-primary shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                         class="bi bi-repeat text-primary mb-4" viewBox="0 0 16 16">
                                        <path
                                            d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z"/>
                                    </svg>
                                    <h4 class="mb-4">Customized Reporting and Analytics</h4>
                                    <p class="mb-4 text-secondary">Gain valuable insights into your business performance
                                        with our comprehensive reporting and analytics tools. Monitor sales ,
                                        track Customer, Products, Generate pdf report and make informed decisions for
                                        future growth.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-primary">
                                        Learn More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-primary shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                         class="bi bi-shield-check text-primary mb-4" viewBox="0 0 16 16">
                                        <path
                                            d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                        <path
                                            d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                    <h4 class="mb-4">Free Support</h4>
                                    <p class="mb-4 text-secondary">We offer free support to all of our clients. This
                                        means that you can always get help when you need it, no matter what time it
                                        is.With our round-the-clock customer support, Our
                                        dedicated team is always ready to assist you with any queries or issues you may
                                        encounter.</p>
                                    <a href="#" class="fw-bold text-decoration-none link-primary">
                                        Learn More
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--clients--}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto text-center">
                    <span class="text-muted">Happy Clients</span>
                    <p class="lead text-muted">Spotlight on Our Exceptional Client Success</p>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 p-3">
                    <div class="card px-0 text-center">
                        <img class="card-img-top mb-3 w-100" src="{{asset('/images/male-placeholder.jpeg')}}" alt="">
                        <h5>John Doe</h5>
                        <p class="text-muted mb-4">CEO &amp; Founder</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 p-3">
                    <div class="card px-0 text-center">
                        <img class=" card-img-top mb-3 w-100" src="{{asset('/images/male-placeholder.jpeg')}}" alt="">
                        <h5>John Doe</h5>
                        <p class="text-muted mb-4">CEO &amp; Founder</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 p-3">
                    <div class="card px-0 text-center">
                        <img class=" card-img-top mb-3 w-100" src="{{asset('/images/women-placeholder.jpg')}}" alt="">
                        <h5>Jane Doe</h5>
                        <p class="text-muted mb-4">CEO &amp; Founder</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 p-3">
                    <div class="card px-0 text-center">
                        <img class=" card-img-top mb-3 w-100" src="{{asset('/images/male-placeholder.jpeg')}}" alt="">
                        <h5>John Doe</h5>
                        <p class="text-muted mb-4">CEO &amp; Founder</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


{{--    Testimonial--}}
    <section class="bg-light py-5 py-xl-8" id="testimonials">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Happy Customers</h2>
                    <p class="display-5 mb-4 mb-md-5 text-center">We deliver what we promise. See what clients are expressing about us.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container overflow-hidden">
            <div class="row gy-4 gy-md-0 gx-xxl-5">
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-sm">
                        <div class="card-body p-4 p-xxl-5">
                            <figure>
                                <img class="img-fluid rounded rounded-circle mb-4 border border-5 w-25" loading="lazy" src=" {{asset('images')}}/male-placeholder.jpeg" alt="Luna John">
                                <figcaption>
{{--                                    <div class="bsb-ratings text-warning mb-3" data-bsb-star="5" data-bsb-star-off="1"></div>--}}
                                    <blockquote class="bsb-blockquote-icon mb-4">We were so impressed with the work they did for us. They were able to take our vision and turn it into a reality, and they did it all on time and within budget. We would highly recommend them to anyone looking for a reliable partner.</blockquote>
                                    <h4 class="mb-2">John Doe</h4>
                                    <h5 class="fs-6 text-secondary mb-0">Owner, X-Cafe</h5>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-sm">
                        <div class="card-body p-4 p-xxl-5">
                            <figure>
                                <img class="img-fluid rounded rounded-circle mb-4 border border-5 w-25" loading="lazy" src=" {{asset('images')}}/women-placeholder.jpg" alt="Mark Smith">
                                <figcaption>
{{--                                    <div class="bsb-ratings text-warning mb-3" data-bsb-star="4" data-bsb-star-off="1"></div>--}}
                                    <blockquote class="bsb-blockquote-icon mb-4">We were looking for a company that could help us develop a new website that was both visually appealing and user-friendly. We are so happy with the results, and we would highly recommend them to anyone looking for a new website.</blockquote>
                                    <h4 class="mb-2">Jane Doe</h4>
                                    <h5 class="fs-6 text-secondary mb-0">Marketing Specialist</h5>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 border-bottom border-primary shadow-sm">
                        <div class="card-body p-4 p-xxl-5">
                            <figure>
                                <img class="img-fluid rounded rounded-circle mb-4 border border-5 w-25" loading="lazy" src=" {{asset('images')}}/women-placeholder.jpg" alt="Luke Reeves">
                                <figcaption>
{{--                                    <div class="bsb-ratings text-warning mb-3" data-bsb-star="5" data-bsb-star-off="0"></div>--}}
                                    <blockquote class="bsb-blockquote-icon mb-4">We were looking for a company that could help us with our branding. We needed a website and marketing materials. They were able to create a brand identity that we loved. They worked with us to develop a logo that represented our company.</blockquote>
                                    <h4 class="mb-2">Jane Doe</h4>
                                    <h5 class="fs-6 text-secondary mb-0">Sales Manager</h5>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    Contact Us--}}
    <section class="py-5" id="contactus">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5 mb-5 mb-lg-0">
                    <h2 class="fw-bold mb-5">Reach Out to Us: Let's Connect and Explore Opportunities Together</h2>
                    <h4 class="fw-bold">Address</h4>
                    <p class="text-muted mb-5">Dhaka,Uttara</p>
                    <h4 class="fw-bold">Contact Us</h4>
                    <p class="text-muted mb-1">contact@techhatch.com</p>
                    <p class="text-muted mb-0">+ 88054674128</p>
                </div>
                <div class="col-12 col-lg-6 offset-lg-1">
                    <form action="#">
                        <input class="form-control mb-3" type="text" placeholder="Name">
                        <input class="form-control mb-3" type="email" placeholder="E-mail">
                        <textarea class="form-control mb-3" name="message" cols="30" rows="10"
                                  placeholder="Your Message..."></textarea>
                        <button class="btn bg-gradient-dark w-100">Action</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<hr>
    <footer class="py-5">
        <div class="container text-center pb-5 border-bottom">
            <a class="d-inline-block mx-auto mb-4" href="#">
                <img class="img-fluid" src="{{asset('/images/capture3.png')}}" alt="" width="120px">
            </a>
            <ul class="d-flex flex-wrap justify-content-center align-items-center list-unstyled mb-4">
                <li><a class="link-secondary me-4" href="#">About</a></li>
                <li><a class="link-secondary me-4" href="#">Company</a></li>
                <li><a class="link-secondary me-4" href="#">Services</a></li>
                <li><a class="link-secondary" href="#">Testimonials</a></li>
            </ul>
            <div>
                <a class="d-inline-block me-4" href="#">
                    <img src="{{asset('/images/facebook.svg')}}">
                </a>
                <a class="d-inline-block me-4" href="#">
                    <img src="{{asset('/images/twitter.svg')}}">
                </a>
                <a class="d-inline-block me-4" href="#">
                    <img src="{{asset('/images/github.svg')}}">
                </a>
                <a class="d-inline-block me-4" href="#">
                    <img src="{{asset('/images/instagram.svg')}}">
                </a>
                <a class="d-inline-block" href="#">
                    <img src="{{asset('/images/linkedin.svg')}}">
                </a>
            </div>
        </div>
        <div class="mb-5"></div>
        <div class="container">
            <p class="text-center">Portfolio Project, Sabbir Hossain, 2023-2024</p>
        </div>
    </footer>

@endsection
