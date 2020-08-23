<?php


  function renameFile($len = 10 ){
    $word = '';
      $word = array_merge(range('a', 'z'), range('A', 'Z'));
       shuffle($word);
       return substr(implode($word), 0, $len);
    }

    function renamePersons( $isEmailReturn = 0 ,$fullData = 0){
    $firstName = array(
        "mina","ahmed",'saad','mariam',"mohamed",'Andrew',"sharl","Farida",'Fahd',"Mas30d","amir" , 'samy',
        "mohsen","Menna",'Rola','hala',"Martin",'john',"ashraf","sayed",'salah',"rateb","anton" , 'tony',
        "mohsen","Menna",'Rola','hala',"Martin",'john',"Labib","Mahmoud",'samer',"kzamel","bhaa" , 'soltan',
        "basant","malak",'magdy','ramy',"reham",'rahim',"abdelrahman","abdullah",'hussein',"hassan","hossam" , 'waleed',
        "basem","emad",'salamy','rafik',"david",'henry',"hayam","slama",'salma',"gorge","ossama" , 'helmy',
    );
    $lastName = array(
        "mina","ahmed",'saad','mariam',"mohamed",'Andrew',"sharl",'Fahd',"Mas30d","amir" , 'samy',
        "mohsen","Martin",'john',"ashraf","sayed",'salah',"rateb","anton" , 'tony',
        "mohsen","Martin",'john',"Labib","Mahmoud",'samer',"kzamel","bhaa" , 'soltan',
        "basant","malak",'magdy','ramy',"reham",'rahim',"abdelrahman","abdullah",'hussein',"hassan","hossam" , 'waleed',
        "basem","emad",'salamy','rafik',"david",'henry',"hayam","slama",'salma',"gorge","ossama" , 'helmy',
    );

    $firstNameCOunt = rand(0 , count($firstName)-1);
    $lastNameCOunt = rand(0 , count($lastName)-1);

        if($fullData == "1"){
            return [
                "email" => $firstName[$firstNameCOunt] ."." . $lastName[$lastNameCOunt].rand(000000,99999).rand(000000,99999)."@gmail.com",
                "name" => $firstName[$firstNameCOunt] ."   " . $lastName[$lastNameCOunt]
            ];
        }else{

            if($isEmailReturn == "1"){
                return ($firstName[$firstNameCOunt] ."." . $lastName[$lastNameCOunt].rand(000000,99999)."@gmail.com");
            }else{
                return ($firstName[$firstNameCOunt] ."   " . $lastName[$lastNameCOunt]);
            }
        }
    }