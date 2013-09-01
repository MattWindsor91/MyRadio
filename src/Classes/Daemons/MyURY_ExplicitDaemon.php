<?php

/**
 * This file provides the MyURY_ExplicitDaemon class for MyURY
 * @package MyURY_Daemon
 */

/**
 * The Explicit Daemon asks iTunes if a Track is Explicit.
 *
 * @author Lloyd Wallis <lpw@ury.org.uk>
 * @version 20130711
 * @package MyURY_Daemon
 */
class MyURY_ExplicitDaemon extends MyURY_Daemon {

  /**
   * If this method returns true, the Daemon host should run this Daemon. If it returns false, it must not.
   * It is currently enabled because we have a lot of labels that needed filling in for Tracklisting.
   * @return boolean
   */
  public static function isEnabled() {
    return Config::$d_Explicit_enabled;
  }

  static function run() {
    $tracks = MyURY_Track::findByOptions(['clean' => 'u', 'limit' => 50, 'random' => true]);

    foreach ($tracks as $track) {
      $q = str_replace(' ', '+', $track->getTitle() . ' ' . $track->getArtist());
      $data = json_decode(
              file_get_contents('http://itunes.apple.com/search?term='
                      . $q . '&entity=song&limit=5'), true);

      for ($i = 0; $i < $data['resultCount']; $i++) {
        /**
         * explicit (explicit lyrics, possibly explicit album cover), cleaned
         * (explicit lyrics "bleeped out"), notExplicit (no explicit lyrics)
         */
        if ($data['results'][$i]['trackName'] == $track->getTitle() && 
                $data['results'][$i]['artistName'] == $track->getArtist()) {
          
          $clean = $data['results'][$i]['trackExplicitness'] == 'explicit'
                  ? 'n' : 'y';
          $track->setClean($clean);
          
          dlog($track->getTitle() . ' (' . $track->getAlbum()->getID()
            . '/' . $track->getID() . ') is ' . $clean, 2);
          break;
        }
      }
    }
  }

}