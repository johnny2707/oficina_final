<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use DateTime;
use FontLib\Table\Type\name;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $clients = [
            [
                'client_code'       => '10001',
                'client_name'       => 'António Silva',
                'client_nif'        => '123456789',
                'client_address'    => 'Rua da Liberdade, 10',
                'client_city'       => 'Lisboa',
                'client_post_code'  => '1250-123',
                'client_county'     => 'Lisboa',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-03-01'
            ],
            [
                'client_code'       => '10002',
                'client_name'       => 'Maria Santos',
                'client_nif'        => '234567890',
                'client_address'    => 'Avenida da República, 25',
                'client_city'       => 'Porto',
                'client_post_code'  => '4050-234',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-03-05'
            ],
            [
                'client_code'       => '10003',
                'client_name'       => 'João Ferreira',
                'client_nif'        => '345678901',
                'client_address'    => 'Praça do Comércio, 5',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-345',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-03-10'
            ],
            [
                'client_code'       => '10004',
                'client_name'       => 'Ana Rodrigues',
                'client_nif'        => '456789012',
                'client_address'    => 'Rua das Flores, 15',
                'client_city'       => 'Braga',
                'client_post_code'  => '4700-456',
                'client_county'     => 'Braga',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-03-15'
            ],
            [
                'client_code'       => '10005',
                'client_name'       => 'Manuel Martins',
                'client_nif'        => '567890123',
                'client_address'    => 'Avenida Central, 30',
                'client_city'       => 'Faro',
                'client_post_code'  => '8000-567',
                'client_county'     => 'Faro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-03-20'
            ],
            [
                'client_code'       => '10006',
                'client_name'       => 'Sofia Oliveira',
                'client_nif'        => '678901234',
                'client_address'    => 'Rua da Sé, 8',
                'client_city'       => 'Évora',
                'client_post_code'  => '7000-678',
                'client_county'     => 'Évora',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-03-25'
            ],
            [
                'client_code'       => '10007',
                'client_name'       => 'Rui Costa',
                'client_nif'        => '789012345',
                'client_address'    => 'Largo do Rossio, 12',
                'client_city'       => 'Setúbal',
                'client_post_code'  => '2900-789',
                'client_county'     => 'Setúbal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-03-30'
            ],
            [
                'client_code'       => '10008',
                'client_name'       => 'Carla Sousa',
                'client_nif'        => '890123456',
                'client_address'    => 'Rua Direita, 20',
                'client_city'       => 'Viseu',
                'client_post_code'  => '3500-890',
                'client_county'     => 'Viseu',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-04-04'
            ],
            [
                'client_code'       => '10009',
                'client_name'       => 'Pedro Almeida',
                'client_nif'        => '901234567',
                'client_address'    => 'Avenida do Mar, 40',
                'client_city'       => 'Funchal',
                'client_post_code'  => '9000-901',
                'client_county'     => 'Funchal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-04-09'
            ],
            [
                'client_code'       => '10010',
                'client_name'       => 'Inês Pereira',
                'client_nif'        => '012345678',
                'client_address'    => 'Rua Nova, 7',
                'client_city'       => 'Guimarães',
                'client_post_code'  => '4800-012',
                'client_county'     => 'Guimarães',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-04-14'
            ],
            [
                'client_code'       => '10011',
                'client_name'       => 'Miguel Fernandes',
                'client_nif'        => '123456780',
                'client_address'    => 'Praça da Liberdade, 3',
                'client_city'       => 'Aveiro',
                'client_post_code'  => '3800-123',
                'client_county'     => 'Aveiro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-04-19'
            ],
            [
                'client_code'       => '10012',
                'client_name'       => 'Catarina Gomes',
                'client_nif'        => '234567891',
                'client_address'    => 'Rua dos Clérigos, 22',
                'client_city'       => 'Porto',
                'client_post_code'  => '4050-234',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-04-24'
            ],
            [
                'client_code'       => '10013',
                'client_name'       => 'Diogo Marques',
                'client_nif'        => '345678902',
                'client_address'    => 'Avenida da Boavista, 100',
                'client_city'       => 'Porto',
                'client_post_code'  => '4050-345',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-04-29'
            ],
            [
                'client_code'       => '10014',
                'client_name'       => 'Beatriz Ribeiro',
                'client_nif'        => '456789013',
                'client_address'    => 'Rua Augusta, 50',
                'client_city'       => 'Lisboa',
                'client_post_code'  => '1100-456',
                'client_county'     => 'Lisboa',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-05-04'
            ],
            [
                'client_code'       => '10015',
                'client_name'       => 'Tiago Pinto',
                'client_nif'        => '567890124',
                'client_address'    => 'Largo do Carmo, 6',
                'client_city'       => 'Lisboa',
                'client_post_code'  => '1200-567',
                'client_county'     => 'Lisboa',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-05-09'
            ],
            [
                'client_code'       => '10016',
                'client_name'       => 'Mariana Lopes',
                'client_nif'        => '678901235',
                'client_address'    => 'Rua de Santa Catarina, 35',
                'client_city'       => 'Porto',
                'client_post_code'  => '4000-678',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-05-14'
            ],
            [
                'client_code'       => '10017',
                'client_name'       => 'André Carvalho',
                'client_nif'        => '789012346',
                'client_address'    => 'Avenida dos Aliados, 80',
                'client_city'       => 'Porto',
                'client_post_code'  => '4000-789',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-05-19'
            ],
            [
                'client_code'       => '10018',
                'client_name'       => 'Francisca Nunes',
                'client_nif'        => '890123457',
                'client_address'    => 'Rua do Ouro, 28',
                'client_city'       => 'Lisboa',
                'client_post_code'  => '1100-890',
                'client_county'     => 'Lisboa',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-05-24'
            ],
            [
                'client_code'       => '10019',
                'client_name'       => 'Gonçalo Matos',
                'client_nif'        => '901234568',
                'client_address'    => 'Praça do Giraldo, 9',
                'client_city'       => 'Évora',
                'client_post_code'  => '7000-901',
                'client_county'     => 'Évora',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-05-29'
            ],
            [
                'client_code'       => '10020',
                'client_name'       => 'Carolina Fonseca',
                'client_nif'        => '012345679',
                'client_address'    => 'Rua Ferreira Borges, 17',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-012',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-06-03'
            ],
            [
                'client_code'       => '10021',
                'client_name'       => 'Ricardo Correia',
                'client_nif'        => '123456781',
                'client_address'    => 'Avenida Sá da Bandeira, 60',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-123',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-06-08'
            ],
            [
                'client_code'       => '10022',
                'client_name'       => 'Marta Dias',
                'client_nif'        => '234567892',
                'client_address'    => 'Rua da Sofia, 11',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-234',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-06-13'
            ],
            [
                'client_code'       => '10023',
                'client_name'       => 'Filipe Mendes',
                'client_nif'        => '345678903',
                'client_address'    => 'Largo da Portagem, 2',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-345',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-06-18'
            ],
            [
                'client_code'       => '10024',
                'client_name'       => 'Joana Teixeira',
                'client_nif'        => '456789014',
                'client_address'    => 'Rua do Souto, 45',
                'client_city'       => 'Braga',
                'client_post_code'  => '4700-456',
                'client_county'     => 'Braga',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-06-23'
            ],
            [
                'client_code'       => '10025',
                'client_name'       => 'Luís Moreira',
                'client_nif'        => '567890125',
                'client_address'    => 'Avenida Central, 70',
                'client_city'       => 'Braga',
                'client_post_code'  => '4700-567',
                'client_county'     => 'Braga',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-06-28'
            ],
            [
                'client_code'       => '10026',
                'client_name'       => 'Sara Cardoso',
                'client_nif'        => '678901236',
                'client_address'    => 'Praça da República, 8',
                'client_city'       => 'Braga',
                'client_post_code'  => '4700-678',
                'client_county'     => 'Braga',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-07-03'
            ],
            [
                'client_code'       => '10027',
                'client_name'       => 'Paulo Rocha',
                'client_nif'        => '789012347',
                'client_address'    => 'Rua de São João, 33',
                'client_city'       => 'Faro',
                'client_post_code'  => '8000-789',
                'client_county'     => 'Faro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-07-08'
            ],
            [
                'client_code'       => '10028',
                'client_name'       => 'Rita Machado',
                'client_nif'        => '890123458',
                'client_address'    => 'Avenida 5 de Outubro, 55',
                'client_city'       => 'Faro',
                'client_post_code'  => '8000-890',
                'client_county'     => 'Faro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-07-13'
            ],
            [
                'client_code'       => '10029',
                'client_name'       => 'Hugo Barbosa',
                'client_nif'        => '901234569',
                'client_address'    => 'Rua de Santo António, 19',
                'client_city'       => 'Faro',
                'client_post_code'  => '8000-901',
                'client_county'     => 'Faro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-07-18'
            ],
            [
                'client_code'       => '10030',
                'client_name'       => 'Cláudia Pires',
                'client_nif'        => '012345680',
                'client_address'    => 'Largo da Sé, 4',
                'client_city'       => 'Évora',
                'client_post_code'  => '7000-012',
                'client_county'     => 'Évora',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-07-23'
            ],
            [
                'client_code'       => '10031',
                'client_name'       => 'Nuno Henriques',
                'client_nif'        => '123456782',
                'client_address'    => 'Rua 5 de Outubro, 27',
                'client_city'       => 'Évora',
                'client_post_code'  => '7000-123',
                'client_county'     => 'Évora',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-07-28'
            ],
            [
                'client_code'       => '10032',
                'client_name'       => 'Patrícia Guerreiro',
                'client_nif'        => '234567893',
                'client_address'    => 'Praça do Sertório, 6',
                'client_city'       => 'Évora',
                'client_post_code'  => '7000-234',
                'client_county'     => 'Évora',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-08-02'
            ],
            [
                'client_code'       => '10033',
                'client_name'       => 'Bruno Tavares',
                'client_nif'        => '345678904',
                'client_address'    => 'Avenida Luísa Todi, 90',
                'client_city'       => 'Setúbal',
                'client_post_code'  => '2900-345',
                'client_county'     => 'Setúbal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-08-07'
            ],
            [
                'client_code'       => '10034',
                'client_name'       => 'Daniela Faria',
                'client_nif'        => '456789015',
                'client_address'    => 'Rua Augusto Cardoso, 14',
                'client_city'       => 'Setúbal',
                'client_post_code'  => '2900-456',
                'client_county'     => 'Setúbal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-08-12'
            ],
            [
                'client_code'       => '10035',
                'client_name'       => 'Fábio Coelho',
                'client_nif'        => '567890126',
                'client_address'    => 'Praça de Bocage, 1',
                'client_city'       => 'Setúbal',
                'client_post_code'  => '2900-567',
                'client_county'     => 'Setúbal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-08-17'
            ],
            [
                'client_code'       => '10036',
                'client_name'       => 'Andreia Reis',
                'client_nif'        => '678901237',
                'client_address'    => 'Rua Formosa, 38',
                'client_city'       => 'Viseu',
                'client_post_code'  => '3500-678',
                'client_county'     => 'Viseu',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-08-22'
            ],
            [
                'client_code'       => '10037',
                'client_name'       => 'Jorge Campos',
                'client_nif'        => '789012348',
                'client_address'    => 'Avenida Alberto Sampaio, 42',
                'client_city'       => 'Viseu',
                'client_post_code'  => '3500-789',
                'client_county'     => 'Viseu',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-08-27'
            ],
            [
                'client_code'       => '10038',
                'client_name'       => 'Sónia Vieira',
                'client_nif'        => '890123459',
                'client_address'    => 'Largo Mouzinho de Albuquerque, 3',
                'client_city'       => 'Viseu',
                'client_post_code'  => '3500-890',
                'client_county'     => 'Viseu',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-09-01'
            ],
            [
                'client_code'       => '10039',
                'client_name'       => 'Vasco Borges',
                'client_nif'        => '901234570',
                'client_address'    => 'Rua do Comércio, 65',
                'client_city'       => 'Funchal',
                'client_post_code'  => '9000-901',
                'client_county'     => 'Funchal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-09-06'
            ],
            [
                'client_code'       => '10040',
                'client_name'       => 'Raquel Mota',
                'client_nif'        => '012345681',
                'client_address'    => 'Avenida do Mar e das Comunidades Madeirenses, 23',
                'client_city'       => 'Funchal',
                'client_post_code'  => '9000-012',
                'client_county'     => 'Funchal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-09-11'
            ],
            [
                'client_code'       => '10041',
                'client_name'       => 'Duarte Neves',
                'client_nif'        => '123456783',
                'client_address'    => 'Rua de São Pedro, 16',
                'client_city'       => 'Funchal',
                'client_post_code'  => '9000-123',
                'client_county'     => 'Funchal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-09-16'
            ],
            [
                'client_code'       => '10042',
                'client_name'       => 'Margarida Antunes',
                'client_nif'        => '234567894',
                'client_address'    => 'Largo do Toural, 7',
                'client_city'       => 'Guimarães',
                'client_post_code'  => '4800-234',
                'client_county'     => 'Guimarães',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-09-21'
            ],
            [
                'client_code'       => '10043',
                'client_name'       => 'Gustavo Soares',
                'client_nif'        => '345678905',
                'client_address'    => 'Rua de Santa Maria, 29',
                'client_city'       => 'Guimarães',
                'client_post_code'  => '4800-345',
                'client_county'     => 'Guimarães',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-09-26'
            ],
            [
                'client_code'       => '10044',
                'client_name'       => 'Leonor Baptista',
                'client_nif'        => '456789016',
                'client_address'    => 'Praça de Santiago, 5',
                'client_city'       => 'Guimarães',
                'client_post_code'  => '4800-456',
                'client_county'     => 'Guimarães',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-10-01'
            ],
            [
                'client_code'       => '10045',
                'client_name'       => 'Henrique Freitas',
                'client_nif'        => '567890127',
                'client_address'    => 'Rua Direita, 51',
                'client_city'       => 'Aveiro',
                'client_post_code'  => '3800-567',
                'client_county'     => 'Aveiro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-10-06'
            ],
            [
                'client_code'       => '10046',
                'client_name'       => 'Matilde Monteiro',
                'client_nif'        => '678901238',
                'client_address'    => 'Avenida Dr. Lourenço Peixinho, 85',
                'client_city'       => 'Aveiro',
                'client_post_code'  => '3800-678',
                'client_county'     => 'Aveiro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-10-11'
            ],
            [
                'client_code'       => '10047',
                'client_name'       => 'Afonso Morais',
                'client_nif'        => '789012349',
                'client_address'    => 'Praça do Peixe, 10',
                'client_city'       => 'Aveiro',
                'client_post_code'  => '3800-789',
                'client_county'     => 'Aveiro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-10-16'
            ],
            [
                'client_code'       => '10048',
                'client_name'       => 'Clara Esteves',
                'client_nif'        => '890123460',
                'client_address'    => 'Rua de Cedofeita, 75',
                'client_city'       => 'Porto',
                'client_post_code'  => '4050-890',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-10-22'
            ],
            [
                'client_code'       => '10049',
                'client_name'       => 'Tomás Ramos',
                'client_nif'        => '901234571',
                'client_address'    => 'Avenida dos Combatentes, 110',
                'client_city'       => 'Porto',
                'client_post_code'  => '4200-901',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-10-26'
            ],
            [
                'client_code'       => '10050',
                'client_name'       => 'Lara Brito',
                'client_nif'        => '012345682',
                'client_address'    => 'Rua Miguel Bombarda, 48',
                'client_city'       => 'Porto',
                'client_post_code'  => '4050-012',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-10-31'
            ],
            [
                'client_code'       => '10051',
                'client_name'       => 'Gabriel Pinheiro',
                'client_nif'        => '123456784',
                'client_address'    => 'Avenida da Liberdade, 200',
                'client_city'       => 'Lisboa',
                'client_post_code'  => '1250-123',
                'client_county'     => 'Lisboa',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-11-05'
            ],
            [
                'client_code'       => '10052',
                'client_name'       => 'Eva Carneiro',
                'client_nif'        => '234567895',
                'client_address'    => 'Rua do Carmo, 37',
                'client_city'       => 'Lisboa',
                'client_post_code'  => '1200-234',
                'client_county'     => 'Lisboa',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-11-10'
            ],
            [
                'client_code'       => '10053',
                'client_name'       => 'Dinis Abreu',
                'client_nif'        => '345678906',
                'client_address'    => 'Praça do Príncipe Real, 14',
                'client_city'       => 'Lisboa',
                'client_post_code'  => '1250-345',
                'client_county'     => 'Lisboa',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-11-15'
            ],
            [
                'client_code'       => '10054',
                'client_name'       => 'Mateus Figueiredo',
                'client_nif'        => '456789017',
                'client_address'    => 'Rua da Boavista, 62',
                'client_city'       => 'Porto',
                'client_post_code'  => '4050-456',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-11-20'
            ],
            [
                'client_code'       => '10055',
                'client_name'       => 'Alice Simões',
                'client_nif'        => '567890128',
                'client_address'    => 'Avenida da Boavista, 150',
                'client_city'       => 'Porto',
                'client_post_code'  => '4100-567',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-11-25'
            ],
            [
                'client_code'       => '10056',
                'client_name'       => 'Rodrigo Loureiro',
                'client_nif'        => '678901239',
                'client_address'    => 'Rua de Santa Catarina, 95',
                'client_city'       => 'Porto',
                'client_post_code'  => '4000-678',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-11-30'
            ],
            [
                'client_code'       => '10057',
                'client_name'       => 'Laura Gaspar',
                'client_nif'        => '789012350',
                'client_address'    => 'Avenida Fernão de Magalhães, 70',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-789',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-12-05'
            ],
            [
                'client_code'       => '10058',
                'client_name'       => 'Martim Vasconcelos',
                'client_nif'        => '890123461',
                'client_address'    => 'Rua da Sofia, 25',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-890',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-12-10'
            ],
            [
                'client_code'       => '10059',
                'client_name'       => 'Constança Nobre',
                'client_nif'        => '901234572',
                'client_address'    => 'Praça 8 de Maio, 3',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-901',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-12-15'
            ],
            [
                'client_code'       => '10060',
                'client_name'       => 'Simão Nobre',
                'client_nif'        => '901234572',
                'client_address'    => 'Praça 8 de Maio, 3',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-901',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-12-15'
            ],
            [
                'client_code'       => '10061',
                'client_name'       => 'Leonor Quintão',
                'client_nif'        => '012345683',
                'client_address'    => 'Rua D. Diogo de Sousa, 56',
                'client_city'       => 'Braga',
                'client_post_code'  => '4700-012',
                'client_county'     => 'Braga',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-12-20'
            ],
            [
                'client_code'       => '10062',
                'client_name'       => 'Francisco Pimentel',
                'client_nif'        => '123456785',
                'client_address'    => 'Avenida Central, 120',
                'client_city'       => 'Braga',
                'client_post_code'  => '4710-123',
                'client_county'     => 'Braga',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-12-25'
            ],
            [
                'client_code'       => '10063',
                'client_name'       => 'Madalena Sequeira',
                'client_nif'        => '234567896',
                'client_address'    => 'Rua do Souto, 31',
                'client_city'       => 'Braga',
                'client_post_code'  => '4700-234',
                'client_county'     => 'Braga',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2024-12-30'
            ],
            [
                'client_code'       => '10064',
                'client_name'       => 'Vicente Nogueira',
                'client_nif'        => '345678907',
                'client_address'    => 'Avenida da República, 85',
                'client_city'       => 'Faro',
                'client_post_code'  => '8000-345',
                'client_county'     => 'Faro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-01-04'
            ],
            [
                'client_code'       => '10065',
                'client_name'       => 'Carlota Mendonça',
                'client_nif'        => '456789018',
                'client_address'    => 'Rua de Santo António, 42',
                'client_city'       => 'Faro',
                'client_post_code'  => '8000-456',
                'client_county'     => 'Faro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-01-09'
            ],
            [
                'client_code'       => '10066',
                'client_name'       => 'Lourenço Cordeiro',
                'client_nif'        => '567890129',
                'client_address'    => 'Praça da Liberdade, 7',
                'client_city'       => 'Faro',
                'client_post_code'  => '8000-567',
                'client_county'     => 'Faro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-01-14'
            ],
            [
                'client_code'       => '10067',
                'client_name'       => 'Benedita Valente',
                'client_nif'        => '678901240',
                'client_address'    => 'Rua do Raimundo, 19',
                'client_city'       => 'Évora',
                'client_post_code'  => '7000-678',
                'client_county'     => 'Évora',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-01-19'
            ],
            [
                'client_code'       => '10068',
                'client_name'       => 'Salvador Macedo',
                'client_nif'        => '789012351',
                'client_address'    => 'Praça do Giraldo, 11',
                'client_city'       => 'Évora',
                'client_post_code'  => '7000-789',
                'client_county'     => 'Évora',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-01-24'
            ],
            [
                'client_code'       => '10069',
                'client_name'       => 'Camila Nascimento',
                'client_nif'        => '890123462',
                'client_address'    => 'Rua 5 de Outubro, 33',
                'client_city'       => 'Évora',
                'client_post_code'  => '7000-890',
                'client_county'     => 'Évora',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-01-29'
            ],
            [
                'client_code'       => '10070',
                'client_name'       => 'Guilherme Veloso',
                'client_nif'        => '901234573',
                'client_address'    => 'Avenida Luísa Todi, 105',
                'client_city'       => 'Setúbal',
                'client_post_code'  => '2900-901',
                'client_county'     => 'Setúbal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-02-03'
            ],
            [
                'client_code'       => '10071',
                'client_name'       => 'Mafalda Castanheira',
                'client_nif'        => '012345684',
                'client_address'    => 'Rua Augusto Cardoso, 28',
                'client_city'       => 'Setúbal',
                'client_post_code'  => '2900-012',
                'client_county'     => 'Setúbal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-02-08'
            ],
            [
                'client_code'       => '10072',
                'client_name'       => 'Bernardo Queirós',
                'client_nif'        => '123456786',
                'client_address'    => 'Praça de Bocage, 9',
                'client_city'       => 'Setúbal',
                'client_post_code'  => '2900-123',
                'client_county'     => 'Setúbal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-02-13'
            ],
            [
                'client_code'       => '10073',
                'client_name'       => 'Júlia Figueira',
                'client_nif'        => '234567897',
                'client_address'    => 'Rua Formosa, 52',
                'client_city'       => 'Viseu',
                'client_post_code'  => '3500-234',
                'client_county'     => 'Viseu',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-02-18'
            ],
            [
                'client_code'       => '10074',
                'client_name'       => 'Artur Vaz',
                'client_nif'        => '345678908',
                'client_address'    => 'Avenida Alberto Sampaio, 77',
                'client_city'       => 'Viseu',
                'client_post_code'  => '3500-345',
                'client_county'     => 'Viseu',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-02-23'
            ],
            [
                'client_code'       => '10075',
                'client_name'       => 'Vitória Aguiar',
                'client_nif'        => '456789019',
                'client_address'    => 'Largo Mouzinho de Albuquerque, 6',
                'client_city'       => 'Viseu',
                'client_post_code'  => '3500-456',
                'client_county'     => 'Viseu',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-02-28'
            ],
            [
                'client_code'       => '10076',
                'client_name'       => 'Sebastião Melo',
                'client_nif'        => '567890130',
                'client_address'    => 'Rua do Comércio, 89',
                'client_city'       => 'Funchal',
                'client_post_code'  => '9000-567',
                'client_county'     => 'Funchal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-03-05'
            ],
            [
                'client_code'       => '10077',
                'client_name'       => 'Aurora Pires',
                'client_nif'        => '678901241',
                'client_address'    => 'Avenida do Mar e das Comunidades Madeirenses, 40',
                'client_city'       => 'Funchal',
                'client_post_code'  => '9000-678',
                'client_county'     => 'Funchal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-03-10'
            ],
            [
                'client_code'       => '10078',
                'client_name'       => 'Gaspar Faria',
                'client_nif'        => '789012352',
                'client_address'    => 'Rua de São Pedro, 22',
                'client_city'       => 'Funchal',
                'client_post_code'  => '9000-789',
                'client_county'     => 'Funchal',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-03-15'
            ],
            [
                'client_code'       => '10079',
                'client_name'       => 'Amélia Nunes',
                'client_nif'        => '890123463',
                'client_address'    => 'Largo do Toural, 13',
                'client_city'       => 'Guimarães',
                'client_post_code'  => '4800-890',
                'client_county'     => 'Guimarães',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-03-20'
            ],
            [
                'client_code'       => '10080',
                'client_name'       => 'Joaquim Amorim',
                'client_nif'        => '901234574',
                'client_address'    => 'Rua de Santa Maria, 37',
                'client_city'       => 'Guimarães',
                'client_post_code'  => '4800-901',
                'client_county'     => 'Guimarães',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-03-25'
            ],
            [
                'client_code'       => '10081',
                'client_name'       => 'Ema Batista',
                'client_nif'        => '012345685',
                'client_address'    => 'Praça de Santiago, 8',
                'client_city'       => 'Guimarães',
                'client_post_code'  => '4800-012',
                'client_county'     => 'Guimarães',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-03-30'
            ],
            [
                'client_code'       => '10082',
                'client_name'       => 'Valentim Couto',
                'client_nif'        => '123456787',
                'client_address'    => 'Rua Direita, 67',
                'client_city'       => 'Aveiro',
                'client_post_code'  => '3800-123',
                'client_county'     => 'Aveiro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-04-04'
            ],
            [
                'client_code'       => '10083',
                'client_name'       => 'Íris Varela',
                'client_nif'        => '234567898',
                'client_address'    => 'Avenida Dr. Lourenço Peixinho, 99',
                'client_city'       => 'Aveiro',
                'client_post_code'  => '3800-234',
                'client_county'     => 'Aveiro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-04-09'
            ],
            [
                'client_code'       => '10084',
                'client_name'       => 'Davi Paiva',
                'client_nif'        => '345678909',
                'client_address'    => 'Praça do Peixe, 15',
                'client_city'       => 'Aveiro',
                'client_post_code'  => '3800-345',
                'client_county'     => 'Aveiro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-04-14'
            ],
            [
                'client_code'       => '10085',
                'client_name'       => 'Vera Andrade',
                'client_nif'        => '456789020',
                'client_address'    => 'Rua de Cedofeita, 88',
                'client_city'       => 'Porto',
                'client_post_code'  => '4050-456',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-04-19'
            ],
            [
                'client_code'       => '10086',
                'client_name'       => 'Renato Barros',
                'client_nif'        => '567890131',
                'client_address'    => 'Avenida dos Combatentes, 130',
                'client_city'       => 'Porto',
                'client_post_code'  => '4200-567',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-04-24'
            ],
            [
                'client_code'       => '10087',
                'client_name'       => 'Bianca Mendes',
                'client_nif'        => '678901242',
                'client_address'    => 'Rua Miguel Bombarda, 59',
                'client_city'       => 'Porto',
                'client_post_code'  => '4050-678',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-04-29'
            ],
            [
                'client_code'       => '10088',
                'client_name'       => 'Cristiano Fonseca',
                'client_nif'        => '789012353',
                'client_address'    => 'Avenida da Liberdade, 220',
                'client_city'       => 'Lisboa',
                'client_post_code'  => '1250-789',
                'client_county'     => 'Lisboa',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-05-04'
            ],
            [
                'client_code'       => '10089',
                'client_name'       => 'Marisa Figueiredo',
                'client_nif'        => '890123464',
                'client_address'    => 'Rua do Carmo, 44',
                'client_city'       => 'Lisboa',
                'client_post_code'  => '1200-890',
                'client_county'     => 'Lisboa',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-05-09'
            ],
            [
                'client_code'       => '10090',
                'client_name'       => 'César Pinho',
                'client_nif'        => '901234575',
                'client_address'    => 'Praça do Príncipe Real, 18',
                'client_city'       => 'Lisboa',
                'client_post_code'  => '1250-901',
                'client_county'     => 'Lisboa',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-05-14'
            ],
            [
                'client_code'       => '10091',
                'client_name'       => 'Luana Teixeira',
                'client_nif'        => '012345686',
                'client_address'    => 'Rua da Boavista, 73',
                'client_city'       => 'Porto',
                'client_post_code'  => '4050-012',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-05-19'
            ],
            [
                'client_code'       => '10092',
                'client_name'       => 'Frederico Moura',
                'client_nif'        => '123456788',
                'client_address'    => 'Avenida da Boavista, 170',
                'client_city'       => 'Porto',
                'client_post_code'  => '4100-123',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-05-24'
            ],
            [
                'client_code'       => '10093',
                'client_name'       => 'Soraia Neto',
                'client_nif'        => '234567899',
                'client_address'    => 'Rua de Santa Catarina, 107',
                'client_city'       => 'Porto',
                'client_post_code'  => '4000-234',
                'client_county'     => 'Porto',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-05-29'
            ],
            [
                'client_code'       => '10094',
                'client_name'       => 'Leonardo Faria',
                'client_nif'        => '345678910',
                'client_address'    => 'Avenida Fernão de Magalhães, 82',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-345',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-06-03'
            ],
            [
                'client_code'       => '10095',
                'client_name'       => 'Yasmin Figueira',
                'client_nif'        => '456789021',
                'client_address'    => 'Rua da Sofia, 30',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-456',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-06-08'
            ],
            [
                'client_code'       => '10096',
                'client_name'       => 'Enzo Correia',
                'client_nif'        => '567890132',
                'client_address'    => 'Praça 8 de Maio, 5',
                'client_city'       => 'Coimbra',
                'client_post_code'  => '3000-567',
                'client_county'     => 'Coimbra',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-06-13'
            ],
            [
                'client_code'       => '10097',
                'client_name'       => 'Letícia Ribeiro',
                'client_nif'        => '678901243',
                'client_address'    => 'Rua D. Diogo de Sousa, 64',
                'client_city'       => 'Braga',
                'client_post_code'  => '4700-678',
                'client_county'     => 'Braga',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-06-18'
            ],
            [
                'client_code'       => '10098',
                'client_name'       => 'Martinho Leal',
                'client_nif'        => '789012354',
                'client_address'    => 'Avenida Central, 135',
                'client_city'       => 'Braga',
                'client_post_code'  => '4710-789',
                'client_county'     => 'Braga',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-06-23'
            ],
            [
                'client_code'       => '10099',
                'client_name'       => 'Débora Pacheco',
                'client_nif'        => '890123465',
                'client_address'    => 'Rua do Souto, 39',
                'client_city'       => 'Braga',
                'client_post_code'  => '4700-890',
                'client_county'     => 'Braga',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-06-28'
            ],
            [
                'client_code'       => '10100',
                'client_name'       => 'Tomé Ferreira',
                'client_nif'        => '901234576',
                'client_address'    => 'Avenida da República, 95',
                'client_city'       => 'Faro',
                'client_post_code'  => '8000-901',
                'client_county'     => 'Faro',
                'client_country'    => 'Portugal',
                'client_language'   => 'PT',
                'client_creation_date' => '2025-07-03'
            ]
        ];

        $contacts = [
            // Cliente 10001
            [
                'contact_third_party_code' => '10001',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '213456789',
                'contact_mobile_number' => '912345678',
                'contact_email' => 'antonio.silva@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10001',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '961234567',
                'contact_email' => 'asilva.pessoal@email.com',
                'contact_default' => false
            ],

            // Cliente 10002
            [
                'contact_third_party_code' => '10002',
                'contact_description' => 'Geral',
                'contact_phone_number' => '223456789',
                'contact_mobile_number' => '922345678',
                'contact_email' => 'maria.santos@empresa.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10002',
                'contact_description' => 'Departamento Comercial',
                'contact_phone_number' => '223456790',
                'contact_mobile_number' => '',
                'contact_email' => 'comercial@empresa.pt',
                'contact_default' => false
            ],

            // Cliente 10003
            [
                'contact_third_party_code' => '10003',
                'contact_description' => 'Principal',
                'contact_phone_number' => '233456789',
                'contact_mobile_number' => '932345678',
                'contact_email' => 'joao.ferreira@negocio.pt',
                'contact_default' => true
            ],

            // Cliente 10004
            [
                'contact_third_party_code' => '10004',
                'contact_description' => 'Loja',
                'contact_phone_number' => '243456789',
                'contact_mobile_number' => '942345678',
                'contact_email' => 'ana.rodrigues@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10004',
                'contact_description' => 'Armazém',
                'contact_phone_number' => '243456790',
                'contact_mobile_number' => '942345679',
                'contact_email' => 'armazem@loja.pt',
                'contact_default' => false
            ],
            [
                'contact_third_party_code' => '10004',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '962345678',
                'contact_email' => 'ana.rod@email.com',
                'contact_default' => false
            ],

            // Cliente 10005
            [
                'contact_third_party_code' => '10005',
                'contact_description' => 'Escritório Central',
                'contact_phone_number' => '253456789',
                'contact_mobile_number' => '952345678',
                'contact_email' => 'manuel.martins@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10005',
                'contact_description' => 'Filial Norte',
                'contact_phone_number' => '253456790',
                'contact_mobile_number' => '952345679',
                'contact_email' => 'filial.norte@central.pt',
                'contact_default' => false
            ],

            // Cliente 10006
            [
                'contact_third_party_code' => '10006',
                'contact_description' => 'Geral',
                'contact_phone_number' => '263456789',
                'contact_mobile_number' => '962345678',
                'contact_email' => 'sofia.oliveira@email.pt',
                'contact_default' => true
            ],

            // Cliente 10007
            [
                'contact_third_party_code' => '10007',
                'contact_description' => 'Profissional',
                'contact_phone_number' => '273456789',
                'contact_mobile_number' => '972345678',
                'contact_email' => 'rui.costa@trabalho.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10007',
                'contact_description' => 'Casa',
                'contact_phone_number' => '273456790',
                'contact_mobile_number' => '972345679',
                'contact_email' => 'ruicosta@casa.pt',
                'contact_default' => false
            ],

            // Cliente 10008
            [
                'contact_third_party_code' => '10008',
                'contact_description' => 'Principal',
                'contact_phone_number' => '283456789',
                'contact_mobile_number' => '982345678',
                'contact_email' => 'carla.sousa@email.pt',
                'contact_default' => true
            ],

            // Cliente 10009
            [
                'contact_third_party_code' => '10009',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '293456789',
                'contact_mobile_number' => '992345678',
                'contact_email' => 'pedro.almeida@escritorio.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10009',
                'contact_description' => 'Móvel',
                'contact_phone_number' => '',
                'contact_mobile_number' => '992345679',
                'contact_email' => 'pedroalmeida@movel.pt',
                'contact_default' => false
            ],

            // Cliente 10010
            [
                'contact_third_party_code' => '10010',
                'contact_description' => 'Loja',
                'contact_phone_number' => '213456790',
                'contact_mobile_number' => '912345679',
                'contact_email' => 'ines.pereira@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10010',
                'contact_description' => 'Online',
                'contact_phone_number' => '',
                'contact_mobile_number' => '',
                'contact_email' => 'inespereira@online.pt',
                'contact_default' => false
            ],

            // Cliente 10011
            [
                'contact_third_party_code' => '10011',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '213456791',
                'contact_mobile_number' => '912345680',
                'contact_email' => 'miguel.fernandes@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10011',
                'contact_description' => 'Celular',
                'contact_phone_number' => '',
                'contact_mobile_number' => '961234568',
                'contact_email' => 'mfernandes@celular.pt',
                'contact_default' => false
            ],

            // Cliente 10012
            [
                'contact_third_party_code' => '10012',
                'contact_description' => 'Principal',
                'contact_phone_number' => '223456791',
                'contact_mobile_number' => '922345680',
                'contact_email' => 'catarina.gomes@empresa.pt',
                'contact_default' => true
            ],

            // Cliente 10013
            [
                'contact_third_party_code' => '10013',
                'contact_description' => 'Geral',
                'contact_phone_number' => '233456791',
                'contact_mobile_number' => '932345680',
                'contact_email' => 'diogo.marques@negocio.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10013',
                'contact_description' => 'Vendas',
                'contact_phone_number' => '233456792',
                'contact_mobile_number' => '932345681',
                'contact_email' => 'vendas@negocio.pt',
                'contact_default' => false
            ],

            // Cliente 10014
            [
                'contact_third_party_code' => '10014',
                'contact_description' => 'Loja',
                'contact_phone_number' => '243456791',
                'contact_mobile_number' => '942345680',
                'contact_email' => 'beatriz.ribeiro@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10014',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '962345680',
                'contact_email' => 'beatrizr@email.com',
                'contact_default' => false
            ],

            // Cliente 10015
            [
                'contact_third_party_code' => '10015',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '253456791',
                'contact_mobile_number' => '952345680',
                'contact_email' => 'tiago.pinto@central.pt',
                'contact_default' => true
            ],

            // Cliente 10016
            [
                'contact_third_party_code' => '10016',
                'contact_description' => 'Profissional',
                'contact_phone_number' => '263456791',
                'contact_mobile_number' => '962345680',
                'contact_email' => 'mariana.lopes@trabalho.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10016',
                'contact_description' => 'Casa',
                'contact_phone_number' => '263456792',
                'contact_mobile_number' => '962345681',
                'contact_email' => 'marianalopes@casa.pt',
                'contact_default' => false
            ],

            // Cliente 10017
            [
                'contact_third_party_code' => '10017',
                'contact_description' => 'Principal',
                'contact_phone_number' => '273456791',
                'contact_mobile_number' => '972345680',
                'contact_email' => 'andre.carvalho@email.pt',
                'contact_default' => true
            ],

            // Cliente 10018
            [
                'contact_third_party_code' => '10018',
                'contact_description' => 'Geral',
                'contact_phone_number' => '283456791',
                'contact_mobile_number' => '982345680',
                'contact_email' => 'francisca.nunes@empresa.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10018',
                'contact_description' => 'Suporte',
                'contact_phone_number' => '283456792',
                'contact_mobile_number' => '982345681',
                'contact_email' => 'suporte@empresa.pt',
                'contact_default' => false
            ],

            // Cliente 10019
            [
                'contact_third_party_code' => '10019',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '293456791',
                'contact_mobile_number' => '992345680',
                'contact_email' => 'goncalo.matos@escritorio.pt',
                'contact_default' => true
            ],

            // Cliente 10020
            [
                'contact_third_party_code' => '10020',
                'contact_description' => 'Loja',
                'contact_phone_number' => '213456792',
                'contact_mobile_number' => '912345681',
                'contact_email' => 'carolina.fonseca@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10020',
                'contact_description' => 'Online',
                'contact_phone_number' => '',
                'contact_mobile_number' => '',
                'contact_email' => 'carolinaf@online.pt',
                'contact_default' => false
            ],

            // Cliente 10021
            [
                'contact_third_party_code' => '10021',
                'contact_description' => 'Principal',
                'contact_phone_number' => '223456792',
                'contact_mobile_number' => '922345681',
                'contact_email' => 'ricardo.correia@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10021',
                'contact_description' => 'Secundário',
                'contact_phone_number' => '',
                'contact_mobile_number' => '922345682',
                'contact_email' => 'rcorreia@secundario.pt',
                'contact_default' => false
            ],

            // Cliente 10022
            [
                'contact_third_party_code' => '10022',
                'contact_description' => 'Geral',
                'contact_phone_number' => '233456792',
                'contact_mobile_number' => '932345681',
                'contact_email' => 'marta.dias@negocio.pt',
                'contact_default' => true
            ],

            // Cliente 10023
            [
                'contact_third_party_code' => '10023',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '243456792',
                'contact_mobile_number' => '942345681',
                'contact_email' => 'filipe.mendes@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10023',
                'contact_description' => 'Móvel',
                'contact_phone_number' => '',
                'contact_mobile_number' => '942345682',
                'contact_email' => 'fmendes@movel.pt',
                'contact_default' => false
            ],

            // Cliente 10024
            [
                'contact_third_party_code' => '10024',
                'contact_description' => 'Loja',
                'contact_phone_number' => '253456792',
                'contact_mobile_number' => '952345681',
                'contact_email' => 'joana.teixeira@loja.pt',
                'contact_default' => true
            ],

            // Cliente 10025
            [
                'contact_third_party_code' => '10025',
                'contact_description' => 'Principal',
                'contact_phone_number' => '263456792',
                'contact_mobile_number' => '962345681',
                'contact_email' => 'luis.moreira@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10025',
                'contact_description' => 'Alternativo',
                'contact_phone_number' => '263456793',
                'contact_mobile_number' => '962345682',
                'contact_email' => 'lmoreira@alt.pt',
                'contact_default' => false
            ],

            // Cliente 10026
            [
                'contact_third_party_code' => '10026',
                'contact_description' => 'Geral',
                'contact_phone_number' => '273456792',
                'contact_mobile_number' => '972345681',
                'contact_email' => 'sara.cardoso@empresa.pt',
                'contact_default' => true
            ],

            // Cliente 10027
            [
                'contact_third_party_code' => '10027',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '283456792',
                'contact_mobile_number' => '982345681',
                'contact_email' => 'paulo.rocha@escritorio.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10027',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '982345682',
                'contact_email' => 'paulor@pessoal.pt',
                'contact_default' => false
            ],

            // Cliente 10028
            [
                'contact_third_party_code' => '10028',
                'contact_description' => 'Principal',
                'contact_phone_number' => '293456792',
                'contact_mobile_number' => '992345681',
                'contact_email' => 'rita.machado@email.pt',
                'contact_default' => true
            ],

            // Cliente 10029
            [
                'contact_third_party_code' => '10029',
                'contact_description' => 'Loja',
                'contact_phone_number' => '213456793',
                'contact_mobile_number' => '912345682',
                'contact_email' => 'hugo.barbosa@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10029',
                'contact_description' => 'Armazém',
                'contact_phone_number' => '213456794',
                'contact_mobile_number' => '',
                'contact_email' => 'armazem@loja.pt',
                'contact_default' => false
            ],

            // Cliente 10030
            [
                'contact_third_party_code' => '10030',
                'contact_description' => 'Geral',
                'contact_phone_number' => '223456793',
                'contact_mobile_number' => '922345682',
                'contact_email' => 'claudia.pires@negocio.pt',
                'contact_default' => true
            ],

            // Cliente 10031
            [
                'contact_third_party_code' => '10031',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '233456793',
                'contact_mobile_number' => '932345682',
                'contact_email' => 'nuno.henriques@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10031',
                'contact_description' => 'Móvel',
                'contact_phone_number' => '',
                'contact_mobile_number' => '932345683',
                'contact_email' => 'nhenriques@movel.pt',
                'contact_default' => false
            ],

            // Cliente 10032
            [
                'contact_third_party_code' => '10032',
                'contact_description' => 'Principal',
                'contact_phone_number' => '243456793',
                'contact_mobile_number' => '942345682',
                'contact_email' => 'patricia.guerreiro@email.pt',
                'contact_default' => true
            ],

            // Cliente 10033
            [
                'contact_third_party_code' => '10033',
                'contact_description' => 'Geral',
                'contact_phone_number' => '253456793',
                'contact_mobile_number' => '952345682',
                'contact_email' => 'bruno.tavares@empresa.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10033',
                'contact_description' => 'Vendas',
                'contact_phone_number' => '253456794',
                'contact_mobile_number' => '952345683',
                'contact_email' => 'vendas@empresa.pt',
                'contact_default' => false
            ],

            // Cliente 10034
            [
                'contact_third_party_code' => '10034',
                'contact_description' => 'Loja',
                'contact_phone_number' => '263456793',
                'contact_mobile_number' => '962345682',
                'contact_email' => 'daniela.faria@loja.pt',
                'contact_default' => true
            ],

            // Cliente 10035
            [
                'contact_third_party_code' => '10035',
                'contact_description' => 'Principal',
                'contact_phone_number' => '273456793',
                'contact_mobile_number' => '972345682',
                'contact_email' => 'fabio.coelho@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10035',
                'contact_description' => 'Secundário',
                'contact_phone_number' => '',
                'contact_mobile_number' => '972345683',
                'contact_email' => 'fcoelho@secundario.pt',
                'contact_default' => false
            ],

            // Cliente 10036
            [
                'contact_third_party_code' => '10036',
                'contact_description' => 'Geral',
                'contact_phone_number' => '283456793',
                'contact_mobile_number' => '982345682',
                'contact_email' => 'andreia.reis@negocio.pt',
                'contact_default' => true
            ],

            // Cliente 10037
            [
                'contact_third_party_code' => '10037',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '293456793',
                'contact_mobile_number' => '992345682',
                'contact_email' => 'jorge.campos@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10037',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '992345683',
                'contact_email' => 'jcampos@pessoal.pt',
                'contact_default' => false
            ],
            // Cliente 10038
            [
                'contact_third_party_code' => '10038',
                'contact_description' => 'Principal',
                'contact_phone_number' => '213456794',
                'contact_mobile_number' => '912345683',
                'contact_email' => 'sonia.vieira@email.pt',
                'contact_default' => true
            ],

            // Cliente 10039
            [
                'contact_third_party_code' => '10039',
                'contact_description' => 'Loja',
                'contact_phone_number' => '223456794',
                'contact_mobile_number' => '922345683',
                'contact_email' => 'vasco.borges@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10039',
                'contact_description' => 'Online',
                'contact_phone_number' => '',
                'contact_mobile_number' => '',
                'contact_email' => 'vborges@online.pt',
                'contact_default' => false
            ],

            // Cliente 10040
            [
                'contact_third_party_code' => '10040',
                'contact_description' => 'Geral',
                'contact_phone_number' => '233456794',
                'contact_mobile_number' => '932345683',
                'contact_email' => 'raquel.mota@empresa.pt',
                'contact_default' => true
            ],

            // Cliente 10041
            [
                'contact_third_party_code' => '10041',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '243456794',
                'contact_mobile_number' => '942345683',
                'contact_email' => 'duarte.neves@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10041',
                'contact_description' => 'Móvel',
                'contact_phone_number' => '',
                'contact_mobile_number' => '942345684',
                'contact_email' => 'dneves@movel.pt',
                'contact_default' => false
            ],

            // Cliente 10042
            [
                'contact_third_party_code' => '10042',
                'contact_description' => 'Principal',
                'contact_phone_number' => '253456794',
                'contact_mobile_number' => '952345683',
                'contact_email' => 'margarida.antunes@email.pt',
                'contact_default' => true
            ],

            // Cliente 10043
            [
                'contact_third_party_code' => '10043',
                'contact_description' => 'Geral',
                'contact_phone_number' => '263456794',
                'contact_mobile_number' => '962345683',
                'contact_email' => 'gustavo.soares@negocio.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10043',
                'contact_description' => 'Suporte',
                'contact_phone_number' => '263456795',
                'contact_mobile_number' => '962345684',
                'contact_email' => 'suporte@negocio.pt',
                'contact_default' => false
            ],

            // Cliente 10044
            [
                'contact_third_party_code' => '10044',
                'contact_description' => 'Loja',
                'contact_phone_number' => '273456794',
                'contact_mobile_number' => '972345683',
                'contact_email' => 'leonor.baptista@loja.pt',
                'contact_default' => true
            ],

            // Cliente 10045
            [
                'contact_third_party_code' => '10045',
                'contact_description' => 'Principal',
                'contact_phone_number' => '283456794',
                'contact_mobile_number' => '982345683',
                'contact_email' => 'henrique.freitas@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10045',
                'contact_description' => 'Alternativo',
                'contact_phone_number' => '283456795',
                'contact_mobile_number' => '982345684',
                'contact_email' => 'hfreitas@alt.pt',
                'contact_default' => false
            ],

            // Cliente 10046
            [
                'contact_third_party_code' => '10046',
                'contact_description' => 'Geral',
                'contact_phone_number' => '293456794',
                'contact_mobile_number' => '992345683',
                'contact_email' => 'matilde.monteiro@empresa.pt',
                'contact_default' => true
            ],

            // Cliente 10047
            [
                'contact_third_party_code' => '10047',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '213456795',
                'contact_mobile_number' => '912345684',
                'contact_email' => 'afonso.morais@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10047',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '912345685',
                'contact_email' => 'amorais@pessoal.pt',
                'contact_default' => false
            ],

            // Cliente 10048
            [
                'contact_third_party_code' => '10048',
                'contact_description' => 'Principal',
                'contact_phone_number' => '223456795',
                'contact_mobile_number' => '922345684',
                'contact_email' => 'clara.esteves@email.pt',
                'contact_default' => true
            ],

            // Cliente 10049
            [
                'contact_third_party_code' => '10049',
                'contact_description' => 'Loja',
                'contact_phone_number' => '233456795',
                'contact_mobile_number' => '932345684',
                'contact_email' => 'tomas.ramos@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10049',
                'contact_description' => 'Armazém',
                'contact_phone_number' => '233456796',
                'contact_mobile_number' => '',
                'contact_email' => 'armazem@loja.pt',
                'contact_default' => false
            ],

            // Cliente 10050
            [
                'contact_third_party_code' => '10050',
                'contact_description' => 'Geral',
                'contact_phone_number' => '243456795',
                'contact_mobile_number' => '942345684',
                'contact_email' => 'lara.brito@negocio.pt',
                'contact_default' => true
            ],

            // Cliente 10051
            [
                'contact_third_party_code' => '10051',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '253456795',
                'contact_mobile_number' => '952345684',
                'contact_email' => 'gabriel.pinheiro@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10051',
                'contact_description' => 'Móvel',
                'contact_phone_number' => '',
                'contact_mobile_number' => '952345685',
                'contact_email' => 'gpinheiro@movel.pt',
                'contact_default' => false
            ],

            // Cliente 10052
            [
                'contact_third_party_code' => '10052',
                'contact_description' => 'Principal',
                'contact_phone_number' => '263456795',
                'contact_mobile_number' => '962345684',
                'contact_email' => 'eva.carneiro@email.pt',
                'contact_default' => true
            ],

            // Cliente 10053
            [
                'contact_third_party_code' => '10053',
                'contact_description' => 'Geral',
                'contact_phone_number' => '273456795',
                'contact_mobile_number' => '972345684',
                'contact_email' => 'dinis.abreu@empresa.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10053',
                'contact_description' => 'Vendas',
                'contact_phone_number' => '273456796',
                'contact_mobile_number' => '972345685',
                'contact_email' => 'vendas@empresa.pt',
                'contact_default' => false
            ],

            // Cliente 10054
            [
                'contact_third_party_code' => '10054',
                'contact_description' => 'Loja',
                'contact_phone_number' => '283456795',
                'contact_mobile_number' => '982345684',
                'contact_email' => 'mateus.figueiredo@loja.pt',
                'contact_default' => true
            ],

            // Cliente 10055
            [
                'contact_third_party_code' => '10055',
                'contact_description' => 'Principal',
                'contact_phone_number' => '293456795',
                'contact_mobile_number' => '992345684',
                'contact_email' => 'alice.simoes@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10055',
                'contact_description' => 'Secundário',
                'contact_phone_number' => '',
                'contact_mobile_number' => '992345685',
                'contact_email' => 'asimoes@secundario.pt',
                'contact_default' => false
            ],

            // Cliente 10056
            [
                'contact_third_party_code' => '10056',
                'contact_description' => 'Geral',
                'contact_phone_number' => '213456796',
                'contact_mobile_number' => '912345685',
                'contact_email' => 'rodrigo.loureiro@negocio.pt',
                'contact_default' => true
            ],

            // Cliente 10057
            [
                'contact_third_party_code' => '10057',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '223456796',
                'contact_mobile_number' => '922345685',
                'contact_email' => 'laura.gaspar@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10057',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '922345686',
                'contact_email' => 'lgaspar@pessoal.pt',
                'contact_default' => false
            ],

            // Cliente 10058
            [
                'contact_third_party_code' => '10058',
                'contact_description' => 'Principal',
                'contact_phone_number' => '233456796',
                'contact_mobile_number' => '932345685',
                'contact_email' => 'martim.vasconcelos@email.pt',
                'contact_default' => true
            ],

            // Cliente 10059
            [
                'contact_third_party_code' => '10059',
                'contact_description' => 'Loja',
                'contact_phone_number' => '243456796',
                'contact_mobile_number' => '942345685',
                'contact_email' => 'constanca.nobre@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10059',
                'contact_description' => 'Online',
                'contact_phone_number' => '',
                'contact_mobile_number' => '',
                'contact_email' => 'cnobre@online.pt',
                'contact_default' => false
            ],

            // Cliente 10060
            [
                'contact_third_party_code' => '10060',
                'contact_description' => 'Geral',
                'contact_phone_number' => '253456796',
                'contact_mobile_number' => '952345685',
                'contact_email' => 'simao.nobre@empresa.pt',
                'contact_default' => true
            ],

            // Cliente 10061
            [
                'contact_third_party_code' => '10061',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '263456796',
                'contact_mobile_number' => '962345685',
                'contact_email' => 'leonor.quintao@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10061',
                'contact_description' => 'Móvel',
                'contact_phone_number' => '',
                'contact_mobile_number' => '962345686',
                'contact_email' => 'lquintao@movel.pt',
                'contact_default' => false
            ],

            // Cliente 10062
            [
                'contact_third_party_code' => '10062',
                'contact_description' => 'Principal',
                'contact_phone_number' => '273456796',
                'contact_mobile_number' => '972345685',
                'contact_email' => 'francisco.pimentel@email.pt',
                'contact_default' => true
            ],

            // Cliente 10063
            [
                'contact_third_party_code' => '10063',
                'contact_description' => 'Geral',
                'contact_phone_number' => '283456796',
                'contact_mobile_number' => '982345685',
                'contact_email' => 'madalena.sequeira@negocio.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10063',
                'contact_description' => 'Suporte',
                'contact_phone_number' => '283456797',
                'contact_mobile_number' => '982345686',
                'contact_email' => 'suporte@negocio.pt',
                'contact_default' => false
            ],

            // Cliente 10064
            [
                'contact_third_party_code' => '10064',
                'contact_description' => 'Loja',
                'contact_phone_number' => '293456796',
                'contact_mobile_number' => '992345685',
                'contact_email' => 'vicente.nogueira@loja.pt',
                'contact_default' => true
            ],

            // Cliente 10065
            [
                'contact_third_party_code' => '10065',
                'contact_description' => 'Principal',
                'contact_phone_number' => '213456797',
                'contact_mobile_number' => '912345686',
                'contact_email' => 'carlota.mendonca@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10065',
                'contact_description' => 'Alternativo',
                'contact_phone_number' => '213456798',
                'contact_mobile_number' => '912345687',
                'contact_email' => 'cmendonca@alt.pt',
                'contact_default' => false
            ],

            // Cliente 10066
            [
                'contact_third_party_code' => '10066',
                'contact_description' => 'Geral',
                'contact_phone_number' => '223456797',
                'contact_mobile_number' => '922345686',
                'contact_email' => 'lourenco.cordeiro@empresa.pt',
                'contact_default' => true
            ],

            // Cliente 10067
            [
                'contact_third_party_code' => '10067',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '233456797',
                'contact_mobile_number' => '932345686',
                'contact_email' => 'benedita.valente@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10067',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '932345687',
                'contact_email' => 'bvalente@pessoal.pt',
                'contact_default' => false
            ],

            // Cliente 10068
            [
                'contact_third_party_code' => '10068',
                'contact_description' => 'Principal',
                'contact_phone_number' => '243456797',
                'contact_mobile_number' => '942345686',
                'contact_email' => 'salvador.macedo@email.pt',
                'contact_default' => true
            ],

            // Cliente 10069
            [
                'contact_third_party_code' => '10069',
                'contact_description' => 'Loja',
                'contact_phone_number' => '253456797',
                'contact_mobile_number' => '952345686',
                'contact_email' => 'camila.nascimento@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10069',
                'contact_description' => 'Armazém',
                'contact_phone_number' => '253456798',
                'contact_mobile_number' => '',
                'contact_email' => 'armazem@loja.pt',
                'contact_default' => false
            ],

            // Cliente 10070
            [
                'contact_third_party_code' => '10070',
                'contact_description' => 'Geral',
                'contact_phone_number' => '263456797',
                'contact_mobile_number' => '962345686',
                'contact_email' => 'guilherme.veloso@negocio.pt',
                'contact_default' => true
            ],

            // Cliente 10071
            [
                'contact_third_party_code' => '10071',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '273456797',
                'contact_mobile_number' => '972345686',
                'contact_email' => 'mafalda.castanheira@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10071',
                'contact_description' => 'Móvel',
                'contact_phone_number' => '',
                'contact_mobile_number' => '972345687',
                'contact_email' => 'mcastanheira@movel.pt',
                'contact_default' => false
            ],

            // Cliente 10072
            [
                'contact_third_party_code' => '10072',
                'contact_description' => 'Principal',
                'contact_phone_number' => '283456797',
                'contact_mobile_number' => '982345686',
                'contact_email' => 'bernardo.queiros@email.pt',
                'contact_default' => true
            ],

            // Cliente 10073
            [
                'contact_third_party_code' => '10073',
                'contact_description' => 'Geral',
                'contact_phone_number' => '293456797',
                'contact_mobile_number' => '992345686',
                'contact_email' => 'julia.figueira@empresa.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10073',
                'contact_description' => 'Vendas',
                'contact_phone_number' => '293456798',
                'contact_mobile_number' => '992345687',
                'contact_email' => 'vendas@empresa.pt',
                'contact_default' => false
            ],

            // Cliente 10074
            [
                'contact_third_party_code' => '10074',
                'contact_description' => 'Loja',
                'contact_phone_number' => '213456798',
                'contact_mobile_number' => '912345687',
                'contact_email' => 'artur.vaz@loja.pt',
                'contact_default' => true
            ],

            // Cliente 10075
            [
                'contact_third_party_code' => '10075',
                'contact_description' => 'Principal',
                'contact_phone_number' => '223456798',
                'contact_mobile_number' => '922345687',
                'contact_email' => 'vitoria.aguiar@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10075',
                'contact_description' => 'Secundário',
                'contact_phone_number' => '',
                'contact_mobile_number' => '922345688',
                'contact_email' => 'vaguiar@secundario.pt',
                'contact_default' => false
            ],

            // Cliente 10076
            [
                'contact_third_party_code' => '10076',
                'contact_description' => 'Geral',
                'contact_phone_number' => '233456798',
                'contact_mobile_number' => '932345687',
                'contact_email' => 'sebastiao.melo@negocio.pt',
                'contact_default' => true
            ],

            // Cliente 10077
            [
                'contact_third_party_code' => '10077',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '243456798',
                'contact_mobile_number' => '942345687',
                'contact_email' => 'aurora.pires@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10077',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '942345688',
                'contact_email' => 'apires@pessoal.pt',
                'contact_default' => false
            ],

            // Cliente 10078
            [
                'contact_third_party_code' => '10078',
                'contact_description' => 'Principal',
                'contact_phone_number' => '253456798',
                'contact_mobile_number' => '952345687',
                'contact_email' => 'gaspar.faria@email.pt',
                'contact_default' => true
            ],

            // Cliente 10079
            [
                'contact_third_party_code' => '10079',
                'contact_description' => 'Loja',
                'contact_phone_number' => '263456798',
                'contact_mobile_number' => '962345687',
                'contact_email' => 'amelia.nunes@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10079',
                'contact_description' => 'Online',
                'contact_phone_number' => '',
                'contact_mobile_number' => '',
                'contact_email' => 'anunes@online.pt',
                'contact_default' => false
            ],

            // Cliente 10080
            [
                'contact_third_party_code' => '10080',
                'contact_description' => 'Geral',
                'contact_phone_number' => '273456798',
                'contact_mobile_number' => '972345687',
                'contact_email' => 'joaquim.amorim@empresa.pt',
                'contact_default' => true
            ],

            // Cliente 10081
            [
                'contact_third_party_code' => '10081',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '283456798',
                'contact_mobile_number' => '982345687',
                'contact_email' => 'ema.batista@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10081',
                'contact_description' => 'Móvel',
                'contact_phone_number' => '',
                'contact_mobile_number' => '982345688',
                'contact_email' => 'ebatista@movel.pt',
                'contact_default' => false
            ],

            // Cliente 10082
            [
                'contact_third_party_code' => '10082',
                'contact_description' => 'Principal',
                'contact_phone_number' => '293456798',
                'contact_mobile_number' => '992345687',
                'contact_email' => 'valentim.couto@email.pt',
                'contact_default' => true
            ],

            // Cliente 10083
            [
                'contact_third_party_code' => '10083',
                'contact_description' => 'Geral',
                'contact_phone_number' => '213456799',
                'contact_mobile_number' => '912345688',
                'contact_email' => 'iris.varela@negocio.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10083',
                'contact_description' => 'Suporte',
                'contact_phone_number' => '213456800',
                'contact_mobile_number' => '912345689',
                'contact_email' => 'suporte@negocio.pt',
                'contact_default' => false
            ],

            // Cliente 10084
            [
                'contact_third_party_code' => '10084',
                'contact_description' => 'Loja',
                'contact_phone_number' => '223456799',
                'contact_mobile_number' => '922345688',
                'contact_email' => 'davi.paiva@loja.pt',
                'contact_default' => true
            ],

            // Cliente 10085
            [
                'contact_third_party_code' => '10085',
                'contact_description' => 'Principal',
                'contact_phone_number' => '233456799',
                'contact_mobile_number' => '932345688',
                'contact_email' => 'vera.andrade@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10085',
                'contact_description' => 'Alternativo',
                'contact_phone_number' => '233456800',
                'contact_mobile_number' => '932345689',
                'contact_email' => 'vandrade@alt.pt',
                'contact_default' => false
            ],

            // Cliente 10086
            [
                'contact_third_party_code' => '10086',
                'contact_description' => 'Geral',
                'contact_phone_number' => '243456799',
                'contact_mobile_number' => '942345688',
                'contact_email' => 'renato.barros@empresa.pt',
                'contact_default' => true
            ],

            // Cliente 10087
            [
                'contact_third_party_code' => '10087',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '253456799',
                'contact_mobile_number' => '952345688',
                'contact_email' => 'bianca.mendes@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10087',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '952345689',
                'contact_email' => 'bmendes@pessoal.pt',
                'contact_default' => false
            ],

            // Cliente 10088
            [
                'contact_third_party_code' => '10088',
                'contact_description' => 'Principal',
                'contact_phone_number' => '263456799',
                'contact_mobile_number' => '962345688',
                'contact_email' => 'cristiano.fonseca@email.pt',
                'contact_default' => true
            ],

            // Cliente 10089
            [
                'contact_third_party_code' => '10089',
                'contact_description' => 'Loja',
                'contact_phone_number' => '273456799',
                'contact_mobile_number' => '972345688',
                'contact_email' => 'carminho.alves@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10089',
                'contact_description' => 'Armazém',
                'contact_phone_number' => '273456800',
                'contact_mobile_number' => '',
                'contact_email' => 'armazem@loja.pt',
                'contact_default' => false
            ],

            // Cliente 10090
            [
                'contact_third_party_code' => '10090',
                'contact_description' => 'Geral',
                'contact_phone_number' => '283456799',
                'contact_mobile_number' => '982345688',
                'contact_email' => 'rafael.viegas@negocio.pt',
                'contact_default' => true
            ],

            // Cliente 10091
            [
                'contact_third_party_code' => '10091',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '293456799',
                'contact_mobile_number' => '992345688',
                'contact_email' => 'ines.cordeiro@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10091',
                'contact_description' => 'Móvel',
                'contact_phone_number' => '',
                'contact_mobile_number' => '992345689',
                'contact_email' => 'icordeiro@movel.pt',
                'contact_default' => false
            ],

            // Cliente 10092
            [
                'contact_third_party_code' => '10092',
                'contact_description' => 'Principal',
                'contact_phone_number' => '213456801',
                'contact_mobile_number' => '912345690',
                'contact_email' => 'tiago.barbosa@email.pt',
                'contact_default' => true
            ],

            // Cliente 10093
            [
                'contact_third_party_code' => '10093',
                'contact_description' => 'Geral',
                'contact_phone_number' => '223456801',
                'contact_mobile_number' => '922345690',
                'contact_email' => 'matilde.freitas@empresa.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10093',
                'contact_description' => 'Vendas',
                'contact_phone_number' => '223456802',
                'contact_mobile_number' => '922345691',
                'contact_email' => 'vendas@empresa.pt',
                'contact_default' => false
            ],

            // Cliente 10094
            [
                'contact_third_party_code' => '10094',
                'contact_description' => 'Loja',
                'contact_phone_number' => '233456801',
                'contact_mobile_number' => '932345690',
                'contact_email' => 'david.baptista@loja.pt',
                'contact_default' => true
            ],

            [
                'contact_third_party_code' => '10095',
                'contact_description' => 'Principal',
                'contact_phone_number' => '243456801',
                'contact_mobile_number' => '942345690',
                'contact_email' => 'leonor.guerreiro@email.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10095',
                'contact_description' => 'Secundário',
                'contact_phone_number' => '',
                'contact_mobile_number' => '942345691',
                'contact_email' => 'lguerreiro@secundario.pt',
                'contact_default' => false
            ],
            
            // Cliente 10096
            [
                'contact_third_party_code' => '10096',
                'contact_description' => 'Geral',
                'contact_phone_number' => '253456801',
                'contact_mobile_number' => '952345690',
                'contact_email' => 'joao.castro@negocio.pt',
                'contact_default' => true
            ],
            
            // Cliente 10097
            [
              'contact_third_party_code' => '10097',
                'contact_description' => 'Escritório',
                'contact_phone_number' => '263456801',
                'contact_mobile_number' => '962345690',
                'contact_email' => 'ana.melo@central.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10097',
                'contact_description' => 'Pessoal',
                'contact_phone_number' => '',
                'contact_mobile_number' => '962345691',
                'contact_email' => 'amelo@pessoal.pt',
                'contact_default' => false
            ],
            
            // Cliente 10098
            [
                'contact_third_party_code' => '10098',
                'contact_description' => 'Principal',
                'contact_phone_number' => '273456801',
                'contact_mobile_number' => '972345690',
                'contact_email' => 'diogo.neves@email.pt',
                'contact_default' => true
            ],
            
            // Cliente 10099
            [
                'contact_third_party_code' => '10099',
                'contact_description' => 'Loja',
                'contact_phone_number' => '283456801',
                'contact_mobile_number' => '982345690',
                'contact_email' => 'margarida.martins@loja.pt',
                'contact_default' => true
            ],
            [
                'contact_third_party_code' => '10099',
                'contact_description' => 'Online',
                'contact_phone_number' => '',
                'contact_mobile_number' => '',
                'contact_email' => 'mmartins@online.pt',
                'contact_default' => false
            ],
            
            // Cliente 10100
            [
                'contact_third_party_code' => '10100',
                'contact_description' => 'Geral',
                'contact_phone_number' => '293456801',
                'contact_mobile_number' => '992345690',
                'contact_email' => 'francisco.pinheiro@empresa.pt',
                'contact_default' => true
            ]
        ];

        $vehicles = [
            // Cliente 10001
            [
                'vehicle_third_party_code' => '10001',
                'vehicle_license_plate' => '11-AA-11',
                'vehicle_brand' => 'Renault',
                'vehicle_model' => 'Clio',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'VF15RPA1234567890'
            ],
            [
                'vehicle_third_party_code' => '10001',
                'vehicle_license_plate' => '22-BB-22',
                'vehicle_brand' => 'Peugeot',
                'vehicle_model' => '208',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'VF3CCBHY9876543210'
            ],

            // Cliente 10002
            [
                'vehicle_third_party_code' => '10002',
                'vehicle_license_plate' => '33-CC-33',
                'vehicle_brand' => 'Volkswagen',
                'vehicle_model' => 'Golf',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WVWZZZAU1234567890'
            ],

            // Cliente 10003
            [
                'vehicle_third_party_code' => '10003',
                'vehicle_license_plate' => '44-DD-44',
                'vehicle_brand' => 'Mercedes-Benz',
                'vehicle_model' => 'Classe A',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'WDD1770841234567890'
            ],
            [
                'vehicle_third_party_code' => '10003',
                'vehicle_license_plate' => '55-EE-55',
                'vehicle_brand' => 'BMW',
                'vehicle_model' => 'Série 3',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WBA5A11234567890'
            ],

            // Cliente 10004
            [
                'vehicle_third_party_code' => '10004',
                'vehicle_license_plate' => '66-FF-66',
                'vehicle_brand' => 'Fiat',
                'vehicle_model' => '500',
                'vehicle_year' => 2018,
                'vehicle_chassi' => 'ZFA3120000P1234567'
            ],

            // Cliente 10005
            [
                'vehicle_third_party_code' => '10005',
                'vehicle_license_plate' => '77-GG-77',
                'vehicle_brand' => 'Opel',
                'vehicle_model' => 'Corsa',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'W0L0XEP6812345678'
            ],
            [
                'vehicle_third_party_code' => '10005',
                'vehicle_license_plate' => '88-HH-88',
                'vehicle_brand' => 'Ford',
                'vehicle_model' => 'Focus',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'WF0GXXGBB1234567890'
            ],

            // Cliente 10006
            [
                'vehicle_third_party_code' => '10006',
                'vehicle_license_plate' => '99-II-99',
                'vehicle_brand' => 'Seat',
                'vehicle_model' => 'Ibiza',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'VSSZZZ6JZ1234567890'
            ],

            // Cliente 10007
            [
                'vehicle_third_party_code' => '10007',
                'vehicle_license_plate' => '10-JJ-10',
                'vehicle_brand' => 'Citroën',
                'vehicle_model' => 'C3',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'VF7SXHMZ6L1234567890'
            ],

            // Cliente 10008
            [
                'vehicle_third_party_code' => '10008',
                'vehicle_license_plate' => '20-KK-20',
                'vehicle_brand' => 'Toyota',
                'vehicle_model' => 'Yaris',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'JTDKG3EA6012345678'
            ],
            [
                'vehicle_third_party_code' => '10008',
                'vehicle_license_plate' => '30-LL-30',
                'vehicle_brand' => 'Nissan',
                'vehicle_model' => 'Qashqai',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'SJNFAAJ11U1234567'
            ],

            // Cliente 10009
            [
                'vehicle_third_party_code' => '10009',
                'vehicle_license_plate' => '40-MM-40',
                'vehicle_brand' => 'Audi',
                'vehicle_model' => 'A3',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WAUZZZ8V1234567890'
            ],

            // Cliente 10010
            [
                'vehicle_third_party_code' => '10010',
                'vehicle_license_plate' => '50-NN-50',
                'vehicle_brand' => 'Skoda',
                'vehicle_model' => 'Octavia',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'TMBEG7NE1234567890'
            ],
            [
                'vehicle_third_party_code' => '10010',
                'vehicle_license_plate' => '60-OO-60',
                'vehicle_brand' => 'Hyundai',
                'vehicle_model' => 'i20',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'TMAJ381ABCDEFGHIJK'
            ],

            // Cliente 10011
            [
                'vehicle_third_party_code' => '10011',
                'vehicle_license_plate' => '70-PP-70',
                'vehicle_brand' => 'Renault',
                'vehicle_model' => 'Captur',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'VF12345678901234'
            ],
            [
                'vehicle_third_party_code' => '10011',
                'vehicle_license_plate' => '80-QQ-80',
                'vehicle_brand' => 'Peugeot',
                'vehicle_model' => '3008',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'VF30987654321098'
            ],

            // Cliente 10012
            [
                'vehicle_third_party_code' => '10012',
                'vehicle_license_plate' => '90-RR-90',
                'vehicle_brand' => 'Volkswagen',
                'vehicle_model' => 'Polo',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'WVWZZZ6RZKU123456'
            ],

            // Cliente 10013
            [
                'vehicle_third_party_code' => '10013',
                'vehicle_license_plate' => '11-SS-11',
                'vehicle_brand' => 'Mercedes-Benz',
                'vehicle_model' => 'GLA',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'WDC1569421J123456'
            ],

            // Cliente 10014
            [
                'vehicle_third_party_code' => '10014',
                'vehicle_license_plate' => '22-TT-22',
                'vehicle_brand' => 'BMW',
                'vehicle_model' => 'X1',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WBAJC310X0L123456'
            ],
            [
                'vehicle_third_party_code' => '10014',
                'vehicle_license_plate' => '33-UU-33',
                'vehicle_brand' => 'Fiat',
                'vehicle_model' => 'Tipo',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'ZFA35600006123456'
            ],

            // Cliente 10015
            [
                'vehicle_third_party_code' => '10015',
                'vehicle_license_plate' => '44-VV-44',
                'vehicle_brand' => 'Opel',
                'vehicle_model' => 'Astra',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'W0LPE8E75K6123456'
            ],

            // Cliente 10016
            [
                'vehicle_third_party_code' => '10016',
                'vehicle_license_plate' => '55-WW-55',
                'vehicle_brand' => 'Ford',
                'vehicle_model' => 'Fiesta',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WF0JXXGAHJU123456'
            ],
            [
                'vehicle_third_party_code' => '10016',
                'vehicle_license_plate' => '66-XX-66',
                'vehicle_brand' => 'Seat',
                'vehicle_model' => 'Leon',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'VSSZZZ5FZLR123456'
            ],

            // Cliente 10017
            [
                'vehicle_third_party_code' => '10017',
                'vehicle_license_plate' => '77-YY-77',
                'vehicle_brand' => 'Citroën',
                'vehicle_model' => 'C4',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'VF73ARHSRMS123456'
            ],

            // Cliente 10018
            [
                'vehicle_third_party_code' => '10018',
                'vehicle_license_plate' => '88-ZZ-88',
                'vehicle_brand' => 'Toyota',
                'vehicle_model' => 'Corolla',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'SB1ZA3BE10E123456'
            ],

            // Cliente 10019
            [
                'vehicle_third_party_code' => '10019',
                'vehicle_license_plate' => '99-AB-99',
                'vehicle_brand' => 'Nissan',
                'vehicle_model' => 'Micra',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'VNVK280ZZN6123456'
            ],
            [
                'vehicle_third_party_code' => '10019',
                'vehicle_license_plate' => '12-BC-12',
                'vehicle_brand' => 'Audi',
                'vehicle_model' => 'Q3',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WAUZZZF33N1123456'
            ],

            // Cliente 10020
            [
                'vehicle_third_party_code' => '10020',
                'vehicle_license_plate' => '23-CD-23',
                'vehicle_brand' => 'Skoda',
                'vehicle_model' => 'Fabia',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'TMBEJ6NJ7LZ123456'
            ],

            // Cliente 10021
            [
                'vehicle_third_party_code' => '10021',
                'vehicle_license_plate' => '34-DE-34',
                'vehicle_brand' => 'Hyundai',
                'vehicle_model' => 'Tucson',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'TMAJ3812NJ123456'
            ],
            [
                'vehicle_third_party_code' => '10021',
                'vehicle_license_plate' => '45-EF-45',
                'vehicle_brand' => 'Kia',
                'vehicle_model' => 'Ceed',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'U5YHN813ALK123456'
            ],

            // Cliente 10022
            [
                'vehicle_third_party_code' => '10022',
                'vehicle_license_plate' => '56-FG-56',
                'vehicle_brand' => 'Mazda',
                'vehicle_model' => 'CX-30',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'JMZDM72Y6L1123456'
            ],

            // Cliente 10023
            [
                'vehicle_third_party_code' => '10023',
                'vehicle_license_plate' => '67-GH-67',
                'vehicle_brand' => 'Volvo',
                'vehicle_model' => 'XC40',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'YV1XZA80CK2123456'
            ],

            // Cliente 10024
            [
                'vehicle_third_party_code' => '10024',
                'vehicle_license_plate' => '78-HI-78',
                'vehicle_brand' => 'Dacia',
                'vehicle_model' => 'Sandero',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'UU18SDHN5L1123456'
            ],
            [
                'vehicle_third_party_code' => '10024',
                'vehicle_license_plate' => '89-IJ-89',
                'vehicle_brand' => 'Suzuki',
                'vehicle_model' => 'Swift',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'TSMNZA33S0R123456'
            ],

            // Cliente 10025
            [
                'vehicle_third_party_code' => '10025',
                'vehicle_license_plate' => '90-JK-90',
                'vehicle_brand' => 'Mini',
                'vehicle_model' => 'Cooper',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'WMWXU310X0T123456'
            ],

            // Cliente 10026
            [
                'vehicle_third_party_code' => '10026',
                'vehicle_license_plate' => '10-KL-10',
                'vehicle_brand' => 'Jeep',
                'vehicle_model' => 'Renegade',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'ZACCJABB7HP123456'
            ],
            [
                'vehicle_third_party_code' => '10026',
                'vehicle_license_plate' => '20-LM-20',
                'vehicle_brand' => 'Alfa Romeo',
                'vehicle_model' => 'Giulietta',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'ZAR94000007123456'
            ],

            // Cliente 10027
            [
                'vehicle_third_party_code' => '10027',
                'vehicle_license_plate' => '30-MN-30',
                'vehicle_brand' => 'Honda',
                'vehicle_model' => 'Jazz',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'SHHMT6870KU123456'
            ],

            // Cliente 10028
            [
                'vehicle_third_party_code' => '10028',
                'vehicle_license_plate' => '40-NO-40',
                'vehicle_brand' => 'Mitsubishi',
                'vehicle_model' => 'Space Star',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'MMAXTA03AKU123456'
            ],

            // Cliente 10029
            [
                'vehicle_third_party_code' => '10029',
                'vehicle_license_plate' => '50-OP-50',
                'vehicle_brand' => 'Renault',
                'vehicle_model' => 'Megane',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'VF1RFB00X67123456'
            ],
            [
                'vehicle_third_party_code' => '10029',
                'vehicle_license_plate' => '60-PQ-60',
                'vehicle_brand' => 'Peugeot',
                'vehicle_model' => '2008',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'VF3CUYHYP6M123456'
            ],

            // Cliente 10030
            [
                'vehicle_third_party_code' => '10030',
                'vehicle_license_plate' => '70-QR-70',
                'vehicle_brand' => 'Volkswagen',
                'vehicle_model' => 'T-Roc',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WVGZZZA1ZLV123456'
            ],

            // Cliente 10031
            [
                'vehicle_third_party_code' => '10031',
                'vehicle_license_plate' => '80-RS-80',
                'vehicle_brand' => 'Mercedes-Benz',
                'vehicle_model' => 'CLA',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WDD1183421N123456'
            ],
            [
                'vehicle_third_party_code' => '10031',
                'vehicle_license_plate' => '90-ST-90',
                'vehicle_brand' => 'BMW',
                'vehicle_model' => 'X3',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'WBAAT310X0L123456'
            ],

            // Cliente 10032
            [
                'vehicle_third_party_code' => '10032',
                'vehicle_license_plate' => '11-TU-11',
                'vehicle_brand' => 'Fiat',
                'vehicle_model' => 'Panda',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'ZFA16900001123456'
            ],

            // Cliente 10033
            [
                'vehicle_third_party_code' => '10033',
                'vehicle_license_plate' => '22-UV-22',
                'vehicle_brand' => 'Opel',
                'vehicle_model' => 'Crossland',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'W0VBE2EK8L4123456'
            ],

            // Cliente 10034
            [
                'vehicle_third_party_code' => '10034',
                'vehicle_license_plate' => '33-VW-33',
                'vehicle_brand' => 'Ford',
                'vehicle_model' => 'Puma',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WF0JXXGAHJU123456'
            ],
            [
                'vehicle_third_party_code' => '10034',
                'vehicle_license_plate' => '44-WX-44',
                'vehicle_brand' => 'Seat',
                'vehicle_model' => 'Arona',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'VSSZZZKJZPR123456'
            ],

            // Cliente 10035
            [
                'vehicle_third_party_code' => '10035',
                'vehicle_license_plate' => '55-XY-55',
                'vehicle_brand' => 'Citroën',
                'vehicle_model' => 'C3 Aircross',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'VF72RHNPRKJ123456'
            ],

            // Cliente 10036
            [
                'vehicle_third_party_code' => '10036',
                'vehicle_license_plate' => '66-YZ-66',
                'vehicle_brand' => 'Toyota',
                'vehicle_model' => 'CH-R',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'JTNKG3H30L1123456'
            ],
            [
                'vehicle_third_party_code' => '10036',
                'vehicle_license_plate' => '77-ZA-77',
                'vehicle_brand' => 'Nissan',
                'vehicle_model' => 'Juke',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'SJNFCAF15U6123456'
            ],

            // Cliente 10037
            [
                'vehicle_third_party_code' => '10037',
                'vehicle_license_plate' => '88-AB-88',
                'vehicle_brand' => 'Audi',
                'vehicle_model' => 'A4',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'WAUZZZF43N1123456'
            ],

            // Cliente 10038
            [
                'vehicle_third_party_code' => '10038',
                'vehicle_license_plate' => '99-BC-99',
                'vehicle_brand' => 'Skoda',
                'vehicle_model' => 'Kamiq',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'TMBGR6NW3LZ123456'
            ],

            // Cliente 10039
            [
                'vehicle_third_party_code' => '10039',
                'vehicle_license_plate' => '12-CD-12',
                'vehicle_brand' => 'Hyundai',
                'vehicle_model' => 'Kona',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'TMAJ381CAJJ123456'
            ],
            [
                'vehicle_third_party_code' => '10039',
                'vehicle_license_plate' => '23-DE-23',
                'vehicle_brand' => 'Kia',
                'vehicle_model' => 'Stonic',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'KNAPG814BL7123456'
            ],

            // Cliente 10040
            [
                'vehicle_third_party_code' => '10040',
                'vehicle_license_plate' => '34-EF-34',
                'vehicle_brand' => 'Mazda',
                'vehicle_model' => 'CX-3',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'JMZDK6W7A01123456'
            ],

            // Cliente 10041
            [
                'vehicle_third_party_code' => '10041',
                'vehicle_license_plate' => '45-FG-45',
                'vehicle_brand' => 'Volvo',
                'vehicle_model' => 'XC60',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'YV1UZ88UCJ1123456'
            ],

            // Cliente 10042
            [
                'vehicle_third_party_code' => '10042',
                'vehicle_license_plate' => '56-GH-56',
                'vehicle_brand' => 'Dacia',
                'vehicle_model' => 'Duster',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'VF1HJD40X67123456'
            ],
            [
                'vehicle_third_party_code' => '10042',
                'vehicle_license_plate' => '67-HI-67',
                'vehicle_brand' => 'Suzuki',
                'vehicle_model' => 'Vitara',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'TSMLYD21S0R123456'
            ],

            // Cliente 10043
            [
                'vehicle_third_party_code' => '10043',
                'vehicle_license_plate' => '78-IJ-78',
                'vehicle_brand' => 'Mini',
                'vehicle_model' => 'Countryman',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WMWXU310X0T123456'
            ],

            // Cliente 10044
            [
                'vehicle_third_party_code' => '10044',
                'vehicle_license_plate' => '89-JK-89',
                'vehicle_brand' => 'Jeep',
                'vehicle_model' => 'Compass',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'ZACCJABB7HP123456'
            ],
            [
                'vehicle_third_party_code' => '10044',
                'vehicle_license_plate' => '90-KL-90',
                'vehicle_brand' => 'Alfa Romeo',
                'vehicle_model' => 'Stelvio',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'ZARGFABN0J7123456'
            ],

            // Cliente 10045
            [
                'vehicle_third_party_code' => '10045',
                'vehicle_license_plate' => '10-LM-10',
                'vehicle_brand' => 'Honda',
                'vehicle_model' => 'Civic',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'SHHFK7H60KU123456'
            ],

            // Cliente 10046
            [
                'vehicle_third_party_code' => '10046',
                'vehicle_license_plate' => '20-MN-20',
                'vehicle_brand' => 'Mitsubishi',
                'vehicle_model' => 'Eclipse Cross',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'JMYXTGA2WLZ123456'
            ],

            // Cliente 10047
            [
                'vehicle_third_party_code' => '10047',
                'vehicle_license_plate' => '30-NO-30',
                'vehicle_brand' => 'Renault',
                'vehicle_model' => 'Kadjar',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'VF1RFE00X67123456'
            ],
            [
                'vehicle_third_party_code' => '10047',
                'vehicle_license_plate' => '40-OP-40',
                'vehicle_brand' => 'Peugeot',
                'vehicle_model' => '5008',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'VF3MRHNS6KS123456'
            ],

            // Cliente 10048
            [
                'vehicle_third_party_code' => '10048',
                'vehicle_license_plate' => '50-PQ-50',
                'vehicle_brand' => 'Volkswagen',
                'vehicle_model' => 'Tiguan',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WVGZZZ5NZLW123456'
            ],

            // Cliente 10049
            [
                'vehicle_third_party_code' => '10049',
                'vehicle_license_plate' => '60-QR-60',
                'vehicle_brand' => 'Mercedes-Benz',
                'vehicle_model' => 'GLC',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WDC2051421R123456'
            ],

            // Cliente 10050
            [
                'vehicle_third_party_code' => '10050',
                'vehicle_license_plate' => '70-RS-70',
                'vehicle_brand' => 'BMW',
                'vehicle_model' => 'X5',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'WBACT310X0L123456'
            ],
            [
                'vehicle_third_party_code' => '10050',
                'vehicle_license_plate' => '80-ST-80',
                'vehicle_brand' => 'Fiat',
                'vehicle_model' => '500X',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'ZFA3340000P123456'
            ],

            // Cliente 10051
            [
                'vehicle_third_party_code' => '10051',
                'vehicle_license_plate' => '90-TU-90',
                'vehicle_brand' => 'Opel',
                'vehicle_model' => 'Grandland X',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'W0VZRHHN6L1123456'
            ],

            // Cliente 10052
            [
                'vehicle_third_party_code' => '10052',
                'vehicle_license_plate' => '11-UV-11',
                'vehicle_brand' => 'Ford',
                'vehicle_model' => 'Kuga',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WF0AXXWPMAU123456'
            ],
            [
                'vehicle_third_party_code' => '10052',
                'vehicle_license_plate' => '22-VW-22',
                'vehicle_brand' => 'Seat',
                'vehicle_model' => 'Ateca',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'VSSZZZNLZPR123456'
            ],

            // Cliente 10053
            [
                'vehicle_third_party_code' => '10053',
                'vehicle_license_plate' => '33-WX-33',
                'vehicle_brand' => 'Citroën',
                'vehicle_model' => 'C5 Aircross',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'VF73DHNPRKJ123456'
            ],

            // Cliente 10054
            [
                'vehicle_third_party_code' => '10054',
                'vehicle_license_plate' => '44-XY-44',
                'vehicle_brand' => 'Toyota',
                'vehicle_model' => 'RAV4',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'JTMRFREV20D123456'
            ],

            // Cliente 10055
            [
                'vehicle_third_party_code' => '10055',
                'vehicle_license_plate' => '55-YZ-55',
                'vehicle_brand' => 'Nissan',
                'vehicle_model' => 'X-Trail',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'JN1TBAT32U0123456'
            ],
            [
                'vehicle_third_party_code' => '10055',
                'vehicle_license_plate' => '66-ZA-66',
                'vehicle_brand' => 'Audi',
                'vehicle_model' => 'Q5',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'WAUZZZFY6J1123456'
            ],

            // Cliente 10056
            [
                'vehicle_third_party_code' => '10056',
                'vehicle_license_plate' => '77-AB-77',
                'vehicle_brand' => 'Skoda',
                'vehicle_model' => 'Kodiaq',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'TMBLJ7NS3JJ123456'
            ],

            // Cliente 10057
            [
                'vehicle_third_party_code' => '10057',
                'vehicle_license_plate' => '88-BC-88',
                'vehicle_brand' => 'Hyundai',
                'vehicle_model' => 'Santa Fe',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'TMAJ381CAJJ123456'
            ],
            [
                'vehicle_third_party_code' => '10057',
                'vehicle_license_plate' => '99-CD-99',
                'vehicle_brand' => 'Kia',
                'vehicle_model' => 'Sportage',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'U5YPG814ALK123456'
            ],

            // Cliente 10058
            [
                'vehicle_third_party_code' => '10058',
                'vehicle_license_plate' => '12-DE-12',
                'vehicle_brand' => 'Mazda',
                'vehicle_model' => 'CX-5',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'JMZKF6W7A01123456'
            ],

            // Cliente 10059
            [
                'vehicle_third_party_code' => '10059',
                'vehicle_license_plate' => '23-EF-23',
                'vehicle_brand' => 'Volvo',
                'vehicle_model' => 'V60',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'YV1ZW68UCJ1123456'
            ],

            // Cliente 10060
            [
                'vehicle_third_party_code' => '10060',
                'vehicle_license_plate' => '34-FG-34',
                'vehicle_brand' => 'Dacia',
                'vehicle_model' => 'Lodgy',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'UU18SDHN5L1123456'
            ],
            [
                'vehicle_third_party_code' => '10060',
                'vehicle_license_plate' => '45-GH-45',
                'vehicle_brand' => 'Suzuki',
                'vehicle_model' => 'S-Cross',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'TSMJYA4M0LR123456'
            ],

            // Cliente 10061
            [
                'vehicle_third_party_code' => '10061',
                'vehicle_license_plate' => '56-HI-56',
                'vehicle_brand' => 'Mini',
                'vehicle_model' => 'Clubman',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WMWXU310X0T123456'
            ],

            // Cliente 10062
            [
                'vehicle_third_party_code' => '10062',
                'vehicle_license_plate' => '67-IJ-67',
                'vehicle_brand' => 'Jeep',
                'vehicle_model' => 'Cherokee',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'ZACCJBBB7HP123456'
            ],

            // Cliente 10063
            [
                'vehicle_third_party_code' => '10063',
                'vehicle_license_plate' => '78-JK-78',
                'vehicle_brand' => 'Alfa Romeo',
                'vehicle_model' => 'Tonale',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'ZARGFABN0J7123456'
            ],
            [
                'vehicle_third_party_code' => '10063',
                'vehicle_license_plate' => '89-KL-89',
                'vehicle_brand' => 'Honda',
                'vehicle_model' => 'HR-V',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'SHHRU6850KU123456'
            ],

            // Cliente 10064
            [
                'vehicle_third_party_code' => '10064',
                'vehicle_license_plate' => '90-LM-90',
                'vehicle_brand' => 'Mitsubishi',
                'vehicle_model' => 'ASX',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'JMYXTGA2WLU123456'
            ],

            // Cliente 10065
            [
                'vehicle_third_party_code' => '10065',
                'vehicle_license_plate' => '10-MN-10',
                'vehicle_brand' => 'Renault',
                'vehicle_model' => 'Arkana',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'VF1RJLUH67Y123456'
            ],
            [
                'vehicle_third_party_code' => '10065',
                'vehicle_license_plate' => '20-NO-20',
                'vehicle_brand' => 'Peugeot',
                'vehicle_model' => '308',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'VF3LRHNS6KS123456'
            ],

            // Cliente 10066
            [
                'vehicle_third_party_code' => '10066',
                'vehicle_license_plate' => '30-OP-30',
                'vehicle_brand' => 'Volkswagen',
                'vehicle_model' => 'ID.3',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WVWZZZEX1MP123456'
            ],

            // Cliente 10067
            [
                'vehicle_third_party_code' => '10067',
                'vehicle_license_plate' => '40-PQ-40',
                'vehicle_brand' => 'Mercedes-Benz',
                'vehicle_model' => 'EQA',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WDC2431201F123456'
            ],

            // Cliente 10068
            [
                'vehicle_third_party_code' => '10068',
                'vehicle_license_plate' => '50-QR-50',
                'vehicle_brand' => 'BMW',
                'vehicle_model' => 'i3',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'WBY8P210X0V123456'
            ],
            [
                'vehicle_third_party_code' => '10068',
                'vehicle_license_plate' => '60-RS-60',
                'vehicle_brand' => 'Fiat',
                'vehicle_model' => 'Doblo',
                'vehicle_year' => 2019,
                'vehicle_chassi' => 'ZFA26300006123456'
            ],

            // Cliente 10069
            [
                'vehicle_third_party_code' => '10069',
                'vehicle_license_plate' => '70-ST-70',
                'vehicle_brand' => 'Opel',
                'vehicle_model' => 'Combo',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'W0V0ZYH25L4123456'
            ],

            // Cliente 10070
            [
                'vehicle_third_party_code' => '10070',
                'vehicle_license_plate' => '80-TU-80',
                'vehicle_brand' => 'Ford',
                'vehicle_model' => 'Transit Connect',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WF06XXTTG6M123456'
            ],

            // Cliente 10071
            [
                'vehicle_third_party_code' => '10071',
                'vehicle_license_plate' => '90-UV-90',
                'vehicle_brand' => 'Seat',
                'vehicle_model' => 'Tarraco',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'VSSZZZ5FZPR123456'
            ],

            [
                'vehicle_third_party_code' => '10071',
                'vehicle_license_plate' => '11-VW-11',
                'vehicle_brand' => 'Citroën',
                'vehicle_model' => 'Berlingo',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'VF77JBHY6LJ123456'
            ],

            // Cliente 10072
            [
                'vehicle_third_party_code' => '10072',
                'vehicle_license_plate' => '22-WX-22',
                'vehicle_brand' => 'Toyota',
                'vehicle_model' => 'Proace City',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'YARV4FSA0L1123456'
            ],

            // Cliente 10073
            [
                'vehicle_third_party_code' => '10073',
                'vehicle_license_plate' => '33-XY-33',
                'vehicle_brand' => 'Nissan',
                'vehicle_model' => 'Leaf',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'SJNFAAZE1U0123456'
            ],
            [
                'vehicle_third_party_code' => '10073',
                'vehicle_license_plate' => '44-YZ-44',
                'vehicle_brand' => 'Audi',
                'vehicle_model' => 'e-tron',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WAUZZZGE5LB123456'
            ],

            // Cliente 10074
            [
                'vehicle_third_party_code' => '10074',
                'vehicle_license_plate' => '55-ZA-55',
                'vehicle_brand' => 'Skoda',
                'vehicle_model' => 'Enyaq',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'TMBJR9NU4MZ123456'
            ],

            // Cliente 10075
            [
                'vehicle_third_party_code' => '10075',
                'vehicle_license_plate' => '66-AB-66',
                'vehicle_brand' => 'Hyundai',
                'vehicle_model' => 'Ioniq',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'KMHC851CGNU123456'
            ],

            // Cliente 10076
            [
                'vehicle_third_party_code' => '10076',
                'vehicle_license_plate' => '77-BC-77',
                'vehicle_brand' => 'Kia',
                'vehicle_model' => 'e-Niro',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'KNACC81CGM7123456'
            ],
         [
                'vehicle_third_party_code' => '10076',
                'vehicle_license_plate' => '88-CD-88',
                'vehicle_brand' => 'Mazda',
                'vehicle_model' => 'MX-30',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'JMYDM72Y6L1123456'
            ],

            // Cliente 10077
            [
                'vehicle_third_party_code' => '10077',
                'vehicle_license_plate' => '99-DE-99',
                'vehicle_brand' => 'Volvo',
                'vehicle_model' => 'XC90',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'YV1LFA8ACM1123456'
            ],

            // Cliente 10078
            [
                'vehicle_third_party_code' => '10078',
                'vehicle_license_plate' => '12-EF-12',
                'vehicle_brand' => 'Dacia',
                'vehicle_model' => 'Spring',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'UU18SDHN5M1123456'
            ],

            // Cliente 10079
            [
                'vehicle_third_party_code' => '10079',
                'vehicle_license_plate' => '23-FG-23',
                'vehicle_brand' => 'Suzuki',
                'vehicle_model' => 'Across',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'JTEAAAAH10J123456'
            ],
            [
                'vehicle_third_party_code' => '10079',
                'vehicle_license_plate' => '34-GH-34',
                'vehicle_brand' => 'Mini',
                'vehicle_model' => 'Electric',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WMWXU310X0T123456'
            ],

            // Cliente 10080
            [
                'vehicle_third_party_code' => '10080',
                'vehicle_license_plate' => '45-HI-45',
                'vehicle_brand' => 'Jeep',
                'vehicle_model' => 'Wrangler',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'ZACCJBBH7MP123456'
            ],

            // Cliente 10081
            [
                'vehicle_third_party_code' => '10081',
                'vehicle_license_plate' => '56-IJ-56',
                'vehicle_brand' => 'Alfa Romeo',
                'vehicle_model' => 'Giulia',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'ZARGFAEN0N7123456'
            ],
            [
                'vehicle_third_party_code' => '10081',
                'vehicle_license_plate' => '67-JK-67',
                'vehicle_brand' => 'Honda',
                'vehicle_model' => 'e',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'JHMZE8H30MS123456'
            ],

            // Cliente 10082
            [
                'vehicle_third_party_code' => '10082',
                'vehicle_license_plate' => '78-KL-78',
                'vehicle_brand' => 'Mitsubishi',
                'vehicle_model' => 'Outlander PHEV',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'JMYXTGH24ZZ123456'
            ],

            // Cliente 10083
            [
                'vehicle_third_party_code' => '10083',
                'vehicle_license_plate' => '89-LM-89',
                'vehicle_brand' => 'Renault',
                'vehicle_model' => 'Zoe',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'VF1AG000X67123456'
            ],

            // Cliente 10084
            [
                'vehicle_third_party_code' => '10084',
                'vehicle_license_plate' => '90-MN-90',
                'vehicle_brand' => 'Peugeot',
                'vehicle_model' => 'e-208',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'VR3UHZKX0L5123456'
            ],
         [
                'vehicle_third_party_code' => '10084',
                'vehicle_license_plate' => '10-NO-10',
                'vehicle_brand' => 'Volkswagen',
                'vehicle_model' => 'ID.4',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WVGZZZE2ZMP123456'
            ],

            // Cliente 10085
            [
                'vehicle_third_party_code' => '10085',
                'vehicle_license_plate' => '20-OP-20',
                'vehicle_brand' => 'Mercedes-Benz',
                'vehicle_model' => 'EQC',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'WDC2933241A123456'
            ],

            // Cliente 10086
            [
                'vehicle_third_party_code' => '10086',
                'vehicle_license_plate' => '30-PQ-30',
                'vehicle_brand' => 'BMW',
                'vehicle_model' => 'iX3',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WBY8P210X0V123456'
            ],

            // Cliente 10087
            [
                'vehicle_third_party_code' => '10087',
                'vehicle_license_plate' => '40-QR-40',
                'vehicle_brand' => 'Fiat',
                'vehicle_model' => 'Ducato',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'ZFA25000002123456'
            ],
            [
            'vehicle_third_party_code' => '10087',
                'vehicle_license_plate' => '50-RS-50',
                'vehicle_brand' => 'Opel',
                'vehicle_model' => 'Vivaro',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'W0VXS9EHXL1123456'
            ],

            // Cliente 10088
            [
                'vehicle_third_party_code' => '10088',
                'vehicle_license_plate' => '60-ST-60',
                'vehicle_brand' => 'Ford',
                'vehicle_model' => 'Ranger',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'WF0LMFE10M9123456'
            ],

            // Cliente 10089
            [
                'vehicle_third_party_code' => '10089',
                'vehicle_license_plate' => '70-TU-70',
                'vehicle_brand' => 'Seat',
                'vehicle_model' => 'Alhambra',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'VSSZZZ7NZPR123456'
            ],

            // Cliente 10090
            [
                'vehicle_third_party_code' => '10090',
                'vehicle_license_plate' => '80-UV-80',
                'vehicle_brand' => 'Citroën',
                'vehicle_model' => 'SpaceTourer',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'VF7VEAHXPKZ123456'
            ],
            [
            'vehicle_third_party_code' => '10090',
                'vehicle_license_plate' => '90-VW-90',
                'vehicle_brand' => 'Toyota',
                'vehicle_model' => 'Hilux',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'MR0HZ8CD0L0123456'
            ],

            // Cliente 10091
            [
                'vehicle_third_party_code' => '10091',
                'vehicle_license_plate' => '11-WX-11',
                'vehicle_brand' => 'Nissan',
                'vehicle_model' => 'Navara',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'VSKCTND23U0123456'
            ],

            // Cliente 10092
            [
                'vehicle_third_party_code' => '10092',
                'vehicle_license_plate' => '22-XY-22',
                'vehicle_brand' => 'Audi',
                'vehicle_model' => 'A6',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'WAUZZZF47LN123456'
            ],

            // Cliente 10093
            [
                'vehicle_third_party_code' => '10093',
                'vehicle_license_plate' => '33-YZ-33',
                'vehicle_brand' => 'Skoda',
                'vehicle_model' => 'Superb',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'TMBAH7NP8L7123456'
            ],
          [
                'vehicle_third_party_code' => '10093',
                'vehicle_license_plate' => '44-ZA-44',
                'vehicle_brand' => 'Hyundai',
                'vehicle_model' => 'i30',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'TMAD381CAJJ123456'
            ],

            // Cliente 10094
            [
                'vehicle_third_party_code' => '10094',
                'vehicle_license_plate' => '55-AB-55',
                'vehicle_brand' => 'Kia',
                'vehicle_model' => 'Proceed',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'U5YHN811ALK123456'
            ],

            // Cliente 10095
            [
                'vehicle_third_party_code' => '10095',
                'vehicle_license_plate' => '66-BC-66',
                'vehicle_brand' => 'Mazda',
                'vehicle_model' => '6',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'JMZGL6E13M1123456'
            ],

            // Cliente 10096
            [
                'vehicle_third_party_code' => '10096',
                'vehicle_license_plate' => '77-CD-77',
                'vehicle_brand' => 'Volvo',
                'vehicle_model' => 'S90',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'YV1PW58BCL1123456'
            ],
           [
                'vehicle_third_party_code' => '10096',
                'vehicle_license_plate' => '88-DE-88',
                'vehicle_brand' => 'Dacia',
                'vehicle_model' => 'Logan',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'UU14SDKN5L1123456'
            ],

            // Cliente 10097
            [
                'vehicle_third_party_code' => '10097',
                'vehicle_license_plate' => '99-EF-99',
                'vehicle_brand' => 'Suzuki',
                'vehicle_model' => 'Ignis',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'TSMFG21S0LR123456'
            ],

            // Cliente 10098
            [
                'vehicle_third_party_code' => '10098',
                'vehicle_license_plate' => '12-FG-12',
                'vehicle_brand' => 'Mini',
                'vehicle_model' => 'Cabrio',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'WMWXU310X0T123456'
            ],

            // Cliente 10099
            [
                'vehicle_third_party_code' => '10099',
                'vehicle_license_plate' => '23-GH-23',
                'vehicle_brand' => 'Jeep',
                'vehicle_model' => 'Gladiator',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'ZACCJBCD7LP123456'
            ],
            [
                'vehicle_third_party_code' => '10099',
                'vehicle_license_plate' => '34-HI-34',
                'vehicle_brand' => 'Alfa Romeo',
                'vehicle_model' => '4C',
                'vehicle_year' => 2021,
                'vehicle_chassi' => 'ZARGFC8X0M7123456'
            ],

            // Cliente 10100
            [
                'vehicle_third_party_code' => '10100',
                'vehicle_license_plate' => '45-IJ-45',
                'vehicle_brand' => 'Honda',
                'vehicle_model' => 'CR-V',
                'vehicle_year' => 2022,
                'vehicle_chassi' => 'SHSRE6750NU123456'
            ],
            [
                'vehicle_third_party_code' => '10100',
                'vehicle_license_plate' => '56-JK-56',
                'vehicle_brand' => 'Mitsubishi',
                'vehicle_model' => 'L200',
                'vehicle_year' => 2020,
                'vehicle_chassi' => 'MMCJJKL40LH123456'
            ],
        ];

        $this->db->table('tb_clients')->insertBatch($clients);
        $this->db->table('tb_contacts')->insertBatch($contacts);
        $this->db->table('tb_clients_vehicles')->insertBatch($vehicles);
    }
}