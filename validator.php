<?php
// Validator.php
class Validator {
    private $errors = [];

    public function validateEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "El formato del correo es inválido.";
        }
    }

    public function validatePassword($password) {
        if (strlen($password) < 8) {
            $this->errors[] = "La contraseña debe tener al menos 8 caracteres.";
        }
    }

    public function validateHuman($captchaResponse, $expectedValue) {
        if ($captchaResponse != $expectedValue) {
            $this->errors[] = "Validación humana fallida. La respuesta matemática es incorrecta.";
        }
    }

    public function getErrors() {
        return $this->errors;
    }

    public function isValid() {
        return empty($this->errors);
    }
}
?>