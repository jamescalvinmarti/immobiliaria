<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);

        DB::table('zones')->insert([
            'id' => 1,
            'name' => 'La Garrotxa',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('zones')->insert([
            'id' => 2,
            'name' => 'Alt Empordà',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Pis',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Casa',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('properties')->insert([
            'id' => 1,
            'name' => 'Pis en lloguer a Figueres',
            'city' => 'Figueres',
            'address' => 'Carrer Nou, 23',
            'price' => 700,
            'surface' => 65,
            'description' => 'Habitatges amb places de garatge i traster, situades a la localitat de Figueres. Compten amb una superfície total des 44 m², distribuïts en 2 o 3 dormitoris, amb 1 o 2 banys. Disposen a més de terrassa. En els seus voltants disposen de tot tipus de comerços i serveis necessaris.',
            'status' => false,
            'published' => true,
            'category_id' => 1,
            'zone_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('properties')->insert([
            'id' => 2,
            'name' => 'Casa Rural a la Garrotxa',
            'city' => 'Montagut i Oix',
            'address' => 'Passeig Canigó',
            'price' => 400000,
            'surface' => 220,
            'description' => "Un xalet ideal per als que us agrada l'aire fresc i sou amants de la natura. Una casa àmplia amb un disseny rústic i molt càlida, amb tres habitacions i tres banys. L'entorn és privilegiat i fantàstic per gaudir en família i amics de grans àpats i barbacoesUn xalet ideal per als que us agrada l'aire fresc i sou amants de la natura. Una casa àmplia amb un disseny rústic i molt càlida, amb tres habitacions i tres banys, uns 175m2 útils d'habitatge i 1500m2 de parcel·la. L'entorn és privilegiat i fantàstic per gaudir en família i amics de grans àpats i barbacoes",
            'status' => true,
            'published' => true,
            'category_id' => 2,
            'zone_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('properties')->insert([
            'id' => 3,
            'name' => 'Casa a Empuriabrava',
            'city' => 'Empuriabrava',
            'address' => 'Carrer Carmençó, 36',
            'price' => 1100,
            'surface' => 70,
            'description' => "La casa està situada a Empuriabrava, a 9 minuts a peu de la platja d'Empuriabrava i a 1 km de la Platja Petita. Ofereix una piscina exterior i aire condicionat. Aquesta casa de vacances que ofereix cuina independent disposa de piscina privada, jardí, instal·lacions per a barbacoa i aparcament privat gratuït.",
            'status' => false,
            'published' => true,
            'category_id' => 2,
            'zone_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('images')->insert([
            'id' => 1,
            'path' => 'https://immobiliaria.s3.eu-west-3.amazonaws.com/images/5HDPRYswGgOQcW4ECor36VSo4Ef467QqjJEjKzp6.jpeg',
            'property_id' => 1,
            'filename' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('images')->insert([
            'id' => 2,
            'path' => 'https://immobiliaria.s3.eu-west-3.amazonaws.com/images/OqS92VmoObQZxQBGxAESDG5yAZOUy5w5L3pnSRd3.jpeg',
            'property_id' => 2,
            'filename' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('images')->insert([
            'id' => 3,
            'path' => 'https://immobiliaria.s3.eu-west-3.amazonaws.com/images/4jFLuHIShquaecK6Q1jNQU8tKVOevVEIaMF6NgK2.jpeg',
            'property_id' => 3,
            'filename' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
