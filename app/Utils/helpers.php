<?php
  
function dateTimeFormat($date){
  return \Carbon\Carbon::parse($date)->format('d M Y - g:i A');
}

function dateFormat($date){
  return \Carbon\Carbon::parse($date)->format('d M Y');
}

function dateTimeSlashFormat($date){
  return \Carbon\Carbon::parse($date)->format('d/m/Y g:i A');
}

function dateRangeFormFormat($startDate, $finishDate){
  $dateConvert = dateTimeSlashFormat($startDate).' - '.dateTimeSlashFormat($finishDate);
  return $dateConvert;
}

function trimString($string, $repl, $limit) 
{
  if(strlen($string) > $limit) 
  {
    return substr($string, 0, $limit) . $repl; 
  }
  else 
  {
    return $string;
  }
}

function sluggify($string)
{
   return strtolower(str_replace(" ","-",$string));
}

function generateUuid()
{
   return Illuminate\Support\Str::uuid();
}