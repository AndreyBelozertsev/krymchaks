<?php 

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait imagesGeneration
{
    public function imagesGeneration($from, $to){
        $photos = [];
        for($i = 0; $i < rand(2, 8); $i++){
            
            $url = $this->faker->fixturesImage($from, $to . date('Y/m/d') );
            $mime=explode('/',File::mimeType(public_path( $url )));
            $photos[] = [
                'url' =>$this->faker->fixturesImage($from, $to . date('Y/m/d') ),
                'title' => fake()->word(),
                'desc' => fake()->word(),
                'filesize'=> File::size(public_path( $url ) ),
                'ext' => File::extension(public_path( $url ) ),
                'mime'=> File::mimeType(public_path( $url )),
                'mime_base'=> $mime[0],
                'mime_detail' =>  $mime[1]

            ];
        }
     
        return json_encode($photos);
    }
}

//[{"url":"storage\/images\/printed-production\/2022\/12\/13\/237ac1a166ac2660995c2f4237ac759c.jpg","title":"","desc":"","filesize":1094781,"ext":"jpg","mime":"image\/jpeg","mime_base":"image","mime_detail":"jpeg"},{"url":"storage\/images\/printed-production\/2022\/12\/13\/9e473e21a831bf1f1879bb5fe04358a0.jpg","title":"","desc":"","filesize":1398314,"ext":"jpg","mime":"image\/jpeg","mime_base":"image","mime_detail":"jpeg"}]
//["{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/57bdfd62-83ea-3653-9724-a12dbeab8676.jpg\",\"title\":\"fugit\",\"desc\":\"Aut est ut voluptate rerum neque. Nobis ducimus voluptas esse nostrum. Doloribus aperiam harum eligendi enim ut sed alias et.\"}","{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/a36a694c-026b-3012-8f3f-4209d0f353e9.jpg\",\"title\":\"voluptatum\",\"desc\":\"Voluptatem nihil dolorum alias. Suscipit quo illo fugit non ullam vel aliquid. Quia quisquam aliquid debitis nihil maxime doloremque.\"}","{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/73781212-54b8-3fa6-8354-7bca481c0be9.jpg\",\"title\":\"quas\",\"desc\":\"Repellat autem qui et. Unde consequatur dolores deserunt voluptatem rerum assumenda. Id voluptatem alias omnis nostrum temporibus occaecati.\"}","{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/30465d47-4b9a-3778-bb1a-9c096e302936.jpg\",\"title\":\"nihil\",\"desc\":\"Alias consequatur necessitatibus nostrum quo officia. Maiores id ea illo quidem cumque. Aut dolores modi et quasi voluptas cupiditate adipisci. Iste eum deleniti unde aut harum mollitia non. Est consectetur qui temporibus quaerat laboriosam.\"}","{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/ad808f4a-4188-3817-9425-7e638fe519cc.jpg\",\"title\":\"possimus\",\"desc\":\"Aspernatur veniam dolores voluptatibus odit et distinctio velit. Provident hic recusandae sint quis. Consequatur accusantium aliquam quasi eum nostrum quo ipsam amet.\"}"]
//["{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/011b54dd-2365-317a-8ced-cb2b6e015b9e.jpg\",\"title\":\"quo\",\"desc\":\"Distinctio non et voluptas dolorem quo voluptatibus error et. Quae tempore id eius omnis possimus. Corporis explicabo natus veritatis et deserunt. Ut dolores nemo provident quibusdam iusto accusantium velit enim.\"}","{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/2bd82e8b-b65b-30ef-b202-24cdcfde245c.jpg\",\"title\":\"qui\",\"desc\":\"Tempore eligendi eos quidem dolore deleniti. Vel fugit voluptatem sit est sequi totam molestiae.\"}","{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/54a527cc-3483-3c19-924a-90a359fb70ef.jpg\",\"title\":\"laudantium\",\"desc\":\"Facilis et iusto non et. Pariatur voluptatibus ex et suscipit quia.\"}","{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/a169693d-2233-3f07-ac32-65579006e029.jpg\",\"title\":\"quam\",\"desc\":\"Excepturi tenetur qui fugit molestiae voluptas ut. Eos facilis velit ut provident. Et aspernatur placeat eum ab iusto magni consequatur. Officia magnam qui neque pariatur similique.\"}","{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/23eeb52c-c8f6-3af3-b9d5-22959769a00c.jpg\",\"title\":\"itaque\",\"desc\":\"Voluptate officiis qui distinctio nesciunt. Aut quos perspiciatis pariatur quae quaerat excepturi id. Ut culpa sapiente consectetur temporibus assumenda aut vero et.\"}","{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/67d381a6-2043-300f-b14d-10869f31d1c5.jpg\",\"title\":\"atque\",\"desc\":\"Consequatur consequatur repellendus est ut quam quia. Molestiae culpa asperiores temporibus occaecati odit praesentium culpa. Ut voluptas rerum repellat ea est vero voluptatem. Minus autem iure autem voluptatem.\"}","{\"url\":\"\\\/storage\\\/images\\\/about\\\/2022\\\/12\\\/14\\\/8f34f764-377c-36dd-9075-50bfbdd2dbf2.jpg\",\"title\":\"libero\",\"desc\":\"Asperiores voluptate ut dolorem. Suscipit sit et dicta non. Asperiores enim distinctio atque non eligendi.\"}"]