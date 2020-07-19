<?php


class ExampleTest extends FeatureTestCase
{


    /**
     *
     Una vez que la prueba termine de ejecutarse (pase o falle) nosotros queremos eliminar el usuario y el post,
    de manera que cuando ejecutemos la prueba nuevamente no obtengamos un error inesperado como por ejemplo que el usuario ya existe.

    Hay dos formas de lograr esto, usando uno de los 2 traits que Laravel nos provee para el desarrollo de pruebas:

    Illuminate\Foundation\Testing\DatabaseMigrations con el cual se ejecutará nuevamente todas las migraciones
    con migrate:refresh cada vez que se inicie un método de una prueba
    Illuminate\Foundation\Testing\DatabaseTransactions que hace uso de transacciones de base de tatos para eliminar los datos creados por la prueba,
    al finalizar ésta. Por supuesto, ésta es la opción más rápida.
     */
    /**
     * A basic functional test example.
     *
     * @return void
     */
    function test_basic_example()
    {
        //=== TODO usuario
        $user = factory(App\User::class)->create([
            'name' => 'chubby ',
            'email' => 'chubby@gmail.com ',
        ]);

        //== TODO auth user
        $this->actingAs($user, 'api');

        $this->visit('api/user')
             ->see('chubby ')
             ->see('chubby@gmail.com ');
    }
}
