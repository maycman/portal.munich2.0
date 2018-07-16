<?php

use Illuminate\Database\Seeder;
use App\Pregunta;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preguntas = [
        	['pregunta'=>'1. Califique su experiencia de servicio en general en la concesionaria Volkswagen Munich Automotriz.', 'origen'=>'servicio'],
        	['pregunta'=>'2. ¿Qué tan satisfecho está con su Asesor de Servicio?', 'origen'=>'servicio'],
        	['pregunta'=>'2a. La cortesía, responsabilidad y honestidad por parte de nuestro asesor de servicio.', 'origen'=>'servicio'],
        	['pregunta'=>'2b. Revisión de los componentes del vehículo (por ej. gomas de los limpiaparabrisas, pastillas de frenos, etc.) y explicación de los trabajos a realizar frente al vehículo durante la recepción', 'origen'=>'servicio'],
        	['pregunta'=>'2c. Mantenerlo informado del avance del trabajo de servicio.', 'origen'=>'servicio'],
        	['pregunta'=>'2d. La condición del vehículo en la entrega (Por ej. limpio, sin daños, controles y posiciones sin cambios).', 'origen'=>'servicio'],
        	['pregunta'=>'2e. La explicación de los trabajos realizados.', 'origen'=>'servicio'],
        	['pregunta'=>'2f. Explicación de la factura y lo justo del cobro.', 'origen'=>'servicio'],
        	['pregunta'=>'3. ¿Se completo todo el trabajo la primera vez?', 'origen'=>'servicio'],
        	['pregunta'=>'a) Disponibilidad de refacciones', 'origen'=>'servicio'],
        	['pregunta'=>'b) No se pudo encontrar el problema.', 'origen'=>'servicio'],
        	['pregunta'=>'c) Se volvió a presentar la falla.', 'origen'=>'servicio'],
        	['pregunta'=>'d) No se realizarón todos los trabajos o se realizarón parcialmente.', 'origen'=>'servicio'],
        	['pregunta'=>'e) El taller causó un nuevo problema.', 'origen'=>'servicio'],
        	['pregunta'=>'f) El taller negó que hubiera un problema/Afirmó que era normal.', 'origen'=>'servicio'],
        	['pregunta'=>'g) El taller estaba demaciado ocupado para terminar todo el trabajo necesario.', 'origen'=>'servicio'],
        	['pregunta'=>'h) Otro.', 'origen'=>'servicio'],
        	['pregunta'=>'4. ¿Qué tan satisfecho está con el tiempo transcurrido para que el servicio fuera completado?', 'origen'=>'servicio'],
        	['pregunta'=>'4a. Facilidad y disponibilidad para agendar cita.', 'origen'=>'servicio'],
        	['pregunta'=>'4b. Tiempo en la recepción de su vehículo.', 'origen'=>'servicio'],
        	['pregunta'=>'4c. Tiempo en la entrega de su vehículo.', 'origen'=>'servicio'],
        	['pregunta'=>'4d. Tiempo total requerido para completar el servicio de su vehículo.', 'origen'=>'servicio'],
        	['pregunta'=>'5. ¿Cuál es su nivel de satisfacción con las instalaciones de la concesionaria y amenidades ofrecidas?', 'origen'=>'servicio'],
        	['pregunta'=>'5a. Facilidad para entrar y salir.', 'origen'=>'servicio'],
        	['pregunta'=>'5b. Limpieza de la concesionaria.', 'origen'=>'servicio'],
        	['pregunta'=>'5c. Comodidad en el área de espera.', 'origen'=>'servicio'],
        	['pregunta'=>'5d. Amenidades ofrecidas por la concesionaria (por ej. Bebidas, wifi, snacks, revistas, etc).', 'origen'=>'servicio'],
        	['pregunta'=>'6. ¿Qué tan satisfecho está con la calidad del auto?', 'origen'=>'servicio'],
        	['pregunta'=>'6a. ¿Por qué?', 'origen'=>'servicio'],
        	['pregunta'=>'7. ¿Qué probabilidad hay de que su próxima reparación o servicio sea en esta misma concesionaria?', 'origen'=>'servicio'],
        	['pregunta'=>'Comentarios', 'origen'=>'servicio']
        ];

        foreach ($preguntas as $key => $value) {
             Pregunta::savePregunta($value);
        }
    }
}