// Initialize Bootstrap tooltips for elements with the attribute data-bs-toggle="tooltip"

// Create an array from all elements that have the data-bs-toggle="tooltip" attribute
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));

// Map over the array and initialize a Bootstrap Tooltip instance for each element
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});
