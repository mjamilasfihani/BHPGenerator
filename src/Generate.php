<?php namespace BHPGenerator;

class Generate
{
  
  /**
   * echo Generate::BHP_VERSION;
   *
   */
  const BHP_VERSION = '1.0';

  /**
   * echo Generate::default($name, $data, $optional);
   *
   */
  public static function default(string $name = '', array $data = [], array $optional = [])
  {
    return view($name, $data, $optional);
  }

}