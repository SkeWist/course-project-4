<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        DB::table('characters')->insert([
            array(
                'name' => 'Афросамурай',
                'voice_actor' => 'Сэмюэл Л. Джексон',
                'description' => 'На глазах юного Афро погибает его отец, Рокутаро. Его убивает некий Джастис за повязку «Номера Первого», что носил отец ребёнка. Убийца выкидывает повязку «Номера Второго» и, надев повязку его отца (№ 1), говорит мальчику, что будет ждать, когда тот будет готов бросить ему вызов. Идёт время, мальчик растёт с желанием отомстить за отца. ',
                'anime_id' => 1, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Afro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ),
            [
                'name' => 'Дзинно',
                'voice_actor' => 'Юрий Ловенталь',
                'description' => 'Юный харизматичный лидер в тайной школе мечников, хозяин которой и подобрал маленького раненого Афро. Дзинно, обладающий техникой владения двумя мечами и силой робота, практически непобедим.',
                'anime_id' => 1, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Junno.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Гатс',
                'voice_actor' => 'Дзюн Иноуэ',
                'description' => 'Чёрный мечник с проклятым клеймом. Неустанно противостоит демоническим силам и самой судьбе в борьбе за свою жизнь. Разыскивается Святым престолом, как угроза неизбежных перемен для мира. Путешествует в компании жизнерадостного и неугомонного эльфа по имени Пак, который своей пыльцой исцеляет раны Гатса. В бою использует огромный двуручный меч «Драгонслейер», метательные ножи, арбалет и металлический протез левой руки, в которой скрывает маленькую ручную пушку.',
                'anime_id' => 2, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Guts.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Гриффит',
                'voice_actor' => 'Аяко Такэути',
                'description' => 'Лидер «Банды Ястреба». Цель его жизни — стать правителем собственного королевства. Жертвовал всем ради этой цели. Необычайно красив, умён и коварен. Мастерски владеет клинком. Уважает людей, которые стремятся к своей мечте. Пытался захватить власть над Мидландом, однако всегда стремился сделать это максимально легитимно и оставаясь популярным в народе. За заслуги перед Мидландом был пожалован званием лорда-протектора. Руками Гатса уничтожил участников заговора против себя, включавшего также королеву, брата короля и министра финансов.',
                'anime_id' => 2, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Guts.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ичиго Курасаки',
                'voice_actor' => 'Масакадзу Морита',
                'description' => 'Пятнадцатилетний ученик старшей школы. С рождения способен видеть пустых и различных духов. Живёт в небольшом японском городке Каракура вместе со своим отцом Иссином и двумя младшими сёстрами: Карин и Юдзу. Мать Ичиго погибла от рук пустого во время их совместной прогулки, когда мальчику было девять лет. Винит себя в смерти матери, так как не сумел защитить её. Из-за необычного цвета волос постоянно подвергается нападениям местной банды хулиганов. После знакомства с Рукией Кучики обзавёлся силами проводника душ и помогает ей в охоте на пустых.',
                'anime_id' => 3, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Ichigo.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Айзен Сосуке',
                'voice_actor' => 'Сё Хаями',
                'description' => '',
                'anime_id' => 3, // ID аниме "Наруто"
                'audio_path' => 'Является проводником душ и капитаном пятого отряда проводников, а также одним из ключевых персонажей «Блич». Он изображен как мягкий и вежливый интеллектуал, часто улыбается.',
                'image_path' => 'character_images/Aizen.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Спайк Шпигель',
                'voice_actor' => 'Стивен Блум',
                'description' => 'бывший член преступного синдиката «Красный дракон» который завязал с криминалом, инсценировав собственную смерть после того, как влюбился в женщину по имени Джулия.',
                'anime_id' => 4, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Bebop.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => 'разыскиваемая картежница с крайне большим долгом, ставшая членом команды охотников за головами на борту корабля Бибоп, одна из главных героев мультсериала.',
                'anime_id' => 4, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Кен Такакура',
                'voice_actor' => 'Нацуки Ханаэ',
                'description' => 'Старшеклассник-интроверт, увлечённый существованием НЛО и вовсю отрицающий существование призраков. Одной из главных причин его глубокого интереса к пришельцам является его одиночество, которым Кэн страдает с самого детства. До знакомства с Момо Аясэ он ни с кем не общался и был предметом насмешек со стороны одноклассников. После неудачного спора с Момо его тело захватила Турбо-бабушка, силами которой он теперь сражается с представителями паранормальных явлений. Его зовут так же, как и любимого актёра Момо, но чаще всего его называют Окаруном.',
                'anime_id' => 5, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Dan.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Турбо-бабушка',
                'voice_actor' => 'Маюми Танака',
                'description' => 'Устрашающий дух сквернословящей бабушки. Прежде она успокаивала души юных девушек, которых настигла жестокая смерть, но теперь она крадёт гениталии тех, кто ступает на её территорию. Будучи очень быстрой, она проклинает всех, кого сможет обогнать.',
                'anime_id' => 5, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Turbo.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 6, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 6, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 7, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 7, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 8, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 8, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 9, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 9, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 10, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 10, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 11, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 11, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 12, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 12, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 13, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 13, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 14, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 14, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 15, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 15, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 16, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 16, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 17, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 17, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 18, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 18, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 19, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фэй Валентайн',
                'voice_actor' => 'Мэгуми Хаясибе',
                'description' => '',
                'anime_id' => 19, // ID аниме "Наруто"
                'audio_path' => '',
                'image_path' => 'character_images/Valentaine.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
