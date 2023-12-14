<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <header class="header-top bg-grey justify-content-center">
        <nav class="navbar navbar-expand-lg navigation">
            <div class="container">
                <a class="navbar-brand d-lg-none" href="index.html"><img src="assets/landing/images/logo.png" alt=""
                        class="img-fluid"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul id="menu" class="menu navbar-nav ">
                        <li class="nav-item dropdown  pl-0">
                            <Link class="nav-link dropdown-toggle" :href="route('home')" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Home
                            </Link>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <Link class="dropdown-item" :href="route('PostsOfCategorie',category)" v-for="category in $page.props.categories" :key="category.id">{{ category.name }}</Link>
                            </div>
                        </li>

                        <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="fashion.html" class="nav-link">Category</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Post Formats
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                <Link href="#" class="dropdown-item">Video Formats</Link>
                                <Link href="#" class="dropdown-item">Audio Format</Link>
                                <Link href="#" class="dropdown-item">Quote Format</Link>
                                <Link href="#" class="dropdown-item">Gallery Format</Link>
                                <Link href="#" class="dropdown-item">Image Format</Link>
                            </div>
                        </li>
                        <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                        <li class="nav-item d-lg-none">
                            <div class="search_toggle p-3 d-inline-block bg-white"><i class="ti-search"></i></div>
                        </li>
                    </ul>
                </div>

                <div class="text-right search d-none d-lg-block">
                    <div class="search_toggle"><i class="ti-search"></i></div>
                </div>
            </div>
        </nav>

    </header>
    <!--search overlay start-->
    <div class="search-wrap">
        <div class="overlay">
            <form action="#" class="search-form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-9">
                            <input type="text" class="form-control" placeholder="Search..." />
                        </div>
                        <div class="col-md-2 col-3 text-right">
                            <div class="search_toggle toggle-wrap d-inline-block">
                                <i class="ti-close"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--search overlay end-->
    <slot />
    <footer class="footer-section bg-grey">
        <div class="instagram-photo-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center">Follow in Instagram</h4>
                    </div>
                </div>

                <div class="row no-gutters" id="instafeed">

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="mb-4">
                        <h2 class="footer-logo">Revolve.</h2>
                    </div>
                    <ul class="list-inline footer-socials">
                        <li class="list-inline-item"><a href="#"><i class="ti-facebook mr-2"></i>Facebook</a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-twitter mr-2"></i>Twitter</a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-linkedin mr-2"></i>Linkedin</a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-pinterest mr-2"></i>Pinterest</a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-github mr-2"></i>Github</a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-instagram mr-2"></i>Instrgram</a></li>
                        <li class="list-inline-item"><a href="#"><i class="ti-rss mr-2"></i>rss</a></li>
                    </ul>
                </div>

                <div class="col-md-12 text-center">
                    <p class="copyright">© Copyright 2019 - Revolve. All Rights Reserved. Distribution <a class="text-white"
                            href="https://themewagon.com">ThemeWagon.</a></p>
                </div>
            </div>
        </div>
    </footer>



    <!--search overlay start-->
</template>
