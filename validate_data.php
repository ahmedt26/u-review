<?php
// validate_data.php contains methods which clean potentially harmful inputs from forms.
// A function which strips data of potentially server-harming data.
function legalizeInput($data)
{
  // Strip whitespace and other characters from the start/end of a string example: "   test   " -> "test"
  $data = trim($data);
  // Removes slashes from the input e.x "tes\t" -> "test"
  $data = stripslashes($data);
  // Converts characters like '>' into their HTML versions.
  $data = htmlspecialchars($data);
  return $data;
}

// Simple boolean output if original data is legal.
// If the original data is the same as the legalized data, then the original data is legal.
function isLegal($original_data)
{
  return (legalizeInput($original_data) == $original_data);
}
