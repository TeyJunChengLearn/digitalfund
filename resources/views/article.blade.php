<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mastering Digital Competency - Articles</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Additional styles for better layout and user experience */
        #article-search {
            margin-bottom: 20px;
        }
        #pagination {
            margin-top: 20px;
            text-align: center;
        }
        #pagination button {
            margin: 0 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Ensures borders are merged */
        }
        th, td {
            border: 1px solid #007BFF; /* Adds a solid border to table cells */
            padding: 10px; /* Adds padding for better spacing */
            text-align: left; /* Aligns text to the left */
        }
        th {
            background-color: #007BFF; /* Adds a background color to the header */
            color: white; /* Changes text color to white for contrast */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Adds a light background color to even rows */
        }
    </style>
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
        <section id="article-search">
            <h2>Search Articles by Category</h2>
            <input type="text" id="searchInput" placeholder="Search for articles...">
            <button onclick="searchArticles()">Search</button>
        </section>
        <section id="articles">
            <h2>Articles</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Link</th>
                        <th>Publish Date</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Tags</th>
                        <th>Categories</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody id="articleTableBody">
                    <!-- Articles will be dynamically inserted here -->
                </tbody>
            </table>
            <div id="pagination">
                <button onclick="prevPage()">Previous</button>
                <button onclick="nextPage()">Next</button>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Mastering Digital Competency Project</p>
    </footer>

    <script src="js/script.js"></script>
    <script>
        // Mock data for articles
        const articles = [
            {
                title: "Understanding Digital Literacy",
                content: "This article discusses the importance of digital literacy in today's world.",
                link: "{{url('/articles/1.pdf')}}", // Link to detailed view
                publishDate: "2020-01-15",
                status: "Published",
                views: 150,
                tags: "Digital, Literacy",
                categories: "Education, Technology",
                id: 1 // Unique ID for the article
            },
            {
                title: "Cybersecurity Basics",
                content: "Learn the fundamentals of cybersecurity and how to protect your information.",
                link: "{{url('/articles/2.pdf')}}", // Link to detailed view
                publishDate: "2025-02-10",
                status: "Published",
                views: 200,
                tags: "Cybersecurity, Safety",
                categories: "Technology, Security",
                id: 2 // Unique ID for the article
            },
            {
                title: "Emerging Technologies Overview",
                content: "This article explores the latest trends in emerging technologies.",
                link: "{{url('/articles/3.pdf')}}", // Link to detailed view
                publishDate: "2022-03-05",
                status: "Draft",
                views: 50,
                tags: "Technology, Trends",
                categories: "Innovation, Research",
                id: 3 // Unique ID for the article
            },
            {
                title: "The Level of Digital Skills and Internet Usage",
                content: "Discuss the importance of digital skills in today's job market, highlight key skills needed, and provide resources for learning.",
                link: "{{url('/articles/4.pdf')}}", // Link to detailed view
                publishDate: "2024-05-06",
                status: "Published",
                views: 151,
                tags: "Digital skills, online learning",
                categories: "Education, Career Development, Digital Literacy",
                id: 4 // Unique ID for the article
            },
            {
                title: "Bringing digital competence to the disciplines",
                content: "In the 21st century, integrating digital competence across various academic disciplines is essential for enhancing learning outcomes, equipping students with vital skills for the workforce, and fostering a collaborative and innovative educational environment that prepares them for the challenges of a rapidly evolving digital landscape.",
                link: "{{url('/articles/5.pdf')}}", // Link to detailed view
                publishDate: "2024-02-27",
                status: "Published",
                views: 201,
                tags: "Digital Competence, Education",
                categories: "Education, Digital Literacy",
                id: 5 // Unique ID for the article
            },
            {
                title: "SEO Basics: A Beginner's Guide to SEO",
                content: "Search engine optimization (SEO) is a crucial digital marketing strategy that enhances website visibility on search engines, driving organic traffic and improving online presence.",
                link: "{{url('/articles/6.pdf')}}", // Link to detailed view
                publishDate: "2024-03-14",
                status: "Draft",
                views: 50,
                tags: "Digital Marketing, Search Engine Optimization",
                categories: "Marketing, Digital Marketing,SEO",
                id: 6 // Unique ID for the article
            }
        ];

        let currentPage = 1;
        const articlesPerPage = 2;

        function displayArticles() {
            const start = (currentPage - 1) * articlesPerPage;
            const end = start + articlesPerPage;
            const articleTableBody = document.getElementById('articleTableBody');
            articleTableBody.innerHTML = ''; // Clear existing articles

            articles.slice(start, end).forEach(article => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${article.title}</td>
                    <td>${article.content}</td>
                    <td><a href="${article.link}">Read More</a></td>
                    <td>${article.publishDate}</td>
                    <td>${article.status}</td>
                    <td>${article.views}</td>
                    <td>${article.tags}</td>
                    <td>${article.categories}</td>
                    <td><a href="comment?article=${article.id}"><button>Select</button></a></td>
                `;
                articleTableBody.appendChild(row);
            });
        }

        function searchArticles() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const filteredArticles = articles.filter(article => article.title.toLowerCase().includes(input));
            const articleTableBody = document.getElementById('articleTableBody');
            articleTableBody.innerHTML = ''; // Clear existing articles

            filteredArticles.forEach(article => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${article.title}</td>
                    <td>${article.content}</td>
                    <td><a href="${article.link}">Read More</a></td>
                    <td>${article.publishDate}</td>
                    <td>${article.status}</td>
                    <td>${article.views}</td>
                    <td>${article.tags}</td>
                    <td>${article.categories}</td>
                    <td><a href="comment?article=${article.id}"><button>Select</button></a></td>
                `;
                articleTableBody.appendChild(row);
            });
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                displayArticles();
            }
        }

        function nextPage() {
            if (currentPage < Math.ceil(articles.length / articlesPerPage)) {
                currentPage++;
                displayArticles();
            }
        }

        // Initial call to display articles
        displayArticles();
    </script>
    <script src="js/script.js"></script>
</body>
</html>
