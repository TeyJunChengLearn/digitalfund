<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments - Mastering Digital Competency</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Additional styles for quiz options */
        .quiz-option {
            margin-bottom: 10px; /* Gap between each answer choice */
        }
        #media-section {
            text-align: center;
            margin-bottom: 20px;
        }
        #media-section img {
            max-width: 100%; /* Responsive image */
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Article</h1>
        <div class="user-icon">
            <img src="pics/profile.png" alt="User   Icon" class="user-image">
            <div class="user-dropdown">
                <button class="dropbtn">User   Actions</button>
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
        <section id="article-details">
            <h2>Article Details</h2>
            <div id="articleInfo"></div>
        </section>
    </main>
    <main>
        <section id="media-section">
            <h2>Media</h2>
            <div id="mediaContent"></div>
        </section>
    </main>
    <main>
        <section id="quiz-section">
            <h2>Quiz</h2>
            <button onclick="startQuiz()">Start Quiz</button>
            <div id="quizArea"></div>
        </section>
    </main>
    <main>
        <form id="comments-section" action="{{route('comment.post')}}" method="POST">
            @csrf
            <h2>Comments</h2>
            <div id="commentsArea">
                @foreach ($comments as $comment)
                    <p>{{$comment->user->username}} :{{$comment->comment}}</p>
                @endforeach
            </div>
            <input type="hidden" name="articleID" value="{{$articleID}}"/>
            <div class="comment-form">
            @if (Auth::user())
                <input type="text" id="comment" name="comment" placeholder="Your comment..." />
                <button type="submit">Submit</button>
            @endif

            </div>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Mastering Digital Competency Project</p>
    </footer>

    <script>
        const articles = [
            {
                title: "Understanding Digital Literacy",
                content: "This article discusses the importance of digital literacy in today's world.",
                link: "{{url('/articles/1.pdf')}}",
                publishDate: "2020-01-15",
                status: "Published",
                views: 150,
                id: 1,
                media: "pics/pic1.png", // Media for article 1
                quiz: [
                    {
                        question: "What is digital literacy?",
                        options: {
                            A: "The ability to use technology effectively",
                            B: "Knowing how to use a smartphone",
                            C: "Understanding programming languages",
                            D: "None of the above"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question: "Why is digital literacy important?",
                        options: {
                            A: "To learn programming languages",
                            B: "To navigate the digital world",
                            C: "To create websites",
                            D: "None of the above"
                        },
                        correctAnswer: "B"
                    },
                    {
                        question: "Which of the following is a component of digital literacy?",
                        options: {
                            A: "None of the below",
                            B: "Physical fitness",
                            C: "Cooking skills",
                            D: "Critical thinking"
                        },
                        correctAnswer: "D"
                    },
                    {
                        question: "Digital literacy includes the ability to:",
                        options: {
                            A: "Evaluate online information",
                            B: "Only use social media",
                            C: "Play video games",
                            D: "None of the above"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question: "What is a common barrier to digital literacy?",
                        options: {
                            A: "Having too many devices",
                            B: "Too much information",
                            C: "Lack of access to technology",
                            D: "None of the above"
                        },
                        correctAnswer: "C"
                    }
                ]
            },
            {
                title: "Cybersecurity Basics",
                content: "Learn the fundamentals of cybersecurity and how to protect your information.",
                link: "{{url('/articles/2.pdf')}}",
                publishDate: "2025-02-10",
                status: "Published",
                views: 200,
                id: 2,
                media: "pics/pic2.png", // Media for article 2
                quiz: [
                    {
                        question: "What is cybersecurity?",
                        options: {
                            A: "Protection of computer systems",
                            B: "Creating websites",
                            C: "Using social media",
                            D: "None of the above"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question: "Which of the following is a cybersecurity threat?",
                        options: {
                            A: "Reading",
                            B: "Cooking",
                            C: "Phishing",
                            D: "None of the above"
                        },
                        correctAnswer: "C"
                    },
                    {
                        question: "What should you do if you receive a suspicious email?",
                        options: {
                            A: "Delete it",
                            B: "Open it",
                            C: "Forward it",
                            D: "None of the above"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question: "What is a strong password?",
                        options: {
                            A: "Your name",
                            B: "A mix of letters, numbers, and symbols",
                            C: "123456",
                            D: "None of the above"
                        },
                        correctAnswer: "B"
                    },
                    {
                        question: "Why is it important to update software?",
                        options: {
                            A: "To waste time",
                            B: "To make it look nice",
                            C: "To fix security vulnerabilities",
                            D: "None of the above"
                        },
                        correctAnswer: "C"
                    }
                ]
            },
            {
                title: "Emerging Technologies Overview",
                content: "This article explores the latest trends in emerging technologies.",
                link: "{{url('/articles/3.pdf')}}",
                publishDate: "2022-03-05",
                status: "Draft",
                views: 50,
                id: 3,
                media: "pics/pic3.png", // Media for article 3
                quiz: [
                    {
                        question: "What is an emerging technology?",
                        options: {
                            A: "A new technology that is currently developing",
                            B: "An old technology",
                            C: "A technology that is no longer used",
                            D: "None of the above"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question: "Which of the following is an example of an emerging technology?",
                        options: {
                            A: "None of the below",
                            B: "Typewriters",
                            C: "Televisions",
                            D: "Artificial Intelligence"
                        },
                        correctAnswer: "D"
                    },
                    {
                        question: "What is the Internet of Things (IoT)?",
                        options: {
                            A: "A type of computer",
                            B: "Connecting everyday devices to the internet",
                            C: "A social media platform",
                            D: "None of the above"
                        },
                        correctAnswer: "B"
                    },
                    {
                        question: "Why is it important to understand emerging technologies?",
                        options: {
                            A: "To leverage their potential",
                            B: "To ignore them",
                            C: "To avoid using them",
                            D: "None of the above"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question: "Which technology is associated with blockchain?",
                        options: {
                            A: "Radio",
                            B: "Television",
                            C: "Cryptocurrency",
                            D: "None of the above"
                        },
                        correctAnswer: "C"
                    }
                ]
            },
            {
                title: "The Level of Digital Skills and Internet Usage",
                content: "Discuss the importance of digital skills in today's job market, highlight key skills needed, and provide resources for learning.",
                link: "{{url('/articles/4.pdf')}}", // Link to detailed view
                publishDate: "2024-05-06",
                status: "Published",
                views: 151,
                id: 4,
                media: "pics/pic4.png", // Media for article 2
                quiz: [
                    {
                        question: "What is the primary focus of the article?",
                        options: {
                            A: "The impact of digital competence on upper secondary education",
                            B: "The history of education in Denmark",
                            C: "The role of teachers in digital education",
                            D: "The future of technology in classrooms"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question: "Which educational level is being examined in the article?",
                        options: {
                            A: "Upper secondary education",
                            B: "Primary education",
                            C: "Higher education",
                            D: "Adult education"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question: "What is digital competence primarily concerned with?",
                        options: {
                            A: "Physical education",
                            B: "Artistic expression",
                            C: "Technological skills and knowledge",
                            D: "Language proficiency"
                        },
                        correctAnswer: "C"
                    },
                    {
                        question: "In which country is the study conducted?",
                        options: {
                            A: "Sweden",
                            B: "Denmark",
                            C: "Norway",
                            D: "Finland"
                        },
                        correctAnswer: "B"
                    },
                    {
                        question: "What is a potential outcome of enhancing digital competence in education?",
                        options: {
                            A: "Decreased student engagement",
                            B: "Increased dropout rates",
                            C: "Less collaboration among students",
                            D: "Improved learning outcomes"
                        },
                        correctAnswer: "D"
                    }
                ]
            },
            {
                title: "Bringing digital competence to the disciplines",
                content: "In the 21st century, integrating digital competence across various academic disciplines is essential for enhancing learning outcomes, equipping students with vital skills for the workforce, and fostering a collaborative and innovative educational environment that prepares them for the challenges of a rapidly evolving digital landscape.",
                link: "{{url('/articles/5.pdf')}}", // Link to detailed view
                publishDate: "2024-02-27",
                status: "Published",
                views: 201,
                id: 5,
                media: "pics/pic5.png", // Media for article 2
                quiz: [
                    {
                        question: "What is the primary focus of the article?",
                        options: {
                            A: "The impact of digital competence on upper secondary education",
                            B: "The history of education in Denmark",
                            C: "The role of teachers in digital education",
                            D: "The future of technology in classrooms"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question: "Which educational level is being examined in the article?",
                        options: {
                            A: "Upper secondary education",
                            B: "Primary education",
                            C: "Higher education",
                            D: "Adult education"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question: "What is digital competence primarily concerned with?",
                        options: {
                            A: "Physical education",
                            B: "Artistic expression",
                            C: "Technological skills and knowledge",
                            D: "Language proficiency"
                        },
                        correctAnswer: "C"
                    },
                    {
                        question: "In which country is the study conducted?",
                        options: {
                            A: "Sweden",
                            B: "Denmark",
                            C: "Norway",
                            D: "Finland"
                        },
                        correctAnswer: "B"
                    },
                    {
                        question: "What is a potential outcome of enhancing digital competence in education?",
                        options: {
                            A: "Decreased student engagement",
                            B: "Increased dropout rates",
                            C: "Less collaboration among students",
                            D: "Improved learning outcomes"
                        },
                        correctAnswer: "D"
                    }
                ]
            },
            {
                title: "SEO Basics: A Beginner's Guide to SEO",
                content: "Search engine optimization (SEO) is a crucial digital marketing strategy that enhances website visibility on search engines, driving organic traffic and improving online presence.",
                link: "{{url('/articles/6.pdf')}}", // Link to detailed view
                publishDate: "2024-03-14",
                status: "Draft",
                views: 50,
                id: 6,
                media: "pics/pic6.png", // Media for article 2
                quiz: [
                    {
                        question: "What is the primary goal of SEO?",
                        options: {
                            A: "To increase website traffic from search engines",
                            B: "To create visually appealing websites",
                            C: "To improve website loading speed",
                            D: "To enhance social media presence"
                        },
                        correctAnswer: "A"
                    },
                    {
                        question:"Which of the following is a key component of on-page SEO?",
                        options: {
                            A: "Backlink building",
                            B: "Social media marketing",
                            C: "Keyword optimization",
                            D: "Email marketing"
                        },
                        correctAnswer: "C"
                    },
                    {
                        question: "What does the term backlink refer to in SEO?",
                        options: {
                            A: "A link from your website to another site",
                            B: "A link from another site to your website",
                            C: "A link that is broken",
                            D: "A link that redirects users"
                        },
                        correctAnswer: "B"
                    },
                    {
                        question: "Which tool is commonly used for keyword research?",
                        options: {
                            A: "Google Analytics",
                            B: "Google Search Console",
                            C: "Moz Keyword Explorer",
                            D: "SEMrush"
                        },
                        correctAnswer: "C"
                    },
                    {
                        question: "What is the purpose of a sitemap in SEO?",
                        options: {
                            A: "To improve website aesthetics",
                            B: "Provide more online courses",
                            C: "To increase website loading speed",
                            D: "To enhance user engagement"
                        },
                        correctAnswer: "A"
                    }
                ]
            }
        ];

        let currentQuestionIndex = 0;
        let score = 0;
        let currentQuiz = [];

        function getArticleId() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('article');
        }

        function displayArticleDetails() {
            const articleId = getArticleId();
            const article = articles.find(a => a.id == articleId);
            const articleInfo = document.getElementById('articleInfo');

            if (article) {
                articleInfo.innerHTML = `
                    <h3>${article.title}</h3>
                    <p>${article.content}</p>
                    <p><strong>Publish Date:</strong> ${article.publishDate}</p>
                    <p><strong>Status:</strong> ${article.status}</p>
                    <p><strong>Views:</strong> ${article.views}</p>
                    <a href="${article.link}">Read More</a>
                `;
                displayMedia(article.media);
            } else {
                articleInfo.innerHTML = `<p>Article not found.</p>`;
            }
        }

        function displayMedia(media) {
            const mediaContent = document.getElementById('mediaContent');
            mediaContent.innerHTML = `<img src="${media}" alt="Media for article" />`;
        }

        function startQuiz() {
            const articleId = getArticleId();
            const article = articles.find(a => a.id == articleId);
            currentQuiz = article.quiz || [];
            currentQuestionIndex = 0;
            score = 0;
            displayQuestion();
        }

        function displayQuestion() {
            const quizArea = document.getElementById('quizArea');
            if (currentQuestionIndex < currentQuiz.length) {
                const question = currentQuiz[currentQuestionIndex];
                quizArea.innerHTML = `<p>${question.question}</p>`;
                for (const [key, value] of Object.entries(question.options)) {
                    quizArea.innerHTML += `<div class="quiz-option"><button onclick="checkAnswer('${key}')">${key}) ${value}</button></div>`;
                }
            } else {
                quizArea.innerHTML = `<p>Quiz completed! Your score: ${score}/${currentQuiz.length}</p>`;
            }
        }

        function checkAnswer(answer) {
            const question = currentQuiz[currentQuestionIndex];
            const quizArea = document.getElementById('quizArea');
            if (answer === question.correctAnswer) {
                score++;
                quizArea.innerHTML += `<p>Correct!</p>`;
            } else {
                quizArea.innerHTML += `<p>Wrong! The correct answer is ${question.correctAnswer}) ${question.options[question.correctAnswer]}.</p>`;
            }
            currentQuestionIndex++;
            setTimeout(displayQuestion, 2000); // Wait 2 seconds before showing the next question
        }


        // Initial calls to display article details
        displayArticleDetails();
    </script>
    <script src="js/script.js"></script>
</body>
</html>
