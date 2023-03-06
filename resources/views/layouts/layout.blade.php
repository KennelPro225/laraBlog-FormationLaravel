<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>LaraBlog</title>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    textColor: {
                        primary: "#00855D",
                        secondary: "#C97A00",
                        third: "#023369"
                    },
                    backgroundColor: {
                        primary: "#00855D",
                        secondary: "#C97A00"
                    },
                },
            }
        }
    </script>
</head>

<body>
    <nav id="navBar" class="p-4 flex left-0 top-0 justify-between items-center bg-primary">
        <a href="/">
            <div class="logo text-white text-3xl">LaraBlog</div>
        </a>
        <div class="items">
            <ul class="flex items-center">
                <a href="/">
                    <li class="ml-4 text-white text-lg cursor-pointer">Home</li>
                </a>
                @auth
                    <a href="/publier-article">
                        <li class="ml-4 text-white text-lg cursor-pointer">New Post</li>
                    </a>
                    <li class="ml-4 text-white text-lg cursor-pointer">Profile</li>
                    <a href="/logout">
                        <li class="ml-4 text-white text-lg cursor-pointer">Log Out</li>
                    </a>
                @else
                    <a href="/register">
                        <li class="ml-4 text-white text-lg cursor-pointer">Register</li>
                    </a>
                    <a href="/login">
                        <li class="ml-4 text-white text-lg cursor-pointer">Login</li>
                    </a>
                @endauth
            </ul>
        </div>
    </nav>
    <section class="min-h-[81vh]">
        @yield('page-content')
    </section>
    <footer class="bg-secondary p-4 flex justify-center">
        <span class="footer-text text-white items cursor-pointer">LaraBlog Copyright © 2023</span>
    </footer>
</body>

</html>
