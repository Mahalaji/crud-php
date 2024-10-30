
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractive Blog</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    color: #333;
    background-color: #f8f9fa;
}

header {
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 5%;
    max-width: 1200px;
    margin: 0 auto;
}

nav h1 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #3498db;
}

nav ul {
    display: flex;
    list-style: none;
}

nav ul li {
    margin-left: 2rem;
}

nav a {
    color: #333;
    text-decoration: none;
    font-weight: 400;
    transition: color 0.3s ease;
}

nav a:hover {
    color: #3498db;
}

main {
    padding: 2rem 5%;
    max-width: 1200px;
    margin: 0 auto;
}

h2 {
    margin-bottom: 1.5rem;
    font-size: 2rem;
    color: #2c3e50;
}

article {
    background-color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

article:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.post-image {
    height: 200px;
    background-size: cover;
    background-position: center;
}

.post-content {
    padding: 1.5rem;
}

.post-content h3 {
    margin-bottom: 0.5rem;
    font-size: 1.25rem;
    color: #2c3e50;
}

.read-more {
    display: inline-block;
    background-color: #3498db;
    color: #ffffff;
    padding: 0.5rem 1rem;
    text-decoration: none;
    border-radius: 4px;
    margin-top: 1rem;
    transition: background-color 0.3s ease;
}

.read-more:hover {
    background-color: #2980b9;
}

.post-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

footer {
    background-color: #2c3e50;
    color: #ffffff;
    text-align: center;
    padding: 1.5rem;
    margin-top: 2rem;
}

#featured-post .featured {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

#featured-post .post-image {
    height: 100%;
    min-height: 300px;
}

@media (max-width: 768px) {
    nav {
        flex-direction: column;
    }

    nav ul {
        margin-top: 1rem;
    }

    nav ul li {
        margin-left: 0;
        margin-right: 1rem;
    }

    #featured-post .featured {
        grid-template-columns: 1fr;
    }

    #featured-post .post-image {
        height: 200px;
    }
}
</style>
<body>
    <header>
        <nav>
            <h1>Attractive Blog</h1>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="featured-post">
            <h2>Featured Post</h2>
            <article class="featured">
                <div class="post-image" style="background-image: url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80');"></div>
                <div class="post-content">
                    <h3>The Future of Web Design</h3>
                    <p>Explore the cutting-edge trends and technologies shaping the future of web design. From AI-driven layouts to immersive 3D experiences, discover what's next in the digital realm.</p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </article>
        </section>

        <section id="recent-posts">
            <h2>Recent Posts</h2>
            <div class="post-grid">
                <article>
                            <tr>
                          

                    <div class="post-image" style="background-image: url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                    <div class="post-content">
                        <h3>Mastering CSS Grid</h3>
                        <p>Learn how to create complex layouts with ease using CSS Grid.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>
                <article>
                    <div class="post-image" style="background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80');"></div>
                    <div class="post-content">
                        <h3>JavaScript Best Practices</h3>
                        <p>Discover the top JavaScript practices to write cleaner, more efficient code.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>
                <article>
                    <div class="post-image" style="background-image: url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                    <div class="post-content">
                        <h3>Responsive Design Tips</h3>
                        <p>Essential tips for creating websites that look great on any device.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Attractive Blog. All rights reserved.</p>
    </footer>
</body>
</html>