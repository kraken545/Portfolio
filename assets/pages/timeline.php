<?php
include '../../dbcalls/conn.php';

$events = [];
try {
    $stmt = $conn->query("SELECT blok, jaren FROM timeline WHERE blok IS NOT NULL AND jaren IS NOT NULL ORDER BY id");
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $events = [];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../css/style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Timeline - Portfolio</title>
  </head>
  <body class="font-style">
    <main class="main-background-color" style="height: auto">
      <section class="main-info-blok main-background-color">
        <section class="gooey-nav-container">
          <nav>
            <a href="../../index.php">Home</a>
            <a href="contact.php">Contact</a>
            <a href="timeline.php" class="active">Timeline</a>
          </nav>
        </section>

        <section class="timeline-container">
          <h1 class="timeline-title">My Journey</h1>

          <div class="timeline">
            <?php if (empty($events)) { ?>
              <div class="timeline-event">
                <div class="timeline-marker">
                  <div class="timeline-dot"></div>
                </div>
                <div class="timeline-content">
                  <h3>No timeline data</h3>
                  <p class="timeline-description">There is no timeline information available yet.</p>
                </div>
              </div>
            <?php }else { ?>
              <?php foreach ($events as $event) { ?>
                <div class="timeline-event">
                  <div class="timeline-marker">
                    <div class="timeline-dot"></div>
                  </div>
                  <div class="timeline-content">
                    <h3>Milestone</h3>
                    <p class="timeline-date"><?php echo htmlspecialchars($event['jaren']); ?></p>
                    <p class="timeline-description"><?php echo nl2br(htmlspecialchars($event['blok'])); ?></p>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          </div>
        </section>
      </section>
    </main>
    <!--- animatie script voor de backgound. Cmatrix_style -->
    <script src="../assets/js/cmatrix-bg.js"></script>
  </body>
</html>
