function confirmFunction() {
  var txt;
  if (confirm("Warning: Deleting items are permanent are you sure you want to proceed?")) {
    txt = true;
  } else {
    txt = false;
  }
}