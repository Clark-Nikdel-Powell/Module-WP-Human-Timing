<?php
/**
 * Take a timestamp and turn it in to human timing.
 *
 * @since 0.1.0
 *
 * @param  timestamp $time      To output, or not to output. Set to 0 if using URL-query.
 * @return string Human readable time (i.e.: 3 weeks)
 */
function cnp_human_timing ($time) {

  $current_time = current_time('timestamp');
  $time = $current_time - $time; // to get the time since that moment

  $tokens = array (
      31536000 => 'year',
      2592000 => 'month',
      604800 => 'week',
      86400 => 'day',
      3600 => 'hour',
      60 => 'minute',
      1 => 'second'
  );

  foreach ($tokens as $unit => $text) {
    if ($time < $unit) continue;
    $numberOfUnits = floor($time / $unit);
    return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
  }

}
