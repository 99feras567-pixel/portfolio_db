<?php
include 'db.php';

$profile_result = $conn->query("SELECT * FROM profile WHERE id=1");
$profile = $profile_result->fetch_assoc();


$skills_result = $conn->query("SELECT * FROM skills");


$projects_result = $conn->query("SELECT * FROM projects");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $profile['name']; ?> - Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

  
    <nav>
        <h2><?php echo $profile['name']; ?></h2>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Me</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <button id="darkModeToggle">Dark Mode</button>
    </nav>

  
    <section id="home">
        <h1>Welcome, I'm <?php echo $profile['name']; ?></h1>
        <p><?php echo $profile['title']; ?></p>
    </section>

     <section id="about">
        <h2>About Me</h2>
        <p><?php echo $profile['bio']; ?></p>
    </section>

    <section id="skills">
        <h2>My Skills</h2>
        <ul>
            <?php while($skill = $skills_result->fetch_assoc()) { ?>
                <li><?php echo $skill['skill_name']; ?> (<?php echo $skill['proficiency']; ?>%)</li>
            <?php } ?>
        </ul>
    </section>


    <section id="projects">
        <h2>Projects</h2>
        <div class="projects-grid">
            <?php while($project = $projects_result->fetch_assoc()) { ?>
                <div class="card">
                    <h3><?php echo $project['project_title']; ?></h3>
                    <p><?php echo $project['project_description']; ?></p>
                    <a href="<?php echo $project['project_link']; ?>">View Project</a>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- Contact Form -->
    <section id="contact">
        <h2>Contact Me</h2>
        <p>Email: <?php echo $profile['email']; ?></p>
    </section>

    <script src="script.js"></script>
</body>
</html>