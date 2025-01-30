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
        <section id="introduction">
            <h2>Introduction</h2>
            <p>In today's digital age, mastering digital competency is essential for personal and professional success. This article explores the key skills needed to thrive in a technology-driven world.</p>
            <p>Digital competency encompasses a range of skills, including digital literacy, cybersecurity awareness, and the ability to adapt to emerging technologies.</p>
        </section>
    </main>
    <main>
        <section id="digital-skills">
            <h2>Essential Digital Skills</h2>
            <h3>1. Digital Literacy</h3>
            <p>Digital literacy is the ability to find, evaluate, and communicate information in various digital formats. It is crucial for effective participation in today's society.</p>
            <h3>2. Cybersecurity Awareness</h3>
            <p>Understanding the basics of cybersecurity helps individuals protect their personal information and navigate the digital landscape safely.</p>
            <h3>3. Understanding Emerging Technologies</h3>
            <p>Staying informed about emerging technologies such as AI, IoT, and blockchain is vital for leveraging their potential in personal and professional contexts.</p>
        </section>
    </main>
    <main>
        <section id="video-section">
            <h2>Video on 21st Century Skills</h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/A85nVqkZpiU" frameborder="0" allowfullscreen></iframe>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Mastering Digital Competency Project</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
