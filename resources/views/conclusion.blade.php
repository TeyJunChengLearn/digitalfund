<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mastering Digital Competency</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <h1>Mastering Digital Competency in the 21st Century</h1>
        <div class="user-icon">
            <img src="pics/profile.png" alt="User  Icon" class="user-image">
            <div class="user-dropdown">
                <button class="dropbtn">User  Actions</button>
                <div class="dropdown-content">
                    @php
                    use Illuminate\Support\Facades\Auth;

                    @endphp
                    @if (Auth::user())
                        <a href="{{route('logout')}}"><button >Logout</button></a>
                        @else
                        <a href='{{route('register.index')}}'><button >Register</button></a>
                        <a href='{{route('login.index')}}'><button >Login</button></a>
                    @endif
                </div>
            </div>
            <div id="userInfo" style="display: none;">
                <p id="userName"></p>
                <p id="userRole"></p>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="{{route('landing.index')}}">Introduction</a></li>
                <li><a href="{{route('article.index')}}">Articles</a></li>
                <li><a href="{{route('conclusion.index')}}">Conclusion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="conclusion">
            <h2>Conclusion</h2>
            <p>Mastering digital competency is not just about acquiring technical skills; it is about developing a mindset that embraces continuous learning and adaptation. By enhancing your digital skills, you can navigate the complexities of the digital world and seize new opportunities.</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Mastering Digital Competency Project</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
