const drawingBoard = document.querySelector('.drawing-board');
const layersList = document.querySelector('.layers-list');
const addLayerBtn = document.getElementById('add-layer');
const clearBtn = document.querySelector('.clear-canvas');
const saveBtn = document.querySelector('.save-img');
const undoBtn = document.querySelector('.undo-btn');
const redoBtn = document.querySelector('.redo-btn');
const toolButtons = document.querySelectorAll('.tool-btn');
const colorPicker = document.getElementById('color-picker');
const sizeSlider = document.getElementById('size-slider');
const deleteLayerBtn = document.getElementById('delete-layer');

let layers = [];
let activeLayerIndex = 0;
let isDrawing = false;
let lastPos = { x: 0, y: 0 };
let currentTool = 'pen';
let currentColor = colorPicker.value;
let currentSize = parseInt(sizeSlider.value, 10);

// Event handlers for the active canvas
function startDrawing(e) {
  if (!layers.length) return;
  if (currentTool === 'bucket') {
    const pos = getPos(e);
    fillBucket(pos);
    saveState(layers[activeLayerIndex]);
    return;
  }
  isDrawing = true;
  lastPos = getPos(e);
  e.preventDefault();
}

function draw(e) {
  if (!isDrawing) return;
  const ctx = layers[activeLayerIndex].ctx;
  const pos = getPos(e);

  if (currentTool === 'eraser') {
    ctx.globalCompositeOperation = 'destination-out';
    ctx.lineWidth = currentSize;
ctx.beginPath();
ctx.moveTo(lastPos.x, lastPos.y);
ctx.quadraticCurveTo(
  lastPos.x,
  lastPos.y,
  (lastPos.x + pos.x) / 2,
  (lastPos.y + pos.y) / 2
);
ctx.stroke();
    ctx.globalCompositeOperation = 'source-over';
  } else {
    ctx.lineWidth = currentSize;
    ctx.strokeStyle = currentColor;
    ctx.globalAlpha = currentTool === 'brush' ? 0.9 : 1;
    if (currentTool === 'brush') ctx.lineWidth = currentSize * 2;

    ctx.beginPath();
    ctx.moveTo(lastPos.x, lastPos.y);
    ctx.lineTo(pos.x, pos.y);
    ctx.stroke();
    ctx.globalAlpha = 1;
  }

  lastPos = pos;
  e.preventDefault();
}

function stopDrawing(e) {
  if (!isDrawing) return;
  isDrawing = false;
  saveState(layers[activeLayerIndex]);
  e.preventDefault();
}

function getPos(e) {
  const canvas = layers[activeLayerIndex].canvas;
  const rect = canvas.getBoundingClientRect();
  let x, y;
  if (e.touches) {
    x = e.touches[0].clientX - rect.left;
    y = e.touches[0].clientY - rect.top;
  } else {
    x = e.clientX - rect.left;
    y = e.clientY - rect.top;
  }
  x = Math.floor(Math.max(0, Math.min(x, rect.width - 1)));
  y = Math.floor(Math.max(0, Math.min(y, rect.height - 1)));
  return { x, y };
}

function createLayer(name = `Layer ${layers.length + 1}`) {
  const canvas = document.createElement('canvas');
  canvas.width = drawingBoard.clientWidth;
  canvas.height = drawingBoard.clientHeight;
  canvas.style.position = 'absolute';
  canvas.style.top = '0';
  canvas.style.left = '0';
  canvas.style.zIndex = layers.length;

  drawingBoard.appendChild(canvas);

  const ctx = canvas.getContext('2d');
  ctx.lineCap = 'round';
  ctx.strokeStyle = currentColor;
  ctx.lineWidth = currentSize;

  const undoStack = [];
  const redoStack = [];

  const layer = { canvas, ctx, name, undoStack, redoStack };
  layers.push(layer);

  const li = document.createElement('li');
  li.textContent = name;
  li.dataset.index = layers.length - 1;
  if (layers.length === 1) li.classList.add('active');
  layersList.appendChild(li);

  li.addEventListener('click', () => {
    setActiveLayer(parseInt(li.dataset.index));
  });

  saveState(layer);
  setActiveLayer(layers.length - 1);
}

