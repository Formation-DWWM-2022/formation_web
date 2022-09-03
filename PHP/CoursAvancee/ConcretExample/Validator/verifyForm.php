<?php

function checkForm($data): array
{
    var_dump('ok');
    $tab_valid = [
        "nom" => "#^[A-Za-z -]*$#",
        "prenom" => "#^[A-Za-z -]*$#",
        "CP" => "#^[0-9]{5}$#",
        "naissance" => "#(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)#",
        "banque" => "#^BE[0-9]{2}( ?[0-9]{4}){3}$#",
        "id" => "#^[a-zA-Z0-9]+$#",
        "password" => "#^(?=.{8,})(?=.*[a-z])(?=.*[A-Z]).*$#",
        "email" => "#^[a-zA-Z-\.]+@([a-zA-Z-]+\.)+[a-zA-Z-]{2,4}$#",
    ];

    $tab_result = [];
    foreach ($data as $data_key => $data_value) {
        if($data_value != null and $data_value != ''){
            if (preg_match($tab_valid[$data_key], $data_value)) {
                $tab_result[$data_key] = array("valide" => 1, "message" => "le champ $data_key est valide");
                addMessage("success", "le champ $data_key est valide");
            } else {
                $tab_result[$data_key] = array("valide" => 0, "message" => "le champ $data_key n'est pas valide");
                addMessage("danger", "le champ $data_key n'est pas valide");
            }
        } else {
            $tab_result[$data_key] = array("valide" => 0, "message" => "le champ $data_key n'est pas valide");
            addMessage("danger", "le champ $data_key n'est pas valide");
        }
    }

    foreach ($tab_result as $tab_result_value) {
        if (in_array(0, $tab_result_value, true)) {
            $tab_result["valide"] = 0;
            break;
        } else {
            $tab_result["valide"] = 1;
        }
    }

    return $tab_result;
}
