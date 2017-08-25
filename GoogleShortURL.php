<?php

class GoogleShortURL {

  protected static $key;

  /**
  * set api key
  */
  public static function construct() {
    self::setKey("your-google-key");
  }

  /**
  * your script will call this function,
  * passing only the long url you want to shorten
  */
  public static function generate($long_url) {
    self::construct();
    return self::googlePost($long_url);
  }

  /**
  * post to google api
  */
  private static function googlePost($long_url) {
    $ch = curl_init(self::generateGoogleURL());
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_HEADER, false);
    curl_setopt($ch,CURLOPT_POSTFIELDS, self::generateRequest($long_url));
    curl_setopt($ch,CURLOPT_HTTPHEADER,array("Content-Type: application/json"));

    $response = json_decode(curl_exec($ch));

    return $response->id;
  }

  /**
  * generate request
  */
  private static function generateRequest($long_url) {
    return json_encode([
      'longUrl' => $long_url
    ]);
  }

  /**
  * create google post url
  */
  private static function generateGoogleURL() {
    return "https://www.googleapis.com/urlshortener/v1/url?key=".self::$key;
  }

  /**
  * set google api key
  */
  protected static function setKey($google_key) {
    self::$key = $google_key;
  }

}
