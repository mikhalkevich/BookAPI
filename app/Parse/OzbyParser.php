<?php
namespace App\Parse;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\BookAuthor;
use App\Models\BookPublishing;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Libs\Imag;
use Illuminate\Support\Facades\App;
class OzbyParser implements ParseContract{
    use ParseTrait;
    public $crawler;
    public function getParse($url=null, $catalog_id=null){
        $file = file_get_contents($url);
        $this->crawler = new Crawler($file);
        $this->crawler->filter('.product-card')->each(function (Crawler $node, $i) use ($catalog_id) {
            $title = $this->text($node, '.product-card__title');
            $link = $this->attr($node, '.product-card__link', 'href');
            $year_str = $this->text($node,'.product-card__subtitle');
            $picture_src = $this->attr($node,'.product-card__cover-image', 'src');

            $year = null;
            $file = null;
            $description = null;
            $publisher = null;
            $author = null;
            if($year_str){
                $year_arr = explode(',', $year_str);
                $year = end($year_arr);
            }
            if($link){
                $file2 = file_get_contents($link);
                $crawler2 = new Crawler($file2);
                $description = $this->text($crawler2, '.b-description__sub');
                $isbn = $this->text($crawler2, '[itemprop="isbn"]');
                $publisher = $this->text($crawler2, '[itemprop="publisher"]');
                $author = $this->text($crawler2, '.b-product-title__inner-link');
            }

            $auhor_obj = BookAuthor::firstOrCreate([
                'name'=>$author,
            ],[
                'name'=>$author,
            ]);
            $publish_obj = BookPublishing::firstOrCreate([
                'name'=>$publisher,
            ],[
                'name'=>$publisher,
            ]);

            if($picture_src){
                $file =  App::make('App\Libs\Imag')->url($picture_src);
            }

            $book = Book::firstOrCreate([
                'name'=>$title,
                'author_id'=>$auhor_obj->id,
                'year'=>$year,
                'ibsn'=>$isbn,
            ],[
                'description'=>$description,
                'catalog_book_id'=>$catalog_id,
                'publishing_id' => $publish_obj->id,
                'user_id' => optional(Auth::user())->id,
                'image'=>$file,
            ]);

            sleep(1);
        });
    }
}
