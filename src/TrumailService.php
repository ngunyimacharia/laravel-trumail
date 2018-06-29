<?php

namespace Mashytski\Trumail;

class TrumailService {
    /**
     * @param $email string   The email to be verified
     * @return \Mashytski\Trumail\Validator
     */
    public function validate($email)
    {
        $validator = new Validator();

        return $validator->validate($email);
    }
}
