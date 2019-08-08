<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*ROLES*/
        DB::table('roles')->insert([
            'name' => 'Empleado',
            'description' => 'Eos laboriosam molestiae totam modi.',
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'Eos laboriosam molestiae totam modi.',
        ]);
        /*USURS*/
        DB::table('users')->insert([
            'name' => 'Jose Jaico',
            'email' => 'jaico3456789@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '1' 
        ]);
        DB::table('users')->insert([
            'name' => 'Jean Chunga',
            'email' => 'Chunga123456@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '1' 
        ]);
        DB::table('users')->insert([
            'name' => 'Milagros Azaña',
            'email' => 'Milagros123456@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '1' 
        ]);
        DB::table('users')->insert([
            'name' => 'Silva Rojas Antoni',
            'email' => 'Silva123456@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '1' 
        ]);
        DB::table('users')->insert([
            'name' => 'Bermudez Mejia',
            'email' => 'Bermudez@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '1' 
        ]);
        DB::table('users')->insert([
            'name' => 'Paucar Jean Paulo',
            'email' => 'Paucar123456@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '2' 
        ]);

        /*PREGUNTAS*/
        DB::table('pregunta')->insert([
            'detalle' => 'Entiende las funciones y responsabilidades del puesto. ?',
        ]);

        DB::table('pregunta')->insert([
            'detalle' => 'Usted requiere una supervisión mínima ',
        ]);

        DB::table('pregunta')->insert([
            'detalle' => 'Usted trabaja de forma organizada .',
        ]);

        DB::table('pregunta')->insert([
            'detalle' => 'En situaciones complicadas es capaz de identificar problemas .',
        ]);

        DB::table('pregunta')->insert([
            'detalle' => 'Es capaz de solucionar problemas .',
        ]);

        DB::table('pregunta')->insert([
            'detalle' => 'Reacciona rápidamente ante las dificultades .',
        ]);

        DB::table('pregunta')->insert([
            'detalle' => 'Usted cree logra consiguir los objetivos de la Fiscalia .',
        ]);

        DB::table('pregunta')->insert([
            'detalle' => 'El algunas situaciones puede manejar varios proyectos a la vez .',
        ]);

        DB::table('pregunta')->insert([
            'detalle' => 'A logrado consiguir los estándares de productividad .',
        ]);
        
        DB::table('pregunta')->insert([
            'detalle' => 'Sabe trabajar en equipo para conseguir los objetivos esperados.',
        ]);
        
        DB::table('pregunta')->insert([
            'detalle' => 'A la misma vez ayuda a su equipo .',
        ]);
        
        DB::table('pregunta')->insert([
            'detalle' => 'Logra usted trabajar bien con diferentes tipos de persona .',
        ]);
                
        DB::table('pregunta')->insert([
            'detalle' => 'Logra usted participar en conversaciones de grupo . ',
        ]);
                
        DB::table('pregunta')->insert([
            'detalle' => 'Logra usted participar en las reuniones .',
        ]);
                
        DB::table('pregunta')->insert([
            'detalle' => 'Logra usted explicar de forma clara y fácil de entender .',
        ]);
                
        DB::table('pregunta')->insert([
            'detalle' => 'Logra usted saber escuchar a los demas miembros del equipo .',
        ]);
                
        DB::table('pregunta')->insert([
            'detalle' => 'Logra usted exponer sus ideas de forma eficaz .',
        ]);
                
        DB::table('pregunta')->insert([
            'detalle' => 'Logra usted transmitir bien los objetivos a los integrantes de su equipo . ',
        ]);
                
        DB::table('pregunta')->insert([
            'detalle' => 'Comunica a todos en su área el éxito en el cumplimiento de objetivos .',
        ]);
                
        DB::table('pregunta')->insert([
            'detalle' => 'En algunas situaciones a demuestrado dotes de liderazgo .',
        ]);
                
        DB::table('pregunta')->insert([
            'detalle' => 'Motiva a su equipo para conseguir los objetivos .',
        ]);
        //comienza las preguntas de la demo        
        DB::table('pregunta')->insert([
            'detalle' => 'Posee capacidad para trabajar de acuerdo a los valores morales y prácticas profesionales respetando las políticas organizacionales.',
        ]);
                        
        DB::table('pregunta')->insert([
            'detalle' => 'Tiene actitud para reconocer los intereses y sentimientos de los demás ofreciéndoles un trato digno, honesto y tolerante y lograrlo, al mismo tiempo, para sí mismo.',
        ]);
                        
        DB::table('pregunta')->insert([
            'detalle' => 'Posee la habilidad para asimilar rápidamente los cambios del entorno (oportunidades y amenazas), y para identificar las características propias de la organización (debilidades y fortalezas)',
        ]);
                        
        DB::table('pregunta')->insert([
            'detalle' => 'Posee la capacidad y voluntad de orientar los propios intereses y comportamientos hacia las necesidades, prioridades y objetivos de la organización.',
        ]);
                        
        DB::table('pregunta')->insert([
            'detalle' => 'Posee la disposición para realizar el trabajo en base al conocimiento de las necesidades y expectativas de los clientes, actuales y potenciales, internos o externos.',
        ]);
        
        /*ENCUESTA*/
        DB::table('encuesta')->insert([
            'descripcion' => 'Conocimiento del puesto',
        ]);

        DB::table('encuesta')->insert([
            'descripcion' => 'Planificación y resolución',
        ]);

        DB::table('encuesta')->insert([
            'descripcion' => 'Productividad',
        ]);

        DB::table('encuesta')->insert([
            'descripcion' => 'Trabajo en equipo',
        ]);

        DB::table('encuesta')->insert([
            'descripcion' => 'Habilidades de comunicación',
        ]);

        DB::table('encuesta')->insert([
            'descripcion' => 'Habilidades de dirección',
        ]);

        DB::table('encuesta')->insert([
            'descripcion' => 'Competencias Estrategicas',
        ]);

        DB::table('encuesta')->insert([
            'descripcion' => 'Valores de la organizacion',
        ]);
        /*DETALLE ENCUESTA*/
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '1',
            'pregunta_id' => '1'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '1',
            'pregunta_id' => '2'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '2',
            'pregunta_id' => '3'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '2',
            'pregunta_id' => '4'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '2',
            'pregunta_id' => '5'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '2',
            'pregunta_id' => '6'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '2',
            'pregunta_id' => '7'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '3',
            'pregunta_id' => '8'
        ]);
        
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '3',
            'pregunta_id' => '9'
        ]);
        
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '3',
            'pregunta_id' => '10'
        ]);
        
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '4',
            'pregunta_id' => '11'
        ]);
        
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '4',
            'pregunta_id' => '12'
        ]);
        
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '4',
            'pregunta_id' => '13'
        ]);
        
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '4',
            'pregunta_id' => '14'
        ]);
        
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '5',
            'pregunta_id' => '15'
        ]);
        
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '5',
            'pregunta_id' => '16'
        ]);
        
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '5',
            'pregunta_id' => '17'
        ]);
        
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '5',
            'pregunta_id' => '18'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '6',
            'pregunta_id' => '19'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '6',
            'pregunta_id' => '20'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '6',
            'pregunta_id' => '21'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '8',
            'pregunta_id' => '22'
        ]);


        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '8',
            'pregunta_id' => '23'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '7',
            'pregunta_id' => '24'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '7',
            'pregunta_id' => '25'
        ]);
        DB::table('detalle_encuesta')->insert([
            'encuesta_id' => '7',
            'pregunta_id' => '26'
        ]);
        // DB::table('detalle_encuesta')->insert([
        //     'encuesta_id' => '8',
        //     'pregunta_id' => '27'
        // ]);
        /*ALTERNATIVAS*/
        DB::table('alternativa')->insert([
            'alternativa' => 'Siempre',
        ]);
         DB::table('alternativa')->insert([
            'alternativa' => 'Casi Siempre',
        ]);
        DB::table('alternativa')->insert([
            'alternativa' => 'A veces',
        ]);
        DB::table('alternativa')->insert([
            'alternativa' => 'Casi Nunca',
        ]);
        DB::table('alternativa')->insert([
            'alternativa' => 'Nunca',
        ]);
        /*DETALLE ALETERNTIVA*/
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '1',
            'encuesta_id' => '1'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '2',
            'encuesta_id' => '1'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '3',
            'encuesta_id' => '1'
        ]);
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '4',
            'encuesta_id' => '1'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '5',
            'encuesta_id' => '1'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '1',
            'encuesta_id' => '2'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '2',
            'encuesta_id' => '2'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '3',
            'encuesta_id' => '2'
        ]);
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '4',
            'encuesta_id' => '2'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '5',
            'encuesta_id' => '2'
        ]);

        /**/
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '1',
            'encuesta_id' => '3'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '2',
            'encuesta_id' => '3'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '3',
            'encuesta_id' => '3'
        ]);
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '4',
            'encuesta_id' => '3'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '5',
            'encuesta_id' => '3'
        ]);

        /**/
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '1',
            'encuesta_id' => '4'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '2',
            'encuesta_id' => '4'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '3',
            'encuesta_id' => '4'
        ]);
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '4',
            'encuesta_id' => '4'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '5',
            'encuesta_id' => '4'
        ]);

        /**/
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '1',
            'encuesta_id' => '5'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '2',
            'encuesta_id' => '5'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '3',
            'encuesta_id' => '5'
        ]);
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '4',
            'encuesta_id' => '5'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '5',
            'encuesta_id' => '5'
        ]);

        /**/
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '1',
            'encuesta_id' => '6'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '2',
            'encuesta_id' => '6'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '3',
            'encuesta_id' => '6'
        ]);
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '4',
            'encuesta_id' => '6'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '5',
            'encuesta_id' => '6'
        ]);

        /**/
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '1',
            'encuesta_id' => '7'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '2',
            'encuesta_id' => '7'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '3',
            'encuesta_id' => '7'
        ]);
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '4',
            'encuesta_id' => '7'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '5',
            'encuesta_id' => '7'
        ]);
        /**/
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '1',
            'encuesta_id' => '8'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '2',
            'encuesta_id' => '8'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '3',
            'encuesta_id' => '8'
        ]);
        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '4',
            'encuesta_id' => '8'
        ]);

        DB::table('detalle_alternativa')->insert([
            'alternativa_id' => '5',
            'encuesta_id' => '8'
        ]);
    }
}
