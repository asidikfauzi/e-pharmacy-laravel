<?php
    
    namespace App\Helper;
    
    use Ramsey\Uuid\Uuid;
    
    class Storage
    {
        public static function createNameForImage($ext)
        {
            return Uuid::uuid6()->toString().".".$ext;
        }
        
        public static function uploadImageProduct($fileImage)
        {
            $ext = $fileImage->getClientOriginalExtension();
            $name = self::createNameForImage($ext);
            $fileImage->move(base_path("public/assets/images/product"), $name);
            
            return $name;
        }
        
        public static function uploadImageUser($fileImage)
        {
            $ext = $fileImage->getClientOriginalExtension();
            $name = self::createNameForImage($ext);
            $fileImage->move(base_path("public/assets/images/user"), $name);
            
            return $name;
        }
        
        public static function uploadImageBuktiTF($fileImage)
        {
            $ext = $fileImage->getClientOriginalExtension();
            $name = self::createNameForImage($ext);
            $fileImage->move(base_path("public/assets/images/bukti-transfer"), $name);
            
            return $name;
        }
        
        public static function getImageProduct($imageName)
        {
            return "/assets/images/product/" . $imageName;
        }
        
        public static function getImageUser($imageName)
        {
            return "/assets/images/user/" . $imageName;
        }
        
        public static function getImageBuktiTF($imageName)
        {
            return "/assets/images/bukti-transfer/" . $imageName;
        }
        
    }
