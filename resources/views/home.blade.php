@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-between" style="height: 100vh; background-color: #DBB350;">

    <!-- Main Content Section -->
    <div class="d-flex flex-column justify-content-center align-items-center" style="flex-grow: 1; display: flex; justify-content: center; align-items: center;">
        <!-- Flexbox container to align the logo/banner and text -->
        <div class="d-flex justify-content-center align-items-center">
            <!-- Game Banner Image -->
            <img src="{{ asset('images/logo.png') }}" alt="Game Banner" class="game-logo img-fluid" style="height: 60px; margin-right: 20px;">

            <!-- Game On Text -->
            <h1 class="display-3" style="font-size: 4rem; font-weight: bold; color: #333;">Game On!</h1>
        </div>

        <!-- Login and Register buttons -->
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mx-2" style="font-size: 1.25rem; padding: 15px 30px; background-color: #007bff; border-radius: 5px;">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary btn-lg mx-2" style="font-size: 1.25rem; padding: 15px 30px; background-color: #6c757d; border-radius: 5px;">Register</a>
        </div>
    </div>

    <!-- Paragraph under the buttons -->
    <div class="text-center" style="margin-top: 30px; max-width: 800px; margin-left: auto; margin-right: auto;">
        <p style="font-size: 1.25rem; color: #333;">
            Explore, discover, and curate your own personal game library! Browse through our extensive collection, discover new games, and add your top picks to your wishlist or favorites. Manage your gaming journey, track your progress, and always be in the know about the latest titles that suit your playstyle.
        </p>
    </div>

    <!-- Footer Section -->
    <footer class="footer" style="background-color: #000; padding: 20px 0;">
        <div class="container text-center">
            <div class="row justify-content-center" style="display: flex; justify-content: center;">
                <div class="col">
                    <a href="/terms" class="footer-links" style="text-decoration: none; color: #fff; font-size: 1rem;">Terms & Conditions</a>
                </div>
                <div class="col">
                    <a href="/about" class="footer-links" style="text-decoration: none; color: #fff; font-size: 1rem;">About Us</a>
                </div>
                <div class="col">
                    <a href="/contact" class="footer-links" style="text-decoration: none; color: #fff; font-size: 1rem;">Contact Us</a>
                </div>
            </div>
            <!-- Add the "All Rights Reserved" Text -->
            <div class="text-center mt-3 text-muted" style="color: #fff; font-size: 1rem;">
                <p>&copy; 2024 All Rights Reserved</p>
            </div>
        </div>
    </footer>
</div>
@endsection
