<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Drawing App with Layers & Tools</title>

  <!-- Main Stylesheet (Add this if it's missing) -->
  <link rel="stylesheet" href="css/styles.css" />
  <!-- Page-Specific Styles -->
  <link rel="stylesheet" href="css/stylepad.css" />

  <!-- Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Lora:wght@400;500;600&family=Poppins:wght@400;500;600&display=swap"
    rel="stylesheet"
  />

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <?php include 'includes/header.php'; ?>
    <div class="container-pad">
      <section class="tools-board">
        <div class="layers">
          <h3>Layers</h3>
          <ul class="layers-list"></ul>
          <button id="add-layer">Add Layer</button>
          <button id="delete-layer">Delete Layer</button>
        </div>

        <div class="tools">
          <h3>Tools</h3>
          <div class="tool-options">
            <button class="tool-btn active" data-tool="pen">Pen</button>
            <button class="tool-btn" data-tool="brush">Brush</button>
          </div>
          <div class="tool-options">
            <button class="tool-btn" data-tool="eraser">Eraser</button>
            <button class="tool-btn" data-tool="bucket">Bucket</button>
          </div>
          <label for="color-picker">Color:</label>
          <input type="color" id="color-picker" value="#000000" />

          <label for="size-slider">Size:</label>
          <input
            type="range"
            id="size-slider"
            min="1"
            max="50"
            value="4"
            step="1"
          />
        </div>

        <div class="buttons">
          <button class="undo-btn">Undo</button>
          <button class="redo-btn">Redo</button>
        </div>
        <div class="buttons">
          <button class="clear-canvas">Clear</button>
          <button class="save-img">Save</button>
        </div>
      </section>

      <section class="drawing-board"></section>
    </div>
  <?php include 'includes/footer.php'; ?>

  <script src="js/scriptpad.js"></script>
  <script src="js/auth-modal.js"></script>
</body>
</html>