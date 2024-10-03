<?php

namespace Database\Seeders;

use App\Models\Propiedad;
use Illuminate\Database\Seeder;

class PropiedadSeeder extends Seeder
{
    public function run(): void
    {
        $propiedades = [
            ['Los Adoquines 100', 'Ñuñoa', 'Santiago', 8700, '3d + 2b | b visita | estar | seminuevo | terraza amplia | edif. equipado | 1 estac. + bod. | 93 / 125 m2'],
            ['Villaseca 200', 'Providencia', 'Santiago', 7000, '2d + 2b | escritorio | gran terraza | remodelado | 1 estac. en espacio común | 85 / 107 m2'],
            ['Piedra Roja 300', 'Chicureo', 'Santiago', 15750, '4d + 4b | b visita | d + b servicio | escritorio o 5to dorm. | estar | jardín con terraza, quincho y piscina | 4 estac. + bod. | 210 / 893 m2'],
            ['San Pascual 500', 'Las Condes', 'Santiago', 6200, '2d + 2b | renovado | nororiente | 1 estac. | 75 / 77 m2'],
            ['Dublé Almeyda 300', 'Ñuñoa', 'Santiago', 6000, '3d + 2b | vista despejada | 1 estac. y bodega | 90 / 98 m2'],
            ['Los Espinos 150', 'Macul', 'Santiago', 5300, '2d + 1b | vista al parque | 1 estac. | 80 / 85 m2'],
            ['Avenida Grecia 330', 'Peñalolén', 'Santiago', 7800, '3d + 3b | b servicio | cocina equipada | terraza con vista | 2 estac. + bod. | 130 / 145 m2'],
            ['Cerro Colorado 670', 'Las Condes', 'Santiago', 12500, '4d + 3b | terraza con jardín | piscina privada | 2 estac. | 220 / 400 m2'],
            ['Manuel Montt 800', 'Providencia', 'Santiago', 7200, '2d + 2b | cocina americana | 1 estac. | 90 / 95 m2'],
            ['General Holley 920', 'Providencia', 'Santiago', 9500, '3d + 3b | penthouse | terraza con vista panorámica | 2 estac. | 200 / 230 m2'],
            ['Pedro de Valdivia 123', 'Ñuñoa', 'Santiago', 6700, '2d + 2b | balcón amplio | 1 estac. | 88 / 110 m2'],
            ['Irarrázaval 456', 'Ñuñoa', 'Santiago', 7800, '3d + 3b | b visita | cocina equipada | terraza | 2 estac. | 120 / 150 m2'],
            ['Matta Oriente 789', 'Providencia', 'Santiago', 8500, '2d + 2b | vista despejada | 1 estac. | 90 / 100 m2'],
            ['Pocuro 321', 'Providencia', 'Santiago', 9600, '4d + 4b | terraza con vista | 2 estac. + bod. | 210 / 240 m2'],
            ['Simón Bolívar 654', 'La Reina', 'Santiago', 7000, '3d + 2b | jardín amplio | 2 estac. | 150 / 180 m2'],
            ['Vicuña Mackenna 876', 'Macul', 'Santiago', 5500, '2d + 2b | cocina equipada | 1 estac. | 85 / 95 m2'],
            ['Rojas Magallanes 432', 'La Florida', 'Santiago', 6200, '3d + 3b | terraza techada | 1 estac. | 125 / 150 m2'],
            ['José Pedro Alessandri 234', 'Ñuñoa', 'Santiago', 8300, '3d + 2b | vista despejada | 2 estac. | 140 / 160 m2'],
            ['Plaza Egaña 987', 'La Reina', 'Santiago', 9300, '4d + 4b | penthouse con terraza | 2 estac. + bod. | 180 / 220 m2'],
            ['Kennedy 543', 'Las Condes', 'Santiago', 15500, '4d + 4b | b visita | jardín y piscina | 4 estac. | 300 / 500 m2'],
            ['El Golf 765', 'Las Condes', 'Santiago', 18000, '5d + 5b | mansión con piscina y jardín | 4 estac. + bod. | 400 / 600 m2'],
            ['Vitacura 678', 'Vitacura', 'Santiago', 20000, '5d + 6b | gran terraza con piscina privada | 4 estac. | 450 / 650 m2'],
            ['Las Verbenas 432', 'Las Condes', 'Santiago', 8500, '3d + 3b | vista despejada | 2 estac. | 150 / 180 m2'],
            ['Padre Hurtado 876', 'La Reina', 'Santiago', 7500, '3d + 2b | cocina equipada | 1 estac. | 100 / 130 m2'],
            ['Quilín 987', 'Macul', 'Santiago', 5700, '2d + 2b | balcón amplio | 1 estac. | 90 / 110 m2'],
            ['La Dehesa 234', 'Lo Barnechea', 'Santiago', 12000, '4d + 4b | terraza con jardín | piscina privada | 3 estac. | 220 / 300 m2'],
            ['Apoquindo 432', 'Las Condes', 'Santiago', 14500, '4d + 5b | penthouse | vista panorámica | 2 estac. | 300 / 400 m2'],
            ['Tobalaba 654', 'Providencia', 'Santiago', 6900, '2d + 2b | cocina americana | 1 estac. | 80 / 100 m2'],
            ['Cristóbal Colón 876', 'Las Condes', 'Santiago', 8500, '3d + 3b | cocina equipada | 2 estac. | 160 / 190 m2'],
            ['Los Trapenses 543', 'Lo Barnechea', 'Santiago', 20000, '5d + 6b | mansión con jardín y piscina | 4 estac. | 400 / 600 m2'],
            ['Gran Avenida 765', 'San Miguel', 'Santiago', 5300, '2d + 2b | vista despejada | 1 estac. | 85 / 95 m2'],
            ['Parque Arauco 678', 'Las Condes', 'Santiago', 12000, '4d + 4b | terraza amplia con vista | 2 estac. + bod. | 200 / 300 m2'],
            ['Bellavista 432', 'Providencia', 'Santiago', 7500, '2d + 2b | balcón con vista al cerro | 1 estac. | 95 / 110 m2'],
        ];

        foreach ($propiedades as $propiedad) {
            Propiedad::create([
                'direccion' => $propiedad[0],
                'comuna' => $propiedad[1],
                'ciudad' => $propiedad[2],
                'precio' => $propiedad[3],
                'descripcion' => $propiedad[4],
            ]);
        }
    }
}