function saveState(layer) {
  try {
    const imageData = layer.ctx.getImageData(0, 0, layer.canvas.width, layer.canvas.height);
    layer.undoStack.push(imageData);
    layer.redoStack = [];
  } catch {
    // Ignore errors (e.g. tainted canvas)
  }
  updateUndoRedoButtons();
}

function setActiveLayer(index) {
  if (layers[activeLayerIndex]) removeCanvasListeners(layers[activeLayerIndex].canvas);

  activeLayerIndex = index;

  document.querySelectorAll('.layers-list li').forEach((li, i) => {
    li.classList.toggle('active', i === index);
  });

  addCanvasListeners(layers[activeLayerIndex].canvas);
  updateUndoRedoButtons();
  updateDeleteButton();
}

function addCanvasListeners(canvas) {
  canvas.addEventListener('mousedown', startDrawing);
  canvas.addEventListener('touchstart', startDrawing, { passive: false });
  canvas.addEventListener('mousemove', draw);
  canvas.addEventListener('touchmove', draw, { passive: false });
  canvas.addEventListener('mouseup', stopDrawing);
  canvas.addEventListener('touchend', stopDrawing);
  canvas.addEventListener('mouseleave', stopDrawing);
}

function removeCanvasListeners(canvas) {
  canvas.removeEventListener('mousedown', startDrawing);
  canvas.removeEventListener('touchstart', startDrawing);
  canvas.removeEventListener('mousemove', draw);
  canvas.removeEventListener('touchmove', draw);
  canvas.removeEventListener('mouseup', stopDrawing);
  canvas.removeEventListener('touchend', stopDrawing);
  canvas.removeEventListener('mouseleave', stopDrawing);
}

function clearAll() {
  layers.forEach(({ ctx, canvas, undoStack, redoStack }) => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    undoStack.push(imageData);
    redoStack.length = 0;
  });
  updateUndoRedoButtons();
}

function saveImage() {
  if (!layers.length) return alert('No layers to save!');

  const mergeCanvas = document.createElement('canvas');
  mergeCanvas.width = drawingBoard.clientWidth;
  mergeCanvas.height = drawingBoard.clientHeight;
  const mergeCtx = mergeCanvas.getContext('2d');

  layers.forEach(({ canvas }) => {
    mergeCtx.drawImage(canvas, 0, 0);
  });

  const link = document.createElement('a');
  link.download = `drawing_${Date.now()}.png`;
  link.href = mergeCanvas.toDataURL('image/png');
  link.click();
}

// Flood Fill (Bucket tool)
function fillBucket(pos) {
  const layer = layers[activeLayerIndex];
  const ctx = layer.ctx;
  const canvas = layer.canvas;

  const width = canvas.width;
  const height = canvas.height;
  const imageData = ctx.getImageData(0, 0, width, height);
  const data = imageData.data;

  const x = Math.floor(pos.x);
  const y = Math.floor(pos.y);

  const startIdx = (y * width + x) * 4;
  const startColor = [
    data[startIdx],
    data[startIdx + 1],
    data[startIdx + 2],
    data[startIdx + 3]
  ];

  const fillColor = hexToRgba(currentColor);
  if (colorsMatch(startColor, fillColor)) return;

  const queue = [[x, y]];
  const visited = new Uint8Array(width * height);

  while (queue.length > 0) {
    const [cx, cy] = queue.shift();
    if (cx < 0 || cy < 0 || cx >= width || cy >= height) continue;
    const idx = cy * width + cx;
    if (visited[idx]) continue;

    const i = idx * 4;
    const currentColorData = [data[i], data[i + 1], data[i + 2], data[i + 3]];
    if (!colorsMatch(currentColorData, startColor)) continue;

    data[i] = fillColor[0];
    data[i + 1] = fillColor[1];
    data[i + 2] = fillColor[2];
    data[i + 3] = 255;
    visited[idx] = 1;

    queue.push([cx + 1, cy]);
    queue.push([cx - 1, cy]);
    queue.push([cx, cy + 1]);
    queue.push([cx, cy - 1]);
  }

  ctx.putImageData(imageData, 0, 0);
}

