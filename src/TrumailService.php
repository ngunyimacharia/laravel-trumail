<?php

namespace Mashytski\Trumail;

class TrumailService {
    /**
     * @param $email string   The email to be verified
     * @return \Mashytski\Trumail\Validator
     */
    public function validate($email = "email@example.com")
    {
        $validator = new Validator();

        return $validator->validate();
    }
}
