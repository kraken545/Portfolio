<?php
include 'dbcalls/conn.php';

$languages = [];
$bioText = '';
try {
    $stmt = $conn->query("SELECT talen FROM timeline WHERE talen IS NOT NULL ORDER BY id");
    $languages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $bioStmt = $conn->query("SELECT blok FROM timeline WHERE talen IS NULL AND jaren IS NULL LIMIT 1");
    $bioRow = $bioStmt->fetch(PDO::FETCH_ASSOC);
    $bioText = $bioRow ? $bioRow['blok'] : '';
} catch (Exception $e) {
    $languages = [];
    $bioText = '';
}

$languageLevels = [
    'Dutch' => 90,
    'English' => 85,
    'Spanish' => 98,
    'Papiamentu' => 95,
];
?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio</title>
  </head>
  <!--- animatie script voor de backgound. Cmatrix_style -->
  <script src="assets/js/cmatrix-bg.js"></script>
  <body class="font-style">
    <main class="main-background-color">
      <section class="main-info-blok main-background-color">
        <section class="gooey-nav-container">
          <nav>
            <a href="index.php" class="active">Home</a>
            <a href="assets/pages/contact.php">Contact</a>
            <a href="assets/pages/timeline.php">Timeline</a>
          </nav>
        </section>

        <section class="pic-info-sectie">
          <div class="pic-box">
            <img
              src="assets/img/icons/Diseño sin título (1).png"
              alt="mijn photo"
              width="180"
            />
          </div>
          <!--- text box met wat over mij -->
          <div class="text-box">
            Hi, I'm Elian
            <p>
              <?php echo nl2br(($bioText)); ?>
            </p>
          </div>
        </section>
        <!--- talen bar alle mee te maken met de taal niveaus --->
        <section class="language-selector">
          <?php foreach ($languages as $language) { ?>
            <?php $label = trim($language['talen']); if ($label === '') continue; ?>
            <?php $level = $languageLevels[$label] ?? 70; ?>
            <div class="language-item">
              <label class="language-label"><?php echo $label; ?></label>
              <div class="progress-bar-container">
                <div class="progress-bar" style="--level: <?php echo $level; ?>%" data-level="<?php echo $level; ?>">
                  <div class="progress-fill"></div>
                </div>
              </div>
            </div>
          <?php }?>
        </section>
        <!--- stack name apart om de animaties te kunnen zetten en code schoon te laten --->
        <section class="stack-show-name">
          <div class="hackeado pixelado" id="textoHackeado">Stack</div>
        </section>
        <!--- deze hele gedeelde van stack-column is voor de icons infinity loop --->
        <section class="stack-column">
          <section class="stack-stack-sectie">
            <div>
              <img
                src="assets/img/icons/JavaScript.png"
                alt="javascript-logo"
                width="50"
              />
            </div>
            <div>
              <img src="assets/img/icons/CSS3.png" alt="css_logo" width="50" />
            </div>
            <div>
              <img src="assets/img/icons/HTML5.png" alt="html-logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/C-Plusplus--Streamline-Svg-Logos.png"
                alt="C++_logo"
                width="50"
              />
            </div>
            <div><img src="assets/img/icons/PHP.png" alt="PhP_logo" width="50" /></div>
            <div>
              <img src="assets/img/icons/Python.png" alt="python_logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/Java--Streamline-Svg-Logos.svg"
                alt="java_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/icons8-bash-48.png"
                alt="bash_logo"
                width="50"
              />
            </div>

            <div>
              <img
                src="assets/img/icons/JavaScript.png"
                alt="javascript-logo"
                width="50"
              />
            </div>
            <div>
              <img src="assets/img/icons/CSS3.png" alt="css_logo" width="50" />
            </div>
            <div>
              <img src="assets/img/icons/HTML5.png" alt="html-logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/C-Plusplus--Streamline-Svg-Logos.png"
                alt="C++_logo"
                width="50"
              />
            </div>
            <div><img src="assets/img/icons/PHP.png" alt="PhP_logo" width="50" /></div>
            <div>
              <img src="assets/img/icons/Python.png" alt="python_logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/Java--Streamline-Svg-Logos.svg"
                alt="java_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/icons8-bash-48.png"
                alt="bash_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/JavaScript.png"
                alt="javascript-logo"
                width="50"
              />
            </div>
            <div>
              <img src="assets/img/icons/CSS3.png" alt="css_logo" width="50" />
            </div>
            <div>
              <img src="assets/img/icons/HTML5.png" alt="html-logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/C-Plusplus--Streamline-Svg-Logos.png"
                alt="C++_logo"
                width="50"
              />
            </div>
            <div><img src="assets/img/icons/PHP.png" alt="PhP_logo" width="50" /></div>
            <div>
              <img src="assets/img/icons/Python.png" alt="python_logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/Java--Streamline-Svg-Logos.svg"
                alt="java_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/icons8-bash-48.png"
                alt="bash_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/JavaScript.png"
                alt="javascript-logo"
                width="50"
              />
            </div>
            <div>
              <img src="assets/img/icons/CSS3.png" alt="css_logo" width="50" />
            </div>
            <div>
              <img src="assets/img/icons/HTML5.png" alt="html-logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/C-Plusplus--Streamline-Svg-Logos.png"
                alt="C++_logo"
                width="50"
              />
            </div>
            <div><img src="assets/img/icons/PHP.png" alt="PhP_logo" width="50" /></div>
            <div>
              <img src="assets/img/icons/Python.png" alt="python_logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/Java--Streamline-Svg-Logos.svg"
                alt="java_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/icons8-bash-48.png"
                alt="bash_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/JavaScript.png"
                alt="javascript-logo"
                width="50"
              />
            </div>
            <div>
              <img src="assets/img/icons/CSS3.png" alt="css_logo" width="50" />
            </div>
            <div>
              <img src="assets/img/icons/HTML5.png" alt="html-logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/C-Plusplus--Streamline-Svg-Logos.png"
                alt="C++_logo"
                width="50"
              />
            </div>
            <div><img src="assets/img/icons/PHP.png" alt="PhP_logo" width="50" /></div>
            <div>
              <img src="assets/img/icons/Python.png" alt="python_logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/Java--Streamline-Svg-Logos.svg"
                alt="java_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/icons8-bash-48.png"
                alt="bash_logo"
                width="50"
              />
            </div>
          </section>

          <section class="stack-stack-sectie">
            <div>
              <img
                src="assets/img/icons/JavaScript.png"
                alt="javascript-logo"
                width="50"
              />
            </div>
            <div>
              <img src="assets/img/icons/CSS3.png" alt="css_logo" width="50" />
            </div>
            <div>
              <img src="assets/img/icons/HTML5.png" alt="html-logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/C-Plusplus--Streamline-Svg-Logos.png"
                alt="C++_logo"
                width="50"
              />
            </div>
            <div><img src="assets/img/icons/PHP.png" alt="PhP_logo" width="50" /></div>
            <div>
              <img src="assets/img/icons/Python.png" alt="python_logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/Java--Streamline-Svg-Logos.svg"
                alt="java_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/icons8-bash-48.png"
                alt="bash_logo"
                width="50"
              />
            </div>

            <div>
              <img
                src="assets/img/icons/JavaScript.png"
                alt="javascript-logo"
                width="50"
              />
            </div>
            <div>
              <img src="assets/img/icons/CSS3.png" alt="css_logo" width="50" />
            </div>
            <div>
              <img src="assets/img/icons/HTML5.png" alt="html-logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/C-Plusplus--Streamline-Svg-Logos.png"
                alt="C++_logo"
                width="50"
              />
            </div>
            <div><img src="assets/img/icons/PHP.png" alt="PhP_logo" width="50" /></div>
            <div>
              <img src="assets/img/icons/Python.png" alt="python_logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/Java--Streamline-Svg-Logos.svg"
                alt="java_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/icons8-bash-48.png"
                alt="bash_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/JavaScript.png"
                alt="javascript-logo"
                width="50"
              />
            </div>
            <div>
              <img src="assets/img/icons/CSS3.png" alt="css_logo" width="50" />
            </div>
            <div>
              <img src="assets/img/icons/HTML5.png" alt="html-logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/C-Plusplus--Streamline-Svg-Logos.png"
                alt="C++_logo"
                width="50"
              />
            </div>
            <div><img src="assets/img/icons/PHP.png" alt="PhP_logo" width="50" /></div>
            <div>
              <img src="assets/img/icons/Python.png" alt="python_logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/Java--Streamline-Svg-Logos.svg"
                alt="java_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/icons8-bash-48.png"
                alt="bash_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/JavaScript.png"
                alt="javascript-logo"
                width="50"
              />
            </div>
            <div>
              <img src="assets/img/icons/CSS3.png" alt="css_logo" width="50" />
            </div>
            <div>
              <img src="assets/img/icons/HTML5.png" alt="html-logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/C-Plusplus--Streamline-Svg-Logos.png"
                alt="C++_logo"
                width="50"
              />
            </div>
            <div><img src="assets/img/icons/PHP.png" alt="PhP_logo" width="50" /></div>
            <div>
              <img src="assets/img/icons/Python.png" alt="python_logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/Java--Streamline-Svg-Logos.svg"
                alt="java_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/icons8-bash-48.png"
                alt="bash_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/JavaScript.png"
                alt="javascript-logo"
                width="50"
              />
            </div>
            <div>
              <img src="assets/img/icons/CSS3.png" alt="css_logo" width="50" />
            </div>
            <div>
              <img src="assets/img/icons/HTML5.png" alt="html-logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/C-Plusplus--Streamline-Svg-Logos.png"
                alt="C++_logo"
                width="50"
              />
            </div>
            <div><img src="assets/img/icons/PHP.png" alt="PhP_logo" width="50" /></div>
            <div>
              <img src="assets/img/icons/Python.png" alt="python_logo" width="50" />
            </div>
            <div>
              <img
                src="assets/img/icons/Java--Streamline-Svg-Logos.svg"
                alt="java_logo"
                width="50"
              />
            </div>
            <div>
              <img
                src="assets/img/icons/icons8-bash-48.png"
                alt="bash_logo"
                width="50"
              />
            </div>
          </section>
        </section>
      </section>
    </main>
  </body>
</html>
