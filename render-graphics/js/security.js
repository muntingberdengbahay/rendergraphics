// Disable right click everywhere
document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});

// Disable dragging images
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('img').forEach(img => {
    img.setAttribute('draggable', 'false');
    img.addEventListener('mousedown', e => e.preventDefault());
  });
});

// Optional: Attempt to blur on PrintScreen key (makes screenshots harder)
window.addEventListener("keyup", function(e) {
  if (e.key === "PrintScreen") {
    document.body.style.filter = "blur(15px)";
    setTimeout(() => {
      document.body.style.filter = "";
    }, 1200);
  }
});

// Disable common shortcuts (Ctrl+S, Ctrl+U, Ctrl+C, Ctrl+Shift+I, F12)
document.addEventListener('keydown', function(e) {
  if (
    (e.ctrlKey && ['s', 'u', 'c'].includes(e.key.toLowerCase())) ||
    (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === 'i') ||
    e.key === 'F12'
  ) {
    e.preventDefault();
  }
});