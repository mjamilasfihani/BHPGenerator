<?php
namespace BHPGenerator;

class Generate
{
  
  /**
   *
   */
  const BHP_VERSION = '1.0';
  
  /**
   *
   */
  public static function default(string $name = '', array $data = [], array $optional = [])
  {
    return view($name, $data, $optional);
  }

}
