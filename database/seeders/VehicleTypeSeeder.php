<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\VehicleType::create([
            'name' => 'Mobil Off Road',
            'description' => 'Mobil offroad adalah kendaraan yang cocok digunakan pada medan offroad yang berat, seperti medan bebatuan, berpasir, berlumpur, dan sejenisnya. Mobil offroad memiliki kelebihan dalam kemampuan offroad, sehingga sangat cocok digunakan untuk menjelajahi daerah-daerah terpencil seperti pegunungan dan pedesaan.',
        ]);

        \App\Models\VehicleType::create([
            'name' => 'Mobil Sedan',
            'description' => 'Mobil sedan termasuk kategori mobil perkotaan dengan kapasitas lima penumpang, dilengkapi empat pintu dan memiliki bagasi khusus di bagian belakang.',
        ]);


        \App\Models\VehicleType::create([
            'name' => 'Mobil Listrik',
            'description' => 'Mobil listrik adalah mobil yang digerakkan dengan motor listrik, mobil ini digerakan oleh energi listrik yang disimpan dalam baterai atau tempat penyimpan energi lainnya.',
        ]);

        \App\Models\VehicleType::create([
            'name' => 'Mobil SUV',
            'description' => 'Mobil SUV dirancang khusus untuk melakukan perjalanan di medan terjal atau jalanan berlubang.',
        ]);

        \App\Models\VehicleType::create([
            'name' => 'Mobil Sport',
            'description' => 'Mobil sport adalah mobil yang mengutamakan pengendalian dan performanya. Pada umumnya mobil sport berbentuk coupe 2 pintu, tetapi ada pula yang merupakan versi kemampuan tinggi dari sedan atau hatchback. Bentuk coupe sendiri ada yang benar-benar 2 pintu, dan ada yang liftback 3 pintu.',
        ]);


        \App\Models\VehicleType::create([
            'name' => 'Motor Bebek',
            'description' => 'Motor bebek (Cub), adalah sepeda motor kecil yang dibangun di atas kerangka yang sebagian besar terdiri atas pipa berdiameter besar. Desain ini dikenal sebagai "step-through" di Barat.',
        ]);

        \App\Models\VehicleType::create([
            'name' => 'Motor Skuter',
            'description' => 'Sepeda motor skuter (scooter) kini paling banyak digunakan terutama Asia. Jenis motor menggunakan transmisi otomatis, sehingga lebih praktis.',
        ]);

        \App\Models\VehicleType::create([
            'name' => 'Motor Sport',
            'description' => 'Motor sport pada umumnya memiliki mesin berkapasitas lebih dari 150cc sehingga mampu digunakan untuk menempuh jarak yang jauh. Selain ketahanan jarak, motor sport juga dapat diandalkan di jalanan yang terjal atau jalan menanjak.',
        ]);


        \App\Models\VehicleType::create([
            'name' => 'Truk Colt Diesel Engkel',
            'description' => 'Jenis ini memiliki ukuran yang lebih besar namun sama-sama memiliki 2 sumbu roda yang terbaik dibagian 2 roda depan dan 2 roda belakang. Sementara untuk kapasitas muatannya bisa menampung hingga 5 ton. Di Indonesia, jenis ini lebih serung disebut sebagai truk engkel.',
        ]);

        \App\Models\VehicleType::create([
            'name' => 'Truck Colt Diesel Double',
            'description' => 'Bentuknya memang hampir sama dengan truk engkel. Namun perbedaan yang paling terlihat terletak dari jumlah roda yang digunakan, terutama pada bagian roda belakangnya yang sudah menggunakan 4 roda. Masih menggunakan 2 sumbu, tetapi pada masing-masing sumbu roda belakang menopang 2 roda. Jenis ini bisa mengangkut muatan hingga sekitar 6 ton.',
        ]);

        \App\Models\VehicleType::create([
            'name' => 'Truck Wingbox',
            'description' => 'Wingbox merupakan jenis armada yang mungkin bisa dibilang jauh lebih favorit bila dibandingkan dengan truk tronton. Sebab truk jenis ini, pengguna bisa lebih mempercepat proses bongkar dan muat barang.',
        ]);

        \App\Models\VehicleType::create([
            'name' => 'Truck Trailer',
            'description' => 'Jenis ini mungkin hanya akan ditemukan pada pabrik-pabrik kelas atas yang dalam sekali pengiriman barang bisa mencapi 20 sampai 60 ton. Trailer dibedakan dalam dua jenis yang dilihat dari jumlah sumbu dan ketinggiannya.',
        ]);
    }
}