function hexToRgba(hex) {
  hex = hex.replace('#', '');
  const bigint = parseInt(hex, 16);
  return [
    (bigint >> 16) & 255,
    (bigint >> 8) & 255,
    bigint & 255,
    255
  ];
}

function colorsMatch(c1, c2, tolerance = 64) {
  return (
    Math.abs(c1[0] - c2[0]) <= tolerance &&
    Math.abs(c1[1] - c2[1]) <= tolerance &&
    Math.abs(c1[2] - c2[2]) <= tolerance &&
Math.abs(c1[3] - c2[3]) <= tolerance
);
}

function undo() {
const layer = layers[activeLayerIndex];
if (layer.undoStack.length <= 1) return;

const current = layer.undoStack.pop();
layer.redoStack.push(current);

const previous = layer.undoStack[layer.undoStack.length - 1];
layer.ctx.putImageData(previous, 0, 0);

updateUndoRedoButtons();
}

function redo() {
const layer = layers[activeLayerIndex];
if (!layer.redoStack.length) return;

const imageData = layer.redoStack.pop();
layer.ctx.putImageData(imageData, 0, 0);
layer.undoStack.push(imageData);

updateUndoRedoButtons();
}

function updateUndoRedoButtons() {
const layer = layers[activeLayerIndex];
undoBtn.disabled = !(layer && layer.undoStack.length > 1);
redoBtn.disabled = !(layer && layer.redoStack.length > 0);
}

function updateDeleteButton() {
deleteLayerBtn.disabled = layers.length <= 1;
}

function deleteActiveLayer() {
if (layers.length <= 1) return alert('At least one layer must remain!');

const layer = layers[activeLayerIndex];
removeCanvasListeners(layer.canvas);
drawingBoard.removeChild(layer.canvas);

layers.splice(activeLayerIndex, 1);
layersList.removeChild(layersList.children[activeLayerIndex]);

// Update z-index and data-index for remaining layers
layers.forEach((l, i) => {
l.canvas.style.zIndex = i;
layersList.children[i].dataset.index = i;
});

// Adjust activeLayerIndex
if (activeLayerIndex >= layers.length) activeLayerIndex = layers.length - 1;

// Set new active layer
setActiveLayer(activeLayerIndex);
updateDeleteButton();
}

// Event Listeners for buttons and UI controls
addLayerBtn.addEventListener('click', () => createLayer());
clearBtn.addEventListener('click', clearAll);
saveBtn.addEventListener('click', saveImage);
undoBtn.addEventListener('click', undo);
redoBtn.addEventListener('click', redo);
deleteLayerBtn.addEventListener('click', deleteActiveLayer);

toolButtons.forEach(btn => {
btn.addEventListener('click', () => {
currentTool = btn.dataset.tool;
toolButtons.forEach(b => b.classList.remove('active'));
btn.classList.add('active');
});
});

colorPicker.addEventListener('input', (e) => {
currentColor = e.target.value;
});

sizeSlider.addEventListener('input', (e) => {
currentSize = parseInt(e.target.value, 10);
});

window.addEventListener('resize', () => {
// Resize all canvases on window resize
layers.forEach(layer => {
const imgData = layer.ctx.getImageData(0, 0, layer.canvas.width, layer.canvas.height);
layer.canvas.width = drawingBoard.clientWidth;
layer.canvas.height = drawingBoard.clientHeight;
layer.ctx.putImageData(imgData, 0, 0);
});
});

// Initialize with one layer
createLayer();
