<?php
class Validator
{
    public function validate($card_number)
    {
        $sum = 0;
        $len = strlen($card_number);
        $issuer = $this->issuer($card_number);
        
        for ($i = 0; $i < $len; $i++) {
            $digit = $card_number[$len - 1 - $i];
            
            if ($i % 2 !== 0) {
                $digit *= 2;
                
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            
            $sum += $digit;
        }
        
        if ($sum % 10 === 0) {
            return "Valid " . $issuer;
        } else {
            return "Invalid";
        }
    }
    
    public function issuer($card_number)
    {
        $visa_regex = '/^(4[0-9]{12}(?:[0-9]{3})?)$/';
        $mastercard_regex = '/^(5[1-5][0-9]{14})$/';
        
        if (preg_match($mastercard_regex, $card_number)) {
            return "MasterCard";
        } elseif (preg_match($visa_regex, $card_number)) {
            return "Visa";
        } else {
            return "Not defined issuer";
        }
    }
}

if (isset($_POST['card_number'])) {
    $validator = new Validator();
    $card_number = $_POST['card_number'];
    echo $validator->validate($card_number);
}
?>
