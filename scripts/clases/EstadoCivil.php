<?php

enum EstadoCivil: int {
    case soltero = 10;
    case pareja = 20;
    case casado = 30;
    case viudo = 40;

    public function descripcion(): string {
        return match($this) {
            self::soltero => 'soltero',
            self::pareja => 'pareja',
            self::casado => 'casado',
            self::viudo => 'viudo',
        };
    }

   public function valor(): string {
        return match($this) {
            self::soltero => value,
            self::pareja => value,
            self::casado => value,
            self::viudo => value,
        };
    }

   public static function casos(): array {
        return self::cases();
    }

}
