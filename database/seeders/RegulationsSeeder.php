<?php

namespace Database\Seeders;

use App\Models\Regulations;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegulationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Regulations::create(
            [
                'name' => 'Куќен ред',
                'file' => 'assets/regulations/kucni_red.pdf',
                'slug' => Str::slug('Kuќen red'),
            ]
            );
        Regulations::create(
            [
                'name' => 'Задачи на дежурните ученици',
                'file' => 'assets/regulations/zadaci_dezurni.pdff',
                'slug' => Str::slug('Zadaci na dezurnite ucenici'),
            ]
            );
        Regulations::create(
            [
                'name' => 'Кодекс за однесување на учениците и наставниците',
                'file' => 'assets/regulations/ucenici_nastavnici.pdf',
                'slug' => Str::slug('Kodeks na odnesuvanje na ucenicite i nastavnicite'),
            ]
            );
        Regulations::create(
            [
                'name' => 'Кодекс за однесување на учениците за време на екскурзии',
                'file' => 'assets/regulations/ekskurzija.pdf',
                'slug' => Str::slug('Kodeks na odnesuvanje na ucenicite i nastavnicite za vreme na ekskurzii'),
            ]
            );
        Regulations::create(
            [
                'name' => 'Основни правила на однесување',
                'file' => 'assets/regulations/osnovna_pravila.pdf',
                'slug' => Str::slug('Osnovni pravila na odnesuvanje'),
            ]
            );
        Regulations::create(
            [
                'name' => 'Правила и постапки при појава на пушење и внесување и конзумирање алкохол во училиштето',
                'file' => 'assets/regulations/pusenje_alkohol.pdf',
                'slug' => Str::slug('Pravila i postapki pri pojava na pusenje i vnesuvanje i konzumiranje alkohol vo ucilisteto'),
            ]
            );
        Regulations::create(
            [
                'name' => 'Протокол за комуникација во училиштето',
                'file' => 'assets/regulations/komunikacija.pdf',
                'slug' => Str::slug('Protokol za komunikacija vo ucilisteto'),
            ]
            );
        Regulations::create(
            [
                'name' => 'Протокол за постапка за пријавување и заштита на ученик',
                'file' => 'assets/regulations/zastita_ucenika.pdf',
                'slug' => Str::slug('Protokol za postapka za prijavuvanje i zastita na ucenik'),
            ]
            );
        Regulations::create(
            [
                'name' => 'Правила на однесување',
                'file' => 'assets/regulations/pravila_na_odnesuvanje.pdf',
                'slug' => Str::slug('Pravila na odnesuvanje'),
            ]
            );
    }
}
 