<?php

namespace App\DataFixtures;

use App\Entity\Employees;
use App\Entity\Departments;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Employee extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        //Depto Ama de Llaves

        

        $employee = new Employees();
        $employee->setDepartment(3);
        $employee->setName('Maria Esther');
        $employee->setLasname('Acosta Diaz');
        $employee->persist($employee);

        $employee1 = new Employees();
        $employee1->setDepartment(3);
        $employee1->setName('Marlén');
        $employee1->setLasname('Veitía Acosta');
        $employee1->persist($employee1);

        $employee2 = new Employees();
        $employee2->setDepartment(3);
        $employee2->setName('Maypu');
        $employee2->setLasname('Rodriguez Rodriguez');
        $employee2->persist($employee2);

        $employee3 = new Employees();
        $employee3->setDepartment(3);
        $employee3->setName('Yudelkis');
        $employee3->setLasname('Hernández Montelier');
        $employee3->persist($employee3);

        $employee4 = new Employees();
        $employee4->setDepartment(3);
        $employee4->setName('Ania');
        $employee4->setLasname('Leal Muñoz');
        $employee4->persist($employee4);

        $employee5 = new Employees();
        $employee5->setDepartment(3);
        $employee5->setName('Marta Beatriz');
        $employee5->setLasname('Sarduy');
        $employee5->persist($employee5);

        $employee6 = new Employees();
        $employee6->setDepartment(3);
        $employee6->setName('Nurmis');
        $employee6->setLasname('Días Reyes');
        $employee6->persist($employee6);

        $employee7 = new Employees();
        $employee7->setDepartment(3);
        $employee7->setName('Yudaimis');
        $employee7->setLasname('Rdguez Beovides');
        $employee7->persist($employee7);

        //Fin de Ama de llaves
        //Comienza Bar Piscina

        $employee8 = new Employees();
        $employee8->setDepartment(4);
        $employee8->setName('Nelson');
        $employee8->setLasname('Betancourt Bravo');
        $employee8->persist($employee8);

        $employee9 = new Employees();
        $employee9->setDepartment(4);
        $employee9->setName('Jose Rolando');
        $employee9->setLasname('Portal Rodriguez');
        $employee9->persist($employee9);

        $employee10 = new Employees();
        $employee10->setDepartment(4);
        $employee10->setName('Giuseppe');
        $employee10->setLasname('Ramirez Rdguez');
        $employee10->persist($employee10);

        $employee11 = new Employees();
        $employee11->setDepartment(4);
        $employee11->setName('Rafael');
        $employee11->setLasname('Perez Vizcaino');
        $employee11->persist($employee11);

        $employee->setDepartment(4);
        $employee->setName('Ernesto');
        $employee->setLasname('Arbolaez Delgado');

        $employee->setDepartment(4);
        $employee->setName('Rafael');
        $employee->setLasname('E Capiro');

        $employee->setDepartment(4);
        $employee->setName('Adrian');
        $employee->setLasname('Pereira');

        $employee->setDepartment(4);
        $employee->setName('Yusimi');
        $employee->setLasname('Bada del Sol');

        $employee->setDepartment(4);
        $employee->setName('Fidel');
        $employee->setLasname('Mario');

        //Fin de Bar Piscina
        //Comiensa Recepcion

        $employee->setDepartment(5);
        $employee->setName('Alexander');
        $employee->setLasname('Bombino Caballero');

        $employee->setDepartment(5);
        $employee->setName('Jorge');
        $employee->setLasname('Fleites Acosta');

        $employee->setDepartment(5);
        $employee->setName('Dalia');
        $employee->setLasname('Rodriguez Moreno');

        $employee->setDepartment(5);
        $employee->setName('Roque Antonio');
        $employee->setLasname('Arias Medina');

        $employee->setDepartment(5);
        $employee->setName('Elpidio');
        $employee->setLasname('Díaz Reyes');

        $employee->setDepartment(5);
        $employee->setName('Juan Carlos');
        $employee->setLasname('Ocañas Zayas');

        $employee->setDepartment(5);
        $employee->setName('Mullplpi');
        $employee->setLasname('Becerra Triana');

        $employee->setDepartment(5);
        $employee->setName('Pavel');
        $employee->setLasname('Jiménez Sarduy');

        $employee->setDepartment(5);
        $employee->setName('Victor');
        $employee->setLasname('Yera Vizcaino');

        $employee->setDepartment(5);
        $employee->setName('Arturo');
        $employee->setLasname('Blanco Morales');

        $employee->setDepartment(5);
        $employee->setName('Lisette');
        $employee->setLasname('Rdguez Sosa');

        $employee->setDepartment(5);
        $employee->setName('Henry');
        $employee->setLasname('León García');

        $employee->setDepartment(5);
        $employee->setName('Mildrey');
        $employee->setLasname('Días Gómez');

        $employee->setDepartment(5);
        $employee->setName('Fadia');
        $employee->setLasname('Torres Mtnez');

        //Fin de Recepcion
        //Comienzo Bar Restaurante

        $employee->setDepartment(6);
        $employee->setName('Alberto');
        $employee->setLasname('Cárdenas Aguiar');

        $employee->setDepartment(6);
        $employee->setName('Lordan');
        $employee->setLasname('García del Castillo');

        $employee->setDepartment(6);
        $employee->setName('Nancy');
        $employee->setLasname('Rdguez Alemán');

        $employee->setDepartment(6);
        $employee->setName('Zarahi');
        $employee->setLasname('Vega Rdguez');

        $employee->setDepartment(6);
        $employee->setName('Abel');
        $employee->setLasname('Lorenzo Cárdenas');

        $employee->setDepartment(6);
        $employee->setName('Raúl');
        $employee->setLasname('Yanes Marin');

        $employee->setDepartment(6);
        $employee->setName('Mailidis');
        $employee->setLasname('Villalobos Milian');

        $employee->setDepartment(6);
        $employee->setName('Jorge');
        $employee->setLasname('Alvarez García');

        $employee->setDepartment(6);
        $employee->setName('Yuleivys');
        $employee->setLasname('Juvier Díaz');

        $employee->setDepartment(6);
        $employee->setName('Yisell');
        $employee->setLasname('García Rivero');

        $employee->setDepartment(6);
        $employee->setName('Hector');
        $employee->setLasname('Jmnez Aguilera');

        $employee->setDepartment(6);
        $employee->setName('Sandra');
        $employee->setLasname('Ruíz Villavicencio');

        $employee->setDepartment(6);
        $employee->setName('Juan Carlos');
        $employee->setLasname('Sánchez Hdez');

        $employee->setDepartment(6);
        $employee->setName('Luís');
        $employee->setLasname('Ruíz Leal');

        $employee->setDepartment(6);
        $employee->setName('Alexis');
        $employee->setLasname('Alvarez Leal');

        $employee->setDepartment(6);
        $employee->setName('Marianela');
        $employee->setLasname('Díaz de Villegas');

        $employee->setDepartment(6);
        $employee->setName('Oscar');
        $employee->setLasname('Castillo Veitia');

        $employee->setDepartment(6);
        $employee->setName('Anabel');
        $employee->setLasname('Machado García');

        $employee->setDepartment(6);
        $employee->setName('Alejandro');
        $employee->setLasname('Castillo Veitia');

        $employee->setDepartment(6);
        $employee->setName('Mileidis');

        $employee->setDepartment(6);
        $employee->setName('Eliane');

        $employee->setDepartment(6);
        $employee->setName('Leyani');

        //Fin Bar Restaurante
        //Comienzo Restaurante

        $employee->setDepartment(7);
        $employee->setName('Adalberto Javier');
        $employee->setLasname('Suarez Morales');

        $employee->setDepartment(7);
        $employee->setName('Rolando');
        $employee->setLasname('Alvarez Salazar');

        $employee->setDepartment(7);
        $employee->setName('Isidro');
        $employee->setLasname('Ros Ribalta');

        $employee->setDepartment(7);
        $employee->setName('Luis');
        $employee->setLasname('Abel Cardenas');

        $employee->setDepartment(7);
        $employee->setName('Anabel');
        $employee->setLasname('Cuevas Esmori');

        $employee->setDepartment(7);
        $employee->setName('Maylin');
        $employee->setLasname('Cupul');

        $employee->setDepartment(7);
        $employee->setName('Yanira');
        $employee->setLasname('Borrallo Peralta');

        $employee->setDepartment(7);
        $employee->setName('Michel');
        $employee->setLasname('Castillo Mendoza');

        $employee->setDepartment(7);
        $employee->setName('David');

        $employee->setDepartment(7);
        $employee->setName('Jeniffer');
        
        $employee->setDepartment(7);
        $employee->setName('Bety');

        $employee->setDepartment(7);
        $employee->setName('Dayanis');
        $employee->setLasname('Pérez Pérez');

        $employee->setDepartment(7);
        $employee->setName('Yaimel');
        $employee->setLasname('Rdguez');

        $employee->setDepartment(7);
        $employee->setName('Isquel');
        $employee->setLasname('Glez');

        $employee->setDepartment(7);
        $employee->setName('Rogelio');
        $employee->setLasname('Rdguez Madrigal');

        $employee->setDepartment(7);
        $employee->setName('Eliane');
        $employee->setLasname('Marcelo Enrique');

        $employee->setDepartment(7);
        $employee->setName('Diana');
        $employee->setLasname('Martín Vega');

        $employee->setDepartment(7);
        $employee->setName('Annelis');
        $employee->setLasname('Fdez');

        $employee->setDepartment(7);
        $employee->setName('Leyanis');
        $employee->setLasname('Jmnez');

        $employee->setDepartment(7);
        $employee->setName('Rosio');

        //Fin del Restaurante
        //Comienzo de Sala de Fiestas

        $employee->setDepartment(8);
        $employee->setName('Pavel');
        $employee->setLasname('Alujas Bernal');

        //Fin de Sala de Fiestas     

        $manager->persist($employee);
        $manager->flush();
    }
}
