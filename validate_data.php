<?php

// A function which strips data of potentially server-harming data.
function legalizeInput($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Simple boolean output if original data is legal.
function isLegal($original_data)
{
  return (legalizeInput($original_data) == $original_data);
}
